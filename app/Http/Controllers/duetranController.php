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




use App\Models\setting;
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
use DataTables;
use Validator;   
use PDF;







class duetranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request  )
    {
                                  //  $duetransition=  duetransition::where('transitiontype', 1)->latest()->get();
	
	
   $duetransition=  duetransition::where(function ($query) {
    $query->where('transitiontype', 1)
        ->Orwhere('transitiontype', 3 )
		        ->Orwhere('transitiontype', 6);
})->orderBy('id','DESC')->get();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	  
	        if ($request->ajax()) {
          //  $duetransition =  duetransition::where('transitiontype', 1)->latest()->get();
          


   $duetransition=  duetransition::where(function ($query) {
    $query->where('transitiontype', 1)
        ->Orwhere('transitiontype', 3 )
		        ->Orwhere('transitiontype', 6);
})->orderBy('id','DESC')->get();











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
					

				      ->addColumn('type', function (duetransition $duetransition) {
                   if( $duetransition->transitiontype == 3)
				   {
					   return "Refund";
				   }
				   elseif ( $duetransition->transitiontype == 1)
				   {
					   return "Due Payment";
					  
				   }
				   				   elseif ( $duetransition->transitiontype == 6)
				   {
					   return "Due Adjustment";
					  
				   }
                })


				      ->addColumn('producttype', function (duetransition $duetransition) {
                   if( $duetransition->transitionproducttype == 1)
				   {
					   return "Cabine";
				   }
				   elseif ( $duetransition->transitionproducttype == 2)
				   {
					   return "Medicine";
					  
				   }
				   				   elseif ( $duetransition->transitionproducttype == 3)
				   {
					   return "Surgery";
					  
				   }elseif ($duetransition->transitionproducttype == 4)
				   {
					 return "Pathology";  
					   
				   }elseif ($duetransition->transitionproducttype == 5)
				   {
					 return "Doctor Visit";  
					   
				   }elseif ($duetransition->transitionproducttype == 6)
				   {
					 return "Service";  
					   
				   }elseif ($duetransition->transitionproducttype == 7)
				   {
					 return "Others";  
					   
				   }elseif ($duetransition->transitionproducttype == 9)
				   {
					 return "Cabine Admission Fees ";  
					   
				   }
				   
				   
				   
				   
				   
				   
                })
















                 ->editColumn('created', function(duetransition $data) {
					
					 return date('d/m/y', strtotime($data->created_at) );
                    
                })
				
             ->editColumn('pdf', function ($duetransition) {
                return '<a   target="_blank"      href="'.route('duepaymenttrans.pdf', $duetransition->id).'">Print</a>';
            })
				














				
					
                  ->rawColumns(['action','pdf','created' ])
                    ->make(true);
        }
      
        return view('showdueofpatient.duetrans', compact('duetransition'));  		
		

    }





