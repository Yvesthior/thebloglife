<div class="pt-50 pb-50 {{ $shortcode->background_style }}">
    <div class="container">
        <div class="sidebar-widget">
            <div class="widget-header position-relative mb-30">
                <h5 class="widget-title mb-30 text-uppercase color1 font-weight-ultra">{!! clean($shortcode->title) !!}</h5>
                <div class="letter-background">{!! clean($shortcode->subtitle) !!}</div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="pt-30 bt-1 border-color-1"></div>
                </div>
                @foreach($postCollectionData->posts as $post)
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                        {!! Theme::partial('components.post-card-1-block', [
                        'post' => $post,
                        'showDescription' => false,
                        'dateLongFormat' => false,
                        ]) !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
