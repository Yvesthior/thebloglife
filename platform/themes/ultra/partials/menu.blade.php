<ul {!! $options !!}>
    @foreach ($menu_nodes as $key => $row)
        <li class="cat-item @if ($row->has_child) menu-item-has-children @endif @if ($row->css_class) {{ $row->css_class }} @endif @if ($row->active) current-menu-item @endif">
            <a href="{{ url($row->url) }}" @if ($row->target !== '_self') target="{{ $row->target }}" @endif>
                @if ($row->icon_font) <i class="{{ trim($row->icon_font) }}"></i> @endif {{ $row->title }}
            </a>
            @if ($row->has_child)
                {!! Menu::generateMenu([
                    'menu'       => $menu,
                    'menu_nodes' => $row->child,
                    'view'       => 'menu',
                    'options' => [
                        'class' => 'sub-menu font-small',
                    ]
                ]) !!}
            @endif
        </li>
    @endforeach

    @if (strpos($options, 'is-main-menu') !== false)
        @if (theme_option('allow_account_login', '') == 'yes')
            <li class="text-left d-block d-md-none">
                @if (!auth('member')->check())
                    <a href="{{ route('public.member.login') }}" role="button"
                       class="{{ $color ?? '' }}">
                        <i class="ti-user mr-1"></i>
                        <span>{{ __('Login') }}</span>
                    </a>
                @else
                    <a class="dropdown-toggle" href="#" role="button"
                       class="{{ $color ?? '' }}"
                       id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ti-user mr-1"></i>
                        <span>{{ __('Account') }}</span>
                    </a>
                    <div id="userMenuDropdow" class="dropdown-menu dropdown-menu-right"
                         aria-labelledby="userMenu">
                        <a class="dropdown-item" href="{{ route('public.member.dashboard') }}">
                            <i class="ti-pencil-alt"></i>{{ __('Your Dashboard') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('public.member.settings') }}">
                            <i class="ti-stats-up"></i>{{ __('Edit profile') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('public.member.security') }}">
                            <i class="ti-settings"></i>{{ __('Change password') }}
                        </a>

                        @if(is_plugin_active('favorite-posts'))
                            <a class="dropdown-item" href="{{ route('public.favorite-post-listing') }}">
                                <i class="ti-heart"></i>{{ __('Your Favorites') }}
                            </a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();" t>
                            <i class="ti-share"></i>{{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('public.member.logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endif
            </li>
        @endif

        @if (is_plugin_active('language'))
            <li class="text-left d-block d-md-none">
                @php
                    $supportedLocales = Language::getSupportedLocales();
                @endphp
                @if ($supportedLocales && count($supportedLocales) > 1)
                    @php
                        $languageDisplay = setting('language_display', 'all');
                    @endphp

                    <div class="mb-2 language">
                        @foreach ($supportedLocales as $localeCode => $properties)
                            @if ($localeCode != Language::getCurrentLocale())
                                <a rel="alternate" hreflang="{{ $localeCode }}"
                                   href="{{ setting('language_show_default_item_if_current_version_not_existed', true) ? Language::getLocalizedURL($localeCode) : url($localeCode) }}">
                                    @if (($languageDisplay == 'all' || $languageDisplay == 'flag')){!! language_flag($properties['lang_flag'], $properties['lang_name']) !!}@endif
                                    @if (($languageDisplay == 'all' || $languageDisplay == 'name'))<span
                                        class="ml-2">{{ $properties['lang_name'] }}</span>@endif
                                </a>
                            @endif
                        @endforeach
                    </div>
                @endif
            </li>
        @endif

        @if (!empty(theme_option('social_links')))
            <li class="text-left d-block d-md-none">
                <div class="header-social-network d-inline-block list-inline {{ $color ?? '' }}">
                    @foreach (json_decode(theme_option('social_links'), true) as $socialLink)
                        <div class="list-inline-item">
                            <a href="{{ $socialLink[2]['value'] }}"
                               target="_blank"
                               class="social-icon {{ $color ?? '' }} {{ $socialLink[1]['value'] }}-icon text-xs-center"
                               title="{{ $socialLink[0]['value'] }}">
                                <i class="ti-{{ $socialLink[1]['value'] }}"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            </li>
        @endif
    @endif
</ul>
