<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\doctor; 
use App\Models\patient; 
use App\Models\surgerylist; 
use App\Models\surgerytransaction; 
use App\Models\agentdetail; 
use App\Models\doctorCommissionTransition;
use App\Models\agenttransaction;   
use App\Models\duetransition;
use App\Models\cashtransition;
use App\Models\User; 

use DataTables;
use Validator;
use App\Models\balance_of_business;
Use \Carbon\Carbon;
use DateTime;
use PDF; 
use App\Models\cabinelist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class surgerytransitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(Request $request)
    {
     // $medicine=  medicine::latest()->get();
	 
	
	  $surgerylist=  surgerytransaction::with('patient','doctor','surgerylist','agentdetail')->latest()->get();
	
	  
	        if ($request->ajax()) {
					  $surgerylist=  surgerytransaction::with('patient','doctor','surgerylist','agentdetail')->latest()->get();
            //$medicine =  medicine::latest()->get();
            return Datatables::of($surgerylist)
                   ->addIndexColumn()
				   

                    ->addColumn('action', function( surgerytransaction $data){ 
   
                          $button = '<button type="button" name="deletekortehobe" id="'.$data->id.'"     class="delete btn btn-danger btn-sm">Delete</button>';
                        $button .= '&nbsp;&nbsp;';

          
						
						
                        

					   return $button;
                    })

                      ->addColumn('surgery_name', function (surgerytransaction $surgerylist) {
                    return $surgerylist->surgerylist->name;
                })
					
                      ->addColumn('dalal_name', function (surgerytransaction $surgerylist) {
                    
					if ($surgerylist->doctor_id)
					{
					return $surgerylist->doctor->name;
					}

							if ($surgerylist->agentdetail_id)
					{
					return $surgerylist->agentdetail->name;
					}
					else{
					return "Not Applicapble";	
						
					}
					
                }) 
				
				
				                      ->addColumn('patient', function (surgerytransaction $surgerylist) {
                    return $surgerylist->patient->name;
                })
				
				      
					  
					  
					  
					  ->addColumn('surgeon_name', function (surgerytransaction $surgerylist) {
                    
					//$id = $surgerylist->Surgeon_id ; 
					//$surgeon_name = doctor::findOrFail($id)->name;
					
					return doctor::findOrFail($surgerylist->Surgeon_id)->name;

                })
				
				
					->addColumn('anesthesiologist_name', function (surgerytransaction $surgerylist) {
                    
					
					return doctor::findOrFail($surgerylist->anesthesiologist_id )->name;

                })
				
				
					->addColumn('refdoc_id', function (surgerytransaction $surgerylist) {
                    
					return doctor::findOrFail($surgerylist->refdoc_id)->name;

                })
				
				
				
				
				
				
				
				

				
                      ->addColumn('patient_name', function (surgerytransaction $surgerylist) {
                    return $surgerylist->patient->name;
                })
				

				
				     ->addColumn('entry_by', function (surgerytransaction $surgerylist) {
                    return $surgerylist->user->name;
                })
				
             ->editColumn('pdf', function ($surgerylist) {
                return '<a   target="_blank"      href="'.route('surgerytansition.pdf', $surgerylist->id).'">Print</a>';
            })
				
                 ->editColumn('created', function(surgerytransaction $data) {
					
					 return date('d/m/y h:i A', strtotime($data->created_at) );
                    
                })
					
					
                    ->rawColumns(['action','pdf','created'])
                    ->make(true);
        }
		

		return view('surgerytransaction.surgerytransaction', compact('surgerylist'));   
	
	}
	
	
			    public function dropdown_list()
    {
		
		
		       $patientdata = patient::where('softdelete', 0)->orderBy('id')->get(); 
	    $cabinedata = cabinelist::where('booking_status','0' )->orderBy('serial_no')->get(); 
       
	   $doctor = doctor::where('softdelete', 0)->orderBy('name')->get(); 
	    $agent = agentdetail::where('softdelete', 0)->orderBy('name')->get(); 
          

	
	    $listofsurgery = surgerylist::where('softdelete', '!', '1' )->get(); 
	   

			 
			  

		  return response()->json(['patientdata' => $patientdata , 'cabinedata' => $cabinedata ,    'listofsurgery'=> $listofsurgery,  'agent'=> $agent, 'doctor' => $doctor, ]);
 
 	 
 
    }
	

	
	
	
	public function printpdffordoctorappointment($id)
    {
		
		
		$data = surgerytransaction::with('patient','doctor','surgerylist','User','agentdetail')->findOrFail($id);
		//$data= patient::with('patient','doctor','surgerylist','User')->findOrFail($id);
		$surgeon = doctor::findOrFail($data->Surgeon_id );
	    $anesthesiologist = doctor::findOrFail($data->anesthesiologist_id );
		$reference_doctor = doctor::findOrFail($data->refdoc_id );	
		
	 //$pdf = PDF::loadView('surgerytransaction.suregeryreport', compact('data'))->setPaper('a4', 'landscape')->setWarnings(false)->save('invoice.pdf');
    //return $pdf->stream('invoice.pdf');
	
 
 
 $pdf = PDF::loadView('surgerytransaction.suregeryreport', compact('data','surgeon','anesthesiologist','reference_doctor' ),
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
     'customer_id',
	 'showadmitform',
	 'name', 'address', 'mobile', 'age', 'sex', 'cabine_id', 'commissiontype', 'agent_id', 'doctor_id',
	 'surgerydate', 'refdoctor_id',  'Surgeon_id',
	 'surgeon_fees', 'anesthesiologist_id', 'anesthesiologist_fees', 'surgery_id',
	 'pre_operative_charge', 'Surgeon_charge', 'anesthesia_charge', 'post_operative_charge',
	 'assistant_charge', 'ot_charge', 'o2_no2_charge',
	 'c_arme_charge', 'miscellaneous_expenses', 'paid',
	 'due','percentofdicountontaotal', 'dicountontaotal', 'totalamount', 'commision','created_at',
	 
		 
    ]);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		
		
				$surgerytransaction = new surgerytransaction; 
		
		
		
		
		
		
	
		if ($request->customer_id == '')
		{
		$patient = new patient() ; 
		$patient->name = $request->name;
		$patient->mobile = $request->mobile;
		$patient->age = $request->age;
		$patient->sex = $request->sex;
		$patient->address = $request->address;	
		$patient->booking_status = 1;
		$patient->save();
		
		$patientid = $patient->id;
		}
		else 
		{
		$patientid = $request->customer_id;
			
		}





		$patient = patient::findOrFail($patientid);
		
