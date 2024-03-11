<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\medicine_category;

class categorylist extends Controller
{
       public function category_list()
    {
		
		
		  //$data = medicine_category::orderBy('name')->get(); 
		  //dd($data);
		 // echo "kkkkk";
       // if(request()->ajax())
       // {
            $data = medicine_category::orderBy('name')->get(); 
			
		dd($data);
           // return response()->json(['data' => $data]);
       // }
	   
	   return view('medicine.medicine'); 
	   
    }

}
