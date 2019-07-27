<?php

namespace App\Http\Controllers\Backend;

use App\Model\Backend\Shippingcost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\District; 

class ShippingcostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippingcosts = Shippingcost::orderBy('amount', 'asc')->get();
        
    return view('backend.pages.shippingcost.shippingcost', compact('shippingcosts'));
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::orderBy('name', 'asc')->get();
        return view('backend.pages.shippingcost.entry',compact('districts'));
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
      'district_id'  => ['required','unique:shippingcosts'],
      'amount'  => 'required',
      
    ],
    [
      'district_id.required'  => 'Please select district',
      'amount.required'  => 'Please enter shipping cost',
      
    ]);

    $shippingcost = new Shippingcost();
    $shippingcost->district_id = $request->district_id;
    $shippingcost->amount = $request->amount;
    
    $shippingcost->save();

    session()->flash('success', 'A new shippingcost has added successfully !!');
    return redirect()->route('shippingcost.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Admin\Shippingcost  $shippingcost
     * @return \Illuminate\Http\Response
     */
    public function show(Shippingcost $shippingcost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin\Shippingcost  $shippingcost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $districts = District::orderBy('name', 'asc')->get();
        $shippingcost= Shippingcost::find($id);
    if (!is_null($shippingcost)) {
      return view('backend.pages.shippingcost.edit', compact('districts','shippingcost'));
    }else {
      return resirect()->route('shippingcost.index');
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Admin\Shippingcost  $shippingcost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $shippingcost = Shippingcost::find($id);
        $this->validate($request, [
      'district_id'  => 'required|unique:shippingcosts,district_id,'.$shippingcost->id,
      'amount'  => 'required',
      
    ],
    [
      'district_id.required'  => 'Please select district',
      'amount.required'  => 'Please enter shipping cost',
      
    ]);

   
    if(
    $shippingcost->district_id = $request->district_id){

    };
    $shippingcost->amount = $request->amount;
    
    $shippingcost->save();

    session()->flash('success', 'A new shippingcost has updated successfully !!');
    return redirect()->route('shippingcost.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\Shippingcost  $shippingcost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $shippingcost = Shippingcost::find($id);
      if (!is_null($shippingcost)) {
        
        $shippingcost->delete();
      }
      session()->flash('success', 'shippingcost has deleted successfully !!');
      return back();
    }
}
