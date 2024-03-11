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
use App\Models\cabinetransferhisto; 
use App\Models\cashtransition; 
use App\Models\User; 





 use App\Models\serviceorder;
use App\Models\order;
use App\Models\cabinelist;

use App\Models\return_order;

	use App\Models\cabinefeetransition;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DateTime;

use App\Models\reportorder; 

use App\Models\finalreport; 
use App\Models\setting; 
use DataTables;
use Validator;   
use PDF;
use App\Models\balance_of_business; 
class finalreporttransitionController extends Controller
{
    /**
     * Display a listing of the duepayment. edit
     *
     * @return \Illuminate\Http\Response   dueadjustmentbeforerelease
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
              
					//$starting_date = cabinetransaction::findOrfail($patient->cabinetransaction_id)->starting;
					$starting_date = cabinetransaction::where('patient_id', $patient->id)->first()->starting;
      
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
	
	
 		 

	
	
			$startimeshow =   $cabinetransaction->starting;
  $time1= strtotime($cabinetransaction->starting);
	
	
	
	
			    $enddate= new DateTime(Carbon::now());
  $enddateinstring =Carbon::now();	
	   $time2=strtotime($enddateinstring);
   
	   $cabine_fair_per_day= $cabine->price;
	   
   $diff = $time2 - $time1 ;
   
 $differnece_btw_two_date_by_day = ceil($diff/ (60*60*24));



 
 
 $total_seat_fair = $differnece_btw_two_date_by_day * $cabine_fair_per_day ;
 


		  $gross_amount_cabine_histo= cabinetransferhisto::where('patient_id', $patient->id)
		  ->sum('gross_amount_from_previous');
	  
$total_seat_fair= 	$total_seat_fair+ $gross_amount_cabine_histo;	


$cabine_paid = cabinefeetransition::where('patient_id', $patient->id)->sum('gross_amount');

$cabine_due = $total_seat_fair - $cabine_paid;



     


$due = $patient->due - $patient->dena+  $cabine_due ;// $total_seat_fair_adjust denar vetore ache. tai balance korte due er sathe add kora hoyeche

//$due = $gross_amount_cabine_histo;

$due = round($due);


return $due; 

                })							
				
				
				
				
				


				->editColumn('finalreport', function ($booking_patient) {
                return '<a   target="_blank"      href="'.route('cabinetransaction.details_of_individual_booking_patient', $booking_patient->id).'">Release</a>';
            }) 			
				
				
				->editColumn('paydue', function ($booking_patient) {
                return '<a   target="_blank"      href="'.route('finalreport.paydue', $booking_patient->id).'">paydue</a>';
            }) 	

	
				->editColumn('Print', function ($booking_patient) {
                return '<a   target="_blank"      href="'.route('finalreport.pdfformreport', $booking_patient->id).'">Print</a>';
            }) 



	
					
                    ->rawColumns(['action','finalreport','paydue','Print'])
                    ->make(true);
					
	
        }
      
        return view('final_report_and_bill.patient', compact('patient'));   

    }









public function patient_cash_get()
{
	
	
	$patient = patient::select('id','name','mobile')->where('softdelete',0)->orderBy('id')->get();
 return view('final_report_and_bill.cash_trans', compact('patient'));   	
}

public function patient_cash_fetch( Request $request )
{
	
	
//dd($request);	
$data = patient::findOrFail($request->id);	
	
$id = $data->id;	
	
	$cashtransition = cashtransition::where('patient_id',$request->id )->get();
	

	
	
	if( ($data->booking_status ==1  ) or ($data->booking_status ==2  ) )

{

	
	// cabine 
	
	
	
	 $patient =   patient::with('cabinelist','cabinetransaction')->findOrFail($id);
	$id = $patient->cabinelist_id;
		$cabine = cabinelist::findOrFail($id);

	//$patient= patient::findOrFail($cabine->patient_id);
	$cabinetransaction = cabinetransaction::findOrFail($patient->cabinetransaction_id	);
	
	
	
	
				$startimeshow =   $cabinetransaction->starting;
  $time1= strtotime($cabinetransaction->starting);
	
	
	
	
			    $enddate= new DateTime(Carbon::now());
  $enddateinstring =Carbon::now();	
	   $time2=strtotime($enddateinstring);
   
	   $cabine_fair_per_day= $cabine->price;
	   
   $diff = $time2 - $time1 ;
   
 $differnece_btw_two_date_by_day = ceil($diff/ (60*60*24));



 
 
 $total_seat_fair = $differnece_btw_two_date_by_day * $cabine_fair_per_day ;
 


		  $gross_amount_cabine_histo= cabinetransferhisto::where('patient_id', $patient->id)->sum('gross_amount_from_previous');
	  
$total_seat_fair= 	$total_seat_fair+ $gross_amount_cabine_histo;	


$cabine_paid = cabinefeetransition::where('patient_id', $patient->id)->sum('gross_amount');

$cabine_due = $total_seat_fair - $cabine_paid;

	
$total_seat_fair 	= $cabine_due ;
	


}
else{
	
$total_seat_fair =0;	
}
	$setting = setting::first();


$pdf = PDF::loadView('final_report_and_bill.cashslip', compact('data','setting','total_seat_fair','cashtransition',
	
 
	 
	 
	 ),
	 
	 
	 	 
	   [], [
 'mode'                     => '',
	'format'                   => 'A5',
	'default_font_size'        => '7',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
] 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 );
	 
	 //->setPaper('a4', 'cabineadmissionfee')->service_gross_amount(false)->save('invoice.pdf'); cabineadmissionfee
    return $pdf->stream('invoice.pdf');
		



























	
	
}


















public function duepayment( )
{
	
	
	

      
        return view('final_report_and_bill.duepayment');  		
	
	
	
 	
	
}






public function duepayment_delete($id)
{


      

 $duetransition=  duetransition::findOrFail($id);
 

 
 $patient= patient::findOrFail($duetransition->patient_id);
 
 
 
 
 if ($patient->booking_status == 2)
 {


			$patientfinalhisab=	patientfinalhisab::where('patient_id', $patient->id )->first();
		
		$upadateddue = $patientfinalhisab->total_due + ( $duetransition->amount + 
		$duetransition->discountondue	 );
		$updated_discount = $patientfinalhisab->total_discount - $duetransition->discountondue ;
		
		$updated_receivable_amount = $patientfinalhisab->receiveable_amount	 + $duetransition->discountondue ;
		
	        $form_data = array(            
            'total_due'        =>   $upadateddue,
			'total_discount'  =>   $updated_discount,  
'receiveable_amount'	=>   $updated_receivable_amount,  		
        );
        patientfinalhisab::where('patient_id', $patient->id )->update($form_data);	
	


 }	 
 
 
 
 
 
 
 if($duetransition->transitiontype == 1)
 {
 $updateddue = $patient->due +  $duetransition->totalamount;
 
  		   patient::whereId($duetransition->patient_id)
  ->update(['due' =>  $updateddue
  ]); 

 
$balance = balance_of_business::first();

$updatedbalance = $balance->balance - $duetransition->amount;

 
 
  		   balance_of_business::where('id', 1 )
  ->update(['balance' =>  $updatedbalance
  ]);  
 
 }
 
 
  if($duetransition->transitiontype == 3)
 {


 
$balance = balance_of_business::first();

$updatedbalance = $balance->balance + $duetransition->amount;

 
 
  		   balance_of_business::where('id', 1 )
  ->update(['balance' =>  $updatedbalance
  ]);  
 
 }
 
 
   if($duetransition->transitiontype == 6)
 {
	 
	 
	 	 
$current_dena = $patient->dena +  $duetransition->amount;

$current_due = $patient->due +    $duetransition->totalamount   ;

       patient::whereId($patient->id)
  ->update(['dena' => $current_dena,
  
  'due'  => $current_due,
  ]); 	 
	 
	 
 
 
 }
 
 
 
 

 
 
 
 if($duetransition->cabinefeetransition_id)
 {
	 
	$cabinefeetransition = cabinefeetransition::findOrFail($duetransition->cabinefeetransition_id);
	
	$cabinefeetransition->delete(); 
 }
 
 
 
 $cashtransition = cashtransition::where('duetransition_id', $id)->first();
 
 if ($cashtransition)
 {
	 
$cashtransition->delete();	 
 }
 
 
 
 
 
   $duetransition->delete();
   
  


	  
    }









public function duepayment_patient()
{
	
$patient = patient::select('id','mobile','name','booking_status')->where('softdelete',0)->get();
	
	
	
	
	
	
            return response()->json(['patientdata' => $patient, 

			]);	
	
	

	
	
	
}











public function paydue($id)
{
	
	// medicine 
	$duemedicine = duetransition::where('patient_id', $id)->where('transitiontype', 2)->where('transitionproducttype', 2 )->sum('amount');
	$returnmedicine = duetransition::where('patient_id', $id)->where('transitiontype', 4 )->where('transitionproducttype', 2 )->sum('amount');
	$duepayemntmedicine = duetransition::where('patient_id', $id)->where(function ($query) { $query->where('transitiontype', 1)->Orwhere('transitiontype', 6);})->where('transitionproducttype', 2 )->sum('totalamount');
	
	$present_due_medicine = $duemedicine - $returnmedicine - $duepayemntmedicine ; 
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	// pathology 
	$due_pathology = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 4 )->sum('amount');
	
	$due_pay_pathology = duetransition::where('patient_id', $id)->where(function ($query) { $query->where('transitiontype', 1)->Orwhere('transitiontype', 6);})->where('transitionproducttype', 4 )->sum('totalamount');
	$present_due_pathology = $due_pathology - $due_pay_pathology;
	
	
	
	
	// doctor visit 
	$doctor_visit_due  = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 5 )->sum('amount');
	$doctor_visit_due_payemt = duetransition::where('patient_id', $id)->where(function ($query) { $query->where('transitiontype', 1)->Orwhere('transitiontype', 6);})->where('transitionproducttype', 5 )->sum('totalamount');
	
	$present_due_doctor_visit = $doctor_visit_due - $doctor_visit_due_payemt;
	
	// surgery 
	
	$surgery_due = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 3 )->sum('amount');
	
		
	$surgery_due_pay = duetransition::where('patient_id', $id)->where(function ($query) { $query->where('transitiontype', 1)->Orwhere('transitiontype', 6);})->where('transitionproducttype', 3 )->sum('totalamount');
	
	$present_durgery_due = $surgery_due - $surgery_due_pay;
	
	// servie 
	
	$service_due = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 3 )->sum('amount');
	
		
	$service_due_payment = duetransition::where('patient_id', $id)->where(function ($query) { $query->where('transitiontype', 1)->Orwhere('transitiontype', 6);})->where('transitionproducttype', 3 )->sum('totalamount');
	
	$present_servie_due = $service_due - $service_due_payment;
	

	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
}




















       public function outdoor(Request $request)
    {
    
if ( (Auth()->user()->role == 1) or (Auth()->user()->role == 4))
{
	
		 $patient =   patient::with('cabinelist','cabinetransaction')->where(function ($query) {
    $query->where('booking_status', 0)
        ->orWhere('booking_status', 3);	
})
->where('softdelete', 0)->where('id', '!=', 1)->latest()->get(); 


	  
	        if ($request->ajax()) {
         
	 
	 $patient =   patient::with('cabinelist','cabinetransaction')->where(function ($query) {
    $query->where('booking_status', 0)
        ->orWhere('booking_status', 3);	
})

->where('softdelete', 0)->where('id', '!=', 1)->latest()->get(); 

		  return Datatables::of($patient)
                   ->addIndexColumn()
                    ->addColumn('action', function( patient $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"> দেনা/পাওনা মিটিয়ে ফেলুন  </button>';
                        $button .= '&nbsp;&nbsp;';
                        
                        return $button;
                    })  
	
                    ->rawColumns(['action'])
                    ->make(true);
					
	
        }
      
        return view('final_report_and_bill.outdoorpatient', compact('patient'));   
}


else{
	
abort(404);	
}


    }





























 
       public function releasedindoor(Request $request)
    {
     // $patient=  patient::where('id', '!=', 1)->latest()->get(); //where('booking_status', 2 )->
$patient =   patient::with('cabinelist','cabinetransaction')->where(function ($query) { $query->where('booking_status', 2);})->where('softdelete', 0)->latest()->get(); 
	  
	

	  
	  
	  
	  
	  
	  
	  
	        if ($request->ajax()) {
           // $patient =    patient::where('id', '!=', 1)->latest()->get(); //where('booking_status', 2 )->
		   
	 $patient =   patient::with('cabinelist','cabinetransaction')->where(function ($query) { $query->where('booking_status', 2);})->where('softdelete', 0)->latest()->get(); 
	 
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
	
	
 		 

	
	
			$startimeshow =   $cabinetransaction->starting;
  $time1= strtotime($cabinetransaction->starting);
	
	
	
	
			    $enddate= new DateTime(Carbon::now());
  $enddateinstring =Carbon::now();	
	   $time2=strtotime($enddateinstring);
   
   
   
 	   	   $patientf= patient::findOrFail($patient->id);
	   
	   
	if ($patientf->cabinerate > 0)
	{
 $cabine_fair_per_day= $patientf->cabinerate;
	}
	else{
	$cabine_fair_per_day= $cabine->price;
	}  
   
   
   
   
   
   
   
	   
	   
   $diff = $time2 - $time1 ;
   
 $differnece_btw_two_date_by_day = ceil($diff/ (60*60*24));



 
 
 $total_seat_fair = $differnece_btw_two_date_by_day * $cabine_fair_per_day ;
 


		  $gross_amount_cabine_histo= cabinetransferhisto::where('patient_id', $patient->id)->sum('gross_amount_from_previous');
	  
$total_seat_fair= 	$total_seat_fair+ $gross_amount_cabine_histo;	


$cabine_paid = cabinefeetransition::where('patient_id', $patient->id)->sum('gross_amount');

$cabine_due = $total_seat_fair - $cabine_paid;



     


$due = $patient->due - $patient->dena+  $cabine_due ;// $total_seat_fair_adjust denar vetore ache. tai balance korte due er sathe add kora hoyeche

//$due = $gross_amount_cabine_histo;



return $due; 

                })							
				
				
				
				
				


				->editColumn('finalreport', function ($booking_patient) {
                return '<a   target="_blank"      href="'.route('cabinetransaction.details_of_individual_booking_patient', $booking_patient->id).'">Release</a>';
            }) 			
				
				
				->editColumn('paydue', function ($booking_patient) {
                return '<a   target="_blank"      href="'.route('finalreport.paydue', $booking_patient->id).'">paydue</a>';
            }) 	

					
					
                    ->rawColumns(['action','finalreport','paydue'])
                    ->make(true);
					
	
        }
      
      
        return view('final_report_and_bill.releasepatientdue', compact('patient'));   

    }

















    /**
     * Show the form for creating a new resource.
     * showalldue
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


// report pdf 

	public function printpdfforfinalreport($id , $cabinedue )
    {
		
		
		

		
		$cabinetransaction = cabinetransaction::where('patient_id', $id)->get();
		$countcabine = count($cabinetransaction);
		
		$doctorappointmenttransaction = doctorappointmenttransaction::where('patient_id', $id)->get();
		$countdoctor= count($doctorappointmenttransaction);

		$order = order::where('patient_id', $id)->get();
		$countorder = count($order);
		
		$reportorder = reportorder::where('patient_id', $id)->get();
		$countreportorder = count($reportorder);
		
		$surgerytransaction= surgerytransaction::where('patient_id', $id)->get();
		//dd($surgerytransaction);
		$countsurgery = count($surgerytransaction);
		
		$cabinevat = 0;
			$cabinediscount = 0;
			$cabinetotal = 0;
				$mtotal = 0;
			$mvat=0;
			$mdiscount=0;
			$totalmedibeforeadjusting=0;
			
						$rtotal = 0;
			$rvat=0;
			$rdiscount=0;
			$totalpathobeforeadjusting =0;
			
					$stotal = 0;
			$svat=0;
			$sdiscount=0;
			$stoalbeforeadjust=0;
		$dtotal = 0;
		$tcabinecharge=0;
		$cabinecommission =0;
		$reportcommission =0;
		$surgerycommission=0;
		$cabineadmissionfee=0;
	// cabinetotal	tcabinecharge cabinedue dueadjustmentbeforerelease
		if ($countcabine > 0)
		{
			
		
$cabinetransaction = cabinetransaction::where('patient_id', $id)->latest()->first();




		
		
			  
	  
	  
	
	   $time1= strtotime($cabinetransaction->starting);
	  
	  
	   	$time2  = date('Y-m-d', strtotime($cabinetransaction->ending . ' +1 day'));  
	    $time2=strtotime($time2);
	   
	   
	   	   $patientf= patient::findOrFail($id);
	   
	   
	if ($patientf->cabinerate > 0)
	{
 $cabine_fair_per_day= $patientf->cabinerate;
	}
	else{
	$cabine_fair_per_day= $cabinetransaction->cabinelist->price;
	}
	   
	   
	   
   $diff = $time2 - $time1 ;
   
 $differnece_btw_two_date_by_day = ceil($diff/ (60*60*24));


 
 
 
 $tcabinecharge= $differnece_btw_two_date_by_day * $cabine_fair_per_day ;
		  $gross_amount_cabine_histo= cabinetransferhisto::where('patient_id', $id)->sum('gross_amount_from_previous');
	  
$tcabinecharge= 	$tcabinecharge+ $gross_amount_cabine_histo;			

	
		}
		
		
	
		$patient = patient::findOrFail($id);
		
		$cabineadmissionfee = cabinetransaction::where('patient_id', $id)->sum('admissionfee');
/* 	$cabineadmissionfee= cabinetransaction::find($patient->cabinetransaction_id)->admissionfee;	
	if($cabineadmissionfee == null )
	{
		$cabineadmissionfee=0;
	} */ 
	$tcabinepaid=  cabinefeetransition::where('patient_id', $id )->sum('paid');	

	
	$tcabinepaid_adjustment =  cabinefeetransition::where('patient_id', $id )->where('cabinetransaction_id', $patient->cabinetransaction_id	 )->sum('adjust_with_advance');	
		



		
$doctordue=0;		
		
