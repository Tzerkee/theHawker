<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('voyager.dashboard') }}">
                    <div class="logo-icon-container">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        @if($admin_logo_img == '')
                            <img src="{{ asset('assets/img/logo6.png') }}" alt="logo">
                        @else
                            <img src="{{ asset('assets/img/logo6.png') }}" alt="logo">
                        @endif
                    </div>
                    <div class="title">{{Voyager::setting('admin.title', 'VOYAGER')}}</div>
                </a>
            </div><!-- .navbar-header -->

            <div class="panel widget center bgimage"
                 style="background-image:url({{ asset('assets/img/widget-backgrounds/shop.jpg') }}); background-size: cover; background-position: 0px;">
                <div class="dimmer"></div>
                <div class="panel-content">

                    @if (Auth::user()->avatar == null)
                        <img src="{{ asset('assets/img/default.png') }}" class="avatar" alt="avatar">
                    @else
                        <img src="{{ asset('storage/users/'.Auth::user()->avatar) }}" class="avatar" alt="avatar">
                    @endif

                    @if (Auth::user()->username == null)
                        <h4>{{ Auth::user()->name }}</h4>
                    @else
                        <h4>{{ Auth::user()->username }}</h4>
                    @endif
                    
                    <p>{{ Auth::user()->email }}</p>

                    <a href="{{ route('voyager.profile') }}" class="btn btn-primary">{{ __('voyager::generic.profile') }}</a>
                    <div style="clear:both"></div>
                </div>
            </div>

        </div>
        <div id="adminmenu">
            <admin-menu :items="{{ menu('admin', '_json') }}"></admin-menu>
        </div>
    </nav>
</div>
