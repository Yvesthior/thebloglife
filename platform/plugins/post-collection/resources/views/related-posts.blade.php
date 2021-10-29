<div id="posts-extras" class="widget meta-boxes">
    <div class="widget-title">
        <h4><span>{{ __('Related posts') }}</span></h4>
    </div>
    <div class="widget-body">
        <div class="form-group mb-3">
            <input type="hidden" name="related_posts" value="@if ($relatedPosts){{ implode(',', $relatedPosts->pluck('id')->toArray()) }}@endif" />
            <div class="box-search-advance">
                <div>
                    <input type="text" class="next-input textbox-advancesearch" placeholder="{{ __('Search post') }}" data-target="{{ $dataUrl }}">
                </div>
                <div class="panel panel-default"></div>
            </div>
            @include('plugins/post-collection::selected-posts-list')
        </div>
        <hr>
    </div>
</div>

<script id="selected_post_list_template" type="text/x-custom-template">
    <tr>
        <td class="width-60-px min-width-60-px">
            <div class="wrap-img vertical-align-m-i">
                <img class="thumb-image" src="__image__" alt="__name__" title="__name__">
            </div>
        </td>
        <td class="pl5 p-r5 min-width-200-px">
            <a class="hover-underline pre-line" href="__url__">__name__</a>
            <p class="type-subdued">__attributes__</p>
        </td>
        <td class="pl5 p-r5 text-end width-20-px min-width-20-px">
            <a href="#" class="btn-trigger-remove-selected-post" title="{{ __('delete') }}" data-id="__id__">
                <i class="fa fa-times"></i>
            </a>
        </td>
    </tr>
</script>