				if ($countdoctor > 0 )
		{

			
			foreach ( $doctorappointmenttransaction as $d)
			{
			
				$dtotal= $d->fees + $d->due + $d->adjust_with_advance + $dtotal; 
			}
$doctordue= doctorappointmenttransaction::where('patient_id', $id)->sum('due');
		}
		
		
						
				/////	
$meddue=0;				
						
						if ($countorder > 0 )
		{

		
			foreach ( $order as $o)
			{
				
				foreach ( $o->medicinetransitions as $m)
			    {
				$mtotal= $m->adjust + $mtotal; 
				$mvat= $m->totalvat + $mvat; 
				$mdiscount= $m->totaldiscount + $mdiscount; 
			}
			$totalmedibeforeadjusting = $mtotal + $mdiscount - $mvat;
			
			}
	
$meddue=	order::where('patient_id', $id)->sum('due');
	
	
		}
		
		
	$returnmedicine = duetransition::where('patient_id', $id)->where('transitiontype', 4 )->where('transitionproducttype', 2 )->sum('amount');	
							////////	
							
							$reportorderdue=0;
							
								
								if ($countreportorder > 0 )
		{


			foreach ( $reportorder as $ro)
			{
				
					foreach ( $ro->reporttransaction as $r)
			{
			
				$rtotal= $r->adjust + $rtotal; 
				$rvat= $r->totalvat + $rvat; 
				$rdiscount= $r->totaldiscount + $rdiscount; 
				$reportcommission = $r->commission + $reportcommission;
			}
			$totalpathobeforeadjusting = $rtotal + $rdiscount - $rvat;
			$reportorderdue = reportorder::where('patient_id', $id)->sum('due');
			}
	
		}
		
		
	$surdue=0;	
		
		if ($countsurgery > 0)
		{

	
			foreach ( $surgerytransaction as $s)
			{
			
				$stotal= $s->total_cost_after_initial_vat_and_discount + $stotal; 
				$svat= $s->totalvat + $svat; 
				$sdiscount= $s->totaldiscount + $sdiscount ; 
				$surgerycommission = $s->commission + $surgerycommission;
			}
	$stoalbeforeadjust= $stotal - $sdiscount + $svat ;
	
	$surdue = surgerytransaction::where('patient_id',$id )->sum('due');
	
		}
	

$duediscountmedicine = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 2 )->sum('discountondue');
$mdiscount = $mdiscount+ $duediscountmedicine;

	$due_pay_pathology_discount = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 4 )->sum('discountondue');
	











	
$rdiscount = $rdiscount + $due_pay_pathology_discount;


$surgery_due_pay_discount = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 3 )->sum('discountondue');

$sdiscount = $sdiscount + $surgery_due_pay_discount;


$cabineduediscount = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 1 )->sum('discountondue');


$doctorvisitduediscount =  duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 5 )->sum('discountondue');


$cabinediscount = $cabinediscount + $cabineduediscount;


  $cabine_due_histo = cabinetransferhisto::where('patient_id', $id)->sum('due');

$cabinedue = $tcabinecharge - ( $tcabinepaid_adjustment + $tcabinepaid + $cabineduediscount ) ;
















$gross_surgery_amount = surgerytransaction::where('patient_id', $id)->sum('total_cost_before_initial_vat_and_discount');

$discount_surgery_at_intital = surgerytransaction::where('patient_id', $id)->sum('totaldiscount');

$dicount_at_due_payment = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 3)->sum('discountondue');





$total_surger_discount = $discount_surgery_at_intital + $dicount_at_due_payment;

$surgery_due_payment = duetransition::where('patient_id', $id)->where('transitiontype', 1)->where('transitionproducttype', 3)->sum('totalamount');

$surgery_due_initial= surgerytransaction::where('patient_id', $id)->sum('due');


$current_surgery_due = $surgery_due_initial - $surgery_due_payment;














// tcabinecharge doctorvisitduediscount

	
		$fvat = $svat+ $rvat + $mvat + $cabinevat;
	$fdiscount = $sdiscount + $rdiscount + $mdiscount + $cabinediscount;
	$fadjust = 	$stoalbeforeadjust+ $cabineadmissionfee + $totalpathobeforeadjusting + $totalmedibeforeadjusting + $dtotal + $tcabinecharge;
	$fcommission = $surgerycommission + $reportcommission + $cabinecommission;
		
				$data= patient::findOrFail($id);
		
		if ($data->agentdetail_id)
		{
			$sourcename = $data->agentdetail->name;
			$rate = $data->agentdetail->commission_pecentage;
			$flag=1;
		}
elseif ($data->doctor_id)
		{
			$sourcename =  'Doctor: '. $data->doctor->name;
            $rate = $data->doctor->commission_pecentage;
			$flag=2;
			
		}
		else
		{
			$sourcename = "Not Applicable";
			$rate=0;
			$flag=3;
		}








	
		
		
		
		
		$checkdataexistornot = finalreport::where('patient_id', $id )->first();
		
		if (is_null($checkdataexistornot) )
		{
		$finalreport= new finalreport();
		$finalreport->patient_id= $data->id; 
		$finalreport->user_id= Auth()->User()->id; 
		$finalreport->due = $data->due; 
		$finalreport->totalvat = $fvat;
		$finalreport->totaldiscount = $fdiscount;
		$finalreport->totalservicecharge_after_adjusting_vat_tax = $fadjust;
		$finalreport->save();
		
		
		
		}
		
	$finalreport  = finalreport::where('patient_id', $id )->first();












				// medicine 
	$duemedicine = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 2 )->sum('amount');
	
	
	
	$returnmedicine = duetransition::where('patient_id', $id)->where('transitiontype', 4 )->where('transitionproducttype', 2 )->sum('amount');

	
	$duepayemntmedicine = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 2 )->sum('totalamount');
			
		$refundmedicine = duetransition::where('patient_id', $id)->where('transitiontype', 3 )->where('transitionproducttype', 2 )->sum('amount');
	
	$meddue = $duemedicine - ($returnmedicine - $refundmedicine) - $duepayemntmedicine ; 
		$meddue_without_return = $duemedicine -  $refundmedicine - $duepayemntmedicine ;
	
	// pathology 
	$due_pathology = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 4 )->sum('amount');
	
	$due_pay_pathology = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 4 )->sum('totalamount');
	
	
	$reportorderdue = $due_pathology - $due_pay_pathology;
	
	
	// doctor visit 
	$doctor_visit_due  = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 5 )->sum('amount');
	$doctor_visit_due_payemt = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 5 )->sum('totalamount');
	
	$doctordue = $doctor_visit_due - $doctor_visit_due_payemt;
	
	// surgery 
	
	$surgery_due = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 3 )->sum('amount');
	
		
	$surgery_due_pay = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 3 )->sum('totalamount');
	
	$surdue = $surgery_due - $surgery_due_pay;
	


