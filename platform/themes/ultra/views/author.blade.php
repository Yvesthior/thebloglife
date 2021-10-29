@php Theme::layout('no-breadcrumbs'); @endphp
<div class="author">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--author box-->
                <div class="author-bio mb-50">
                    <div class="author-image mb-30">
                        <img
                            src="{{ RvMedia::getImageUrl($author->avatar->url, 'thumb', false, RvMedia::getDefaultImage()) }}"
                            loading="lazy" alt="{{ $author->name }}" class="avatar">
                    </div>
                    <div class="author-info">
                        <h3><span class="vcard author"><span class="fn">{{ $author->name }}</span></span></h3>
                        <h5>{{ __('About author') }}</h5>
                        <div class="author-description">{!! clean($author->description) !!}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            @if ($posts->count() > 0)
                <div class="related-posts">
                    <div class="loop-list">
                        {!! Theme::partial('posts', ['posts' => $posts]) !!}
                    </div>
                </div>
            @else
                <p>{{ __('No posts found!') }}</p>
            @endif
            </div>
        </div>
    </div>
</div>
