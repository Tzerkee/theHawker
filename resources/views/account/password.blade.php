@extends('layouts.main')

@section('title', 'Reset Password')

@section('content')

<!-- Breadcumb Area -->
<div class="breadcrumb-area pt-50 breadcrumb-padding pb-50" style="background-image: url(assets/img/bg/breadcrumb.jpg)">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2>reset password</h2>
            <ul>
                <li><a href="{{ route('web.home') }}">home</a></li>
                <li><a href="{{ route('account.profile') }}">profile</a></li>
                <li class="active">reset password</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcumb Area -->

<div class="shop-page-wrapper ptb-100">
    <div class="container">
        <div class="row pt-50">
            @if (session()->has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="col-lg-12">
                <div class="profile-meta" style="padding-bottom: 50px">
                    <ul>
                        <li><a class="{{ \Request::is('profile') ? 'active' : '' }}" href="{{ route('account.profile') }}">Profile </a></li>
                        <li><a class="{{ \Request::is('user/order') ? 'active' : '' }}" href="{{url('/user/order')}}">Orders </a></li>
                        <li><a class="{{ \Request::is('user/wishlist') ? 'active' : '' }}" href="{{url('/user/wishlist')}}">Wishlist </a></li>
                        <li><a class="{{ \Request::is('account/reset') ? 'active' : '' }}" href="{{url('/account/reset')}}">Change Password </a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Logout </a>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>

                <div class="contact-map-wrapper">
                    <div class="contact-message">
                        @if(count($errors) > 0 )
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            </button>
                            <ul class="p-0 m-0" style="list-style: none;">
                                @foreach($errors->all() as $error)
                                    <li><strong>{{$error}}</strong></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            </button>
                            <p>{{ session('success') }}</p>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('reset.password') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="contact-input-style mb-30">
                                        <label for="password"><strong>Current Password</strong></label>
                                        <input type="password" placeholder="Current password" name="current_password" id="current_password">
                                        <div></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-input-style mb-30">
                                        <label for="password"><strong>New Password</strong></label>
                                        <input type="password" placeholder="New password" id="password" name="new_password">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact-input-style mb-30">
                                        <label for="password"><strong>Confirm New Password</strong></label>
                                        <input type="password">
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline btn-danger dim" type="submit">
                                        update password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
