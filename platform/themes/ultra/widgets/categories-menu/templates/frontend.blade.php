<div class="sidebar-widget widget_categories mb-50">
    <div class="widget-header position-relative mb-20">
        <h5 class="widget-title mt-5">{{__('Categories')}}</h5>
    </div>
    <div class="post-block-list post-module-1 post-module-5">
        <ul>
            @foreach(get_popular_categories(5) as $category)
                <li class="cat-item">
                    <a href="{{ $category->url }}">{{ $category->name }}</a>
                    ({{ $category->posts_count }})
                </li>
            @endforeach
        </ul>
    </div>
</div>
