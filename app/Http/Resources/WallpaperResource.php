<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WallpaperResource extends JsonResource
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
            'resolution' => $this->resolution,
            'view' => $this->view,
            'download' => $this->download,
            'premium' => $this->premium,
            'review' => $this->review,
            'enabled' => $this->enabled,
            'size' => $this->size,
            'cat_id' => $this->cat_id,
            'user_id' => $this->user_id,
        ];
    }
}