// admission fee due 

$admission_due =  duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 9 )->sum('amount');



$admission_fee_payment = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 9 )->sum('totalamount');

$total_admission_due =  $admission_due - $admission_fee_payment;



$total_seat_fair_adjust = cabinefeetransition::where( 'patient_id', $patient->id   )->sum('adjust_with_advance'); 

				// medicine 
	

	$due_adjust_medicine = duetransition::where('patient_id', $id)->where('transitiontype', 6)->where('transitionproducttype', 2 )->sum('totalamount');
	

	
	
	// pathology 
	$due_adjust_pathology = duetransition::where('patient_id', $id)->where('transitiontype', 6 )->where('transitionproducttype', 4 )->sum('totalamount');
	

	
	// doctor visit 
	$due_adjust_doctor  = duetransition::where('patient_id', $id)->where('transitiontype', 6 )->where('transitionproducttype', 5 )->sum('totalamount');

	
	// surgery 
	
	$due_adjust_surgery = duetransition::where('patient_id', $id)->where('transitiontype', 6 )->where('transitionproducttype', 3 )->sum('totalamount');
	

	
	// servie dtotal
	
	$due_adjust_service = duetransition::where('patient_id', $id)->where('transitiontype', 6 )->where('transitionproducttype', 6 )->sum('totalamount');
	
		

	







		$patient = patient::findOrFail($id);
		$cabineadmissionfee= cabinetransaction::where('patient_id', $id)->sum('gross_amount_admisson_fee');	
$cabine_admission_discount = 	cabinetransaction::where('patient_id', $id)->sum('discount');
		
$cabine_admission_discount_on_due = 	duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 9 )->sum('discountondue');

$total_cabine_admission_discount = $cabine_admission_discount + $cabine_admission_discount_on_due;



$cabine_admission_fee_paid = cabinetransaction::where('patient_id', $id)->sum('admissionfee');	
$cabine_due_payment = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 9 )->sum('amount');
$total_cabine_bill_payment = $cabine_due_payment + $cabine_admission_fee_paid;

// admission fee


	$admission_due =  duetransition::where('patient_id', $id)->where('transitiontype', 2 )
	->where('transitionproducttype', 9 )->sum('totalamount');



$admission_fee_payment = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 9 )->sum('totalamount');

$total_admission_due =  $admission_due - $admission_fee_payment;


// service 


$service_gross_amount = serviceorder::where('patient_id', $id)->sum('total');
$service_paid = serviceorder::where('patient_id', $id)->sum('paid');
$service_adjust = serviceorder::where('patient_id', $id)->sum('due_adjust_from_advance');
$service_due_paid = duetransition::where('patient_id', $id)->where('transitiontype', 1)->where('transitionproducttype', 6)->sum('amount');
$service_discount = serviceorder::where('patient_id', $id)->sum('discount');
$service_discount_on_due = duetransition::where('patient_id', $id)->where('transitiontype', 1)->where('transitionproducttype', 6)->sum('discountondue');
$total_paid_service = $service_paid + $service_adjust + $service_due_paid;

$service_discount = $service_discount + $service_discount_on_due;




$grossamount_return_medicine = return_order::where('patient_id', $id)->sum('total_cost_before_initial_vat_and_discount');

$receiveable_amount_return_medicine = return_order::where('patient_id', $id)->sum('total');









	//$pdf = PDF::meddue('final_report_and_bill.finalreport', compact('data',cabinedue meddue
	return view('final_report_and_bill.allcosts', compact('data', 
	 'stotal', 'surdue', 'doctordue','reportorderdue','meddue','due_adjust_medicine','due_adjust_pathology',
	 'svat','due_adjust_doctor','due_adjust_surgery','due_adjust_service','grossamount_return_medicine','receiveable_amount_return_medicine',
	 'sdiscount',
	 'stoalbeforeadjust',
	 'rtotal',
	 'rvat',
	 'rdiscount',
	 'totalpathobeforeadjusting',
	 'mtotal',
	 'mvat',
	 'mdiscount',
	 'totalmedibeforeadjusting',
	 'dtotal',
	 'cabinevat',
	 'cabinediscount',
	 'cabinetotal',
	 'tcabinecharge',
	 'fvat',
	 'fdiscount',
	 'fadjust',
	 'finalreport',
	 'cabinecommission',
	 'reportcommission',
	 'surgerycommission',
	 'fcommission',
	 'sourcename',
	 'rate',
'flag',
'doctorvisitduediscount',
	'cabineadmissionfee', 
	 'cabinedue',
	 'returnmedicine',
	 'current_surgery_due',
	 'total_surger_discount','gross_surgery_amount',
	 'total_seat_fair_adjust',
	 'total_admission_due',
	 'meddue_without_return',
	 
	 
	 
	 'total_admission_due','total_cabine_admission_discount','total_cabine_bill_payment',
	 'service_gross_amount','service_discount','total_paid_service',
	
	 
	 ));
	 
	 //->setPaper('a4', 'landscape')->setWarnings(false)->save('invoice.pdf');
    //return $pdf->stream('invoice.pdf');
		

    }


// printpdfforfinalreport























	public function printpdfforbill($id)
    {
		

$cabinetransaction = cabinetransaction::where('patient_id', $id)->latest()->first();
	
		//$cabinetransaction = cabinetransaction::where('patient_id', $id)->get();
		$countcabine = 1;
		
		$doctorappointmenttransaction = doctorappointmenttransaction::where('patient_id', $id)->get();
		$countdoctor= count($doctorappointmenttransaction);

		$order = order::where('patient_id', $id)->get();
		$countorder = count($order);
		
		$reportorder = reportorder::where('patient_id', $id)->get();
		$countreportorder = count($reportorder);
		
		$surgerytransaction= surgerytransaction::where('patient_id', $id)->get();
		//dd($surgerytransaction);
		$countsurgery = count($surgerytransaction);
		
		

		
		
		
				$surdata = surgerytransaction::with('patient','doctor','surgerylist','User')->where('patient_id', $id )->get();
				
				$servorderid = serviceorder::where('patient_id', $id)->first() ;
				
				if( $servorderid )
				{
				$servicecost = servicetransition::with('servicelistinhospital')->where('serviceorder_id', $servorderid->id )->get();
				}
				else
				{
		$servicecost = null ; 			
					
	}
		    $finalcosttable = patientfinalhisab::where('patient_id', $id)->first() ;
		
		
		
		
		$cabinevat = 0;
			$cabinediscount = 0;
			$cabinetotal = 0;
				$mtotal = 0;
			$mvat=0;
			$mdiscount=0;
			$totalmedibeforeadjusting=0;
			
						$rtotal = 0;   //  01611216232
			$rvat=0;
			$rdiscount=0;
			$totalpathobeforeadjusting =0;
			
					$stotal = 0;
			$svat=0;
			$sdiscount=0;
			$stoalbeforeadjust=0;
		$dtotal = 0;
		$tcabinecharge=0;
		$cabinecommission =0;
		$reportcommission =0;
		$surgerycommission=0;
		$admissionfee=0;
		
		if ($countcabine > 0)
		{
		
$cabinetransaction = cabinetransaction::where('patient_id', $id)->latest()->first();




		
		
			  
	  
	  
	
	   $time1= strtotime($cabinetransaction->starting);
	  
	  
	   	$time2  = date('Y-m-d', strtotime($cabinetransaction->ending . ' +1 day'));  
	    $time2=strtotime($time2);
	   
	   
	   $data= patient::findOrFail($id);
	   
	   
	if ($data->cabinerate > 0)
	{
 $cabine_fair_per_day= $data->cabinerate;
	}
	else{
	$cabine_fair_per_day= $cabinetransaction->cabinelist->price;	
	}
   $diff = $time2 - $time1 ;
   
 $differnece_btw_two_date_by_day = ceil($diff/ (60*60*24));


 
 
 
 $tcabinecharge= $differnece_btw_two_date_by_day * $cabine_fair_per_day ;
		
	
		
	 
	  $gross_amount_cabine_histo= cabinetransferhisto::where('patient_id', $id)->sum('gross_amount_from_previous');
	  
$tcabinecharge= 	$tcabinecharge+ $gross_amount_cabine_histo;
	
		
	
		
$admissionfee = cabinetransaction::where('patient_id', $id)->sum('admissionfee');
		
		
		
		
		
			//$tcabinecharge = $cabinetotal + $cabinediscount - $cabinevat ;
	
		}
		
		
				if ($countdoctor > 0 )
		{

			
			foreach ( $doctorappointmenttransaction as $d)
			{
			
				$dtotal= $d->fees+$d->due+ $d->adjust_with_advance  + $dtotal; 
			}
	
		}
		
		
						
				/////		
						
						if ($countorder > 0 )
		{

		
			foreach ( $order as $o)
			{
				
				foreach ( $o->medicinetransitions as $m)
			    {
				$mtotal= $m->adjust + $mtotal; 
				$mvat= $m->totalvat + $mvat; 
				$mdiscount= $m->totaldiscount + $mdiscount; 
			}
			$totalmedibeforeadjusting = $mtotal + $mdiscount - $mvat;
			
			}
	
$meddue=	order::where('patient_id', $id)->sum('due');
	
	
		}
		
		









		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
							////////	
								
								if ($countreportorder > 0 )
		{
			
			
			
			
	$reportorderamount = reportorder::where('patient_id', $id )->sum('totalbeforediscount');

$reportorderrefund = reportorder::where('patient_id', $id )->sum('refundamount');

$totalpathobeforeadjusting = $reportorderamount - $reportorderrefund;


	
		}
		
		
		
		
		if ($countsurgery > 0)
		{

	
			foreach ( $surgerytransaction as $s)
			{
			
				$stotal= $s->final_price_after_adjustment + $stotal; 
				$svat= $s->totalvat + $svat; 
				$sdiscount= $s->totaldiscount + $sdiscount ; 
				$surgerycommission = $s->commission + $surgerycommission;
			}
	$stoalbeforeadjust= $stotal - $sdiscount + $svat ;
		}
		
		
		
		
		
		
	$duediscountmedicine = duetransition::where('patient_id', $id)->where('transitiontype', 1 )->where('transitionproducttype', 2 )->sum('discountondue');
$mdiscount = $mdiscount+ $duediscountmedicine;





	$due_pay_pathology_discount = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 4 )->sum('discountondue');
	
	$rdiscount = reportorder::where('patient_id', $id)->sum('discount');
	
	
$rdiscount = $rdiscount + $due_pay_pathology_discount;












$surgery_due_pay_discount = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 3 )->sum('discountondue');



$sdiscount = $sdiscount + $surgery_due_pay_discount;


$cabineduediscount = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 1 )->sum('discountondue');


$doctorvisitduediscount =  duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 5 )->sum('discountondue');




		$patient = patient::findOrFail($id);
		$cabineadmissionfee= cabinetransaction::where('patient_id', $id)->sum('gross_amount_admisson_fee');	
$cabine_admission_discount = 	cabinetransaction::where('patient_id', $id)->sum('discount');
		
$cabine_admission_discount_on_due = 	duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 9 )->sum('discountondue');