if($request->adjustwithadvancedeposit == 1 )
{	

	

		$remainging = $patient->dena - $request->due;
		
		
		
		
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
			
			
			
} } else{
	$adjust_advance =0;
		
	
}
















				/////////////////////////////////////////////give commision to agent or doctor ///////////
		
		if ($request->commissiontype == 1 )
		{
			$doctorCommissionTransition = new doctorCommissionTransition() ;
			$doctorCommissionTransition->doctor_id = $request->doctor_id;
			$doctorCommissionTransition->user_id = Auth()->user()->id;
			$doctorCommissionTransition->amount = $request->commision;
			$doctorCommissionTransition->transitiontype = 3;
		    $doctorCommissionTransition->patient_id =  $patientid;
			$doctorCommissionTransition->created_at  = $request->dataentrydate;
			 $doctorCommissionTransition->save();
		
		/// update doctor balance 
		$doctor = doctor::findOrFail($request->doctor_id);
		$pawna = $doctor->hospitaler_kache_pawna + $request->commision;
		
            doctor::where('id', $request->doctor_id )
            ->update(['hospitaler_kache_pawna' => $pawna]);
		
		$surgerytransaction->doctor_commission_transition_id = $doctorCommissionTransition->id;
		
		}


		if ($request->commissiontype == 2 )
		{
			$agenttransaction = new agenttransaction();
			$agenttransaction->agentdetail_id = $request->agent_id;
			$agenttransaction->user_id =  Auth()->user()->id;
			$agenttransaction->paidamount =   $request->commision;
		   $agenttransaction->patient_id =  $patientid;
		   $agenttransaction->transitiontype = 3;
		   $agenttransaction->created_at  = $request->dataentrydate;
		   $agenttransaction->save();
		
		
		
				/// update agent balance 
		$agentdetail = agentdetail::findOrFail($request->agent_id);
		$pawna = $agentdetail->hospitaler_kache_pawna + $request->commision;
		
            agentdetail::where('id', $request->agent_id )
            ->update(['hospitaler_kache_pawna' => $pawna]);
		
		
	$surgerytransaction->agenttransaction_id = $agenttransaction->id;	
		
		
		
		
		}

//////////////////////////////// insert surgeon fees and anesthesiologist fees 

/// update doctor balance 

