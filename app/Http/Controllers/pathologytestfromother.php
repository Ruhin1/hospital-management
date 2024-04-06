<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\pathologytransitionfromotherinstitue;  
use App\Models\pathologyorderfromotherinsitute;  
use App\Models\supplier;  
use DataTables;
use Validator;

use App\Models\doctor;
use App\Models\agentdetail;
use App\Models\patient;
use App\Models\reportlist;

use App\Models\duetransition; 
use App\Models\user;
use App\Models\order; 
use App\Models\doctorCommissionTransition;
use App\Models\cashtransition;
use App\Models\agenttransaction; 
use App\Models\balance_of_business;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Redirect;

use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

$status=0;














class pathologytestfromother extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	        public function index(Request $request)
    {
    
	 
	
 $order=  pathologyorderfromotherinsitute::with('pathologytransitionfromotherinstitue','patient','user')->latest()->get();
	
	  
	        if ($request->ajax()) {
					

					$order=  pathologyorderfromotherinsitute::with('pathologytransitionfromotherinstitue','patient','user')->latest()->get();
            
            return Datatables::of($order)
                   ->addIndexColumn()
				   

                    ->addColumn('action', function( pathologyorderfromotherinsitute $data){ 
   
   
   
                          $button = '<button type="button" name="delete" id="'.$data->id.'"     class="delete btn btn-danger btn-sm">Delete</button>';
                       
$button .= '&nbsp;&nbsp;';
					   $button .= '&nbsp;&nbsp;';

 //  $button .= '<button type="button" name="refund" id="'.$data->id.'"     class="refund btn btn-warning //btn-sm">Refund</button>';
        

  $button .= '&nbsp;&nbsp;';
   //$button .= '<button> <a type="button"  target="_blank"  class=" btn btn-success btn-sm"     //href="'.route('reporttransaction.edittrans', $data->id).'">EDIT</a></button>';
       

					  return $button;
                    })

                      ->addColumn('patient_name', function (pathologyorderfromotherinsitute $order) {
                   


					if($order->patient->name)
						 return $order->patient->name;
					 else
						return "NA"; 
				 
                })
				
				
				
				
                      ->addColumn('Supplier_name', function (pathologyorderfromotherinsitute $order) {
                   


					if($order->supplier->name)
						 return $order->supplier->name;
					 else
						return "NA"; 
				 
                })				                   



				
				
				
				
				
				
				
				
				
				
				
				
				
				      ->addColumn('patient_mobile', function (pathologyorderfromotherinsitute $order) {
                   if( $order->patient->mobile)
					   return $order->patient->mobile;
				   else
					   return "NA";
				  
                })
					

                 ->editColumn('created', function(pathologyorderfromotherinsitute $data) {
					
					 return date('d/m/y h:i A', strtotime($data->created_at) );
                    
                })
				

				

					
					
                    ->rawColumns(['action','created' ])
                    ->make(true);
        }
		

		return view('reporttransaction.transitionfromout', compact('order'));   
	
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
	 
	     public function  mlist()
    {
		
		
	
     
       $patientdata = patient::select('name','mobile','id')->where('softdelete', 0)->orderBy('id')->get(); 
	   
	   

	   
	   
	   
	   $medicinedata = reportlist ::where('softdelete', 0)->orderBy('name')->get(); 
$supplier = supplier::where('softdelete', 0)->orderBy('name')->get(); 
            return response()->json(['patientdata' => $patientdata ,



			 'medicinedata' => $medicinedata,
			
			'supplier' => $supplier,
			]);
 
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
		
		
		
		
	
		
		
		
		
		
		
		
		
		
	
		
		
		
		
		

		
		$patientid = $request->customer_id;
			
		



		
		//////////////////////////////////////////////////// insert shuru ///////////////////////
		
	
		
		$patient = patient::findOrFail($patientid);
		

	$adjust_advance =0;
		
	
		
		
		$order = new pathologyorderfromotherinsitute; 
		$order->user_id  = auth()->user()->id ;
	$order->patient_id  = $patientid;
		$order->supplier_id  = $request->supplier;
	
	$order->due =	$request->due;
	
	$order->discount =	$request->dicountontaotal;	
	
	$order->remark =	$request->remark;
	$order->totalbeforediscount =	$request->totalamountbeforediscount;	
		

	$due = $request->due;

	
	
	/////////// update supplier due 
$supplier_due = supplier::where('id', $request->supplier )->pluck('due')->first();

$supplier_due = $supplier_due + $due; 


supplier::where('id', $request->supplier )
       ->update([
           'due' => $supplier_due
		   
        ]);

/////////// end update patient due 	


///////////update business balance /////////////////////////////
   $balance = balance_of_business::first();  
   $present_balance = $balance->balance - $request->paid ;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
///////////// end update //////////////////////////////


	$order->pay_in_cash  =	$request->paid;




	$order->total  = $request->totalamount;
	$order->save();
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

    $order_id = $order->id;

    for ($product_id = 0; $product_id < count($request->medicine_name); $product_id++ ) 

	{

		
		
		
		       
		
		
		
       $medicinetransition = new pathologytransitionfromotherinstitue; 
	   $medicinetransition->pathologyorderfromotherinsitute_id = $order_id;

	   $medicinetransition->supplier_id = $request->supplier;
	   $medicinetransition->unitprice = $request->unit_price[$product_id];
	   
	   
	   $medicinetransition->reportlist_id = $request->medicine_name[$product_id]; // asole medicine_name[] er vetore id neya hoyeche. form bananor somoy name lekha hoyechecilo pore ar change kora hoy nai 
	     $medicinetransition->unit = 1;
		
		 
		 

		 
		 
		 if ($request->percentofdicountontaotal > 0)
		 {
			 $qun = 1; 
			 $discount = (($request->unit_price[$product_id] * $qun)* ($request->percentofdicountontaotal/100) ) ; 
			
		
             $amount = ($request->unit_price[$product_id] * $qun) - $discount; 
			 
			 $medicinetransition->discount = $request->percentofdicountontaotal;
			 $medicinetransition->totaldiscount	 = $discount;
			 $medicinetransition->adjust = $amount;
			 $medicinetransition->amount = $amount;
		}
		 else {
		 $medicinetransition->discount = $request->discount[$product_id];
		 $medicinetransition->totaldiscount	 = $request->totaldiscount[$product_id];
		 $medicinetransition->amount = $request->amount[$product_id];
		  $medicinetransition->adjust = $request->adjust[$product_id];
		 }
		  $medicinetransition->save(); 
		
	

$patient_name = patient::findOrFail($patientid)->name;
$suplier_name = supplier::findOrFail($request->supplier)->name;
$cashtransition = new cashtransition();

$cashtransition->supplier_id = $request->supplier;

$cashtransition->pathologyorderfromotherinsitute_id	 = $order_id;
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->totalamountbeforediscount;
$cashtransition->discount = $request->dicountontaotal;	
$cashtransition->amount_after_discount = $request->totalamountbeforediscount - $request->dicountontaotal;
$cashtransition->withdrwal = $request->paid;
$cashtransition->debit =   0; 
$cashtransition->credit = $request->due;
$cashtransition->description = "Pathology Test done from :" .$suplier_name. " for the Patient ID: " .$patientid. "Patient Name: " .$patient_name. " Pathology Outside-Order ID:" .$order_id ;
$cashtransition->company_type = 2;

$cashtransition->customer_type = 1;
$cashtransition->transitionproducttype = 4; 
$cashtransition->save();














	}		
		
	

flag:

});	
 global $status;

