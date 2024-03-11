<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\medicinecomapnyname;
use App\Models\medicineCompanyTransition;
use App\Models\medicine; 
use App\Models\balance_of_business;
use App\Models\cashtransition;
use App\Models\User;
use App\Models\setting;
use App\Models\medicinecompanyorder;
use Illuminate\Support\Facades\DB;
use DataTables;
use Validator;
use PDF;
$jsonmessage=0;
$status=0;

class medicine_comapny_transition_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



	       public function index(Request $request)
    {
      $order=  medicinecompanyorder::with('medicineCompanyTransition','medicinecomapnyname','user')->orderBy('id','DESC')->get();
	  
	
	  
	        if ($request->ajax()) {
   $order=  medicinecompanyorder::with('medicineCompanyTransition','medicinecomapnyname','user')->orderBy('id','DESC')->get();
            return Datatables::of($order)
                   ->addIndexColumn()
                    ->addColumn('action', function( medicinecompanyorder $data){ 
   
                          $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        $button .= '&nbsp;&nbsp;';
                        
						  $button .= '&nbsp;&nbsp;';
   // $button .= '<button> <a type="button"  target="_blank"  class=" btn btn-success btn-sm"     href="'.route('medicinetransition.editr', $data->id).'">EDIT</a></button>';
    
						
						//$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })  
                              


							  ->addColumn('company_name', function (medicinecompanyorder $order) {
                    return $order->medicinecomapnyname->name;
                })
				
							  ->addColumn('type', function (medicinecompanyorder $order) {
                    if( $order->transitiontype == 1 )
					{
					return "Purchase";	
					}
				if( $order->transitiontype == 2 )
					{
					return "Return Medicine to Company"	;
					}
					
					
                })
					

                 ->editColumn('created', function(medicinecompanyorder $data) {
					
					 return date('d/m/y', strtotime($data->created_at) );
                    
                })
				
             ->editColumn('pdf', function ($order) {
                return '<a   target="_blank"      href="'.route('medicinecomapnytransition.pdf', $order->id).'">Print</a>';
            })
				

					
					
                    ->rawColumns(['action','pdf','created' ])

                    ->make(true);
					
					

        }
      
        return view('medicineCompanyTransition.medicineCompanyTransition', compact('order'));   

    }







public function printpdf($id)
{
    $setting = setting::first();
	$order= medicinecompanyorder::findOrFail($id);		
	$data= medicinecomapnyname::findOrFail($order->medicinecomapnyname_id);	
	 $pdf = PDF::loadView('medicineCompanyTransition.medicinebill', compact('data','order','setting' ),
   [], [
 'mode'                     => '',
	'format'                   => 'A5',
	'default_font_size'        => '7',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
    'title' => 'Comapny_voucher',
]  
   );	
	 return $pdf->stream('Comapny_voucher.pdf');	
}







    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function dropdown_list(){
        $medicinedata = medicine ::with('medicine_category')->where('softdelete',0)->orderBy('name')->get(); 
	   $medicinecomapnyname = medicinecomapnyname::where('softdelete','0' )->orderBy('name')->get(); 

            return response()->json(['medicinedata' => $medicinedata, 'medicinecomapnyname' => $medicinecomapnyname]);		
		 
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
	
	 	'medicinecomapnyname_id',
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
'medicine_name','date'

		
		
    ]);
		


















		
		

		
		///// Check korche jodi quantityr poriman stock theke beshi hoy 
		
		
		if($request->transitiontype == 2  )
		{
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
			
			 // return Redirect::back()
                     //   ->with('success','স্টকে যথেষ্ট পণ্য নেই ');
		}
		
		
		 }
		}
		
		//////////////////////////////////////////////////// insert shuru ///////////////////////
		
		$medicinecomapnyname = medicinecomapnyname::findOrFail($request->medicinecomapnyname_id);	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		$order = new medicinecompanyorder; 
		$order->user_id  = auth()->user()->id ; //$request->sellerid;
	$order->medicinecomapnyname_id  = $request->medicinecomapnyname_id; 
		
	$order->due =	$request->due;
	$due = $request->due;
	
	
$medicinecomapny = medicinecomapnyname::findOrFail($request->medicinecomapnyname_id);	

