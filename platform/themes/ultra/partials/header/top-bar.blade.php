<div class="top-bar pt-10 pb-10 {{ $background }} {{ $color ?? '' }} d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-6 text-left">
                @if (is_plugin_active('language'))
                    <div class="language d-inline-block font-small {{ $color ?? '' }}">
                        {!! Theme::partial('language-switcher', ['color' => $color ?? '']) !!}
                    </div>
                @endif
                <div class="d-inline-block">
                    <ul>
                        <li>
                            <span class="font-small"><i class="ti-calendar mr-5"></i>
                                {{ date(theme_option('post_date_format', 'D, M Y')) }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-6 text-right">
                @if (!empty(theme_option('social_links')))
                <ul class="header-social-network d-inline-block list-inline {{ $color ?? '' }}">
                    @foreach (json_decode(theme_option('social_links'), true) as $socialLink)
                        <li class="list-inline-item">
                            <a href="{{ $socialLink[2]['value'] }}"
                               target="_blank"
                               class="social-icon {{ $color ?? '' }} {{ $socialLink[1]['value'] }}-icon text-xs-center"
                               title="{{ $socialLink[0]['value'] }}">
                                <i class="ti-{{ $socialLink[1]['value'] }}"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
                @endif

                @if (theme_option('allow_account_login', '') == 'yes')
                    <div class="vline-space d-inline-block"></div>
                    <div class="user-account d-inline-block font-small">
                        @if (!auth('member')->check())
                            <a href="{{ route('public.member.login') }}" role="button"
                               class="{{ $color ?? '' }}">
                                <i class="ti-user"></i>
                                <span>{{ __('Login') }}</span>
                            </a>
                        @else
                            <a class="dropdown-toggle" href="#" role="button"
                               class="{{ $color ?? '' }}"
                               id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-user"></i>
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

                                @if(is_plugin_active('pro-posts'))
                                    <a class="dropdown-item" href="{{ route('public.favorite-post-listing') }}">
                                        <i class="ti-heart"></i>{{ __('My Favorite Posts') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('public.bookmark-post-listing') }}">
                                        <i class="ti-bookmark"></i>{{ __('My Bookmark Posts') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('public.recently-viewed-posts') }}">
                                        <i class="ti-bookmark"></i>{{ __('My Viewed Posts') }}
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
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!--End top bar-->
