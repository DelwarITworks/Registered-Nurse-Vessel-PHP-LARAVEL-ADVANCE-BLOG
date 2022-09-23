<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Postcategory;

class Post extends Model
{
    protected $guarded = [];

    public function Postcategory()
    {
    	return $this->belongsTo(Postcategory::class);
    }
}
