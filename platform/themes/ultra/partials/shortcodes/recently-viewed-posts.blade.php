<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <div class="sec-heading center">
                    <h2>{!! clean($title) !!}</h2>
                    <p>{!! clean($description) !!}</p>
                </div>
            </div>
        </div>

        <div class="clear"></div>
        <br>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                @if($posts)
                    <div class="loop-metro post-module-1 row">
                        @foreach($posts as $post)
                            <article class="col-lg-4 col-md-6 col-sm-12 mb-30">
                                {!! Theme::partial('components.post-card-panel', ['post' => $post]) !!}
                            </article>
                        @endforeach
                    </div>
                    @if($posts->total() > 9)
                        <div class="pagination-area pt-30 text-center bt-1 border-color-1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <a class="btn btn-primary" href="{{ route('public.recently-viewed-posts') }}">{{ __('View more') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</section>
