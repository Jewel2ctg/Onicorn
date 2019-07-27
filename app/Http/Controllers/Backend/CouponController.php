<?php

namespace App\Http\Controllers\Backend;

use App\Model\Backend\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $coupons = Coupon::orderBy('id', 'desc')->get();
    return view('backend.pages.coupons.coupons', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.coupons.entry');
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
      'code'  => 'required|string',
      'type'  => 'required|numeric',
      'amount'  => 'required|numeric',
      'expiredate'  => 'required|date',
      
    ],
    [
      'name.required'  => 'Please provide a coupon name',
      
    ]);

    $coupon = new Coupon();
    $coupon->code = $request->code;
    $coupon->type = $request->type;
    $coupon->amount = $request->amount;
    $coupon->expiredate = $request->expiredate;
   
    
    
    $coupon->save();

    session()->flash('success', 'A new Coupon has added successfully !!');
    return redirect()->route('coupons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $coupon= Coupon::find($id);
    

    if (!is_null($coupon)) {
      return view('backend.pages.coupons.edit', compact('coupon'));
    }else {
      return resirect()->route('coupons.index');
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
          $this->validate($request, [
      'code'  => 'required|string',
      'type'  => 'required|numeric',
      'amount'  => 'required|numeric',
      'expiredate'  => 'required|date',
      
    ],
    [
      'name.required'  => 'Please provide a coupon name',
      
    ]);

    $coupon = Coupon::find($id);
    $coupon->code = $request->code;
    $coupon->type = $request->type;
    $coupon->amount = $request->amount;
    $coupon->expiredate = $request->expiredate;
   
    
    
    $coupon->save();

    session()->flash('success', 'Coupon updated successfully !!');
    return redirect()->route('coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::find($id);
      if (!is_null($coupon)) {
        
        $coupon->delete();
      }
      session()->flash('success', 'Coupon has deleted successfully !!');
      return back();
    }
}
