@extends('layouts.seller')

@section('title', 'Order Summary')

@section('content')
<div class="container light-style flex-grow-1 container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
        {{__('home.ordersummary')}}
    </h4>
    <div class="row">
        <div class="col">
            <div class="btn-group pull-left">
                <form action="{{ route('seller.orders.index' )}}">
                    <button type="submit" class="btn btn-outline btn-danger ml-10 mt-25">{{__('home.backtoorderslist')}}</button>
                </form>
            </div>
            <div class="btn-group pull-right">
                <form action="{{ route('product.index') }}">
                    <button type="submit" class="btn btn-danger btn-circle mr-10 mt-25" value="{{ url('/admin' )}}">{{__('home.sellercentre')}}</button>
                </form>
            </div>
        </div>
    </div>
    <!-- order-detail-area start -->
    @foreach ($items as $item)
    <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
        <div class="bg-white card mb-4 order-list shadow-sm">
            <div class="gold-members p-4">
                <div class="media">
                    <a>
                        <img class="mr-4" src="{{ productImage($item->image) }}"
                            alt="image">
                    </a>
                    <div class="media-body">
                        <h6 class="mb-2">
                            <a class="text-black">
                                <i class="ti-bag"></i>
                                {{ ucwords($item->name) }}
                            </a><span class="pull-right">RM {{ number_format($item->pivot->price, 2) }}</span>
                        </h6>
                        <p class="text-gray mb-1">
                            <i class="ti-angle-double-right"></i> {{ $item->pivot->quantity }} {{__('home.items')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- order-detail-area end -->

</div>
@endsection
