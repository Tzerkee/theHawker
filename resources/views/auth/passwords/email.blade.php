@extends('layouts.main')

@section('title', __('home.resetpw'))

@section('content')

<!-- Breadcumb Area -->
<div class="breadcrumb-area pt-50 breadcrumb-padding pb-50" style="background-image: url(assets/img/bg/breadcrumb.jpg)">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2>{{__('home.resetpw')}}</h2>
            <ul>
                <li><a href="{{ route('web.home') }}">{{__('home.home')}}</a></li>
                <li class="active">{{__('home.resetpw')}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcumb Area -->

<!-- login-area start -->
<div class="register-area ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-12 col-lg-6 col-xl-6 ml-auto mr-auto">
                <div class="login">
                    <div class="login-form-container">
                        <div class="login-form">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <input id="email" type="email" name="email" placeholder="{{__('home.email')}}" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                <div class="button-box">
                                    <button type="submit" class="default-btn floatright">{{__('home.sendresetpw')}}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- login-area end -->

@endsection
