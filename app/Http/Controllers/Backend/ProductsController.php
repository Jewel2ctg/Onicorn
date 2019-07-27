<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Backend\Tag;
use App\Model\Backend\Product;
use App\Model\Backend\ProductImage;
use App\Model\Backend\Types;
use App\Model\Backend\Specification;
use Image;
use File;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $type=Types::orderBy('id', 'desc')->get();
        return view('backend.pages.products.products',compact('products','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
    	$tags = Tag::orderBy('id', 'desc')->get();
     
        return view('backend.pages.products.entry',compact('tags',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
       $request->validate([
          'title'         => 'required|max:150',
          'description'     => 'required',
          'price'             => 'required|numeric',
          'quantity'             => 'required|numeric',
          'category_id'             => 'required|numeric',
          'brand_id'             => 'required|numeric',
      ]);



       $product = new Product;

       $product->title = $request->title;
       $product->description = $request->description;
       $product->price = $request->price;
       $product->quantity = $request->quantity;

       $product->slug = str_slug($request->title);
       $product->category_id = $request->category_id;
       $product->brand_id = $request->brand_id;
       $product->type_id = $request->type_id;
       $product->admin_id = 1;
       $product->save();
       

        $attribute=$request->attribute;
        $spec=$request->spec;
        for($count = 0; $count < count($attribute); $count++)
        {
            $specification = new Specification;
            $data=array(
                'product_id'=>$product->id,
                'attribute_id'=>$attribute[$count],
                'value'=>$spec[$count],
                'slug'=>str_slug($request->title).$count,
                'admin_id'=>1,
            );

            Specification::insert($data);

        }

        $product->tags()->sync($request->tag);

        
        if(count($request->product_image)>0)
        {
           $i=count($request->product_image)+1; 
           foreach ($request->product_image as $image) {
             $i--;
             $img = time().$i.'.'.$image->getClientOriginalExtension();
             $location = 'backend/images/Products/'.$img;
             Image::make($image)->save($location);

             $product_image=new ProductImage;
             $product_image->product_id=$product->id;
             $product_image->image=$img;
             $product_image->save();
             
             
             
         }
     }

     return redirect()->route('products.index');
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product= Product::find($id);
        

        if (!is_null($product)) {
           $tags = Tag::orderBy('id', 'desc')->get();
           return view('backend.pages.products.edit', compact('product','tags'));
       }

       else {
          return resirect()->route('products.index');
      }}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
          'title'         => 'required|max:150',
          'description'     => 'required',
          'price'             => 'required|numeric',
          'quantity'             => 'required|numeric',
          'category_id'             => 'required|numeric',
          'brand_id'             => 'required|numeric' ,
      ]);

        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        $product->slug = str_slug($request->title);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->type_id = $request->type_id;
        $product->admin_id = 1;
        $product->save();
        $product->tags()->sync($request->tag);

       
        
        $attribute=$request->attribute;
        $spec=$request->spec;

        if(!is_null($spec))
        {
        $specifications = Specification::where('product_id',$id)->get();
         if(!is_null($specifications)) {
          
         foreach ($specifications as $specification) {
          $specification->delete();
         }
          }
        
        for($count = 0; $count < count($attribute); $count++)
        {
            $specification = new Specification;
            $data=array(
                'product_id'=>$product->id,
                'attribute_id'=>$attribute[$count],
                'value'=>$spec[$count],
                'slug'=>str_slug($request->title).$count,
                'admin_id'=>1,
            );

            Specification::insert($data);

          }
}


        if(($request->product_image)>0)
        {
           $productimages=ProductImage::where('product_id',$id)->get();

           

           foreach ($productimages as $productimage) {
   	# code...
             
            if(!is_null($productimage)){
                if(File::exists('backend/images/Products/'.$productimage->image))
                {
                    File::delete('backend/images/Products/'.$productimage->image);
                }
            }
            $productimage->delete();
        }
        



        $i=count($request->product_image)+1; 
        foreach ($request->product_image as $image) {
         $i--;
         $img = time().$i.'.'.$image->getClientOriginalExtension();
         $location = 'backend/images/Products/'.$img;
         Image::make($image)->save($location);

         $product_image=new ProductImage;
         $product_image->product_id=$product->id;
         $product_image->image=$img;
         $product_image->save();
         
         
         
     }
 }



 return redirect()->route('products.index');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!is_null($product)) {

          $productimages=ProductImage::where('product_id',$id)->get();

          

          foreach ($productimages as $productimage) {
   	# code...
             
            if(!is_null($productimage)){
                if(File::exists('backend/images/Products/'.$productimage->image))
                {
                    File::delete('backend/images/Products/'.$productimage->image);
                }
            }
            
            
        }


        $product->delete();
    }
    session()->flash('success', 'Product has deleted successfully !!');
    return back();

}
}
