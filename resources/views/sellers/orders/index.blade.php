@extends('layouts.seller')

@section('title', 'Order Management')

@section('styles')

@endsection

@section('content')

    <div class="container light-style flex-grow-1 container-p-y">

        <h4 class="font-weight-bold py-3 mb-4">
            {{__('home.ordersmanagement')}}
        </h4>

        @php
            use App\Models\SubOrder;
            $orders = SubOrder::where('seller_id', auth()->id())->get();
        @endphp

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

        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#seller-orders">{{__('home.manageorders')}}</a>
                        {{-- <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="{{ route('seller.orders.index' )}}">Orders</a> --}}
                        <a class="list-group-item list-group-item-action"
                            href="{{ url('/admin' )}}">{{__('home.backtosellercentre')}}</a>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="tab-content">
                        {{-- Orders List--}}
                        <div class="tab-pane fade active show" id="seller-orders">
                            <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
                                @forelse ($orders as $subOrder)
                                <div class="bg-white card mb-4 order-list shadow-sm">
                                    <div class="gold-members p-4">
                                        <div class="media">
                                            <div class="media-body">
                                                <a>
                                                    <span class="float-right text-info">{{__('home.orderedon')}}
                                                        {{ date('d-m-Y H:i:s', strtotime($subOrder->order->created_at)) }}
                                                        <i class="ti-check-box text-success"></i>
                                                        <br>
                                                        <span class="float-right">{{$subOrder->item_count}} {{__('home.items')}}
                                                            <i class="ti-shopping-cart-full text-dark"></i>
                                                        </span>
                                                    </span>
                                                </a>
                                                <h6 class="mb-2">
                                                    <a class="text-black"><i class="ti-receipt"></i> {{$subOrder->order->order_number}}</a>
                                                </h6>
                                                <p class="text-gray mb-1"><i class="ti-user"></i>
                                                    {{ $subOrder->order->shipping_fullname }}
                                                </p>
                                                <p class="text-gray mb-1">
                                                    <i class="ti-direction"></i> {!! $subOrder->order->shipping_address1 !!}<br>{!! $subOrder->order->shipping_address2 !!}<br>{{ $subOrder->order->shipping_postcode }} {{ $subOrder->order->shipping_city }}, {{ $subOrder->order->shipping_state }} {{ $subOrder->order->shipping_country }}.
                                                </p>
                                                <p class="text-gray mb-1">
                                                    <i class="ti-mobile"></i> {{ $subOrder->order->shipping_phone }}
                                                </p>
                                                <p class="text-gray">
                                                    <i class="ti-money"></i>
                                                    @if ($subOrder->order->payment_method == 'cod')
                                                        {{__('home.cod')}}
                                                    @elseif($subOrder->order->payment_method == 'card')
                                                        {{__('home.card')}}
                                                    @else
                                                        {{__('home.bank')}}
                                                    @endif
                                                </p>

                                                <p class="text-black text-bold pt-2">
                                                    <span class="text-black  font-weight-bold"> {{__('home.totalpaid')}} :</span> RM
                                                    {{ number_format($subOrder->total, 2) }}
                                                </p>

                                                <p class="mb-20 text-black text-bold pt-2">
                                                    <span class="text-black  font-weight-bold"> {{__('home.orderedstatus')}} : 
                                                        @if( $subOrder->status  == 'pending')
                                                        <span style="font-weight: 400">{{__('home.pending')}} <i class="ti-reload text-blue"></i></span>
                                                        @elseif ( $subOrder->status == 'processing' )
                                                        <span style="font-weight: 400">
                                                            {{__('home.processing')}} <i class="ti-reload text-dark"></i>
                                                        </span>
                                                        @elseif( $subOrder->status == 'completed' )
                                                        <span style="font-weight: 400">
                                                            {{__('home.completed')}} <i class="ti-check-box text-success"></i>
                                                        </span>
                                                        @else
                                                        <span style="font-weight: 400">{{__('home.cancelled')}} <i class="ti-close text-danger"></i></span>
                                                        @endif
                                                    </span>
                                                </p>

                                                <div class="float-left">
                                                    @if( $subOrder->status  != 'completed' && $subOrder->status  != 'cancelled')
                                                        <form action="{{route('seller.order.delivered', $subOrder)}}">
                                                            <button class="btn btn-primary" type="submit"><i class="ti-check"></i>&nbsp;{{__('home.markascompleted')}}</button>
                                                        </form>
                                                    @endif
                                                    <br>
                                                    @if( $subOrder->status  == 'pending')
                                                        <form action="{{route('seller.order.cancelled', $subOrder)}}">
                                                            <button class="btn btn-danger" type="submit"><i class="ti-close"></i>&nbsp;{{__('home.markascancelled')}}</button>
                                                        </form>
                                                        <br>
                                                    @endif
                                                </div>

                                                <div class="float-right">
                                                    <form action="{{route('seller.orders.show', $subOrder)}}">
                                                        <button class="btn btn-dark" type="submit"><i class="ti-search"></i>&nbsp;{{__('home.view')}}</button>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @empty
                                <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
                                    <div class="blog-details-info" style="text-align: center">
                                        <img src="{{ asset('assets/img/bg/no-result.png') }}" style="width:50%; height:50%" alt="empty list" class="ptb-50">
                                        <h4 class="pb-0">{{__('home.emptyorder2')}}</h4>
                                        <span>
                                            <p>{{__('home.emptyorderdesc2')}}</p>
                                        </span>
                                        <br>
                                        <form action="{{ url('/admin') }}">
                                            <div class="leave-btn">
                                                <button class="submit btn-hover" value="{{ url('/admin') }}" type="submit"><i class="fa fa-university"></i> {{__('home.backtosellercentre')}}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endforelse
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

