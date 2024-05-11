<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\doctor; 
use App\Models\patient; 
use App\Models\doctorappointmenttransaction; 
use App\Models\balance_of_business;
use App\Models\duetransition;
use App\Models\agenttransaction;
use App\Models\user; 
use App\Models\dentalservice;
use App\Models\agentdetail;
use App\Models\dentalserviceodermoney_deposit;

use App\Models\cashtransition;

use App\Models\setting;
use App\Models\longterminstallerorder;

use App\Models\longterminstallation;

use DataTables;
use Validator;

Use \Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Log;
use PDF; 

class doctorappointmenttransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	
	
	
	    public function index(Request $request)
    {
     // $medicine=  medicine::latest()->get();
	  
	
	  $appointment=  doctorappointmenttransaction::with('doctor')->latest()->get();
	
	  
	        if ($request->ajax()) {
					  $appointment=  doctorappointmenttransaction::with('doctor')->latest()->get();

            return Datatables::of($appointment)
                   ->addIndexColumn()
				   

				   

                    ->addColumn('action', function( doctorappointmenttransaction $data){ 
   
                          $button = '<button type="button" name="deletekortehobe" id="'.$data->id.'"     class="delete btn btn-danger btn-sm">Delete1</button> <br> ';
                        
						$button .= '&nbsp;&nbsp;';
						
						
                            $button .= ' <p> <button type="button" name="edit" id="'.$data->id.'"     class="edit btn btn-info btn-sm">Edit1</button>';
                        
						
						
                        

					   return $button;
                    })


					
                      ->addColumn('doctor_name', function (doctorappointmenttransaction $appointment) {
                    return $appointment->doctor->name;
                })
                      ->addColumn('patient_name', function (doctorappointmenttransaction $appointment) {
						  
						  if ($appointment->patient_id)
						  {
							$patientname =  patient::findOrFail($appointment->patient_id)->name;
                           return 	$patientname;						
							  
						  }
						  else
						  {
							  
							return "NA";  
						  }
						  
						  
                   
                })
				
                      ->addColumn('patient_mobile', function (doctorappointmenttransaction $appointment) {
						  
						  $mobile = $appointment->patient->mobile;
						  if ($mobile)
						  {
                    return $mobile;
						  }
						  else
						  {
							  
							   return "NA";  
						  }
						  
						  
						  
						  
											  if ($appointment->patient_id)
						  {
							$mobile =  patient::findOrFail($appointment->patient_id)->mobile;
                           return 	$mobile;						
							  
						  }
						  else
						  {
							  
							return "NA";  
						  }	  
						  
						  
						  
						  
						  
						  
						  
						  
						  
						  
						  
                })				
				
				
             ->editColumn('pdf', function ($appointment) {
                return '<a   target="_blank"      href="'.route('doctortransition.pdf', $appointment->id).'">Print</a>';
            })
				

					
					
                    ->rawColumns(['action','pdf'])
                    ->make(true);
        }
		

		return view('doctortransaction.doctortransaction', compact('appointment'));   
	
	}
	
















public function doctorincome()
{
	
		
			$doctor = doctor::where('softdelete',0)->orderBy('name')->get();
		return view('doctortransaction.selectdoctor', compact('doctor'));   
	
	
}



