<?php

namespace Botble\PostCollection\Models;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Botble\Base\Traits\EnumCastable;
use Botble\Blog\Models\Post;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PostCollection extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'post_collections';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'name',
        'image',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    /**
     * @return BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(
            Post::class,
            'post_collections_posts',
            'post_collection_id',
            'post_id'
        );
    }
}
