@extends('layouts.main')

@section('title', __('home.contactus'))

@section('content')

<!-- Breadcumb Area -->
<div class="breadcrumb-area pt-50 breadcrumb-padding pb-50" style="background-image: url(assets/img/bg/breadcrumb.jpg)">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2>Contact Us</h2>
            <ul>
                <li><a href="{{ route('web.home') }}">home</a></li>
                <li class="active">contact us</li>
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

                    @if (Session::has('message_sent'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message_sent') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.send') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="contact-map-wrapper">
                                    <div class="contact-message">
                                        <div class="contact-title">
                                            <h4>Contact Information</h4>
                                        </div>

                                        <form id="contact-form" class="contact-form" action="assets/mail.php" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="contact-input-style mb-30">
                                                        <label>Name*</label>
                                                        <input name="name" required="" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="contact-input-style mb-30">
                                                        <label>Email*</label>
                                                        <input name="email" required="" type="email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="contact-input-style mb-30">
                                                        <label>Phone</label>
                                                        <input name="phone" required="" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="contact-textarea-style mb-30">
                                                        <label>Message*</label>
                                                        <textarea class="form-control2" name="message" required=""></textarea>
                                                    </div>
                                                    <button class="btn btn-w-m btn-danger btn-hover" type="submit" style="background-color: #272727;
                                                    border-color: #272727;
                                                    color: #FFFFFF">
                                                        Send Message
                                                    </button>
                                                </div>
                                            </div>

                                        </form>

                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
