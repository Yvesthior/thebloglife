@php
SeoHelper::setTitle(__('404 - Not found'));
Theme::fire('beforeRenderTheme', app(\Botble\Theme\Contracts\Theme::class));
@endphp

{!! Theme::partial('header') !!}

<!--main content-->
<div class="main_content sidebar_right mt-100 mb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 d-lg-block d-none">
                <img loading="lazy" src="{{ Theme::asset()->url('images/fogg-page-not-found.png') }}" alt="image">
            </div>
            <div class="col-lg-6 col-md-12">
                <h1 class="mb-30">{{ __('404 - Page Not Found') }}</h1>
                <form action="{{ route('public.search') }}" class="search-form d-lg-flex open-search mb-30">
                    <div class="form-group">
                        <input class="form-control bg-white" name="q" id="q" type="text"
                               placeholder="{{ __('Search...') }}">
                    </div>
                </form>
                <p class="font-lg text-grey-700">
                    {{ __('The link you clicked may be broken or the page may have been removed.') }}<br>
                    {{ __('visit the') }} <a href="{{ route('public.index') }}"> <strong> {{ __('Homepage') }}</strong></a> {{ __('or') }} <a
                        href="mailto:{{ theme_option('email', '') }}"><strong>{{ __('Contact us') }}</strong></a>
                    {{ __('about the problem') }}
                </p>
                <div class="form-group">
                    <button type="submit" class="button button-contactForm mt-30">Home page</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main content -->
{!! Theme::partial('footer') !!}
