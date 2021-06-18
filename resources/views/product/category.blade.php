@extends('layouts.main')

@section('title', __('home.categories'))

@section('styles')

@endsection

@section('content')

<div class="container light-style flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-4">
        {{__('home.browsecat')}}
        <span><p class="pt-20">{{__('home.browsecatdesc')}}</p></span>
    </h4>
    
</div>

@if (count($categories)>0)
<section>
    <div class="container">
        <div class="row no-gutters">
            <div class="filtering col-sm-12 text-center">
                <span data-filter="*" class="active pull-right" style="color: #e44650">{{__('home.all')}}</span>
            </div>
            <div class="col-12 text-center w-100">
                <div class="grid form-row gallery text-center">
                    @foreach ($categories as $c)
                    <div class="col-lg-4 col-sm-6 mb-2 grid-item">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-image">
                                @if (!@empty($c->image))
                                    <img src="{{ Voyager::image( $c->image ) }}" alt="{{$c->name}}">
                                @else
                                    <img src="{{ asset('assets/img/not-found.png') }}" alt="{{$c->name}}">
                                @endif
                            </div>
                            <div class="portfolio-overlay">
                                <div class="portfolio-content">
                                    <a class="popimg ml-0" href="{{ route('product.category', $c->slug) }}">
                                        <i class="ti-search"></i>
                                    </a>
                                    <h4>{{ ucfirst($c->name) }} </h4>
                                    <p>[{{ count($c->products) }} items]</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@else
<div class="col-md-12 m-md-auto">
    <div class="blog-details-info" style="text-align: center">
        <img src="{{ asset('assets/img/bg/no-result.png') }}" style="width:40%; height:40%" alt="empty list" class="ptb-20">
        <h3>The product is coming soon</h3>
        <p>Go to <a href="{{route('product.index')}}"><strong>Products</strong></a> page to browse other products you might like.</p>
        <br>
        <form action="{{ route('product.index') }}">
            <div class="leave-btn">
                <button class="submit btn-hover" value="{{ route('product.index') }}" type="submit"><i class="pe-7s-shopbag"></i> Product Page </button>
            </div>
        </form>
    </div>
</div>
@endif

@endsection

@section('script')
<script>
$(function(){
    $(".grid").masonry({ itemSelector: ".grid-item" });

    $(".filtering").on("click", "span", function () {
        var a = $(".gallery").isotope({});
        var e = $(this).attr("data-filter");
        a.isotope({ filter: e });
    });
    $(".filtering").on("click", "span", function () {
        $(this).addClass("active").siblings().removeClass("active");
    });
})
</script>
@endsection
