@extends('layouts.main')

@section('title', __('home.cart'))

@section('content')

{{-- <!-- Breadcumb Area -->
<div class="breadcrumb-area pt-50 breadcrumb-padding pb-50" style="background-image: url(assets/img/bg/breadcrumb.jpg)">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2>Cart</h2>
            <ul>
                <li><a href="{{ route('web.home') }}">home</a></li>
                <li class="active">cart</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcumb Area --> --}}

<livewire:market-cart />

@endsection


