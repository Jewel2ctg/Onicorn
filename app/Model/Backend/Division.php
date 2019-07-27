<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    public function districts()
  {
    return $this->hasMany(District::class);
  }

   public function users()
    {
      return $this->hasMany(User::class);
    }

     public function country()
    {
      return $this->belongsTo(Country::class);
    }
}
