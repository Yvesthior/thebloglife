<div class="related-posts">
    <h3 class="mb-30">{{ __('Related posts') }}</h3>
    <div class="loop-list">
        @foreach ($relatedPosts as $post)
            <article class="row mb-30">
                {!! Theme::partial('components.post-card-2-block', [
                    'post' => $post,
                    'columnStyle' => [4,8],
                    'showReadMoreText' => false
                ]) !!}
            </article>
        @endforeach
    </div>
</div>
