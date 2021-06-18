<div class="cart-main-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="btn-group pull-right">
                    <form action="{{ route('product.index') }}">
                        <button type="submit" class="btn btn-white btn-bitbucket" value="{{ route('product.index') }}"><i class="ti-bag"></i> {{__('home.continueshopping')}}</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="cart-heading">{{__('home.yourcart')}}</h1>
                @if( Cart::session(auth()->id())->isEmpty() )
                <div class="blog-details-info" style="text-align: center">
                    <img src="{{ asset('assets/img/bg/empty-cart.png') }}" alt="cart empty">
                    <h2>{{__('home.emptycart')}}</h2>
                    <p>{{__('home.emptycartdesc')}}</p>
                    <br>
                    <form action="{{ route('product.index') }}">
                        <div class="leave-btn">
                            <button class="submit btn-hover" value="{{ route('product.index') }}" type="submit"><i class="pe-7s-shopbag"></i> {{__('home.shopnowcart')}}</button>
                        </div>
                    </form>
                </div>
                @else
                <div class="table-content table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>{{__('home.remove')}}</th>
                                <th>{{__('home.product')}}</th>
                                <th>{{__('home.unitprice')}}</th>
                                <th>{{__('home.quantity')}}</th>
                                <th>{{__('home.totalprice')}}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($cartItems as $item)
                            <tr>
                                <td class="product-remove">
                                    <a href="{{ route('cart.destroy', $item['id']) }}"><i class="pe-7s-close"></i></a>
                                </td>
                                <td class="product-name">{{ $item['name'] }}</td>
                                <td class="product-price-cart">

                                    <span class="amount">{{ number_format($item['price'], 2) }}</span>
                                </td>
                                <td class="product-quantity" data-product-quantity="{{ $item['quantity'] }}">
                                    <livewire:update-cart :item="$item" :key="$item['id']" />
                                </td>
                                <td class="product-price-cart"><span
                                    class="amount">RM {{ number_format(Cart::session(auth()->id())->get($item['id'])->getPriceSum(), 2) }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>     
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="coupon-all">
                            <div class="coupon">
                                <form action="{{ route('apply.coupon') }}" method="GET">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="{{__('home.couponcode')}}" type="text">
                                    <input class="button" name="apply_coupon" value="{{__('home.applycoupon')}}" type="submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 ml-auto">
                        <div class="cart-page-total">
                            <h2>{{__('home.cartsummary')}}</h2>
                            <ul>
                                <li>{{__('home.subtotal')}}<span>RM
                                    {{ number_format(\Cart::session(auth()->id())->getSubTotal(), 2) }}</span></li>
                                <li>{{__('home.total')}}<span>RM {{ number_format(\Cart::session(auth()->id())->getTotal(), 2) }}</span></li>
                            </ul>
                            <a href="{{ route('cart.checkout') }}">{{__('home.placeorder')}}</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
