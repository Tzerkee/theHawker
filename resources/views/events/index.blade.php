@extends('layouts.main')

@section('title', __('home.events'))

@section('content')

<!-- Breadcumb Area -->
<div class="breadcrumb-area pt-50 breadcrumb-padding pb-50" style="background-image: url(assets/img/bg/breadcrumb.jpg)">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2>{{__('home.events')}}</h2>
            <ul>
                <li><a href="{{ route('web.home') }}">{{__('home.home')}}</a></li>
                <li class="active">{{__('home.events')}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcumb Area -->

<!-- events-area start -->
<div class="blog-area pt-95 pb-100">
    <div class="container">
        @if(count($events))
        <div class="blog-mesonry">
            <div class="row grid">
                @foreach($events as $d)
                <div class="col-lg-4 col-md-6 grid-item">
                    <div class="blog-wrapper mb-40">
                        <div class="blog-img blog-hover">
                            <a href="{{ url('events/'.$d->id) }}"><img src="{{ Voyager::image( $d->image ) }}" alt="image"></a>
                        </div>
                        <div class="blog-info-wrapper">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#">{{ $d->location }}</a></li>
                                    <li>{{ date('M d, Y', strtotime($d->event_date)) }}</li>
                                </ul>
                            </div>
                            <h4><a href="{{ url('events/'.$d->id) }}">{{ $d->title }}</a></h4>
                            <p>{!! Str::words($d->description, 8, ' ...') !!}</p>

                            <a class="blog-btn btn-hover" href="{{ url('events/'.$d->id) }}">{{__('home.readmore')}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
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
    </div>
</div>
<!-- events-area end -->

@endsection
