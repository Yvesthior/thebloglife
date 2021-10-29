<div class="entry-header single-header-default entry-header-1 mb-30">
    @php $category = $post->categories->first(); @endphp
    @if ($category)
        <div class="entry-meta meta-0 font-small mb-15">
            <a href="{{ $category->url }}">
                <span class="post-cat {{ random_background() }} color-white">{{ $category->name }}</span>
            </a>
        </div>
    @endif
    <h1 class="post-title">
        <a href="{{ $post->url }}">{{ $post->name }}</a>
    </h1>

    <div class="entry-meta meta-1 font-small color-grey mt-15 mb-15">
        @if (theme_option('enable_show_post_author_detail', 'yes') == 'yes' && class_exists($post->author_type) && $post->author && $post->author->id)
            <span class="post-by">{{ __('By') }} <a href="{{ $post->author->url }}">{{ $post->author->name }}</a></span>
        @endif
        <span class="post-on has-dot">{{ $post->created_at->format(post_date_format()) }}</span>
        <span class="time-reading has-dot">{{ get_time_to_read($post) }} {{ __('mins read') }}</span>
        <span class="hit-count"><i class="ti-bolt"></i> {{ number_format($post->views) . ' ' . __('views') }}</span>
    </div>

    <div class="bt-1 border-color-1 mt-20 mb-20"></div>
    <div class="clearfix">
        <div class="entry-meta meta-1 font-small color-grey float-left mt-10">
            @if(is_plugin_active('comment'))
                <span class="hit-count"><i class="ti-comment mr-5"></i> {{ $totalComment }} {{ __('comments') }}</span>
            @endif
            @if(is_plugin_active('pro-posts'))
                <span
                    class="btn-action-favorite-post {{ getIsFavoritePost($post->id) ? 'background8 post-bookmarked' : '' }}"
                    title="{{ __('Add to favorite') }}"
                    data-post-id="{{ $post->id }}"
                    data-login-id="{{ auth()->guard('member')->check() ? auth()->guard('member')->id() : '' }}"
                    data-url="{{ route('public.favorite-post') }}">
                    <i class="ti-heart mr-5"></i>
                </span>
                <span> {{ getPostTotalFavorite($post->id) }} {{ __('likes') }}</span>
                <span
                    class="hit-count btn-action-favorite-post {{ getIsBookmarkPost($post->id) ? 'background8 post-bookmarked' : '' }}"
                    title="{{ __('Add to bookmark') }}"
                    data-type="bookmark"
                    data-post-id="{{ $post->id }}"
                    data-login-id="{{ auth()->guard('member')->check() ? auth()->guard('member')->id() : '' }}"
                    data-url="{{ route('public.bookmark-post') }}">
                    <i class="ti-bookmark mr-5"></i>
                </span>
            @endif
        </div>
        <ul class="d-inline-block list-inline float-right single-social-share">
            {!! Theme::partial('components.social-share-post', compact('post')) !!}
        </ul>
    </div>
</div>

<div class="video-player">
    @if($videoLink)
        <div class="embed-responsive embed-responsive-16by9 mb-30">
            <iframe class="embed-responsive-item" src="{{ $videoLink }}" allowfullscreen></iframe>
        </div>
    @elseif($videoUploadId)
        @php $videoLink = RvMedia::getImageUrl($videoUploadId); @endphp
        <video id="player" playsinline controls>
            <source src="{{ $videoLink }}"
                    type="video/mp4">
            <source src="{{ $videoLink }}"
                    type="video/webm">
        </video>
    @else
        <figure class="single-thumnail">
            <div class="border-radius-5">
                <div class="slider-single text-center">
                    <img class="border-radius-10 lazy"
                         src="{{ RvMedia::getImageUrl($post->image) }}"
                         data-src="{{ RvMedia::getImageUrl($post->image, 'large', false, RvMedia::getDefaultImage()) }}"
                         src="{{ RvMedia::getImageUrl(theme_option('img_loading')) }}"
                         loading="lazy"
                         style="width: 100%;"
                         alt="{{ $post->name }}">
                </div>
            </div>
        </figure>
    @endif
</div>
