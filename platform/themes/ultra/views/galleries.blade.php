@php Theme::layout('homepage'); @endphp
<div class="main_content sidebar_right pb-50">
    <div class="container">
        <div class="pt-65 pb-35">
            @if (isset($galleries) && !$galleries->isEmpty())
                <div class="row post-module-1 row">
                    @foreach ($galleries as $gallery)
                        <div class="col-6 col-md-4 mb-40 wow fadeIn  animated">
                            <div class="post-thumb position-relative">
                                <div class="thumb-overlay img-hover-slide border-radius-5 position-relative"
                                     style="background-image: url({{ RvMedia::getImageUrl($gallery->image, 'medium', false, RvMedia::getDefaultImage()) }})">
                                    <a class="img-link" href="{{ $gallery->url }}"></a>
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
            @endif
        </div>
    </div>
</div>
