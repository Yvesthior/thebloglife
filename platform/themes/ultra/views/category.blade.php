@php Theme::layout('homepage'); @endphp

<div class="archive-header text-center">
    <div class="container">
        <h1><span class="color2">{{ $page->name ?? SeoHelper::getTitle() }}</span></h1>
        {!! Theme::partial('breadcrumbs') !!}
        <div class="bt-1 border-color-1 mt-30 mb-50"></div>
    </div>
</div>

<div class="main_content sidebar_right pb-50">
    <div class="container">
        {!! Theme::partial('posts', ['posts' => $posts]) !!}
    </div>
</div>>
