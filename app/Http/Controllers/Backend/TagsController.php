<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Backend\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tags = Tag::orderBy('id', 'desc')->get();
    return view('backend.pages.tags.tags', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.tags.entry');
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
      
    ],
    [
      'name.required'  => 'Please provide a tag name',
      
    ]);

    $tag = new Tag();
    $tag->name = $request->name;
   
    $tag->slug = str_slug(time().$request->name);
    $tag->admin_id = 1;
    
    $tag->save();

    session()->flash('success', 'A new tag has added successfully !!');
    return redirect()->route('tags.index');
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
        
        $tag= Tag::find($id);
    

    if (!is_null($tag)) {
      return view('backend.pages.tags.edit', compact('tag'));
    }else {
      return resirect()->route('tags.index');
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
        
      ],
      [
        'name.required'  => 'Please provide a tag name',
        
      ]);

      $tag = Tag::find($id);
      $tag->name = $request->name;
      
      $tag->slug = str_slug(time().$request->name);
      $tag->admin_id = 1;
      
     
      $tag->save();

      session()->flash('success', 'Tag has updated successfully !!');
      return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $tag = Tag::find($id);
      if (!is_null($tag)) {
        
        $tag->delete();
      }
      session()->flash('success', 'Tag has deleted successfully !!');
      return back();
    }
}
