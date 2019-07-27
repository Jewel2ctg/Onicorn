<?php

namespace App\Model\Frontend;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Model\Backend\Product;

class Cart extends Model
{
    
  public $fillable = [
    'user_id',
    'ip_address',
    'product_id',
    'product_quantity',
    'order_id'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function order()
  {
    return $this->belongsTo(Order::class);
  }

  public function product()
  {
    return $this->belongsTo(Product::class);
  }


/**
 * total carts
 * @return integer total cart model
 */
  public static function totalCarts()
  {
    if (Auth::check()) {
      $carts = Cart::where('user_id', Auth::id())
      
      ->where('order_id', NULL)
      ->get();
    return $carts;
      
    }
  }

/**
 * total Items in the cart
 * @return integer total item
 */
  public static function totalItems()
  {
    $carts = Cart::totalCarts();

    $total_item = 0;
if(!is_null($carts)){
    foreach ($carts as $cart) {
      $total_item += $cart->product_quantity;
    }}
    return $total_item;
  }


}
