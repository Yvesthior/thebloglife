<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1"
          name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link
        href="https://fonts.googleapis.com/css2?family={{ urlencode(theme_option('font_heading', 'Arimo')) }}:wght@400;700&family={{ urlencode(theme_option('font_body', 'Roboto')) }}:ital,wght@0,400;0,500;0,700;0,900;1,400&display=swap"
        rel="stylesheet" type="text/css">
    <!-- Fonts-->
    <!-- CSS Library-->
    <style>
        :root {
            --color-primary: {{ theme_option('color_primary', '#ff2d55') }};
            --color-secondary: {{ theme_option('color_secondary', '#455265') }};
            --color-success: {{ theme_option('color_success', '#76e1c6') }};
            --color-danger: {{ theme_option('color_danger', '#f0a9a9') }};
            --color-warning: {{ theme_option('color_warning', '#e6bf7e') }};
            --color-info: {{ theme_option('color_info', '#58c1c8') }};
            --color-light: {{ theme_option('color_light', '#F3F3F3') }};
            --color-dark: {{ theme_option('color_dark', '#111111') }};
            --color-link: {{ theme_option('color_link', '#222831') }};
            --color-white: {{ theme_option('color_white', '#FFFFFF') }};
            --font-body: {{ theme_option('font_body', 'Roboto') }}, sans-serif;
            --font-header: {{ theme_option('font_heading', 'Arimo') }}, sans-serif;
        }
    </style>

    <script>
        "use strict";
        window.themeUrl = '{{ Theme::asset()->url('') }}';
        window.siteUrl = '{{ url('') }}';
        window.currentLanguage = '{{ App::getLocale() }}';
    </script>

    {!! Theme::header() !!}
</head>

<body @if (BaseHelper::siteLanguageDirection() == 'rtl') dir="rtl" @endif>
<div id="alert-container"></div>
{!! apply_filters(THEME_FRONT_BODY, null) !!}
<div class="scroll-progress primary-bg"></div>
@if (theme_option('preloader_enabled', 'yes') == 'yes')
    <!-- Start Preloader -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    @if (theme_option('favicon'))
                        <div data-loader="spinner" style="background: url({{ RvMedia::getImageUrl(theme_option('favicon')) }});"></div>
                    @endif
                    <p>{{ __('Loading...') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="main-wrap">
    @php
        $headerStyle = request()->input('header', theme_option('header_style', 'style-1'));
        $headerStyle = empty($headerStyle) ? 'style-1' : $headerStyle;
    @endphp

    {!! Theme::partial('components.sidebar-canvas', ['headerStyle' => $headerStyle]) !!}

    {!! Theme::partial('header.' . $headerStyle) !!}

    {!! Theme::partial('components.search-form') !!}

