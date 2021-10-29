{!! Theme::partial('header') !!}
<main class="position-relative">
    <div class="main_content pb-50 pt-50">
        <div class="page-header page-header-style-1 text-center">
            <div class="container">
                <h1><span class="color2">{{ SeoHelper::getTitle() }}</span></h1>
                {!! Theme::partial('breadcrumbs') !!}
                <div class="bt-1 border-color-1 mt-30 mb-50"></div>
            </div>
        </div>
        <div class="container">
            {!! Theme::content() !!}
        </div>
    </div>
</main>
{!! Theme::partial('footer') !!}
