@extends('layouts.main')

@section('title', __('home.searchresult'))

@section('content')

<!-- Breadcumb Area -->
<div class="breadcrumb-area pt-50 breadcrumb-padding pb-50" style="background-image: url(assets/img/bg/breadcrumb.jpg)">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2>{{__('home.txtproducts')}}</h2>
            <ul>
                <li><a href="{{ route('web.home') }}">{{__('home.home')}}</a></li>
                <li><a href="{{ route('product.index') }}">{{__('home.txtproducts')}}</a></li>
                <li class="active">{{__('home.searchresult')}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcumb Area -->

<div class="shop-page-wrapper ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop-sidebar mr-50">
                    <div class="sidebar-widget mb-45">
                        <h3 class="sidebar-title">{{__('home.categories')}}</h3>
                        @if ( count($cats)>0 )
                            @foreach ( $cats as $c )
                            <label class="checkbox-container">
                                {{ ucfirst($c->name) }}
                                <span style="text-align: right">({{count($c->products)}})</span>
                                <input type="checkbox" checked="checked">
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
                                <div class="shop-found">
                                    <h1 class="cart-heading">"{{ request()->input('query') }}"</h1>
                                    <p>{{__('home.showing')}} <span>{{ $products->total() }}</span> {{__('home.txtproduct')}}</p>
                                </div>
                            </div>

                        </div>

                        {{-- Product Area Start --}}
                        <div class="shop-product-content tab-content">
                            <div class="tab-pane fade active show">
                                <div class="row">

                                    @include('product.product-single-grid')

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- pagination start here --}}
                @if ($products->hasPages())
                <div class="pagination-style mt-30 text-center">
                    <ul>
                        <!-- Previous Page Link-->
                        @if ($products->onFirstPage())
                            <li><a><i class="ti-angle-left"></i></a></li>
                        @else
                            <li><a href="{{ $products->previousPageUrl() }}"><i class="ti-angle-left"></i></a></li>
                        @endif

                        @php
                            $link = "";
                            $currentPageNo = $products->currentPage();
                            $lastPageNo = $products->lastPage();

                            $limit = 6;
                            $adjacents = 1;
                            $secondlastpage = $lastPageNo-1;

                            if($lastPageNo >= $limit) {
                                if($currentPageNo < 1 + ($adjacents *3))
                                {
                                    for ($item=1; $item <= 4; $item++)
                                    {
                                        if ($currentPageNo == $item)
                                            $link .= '<li class="active">'.$item.'</li>';
                                        else
                                            $link .= '<li><a href="'.$products->url($item).'">'.$item.'</a></li>';
                                    }
                                    $link .= '<li>...</li>';
                                    $link .= '<li><a href="'.$products->url($secondlastPage).'">'.$secondlastPage.'</a></li>';
                                    $link .= '<li><a href="'.$products->url($lastPageNo).'">'.$lastPageNo.'</a></li>';
                                }
                                else if ($lastPageNo - ($adjacents * 2) > $currentPageNo && $currentPageNo > ($adjacents * 2))
                                {
                                    $link .= '<li><a href="'.$products->url(1).'">1</a></li>';
                                    $link .= '<li>...</li>';
                                    for ($i = $currentPageNo - $adjacents; $i <= $currentPageNo + $adjacents; $i++)
                                    {
                                        if($currentPageNo == $i)
                                            $link .= '<li class="active">'.$i.'</li>';
                                        else
                                            $link .= '<li><a href="'.$products->url($i).'">'.$i.'</a></li>';
                                    }
                                    $link .= '<li>...</li>';
                                    $link .= '<li><a href="'.$products->url($lastPageNo).'">'.$lastPageNo.'</a></li>';
                                }
                                else
                                {
                                    $link .= '<li><a href="'.$products->url(1).'">1</a></li>';
                                    $link .= '<li><a href="'.$products->url(2).'">2</a></li>';
                                    $link .= '<li>...</li>';
                                    for ($i = $lastPageNo - (1 + ($adjacents * 3)); $i <= $lastPageNo; $i++)
                                    {
                                        if($currentPageNo == $i)
                                            $link .= '<li class="active"><a href="#">'.$i.'</a></li>';
                                        else
                                            $link .= '<li><a href="'.$products->url($i).'">'.$i.'</a></li>';
                                    }
                                }
                            } else {
                                for ($i=1; $i <= $lastPageNo; $i++)
                                {
                                    if ($currentPageNo === $i) {
                                        echo '<li class="active"><a href="#">'.$i.'</a></li>';
                                    } else {
                                        echo '<li><a href="'.$products->url($i).'">'.$i.'</a></li>';
                                    }
                                }
                            }

                            echo $link;

                        @endphp

                        <!-- Next Page Link-->
                        @if ($products->hasMorePages())
                            <li><a href="{{ $products->nextPageUrl() }}"><i class="ti-angle-right"></i></a></li>
                        @else
                            <li><a><i class="ti-angle-right"></i></a></li>
                        @endif
                    </ul>
                </div>
                @endif
                {{-- pagination end here --}}
            </div>
        </div>
    </div>
</div>

@endsection
