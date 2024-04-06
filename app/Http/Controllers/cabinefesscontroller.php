<?php

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
use App\Models\cashtransition;
use App\Models\setting;

use App\Models\cabinefeetransition;
use Illuminate\Support\Facades\DB; 
Use \Carbon\Carbon;
use DateTime;
use DataTables;
use PDF;

use Redirect;
class cabinefesscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


	  $cabinefeestran =  cabinefeetransition::with('cabinelist','patient','user')->orderBy('created_at', 'desc')->limit(100)->get();
		
		
		
		        if ($request->ajax()) {
					

	  $cabinefeestran =  cabinefeetransition::with('cabinelist','patient','user')->orderBy('created_at', 'desc')->limit(100)->get();
		
            return Datatables::of($cabinefeestran)
                   ->addIndexColumn()
				   

                    ->addColumn('action', function( cabinefeetransition $data){ 
   

                          $button = '<button type="button" name="delete" id="'.$data->id.'"     class="delete btn btn-danger btn-sm">Delete</button>';
                       
                          $button .= '&nbsp;&nbsp;';
                     
					   return $button;
                    })

                      ->addColumn('patient_name', function (cabinefeetransition $cabinefeestran) {
                   


					if($cabinefeestran->patient->name)
						 return $cabinefeestran->patient->name;
					 else
						return "NA"; 
				 
                })
				
				      ->addColumn('patient_mobile', function (cabinefeetransition $cabinefeestran) {
                   if( $cabinefeestran->patient->mobile)
					   return $cabinefeestran->patient->mobile;
				   else
					   return "NA";
				  
                })
				
				
				
				->addColumn('Cabine_no', function (cabinefeetransition $cabinefeestran) {
                   if( $cabinefeestran->cabinelist_id)
				   {
                      $d= cabinelist::findOrFail($cabinefeestran->cabinelist_id)->serial_no;
  return $d;
				   }					   



				
				   else
					   return "NA";
				  
                })
				
				
				
					->addColumn('entryby', function (cabinefeetransition $cabinefeestran) {
                   if( $cabinefeestran->User->name)
					   return  $d=  $cabinefeestran->User->name;
				   else
					   return "NA";
				  
                })
					

                 ->editColumn('created', function(cabinefeetransition $data) {
					
					 return date('d/m/y ', strtotime($data->created_at) );
                    
                })
				
			                 ->editColumn('from', function(cabinefeetransition $data) {
					
					 return date('d/m/y', strtotime($data->starting) );
                    
                })	
				
				
				
				
			                 ->editColumn('to', function(cabinefeetransition $data) {
					
					 return date('d/m/y', strtotime($data->ending) );
                    
                })	
				
				
				
				
				
				
				
				
             ->editColumn('pdf', function ($cabinefeestran) {
                return '<a   target="_blank"      href="'.route('cabinefees.pdf', $cabinefeestran->id).'">Print</a>';
            })
				

					
					
                    ->rawColumns(['action','pdf','created','from','to', ])
                    ->make(true);
        }
	

		//return view('releasepatient.cabinefeetaken', compact('cabine'));
   
return view('releasepatient.cabineallfeetrans', compact('cabinefeestran'));

   }








public function dropdown_list()
{
	
	
	
       $cabine = cabinelist::where('booking_status',1)->orderBy('serial_no')->get();
	  
	  return response()->json(['cabine' => $cabine, ]);	
	
	
}






public function cabinefees_due_pre($id)
{
	
	
	
       $cabine = cabinelist::where('booking_status',1)->orderBy('serial_no')->get();
	  
	  return response()->json(['cabine' => $cabine, ]);	
	
	
}















