<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //protected $table = '<table_name>';
    //protected $primarykey = '<key>';
    protected $fillable = [
        'title',
        'content',
        'like',

    ];

    public function posts(){
        return $this->hasMany(Post::class, 'post_id', 'id');
    }
}
