<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Backend\Product;
use App\Model\Backend\Slider;
use App\Model\Backend\Category;
use App\Model\Backend\Brand;
use App\Model\Backend\Productreceive;
use App\Model\Frontend\Rating;

class PagesController extends Controller
{
    public function index(){
        $sliders = Slider::orderBy('priority', 'asc')->get();
        $categories=Category::where('parent_id', null)->orderBy('name','asc')->get();
        $brands=Brand::orderBy('name','asc')->get();
        //$topsales=Product::orderBy('sold_quantity','desc')->take(10)->get();
        $topsales=Productreceive::with('product')->groupBy('product_id')->selectRaw('sum(soldquantity) as sum,product_id')->orderBy('sum','desc')->take(10)->get();
       // $topsales=Productreceive::with('product')->take(10)->get();

       //dd($topsales);
        return view('frontend.pages.home',compact('sliders','categories','brands','topsales'));
    }
    public function product(Request $request){

        if ($request->ajax() && isset($request->start)){
            $pageheading="All Product";
            $start=$request->start;
            $end=$request->end;
            $products = Product::where('price','>=', $start)->where('price','<=', $end)->paginate(12);

            return view('frontend.pages.allajaxproduct', compact('products','pageheading'));

        }
        else if ($request->ajax() && isset($request->sortby)){

     $sortby=$request->sortby;
      $pageheading="All Product";
            
           if($sortby=="'price', 'asc'"){
            $products = Product::orderBy('price', 'asc')->paginate(12);
        }else if($sortby=="'price', 'desc'"){
            $products = Product::orderBy('price', 'desc')->paginate(12);
        }
        else if($sortby=="'created_at', 'asc'"){
            $products = Product::orderBy('created_at', 'asc')->paginate(12);
        }
        else if($sortby=="'created_at', 'desc'"){
            $products = Product::orderBy('created_at', 'desc')->paginate(12);
        }

        else if($sortby=="'category_id', 'asc'"){
            $products = Product::orderBy('category_id', 'asc')->paginate(12);
        }
        else if($sortby=="'category_id', 'desc'"){
            $products = Product::orderBy('category_id', 'desc')->paginate(12);
        }

        else if($sortby=="'brand_id', 'asc'"){
            $products = Product::orderBy('brand_id', 'asc')->paginate(12);
        }
        else if($sortby=="'brand_id', 'desc'"){
            $products = Product::orderBy('brand_id', 'desc')->paginate(12);
        }

              return view('frontend.pages.allajaxproduct', compact('products','pageheading'));

 }
        else{
            $pageheading="All Product";

            $products = Product::orderBy('created_at','asc')->paginate(12);
            if (!is_null($products)) {

             return view('frontend.pages.shop',compact('products','pageheading'));
         }
         else {
          session()->flash('errors', 'Sorry !! There is no product by this Category');
          return redirect('/');
      }
  }
}
  public function product_details($id){
     $product = Product::where('id', $id)->orwhere('slug', $id)->first();
     $ratings=Rating::where('product_id', $id)->get();
     $avgrating=Rating::where('product_id', $id)->get()->avg('rating');


     $similars=Product::where('type_id', $product->type_id)->get();
     return view('frontend.pages.product_details',compact('product','ratings','similars','avgrating'));
 }
 public function contact_us(){
     return view('frontend.pages.contact-us');
 }
 public function blog(){
     return view('frontend.pages.blog');
 }
 public function blogpost(){
     return view('frontend.pages.blog-single');
 }
 

 


