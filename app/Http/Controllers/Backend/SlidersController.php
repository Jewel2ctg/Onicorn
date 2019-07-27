<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Backend\Slider;
use Image;
use File;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sliders = Slider::orderBy('priority', 'asc')->get();
    return view('backend.pages.sliders.sliders', compact('sliders')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
      'title'  => 'required',
      'subtitle'  => 'required',
      'description'  => 'required',
      'image'  => 'required|image',

      'price'  => 'required',
      'priority'  => 'required',
      'button_link'  => 'nullable|url'
    ],
    [
      'title.required'  => 'Please provide slider title',
      'priority.required'  => 'Please provide slider priority',
      'image.required'  => 'Please provide slider image',
      'image.image'  => 'Please provide a valid slider image',
      'button_link.url'  => 'Please provide a valid slider button link'
    ]);

    $slider = new Slider();
    $slider->title = $request->title;
    $slider->subtitle = $request->subtitle;
    $slider->description = $request->description;
    $slider->button_text = $request->button_text;
    $slider->button_link = $request->button_link;
    $slider->price = $request->price;
    $slider->priority = $request->priority;

    if ($request->image > 0) {
        $image = $request->file('image');
        $img = time() . '.'. $image->getClientOriginalExtension();
        $location = 'backend/images/sliders/' .$img;
        
        Image::make($image)->save($location);
        $slider->image = $img;
    }
    $slider->save();

    session()->flash('success', 'A new slider has added successfully !!');
    return redirect()->route('sliders.index');
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
        //
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
          'title'  => 'required',
      'subtitle'  => 'required',
      'description'  => 'required',
      'image'  => 'required|image',
      
      'price'  => 'required',
      'priority'  => 'required',
      'button_link'  => 'nullable|url'
        ],
        [
          'title.required'  => 'Please provide slider title',
          'priority.required'  => 'Please provide slider priority',
          'image.image'  => 'Please provide a valid slider image',
          'button_link.url'  => 'Please provide a valid slider button link'
        ]);

        $slider = Slider::find($id); 
        $slider->title = $request->title;
    $slider->subtitle = $request->subtitle;
    $slider->description = $request->description;
    $slider->button_text = $request->button_text;
    $slider->button_link = $request->button_link;
    $slider->price = $request->price;
    $slider->priority = $request->priority;

       

        if ($request->image > 0) {
            // Delete the old Slider
            if (File::exists('backend/images/sliders/'.$slider->image)) {
                File::delete('backend/images/sliders/'.$slider->image);
              }

            $image = $request->file('image');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = 'backend/images/sliders/' .$img;
            Image::make($image)->save($location);
            $slider->image = $img;
        }
        $slider->save();

        session()->flash('success', 'Slider has updated successfully !!');
        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
      if (!is_null($slider)) {
        //Delete Image
        if (File::exists('backend/images/sliders/'.$slider->image)) {
            File::delete('backend/images/sliders/'.$slider->image);
          }
        $slider->delete();
      }
      session()->flash('success', 'Slider has deleted successfully !!');
      return back();
    }
}
