<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $guarded = [];

    public function postCategory()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
