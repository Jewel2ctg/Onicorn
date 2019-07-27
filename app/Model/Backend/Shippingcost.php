<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Shippingcost extends Model
{
   public function districts(){
   	 return $this->hasOne(District::class, 'id','district_id');
   }
}
