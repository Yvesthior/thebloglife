<?php

namespace Botble\Comment\Http\Resources;

use Botble\Comment\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Botble\Comment\Http\Resources\RepCollection;
use Botble\Comment\Models\Comment;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'comment' => $this->comment,
            'time' => $this->time,
            'like_count' => $this->like_count,
            'liked' => $this->like_count ? true : false,
            'rep' => (int)$this->reply_count > 0 ?new RepCollection($this->replies()
                ->orderBy('created_at', 'DESC')
                ->paginate(5, ['*'], 'rep_page')) : [],
            'user' => new UserResource($this->user)
        ];
    }
}
