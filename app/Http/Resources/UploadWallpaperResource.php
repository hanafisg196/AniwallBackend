<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class UploadWallpaperResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'thumbnail' => $this->thumbnail,
            'type' => $this->type,
            'resolution' => $this->resolution,
            'cat_id' => $this->cat_id,
            'size'=> $this->size,
        ];


    }
}
