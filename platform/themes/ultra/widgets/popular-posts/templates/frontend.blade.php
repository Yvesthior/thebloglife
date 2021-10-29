<div class="sidebar-widget mb-50">
    <div class="widget-header position-relative mb-30">
        <h5 class="widget-title mt-5 mb-30 {{ $config['name_custom_class'] }}">{{ $config['name'] }}</h5>
        <div class="letter-background">{{ $config['name'][0] ?? '' }}</div>
    </div>
    <div class="post-block-list post-module-1 post-module-5">
        <ul class="list-post">
            @foreach(get_popular_posts($config['number_display']) as $post)
                <li class="mb-30">
                    <div class="d-flex">
                        <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                            <a class="color-white" href="{{ $post->url }}" tabindex="0">
                                <img src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}">
                            </a>
                            @if(is_video_post($post))
                                <div class="play_btn play_btn_small">
                                    <a class="play-video" href="{{ $post->url }}">
                                        <i class="ti-control-play"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="post-content media-body">
                            <h6 class="post-title mb-10 text-limit-2-row">
                                <a href="{{ $post->url }}">{{ $post->name }}</a>
                            </h6>
                            <div class="entry-meta meta-1 font-x-small color-grey d-flex">
                                <span class="post-on has-dot">{{ $post->created_at->format(post_date_format()) }}</span>
                                <span class="hit-count has-dot">{{ number_format($post->views) }}</span>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
