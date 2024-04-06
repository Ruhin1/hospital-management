<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\medicinetransition;  

use DataTables;
use Validator;
use App\Models\balance_of_business; 
use App\Models\setting;
use App\Models\patient;
use App\Models\medicine;  
use App\Models\order;
use App\Models\duetransition;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Redirect;
use App\Models\returnmedicinetransaction;
use App\Models\cashtransition;
use App\Models\return_order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PDF;
$jsonmessage=0;
$status=0;
class medicinetransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/*	     public function index(Request $request)
    {
	
 $order=  order::with('medicinetransitions','patient','user')->latest()->paginate(3);
	
	
	return view('medicinetransition.transition',compact('order'))->with('i', (request()->input('page', 1) - 1) * 3);
	
	
	}
	
	*/
	
	       public function index(Request $request)
    {
      $order=  order::with('medicinetransitions','patient','user')->orderBy('id','DESC')->get();
	  
	
	  
	        if ($request->ajax()) {
           $order=  order::with('medicinetransitions','patient','user')->orderBy('id','DESC')->get();
            return Datatables::of($order)
                   ->addIndexColumn()
                    ->addColumn('action', function( order $data){ 
   
                          $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        $button .= '&nbsp;&nbsp;';
                        
						  $button .= '&nbsp;&nbsp;';
   $button .= '<button> <a type="button"  target="_blank"  class=" btn btn-success btn-sm"     href="'.route('medicinetransition.editr', $data->id).'">EDIT</a></button>';
    
						
						//$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })  
                              


							  ->addColumn('patient_name', function (order $order) {
                    return $order->patient->name;
                })
				
				      ->addColumn('patient_mobile', function (order $order) {
                    return $order->patient->mobile;
                })
					

                 ->editColumn('created', function(order $data) {
					
					 return date('d/m/y', strtotime($data->created_at) );
                    
                })
				
             ->editColumn('pdf', function ($order) {
                return '<a   target="_blank"      href="'.route('medicinetransition.pdf', $order->id).'">Print</a>';
            })
				

					
					
                    ->rawColumns(['action','pdf','created' ])

                    ->make(true);
					
					

        }
      
        return view('medicinetransition.transition', compact('order'));   

    }

	
	
	
	
	
	
	
		     public function fetch()
    {
	
 $order=  order::with('medicinetransitions','patient','user')->latest()->get();
	
	  return response()->json(['order' => $order, ]);


	
	}



		     public function findmeddue($id )
    {
	
	
	
	
					// medicine 
	$duemedicine = duetransition::where('patient_id', $id)->where('transitiontype', 2 )->where('transitionproducttype', 2 )->sum('amount');
	
	
	
	$returnmedicine = duetransition::where('patient_id', $id)->where('transitiontype', 4 )->where('transitionproducttype', 2 )->sum('amount');

	
	$duepayemntmedicine = duetransition::where('patient_id', $id)->where(function ($query) {$query->where('transitiontype', 1)->orWhere('transitiontype', 6);})->where('transitionproducttype', 2 )->sum('totalamount');
			
		$refundmedicine = duetransition::where('patient_id', $id)->where('transitiontype', 3 )->where('transitionproducttype', 2 )->sum('amount');
	
	$meddue = $duemedicine - ($returnmedicine - $refundmedicine) - $duepayemntmedicine ; 
	
	
	
	
	
	

	
	  return response()->json(['meddue' => $meddue, ]);


	
	}











public function datepick()
{
 return view('medicinetransition.picktwodate');   	
	
	
}




public function fetchtwodate (Request $request)
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
      
	      $end1 = date("Y-m-d",strtotime($request->input('enddate')));
		$datethatsentasenddatefromcust =  date("Y-m-d",strtotime($request->input('enddate')));
	


                  $medicinetransition = medicinetransition::with('order')
                ->select( 'medicine_id', \DB::raw( 'SUM(adjust) as amount , SUM(totalvat) as vat , SUM(unit) as quantity ,   SUM(totaldiscount) as discount'  ))
			     
							 ->whereBetween('updated_at',[$start,$end])    
                
				->groupBy('medicine_id')
                
						->orderBy(medicine::select('name')->whereColumn('medicines.id','medicinetransitions.medicine_id' ))
                			
                
                ->get();
				
				
				
	                  $returnmedicinetransaction = returnmedicinetransaction::with('return_order')
                ->select( 'medicine_id', \DB::raw( 'SUM(adjust) as amount , SUM(totalvat) as vat , SUM(unit) as quantity ,   SUM(totaldiscount) as discount'  ))
			     
							 ->whereBetween('updated_at',[$start,$end])    
                
				->groupBy('medicine_id')
                
						->orderBy(medicine::select('name')->whereColumn('medicines.id','returnmedicinetransactions.medicine_id' ))
                			
                
                ->get();			
 
				
				
	
$duetransitions = 	duetransition::with('patient')->where('transitionproducttype', 2)->where('transitiontype', 2)
->orderBy(patient::select('name')->whereColumn('patients.id','duetransitions.patient_id' )) ->whereBetween('updated_at',[$start,$end])    
->get();
				
				
$duecollection = 	duetransition::with('patient')->where('transitionproducttype', 2)->where('transitiontype', 1)
->orderBy(patient::select('name')->whereColumn('patients.id','duetransitions.patient_id' )) ->whereBetween('updated_at',[$start,$end])    
->get();				
				




$duerefund = 	duetransition::with('patient')->where('transitionproducttype', 2)->where('transitiontype', 3)
->orderBy(patient::select('name')->whereColumn('patients.id','duetransitions.patient_id' )) ->whereBetween('updated_at',[$start,$end])    
->get();				











			


$medicine=  medicine::with('medicine_category')->where('softdelete',0)->latest()->get();

			
				
		 $total_due_medicine = order::whereBetween('created_at',[$start,$end])->sum('due');		
				
				
		
	$order= order::with('medicinetransitions')->whereBetween('created_at',[$start,$end])->get();			
				
	$returnorder= return_order::with('returnmedicinetransaction')->whereBetween('created_at',[$start,$end])->get();	



$setting = setting::first();


	 $pdf = PDF::loadView('medicinetransition.report', compact('medicinetransition','setting','start','e','end1', 'end','total_due_medicine', 'returnmedicinetransaction','duetransitions','order','returnorder','duerefund',
'duecollection','medicine' ),
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


public function stock()
{
	$setting = setting::first();
	$medicine=  medicine::with('medicine_category')->where('softdelete',0)->orderBy('name')->get();
	$date = date('d-m-y h:i:s');
	
	 $pdf = PDF::loadView('medicinetransition.stock', compact('medicine', 'date','setting' ),
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











    public function  mlist()
    {
		
		
	
     
      // $patientdata = patient::where('booking_status', 0)->orWhere('booking_status', 1)->get(); 
	   $medicinedata = medicine ::with('medicine_category')->where('softdelete',0)->orderBy('name')->get(); 
	   
	   
	  
		 
		 $patientdata = patient::where(function ($query) {
    $query->where('softdelete', 0);
})->Where(function($query) {
	$query->where('booking_status', 1); 
   // $query->where('id', 1)
     //   ->orWhere('booking_status', 1);	
})->get();



$customerformedicine = patient::where('booking_status',5)->where('softdelete', 0)->orderBy('name')->get();
			
            return response()->json(['patientdata' => $patientdata ,  'customerformedicine'=> $customerformedicine, 'medicinedata' => $medicinedata]);

	   
	   
	   
    }


public function printpdfformedicineslip($id)
{
	$order= order::findOrFail($id);
	
	
	$data= patient::findOrFail($order->patient_id);
	
	$setting = setting::first();
	
	 $pdf = PDF::loadView('medicinetransition.medicinebill', compact('data','order','setting' ),
   [], [
 'mode'                     => '',
	'format'                   => 'A5',
	'default_font_size'        => '7',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
	'title'                    => 'Money Receipt'
]
   
   
   );
	
	
	 return $pdf->stream('Money_Receipt.pdf');
	
	
	
	
	
}








	public function edittrans($id)
{
	
	
		$order= order::with('medicinetransitions','patient','user')->findOrFail($id);
		$data= patient::findOrFail($order->patient_id);
	
		$medicinedata = medicine ::where('softdelete',0)->orderBy('name')->get();
		
		return view('medicinetransition.editbill', compact('order','data','medicinedata'));   
	
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
			'unit_price',
			'quantity',
			'stock',
			'vat',
			'vattk',
			'discount',
			'totaldiscount',
			'amount',
			'adjust',
			'percentofdicountontaotal',
			'grossamount',
			'discountatend',
			'paid',
			'due',
			'totalamount',
			'statusvalue',
			'medicine_name',
			'dataentry',	
		]);
		



		///// Check korche jodi quantityr poriman stock theke beshi hoy 
		 for ($product_id = 0; $product_id < count($request->medicine_name); $product_id++ ) {
		
				$desired_qun=0;
		$product_id_access_the_medicine_id_in_this_current_itteration = $request->medicine_name[$product_id];
		
		 for ($id = 0; $id < count($request->medicine_name); $id++ ) 
		 {
			 
			 if ($request->medicine_name[$id] == $product_id_access_the_medicine_id_in_this_current_itteration )
			 $desired_qun = $desired_qun + $request->quantity[$id] ;
			 
		 }

		$stcok_amount_of_medicine=  medicine::where('id',$request->medicine_name[$product_id] )->pluck('stock')->first();
	
	
	
		
		if ( $stcok_amount_of_medicine < $desired_qun )
		{ 
			global	$jsonmessage;
			$jsonmessage=1;
				goto flag;
		}
		
		
		 }











			if ( ($request->customer_id == '')   and ($request->regcustomer == '')  and ($request->excus == '' )  )
			{
			$patient = new patient() ; 
			$patient->name = $request->name;
			$patient->mobile = $request->mobile;
			$patient->age = $request->age;
			$patient->sex = $request->sex;
			$patient->address = $request->address;
			$patient->booking_status = 5;
			$patient->save();
			
			$patientid = $patient->id;
			}
			else if ($request->excus == 1 ) 
			{
			$patientid = 1;
				
			}
			else if  ($request->customer_id != '')    
			{
			$patientid = $request->customer_id;	
			}
			else if ($request->regcustomer != '')    
			{
			$patientid = $request->regcustomer;	
			}












		
		
			global $status;
			if ($request->statusvalue == 0 )
			{
				$status = 0;
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
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
			$order = new order; 
			$order->user_id  = auth()->user()->id ; //$request->sellerid;
		$order->patient_id  = $patientid; 
			$order->pay_by_adv =	$adjust_advance;	
		$order->due =	$request->due;
		$due = $request->due;
		$id= $patientid ;
		
	$patient_due = patient::where('id', $patientid )->pluck('due')->first();

	$patient_due = $patient_due + $due; 

		//// update patient due 
			patient::where('id', $patientid )
				->update([
					'due' => $patient_due
					]);

/////////// update company balance 
  
  $balance =  balance_of_business::first();
  
   balance_of_business::where('id', 1)
  ->update(['balance' =>( $request->paid + $balance->balance)  ]);	


	$order->totalbeforediscount  =	$request->grossamount;
	$order->discount  =	$request->discountatend;

	$order->pay_in_cash  =	$request->paid;
	$order->total  = $request->totalamount;
	$order->created_at  = $request->dataentry;
	$order->save();
	
	if($request->due > 0)
	{
	$duetransition = new duetransition();
	$duetransition->patient_id = $patientid;
	$duetransition->user_id = auth()->user()->id ;
	$duetransition->totalamount = $request->due;
	$duetransition->amount = $request->due;
	$duetransition->transitiontype	= 2;
	$duetransition->transitionproducttype	= 2;	
    $duetransition->order_id	= $order->id;
	$duetransition->duepaidfor	= 1;
	$duetransition->created_at  = $request->dataentry;
	$duetransition->comment	=  "Medicine sale Due: from Patinet ID: ".$patientid. " Medicine Order ID: "   .$order->id;
	
	
	$duetransition->save();
	
	}
	
	
	
	
	
	
	
	
	
	

    $order_id = $order->id;

    for ($product_id = 0; $product_id < count($request->medicine_name); $product_id++ ) 

	{

		
		
		
		       
		
		
		
       $medicinetransition = new medicinetransition; 
	   $medicinetransition->order_id = $order_id;
	   
	   $medicinetransition->medicine_id = $request->medicine_name[$product_id]; // asole medicine_name[] er vetore id neya hoyeche. form bananor somoy name lekha hoyechecilo pore ar change kora hoy nai 
	     $medicinetransition->unit = $request->quantity[$product_id];
		 medicine::where('id',$request->medicine_name[$product_id] )->decrement('stock',$request->quantity[$product_id] );
		 
		 
		   $medicinetransition->vat = $request->vat[$product_id];
		 $medicinetransition->unitprice = $request->unit_price[$product_id];    
		 $medicinetransition->totalvat = $request->vattk[$product_id];
		 
		 $qun= $request->quantity[$product_id];
		 
		 		 if ($request->percentofdicountontaotal > 0)
		 {
			  
			 $discount = (($request->unit_price[$product_id] * $qun)* ($request->percentofdicountontaotal/100) ) ; 
			
		
             $amount = ($request->unit_price[$product_id] * $qun) - $discount; 
			 
			 $medicinetransition->discount = $request->percentofdicountontaotal;
			 $medicinetransition->totaldiscount	 = $discount;
			
			
		     $medicinetransition->amount = $request->amount[$product_id];
		 $medicinetransition->adjust = $amount;
			 
		}
		 else {
				 
		 $medicinetransition->discount = $request->discount[$product_id];
		 $medicinetransition->totaldiscount	 = $request->totaldiscount[$product_id];
		 $medicinetransition->amount = $request->amount[$product_id];
		  $medicinetransition->adjust = $request->adjust[$product_id];
		 }
		 
		 $medicinetransition->created_at  = $request->dataentry;
		  $medicinetransition->save(); 
		 

	}		
		

$patient_name = patient::findOrFail($patientid)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $patientid;

$cashtransition->order_id = $order_id;
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->grossamount;
$cashtransition->discount = $request->discountatend;	
$cashtransition->amount_after_discount = $request->totalamount;
$cashtransition->deposit = $request->paid;
$cashtransition->debit = 0;
$cashtransition->credit = $request->paid;
$cashtransition->description = "Medicine Bill from Patinet Name:" .$patient_name. " Patient ID: " .$patientid. " Medicine Order ID:" .$order_id ;
$cashtransition->company_type = 1;

$cashtransition->customer_type = 1;
$cashtransition->transitionproducttype = 4; 
$cashtransition->created_at  = $request->dataentry;
$cashtransition->customer_baki = $request->due + $adjust_advance;
$cashtransition->advance_deposit_minus = $adjust_advance;
$cashtransition->customer_joma =0;
$cashtransition->save();

						
				flag:
				});	
					//  return Redirect::back();
				global $jsonmessage;
				global $status; 

				if($status !=0 )
				{
					Log::channel('medicneTrinction')->info('Medicine Sales',
						[
							'massage'=> 'Medicine Sales',
							'employee_details'=> Auth::user(),
							'Info'=> $request->all(),
						]);
						return response()->json(['success' => 'You can not give commission to an Admitted patient']);
						
				}

				if($jsonmessage ==0 )
				{
					Log::channel('medicneTrinction')->info('Medicine Sales',
						[
							'massage'=> 'Medicine Sales',
							'employee_details'=> Auth::user(),
							'Info'=> $request->all(),
						]);
						return response()->json(['success' => 'Data Added successfully.']);
						
				}
				else{
					Log::channel('medicneTrinction')->info('Medicine Sales',
				[
					'massage'=> 'Medicine Sales',
					'employee_details'=> Auth::user(),
					'Info'=> $request->all(),
				]);
				return response()->json(['error' => 'Products are not avilable in Stock']);	
				

				}


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
    public function update(Request $request)
    {
      
	DB::transaction(function () use ($request) {	

	
	$order = order::findOrFail($request->orderid);


				// stock update
				 foreach ($order->medicinetransitions as $d)
				 {
	 medicine::where('id',$d->medicine_id )->increment('stock',$d->unit );				 
					 
				 }
  		

		///// Check korche jodi quantityr poriman stock theke beshi hoy 
		 for ($product_id = 0; $product_id < count($request->medicine_name); $product_id++ ) {
		
				$desired_qun=0;
		$product_id_access_the_medicine_id_in_this_current_itteration = $request->medicine_name[$product_id];
		
		 for ($id = 0; $id < count($request->medicine_name); $id++ ) 
		 {
			 
			 if ($request->medicine_name[$id] == $product_id_access_the_medicine_id_in_this_current_itteration )
			 $desired_qun = $desired_qun + $request->quantity[$id] ;
			 
		 }

		$stcok_amount_of_medicine=  medicine::where('id',$request->medicine_name[$product_id] )->pluck('stock')->first();
	
	
	
		
		if ( $stcok_amount_of_medicine < $desired_qun )
		{ 



				// stock update
				 foreach ($order->medicinetransitions as $d)
				 {
	 medicine::where('id',$d->medicine_id )->decrement('stock',$d->unit );				 
					 
				 }





			
			 return Redirect::back()
                      ->with('success','স্টকে যথেষ্ট পণ্য নেই ');
		}
		
		
		 }




















if($request->deliverydate ==''){
	
$request->deliverydate = $order->deliverydate; 	
}

if($request->dataentry ==''){
	
$request->dataentry = $order->created_at; 	
}










$patient = patient::findOrFail($order->patient_id);


$patient_due = $patient->due;

$patient_dena = $patient->dena + $order->pay_by_adv;

$patient_due = $patient_due - $order->due ; 


patient::where('id', $order->patient_id )
       ->update([
           'due' => $patient_due,
		   'dena' => $patient_dena,
        ]);
		
	patient::where('id',  $order->patient_id)
   ->update([
	   'name' => $request->name,
	   'address' => $request->address,
	   'mobile' => $request->mobile,
	   'age' => $request->age,
	   'sex' => $request->sex,
	   
	]);	
		
		
		$patient = patient::findOrFail($order->patient_id);
		
$patient_due = $patient->due;
		
		$remainging = $patient->dena - $request->due;
		
		
	if($request->adjustwithadvancedeposit == 1 )
{	
	
		
		if ( ($remainging > 0) or ($remainging == 0))
		{
			
			$adjust_advance = $request->due;
		$request->due =0;
		
		patient::where('id', $order->patient_id )
       ->update([
           'dena' => $remainging
		   
        ]);	
			
		}
		if ($remainging < 0)
		{
		
			$adjust_advance = $patient->dena;
			$request->due =  -1 * $remainging ;
				patient::where('id', $order->patient_id )
       ->update([
           'dena' => 0
		   
        ]);		
			
			
			
		}	
}
else
{
$adjust_advance =0;
}	
		
$due = $request->due;		
$patient_due = $patient_due + $due; 


patient::where('id', $order->patient_id )
       ->update([
           'due' => $patient_due
		   
        ]);



///////////update business balance /////////////////////////////
   $balance = balance_of_business::first();  
   $present_balance = $balance->balance   - $order->pay_in_cash   + $request->paid ;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
 




order::where('id', $request->orderid )
       ->update([
           'due' => $request->due,
		   'pay_in_cash' => $request->paid,
		   'totalbeforediscount' => $request->grossamount,
		   'total' => $request->totalamount,
		   'discount' => $request->discountatend,
		   'pay_by_adv'=> $adjust_advance,
		   'user_id' => Auth()->user()->id,
		   'created_at' => $request->dataentry,
        ]);


				 
				 
				 
		 
				 












medicinetransition::where('order_id',$request->orderid  )->delete();

    $order_id = $request->orderid;

    for ($product_id = 0; $product_id < count($request->medicine_name); $product_id++ ) 

	{

		
		
		
		       
		
		
		
       $medicinetransition = new medicinetransition; 
	   $medicinetransition->order_id = $order_id;
	   
	   $medicinetransition->medicine_id = $request->medicine_name[$product_id]; // asole medicine_name[] er vetore id neya hoyeche. form bananor somoy name lekha hoyechecilo pore ar change kora hoy nai 
	     $medicinetransition->unit = $request->quantity[$product_id];
		 medicine::where('id',$request->medicine_name[$product_id] )->decrement('stock',$request->quantity[$product_id] );
		 
		 
		   $medicinetransition->vat = $request->vat[$product_id];
		   
		 $medicinetransition->totalvat = $request->vattk[$product_id];
		 
		 $qun= $request->quantity[$product_id];
		 
		 		 if ($request->percentofdicountontaotal > 0)
		 {
			  
			 $discount = (($request->unit_price[$product_id] * $qun)* ($request->percentofdicountontaotal/100) ) ; 
			
		
             $amount = ($request->unit_price[$product_id] * $qun) - $discount; 
			 
			 $medicinetransition->discount = $request->percentofdicountontaotal;
			 $medicinetransition->totaldiscount	 = $discount;
			
			
		     $medicinetransition->amount = $request->amount[$product_id];
		 $medicinetransition->adjust = $amount;
			 
		}
		 else {
				 
		 $medicinetransition->discount = $request->discount[$product_id];
		 $medicinetransition->totaldiscount	 = $request->totaldiscount[$product_id];
		 $medicinetransition->amount = $request->amount[$product_id];
		  $medicinetransition->adjust = $request->adjust[$product_id];
		 }
		 
          $medicinetransition->created_at = $request->dataentry;
		  $medicinetransition->save(); 
	}
  
  
  
  
  
  $duetransition = duetransition::where('order_id','=', $request->orderid )->first();
  

  if ($duetransition )
  {
  duetransition::where('order_id', $request->orderid )
       ->update([
	   
	   
           'totalamount' =>  ( $request->grossamount - $request->discountatend - $request->paid - $adjust_advance),
		   'amount' => ( $request->grossamount - $request->discountatend - $request->paid - $adjust_advance),
		   'created_at' => $request->dataentry,

        ]);



  }	else{

	if($request->due > 0)
	{
	$duetransition = new duetransition();
	$duetransition->patient_id = $order->patient_id;
	$duetransition->user_id = auth()->user()->id ;
	$duetransition->totalamount = $request->due;
	$duetransition->amount = $request->due;
	$duetransition->transitiontype	= 2;
	$duetransition->transitionproducttype	= 2;	
    $duetransition->order_id	=  $request->orderid;
	$duetransition->comment	=  "Medicine sale Due: from Patinet ID: ".$order->patient_id. " Medicine Transition ID: "  .$request->orderid   ;
	$duetransition->created_at  = $request->dataentry;
	$duetransition->duepaidfor	= 1;
	$duetransition->save();
	
	}






cashtransition::where('order_id','=', $request->orderid )
       ->update([
	   
	   
           'gorssamount' =>  $request->grossamount,
		   'amount_after_discount' => $request->totalamount ,
		   'discount' => $request->discountatend,
		   'deposit' =>  $request->paid,
		   'debit' => $request->due + $adjust_advance,
		   'credit'=>$request->paid,
		   'created_at' => $request->dataentry,
		   	   'customer_baki' => (( $request->grossamount - $request->discountatend - $request->paid - $adjust_advance) + $adjust_advance) ,
			   'advance_deposit_minus' => $adjust_advance,
			   

        ]);













  }	  
  
  
  
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  });	
  
  Log::channel('medicneTrinction')->info('Medicine Sales Updated',
  [
	  'massage'=> 'Medicine Sales Updated',
	  'employee_details'=> Auth::user(),
	  'Info'=> $request->all(),
  ]);
	 	return redirect()->route('medicinetransition.index'); 

	  
	  
	  
	  
  
	  
	  
	  
	  
	  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                 $data = order::with('medicinetransitions')->findOrFail($id);


$patient = patient::findOrFail($data->patient_id) ;
$patient_due = $patient->due;


$patient_due = $patient_due - $data->due; 
$patient_dena = $patient->dena + $data->pay_by_adv; 

patient::where('id',  $data->patient_id )
       ->update([
           'due' => $patient_due,
		   'dena'=> $patient_dena,
        ]);

/////////// update company balance 
  
  $balance =  balance_of_business::first();
  
   balance_of_business::where('id', 1)
  ->update(['balance' =>(   $balance->balance - $data->pay_in_cash )  ]);	

				// stock update
				 foreach ($data->medicinetransitions as $d)
				 {
	 medicine::where('id',$d->medicine_id )->increment('stock',$d->unit );				 
					 
				 }
				 
				 // 
		 $duetrans = duetransition::where('order_id', $data->id )->first();
		 
		 $cashtransition = cashtransition::where('order_id', $data->id )->first();
		 
		if($duetrans)
		{
		$duetrans->delete();		 
		}	

if ($cashtransition)
{
$cashtransition->delete();
}		
		Log::channel('medicneTrinction')->info('Pathology Bill  Delated',
		[
			'massage'=> 'Pathology Bill Delated',
			'employee_details'=> Auth::user(),
			'Info'=> $data,
		]);
        $data->delete();

    }
}
