<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setting;
use App\Models\doctor;    
use App\Models\doctorCommissionTransition;

use App\Models\patient;  
  
use App\Models\cashtransition;
use  App\Models\User;

use DataTables;
use Validator;
use Carbon\Carbon;
use App\Models\balance_of_business; 
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use PDF;


class DoctorCommissionController extends Controller
{
         public function index(Request $request)
    {
        $doctorCommissionTransition =  doctorCommissionTransition::with('doctor')->orderBy('id', 'DESC' )->orderBy('created_at', 'DESC' )->get();
	
	  
	        if ($request->ajax()) {
					  
				        $doctorCommissionTransition =  doctorCommissionTransition::with('doctor')->orderBy('id', 'DESC' )->orderBy('created_at', 'DESC' )->get();
            
			
			//$medicine =  medicine::latest()->get();
            return Datatables::of($doctorCommissionTransition)
                   ->addIndexColumn() 
				   

                    ->addColumn('action', function( doctorCommissionTransition $data){ 
   
                          $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        $button .= '&nbsp;&nbsp;';
						
					if ($data->paidorunpaid == 0)
					{ 
						$button .= '<button type="button" name="paid" id="'.$data->id.'" class="paid btn btn-info btn-sm">Paid</button>';
					}
	
                        
                        return $button;
                    })  
    
                      ->addColumn('doctor_name', function (doctorCommissionTransition $doctorCommissionTransition) {
                    return $doctorCommissionTransition->doctor->name;
                })
				
				
	
				
				
				
				
				
				
				
				
				
				
				
				
				    ->addColumn('transitino_type', function (doctorCommissionTransition $doctorCommissionTransition) {
                    
					if ($doctorCommissionTransition->transitiontype == 1)
					{
						$type= "Pathology Commission ";
					return $type;	
					}
					
					elseif ($doctorCommissionTransition->transitiontype == 3)
					{
						$type= " Commission for surgery";
					return $type;	
					}
					elseif ($doctorCommissionTransition->transitiontype == 4)
					{
						$type= " Commission for cabine fair";
					return $type;	
					}
					elseif ($doctorCommissionTransition->transitiontype == 5)
					{
						$type= " Commission for the Patient got relased";
					return $type;	
					}
					
					
					elseif ($doctorCommissionTransition->transitiontype == 2)
					{
						$type= " Doctor Share for Outdoor";
					return $type;	
					}
					
					
										elseif ($doctorCommissionTransition->transitiontype == 6)
					{
						$type= " Anesthesiologist Fees";
					return $type;	
					}
					
										elseif ($doctorCommissionTransition->transitiontype == 7)
					{
						$type= " Surgeon Fees";
					return $type;	
					}
					
					elseif ($doctorCommissionTransition->transitiontype == 8)
					{
						$type= "Ultrasonologist Fees";
					return $type;	
					}
					
					
					elseif ($doctorCommissionTransition->transitiontype == 9)
					{
						$type= "X-Ray Fees";
					return $type;	
					}
					
					
						elseif ($doctorCommissionTransition->transitiontype == 10)
					{
						$type= "Echo";
					return $type;	
					}				
					
					
					
					
					
					
					
					
                })
				
				
							 ->addColumn('patient_name', function (doctorCommissionTransition $doctorCommissionTransition) {
                    if ($doctorCommissionTransition->patient_id )
					{
						$p = patient::find($doctorCommissionTransition->patient_id);
						if ($p != null ) 
						{
				return	$patient = patient::findOrFail($doctorCommissionTransition->patient_id)->name;
					}
					else
					{
				return	"Not Applicable";	
					
					
					}
					}
					else
					{
						return	$patient="Not Applicable";
					}
						
                })
				
				
							 ->addColumn('paid_staus', function (doctorCommissionTransition $doctorCommissionTransition) {
                    
				if ($doctorCommissionTransition->paidorunpaid == 0)
				{
					
					return $status="Unpaid";
					
				}
								if ($doctorCommissionTransition->paidorunpaid == 1)
				{
					
					return $status="Paid";
					
				}	
						
                })	
				
				
				
				
				
				
					->editColumn('created_at', function(doctorCommissionTransition $data) {
					
					 return date('d/m/y', strtotime($data->created_at) );
                    
                })
				
				
				             ->editColumn('pdf', function ($doctorCommissionTransition) {
                return '<a   target="_blank"      href="'.route('doctorcommission.pdf', $doctorCommissionTransition->id).'">Print</a>';
            })
					
                    ->rawColumns(['action','pdf'])
                    ->make(true);
        }
		

		return view('doctorCommissionTransition.doctorCommissionTransition', compact('doctorCommissionTransition'));   
    }

	public function paidsenddata($id)
{
	
	  $data = doctorCommissionTransition::with('doctor','patient')->findOrFail($id);
	  if($data->patient_id != null)
	  {
	$patientname = patient::findOrFail($data->patient_id)->name;
	  }
	  else{
		$patientname = "NA";  
		  
	  }
	 return response()->json(['data' => $data, 'patientname'=> $patientname ]);
	
}




