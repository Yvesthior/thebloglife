<div class="pt-50 pb-50 {{ $shortcode->background_style }}">
    <div class="container">
        <div class="sidebar-widget">
            <div class="widget-header position-relative mb-30">
                <h5 class="widget-title mb-30 text-uppercase color1 font-weight-ultra">{!! clean($shortcode->title) !!}</h5>
                <div class="letter-background">{!! clean($shortcode->subtitle) !!}</div>
            </div>

            <div class="post-carausel-2 post-module-1 row">
                @foreach (get_galleries($shortcode->limit) as $gallery)
                    <div class="col">
                        <div class="post-thumb position-relative">
                            <div class="thumb-overlay img-hover-slide border-radius-5 position-relative lazy"
                                data-bg="{{ RvMedia::getImageUrl($gallery->image, 'medium', false, RvMedia::getDefaultImage()) }}"
                                style="background-image: url({{ RvMedia::getImageUrl(theme_option('img_loading')) }})">
                                <a class="img-link" href="{{ $gallery->url }}"></a>
                                @if($loop->index == 0)
                                    <span class="top-right-icon background5"><i class="ti-heart"></i></span>
                                @endif
                                <div class="post-content-overlay">
                                    <h6 class="post-title">
                                        <a class="color-white" href="{{ $gallery->url }}">{{ $gallery->name }}</a>
                                    </h6>
                                    <div class="entry-meta meta-1 font-small color-grey mt-10 pr-5 pl-5">
                                    <span
                                        class="post-on">{{ $gallery->created_at->format(post_date_format(false)) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