public function printpdf($id)
{
	
 $duetransition=  duetransition::findOrFail($id);
 $patient= patient::findOrFail($duetransition->patient_id);
	$username = user::findOrFail($duetransition->user_id)->name;	
	
$setting = setting::first();



	
	   $pdf = PDF::loadView('showdueofpatient.bill', compact('duetransition','patient','username','setting' ),
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
	
	
	 return $pdf->stream('document.pdf');
	
	
}






	public function selecttestuser()
{
	
			$reportlist = user::where('role', '!=', 5)->orderBy('name')->get();
		return view('showdueofpatient.selectuser', compact('reportlist'));   
	
	
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
		



$transpatho =    duetransition::with('patient')->where('transitiontype', 1)->where('user_id', $request->user)->whereBetween('created_at',[$start,$end])->get();

 
$user = user::findOrFail($request->user)->name;



	   $pdf = PDF::loadView('showdueofpatient.dailybilluser', compact('transpatho','user', 'start','e' ),
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





	public function selectdate()
{
	
		
		return view('showdueofpatient.date');   
	
	
}


public function fetchdate(Request $request)
{


        $validator = Validator::make($request->all(), [
            'startdate' => 'required|date|size:10',
        'enddate' => 'date|size:10',
	
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
		



$transpatho =    duetransition::with('patient')->where('transitiontype', 1)->whereBetween('created_at',[$start,$end])->get();

 
$user= "By All employees";



	   $pdf = PDF::loadView('showdueofpatient.dailybilluser', compact('transpatho','user', 'start','e' ),
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



















public function outdorrduelist()
{
	

	/*	 $patient =   patient::with('cabinelist','cabinetransaction')->where(function ($query) {
    $query->where('booking_status', 0)
        ->orWhere('booking_status', 3);	
})->where(function ($query) {
    $query->where('due', '>', 0)
        ->orWhere('dena','>', 0);

	
})

->where('softdelete', 0)->where('id', '!=', 1)->orderBy('name')->get(); 

	*/	



		 $patient =   patient::with('cabinelist','cabinetransaction')

->where('softdelete', 0)->orderBy('name')->get(); 










$patient_indoor[] = array (
 

);
	


foreach ($patient as $p)
{






  $data = patient::findOrFail($p->id);
	$id= $p->id;
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
		
	









		
		

if( ($data->booking_status ==1  ) or ($data->booking_status ==2  ) )

{
	
	
	

	
	
	
	
	
	// cabine 
	
	
	
	 $patient =   patient::with('cabinelist','cabinetransaction')->findOrFail($id);
	$id = $p->cabinelist_id;
		$cabine = cabinelist::findOrFail($id);

	//$patient= patient::findOrFail($cabine->patient_id);
	$cabinetransaction = cabinetransaction::findOrFail($p->cabinetransaction_id	);
	
	
	
	
				$startimeshow =   $cabinetransaction->starting;
  $time1= strtotime($cabinetransaction->starting);
	
	
	
	
			    $enddate= new DateTime(Carbon::now());
  $enddateinstring =Carbon::now();	
	   $time2=strtotime($enddateinstring);
   
	   
	   
	if ($data->cabinerate > 0)
	{
 $cabine_fair_per_day= $data->cabinerate;
	}
	else{
	$cabine_fair_per_day= $cabine->price;
	}	   
	   
	   
	   
	   
	   
	   
	   
   $diff = $time2 - $time1 ;
   
 $differnece_btw_two_date_by_day = ceil($diff/ (60*60*24));



 
 
 $total_seat_fair = $differnece_btw_two_date_by_day * $cabine_fair_per_day ;
 


		  $gross_amount_cabine_histo= cabinetransferhisto::where('patient_id', $p->id)->sum('gross_amount_from_previous');
	  
$total_seat_fair= 	$total_seat_fair+ $gross_amount_cabine_histo;	


$cabine_paid = cabinefeetransition::where('patient_id', $p->id)->sum('gross_amount');

$cabine_due = $total_seat_fair - $cabine_paid;

	
$total_seat_fair 	= $cabine_due ;
	

 
 

}
else{
	
$total_seat_fair =0;	
}




	$doctor = doctor::where('softdelete',0)->orderBy('name')->get();	
	
			
			
		
			
		
$due = round($p->due) - round($p->dena)+  round($total_seat_fair) ;

if ($due != 0)
{
$patient_fetch[] = array (
  array('id'=>$p->id,'name'=>$p->name,'mobile'=>$p->mobile,'due'=>round($due), 'deposit'=>round($p->dena), 


 'present_servie_due' => round($present_servie_due), 'present_durgery_due' =>round($present_durgery_due),

'present_due_doctor_visit' => round($present_due_doctor_visit), 'present_due_pathology' => round($present_due_pathology),

'present_due_medicine' => round($present_due_medicine), 'total_seat_fair'=> round($total_seat_fair),
'total_admission_due' => round($total_admission_due), ),); 

}



/*
	
$id = $p->cabinelist_id;
		$cabine = cabinelist::findOrFail($id);


	$cabinetransaction = cabinetransaction::findOrFail($p->cabinetransaction_id	);
	
	
 		 

	
	
			$startimeshow =   $cabinetransaction->starting;
  $time1= strtotime($cabinetransaction->starting);
	
	
	
	
			    $enddate= new DateTime(Carbon::now());
  $enddateinstring =Carbon::now();	
	   $time2=strtotime($enddateinstring);
   
	   $cabine_fair_per_day= $cabine->price;
	   
   $diff = $time2 - $time1 ;
   
 $differnece_btw_two_date_by_day = ceil($diff/ (60*60*24));



 
 
 $total_seat_fair = $differnece_btw_two_date_by_day * $cabine_fair_per_day ;
 


		  $gross_amount_cabine_histo= cabinetransferhisto::where('patient_id', $p->id)
		  ->sum('gross_amount_from_previous');
	  
$total_seat_fair= 	$total_seat_fair+ $gross_amount_cabine_histo;	


$cabine_paid = cabinefeetransition::where('patient_id', $p->id)->sum('gross_amount');

$cabine_due = $total_seat_fair - $cabine_paid;


$due = $p->due - $p->dena+  $cabine_due ;





$patient_indoor[] = array (
  array('id'=>$p->id,'name'=>$p->name,'mobile'=>$p->mobile,'due'=>$due),

);

*/












	
}









//dd($patient_indoor);






	
	   $pdf = PDF::loadView('showdueofpatient.outdoorpatientduelist', compact('patient_fetch'),
   [], [
 'mode'                     => '',
	'format'                   => 'A4',
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
        $data=  duetransition::with('patient')->findOrFail($id);
		
		
		 return response()->json(['data' => $data ]);
		
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
     



						    $validated = $request->validate([
'amount',
'hidden_id',
'discount','receiveableamount',
		
    ]);
		
		























 $duetransition=  duetransition::findOrFail($request->hidden_id);
 $patient= patient::findOrFail($duetransition->patient_id);
 
 
  if($duetransition->transitiontype == 1)
 {
	 
	 $balance = balance_of_business::first();
	 




  if($duetransition->cabinefeetransition_id)
 {

	$cabinefeetransition = cabinefeetransition::findOrFail($duetransition->cabinefeetransition_id);
$pay_by_cash =0;
$pay_by_adv =0;

$remaining = $cabinefeetransition->adjust_with_advance - $request->receiveableamount;

if ($remaining > 0 )
{
	
	$pay_by_adv = $request->receiveableamount;
	
}
else{
$pay_by_adv = $cabinefeetransition->adjust_with_advance;

$pay_by_cash = 	$request->receiveableamount - $cabinefeetransition->adjust_with_advance;
	
	
}

$updated_discount = $request->discount;



   		   cabinefeetransition::where('id', $duetransition->cabinefeetransition_id )
  ->update([
  
  'discount'=>  $updated_discount, 
  'gross_amount'=>  $updated_discount+$pay_by_cash+$pay_by_adv , 
   'paid'=>  $pay_by_cash ,  
     'adjust_with_advance'=>  $pay_by_adv ,
  'user_id' => Auth()->user()->id,
  ]); 







$current_dena = $patient->dena +  $cabinefeetransition->adjust_with_advance    - $pay_by_adv  ;



       patient::whereId($patient->id)
  ->update(['dena' => $current_dena,

  ]); 





   		   duetransition::where('id', $request->hidden_id )
  ->update(['amount' =>  $request->receiveableamount, 
  
  'discountondue'=>  $request->discount, 
  
   'totalamount'=>  ( $request->discount +$request->receiveableamount) ,  
  
  'user_id' => Auth()->user()->id,
  ]);  
 	





$updatedbalance = $balance->balance - $duetransition->amount  + $request->receiveableamount;

 
 
  		   balance_of_business::where('id', 1 )
  ->update(['balance' =>  $updatedbalance
  ]);  










 
 }  else{
	 
	 
	 
	 
	 $updateddue = $patient->due +  $duetransition->totalamount   - $request->discount - $request->receiveableamount  ;
 
  		   patient::whereId($duetransition->patient_id)
  ->update(['due' =>  $updateddue
  ]); 

 


$updatedbalance = $balance->balance - $duetransition->amount  + $request->receiveableamount;

 
 
  		   balance_of_business::where('id', 1 )
  ->update(['balance' =>  $updatedbalance
  ]);  



   		   duetransition::where('id', $request->hidden_id )
  ->update(['amount' =>  $request->receiveableamount, 
  
  'discountondue'=>  $request->discount, 
  
   'totalamount'=>  ( $request->discount +$request->receiveableamount) ,  
  
  'user_id' => Auth()->user()->id,
  ]);  
 	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
 }
	 
	 
	 


 
 }
 
 
    if($duetransition->transitiontype == 6)
 {
	 
	 
	 	 
$current_dena = $patient->dena +  $duetransition->amount    - $request->receiveableamount  ;

$current_due = $patient->due +    $duetransition->totalamount - $request->discount - $request->receiveableamount  ;

       patient::whereId($patient->id)
  ->update(['dena' => $current_dena,
  
  'due'  => $current_due,
  ]); 	 
	 
	 
 
 
 
   		   duetransition::where('id', $request->hidden_id )
  ->update(['amount' =>  $request->receiveableamount, 
  
  'discountondue'=>  $request->discount, 
  
   'totalamount'=>  ( $request->discount +$request->receiveableamount) ,  
  
  'user_id' => Auth()->user()->id,
  ]); 
 
 
 
 
 
 
 

 
 
 
 
 
 
 
 
 
 
 
 
 
 }
 
   if($duetransition->transitiontype == 3)
 {


 
$balance = balance_of_business::first();

$updatedbalance = $balance->balance + $duetransition->amount - $request->receiveableamount  ;

 
 
  		   balance_of_business::where('id', 1 )
  ->update(['balance' =>  $updatedbalance
  ]);  




   		   duetransition::where('id', $request->hidden_id )
  ->update(['amount' =>  $request->receiveableamount, 
  
  'discountondue'=>  $request->discount, 
  
   'totalamount'=>  ( $request->discount +$request->receiveableamount) ,  
  
  'user_id' => Auth()->user()->id,
  ]); 








 
 }
 
 
 
 


		if ($patient->booking_status == 2  )
		{
	$patientfinalhisab=	patientfinalhisab::where('patient_id', $patient->id )->first();
	
	

	
	
	
		
		$upadateddue = $patientfinalhisab->total_due + $duetransition->totalamount - $request->discount - $request->receiveableamount;
		
		$updated_discount = $patientfinalhisab->total_discount - $duetransition->discountondue + $request->discount;
		
		$updated_receivable_amount = $patientfinalhisab->receiveable_amount +	$duetransition->discountondue - $request->discount;
		
		
		
	        $form_data = array(
            
            'total_due'        =>   $upadateddue,
			'total_discount' => $updated_discount,
			'receiveable_amount' => $updated_receivable_amount,			
            
        );
        patientfinalhisab::where('patient_id',  $patient->id )->update($form_data);	
		
		}




return response()->json(['success' => 'Data Updated successfully.']);



	 
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
}
