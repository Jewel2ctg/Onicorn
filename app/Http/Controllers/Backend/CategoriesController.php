<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Backend\Category;


use Image;
use File;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.pages.category.category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
    return view('backend.pages.category.entry', compact('main_categories'));
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
      'image'  => 'nullable|image',
    ],
    [
      'name.required'  => 'Please provide a category name',
      'image.image'  => 'Please provide a valid image with .jpg, .png, .gif, .jpeg exrension..',
    ]);

    $category = new Category();
    $category->name = $request->name;
    $category->description = $request->description;
    $category->parent_id = $request->parent_id;
    $category->slug = str_slug(time().$request->name);
    $category->admin_id = 1;
    //insert images also
    
    if ($request->image > 0) {
        $image = $request->file('image');
        $img = time() . '.'. $image->getClientOriginalExtension();
        $location = 'backend/images/categories/' .$img;

        Image::make($image)->save($location);
        $category->image = $img;
    }
    $category->save();

    session()->flash('success', 'A new category has added successfully !!');
    return redirect()->route('category.index');
        
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
        $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
    $category= Category::find($id);
    if (!is_null($category)) {
      return view('backend.pages.category.edit', compact('category', 'main_categories'));
    }else {
      return redirect()->route('category.index');
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
        'image'  => 'nullable|image',
      ],
      [
        'name.required'  => 'Please provide a category name',
        'image.image'  => 'Please provide a valid image with .jpg, .png, .gif, .jpeg exrension..',
      ]);

      $category = Category::find($id);
      $category->name = $request->name;
      $category->description = $request->description;
      $category->parent_id = $request->parent_id;
      $category->slug = str_slug(time().$request->name);
      $category->admin_id = 1;
      //insert images also
      if ($request->image > 0) {
        //Delete the old image from folder

          if (File::exists('backend/images/categories/'.$category->image)) {
            File::delete('backend/images/categories/'.$category->image);
          }

          $image = $request->file('image');
          $img = time() . '.'. $image->getClientOriginalExtension();
          $location = 'backend/images/categories/' .$img;
          Image::make($image)->save($location);
          $category->image = $img;
      }
      $category->save();

      session()->flash('success', 'Category has updated successfully !!');
      return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $category = Category::find($id);
      if (!is_null($category)) {
        // If it is parent category, then delete all its sub category
        if ($category->parent_id == NULL) {
          // Delete sub categories
          $sub_categories = Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();

          foreach ($sub_categories as $sub) {
            // Delete category image
            if (File::exists('backend/images/categories/'.$sub->image)) {
              File::delete('backend/images/categories/'.$sub->image);
            }
            $sub->delete();
          }

        }

        // Delete category image
        if (File::exists('backend/images/categories/'.$category->image)) {
          File::delete('backend/images/categories/'.$category->image);
        }
        $category->delete();
      }
      session()->flash('success', 'Brand has deleted successfully !!');
      return back();

    }
}
