<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Backend\Division;
use App\Model\Backend\District;
use App\Model\Backend\Country;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $divisions = Division::orderBy('priority', 'asc')->get();
    return view('backend.pages.divisions.divisions', compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        {
             $countries = Country::orderBy('name', 'asc')->get();
        return view('backend.pages.divisions.entry',compact('countries'));
        
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
      'priority'  => 'required',
      'country_id' => 'required'
    ],
    [
      'name.required'  => 'Please provide a division name',
      'country_id.required'  => 'Please select Country',
      'priority.required'  => 'Please provide a division priority',
    ]);

    $division = new Division();
    $division->name = $request->name;
    $division->country_id = $request->country_id;
    $division->priority = $request->priority;
    $division->save();

    session()->flash('success', 'A new division has added successfully !!');
    return redirect()->route('divisions.index');
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
        $countries = Country::orderBy('name', 'asc')->get();
        $division= Division::find($id);
    if (!is_null($division)) {
      return view('backend.pages.divisions.edit', compact('division','countries'));
    }else {
      return resirect()->route('divisions.index');
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
        'priority'  => 'required',
       'country_id' => 'required'
    ],
    [
      'name.required'  => 'Please provide a division name',
      'country_id.required'  => 'Please select Country',
      'priority.required'  => 'Please provide a division priority',
    ]);

      $division = Division::find($id);
      $division->name = $request->name;
      $division->country_id = $request->country_id;
      $division->priority = $request->priority;
      $division->save();

      session()->flash('success', 'Division has updated successfully !!');
      return redirect()->route('divisions.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $division = Division::find($id);
      if (!is_null($division)) {
        //Delete all the districts for this division
        $districts = District::where('division_id', $division->id)->get();
        foreach ($districts as $district) {
          $district->delete();
        }
        $division->delete();
      }
      session()->flash('success', 'Division has deleted successfully !!');
      return back();
    }
}
