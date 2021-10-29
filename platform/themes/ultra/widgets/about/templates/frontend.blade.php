<div class="sidebar-widget mb-30">
    <div class="widget-header position-relative mb-30">
        <h5 class="widget-title mt-5 mb-30 color-white">{{ $config['name'] }}</h5>
        <div class="letter-background">{{ $config['name'][0] ?? '' }}</div>
    </div>
    <div class="post-block-list post-module-1 post-module-5">
        <p class="font-medium text-muted">{{ $config['description'] }}</p>
        @if (theme_option('address'))
            <p>
                <strong>{{ __('Address') }}</strong>
                <br>
                {{ theme_option('address') }}
            </p>
        @endif
        @if (theme_option('phone'))
            <p>
                <strong>{{ __('Phone') }}</strong>
                <br>
                {{ theme_option('phone') }}
            </p>
        @endif
    </div>
</div>