$total_cabine_admission_discount = $cabine_admission_discount + $cabine_admission_discount_on_due;



$cabine_admission_fee_paid = cabinetransaction::where('patient_id', $id)->sum('admissionfee');	
$cabine_due_payment = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 9 )->sum('amount');
$total_cabine_bill_payment = $cabine_due_payment + $cabine_admission_fee_paid;

	
	/*	$cabineadmissionfee= cabinetransaction::find($patient->cabinetransaction_id)->admissionfee;	
	if($cabineadmissionfee == null )
	{
		$cabineadmissionfee=0;
	}
	*/
	$tcabinepaid=  cabinefeetransition::where('patient_id', $id )->sum('paid');	
	$tcabinepaid_adjustment =  cabinefeetransition::where('patient_id', $id )->where('cabinetransaction_id', $patient->cabinetransaction_id	 )->sum('adjust_with_advance');	
		










$cabinediscount = $cabinediscount + $cabineduediscount;	

$cabinedue = $tcabinecharge - ( $tcabinepaid_adjustment + $tcabinepaid + $cabineduediscount ) ;	
		
		
		
		
		
		

		
		$fvat = $svat+ $rvat + $mvat + $cabinevat;
	$fdiscount = $sdiscount + $rdiscount + $mdiscount + $cabinediscount;
	$fadjust = 	$stoalbeforeadjust + $totalpathobeforeadjusting + $totalmedibeforeadjusting + $dtotal + $tcabinecharge;
	$fcommission = $surgerycommission + $reportcommission + $cabinecommission;
		
				$data= patient::findOrFail($id);
		
		if ($data->agentdetail_id)
		{
			$sourcename = $data->agentdetail->name;
			$rate = $data->agentdetail->commission_pecentage;
		}
elseif ($data->doctor_id)
		{
			$sourcename =  'Doctor: '. $data->doctor->name;
            $rate = $data->doctor->commission_pecentage;
			
		}
		else
		{
			$sourcename = "Not Applicable";
			$rate=0;
		}

		
		$checkdataexistornot = finalreport::where('patient_id', $id )->first();
		
		if (is_null($checkdataexistornot) )
		{
		$finalreport= new finalreport();
		$finalreport->patient_id= $data->id; 
		$finalreport->user_id= Auth()->User()->id; 
		$finalreport->due = $data->due; 
		$finalreport->totalvat = $fvat;
		$finalreport->totaldiscount = $fdiscount;
		$finalreport->totalservicecharge_after_adjusting_vat_tax = $fadjust;
		$finalreport->save();
		
		
		
		}
		
		
		
		
		
			if ($data->refdoc_id )
{
$refdoctor = doctor::findOrFail($data->refdoc_id)->name;

}
else
{
$refdoctor = "Not Applicable";
}	


if ($data->cabinetransaction_id )		
{
	
	
	
$cabine_trans= 	cabinetransaction::where('patient_id',$id)->first();
			
//$startingdate= cabinetransaction::findOrFail($data->cabinetransaction_id)->starting;

$startingdate = $cabine_trans->starting;

$enddate = cabinetransaction::findOrFail($data->cabinetransaction_id)->ending;

}
else{
$startingdate="Not Applicable";
$enddate = "Not Applicable";
}	
		
if ($data->cabinelist_id )	
{

$cabine = cabinelist::findOrFail($data->cabinelist_id)->serial_no;
}
else{

$cabine="Not Applicable";
}	



				// medicine stoalbeforeadjust
				
				
	$grossmed = order::where('patient_id', $id)->sum('totalbeforediscount'); 
$med_dis_at_selling = order::where('patient_id', $id)->sum('discount'); 

$mde_dis_on_due = duetransition::where('patient_id', $id)->where('transitiontype', 1 )->where('transitionproducttype', 2 )->sum('discountondue');
$med_dis = 	$med_dis_at_selling + $mde_dis_on_due;

				
				
				
	$duemedicine = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 2 )->sum('amount');

	
	
	$returnmedicine = duetransition::where('patient_id', $id)->where('transitiontype', 4 )->where('transitionproducttype', 2 )->sum('amount');
	$duepayemntmedicine = duetransition::where('patient_id', $id)->where('transitiontype', 1 )->where('transitionproducttype', 2 )->sum('totalamount');
		
			$refundmedicine = duetransition::where('patient_id', $id)->where('transitiontype', 3 )->where('transitionproducttype', 2 )->sum('amount');
 
	$meddue = $duemedicine - ($returnmedicine - $refundmedicine) - $duepayemntmedicine ; 
		$meddue_without_return = $duemedicine -  $refundmedicine - $duepayemntmedicine ;
	
	
	
	// pathology 
	$due_pathology = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 4 )->sum('amount');
	
	$due_pay_pathology = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 4 )->sum('totalamount');
	
	
	$reportorderdue = $due_pathology - $due_pay_pathology;
	
	
	// doctor visit 
	$doctor_visit_due  = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 5 )->sum('amount');
	$doctor_visit_due_payemt = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 5 )->sum('totalamount');
	
	$doctordue = $doctor_visit_due - $doctor_visit_due_payemt;
	
	// surgery 
	
$gross_surgery_amount = surgerytransaction::where('patient_id', $id)->sum('total_cost_before_initial_vat_and_discount');

$discount_surgery_at_intital = surgerytransaction::where('patient_id', $id)->sum('totaldiscount');


$dicount_at_due_payment = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 3)->sum('discountondue');



$total_surger_discount = $discount_surgery_at_intital + $dicount_at_due_payment;

$surgery_due_payment = duetransition::where('patient_id', $id)->where('transitiontype', 1)->where('transitionproducttype', 3)->sum('totalamount');

$surgery_due_initial= surgerytransaction::where('patient_id', $id)->sum('due');


$current_surgery_due = $surgery_due_initial - $surgery_due_payment;





// service 


$service_gross_amount = serviceorder::where('patient_id', $id)->sum('total');
$service_paid = serviceorder::where('patient_id', $id)->sum('paid');
$service_adjust = serviceorder::where('patient_id', $id)->sum('due_adjust_from_advance');
$service_due_paid = duetransition::where('patient_id', $id)->where('transitiontype', 1)->where('transitionproducttype', 6)->sum('amount');
$service_discount = serviceorder::where('patient_id', $id)->sum('discount');
$service_discount_on_due = duetransition::where('patient_id', $id)->where('transitiontype', 1)->where('transitionproducttype', 6)->sum('discountondue');
$total_paid_service = $service_paid + $service_adjust + $service_due_paid;

$service_discount = $service_discount + $service_discount_on_due;








$total_seat_fair_adjust = cabinefeetransition::where( 'patient_id', $patient->id   )->sum('adjust_with_advance'); 

				// medicine 
	

	$due_adjust_medicine = duetransition::where('patient_id', $id)->where('transitiontype', 6)->where('transitionproducttype', 2 )->sum('totalamount');
	

	
	
	// pathology 
	$due_adjust_pathology = duetransition::where('patient_id', $id)->where('transitiontype', 6 )->where('transitionproducttype', 4 )->sum('amount');
	

	
	// doctor visit 
	$due_adjust_doctor  = duetransition::where('patient_id', $id)->where('transitiontype', 6 )->where('transitionproducttype', 5 )->sum('amount');

	
	// surgery 
	
	$due_adjust_surgery = duetransition::where('patient_id', $id)->where('transitiontype', 6 )->where('transitionproducttype', 3 )->sum('amount');
	

	
	// servie 
	
	$due_adjust_service = duetransition::where('patient_id', $id)->where('transitiontype', 6 )->where('transitionproducttype', 6 )->sum('amount');



	// surgery 
	
	$surgery_due = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 3 )->sum('amount');
	
		
	$surgery_due_pay = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 3 )->sum('totalamount');
	
	$surdue = $surgery_due - $surgery_due_pay;

	



// admission fee


	$admission_due =  duetransition::where('patient_id', $id)->where('transitiontype', 2 )
	->where('transitionproducttype', 9 )->sum('totalamount');



$admission_fee_payment = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 9 )->sum('totalamount');

$total_admission_due =  $admission_due - $admission_fee_payment;
		
	



$grossamount_return_medicine = return_order::where('patient_id', $id)->sum('total_cost_before_initial_vat_and_discount');

$receiveable_amount_return_medicine = return_order::where('patient_id', $id)->sum('total');


$setting = setting::first();
	
		
		
		
		
	$finalreport  = finalreport::where('patient_id', $id )->first();

	$pdf = PDF::loadView('final_report_and_bill.finalreport', compact('data',
	//return view('final_report_and_bill.cabinediscount', compact('data', dtotal rdiscount  $ rdiscount
	 'stotal','total_seat_fair_adjust','due_adjust_medicine','due_adjust_pathology',
	 'svat','due_adjust_doctor','due_adjust_surgery','due_adjust_service','surdue','total_paid_service',
	 'sdiscount',
	 'stoalbeforeadjust','setting',
	 'rtotal','grossamount_return_medicine','receiveable_amount_return_medicine',
	 'rvat',
	 'rdiscount',
	 'totalpathobeforeadjusting',
	 'mtotal',
	 'mvat',
	 'mdiscount',
	 'totalmedibeforeadjusting',
	 'dtotal',
	 'cabinevat',
	 'cabinediscount',
	 'cabinetotal',
	 'tcabinecharge',
	 'fvat',
	 'fdiscount',
	 'fadjust',
	 'finalreport',
	 'cabinecommission',
	 'reportcommission',
	 'surgerycommission',
	 'fcommission',
	 'sourcename',
	 'rate',
	 'surdata',
	 'servicecost',
	 'finalcosttable',
	 'refdoctor',
	 'startingdate',
	 'enddate',
	 'cabine',
	 'admissionfee','meddue','returnmedicine','cabineadmissionfee','cabinedue','doctorvisitduediscount',
	 'doctordue','reportorderdue',  'grossmed','med_dis_at_selling','med_dis',
	
	'gross_surgery_amount','total_surger_discount', 'current_surgery_due','service_gross_amount',
	'service_discount',
	
	'total_admission_due','total_cabine_admission_discount','total_cabine_bill_payment',
	'meddue_without_return',
 
	 
	 
	 ),
	 
	 
	 	 
	   [], [
 'mode'                     => '',
	'format'                   => 'A5',
	'default_font_size'        => '7',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
] 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 );
	 
	 //->setPaper('a4', 'cabineadmissionfee')->service_gross_amount(false)->save('invoice.pdf'); cabineadmissionfee
    return $pdf->stream('invoice.pdf');
		

    }







