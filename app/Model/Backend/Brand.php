<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function products()
  {
    return $this->hasMany(Category::class);
  }
}
