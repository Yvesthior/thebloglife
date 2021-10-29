<?php

Route::group(['namespace' => 'Botble\PostCollection\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'post-collections', 'as' => 'post-collection.'], function () {
            Route::resource('', 'PostCollectionController')->parameters(['' => 'post-collection']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'PostCollectionController@deletes',
                'permission' => 'post-collection.destroy',
            ]);
        });

        Route::get('get-posts-collection-relations', [
            'as'         => 'posts-collection-relations',
            'uses'       => 'PostCollectionController@getRelationBoxes',
            'permission' => 'post-collection.edit',
        ]);

        Route::get('get-list-post-for-search', [
            'as'         => 'list-post-for-search',
            'uses'       => 'PostCollectionController@getListForSelect',
            'permission' => 'post-collection.edit',
        ]);
    });

});