public function pdfformreport ($id)
{
	
	$cabinetransaction = cabinetransaction::where('patient_id', $id)->latest()->first();
	
		//$cabinetransaction = cabinetransaction::where('patient_id', $id)->get();
		$countcabine = 1;
		
		$doctorappointmenttransaction = doctorappointmenttransaction::where('patient_id', $id)->get();
		$countdoctor= count($doctorappointmenttransaction);

		$order = order::where('patient_id', $id)->get();
		$countorder = count($order);
		
		$reportorder = reportorder::where('patient_id', $id)->get();
		$countreportorder = count($reportorder);
		
		$surgerytransaction= surgerytransaction::where('patient_id', $id)->get();
		//dd($surgerytransaction);
		$countsurgery = count($surgerytransaction);
		
		

		
		
		
				$surdata = surgerytransaction::with('patient','doctor','surgerylist','User')->where('patient_id', $id )->get();
				
				$servorderid = serviceorder::where('patient_id', $id)->first() ;
				
				if( $servorderid )
				{
				$servicecost = servicetransition::with('servicelistinhospital')->where('serviceorder_id', $servorderid->id )->get();
				}
				else
				{
		$servicecost = null ; 			
					
	}
		  //  $finalcosttable = patientfinalhisab::where('patient_id', $id)->first() ;
		
		
		
		
		$cabinevat = 0;
			$cabinediscount = 0;
			$cabinetotal = 0;
				$mtotal = 0;
			$mvat=0;
			$mdiscount=0;
			$totalmedibeforeadjusting=0;
			
						$rtotal = 0;   //  01611216232
			$rvat=0;
			$rdiscount=0;
			$totalpathobeforeadjusting =0;
			
					$stotal = 0;
			$svat=0;
			$sdiscount=0;
			$stoalbeforeadjust=0;
		$dtotal = 0;
		$tcabinecharge=0;
		$cabinecommission =0;
		$reportcommission =0;
		$surgerycommission=0;
		$admissionfee=0;
		
		if ($countcabine > 0)
		{
		
$cabinetransaction = cabinetransaction::where('patient_id', $id)->latest()->first();




	if 	($cabinetransaction)
		
		{		  
	  
	  
	
	   $time1= strtotime($cabinetransaction->starting);
	  
	  
	   	$time2  = date('Y-m-d', strtotime($cabinetransaction->ending . ' +1 day'));  
	    $time2=strtotime($time2);
	   
	   $patientf= patient::findOrFail($id);
	   
	   
	if ($patientf->cabinerate > 0)
	{
 $cabine_fair_per_day= $patientf->cabinerate;
	}
	else{
	$cabine_fair_per_day= $cabinetransaction->cabinelist->price;
	}
	   
   $diff = $time2 - $time1 ;
   
 $differnece_btw_two_date_by_day = ceil($diff/ (60*60*24));


 
 
 
 $tcabinecharge= $differnece_btw_two_date_by_day * $cabine_fair_per_day ;
		}else{

$tcabinecharge =0;
		}			
	
		
	 
	  $gross_amount_cabine_histo= cabinetransferhisto::where('patient_id', $id)->sum('gross_amount_from_previous');
	  
$tcabinecharge= 	$tcabinecharge+ $gross_amount_cabine_histo;
	
		
	
		
$admissionfee = cabinetransaction::where('patient_id', $id)->sum('admissionfee');
		
		
		
		
		
			//$tcabinecharge = $cabinetotal + $cabinediscount - $cabinevat ;
	
		}
		
		
				if ($countdoctor > 0 )
		{

			
			foreach ( $doctorappointmenttransaction as $d)
			{
			
				$dtotal= $d->fees+ $d->due+ $d->adjust_with_advance + $dtotal; 
			}
	
		}
		
		
						
				/////		
						
						if ($countorder > 0 )
		{

		
			foreach ( $order as $o)
			{
				
				foreach ( $o->medicinetransitions as $m)
			    {
				$mtotal= $m->adjust + $mtotal; 
				$mvat= $m->totalvat + $mvat; 
				$mdiscount= $m->totaldiscount + $mdiscount; 
			}
			$totalmedibeforeadjusting = $mtotal + $mdiscount - $mvat;
			
			}
	
$meddue=	order::where('patient_id', $id)->sum('due');
	
	
		}
		
		









		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
							////////	
								
								if ($countreportorder > 0 )
		{
			
			
			
			
	$reportorderamount = reportorder::where('patient_id', $id )->sum('totalbeforediscount');

$reportorderrefund = reportorder::where('patient_id', $id )->sum('refundamount');

$totalpathobeforeadjusting = $reportorderamount - $reportorderrefund;


	
		}
		
		
		
		
		if ($countsurgery > 0)
		{

	
			foreach ( $surgerytransaction as $s)
			{
			
				$stotal= $s->final_price_after_adjustment + $stotal; 
				$svat= $s->totalvat + $svat; 
				$sdiscount= $s->totaldiscount + $sdiscount ; 
				$surgerycommission = $s->commission + $surgerycommission;
			}
	$stoalbeforeadjust= $stotal - $sdiscount + $svat ;
		}
		
		
		
		
		
		
	$duediscountmedicine = duetransition::where('patient_id', $id)->where('transitiontype', 1 )->where('transitionproducttype', 2 )->sum('discountondue');
$mdiscount = $mdiscount+ $duediscountmedicine;





	$due_pay_pathology_discount = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 4 )->sum('discountondue');
	
	$rdiscount = reportorder::where('patient_id', $id)->sum('discount');
	
	
$rdiscount = $rdiscount + $due_pay_pathology_discount;












$surgery_due_pay_discount = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 3 )->sum('discountondue');



$sdiscount = $sdiscount + $surgery_due_pay_discount;


$cabineduediscount = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 1 )->sum('discountondue');


$doctorvisitduediscount =  duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 5 )->sum('discountondue');




		$patient = patient::findOrFail($id);
		$cabineadmissionfee= cabinetransaction::where('patient_id', $id)->sum('gross_amount_admisson_fee');	
$cabine_admission_discount = 	cabinetransaction::where('patient_id', $id)->sum('discount');
		
$cabine_admission_discount_on_due = 	duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 9 )->sum('discountondue');

$total_cabine_admission_discount = $cabine_admission_discount + $cabine_admission_discount_on_due;



$cabine_admission_fee_paid = cabinetransaction::where('patient_id', $id)->sum('admissionfee');	
$cabine_due_payment = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 9 )->sum('amount');
$total_cabine_bill_payment = $cabine_due_payment + $cabine_admission_fee_paid;

	
	/*	$cabineadmissionfee= cabinetransaction::find($patient->cabinetransaction_id)->admissionfee;	
	if($cabineadmissionfee == null )
	{
		$cabineadmissionfee=0;
	}
	*/
	$tcabinepaid=  cabinefeetransition::where('patient_id', $id )->sum('paid');	
	$tcabinepaid_adjustment =  cabinefeetransition::where('patient_id', $id )->where('cabinetransaction_id', $patient->cabinetransaction_id	 )->sum('adjust_with_advance');	
		










$cabinediscount = $cabinediscount + $cabineduediscount;	

$cabinedue = $tcabinecharge - ( $tcabinepaid_adjustment + $tcabinepaid + $cabineduediscount ) ;	
		
		
		
		
		
		

		
		$fvat = $svat+ $rvat + $mvat + $cabinevat;
	$fdiscount = $sdiscount + $rdiscount + $mdiscount + $cabinediscount;
	$fadjust = 	$stoalbeforeadjust + $totalpathobeforeadjusting + $totalmedibeforeadjusting + $dtotal + $tcabinecharge;
	$fcommission = $surgerycommission + $reportcommission + $cabinecommission;
		
				$data= patient::findOrFail($id);
		
		if ($data->agentdetail_id)
		{
			$sourcename = $data->agentdetail->name;
			$rate = $data->agentdetail->commission_pecentage;
		}
elseif ($data->doctor_id)
		{
			$sourcename =  'Doctor: '. $data->doctor->name;
            $rate = $data->doctor->commission_pecentage;
			
		}
		else
		{
			$sourcename = "Not Applicable";
			$rate=0;
		}

		
		$checkdataexistornot = finalreport::where('patient_id', $id )->first();
		
		if (is_null($checkdataexistornot) )
		{
		$finalreport= new finalreport();
		$finalreport->patient_id= $data->id; 
		$finalreport->user_id= Auth()->User()->id; 
		$finalreport->due = $data->due; 
		$finalreport->totalvat = $fvat;
		$finalreport->totaldiscount = $fdiscount;
		$finalreport->totalservicecharge_after_adjusting_vat_tax = $fadjust;
		$finalreport->save();
		
		
		
		}
		
		
		
		
		
			if ($data->refdoc_id )
{
$refdoctor = doctor::findOrFail($data->refdoc_id)->name;

}
else
{
$refdoctor = "Not Applicable";
}	


if ($data->cabinetransaction_id )		
{
	
	
	
$cabine_trans= 	cabinetransaction::where('patient_id',$id)->first();
			
//$startingdate= cabinetransaction::findOrFail($data->cabinetransaction_id)->starting;

$startingdate = $cabine_trans->starting;

$enddate = cabinetransaction::findOrFail($data->cabinetransaction_id)->ending;

}
else{
$startingdate="Not Applicable";
$enddate = "Not Applicable";
}	
		
if ($data->cabinelist_id )	
{

$cabine = cabinelist::findOrFail($data->cabinelist_id)->serial_no;
}
else{

$cabine="Not Applicable";
}	



				// medicine stoalbeforeadjust
				
				
	$grossmed = order::where('patient_id', $id)->sum('totalbeforediscount'); 
$med_dis_at_selling = order::where('patient_id', $id)->sum('discount'); 

$mde_dis_on_due = duetransition::where('patient_id', $id)->where('transitiontype', 1 )->where('transitionproducttype', 2 )->sum('discountondue');
$med_dis = 	$med_dis_at_selling + $mde_dis_on_due;

				
				
				
	$duemedicine = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 2 )->sum('amount');

	
	
	$returnmedicine = duetransition::where('patient_id', $id)->where('transitiontype', 4 )->where('transitionproducttype', 2 )->sum('amount');
	$duepayemntmedicine = duetransition::where('patient_id', $id)->where('transitiontype', 1 )->where('transitionproducttype', 2 )->sum('totalamount');
		
			$refundmedicine = duetransition::where('patient_id', $id)->where('transitiontype', 3 )->where('transitionproducttype', 2 )->sum('amount');
 
	$meddue = $duemedicine - ($returnmedicine - $refundmedicine) - $duepayemntmedicine ; 
		$meddue_without_return = $duemedicine -  $refundmedicine - $duepayemntmedicine ;
	
	
	
	// pathology 
	$due_pathology = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 4 )->sum('amount');
	
	$due_pay_pathology = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 4 )->sum('totalamount');
	
	
	$reportorderdue = $due_pathology - $due_pay_pathology;
	
	
	// doctor visit 
	$doctor_visit_due  = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 5 )->sum('amount');
	$doctor_visit_due_payemt = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 5 )->sum('totalamount');
	
	$doctordue = $doctor_visit_due - $doctor_visit_due_payemt;
	
	// surgery 
	
$gross_surgery_amount = surgerytransaction::where('patient_id', $id)->sum('total_cost_before_initial_vat_and_discount');

$discount_surgery_at_intital = surgerytransaction::where('patient_id', $id)->sum('totaldiscount');


$dicount_at_due_payment = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 3)->sum('discountondue');



$total_surger_discount = $discount_surgery_at_intital + $dicount_at_due_payment;

$surgery_due_payment = duetransition::where('patient_id', $id)->where('transitiontype', 1)->where('transitionproducttype', 3)->sum('totalamount');

$surgery_due_initial= surgerytransaction::where('patient_id', $id)->sum('due');


$current_surgery_due = $surgery_due_initial - $surgery_due_payment;





// service 



$service_gross_amount = serviceorder::where('patient_id', $id)->sum('total');
$service_paid = serviceorder::where('patient_id', $id)->sum('paid');
$service_adjust = serviceorder::where('patient_id', $id)->sum('due_adjust_from_advance');
$service_due_paid = duetransition::where('patient_id', $id)->where('transitiontype', 1)->where('transitionproducttype', 6)->sum('amount');
$service_discount = serviceorder::where('patient_id', $id)->sum('discount');
$service_discount_on_due = duetransition::where('patient_id', $id)->where('transitiontype', 1)->where('transitionproducttype', 6)->sum('discountondue');

$service_discount = $service_discount + $service_discount_on_due;


$total_paid_service = $service_paid + $service_adjust + $service_due_paid;


//cabine 

$total_seat_fair_adjust = cabinefeetransition::where( 'patient_id', $patient->id   )->sum('adjust_with_advance'); 




				// medicine 
	

	$due_adjust_medicine = duetransition::where('patient_id', $id)->where('transitiontype', 6)->where('transitionproducttype', 2 )->sum('totalamount');
	

	
	
	// pathology 
	$due_adjust_pathology = duetransition::where('patient_id', $id)->where('transitiontype', 6 )->where('transitionproducttype', 4 )->sum('amount');
	

	
	// doctor visit 
	$due_adjust_doctor  = duetransition::where('patient_id', $id)->where('transitiontype', 6 )->where('transitionproducttype', 5 )->sum('amount');

	
	// surgery 
	
	$due_adjust_surgery = duetransition::where('patient_id', $id)->where('transitiontype', 6 )->where('transitionproducttype', 3 )->sum('amount');
	

	
	// servie 
	
	$due_adjust_service = duetransition::where('patient_id', $id)->where('transitiontype', 6 )->where('transitionproducttype', 6 )->sum('amount');



	// surgery 
	
	$surgery_due = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 3 )->sum('amount');
	
		
	$surgery_due_pay = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 3 )->sum('totalamount');
	
	$surdue = $surgery_due - $surgery_due_pay;

	



