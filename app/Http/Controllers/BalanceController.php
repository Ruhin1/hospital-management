<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\balance_of_business;

class BalanceController extends Controller
{
      public function index()
	{
	
       $balance  = balance_of_business::first(); 
	   

	         

            return response()->json(['balance' => $balance ]);
	 	
		
	}
}
