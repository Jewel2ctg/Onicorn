<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Productreceive extends Model
{
   public function product()
  {
    return $this->belongsTo(Product::class);
  }
}
