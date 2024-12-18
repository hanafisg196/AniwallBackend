<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'admob_app_id' => $this->admob_app_id,
            'admob_banner' => $this->admob_banner,
            'admob_native' => $this->admob_native,
            'admob_interstitial' => $this->admob_interstitial,
            'admob_open' => $this->admob_open,
            'admob_reward' => $this->admob_reward,
            'interstitial_click' => $this->interstitial_click,
            'native_item' => $this->native_item
        ];
    }
}
