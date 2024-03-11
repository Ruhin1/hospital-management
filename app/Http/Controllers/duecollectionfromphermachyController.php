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
use App\Models\user;
use App\Models\return_order;
use App\Models\cashtransition;

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

class duecollectionfromphermachyController extends Controller
{
    /**
     * Display a listing of the duetransforphermachy.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        	
if ( (Auth()->user()->role == 1) or (Auth()->user()->role == 3))
{
$patient = patient::where('booking_status', 5)->where('softdelete',0 )->get(); 
	  
	        if ($request->ajax()) {
         
	 
$patient = patient::where('booking_status', 5)->where('softdelete',0 )->get(); 


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
      
        return view('final_report_and_bill.outdoormedicine', compact('patient'));   
}

else{
	
abort(404);	
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
       if(request()->ajax())
        {
            $data = patient::findOrFail($id);
            return response()->json(['data' => $data]);
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
		
	if ($request->admission_due_payment > 0 )	
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
			$duetransition->comment	= " Pathology Refund";
		}
		
		$duetransition->transitiontype	= 3;
		$duetransition->save();
		
		
		
		
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
		
		
		
		
		
		
		
		
		

  return \Redirect::route('finalreport.index');
	   }   
	   
	   
	   
	   return \Redirect::route('duepaymenttrans.index');
      //  return response()->json(['success' => 'Data is successfully updated']);
    }






public function printpdf($id)
{
	
 $duetransition=  duetransition::findOrFail($id);
 $patient= patient::findOrFail($duetransition->patient_id);
	$username = user::findOrFail($duetransition->user_id)->name;	
	




	
	   $pdf = PDF::loadView('showdueofpatient.bill', compact('duetransition','patient','username' ),
   [], [
 'mode'                     => '',
	'format'                   => 'A6',
	'default_font_size'        => '7',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
]
   
   
   );
	
	
	 return $pdf->stream('document.pdf');
	
	
}













public function outdorrduelist()
{
	

		 $patient =   patient::where(function ($query) {
    $query->where('booking_status', 0)
        ->orWhere('booking_status', 5);	
})->where(function ($query) {
    $query->where('due', '>', 0)
        ->orWhere('dena','>', 0);

	
})

->where('softdelete', 0)->where('id', '!=', 1)->orderBy('name')->get(); 

		
	




	
	   $pdf = PDF::loadView('showdueofpatient.outdoorpatientduelist', compact('patient' ),
   [], [
 'mode'                     => '',
	'format'                   => 'A6',
	'default_font_size'        => '7',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
]
   
   
   );
	
	
	 return $pdf->stream('document.pdf');
	
	
}









    public function duetransforphermachy(Request $request  )
    {
                               //     $duetransition=  duetransition::where('transitiontype', 1)->where('duepaidfor', 1 )->latest()->get();
	
	
	
  $duetransition=  duetransition::where(function ($query) {
    $query->where('duepaidfor', 1)
        ->orWhere('transitionproducttype', 2);
})->where('transitiontype', 1)->latest()->get();
	
	
	
	
	  
	        if ($request->ajax()) {
            // $duetransition =  duetransition::where('transitiontype', 1)->where('duepaidfor', 1 )->latest()->get();
            
			
		  $duetransition=  duetransition::where(function ($query) {
    $query->where('duepaidfor', 1)
        ->orWhere('transitionproducttype', 2);
})->where('transitiontype', 1)->latest()->get();	
			
			
			
			
			
			
			
			
			
			
			
			return Datatables::of($duetransition)
                   ->addIndexColumn()
                    ->addColumn('action', function( duetransition $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                       

					   $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                       

					   return $button;
                    })  

				

                      ->addColumn('patient_name', function (duetransition $duetransition) {
                   


					if($duetransition->patient->name)
						 return $duetransition->patient->name;
					 else
						return "NA"; 
				 
                })
				
				      ->addColumn('patient_mobile', function (duetransition $duetransition) {
                   if( $duetransition->patient->mobile)
					   return $duetransition->patient->mobile;
				   else
					   return "NA";
				  
                })
					

                 ->editColumn('created', function(duetransition $data) {
					
					 return date('d/m/y h:i A', strtotime($data->created_at) );
                    
                })
				
             ->editColumn('pdf', function ($duetransition) {
                return '<a   target="_blank"      href="'.route('duecolletionphermachy.pdf', $duetransition->id).'">Print</a>';
            })
				

					
                  ->rawColumns(['action','pdf','created' ])
                    ->make(true);
        }
      
        return view('showdueofpatient.duetranspherma', compact('duetransition'));  		
		

    }











    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      

 $duetransition=  duetransition::findOrFail($id);
 
 $cashtransition = cashtransition::where('duetransition_id', $id)->first();
 
 if ($cashtransition)
 {
	 
$cashtransition->delete();	 
 }
 
 
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
 
 

   $duetransition->delete();
   

	  
    }
}
