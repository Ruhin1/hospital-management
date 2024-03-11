<?php

namespace App\Http\Controllers;

use App\Models\agenttransactionController;
use Illuminate\Http\Request;
use App\Models\setting;
use App\Models\agentdetail;    
use App\Models\patient;   
use App\Models\agenttransaction;

use App\Models\doctorCommissionTransition;

use App\Models\cashtransition;
use  App\Models\User;
use  App\Models\doctor;



use App\Models\balance_of_business;
use DataTables;
use Validator;
use Carbon\Carbon;
use DB;
use PDF;
class AgenttransactionControllerController extends Controller
{
    /**
     * Display a listing of the resource. dropdown_list
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
		
		
        $employeesalarytransaction =  agenttransaction::with('agentdetail')->orderBy('id', 'DESC' )->orderBy('created_at', 'DESC' )->get();
	
	        if ($request->ajax()) {
				        $employeesalarytransaction =  agenttransaction::with('agentdetail')->orderBy('id', 'DESC' )->orderBy('created_at', 'DESC' )->get();
            //$medicine =  medicine::latest()->get(); 
            return Datatables::of($employeesalarytransaction)
                   ->addIndexColumn() 
				   

                    ->addColumn('action', function( agenttransaction $data){ 
   /*
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';  */
                        $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                         $button .= '&nbsp;&nbsp;';
						 
					if ($data->paidorunpaid == 0)
					{ 
						$button .= '<button type="button" name="paid" id="'.$data->id.'" class="paid btn btn-info btn-sm">Paid</button>';
					}
						return $button;
                    })  
    
                      ->addColumn('employee_name', function (agenttransaction $employeesalarytransaction) {
                    return $employeesalarytransaction->agentdetail->name;
                })
				
				
				 ->addColumn('patient_name', function (agenttransaction $employeesalarytransaction) {
                    if ($employeesalarytransaction->patient_id )
					{
				return	$patient = patient::findOrFail($employeesalarytransaction->patient_id)->name;
					}
					else
					{
						return	$patient="Not Applicable";
					}
						
                })
				
				
								 ->addColumn('paid_staus', function (agenttransaction $employeesalarytransaction) {
                    
				if ($employeesalarytransaction->paidorunpaid == 0)
				{
					
					return $status="Unpaid";
					
				}
								if ($employeesalarytransaction->paidorunpaid == 1)
				{
					
					return $status="Paid";
					
				}	
						
                })

				
				    
					
					->addColumn('transitino_type', function (agenttransaction $employeesalarytransaction) {
                    
					if ($employeesalarytransaction->transitiontype == 1)
					{
						$type= "Pathology Commission ";
					return $type;	
					}
					
					elseif ($employeesalarytransaction->transitiontype == 3)
					{
						$type= " Commission for surgery";
					return $type;	
					}
					elseif ($employeesalarytransaction->transitiontype == 4)
					{
						$type= " Commission for cabine fair";
					return $type;	
					}
					elseif ($employeesalarytransaction->transitiontype == 5)
					{
						$type= " Commission for the Patient relased";
					return $type;	
					}
										elseif ($employeesalarytransaction->transitiontype == 6)
					{
						$type= " Commission for Outdoor Doctor";
					return $type;	
					}
					
					else
					{
						$type= " Not Applicable";
					return $type;	
					}
				
                })
				
				
				
				
				
				
				
				
				
					->editColumn('created_at', function(agenttransaction $data) {
					
					 return date('d/m/y', strtotime($data->created_at) );
                    
                })
				

				             ->editColumn('pdf', function ($employeesalarytransaction) {
								 
								 if($employeesalarytransaction->paidorunpaid == 1)
								 {			 
                return '<a   target="_blank"      href="'.route('agenttransaction.pdf', $employeesalarytransaction->id).'">Print</a>';
								 } else{
								return  'NA';	 
									 
								 }


		   })



				
                    ->rawColumns(['action','pdf'])
                    ->make(true);
        }
		

		return view('agenttransaction.agenttransaction', compact('employeesalarytransaction'));   
    }








