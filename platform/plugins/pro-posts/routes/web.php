<?php

Route::group(['namespace' => 'TheSky\ProPosts\Http\Controllers', 'middleware' => ['web']], function () {

    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        Route::get('recently-viewed-posts', [
            'as'         => 'public.recently-viewed-posts',
            'uses'       => 'PublicController@getRecentlyViewedPosts',
            'middleware' => 'auth:member'
        ]);

        Route::get('favorite-post', [
            'as'         => 'public.favorite-post-listing',
            'uses'       => 'PublicController@getListFavorite',
            'middleware' => 'auth:member'
        ]);

        Route::get('bookmark-post', [
            'as'         => 'public.bookmark-post-listing',
            'uses'       => 'PublicController@getListBookmark',
            'middleware' => 'auth:member'
        ]);

        Route::post('favorite-post/subscribe', [
            'as'         => 'public.favorite-post',
            'uses'       => 'PublicController@favoritePost',
            'middleware' => 'auth:member'
        ]);

        Route::post('bookmark-post/subscribe', [
            'as'         => 'public.bookmark-post',
            'uses'       => 'PublicController@bookmarkPost',
            'middleware' => 'auth:member'
        ]);
    });
});
