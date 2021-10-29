<div class="panel-body">
    <div class="list-search-data">
        <ul class="clearfix">
            @if (!$posts->isEmpty())
                @foreach($posts as $post)
                    <li class="selectable-item clearfix" style="margin-bottom: 10px; cursor: pointer"
                        data-name="{{ $post->name }}"
                        data-image="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}"
                        data-id="{{ $post->id }}" data-url="{{ route('posts.edit', $post->id) }}">
                        <div class="wrap-img inline_block vertical-align-t float-start inline-block">
                            <img class="thumb-image"
                                 src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}"
                                 alt="{{ $post->name }}">
                        </div>
                        <label class="inline_block ml10 mt10 ws-nm"
                               style="width:calc(100% - 100px); cursor: pointer">{{ $post->name }}</label>
                    </li>
                @endforeach
            @else
                <li>
                    <p>{{ __('No result') }}</p>
                </li>
            @endif
        </ul>
    </div>
</div>

@if ($posts->hasPages())
    <div class="panel-footer">
        <div class="btn-group float-end">
            {!! $posts->links() !!}
        </div>
        <div class="clearfix"></div>
    </div>
@endif
