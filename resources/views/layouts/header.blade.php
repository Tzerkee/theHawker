<div class="header-top-furniture wrapper-padding-2 res-header-sm">
    <div class="container-fluid"> 
        <div class="header-bottom-wrapper">
            <div class="logo-2 ptb-20">
                <a href="{{ route('web.home') }}">
                    <img src="{{ asset('assets/img/logo.png') }}" style="height: 64px; width: 100px;" alt="theHawker">
                </a>
            </div>
            <div class="menu-style-2 handicraft-menu menu-hover">
                <nav>
                    <ul>
                        <li>
                            <div class="discount-btn btn-hover">
                                <a href="{{ route('shops.create') }}">
                                    <span>{{__('home.addshop')}}</span>
                                </a>
                            </div>
                        </li>
                        <li><a href="{{ route('web.home') }}">{{__('home.home')}}</a></li>
                        <li>
                            <a href="{{ route('category.index') }}">{{__('home.categories')}}</a>
                            <ul class="single-dropdown">
                                @foreach ( App\Models\Category::with('children')->where('is_parent', 1)->orderBy('name', 'ASC')->get() as $cat )
                                    @if($cat->children->count()>0)
                                    <li>
                                        <a href="{{ route('product.category', $cat->slug) }}"><h6><strong>{{$cat->name}}</strong></h6></a>
                                        @foreach ( $cat->children as $sub)
                                        <ul>
                                            <li style="margin-left: 20px">
                                                <a href="{{ route('product.category', $sub->slug) }}">{{$sub->name}}</a>
                                            </li>
                                        </ul>

                                        @endforeach
                                    </li>
                                    @else
                                    <li>
                                        <a href="{{ route('product.category', $cat->slug) }}"><h6><strong>{{$cat->name}}</strong></h6></a>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route('product.index') }}">{{__('home.products')}}</a></li>
                        <li><a href="{{ route('events.index') }}">{{__('home.events')}}</a></li>
                        <li><a href="#">{{__('home.language')}}</a>
                            <ul class="single-dropdown">
                                <li><a href="lang/en">{{__('home.en')}}</a></li>
                                <li><a href="lang/my">{{__('home.my')}}</a></li>
                                <li><a href="lang/ch">{{__('home.ch')}}</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header-cart">
                <a class="icon-cart-furniture" href="{{route('cart.index')}}">
                    <i class="ti-shopping-cart"></i>
                    <span class="shop-count-furniture green">
                        @auth
                        {{ Cart::session(auth()->id())->getContent()->count() }}
                        @else
                        0
                        @endauth
                    </span>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            <li><a href="{{ route('shops.create') }}" style="color: #e44650"><i class="ti-plus"></i> {{__('home.addshop')}}</a></li>
                            <li><a href="{{ route('web.home') }}">{{__('home.home')}}</a></li>
                            <li><a href="{{ route('category.index') }}">{{__('home.categories')}}</a></li>
                            <li><a href="{{ route('product.index') }}">{{__('home.products')}}</a></li>
                            <li><a href="{{ route('events.index') }}">{{__('home.events')}}</a></li>
                            <li><a href="{{ route('contact') }}">{{__('home.contactus')}}</a></li>
                            <li><a href="#">{{__('home.language')}}</a>
                                <ul>
                                    <li><a href="lang/en">{{__('home.en')}}</a></li>
                                    <li><a href="lang/my">{{__('home.my')}}</a></li>
                                    <li><a href="lang/ch">{{__('home.ch')}}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        {{-- display success message --}}
        @if(session()->has('message'))
        <div class="alert alert-dismissable alert-success text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{!! session('message') !!}</strong>
        </div>
        @endif

        {{-- display error message --}}
        @if(session()->has('error'))
        <div class="alert alert-dismissable alert-danger text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{!! session('error') !!}</strong>
        </div>
        @endif
    </div>
</div>
<div class="header-bottom-furniture wrapper-padding-2 border-top-3">
    <div class="container-fluid">
        <div class="furniture-bottom-wrapper">
            <div class="furniture-search"> 
                <form action="{{ route('search') }}" method="GET">
                    <input name="query"  placeholder="{{__('home.search')}}" type="text">
                    <button>
                        <i class="ti-search"></i>
                    </button>
                </form>
            </div>
            <div class="furniture-login">
                <ul>
                    @guest

                        @if (Route::has('login'))
                            <li>
                                Get Access:  <a href="{{ route('login') }}">{{__('home.login')}}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}">{{{__('home.reg')}}}</a>
                            </li>
                        @endif

                    @else

                    <li>
                        <div class="dropdown">
                            <button class="dropbtn">
                                {{-- avatar --}}
                                @if(empty(Auth::user()->avatar))
                                <img src="{{ asset('assets/img/default.png') }}" style="border-radius: 50%; width: 40px; height: 40px">
                                @else
                                <img src="{{ asset('storage/users/'.Auth::user()->avatar) }}" style="border-radius: 50%; width: 40px; height: 40px">
                                @endif

                                {{-- dislay name --}}
                                @if (Auth::user()->username == null)
                                <span style="font-weight: 600">
                                    {{ Auth::user()->name }}
                                </span>
                                @else
                                <span style="font-weight: 600">
                                    {{ Auth::user()->username }}
                                </span>
                                @endif
                                <span><i class="fa fa-angle-down"></i></span>

                            </button>
                            <div class="dropdown-content">
                                @if(auth()->user()->hasRole('seller'))
                                    <a href="{{ url('/admin/shops') }}" style="font-weight: 500;" target="_blank">
                                        <i class="fa fa-star"></i> {{ __('home.sellercentre') }}
                                    </a>
                                @elseif(auth()->user()->hasRole('admin'))
                                    <a href="{{ url('/admin') }}" style="font-weight: 500;" target="_blank">
                                        <i class="fa fa-gears"></i> {{ __('home.admincentre') }}
                                    </a>
                                @endif
                                <a href="{{ route('account.profile') }}" style="font-weight: 500;">
                                    <i class="fa fa-user"></i> {{ __('home.profile') }}
                                </a>
                                <a href="{{ route('logout') }}" style="font-weight: 500;" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> {{ __('home.logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                          </div>
                    </li>

                    @endguest
                </ul>
            </div>
            {{-- <div class="furniture-wishlist">
                <ul>
                    <li><a href="wishlist.html"><i class="ti-user"></i> My Account</a></li>
                </ul>
            </div> --}}
        </div>
    </div>
</div>
