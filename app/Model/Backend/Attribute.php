<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
     public function types()
    {
    	return $this->belongsToMany('App\Model\Backend\Types','attributes_types')->orderBy('created_at','DESC')->paginate(5);
    }

     public function specifications()
  {
    return $this->hasMany(Specifications::class);
  }
}
 