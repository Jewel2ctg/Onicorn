<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Model\Backend\Country;
use App\Model\Backend\Division;
use App\Model\Backend\District;
use App\Model\Backend\Order;
use App\Model\Frontend\Cart;

class CheckoutController extends Controller
{
   public function __construct()
    {
        $this->middleware(['auth'=>'verified']);
    }

     public function index(){
      if (Auth::check()){

     $user = User::where('id', Auth::id())->first();
    
     $countries=Country::orderBy('name', 'asc')->get();
     $divisions=Division::orderBy('name', 'asc')->get();
     $districts=District::orderBy('name', 'asc')->get();
     return view('frontend.pages.checkout' ,compact('user','countries','divisions','districts'));
 }}

 public function store(Request $request){

     $this->validate($request, [
      'shippingname'  => 'required|string',
      'shippingemail'  => 'required|email',
      'shippingphone'  => 'required|string',
      'shippingaddress'  => 'required|string',
      'country_id'  => 'required|numeric',
      'division_id'  => 'required|numeric',
      'district_id'  => 'required|numeric',
      'group1'  => 'required|numeric',
      'carttotalamount'  => 'required|numeric',
      'couponcodediscount'  => 'required|numeric',
      'shippingcost'  => 'required|numeric',
      'grandtotal'  => 'required|numeric',
      
      
    ]);
  
    $order = new Order();
    $order->user_id = Auth::id();
    $order->ip_address = request()->ip();
    $order->name = Auth::user()->first_name." ".Auth::user()->last_name;
    $order->phone_no = Auth::user()->phone_no;
    $order->carttotalamount = $request->carttotalamount;
    $order->couponcodediscount = $request->couponcodediscount;
    $order->shippingcost = $request->shippingcost;
    $order->grand_total  = $request->grandtotal;

    $order->payment_mode  = $request->group1;

    
    $order->order_id = $this->createSlug(substr($request->shippingname, 0, 3).time().substr($request->shippingname, -3));
       


   // dd($order->order_id);
    $order->currency = "BDT";
     $order->shippingname  =$request->shippingname;
      $order->shippingemail  =$request->shippingemail;
            $order->shippingphone  =$request->shippingphone;
      $order->shippingaddress  =$request->shippingaddress;
      $order->country_id  =$request->country_id;
      $order->division_id  =$request->division_id;
      $order->district_id  =$request->district_id;

    $order->email  = Auth::user()->email;
    $order->message = $request->shippingmsg;
    
   
   
    
    
    $order->save();
    $tran_id=$order->order_id;
    $total_amount=$order->grand_total;

$cartitem=Cart::where('user_id',Auth::id())->get();
foreach ($cartitem as $cart) {
    # code...
$cart->update(['order_id' => $order->id]);
}


    if($order->payment_mode==2)
{
     session()->flash('success', 'Your order has taken successfully !!! Please wait admin will soon confirm it.');
    return redirect()->route('index');
}
else
{
    return redirect()->route('payment',compact('tran_id','total_amount'));
}
    //dd($request);

 }


 public function createSlug($title, $id = 0)
    {
        // Normalize the title
        $slug = str_slug($title);
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Order::select('order_id')->where('order_id', 'like', $slug.'%')
        ->where('id', '<>', $id)
        ->get();
    }




}
