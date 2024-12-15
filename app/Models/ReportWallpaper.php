<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportWallpaper extends Model
{
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
}
