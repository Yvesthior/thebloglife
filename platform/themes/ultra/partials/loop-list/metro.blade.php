<div class="col-lg-12 col-md-12 col-sm-12">
    @if(!empty($posts) && $posts->total() > 0)
        <div class="loop-metro post-module-1 row">
            @foreach($posts as $post)
                <article class="col-lg-4 col-md-6 col-sm-12 mb-30">
                    {!! Theme::partial('components.post-card-panel', ['post' => $post]) !!}
                </article>
            @endforeach
        </div>
        <div class="pagination-area pt-30 text-center bt-1 border-color-1">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            {!! $posts->withQueryString()->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p class="text-center">{{ __('No posts') }}</p>
    @endif
</div>
