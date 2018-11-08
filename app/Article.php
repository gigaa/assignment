<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table='articles';
    protected $fillable = [
        'title', 'content',
    ];

    public function article_comment()
    {
        return $this->hasMany('App\Article_Comment');
    }

    public function article_tag()
    {
        return $this->hasMany('App\Article_Tag');
    }

    
}