	 public function paidfordoctor (Request $request){
		    if ($request->ajax()) {
			   
	  $doctorCommissionTransition = doctorCommissionTransition::findOrFail($request->hidden_id);
 	
		   doctorCommissionTransition::where('id', $request->hidden_id)
  ->update(['paidorunpaid' => 1,

'created_at' => $request->Date_of_Transition,
'amount' =>$request->salary,

  ]);
  
  
  
  

  
    $balance = balance_of_business::first();  
   $present_balance = $balance->balance - $request->salary   ;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]); 

  
  $doctor =  doctor::findOrFail($doctorCommissionTransition->doctor_id)->hospitaler_kache_pawna;
  $doctorbalance =  $doctor  - $doctorCommissionTransition->paidamount    ;
     doctor::findOrFail($doctorCommissionTransition->doctor_id)
  ->update(['hospitaler_kache_pawna' =>$doctorbalance  ]); 
  
  
  

  
  
  return response()->json(['success' => 'Amount Paid']); 
		 
	 }
	 }
	



   
   	public function printpdf($id)
{


		  $doctorCommissionTransition=  doctorCommissionTransition::with('doctor','patient')->findOrFail($id);
            
	$p = patient::find($doctorCommissionTransition->patient_id);
	
	if($p != null)
	{
	$p = $p->name;	
	}
	else
	{
	$p = "NA";		
	}

	$setting= setting::first();
	
	
	
	   $pdf = PDF::loadView('doctorCommissionTransition.pdf', compact('doctorCommissionTransition','p','setting' ),
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
   
   
   
   
   
   
   
   
  
   
   
   
   
   
   


   public function store(Request $request)
    {
                $rules = array(
            'doctor_id'    =>  'required',
            'department',
			 'transitiontype'     =>  'required',
			  'comment',
			   'amount'     =>  'required',
			   'prodankorchen' =>  'required',
			   'patient' ,
			   'Date_of_Transition',
			   'bill',
           
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       	


 DB::beginTransaction();		
if ($request->prodankorchen== 1)
{
	
	
 $d = new doctorCommissionTransition();

$d->doctor_id = $request->doctor_id;
$d->user_id = Auth()->User()->id;
$d->amount = $request->amount;
$d->comment = $request->comment;
$d->transitiontype = $request->transitiontype;
$d->paidorunpaid = 1;
$d->patient_id = $request->patient;
$d->receiveablecollection = $request->bill;

$d->created_at = $request->Date_of_Transition;	
	$d->save();
 
 
 
 		$user_name = User::findOrFail(auth()->user()->id)->name;
$doctor_name = doctor::findOrFail($request->doctor_id)->name;


$cashtransition = new cashtransition();

$cashtransition->doctorCommissionTransition_id = $d->id;


$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->amount;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->amount;
$cashtransition->withdrwal = $request->amount;
$cashtransition->debit =  0 ;
$cashtransition->credit = 0  ;
$cashtransition->description = "Money Withdrawl for giving Commission/ Share to the Doctor : " .$doctor_name. ";  Doctor  Commission/share  Transitions ID : " .$d->id.  " Data Entry By: " .$user_name ;
$cashtransition->company_type = 2; 


$cashtransition->transitionproducttype = 17; 
$cashtransition->save();
 
 
 
 
 
 
 
 
 
 
 
 
		
}	

if ($request->prodankorchen== 2)
{
	
	
	
	 $d = new doctorCommissionTransition();

$d->doctor_id = $request->doctor_id;
$d->user_id = Auth()->User()->id;
$d->amount = $request->amount;
$d->comment = $request->comment;
$d->transitiontype = $request->transitiontype;
$d->receiveablecollection = $request->bill;
$d->patient_id = $request->patient;
$d->created_at = $request->Date_of_Transition;	
	$d->save();
 



}	
 
   
   
	 			     /////////////update balance use   	
 
  
  
   if ($request->prodankorchen == 1  )		// nogode hole balance kmbe
 {
  
   $balance = balance_of_business::first();  
   $present_balance = $balance->balance - $request->amount ;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
	
 } 
 
   if ($request->prodankorchen == 2  )	// bakite hole hostipataler kache pawna barbe 	
 {
   $doctor =  doctor::findOrFail($request->doctor_id)->hospitaler_kache_pawna;
  $doctorbalance =  $doctor  + $request->amount;
     doctor::findOrFail($request->doctor_id)
  ->update(['hospitaler_kache_pawna' =>$doctorbalance  ]);
  }
   
   

    DB::commit();
	
	Log::channel('doctorpoint')->info('ডাক্তারদের দেয়া কমিশনের ট্রাঞ্জিশন।', [
			$request->all(), 
    ]);
        return response()->json(['success' => 'Data Added successfully.000']);
 }
    








    public function destroy($id)
    {
              DB::beginTransaction();               
			   $data = doctorCommissionTransition::findOrFail($id);
				
					 			     /////////////update balance use App\Models\balance_of_business;  	
  if ($data->paidorunpaid == 1 )  // taka deya hoye geche 
  {   	  
   $balance = balance_of_business::first();  
   $present_balance = $balance->balance + $data->amount ;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
		




cashtransition::where('doctorCommissionTransition_id', $id)->delete();


		
        $data->delete();
		
  }
  
 if ($data->paidorunpaid == 0 ) 
 {

   $doctor =  doctor::findOrFail($data->doctor_id)->hospitaler_kache_pawna;
  $doctorbalance =  $doctor  - $data->amount;
     doctor::findOrFail($data->doctor_id)
  ->update(['hospitaler_kache_pawna' =>$doctorbalance  ]);

 $data->delete();

 }	 
  
  
		 DB::commit();

		 Log::channel('doctorpoint')->info('ডাক্তারদের দেয়া কমিশনের ট্রাঞ্জিশন ডিলেট করা হহেছে।', [
			$data, 
    	]);

    }










}
