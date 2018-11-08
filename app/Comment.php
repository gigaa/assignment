<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';
    protected $fillable = [
         'content',
    ];

    public function article_comment()
    {
        return $this->hasMany('App\Article_Comment');
    }
}