 public function categoryshow(Request $request,$id)
 {
    if ($request->ajax() && isset($request->start)){

        $start=$request->start;
        $end=$request->end;
        $category= Category::find($id);
        $pageheading="Product of ".$category->name." Category";
        $products = Product::where('category_id', $id)->where('price','>=', $start)->where('price','<=', $end)->paginate(12);
        if (!is_null($products)) {

          return view('frontend.pages.allajaxproduct', compact('products','category','pageheading'));

      }


  }else if ($request->ajax() && isset($request->sortby)){

     $sortby=$request->sortby;


     $category= Category::find($id);
     $pageheading="Product of ".$category->name." Category";

     if($sortby=="'price', 'asc'"){
        $products = Product::where('category_id', $id)->orderBy('price', 'asc')->paginate(12);
    }
    else if($sortby=="'price', 'desc'"){
        $products = Product::where('category_id', $id)->orderBy('price', 'desc')->paginate(12);
    }
    else if($sortby=="'created_at', 'asc'"){

        $products = Product::where('category_id', $id)->orderBy('created_at', 'asc')->paginate(12);
    }
    else if($sortby=="'created_at', 'desc'"){
        $products = Product::where('category_id', $id)->orderBy('created_at', 'desc')->paginate(12);
    }
    else if($sortby=="'category_id', 'asc'"){
        $products = Product::where('category_id', $id)->orderBy('category_id', 'asc')->paginate(12);
    }
    else if($sortby=="'category_id', 'desc'"){
        $products = Product::where('category_id', $id)->orderBy('category_id', 'desc')->paginate(12);
    }
    else if($sortby=="'brand_id', 'asc'"){

        $products = Product::where('category_id', $id)->orderBy('brand_id', 'asc')->paginate(12);
    }
    else if($sortby=="'brand_id', 'desc'"){
        $products = Product::where('category_id', $id)->orderBy('brand_id', 'desc')->paginate(12);
    }

    if (!is_null($products)) {

      return view('frontend.pages.allajaxproduct', compact('products','category','pageheading'));

  }}
  else
  {


    $category= Category::find($id);
    $pageheading="Product of ".$category->name." Category";
    $products = Product::where('category_id', $id)->paginate(12);
    if (!is_null($products)) {

      return view('frontend.pages.shop', compact('products','category','pageheading'));

  }else {
      session()->flash('errors', 'Sorry !! There is no product by this Category');
      return redirect('/');
  }
}}
public function parentcategoryshow(Request $request,$id)
 {$subcatid=Category::where('parent_id', $id)->pluck('id')->toArray();


    if ($request->ajax() && isset($request->start)){

        $start=$request->start;
        $end=$request->end;
        $category= Category::find($id);
        $pageheading="Product for ".$category->name;
        $products = Product::whereIn('category_id', $subcatid)->where('price','>=', $start)->where('price','<=', $end)->paginate(12);
        if (!is_null($products)) {

          return view('frontend.pages.allajaxproduct', compact('products','category','pageheading'));

      }


  }else if ($request->ajax() && isset($request->sortby)){

     $sortby=$request->sortby;


     $category= Category::find($id);
     $pageheading="Product for ".$category->name;

     if($sortby=="'price', 'asc'"){
        $products = Product::whereIn('category_id', $subcatid)->orderBy('price', 'asc')->paginate(12);
    }
    else if($sortby=="'price', 'desc'"){
        $products = Product::whereIn('category_id', $subcatid)->orderBy('price', 'desc')->paginate(12);
    }
    else if($sortby=="'created_at', 'asc'"){

        $products = Product::whereIn('category_id', $subcatid)->orderBy('created_at', 'asc')->paginate(12);
    }
    else if($sortby=="'created_at', 'desc'"){
        $products = Product::whereIn('category_id', $subcatid)->orderBy('created_at', 'desc')->paginate(12);
    }
    else if($sortby=="'category_id', 'asc'"){
        $products = Product::whereIn('category_id', $subcatid)->orderBy('category_id', 'asc')->paginate(12);
    }
    else if($sortby=="'category_id', 'desc'"){
        $products = Product::whereIn('category_id', $subcatid)->orderBy('category_id', 'desc')->paginate(12);
    }
    else if($sortby=="'brand_id', 'asc'"){

        $products = Product::whereIn('category_id', $subcatid)->orderBy('brand_id', 'asc')->paginate(12);
    }
    else if($sortby=="'brand_id', 'desc'"){
        $products = Product::whereIn('category_id', $subcatid)->orderBy('brand_id', 'desc')->paginate(12);
    }

    if (!is_null($products)) {

      return view('frontend.pages.allajaxproduct', compact('products','category','pageheading'));

  }}
  else
  {


    $category= Category::find($id);
    $pageheading="Product for ".$category->name;
    $products = Product::whereIn('category_id', $subcatid)->paginate(12);
    if (!is_null($products)) {

      return view('frontend.pages.shop', compact('products','category','pageheading'));

  }else {
      session()->flash('errors', 'Sorry !! There is no product by this Category');
      return redirect('/');
  }
}}
public function brandshow(Request $request,$id)
{

    if ($request->ajax() && isset($request->start)){

    $start=$request->start;
    $end=$request->end;
    $brand= Brand::find($id);
    $pageheading="Product of ".$brand->name." Brand";
    $products = Product::where('brand_id', $id)->where('price','>=', $start)->where('price','<=', $end)->paginate(12);
    if (!is_null($products)) {

       return view('frontend.pages.allajaxproduct', compact('products','brand','pageheading'));

   }

}else if ($request->ajax() && isset($request->sortby)){

     $sortby=$request->sortby;

    $brand= Brand::find($id);
    $pageheading="Product of ".$brand->name." Brand";
if($sortby=="'price', 'asc'"){

    $products = Product::where('brand_id', $id)->orderBy('price', 'asc')->paginate(12);
}
    else if($sortby=="'price', 'desc'"){
$products = Product::where('brand_id', $id)->orderBy('price', 'desc')->paginate(12);

    }
    else if($sortby=="'created_at', 'asc'"){
$products = Product::where('brand_id', $id)->orderBy('created_at', 'asc')->paginate(12);

    }else if($sortby=="'created_at', 'desc'"){
$products = Product::where('brand_id', $id)->orderBy('created_at', 'desc')->paginate(12);

    }
    else if($sortby=="'category_id', 'asc'"){
$products = Product::where('brand_id', $id)->orderBy('category_id', 'asc')->paginate(12);

    }else if($sortby=="'category_id', 'desc'"){
$products = Product::where('brand_id', $id)->orderBy('category_id', 'desc')->paginate(12);

    }
    else if($sortby=="'brand_id', 'asc'"){
$products = Product::where('brand_id', $id)->orderBy('brand_id', 'asc')->paginate(12);

    }else if($sortby=="'brand_id', 'desc'"){
$products = Product::where('brand_id', $id)->orderBy('brand_id', 'desc')->paginate(12);

    }
    


    if (!is_null($products)) {

       return view('frontend.pages.allajaxproduct', compact('products','brand','pageheading'));

   }

 }
else
{

    $brand= Brand::find($id);
    $pageheading="Product of ".$brand->name." Brand";
    $products = Product::where('brand_id', $id)->paginate(12);
    if (!is_null($products)) {

      return view('frontend.pages.shop', compact('products','brand','pageheading'));

  }else {
      session()->flash('errors', 'Sorry !! There is no product by this Category');
      return redirect('/');
  }
}}



public function search(Request $request)
    {
      

            $search = $request->search;
            $pageheading="Search Result for (".$search.")";

        $products = Product::orWhere('title', 'like', '%'.$search.'%')
        ->orWhere('description', 'like', '%'.$search.'%')
        ->orWhere('slug', 'like', '%'.$search.'%')
        ->orWhere('price', 'like', '%'.$search.'%')
        //->orWhere('quantity', 'like', '%'.$search.'%')
        ->orderBy('id', 'desc')
        ->paginate(12);

            if (!is_null($products)) {

             return view('frontend.pages.shop',compact('products','pageheading'));
         }
         else {
          session()->flash('errors', 'Sorry !! There is no product by this Category');
          return redirect('/');
      }
  }



      

}
