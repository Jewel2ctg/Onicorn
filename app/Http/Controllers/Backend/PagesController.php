<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Backend\Types;
use App\Model\Backend\Attribute_Type;

class PagesController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function attribute($id){

    	

  		return json_encode(Types::where('id',$id)->first());
  		//return json_encode(Types::with('attributes')->where('id',$id)->first());
}
public function index(){

    	 return view('backend.pages.index');
}
}
