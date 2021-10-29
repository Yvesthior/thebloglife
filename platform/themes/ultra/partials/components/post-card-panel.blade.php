<div class="post-thumb position-relative">
    <div class="thumb-overlay img-hover-slide border-radius-5 position-relative" 
        style="background-image: url({{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }})">
        <a class="img-link" href="{{ $post->url }}"></a>
        @if(is_video_post($post))
            <div class="play_btn play_btn_small">
                <a class="play-video" href="{{ $post->url }}">
                    <i class="ti-control-play"></i>
                </a>
            </div>
        @endif
        <div class="post-content-overlay">
            <div class="entry-meta meta-0 font-small mb-10">
                @php $category = $post->categories->first(); @endphp
                @if ($category)
                    <a href="{{ $category->url }}">
                        <span class="post-cat {{ random_background() }} color-white font-small">{{ $category->name }}</span>
                    </a>
                @endif
            </div>
            <h6 class="post-title">
                <a class="color-white" href="{{ $post->url }}">{{ $post->name }}</a>
            </h6>
            <div class="entry-meta meta-1 font-small color-grey mt-10 pr-5 pl-5">
                <span class="post-on">{{ $post->created_at->format(post_date_format()) }}</span>
                <span class="hit-count"><i class="ti-bolt"></i>{{ number_format($post->views) . ' ' . __('views') }}</span>
            </div>
        </div>
    </div>
</div>
