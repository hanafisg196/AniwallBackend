<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'description' => $this->description,
            'reporter_email' => $this->reporter_email,
            'owner_name' => $this->owner_name,
            'owner_email' => $this->owner_email,
            'report_token'=> $this->report_token,
            'wallpaper_name'=> $this->wallpaper_name,
        ];

    }
}