if($request->transitiontype == 1  )
{
$updated_due = $medicinecomapny->due + $due; 

//// update patient due 
medicinecomapnyname::where('id', $request->medicinecomapnyname_id )
       ->update([
           'due' => $updated_due
        ]);

}

if($request->transitiontype == 2  )
{
$updated_due = $medicinecomapny->due - $due; 

//// update patient due 
medicinecomapnyname::where('id', $request->medicinecomapnyname_id )
       ->update([
           'due' => $updated_due
        ]);

}


	$order->totalbeforediscount  =	$request->grossamount;
	$order->discount  =	$request->discountatend;
$order->transitiontype  =	$request->transitiontype;
	$order->pay_in_cash  =	$request->paid;
	$order->total  = $request->totalamount;
    $order->created_at  = $request->date;
	$order->save();
	
    $order_id = $order->id;

    for ($product_id = 0; $product_id < count($request->medicine_name); $product_id++ ) 

	{

       $medicinetransition = new medicineCompanyTransition(); 
	   $medicinetransition->medicinecompanyorder_id	 = $order_id;
	   
	   $medicinetransition->medicine_id = $request->medicine_name[$product_id]; 
	    
if($request->transitiontype == 1  )
{	
		 medicine::where('id',$request->medicine_name[$product_id] )->increment('stock',$request->quantity[$product_id] );
		 
}

if($request->transitiontype == 2  )
{	
		 medicine::where('id',$request->medicine_name[$product_id] )->decrement('stock',$request->quantity[$product_id] );
		 
}

	 
		$medicinetransition->Quantity = $request->quantity[$product_id];   
		   
		$medicinetransition->unit_price = $request->unit_price[$product_id];   
        $medicinetransition->created_at  = $request->date;
		$medicinetransition->save(); 


	}		
		







$cashtransition = new cashtransition();



$cashtransition->medicinecompanyorder_id = $order_id;
$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->grossamount;
$cashtransition->discount = $request->discountatend;	
$cashtransition->amount_after_discount = $request->totalamount;


if($request->transitiontype == 1  )
{
$cashtransition->withdrwal = $request->paid;
}

if($request->transitiontype == 2  )
{
$cashtransition->deposit = $request->paid;
}

$cashtransition->debit = 0;
$cashtransition->credit = 0;
$cashtransition->description = "Money Paid to the Medicine Company:" .$medicinecomapny->name. " Medicine Company Transition Order ID:" .$order_id ;
$cashtransition->company_type = 2;


$cashtransition->transitionproducttype = 18; 
$cashtransition->save();

















				
		
flag:
});	
     //  return Redirect::back();
global $jsonmessage;
global $status; 

if($status !=0 )
{
        return response()->json(['success' => 'You can not give commission to an Admitted patient']);
}

if($jsonmessage ==0 )
{
        return response()->json(['success' => 'Data Added successfully.']);
}
else{
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
 


















////////////////////////////////////////////////////// delete ////////////////////////












    public function destroy($id)
    {
        

		$data = medicinecompanyorder::with('medicineCompanyTransition')->findOrFail($id);


$medicine_com  = medicinecomapnyname::findOrFail($data->medicinecomapnyname_id) ;
$present_due = $medicine_com->due;

if($data->transitiontype == 1  )
{
$updated_due = $present_due - $data->due; 
 

medicinecomapnyname::where('id',  $data->medicinecomapnyname_id )
       ->update([
           'due' => $updated_due,
		  
        ]);

}
if($data->transitiontype == 2  )
{
$updated_due = $present_due + $data->due; 
 

medicinecomapnyname::where('id',  $data->medicinecomapnyname_id )
       ->update([
           'due' => $updated_due,
		  
        ]);

}




				// stock update
				if($data->transitiontype == 1  )
{
				 foreach ($data->medicineCompanyTransition as $d)
				 {
	 medicine::where('id',$d->medicine_id )->decrement('stock',$d->Quantity );				 
					 
				 }
				 
}			
				if($data->transitiontype == 2  )
{
				 foreach ($data->medicineCompanyTransition as $d)
				 {
	 medicine::where('id',$d->medicine_id )->increment('stock',$d->Quantity );				 
					 
				 }
				 
}	











	
		 
		 $cashtransition = cashtransition::where('medicinecompanyorder_id', $data->id )->first();
		 
	

if ($cashtransition)
{
$cashtransition->delete();
}	
        $data->delete();
    }
























}