// admission fee


	$admission_due =  duetransition::where('patient_id', $id)->where('transitiontype', 2 )
	->where('transitionproducttype', 9 )->sum('totalamount');



$admission_fee_payment = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 9 )->sum('totalamount');

$total_admission_due =  $admission_due - $admission_fee_payment;
		
	


$grossamount_return_medicine = return_order::where('patient_id', $id)->sum('total_cost_before_initial_vat_and_discount');

$receiveable_amount_return_medicine = return_order::where('patient_id', $id)->sum('total');


$cashtransition = cashtransition::where('patient_id', $id)->get();
	
$setting = setting::first();		
		
		
		
	$finalreport  = finalreport::where('patient_id', $id )->first();

	$pdf = PDF::loadView('final_report_and_bill.slip', compact('doctorvisitduediscount',
	// finalcosttable         return view('final_report_and_bill.cabinediscount', compact('data', finalcosttable rdiscount  
	 'stotal','total_seat_fair_adjust','due_adjust_medicine','due_adjust_pathology',
	 'svat','due_adjust_doctor','due_adjust_surgery','due_adjust_service','surdue','total_paid_service',
	 'sdiscount',
	 'stoalbeforeadjust','grossamount_return_medicine','receiveable_amount_return_medicine',
	 'rtotal','setting',
	 'rvat',
	 'rdiscount',
	 'totalpathobeforeadjusting',
	 'mtotal',
	 'mvat',
	 'mdiscount',
	 'totalmedibeforeadjusting',
	 'dtotal',
	 'cabinevat',
	 'cabinediscount',
	 'cabinetotal',
	 'tcabinecharge',
	 'fvat',
	 'fdiscount',
	 'fadjust',
	 'finalreport',
	 'cabinecommission',
	 'reportcommission',
	 'surgerycommission',
	 'fcommission',
	 'sourcename',
	 'rate',
	 'surdata',
	 'servicecost',
	
	 'refdoctor',
	 'startingdate',
	 'enddate',
	 'cabine',
	 'admissionfee','meddue','returnmedicine','cabineadmissionfee','cabinedue','doctorvisitduediscount',
	 'doctordue','reportorderdue',  'grossmed','med_dis_at_selling','med_dis',
	
	'gross_surgery_amount','total_surger_discount', 'current_surgery_due','service_gross_amount',
	
	'total_admission_due','total_cabine_admission_discount','total_cabine_bill_payment','meddue_without_return','service_discount','cashtransition','data',
 
	//total_seat_fair_adjust 
	 
	 ),            
	 
	 
	   [], [
 'mode'                     => '',
	'format'                   => 'A5',
	'default_font_size'        => '6',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
] 
	 
	 
	 
	 
	 
	 );
	 
	 //->setPaper('a4', 'landscape')->setWarnings(false)->save('invoice.pdf'); cabineadmissionfee
    return $pdf->stream('invoice.pdf');
	
	
}




















public function showalldue($id , $cabinedue, $sourcename , $finaldiscount )
{
	$patient = patient::findOrFail($id);
	
	return view('final_report_and_bill.duepaymentatfinalstage', compact('cabinedue', 'sourcename',
'patient', 'finaldiscount'));
	
	
}

public function dueadjustmentbeforerelease(Request $request)
{


	
if ( (  $request->moneyback > 0   ) and (  $request->duepayment > 0   ))
{
	
return Redirect::back()->withErrors(['msg' => 'Money Back and Duepayment can not be given together. May be you have made any mistake.Give Input Again.']);	
}


$otherduepayment = 0;
$cabineduepayment =0;



$patient = patient::findOrFail($request->patientid );	


		$cabineid = $patient->cabinelist_id;
		
		

			   cabinelist::whereId($cabineid)
  ->update(['booking_status' => '0',
  'patient_id' => null, 
   'patientname' => null, 
  
  
  
  ]);   // 0-> seat faka 1->seat book 
  
  		   patient::whereId($request->patientid)
  ->update(['booking_status' => '2']);  // 0-> patient kokhono seat book kore nai  1->patient seat booking kore ache 2->patient seat relase koreche 
 
	
	
	  
 $enddate= new DateTime(Carbon::now());
       cabinetransaction::where( 'id' , $patient->cabinetransaction_id )
  ->update(['ending' => $enddate]);  

	
	
	

	
	
	
	
	
	
	
	
	
$orderamount = 	order::where('patient_id', $request->patientid )->sum('totalbeforediscount');
$orderrefund = 	order::where('patient_id', $request->patientid )->sum('refundamount');	
$orderdiscount = 	order::where('patient_id', $request->patientid )->sum('discount');	




$returnmedicineamount = 0; //return_order::where('patient_id', $request->patientid )->sum('total');
$orderamountafterrefund =  $orderamount - 	$orderrefund - $returnmedicineamount;
$orderreceiveableamount = $orderamountafterrefund - $orderdiscount;







$reportorderamount = reportorder::where('patient_id', $request->patientid )->sum('totalbeforediscount');
$reportorderdiscount = reportorder::where('patient_id', $request->patientid )->sum('discount');
$reportorderrefund = reportorder::where('patient_id', $request->patientid )->sum('refundamount');

$reportoreramountafterrefund = $reportorderamount - $reportorderrefund;
$reportoderreceiveableamount = 	$reportoreramountafterrefund - $reportorderdiscount;




$servicecharge = serviceorder::where('patient_id', $request->patientid )->sum('total'); 
$doctorcharge = doctorappointmenttransaction::where('patient_id', $request->patientid )->sum('fees'); 


$surgerycharge_receiveable_amnt = surgerytransaction::where('patient_id', $request->patientid )->sum('total_cost_after_initial_vat_and_discount'); 

$surgery_dis = surgerytransaction::where('patient_id', $request->patientid )->sum('totaldiscount'); 

$serugery_grossamount = $surgerycharge_receiveable_amnt + $surgery_dis;


$cabinetransaction = cabinetransaction::findOrFail( $patient->cabinetransaction_id);


 $time1= strtotime($cabinetransaction->starting);
 
  $time2=strtotime($cabinetransaction->ending  . ' +1 day');
  

  
	if ($patient->cabinerate > 0)
	{
 $cabine_fair_per_day= $patient->cabinerate;
	}
	else{
	$cabine_fair_per_day= $cabinetransaction->cabinelist->price;	
	}
	   
   $diff = $time2 - $time1 ;
    $differnece_btw_two_date_by_day = ceil($diff/ (60*60*24));
  $cabinefair= $differnece_btw_two_date_by_day * $cabine_fair_per_day ;
   



$cabine_hostoricaL_gross_amnt = cabinetransferhisto::where('patient_id', $request->patientid )
->sum('gross_amount_from_previous');

$cabinefair = $cabinefair + $cabine_hostoricaL_gross_amnt;

$cabine_hostoricaL_due = cabinetransferhisto::where('patient_id', $request->patientid )
->sum('due');







$admissionfee = $cabinetransaction->gross_amount_admisson_fee;



$grossamount_return_medicine = return_order::where('patient_id', $request->patientid )->sum('total_cost_before_initial_vat_and_discount');







$totalgrossamount =  $cabinefair + $admissionfee +	$serugery_grossamount + $doctorcharge + $servicecharge + $reportoreramountafterrefund + $orderamountafterrefund - $grossamount_return_medicine ;



$totalreceiveableamount = $totalgrossamount - $request->duediscount;


$patientfinalhisab = new patientfinalhisab();

$patientfinalhisab->user_id = Auth()->user()->id;
$patientfinalhisab->patient_id = $request->patientid;
$patientfinalhisab->gross_amount = $totalgrossamount;
$patientfinalhisab->receiveable_amount = $totalreceiveableamount;
$patientfinalhisab->total_discount = $request->duediscount;
if ($request->due > 0 )
{
$patientfinalhisab->total_due = ( $request->due );
}
else
{
	$patientfinalhisab->total_due = $request->moneyback + $request->due;
	
}
$patientfinalhisab->total_Commission = $request->finalcommission;

$patientfinalhisab->refund = $request->moneyback;

$patientfinalhisab->save();




if ($request->moneyback  > 0)
{
	
	$patient = patient::findOrFail($request->patientid);
	
$duetransition = new duetransition();

$duetransition->patient_id =  $request->patientid;
	
$duetransition->user_id =  Auth()->user()->id;	

$duetransition->totalamount =  $request->moneyback;

$duetransition->amount =  $request->moneyback;


$duetransition->comment =  "Money back to the customer at the time to relase patient:" .$patient->name. "Id:" .$request->patientid ;	
	
$duetransition->transitiontype =  3;	
$duetransition->transitionproducttype =  8;

$duetransition->save();
	
	
	
	
	
	
	
	
}















return \Redirect::route('finalreport.pdfbill', [$request->patientid]);	
	
}









    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request releasedindoor
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
       //if(request()->ajax())
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
	
	$due_pay_pathology = duetransition::where('patient_id', $id)->where(function ($query) { $query->where('transitiontype', 1)->Orwhere('transitiontype', 6);})->where('transitionproducttype', 4 )->sum('totalamount');
	$present_due_pathology = $due_pathology - $due_pay_pathology;
	
	
	// doctor visit 
	$doctor_visit_due  = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 5 )->sum('amount');
	$doctor_visit_due_payemt = duetransition::where('patient_id', $id)->where(function ($query) { $query->where('transitiontype', 1)->Orwhere('transitiontype', 6);})->where('transitionproducttype', 5 )->sum('totalamount');
	
	$present_due_doctor_visit = $doctor_visit_due - $doctor_visit_due_payemt;
	
	// surgery 
	
	$surgery_due = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 3 )->sum('amount');
	
		
	$surgery_due_pay = duetransition::where('patient_id', $id)->where(function ($query) { $query->where('transitiontype', 1)->Orwhere('transitiontype', 6);})->where('transitionproducttype', 3 )->sum('totalamount');
	
	$present_durgery_due = $surgery_due - $surgery_due_pay;
	
	// servie 
	
	$service_due = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 6 )->sum('amount');
	
		
	$service_due_payment = duetransition::where('patient_id', $id)->where(function ($query) { $query->where('transitiontype', 1)->Orwhere('transitiontype', 6);})->where('transitionproducttype', 6 )->sum('totalamount');
	
	$present_servie_due = $service_due - $service_due_payment;
	
			
		

// admission fee


	$admission_due =  duetransition::where('patient_id', $id)->where('transitiontype', 2 )
	->where('transitionproducttype', 9 )->sum('totalamount');



$admission_fee_payment = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 9 )->sum('totalamount');

$total_admission_due =  $admission_due - $admission_fee_payment;
		
	









		
		

if( ($data->booking_status ==1  )  )

{

	
	// cabine 
	
	
	
	 $patient =   patient::with('cabinelist','cabinetransaction')->findOrFail($id);
	$id = $patient->cabinelist_id;
		$cabine = cabinelist::findOrFail($id);

	//$patient= patient::findOrFail($cabine->patient_id);
	$cabinetransaction = cabinetransaction::findOrFail($patient->cabinetransaction_id	);
	
	
	
	
				$startimeshow =   $cabinetransaction->starting;
  $time1= strtotime($cabinetransaction->starting);
	
	
	
	
			    $enddate= new DateTime(Carbon::now());
  $enddateinstring =Carbon::now();	
	   $time2=strtotime($enddateinstring);
   
   
   	if ($patient->cabinerate > 0)
	{
 $cabine_fair_per_day= $patient->cabinerate;
	}
	else{
	  $cabine_fair_per_day= $cabine->price;
	}
   
   
   
   
   
   
   
   
   
	 
	   
   $diff = $time2 - $time1 ;
   
 $differnece_btw_two_date_by_day = ceil($diff/ (60*60*24));



 
 
 $total_seat_fair = $differnece_btw_two_date_by_day * $cabine_fair_per_day ;
 


		  $gross_amount_cabine_histo= cabinetransferhisto::where('patient_id', $patient->id)->sum('gross_amount_from_previous');
	  
$total_seat_fair= 	$total_seat_fair+ $gross_amount_cabine_histo;	


$cabine_paid = cabinefeetransition::where('patient_id', $patient->id)->sum('gross_amount');

$cabine_due = $total_seat_fair - $cabine_paid;

	
$total_seat_fair 	= $cabine_due ;
	


}
 
