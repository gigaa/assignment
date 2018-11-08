<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function article_tag()
    {
        return $this->hasMany('App\Article_Tag');
    }
}
