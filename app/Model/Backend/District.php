<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function division()
    {
      return $this->belongsTo(Division::class);
    }
    public function users()
    {
      return $this->hasMany(User::class);
    }

    
}
