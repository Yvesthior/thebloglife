@if (is_plugin_active('language'))
    @php
        $supportedLocales = Language::getSupportedLocales();
    @endphp
    @if ($supportedLocales && count($supportedLocales) > 1)
        @php
            $languageDisplay = setting('language_display', 'all');
            $showRelated = setting('language_show_default_item_if_current_version_not_existed', true);
        @endphp

        <div class="padtop10 mb-2 language">
            @if (setting('language_switcher_display', 'dropdown') == 'dropdown')
                <div id="langMenuDropdow" class="dropdown-menu dropdown-menu-left" aria-labelledby="langMenu">
                    @foreach ($supportedLocales as $localeCode => $properties)
                        @if ($localeCode != Language::getCurrentLocale())
                            <a class="dropdown-item"
                               href="{{ $showRelated ? Language::getLocalizedURL($localeCode) : url($localeCode) }}">
                                {!! language_flag($properties['lang_flag'], $properties['lang_name']) !!}
                                {{ $properties['lang_name'] }}
                            </a>
                        @endif
                    @endforeach
                </div>
                <a class="dropdown-toggle" href="#" role="button" id="langMenu" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="ti-world mr-5"></i>
                    <span>{{ Language::getCurrentLocaleName() }}</span>
                </a>
            @else
                @foreach ($supportedLocales as $localeCode => $properties)
                    @if ($localeCode != Language::getCurrentLocale())
                        <a rel="alternate" hreflang="{{ $localeCode }}" class="{{ $color ?? '' }}"
                           href="{{ setting('language_show_default_item_if_current_version_not_existed', true) ? Language::getLocalizedURL($localeCode) : url($localeCode) }}">
                            @if (($languageDisplay == 'all' || $languageDisplay == 'flag')){!! language_flag($properties['lang_flag'], $properties['lang_name']) !!}@endif
                            @if (($languageDisplay == 'all' || $languageDisplay == 'name'))
                                <span>{{ $properties['lang_name'] }}</span>@endif
                        </a> &nbsp;
                    @endif
                @endforeach
            @endif
        </div>
    @endif
@endif
