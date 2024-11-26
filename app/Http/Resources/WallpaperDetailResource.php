<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WallpaperDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'thumbnail' => $this->thumbnail,
            'resolution' => $this->resolution,
            'view' => $this->view,
            'download' => $this->download,
            'premium' => $this->premium,
            'review' => $this->review,
            'enabled' => $this->enabled,
            'size' => $this->size,
            'cat_id' => $this->cat_id,
            'user_id' => $this->user_id,
            'users' => $this->whenLoaded('users', function (){
                return [
                    'id' => $this->users->id,
                    'name' => $this->users->name,
                    'avatar' => $this->users->avatar,
                ];
            })
        ];
    }
}
