<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
     public function attributes()
    {
    	return $this->belongsToMany('App\Model\Backend\Attribute','attributes_types')->withTimestamps();
    }
    public function products()
    {
      return $this->hasMany(Product::class);
    }


}
