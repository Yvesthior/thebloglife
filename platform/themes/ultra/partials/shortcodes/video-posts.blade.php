<div class="video-area background_dark area-padding pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sidebar-widget">
                    <div class="widget-header position-relative mb-30">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="widget-title text-uppercase color4 font-weight-ultra">{!! clean($shortcode->subtitle) !!}</h5>
                                <div class="letter-background">{!! clean($shortcode->subtitle) !!}</div>
                            </div>
                            <div class="col-5 text-right">
                                <h6 class="text-uppercase font-medium">
                                    <i class="ti-video-clapper color-white mr-5"></i>
                                    <a class="color-white" href="{{ route('public.posts-videos') }}">{{ __('All Videos') }}</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="block-tab-item post-module-1 post-module-4 mt-50">
                        @php
                            $firstPost = $posts->first();
                        @endphp

                        <div class="row">
                            @if($firstPost)
                                <div class="col-lg-5 col-md-6">
                                    <div class="post-thumb position-relative">
                                        <div class="thumb-overlay img-hover-slide border-radius-5 position-relative lazy"
                                            data-bg="{{ RvMedia::getImageUrl($firstPost->image, 'medium_large', false, RvMedia::getDefaultImage()) }}"
                                            style="background-image: url({{ RvMedia::getImageUrl(theme_option('img_loading')) }})">
                                            <span class="top-right-icon background8">
                                                <i class="ti-bolt"></i>
                                            </span>
                                            <a class="img-link" href="{{ $firstPost->url }}"></a>
                                            <div class="post-content-overlay">
                                                <h2 class="post-title">
                                                    <a class="color-white"
                                                       href="{{ $firstPost->url }}">{{ $firstPost->name }}</a>
                                                </h2>
                                                <div class="entry-meta meta-1 font-small color-grey mt-10 pr-5 pl-5">
                                                    <span class="post-on">{{ $firstPost->created_at->format(post_date_format(false)) }}</span>
                                                    <span class="hit-count has-dot">{{ $firstPost->views . ' ' . __('views') }}</span>
                                                    <a class="float-right" href="#"><i class="ti-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="play_btn">
                                                <a class="play-video" href="{{ $firstPost->url }}">
                                                    <i class="ti-control-play"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="col-lg-7 col-md-6">
                                <div class="row">
                                    @foreach ($posts as $post)
                                        @if($loop->index == 0) @continue @endif
                                        <div class="slider-single col-lg-4 col-md-6 mb-30">
                                            <div class="img-hover-scale border-radius-5">
                                                <a href="{{ $post->url }}">
                                                    <img class="border-radius-5"
                                                         src="{{ RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage()) }}"
                                                         alt="{{ $post->name }}">
                                                </a>
                                                <div class="play_btn play_btn_small">
                                                    <a class="play-video" href="{{ $post->url }}">
                                                        <i class="ti-control-play"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <h6 class="post-title pr-5 pl-5 mb-10 mt-15 text-limit-2-row">
                                                <a class="color-white"
                                                   href="{{ $post->url }}">{{ $post->name }}</a>
                                            </h6>
                                            <div class="entry-meta meta-1 font-small color-grey mt-10 pr-5 pl-5">
                                                <span
                                                    class="post-on">{{ $post->created_at->format(post_date_format(false)) }}</span>
                                                <span class="hit-count has-dot">{{ number_format($post->views) . ' ' . __('views') }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
