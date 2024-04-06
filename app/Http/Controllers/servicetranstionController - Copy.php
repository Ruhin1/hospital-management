<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Validator;
use  App\Models\servicetransition; 
use  App\Models\patientfinalhisab; 
use  App\Models\serviceorder; 
use  App\Models\duetransition;
use  App\Models\balance_of_business;
use  App\Models\agenttransaction;
use  App\Models\doctorCommissionTransition;  
use  App\Models\agentdetail;
use  App\Models\cabinelist;


use DateTime;
use Carbon\Carbon;
use App\Models\cabinetransaction;
use  App\Models\doctor;
use  App\Models\patient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class servicetranstionController extends Controller
{
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
        			dd($request);
	DB::transaction(function () use ($request) {
		
		
		
		    $validated = $request->validate([
        'patient_id' => "unique:patientfinalhisabs,patient_id"  ,
        'totalamount' ,
		'service_name',
		'quantity',
		'adjust',
		'finalTotalcost',
		'finalreceiveableamount',
		'finaldis',
		'final_due_after_adjusting_service',
		'finalcommission',
		'sourceagent',
    ]);

		
	
		//////////////////////////////////////////////////// insert shuru ///////////////////////
		
		
		if ($request->addadditonalsrvicecharge == 1 )   
		{
			
			
			
		$order = new serviceorder; 
		$order->user_id  = auth()->user()->id ; //$request->sellerid;
	$order->patient_id  = $request->patient_id;	
	$order->total  = $request->totalamount;
	$order->save();

    $order_id = $order->id;

    for ($i = 0; $i < count($request->service_name); $i++ ) 

	{

		
		
		
		       
		
		
		
       $servicetransition = new servicetransition; 
	   $servicetransition->serviceorder_id = $order_id;
	   
	   $servicetransition->servicelistinhospital_id = $request->service_name[$i]; // asole medicine_name[] er vetore id neya hoyeche. form bananor somoy name lekha hoyechecilo pore ar change kora hoy nai 
	     $servicetransition->unit = $request->quantity[$i];
		

		     $servicetransition->charge = $request->adjust[$i];
		
$servicetransition->user_id  = auth()->user()->id ;
		 

		  $servicetransition->save(); 
		 
	


	}		
		
		}	



//

$p  = patient::findOrFail($request->patient_id);


$patientdue = $p->due - $p->dena;
 
if (( $request->final_due_after_adjusting_service >  $patientdue   ) and ( $patientdue > 0) )
{
	$duetransition = new duetransition();
	$duetransition->patient_id = $request->patient_id;	
	$duetransition->user_id =  auth()->user()->id ;
	
	$duetransition->totalamount = $request->final_due_after_adjusting_service - 	$patientdue;
	$duetransition->amount = $request->final_due_after_adjusting_service - 	$patientdue;	
	$duetransition->comment = "Due at the time of releasing ";	
	$duetransition->transitiontype = 2;
	$duetransition->transitionproducttype = 7;	
	$duetransition->save();
}








//// update patient due 

if($request->final_due_after_adjusting_service > 0)
{
patient::where('id', $request->patient_id )
       ->update([
           'due' => $request->final_due_after_adjusting_service,
		   'dena'=> 0,
        ]);
}
if($request->final_due_after_adjusting_service < 0)
{
patient::where('id', $request->patient_id )
       ->update([
           'dena' => $request->final_due_after_adjusting_service,
		   'due'=> 0,
        ]);

}
if($request->final_due_after_adjusting_service == 0)
{
patient::where('id', $request->patient_id )
       ->update([
           'dena' => 0,
		   'due'=> 0,
        ]);

}	






		$cabineid = $p->cabinelist_id;
	
			   cabinelist::whereId($cabineid)
  ->update(['booking_status' => '0',
  'patient_id' => null, 
   'patientname' => null, 
  
  
  
  ]);   // 0-> seat faka 1->seat book 
  
  		   patient::whereId($request->patient_id)
  ->update(['booking_status' => '2']);  // 0-> patient kokhono seat book kore nai  1->patient seat booking kore ache 2->patient seat relase koreche 
 
	
	
	  
 $enddate= new DateTime(Carbon::now());
       cabinetransaction::where( 'id' , $p->cabinetransaction_id )
  ->update(['ending' => $enddate]);  











		
		/////////// update company balance 
  
 if ( $request->duepayment ) 
 {
  
  
	$duetransition = new duetransition();
	$duetransition->patient_id = $request->patient_id;	
	$duetransition->user_id =  auth()->user()->id ;
	
	$duetransition->totalamount = $request->duepayment+ $request->finaldis;
	$duetransition->amount = $request->duepayment;	
	$duetransition->discountondue = $request->finaldis;
	$duetransition->comment = "Due payment at the time of releasing patient ";	
	$duetransition->transitiontype = 1;
	
	$duetransition->save();  
  
  
  
  
  
  
  
  
  
  $balance =  balance_of_business::first();
  
   balance_of_business::where('id', 1)
  ->update(['balance' =>( $request->duepayment + $balance->balance)  ]);	

		
 }		

/// insert into patientfinalhisab

	
	$patientfinalhisab = new patientfinalhisab(); 
	$patientfinalhisab->user_id =  auth()->user()->id ;
	$patientfinalhisab->patient_id = $request->patient_id;	
	$patientfinalhisab->gross_amount =  $request->finalTotalcost;
	$patientfinalhisab->receiveable_amount =  $request->finalreceiveableamount;
    $patientfinalhisab->total_discount =    $request->finaldis;
	$patientfinalhisab->total_due =   $request->final_due_after_adjusting_service;
	$patientfinalhisab->total_Commission = $request->finalcommission;
    $patientfinalhisab->save();



///

$patinet = patient::findOrFail($request->patient_id);

if($patinet->agentdetail_id)
{
	$agenttransaction = new agenttransaction();
	$agenttransaction->agentdetail_id= $patinet->agentdetail_id;
	$agenttransaction->user_id= auth()->user()->id ;
	$agenttransaction->patient_id= $request->patient_id;
	$agenttransaction->transitiontype=	5;
	$agenttransaction->comment= "After Discharging Patient";	
	$agenttransaction->paidamount=	$request->finalcommission;	
	$agenttransaction->save();
	
	
	
	
	
	  $agent =  agentdetail::findOrFail($patinet->agentdetail_id)->hospitaler_kache_pawna;
  $agentbalance =  $agent  + $request->finalcommission  ;
     agentdetail::findOrFail($patinet->agentdetail_id)
  ->update(['hospitaler_kache_pawna' =>$agentbalance  ]); 
	
	
	
	
	
	
	
	
	
}


if($patinet->doctor_id)
{
$doctorCommissionTransition = new doctorCommissionTransition();
	
$doctorCommissionTransition->doctor_id= $patinet->doctor_id;
$doctorCommissionTransition->user_id=	auth()->user()->id ;
$doctorCommissionTransition->patient_id=	$request->patient_id;
$doctorCommissionTransition->amount=	$request->finalcommission;		
$doctorCommissionTransition->comment=	 "After Discharging Patient";	
$doctorCommissionTransition->transitiontype=	5;	
$doctorCommissionTransition->save();	



$doctor = doctor::findOrFail($patinet->doctor_id);
		$pawna = $doctor->hospitaler_kache_pawna + $request->finalcommission;
		
            doctor::where('id', $patinet->doctor_id )
            ->update(['hospitaler_kache_pawna' => $pawna]);












}



















});	
return \Redirect::route('finalreport.pdfbill', [$request->patient_id]);
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
