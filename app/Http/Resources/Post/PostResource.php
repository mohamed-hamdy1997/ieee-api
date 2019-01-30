<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;
use Tymon\JWTAuth\Facades\JWTAuth;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        try{
            $user = JWTAuth::parseToken()->authenticate();
            if (($user->id == $this->user_id) || ($user->type == 'admin')) {
                return [
                    'title' => $this->title,
                    'body' => $this->body,
                    'post_image' => $this->post_image,
                    'post_video' => $this->post_video,
                    'post_file' => $this->post_file,
                    'created_at' => $this->created_at,
                    'post_owner' =>$this->user->name,
                    'href' => [
                        'edit' => action('PostsController@update', $this->id),
                        'delete' => action('PostsController@destroy', $this->id),
                    ]
                ];
            }else{
                return [
                    'title' => $this->title,
                    'body' => $this->body,
                    'post_image' => $this->post_image,
                    'post_video' => $this->post_video,
                    'post_file' => $this->post_file,
                    'created_at' => $this->created_at,
                    'post_owner' => $this->user->name,
                ];
            }
        }catch (\Exception $e){
                return [
                    'title' => $this->title,
                    'body' => $this->body,
                    'post_image' => $this->post_image,
                    'post_video' => $this->post_video,
                    'post_file' => $this->post_file,
                    'created_at' => $this->created_at,
                    'post_owner' => $this->user->name
                ];
            }
    }
}
