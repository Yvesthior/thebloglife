<div class="sidebar-widget widget_alitheme_lastpost mb-50">
    <div class="widget-header position-relative mb-20 pb-10">
        <h5 class="widget-title mb-10">{{ $postCollectionData->name }}</h5>
        <div class="bt-1 border-color-1"></div>
    </div>
    <div class="row">
        @foreach($postCollectionData->posts as $post)
            <div class="col-md-6 col-sm-6 sm-grid-content mb-30">
                <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                    <a href="{{ $post->url }}">
                        <img class="lazy"
                            data-lazy="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}"
                            src="{{ RvMedia::getImageUrl(theme_option('img_loading')) }}"
                            alt="{{ $post->name }}">
                    </a>
                </div>
                <div class="post-content media-body">
                    <h6 class="post-title mb-10 text-limit-2-row">{{ $post->name }}</h6>
                    <div class="entry-meta meta-1 font-x-small color-grey d-flex">
                        <span class="post-on">{{ $post->created_at->format(post_date_format(false)) }}</span>
                        <span class="hit-count has-dot">{{ number_format($post->views) . ' ' . __('views') }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
