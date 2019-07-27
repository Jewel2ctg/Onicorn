<?php

namespace App\Http\Controllers\Backend;

use App\Model\Backend\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $countries = Country::orderBy('id', 'desc')->get();
    return view('backend.pages.countries.countries', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.countries.entry');
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
      'name.required'  => 'Please provide a country name',
      
    ]);

    $country = new Country();
    $country->name = $request->name;
   
    $country->slug = str_slug(time().$request->name);
    $country->admin_id = 1;
    
    $country->save();

    session()->flash('success', 'A new country has added successfully !!');
    return redirect()->route('countries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Admin\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $country= Country::find($id);
    

    if (!is_null($country)) {
      return view('backend.pages.countries.edit', compact('country'));
    }else {
      return resirect()->route('countries.index');
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Admin\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
        'name'  => 'required',
        
      ],
      [
        'name.required'  => 'Please provide a country name',
        
      ]);

      $country = Country::find($id);
      $country->name = $request->name;
      
      $country->slug = str_slug(time().$request->name);
      $country->admin_id = 1;
      
     
      $country->save();

      session()->flash('success', 'Country has updated successfully !!');
      return redirect()->route('countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $country = Country::find($id);
      if (!is_null($country)) {
        
        $country->delete();
      }
      session()->flash('success', 'Country has deleted successfully !!');
      return back();
    }
}