public function fetchinformation($id)
{
	
		$cabine = cabinelist::findOrFail($id);

	$patient= patient::findOrFail($cabine->patient_id);
	
	$cabine_due_previous = cabinetransferhisto::where('patient_id',$cabine->patient_id)->sum('due');
	
	
	$cabine_due_previous_paid = cabinefeetransition::where('patient_id',$cabine->patient_id)->sum('collection_from_previous_seat');
	
	
	$cabine_due_previous = $cabine_due_previous - $cabine_due_previous_paid;
	
	
	$cabinetransaction = cabinetransaction::findOrFail($patient->cabinetransaction_id	);
	
	$deposit = $patient->dena - $patient->due;
	
		 
	if ($cabinetransaction->tillpaiddate == null )
	{
		$startimeshow =   $cabinetransaction->starting;
  $time1= strtotime($cabinetransaction->starting);
	 
	}
	else
	{
		

$start = $cabinetransaction->tillpaiddate;
$startimeshow = date('Y-m-d', strtotime($start . ' +1 day'));
		
  $time1= strtotime($startimeshow);
	  

	  
	  
	  
	}
	
			    $enddate= new DateTime(Carbon::now());
  $enddateinstring =Carbon::now();	
	   $time2=strtotime($enddateinstring);
   
	   $cabine_fair_per_day= $cabine->price;
	   
   $diff = $time2 - $time1 ;
   
 $differnece_btw_two_date_by_day = ceil($diff/ (60*60*24));



 
 
 $total_seat_fair= $differnece_btw_two_date_by_day * $cabine_fair_per_day ;

	

	
	return response()->json(['total_seat_fair'=> $total_seat_fair,'startimeshow'=>$startimeshow,
	
	'cabinetransaction'=>$cabinetransaction,'patient'=>$patient,
	'cabine'=>$cabine,'differnece_btw_two_date_by_day'=>$differnece_btw_two_date_by_day,
	
	'cabine_fair_per_day'=>$cabine_fair_per_day,'enddateinstring'=>$enddateinstring,
	'deposit'=> $deposit, 'cabine_due_previous' => $cabine_due_previous,
	 ]);	
	
	
}










public function pay(Request $request)
{
// DB::transaction(function () use ($request) {
$validator=Validator::make($request->all(), [
   'cabineid',
		'patientid',
		'cabinetransactionid',
		'unpaiddate'=>'date|nullable',
		'paytilldate'=>'date|nullable',
		'payingamount'=>'required|numeric',
		
		'presentcabine_paidamount',
		'dataentrydate',
		
		'cabine_due_previous','discount_previous_due','paid_previous_due','paid_previous_advance',
]);

	
 $total_discount = $request->discount_previous_due + $request->discount;
$adjust_with_advance = $request->adjust_with_advance + $request->paid_previous_advance;
$paid= (double)$request->payingamount + (double)$request->paid_previous_due;

$previous_seat_amnt= $request->discount_previous_due + $request->paid_previous_advance + $request->paid_previous_due;




if ($validator->fails()) {

	return \Redirect::back();
   //return Redirect::back()->withErrors($validator);
}

$patient = patient::findOrFail($request->patientid);
	$deposit = $patient->dena - $patient->due;
if (  ( $adjust_with_advance != 0 ) and ( $adjust_with_advance > $deposit ))
{
    return response()->json(['success' => 'Advance Deposit is not avilable']);	
	
}



$cabinefeetransition = new cabinefeetransition();
$cabinefeetransition->cabinelist_id = $request->cabineid;
$cabinefeetransition->user_id = Auth()->user()->id;
$cabinefeetransition->patient_id = $request->patientid;
$cabinefeetransition->cabinetransaction_id	 = $request->cabinetransactionid;
$cabinefeetransition->starting = $request->unpaiddate;
$cabinefeetransition->ending = $request->paytilldate;

$cabinefeetransition->gross_amount = $paid + $total_discount + $adjust_with_advance ;



$cabinefeetransition->collection_from_previous_seat =    $previous_seat_amnt;

$cabinefeetransition->created_at = $request->dataentrydate; 


$cabinefeetransition->paid = $paid;
$cabinefeetransition->discount = $total_discount;
$cabinefeetransition->adjust_with_advance	 = $adjust_with_advance	;
$cabinefeetransition->save();






$duetransition = new duetransition();

$duetransition->patient_id = $request->patientid;

$duetransition->user_id = Auth()->user()->id;

$duetransition->cabinefeetransition_id = $cabinefeetransition->id; 
$duetransition->totalamount =   $paid + $total_discount + $adjust_with_advance;  
$duetransition->amount = $paid +  $adjust_with_advance; 
$duetransition->discountondue = $total_discount;
$duetransition->transitiontype = 1;
$duetransition->transitionproducttype = 1;
$duetransition->comment = "Due Payment for Cabine ";
$duetransition->created_at = $request->dataentrydate;
$duetransition->save();




if ($request->paytilldate)
{
       cabinetransaction::whereId($request->cabinetransactionid)
  ->update(['tillpaiddate' => $request->paytilldate]);  
}




// update patient dena 
$patient = patient::findOrFail($request->patientid);

$current_dena = $patient->dena - $adjust_with_advance;


       patient::whereId($request->patientid)
  ->update(['dena' => $current_dena]); 



  
//                            ---------------------});		












$presentbalance= balance_of_business::findOrFail(1)->balance;
$presentbalance= $presentbalance  + $paid;


        balance_of_business::where('id', 1)
  ->update(['balance' => $presentbalance,

  ]);






$patient_name = patient::findOrFail($request->patientid)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->patientid;

$cashtransition->cabinefeetransition_id = $cabinefeetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $paid + $total_discount + $adjust_with_advance ;
$cashtransition->discount = $total_discount;	
$cashtransition->amount_after_discount = $paid  ;
$cashtransition->deposit = $paid;
$cashtransition->debit =  0;
$cashtransition->advance_deposit_minus =  $adjust_with_advance;

$cashtransition->credit = $paid;
$cashtransition->description = "Cabine Fees from Patinet Name: " .$patient_name. " Patient ID: " .$request->patientid. " Cabine Fees Trans ID: " .$cabinefeetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 1;
$cashtransition->created_at = $request->dataentrydate;
$cashtransition->customer_type = 1;
$cashtransition->transitionproducttype = 1; 
$cashtransition->save();















    return response()->json(['success' => 'Data Added Successfully']);

}



