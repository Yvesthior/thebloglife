<div class="list-selected-posts @if (!$relatedPosts->count()) hidden @endif">
    <div class="mt20"><label class="text-title-field">{{ __('Selected posts') }}:</label></div>
    <div class="table-wrapper p-none mt10 mb20 ps-relative">
        <table class="table-normal">
            <tbody>
            @foreach($relatedPosts as $post)
                <tr>
                    <td class="width-60-px min-width-60-px">
                        <div class="wrap-img vertical-align-m-i">
                            <img class="thumb-image" src="{{ RvMedia::getImageUrl($post->image, 'thumb', false, RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}">
                        </div>
                    </td>
                    <td class="pl5 p-r5 min-width-200-px">
                        <a class="hover-underline pre-line" href="{{ route('posts.edit', $post->id) }}">{{ $post->name }}</a>
                    </td>
                    <td class="pl5 p-r5 text-end width-20-px min-width-20-px">
                        <a href="#" class="btn-trigger-remove-selected-post" title="{{ __('delete') }}" data-id="{{ $post->id }}">
                            <i class="fa fa-times"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
