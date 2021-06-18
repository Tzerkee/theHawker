@extends('layouts.main')

@section('title', __('home.howtolist'))

@section('content')
    <div class="banner-area pt-180 pb-180">
        <div class="container" style="padding-top: 100px; padding-bottom: 100px">
            {{-- Register Your Account --}}
            <div class="row">
                <div class="ml-auto col-lg-5">
                    <div class="offer-img" style="width: 650px;">
                        <img style="width:330px; height:376px" src="assets/img/how-to-list/profile.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="offer-details-wrapper">
                        <h2>Register Your Account</h2>
                        <p>It's all free and easy account setup!</p>
                        <div class="offer-price-btn">
                            <div class="offer-btn">
                                <a href="product-details.html">Register Now  →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="padding-top: 100px; padding-bottom: 100px">
            {{-- Add Your Shop --}}
            <div class="row">
                <div class="ml-auto col-lg-5">
                    <div class="offer-details-wrapper">
                        <h2>Add Your Shop</h2>
                        <p>Fill in the shop details.</p>
                        <div class="offer-price-btn">
                            <div class="offer-btn">
                                <a href="product-details.html">Add Your Shop Now  →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="offer-img" style="width: 500px;">
                        <img style="width:480px; height:376px" src="assets/img/how-to-list/add-product.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="padding-top: 100px">
            {{-- Upload Your Products --}}
            <div class="row">
                <div class="ml-auto col-lg-5">
                    <div class="offer-img" style="width: 650px;">
                        <img style="width:580px; height:376px" src="assets/img/how-to-list/upload.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="offer-details-wrapper" style="padding-left:200px">
                        <h2>Upload Your Products</h2>
                        <p>Start adding the products into your shop!</p>
                        <div class="offer-price-btn">
                            <div class="offer-btn">
                                <a href="product-details.html">GO NOW  →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Contact Us --}}
    <div id="about-area" class="watch-about-area bg-img ptb-150" style="background-image: url(assets/img/bg/8.jpg)">
        <div class="container">
            <div class="watch-about-content text-center">
                <h2>Got questions?</h2>
                <p>Please do not hesitate to contact us if you have any questions regarding theHawker.</p>
                <a href="about-us.html" target="_blank">Contact Us</a>
            </div>
        </div>
    </div>

@endsection
