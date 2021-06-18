@extends('layouts.main')

@section('title', __('home.orderdetail'))

@section('content')

<div class="container light-style flex-grow-1 container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
        {{__('home.orderdetail')}}
    </h4>
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-left">
                <form action="{{ route('account.profile') }}">
                    <button type="submit" class="btn btn-outline btn-info ml-10 mt-20">{{__('home.backtoprofile')}}</button>
                </form>
            </div>
            <div class="btn-group pull-right">
                <form action="{{ route('product.index') }}">
                    <button type="submit" class="btn btn-outline btn-danger mr-10 mt-20" value="{{ route('product.index') }}">{{__('home.continueshopping')}}</button>
                </form>
            </div>
        </div>
    </div>
    <!-- order-detail-area start -->
    <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
        <h4 class="font-weight-bold mt-0 mb-4">
            {{__('home.orderno')}} : <span style="color: #ff5252">{{ $data['order_number'] }}</span>
            <br><br>
            <span>
                <h6>
                    <i class="ti-time"></i> {{__('home.orderedon')}} : 
                    <strong>{{ date('d-m-Y H:i:s', strtotime($data['created_at'])) }}</strong>
                </h6>
                <h6>
                    <i class="ti-credit-card"></i> {{__('home.paymentmethod')}} :
                    @if ($data['payment_method'] == 'cod')
                        <strong>{{__('home.cod')}}</strong>
                    @elseif($data['payment_method'] == 'card')
                        <strong>{{__('home.card')}}</strong>
                    @else
                        <strong>{{__('home.bank')}}</strong>
                    @endif
                </h6>
                <h6>
                    <i class="ti-pencil-alt"></i> {{__('home.orderremarks')}}:
                    @if (!$data['remarks'] == null)
                        <strong>{{ $data['remarks'] }}</strong>
                    @else
                        <strong>{{__('home.noremarks')}}</strong>
                    @endif
                </h6>
                <h6>
                    <i class="ti-money"></i> {{__('home.ordertotalpaid')}}:
                    <strong>RM {{ number_format($data['total'], 2) }}</strong>
                </h6>

            </span>
        </h4>
        @foreach ( $data['items'] as $p )
        <div class="bg-white card mb-4 order-list shadow-sm">
            <div class="gold-members p-4">
                <div class="media">
                    <a>
                        <img class="mr-4" src="{{ productImage($p['image']) }}"
                            alt="image">
                    </a>
                    <div class="media-body">
                        <a>
                            <span class="float-right text-info">
                                @if( $data['status']  == 'pending')
                                <span class="float-right">{{__('home.orderedstatus')}} > {{__('home.pending')}}
                                    <i class="ti-reload text-blue"></i>
                                </span>
                                @elseif ( $data['status'] == 'processing' )
                                <span class="float-right">{{__('home.orderedstatus')}} > {{__('home.processing')}}
                                    <i class="ti-reload text-dark"></i>
                                </span>
                                @elseif( $data['status'] == 'completed' )
                                <span class="float-right">{{__('home.orderedstatus')}} > {{__('home.completed')}}
                                    <i class="ti-check-box text-success"></i>
                                </span>
                                @else
                                <span class="float-right">{{__('home.orderedstatus')}} > {{__('home.cancelled')}}
                                    <i class="ti-close text-danger"></i>
                                </span>
                                @endif
                            </span>
                        </a>
                        <h6 class="mb-2">
                            <a class="text-black">
                                <i class="ti-bag"></i>
                                {{ ucwords($p['name']) }}
                            </a>
                        </h6>
                        <p class="text-gray mb-1">
                            <i class="ti-money"></i>
                            RM {{ number_format($p['price'], 2) }}
                            <i class="ti-close"></i>
                            {{ $p['pivot']['quantity'] }} {{__('home.items')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- order-detail-area end -->

</div>

@endsection
