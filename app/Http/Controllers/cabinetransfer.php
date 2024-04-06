<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\patient;
use App\Models\cabinetransaction;
use App\Models\cabinelist;
use App\Models\User;
use App\Models\balance_of_business;
use App\Models\duetransition;
use App\Models\cabinetransferhisto;
use App\Models\cabinefeetransition;
use Illuminate\Support\Facades\DB; 
Use \Carbon\Carbon;
use DateTime;
use DataTables;
use PDF;

use Redirect;










class cabinetransfer extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
	  
	  
	  
	return view('cabinetransaction.cabinetransfer');  
	  
	  
	  
	  
	  
	  
    }


	    public function dropdown_list()
    {
		

       $cabinedata = cabinelist::where('softdelete', 0)->where('booking_status','0' )->orderBy('serial_no')->get(); 
	   
	$cabinedata_booked = cabinelist::where('softdelete', 0)->where('booking_status','1' )->orderBy('serial_no')->get(); 

            return response()->json([ 'cabinedata' => $cabinedata,'cabinedata_booked' => $cabinedata_booked   ]);
	 
 
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
        
		 DB::transaction(function () use ($request) {
	
						    $validated = $request->validate([
'from_cabine_list',
'From_end_date',
'to_cabine_list',
'to_start_date',
		
    ]);







	
		
		
		
		
		// cabine 
	
	$cabine  = cabinelist::findOrFail($request->from_cabine_list);
	$patient = patient::findOrFail($cabine->patient_id);
	
	$tocabine_rate = cabinelist::findOrFail($request->to_cabine_list)->price;
	
	
	
	
	
	

	$id = $patient->cabinelist_id;
		$cabine = cabinelist::findOrFail($id);

	//$patient= patient::findOrFail($cabine->patient_id);
	$cabinetransaction = cabinetransaction::findOrFail($patient->cabinetransaction_id	);
	
	
 		 
	if ($cabinetransaction->tillpaiddate == null )
	{
		$startimeshow =   $cabinetransaction->starting;
		$paid_untill = $cabinetransaction->starting;
  $time1= strtotime($cabinetransaction->starting. ' -1 day'   );
	 
	}
	else
	{
		

$start = $cabinetransaction->tillpaiddate;

$paid_untill = $cabinetransaction->tillpaiddate;
// $startimeshow = date('Y-m-d', strtotime($start . ' +1 day'));
		
  $time1= strtotime($paid_untill);
	  


	  
	  
	}
	
			    //$enddate= new DateTime(Carbon::now());
 // $enddateinstring =Carbon::now();	
	 


	 $time2=strtotime($request->From_end_date);
   
$cabine_fair_per_day= $cabine->price;
	   
  $diff = $time2 - $time1 ;
   
 $differnece_btw_two_date_by_day = ceil($diff/ (60*60*24));

//dd($differnece_btw_two_date_by_day);

 
 
 $total_seat_fair= $differnece_btw_two_date_by_day * $cabine_fair_per_day ; 
	
	
		
		
		$cabinetransferhisto = new cabinetransferhisto();

	$cabinetransferhisto->cabinelist_id	= $request->from_cabine_list;
	$cabinetransferhisto->user_id	= Auth()->user()->id;		
	$cabinetransferhisto->patient_id	= $patient->id;
	$cabinetransferhisto->cabinetransaction_id = $patient->cabinetransaction_id;
	$cabinetransferhisto->paid_tiil_date	= $paid_untill;
	$cabinetransferhisto->ending	= $request->From_end_date;
	$cabinetransferhisto->due	=$total_seat_fair;
	$cabinetransferhisto->save();
	
	
	
	
				   cabinelist::whereId($request->from_cabine_list)
  ->update(['booking_status' => '0',
  'patient_id' => null, 
   'patientname' => null, 
  
  
  
  ]);
	
       cabinetransaction::where( 'id' , $patient->cabinetransaction_id )
  ->update(['ending' => $request->From_end_date]);	
  
  
 $cabinetransaction =  cabinetransaction::where( 'id' , $patient->cabinetransaction_id )->first();
  
  
  	   $time1= strtotime($cabinetransaction->starting);
	  
	  
	   	$time2  = date('Y-m-d', strtotime($cabinetransaction->ending . ' +1 day'));  
	    $time2=strtotime($time2);
	   
	   
	   
	   
	   $cabine_fair_per_day= $cabinetransaction->cabinelist->price;
	   
   $diff = $time2 - $time1 ;
   
 $differnece_btw_two_date_by_day = ceil($diff/ (60*60*24));


 
 
 
 $tcabinecharge= $differnece_btw_two_date_by_day * $cabine_fair_per_day ;
  
  
  
        cabinetransferhisto::where( 'id' , $cabinetransferhisto->id )
  ->update(['gross_amount_from_previous' => $tcabinecharge]);	
  
  
  
  
  
  
  
  
  
  
  
  
  
  
          $form_data = array(
            'cabinelist_id'        =>  $request->to_cabine_list,
            'patient_id'         =>  $patient->id,
			'admissionfee' =>0,
	 'starting' =>$request->to_start_date,
		   
		   'user_id' => Auth()->user()->id,
 	 
        );
		
		
		$cabinetransid =  cabinetransaction::create($form_data);
		
   cabinelist::where('id', $request->to_cabine_list)
  ->update(['booking_status' => '1',
  'patient_id' =>  $patient->id,
  'patientname' => $patient->name,
  
  
  
  
  
  ]);
  
  $cabine_name = cabinelist::findOrFail($request->to_cabine_list)->serial_no;

          patient::where('id', $patient->id)
  ->update(['cabinetransaction_id' => $cabinetransid->id,

'cabinelist_id' => $request->to_cabine_list,
'cabineserial' => $cabine_name,
'cabinerate'=> $tocabine_rate,

  ]);
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  });	
  
	
	
	
	    return response()->json(['success' => 'Seat Transfered']);
	
	
	
	
	
	
	
		
		
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
