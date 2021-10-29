<?php

namespace Botble\PostCollection\Models;

use Botble\Base\Models\BaseModel;

class PostCollectionPosts extends BaseModel
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'post_collections_posts';

    /**
     * @var array
     */
    protected $fillable = [
        'post_collection_id',
        'post_id',
    ];
}
