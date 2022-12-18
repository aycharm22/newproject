<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = ['post_title','post_category_id','post_author','post_image','post_date','post_content','status'];

    public function category(){
        return $this->belongsTo('App\Category','post_category_id','id');
    }

}

