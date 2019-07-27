<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Backend\Product;

class CompareController extends Controller
{
    public function index()
    {
      $products=Product::find(Session('compare'));
      //dd($products);
    	
    	return view('frontend.pages.compare',compact('products'));
    }


    public function store(Request $request){
      
    	$this->validate($request, [
      	'product_id' => 'required'
    ],
    [
      'product_id.required' => 'Please give a product'
    ]);
if(!is_null(Session('compare'))){

if ( in_array($request->product_id, Session('compare') ) ) {
     
     return json_encode(['status' => 'success', 'Message' => 'Item already exist', 'totalCompareItems' => count(Session('compare'))]) ;
}
else if(count(Session('compare'))<4)
{
	$ptype=Product::find(Session('compare')[0]);
	$nptype=Product::find($request->product_id);
	if($ptype->type_id == $nptype->type_id){


	$request->session()->push('compare', $request->product_id);
	 
     return json_encode(['status' => 'success', 'Message' => 'Item added to compare', 'totalCompareItems' => count(Session('compare'))]) ;
}
return json_encode(['status' => 'success', 'Message' => 'Please add same product', 'totalCompareItems' => count(Session('compare'))]) ;
}
else
{
	 
     return json_encode(['status' => 'success', 'Message' => 'Please delect some product first', 'totalCompareItems' => count(Session('compare'))]) ;
}
}
else
{
	$request->session()->push('compare', $request->product_id);

	
     return json_encode(['status' => 'success', 'Message' => 'Item added to compare', 'totalCompareItems' => count(Session('compare'))]) ;
}





    }



    public function deleteall(){
    	session()->forget('compare');
      return redirect('/shop');
    }
   
    public function destroy(Request $request, $id){
      $index = array_search($id, Session('compare'));
     
    $request->session()->pull('compare.'.$index);
   $array = array_values(Session('compare'));
  
   if(!empty($array)){
   $request->session()->put('compare',$array);
 }else{session()->forget('compare');}
     session()->save();
      
return back();

    }
}
