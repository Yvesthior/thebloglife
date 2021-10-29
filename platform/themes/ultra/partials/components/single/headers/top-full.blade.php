<div class="single-header-2 single-header-top-full row no-gutters mb-50 background12">
    <div class="col-lg-6 col-md-12">
        <figure class="single-thumnail img-hover-slide mb-0"
                style="background-image: url({{ RvMedia::getImageUrl($post->image) }})">
        </figure>
        @if(is_video_post($post))
            <span class="top-right-icon background3"><i class="ti-video-camera"></i></span>
        @endif
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="entry-header entry-header-1">
            @php $category = $post->categories->first(); @endphp
            @if ($category)
                <div class="entry-meta meta-0 font-small mb-30">
                    <a href="{{ $category->url }}">
                        <span class="post-cat {{ random_background() }} color-white">{{ $category->name }}</span>
                    </a>
                </div>
            @endif
            <h1 class="post-title">
                <a href="{{ $post->url }}">{{ $post->name }}</a>
            </h1>
            <div class="entry-meta meta-1 font-small color-grey mt-15 mb-15 d-flex">
                @if (theme_option('enable_show_post_author_detail', 'yes') == 'yes' && $post->author && $post->author->id)
                    <span class="post-by">
                    {{ __('By') }} <a href="{{ $post->author->url }}">{{ $post->author->name }}</a>
                </span>
                @endif
                <span class="post-on has-dot">{{ $post->created_at->format(post_date_format()) }}</span>
                <span class="time-reading has-dot">{{ get_time_to_read($post) }} {{ __('mins read') }}</span>
                <span class="hit-count">
                    <i class="ti-bolt"></i> {{ number_format($post->views) . ' ' . __('views') }}
                </span>
            </div>
            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
            <div class="single-social-share clearfix ">
                <div class="entry-meta meta-1 font-small color-grey float-left mt-10">
                    @if(is_plugin_active('comment'))
                        <span class="hit-count"><i class="ti-comment mr-5"></i> {{ $totalComment }} {{ __('comments') }}</span>
                    @endif

                    @if(is_plugin_active('pro-posts'))
                        <span
                            class="hit-count btn-action-favorite-post {{ getIsFavoritePost($post->id) ? 'background8 post-bookmarked' : '' }}"
                            title="{{ __('Add to favorite') }}"
                            data-type="favorite"
                            data-post-id="{{ $post->id }}"
                            data-login-id="{{ auth()->guard('member')->check() ? auth()->guard('member')->id() : '' }}"
                            data-url="{{ route('public.favorite-post') }}">
                            <i class="ti-heart mr-5"></i>
                        </span>
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

                <ul class="d-inline-block list-inline float-right">
                    {!! Theme::partial('components.social-share-post', compact('post')) !!}
                </ul>
            </div>
        </div>
    </div>
    <!--end entry header-->
</div>
