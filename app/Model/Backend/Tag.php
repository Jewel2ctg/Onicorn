<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    

     public function products()
    {
    	return $this->belongsToMany('App\Model\Backend\Product','product_tags')->withTimestamps();
    }
}
