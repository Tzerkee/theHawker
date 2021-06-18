<h4>{{__('home.orders')}}</h4>

    <table class="table">
        <thead>
            <tr>
                <th>{{__('home.orderno')}}</th>
                <th>{{__('home.status')}}</th>
                <th>{{__('home.itemcount')}}</th>
                <th>{{__('home.shippingaddress')}}</th>
                <th>{{__('home.shippingcity')}}</th>
                <th>{{__('home.shippingstate')}}</th>
                <th>{{__('home.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $subOrder)
                <tr>
                    <td scope="row">
                        {{$subOrder->order->order_number}}
                    </td>
                    <td>
                        {{$subOrder->status}}

                        @if($subOrder->status != 'completed')
                            <a href=" {{route('seller.order.delivered', $subOrder)}} " class="btn btn-primary btn-sm">{{__('home.markascompleted')}}</button>
                        @endif
                    </td>

                    <td>
                        {{$subOrder->item_count}}
                    </td>

                    <td>
                       {!! $subOrder->order->shipping_address1 !!}
                    </td>

                    <td>
                        {!! $subOrder->order->shipping_city !!}
                    </td>

                    <td>
                        {!! $subOrder->order->shipping_state !!}
                    </td>

                    <td>
                        <a name="" id="" class="btn btn-primary btn-sm" href="{{route('seller.orders.show', $subOrder)}}" role="button">View</a>
                    </td>
                </tr>
            @empty

            @endforelse

        </tbody>
    </table>