if ($request->Surgeon_id)
{
				$doctorCommissionTransition = new doctorCommissionTransition() ;
			$doctorCommissionTransition->doctor_id = $request->Surgeon_id;
			$doctorCommissionTransition->user_id = Auth()->user()->id;
			$doctorCommissionTransition->amount = $request->surgeon_fees;
			$doctorCommissionTransition->transitiontype = 7;
		    $doctorCommissionTransition->patient_id =  $patientid;
			$doctorCommissionTransition->created_at  = $request->dataentrydate;
			 $doctorCommissionTransition->save();
	
		$doctor = doctor::findOrFail($request->Surgeon_id);
		$pawna = $doctor->hospitaler_kache_pawna + $request->surgeon_fees;
		
            doctor::where('id', $request->Surgeon_id )
            ->update(['hospitaler_kache_pawna' => $pawna]);

	$surgerytransaction->Surgeontransid = $doctorCommissionTransition->id;

}




if ($request->anesthesiologist_id)
{
	
	
			$doctorCommissionTransition = new doctorCommissionTransition() ;
			$doctorCommissionTransition->doctor_id = $request->anesthesiologist_id;
			$doctorCommissionTransition->user_id = Auth()->user()->id;
			$doctorCommissionTransition->amount = $request->anesthesiologist_fees;
			$doctorCommissionTransition->transitiontype = 6;
		    $doctorCommissionTransition->patient_id =  $patientid;
			$doctorCommissionTransition->created_at  = $request->dataentrydate;
			 $doctorCommissionTransition->save();
		$doctor = doctor::findOrFail($request->anesthesiologist_id);
		$pawna = $doctor->hospitaler_kache_pawna + $request->anesthesiologist_fees;
		
            doctor::where('id', $request->anesthesiologist_id )
            ->update(['hospitaler_kache_pawna' => $pawna]);

	$surgerytransaction->anesthesiologisttransid = $doctorCommissionTransition->id;

}


		//////////////////////////////////////////////////// insert shuru ///////////////////////
		
	
		
		

		$surgerytransaction->user_id  = auth()->user()->id ;
	$surgerytransaction->patient_id  = $patientid;
	

	
	$surgerytransaction->refdoc_id = $request->refdoctor_id;
	$due = $request->due;
	$id= $patientid;
	

	/////////// update patient due 
$patient_due = patient::where('id', $patientid )->pluck('due')->first();

$patient_due = $patient_due + $due; 


patient::where('id', $patientid )
       ->update([
           'due' => $patient_due
        ]);

/////////// end update patient due 	


///////////update business balance /////////////////////////////
   $balance = balance_of_business::first();  
   $present_balance = $balance->balance + $request->paid ;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
///////////// end update //////////////////////////////  


	 $surgerytransaction->surgerylist_id  =	$request->surgery_id;
	$surgerytransaction->anesthesiologist_id  =	$request->anesthesiologist_id;
	$surgerytransaction->pre_operative_charge =	$request->pre_operative_charge;
	$surgerytransaction->Surgeon_charge =	$request->Surgeon_charge;
    $surgerytransaction->Surgeon_id =	$request->Surgeon_id;	
    $surgerytransaction->anesthesia_charge =	$request->anesthesia_charge;
	$surgerytransaction->assistant_charge =	$request->assistant_charge; 
	$surgerytransaction->ot_charge =	$request->ot_charge;  
	$surgerytransaction->o2_no2_charge =	$request->o2_no2_charge;
	$surgerytransaction->c_arme_charge =	$request->c_arme_charge;
	$surgerytransaction->post_operative_charge =	$request->post_operative_charge;
	$surgerytransaction->miscellaneous_expenses =	$request->miscellaneous_expenses;
	$surgerytransaction->surgeon_fees =	$request->surgeon_fees;
	$surgerytransaction->anesthesiologist_fees =	$request->anesthesiologist_fees; 
    $surgerytransaction->comission =	$request->commision; 
	$surgerytransaction->surgerydate =	$request->surgerydate;  
	$surgerytransaction->totalvat =	0;

	$surgerytransaction->pay_in_cash  =	$request->paid;
	$surgerytransaction->due =	$request->due;
	$surgerytransaction->doctor_id  =	$request->doctor_id; // agent doctor 
	$surgerytransaction->agentdetail_id  =	$request->agent_id;
	$surgerytransaction->totaldiscount  =	$request->dicountontaotal;
	$surgerytransaction->total_cost_before_initial_vat_and_discount	  = $request->grossamount;
	$surgerytransaction->total_cost_after_initial_vat_and_discount  = $request->totalamount;
	$surgerytransaction->adjust_with_advance  = $adjust_advance;
	$surgerytransaction->created_at  = $request->dataentrydate;
	$surgerytransaction->save();


		if($request->due > 0)
		{
	$duetransition = new duetransition();
	$duetransition->patient_id = $patientid;
	$duetransition->user_id = auth()->user()->id ;
	$duetransition->totalamount = $request->totalamount;
	$duetransition->amount = $request->due;
	$duetransition->transitiontype	= 2;
	$duetransition->transitionproducttype	= 3;
	$duetransition->surgerytransaction_id	= $surgerytransaction->id;
    $duetransition->comment	= "Surgery";
	$duetransition->created_at  = $request->dataentrydate;	
	$duetransition->save();
		}



