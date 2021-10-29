<!--Featured post Start-->
<div class="home-featured">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 pl-0 pr-0">
                <div class="featured-slider-2">
                    <div class="featured-slider-2-items">
                        @foreach ($posts as $post)
                            <div class="slider-single">
                                <div class="post-thumb position-relative">
                                    <div class="thumb-overlay position-relative"
                                         style="background-image: url({{ RvMedia::getImageUrl($post->image, null, false, RvMedia::getDefaultImage()) }})">
                                        <div class="post-content-overlay">
                                            <div class="container">
                                                @php $category = $post->categories->first(); @endphp
                                                @if ($category)
                                                    <div class="entry-meta meta-0 font-small mb-10">
                                                        <a href="{{ $category->url }}">
                                                        <span
                                                            class="post-cat {{ random_background() }} color-white font-small">{{ $category->name }}</span>
                                                        </a>
                                                    </div>
                                                @endif
                                                <h1 class="post-title mt-20 mb-15">
                                                    <a class="color-white" href="{{ $post->url }}">{{ $post->name }}</a>
                                                </h1>
                                                <div class="entry-meta meta-1 font-small color-white mt-20 mb-20">
                                                <span class="post-on">
                                                    <i class="ti-marker-alt"></i>{{ $post->created_at->format(post_date_format()) }}
                                                </span>
                                                    <span class="hit-count">
                                                    <i class="ti-bolt"></i>{{ number_format($post->views) }} {{ __('views') }}
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="container position-relative">
                        <div class="arrow-cover color-white"></div>
                        <div class="featured-slider-2-nav-cover">
                            <div class="featured-slider-2-nav">
                                @foreach ($posts as $post)
                                    <div class="slider-post-thumb mr-15 position-relative">
                                        <img class="border-radius-5 mb-15"
                                             src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}"
                                             alt="image">
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
