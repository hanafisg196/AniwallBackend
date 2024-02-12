<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wallpaper extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $guarded =['id'];

    public function category()
    {
        return $this->belongsTo(Category::class, "cat_id", "id");
    }

    public function users()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, "wallpaper_id", "id");
    }
}
