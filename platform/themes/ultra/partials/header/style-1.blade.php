<header class="main-header header-style-1">
    {!! Theme::partial('header.top-bar', ['background' => 'background-white']) !!}

    @if (theme_option('logo'))
        <div class="header-logo background-white text-center pt-40 pb-40 d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('public.index') }}">
                            <img class="img-logo d-inline"
                                 src="{{ RvMedia::getImageUrl(theme_option('logo')) }}"
                                 alt="{{ setting('site_title') }}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="header-bottom header-sticky background-white text-center">
        <div class="mobile_menu d-lg-none d-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! Theme::partial('header.offcanvas-sidebar') !!}
                    {!! Theme::partial('header.logo-tablet') !!}
                    {!! Theme::partial('header.logo-mobile') !!}

                    <div class="main-nav text-center d-none d-lg-block" style="display: none">
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
