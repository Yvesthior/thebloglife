<div class="row">
    @php
        $postsLayout = !empty($postsLayout) ? $postsLayout : theme_option('posts_layout', 'list');
        if (empty($postsLayout)) {
            $postsLayout = 'list';
        }
    @endphp

    {!! Theme::partial('loop-list.' . $postsLayout, compact('posts')) !!}
</div>
