<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\Resource;

//class PostCollection extends ResourceCollection
class PostCollection extends Resource

{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'Post ID' =>  $this->id,
            'Post Title' => $this->title,
//            'Content' => $this->body,
//            'Friendly URL' => $this->slug,
            'Created at' => $this->created_at,
            'Updated at' => $this->updated_at,
            'Link' => route('post.show', $this->id)
        ];
    }
}
