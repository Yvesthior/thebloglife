@php
    $columnStyle = isset($columnStyle) ? $columnStyle : [6, 6];
@endphp
<div class="col-md-{{ $columnStyle[0] }}">
    <div class="post-thumb position-relative thumb-overlay mr-20">
        <div class="img-hover-slide border-radius-5 position-relative lazy"
            data-bg="{{ RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage()) }}"
            style="background-image: url({{ RvMedia::getImageUrl(theme_option('img_loading')) }})">
            <a class="img-link" href="{{ $post->url }}"></a>
            @if(is_video_post($post))
                <span class="top-right-icon background3"><i class="ti-video-camera"></i></span>
            @endif
        </div>
        <ul class="social-share">
            <li><a href="#"><i class="ti-sharethis"></i></a></li>
            {!! Theme::partial('components.social-share-post-simple', compact('post')) !!}
        </ul>
    </div>
</div>

<div class="col-md-{{ $columnStyle[1] }}">
    <div class="post-content">
        <div class="entry-meta meta-0 font-small mb-15">
            @php $category = $post->categories->first(); @endphp
            @if ($category)
                <a href="{{ $category->url }}">
                    <span class="post-cat {{ random_background() }} color-white">{{ $category->name }}</span>
                </a>
            @endif
        </div>
        <h4 class="post-title">
            <a href="{{ $post->url }}">
                {{ $post->name }}
            </a>
        </h4>
        <div class="entry-meta meta-1 font-small color-grey mt-15 mb-15 d-flex">
            <span class="post-on">{{ $post->created_at->format(post_date_format()) }}</span>
            <span class="time-reading">
                <i class="ti-timer"></i>
                {{ get_time_to_read($post) }} {{ __('mins read') }}
            </span>
            <span class="hit-count"><i class="ti-bolt"></i>{{ number_format($post->views) . ' ' . __('views') }}</span>
        </div>
        <p class="font-medium">{!! clean($post->description) !!}</p>
        @if(isset($showReadMoreText) ? $showReadMoreText : true)
            <a class="readmore-btn font-small text-uppercase font-weight-ultra" href="{{ $post->url }}">
                {{ __('Read More') }}
                <i class="ti-arrow-right ml-5 transition-02s"></i>
            </a>
        @endif
    </div>
</div>
