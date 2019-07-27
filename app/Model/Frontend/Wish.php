<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\Product;
use Auth;

class Wish extends Model
{
	 public $fillable = [
    'user_id',
    'ip_address',
    'product_id',
    'product_quantity',
    'cart_id'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function cart()
  {
    return $this->belongsTo(Cart::class);
  }

  public function product()
  {
    return $this->belongsTo(Product::class);
  }

    /**
 * total wish
 * @return integer total cart model
 */
  public static function totalWish()
  {
    if (Auth::check()) {
      $wish = Wish::where('user_id', Auth::id())
      
      ->where('cart_id', NULL)
      ->get();
    return $wish;
      
    }
  }

/**
 * total Items in the wish
 * @return integer total item
 */
  public static function totalWishItems()
  {
    $wish = Wish::totalWish();

    $total_item = 0;
if(!is_null($wish)){
    foreach ($wish as $wish) {
      $total_item += $wish->product_quantity;
    }}
    return $total_item;
  }



}
