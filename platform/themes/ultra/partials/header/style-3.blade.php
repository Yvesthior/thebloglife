<header class="main-header header-style-2 header-style-3">
    {!! Theme::partial('header.top-bar', ['background' => 'background4', 'color' => 'color-white']) !!}

    <div class="header-logo background-white pt-20 pb-20 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 align-center-vertical text-left">
                    <a href="{{ route('public.index') }}">
                        <img class="img-logo d-inline"
                             src="{{ RvMedia::getImageUrl(theme_option('logo')) }}"
                             alt="{{ setting('site_title') }}">
                    </a>
                </div>
                <div class="col-lg-8 col-md-12 align-center-vertical d-none d-lg-inline text-right">
                    {!! display_ad('header-ads', ['class' => 'mb-30']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom header-sticky background-white text-center">
        <div class="mobile_menu d-lg-none d-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! Theme::partial('header.offcanvas-sidebar') !!}
                    {!! Theme::partial('header.logo-tablet') !!}
                    {!! Theme::partial('header.logo-mobile') !!}
                    <div class="main-nav text-left d-none d-lg-block">
                        <nav>
                            {!! Menu::renderMenuLocation('main-menu', [
                                'view'    => 'menu',
                                'options' => ['id' => 'navigation', 'class' => 'main-menu', 'is-main-menu' => true],
                            ]) !!}
                        </nav>
                    </div>
                    {!! Theme::partial('header.search-button') !!}
                </div>
            </div>
        </div>
    </div>

    @if (Theme::has('afterHeader'))
        {!! Theme::get('afterHeader') !!}
    @endif
</header>
