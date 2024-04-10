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
use Illuminate\Support\Facades\DB; 
use App\Models\reportorder; 
use App\Models\setting; 
use App\Models\finalreport; 
use DataTables;
use Validator;   
use PDF;
use App\Models\balance_of_business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class advancedeposit extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */





	        public function index(Request $request)
    {
    
	 
	
 $duetransition=  duetransition::with('patient','user')->where('transitiontype',5)->where('amount', '>', 0 )->latest()->get();
	
	  
	        if ($request->ajax()) {
					

 $duetransition=  duetransition::with('patient','user')->where('transitiontype',5)->where('amount', '>', 0 )->latest()->get();
	
            
            return Datatables::of($duetransition)
                   ->addIndexColumn()
				   

                    ->addColumn('action', function( duetransition $data){ 
   
   
   
                          $button = '<button type="button" name="delete" id="'.$data->id.'"     class="delete btn btn-danger btn-sm">Delete</button>';
                       
$button .= '&nbsp;&nbsp;';

 

					  return $button;
                    })

                      ->addColumn('patient_name', function (duetransition $order) {
                   


					if($order->patient->name)
						 return $order->patient->name;
					 else
						return "NA"; 
				 
                })
				
				
			                      ->addColumn('patient_id', function (duetransition $order) {
                   


					if($order->patient->id)
						 return $order->patient->id;
					 else
						return "NA"; 
				 
                })	
				
				
				
				
				
				
				
				      ->addColumn('patient_mobile', function (duetransition $order) {
                   if( $order->patient->mobile)
					   return $order->patient->mobile;
				   else
					   return "NA";
				  
                })
					

                 ->editColumn('created', function(duetransition $data) {
					
					 return date('d/m/y', strtotime($data->created_at) );
                    
                })
				
             ->editColumn('pdf', function ($duetransition) {
                return '<a   target="_blank"      href="'.route('advancedeposit.pdfprint', $duetransition->id).'">Print</a>';
            })
				

					
					
                    ->rawColumns(['action','pdf','created' ])
                    ->make(true);
        }
		

		return view('patient.advancedeposit', compact('duetransition'));   
	
	}


    public function dropdown_list()
    {
$patient = patient::where('booking_status',1 )->get();

return response()->json(['patientdata'=>  $patient]);
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
		
	        $validator = Validator::make($request->all(), [

		'customer_id',
		'depositjoma'
        ]);
		
		
		
		if ($validator->fails()) {
            return redirect('picktwodate')
                        ->withErrors($validator)
                        ->withInput();
        }	
		
		
		
		
		$patient = patient::findOrfail($request->customer_id);
		
		
		
	$duetransition = new duetransition();
$duetransition->patient_id = $request->customer_id;
	
$duetransition->user_id = Auth()->user()->id;
$duetransition->totalamount = $request->depositjoma;
$duetransition->amount = $request->depositjoma;
$duetransition->transitiontype = 5;
$duetransition->created_at = $request->dataentry;
$duetransition->comment = "Advance Deposit by the Patient" .$patient->name;
$duetransition->save(); 
		
		
		
		
		
	$updated_dena = $patient->dena + $request->depositjoma	;
		
   patient::where('id', $request->customer_id)
  ->update(['dena' =>$updated_dena  ]);
		
		
		
		
	

$patient_name = patient::findOrFail($request->customer_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->customer_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->depositjoma ;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->depositjoma ;
$cashtransition->deposit = $request->depositjoma;
$cashtransition->debit =  0;
$cashtransition->credit = $request->depositjoma;
$cashtransition->description = "Deposit by Patinet Name: " .$patient_name. " Patient ID: " .$request->customer_id. " Deposit & Due Transition ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 1;
$cashtransition->customer_baki = 0;
$cashtransition->customer_joma =$request->depositjoma;

$cashtransition->customer_type = 2;
$cashtransition->transitionproducttype = 10; 
$cashtransition->created_at = $request->dataentry;
$cashtransition->save();













	});	
		
		
		
		
		
	Log::channel('patientadvancecollection')->info('Advance acceptance from the patient',
[
    'massage'=> 'Advance acceptance from the patient',
    'employee_details'=> Auth::user(),
	'Info'=> $request->all(),
]);	
	return response()->json(['success' => 'Data Added successfully.']);	
	
    }






	public function pdfprint($id)
{
	$duetransition = duetransition::findOrFail($id);
$setting = setting::first();
//dd($duetransition);
	$patient= patient::with('cabinelist')->findOrFail($duetransition->patient_id);

	   $pdf = PDF::loadView('patient.advancedepositslip', compact('patient','duetransition','setting' ),
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
        $data=  duetransition::findOrFail($id);
	
///////////update business balance /////////////////////////////
   $balance = balance_of_business::first(); 
$present_balance = $balance->balance -  $data->amount;
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
///////////// end update //////////////////////////////
		
		
/////////// update patient due 

$patient = patient::findOrFail($data->patient_id) ;


$cashtransition = cashtransition::where('duetransition_id', $id)->get();

if ($cashtransition)
{
	
$cashtransition->each->delete();	
	
}

$patient_dena = $patient->dena - $data->amount; 

patient::where('id',  $data->patient_id )
       ->update([
  
		   'dena'=> $patient_dena,
        ]);

        Log::channel('patientadvancecollection')->info('Advance intake information from the patient has been deleted.',
        [
            'massage'=> 'Advance intake information from the patient has been deleted.',
            'employee_details'=> Auth::user(),
            'Info'=> $data,
        ]);	
		$data->delete();
    }
}