public function printpdf($id)
{

$setting = setting::first();
  $targettrans = cabinefeetransition::findOrFail($id);
  
  $patient = patient::findOrFail($targettrans->patient_id);
$cabine= cabinelist::findOrFail($targettrans->cabinelist_id);

	   $pdf = PDF::loadView('releasepatient.bill', compact('targettrans','setting','patient','cabine'),
   [], [
 'mode'                     => '',
	'format'                   => 'A5',
	'default_font_size'        => '8',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
]
   
   
   );


	 return $pdf->stream('document.pdf');





	
	
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
        //
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
       $targettrans = cabinefeetransition::findOrFail($id);
	   

	   $patient = patient::findOrFail($targettrans->patient_id);
	   
	   
	$patient_dena = $patient->dena + $targettrans->	adjust_with_advance;   
	   
	  patient::where('id', $targettrans->patient_id )
       ->update([

		   'dena' => $patient_dena,
        ]); 
	   
	   
	   
	   
	   
	   $duetransition = duetransition::where('patient_id',$targettrans->patient_id)->where('cabinefeetransition_id','>=', $id);
	     $duetransition->delete();
	   
	   
	   
	   
	$cashtransition =   cashtransition::where('patient_id',$targettrans->patient_id)->where('cabinefeetransition_id','>=', $id);
	
	  $cashtransition->delete();
	
	   
	   
	    $c= cabinefeetransition::where('cabinelist_id',$targettrans->cabinelist_id)->where('patient_id',$targettrans->patient_id)->whereDate('starting', '>=', $targettrans->starting );
		
		$sum = $c->sum('paid');
		
	$d=	date('Y-m-d', strtotime($targettrans->starting . ' -1 day'));
	   
	          cabinetransaction::whereId($targettrans->cabinetransaction_id	)
  ->update(['tillpaiddate' => $d]);  	
  
  
  $presentbalance= balance_of_business::findOrFail(1)->balance;
$presentbalance= $presentbalance  - $sum;


        balance_of_business::where('id', 1)
  ->update(['balance' => $presentbalance,

  ]);
  
  
  
  
  
  
  
  
  
  
  
  $c->delete();
  
  

	   
	   
	   
    }
}
