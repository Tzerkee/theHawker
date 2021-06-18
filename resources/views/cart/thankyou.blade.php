@extends('layouts.main')

@section('title', 'Thank You')

@section('content')

<div class="shop-page-wrapper ptb-80">
    <div class="container">
        <div class="blog-details-info" style="text-align: center">
            <img src="{{ asset('assets/img/bg/success.png') }}" style="width:40%; height:40%" alt="thank you" class="ptb-50">
            <h2><strong>THANK YOU!</strong></h2>
            <br>
            <form action="{{url('/user/order')}}">
                <div class="leave-btn">
                    <button class="submit btn-hover" value="{{url('/user/order')}}" type="submit"><i class="pe-7s-angle-right"></i> View Order List </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
