@php
    Theme::layout('full');
    $description = clean(__('We found :total articles for you.', ['total' => $posts->total()]));
@endphp

<main class="position-relative">
   
    <!--archive header-->
    <div class="archive-header text-center mb-50 mt-20">
        <div class="container">
            <p>{{ __('Search result') }}</p>
            <h1><span class="color2">{{ app('request')->input('q') }}</span></h1>
            <p class="font-small color-grey">{{ $description }} </p>
        </div>
    </div>

    <!--main content-->
    <div class="main_content sidebar_right pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <!--loop-list-->
                    <div class="loop-list loop-list-1">
                        @if($posts->first())
                            <article class="first-post mb-50 animate-conner">
                                {!! Theme::partial('components.post-card-1-block', ['post' => $posts->first()]) !!}
                            </article>
                        @endif
                
                        @foreach($posts->slice(1) as $post)
                            <article class="row mb-50">
                                {!! Theme::partial('components.post-card-2-block', ['post' => $post]) !!}
                            </article>
                        @endforeach
                    </div>
                
                    <!--pagination-->
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
                </div>
                <!--Right sidebar-->
                <div class="col-lg-4 col-md-12 col-sm-12 primary-sidebar sticky-sidebar">
                    <div class="widget-area pl-30">
                        {!! dynamic_sidebar('primary_sidebar') !!}
                    </div>
                </div>
                <!--End sidebar-->
            </div>
        </div>
    </div>
</main>