<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $casts = [
        'refresh_stat' => 'boolean',
    ];

    protected $fillable = [
        'admob_app_id',
        'admob_banner',
        'admob_native',
        'admob_interstitial',
        'admob_open',
        'admob_reward',
        'interstitial_click',
        'native_item',
        'refresh_stat'

    ];
}
