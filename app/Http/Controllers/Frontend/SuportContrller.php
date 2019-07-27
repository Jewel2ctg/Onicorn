<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuportContrller extends Controller
{
	public function __construct()
    {
        $this->middleware(['auth'=>'verified']);
    }
    
     public function complain(){

    return view('frontend.pages.support.complain');
  }

  public function refreshcaptcha(){

    return response()->json(['captcha'=>''.captcha_img()]);
  }
public function complainstore(Request $request){
   $this->validate($request, [
      'complaingmessage'  => 'required|min:10',
      'captcha'  => 'required|captcha',
    ],
    [
      'complaingmessage.required'  => 'Please enter your complain ',
      'complaingmessage.min:10'  => 'Complain at least 10 Carecter ',
      'captcha.captcha'  => 'Invalid Captcha Code ',
          ]);

    dd($request);
  }
}
