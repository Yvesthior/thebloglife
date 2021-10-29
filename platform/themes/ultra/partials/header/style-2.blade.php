<header class="main-header header-style-2">
    {!! Theme::partial('header.top-bar', ['background' => 'background-white']) !!}

    <div class="header-bottom header-sticky background-white text-center">
        <div class="mobile_menu d-lg-none d-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 d-none d-lg-block">
                    <div class="header-logo">
                        <a href="{{ route('public.index') }}">
                            <img class="img-logo d-inline"
                                 src="{{ RvMedia::getImageUrl(theme_option('logo')) }}"
                                 alt="{{ setting('site_title') }}">
                        </a>
                    </div>
                </div>

                <div class="col-lg-10 col-md-12">
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
                    {!! Theme::partial('header.offcanvas-sidebar') !!}

                </div>
            </div>
        </div>
    </div>

    @if (Theme::has('afterHeader'))
        {!! Theme::get('afterHeader') !!}
    @endif
</header>
