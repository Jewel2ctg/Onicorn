<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Frontend\Wish;
use App\Model\Frontend\Cart;
use Auth;

class WishController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'=>'verified']);
    }
    

    public function index(){
    	
      return view('frontend.pages.wish');
    }
public function store(Request $request){

      
    	$this->validate($request, [
      	'product_id' => 'required'
    ],
    [
      'product_id.required' => 'Please give a product'
    ]);


    if (Auth::check()) {
      $cart = Cart::where('user_id', Auth::id())
      ->where('product_id', $request->product_id)
      ->where('order_id', NULL)
      ->first();
    }
    if(!is_null($cart)){
    	return json_encode(['status' => 'success', 'Message' => 'Item already in your cart', 'totalWishItems' => Wish::totalWishItems()]) ;

    }else{ if (Auth::check()) {
      $wish = Wish::where('user_id', Auth::id())
      ->where('product_id', $request->product_id)
      ->where('cart_id', NULL)
      ->first();
    }
    if (!is_null($wish)) {
      $wish->increment('product_quantity');
    }else {
      $wish = new Wish();
      if (Auth::check()) {
        $wish->user_id = Auth::id();
      }
      $wish->ip_address = request()->ip();
      $wish->product_id = $request->product_id;
      $wish->save();
    }

    session()->flash('success', 'Product has added to wish !!');
     return json_encode(['status' => 'success', 'Message' => 'Item added to wish', 'totalWishItems' => Wish::totalWishItems()]) ;

    }
}

 public function destroy($id)
  {
    $wish = Wish::find($id);
    if (!is_null($wish)) {
      $wish->delete();
    }else {
      return redirect()->route('wish');
    }
    session()->flash('success', 'Wish item has deleted !!');
    return view('frontend.pages.wish_body');
  }

 public function movetocart($id)
  {
    $wish = Wish::find($id);
    if (!is_null($wish)) {

      $cart = new Cart();
      if (Auth::check()) {
        $cart->user_id = Auth::id();
      }
      $cart->ip_address = request()->ip();
      $cart->product_id = $wish->product_id;
      $cart->product_quantity=$wish->product_quantity;
      $cart->save();
      

      $wish->cart_id=$cart->id;
      $wish->save();

    }else {
      return redirect()->route('wish');
    }
    session()->flash('success', 'Wish Move to Cart Successfully !!');
    return view('frontend.pages.wish_body');
  }

public function updateWishQuantity($id,$quantity){

    Wish::where('id',$id)->increment('product_quantity',$quantity);
    session()->flash('success', 'Wish item has Updated !!');
    return view('frontend.pages.wish_body');
    

  }
}
