@extends('layouts.main')

@section('title', __('home.txtpdetail'))

@section('styles')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-608f7770733c9a2f"></script>
@endsection

@section('content')

<!-- Breadcumb Area -->
<div class="breadcrumb-area pt-50 breadcrumb-padding pb-50" style="background-image: url('assets/img/bg/breadcrumb.jpg')">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2>{{__('home.txtpdetail')}}</h2>
            <ul>
                <li><a href="{{ route('web.home') }}">{{__('home.home')}}</a></li>
                <li><a href="{{ route('product.index') }}">{{__('home.txtproducts')}}</a></li>
                <li class="active">{{__('home.txtpdetail')}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcumb Area -->

<!-- Single Product Details Area -->
<div class="product-details ptb-100 pb-90">
    <div class="container">
        <div class="row">
            <!-- product images -->
            <div class="column col-md-12 col-lg-7 col-12">
                <img id="featured" src="{{ productImage($product->image) }}">

                <div id="slide-wrapper" >
                    <img id="slideLeft" class="arrow-area" src="{{asset('assets/img/icon-img/left-16x16.png')}}">

                    <div id="slider">
                        {{-- Cover Image --}}
                        <img class="thumbnail active" src="{{ productImage($product->image) }}">
                        {{-- Multiple images --}}
                        @if ($product->images)
                            @foreach ( json_decode($product->images, true) as $image)
                                <a class="active mr-12" href="#pro-details1" data-toggle="tab" role="tab" aria-selected="true">
                                    <img class="thumbnail" src="{{ productImage($image) }}">
                                </a>
                            @endforeach
                        @endif
                    </div>

                    <img id="slideRight" class="arrow-area" src="{{ asset('assets/img/icon-img/right-16x16.png') }}">
                </div>
            </div>
            <!-- product descriptions -->
            <div class="col-md-12 col-lg-5 col-12">
                <div class="product-details-content">
                    <h3>{{ucfirst($product->name)}}</h3>
                    <h4 style="color: #e44650; font-weight: 600">RM {{number_format($product->price,2)}}</h4>

                    @if ($product->stock > setting('site.stock_threshold'))
                        <p><span class="badge badge-secondary badge-success"><?php echo $product->stock; ?> {{__('home.instock')}}</span></p>

                    @elseif ($product->stock <= setting('site.stock_threshold') && $product->stock > 0)
                        <p><span class="badge badge-secondary badge-warning"><?php echo $product->stock; ?> {{__('home.instock')}}</span></p>
                    @else
                        <p><span class="badge badge-secondary badge-danger">{{__('home.soldout')}}</span></p>
                    @endif

                    <p>{!! html_entity_decode($product->summary) !!}</p>
                    <div class="product-details-cati-tag mtb-20">
                        <ul>
                            <li class="categories-title">{{__('home.category')}} :</li>
                            <li><a href="">{{$product->category->name ?? 'theHawker'}}</a></li>
                        </ul>
                    </div>
                    <div class="quickview-plus-minus">

                        {{-- add to cart --}}
                        @if ($product->stock == 0)
                        <div class="quickview-btn-cart">
                            <a class="btn-hover-black enable-cart" href="" title="{{__('home.outofstock')}}">{{__('home.soldout')}}</a>
                        </div>
                        @else
                            <div class="quickview-btn-cart">
                                <a class="btn-hover-black enable-cart" href="{{route('cart.add', $product->id)}}" title="{{__('home.addtocart')}}">{{__('home.addtocart')}}</a>
                            </div>
                        @endif

                        {{-- add to wishlist --}}
                        <div class="quickview-btn-wishlist" style="margin-left: 10px">
                            @if(Auth::check())
                                <a href="" data-product-id="{{$product->id}}" class="add_to_wishlist btn-hover" id="add_to_wishlist{{$product->id}}" title="{{__('home.wishlist')}}"><i class="pe-7s-like"></i></a>
                            @else
                                <a class="btn-hover" href="{{ route('login') }}" title="{{__('home.promptuserlogin')}}"><i class="pe-7s-like"></i></a>
                            @endif
                        </div>  

                    </div>

                    <br>
                    {{-- social sharing --}}
                    <div class="addthis_inline_share_toolbox_5mic"></div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-description-review-area pb-90">
    <div class="container">
        <div class="product-description-review">
            <div class="description-review-title nav text-center" role=tablist>
                <a class="active" href="#pro-dec" data-toggle="tab" role="tab" aria-selected="true">
                    {{__('home.productdetail')}}
                </a>
                <a href="#pro-review" data-toggle="tab" role="tab" aria-selected="false">
                    {{__('home.productreview')}} ({{count($product->comments)}})
                </a>
            </div>
            <div class="description-review-text tab-content">
                <div class="tab-pane active show fade" id="pro-dec" role="tabpanel">
                    <p>{!! html_entity_decode($product->description) !!}</p>
                </div>
                <div class="tab-pane fade" id="pro-review" role="tabpanel">
                    <div class="leave-area">
                        @auth
                        <form action="{{ url('save-comment/'.$product->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-leave">
                                        <textarea name="comment" placeholder="{{__('home.writereview')}}"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="leave-btn">
                                        <button class="submit btn-hover" type="submit"><i class="pe-7s-mail"></i> {{__('home.submit')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endauth
                    </div>
                    <div class="blog-replay-wrapper">
                        <h4 class="blog-details-title2">{{__('home.have')}} {{count($product->comments)}} {{__('home.comment')}}</h4>
                        @if($product->comments)
                        @foreach ( $product->comments as $comment)
                        <div class="single-blog-replay">
                            <div class="replay-img">
                                <img src="{{$comment['user']['avatar']}}" alt="">
                            </div>
                            <div class="replay-info-wrapper">
                                <div class="replay-info">
                                    <div class="replay-name-date">
                                        <h5>{{$comment->user->name}}</h5>
                                        <span>{{ date('d-m-Y H:i:s', strtotime($comment->created_at)) }}</span>
                                    </div>
                                    {{-- <div class="replay-btn">
                                        <a href="#">Reply</a>
                                    </div> --}}
                                </div>
                                <p>{{$comment->comment}}</p>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single Product Details Area End -->

<!-- Related Products Area -->
<div class="product-area pb-95">
    <div class="container">
        <div class="section-title-3 text-center mb-50">
            <h2>{{__('home.mightlike')}}</h2>
        </div>

        @if (count($product->products)>0)
            <div class="product-style">
                <div class="related-product-active owl-carousel">
                    @foreach ( $product->products as $p)
                        @if ($p->id != $product->id)
                            <div class="product-wrapper">
                                <div class="product-img-2">
                                    <a href="{{ route('product.detail', $p->slug) }}">
                                        <img src="{{ productImage($p->image) }}" alt="">
                                    </a>
                                </div>
                                @if ($p->condition == 'new')
                                <div class="product_badge">
                                    <span>{{__('home.new')}}</span>
                                </div>
                                @endif
                                @if ($p->condition == 'featured')
                                <div class="product_badge">
                                    <span>{{__('home.featured')}}</span>
                                </div>
                                @endif
                                @if ($p->condition == 'popular')
                                <div class="product_badge">
                                    <span>{{__('home.popular')}} <i class="fa fa-fire" style="color: #fff"></i></span>
                                    
                                </div>
                                @endif
                                @if ($p->condition == 'fresh')
                                <div class="product_badge">
                                    <span>{{__('home.fresh')}}</span>
                                </div>
                                @endif
                                @if ($p->stock == 0)
                                <div class="product_badge">
                                    <span>{{__('home.soldout')}}</span>
                                </div>
                                @endif
                                <div class="product-content">
                                    <h4><a href="{{ route('product.detail', $p->slug) }}">{{ ucwords($p->name) }}</a></h4>
                                    <span style="color: #e44650; font-weight: 600">RM {{number_format($p->price,2)}}</span>
                                    <div class="product-list-cart-wishlist">
                                        @if ($p->stock == 0)
                                        <div class="product-list-cart">
                                            <a class="btn-hover list-btn-style" title="{{__('home.outofstock')}}">{{__('home.soldout')}}</a>
                                        </div>
                                        @else
                                        <div class="product-list-cart">
                                            <a href="{{route('cart.add', $p->id)}}" class="btn-hover list-btn-style" title="{{__('home.addtocart')}}"><i class="ti-shopping-cart"></i> {{__('home.addtocart')}}</a>
                                        </div>
                                        @endif
                    
                                        {{-- add to wishlist --}}
                                        <div class="product-list-wishlist">
                                            @if(Auth::check())
                                            <a href="" data-product-id="{{$p->id}}" class="add_to_wishlist btn-hover list-btn-wishlist" title="{{__('home.wishlist')}}" id="add_to_wishlist{{$p->id}}">
                                                <i class="pe-7s-like"></i>
                                            </a>
                                            @else
                                            <a href="{{ route('login') }}" class="btn-hover list-btn-wishlist" title="{{__('home.promptuserlogin')}}">
                                                <i class="pe-7s-like"></i>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
<!-- Related Products Area -->

@endsection

@section('script')
{{-- Image Slider --}}
<script type="text/javascript">
    let thumbnails = document.getElementsByClassName('thumbnail')

    let activeImages = document.getElementsByClassName('active')

    for (var i=0; i < thumbnails.length; i++){

        thumbnails[i].addEventListener('mouseover', function(){
            console.log(activeImages)

            if (activeImages.length > 0){
                activeImages[0].classList.remove('active')
            }


            this.classList.add('active')
            document.getElementById('featured').src = this.src
        })
    }


    let buttonRight = document.getElementById('slideRight');
    let buttonLeft = document.getElementById('slideLeft');

    buttonLeft.addEventListener('click', function(){
        document.getElementById('slider').scrollLeft -= 180
    })

    buttonRight.addEventListener('click', function(){
        document.getElementById('slider').scrollLeft += 180
    })

    (function(){
        var rating = document.querySelector('.rating');
        var handle = document.getElementById('toggle-rating');
        handle.onchange = function(event) {
            rating.classList.toggle('rating', handle.checked);
        };
    }());

</script>

{{-- Add to Wishlist --}}
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script>
    $(document).on('click', '.add_to_wishlist', function (e) {
        e.preventDefault();

        var product_id=$(this).data('product-id');
        // alert(product_id);

        var token="{{csrf_token()}}";
        var path="{{route('store.wishlist')}}";

        $.ajax({
        url:path,
        type:"POST",
        dataType:"JSON",
        data:{
            product_id:product_id,
            _token:token,
        },
        success:function(data){
            console.log(data);

            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: data['status']
            })

        }
    });

    });
</script>
@endsection