elseif($data->booking_status ==2  )
{
	

	 $patient =   patient::with('cabinelist','cabinetransaction')->findOrFail($id);
	$id = $patient->cabinelist_id;
		$cabine = cabinelist::findOrFail($id);

	//$patient= patient::findOrFail($cabine->patient_id);
	$cabinetransaction = cabinetransaction::findOrFail($patient->cabinetransaction_id	);
	
	
	
	
				$startimeshow =   $cabinetransaction->starting;
  $time1= strtotime($cabinetransaction->starting);
	
	
	
	
			   // $enddate= new DateTime(Carbon::now());
  //$enddateinstring =Carbon::now();	
  
  //$enddateinstring =strtotime($cabinetransaction->ending);
  
	  // $time2=strtotime($enddateinstring);
   
   
   $time2=strtotime($cabinetransaction->ending. '+1 day');
   
	     	if ($patient->cabinerate > 0)
	{
 $cabine_fair_per_day= $patient->cabinerate;
	}
	else{
	  $cabine_fair_per_day= $cabine->price;
	}
	   
   $diff = $time2 - $time1 ;
   
 $differnece_btw_two_date_by_day = ceil($diff/ (60*60*24));



 
 
 $total_seat_fair = $differnece_btw_two_date_by_day * $cabine_fair_per_day ;
 


		  $gross_amount_cabine_histo= cabinetransferhisto::where('patient_id', $patient->id)->sum('gross_amount_from_previous');
	  
$total_seat_fair= 	$total_seat_fair+ $gross_amount_cabine_histo;	


$cabine_paid = cabinefeetransition::where('patient_id', $patient->id)->sum('gross_amount');

$cabine_due = $total_seat_fair - $cabine_paid;

	
$total_seat_fair 	= $cabine_due ;




















	
	
}
else{
	
$total_seat_fair =0;	
}




	$doctor = doctor::where('softdelete',0)->orderBy('name')->get();	
	
			
			
		
			
		






		
			
			
			
            return response()->json(['data' => $data , 'present_servie_due' => $present_servie_due, 'present_durgery_due' =>$present_durgery_due,

'present_due_doctor_visit' => $present_due_doctor_visit, 'present_due_pathology' => $present_due_pathology,

'present_due_medicine' => $present_due_medicine, 'total_seat_fair'=> $total_seat_fair,'doctor' => $doctor,
'total_admission_due' => $total_admission_due,



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
	






$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->cabinefeetransition_id = $cabinefeetransition->id; 
$cashtransition->duetransition_id = $duetransition->id;


$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->cabine_due_payment + $request->cabine_due_concession ;
$cashtransition->discount = $request->cabine_due_concession;	
$cashtransition->amount_after_discount = $request->cabine_due_payment;
$cashtransition->deposit = $request->cabine_due_payment;
$cashtransition->debit =  0 ;
$cashtransition->credit = $request->cabine_due_payment  ;
$cashtransition->description = "Cabine Fess Payment from Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Cabine Fees Trans ID: " .$cabinefeetransition->id. "Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 1;

$cashtransition->customer_type = 1;
$cashtransition->transitionproducttype = 1; 
$cashtransition->save();


















}



















$totalconcession = $request->Pathology_concession + $request->Pahermachy_concession + $request->service_concession
+ $request->doctor_concession + $request->surgery_concession + $request->admission_due_dis  ;

$totalrefund = $request->Pathology_refund + $request->Pahermachy_refund + $request->service_refund
+ $request->doctor_refund + $request->surgery_refund + $request->admission_fee_refund;


$totalduepayemt = $request->pathologydue_due_payment + $request->doctor_due_payment + $request->service_due_payment
+ $request->surgery_due_payment + $request->Pahermachy_due_payment + $request->admission_due_payment;

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
       
	
	 
	 // admission Fees 	
	

$admission_due_payment = $request->admission_due_payment + $request->admission_due_dis;
	
	if ( ($admission_due_payment > 0 ) )
	{
		
				$duetransition = new duetransition();
		$duetransition->patient_id	= $request->hidden_id;
		$duetransition->user_id	= Auth()->User()->id;
		$duetransition->totalamount	= $request->admission_due_payment + $request->admission_due_dis;
		$duetransition->amount	= $request->admission_due_payment;
		$duetransition->discountondue	= $request->admission_due_dis;
		$duetransition->transitionproducttype	= 9;	
		
		
		if ($request->admission_due_comment)
		{
			$duetransition->comment	= $request->admission_due_comment;
		}
		else
		{
			$duetransition->comment	= " Admission Fees Due Payment";
		}
		
		$duetransition->transitiontype	= $request->transitiontype; 
		$duetransition->save();
		
		
		
		
		
		
		
		
		
		
		
		
$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->admission_due_payment + $request->admission_due_dis;
$cashtransition->discount = $request->admission_due_dis;	
$cashtransition->amount_after_discount = $request->admission_due_payment;
$cashtransition->deposit = $request->admission_due_payment;
$cashtransition->debit =  0 ;
$cashtransition->credit = $request->admission_due_payment + $request->admission_due_dis  ;
$cashtransition->description = "Admission Fees Due Payment from Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 1;

$cashtransition->customer_type = 2;
$cashtransition->transitionproducttype = 9; 
$cashtransition->save();		
		
		
		

		
	}
		

		if ($request->admission_fee_refund > 0 )	
	{
		
				$duetransition = new duetransition();
		$duetransition->patient_id	= $request->hidden_id;
		$duetransition->user_id	= Auth()->User()->id;
		$duetransition->totalamount	= $request->admission_fee_refund ;
		$duetransition->amount	= $request->admission_fee_refund;
	
		$duetransition->transitionproducttype	= 9;	
		
		
		if ($request->admission_due_comment)
		{
			$duetransition->comment	= $request->admission_due_comment;
		}
		else
		{
			$duetransition->comment	= " Admission Fees Redund";
		}
		
		$duetransition->transitiontype	= 3;
		$duetransition->save();
		
	





$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->admission_fee_refund ;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->admission_fee_refund;
$cashtransition->withdrwal = $request->admission_fee_refund;
$cashtransition->debit =  0 ;
$cashtransition->credit = 0  ;
$cashtransition->description = "Admission Fees Refund to the Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 2;

$cashtransition->customer_type = 4;
$cashtransition->transitionproducttype = 9; 
$cashtransition->save();
















	
		
		
	}	
		

























	 
	   
	   
	   
	 // pathology 	
	 
	 $pathologydue_due_payment = $request->Pathology_concession + $request->pathologydue_due_payment;
		
	if ($pathologydue_due_payment > 0 )	
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
		
		
		
		
		
		
		
	$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->Pathology_concession + $request->pathologydue_due_payment;
$cashtransition->discount = $request->Pathology_concession;	
$cashtransition->amount_after_discount = $request->pathologydue_due_payment;
$cashtransition->deposit = $request->pathologydue_due_payment;
$cashtransition->debit =  0 ;
$cashtransition->credit = $request->pathologydue_due_payment + $request->Pathology_concession  ;
$cashtransition->description = "Pathology Due Payment from Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 1;

$cashtransition->customer_type = 2;
$cashtransition->transitionproducttype = 4; 
$cashtransition->save();		
		
		
		
						
		
		
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
		
	


		
	$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;


$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->Pathology_refund ;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->Pathology_refund;
$cashtransition->withdrwal = $request->Pathology_refund;
$cashtransition->debit =  0 ;
$cashtransition->credit = 0  ;
$cashtransition->description = "Pathology Refund to the Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 2;

$cashtransition->customer_type = 4;
$cashtransition->transitionproducttype = 4; 
$cashtransition->save();

	
		
	}	
		
		
		
// Phermachy 

$phermachy_due_payment = $request->Pahermachy_concession + $request->Pahermachy_due_payment;

	if ($phermachy_due_payment > 0 )	
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


$doctor_due_payment = $request->doctor_concession + $request->doctor_due_payment;


	if ($doctor_due_payment > 0 )	
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
		
	

	$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;
$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount =  $request->doctor_concession + $request->doctor_due_payment;
$cashtransition->discount = $request->doctor_concession;	
$cashtransition->amount_after_discount = $request->doctor_due_payment;
$cashtransition->deposit = $request->doctor_due_payment;
$cashtransition->debit =  0 ;
$cashtransition->credit = $request->doctor_due_payment + $request->doctor_concession  ;
$cashtransition->description = "Doctor Visit Due Payment from Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 1;

$cashtransition->customer_type = 2;
$cashtransition->transitionproducttype = 5; 
$cashtransition->save();		



		
		
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
		
		





	$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->doctor_refund ;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->doctor_refund;
$cashtransition->withdrwal = $request->doctor_refund;
$cashtransition->debit =  0 ;
$cashtransition->credit = 0  ;
$cashtransition->description = "Doctor Refund to the Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 2;

$cashtransition->customer_type = 4;
$cashtransition->transitionproducttype = 2; 
$cashtransition->save();









		
		
	}



// Service



$service_due_payment =  $request->service_concession + $request->service_due_payment;




	if ($service_due_payment > 0 )	
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
		
	



	$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;
$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount =  $request->service_concession + $request->service_due_payment;
$cashtransition->discount = $request->service_concession;	
$cashtransition->amount_after_discount = $request->service_due_payment;
$cashtransition->deposit = $request->service_due_payment;
$cashtransition->debit =  0 ;
$cashtransition->credit = $request->service_due_payment + $request->service_concession  ;
$cashtransition->description = "Service Charge Due Payment from Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 1;

$cashtransition->customer_type = 2;
$cashtransition->transitionproducttype = 5; 
$cashtransition->save();		















	
		
		
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
		
		
	





	$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->service_refund ;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->service_refund;
$cashtransition->withdrwal = $request->service_refund;
$cashtransition->debit =  0 ;
$cashtransition->credit = 0  ;
$cashtransition->description = "Service Charge Refund to the Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 2;

$cashtransition->customer_type = 4;
$cashtransition->transitionproducttype = 2; 
$cashtransition->save();











	
		
	}





	// Surgery




$surgery_due_payment = $request->surgery_concession + $request->surgery_due_payment;

	if ($surgery_due_payment > 0 )	
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
		
	






	$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;
$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount =  $request->surgery_concession + $request->surgery_due_payment;
$cashtransition->discount = $request->surgery_concession;	
$cashtransition->amount_after_discount = $request->surgery_due_payment;
$cashtransition->deposit = $request->surgery_due_payment;
$cashtransition->debit =  0 ;
$cashtransition->credit = $request->surgery_due_payment + $request->surgery_concession  ;
$cashtransition->description = "Surgery Charge Due Payment from Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 1;

$cashtransition->customer_type = 2;
$cashtransition->transitionproducttype = 5; 
$cashtransition->save();		


		
		
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
		
		
	


	$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->surgery_refund ;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->surgery_refund;
$cashtransition->withdrwal = $request->surgery_refund;
$cashtransition->debit =  0 ;
$cashtransition->credit = 0  ;
$cashtransition->description = "Surgery Charge Refund to the Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 2;

$cashtransition->customer_type = 4;
$cashtransition->transitionproducttype = 2; 
$cashtransition->save();

		
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
		
		
		
		
		
		
		
	 return response()->json(['success' => 'Data Added successfully.']);	
		

  return \Redirect::route('finalreport.index');
	   }   
	   
	  // return response()->json(['success' => 'Data Added successfully.']); 
	   
	   return \Redirect::route('duepaymenttrans.index');
      //  return response()->json(['success' => 'Data is successfully updated']);
    }












