@extends('layouts.main')

@section('title', __('home.checkout'))

@section('styles')

<script src="https://js.stripe.com/v3/"></script>

<style>
    label {
  margin-bottom: 10px;
  display: block;
}

select {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
  background-color: #fff;
}
</style>

@endsection

@section('content')

<div class="checkout-area ptb-100">
    <div class="container">
        <h1 class="cart-heading">{{__('home.checkout')}}</h1>
        <div class="ch-row">
            <div class="ch-col-75">
                <div class="ch-container">
                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf

                        <div class="ch-row">
                            <div class="ch-col-50">
                                <h4 class="pt-20"><strong>{{__('home.shippingaddress')}}</strong> <span style="color: red">*</span></h4>
                                <label class="pt-20" for="shipping_fullname"><i class="ti-user"></i> {{__('home.fullname')}}</label>
                                    <input type="text" name="shipping_fullname" placeholder="John Doe" />
                                    @error('shipping_fullname') <span class="text-danger">{{ $message }}</span> @enderror
                                <label for="shipping_address1"><i class="ti-direction"></i> {{__('home.address1')}}</label>
                                    <input type="text" name="shipping_address1" placeholder="Street Address" />
                                    @error('shipping_address1') <span class="text-danger">{{ $message }}</span> @enderror
                                <label for="shipping_address2"><i class="ti-direction"></i> {{__('home.address2')}}</label>
                                    <input type="text" name="shipping_address2" placeholder="Apartment, suite, unit etc. (optional)" />
                                    @error('shipping_address2') <span class="text-danger">{{ $message }}</span> @enderror
                                    
                                <div class="ch-row">
                                    <div class="ch-col-50">
                                        <label for="shipping_state"><i class="ti-location-arrow"></i> {{__('home.postcode')}}</label>
                                        <input type="number" name="shipping_postcode" placeholder="{{__('home.postcode')}}" />
                                        @error('shipping_postcode') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="ch-col-50">
                                        <label for="shipping_city"><i class="ti-location-arrow"></i> {{__('home.city')}}</label>
                                        <input type="text" name="shipping_city" placeholder="{{__('home.city')}}" />
                                        @error('shipping_city') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="ch-row">
                                    <div class="ch-col-50">
                                        <label for="shipping_state"><i class="ti-flag-alt-2"></i> {{__('home.state')}}</label>
                                        <select name="shipping_state">
                                            <option value="Sarawak">Sarawak</option>
                                            <option value="Johor">Johor</option>
                                            <option value="Kedah">Kedah</option>
                                            <option value="Kelantan">Kelantan</option>
                                            <option value="Malacca">Malacca</option>
                                            <option value="Negeri Sembilan">Negeri Sembilan</option>
                                            <option value="Pahang">Pahang</option>
                                            <option value="Penang">Penang</option>
                                            <option value="Perak">Perak</option>
                                            <option value="Perlis">Perlis</option>
                                            <option value="Sabah">Sabah</option>
                                            <option value="Selangor">Selangor</option>
                                            <option value="Terengganu">Terengganu</option>
                                        </select>
                                        @error('shipping_state') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="ch-col-50">
                                        <label for="shipping_country"><i class="ti-flag-alt-2"></i> {{__('home.country')}}</label>
                                        <select name="shipping_country">
                                            <option value="Malaysia">Malaysia</option>
                                        </select>
                                        @error('shipping_country') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <label class="pt-10" for="shipping_phone"><i class="ti-mobile"></i> {{__('home.phone')}}</label>
                                    <input type="number" name="shipping_phone" placeholder="e.g. 0123456789" />
                                    @error('shipping_phone') <span class="text-danger">{{ $message }}</span> @enderror
                                <label class="pt-10" for="remarks"><i class="ti-pencil"></i> {{__('home.ordernotes')}}</label>
                                    <textarea name="remarks" id="checkout-mess" cols="30" rows="10" placeholder="{{__('home.ordernotesplaceholder')}}"></textarea>
                            </div>

                            <div class="ch-col-50">
                                <h4 class="pt-20"><strong>{{__('home.paymentmethod')}}</strong> <span style="color: red">*</span> </h4>
                                <label for="fname">{{__('home.paymentmethoddesc')}}</label>
                                <div class="pt-20">
                                    <label class="radio-container">
                                        {{__('home.bank')}}
                                        <span data-toggle="tooltip" data-placement="right"
                                            title="{{__('home.banktooltip')}}">
                                            <i class="pe-7s-info"></i>
                                        </span>
                                        <input id="offline-bank-info" type="radio" value="bank_transfer" name="payment_method">
                                        <span class="radio-checkmark"></span>
                                    </label>
                                </div>
                                <div class="pt-10">
                                    <label class="radio-container">
                                        {{__('home.cod')}}
                                        <span data-toggle="tooltip" data-placement="right"
                                            title="{{__('home.codtooltip')}}">
                                            <i class="pe-7s-info"></i>
                                        </span>
                                        <input type="radio" value="cod" name="payment_method">
                                        <span class="radio-checkmark"></span>
                                    </label>
                                </div>
                                <div class="pt-10">
                                    <label class="radio-container">{{__('home.card')}}
                                        <input id="card-info" type="radio" value="card" name="payment_method">
                                        <span class="radio-checkmark"></span>
                                    </label>
                                </div>
                                @error('payment_method') <span class="text-danger">{{ $message }}</span> @enderror
                                <div id="card-info-info">
                                    <h5 class="pt-20"><strong>{{__('home.carddetail')}}</strong></h5>
                                    <div class="ch-icon-container">
                                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                    </div>

                                    <label for="card_no">{{__('home.cardno')}}</label>
                                    <input type="number" class="form-control" placeholder="4242424242424242" id="card_no" name="card_no" value="{{ old('card_no') }}">
                                        @error('card_no') <span class="text-danger">{{ $message }}</span> @enderror
                                    <div class="ch-row">
                                        <div class="ch-col-50">
                                            <label for="exp_month">{{__('home.expmonth')}}</label>
                                            <input type="text" class="form-control" placeholder="MM" id="exp_month" name="exp_month" value="{{ old('exp_month') }}">
                                        @error('exp_month') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="ch-col-50">
                                            <label for="exp_year">{{__('home.expyear')}}</label>
                                            <input type="text" class="form-control" placeholder="YY" id="exp_year" name="exp_year" value="{{ old('exp_year') }}">
                                            @error('exp_year') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <label for="cvc">CVV</label>
                                    <input type="number" class="form-control" placeholder="Three-digit code" id="cvc" name="cvc" value="{{ old('cvc') }}" autofocus>
                                        @error('cvc') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div id="offline-bank-info-info">
                                    <p><span style="color: red">{{__('home.banktooltip')}}</span></p>
                                    <p style="text-transform: uppercase"><strong>Public Bank - theHawker Marketplace</strong>: 321 654 9870</p>
                                </div>
                            </div>

                        </div>
                        <div class="ship-different-title pt-20">
                            <h3>
                                <input id="ship-box" type="checkbox" />
                                <label style="font-size: 15px">{{__('home.billtodiff')}}</label>

                            </h3>
                        </div>
                        <div class="ch-row" id="ship-box-info">
                            <div class="ch-col-50">
                                <h4 class="pt-20"><strong>{{__('home.billingaddress')}}</strong></h4>
                                <label for="billing_fullname"><i class="ti-user"></i> {{__('home.fullname')}}</label>
                                    <input type="text" name="billing_fullname" placeholder="John Doe" />
                                    @error('billing_fullname') <span class="text-danger">{{ $message }}</span> @enderror
                                <label for="billing_address1"><i class="ti-direction"></i> {{__('home.address1')}}</label>
                                    <input type="text" name="billing_address1" placeholder="Street Address" />
                                    @error('billing_address1') <span class="text-danger">{{ $message }}</span> @enderror
                                <label for="billing_address2"><i class="ti-direction"></i> {{__('home.address2')}}</label>
                                    <input type="text" name="billing_address2" placeholder="Apartment, suite, unit etc. (optional)" />
                                    @error('billing_address2') <span class="text-danger">{{ $message }}</span> @enderror
                                    
                                <div class="ch-row">
                                    <div class="ch-col-50">
                                        <label for="billing_state"><i class="ti-flag-alt-2"></i> {{__('home.postcode')}}</label>
                                        <input type="number" name="billing_postcode" placeholder="Postcode" />
                                        @error('billing_postcode') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="ch-col-50">
                                        <label for="billing_city"><i class="ti-location-arrow"></i> {{__('home.city')}}</label>
                                        <input type="text" name="billing_city" placeholder="City" />
                                        @error('billing_city') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="ch-row">
                                    <div class="ch-col-50">
                                        <label for="billing_state"><i class="ti-location-arrow"></i> {{__('home.state')}}</label>
                                        <select name="billing_state">
                                            <option value="Sarawak">Sarawak</option>
                                            <option value="Johor">Johor</option>
                                            <option value="Kedah">Kedah</option>
                                            <option value="Kelantan">Kelantan</option>
                                            <option value="Malacca">Malacca</option>
                                            <option value="Negeri Sembilan">Negeri Sembilan</option>
                                            <option value="Pahang">Pahang</option>
                                            <option value="Penang">Penang</option>
                                            <option value="Perak">Perak</option>
                                            <option value="Perlis">Perlis</option>
                                            <option value="Sabah">Sabah</option>
                                            <option value="Selangor">Selangor</option>
                                            <option value="Terengganu">Terengganu</option>
                                        </select>
                                        @error('billing_state') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="ch-col-50">
                                        <label for="billing_country"><i class="ti-flag-alt-2"></i> {{__('home.country')}}</label>
                                        <select name="billing_country">
                                            <option value="Malaysia">Malaysia</option>
                                        </select>
                                        @error('billing_country') <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <label class="pt-10" for="billing_phone"><i class="ti-mobile"></i> {{__('home.phone')}}</label>
                                    <input type="number" name="billing_phone" placeholder="e.g. 0123456789" />
                                    @error('billing_phone') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <input type="submit" value="{{__('home.continuecheckout')}}" class="ch-btn btn-hover-black">
                    </form>
                </div>
            </div>

            <div class="ch-col-25">
                <div class="ch-container">
                    <h4 class="pt-20"><strong>{{__('home.ordersummary')}}</strong>
                        <span class="ch-price" style="color:black">
                            <i class="ti-shopping-cart"></i>
                            <b>{{ count($cartItems) }}</b>
                        </span>
                    </h4>
                    @foreach ($cartItems as $item)
                    <p class="pt-20"><a>{{ $item['name'] }} <i class="ti-close"></i> <strong> {{ $item['quantity'] }}</strong></a> <span class="ch-price">RM
                            {{ number_format(Cart::session(auth()->id())->get($item['id'])->getPriceSum(), 2) }}</span>
                    </p>
                    @endforeach
                    <hr>
                    <p class="pt-20">{{__('home.cartsubtotal')}} <span class="ch-price" style="color:black"><b>RM
                                {{ number_format(\Cart::session(auth()->id())->getSubTotal(), 2) }}</b></span></p>
                    <p>{{__('home.ordertotal')}} <span class="ch-price" style="color:black"><b>RM
                                {{ number_format(\Cart::session(auth()->id())->getTotal(), 2) }}</b></span></p>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
