<?php

namespace App\Http\Controllers;

use App\Models\coshma;
use Illuminate\Http\Request;

class coshmaController extends Controller
{
   public function index(){
         $inst = coshma::all();  

        return view('coshma.index',['inst'=>$inst]);
   }

   public function store(Request $request){
    // $request->validate([
    //     'name'=>'required',
    //     'age'=>'required',
    //     'brith'=>'required',
    // ]);
   
       $data =  $request->all();
    if($request->has('instructions')){
      $inst = coshma::wherein('id',$request->instructions)->get(); 
      return view('coshma.coshma',['data'=>$data,'inst'=>$inst,]);
    }else{
      $inst = coshma::all();
      return view('coshma.coshma',['data'=>$data,'inst'=>$inst,]);
      
    }

    
   
    
   }
}
