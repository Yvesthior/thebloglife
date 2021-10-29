@php
    $categories = get_popular_categories($limit);
@endphp
<section class="pt-100 pb-65 bg-brand-4 popular-categories">
    <div class="container">
        <div class="header-title mb-65 layout-2">
            <h3 class="font-heading mb-0 wow fadeIn  animated">{!! clean($title) !!}</h3>
        </div>
        <div class="row carousel-6-columns  wow fadeIn  animated">
            @foreach (get_featured_categories(10, ['slugable', 'image']) as $category)
                <div class="col">
                    <div class="border-radius-10 position-relative category-thumb thumb-overlay lazy"
                        data-bg="{{ RvMedia::getImageUrl($category->image->meta_value[0], 'thumb', false, RvMedia::getDefaultImage()) }}"
                        style="background-image: url({{ RvMedia::getImageUrl(theme_option('img_loading')) }})">
                        <h5><a href="{{ $category->url }}">{{ $category->name }}</a></h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