public function doctorfetch(Request $request)
{


        $validator = Validator::make($request->all(), [
            'startdate' => 'required|date|size:10',
        'enddate' => 'date|size:10',
		'agent'
        ]);
		
		
		
		if ($validator->fails()) {
            return redirect('picktwodate')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		$e= $request->input('enddate');
		
		        $start = date("Y-m-d",strtotime($request->input('startdate')));
        $end = date("Y-m-d",strtotime($request->input('enddate')."+1 day"));
      
		$datethatsentasenddatefromcust =  date("Y-m-d",strtotime($request->input('enddate')));
		


$transpatho = doctorappointmenttransaction::with('doctor','patient','agentdetail')->where('doctor_id', $request->doctor)->whereBetween('created_at',[$start,$end])->get();


$dentalserviceodermoney_deposit = dentalserviceodermoney_deposit::with('doctor','patient','agentdetail')->where('doctor_id', $request->doctor)->whereBetween('created_at',[$start,$end])->get();
 



$doctor = doctor::findOrFail($request->doctor)->name;

	   $pdf = PDF::loadView('doctortransaction.dailybilldoctor', compact('transpatho','doctor','start','e','dentalserviceodermoney_deposit', ),
   [], [
 'mode'                     => '',
	'format'                   => 'A4',
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













public function selectagent()
{
	
			$reportlist = agentdetail::where('softdelete',0)->orderBy('name')->get();
			$doctor = doctor::where('softdelete',0)->orderBy('name')->get();
		return view('doctortransaction.selectagent', compact('reportlist','doctor'));   
	
	
}


public function selectfagent(Request $request)
{


        $validator = Validator::make($request->all(), [
            'startdate' => 'required|date|size:10',
        'enddate' => 'date|size:10',
		'agent'
        ]);
		
		
		
		if ($validator->fails()) {
            return redirect('picktwodate')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		$e= $request->input('enddate');
		
		        $start = date("Y-m-d",strtotime($request->input('startdate')));
        $end = date("Y-m-d",strtotime($request->input('enddate')."+1 day"));
      
		$datethatsentasenddatefromcust =  date("Y-m-d",strtotime($request->input('enddate')));
		


$transpatho = doctorappointmenttransaction::with('doctor','patient','agentdetail')->where('doctor_id', $request->doctor)->where('agentdetail_id', $request->agent)->whereBetween('created_at',[$start,$end])->get();


$dentalserviceodermoney_deposit = dentalserviceodermoney_deposit::with('doctor','patient','agentdetail')->where('doctor_id', $request->doctor)->whereBetween('created_at',[$start,$end])->get();
 



$agent = 	agentdetail::findOrFail($request->agent)->name;

$doctor = doctor::findOrFail($request->doctor)->name;

	   $pdf = PDF::loadView('doctortransaction.dailybillagent', compact('transpatho','doctor','agent', 'start','e','dentalserviceodermoney_deposit', ),
   [], [
 'mode'                     => '',
	'format'                   => 'A4',
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







	
	public function selecttestuser()
{
	
			$reportlist = user::where('role', '!=', 5)->orderBy('name')->get();
		return view('doctortransaction.selectuser', compact('reportlist'));   
	
	
}


public function selectfetchuser(Request $request)
{


        $validator = Validator::make($request->all(), [
            'startdate' => 'required|date|size:10',
        'enddate' => 'date|size:10',
		'user'
        ]);
		
		
		
		if ($validator->fails()) {
            return redirect('picktwodate')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		$e= $request->input('enddate');
		
		        $start = date("Y-m-d",strtotime($request->input('startdate')));
        $end = date("Y-m-d",strtotime($request->input('enddate')."+1 day"));
      
		$datethatsentasenddatefromcust =  date("Y-m-d",strtotime($request->input('enddate')));
		



$transpatho =   doctorappointmenttransaction::with('doctor','patient','agentdetail')->where('user_id', $request->user)->whereBetween('created_at',[$start,$end])->get();

$dentalserviceodermoney_deposit = dentalserviceodermoney_deposit::with('doctor','patient','agentdetail')->where('user_id', $request->user)->whereBetween('created_at',[$start,$end])->get();
 
$user = user::findOrFail($request->user)->name;



	   $pdf = PDF::loadView('doctortransaction.dailybilluser', compact('transpatho','user', 'start','e','dentalserviceodermoney_deposit' ),
   [], [
 'mode'                     => '',
	'format'                   => 'A4',
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





	
	
	
	
	
		    public function dropdown_list()
    {
		

       $doctor = doctor::where('softdelete', '!', '1' )->get(); 
	    $agent = agentdetail::where('softdelete',  '0' )->get(); 
		$dentalservice = dentalservice::where('softdelete',  '0' )->get(); 

	          $patientdata = patient::where('softdelete', 0)->orderBy('name')->get(); 
			  
			  
			
			  

            return response()->json(['patientdata' => $patientdata ,  'medicinedata'=> $dentalservice,  'agent'=> $agent, 'doctor' => $doctor]);
	 
 
    }
	
	
	
	
	public function installment($id)
	{
	  $longterminstallerorder = longterminstallerorder::where('patient_id', $id )->get();	
	  //dd($longterminstallerorder)
	              return response()->json(['longterminstallerorder' => $longterminstallerorder ]);
	 
	  
	  
	  
		
	}
	
	
	
			    public function finddoctorpatient()
    {
		

       $doctor = doctor::where('softdelete', '!', '1' )->get(); 
	   

	 return view('doctortransaction.outdorpat', compact('doctor'));  
            
			
	 
 
    }
	
	




			    public function serial(Request $request)
    {
		
        $validator = Validator::make($request->all(), [
            'startdate' => 'required|date|size:10',
        'enddate' => 'date|size:10',
		'doctor'
        ]);
		
		
		
		if ($validator->fails()) {
            return redirect('picktwodate')
                        ->withErrors($validator)
                        ->withInput();
        }
  
  
  
  		$e= $request->input('enddate');
		
		        $start = date("Y-m-d",strtotime($request->input('startdate')));
        $end = date("Y-m-d",strtotime($request->input('enddate')."+1 day"));
      
	      $end1 = date("Y-m-d",strtotime($request->input('enddate')));
		$datethatsentasenddatefromcust =  date("Y-m-d",strtotime($request->input('enddate')));
		
  
  $doctor= doctor::findOrFail($request->doctor)->name;
  
     	  $appointment=  doctorappointmenttransaction::with('patient','user')->where('doctor_id', $request->doctor)->whereBetween('date',[$start,$end1])->get();       
			
	 	 $pdf = PDF::loadView('doctortransaction.seriallist', compact('appointment','doctor','start','e'),
   [], [
 'mode'                     => '',
	'format'                   => 'A4',
	'default_font_size'        => '8',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
]
   
   
   );
	 
	 
	 
	 
	 
    return $pdf->stream('invoice.pdf');
 
    }





	
	
	
	
	public function printpdffordoctorappointment($id)
    {
		
		$data= doctorappointmenttransaction::with('patient','doctor')->findOrFail($id);
		


$dental_oder = longterminstallerorder::where('doctorappointmenttransaction_id', $id  )->first();


$dental_service_deposit = dentalserviceodermoney_deposit::where('doctorappointmenttransaction_id', $id  )->first();
$setting = setting::first();


if ( $dental_oder == null )
{
	
if ($dental_service_deposit == null )	
	
	{
	
	 	 $pdf = PDF::loadView('doctortransaction.doctor_fees', compact('data','setting'),
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

    return $pdf->stream('invoice.pdf');
	
	}
	
	else{
		
		
		
		
		
	 	 $pdf = PDF::loadView('doctortransaction.doctor_fees_service', compact('data','dental_service_deposit','setting'),
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

    return $pdf->stream('invoice.pdf');		
		
		
		
		
	}

}
else
{

		
	 	 $pdf = PDF::loadView('doctortransaction.doctorapointment', compact('data','dental_oder'),
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
    return $pdf->stream('invoice.pdf');	




	



}

		

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
         $rules = array(
            'patientlist',   
            'doctor_id'     =>  'required',
                 
            'fees' =>  'required',      
            'due' =>  'required',      
             'dateappointment' =>  'required',      
              'patientname' =>  'required',  

 'address' =>  'required',      
 'mobile' =>  'required',      
 'age' =>  'required',      
 'sex' =>  'required',  
'indoorpatient', 
			
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

// Add data for new patient 

if ($request->patientlist == '')
{
	
        $form_data_for_patient = array(
            'name'        =>  $request->patientname,
            'mobile'         =>  $request->mobile,
			'address'        =>  $request->address,
            'age'         =>  $request->age,
			'sex'        =>  $request->sex,
			
			 'booking_status'        =>  4,   
 	 
        );
		
		
   
  
   
        patient::create($form_data_for_patient);
		


 $patientid = patient::orderBy('id', 'desc')->first()->id;
}
else {
$patientid= $request->patientlist ; 
	
}

	
		$patient = patient::findOrFail($patientid);
		

		
		$remainging = $patient->dena - $request->due;
		
		
if($request->adjustwithadvancedeposit == 1 )
{			
		
		if ( ($remainging > 0) or ($remainging == 0))
		{
			
			$adjust_advance = $request->due;
		$request->due =0;
		
		patient::where('id', $patientid )
       ->update([
           'dena' => $remainging
		   
        ]);	
			
		}
		if ($remainging < 0)
		{
		
			$adjust_advance = $patient->dena;
			$request->due =  -1 * $remainging ;
				patient::where('id', $patientid )
       ->update([
           'dena' => 0
		   
        ]);		
			
	
			
}
} else{
			
			$adjust_advance =0;	
			
		}
		

// Add data for new appointment 





// Find out serial number for the appointment 
      	   	   $date = new DateTime($request->dateappointment); 
 
 
 $serialno = doctorappointmenttransaction::where('doctor_id',$request->doctor_id)->where('date',$date )->orderBy('id', 'desc')->first();

 if ($serialno== '')
 {
	 $serial=1;
 }
 else{
$serial= $serialno->serialno+1;
 }

//////////////////////////// insert data for new  appointmentmen



$gross = $request->fees + $request->due + $adjust_advance;

$gross = (int) ($gross);



	if($request->indoorpatient == 1)
	{
		        $form_data = array(
            'doctor_id'        =>  $request->doctor_id,
            'patient_id'         =>  $patientid,
			'user_id'  => auth()->User()->id,
			 'date'        =>  $request->dateappointment, 
			'grossamount' => $gross,
            'fees'         =>  $request->fees, // fees= paid
			'due'        =>  $request->due,
			'nogod'  => $request->fees, // fees = paid
			'serialno' => $serial , 
'agentdetail_id' =>  $request->agent,
'adjust_with_advance' => $adjust_advance,
		'doctoroncallforadmittedpartient' =>1 ,
	

			
 	 
        );
		
	}
else
{

        $form_data = array(
            'doctor_id'        =>  $request->doctor_id,
            'patient_id'         =>  $patientid,
			'user_id'  => auth()->User()->id,
			 'date'        =>  $request->dateappointment, 
			'grossamount' => $gross,
            'fees'         =>  $request->fees, //fees= paid
			'due'        =>  $request->due,
			'nogod'  => $request->fees , // paid
			'adjust_with_advance' => $adjust_advance,
			'serialno' => $serial , 
'agentdetail_id' =>  $request->agent,

		
	

			
 	 
        );
}		
		
 
 

 
		
	/// update patient due 	
       $patientdue = patient::findOrFail($patientid);
	   $p = $patientdue->due+ $request->due;
	    
  patient::where('id', $patientid )
       ->update([
           'due' => $p
        ]);
   
   /// update company balance 
   $balance = balance_of_business::first(); 
     $present_balance =  $balance->balance + ($request->fees - $request->due );
	 //dd($present_balance);
	  balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
  $doctorappointmenttransactionid =      doctorappointmenttransaction::create($form_data);
		
		

$patient_name = patient::findOrFail($patientid)->name;

 $cashtransition = new cashtransition();

$cashtransition->patient_id = $patientid;

$cashtransition->doctorappointmenttransaction_id	 = $doctorappointmenttransactionid->id;
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->fees;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->fees;
$cashtransition->deposit = $request->fees;
$cashtransition->debit = $request->due + $adjust_advance;
$cashtransition->credit = $request->fees;
$cashtransition->description = "Doctor VisiT Fees from Patinet Name:" .$patient_name. " Patient ID: " .$patientid. " Doctor Visit Trans ID: " .$doctorappointmenttransactionid->id ;
$cashtransition->company_type = 1;

$cashtransition->customer_type = 1;
$cashtransition->transitionproducttype = 5; 
$cashtransition->save();















if($request->showadmitform == 1)

{
	
$longterminstallerorder = new longterminstallerorder();
	
$longterminstallerorder->patient_id	= $patientid;
		 	   $longterminstallerorder->flag  = 0;
$longterminstallerorder->user_id	= auth()->User()->id;
$longterminstallerorder->doctorappointmenttransaction_id	= $doctorappointmenttransactionid->id;
$longterminstallerorder->agentdetail_id	= $request->agent;
$longterminstallerorder->gross_amount	= 	$request->totalamountbeforediscount;
$longterminstallerorder->totaldiscount	=  $request->dicountontaotal;
$longterminstallerorder->receiveable_amount	=	 $request->totalamount;
$longterminstallerorder->save();



$code = "Order Title:";







    $longterminstallerorder = $longterminstallerorder->id;

    for ($product_id = 0; $product_id < count($request->medicine_name); $product_id++ ) 

	{

		
		
		
		       
		
		
		
       $longterminstallation = new longterminstallation; 
	   $longterminstallation->longterminstallerorder_id = $longterminstallerorder;
	   $longterminstallation->patient_id  = $patientid;
	 	   $longterminstallation->user_id  = auth()->User()->id;

	 	   $longterminstallation->doctorappointmenttransaction_id  = $doctorappointmenttransactionid->id; 

		   
	   $longterminstallation->dentalservice_id = $request->medicine_name[$product_id]; // asole medicine_name[] er vetore id neya hoyeche. form bananor somoy name lekha hoyechecilo pore ar change kora hoy nai 
	  
	 	   $longterminstallation->unit_price  = $request->unit_price[$product_id]; 
		 
$dentalservice =  dentalservice::findOrFail($request->medicine_name[$product_id]);

$code = $code. '-' .$dentalservice->name;
		 
		 
		 if ($request->percentofdicountontaotal > 0)
		 {
$discount_percentage  = ( $request->dicountontaotal * 100 )/ $request->totalamountbeforediscount;

$totaldiscount = $request->unit_price[$product_id] * ( $discount_percentage/100);
 $longterminstallation->totaldiscount = $totaldiscount;
 $longterminstallation->receiveable_amount = $request->unit_price[$product_id] - $totaldiscount; 
 
 
 
 


		}
		 else {

		 $longterminstallation->totaldiscount	 = $request->totaldiscount[$product_id];

		  $longterminstallation->receiveable_amount = $request->adjust[$product_id];
		 }
		  $longterminstallation->save(); 
		
	


	}		
	
	
	
	
	
if ($request->adjustwithadvancedepositservice_charge == 1)	
{
	$patient_dena  = patient::findOrFail($patientid)->dena;
	
$remain_due = 	$request->totalamount - $request->paid;
	
$r =	$patient_dena - $remain_due;

if ( ($r > 0  ) or ($r ==0 ))
{
	
	
	$paid_by_advance = $request->totalamount - $request->paid;
	

	$request->due_on_service = 0;
					patient::where('id', $patientid )
       ->update([
           'dena' => $r,
		   
        ]);	
	
	
} else{


$r = $r * (-1);
$paid_by_advance = $request->totalamount - $request->paid  - $r ;
$request->due_on_service = $r;
	
					patient::where('id', $patientid )
       ->update([
           'dena' => 0,
		   
        ]);		
	
	
	
}

}	else{
	$paid_by_advance =0;
	
	
}
	
	
	
	
	
	
	

$dentalserviceodermoney_deposit = new dentalserviceodermoney_deposit();

$dentalserviceodermoney_deposit->patient_id =$patientid;
$dentalserviceodermoney_deposit->user_id = auth()->user()->id;
$dentalserviceodermoney_deposit->doctorappointmenttransaction_id  = $doctorappointmenttransactionid->id; 
$dentalserviceodermoney_deposit->longterminstallerorder_id = $longterminstallerorder;


$dentalserviceodermoney_deposit->total_amount = $request->paid + $paid_by_advance + $request->discount_intallment  ;
$dentalserviceodermoney_deposit->discount = $request->discount_intallment;
$dentalserviceodermoney_deposit->amount = $request->paid;
$dentalserviceodermoney_deposit->pay_by_advance = $paid_by_advance;
$dentalserviceodermoney_deposit->code =$code;
$dentalserviceodermoney_deposit->agentdetail_id =$request->agent;
$dentalserviceodermoney_deposit->doctor_id =$request->doctor_id;

$dentalserviceodermoney_deposit->save();


$long_term_installment = patient::findOrFail( $patientid )->long_term_installment;

$long_term_installment = $long_term_installment + $request->due_on_service;

				patient::where('id', $patientid )
       ->update([
           'long_term_installment' => $long_term_installment,
		   
        ]);	

  longterminstallerorder::where('id', $longterminstallerorder )
       ->update([
           'Code' => $code,
		   'due' =>$request->due_on_service,
        ]);







 $cashtransition = new cashtransition();

$cashtransition->patient_id = $patientid;

$cashtransition->doctorappointmenttransaction_id	 = $doctorappointmenttransactionid->id;
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->paid + $paid_by_advance + $request->discount_intallment ;
$cashtransition->discount = $request->discount_intallment;	
$cashtransition->amount_after_discount = $request->paid + $paid_by_advance + $request->discount_intallment - $request->discount_intallment;
$cashtransition->deposit = $request->paid ;
$cashtransition->debit =  $paid_by_advance;
$cashtransition->credit = $request->paid ;
$cashtransition->description = "Doctor VisiT Fees from Patinet  Name:" .$patient_name. " Patient ID: " .$patientid. " service Name" .$code.    " Doctor Visit Trans ID: " .$doctorappointmenttransactionid->id ;
$cashtransition->company_type = 1;
$cashtransition->longterminstallerorder_id = $longterminstallerorder ;
$cashtransition->customer_type = 1;
$cashtransition->transitionproducttype =11; 
$cashtransition->save();


















	
}

else{
	
	

	

	
	
	
	
	
	
	
	
	

	
	
	if( $request->installment_order != null  )
	{
		
		
		
		$patient_long_term_install_due = patient::findOrFail($patientid)->long_term_installment;
	
	$patient_long_term_install_due = $patient_long_term_install_due - ( $request->due_payment + 
	$request->discount_intallment );
					patient::where('id', $patientid )
       ->update([
           'long_term_installment' => $patient_long_term_install_due,
		   
        ]);	
		
		
		
		
		
		
		
		
		
		
		
	$order = longterminstallerorder::findOrFail($request->installment_order);
	
	$current_due = $order->due ;
	
	$order_due= $current_due - ($request->due_payment + $request->discount_intallment);
		
		
		
		
		
		
$dentalserviceodermoney_deposit = new dentalserviceodermoney_deposit();

$dentalserviceodermoney_deposit->patient_id =$patientid;
$dentalserviceodermoney_deposit->user_id = auth()->user()->id;
$dentalserviceodermoney_deposit->doctorappointmenttransaction_id  = $doctorappointmenttransactionid->id; 
$dentalserviceodermoney_deposit->longterminstallerorder_id = $request->installment_order;
$dentalserviceodermoney_deposit->total_amount = $request->due_payment + $request->discount_intallment;  
$dentalserviceodermoney_deposit->discount = $request->discount_intallment;
$dentalserviceodermoney_deposit->amount = $request->due_payment;
$dentalserviceodermoney_deposit->code =$order->Code;

$dentalserviceodermoney_deposit->agentdetail_id =$request->agent;
$dentalserviceodermoney_deposit->doctor_id =$request->doctor_id;

$dentalserviceodermoney_deposit->save();	
		
	
		
  longterminstallerorder::where('id', $request->installment_order )
       ->update([
           'due' => $order_due,
        ]);
	
	if ( $request->finish == 1)
	
	{
  longterminstallerorder::where('id', $request->installment_order )
       ->update([
           'flag' => 1,
        ]);		
		
		
	}
	
	






 $cashtransition = new cashtransition();

$cashtransition->patient_id = $patientid;

$cashtransition->doctorappointmenttransaction_id	 = $doctorappointmenttransactionid->id;
$cashtransition->user_id =  auth()->user()->id ;


$cashtransition->gorssamount = $request->due_payment + $request->discount_intallment ;
$cashtransition->discount = $request->discount_intallment;	
$cashtransition->amount_after_discount = $request->due_payment  ;
$cashtransition->deposit = $request->due_payment ;
$cashtransition->debit =  0;
$cashtransition->credit = $request->due_payment ;
$cashtransition->description = "Doctor VisiT Fees from Patinet  Name:" .$patient_name. " Patient ID: " .$patientid. " service Name" .$order->code.    " Doctor Visit Trans ID: " .$doctorappointmenttransactionid->id ;
$cashtransition->company_type = 1;
$cashtransition->longterminstallerorder_id =  $request->installment_order ;
$cashtransition->customer_type = 1;
$cashtransition->transitionproducttype =11; 
$cashtransition->save();

	
	}
	
	
	
}


if($request->due > 0)
{
	$duetransition = new duetransition();
	$duetransition->patient_id = $patientid;
	$duetransition->user_id = auth()->user()->id ;
	$duetransition->totalamount = $request->fees;
	$duetransition->amount = $request->due;
	$duetransition->transitiontype	= 2;
	
	

	$duetransition->transitionproducttype	= 5;	
	

	$duetransition->doctorappointmenttransaction_id	= $doctorappointmenttransactionid->id;	
	$duetransition->save();

}



		if ($request->agent)
		{
			$agentdetail = agentdetail::findOrFail($request->agent);
			if($agentdetail->commission_pecentage > 0 )
			{
			$agenttransaction = new agenttransaction();
			$agenttransaction->agentdetail_id = $request->agent;
			$agenttransaction->user_id =  Auth()->user()->id;
			$agenttransaction->amount = $request->fees;			
			$agenttransaction->discount = 0;						
			$agenttransaction->receiveableamount	 = $request->fees;	
			
			$com = ($request->fees * ($agentdetail->commission_pecentage / 100));
			$agenttransaction->transitiontype =   6;
			
			$agenttransaction->paidamount =   $com;
		   $agenttransaction->patient_id =  $patientid;
		   $agenttransaction->save();
		
		
		
				/// update agent balance 
		
		$pawna = $agentdetail->hospitaler_kache_pawna + $com;
		
            agentdetail::where('id', $request->agent )
            ->update(['hospitaler_kache_pawna' => $pawna]);
		
		
			}
		
		
		
		
		}


	

		Log::channel('doctorpoint')->info('Appointment For Doctors', [
			'patient name'=> $request->patientname,
			'doctor id'=> $request->doctor_id,
			'mobile'=> $request->mobile,
		]);

        return response()->json(['success' => 'Data Added successfully.']);
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
            $data = doctorappointmenttransaction::with('patient','doctor')->findOrFail($id);
$doctor= doctor::where('softdelete',0)->orderBy('name')->get();       

$agent= agentdetail::where('softdelete',0)->orderBy('name')->get();       
		   return response()->json(['data' => $data , 'doctor' => $doctor, 'agent'=> $agent ]);
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
         
                 
            'fees' =>  'required',      
            'due' =>  'required',      

              'patientname' =>  'required',  

 'address' =>  'required',      
 'mobile' =>  'required',      
 'age' =>  'required',      
 'sex' =>  'required',  
'indoorpatient', 
			
        );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
       

$patientofdoctortrans = doctorappointmenttransaction::findOrFail($request->hidden_id);

$patient_id= $patientofdoctortrans->patient_id;
$due = $patientofdoctortrans->due;
$adjust_with_advance = $patientofdoctortrans->adjust_with_advance;	   
	   
	$patient = patient::findOrFail($patientofdoctortrans->patient_id);


$patient_due = $patient->due;

$patient_dena = $patient->dena + $patientofdoctortrans->adjust_with_advance;

$patient_due = $patient_due - $patientofdoctortrans->due ; 


patient::where('id', $patientofdoctortrans->patient_id )
       ->update([
           'due' => $patient_due,
		   'dena' => $patient_dena,
        ]);
		
		
		
		
		$patient = patient::findOrFail($patientofdoctortrans->patient_id);
		
$patient_due = $patient->due;
		
		$remainging = $patient->dena - $request->due;
		
		
		
		
		if ( ($remainging > 0) or ($remainging == 0))
		{
			
			$adjust_advance = $request->due;
		$request->due =0;
		
		patient::where('id', $patientofdoctortrans->patient_id )
       ->update([
           'dena' => $remainging
		   
        ]);	
			
		}
		if ($remainging < 0)
		{
		
			$adjust_advance = $patient->dena;
			$request->due =  -1 * $remainging ;
				patient::where('id', $patientofdoctortrans->patient_id )
       ->update([
           'dena' => 0
		   
        ]);		
			
			
			
		}		
		
$due = $request->due;		
$patient_due = $patient_due + $due; 


patient::where('id', $patientofdoctortrans->patient_id )
       ->update([
           'due' => $patient_due
		   
        ]);		
		
		   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   


        $form_datafordoctor = array(
            
            'fees'         =>  $request->fees,
			'due'        =>  $request->due,
			'nogod'  => $request->fees - ( $request->due + $adjust_advance),
			'adjust_with_advance' => $adjust_advance,

        );










        $form_dataforpatient = array(
            'name'       =>   $request->patientname,
            'mobile'        =>   $request->mobile,
            'address'            =>   $request->address,
			 'age'            =>   $request->age,
			  'sex'            =>   $request->sex,
        );
		
		
		
		
		
		

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	/*	
        patient::whereId($patient_id)->update($form_dataforpatient);
		
		$pdue = patient::findOrFail($patient_id)->due;
		
		if ( $patientofdoctortrans->due  >  $request->due  )
		{
			$d= $patientofdoctortrans->due - $request->due;
			$pdue = $pdue - $d;
			  patient::where('id', $patient_id )
       ->update([
           'due' => $pdue
        ]);
			

		}
		
				if ( $patientofdoctortrans->due  <  $request->due  )
		{
			$d=  $request->due  - $patientofdoctortrans->due  ;
			$pdue = $pdue + $d;
			  patient::where('id', $patient_id )
       ->update([
           'due' => $pdue
        ]);
			
		}
		*/
	
				   /// update company balance 
   $balance = balance_of_business::first(); 
     $present_balance =  $balance->balance - $patientofdoctortrans->nogod +   ($request->fees - $request->due );
	  balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);

		
		
	
		
	$duetrans = duetransition::where('doctorappointmenttransaction_id', $request->hidden_id )->first();
if ($duetrans)	
{
	$duetrans->delete();
}

if($request->due > 0)
{
	$duetransition = new duetransition();
	$duetransition->patient_id = $patient_id;
	$duetransition->user_id = auth()->user()->id ;
	$duetransition->totalamount = $request->fees;
	$duetransition->amount = $request->due;
	$duetransition->transitiontype	= 2;
	
	

	$duetransition->transitionproducttype	= 5;	
	

	$duetransition->doctorappointmenttransaction_id	= $request->hidden_id;	
	$duetransition->save();

}

  doctorappointmenttransaction::whereId($request->hidden_id)->update($form_datafordoctor);

	
		
		
		
		
  Log::channel('doctorpoint')->info('Updated Appointment For Doctors', [
	'patient name'=> $request->patientname,
	'doctor id'=> $request->doctor_id,
	'mobile'=> $request->mobile,
]);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=  doctorappointmenttransaction::with('doctor','patient','user')->findOrFail($id);
	
	$paid = $data->fees - $data->due ; 
	
	
		
	$patient = patient::findOrFail($data->patient_id) ;
	
	$patient_due = $patient->due;


$pay_by_adv =0;
$total_paid_installment=0;
$longterminstallerorder_f =  longterminstallerorder::where('doctorappointmenttransaction_id', $id)->first();

if ($longterminstallerorder_f )	
{





$pay_by_adv = dentalserviceodermoney_deposit::where('longterminstallerorder_id', $longterminstallerorder_f->id  )->sum('pay_by_advance');	
	
$total_amount = dentalserviceodermoney_deposit::where('longterminstallerorder_id', $longterminstallerorder_f->id  )->sum('total_amount');	

$total_paid_installment = dentalserviceodermoney_deposit::where('longterminstallerorder_id', $longterminstallerorder_f->id  )->sum('amount');		
	
}
else {	



	
	$dentalserviceodermoney_deposit = dentalserviceodermoney_deposit::where('doctorappointmenttransaction_id', $id  )->first();

	if ($dentalserviceodermoney_deposit  != null )
	{
	
	$pay_by_adv = $dentalserviceodermoney_deposit->pay_by_advance;
	
	$total_paid_installment = $dentalserviceodermoney_deposit->amount;
	$total_amount = $dentalserviceodermoney_deposit->total_amount;
	
	
	
	 $longterminstallerorder =  longterminstallerorder::where('id', 
 $dentalserviceodermoney_deposit->longterminstallerorder_id )->first();

 $install_due = $longterminstallerorder->due + $total_amount;

 longterminstallerorder::where('id', $dentalserviceodermoney_deposit->longterminstallerorder_id )
       ->update([
           'due' => $install_due,
        ]);		
		
	}	
}
	
$patient_due = $patient_due - $data->due; 
$patient_dena = $patient->dena + $data->adjust_with_advance + $pay_by_adv ; 

patient::where('id',  $data->patient_id )
       ->update([
           'due' => $patient_due,
		   'dena'=> $patient_dena,
        ]);	
		
		
		
		
		
	
	
	
	
	
	
	
	
	
	
	
///////////update business balance /////////////////////////////
   $balance = balance_of_business::first();  
   $present_balance = $balance->balance - $paid - $total_paid_installment ;	

   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
///////////// end update //////////////////////////////
		
		


/////////// end update patient due 	

				
				
	
 $duetrans = duetransition::where('doctorappointmenttransaction_id', $data->id )->first();
		if($duetrans)
		{
		 $duetrans->delete();
		}
		
if ($longterminstallerorder_f != null  )	
{
	
	
	$dentalserviceodermoney_deposit = dentalserviceodermoney_deposit::where('longterminstallerorder_id', $longterminstallerorder_f->id  )->get();	
	
	$dentalserviceodermoney_deposit->each->delete();
	
	
	$cashtransition = cashtransition::where('longterminstallerorder_id', $longterminstallerorder_f->id  )->get();	
	
	if ( $cashtransition != null )
	{
$cashtransition->each->delete();
	}
	
	$longterminstallerorder_f->delete();
}
else{
	
		$cashtransition = cashtransition::where('doctorappointmenttransaction_id', $data->id )->get();	
	
	if ( $cashtransition != null )
	{
$cashtransition->each->delete();
	}
	
	
	if ($dentalserviceodermoney_deposit)
	{
		
		
		
		
		
		$dentalserviceodermoney_deposit->delete();	
	
}}
		
		
  $cashtransition =   cashtransition::where('doctorappointmenttransaction_id', $data->id )->get();
  
  
  
  		if($cashtransition)
		{
		 $cashtransition->each->delete();
		}
  
  
  
		Log::channel('doctorpoint')->info('Delated Appointment For Doctors', [
			$data
		]);
		
		
		$data->delete();
		
    }
}
