<?php

use Botble\Member\Models\Member;

// Custom routes
Route::group(['namespace' => 'Theme\UltraNews\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        // Add your custom route here
        Route::get('ajax/get-panel-inner', 'UltraNewsController@ajaxGetPanelInner')
            ->name('theme.ajax-get-panel-inner');

    });
});

Theme::routes();

Route::group(['namespace' => 'Theme\UltraNews\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        Route::get('/', 'UltraNewsController@getIndex')
            ->name('public.index');

        Route::get('posts/videos', 'UltraNewsController@getNewsVideos')
            ->name('public.posts-videos');

        Route::get(SlugHelper::getPrefix(Member::class, 'author') . '/{slug}')
            ->uses('UltraNewsController@getAuthor')
            ->name('author.show');

        Route::get('sitemap.xml', 'UltraNewsController@getSiteMap')
            ->name('public.sitemap');

        Route::get('{slug?}' . config('core.base.general.public_single_ending_url'), 'UltraNewsController@getView')
            ->name('public.single');

        Route::get('login', 'LoginController@showLoginForm')
            ->name('public.member.login');

        Route::get('register', 'RegisterController@showRegistrationForm')
            ->name('public.member.register');

        Route::get('password/request',
            'ForgotPasswordController@showLinkRequestForm')->name('public.member.password.request');
    });
});
