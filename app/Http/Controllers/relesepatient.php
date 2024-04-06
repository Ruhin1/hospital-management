<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patient;
use App\Models\cabinetransaction;
use App\Models\cabinelist;
Use \Carbon\Carbon;
use DateTime;
class relesepatient extends Controller
{
    public function index()
	{
		$admittedcabine = cabinetransaction::with('patient','cabinelist')->where('ending', NULL )->latest()->get();
		
		return view('releasepatient.admittedcabine', compact('admittedcabine')); 
	}
	
	public function relesepatientdeatilsindividual($id){
		
		$patientdetails = cabinetransaction::with('patient','cabinelist')->where('ending', NULL )->findOrfail($id);
		
		
		$cabineid = $patientdetails->cabinelist_id;
	       
		   cabinelist::whereId($cabineid)
  ->update(['booking_status' => '1']);  
  
 
  $enddate= Carbon::now();

       cabinetransaction::whereId($id)
  ->update(['ending' => $enddate]);  
	
	
	 
	   
	   $time1= strtotime($patientdetails->starting);
	   $time2=strtotime($enddate);
	   
   $diff = $time2 - $time1 ;
   
echo  $differnece_btw_two_date_by_day = ceil($diff/ (60*60*24));
 
// $total_seat_fair = $differnece_btw_two_date_by_day * 
 
   
	
	
	}
}
