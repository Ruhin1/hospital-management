<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Validator;
use  App\Models\servicetransition; 
use  App\Models\patientfinalhisab; 
use  App\Models\serviceorder; 
use  App\Models\duetransition;
use  App\Models\balance_of_business;
use  App\Models\agenttransaction;
use  App\Models\doctorCommissionTransition;  
use  App\Models\agentdetail;
use  App\Models\cabinelist;
use App\Models\User;
use  App\Models\servicelistinhospital;
use DateTime;
use Carbon\Carbon;
use App\Models\cabinetransaction;

use App\Models\cashtransition;

use App\Models\cabinefeetransition;
use  App\Models\doctor;
use  App\Models\patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;


use PDF;

class servicetranstionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	        public function index(Request $request)
    {
    
	 
	
 $order=  serviceorder::with('servicetransition','patient','user')->orderBy('id','DESC')->get();
	
	  
	        if ($request->ajax()) {
					

					 $order=  serviceorder::with('servicetransition','patient','user')->orderBy('id','DESC')->get();
            
            return Datatables::of($order)
                   ->addIndexColumn()
				   

                    ->addColumn('action', function( serviceorder $data){ 
   
   
   
                          $button = '<button type="button" name="delete" id="'.$data->id.'"     class="delete btn btn-danger btn-sm">Delete</button>';
                       
$button .= '&nbsp;&nbsp;';
					   $button .= '&nbsp;&nbsp;';

  // $button .= '<button type="button" name="refund" id="'.$data->id.'"     class="refund btn btn-warning btn-sm">Refund</button>';
        

 // $button .= '&nbsp;&nbsp;';
 //  $button .= '<button> <a type="button"  target="_blank"  class=" btn btn-success btn-sm"     href="'.route('reporttransaction.edittrans', $data->id).'">EDIT</a></button>';
       

					  return $button;
                    })

                      ->addColumn('patient_name', function (serviceorder $order) {
                   


					if($order->patient->name)
						 return $order->patient->name;
					 else
						return "NA"; 
				 
                })
				
				      ->addColumn('patient_mobile', function (serviceorder $order) {
                   if( $order->patient->mobile)
					   return $order->patient->mobile;
				   else
					   return "NA";
				  
                })
					

                 ->editColumn('created', function(serviceorder $data) {
					
					 return date('d/m/y', strtotime($data->created_at) );
                    
                })
				
             ->editColumn('pdf', function ($order) {
                return '<a   target="_blank"      href="'.route('servicetranstion.pdf', $order->id).'">Print</a>';
            })
				

					
					
                    ->rawColumns(['action','pdf','created' ])
                    ->make(true);
        }
		

		return view('servicetransition.transition', compact('order'));   
	
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
	
	
	
	

	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 


	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
			     public function fetch()
    {
	
 $order=  reportorder::with('reporttransaction','patient','user')->latest()->paginate(3);
	
	  return response()->json(['order' => $order, ]);


	
	}
	
	
	
    public function  mlist()
    {
		
		
	
     
       $patientdata = patient::where('softdelete', 0)->orderBy('id')->get(); 
	   
	   

	   
	   
	   
	   $medicinedata = servicelistinhospital::where('softdelete', 0)->orderBy('servicename')->get(); 
       $doctor = doctor::where('softdelete', 0)->orderBy('name')->get(); 
	    $agent = agentdetail::where('softdelete', 0)->orderBy('name')->get(); 
            return response()->json(['patientdata' => $patientdata ,



			'agent'=> $agent, 'doctor' => $doctor, 'medicinedata' => $medicinedata]);
 
    }
	
	
	
	public function edittrans($id)
{
	
	
		$order= reportorder::with('reporttransaction','patient','user','doctor','agentdetail')->findOrFail($id);
		$data= patient::findOrFail($order->patient_id);
		$refdoctor_id = doctor::findOrFail($order->refdoctor_id);
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
        $end = date("Y-m-d",strtotime($request->input('enddate')."+1 day"));
      
		$datethatsentasenddatefromcust =  date("Y-m-d",strtotime($request->input('enddate')));
		



$transpatho = reportorder::with('reporttransaction','patient')->where('agentdetail_id', $request->agent)->where('doctor_id', $request->doctor)->whereBetween('created_at',[$start,$end])->get();


$agent = 	agentdetail::findOrFail($request->agent)->name;



	   $pdf = PDF::loadView('reporttransaction.dailybillagent', compact('transpatho','agent', 'start','e', ),
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
        $end = date("Y-m-d",strtotime($request->input('enddate')."+1 day"));
      
		$datethatsentasenddatefromcust =  date("Y-m-d",strtotime($request->input('enddate')));
		



$transpatho = reportorder::with('reporttransaction','patient')->where('refdoctor_id', $request->doctor)->whereBetween('created_at',[$start,$end])->get();


$doctor = doctor::findOrFail($request->doctor)->name;



	   $pdf = PDF::loadView('reporttransaction.dailybilldoctor', compact('transpatho','doctor', 'start','e', ),
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
        $end = date("Y-m-d",strtotime($request->input('enddate')."+1 day"));
      
		$datethatsentasenddatefromcust =  date("Y-m-d",strtotime($request->input('enddate')));
		



$transpatho = reportorder::with('reporttransaction','patient','user')->where('user_id', $request->user)->whereBetween('created_at',[$start,$end])->get();



$refund = reportorder::with('reporttransaction','patient','user')->where('refundbyuser_id', $request->user)->whereBetween('refunddate',[$start,$end])->get();

$user = user::findOrFail($request->user)->name;



	   $pdf = PDF::loadView('reporttransaction.dailybilluser', compact('transpatho','user', 'start','e','refund' ),
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
        $end = date("Y-m-d",strtotime($request->input('enddate')."+1 day"));


        $e = date("Y-m-d",strtotime($request->input('enddate')));











                  $income_from_pathology_test = reporttransaction::with('reportlist')
                ->select(  
				\DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y') as month_day"),
				\DB::raw( 'SUM(adjust) as amount ,COUNT(id) as total_unit, SUM(totalvat) as vat , SUM(totaldiscount) as discount'  ))
			     
							 ->whereBetween('created_at',[$start,$end])    
                ->where('reportlist_id', $request->reportlist )
				->groupBy('month_day')
                
				         

			   ->get();	   
	
	



$reportlist = reportlist::findOrFail($request->reportlist)->name;





 $reporttransaction= reporttransaction::with('reportlist','patient')->where('reportlist_id', $request->reportlist  )->whereBetween('created_at',[$start,$end])->get(); 








	   $pdf = PDF::loadView('reporttransaction.specifictestftech', compact('income_from_pathology_test','reporttransaction','start','e','reportlist' ),
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
	$order= serviceorder::with('doctor','agentdetail')->findOrFail($id);
	//$order= reportorder::with('doctor','agentdetail')->where('id', $id)->get();

	
		
	$refdoctor_id = doctor::findOrFail($order->refdoctor_id);
	
		

	$data= patient::findOrFail($order->patient_id);
	
	
	
	
	   $pdf = PDF::loadView('servicetransition.reportbill', compact('data','order','refdoctor_id' ),
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
	
		//$pdf = PDF::loadView('reporttransaction.reportbill', compact('data','order' ))->setPaper('a4', 'landscape')->setWarnings(false)->save('invoice.pdf');
   // return $pdf->stream('invoice.pdf');
	
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
        $end = date("Y-m-d",strtotime($request->input('enddate')."+1 day"));
      
		$datethatsentasenddatefromcust =  date("Y-m-d",strtotime($request->input('enddate')));
		



$transpatho = reportorder::with('reporttransaction','patient','user')->whereBetween('created_at',[$start,$end])->get();



$refund = reportorder::with('reporttransaction','patient','user')->whereBetween('refunddate',[$start,$end])->get();



	 $refundamount  = reportorder::whereBetween('refunddate',[$start,$end])->sum('refundamount');



$totalgrossamount = reportorder::whereBetween('created_at',[$start,$end])->sum('totalbeforediscount');


$totaldiscount  = reportorder::whereBetween('created_at',[$start,$end])->sum('discount');

$totaldue  = reportorder::whereBetween('created_at',[$start,$end])->sum('due');

$totalpaid  = reportorder::whereBetween('created_at',[$start,$end])->sum('pay_in_cash');


$totalreceiveableamount  = reportorder::whereBetween('created_at',[$start,$end])->sum('total');





                  $income_from_pathology_test = reporttransaction::with('reportlist')
                ->select( 'reportlist_id', \DB::raw( 'SUM(adjust) as amount ,COUNT(id) as total_unit, SUM(totalvat) as vat , SUM(totaldiscount) as discount'  ))
			     
							 ->whereBetween('created_at',[$start,$end])    
             
				->groupBy('reportlist_id')
                
					->orderBy(reportlist::select('name')->whereColumn('reportlists.id','reporttransactions.reportlist_id' ))
                               

			   ->get();















	   $pdf = PDF::loadView('reporttransaction.dailybill', compact('transpatho','income_from_pathology_test','totaldue','totalpaid','totaldiscount','totalreceiveableamount', 'totalgrossamount', 'start','e','refund','refundamount' ),
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
	 
	 
	 public function storeinsert(Request $request)
	 {
		 

				
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
		'created_at',
    ]); 
		 
			if ($request->customer_id == '')
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
		$patientid = $request->customer_id;
			
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
		    $doctorCommissionTransition->patient_id =  $patientid;
			$doctorCommissionTransition->created_at  = $request->deliverydate ;
			 $doctorCommissionTransition->save();
		
		/// update doctor balance 
		$doctor = doctor::findOrFail($request->doctor_id);
		$pawna = $doctor->hospitaler_kache_pawna + $request->commision;
		
            doctor::where('id', $request->doctor_id )
            ->update(['hospitaler_kache_pawna' => $pawna]);
		
		
		
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
			
			
			$agenttransaction->paidamount =   $request->commision;
		   $agenttransaction->patient_id =  $patientid;
		   $agenttransaction->created_at  = $request->deliverydate ;
		   $agenttransaction->save();
		
		
		
				/// update agent balance 
		$agentdetail = agentdetail::findOrFail($request->agent_id);
		$pawna = $agentdetail->hospitaler_kache_pawna + $request->commision;
		
            agentdetail::where('id', $request->agent_id )
            ->update(['hospitaler_kache_pawna' => $pawna]);
		
		
		
		
		
		
		
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
			
			
			
}	 }
else{
	
$adjust_advance =0;	
	
}
		 
		$order = new serviceorder; 
		$order->user_id  = auth()->user()->id ;
	$order->patient_id  = $patientid;
	$order->due =	$request->due;
	$order->commission =	$request->commision;
	$order->discount =	$request->dicountontaotal;	
	$order->created_at  = $request->deliverydate ;
	$order->remark =	$request->remark;
	$order->total =	$request->totalamountbeforediscount;	// groos amount
	$order->due_adjust_from_advance =	$adjust_advance;		
	$order->refdoctor_id = $request->refdoctor_id; 
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


	$order->paid  =	$request->paid;
	$order->doctor_id  =	$request->doctor_id;
	if($request->doctor_id)
	$order->doctor_commission_transition_id  =	$doctorCommissionTransition->id;
	$order->agentdetail_id  =	$request->agent_id;
	if($request->agent_id)
	$order->agenttransaction_id  =	$agenttransaction->id;

	$order->receiveableamount  = $request->totalamount;
	$order->save();
	
	
	
		if($request->due > 0)
	{
	$duetransition = new duetransition();
	$duetransition->patient_id = $patientid;
	$duetransition->user_id = auth()->user()->id ;
	$duetransition->totalamount = $request->totalamount;
	$duetransition->amount = $request->due;
	$duetransition->transitiontype	= 2;
	$duetransition->transitionproducttype	= 6;	
    $duetransition->serviceorder_id	= $order->id;	
   $duetransition->comment	= "Service Due";	
   $duetransition->created_at  = $request->deliverydate ;
	$duetransition->save();
		}	
	
	
	
	
	
	
	
	
	
	
	
	

    $order_id = $order->id;		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 

    for ($i = 0; $i < count($request->service_name); $i++ ) 

	{
		
	       $servicetransition = new servicetransition; 
	   $servicetransition->serviceorder_id = $order_id;
	   
	   $servicetransition->servicelistinhospital_id = $request->service_name[$i]; // asole medicine_name[] er vetore id neya hoyeche. form bananor somoy name lekha hoyechecilo pore ar change kora hoy nai 
	     $servicetransition->unit = $request->quantity[$i];
		

		     $servicetransition->charge =  ($request->adjust[$i] + $request->totaldiscount[$i]) ;
		     $servicetransition->discount = $request->totaldiscount[$i];
			 $servicetransition->created_at  = $request->deliverydate ;
			 
			 if ($request->percentofdicountontaotal > 0)
		 {
			 $qun = $request->quantity[$i];
			 $discount = (($request->unit_price[$i] * $qun)* ($request->percentofdicountontaotal/100) ) ; 
			
		  $servicetransition->discount = $discount;

		}
		 else {
 $servicetransition->discount = $request->totaldiscount[$i];
		 }		 
			 
			 
			 
		 
			 
			 
			 
			 $servicetransition->receiveable_amount = $request->adjust[$i];
$servicetransition->user_id  = auth()->user()->id ;
		 

		  $servicetransition->save(); 	
		  
		  
		  
		
		
	}




		  
$patient_name = patient::findOrFail($patientid)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $patientid;

$cashtransition->serviceorder_id = $order_id;
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->totalamountbeforediscount;
$cashtransition->discount = $request->dicountontaotal;	
$cashtransition->amount_after_discount = $request->totalamountbeforediscount - $request->dicountontaotal;
$cashtransition->deposit = $request->paid;
$cashtransition->debit = $request->due + $adjust_advance;
$cashtransition->credit = $request->paid;
$cashtransition->description = "Service Charge from Patinet Name:" .$patient_name. " Patient ID: " .$patientid. " Service Charge Order ID:" .$order_id ;
$cashtransition->company_type = 1;
$cashtransition->created_at  = $request->deliverydate ;
$cashtransition->customer_type = 1;
$cashtransition->transitionproducttype = 6; 
$cashtransition->save();	











Log::channel('cabinservice')->info('Passant new services have been added.',
[
    'massage'=> 'Passant new services have been added.',
    'employee_details'=> Auth::user(),
	'Info'=> $request->all(),
]);

return response()->json(['success' => 'Data Added successfully.']);
 
		
		
		}	 
		 
		 
		 
		 
		 
		 
		 
	 
	 
	 
	 
    public function store(Request $request)
    {
		
		
				    $validated = $request->validate([
        'patient_id' => "unique:patientfinalhisabs,patient_id"  ,
        'totalamount' ,
		'service_name',
		'quantity',
		'adjust',
		'finalTotalcost',
		'finalreceiveableamount',
		'finaldis',
		'final_due_after_adjusting_service',
		'finalcommission',
		'sourceagent',
		'cabinedue',
		'duepayment',
		'finaldiscount',
    ]);



		
		
		
		
		
		
		
		
        		
	//DB::transaction(function () use ($request) {
		
		
	$cabinedue = $request->cabinedue;
$patient = patient::findOrFail($request->patient_id );	

 if ($patient->agentdetail_id)
 {
	$sourcename =  agentdetail::findOrFail($patient->agentdetail_id)->name;
 }
 if ($patient->doctor)
 {
	$sourcename =  doctor::findOrFail($patient->doctor_id)->name; 
	 
 }
 else
 {
	 $sourcename ="NA";
	 
 }
 
 
 



			if ($request->addadditonalsrvicecharge == 1 )   
		{
			
				
			$order = new serviceorder; 
		$order->user_id  = auth()->user()->id ; //$request->sellerid;
	$order->patient_id  = $request->patient_id;	
	$order->total  = $request->totalamount;
	$order->paid  = $request->servpaid ;
	$order->due_adjust_from_advance  = $request->serviceadjust ;
	
	
	$order->due  = (double)$request->totalamount- ((double)$request->servpaid + (double)$request->serviceadjust );
	$order->save();

    $order_id = $order->id;


    for ($i = 0; $i < count($request->service_name); $i++ ) 

	{
		
	       $servicetransition = new servicetransition; 
	   $servicetransition->serviceorder_id = $order_id;
	   
	   $servicetransition->servicelistinhospital_id = $request->service_name[$i]; // asole medicine_name[] er vetore id neya hoyeche. form bananor somoy name lekha hoyechecilo pore ar change kora hoy nai 
	     $servicetransition->unit = $request->quantity[$i];
		

		     $servicetransition->charge =  $request->adjust[$i];
		     $servicetransition->discount = 0;
			 $servicetransition->receiveable_amount = $request->adjust[$i];
$servicetransition->user_id  = auth()->user()->id ;
		 

		  $servicetransition->save(); 	
		
		
	}




$currentdue = $patient->due + ( $request->totalamount- ($request->servpaid + $request->serviceadjust ));


$current_dena = $patient->dena - $request->serviceadjust;


patient::where('id', $request->patient_id )
       ->update([
           'dena' => $current_dena,
		 
        ]);	




patient::where('id', $request->patient_id )
       ->update([
           'due' => $currentdue,
		 
        ]);	
		
		
  $balance =  balance_of_business::first();
  
   balance_of_business::where('id', 1)
  ->update(['balance' =>( $request->servpaid + $balance->balance)  ]);		
		


if ( ($request->totalamount- ($request->servpaid + $request->serviceadjust )) > 0   ) 
{
	$duetransition = new duetransition();
	$duetransition->patient_id = $request->patient_id;	
	$duetransition->user_id =  auth()->user()->id ;
	
	$duetransition->totalamount = $request->totalamount;
	$duetransition->amount = (double)$request->totalamount- (double)$request->servpaid;	
	$duetransition->discountondue = 0;
	$duetransition->comment = "service Due";	
	$duetransition->transitiontype = 2;
	
	$duetransition->transitionproducttype = 6;
	
	
	
	$duetransition->save();  
} 
		
		
		}





$finaldiscount = $request->finaldiscount;





return \Redirect::route('finalreport.showalldue', [$request->patient_id, $cabinedue , $sourcename, $finaldiscount]);



//return view('final_report_and_bill.duepaymentatfinalstage', compact('cabinedue', 'sourcename',
//'patient'));



//});	



//return \Redirect::route('finalreport.pdfbill', [$request->patient_id]);
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
        $data=  serviceorder::with('servicetransition')->findOrFail($id);
	
///////////update business balance /////////////////////////////
   $balance = balance_of_business::first(); 

if ($data->refund == 1)
{  
   $present_balance = $balance->balance - ($data->paid- $data->refundamount ) ;	
}
else
{
	$present_balance = $balance->balance - $data->paid  ;	
}
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
///////////// end update //////////////////////////////
		
		
/////////// update patient due 

$patient = patient::findOrFail($data->patient_id) ;



$patient_due = $patient->due;




$patient_due = $patient_due - $data->due; 
$patient_dena = $patient->dena + $data->due_adjust_from_advance; 

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
		agenttransaction::findOrFail($data->agenttransaction_id)->delete();
		$pawna = $agentdetail->hospitaler_kache_pawna - $data->commission;
	
            agentdetail::where('id', $data->agentdetail_id )
            ->update(['hospitaler_kache_pawna' => $pawna]);
				}
				
				
								/// update dalal doctor  balance 
				if($data->doctor_id)
				{
		$doctor = doctor::findOrFail($data->doctor_id);
	 doctorCommissionTransition::findOrFail($data->doctor_commission_transition_id)->delete();
		$pawna = $doctor->hospitaler_kache_pawna - $data->commission;
	
            doctor::where('id', $data->doctor_id )
            ->update(['hospitaler_kache_pawna' => $pawna]);
				}

		
		
				 $duetrans = duetransition::where('serviceorder_id', $data->id )->first();
		if($duetrans)
		{
		$duetrans->delete();
		}
		
		$casthtransition = cashtransition::where('serviceorder_id', $data->id )->first();
		
				if($casthtransition)
		{
		$casthtransition->delete();
		}
		
		Log::channel('cabinservice')->info('Passant new services tranctaion Delated.',
[
    'massage'=> 'Passant new services tranctaion Delated.',
    'employee_details'=> Auth::user(),
	'Info'=> $data,
]);
		
		$data->delete();
    }
}
