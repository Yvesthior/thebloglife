<div class="sidebar-widget widget_tagcloud mb-30 ">
    <div class="widget-header position-relative mb-30">
        <h5 class="widget-title mt-5 mb-30 {{ $config['name_custom_class'] }}">{{ $config['name'] }}</h5>
        <div class="letter-background">{{ $config['name'][0] ?? '' }}</div>
    </div>
    <div class="tagcloud mt-10">
        @foreach (get_popular_tags($config['number_display']) as $tag)
            <a class="tag-cloud-link" href="{{ $tag->url }}">{{ $tag->name }}</a>
        @endforeach
    </div>
</div>
