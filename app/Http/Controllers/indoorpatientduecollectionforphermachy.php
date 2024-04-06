<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patient;  
use App\Models\doctor;  
use App\Models\duetransition; 
use App\Models\cabinetransaction;  
use App\Models\doctorappointmenttransaction; 
use App\Models\medicinetransition;   
use App\Models\reporttransaction;   
use App\Models\surgerytransaction; 
use App\Models\patientfinalhisab;
use App\Models\servicelistinhospital; 
use App\Models\servicetransition; 
 use App\Models\serviceorder;
use App\Models\order;
use App\Models\cabinelist;
use App\Models\cashtransition; 
use App\Models\User; 
use App\Models\return_order;

	use App\Models\cabinefeetransition;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DateTime;

use App\Models\reportorder; 
use App\Models\finalreport; 
use DataTables;
use Validator;   
use PDF;
use App\Models\balance_of_business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class indoorpatientduecollectionforphermachy extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function index(Request $request)
    {
     // $patient=  patient::where('id', '!=', 1)->latest()->get(); //where('booking_status', 2 )->
	 
 $patient =   patient::with('cabinelist','cabinetransaction')->where(function ($query) { $query->where('booking_status', 1);})->where('softdelete', 0)->latest()->get(); 
	  
	

	  
	  
	  
	  
	  
	  
	  
	        if ($request->ajax()) {
           // $patient =    patient::where('id', '!=', 1)->latest()->get(); //where('booking_status', 2 )->
		   
	 $patient =   patient::with('cabinelist','cabinetransaction')->where(function ($query) { $query->where('booking_status', 1);})->where('softdelete', 0)->latest()->get(); 
	 
	// $patient =   patient::with('cabinelist','cabinetransaction')->where(function ($query) { $query->where('due', '>', 0)->orWhere('dena', '>', 0);})->where('booking_status', 1)->where('softdelete', 0)->latest()->get(); 
	  


		  return Datatables::of($patient)
                   ->addIndexColumn()
                    ->addColumn('action', function( patient $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"> দেনা/পাওনা মিটিয়ে ফেলুন  </button>';
                        $button .= '&nbsp;&nbsp;';
                        
                        return $button;
                    })  
		->addColumn('cabine_name', function (patient $patient) {
   		
					
				 if($patient->cabinelist_id) 
	{	
					$cabine_serial_no = cabinelist::findOrfail($patient->cabinelist_id)->serial_no;
					if ($cabine_serial_no )
					return $cabine_serial_no;
				else
					return "Not Applicable";
	} 
				
	else
	return "Not Applicable";			
}
		
		
				
				
				
				)
				
				       ->addColumn('starting_date', function (patient $patient) {  // has one relationship
                   if($patient->cabinetransaction_id)  
				   { 
                 $starting_date = cabinetransaction::findOrfail($patient->cabinetransaction_id)->starting;
return date('d/m/Y ', strtotime($starting_date) );
				   //return $starting_date;
				   }
				   else
					return "Not Applicable";	   
                })
				
				
				
				       ->addColumn('ending', function (patient $patient) {  // has one relationship
                   if($patient->cabinetransaction_id)  
				   { 
                 $endingdate = cabinetransaction::findOrfail($patient->cabinetransaction_id)->ending;
				 if($endingdate)
				 {
					 
					 return date('d/m/Y ', strtotime($endingdate) );
				 }
else
return "Not Applicable";		
				   //return $starting_date;
				   }
				   else
					return "Not Applicable";	   
                })				
				
				
				
				
					       ->addColumn('finaldue', function (patient $patient) {  // has one relationship


$id = $patient->cabinelist_id;
		$cabine = cabinelist::findOrFail($id);

	//$patient= patient::findOrFail($cabine->patient_id);
	$cabinetransaction = cabinetransaction::findOrFail($patient->cabinetransaction_id	);
	
	
 		 
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



$due = $patient->due - $patient->dena+  $total_seat_fair;

return $due; 

                })							
				
				
				
				
				


				->editColumn('finalreport', function ($booking_patient) {
                return '<a   target="_blank"      href="'.route('cabinetransaction.details_of_individual_booking_patient', $booking_patient->id).'">Release</a>';
            }) 			
				
				


					
					
                    ->rawColumns(['action','finalreport'])
                    ->make(true);
					
	
        } 
      
	 
	  

        return view('final_report_and_bill.patient_medicine', compact('patient'));   

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
       if(request()->ajax())
        {
            $data = patient::findOrFail($id);
			
				// medicine 
	$duemedicine = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 2 )->sum('amount');
	$returnmedicine = duetransition::where('patient_id', $id)->where('transitiontype', 4 )->where('transitionproducttype', 2 )->sum('amount');
	$duepayemntmedicine = duetransition::where('patient_id', $id)->where(function ($query) { $query->where('transitiontype', 1)->Orwhere('transitiontype', 6);})->where('transitionproducttype', 2 )->sum('totalamount');
	
	
	
	
	
			$refundmedicine = duetransition::where('patient_id', $id)->where('transitiontype', 3 )->where('transitionproducttype', 2 )->sum('amount');
 
	
	
	
	
	
	$present_due_medicine = $duemedicine - ( $returnmedicine - $refundmedicine) - $duepayemntmedicine ; 
	

	
	// pathology 
	$due_pathology = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 4 )->sum('amount');
	
	$due_pay_pathology = duetransition::where('patient_id', $id)->where('transitiontype', 1 )->where('transitionproducttype', 4 )->sum('totalamount');
	$present_due_pathology = $due_pathology - $due_pay_pathology;
	
	
	// doctor visit 
	$doctor_visit_due  = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 5 )->sum('amount');
	$doctor_visit_due_payemt = duetransition::where('patient_id', $id)->where('transitiontype', 1 )->where('transitionproducttype', 5 )->sum('totalamount');
	
	$present_due_doctor_visit = $doctor_visit_due - $doctor_visit_due_payemt;
	
	// surgery 
	
	$surgery_due = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 3 )->sum('amount');
	
		
	$surgery_due_pay = duetransition::where('patient_id', $id)->where('transitiontype', 1 )->where('transitionproducttype', 3 )->sum('totalamount');
	
	$present_durgery_due = $surgery_due - $surgery_due_pay;
	
	// servie 
	
	$service_due = duetransition::where('patient_id', $id)->where('transitiontype', 6 )->where('transitionproducttype', 3 )->sum('amount');
	
		
	$service_due_payment = duetransition::where('patient_id', $id)->where('transitiontype', 6 )->where('transitionproducttype', 3 )->sum('totalamount');
	
	$present_servie_due = $service_due - $service_due_payment;
	
			
			
		




	// cabine 
	
	
	
	 $patient =   patient::with('cabinelist','cabinetransaction')->findOrFail($id);
	$id = $patient->cabinelist_id;
		$cabine = cabinelist::findOrFail($id);

	//$patient= patient::findOrFail($cabine->patient_id);
	$cabinetransaction = cabinetransaction::findOrFail($patient->cabinetransaction_id	);
	
	
 		 
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
	
	






		
			
			
			
			
			
			
			
			
			
			
            return response()->json(['data' => $data , 'present_servie_due' => $present_servie_due, 'present_durgery_due' =>$present_durgery_due,

'present_due_doctor_visit' => $present_due_doctor_visit, 'present_due_pathology' => $present_due_pathology,

'present_due_medicine' => $present_due_medicine, 'total_seat_fair'=> $total_seat_fair,



			]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function update(Request $request)
    {
	
          
            $rules = array( 
               
                'amount',
				'comment',
				'transitiontype',
				'pathology_due',
				'pathologydue_due_payment',
				'Pathology_concession',
				'Pathology_refund',
				
				'Pahermachy_due','Pahermachy_due_payment','Pahermachy_concession','Pahermachy_refund',
				'service_due','service_due_payment','service_concession','service_refund',
				'cabine_due','cabine_concession','cabine_refund',
				'doctor_due','doctor_due_payment','doctor_concession','doctor_refund',
				'surgery_due','surgery_due_payment','surgery_concession','surgery_refund',
				'cabine_due_payment','cabine_due_concession'
	
				
				
            );



   $patient=  patient::findOrFail($request->hidden_id);


if (  ($request->cabine_due_payment ) or ($request->cabine_due_concession))
{
	
	
$cabinefeetransition = new cabinefeetransition();
$cabinefeetransition->cabinelist_id = $patient->cabinelist_id;
$cabinefeetransition->user_id = Auth()->user()->id;
$cabinefeetransition->patient_id = $request->hidden_id;
$cabinefeetransition->cabinetransaction_id	 = $patient->cabinetransactionid;


$cabinefeetransition->gross_amount = ($request->cabine_due_payment + $request->cabine_due_concession ) ;


$cabinefeetransition->paid = $request->cabine_due_payment;
$cabinefeetransition->discount = $request->cabine_due_concession;

$cabinefeetransition->save();
	
	

	
	$request->amount = $request->amount - $request->cabine_due_payment ;
	
	
	
	$duetransition = new duetransition();

$duetransition->patient_id =  $request->hidden_id;

$duetransition->user_id = Auth()->user()->id;

$duetransition->cabinefeetransition_id = $cabinefeetransition->id;
$duetransition->totalamount =   ($request->cabine_due_payment + $request->cabine_due_concession ) ;
$duetransition->amount = $request->cabine_due_payment;
$duetransition->discountondue = $request->cabine_due_concession ;
$duetransition->transitiontype = 1;

$duetransition->transitionproducttype = 1;
$duetransition->comment = "Due Payment for Cabine ";
$duetransition->save();
	

	
		$patientfinalhisab=	patientfinalhisab::where('patient_id', $request->hidden_id )->first();
		
		$upadateddue = $patientfinalhisab->total_due - ( $request->cabine_due_payment + $request->cabine_due_concession );
		$updated_discount = $patientfinalhisab->total_discount + $request->cabine_due_concession ;
		
		$updated_receivable_amount = $patientfinalhisab->receiveable_amount	 - $request->cabine_due_concession ;
		
	        $form_data = array(            
            'total_due'        =>   $upadateddue,
			'total_discount'  =>   $updated_discount,  
'receiveable_amount'	=>   $updated_receivable_amount,  		
        );
        patientfinalhisab::where('patient_id', $request->hidden_id )->update($form_data);	
	

}



















$totalconcession = $request->Pathology_concession + $request->Pahermachy_concession + $request->service_concession
+ $request->doctor_concession + $request->surgery_concession;

$totalrefund = $request->Pathology_refund + $request->Pahermachy_refund + $request->service_refund
+ $request->doctor_refund + $request->surgery_refund;


$totalduepayemt = $request->pathologydue_due_payment + $request->doctor_due_payment + $request->service_due_payment
+ $request->surgery_due_payment + $request->Pahermachy_due_payment;

$total_due_paymet_and_concession = $totalduepayemt + $totalconcession;


// update patient dena 


if ($request->transitiontype == 6 )
{
$patient = patient::findOrFail($request->hidden_id);

$current_dena = $patient->dena - $totalduepayemt;

$current_due = $patient->due -   $total_due_paymet_and_concession   ;

       patient::whereId($request->hidden_id)
  ->update(['dena' => $current_dena,
  
  'due'  => $current_due,
  ]); 

}



$totalamount =  $total_due_paymet_and_concession;

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
       
	
	   
	   
	   
	   
	 // pathology 	
		
	if ($request->pathologydue_due_payment > 0 )	
	{
		
				$duetransition = new duetransition();
		$duetransition->patient_id	= $request->hidden_id;
		$duetransition->user_id	= Auth()->User()->id;
		$duetransition->totalamount	= $request->Pathology_concession + $request->pathologydue_due_payment;
		$duetransition->amount	= $request->pathologydue_due_payment;
		$duetransition->discountondue	= $request->Pathology_concession;
		$duetransition->transitionproducttype	= 4;	
		
		
		if ($request->Pathology_comment)
		{
			$duetransition->comment	= $request->Pathology_comment;
		}
		else
		{
			$duetransition->comment	= " Pathology Due Payment";
		}
		
		$duetransition->transitiontype	= $request->transitiontype; 
		$duetransition->save();
		
		
		
		
	}
		

		if ($request->Pathology_refund > 0 )	
	{
		
				$duetransition = new duetransition();
		$duetransition->patient_id	= $request->hidden_id;
		$duetransition->user_id	= Auth()->User()->id;
		$duetransition->totalamount	= $request->Pathology_refund ;
		$duetransition->amount	= $request->Pathology_refund;
	
		$duetransition->transitionproducttype	= 4;	
		
		
		if ($request->Pathology_comment)
		{
			$duetransition->comment	= $request->Pathology_comment;
		}
		else
		{
			$duetransition->comment	= " Pathology Refund";
		}
		
		$duetransition->transitiontype	= 3;
		$duetransition->save();
		
		
		
		
	}	
		
		
		
// Phermachy 


	if ($request->Pahermachy_due_payment > 0 )	
	{
		
				$duetransition = new duetransition();
		$duetransition->patient_id	= $request->hidden_id;
		$duetransition->user_id	= Auth()->User()->id;
		$duetransition->totalamount	= $request->Pahermachy_concession + $request->Pahermachy_due_payment;
		$duetransition->amount	= $request->Pahermachy_due_payment;
		$duetransition->discountondue	= $request->Pahermachy_concession;
		$duetransition->transitionproducttype	= 2;	
		
		
		if ($request->phermachy_comment)
		{
			$duetransition->comment	= $request->phermachy_comment;
		}
		else
		{
			$duetransition->comment	= " Phermachy Due Payment";
		}
		
		$duetransition->transitiontype	= $request->transitiontype; 
		$duetransition->save();
		
		
	$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount =  $request->Pahermachy_concession + $request->Pahermachy_due_payment;;
$cashtransition->discount = $request->Pahermachy_concession;	
$cashtransition->amount_after_discount = $request->Pahermachy_due_payment;
$cashtransition->deposit = $request->Pahermachy_due_payment;
$cashtransition->debit =  0 ;
$cashtransition->credit = $request->Pahermachy_due_payment + $request->Pahermachy_concession  ;
$cashtransition->description = "Pahermachy Due Payment from Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 1;

$cashtransition->customer_type = 2;
$cashtransition->transitionproducttype = 2; 
$cashtransition->save();		
	
















	
		
	}
		

		if ($request->Pahermachy_refund > 0 )	
	{
		
				$duetransition = new duetransition();
		$duetransition->patient_id	= $request->hidden_id;
		$duetransition->user_id	= Auth()->User()->id;
		$duetransition->totalamount	= $request->Pahermachy_refund ;
		$duetransition->amount	= $request->Pahermachy_refund;
	
		$duetransition->transitionproducttype	= 2;	
		
		
		if ($request->phermachy_comment)
		{
			$duetransition->comment	= $request->phermachy_comment;
		}
		else
		{
			$duetransition->comment	= " Pahermachy Refund";
		}
		
		$duetransition->transitiontype	= 3;
		$duetransition->save();
		
		
		
		
		
		
	$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->Pahermachy_refund ;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->Pahermachy_refund;
$cashtransition->withdrwal = $request->Pahermachy_refund;
$cashtransition->debit =  0 ;
$cashtransition->credit = 0  ;
$cashtransition->description = "Pahermachy Refund to the Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 2;

$cashtransition->customer_type = 4;
$cashtransition->transitionproducttype = 2; 
$cashtransition->save();

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}		
		
		
	// doctor 


	if ($request->doctor_due_payment > 0 )	
	{
		
				$duetransition = new duetransition();
		$duetransition->patient_id	= $request->hidden_id;
		$duetransition->doctor_id	= $request->doctorid;
		$duetransition->user_id	= Auth()->User()->id;
		$duetransition->totalamount	= $request->doctor_concession + $request->doctor_due_payment;
		$duetransition->amount	= $request->doctor_due_payment;
		$duetransition->discountondue	= $request->doctor_concession;
		$duetransition->transitionproducttype	= 5;	
		
		
		if ($request->Doctor_visit_Comment)
		{
			$duetransition->comment	= $request->Doctor_visit_Comment;
		}
		else
		{
			$duetransition->comment	= " Doctor Due Payment" .$request->doctorid ;
		}
		
		$duetransition->transitiontype	= $request->transitiontype; 
		$duetransition->save();
		
		
		
		
	}
		

		if ($request->doctor_refund > 0 )	
	{
		
				$duetransition = new duetransition();
		$duetransition->patient_id	= $request->hidden_id;
		$duetransition->doctor_id	= $request->doctorid;
		$duetransition->user_id	= Auth()->User()->id;
		$duetransition->totalamount	= $request->doctor_refund ;
		$duetransition->amount	= $request->doctor_refund;
	
		$duetransition->transitionproducttype	= 5;	
		
		
		if ($request->Doctor_visit_Comment)
		{
			$duetransition->comment	= $request->Doctor_visit_Comment;
		}
		else
		{
			$duetransition->comment	= " Doctor Refind of the Doctor " .$request->doctorid ;
		}
		
		$duetransition->transitiontype	= 3;
		$duetransition->save();
		
		
		
		
	}



// Service



	if ($request->service_due_payment > 0 )	
	{
		
				$duetransition = new duetransition();
		$duetransition->patient_id	= $request->hidden_id;
		$duetransition->user_id	= Auth()->User()->id;
		$duetransition->totalamount	= $request->service_concession + $request->service_due_payment;
		$duetransition->amount	= $request->service_due_payment;
		$duetransition->discountondue	= $request->service_concession;
		$duetransition->transitionproducttype	= 6;	
		
		
		if ($request->Service_comment)
		{
			$duetransition->comment	= $request->Service_comment;
		}
		else
		{
			$duetransition->comment	= " Service Due Payment";
		}
		
		$duetransition->transitiontype	= $request->transitiontype; 
		$duetransition->save();
		
		
		
		
	}
		

		if ($request->service_refund > 0 )	
	{
		
				$duetransition = new duetransition();
		$duetransition->patient_id	= $request->hidden_id;
		$duetransition->user_id	= Auth()->User()->id;
		$duetransition->totalamount	= $request->service_refund ;
		$duetransition->amount	= $request->service_refund;
	
		$duetransition->transitionproducttype	= 6;	
		
		
		if ($request->Service_comment)
		{
			$duetransition->comment	= $request->Service_comment;
		}
		else
		{
			$duetransition->comment	= " Service Refund";
		}
		
		$duetransition->transitiontype	= 3;
		$duetransition->save();
		
		
		
		
	}





	// Surgery



	if ($request->surgery_due_payment > 0 )	
	{
		
				$duetransition = new duetransition();
		$duetransition->patient_id	= $request->hidden_id;
		$duetransition->user_id	= Auth()->User()->id;
		$duetransition->totalamount	= $request->surgery_concession + $request->surgery_due_payment;
		$duetransition->amount	= $request->surgery_due_payment;
		$duetransition->discountondue	= $request->surgery_concession;
		$duetransition->transitionproducttype	= 3;	
		
		
		if ($request->surgery_comment)
		{
			$duetransition->comment	= $request->surgery_comment;
		}
		else
		{
			$duetransition->comment	= " Surgery Due Payment";
		}
		
		$duetransition->transitiontype	= $request->transitiontype; 
		$duetransition->save();
		
		
		
		
	}
		

		if ($request->surgery_refund > 0 )	
	{
		
				$duetransition = new duetransition();
		$duetransition->patient_id	= $request->hidden_id;
		$duetransition->user_id	= Auth()->User()->id;
		$duetransition->totalamount	= $request->surgery_refund ;
		$duetransition->amount	= $request->surgery_refund;
	
		$duetransition->transitionproducttype	= 3;	
		
		
		if ($request->surgery_comment)
		{
			$duetransition->comment	= $request->surgery_comment;
		}
		else
		{
			$duetransition->comment	= " Surgery Refund";
		}
		
		$duetransition->transitiontype	= 3;
		$duetransition->save();
		
		
		
		
	}  
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   if ($request->transitiontype == 1 )
	   {
 
		   
	   $amount_of_current_due = $patient->due - $totalamount ; 
	  	  //////////////// update business balance 
	     $balance = balance_of_business::first();  
   $present_balance = $balance->balance + $request->amount ;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
	  
	  ///////////////////////////////////////

        $form_data = array(
            
            'due'        =>   $amount_of_current_due,
            
        );
        patient::whereId($request->hidden_id)->update($form_data);
		
	

		
		
		if ($patient->booking_status == 2  )
		{
	$patientfinalhisab=	patientfinalhisab::where('patient_id', $request->hidden_id )->first();
		
		$upadateddue = $patientfinalhisab->total_due - $totalamount;
		
	        $form_data = array(
            
            'total_due'        =>   $upadateddue,
            
        );
        patientfinalhisab::where('patient_id', $request->hidden_id )->update($form_data);	
		
		}
	   }
		  



		  if ($request->transitiontype == 3 )  // jodi customer er kache thaka dena shod hoy 
	   {

		   

	   
	  	  //////////////// update business balance 
	     $balance = balance_of_business::first();  
   $present_balance = $balance->balance - $totalrefund;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
	  
	  ///////////////////////////////////////


	

		
			$patientfinalhisab=	patientfinalhisab::where('patient_id', $request->hidden_id )->first();
		
		if ($patientfinalhisab)
		{
		$upadateddue = $patientfinalhisab->refund + $totalrefund;
		
	        $form_data = array(
            
            'refund'        =>   $upadateddue,
            
        );
        patientfinalhisab::where('patient_id', $request->hidden_id )->update($form_data);	
		}
		
		
		
		
		if($request->transitiontype == 1){
			Log::channel('medicneTrinction')->info('ইনডোর কাস্টমার এর দেনা পাওনা এর ট্রানজেকশন',
			[
				'type'=> 'কাস্টমার এর থেকে পাওনা টাকা নিচ্ছেন',
				'employee_details'=> Auth::user(),
				'Info'=> $request->all(),
			]);

		}elseif($request->transitiontype == 2){
			Log::channel('medicneTrinction')->info('ইনডোর কাস্টমার এর দেনা পাওনা এর ট্রানজেকশন',
			[
				'type'=> 'কাস্টমার এর থেকে পাওনা ফেরত দিচ্ছেন',
				'employee_details'=> Auth::user(),
				'Info'=> $request->all(),
			]);

		}elseif($request->transitiontype == 3){

			Log::channel('medicneTrinction')->info('ইনডোর কাস্টমার এর দেনা পাওনা এর ট্রানজেকশন',
			[
				'type'=> 'ইনডোর কাস্টমার এর দেনা পাওনা এডজাস্ট করেছেন ( প্রকৃত পক্ষে কোন লেনদেন হয় না )',
				'employee_details'=> Auth::user(),
				'Info'=> $request->all(),
			]);

		}
		
		
		
		

  return \Redirect::route('duecolletionphermachy.index');
	   }   
	   
	   if($request->transitiontype == 1){
		Log::channel('medicneTrinction')->info('ইনডোর কাস্টমার এর দেনা পাওনা এর ট্রানজেকশন',
		[
			'type'=> 'কাস্টমার এর থেকে পাওনা টাকা নিচ্ছেন',
			'employee_details'=> Auth::user(),
			'Info'=> $request->all(),
		]);

	}elseif($request->transitiontype == 2){
		Log::channel('medicneTrinction')->info('ইনডোর কাস্টমার এর দেনা পাওনা এর ট্রানজেকশন',
		[
			'type'=> 'কাস্টমার এর থেকে পাওনা ফেরত দিচ্ছেন',
			'employee_details'=> Auth::user(),
			'Info'=> $request->all(),
		]);

	}elseif($request->transitiontype == 3){

		Log::channel('medicneTrinction')->info('ইনডোর কাস্টমার এর দেনা পাওনা এর ট্রানজেকশন',
		[
			'type'=> 'ইনডোর কাস্টমার এর দেনা পাওনা এডজাস্ট করেছেন ( প্রকৃত পক্ষে কোন লেনদেন হয় না )',
			'employee_details'=> Auth::user(),
			'Info'=> $request->all(),
		]);

	}
	   
	    return \Redirect::route('duecolletionphermachy.duetransforphermachy');
      //  return response()->json(['success' => 'Data is successfully updated']);
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
