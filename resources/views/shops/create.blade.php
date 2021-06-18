@extends('layouts.main')

@section('title', __('home.addshop'))

@section('content')

<!-- Breadcumb Area -->
<div class="breadcrumb-area pt-50 breadcrumb-padding pb-50" style="background-image: url('/assets/img/bg/breadcrumb.jpg')>
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2>{{__('home.addshop')}}</h2>
            <ul>
                <li><a href="{{ route('web.home') }}">{{__('home.home')}}</a></li>
                <li><a href="{{ route('product.index') }}">{{__('home.txtproducts')}}</a></li>
                <li class="active">{{__('home.addshop')}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcumb Area -->
<div class="contact-area pt-80 pb-80">
    <div class="container">
        <div class="col-lg-12">
            <div class="contact-map-wrapper">
                <div class="contact-message">
                    <form class="contact-form" action="{{route('shops.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="contact-input-style mb-10">
                                    <label>{{__('home.shopname')}}</label>
                                    <input type="text" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact-textarea-style mb-30">
                                    <label>{{__('home.shopdesc')}}</label>
                                    <textarea class="form-control2" name="description" required></textarea>
                                </div>
                                <div class="pb-20 btn-group">
                                    <button class="btn btn-w-m btn-danger btn-hover" type="submit" style="background-color: #272727;
                                    border-color: #272727;
                                    color: #FFFFFF">
                                        {{__('home.submit')}}
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
