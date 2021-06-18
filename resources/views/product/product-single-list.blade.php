{{-- List view --}}
{{-- #grid-sidebar8 --}}

@if (count($products)>0)
    @foreach ( $products as $item )
    <div class="col-lg-12">
        <div class="product-wrapper mb-30 single-product-list product-list-right-pr mb-60">
            <div class="product-img list-img-width">
                <a>
                    @if (!@empty($item->image))
                        {{-- <img src="{{ Voyager::image( $item->image ) }}" alt="{{$item->name}}"> --}}
                        <img src="{{ productImage($item->image) }}" alt="{{$item->name}}">
                    @else
                        <img src="{{ asset('assets/img/not-found.png') }}" alt="{{$item->name}}">
                    @endif
                </a>
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
            <div class="product-content-list">
                
                <div class="product-list-info">
                    <h4><a href="{{ route('product.detail', $item->slug) }}">{{ ucfirst($item->name) }} </a></h4>
                    <span>RM{{number_format($item->price,2)}}</span>
                    <p>{!! html_entity_decode($item->summary) !!}</p>
                </div>

                <div class="product-list-cart-wishlist">

                    {{-- add to cart --}}
                    @if ($item->stock == 0)
                    <div class="product-list-cart">
                        <a class="list-btn-style" title="{{__('home.outofstock')}}">
                            {{__('home.soldout')}}
                        </a>
                    </div>
                    @else
                    <div class="product-list-cart">
                        <a href="{{route('cart.add', $item->id)}}" class="btn-hover list-btn-style" title="{{__('home.addtocart')}}">
                            <i class="ti-shopping-cart"></i> {{__('home.addtocart')}}
                        </a>
                    </div>
                    @endif

                    {{-- add to wishlist --}}
                    <div class="product-list-wishlist">
                        @if(Auth::check())
                        <a href="" data-product-id="{{$item->id}}" class="add_to_wishlist btn-hover list-btn-wishlist" id="add_to_wishlist{{$item->id}}" title="{{__('home.wishlist')}}"><i class="pe-7s-like"></i></a>
                        @else
                        <a href="{{ route('login') }}" class="btn-hover list-btn-wishlist" title="{{__('home.promptuserlogin')}}"><i class="pe-7s-like"></i></a>
                        @endif
                    </div>

                </div>
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
