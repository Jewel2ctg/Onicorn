<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Backend\Types;
use App\Model\Backend\Attribute;


class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Types::all();

        return view('backend.pages.types.types',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $attributes =Attribute::all();
            
            return view('backend.pages.types.entry',compact('attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $this->validate($request,[
            'name'=>'required',
            'description' => 'required',
            
            ]);
       
        $type = new Types;
       
        $type->name = $request->name;
        $type->description = $request->description;
        $type->slug = str_slug(time().$request->name);
        $type->admin_id = 1;

        
        $type->save();
        $type->attributes()->sync($request->attribute);
        

        return redirect(route('types.index'));
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
         $type= Types::with('attributes')->where('id',$id)->first();
        $attributes=Attribute::all();

    if (!is_null($type)) {
      return view('backend.pages.types.edit', compact('type','attributes'));
    }else {
      return resirect()->route('types.index');
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
        $this->validate($request,[
            'name'=>'required',
            'description' => 'required',
            
            ]);
       
        $type = Types::find($id);
       
        $type->name = $request->name;
        $type->description = $request->description;
        $type->slug = str_slug(time().$request->name);
        $type->admin_id = 1;

        
        $type->save();
        $type->attributes()->sync($request->attribute);
        

        return redirect(route('types.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $types = Types::find($id);
      if (!is_null($types)) {
        
        $types->delete();
      }
      session()->flash('success', 'Types has deleted successfully !!');
      return back();
    }
}
