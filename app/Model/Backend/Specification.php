<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    public function attributes()
  {
    return $this->belongsTo(Attribute::class,'attribute_id');
  }
}