$patient_name = patient::findOrFail($patientid)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $patientid;

$cashtransition->surgerytransaction_id = $surgerytransaction->id;
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->grossamount;
$cashtransition->discount = $request->dicountontaotal;	
$cashtransition->amount_after_discount = $request->grossamount - $request->dicountontaotal;
$cashtransition->deposit = $request->paid;
$cashtransition->debit = $request->due + $adjust_advance;
$cashtransition->credit = $request->paid;
$cashtransition->description = "Surgry Bill from Patinet Name:" .$patient_name. " Patient ID: " .$patientid. " Surgery Order ID:" .$surgerytransaction->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 1;

$cashtransition->customer_type = 1;
$cashtransition->transitionproducttype = 3; 
$cashtransition->created_at  = $request->dataentrydate;	
$cashtransition->save();











});	
       //return Redirect::back();
	   Log::channel('sarjaribibag')->info('New Surgery Transaction Added',
[
    'massage'=> 'New Surgery Transaction Added',
    'employee_details'=> Auth::user(),
	'Info'=> $request->all(),
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
        $data=  surgerytransaction::find($id);
	
	
	
	
	$patient = patient::findOrFail($data->patient_id) ;
	
	$patient_due = $patient->due;




$patient_due = $patient_due - $data->due; 
$patient_dena = $patient->dena + $data->adjust_with_advance; 

patient::where('id',  $data->patient_id )
       ->update([
           'due' => $patient_due,
		   'dena'=> $patient_dena,
        ]);

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
///////////update business balance /////////////////////////////
   $balance = balance_of_business::first();  
   $present_balance = $balance->balance - $data->pay_in_cash ;	

   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
///////////// end update //////////////////////////////
		
		


/////////// end update patient due 	

				
				
				/// update agent balance 
				if($data->agentdetail_id)
				{
		$agentdetail = agentdetail::find($data->agentdetail_id);
		agenttransaction::find($data->agenttransaction_id)->delete();  
		$pawna = $agentdetail->hospitaler_kache_pawna - $data->comission;  
	                                                                      
            agentdetail::where('id', $data->agentdetail_id )
            ->update(['hospitaler_kache_pawna' => $pawna]);
				}
				
				
								/// update dalal doctor  balance 
				if($data->doctor_id)
				{
		$doctor = doctor::find($data->doctor_id);
  
		$pawna = $doctor->hospitaler_kache_pawna - $data->comission; 
	
            doctor::where('id', $data->doctor_id )
            ->update(['hospitaler_kache_pawna' => $pawna]);
			
				 doctorCommissionTransition::find($data->doctor_commission_transition_id)->delete();
				}
				
				
								if($data->Surgeon_id)
				{
					
					$doctor = doctor::find($data->Surgeon_id);
	 doctorCommissionTransition::find($data->Surgeontransid)->delete();  
		$pawna = $doctor->hospitaler_kache_pawna - $data->surgeon_fees; 
	
            doctor::where('id', $data->Surgeon_id )
            ->update(['hospitaler_kache_pawna' => $pawna]);
					
					
				}

		
		
		
										if($data->Surgeon_id)
				{
					
					$doctor = doctor::find($data->anesthesiologist_id);
	 doctorCommissionTransition::find($data->anesthesiologisttransid)->delete();  
		$pawna = $doctor->hospitaler_kache_pawna - $data->anesthesiologist_fees; 
	
            doctor::where('id', $data->anesthesiologist_id )
            ->update(['hospitaler_kache_pawna' => $pawna]);
					
					
				}
	
		
				 $duetrans = duetransition::where('surgerytransaction_id', $data->id )->first();
	if($duetrans != null )
	{
		
		
		$duetrans->delete();
	}
	
	$cashtransition = cashtransition::where('surgerytransaction_id', $data->id )->first();
	
		if($cashtransition != null )
	{
		$cashtransition->delete();
	}
	Log::channel('sarjaribibag')->info(' Surgery Transaction Delated',
	[
		'massage'=> 'Surgery Transaction Delated',
		'employee_details'=> Auth::user(),
		'Info'=> $data,
	]);

		$data->delete();
    }
}
