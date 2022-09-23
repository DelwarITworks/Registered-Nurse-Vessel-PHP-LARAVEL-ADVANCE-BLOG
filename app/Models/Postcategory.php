<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Postcategory extends Model
{
    protected $guarded = [];

 
    public function Post()
    {
    	return $this->hasMany(Post::class);
    }
}
