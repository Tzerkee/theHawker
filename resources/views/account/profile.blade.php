@extends('layouts.main')

@section('title', 'Profile')

@section('content')

<div class="container light-style flex-grow-1 container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
        {{__('home.accsetting')}}
    </h4>

    @php
        use App\Models\Order;
        use App\Models\Wishlist;
        use Illuminate\Support\Facades\Auth;

        $user_id = Auth::user()->id;
        $orders = Order::with('items')->where('user_id', $user_id)->orderBy('id', 'DESC')->get()->toArray();
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
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
                        href="#account-general">
                        <i class="ti-user"></i> {{__('home.general')}}
                    </a>
                    <a class="list-group-item list-group-item-action" data-toggle="list"
                        href="#account-orders">
                        <i class="ti-files"></i> {{__('home.myorder')}}
                    </a>
                    <a class="list-group-item list-group-item-action" data-toggle="list"
                        href="#account-wishlist">
                        <i class="ti-heart"></i> {{__('home.mywish')}}
                    </a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">
                        <i class="ti-shine"></i> {{__('home.aboutme')}}
                    </a>
                    <a class="list-group-item list-group-item-action" data-toggle="list"
                        href="#account-social-links">
                        <i class="ti-facebook"></i> {{__('home.social')}}
                    </a>
                    <a class="list-group-item list-group-item-action" data-toggle="list"
                        href="#account-change-password">
                        <i class="ti-key"></i> {{__('home.changepw')}}
                    </a>
                    <a class="list-group-item list-group-item-action" data-toggle="list"
                        href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        <i class="fa fa-sign-out"></i> {{__('home.logout')}}
                    </a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

            <div class="col-md-9">
                <div class="tab-content">
                    {{-- General --}}
                    <div class="tab-pane fade active show" id="account-general">
                        <form action="{{ url('profile-general-update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body media align-items-center">
                                @if(empty(Auth::user()->avatar))
                                <img name="avatar" src="{{ asset('assets/img/default.png') }}" class="d-block ui-w-80">
                                @else
                                <img name="avatar" src="{{ asset('storage/users/'.Auth::user()->avatar) }}" class="d-block ui-w-80">
                                @endif

                                <div class="media-body ml-4">
                                    <label class="btn btn-outline btn-default">
                                        {{__('home.uploadphoto')}}
                                        <input type="file" class="account-settings-fileinput" name="avatar"
                                            id="avatarFile" aria-describedby="fileHelp">
                                    </label> &nbsp;
                                    <div class="text-light small mt-1">{{__('home.avatar_instruc1')}}<br>{{__('home.avatar_instruc2')}}</div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">{{__('home.username')}}</label>
                                    <input type="text" class="form-control mb-1" placeholder="Display Name" name="username" id="username" value="{{ Auth::user()->username }}" autocomplete="username" autofocus>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{__('home.name')}}</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{ ucfirst(Auth::user()->name) }}" autocomplete="name" autofocus>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{__('home.email')}}</label>
                                    <input type="email" name="email" class="form-control mb-1" id="email" value="{{ Auth::user()->email }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{__('home.phone')}}</label>
                                    <input type="text" class="form-control" placeholder="0123456789" name="phone" id="phone" value="{{ Auth::user()->phone }}" autocomplete="phone" autofocus>
                                </div>
                                <div class="pb-20 btn-group">
                                    <button class="btn btn-w-m btn-danger btn-hover" type="submit" style="background-color: #272727;
                                    border-color: #272727;
                                    color: #FFFFFF">
                                        {{__('home.save')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- Orders --}}
                    <div class="tab-pane fade" id="account-orders">
                        @if (count($orders) == 0)
                        <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
                            <div class="blog-details-info" style="text-align: center">
                                <img src="{{ asset('assets/img/bg/no-result.png') }}" style="width:50%; height:50%" alt="empty list" class="ptb-50">
                                <h4>{{__('home.emptyorder')}}</h4>
                                <span><p>{{__('home.emptyorderdesc')}}</p></span>
                                <br>
                                <form action="{{ route('product.index') }}">
                                    <div class="leave-btn">
                                        <button class="submit btn-hover" value="{{ route('product.index') }}" type="submit"><i class="pe-7s-shopbag"></i> {{__('home.shopnow')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @else
                        <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
                            <h4 class="font-weight-bold mt-0 mb-4">{{__('home.orderlist')}}</h4>
                            @foreach ( $orders as $order )
                            <div class="bg-white card mb-4 order-list shadow-sm">
                                <div class="gold-members p-4">
                                    <div class="media">
                                        <div class="media-body">
                                            <a>
                                                <span class="float-right text-info">{{__('home.orderedon')}}
                                                    {{ date('d-m-Y H:i:s', strtotime($order['created_at'])) }}
                                                    <i class="ti-timer text-success"></i>
                                                    <br>
                                                    @if( $order['status']  == 'pending')
                                                    <span class="float-right">{{__('home.orderedstatus')}} >> {{__('home.pending')}}
                                                        <i class="ti-reload text-blue"></i>
                                                    </span>
                                                    @elseif ( $order['status'] == 'processing' )
                                                    <span class="float-right">{{__('home.orderedstatus')}} >> {{__('home.processing')}}
                                                        <i class="ti-reload text-dark"></i>
                                                    </span>
                                                    @elseif( $order['status'] == 'completed' )
                                                    <span class="float-right">{{__('home.orderedstatus')}} >> {{__('home.completed')}}
                                                        <i class="ti-check-box text-success"></i>
                                                    </span>
                                                    @else
                                                    <span class="float-right">{{__('home.orderedstatus')}} >> {{__('home.completed')}}
                                                        <i class="icofont-close-circled text-danger"></i>
                                                    </span>
                                                    @endif
                                                </span>
                                            </a>
                                            <h6 class="mb-2">
                                                <a class="text-black"><i class="ti-receipt"></i> {{ $order['order_number'] }}</a>
                                            </h6>
                                            <p class="text-gray mb-1">
                                                <i class="ti-user"></i>
                                                {{ $order['shipping_fullname'] }}
                                            </p>
                                            <p class="text-gray mb-1">
                                                <i class="ti-direction"></i>
                                                {{ $order['shipping_address1'] }} <br>{{ $order['shipping_address2'] }}<br>{{ $order['shipping_postcode'] }} {{ $order['shipping_city'] }}, {{ $order['shipping_state'] }} {{ $order['shipping_country'] }}.
                                            </p>
                                            <p class="text-gray mb-1">
                                                <i class="ti-mobile"></i> {{ $order['shipping_phone'] }}
                                            </p>
                                            <p class="text-gray">
                                                <i class="ti-money"></i>
                                                @if ($order['payment_method'] == 'cod')
                                                    {{__('home.cod')}}
                                                @elseif($order['payment_method'] == 'card')
                                                    {{__('home.card')}}
                                                @else
                                                    {{__('home.bank')}}
                                                @endif
                                            </p>
                                            <div class="float-right">
                                                <a class="btn btn-dark" href="{{ url('user/order/'.$order['id']) }}">
                                                    <i class="ti-search"></i> {{__('home.view')}}
                                                </a>
                                            </div>
                                            <p class="mb-0 text-black text-bold pt-2">
                                                <span
                                                    class="text-black font-weight-bold"> {{__('home.totalpaid')}} :
                                                </span> RM {{ number_format($order['total'], 2) }}
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>

                    <!-- Wishlist-->
                    <div class="tab-pane fade" id="account-wishlist">
                        @if ($wishlists->isEmpty())
                        <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
                            <div class="blog-details-info" style="text-align: center">
                                <a href="">
                                    <img src="{{ asset('assets/img/bg/heart.png') }}" style="width:20%; height:20%" alt="empty list" class="ptb-50">
                                </a>
                                <h4>{{__('home.emptywishlist')}}</h4>
                                <span><p>{{__('home.emptywishlistdesc')}}</p></span>
                                <br>
                                <form action="{{ route('product.index') }}">
                                    <div class="leave-btn">
                                        <button class="submit btn-hover" value="{{ route('product.index') }}" type="submit"><i class="pe-7s-shopbag"></i> {{__('home.shopnow')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @else
                            <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
                                <div class="container mb-4">
                                    <h4 class="font-weight-bold mt-0 mb-4">{{__('home.wishlist')}}</h4>
                                    <div class="row">
                                        @foreach ( $wishlists as  $item )
                                            @if (isset($item->products))
                                            <div class="col-lg-8 pb-5 wishlist-content">
                                                <input type="hidden" class="wishlist_id" value="{{$item->id}}">
                                                <div class="cart-item d-md-flex justify-content-between">
                                                    <span class="remove-item remove_from_wishlist">
                                                        <i class="fa fa-times"></i>
                                                    </span>
                                                    <div class="px-3 my-3">
                                                        <a class="cart-item-product" href="{{ url('/product-detail', $item->products->slug) }}">
                                                            <div class="cart-item-product-thumb"><img src="{{ productImage($item->products->image) }}" alt="Product"></div>
                                                            <div class="cart-item-product-info">
                                                                <h4 class="cart-item-product-title">{{ ucwords($item->products->name) }}</h4>
                                                                <div class="text-lg text-body font-weight-medium pb-1">RM {{number_format($item->products->price,2)}}</div>
                                                                <span>{{__('home.availability')}}: <span class="text-success font-weight-medium">{{$item->products->stock}}</span></span>
                                                            </div>
                                                            <div class="pull-right">
                                                                <form action="{{route('cart.add', $item->products->id)}}">
                                                                    <button class="btn btn-danger btn-circle btn-outline" type="submit" title="{{__('home.addtocart')}}">
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Info --}}
                    <div class="tab-pane fade" id="account-info">
                        <form action="{{ url('profile-info-update') }}" method="POST">
                            @csrf
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">{{__('home.bio')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('home.bioplaceholder')}}" id="bio" name="bio" value="{{ Auth::user()->birthday }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{__('home.bday')}}</label>
                                    <input type="date" class="form-control" id="birthday" value="{{ Auth::user()->birthday }}" name="birthday">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{__('home.address')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('home.addressplaceholder')}}" id="address" value="{{ Auth::user()->address }}" name="address">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{__('home.country')}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('home.countryplaceholder')}}" id="country" value="{{ Auth::user()->country }}" name="country">
                                </div>
                                <div class="pb-20 btn-group">
                                    <button class="btn btn-w-m btn-danger btn-hover" type="submit" style="background-color: #272727;
                                    border-color: #272727;
                                    color: #FFFFFF">
                                        {{__('home.save')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- Social link --}}
                    <div class="tab-pane fade" id="account-social-links">
                        <form action="{{ url('profile-social-update') }}" method="POST">
                            @csrf
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">{{__('home.facebook')}}</label>
                                    <input type="text" class="form-control" placeholder="https://www.facebook.com/user" id="facebook" value="{{ Auth::user()->facebook }}" name="facebook">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{__('home.instagram')}}</label>
                                    <input type="text" class="form-control" placeholder="https://www.instagram.com/user" id="instagram" value="{{ Auth::user()->instagram }}" name="instagram">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{__('home.twitter')}}</label>
                                    <input type="text" class="form-control" placeholder="https://www.twitter.com/user" id="twitter" value="{{ Auth::user()->twitter }}" name="twitter">
                                </div>
                                <div class="pb-20 btn-group">
                                    <button class="btn btn-w-m btn-danger btn-hover" type="submit" style="background-color: #272727;
                                    border-color: #272727;
                                    color: #FFFFFF">
                                        {{__('home.save')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- Password --}}
                    <div class="tab-pane fade" id="account-change-password">
                        <form method="POST" action="{{ route('reset.password') }}">
                            @csrf
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">{{__('home.currentpw')}}</label>
                                    <input type="password" class="form-control" placeholder="{{__('home.currentpw')}}"
                                        name="current_password" id="current_password">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">{{__('home.newpw')}}</label>
                                    <input type="password" class="form-control" placeholder="{{__('home.newpw')}}" id="password"
                                        name="new_password">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">{{__('home.confirmpw')}}</label>
                                    <input type="password" class="form-control" placeholder="{{__('home.confirmpw')}}" id="password_confirmation" name="confirm_password">
                                </div>

                                <div class="button-box">
                                    <div class="login-toggle-btn">
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">{{__('home.forgotpw')}}</a>
                                        @endif
                                    </div>
                                </div>

                                <div class="pb-20">
                                    <button class="btn btn-w-m btn-danger btn-hover" type="submit" style="background-color: #272727;
                                    border-color: #272727;
                                    color: #FFFFFF">
                                        {{__('home.updatepw')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script>
    $(document).on('click', '.remove_from_wishlist', function (e) {
        e.preventDefault();

        var Clickedthis = $(this);
        var wishlist_id = $(Clickedthis).closest('.wishlist-content').find('.wishlist_id').val();
        // alert(wishlist_id);

        var token="{{csrf_token()}}";
        var path="{{route('delete.wishlist')}}";

        $.ajax({
            url:path,
            type:"POST",
            dataType:"JSON",
            data: {
                wishlist_id:wishlist_id,
                _token:token,
            },
            success:function(data) {
                console.log(data);

                $(Clickedthis).closest('.wishlist-content').remove();

                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: data['icon'],
                title: data['status']
                })

            }
        });


    });
</script>
@endsection
