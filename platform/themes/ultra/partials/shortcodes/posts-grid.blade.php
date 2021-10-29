<!-- Recent Posts Start -->
<div class="pt-50 background-white">
    <div class="container">
        <div class="sidebar-widget loop-grid">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="widget-header position-relative mb-30">
                        <h5 class="widget-title mb-30 text-uppercase color4 font-weight-ultra">{{ $title }}</h5>
                        <div class="letter-background">{{ $subtitle }}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="pt-30 bt-1 border-color-1"></div>
                </div>
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                        {!! Theme::partial('components.post-card-1-block', ['post' => $post, 'showDescription' => false]) !!}
                    </div>
                @endforeach
                <div class="col-12">
                    <div class="mt-30 bt-1 border-color-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Recent Posts End -->