if($status !=0 )
{
        return response()->json(['success' => 'You can not give commission to an Admitted patient']);
}
 


   //return Redirect::back();

   Log::channel('pathologi')->info('Other Diagonistic Center Pathology Test information Delated',
   [
       'massage'=> 'Other Diagonistic Center Pathology Test information Delated',
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
        $data=  pathologyorderfromotherinsitute::with('pathologytransitionfromotherinstitue')->findOrFail($id);
	
///////////update business balance /////////////////////////////
   $balance = balance_of_business::first(); 



	$present_balance = $balance->balance + $data->pay_in_cash  ;	

   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
///////////// end update //////////////////////////////
		
		
/////////// update supplier due 

$supplier = supplier::findOrFail($data->supplier_id) ;





$supplier_due  = $supplier->due;


$supplier_due = $supplier_due - $data->due; 


supplier::where('id',  $data->supplier_id )
       ->update([
           'due' => $supplier_due,
		
        ]);



		
$pathologytransitionfromotherinstitue = pathologytransitionfromotherinstitue::where('pathologyorderfromotherinsitute_id', $data->id )->delete();


		
		
		cashtransition::where('pathologyorderfromotherinsitute_id', $data->id )->delete();
		
		
		Log::channel('pathologi')->info('Other Diagonistic Center Pathology Test information Delated',
        [
            'massage'=> 'Other Diagonistic Center Pathology Test information Delated',
            'employee_details'=> Auth::user(),
            'Info'=> $data,
        ]);

		$data->delete();
        
    }
}
