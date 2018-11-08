<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article_Tag extends Model
{
    protected $table='article_tag';

    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }
}
