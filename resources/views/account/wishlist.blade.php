@extends('layouts.main')

@section('title', 'Wishlist')

@section('content')

<!-- Breadcumb Area -->
<div class="breadcrumb-area pt-50 breadcrumb-padding pb-50" style="background-image: url(assets/img/bg/breadcrumb.jpg)">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2>wishlist</h2>
            <ul>
                <li><a href="{{ route('web.home') }}">home</a></li>
                <li class="active">wishlist</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcumb Area -->

<div class="shop-page-wrapper ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="profile-meta" style="padding-bottom: 50px">
                    <ul>
                        <li><a class="{{ \Request::is('profile') ? 'active' : '' }}" href="{{ route('account.profile') }}">Profile </a></li>
                        <li><a class="{{ \Request::is('user/order') ? 'active' : '' }}" href="{{url('/user/order')}}">Orders </a></li>
                        <li><a class="{{ \Request::is('user/wishlist') ? 'active' : '' }}" href="{{url('/user/wishlist')}}">Wishlist </a></li>
                        <li><a class="{{ \Request::is('account/reset') ? 'active' : '' }}" href="{{url('/account/reset')}}">Change Password </a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Logout </a>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @if ($wishlists->isEmpty())

            <div class="blog-details-info" style="text-align: center">
                <img src="{{ asset('assets/img/bg/empty-wishlist.png') }}" style="width:20%; height:20%" alt="empty list" class="ptb-50">
                <h2>Your wishlist is empty</h2>
                <p>Looks like you have no wishlist item yet.</p>
                <br>
                <form action="{{ route('product.index') }}">
                    <div class="leave-btn">
                        <button class="submit btn-hover" value="{{ route('product.index') }}" type="submit"><i class="pe-7s-shopbag"></i> Shop Now</button>
                    </div>
                </form>
            </div>

        @else

        <div class="row">
            <div class="col-md-12">
                <div class="wishlist-header">
                    <div class="row">
                        <div class="col-md-2 my-auto">
                            <h6 class="mb-0 font-weight-bol" style="text-align: center">Image</h6>
                        </div>
                        <div class="col-md-3 my-auto">
                            <h6 class="mb-0 font-weight-bol" style="text-align: center">Product Name</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6 class="mb-0 font-weight-bol" style="text-align: center">Price</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6 class="mb-0 font-weight-bol">Add Cart</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6 class="mb-0 font-weight-bol">Remove</h6>
                        </div>
                    </div>
                </div>

                @foreach ( $wishlists as  $item )
                    @if (isset($item->products))
                    <div class="wishlist-content mt-3">
                        <input type="hidden" class="wishlist_id" value="{{$item->id}}">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2 my-auto" style="text-align: center">
                                        <a href="{{ url('/product-detail', $item->products->slug) }}"><img src="{{ productImage($item->products->image) }}" style="width: 80px; height:80px" alt="{{ $item->products->name }}"></a>
                                    </div>
                                    <div class="col-md-3 my-auto" style="text-align: center">
                                        <a href="{{ url('/product-detail', $item->products->slug) }}"><h6>{{ ucwords($item->products->name) }}</h6></a>
                                    </div>
                                    <div class="col-md-2 my-auto" style="text-align: center">
                                        <h6>RM {{number_format($item->products->price,2)}}</h6>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <form action="{{route('cart.add', $item->products->id)}}">
                                            <button type="submit" class="btn btn-dark btn-sm ">{{__('home.addtocart')}}</button>
                                        </form>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <button type="button" class="btn btn-danger btn-sm remove_from_wishlist">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

        </div>
        @endif
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
