<!-- Recent Posts Start -->
<div class="recent-area pt-50 pb-50 {{ $shortcode->background_style }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="widget-header position-relative mb-30">
                    <h5 class="widget-title mb-30 text-uppercase color1 font-weight-ultra">{!! clean($shortcode->title) !!}</h5>
                    <div class="letter-background">{!! clean($shortcode->subtitle) !!}</div>
                </div>
                <div class="loop-list">
                    @foreach (get_recent_posts($shortcode->limit ?? 4) as $post)
                        <article class="row mb-50">
                            {!! Theme::partial('components.post-card-2-block', ['post' => $post]) !!}
                        </article>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="widget-area">
                    @if($shortcode->show_follow_us_section)
                        {!! Theme::partial('components.sidebar-social') !!}
                    @endif

                    <div class="sidebar-widget widget-taber mb-30">
                        <div class="widget-taber-content background-white pt-30 pb-30 pl-30 pr-30 border-radius-5">
                            <nav class="tab-nav float-none mb-20">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link text-uppercase active" id="nav-popular-tab"
                                       data-toggle="tab"
                                       href="#nav-popular" role="tab" aria-controls="nav-popular"
                                       aria-selected="true">{{ __('Popular') }}</a>
                                    <a class="nav-item nav-link text-uppercase" id="nav-trending-tab" data-toggle="tab"
                                       href="#nav-trending" role="tab" aria-controls="nav-trending"
                                       aria-selected="false">{{ __('Feature') }}</a>
                                    <a class="nav-item nav-link text-uppercase" id="nav-comment-tab" data-toggle="tab"
                                       href="#nav-comment" role="tab" aria-controls="nav-comment"
                                       aria-selected="false">{{ __('Comments') }}</a>
                                </div>
                            </nav>

                            <div class="tab-content">
                                <!--Tab Popular-->
                                <div class="tab-pane fade show active" id="nav-popular" role="tabpanel"
                                     aria-labelledby="nav-popular-tab">
                                    <div class="post-block-list post-module-1">
                                        <ul class="list-post">
                                            @foreach(get_popular_posts($shortcode->tab_post_limit ?? 4) as $post)
                                                <li class="mb-30">
                                                    {!! Theme::partial('components.post-card-2-block-simple', ['post' => $post]) !!}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <!--Tab Trending-->
                                <div class="tab-pane fade" id="nav-trending" role="tabpanel"
                                     aria-labelledby="nav-trending-tab">
                                    <div class="row">
                                        @foreach(get_featured_posts($shortcode->tab_post_limit ?? 4) as $post)
                                            <div class="col-md-6 col-sm-6 sm-grid-content mb-30">
                                                {!! Theme::partial('components.post-card-1-block-simple', ['post' => $post]) !!}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!--Tab Comments-->
                                <div class="tab-pane fade" id="nav-comment" role="tabpanel"
                                     aria-labelledby="nav-comment-tab">
                                    <div class="post-block-list post-module-1">
                                        <ul class="list-post">
                                            @foreach(get_recent_comment_posts($shortcode->tab_post_limit ?? 4) as $post)
                                                <li class="mb-30">
                                                    {!! Theme::partial('components.post-card-2-block-simple', ['post' => $post]) !!}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($shortcode->ads_location)
                        {!! display_ad($shortcode->ads_location, ['class' => 'sidebar-widget mb-30 text-center']) !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Recent Posts End -->