public function allduepay (Request $request )

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
$duetransition->created_at	= $request->dataentry;
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
	






$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->cabinefeetransition_id = $cabinefeetransition->id; 
$cashtransition->duetransition_id = $duetransition->id;

$cashtransition->created_at	= $request->dataentry;
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->cabine_due_payment + $request->cabine_due_concession ;
$cashtransition->discount = $request->cabine_due_concession;	
$cashtransition->amount_after_discount = $request->cabine_due_payment;
$cashtransition->deposit = $request->cabine_due_payment;
$cashtransition->debit =  0 ;
$cashtransition->credit = $request->cabine_due_payment  ;
$cashtransition->description = "Cabine Fess Payment from Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Cabine Fees Trans ID: " .$cabinefeetransition->id. "Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 1;

$cashtransition->customer_type = 1;
$cashtransition->transitionproducttype = 1; 
$cashtransition->save();


















}



















$totalconcession = $request->Pathology_concession + $request->Pahermachy_concession + $request->service_concession
+ $request->doctor_concession + $request->surgery_concession + $request->admission_due_dis  ;

$totalrefund = $request->Pathology_refund + $request->Pahermachy_refund + $request->service_refund
+ $request->doctor_refund + $request->surgery_refund + $request->admission_fee_refund;


$totalduepayemt = $request->pathologydue_due_payment + $request->doctor_due_payment + $request->service_due_payment
+ $request->surgery_due_payment + $request->Pahermachy_due_payment + $request->admission_due_payment;

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
       
	
	 
	 // admission Fees 	
	

$admission_due_payment = $request->admission_due_payment + $request->admission_due_dis;
	
	if ( ($admission_due_payment > 0 ) )
	{
		
				$duetransition = new duetransition();
		$duetransition->patient_id	= $request->hidden_id;
		$duetransition->user_id	= Auth()->User()->id;
		$duetransition->totalamount	= $request->admission_due_payment + $request->admission_due_dis;
		$duetransition->amount	= $request->admission_due_payment;
		$duetransition->discountondue	= $request->admission_due_dis;
		$duetransition->transitionproducttype	= 9;	
		
		
		if ($request->admission_due_comment)
		{
			$duetransition->comment	= $request->admission_due_comment;
		}
		else
		{
			$duetransition->comment	= " Admission Fees Due Payment";
		}
		$duetransition->transitiontype	= $request->transitiontype; 		
		$duetransition->created_at	= $request->dataentry; 
		$duetransition->save();
		
		
		
		
		
		
		
		
		
		
		
		
$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->admission_due_payment + $request->admission_due_dis;
$cashtransition->discount = $request->admission_due_dis;	
$cashtransition->amount_after_discount = $request->admission_due_payment;
$cashtransition->deposit = $request->admission_due_payment;
$cashtransition->debit =  0 ;
$cashtransition->credit = $request->admission_due_payment + $request->admission_due_dis  ;
$cashtransition->description = "Admission Fees Due Payment from Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 1;

$cashtransition->customer_type = 2;
$cashtransition->transitionproducttype = 9; 
$cashtransition->created_at	= $request->dataentry; 
$cashtransition->save();		
		
		
		

		
	}
		

		if ($request->admission_fee_refund > 0 )	
	{
		
				$duetransition = new duetransition();
		$duetransition->patient_id	= $request->hidden_id;
		$duetransition->user_id	= Auth()->User()->id;
		$duetransition->totalamount	= $request->admission_fee_refund ;
		$duetransition->amount	= $request->admission_fee_refund;
	
		$duetransition->transitionproducttype	= 9;	
		
		
		if ($request->admission_due_comment)
		{
			$duetransition->comment	= $request->admission_due_comment;
		}
		else
		{
			$duetransition->comment	= " Admission Fees Redund";
		}
		
		$duetransition->transitiontype	= 3;
		$duetransition->created_at	= $request->dataentry; 
		$duetransition->save();
		
	





$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->admission_fee_refund ;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->admission_fee_refund;
$cashtransition->withdrwal = $request->admission_fee_refund;
$cashtransition->debit =  0 ;
$cashtransition->credit = 0  ;
$cashtransition->description = "Admission Fees Refund to the Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 2;
$cashtransition->created_at	= $request->dataentry; 
$cashtransition->customer_type = 4;
$cashtransition->transitionproducttype = 9; 
$cashtransition->save();
















	
		
		
	}	
		

























	 
	   
	   
	   
	 // pathology 	
	 
	 $pathologydue_due_payment = $request->Pathology_concession + $request->pathologydue_due_payment;
		
	if ($pathologydue_due_payment > 0 )	
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
		$duetransition->created_at	= $request->dataentry; 
		$duetransition->transitiontype	= $request->transitiontype; 
		$duetransition->save();
		
		

		
		
		
		
	$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->Pathology_concession + $request->pathologydue_due_payment;
$cashtransition->discount = $request->Pathology_concession;	
$cashtransition->amount_after_discount = $request->pathologydue_due_payment;
$cashtransition->deposit = $request->pathologydue_due_payment;
$cashtransition->debit =  0 ;
$cashtransition->credit = $request->pathologydue_due_payment + $request->Pathology_concession  ;
$cashtransition->description = "Pathology Due Payment from Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 1;
$cashtransition->created_at	= $request->dataentry; 
$cashtransition->customer_type = 2;
$cashtransition->transitionproducttype = 4; 
$cashtransition->save();		
		
		
		
						
		
		
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
		$duetransition->created_at	= $request->dataentry; 
		$duetransition->save();
		
	


		
	$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;


$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->Pathology_refund ;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->Pathology_refund;
$cashtransition->withdrwal = $request->Pathology_refund;
$cashtransition->debit =  0 ;
$cashtransition->credit = 0  ;
$cashtransition->description = "Pathology Refund to the Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 2;
$cashtransition->created_at	= $request->dataentry; 
$cashtransition->customer_type = 4;
$cashtransition->transitionproducttype = 4; 
$cashtransition->save();

	
		
	}	
		
		
		
// Phermachy 

$phermachy_due_payment = $request->Pahermachy_concession + $request->Pahermachy_due_payment;

	if ($phermachy_due_payment > 0 )	
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
		$duetransition->created_at	= $request->dataentry;
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
$cashtransition->created_at	= $request->dataentry;
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
		$duetransition->created_at	= $request->dataentry;
		
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
$cashtransition->created_at	= $request->dataentry;
$cashtransition->customer_type = 4;
$cashtransition->transitionproducttype = 2; 
$cashtransition->save();








	
		
	}		
		
		
	// doctor 


$doctor_due_payment = $request->doctor_concession + $request->doctor_due_payment;


	if ($doctor_due_payment > 0 )	
	{
		
				$duetransition = new duetransition();
		$duetransition->patient_id	= $request->hidden_id;
		$duetransition->doctor_id	= $request->doctorid;
		$duetransition->user_id	= Auth()->User()->id;
		$duetransition->totalamount	= $request->doctor_concession + $request->doctor_due_payment;
		$duetransition->amount	= $request->doctor_due_payment;
		$duetransition->discountondue	= $request->doctor_concession;
		$duetransition->transitionproducttype	= 5;	
		$duetransition->created_at	= $request->dataentry;
		
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
		
	

	$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;
$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount =  $request->doctor_concession + $request->doctor_due_payment;
$cashtransition->discount = $request->doctor_concession;	
$cashtransition->amount_after_discount = $request->doctor_due_payment;
$cashtransition->deposit = $request->doctor_due_payment;
$cashtransition->debit =  0 ;
$cashtransition->credit = $request->doctor_due_payment + $request->doctor_concession  ;
$cashtransition->description = "Doctor Visit Due Payment from Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 1;
$cashtransition->created_at	= $request->dataentry;
$cashtransition->customer_type = 2;
$cashtransition->transitionproducttype = 5; 
$cashtransition->save();		



		
		
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
        $duetransition->created_at	= $request->dataentry;
		$duetransition->transitiontype	= 3;
		$duetransition->save();
		
		





	$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->doctor_refund ;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->doctor_refund;
$cashtransition->withdrwal = $request->doctor_refund;
$cashtransition->debit =  0 ;
$cashtransition->credit = 0  ;
$cashtransition->description = "Doctor Refund to the Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 2;
$cashtransition->created_at	= $request->dataentry;
$cashtransition->customer_type = 4;
$cashtransition->transitionproducttype = 2; 
$cashtransition->save();









		
		
	}



// Service



$service_due_payment =  $request->service_concession + $request->service_due_payment;




	if ($service_due_payment > 0 )	
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
		$duetransition->created_at	= $request->dataentry;
		$duetransition->transitiontype	= $request->transitiontype; 
		$duetransition->save();
		
	



	$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;
$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount =  $request->service_concession + $request->service_due_payment;
$cashtransition->discount = $request->service_concession;	
$cashtransition->amount_after_discount = $request->service_due_payment;
$cashtransition->deposit = $request->service_due_payment;
$cashtransition->debit =  0 ;
$cashtransition->credit = $request->service_due_payment + $request->service_concession  ;
$cashtransition->description = "Service Charge Due Payment from Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 1;
$cashtransition->created_at	= $request->dataentry;
$cashtransition->customer_type = 2;
$cashtransition->transitionproducttype = 5; 
$cashtransition->save();		















	
		
		
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
		$duetransition->created_at	= $request->dataentry;
		$duetransition->transitiontype	= 3;
		$duetransition->save();
		
		
	





	$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->service_refund ;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->service_refund;
$cashtransition->withdrwal = $request->service_refund;
$cashtransition->debit =  0 ;
$cashtransition->credit = 0  ;
$cashtransition->description = "Service Charge Refund to the Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 2;
$cashtransition->created_at	= $request->dataentry;
$cashtransition->customer_type = 4;
$cashtransition->transitionproducttype = 2; 
$cashtransition->save();











	
		
	}





	// Surgery




$surgery_due_payment = $request->surgery_concession + $request->surgery_due_payment;

	if ($surgery_due_payment > 0 )	
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
		$duetransition->created_at	= $request->dataentry;
		$duetransition->transitiontype	= $request->transitiontype; 
		$duetransition->save();
		
	






	$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;
$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount =  $request->surgery_concession + $request->surgery_due_payment;
$cashtransition->discount = $request->surgery_concession;	
$cashtransition->amount_after_discount = $request->surgery_due_payment;
$cashtransition->deposit = $request->surgery_due_payment;
$cashtransition->debit =  0 ;
$cashtransition->credit = $request->surgery_due_payment + $request->surgery_concession  ;
$cashtransition->description = "Surgery Charge Due Payment from Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 1;
$cashtransition->created_at	= $request->dataentry;
$cashtransition->customer_type = 2;
$cashtransition->transitionproducttype = 5; 
$cashtransition->save();		


		
		
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
		$duetransition->created_at	= $request->dataentry;
		$duetransition->transitiontype	= 3;
		$duetransition->save();
		
		
	


	$patient_name = patient::findOrFail($request->hidden_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->hidden_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->surgery_refund ;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->surgery_refund;
$cashtransition->withdrwal = $request->surgery_refund;
$cashtransition->debit =  0 ;
$cashtransition->credit = 0  ;
$cashtransition->description = "Surgery Charge Refund to the Patinet Name: " .$patient_name. " Patient ID: " .$request->hidden_id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 2;
$cashtransition->created_at	= $request->dataentry;
$cashtransition->customer_type = 4;
$cashtransition->transitionproducttype = 2; 
$cashtransition->save();

		
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
		
		
		
		
		
		
		
	 return response()->json(['success' => 'Data Added successfully.']);	
		

 // return \Redirect::route('finalreport.index');
	   }   
	   
	   return response()->json(['success' => 'Data Added successfully.']); 
	   
	  // return \Redirect::route('duepaymenttrans.index');
      //  return response()->json(['success' => 'Data is successfully updated']);
    }





















    /** printpdfforbill
     * Remove the specified resource from storage.
     *
     * @param  int  $id printpdfforfinalreport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
