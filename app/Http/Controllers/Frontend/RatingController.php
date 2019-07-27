<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Frontend\Rating;
use Auth;

class RatingController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'=>'verified']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
      'ratingmessage'  => 'required',
      'rating'=>'required'
       
    ]);
          $rating = Rating::where('user_id',Auth::id())->where('product_id',$request->productid)->first();
if(!is_null($rating)){

$rating = Rating::find($rating->id);
    $rating->product_id=$request->productid;
    $rating->user_id=Auth::id();
    $rating->review=$request->ratingmessage;
    $rating->rating=$request->rating;
    $rating->save();

    session()->flash('success', 'Your valuable rating edited successfully !!');
    return back();
}
else
{
    $rating = new Rating();
    $rating->product_id=$request->productid;
    $rating->user_id=Auth::id();
    $rating->review=$request->ratingmessage;
    $rating->rating=$request->rating;
    $rating->save();

    session()->flash('success', 'Your valuable rating stored successfully !!');
    return back();

}

        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
