<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Backend\Division;
use App\Model\Backend\District;
use App\Model\Backend\Country;

class DistrictsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::orderBy('name', 'asc')->get();
        return view('backend.pages.districts.districts', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $countries = Country::orderBy('name', 'asc')->get();
        $divisions = Division::orderBy('priority', 'asc')->get();
    return view('backend.pages.districts.entry', compact('divisions','countries'));
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
      'division_id'  => 'required',
      'country_id'  => 'required',
    ],
    [
      'name.required'  => 'Please provide a district name',
      'division_id.required'  => 'Please provide a division for the district',
      'country_id.required'  => 'Please provide a country for the district',
    ]);

    $district = new District();
    $district->name = $request->name;
    $district->division_id = $request->division_id;
    $district->country_id = $request->country_id;
    $district->save();

    session()->flash('success', 'A new district has added successfully !!');
    return redirect()->route('districts.index');
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
        $divisions = Division::orderBy('priority', 'asc')->get();
    $district= District::find($id);
    if (!is_null($district)) {
      return view('backend.pages.districts.edit', compact('district', 'divisions','countries'));
    }else {
      return resirect()->route('districts.index');
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
        'division_id'  => 'required',
        'country_id'  => 'required',
      ],
      [
        'name.required'  => 'Please provide a district name',
        'division_id.required'  => 'Please provide a division for the district',
        'country_id.required'  => 'Please provide a country for the district',
      ]);

      $district = District::find($id);
      $district->name = $request->name;
      $district->division_id = $request->division_id;
      $district->country_id = $request->country_id;
      $district->save();

      session()->flash('success', 'District has updated successfully !!');
      return redirect()->route('districts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $district = District::find($id);
      if (!is_null($district)) {
        $district->delete();
      }
      session()->flash('success', 'District has deleted successfully !!');
      return back();
    }
}
