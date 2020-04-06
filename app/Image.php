<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table ='post_image';

    public function images()
    {
        return $this->belongsTo('App\Post');
    }
}
