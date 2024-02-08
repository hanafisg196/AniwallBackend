<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $guarded =['id'];

    public function wallpapers()
    {
        return $this->hasMany(Wallpaper::class, "cat_id", "id");
    }
}
