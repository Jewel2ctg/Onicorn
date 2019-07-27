<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Backend\Attribute;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::orderBy('id', 'desc')->get();
    return view('backend.pages.attributes.attributes', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.attributes.entry');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
      'name'  => 'required',
      'priority'=>'required',
      
    ],
    [
      'name.required'  => 'Please provide a attribute name',
      'priority.required'  => 'Please provide a attribute priority',
      
    ]);

    $attribute = new Attribute();
    $attribute->name = $request->name;
    $attribute->priority = $request->priority;
   
    $attribute->slug = str_slug(time().$request->name);
    $attribute->admin_id = 1;
    
    $attribute->save();

    session()->flash('success', 'A new attribute has added successfully !!');
    return redirect()->route('attributes.index');
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
         
        $attribute= Attribute::find($id);
    

    if (!is_null($attribute)) {
      return view('backend.pages.attributes.edit', compact('attribute'));
    }else {
      return resirect()->route('attributes.index');
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
      'name'  => 'required',
      'priority'=>'required',
      
    ],
    [
      'name.required'  => 'Please provide a attribute name',
      'priority.required'  => 'Please provide a attribute priority',
      
    ]);

    $attribute = Attribute::find($id);
    $attribute->name = $request->name;
    $attribute->priority = $request->priority;
   
    $attribute->slug = str_slug(time().$request->name);
    $attribute->admin_id = 1;
    
    $attribute->save();

    session()->flash('success', 'A new attribute has Update successfully !!');
    return redirect()->route('attributes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $attribute = Attribute::find($id);
      if (!is_null($attribute)) {
        
        $attribute->delete();
      }
      session()->flash('success', 'Attribute has deleted successfully !!');
      return back();
    }
}
