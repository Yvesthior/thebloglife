<?php

namespace Botble\Comment\Http\Resources;

use Botble\Comment\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Botble\Comment\Models\Comment;

class RepCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (Comment $comment) {
            return (new CommentResource($comment));
        });
        return [
            'data' => $this->collection,
            'pagination' => [
                'per_page' => $this->perPage(),
                'total' => $this->total(),
                'current_page' => $this->currentPage(),
                'last_page' => $this->lastPage()
            ],
     
        ];
    }
}