public function datepick ()
{
	

	$agentdetail = agentdetail::where('softdelete',0)->orderBy('name')->get();
	$doctor = doctor::where('softdelete',0)->orderBy('name')->get();
	return view('agenttransaction.datepick', compact('agentdetail','doctor')); 
 	
	
}




public function fetchreport (Request $request)
{
	



     $validator = Validator::make($request->all(), [
            'startdate' => 'required|date|size:10',
        'enddate' => 'date|size:10',
		'agent',
		'doctor',
		
		
        ]);
		

		
		if ($validator->fails()) {
            return redirect('picktwodate')
                        ->withErrors($validator)
                        ->withInput();
        }
		
	
		
		        $start = date("Y-m-d",strtotime($request->input('startdate')));
        $end = date("Y-m-d",strtotime($request->input('enddate')));
	

if (($request->agent == '99999999999999'  ) and ( ($request->doctor == '88888888888888'  ))  )
{
$agentransition =  agenttransaction::with('agentdetail')->where('paidorunpaid',1)->whereBetween('created_at',[$start,$end])->orderBy('agentdetail_id')
->orderBy('id', 'DESC' )->orderBy('created_at', 'DESC' )->get();







$unpaidagentransition = agenttransaction::with('agentdetail')->where('paidorunpaid',0)->whereBetween('created_at',[$start,$end])->orderBy('agentdetail_id')
->orderBy('id', 'DESC' )->orderBy('created_at', 'DESC' )->get();



//dd($agentransition);

        $doctorCommissionTransition =  doctorCommissionTransition::with('doctor')->where('paidorunpaid',1)->whereBetween('created_at',[$start,$end])->orderBy('doctor_id')
		->orderBy('id', 'DESC' )->orderBy('created_at', 'DESC' )->get();

	
$setting = setting::first();


  $unpaiddoctorCommissionTransition = doctorCommissionTransition::with('doctor')->where('paidorunpaid',0)->whereBetween('created_at',[$start,$end])->orderBy('doctor_id')
		->orderBy('id', 'DESC' )->orderBy('created_at', 'DESC' )->get();



	$pdf = PDF::loadView('agenttransaction.commissionreport',

		compact('agentransition','setting','doctorCommissionTransition','unpaiddoctorCommissionTransition','unpaidagentransition',),
		


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
elseif(($request->doctor != '88888888888888'  ) and ( ($request->agent == '99999999999999'  ))  )
{


	
			$doctorCommissionTransition =  doctorCommissionTransition::with('doctor')
			->where('paidorunpaid',1)
			->where('doctor_id',$request->doctor)
			->whereBetween('created_at',[$start,$end])->orderBy('doctor_id')
			->orderBy('id', 'DESC' )->orderBy('created_at', 'DESC' )->get();
	
		
	$setting = setting::first();
	
	
	  $unpaiddoctorCommissionTransition = doctorCommissionTransition::with('doctor')
	  ->where('paidorunpaid',0)
	  ->where('doctor_id',$request->doctor)
	  ->whereBetween('created_at',[$start,$end])->orderBy('doctor_id')
			->orderBy('id', 'DESC' )->orderBy('created_at', 'DESC' )->get();
	
	
	
		$pdf = PDF::loadView('agenttransaction.commissionreportdoctor',
	
			compact('setting','doctorCommissionTransition','unpaiddoctorCommissionTransition'),
			
	
	
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

elseif(($request->doctor == '88888888888888'  ) and ( ($request->agent != '99999999999999'  ))  )
{
	$agentransition =  agenttransaction::with('agentdetail')
	->where('agentdetail_id',$request->agent)
	->where('paidorunpaid',1)->whereBetween('created_at',[$start,$end])->orderBy('agentdetail_id')
	->orderBy('id', 'DESC' )->orderBy('created_at', 'DESC' )->get();
	
	
	
	
	
	
	
	$unpaidagentransition = agenttransaction::with('agentdetail')
	->where('agentdetail_id',$request->agent)
	->where('paidorunpaid',0)->whereBetween('created_at',[$start,$end])->orderBy('agentdetail_id')
	->orderBy('id', 'DESC' )->orderBy('created_at', 'DESC' )->get();
	
	

	
		
	$setting = setting::first();
	
	

	
	
	
		$pdf = PDF::loadView('agenttransaction.commissionreportagent',
	
			compact('agentransition','setting','unpaidagentransition',),
			
	
	
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




	
	
}














			   public function printpdf($id)
    {
		

			  $agenttransaction= agenttransaction::with('agentdetail','patient' )->findOrFail($id);
            
	$p = patient::find($agenttransaction->patient_id);
	
	if($p != null)
	{
	$p = $p->name;	
	}
	else
	{
	$p = "NA";		
	}	
		
	$setting = setting::first();
			
	 	 $pdf = PDF::loadView('agenttransaction.pdf', compact('agenttransaction','p','setting'),
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
	 
	 
	 
	 
	 
    return $pdf->stream('invoice.pdf');
 
    }





























     public function agentfetch(Request $request)
    {
		
		
        $agentrans =  agenttransaction::with('agentdetail')->where('agentdetail_id', $request->agent  )->latest()->get();
	
	  
	   /*     if ($request->ajax()) {
					  $employeesalarytransaction=  agenttransaction::with('agentdetail')->where('agentdetail_id', $request->agent  )->latest()->get();
            //$medicine =  medicine::latest()->get(); 
            return Datatables::of($employeesalarytransaction)
                   ->addIndexColumn() 
				   

                    ->addColumn('action', function( agenttransaction $data){ 
   /*
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';  */
           /*             $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                         $button .= '&nbsp;&nbsp;';
						 
					if ($data->paidorunpaid == 0)
					{ 
						$button .= '<button type="button" name="paid" id="'.$data->id.'" class="paid btn btn-info btn-sm">Paid</button>';
					}
						return $button;
                    })  
    
                      ->addColumn('employee_name', function (agenttransaction $employeesalarytransaction) {
                    return $employeesalarytransaction->agentdetail->name;
                })
				
				
				 ->addColumn('patient_name', function (agenttransaction $employeesalarytransaction) {
                    if ($employeesalarytransaction->patient_id )
					{
				return	$patient = patient::findOrFail($employeesalarytransaction->patient_id)->name;
					}
					else
					{
						return	$patient="Not Applicable";
					}
						
                })
				
				
								 ->addColumn('paid_staus', function (agenttransaction $employeesalarytransaction) {
                    
				if ($employeesalarytransaction->paidorunpaid == 0)
				{
					
					return $status="Unpaid";
					
				}
								if ($employeesalarytransaction->paidorunpaid == 1)
				{
					
					return $status="Paid";
					
				}	
						
                })

				
				    
					
					->addColumn('transitino_type', function (agenttransaction $employeesalarytransaction) {
                    
					if ($employeesalarytransaction->transitiontype == 1)
					{
						$type= "Pathology Commission ";
					return $type;	
					}
					
					elseif ($employeesalarytransaction->transitiontype == 3)
					{
						$type= " Commission for surgery";
					return $type;	
					}
					elseif ($employeesalarytransaction->transitiontype == 4)
					{
						$type= " Commission for cabine fair";
					return $type;	
					}
					elseif ($employeesalarytransaction->transitiontype == 5)
					{
						$type= " Commission for the Patient relased";
					return $type;	
					}
					else
					{
						$type= " Not Applicable";
					return $type;	
					}
				
                })
				
				
				
				
				
				
				
				
				
					->editColumn('created_at', function(agenttransaction $data) {
					
					 return date('d/m/y', strtotime($data->created_at) );
                    
                })
					
                    ->rawColumns(['action'])
                    ->make(true);
        }  */
		

		return view('agenttransaction.agentfetch', compact('agentrans'));   
    }




















    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 	public function selectagent()
{
	
			$agentdetail = agentdetail::where('softdelete',0)->orderBy('name')->get();
		return view('agenttransaction.selectagent', compact('agentdetail'));   
	
	
} 
	 
	 
    public function create()
    {
        //
    }

		    public function dropdown_list()
    {
		

       $employeedetails = agentdetail::where('softdelete','0' )->orderBy('name')->get(); 
	  $patient = patient::select('id','name')->where('softdelete',0)->get(); 

	         

            return response()->json(['employeedetails' => $employeedetails , 'patient' => $patient ]);
	 
 
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
            'employeelist'    =>  'required',
            'salary'     =>  'required',
			'commissiontype'  =>  'required',
			'comment',
			'patient',
			'transitiontype',
			'bill',
           
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

     DB::beginTransaction();      		
if ($request->commissiontype == 2  )
{
	
	$agenttransaction = new agenttransaction();
	
	$agenttransaction->agentdetail_id = $request->employeelist;
	$agenttransaction->patient_id = $request->patient;
		$agenttransaction->user_id = auth()->user()->id;
	
		$agenttransaction->receiveableamount = $request->bill;
		$agenttransaction->paidamount = $request->salary;
		$agenttransaction->transitiontype = $request->transitiontype;
		$agenttransaction->comment = $request->comment;
		$agenttransaction->created_at = $request->Date_of_Transition;
	$agenttransaction->save();
	
	

		
}		

 if ($request->commissiontype == 1  )
{
	
	
	
		$agenttransaction = new agenttransaction();
	
	$agenttransaction->agentdetail_id = $request->employeelist;
		$agenttransaction->patient_id = $request->patient;
		$agenttransaction->user_id = auth()->user()->id;
		$agenttransaction->paidamount = $request->salary;
		$agenttransaction->receiveableamount = $request->bill;
		$agenttransaction->paidorunpaid = 1;
		$agenttransaction->transitiontype = $request->transitiontype;
		$agenttransaction->comment = $request->comment;
		$agenttransaction->created_at = $request->Date_of_Transition;
	$agenttransaction->save();
	



		$user_name = User::findOrFail(auth()->user()->id)->name;
$agent_name = agentdetail::findOrFail($request->employeelist)->name;


$cashtransition = new cashtransition();

$cashtransition->agenttransaction_id = $agenttransaction->id;


$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->salary;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->salary;
$cashtransition->withdrwal = $request->salary;
$cashtransition->debit =  0 ;
$cashtransition->credit = 0  ;
$cashtransition->description = "Money Withdrawl for giving Commission to the Agent: " .$agent_name. ";  Agent Commission  Transitions ID : " .$agenttransaction->id.  " Data Entry By: " .$user_name ;
$cashtransition->company_type = 2; 


$cashtransition->transitionproducttype = 15; 
$cashtransition->save();













		
}  
 
   
   

   
      
		
		
		
 if ($request->commissiontype == 1  )		// nogode hole balance kmbe
 {		
			     /////////////update balance 	
   $balance = balance_of_business::first();  
   $present_balance = $balance->balance - $request->salary ;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
	



 }	
 
  if ($request->commissiontype == 2  )	// bakite hole hostipataler kache pawna barbe 	
 {
   $agent =  agentdetail::findOrFail($request->employeelist)->hospitaler_kache_pawna;
  $agentbalance =  $agent  + $request->salary ;
     agentdetail::findOrFail($request->employeelist)
  ->update(['hospitaler_kache_pawna' =>$agentbalance  ]);
  }
 
 
 
 
 
 
 
 
 
 
 
 
 
	  DB::commit();

        return response()->json(['success' => 'Data Added successfully.']);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\agenttransactionController  $agenttransactionController
     * @return \Illuminate\Http\Response
     */
    public function show(agenttransactionController $agenttransactionController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\agenttransactionController  $agenttransactionController
     * @return \Illuminate\Http\Response
     */
	 
	

public function paidsenddata($id)
{
	
	  $data = agenttransaction::with('agentdetail','patient')->findOrFail($id);
	  if($data->patient_id != null)
	  {
	$patientname = patient::findOrFail($data->patient_id)->name;
	  }
	  else{
		$patientname = "NA";  
		  
	  }
	 return response()->json(['data' => $data, 'patientname'=> $patientname ]);
	
}


	
	 public function paid (Request $request){
		    if ($request->ajax()) {
			   
	  $agenttransition = agenttransaction::findOrFail($request->hidden_id);
 	
		   agenttransaction::where('id', $request->hidden_id)
  ->update(['paidorunpaid' => 1,

'created_at' => $request->Date_of_Transition,
'paidamount' =>$request->salary,

  ]);
  
  
  
  

  
    $balance = balance_of_business::first();  
   $present_balance = $balance->balance - $request->salary   ;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]); 

  
  $agent =  agentdetail::findOrFail($agenttransition->agentdetail_id)->hospitaler_kache_pawna;
  $agentbalance =  $agent  - $agenttransition->paidamount    ;
     agentdetail::findOrFail($agenttransition->agentdetail_id)
  ->update(['hospitaler_kache_pawna' =>$agentbalance  ]); 
  
  
  

  
  
  return response()->json(['success' => 'Amount Paid']); 
		 
	 }
	 }
	


	
     public function edit($id)
    {
                       if(request()->ajax())
        {
			//$data=  medicine::with('medicine_category')->findOrFail($id);
            $data = agenttransaction::with('agentdetail')->findOrFail($id);
			
			$employeedetails = agentdetail::where('softdelete','0' )->orderBy('name')->get(); 

			
			
			
			 
            return response()->json(['data' => $data , 'employeedetails' => $employeedetails  ]);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\agenttransactionController  $agenttransactionController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
                  $rules = array(
            'employeelist'    =>  'required',
            'salary'     =>  'required',
           
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       		

        $form_data = array(
            'agentdetail_id'        =>  $request->employeelist,
            'paidamount'         =>  $request->salary,
	
 	 
        );
		
		

    
					    DB::beginTransaction();
   
       $data = agenttransaction::findOrFail($request->hidden_id);
		
			     /////////////update balance 	
   $balance = balance_of_business::first();  
   $present_balance = $balance->balance + $data->paidamount ;	    
  $present_balance = $present_balance - $request->salary ;
  balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
		
		
		
    agenttransaction::whereId($request->hidden_id)->update($form_data);
	
       
		 DB::commit();
	 
	  return response()->json(['success' => 'Data is successfully updated']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\agenttransactionController  $agenttransactionController
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
			    DB::beginTransaction();
   
       $data = agenttransaction::findOrFail($id);
	   
	   
  if ($data->paidorunpaid == 1 )  // taka deya hoye geche 
  {   	  
   $balance = balance_of_business::first();  
   $present_balance = $balance->balance + $data->paidamount ;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
		
	
	
	 cashtransition::where('agenttransaction_id', $id)->delete();
	
        $data->delete();
		
  }
  
 if ($data->paidorunpaid == 0 ) 
 {

   $agentdetail =  agentdetail::findOrFail($data->agentdetail_id)->hospitaler_kache_pawna;
  $agentdetailbalance =  $agentdetail  - $data->paidamount;
     agentdetail::findOrFail($data->agentdetail_id)
  ->update(['hospitaler_kache_pawna' =>$agentdetailbalance  ]);

 $data->delete();

 }	 
 	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
		
			     /////////////update balance 	

		 DB::commit();
    }
}
