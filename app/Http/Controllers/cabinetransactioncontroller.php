<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\cabinelist;
use App\Models\patient;

use App\Models\doctor; 

use App\Models\cashtransition; 

use App\Models\setting;
use App\Models\agentdetail;

use App\Models\cabinefeetransition;

use App\Models\duetransition;

use App\Models\cabinetransaction;
use App\Models\balance_of_business;
use DataTables;
use Validator;
use Carbon\Carbon;
use DateTime;
use PDF;
use Illuminate\Support\Facades\DB;















  
















class cabinetransactioncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     * showbooking_patientlist
     * @return \Illuminate\Http\Response
     */
	  public function index(Request $request)
    {
     // $medicine=  medicine::latest()->get();
	  
	
	  $cabine=  cabinetransaction::with('patient','cabinelist')->OrderBy('id','DESC')->get();
	
	  
	        if ($request->ajax()) {
					  $cabine=  cabinetransaction::with('patient','cabinelist')->OrderBy('id','DESC')->get();
            //$medicine =  medicine::latest()->get();
            return Datatables::of($cabine)
                   ->addIndexColumn()
				   

                    ->addColumn('action', function( cabinetransaction $data){ 
   
                          $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        $button .= '&nbsp;&nbsp;';
                          $button .= '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        return $button;
                    })  
                      ->addColumn('room_name', function (cabinetransaction $cabine) {
                    return $cabine->cabinelist->serial_no;
                })
                      ->addColumn('patient_name', function (cabinetransaction $cabine) {
                    return $cabine->patient->name;
                })
					
					
	             ->editColumn('pdf', function ($cabine) {
                return '<a   target="_blank"      href="'.route('cabinetransaction.admitbill', $cabine->id).'">Print</a>';
            })				
					
					
                    ->rawColumns(['action','pdf'])
                    ->make(true);
        }
		

		return view('cabinetransaction.cabinetransaction', compact('cabine'));   
	
	}
	
	
	
	
	    public function dropdown_list()
    {
		

       $cabinedata = cabinelist::where('softdelete', 0)->where('booking_status','0' )->orderBy('serial_no')->get(); 
	 
	 
	     // $cabinedata = cabinelist::where('softdelete', 0)->orderBy('serial_no')->get(); 
	   
	   $doctor = doctor::where('softdelete', 0)->orderBy('name')->get(); 
	    $agent = agentdetail::where('softdelete', 0)->orderBy('name')->get(); 
	          $patientdata = patient::where('booking_status', '!', '2' )->orderBy('id')->get(); 

            return response()->json(['patientdata' => $patientdata , 'doctor'=> $doctor , 'agent'=> $agent , 'cabinedata' => $cabinedata]);
	 
 
    }
	



public function cabinebill($id)
{

	
	
	// cabine 
	
	$patient = patient::with('doctor','cabinelist','cabinetransaction')->findOrFail($id);
	

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


	
	
	return $total_seat_fair;
}




