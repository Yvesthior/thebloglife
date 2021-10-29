<div class="home-featured">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="featured-slider-1 border-radius-10">
                    <div class="featured-slider-1-items">
                        @foreach ($posts as $key => $post)
                            <div class="slider-single">
                                <div class="row no-gutters">
                                    <div class="col-lg-6 col-md-12 order-lg-1 order-2 align-center-vertical">
                                        <div class="slider-caption">
                                            @php $category = $post->categories->first(); @endphp
                                            @if ($category)
                                                <div class="entry-meta meta-0 mb-25">
                                                    <a href="{{ $category->url }}">
                                                        <span
                                                            class="post-in background1 color-white font-small">{{ $category->name }}</span>
                                                    </a>
                                                </div>
                                            @endif
                                            <h2 class="post-title"><a href="{{ $post->url }}">{{ $post->name }}</a></h2>
                                            <div class="entry-meta meta-1 font-small color-grey mt-20 mb-20">
                                                <span class="post-on">
                                                    <i class="ti-marker-alt"></i>{{ $post->created_at->format(post_date_format()) }}
                                                </span>
                                                <span class="hit-count">
                                                    <i class="ti-bolt"></i>{{ number_format($post->views) }} {{ __('views') }}
                                                </span>
                                            </div>
                                            <p class="excerpt font-medium mt-25 mb-25">{{ clean($post->description ) }} </p>
                                            @if (theme_option('enable_show_post_author_detail', 'yes') == 'yes' && class_exists($post->author_type) && $post->author && $post->author->id)
                                                <div class="entry-meta meta-2">
                                                    <a class="float-left mr-10 author-img"
                                                       href="{{ $post->author->url }}">
                                                        <img
                                                            src="{{ RvMedia::getImageUrl($post->author->avatar->url, 'thumb', false, RvMedia::getDefaultImage()) }}"
                                                            alt="{{ $post->author->name }}">
                                                    </a>
                                                    <a href="{{ $post->author->url }}">
                                                        <span class="author-name mt-10">{{ $post->author->name }}</span>
                                                    </a>
                                                    <br>
                                                    <span class="author-add color-grey"></span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="slider-img col-lg-6 order-lg-2 order-1 col-md-12">
                                        <div class="img-hover-scale">
                                            <span class="top-right-icon background8">
                                                <i class="ti-heart"></i>
                                            </span>
                                            <a href="{{ $post->url }}">
                                                @if ($key)
                                                    <img class="img-fluid {{ $key ? 'lazy' : '' }}"
                                                         data-lazy="{{ RvMedia::getImageUrl($post->image, 'medium_large', false, RvMedia::getDefaultImage()) }}"
                                                         src="{{ RvMedia::getImageUrl(theme_option('img_loading')) }}"
                                                         alt="{{ $post->name }}">
                                                @else
                                                    <img class="img-fluid"
                                                         src="{{ RvMedia::getImageUrl($post->image, 'medium_large', false, RvMedia::getDefaultImage()) }}"
                                                         alt="{{ $post->name }}">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="arrow-cover"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
