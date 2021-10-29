@php $category = $post->categories->first(); @endphp
<div class="post-thumb mb-30 border-radius-5 img-hover-scale animate-conner-box">
    <a href="{{ $post->url }}">
        <img class="lazy" style="width: 100%"
            data-src="{{ RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage()) }}"
            src="{{ RvMedia::getImageUrl(theme_option('img_loading')) }}"
            alt="{{ $post->name }}">
    </a>
    @if(is_video_post($post))
        <span class="top-right-icon background3"><i class="ti-video-camera"></i></span>
    @endif

    @if($category && !empty($categoryInImage))
        <div class="post-content-overlay entry-meta meta-0 font-small transition-ease-04">
            <a href="{{ $category->url }}">
                <span class="post-cat {{ random_background() }} color-white">{{ $category->name }}</span>
            </a>
        </div>
    @endif
    <ul class="social-share">
        <li><a href="#"><i class="ti-sharethis"></i></a></li>
        {!! Theme::partial('components.social-share-post-simple', compact('post')) !!}
    </ul>
</div>
<div class="post-content">
    <div class="entry-meta meta-0 font-small mb-15">
        @if ($category && empty($categoryInImage))
            <a href="{{ $category->url }}">
                <span class="post-cat {{ random_background() }} color-white">{{ $category->name }}</span>
            </a>
        @endif
    </div>
    <h4 class="post-title">
        <a href="{{ $post->url }}">{{ $post->name }}</a>
    </h4>
    <div class="entry-meta meta-1 font-small color-grey mt-15 mb-15 d-flex">
        <span
            class="post-on">{{ $post->created_at->format(post_date_format(!isset($dateLongFormat) ? true : $dateLongFormat)) }}</span>
        <span class="time-reading">
            <i class="ti-timer"></i>
            {{ get_time_to_read($post) }} {{ __('mins read') }}
        </span>
        <span class="hit-count"><i class="ti-bolt"></i>{{ number_format($post->views) . ' ' . __('views') }}</span>
    </div>
    @if(!isset($showDescription) || !empty($showDescription))
        <div class="post-excerpt mb-25">
            <p>{!! clean($post->description) !!}</p>
        </div>
    @endif
</div>
