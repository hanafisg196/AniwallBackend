<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable = [
        'id',
        'wallpaper_id',
        'description',
        'reporter_email',
        'owner_name',
        'owner_email',
        'report_token'

    ];

    public function wallpapers()
    {
        return $this->belongsTo(Wallpaper::class, 'wallpaper_id', 'id');
    }
}
