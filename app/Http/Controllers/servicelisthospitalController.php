<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\servicelistinhospital;
use DataTables;
use Validator;
use  App\Models\servicetransition; 
class servicelisthospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     // $medicine=  medicine::latest()->get();
	  
	
	  $servicelistinhospital=  servicelistinhospital::where('softdelete', 0 )->latest()->get();
	
	  
	        if ($request->ajax()) {
				$servicelistinhospital=  servicelistinhospital::where('softdelete', 0 )->latest()->get();
            //$medicine =  medicine::latest()->get();
            return Datatables::of($servicelistinhospital)
                   ->addIndexColumn()
				   

                    ->addColumn('action', function( servicelistinhospital $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button><br> <br>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })

                    ->addColumn('type', function( servicelistinhospital $service){ 
   
                    if ($service->service_type == 0 )
					{
						return "এক  কালিন ";
						
					}
					else
					{
						return "প্রতি দিন ";
					}
   

                    })					
                
					
					
                    ->rawColumns(['action' , 'type'])
                    ->make(true);
        }
		

		return view('servicelist.servicelist', compact('servicelistinhospital'));   
	
	}

public function dropdown_list()
{
 $servicelistinhospital=  servicelistinhospital::where('softdelete', 0 )->latest()->get();	

		  return response()->json(['servicelistinhospital' => $servicelistinhospital  ]);
 	
}





      public function inserttranstion(Request $request)
    {
		
			
	DB::transaction(function () use ($request) {
		
		
		
		
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
			
			 // return Redirect::back()
                     //   ->with('success','স্টকে যথেষ্ট পণ্য নেই ');
		}
		
		
		 }
		
		
		//////////////////////////////////////////////////// insert shuru ///////////////////////
		
		
		
		
		$order = new order; 
		$order->user_id  = auth()->user()->id ; //$request->sellerid;
	$order->patient_id  = $request->customer_id;
	$order->due =	$request->due;
	$due = $request->due;
	$id= $request->customer_id;
	
$patient_due = patient::where('id', $request->customer_id )->pluck('due')->first();

$patient_due = $patient_due + $due; 

//// update patient due 
patient::where('id', $request->customer_id )
       ->update([
           'due' => $patient_due
        ]);

/////////// update company balance 
  
  $balance =  balance_of_business::first();
  
   balance_of_business::where('id', 1)
  ->update(['balance' =>( $request->paid + $balance->balance)  ]);	




	$order->pay_in_cash  =	$request->paid;
	$order->total  = $request->totalamount;
	$order->save();

    $order_id = $order->id;

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
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 

		  $medicinetransition->save(); 
		 
	


	}		
		
				
		
flag:
});	
     //  return Redirect::back();
global $jsonmessage;

if($jsonmessage ==0 )
{
        return response()->json(['success' => 'Data Added successfully.']);
}
else{
return response()->json(['error' => 'Products are not avilable in Stock']);	

}


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
        $rules = array(
            'name'    =>  'required',
           'price'  =>  'required', 
		   'service_type'  =>  'required', 
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       

        $form_data = array(
            'servicename'        =>  $request->name,
			 'price'        =>  $request->price,
			 'service_type'        =>  $request->service_type,
           
        );

        servicelistinhospital::create($form_data);

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

            $data = servicelistinhospital::findOrFail($id);
			
			 
            return response()->json(['data' => $data ,  ]);
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
  
        $rules = array(  
            'name'    =>  'required',
           'price'  =>  'required', 
		   'service_type'  =>  'required', 
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       

        $form_data = array(
            'servicename'        =>  $request->name,
			 'price'        =>  $request->price,
			 'service_type'        =>  $request->service_type,
           
        );

        servicelistinhospital::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		
	servicelistinhospital::whereId($id)
  ->update(['softdelete' => '1']);  //softdelete 

    }
}
