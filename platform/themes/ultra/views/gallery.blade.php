@php Theme::layout('homepage'); @endphp
<div class="main_content sidebar_right pb-50">
    <div class="page-header page-header-style-1 text-center">
        <div class="container">
            <h1><span class="color2">{{ SeoHelper::getTitle() }}</span></h1>
            {!! Theme::partial('breadcrumbs') !!}
            <div class="bt-1 border-color-1 mt-30 mb-50"></div>
        </div>
    </div>

    <div class="container">
        <div class="pb-35">
            <p>{!! clean($gallery->description) !!}</p>
            <div id="list-photo">
                @foreach (gallery_meta_data($gallery) as $image)
                    @if ($image)
                        <div class="item" data-src="{{ RvMedia::getImageUrl(Arr::get($image, 'img')) }}"
                             data-sub-html="{{ clean(Arr::get($image, 'description')) }}">
                            <div class="photo-item">
                                <div class="thumb img-hover-scale overflow-hidden border-radius-10">
                                    <a href="{{ RvMedia::getImageUrl(Arr::get($image, 'img')) }}">
                                        <img src="{{ RvMedia::getImageUrl(Arr::get($image, 'img')) }}"
                                             alt="{{ clean(Arr::get($image, 'description')) }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <br>
            {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, Theme::partial('comments')) !!}
        </div>
    </div>
</div>
