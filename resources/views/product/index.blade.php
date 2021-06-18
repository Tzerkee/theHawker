@extends('layouts.main')

@section('title', __('home.products'))

@section('content')

<!-- Breadcumb Area -->
<div class="breadcrumb-area pt-50 breadcrumb-padding pb-50" style="background-image: url(assets/img/bg/breadcrumb.jpg)">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2>{{__('home.txtproducts')}}</h2>
            <ul>
                <li><a href="{{ route('web.home') }}">{{__('home.home')}}</a></li>
                <li class="active">{{__('home.txtproducts')}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcumb Area -->

<div class="shop-page-wrapper ptb-100">
    <div class="container">
        <form action="{{ route('product.filter') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop-sidebar mr-50">

                        <div class="sidebar-widget mb-45">
                            <h3 class="sidebar-title">{{__('home.categories')}}</h3>

                            @if ( count($categories)>0 )

                                @if (!empty($_GET['category']))

                                    @php
                                        $filter_cats = explode(',', $_GET['category']);
                                    @endphp

                                @endif

                                @foreach ( $categories as $c )
                                    {{-- Single Checkbox --}}
                                    <label class="checkbox-container" for="{{ $c->slug }}">{{ ucfirst($c->name) }}
                                        <span style="float: right;">{{ count($c->products) }}</span>
                                        <input type="checkbox" @if(!empty($filter_cats) && in_array($c->slug, $filter_cats)) checked @endif id="{{ $c->slug }}" name="category[]" onchange="this.form.submit();" value="{{ $c->slug }}">
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop-product-wrapper">
                        <div class="shop-bar-area">
                            <div class="shop-bar pb-60">

                                <div class="shop-found-selector">
                                    {{-- No. of products found --}}
                                    <div class="shop-found">
                                        @if(count($products) === 0)
                                            <p><span>0</span> {{__('home.txtproduct')}} </p>
                                        @elseif(count($products) === 1)
                                            <p>
                                                <span>{{ $products->firstItem() }}</span> {{__('home.of')}} <span>{{ $products->total() }}</span>
                                                @if($products->total() === 1)
                                                {{__('home.txtproduct')}}
                                                @else
                                                {{__('home.txtproducts')}}
                                                @endif
                                            </p>
                                        @else
                                        <p>{{__('home.showing')}} <span>{{ $products->firstItem() }}</span> - <span>{{ $products->lastItem() }} </span> {{__('home.of')}} <span>{{ $products->total() }} </span>{{__('home.txtproducts')}}</p>
                                        @endif
                                    </div>
                                    {{-- Sorting --}}
                                    <div class="shop-selector">
                                        <label>{{__('home.sortby')}} : </label>
                                        <select id="sortBy" name="sortBy" onchange="this.form.submit()">
                                            <option value="">{{__('home.default')}}</option>
                                            <option value="newest" @if(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'newest') selected @endif>{{__('home.newest')}}</option>
                                            <option value="priceAsc" @if(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'priceAsc') selected @endif>{{__('home.priceasc')}}</option>
                                            <option value="priceDesc" @if(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'priceDesc') selected @endif>{{__('home.pricedesc')}}</option>
                                            <option value="nameAsc" @if(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'nameAsc') selected @endif>{{__('home.az')}}</option>
                                            <option value="nameDesc" @if(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'nameDesc') selected @endif>{{__('home.za')}}</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Grid / List View --}}
                                <div class="shop-filter-tab">
                                    <div class="shop-tab nav" role=tablist>
                                        <a class="active" href="#grid-sidebar7" title="Grid View" data-toggle="tab" role="tab" aria-selected="false">
                                            <i class="ti-layout-grid4-alt"></i>
                                        </a>
                                        <a href="#grid-sidebar8" title="List View" data-toggle="tab" role="tab" aria-selected="true">
                                            <i class="ti-menu"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            {{-- Product Area Start --}}
                            <div class="shop-product-content tab-content">
                                <div id="grid-sidebar7" class="tab-pane fade active show">
                                    <div class="row">

                                        @include('product.product-single-grid')

                                    </div>
                                </div>
                                <div id="grid-sidebar8" class="tab-pane fade">
                                    <div class="row">
                                        @include('product.product-single-list')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- pagination start here --}}
                    {{ $products->appends($_GET)->links('vendor.pagination.custom') }}
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
    <script>
        $(document).on('click', '.add_to_wishlist', function (e) {
            e.preventDefault();

            var product_id=$(this).data('product-id');
            // alert(product_id);

            var token="{{csrf_token()}}";
            var path="{{route('store.wishlist')}}";

            $.ajax({
            url:path,
            type:"POST",
            dataType:"JSON",
            data:{
                product_id:product_id,
                _token:token,
            },
            success:function(data){
                console.log(data);

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
                icon: 'success',
                title: data['status']
                })

            }
        });

        });
</script>
@endsection
