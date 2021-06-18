@extends('layouts.main')

@section('title', 'Order List')

@section('styles')
<link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css"
    integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">
@endsection

@section('content')

<!-- Breadcumb Area -->
<div class="breadcrumb-area pt-50 breadcrumb-padding pb-50" style="background-image: url(assets/img/bg/breadcrumb.jpg)">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2>orders</h2>
            <ul>
                <li><a href="{{ route('web.home') }}">home</a></li>
                <li><a href="{{ route('account.profile') }}">profile</a></li>
                <li class="active">orders</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcumb Area -->

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane  fade  active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <h4 class="font-weight-bold mt-0 mb-4">My Orders</h4>
                        @foreach ( $orders as $order )
                        <div class="bg-white card mb-4 order-list shadow-sm">
                            <div class="gold-members p-4">
                                <a href="#">
                                </a>
                                <div class="media">
                                    {{-- <a href="#">
                                        <img class="mr-4" src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                            alt="image">
                                    </a> --}}
                                    <div class="media-body">
                                        <a href="#">
                                            <span class="float-right text-info">Ordered on
                                                {{ date('d-m-Y H:i:s', strtotime($order['created_at'])) }}
                                                <i class="icofont-check-circled text-success"></i>
                                            </span>
                                        </a>
                                        <h6 class="mb-2">
                                            <a href="#"></a>
                                            <a href="#" class="text-black"><i class="icofont-list"></i> {{ $order['order_number'] }}</a>
                                        </h6>
                                        <p class="text-gray mb-1"><i class="icofont-location-arrow"></i>
                                            {{ $order['shipping_fullname'] }},{{ $order['shipping_address1'] }} <br>{{ $order['shipping_address2'] }}<br>{{ $order['shipping_postcode'] }} {{ $order['shipping_city'] }}, {{ $order['shipping_state'] }} {{ $order['shipping_country'] }}<br><i class="icofont-phone"></i> {{ $order['shipping_phone'] }}
                                        </p>
                                        <p class="text-gray">
                                            <i class="icofont-money"></i>
                                            @if ($order['payment_method'] == 'cod')
                                                Cash On Delivery
                                            @elseif($order['payment_method'] == 'card')
                                                Debit/Credit Card
                                            @else
                                                Direct Bank Transfer
                                            @endif
                                        </p>
                                        <div class="float-right">
                                            <a class="btn btn-outline-primary" href="{{ url('user/order/'.$order['id']) }}">
                                                <i class="icofont-ui-search"></i> VIEW
                                            </a>
                                        </div>
                                        <p class="mb-0 text-black text-primary pt-2"><span
                                                class="text-black font-weight-bold"> Total Paid:</span> RM
                                            {{ number_format($order['total'], 2) }}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
