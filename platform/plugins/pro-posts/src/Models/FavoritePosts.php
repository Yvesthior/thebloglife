<?php

namespace TheSky\ProPosts\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Models\BaseModel;
use Botble\Blog\Models\Post;
use Botble\Member\Models\Member;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FavoritePosts extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'favorite_posts';

    /**
     * @var array
     */
    protected $fillable = [
        'post_id',
        'user_id',
        'type'
    ];

    /**
     * @return BelongsToMany
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class)->withDefault();
    }

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(Member::class)->withDefault();
    }
}
