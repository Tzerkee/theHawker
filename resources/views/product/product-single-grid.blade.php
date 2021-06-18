{{-- grid view --}}
{{-- #grid-sidebar7 --}}
@if (count($products)>0)
    @foreach ( $products as $item )
        <div class="col-lg-4 col-md-6">
            <div class="product-grid8">
                <div class="product-image8">
                    <a>
                        <img class="pic-1" src="{{ productImage($item->image) }}">
                        <img class="pic-2" src="{{ productImage($item->image) }}">
                    </a>

                    <ul class="social">
                        
                        {{-- add to wishlist --}}
                        @if(Auth::check())
                        <li><a id="add_to_wishlist{{$item->id}}" data-product-id="{{$item->id}}" class="fa fa-heart add_to_wishlist" title="{{__('home.wishlist')}}"></a></li>
                        @else
                        <li><a href="{{ route('login') }}" class="fa fa-heart" title="{{__('home.promptuserlogin')}}"></a></li>
                        @endif

                        {{-- add to cart --}}
                        @if ($item->stock == 0)
                        <li><a class="fa fa-shopping-bag nostock" title="{{__('home.outofstock')}}"></a></li>
                        @else
                        <li><a href="{{route('cart.add', $item->id)}}" class="fa fa-shopping-bag" title="{{__('home.addtocart')}}"></a></li>
                        @endif

                    </ul>
                    
                    </ul>
                    @if ($item->condition == 'new')
                    <div class="product_badge">
                        <span>{{__('home.new')}}</span>
                    </div>
                    @endif
                    @if ($item->condition == 'featured')
                    <div class="product_badge">
                        <span>{{__('home.featured')}}</span>
                    </div>
                    @endif
                    @if ($item->condition == 'popular')
                    <div class="product_badge">
                        <span>{{__('home.popular')}} <i class="fa fa-fire" style="color: #fff"></i></span>
                        
                    </div>
                    @endif
                    @if ($item->condition == 'fresh')
                    <div class="product_badge">
                        <span>{{__('home.fresh')}}</span>
                    </div>
                    @endif
                    @if ($item->stock == 0)
                    <div class="product_badge">
                        <span>{{__('home.soldout')}}</span>
                    </div>
                    @endif
                </div>
                <div class="product-content">
                    <div class="price">
                        <a href="{{ route('product.detail', $item->slug) }}">{{ ucwords($item->name) }}</a>
                    </div>
                    <span class="product-shipping" style="color: #e44650">RM{{number_format($item->price,2)}}</span>
                    <h3 class="title">{{__('home.category')}} : {{ ucwords($item->category->name) ?? 'theHawker'}}</h3>
                </div>
            </div>
        </div>
    @endforeach
@else
<div class="col-md-12 m-md-auto">
    <div class="blog-details-info" style="text-align: center">
        <img src="{{ asset('assets/img/bg/no-result.png') }}" style="width:40%; height:40%" alt="empty list" class="ptb-20">
        <h3>{{__('home.comingsoon')}}</h3>
        <p>{{__('home.goto')}} <a href="{{route('product.index')}}"><strong>{{__('home.txtproducts')}}</strong></a> {{__('home.comingsoondesc')}}</p>
        <br>
        <form action="{{ route('product.index') }}">
            <div class="leave-btn">
                <button class="submit btn-hover" value="{{ route('product.index') }}" type="submit"><i class="pe-7s-shopbag"></i> {{__('home.productpage')}} </button>
            </div>
        </form>
    </div>
</div>
@endif
