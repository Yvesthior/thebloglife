<div class="slider-single col">
    <h6 class="post-title pr-5 pl-5 mb-10 text-limit-2-row">
        <a href="{{ $post->url }}" alt="{{ $post->name }}">{{ $post->name }}</a>
    </h6>
    <div class="img-hover-scale border-radius-5 hover-box-shadow">
        @if(is_video_post($post))
            <span class="top-right-icon background3"><i class="ti-video-camera"></i></span>
        @endif
        <a href="{{ $post->url }}">
            <img loading="lazy" class="border-radius-5 lazy"
                data-src="{{ RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage()) }}"
                src="{{ RvMedia::getImageUrl(theme_option('img_loading')) }}"
                alt="{{ $post->name }}">
        </a>
    </div>
    <div class="entry-meta meta-1 font-small color-grey mt-10 pr-5 pl-5">
        <span class="post-on">{{ $post->created_at->format(post_date_format()) }}</span>
        <span class="hit-count has-dot">{{ number_format($post->views) . ' ' . __('views') }}</span>
    </div>
</div>