public function admitbill($id)
{
$cabine = cabinetransaction::with('user')->findOrFail($id);

$patient = patient::with('doctor','cabinelist')->findOrFail($cabine->patient_id);

if($patient->doctor_id )	
{
	$sourcename  = doctor::findOrFail($patient->doctor_id)->name;
	
}
else if ($patient->agentdetail_id)
{
	
$sourcename = agentdetail::findOrFail($patient->agentdetail)->name;	
}
else
{
$sourcename = "NA";	
}


if($patient->refdoc_id  )	
{
	$refdoctor = doctor::findOrFail($patient->refdoc_id )->name;
	
}
else{

	
$refdoctor = "NA";	
}




 $cabinefair =  $this->cabinebill($cabine->patient_id);





$total_due = $patient->due + $cabinefair - $patient->dena; 


$setting = setting::first();










 $pdf = PDF::loadView('cabinetransaction.admitbill', compact('cabine','setting','patient','refdoctor','sourcename','total_due' ),
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
		
		
        DB::transaction(function () use ($request) {		
		
         $rules = array(
            
            'cabine_list'     =>  'required',
            'Startdate' =>  'required',       
			'releasedata', 
			
		'name' =>  'required' ,
		'mobile' =>  'required',
		'age' =>  'required',
		'sex' =>  'required',
		'address' =>  'required',
		'refdoc_id',
		'doctor_id',
		'agent_id',
		'diagnosis_for',
		'admissionfee',
		'additionalmoneydeposit',
		'guardian_name_rel',
		'admissionfeedue',
		
        );





$cabine = cabinelist::findOrFail($request->cabine_list)->booking_status;

if ($cabine == 1)
{
	
	
	dd();
	
}











        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
		if($request->additionalmoneydeposit == '')
		{
		$request->additionalmoneydeposit=0;	
		}
		
	$cabine_list = cabinelist::findOrFail($request->cabine_list)->booking_status;
	
		$cabineserial = cabinelist::findOrFail($request->cabine_list)->serial_no;	
		if($cabine_list == 1)
		{
	 return response()->json(['success' => 'Sorry the Cabine is already Booked.']);		
		}
		
		$patient = new patient() ; 
		$patient->name = $request->name;
		$patient->guardian_name_rel = $request->guardianship_name;
		$patient->mobile = $request->mobile;
		$patient->age = $request->age;
		$patient->sex = $request->sex;
		$patient->address = $request->address;
		$patient->diagnosisfor = $request->diagnosis_for;
		$patient->cabinelist_id = $request->cabine_list;
		$patient->cabineserial = $cabineserial;		
		 
	
		
if ($request->agent_id)	
{
$patient->agentdetail_id = $request->agent_id;
}	

if ($request->doctor_id)	
{
$patient->doctor_id = $request->doctor_id;
}

if ($request->refdoc_id)	
{
$patient->refdoc_id = $request->refdoc_id;
}
		$patient->save();
		
		$patientid = $patient->id;
       		$userid = Auth()->user()->id;
			
			
	$grossamount = $request->admissionfee + $request->admissionfeedue;
	
	

        $form_data = array(
            'cabinelist_id'        =>  $request->cabine_list,
            'patient_id'         =>  $patientid,
			'admissionfee' =>$request->admissionfee,
	 'starting' =>$request->Startdate,
		   'ending' =>$request->releasedata,
		   'user_id' => $userid,
		   'gross_amount_admisson_fee'=> $grossamount,
		   'due'=> $request->admissionfeedue,
 	 
        );
		
		
		$cabinetransid =  cabinetransaction::create($form_data);
		
   cabinelist::where('id', $request->cabine_list)
  ->update(['booking_status' => '1',
  'patient_id' =>  $patientid,
  'patientname' => $patient->name,
  
  
  
  
  
  ]);
   	$cabine_price = cabinelist::findOrFail($request->cabine_list)->price;
   
   
    patient::where('id', $patientid)
  ->update(['booking_status' => '1',
  'cabinerate'=> $cabine_price,
  
  ]);
  

  
        patient::where('id', $patientid)
  ->update(['cabinetransaction_id' => $cabinetransid->id ,

'dena' => $request->additionalmoneydeposit,
'due' => $request->admissionfeedue,

  ]);
   
  if ($request->additionalmoneydeposit > 0)
  {
 $duetransition = new duetransition();
 
 $duetransition->patient_id = $patientid;
 $duetransition->user_id = Auth()->user()->id;
 $duetransition->totalamount = $request->additionalmoneydeposit;
 $duetransition->amount = $request->additionalmoneydeposit;
 $duetransition->cabinetransaction_id =$cabinetransid->id; 
 $duetransition->created_at =$request->Startdate;
 
 

 $duetransition->transitiontype = 5;
 $duetransition->save();
 
 
 
 $patient_name = patient::findOrFail($patientid)->name;
 
 $cashtransition = new cashtransition();

$cashtransition->patient_id = $patientid;

$cashtransition->cabinetransaction_id = $cabinetransid->id;
$cashtransition->user_id =  Auth()->user()->id;
$cashtransition->gorssamount =$request->additionalmoneydeposit;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->additionalmoneydeposit;
$cashtransition->deposit = $request->additionalmoneydeposit;
$cashtransition->debit = 0;
$cashtransition->credit = $request->additionalmoneydeposit;
$cashtransition->description = "Advance Deposit Paid by " .$patient_name. " Patinet ID: " .$patientid. "Cabine Admission ID:"   .$cabinetransid->id  ;
$cashtransition->company_type = 1;
$cashtransition->created_at =$request->Startdate;
$cashtransition->customer_baki = 0;
$cashtransition->customer_joma =$request->additionalmoneydeposit;
$cashtransition->created_at =$request->Startdate;




$cashtransition->customer_type = 2;
$cashtransition->transitionproducttype = 10; 
$cashtransition->save();
 
 
 
 
 
 
 
 
 
 
  }
  
  
  if ($request->admissionfeedue > 0 )
  {
 $duetransition = new duetransition();
 
 $duetransition->patient_id = $patientid;
 $duetransition->user_id = Auth()->user()->id;
 $duetransition->totalamount = $request->admissionfeedue;
 $duetransition->amount = $request->admissionfeedue;
 $duetransition->transitiontype = 2;
  $duetransition->transitionproducttype =9;
    $duetransition->cabinetransaction_id =$cabinetransid->id;
  
   $duetransition->comment ="Admission fees Due for the customer".$request->name   ;
  $duetransition->created_at =$request->Startdate;
 
 $duetransition->save();	  
	  
	  
  }



 $patient_name = patient::findOrFail($patientid)->name;
 
 $cashtransition = new cashtransition();

$cashtransition->patient_id = $patientid;

$cashtransition->cabinetransaction_id = $cabinetransid->id;
$cashtransition->user_id =  Auth()->user()->id;
$cashtransition->gorssamount = $grossamount;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $grossamount;
$cashtransition->deposit = $request->admissionfee;
$cashtransition->debit = 0;
$cashtransition->credit = $request->admissionfee;
$cashtransition->description = "Admission Fees Paid by " .$patient_name. " Patinet ID: " .$patientid. "Cabine Admission ID:"   .$cabinetransid->id  ;
$cashtransition->company_type = 1;
$cashtransition->created_at =$request->Startdate;
$cashtransition->customer_type = 1;
$cashtransition->transitionproducttype = 9; 
$cashtransition->customer_baki = $request->admissionfeedue;
$cashtransition->customer_joma =0;
$cashtransition->save();
 














$presentbalance= balance_of_business::findOrFail(1)->balance;

$presentbalance= $presentbalance + $request->additionalmoneydeposit + $request->admissionfee;


        balance_of_business::where('id', 1)
  ->update(['balance' => $presentbalance,

  ]);



  });
       

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 

	 
	 
	 
	/*	 
	 
	    public function showbooking_patientlist(Request $request)
    {
    

	   $booking_patient = patient::with('cabinelist','cabinetransaction')->where('softdelete', 0)->where('booking_status', 1)->latest()->get(); 

	        if ($request->ajax()) {
				
	 $booking_patient = patient::with('cabinelist','cabinetransaction')->where('softdelete', 0)->where('booking_status', 1)->latest()->get(); 
	
            return Datatables::of($booking_patient)
                   ->addIndexColumn()
				   

                    ->addColumn('action', function( patient $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'"     class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        $button .= '&nbsp;&nbsp;';
          
						
						
                        

					   return $button;
                    })


				
                      ->addColumn('cabine_name', function (patient $booking_patient) {
                    return $booking_patient->cabinelist->serial_no;
                })
				
			
				
				       ->addColumn('starting_date', function (patient $booking_patient) {  // has one relationship
                    return $booking_patient->cabinetransaction->starting;
                })
				
				
				
             ->editColumn('Release', function ($booking_patient) {
                return '<a   target="_blank"      href="'.route('cabinetransaction.details_of_individual_booking_patient', $booking_patient->id).'">Release</a>';
            }) 
				

					
					
                    ->rawColumns(['action','Release'])
					->rawColumns(['action'])
                    ->make(true);
        }
		
	
	return view('cabinetransaction.bookingpatinetlist', compact('booking_patient'));   
	

		
	
	
	
	
	}
	*/
	
	
	

	 
	 
	



	//// Individuals booking details 
	 
	public function details_of_individual_booking_patient($id){

        	 $booking_patient_individual = patient::with('cabinelist','cabinetransaction')->findOrfail($id); 
			 
			
			 if ( $booking_patient_individual->booking_status == 1 )
			 {
				 
				
		$cabineid = $booking_patient_individual->cabinelist_id;
	       $cabine_name = $booking_patient_individual->cabinelist->serial_no;


  
  
  
  $enddate= new DateTime(Carbon::now());
  $enddateinstring =Carbon::now();
 	// $endtimebeforestrtotime= $enddate;


	
	 $start= cabinetransaction::findOrFail($booking_patient_individual->cabinetransaction_id)->tillpaiddate;
	
	$start  = date('Y-m-d', strtotime($start . ' +1 day'));
	
	
	
$admissionday = cabinetransaction::findOrFail($booking_patient_individual->cabinetransaction_id)->starting;











	
	   $time1= strtotime($start);
	  
	   $time2=strtotime($enddateinstring. "+1 day");
	   
	   $cabine_fair_per_day= $booking_patient_individual->cabinelist->price;
	   
   $diff = $time2 - $time1 ;
   
 $differnece_btw_two_date_by_day = ceil($diff/ (60*60*24));


 
 
 
 $total_seat_fair= $differnece_btw_two_date_by_day * $cabine_fair_per_day ;



			

/////////////






///////////			
			 
	//	return view('cabinetransaction.release_patient_from_cabine',
	//	compact('booking_patient_individual','start','admissionday', 'total_seat_fair','cabineid','cabine_name','differnece_btw_two_date_by_day','enddateinstring'));   	 
			 
			
		$data= patient::with('cabinelist','cabinetransaction')->findOrfail($id);
	





  return \Redirect::route('finalreport.pdf', [  $data->id ,  $total_seat_fair ]);













			
			 }
			 
		else
		{
				 
		abort(404);
		
		}
			





	}		
	 
	 
	 
	 
	// release individial patients from Cabine and generate PDF 


	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
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
			//$data=  medicine::with('medicine_category')->findOrFail($id);
            $data = cabinetransaction::with('patient','cabinelist')->findOrFail($id);
			
		/*	 $cabinedata = cabinelist::where('booking_status','0' )->orWhere('id', $data->cabinelist_id)->orderBy('serial_no')->get(); 
*/
	         $patientdata = patient::findOrFail($data->patient_id); 
			
			
			
 /*$cabinedata = cabinelist::where(function ($query) {
    $query->where('booking_status', 0)
        ->orWhere('id', $data->cabinelist_id);
})->orderBy('serial_no')->get(); 			
	*/		
			
			$id_cabine= $data->cabinelist_id;
			
			 $cabinedata = cabinelist::where(function ($query) use ($id_cabine) {
    $query->where('booking_status', 0)
        ->orWhere('id', $id_cabine);
})->where('softdelete',0)->orderBy('serial_no')->get(); 	
			 
			 
			 
			 
			 
			 
			 	
			
			
			
			
			
			
			
			 
            return response()->json(['data' => $data , 'patientdata' => $patientdata , 'cabinedata' => $cabinedata  ]);
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
		//DB::transaction(function () use ($request)
		//{
       
	   
	    DB::transaction(function () use ($request) {		
	   
	   
	   $rules = array(
            
            'cabine_list'     =>  'required',
            'Startdate' =>  'required',       
			'releasedata', 
			'patient_id',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       	

$previous_cabine_list_id = cabinetransaction::findOrFail($request->hidden_id)->cabinelist_id;
		

        $form_data = array(
            'cabinelist_id'        =>  $request->cabine_list,   		
	 'starting' =>$request->Startdate,
		  
		   
 	 
        );

	 cabinetransaction::whereId($request->hidden_id)->update($form_data);
	 
	 
	 
	 
	 $cabinelist = cabinelist::findOrFail($request->cabine_list)->serial_no;
	 
	 
	        $form_data_patient = array(
            'cabinelist_id'        =>  $request->cabine_list,
		   'cabineserial' => $cabinelist,
		   
		   
		   'name' => $request->name,
		   'address' => $request->address,
		   'guardian_name_rel' => $request->guardianship_name,
		   'mobile' => $request->mobile,
		   'age' => $request->age,
		   'sex' => $request->sex,
		   'diagnosisfor' => $request->diagnosis_for,
		   
		   
		   
		   
 	 
        ); 
	 
	 patient::whereId($request->patient_id)->update($form_data_patient);	 
	 
	$patient = patient::findOrFail($request->patient_id) ;
	 

	 
	
	    cabinelist::where('id', $previous_cabine_list_id)
  ->update(['booking_status' => '0',
  'patient_id' =>  null,
  'patientname' => null,

  
  ]);


	    cabinelist::where('id', $request->cabine_list)
  ->update(['booking_status' => '1',
  'patient_id' =>  $request->patient_id,
  'patientname' => $patient->name,
'booking_status' => '1',
  
  ]);
	
	    });
	  return response()->json(['success' => 'Data is successfully updated']);
	
	
	
	
	//});
	}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                $data = cabinetransaction::with('patient','cabinelist')->findOrFail($id);

    $patient = patient::findOrFail($data->patient_id);
	cabinelist::where('id', $patient->cabinelist_id)
  ->update(['booking_status' => '0']);
  
  	patient::where('id', $data->patient_id)
  ->update(['softdelete' => '1' , 'booking_status' => '0' , 'cabinetransaction_id' => null ]);
	
	
	
	
	
	
	
	$presentbalance= balance_of_business::findOrFail(1)->balance;

$presentbalance= $presentbalance - $data->additionalmoneydeposit + $data->admissionfee;


        balance_of_business::where('id', 1)
  ->update(['balance' => $presentbalance,

  ]);

	
	
	
	
	
	$duetransition = duetransition::where('cabinetransaction_id', $id)->delete();
	
	
	$cashtransition = cashtransition::where('cabinetransaction_id', $id)->delete();
	
        $data->delete();
		
		
		
		
		
    }





public function release_a_patient_from_cabin( Request $request, $id, $cabinetransitonid){
	
		
	//		DB::transaction(function () use ($request,$id , $cabinetransitonid )
//	{
		DB::beginTransaction();
		
		
			 $rules = array(
            'cabine_no'    =>  'required',
            'patient_id'     =>  'required',
            'number_of_days' =>  'required',       
			'fees' =>  'required|numeric', 
             'vattk' =>  'required|numeric',     
'totaldiscount' =>  'required|numeric', 
'amount' =>  'required|numeric', 
'adjust' =>  'required|numeric', 
'due' =>  'required|numeric', 
'straing_day',
'Ending_day',


    			 
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
	
		
		
		
		
		
		
		
		$data= patient::with('cabinelist','cabinetransaction')->findOrfail($id);
	









	
		$cabineid = $data->cabinelist_id;
	
			   cabinelist::whereId($cabineid)
  ->update(['booking_status' => '0',
  'patient_id' => null, 
   'patientname' => null, 
  
  
  
  ]);   // 0-> seat faka 1->seat book 
  
  		   patient::whereId($id)
  ->update(['booking_status' => '2']);  // 0-> patient kokhono seat book kore nai  1->patient seat booking kore ache 2->patient seat relase koreche 
 
	
	
	  
 $enddate= new DateTime(Carbon::now());
       cabinetransaction::where( 'id' , $data->cabinetransaction_id )
  ->update(['ending' => $enddate]);  
	
	
	

	 
	 
	 
	 
	 

	
			   cabinetransaction::whereId($cabinetransitonid)
  ->update([
  
   'discount' => $request->totaldiscount,
    'vat' => $request->vattk,
	 'total_before_vat_dis' => $request->fees,
	  'total_after_vat_dis' => $request->amount,
	   'total_after_adjustment' => $request->adjust,
	   'due' => $request->due,
        'user_id' => Auth()->User()->id 
  
  
  ]); 
  
  
  
  
  $cabinefeetransition = new cabinefeetransition();
$cabinefeetransition->cabinelist_id = $cabineid;
$cabinefeetransition->user_id = Auth()->user()->id;
$cabinefeetransition->patient_id = $request->patient_id;
$cabinefeetransition->cabinetransaction_id	 = $cabinetransitonid;
$cabinefeetransition->starting = $request->straing_day;
$cabinefeetransition->ending = $request->Ending_day;
$cabinefeetransition->paid = $request->adjust;
$cabinefeetransition->save();
  
  
  
  
  
  
  
  
  
  
  
 
  
  $newdue= $request->due + $data->due ;
  			  
	
	patient::whereId($id)
  ->update([
	   'due' => $newdue
  ]);
  
  $balance = balance_of_business::first();
  $present_balance = $balance->balance + ( $request->adjust - $request->due) ;
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
  DB::commit();
//  return \Redirect::route('cabinetransaction.makecabinebillpdf', [$data->id]);
  return \Redirect::route('finalreport.pdf', [$data->id]);
	
//});
	

	
	
}
	


public function makecabinebillpdf($id){
	
	
	$data= patient::with('cabinelist','cabinetransaction')->findOrfail($id); 
	$cid = $data->cabinetransaction_id;
		
	$cabinetransition =	 cabinetransaction::findOrfail($cid); 
	
	
	
	
	
		
	 //$pdf = PDF::loadView('cabinetransaction.cabinebillpayment', compact('data','cabinetransition'))
	// ->setPaper('a4', 'landscape')->setWarnings(false)->save('invoice.pdf');
  //  return $pdf->stream('invoice.pdf');
 
 $pdf = PDF::loadView('cabinetransaction.cabinebillpayment', compact('data','cabinetransition' ),
   [], [
 'mode'                     => '',
	'format'                   => 'A4',
	'default_font_size'        => '12',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 15,
	'margin_right'             => 15,
	'margin_top'               => 15,
	'margin_bottom'            => 15,
]
   
   
   );
	
	
	 return $pdf->stream('document.pdf');
	
	
	



}



}
