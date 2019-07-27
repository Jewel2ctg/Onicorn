<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
     public function tags()
    {
    	return $this->belongsToMany('App\Model\Backend\Tag','product_tags')->withTimestamps();
    }

    public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function brand()
  {
    return $this->belongsTo(Brand::class);
  }
  public function type()
  {
    return $this->belongsTo(Types::class);
  }

  public function images()
  {
    return $this->hasMany(ProductImage::class);
  }
 public function specification()
  {
    return $this->hasMany(Specification::class);
  }

  public function productreceive()
  {
    return $this->hasMany(Productreceive::class);
  }
}
