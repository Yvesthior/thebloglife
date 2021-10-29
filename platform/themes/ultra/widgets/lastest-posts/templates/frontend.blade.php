<div class="sidebar-widget mb-50">
    <div class="widget-header position-relative mb-30">
        <h5 class="widget-title mt-5 mb-30 {{ $config['name_custom_class'] }}">{{ $config['name'] }}</h5>
        <div class="letter-background">{{ $config['name'][0] ?? '' }}</div>
    </div>
    <div class="">
        <ul class="list-post">
            @foreach(query_post(['limit' => $config['number_display']]) as $post)
                <li class="mb-30">
                    {!! Theme::partial('components.post-card-2-block-simple', [
                        'post' => $post,
                        'imageType' => 'thumb',
                        'height' => '80'
                    ]) !!}
                </li>
            @endforeach
        </ul>
    </div>
</div>
