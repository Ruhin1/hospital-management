<?php

namespace App\Http\Controllers;

use App\Models\returnmedicinetransaction;
use Illuminate\Http\Request;


use DataTables;
use Validator;

use App\Models\User;
use App\Models\cashtransition;
use App\Models\setting;

use PDF;
use App\Models\patient;
use App\Models\medicine;
use App\Models\return_order;  
use App\Models\duetransition;
use App\Models\balance_of_business;  
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\order;  

class ReturnmedicinetransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




	public function index(Request $request)
    {
		//$order=  return_order::with('returnmedicinetransaction','patient','user')->latest();
  $order=  return_order::with('returnmedicinetransaction','patient','user')->orderBy('id','DESC')->latest();
	
	  
	        if ($request->ajax()) {
           
			//	$order=  return_order::with('returnmedicinetransaction','patient','user')->latest();
  $order=  return_order::with('returnmedicinetransaction','patient','user')->orderBy('id','DESC')->latest();
	
		   return Datatables::of($order)
                   ->addIndexColumn()
                    ->addColumn('action', function( return_order $data){ 
   
                          $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        $button .= '&nbsp;&nbsp;';
                        
						  $button .= '&nbsp;&nbsp;';
//    $button .= '<button> <a type="button"  target="_blank"  class=" btn btn-success btn-sm"     href="'.route('medicinetransition.editr', $data->id).'">EDIT</a></button>';
    
						
						//$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })  
                              


							  ->addColumn('patient_name', function (return_order $order) {
                    return $order->patient->name;
                })
				
				      ->addColumn('patient_mobile', function (return_order $order) {
                    return $order->patient->mobile;
                })
					

                 ->editColumn('created', function(return_order $data) {
					
					 return date('d/m/y', strtotime($data->created_at) );
                    
                })
				
             ->editColumn('pdf', function ($order) {
                return '<a   target="_blank"      href="'.route('ReturnmedicinetransactionController.pdf', $order->id).'">Print</a>';
            })
				

					
					
                    ->rawColumns(['action','pdf','created' ])

                    ->make(true);
					
					

        }
      
        return view('returnmedicinetransition.transition', compact('order'));   

    }



public function pdf($id){

	$order= return_order::findOrFail($id);
	
	
	$data= patient::findOrFail($order->patient_id);
	
	$setting = setting::first();
	
	 $pdf = PDF::loadView('returnmedicinetransition.medicinebill', compact('data','order','setting' ),
   [], [
 'mode'                     => '',
	'format'                   => 'A5',
	'default_font_size'        => '7',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
	'title'                    => 'Medicine_Return_receipt', 
]
   
   
   );
	
	
	 return $pdf->stream('Medicine_Return_receipt.pdf');
	
	


}





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
	 		     public function fetch()
    {
	
     $order=  return_order::with('returnmedicinetransaction','patient','user')->latest()->get();
	
	  return response()->json(['order' => $order, ]);


	
	}



    public function  mlist()
    {
		

       $patientdata = patient::orderBy('id')->get(); 
	   $medicinedata = medicine ::orderBy('name')->get(); 
	   
	

			
        return response()->json(['patientdata' => $patientdata , 'medicinedata' => $medicinedata]);
  
	   
    }


	 
	 
	 
	       public function store(Request $request)
    {
		
			
	DB::transaction(function () use ($request) {
		
		
						    $validated = $request->validate([
        'customer_id'  ,
        'medicine_name' ,
		'unit_price',
		'quantity',
		'stock',
		'vat',
		'vattk',
		'discount',
		'totaldiscount',
		'amount',
		'adjust',
		'totaladjust',
		'totalamount',
		'porishod',
'comment',
'grossamount',
'dataentry',
		
		
    ]);
		
		
		 if ($request->excus == 1 ) 
		{
		$id = 1;
			
		}
		else if  ($request->customer_id != '')    
		{
		$id = $request->customer_id;	
		}
		else if ($request->regcustomer != '')    
		{
		$id = $request->regcustomer;	
		}
		else{
		$id=0;	
			
		}
	if ($id == 0)	
	{
		
		 return Redirect::back()->with('message', 'No Customer has been selected');
	}
		
		
		
		$return_order = new return_order; 
		$return_order->user_id  = auth()->user()->id;
	$return_order->patient_id  = $id;
	$return_order->transitiontype = $request->porishod;
$return_order->total_cost_before_initial_vat_and_discount  =	$request->grossamount;

	$return_order->adjustment  =	$request->totaladjust; // adjust mane discount
	$return_order->total  = $request->totalamount;
	$return_order->created_at  = $request->dataentry;	
	$return_order->save();


if ($request->porishod == 2)
{
// update customer balance 
if ($id != 1) // jodi external customer na hoy 
{
$patient = patient::findOrFail($id);



	
	$due = $patient->due - $request->totalamount;
	if (( $due > 0) or ( $due == 0))
	{
	patient::where('id', $id)
->update(['due' => $due ]);					
	}
	
	if ($due < 0 )
	{
	$additionaldena = $patient->dena +	 ( $due * (-1) );
	
	
		patient::where('id', $id)
->update(['due' => 0, 'dena'=> $additionaldena ]);		
		
		
	}
	





}



	  $duetransition = new duetransition();
		$duetransition->patient_id	= $id;
		$duetransition->user_id	= Auth()->User()->id;
		$duetransition->amount	= $request->totalamount;
		$duetransition->totalamount	= $request->totalamount;
		$duetransition->comment	= $request->comment;
		$duetransition->transitiontype	= 4;  // 4-> ponno ferot due kombe
		$duetransition->duepaidfor	= 1;
		$duetransition->transitionproducttype	= 2;
		$duetransition->return_order_id	= $return_order->id;
		$duetransition->created_at  = $request->dataentry;
		$duetransition->save();




		if ($request->excus == 1 ) 
		{
			$request->customer_id = 1;
			
		}


	$patient_name = patient::findOrFail($request->customer_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->customer_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->return_order_id = $return_order->id; 

$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->grossamount ;
$cashtransition->discount = $request->grossamount - $request->totalamount;	
$cashtransition->amount_after_discount = $request->totalamount;

$cashtransition->debit =  0 ;
$cashtransition->credit = $request->totalamount  ; 
$cashtransition->description = " Patient Due will be decrease because of Returning Medicine which will be adjusted with the patietn's due -  Patinet Name: " .$patient_name. " Patient ID: " .$request->customer_id. " Return Medicine Trans ID: " .$return_order->id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 3;
$cashtransition->created_at  = $request->dataentry;
$cashtransition->customer_type = 2;
$cashtransition->transitionproducttype = 2; 
$cashtransition->save();




























	}

if($request->porishod == 1) // jodi nogode porishod hoy  
{
	  	  //////////////// update business balance 
	     $balance = balance_of_business::first();  
   $present_balance = $balance->balance - $request->totalamount ;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
  
  $patient = patient::findOrFail($id);
  
  
  if ($request->comment == null)
  {
	 $comment= "Cash back for Returning Medicine to the customer:" .$patient->name;
	  
  }else
  {
	 $comment= $request->comment;
  }
 
  
	  
	  $duetransition = new duetransition();
		$duetransition->patient_id	= $id;
		$duetransition->user_id	= Auth()->User()->id;
		$duetransition->amount	= $request->totalamount;
		$duetransition->totalamount	= $request->totalamount;
		$duetransition->comment	= $comment;
		$duetransition->transitiontype	= 7;  // 4-> ponno ferot er binimoye taka ferot
		$duetransition->duepaidfor	= 1;
		$duetransition->transitionproducttype	= 2;
		$duetransition->return_order_id	= $return_order->id;
		$duetransition->user_id	= Auth()->user()->id;
		$duetransition->created_at  = $request->dataentry;	
		$duetransition->save();








		if ($request->excus == 1 ) 
		{
			$request->customer_id = 1;
			
		}



	$patient_name = patient::findOrFail($request->customer_id)->name;

$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->patient_id = $request->customer_id;

$cashtransition->duetransition_id = $duetransition->id; 
$cashtransition->return_order_id = $return_order->id; 

$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->grossamount ;
$cashtransition->discount = $request->grossamount - $request->totalamount;	
$cashtransition->amount_after_discount = $request->totalamount;
$cashtransition->withdrwal = $request->totalamount;
$cashtransition->debit =  0 ;
$cashtransition->credit = 0  ; 
$cashtransition->description = "Pahermachy Refund on Cash for Returning Medicine by the Patinet Name: " .$patient_name. " Patient ID: " .$request->customer_id. " Return Medicine Trans ID " .$return_order->id. " Due Trans ID: " .$duetransition->id. " Data Entry By: " .$user_name ;
$cashtransition->company_type = 2;
$cashtransition->customer_type = 4;
$cashtransition->created_at  = $request->dataentry;	
$cashtransition->transitionproducttype = 2; 
$cashtransition->save();












	  
	
}

//////////////////// end update //////////////////



    $return_order_id = $return_order->id;

    for ($product_id = 0; $product_id < count($request->medicine_name); $product_id++ ) 

	{

		
		
		
		       
		
		
		
       $medicinetransition = new returnmedicinetransaction; 
	   $medicinetransition->return_order_id =  $return_order_id;
	   
	   
	   
	    $medicinetransition->user_id = Auth()->user()->id;
	   
	   $medicinetransition->patient_id = $id;
	   
	   $medicinetransition->medicine_id = $request->medicine_name[$product_id]; // asole medicine_name[] er vetore id neya hoyeche. form bananor somoy name lekha hoyechecilo pore ar change kora hoy nai 
	     $medicinetransition->unit = $request->quantity[$product_id];
		 medicine::where('id',$request->medicine_name[$product_id] )->increment('stock',$request->quantity[$product_id] );
		 
		 
		   $medicinetransition->vat = $request->vat[$product_id];
		   
		 $medicinetransition->totalvat = $request->vattk[$product_id];
		 $medicinetransition->discount = $request->discount[$product_id];
		 $medicinetransition->totaldiscount	 = $request->totaldiscount[$product_id];
		 $medicinetransition->amount = $request->amount[$product_id];
		  $medicinetransition->adjust = $request->adjust[$product_id];
		  $medicinetransition->created_at  = $request->dataentry;	
		  $medicinetransition->save(); 
		 
	


	}		
		
				
		

});	
      // return Redirect::back()->with('message', 'Medicine takes return');;


        return response()->json(['success' => 'Data Added successfully.']);
    }
	 




public function delete($id){

	DB::transaction(function () use($id) {	 
$request = return_order::findOrFail($id);
$id = $request->patient_id;

if ($request->transitiontype == 2)
{

$patient = patient::findOrFail($id);
$result = $patient->dena - $request->total;
if (( $result > 0) or ( $result == 0))
{
patient::where('id', $id)
->update(['dena' => $result ]);					
}

if ($result < 0 )
{
$additionaldue = $patient->due +	 ( $result * (-1) );
patient::where('id', $id)
->update(['dena' => 0, 'due'=> $additionaldue ]);			

}



duetransition::where('return_order_id', $request->id )->delete();
cashtransition::where('return_order_id', $request->id )->delete();
}	 


if($request->transitiontype == 1) // jodi nogode porishod hoy  
{
$patient = patient::findOrFail($id);
$result = $patient->dena - $request->total;
duetransition::where('return_order_id', $request->id )->delete();
cashtransition::where('return_order_id', $request->id )->delete();		
}

foreach( $request->returnmedicinetransaction as $r )
{
medicine::where('id',$r->medicine_id )->decrement('stock',$r->unit );
$r->delete();
}

$request->delete();		
});

return response()->json(['data'=>'Data has been deleted']);
 }




}
