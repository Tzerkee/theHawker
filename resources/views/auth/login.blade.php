@extends('layouts.main')

@section('title', __('home.login'))

@section('content')

<!-- Breadcumb Area -->
<div class="breadcrumb-area pt-50 breadcrumb-padding pb-50" style="background-image: url(assets/img/bg/breadcrumb.jpg)">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2>{{__('home.login')}}</h2>
            <ul>
                <li><a href="{{ route('web.home') }}">{{__('home.home')}}</a></li>
                <li class="active">{{__('home.login')}}</li>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-12 col-lg-6 col-xl-6 ml-auto mr-auto">
                <div class="login">
                    <div class="login-form-container">
                        <div class="login-form">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <input id="email" type="email" name="email" placeholder="{{__('home.email')}}" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                <input id="password" type="password" name="password" placeholder="{{__('home.password')}}" required autocomplete="current-password">

                                <div class="button-box">
                                    <div class="login-toggle-btn">
                                        <div style="float: right;">
                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">{{__('home.rmbme')}}</label>
                                        </div>

                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">{{__('home.forgotpw')}}</a>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="button-box">
                                    <button type="submit" class="default-btn floatright">{{__('home.login')}}</button>
                                </div>
                                <div class="pt-30" style="color: #777;">
                                    {{__('home.donthvacc')}} <a href="{{ route('register') }}" style="color: #e44650; text-align: center;">{{__('home.regnow')}}</a>
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
