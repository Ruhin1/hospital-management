<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\reporttransaction;  

use DataTables;
use Validator;
use APP\Models\Reagent;
use App\Models\doctor;
use App\Models\agentdetail;
use App\Models\patient;
use App\Models\reportlist;
use App\Models\reportorder;  
use App\Models\duetransition; 
use App\Models\pathologyorderfromotherinsitute; 
use App\Models\cabinelist; 

use App\Models\user;
use App\Models\order; 
use App\Models\doctorCommissionTransition;
use App\Models\cashtransition;
use App\Models\setting;
use App\Models\agenttransaction; 
use App\Models\balance_of_business;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Redirect;


use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

$status=0;
class reporttransactionController extends Controller
{
    /**
     * Display a listing of the resource. dailyreport
     *
     * @return \Illuminate\Http\Response
     */
/*	     public function index(Request $request)
    {
	
 $order=  reportorder::with('reporttransaction','patient','user')->latest()->paginate(3);
	
	
	return view('reporttransaction.transition',compact('order'))->with('i', (request()->input('page', 1) - 1) * 3);;
	
	
	}
	*/
	
	
	        public function index(Request $request)
    {
    
	 
	
 $order=  reportorder::with('reporttransaction','patient','user')->orderBy('id', 'DESC')->get();
	
	  
	        if ($request->ajax()) {
					

					$order=  reportorder::with('reporttransaction','patient','user')
					->orderBy('id', 'DESC')->get();
            
            return Datatables::of($order)
                   ->addIndexColumn()
				   

                    ->addColumn('action', function( reportorder $data){ 
   
   
   
                          $button = '<button type="button" name="delete" id="'.$data->id.'"     class="delete btn btn-danger btn-sm">Delete</button>';
                       
$button .= '&nbsp;&nbsp;';
					   $button .= '&nbsp;&nbsp;';

  // $button .= '<button type="button" name="refund" id="'.$data->id.'"     class="refund btn btn-warning //btn-sm">Refund</button>';
        

  $button .= '&nbsp;&nbsp;';
   $button .= '<button> <a type="button"  target="_blank"  class=" btn btn-success btn-sm"     href="'.route('reporttransaction.edittrans', $data->id).'">EDIT</a></button>';
       

					  return $button;
                    })

                      ->addColumn('patient_name', function (reportorder $order) {
                   


					if($order->patient->name)
						 return $order->patient->name;
					 else
						return "NA"; 
				 
                })
				
				      ->addColumn('patient_mobile', function (reportorder $order) {
                   if( $order->patient->mobile)
					   return $order->patient->mobile;
				   else
					   return "NA";
				  
                })
					

                 ->editColumn('created', function(reportorder $data) {
					
					 return date('d/m/y', strtotime($data->created_at) );
                    
                })
				
             ->editColumn('pdf', function ($order) {
                return '<a   target="_blank"      href="'.route('reporttransaction.pdf', $order->id).'">Print</a>';
            })
				

					
					
                    ->rawColumns(['action','pdf','created' ])
                    ->make(true);
        }
		

		return view('reporttransaction.transition', compact('order'));   
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
			     public function fetch()
    {
	
 $order=  reportorder::with('reporttransaction','patient','user')->latest()->paginate(3);
	
	  return response()->json(['order' => $order, ]);


	
	}
	
	
	
    public function  mlist()
    {
		
		
	
     
       $patientdata = patient::select('id','name','mobile','address','age','sex','cabineserial','dena','due','booking_status')->where('softdelete', 0)->orderBy('id')->get(); 
	  

	   
	   
	   
	   $medicinedata = reportlist ::where('softdelete', 0)->orderBy('name')->get(); 
       $doctor = doctor::select('id','name','commission_pecentage')->where('softdelete', 0)->orderBy('name')->get(); 
	    $agent = agentdetail::select('id','name','commission_pecentage')->where('softdelete', 0)->orderBy('name')->get(); 
            return response()->json(['patientdata' => $patientdata ,



			'agent'=> $agent, 'doctor' => $doctor, 'medicinedata' => $medicinedata]);
 
    }
	
	
	
	public function edittrans($id)
{
	
	
		$order= reportorder::with('reporttransaction','patient','user','doctor','agentdetail')->findOrFail($id);
		$data= patient::findOrFail($order->patient_id);
		$refdoctor_id = doctor::find($order->refdoctor_id);
		$reportlist = reportlist::where('softdelete',0)->orderBy('name')->get();
		
		return view('reporttransaction.editbill', compact('order','data','refdoctor_id','reportlist'));   
	
}


public function selecttest()
{
	
			$reportlist = reportlist::where('softdelete',0)->orderBy('name')->get();
		return view('reporttransaction.specifictest', compact('reportlist'));   
	
	
}





public function selecttestuser()
{
	
			$reportlist = user::orderBy('name')->get();
		return view('reporttransaction.selectuser', compact('reportlist'));   
	
	
}


public function selectagent()
{
	
			$reportlist = agentdetail::where('softdelete',0)->orderBy('name')->get();
		return view('reporttransaction.selectagent', compact('reportlist'));   
	
	
}








public function selectfagent(Request $request)
{


        $validator = Validator::make($request->all(), [
            'startdate' => 'required|date|size:10',
        'enddate' => 'date|size:10',
		'agent',
		'doctor'
        ]);
		
		
		
		if ($validator->fails()) {
            return redirect('picktwodate')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		$e= $request->input('enddate');
		
		        $start = date("Y-m-d",strtotime($request->input('startdate')));
        $end = date("Y-m-d",strtotime($request->input('enddate')));
      
		$datethatsentasenddatefromcust =  date("Y-m-d",strtotime($request->input('enddate')));
		



$transpatho = reportorder::with('reporttransaction','patient')->where('agentdetail_id', $request->agent)->where('doctor_id', $request->doctor)->whereBetween('created_at',[$start,$end])->get();


$agent = 	agentdetail::findOrFail($request->agent)->name;
$setting = setting::first();


	   $pdf = PDF::loadView('reporttransaction.dailybillagent', compact('transpatho','setting','agent', 'start','e', ),
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








public function selectfetchdoc(Request $request)
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
        $end = date("Y-m-d",strtotime($request->input('enddate')));
      
		$datethatsentasenddatefromcust =  date("Y-m-d",strtotime($request->input('enddate')));
		



$transpatho = reportorder::with('reporttransaction','patient')->where('refdoctor_id', $request->doctor)->whereBetween('created_at',[$start,$end])->get();


$doctor = doctor::findOrFail($request->doctor)->name;
$setting = setting::first();


	   $pdf = PDF::loadView('reporttransaction.dailybilldoctor', compact('transpatho','setting','doctor', 'start','e', ),
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
        $end = date("Y-m-d",strtotime($request->input('enddate')));
      
		$datethatsentasenddatefromcust =  date("Y-m-d",strtotime($request->input('enddate')));
		



$transpatho = reportorder::with('reporttransaction','patient','user')->where('user_id', $request->user)->whereBetween('created_at',[$start,$end])->get();



$refund = reportorder::with('reporttransaction','patient','user')->where('refundbyuser_id', $request->user)->whereBetween('refunddate',[$start,$end])->get();

$user = user::findOrFail($request->user)->name;

$setting = setting::first();

	   $pdf = PDF::loadView('reporttransaction.dailybilluser', compact('transpatho','setting','user', 'start','e','refund' ),
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


public function selectrefdoct()
{
	
			$reportlist = doctor::where('softdelete',0)->orderBy('name')->get();
		return view('reporttransaction.selectdoctor', compact('reportlist'));   
	
	
}







public function selectfetch(Request $request)
{
	
		



        $validator = Validator::make($request->all(), [
            'startdate' => 'required|date|size:10',
        'enddate' => 'date|size:10',
		'reportlist',
		
        ]);
		

		
		if ($validator->fails()) {
            return redirect('picktwodate')
                        ->withErrors($validator)
                        ->withInput();
        }
		
	
		
		        $start = date("Y-m-d",strtotime($request->input('startdate')));
        $end = date("Y-m-d",strtotime($request->input('enddate')));


        $e = date("Y-m-d",strtotime($request->input('enddate')));











                  $income_from_pathology_test = reporttransaction::with('reportlist')
                ->select(  
				\DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y') as month_day"),
				\DB::raw( 'SUM(adjust) as amount ,COUNT(id) as total_unit, SUM(totalvat) as vat , SUM(totaldiscount) as discount'  ))
			     
							 ->whereBetween('created_at',[$start,$end])    
                ->where('reportlist_id', $request->reportlist )
				->groupBy('month_day')
				->orderBy('created_at')
                
				         

			   ->get();	   
	
	



$reportlist = reportlist::findOrFail($request->reportlist)->name;





 $reporttransaction= reporttransaction::with('reportlist','patient')->where('reportlist_id', $request->reportlist  )->whereBetween('created_at',[$start,$end])->get(); 


 $setting = setting::first();





	   $pdf = PDF::loadView('reporttransaction.specifictestftech', compact('income_from_pathology_test','setting','reporttransaction','start','e','reportlist' ),
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









	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function printpdfforreportslip($id)
{
	$order= reportorder::with('doctor','agentdetail')->findOrFail($id);
	//$order= reportorder::with('doctor','agentdetail')->where('id', $id)->get();

	
		
	$refdoctor_id = doctor::where('id', $order->refdoctor_id)->first();
	
		

	$data= patient::findOrFail($order->patient_id);
	
	$setting = setting::first();
	
	
	   $pdf = PDF::loadView('reporttransaction.reportbill', compact('data','setting','order','refdoctor_id' ),
   [], [
 'mode'                     => '',
	'format'                   => 'A5',
	'default_font_size'        => '8',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
	'title' => 'Money_Receipt',
]
   
   
   );
	
	
	 return $pdf->stream('Money_Receipt.pdf');
	

	
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
		'name',
		'address',
		'mobile',
		'age',
		'sex',
		'commissiontype',
		'agent_id',
		'doctor_id',
		'deliverydate',
		'refdoctor_id',
		
        'medicine_name' ,
		'unit_price',
		
		'stock',

		'discount',
		'totaldiscount',
		'amount',
		'adjust',
		
	
	'vat',
	'vattk',
		'quantity',
		
		'paid',
		'due',
		
		'percentofdicountontaotal',
		'statusvalue',
		'dicountontaotal',
		'totalamount',
		'commision',
		'totalamountbeforediscount',
		'remark',
		'adjustwithadvancedeposit',
		
    ]);
		
			
			global $status;
	
		if ( ($request->statusvalue ==1 ) && ($request->dicountontaotal > 0))
		{
		$status = 1;	
		goto flag;	
		}	
		
		
		
		
		
		if(($request->all_admitted_patient =='') and ($request->customer_id == ''))
		{
		$patient = new patient() ; 
		$patient->name = $request->name;
		$patient->mobile = $request->mobile;
		$patient->age = $request->age;
		$patient->sex = $request->sex;
		$patient->address = $request->address;
		$patient->booking_status = 3;
		$patient->save();
		
		$patientid = $patient->id;
		}
		else 
		{
			if($request->all_admitted_patient =='')
			{
				$patientid = $request->customer_id;
			}
			if($request->customer_id =='')
			{
				$patientid = $request->all_admitted_patient;
			}
		
			
		}
				/////////////////////////////////////////////give commision to agent or doctor ///////////
		
		if ($request->commissiontype == 1 )
		{
			
		
			
			$doctorCommissionTransition = new doctorCommissionTransition() ;
			$doctorCommissionTransition->doctor_id = $request->doctor_id;
			$doctorCommissionTransition->user_id = Auth()->user()->id;
			
			
			$doctorCommissionTransition->collection = $request->totalamountbeforediscount;			
			$doctorCommissionTransition->discount = $request->dicountontaotal;						
			$doctorCommissionTransition->receiveablecollection = $request->totalamount;	
			
			$doctorCommissionTransition->amount = $request->commision;
			$doctorCommissionTransition->transitiontype = 1;
			if($request->commision > 0)
			{
			$doctorCommissionTransition->paidorunpaid = 1;
			}

			$doctorCommissionTransition->created_at =  $request->dataentry;
		    $doctorCommissionTransition->patient_id =  $patientid;
			$doctorCommissionTransition->created_at =	$request->dataentry;
			 $doctorCommissionTransition->save();
		
		/// update doctor balance 
		// $doctor = doctor::findOrFail($request->doctor_id);
		// $pawna = $doctor->hospitaler_kache_pawna + $request->commision;
		
        //     doctor::where('id', $request->doctor_id )
        //     ->update(['hospitaler_kache_pawna' => $pawna]);
		
		
		$doctorCommissionTransitionid = $doctorCommissionTransition->id;
		
		
		}
		
		if ($request->commissiontype == 2 )
		{
			
		
			
			
			$agenttransaction = new agenttransaction();
			$agenttransaction->agentdetail_id = $request->agent_id;
			$agenttransaction->user_id =  Auth()->user()->id;
			$agenttransaction->amount = $request->totalamountbeforediscount;			
			$agenttransaction->discount = $request->dicountontaotal;						
			$agenttransaction->receiveableamount	 = $request->totalamount;	
			
			$agenttransaction->transitiontype = 1;
			
			if($request->commision > 0)
			{
			$agenttransaction->paidorunpaid = 1;
			}
			$agenttransaction->paidamount =   $request->commision;
		   $agenttransaction->patient_id =  $patientid;
		   $agenttransaction->created_at =  $request->dataentry;
		   $agenttransaction->save();
		
		
		
		// 		/// update agent balance 
		// $agentdetail = agentdetail::findOrFail($request->agent_id);
		// $pawna = $agentdetail->hospitaler_kache_pawna + $request->commision;
		
        //     agentdetail::where('id', $request->agent_id )
        //     ->update(['hospitaler_kache_pawna' => $pawna]);
		
		 $agenttransactionid = $agenttransaction->id;
				
		}

		
		//////////////////////////////////////////////////// insert shuru ///////////////////////
		
	
		
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
		
		
	$order = new reportorder; 
	$order->user_id  = auth()->user()->id ;
	$order->patient_id  = $patientid;
	$order->due =	$request->due;
	$order->commission =	$request->commision;
	$order->discount =	$request->dicountontaotal;	
	$order->created_at =	$request->dataentry;	
	$order->remark =	$request->remark;
	$order->totalbeforediscount =	$request->totalamountbeforediscount;	
	$order->pay_by_adv =	$adjust_advance;		
	$order->refdoctor_id = $request->doctor_id; 
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




	$order->pay_in_cash  =	$request->paid;
	$order->doctor_id  =	$request->doctor_id;
	if($request->doctor_id)
	$order->doctor_commission_transition_id  =	$doctorCommissionTransitionid;
	$order->agentdetail_id  =	$request->agent_id;
	if($request->agent_id)
	$order->agenttransaction_id  =	$agenttransactionid;
	$order->deliverydate = $request->deliverydate;
	$order->total  = $request->totalamount;
	$order->save();
		
		if($request->due > 0)
	{
	$duetransition = new duetransition();
	$duetransition->patient_id = $patientid;
	$duetransition->user_id = auth()->user()->id ;
	$duetransition->totalamount = $request->due;
	$duetransition->amount = $request->due;
	$duetransition->transitiontype	= 2;
	$duetransition->transitionproducttype	= 4;	
    $duetransition->reportorder_id	= $order->id;	
   $duetransition->comment	= "Pathology Test";	
   $duetransition->created_at =	$request->dataentry;
	$duetransition->save();
		}	




        $order_id = $order->id;
        for ($product_id = 0; $product_id < count($request->medicine_name); $product_id++ ) 
    
        {   
// update reagent amount
			$test = reportlist::findOrFail($request->medicine_name[$product_id]);
			$relatedReagents = json_decode($test->related_reagents);
			if (!empty($relatedReagents)) {
			DB::table('reagents')
			->whereIn('id', $relatedReagents)
			->decrement('quantity', 1);
			}
// insert report transition
           $medicinetransition = new reporttransaction; 
           $medicinetransition->reportorder_id = $order_id;
           $medicinetransition->patient_id  = $patientid;
           $medicinetransition->reportlist_id = $request->medicine_name[$product_id]; // asole medicine_name[] er vetore id neya hoyeche. form bananor somoy name lekha hoyechecilo pore ar change kora hoy nai 
           $medicinetransition->unit = 1;
           $medicinetransition->created_at =    $request->dataentry; 
           $medicinetransition->vat = 0;
           $medicinetransition->doctor_id  = $request->doctor_id;
           $medicinetransition->totalvat = $request->vattk[$product_id];
           $medicinetransition->unitprice = $request->unit_price[$product_id]; 
           if ($request->percentofdicountontaotal > 0)
             {
                 $qun = 1; 
                 $discount = (($request->unit_price[$product_id] * $qun)* ($request->percentofdicountontaotal/100) ) ; 
                 $amount = ($request->unit_price[$product_id] * $qun) - $discount; 
                 $medicinetransition->discount = $request->percentofdicountontaotal;
                 $medicinetransition->totaldiscount  = $discount;
                 $medicinetransition->adjust = $amount;
                 $medicinetransition->amount = ($request->unit_price[$product_id] * $qun) ;
            }
             else {
             $medicinetransition->discount = $request->discount[$product_id];
             $medicinetransition->totaldiscount  = $request->totaldiscount[$product_id];
             $medicinetransition->amount = $request->amount[$product_id];
             $medicinetransition->adjust = $request->adjust[$product_id];
             }
              $medicinetransition->save(); 
        } 
		
	
$patient_name = patient::findOrFail($patientid)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $patientid;

$cashtransition->reportorder_id = $order_id;
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->totalamountbeforediscount;
$cashtransition->discount = $request->dicountontaotal;	
$cashtransition->amount_after_discount = $request->totalamountbeforediscount - $request->dicountontaotal;
$cashtransition->deposit = $request->paid;
$cashtransition->debit = 0;

$cashtransition->advance_deposit_minus = $adjust_advance;

$cashtransition->credit = $request->paid;
$cashtransition->description = "Pathology Bill from Patinet Name:" .$patient_name. " Patient ID: " .$patientid. " Pathology Order ID:" .$order_id ;
$cashtransition->company_type = 1;
$cashtransition->created_at =	$request->dataentry;
$cashtransition->customer_type = 1;
$cashtransition->transitionproducttype = 4; 
$cashtransition->customer_baki = $request->due + $adjust_advance;
$cashtransition->customer_joma =0;

$cashtransition->save();	
	

flag:

});	
 global $status;

if($status !=0 )
{
	Log::channel('pathologi')->info('Pathology bill is collected from the customer.', [
		'employee_details'=> Auth::user(),
		'Info'=>$request->all(),
]);
        return response()->json(['success' => 'You can not give commission to an Admitted patient']);

	}
 


   //return Redirect::back();
   Log::channel('pathologi')->info('Pathology bill is collected from the customer.', [
			'employee_details'=> Auth::user(),
			'Info'=>$request->all(),
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

					$data=  reportorder::with('reporttransaction','patient','user')->findOrFail($id);
            
			$reporttransaction = reporttransaction::with('reportlist','doctor')->where('reportorder_id', $id )->get();
			
			
            return response()->json(['data' => $data, 'reporttransaction' => $reporttransaction  ]);
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
	DB::transaction(function () use ($request) {
$reportorder = reportorder::findOrFail($request->orderid);


$patient = patient::findOrFail($reportorder->patient_id);


$patient_due = $patient->due;

$patient_dena = $patient->dena + $reportorder->pay_by_adv;

$patient_due = $patient_due - $reportorder->due ; 


patient::where('id', $reportorder->patient_id )
   ->update([
	   'due' => $patient_due,
	   'dena' => $patient_dena,
	]);
	
	
	
	
	$patient = patient::findOrFail($reportorder->patient_id);
if($request->adjustwithadvancedeposit == 1 )
{		
$patient_due = $patient->due;
	
	$remainging = $patient->dena - $request->due;
	
	
	
	
	if ( ($remainging > 0) or ($remainging == 0))
	{
		
		$adjust_advance = $request->due;
	$request->due =0;
	
	patient::where('id', $reportorder->patient_id )
   ->update([
	   'dena' => $remainging
	   
	]);	
		
	}
	if ($remainging < 0)
	{
	
		$adjust_advance = $patient->dena;
		$request->due =  -1 * $remainging ;
			patient::where('id', $reportorder->patient_id )
   ->update([
	   'dena' => 0
	   
	]);		
		
		
		
	}	
}
else{
$adjust_advance =0;

}	
	
$due = $request->due;		
$patient_due = $patient_due + $due; 


patient::where('id', $reportorder->patient_id )
   ->update([
	   'due' => $patient_due
	   
	]);


patient::where('id', $reportorder->patient_id )
   ->update([
	   'name' => $request->name,
	   'address' => $request->address,
	   'mobile' => $request->mobile,
	   'age' => $request->age,
	   'sex' => $request->sex,
	   
	]);

	cabinelist::where('patient_id', $reportorder->patient_id)->update(['patientname' => $request->name]);


$report_order = reportorder::findOrFail($request->orderid);

if($request->deliverydate ==''){
	
$request->deliverydate = $report_order->deliverydate; 	
}

if($request->dataentry ==''){
	
$request->dataentry = $report_order->created_at; 	
}


reportorder::where('id', $request->orderid )
   ->update([
	   'due' => ( $request->totalamountbeforediscount - $request->dicountontaotal - $request->paid - $adjust_advance),
	   'pay_in_cash' => $request->paid,
	   'totalbeforediscount' => $request->totalamountbeforediscount,
	   'total' => $request->totalamount,
	   'discount' => $request->dicountontaotal,
	   'pay_by_adv'=> $adjust_advance,
	   'remark' => $request->remark,
	   'user_id' => Auth()->user()->id,
	   'deliverydate' =>$request->deliverydate,
	   'created_at' => $request->dataentry,
	]);

$duetrans = duetransition::where('reportorder_id', $request->orderid )->first();
if($duetrans)
{
duetransition::where('reportorder_id', $request->orderid )
   ->update([
   
   
	   'totalamount' =>  ( $request->totalamountbeforediscount - $request->dicountontaotal - $request->paid - $adjust_advance),
	   'amount' => ( $request->totalamountbeforediscount - $request->dicountontaotal - $request->paid - $adjust_advance),
	   'created_at' => $request->dataentry,

	]);
} else {

$duetransition = new duetransition();
$duetransition->patient_id = $reportorder->patient_id;
$duetransition->user_id = auth()->user()->id ;
$duetransition->totalamount = ( $request->totalamountbeforediscount - $request->dicountontaotal - $request->paid - $adjust_advance);
$duetransition->amount = ( $request->totalamountbeforediscount - $request->dicountontaotal - $request->paid - $adjust_advance);
$duetransition->transitiontype	= 2;
$duetransition->transitionproducttype	= 4;	
$duetransition->reportorder_id	= $request->orderid;	
$duetransition->comment	= "Pathology Test from Patient ID: " .$reportorder->patient_id.  " Pathology Order ID: " .$request->orderid   ;	
$duetransition->created_at =	$request->dataentry;
$duetransition->save();

}

cashtransition::where('reportorder_id', $request->orderid )
   ->update([
   
   
	   'gorssamount' =>  $request->totalamountbeforediscount,
	   'amount_after_discount' => $request->totalamountbeforediscount - $request->dicountontaotal ,
	   'discount' => $request->dicountontaotal,
	   'deposit' =>  $request->paid,
	   'debit' => 0,
	   'credit'=>$request->paid,
	   'advance_deposit_minus' => $adjust_advance,
	   'created_at' => $request->dataentry,
	   'customer_baki' => (( $request->totalamountbeforediscount - $request->dicountontaotal - $request->paid - $adjust_advance) + $adjust_advance) ,

	]);



$reporttransaction = reporttransaction::where('reportorder_id',$request->orderid  )->get();

foreach($reporttransaction as $r)
{
$test = reportlist::findOrFail($r->reportlist_id);
$relatedReagents = json_decode($test->related_reagents);
if (!empty($relatedReagents)) {
DB::table('reagents')
->whereIn('id', $relatedReagents)
->increment('quantity', 1);
}
}


reporttransaction::where('reportorder_id',$request->orderid  )->delete();

for ($product_id = 0; $product_id < count($request->medicine_name); $product_id++ ) 

{

	   
	if ($request->medicine_name[$product_id] != null )
	{
	
		$test = reportlist::findOrFail($request->medicine_name[$product_id]);
		
		$relatedReagents = json_decode($test->related_reagents);
		if (!empty($relatedReagents)) {
		DB::table('reagents')
		->whereIn('id', $relatedReagents)
		->decrement('quantity', 1);
		}







   $medicinetransition = new reporttransaction; 
   $medicinetransition->reportorder_id = $request->orderid;
   $medicinetransition->patient_id  = $reportorder->patient_id;
   $medicinetransition->reportlist_id = $request->medicine_name[$product_id]; // asole medicine_name[] er vetore id neya hoyeche. form bananor somoy name lekha hoyechecilo pore ar change kora hoy nai 
	 $medicinetransition->unit = 1;
	$medicinetransition->unitprice = $request->unit_price[$product_id]; 
	 
	 
	   $medicinetransition->vat = 0;
	   $medicinetransition->doctor_id  = $reportorder->doctor_id;
	   
	 $medicinetransition->totalvat = 0;
	 
	  $medicinetransition->created_at = $request->dataentry;
	  
	   
	   
	   
	 if ($request->percentofdicountontaotal > 0)
	 {
		 $qun = 1; 
		 $discount = (($request->unit_price[$product_id] * $qun)* ($request->percentofdicountontaotal/100) ) ; 
		
	
		 $amount = ($request->unit_price[$product_id] * $qun) - $discount; 
		 
		 $medicinetransition->discount = $request->percentofdicountontaotal;
		 $medicinetransition->totaldiscount	 = $discount;
		 $medicinetransition->adjust = $amount;
		 $medicinetransition->amount = ($request->unit_price[$product_id] * $qun) ;
	}
	 else {
	 $medicinetransition->discount = $request->discount[$product_id];
	 $medicinetransition->totaldiscount	 = $request->totaldiscount[$product_id];
	 $medicinetransition->amount = $request->amount[$product_id];
	  $medicinetransition->adjust = $request->adjust[$product_id];
	   
	 }
	  $medicinetransition->save(); 
	
	}
	

}		
	
});	

Log::channel('pathologi')->info('Pathology Bill  Updated',
[
    'massage'=> 'Pathology Bill  Updated',
    'employee_details'=> Auth::user(),
	'Info'=> $request->all(),
]);


return redirect()->route('reporttransaction.index');








}











    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
	 
public function dailyreport(Request $request)
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
        $end = date("Y-m-d",strtotime($request->input('enddate')));
      
		$datethatsentasenddatefromcust =  date("Y-m-d",strtotime($request->input('enddate')));
		



$transpatho = reportorder::with('reporttransaction','patient','user')->whereBetween('created_at',[$start,$end])->get();



$refund = reportorder::with('reporttransaction','patient','user')->whereBetween('refunddate',[$start,$end])->get();



	 $refundamount  = reportorder::whereBetween('refunddate',[$start,$end])->sum('refundamount');



$totalgrossamount = reportorder::whereBetween('created_at',[$start,$end])->sum('totalbeforediscount');


$totaldiscount  = reportorder::whereBetween('created_at',[$start,$end])->sum('discount');

$totaldue  = reportorder::whereBetween('created_at',[$start,$end])->sum('due');

$totalpaid  = reportorder::whereBetween('created_at',[$start,$end])->sum('pay_in_cash');


$totalreceiveableamount  = reportorder::whereBetween('created_at',[$start,$end])->sum('total');







                  $test_by_agent  = reportorder::select( 'agentdetail_id', \DB::raw( 'SUM(totalbeforediscount) as amount, SUM(discount) as discount,COUNT(id) as total_unit'  ))
			     
							 ->whereBetween('created_at',[$start,$end])    
             ->where('agentdetail_id', '!=', null )
				->groupBy('agentdetail_id')
                
					
                               

			   ->get();




                  $test_by_doctor  = reportorder::select( 'doctor_id', \DB::raw( 'SUM(totalbeforediscount) as amount, SUM(discount) as discount,COUNT(id) as total_unit'  ))
			     
							 ->whereBetween('created_at',[$start,$end])    
             ->where('doctor_id', '!=', null )
				->groupBy('doctor_id')
                
					
                               

			   ->get();



                  $test_by_user  = reportorder::select( 'user_id', \DB::raw( 'SUM(totalbeforediscount) as amount, SUM(discount) as discount,   SUM(pay_in_cash) as paid, SUM(pay_by_adv) as adjust,SUM(due) as due,         COUNT(id) as total_unit'  ))
			     
							 ->whereBetween('created_at',[$start,$end])    
             ->where('user_id', '!=', null )
				->groupBy('user_id')
			   ->get();




                  $income_from_pathology_test = reporttransaction::with('reportlist')
                ->select( 'reportlist_id', \DB::raw( 'SUM(adjust) as amount ,COUNT(id) as total_unit, SUM(totalvat) as vat , SUM(totaldiscount) as discount'  ))
			     
							 ->whereBetween('created_at',[$start,$end])    
             
				->groupBy('reportlist_id')
                
					->orderBy(reportlist::select('name')->whereColumn('reportlists.id','reporttransactions.reportlist_id' ))
                               

			   ->get();








				                 $income_from_due_payment_pathology = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 4) 
			 ->whereBetween('created_at',[$start,$end])    
                
				->groupBy('patient_id')
                
                ->get();


$money_back_customer_pathology  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 4) 
			 ->whereBetween('created_at',[$start,$end])    
                
				->groupBy('patient_id')
                
                ->get();


$pathologyTestfromother = pathologyorderfromotherinsitute::with('pathologytransitionfromotherinstitue','patient','user')->whereBetween('created_at',[$start,$end])->get();

$setting = setting::first();

$reagents = DB::table('reagents')
               ->where('softdelete', 0)
               ->orderBy('name')
               ->get();

			   $startdate = date('d-m-y', strtotime($request->input('startdate')));
			   $enddate = date('d-m-y', strtotime($request->input('enddate')));

	   $pdf = PDF::loadView('reporttransaction.dailybill', compact('transpatho','reagents','setting','income_from_pathology_test','totaldue','totalpaid','totaldiscount','totalreceiveableamount', 'totalgrossamount', 'start','e','refund','refundamount','income_from_due_payment_pathology','money_back_customer_pathology','pathologyTestfromother','test_by_agent','test_by_doctor','test_by_user', ),
   [], [
 'mode'                     => '',
	'format'                   => 'A4',
	'default_font_size'        => '8',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
	'title' => "Pathology Income Statement - $startdate to $enddate",
]
   
   
   );


   
   $name = "pathology_$startdate-to-$enddate.pdf";
   return $pdf->stream($name);




}	
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 public function refund(Request $request)
	 {
		 
		 
		 
							    $validated = $request->validate([
'refundtype',
'refundamount',
'hidden_idrefund',
		
    ]);	 
		 
	 
		 
		 if ($request->refundtype == 1)
		 {
			
			 
			 $data=  reportorder::with('reporttransaction')->findOrFail($request->hidden_idrefund);
			 
			 $booking_status = patient::findOrFail($data->patient_id)->booking_status;
			 
			 if ($booking_status == 1)
			 {
			return response()->json(['success' => 'Sorry! You can not refund to an Admitted Patient']);	 
				 
			 }
			 
		 ///////////update business balance /////////////////////////////
   $balance = balance_of_business::first();  
   $present_balance = $balance->balance - $request->refundamount ;	

   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
  
  
           
  	

   reportorder::where('id', $request->hidden_idrefund )
  ->update([

'refund' => 1,
'refundbyuser_id' => Auth()->user()->id,
'refundamount' => $data->refundamount +   $request->refundamount,
'refunddate' => Carbon::today(),


  ]); 
  
  
  
  
  
  	  $duetransition = new duetransition();
		$duetransition->patient_id	= $data->patient_id;
		$duetransition->user_id	= Auth()->User()->id;
		$duetransition->amount	= $request->refundamount;
		$duetransition->totalamount	= $request->refundamount;
		
		$duetransition->comment	= "Refund for Pathology Order No:" .$data->id ;
		$duetransition->transitiontype	= 3;
		$duetransition->transitionproducttype	= 4;
	
		
		$duetransition->save();
  
  
   
  
  
  
  
  
  
  
  
  
  
		 
	 }
	 

		 if ($request->refundtype == 2)
		 {
		 ///////////update business balance /////////////////////////////
          $data=  reportorder::with('reporttransaction')->findOrFail($request->hidden_idrefund);
  	

   reportorder::where('id', $request->hidden_idrefund )
  ->update(['discount' =>  ( $data->discount + $request->refundamount ) ,

'specialconsession' => 1,
'specialconsessionbyuser' => Auth()->user()->id,
'specialconsessionamount' =>  $data->specialconsessionamount +  $request->refundamount,
'specialconsessiondate' => Carbon::today(),
'due' => ( $data->due - $request->refundamount ) ,
'total' => ( $data->total - $request->refundamount ) ,

  ]);
	



/////////// update patient due 
$patient_due = patient::where('id', $data->patient_id )->pluck('due')->first();

$patient_due = $patient_due - $request->refundamount; 


patient::where('id',  $data->patient_id )
       ->update([
           'due' => $patient_due
        ]);

/////////// end update patient due 

$currentamountdue = duetransition::where('reportorder_id',  $data->id )->first();


duetransition::where('reportorder_id',  $data->id )
       ->update([
           'amount' => ( $currentamountdue->amount - $request->refundamount )
        ]);
	
	
	
	
	
	 }


return response()->json(['success' => 'Data Updated Successfully.']);
 
	 }
	 
	 
    public function destroy($id)
    {
        $data=  reportorder::with('reporttransaction')->findOrFail($id);
	
	//	$reporttransaction = reporttransaction::where('reportorder_id',$request->orderid  )->get();
// update reagent
		foreach($data->reporttransaction as $r)
		{
		$test = reportlist::findOrFail($r->reportlist_id);
		$relatedReagents = json_decode($test->related_reagents);
		if (!empty($relatedReagents)) {
		DB::table('reagents')
		->whereIn('id', $relatedReagents)
		->increment('quantity', 1);
		}
		}

///////////update business balance /////////////////////////////
   $balance = balance_of_business::first(); 

if ($data->refund == 1)
{  
   $present_balance = $balance->balance - ($data->pay_in_cash- $data->refundamount ) ;	
}
else
{
	$present_balance = $balance->balance - $data->pay_in_cash  ;	
}
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
///////////// end update //////////////////////////////
		
		
/////////// update patient due 

$patient = patient::findOrFail($data->patient_id) ;





$patient_due = $patient->due;


$patient_due = $patient_due - $data->due; 
$patient_dena = $patient->dena + $data->pay_by_adv; 

patient::where('id',  $data->patient_id )
       ->update([
           'due' => $patient_due,
		   'dena'=> $patient_dena,
        ]);

/////////// end update patient due 	

				
				
				/// update agent balance 
				if($data->agentdetail_id)
				{
		$agentdetail = agentdetail::findOrFail($data->agentdetail_id);
		$a = agenttransaction::where('id',$data->agenttransaction_id)->first();
		
		
		if($a)
		{
			
			if ($a->paidorunpaid == 0)
			{
			
					$pawna = $agentdetail->hospitaler_kache_pawna - $data->commission;
	
            agentdetail::where('id', $data->agentdetail_id )
            ->update(['hospitaler_kache_pawna' => $pawna]);
			
			}
			$a->delete();
		




		
		}
		

				}
				
				
								/// update dalal doctor  balance 
				if($data->doctor_id)
				{
		$doctor = doctor::findOrFail($data->doctor_id);
	$d= doctorCommissionTransition::where('id',$data->doctor_commission_transition_id)->first();
	 
	 if($d)
	 {
		 
		 
		 if ($d->paidorunpaid == 0 )
		 {
		 		$pawna = $doctor->hospitaler_kache_pawna - $data->commission;
	
            doctor::where('id', $data->doctor_id )
            ->update(['hospitaler_kache_pawna' => $pawna]);
		 }
		 
		$d->delete(); 
		 
	 }
	 

				}

		
		
				 $duetrans = duetransition::where('reportorder_id', $data->id )->first();
		if($duetrans)
		{
		$duetrans->delete();
		}
		
		
		cashtransition::where('reportorder_id', $data->id )->delete();
		
		Log::channel('pathologi')->info('Pathology Bill  Delated',
			[
				'massage'=> 'Pathology Bill  Delated',
				'employee_details'=> Auth::user(),
				'Info'=> $data,
			]);
		
		$data->delete();
		
    }
}
