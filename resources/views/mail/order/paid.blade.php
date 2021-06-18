@component('mail::message')
# Invoice

## Order Details
@component('mail::panel')
Order No: <strong>{{ $order->order_number }}</strong><br>
Total Amount Paid: <strong>RM {{ number_format($order->total, 2) }}</strong><BR>
Payment Method:
@if ($order->payment_method == 'cod')
<strong>Cash On Delivery</strong>
@elseif($order->payment_method == 'card')
<strong>Debit/Credit Card</strong>
@else
<strong>Direct Bank Transfer</strong>
@endif
@endcomponent

## Product Details
<table class="table" style="width: 100%">
    <thead>
        <tr>
            <th>Product name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->items as $product)
        <tr>
            <td scope="row">{{ $product->name }}</td>
            <td style="text-align: center;">{{ $product->pivot->quantity }}</td>
            <td style="text-align: center;">{{ number_format($product->pivot->price, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<br>
Total : <strong>RM {{ number_format($order->total, 2)}}</strong>

@component('mail::button', ['url' => '/product'])
Continue Shopping
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent
