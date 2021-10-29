<!--Featured post Start-->
<div class="home-featured">
    <div class="post-carausel-3 post-module-1">
        @foreach ($posts as $post)
            <div class="thumb-overlay img-hover-slide position-relative"
                 style="background-image: url({{ RvMedia::getImageUrl($post->image, null, false, RvMedia::getDefaultImage()) }})">
                @if(is_video_post($post))
                    <span class="top-right-icon background3"><i class="ti-video-camera"></i></span>
                @endif
                <a class="img-link" href="{{ $post->url }}"></a>
                <div class="post-content-overlay ml-30 mr-30">
                    @php $category = $post->categories->first(); @endphp
                    @if ($category)
                        <div class="entry-meta meta-0 font-small mb-10">
                            <a href="{{ $category->url }}">
                                <span
                                    class="post-cat {{ random_background() }} color-white font-small">{{ $category->name }}</span>
                            </a>
                        </div>
                    @endif
                    <h3 class="post-title">
                        <a class="color-white" href="{{ $post->url }}">{{ $post->name }}</a>
                    </h3>
                    <div class="entry-meta meta-1 font-small color-grey mt-10 pr-5 pl-5">
                        <span class="post-on">{{ $post->created_at->format(post_date_format(false)) }}</span>
                        <span class="hit-count has-dot">{{ number_format($post->views) }} {{ __('views') }}</span>
                        <a class="float-right" href="#"><i class="ti-heart"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
