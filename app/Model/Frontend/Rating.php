<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Auth;

class Rating extends Model
{
	public $fillable = [
    'product_id',
    'user_id',
    'review',
    'rating'
  ];

    public function user()
  {
    return $this->belongsTo(User::class);
  }
}
