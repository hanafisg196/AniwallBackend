<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $guarded =['id'];

    public function wallpapers()
    {
        return $this->hasMany(Wallpaper::class, 'slide_id', 'id');
    }

}
