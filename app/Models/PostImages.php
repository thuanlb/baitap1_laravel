<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostImages extends Model
{
    protected $fillable = [
        'post_id','url',
    ];

    public function post(){
		return $this->belongsTo(Post::class);
    }
}
