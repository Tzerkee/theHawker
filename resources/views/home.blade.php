@extends('layouts.main')

@section('title', __('home.home'))

@section('content')

@php
    use App\Models\Product;

    $all = Product::publish()->where('publish', 1)->inRandomOrder()->limit('6')->get();
    $newest = Product::where(['publish' => 1])->orderBy('created_at', 'DESC')->limit('10')->get();

@endphp

<!-- Slideshow Area -->
@if(count($slideshows) > 0)
<div class="slider-area">
    <div class="slider-active owl-carousel">
        @foreach ($slideshows as $slideshow)
            <div class="single-slider-4 slider-height-5 bg-img" style="background-image: url( {{ Voyager::image( $slideshow->image ) }} )">
                <div class="container">
                    <div class="slider-content-5 fadeinup-animated">
                        <h2 class="animated" style="width: 60%; font-weight: 700">{{$slideshow->title}}</h2>
                        <p class="animated" style="width: 60%; font-weight: 600">{!! html_entity_decode($slideshow->description) !!}</p>
                        <a class="handicraft-slider-btn btn-hover animated" href="{{route('product.index')}}">{{__('home.shopnow')}}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
<!-- Slideshow Area -->

<!-- Category Area -->
@if(count($categories) > 0)
<div class="popular-product-area wrapper-padding-3 pt-115 pb-80">
    <div class="container-fluid">
        <div class="section-title-6 text-center mb-50">
            <div class="section-title-2 text-center mb-50">
                <h2>{{__('home.browsecat')}}</h2>
                <h4>{{__('home.browsecatdesc')}}</h4>
            </div>
        </div>
        <div class="product-style">
            <div class="popular-product-active owl-carousel">
                @foreach ($categories as $category)
                <div class="product-wrapper">
                    <div class="product-img img2 furits-banner-wrapper mb-30 wow ">
                        <a href="{{ route('product.category', $category->slug) }}">
                            <img src="{{ productImage( $category->image ) }}" style="max-width: 100%; float: left; height: 300px; object-fit: cover" alt="{{$category->name}}"  class="pb-20">
                            <div class="top-left">
                                <h4 style="color: #fff; font-size: 20px;font-weight: 800; margin: 18px 0;"><strong><a href="{{ route('product.category', $category->slug) }}" >{{ ucwords($category->name) }}</a></strong></h4>
                            </div>
                            {{-- <div class="furits-banner-content">
                                <h4>Super Natural</h4>
                                <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                <a class="furits-banner-btn btn-hover" href="#">Shop Now</a>
                            </div> --}}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
<!-- Category Area -->

<!-- All Products Area -->
@if (count($all)>0)
<div class="container">
    <div class="section-title-2 text-center mb-50">
        <h2>{{__('home.allprod')}}</h2>
        <h4>{{__('home.allprod_desc')}}</h4>
    </div>
    <div class="row">
        @foreach ($all as $p)
        <div class="col-md-4 col-sm-6">
            <div class="product-grid8">
                <div class="product-image8">
                    <a>
                        <img class="pic-1" src="{{ productImage($p->image) }}">
                        <img class="pic-2" src="{{ productImage($p->image) }}">
                    </a>
                    <ul class="social">

                        {{-- add to wishlist --}}
                        @if(Auth::check())
                        <li><a id="add_to_cart{{$p->id}}" data-product-id="{{$p->id}}" class="fa fa-heart add_to_wishlist" title="{{__('home.wishlist')}}"></a></li>
                        @else
                        <li><a href="{{ route('login') }}" class="fa fa-heart" title="{{__('home.promptuserlogin')}}"></a></li>
                        @endif

                        {{-- add to cart --}}
                        @if ($p->stock == 0)
                        <li><a class="fa fa-shopping-bag nostock" title="{{__('home.outofstock')}}"></a></li>
                        @else
                        <li><a href="{{route('cart.add', $p->id)}}" class="fa fa-shopping-bag" title="{{__('home.addtocart')}}"></a></li>
                        @endif

                    </ul>
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
                </div>
                <div class="product-content">
                    <div class="price">
                        <a href="{{ route('product.detail', $p->slug) }}">{{ ucwords($p->name) }}</a>
                    </div>
                    <span class="product-shipping" style="color: #e44650">RM {{number_format($p->price,2)}}</span>
                    <h3 class="title">{{__('home.category')}} : {{ ucwords($p->category->name) ?? 'theHawker'}}</h3>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="pb-100">
    <div style="text-align: center">
        <form action="{{ route('product.index') }}">
            <button class="btn btn-outline btn-danger" type="submit">{{__('home.viewall')}}</button>
        </form>
    </div>
