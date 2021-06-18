<footer class="footer_area section_padding_130_0">
  <div class="container">
    <div class="row">
      <!-- Single Widget-->
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="single-footer-widget section_padding_0_130">
          <!-- Footer Logo-->
          <div class="footer-logo mb-3"><a href="{{ route('web.home') }}"><img src="{{ asset('assets/img/logo.png') }}" style="height: 70px; width: 110px;" alt="theHawker"></a></div>
          <p>{{__('home.desc')}}</p>
          <!-- Footer Social Area-->
          <div class="addthis_inline_share_toolbox_50tn"></div>
        </div>
      </div>
      <!-- Single Widget-->
      <div class="col-12 col-sm-6 col-lg">
        <div class="single-footer-widget section_padding_0_130">
          <!-- Widget Title-->
          <h5 class="widget-title pt-20" style="text-transform: uppercase; font-weight: 700;">{{__('home.links')}}</h5>
          <!-- Footer Menu-->
          <div class="footer_menu">
            <ul>
              <li><a href="{{ route('web.home') }}">{{__('home.home')}}</a></li>
              <li><a href="{{ route('category.index') }}">{{__('home.categories')}}</a></li>
              <li><a href="{{ route('product.index') }}">{{__('home.products')}}</a></li>
              <li><a href="{{ route('events.index') }}">{{__('home.events')}}</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Single Widget-->
      <div class="col-12 col-sm-6 col-lg">
        <div class="single-footer-widget section_padding_0_130">
          <!-- Widget Title-->
          <h5 class="widget-title pt-20" style="text-transform: uppercase; font-weight: 700;">{{__('home.support')}}</h5>
          <!-- Footer Menu-->
          <div class="footer_menu">
            <ul>
              <li><a href="{{ route('web.how') }}">{{__('home.howtolist')}}</a></li>
              <li><a href="{{ route('contact') }}">{{__('home.contactus')}}</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Single Widget-->
      <div class="col-12 col-sm-6 col-lg">
          <div class="single-footer-widget section_padding_0_130">
            <!-- Widget Title-->
            <h5 class="widget-title pt-20" style="text-transform: uppercase; font-weight: 700;">{{__('home.account')}}</h5>
            <!-- Footer Menu-->
            <div class="footer_menu">
              <ul>
                <li><a href="{{ route('account.profile') }}"> {{ __('home.profile') }} </a></li>
                <li><a href="{{ route('cart.index') }}"> {{__('home.cart')}} </a></li>
                <li><a href="{{ route('user.order') }}"> {{__('home.orders')}} </a></li>
                <li><a href="{{ route('wishlist.index') }}"> {{__('home.wishlist')}} </a></li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</footer>
