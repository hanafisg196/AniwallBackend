<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Tags\HasTags;

class Wallpaper extends Model
{
    use HasFactory;
    use HasTags;
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

    public function slides()
    {
        return $this->belongsTo(Slide::class, "slide_id", "id");
    }

    public function favoritedByUsers(){
        return $this->belongsToMany(User::class,"favorites")->withTimestamps();
    }


}
