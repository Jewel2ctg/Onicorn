<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public $fillable = [
    'code',
    'type',
    'amount',
    'expiredate'
  ];
}
