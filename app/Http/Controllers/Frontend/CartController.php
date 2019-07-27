<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Frontend\Cart;
use App\Model\Frontend\Wish;
use App\Model\Backend\Coupon;
use Session; 


class CartController extends Controller
{
  public function __construct()
    {
        $this->middleware(['auth'=>'verified']);
    }
    

    public function index(){
    	
      return view('frontend.pages.cart');
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

    if (!is_null($cart)) {
      $cart->increment('product_quantity');
    }else {
      $cart = new Cart();
      if (Auth::check()) {
        $cart->user_id = Auth::id();
      }
      $cart->ip_address = request()->ip();
      $cart->product_id = $request->product_id;
      $cart->save();
        
      $wish = Wish::where('user_id', Auth::id())
      ->where('product_id', $request->product_id)
      ->where('cart_id', NULL)
      ->first();
    
    if(!is_null($wish)){
     $wish->cart_id=$cart->id;
     $wish->save();


    }
    }

    session()->flash('success', 'Product has added to cart !!');
     return json_encode(['status' => 'success', 'Message' => 'Item added to cart', 'totalItems' => Cart::totalItems(),'totalWishItems' => Wish::totalWishItems()]) ;

    
}
    public function update(Request $request, $id)
  {
    $cart = Cart::find($id);
    if (!is_null($cart)) {
      $cart->product_quantity = $request->product_quantity;
      $cart->save();
    }else {
      return redirect()->route('carts');
    }
    session()->flash('success', 'Cart item has updated successfully !!');
    return back();
  }

   public function destroy($id)
  {
    $cart = Cart::find($id);
    if (!is_null($cart)) {
      $cart->delete();
    }else {
      return redirect()->route('carts');
    }
    session()->flash('success', 'Cart item has deleted !!');
    return view('frontend.pages.cart_body');
  }
public function movetowish($id)
  {
    $cart = Cart::find($id);
    if (!is_null($cart)) {

      if (Auth::check()) {
      $wish = Wish::where('user_id', Auth::id())
      ->where('product_id', $cart->product_id)
      ->first();
}
if (!is_null($wish)) {
      $wish->cart_id=NULL;
      $wish->save();
    }else {
$wish = new Wish();
      if (Auth::check()) {
        $wish->user_id = Auth::id();
      }
      $wish->ip_address = request()->ip();
      $wish->product_id = $cart->product_id;
      $wish->save();
}

      $cart->delete();
    }else {
      return redirect()->route('carts');
    }
    session()->flash('success', 'Cart item has deleted !!');
    return view('frontend.pages.cart_body');
  }

  public function updateCartQuantity($id,$quantity){

    Cart::where('id',$id)->increment('product_quantity',$quantity);
    session()->flash('success', 'Cart item has Updated !!');
    return view('frontend.pages.cart_body');
    

  }


}
