<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
     public function divisions()
  {
    return $this->hasMany(Division::class);
  }
}
