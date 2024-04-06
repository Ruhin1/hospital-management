<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patient;
use App\Models\duetransition;
use App\Models\cabinefeetransition;

use App\Models\cabinetransaction;
use DataTables;
use Validator;

class dueshowtranstionController extends Controller
{
    public function showduecustomerpage()
	{	
	$patient = patient::where('softdelete', '0')
	->where(function ($query) { $query->where('booking_status', 1)
	->orWhere('booking_status', 2);})->latest()->get();	
	
	 return view('showdueofpatient.patientlist', compact('patient'));  
		
	} 
	
	public function dueofoutdorpat()
		{	
	$patient = patient::where('softdelete', '0')
	->where(function ($query) { $query->where('booking_status', 0)
	->orWhere('booking_status', 3);})->latest()->get();	
	
	 return view('showdueofpatient.outdorpat', compact('patient'));  
		
	}
	
	
	
	public function showduetrans(Request $request)
	{
	                             $duetransition=  duetransition::where('transitiontype', 1)->latest()->get();
	
	
	  
	        if ($request->ajax()) {
            $duetransition =  duetransition::where('transitiontype', 1)->latest()->get();
            return Datatables::of($duetransition)
                   ->addIndexColumn()
                    ->addColumn('action', function( duetransition $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                       

					   $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                       

					   return $button;
                    })  

					
					
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('showdueofpatient.duetrans', compact('duetransition'));  		
		
	

		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	    public function showduetransition( Request $request )
	{	
	
	$duetransition = duetransition::where( 'patient_id', $request->patient)
		->where(function ($query) { $query->where('transitiontype', 1)
	->orWhere('transitiontype', 2);})
	->get();	

$patient= patient::findOrFail($request->patient);

	$cabinefeetransition = cabinefeetransition::where( 'patient_id', $request->patient)->get();	
	
	
	
	
	
	
$cabinetransaction = cabinetransaction::where( 'patient_id', $request->patient)->first();

	   $time1= strtotime($cabinetransaction->starting);
	  
	  
	   	$time2  = date('Y-m-d', strtotime($cabinetransaction->ending . ' +1 day'));  
	    $time2=strtotime($time2);
	   
	   
	   
	   
	   $cabine_fair_per_day= $cabinetransaction->cabinelist->price;
	   
   $diff = $time2 - $time1 ;
   
 $differnece_btw_two_date_by_day = ceil($diff/ (60*60*24));


 
 
 
 $tcabinecharge= $differnece_btw_two_date_by_day * $cabine_fair_per_day ;













	
	
	return view('showdueofpatient.duetable', compact('duetransition','patient','cabinetransaction','cabinefeetransition','tcabinecharge'));  
	  
		
	} 
	
	




public function dueshowoutdor(Request $request)
{
	
	$duetransition = duetransition::where( 'patient_id', $request->patient)->get();	

$patient= patient::findOrFail($request->patient);	
	


	return view('showdueofpatient.duetableout', compact('duetransition','patient'));  
	  

	
}













	
	
	
}