</div>
@else
<div class="blog-details-info">
    <div class="col-md-12 m-md-auto">
        <div class="blog-details-info" style="text-align: center">
            <img src="{{ asset('assets/img/bg/no-result.png') }}" style="width:40%; height:40%" alt="empty list" class="ptb-20">
            <h3>{{__('home.comingsoon')}}</h3>
        </div>
    </div>
</div>
@endif
<!-- All Products Area -->

<!-- New Arrivals Area -->
<div class="top-month pb-100">
    <div class="container">
        <div class="section-title-2 text-center mb-50">
            <h2>{{__('home.newestarrivals')}}</h2>
            <h4>{{__('home.new_desc')}}</h4>
        </div>
        <div class="product-style">
            <div class="popular-product-active owl-carousel">
                @foreach ( $newest as $new )
                    <div class="product-wrapper">
                        <div class="product-img wow furits-banner-wrapper">
                            <a href="{{ route('product.detail', $new->slug) }}">
                                <img src="{{ productImage($new->image) }}" alt="{{$new->name}}">
                            </a>

                            <div class="product_badge">
                                <span>{{__('home.new')}}</span>
                            </div>
                        </div>
                        <div class="product-content">
                            <span class="product-shipping"><a href="{{ route('product.detail', $new->slug) }}">{{ ucwords($new->name) }}</a></span>
                            <h5 class="title pt-10"><a class="product-shipping" style="color: #e44650; font-weight: 600">RM {{number_format($new->price,2)}}</a></h5>
                            <div class="price">{{__('home.category')}} : {{ ucwords($new->category->name) }}
                            </div>
                            <div class="product-list-cart-wishlist">
                                
                                {{-- add to cart --}}
                                @if ($new->stock == 0)
                                <div class="product-list-cart">
                                    <a class="list-btn-style" title="{{__('home.outofstock')}}">
                                        {{__('home.soldout')}}
                                    </a>
                                </div>
                                @else
                                <div class="product-list-cart">
                                    <a href="{{route('cart.add', $new->id)}}" class="btn-hover list-btn-style" title="{{__('home.addtocart')}}">
                                        <i class="ti-shopping-cart"></i> {{__('home.addtocart')}}
                                    </a>
                                </div>
                                @endif

                                {{-- add to wishlist --}}
                                <div class="product-list-wishlist">
                                    @if(Auth::check())
                                    <a href="" data-product-id="{{$new->id}}" class="add_to_wishlist btn-hover list-btn-wishlist" id="add_to_wishlist{{$new->id}}" title="{{__('home.wishlist')}}"><i class="pe-7s-like"></i></a>
                                    @else
                                    <a href="{{ route('login') }}" class="btn-hover list-btn-wishlist" title="{{__('home.promptuserlogin')}}"><i class="pe-7s-like"></i></a>
                                    @endif
                                </div>
                                
                            </div>
                                        
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- New Arrivals Area -->

<!-- Contact Us Banner Area -->
<div class="newsletter-area ptb-40 gray-bg-5">
    <div class="container">
        <div class="watch-about-content text-center">
            <h2>{{__('home.question')}}</h2>
            <h5 class="ptb-20">{{__('home.questiontitle')}}</后>
            <form action="{{ route('contact') }}" class="pt-30">
                <button class="btn btn-outline btn-danger" type="submit" >
                    {{__('home.contactus')}}
                </button>
            </form>
        </div>
    </div>
</div>
<!-- Contact Us Banner Area -->

<!-- Events Area -->
@if(count($events) > 0)
<div class="blog-area pt-120 pb-50">
    <div class="container">
        <div class="section-title-3 text-center mb-50">
            <h2>{{__('home.ourevents')}}</h2>
        </div>
        <div class="row">
            @foreach ($events as $d)
            <div class="col-md-4">
                <div class="blog-wrapper mb-40">
                    <div class="blog-img blog-hover">
                        <a href="{{ url('events/'.$d->id) }}">
                            <img src="{{ Voyager::image( $d->image ) }}" alt="img" style="max-width: 100%; float: left; height: 220px; object-fit: cover" class="pb-20">
                        </a>
                    </div>
                    <div class="blog-info">
                        <h5><a href="{{ url('events/'.$d->id) }}"><strong>{{ $d->title }}</strong></a></h5>
                        <span>{{ date('M d, Y', strtotime($d->event_date)) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<!-- Events Area -->

@endsection

@section('script')
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

