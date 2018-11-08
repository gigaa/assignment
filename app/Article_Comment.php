<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article_Comment extends Model
{
     protected $table='article_comment';




    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
}
