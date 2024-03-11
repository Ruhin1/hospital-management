<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




use DataTables;
use Validator;
use App\Models\balance_of_business; 

use App\Models\cashtransition; 
use App\Models\medicine;
use App\Models\medicinecomapnyname;
use App\Models\Product;  
use App\Models\productcompanyorder;
use App\Models\productcompanytransition;
use App\Models\User;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Redirect;
use PDF;
$jsonmessage=0;
$status=0;

class productcompanytransitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	       public function index(Request $request)
    {
     
	 $productcompanyorder=  productcompanyorder::with('productcompanytransition','medicinecomapnyname','user')->latest()->get();
	  
	
	  
	        if ($request->ajax()) {
                $productcompanyorder=  productcompanyorder::with('productcompanytransition','medicinecomapnyname','user')->latest()->get();
            return Datatables::of($productcompanyorder)
                   ->addIndexColumn()
                    ->addColumn('action', function( productcompanyorder $data){ 
   
   if( ($data->type == 1) or ($data->type == 2)  )
   {
                          $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        $button .= '&nbsp;&nbsp;';
                        //$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
   }
    elseif ($data->type == 3)
   {
	 return " Return order.";  
	   
   }
 elseif ($data->type == 10)
   {
	 return "Reverse Entry";  
	   
   }
 elseif ($data->type == 5)
   {
	 return "Deleted Entry";  
	   
   }  
   
                    })  
                              


							  ->addColumn('companyname', function (productcompanyorder $productcompanyorder) {
                    return $productcompanyorder->medicinecomapnyname->name;
                })
				
									  ->addColumn('entryby', function (productcompanyorder $productcompanyorder) {
                    return $productcompanyorder->user->name;
                })
					

                 ->editColumn('created', function(productcompanyorder $data) {
					
					 return date('d/m/y h:i A', strtotime($data->created_at) );
                    
                })
				

				

					
					
                    ->rawColumns(['action','created' ])

                    ->make(true);
					
					

        }
      
        return view('productcompanytransition.productcompanytransition', compact('productcompanyorder'));   

    }




	    public function  dropdownlist()
    {
		
		
	
     
     
	   $productdata = medicine::where('softdelete', 0)->orderBy('name')->get(); 
	   
	  
	  
		 
		 $Productcompany = medicinecomapnyname::where('softdelete', 0)->orderBy('name')->get();

			
            return response()->json(['Productcompany' => $Productcompany ,   'productdata' => $productdata]);

	   
	   
	   
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
	
	 	'company_Id',
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
'type',
		
		
    ]);
		

	$company =      medicinecomapnyname::findOrFail($request->company_Id);	
	
	$dueamount = $company->due + $request->due;
		

		
		//////////////////////////////////////////////////// insert shuru ///////////////////////
		
		
		 $serialno = productcompanyorder::where('medicinecomapnyname_id',$request->company_Id)->orderBy('id', 'desc')->first();

 if ($serialno== '')
 {
	 $serial=1;
 }
 else{
$serial= $serialno->serialno+1;
 }		
		
		
		
		
		if($request->type == 1)
		{
		$productorder = new productcompanyorder(); 
		$productorder->user_id  = auth()->user()->id ; //$request->sellerid;
	$productorder->medicinecomapnyname_id  = $request->company_Id;
	$productorder->serialno  = $serial;
	$productorder->amount  = $request->grossamount; 
		
	$productorder->discount  = $request->discountatend;
		$productorder->amountafterdiscount	  = $request->totalamount;
	$productorder->comment  =$request->comment; 
	$productorder->debit  = $request->due;
	$productorder->credit  = $request->paid;
	$productorder->balance  =  $request->due + $company->due; 
	$productorder->type  = 1;
	
		

	
	
	
	$due = $request->due;
	$id= $request->company_Id;
	

	$dueamount = $company->due + $request->due;


//// update patient due 
medicinecomapnyname::where('id', $request->company_Id )
       ->update([
           'due' => $dueamount
        ]);

/////////// update company balance 
  
  
  
  $balance =  balance_of_business::first();
  

  
  
   balance_of_business::where('id',  1)
  ->update(['balance' =>(   $balance->balance - $request->paid )  ]);	

	$productorder->save();
	
	
// cashtransition

	

    $order_id = $productorder->id;

    for ($product_id = 0; $product_id < count($request->medicine_name); $product_id++ ) 

	{

		
		
		
		       
		
		
		
       $producttransition = new productcompanytransition; 
	   $producttransition->productcompanyorder_id = $order_id;
	    $producttransition->medicinecomapnyname_id = $request->company_Id;

$producttransition->user_id  = auth()->user()->id ; 

	   $producttransition->medicine_id = $request->medicine_name[$product_id]; // asole medicine_name[] er vetore id neya hoyeche. form bananor somoy name lekha hoyechecilo pore ar change kora hoy nai 
	    
  $producttransition->unirprice =  $request->unit_price[$product_id]; 
		$producttransition->quantity = $request->quantity[$product_id];
		
		
		 
		 
		  $quantity =  $request->quantity[$product_id];

	 
	
		
		
		 medicine::where('id',$request->medicine_name[$product_id] )->increment('stock',$quantity );
		 
		 
	
		 
		 $qun= $request->quantity[$product_id];
		 
		
		
				 
		
		// $producttransition->amount =  $request->adjust[$product_id];
		


	  $qun= $request->quantity[$product_id];
		 		 if ($request->percentofdicountontaotal > 0)
		 {
			  
			 $discount = (($request->unit_price[$product_id] * $qun)* ($request->percentofdicountontaotal/100) ) ; 
			
		
             $amount = ($request->unit_price[$product_id] * $qun) - $discount; 
			 
			 $producttransition->discountpercentage = $request->percentofdicountontaotal;
			 $producttransition->discount	 = $discount;
			
			
		     $producttransition->amount = $request->amount[$product_id];
		 $producttransition->finalamountafterdiscount = $amount;
			 
		}	 else {
				 
		 $producttransition->discountpercentage = $request->discount[$product_id];
		 $producttransition->discount	 = $request->totaldiscount[$product_id];
		 $producttransition->amount = $request->amount[$product_id];
		  $producttransition->finalamountafterdiscount	 = $request->adjust[$product_id];
		 }



		 

		  $producttransition->save(); 
		 
	


	}		
		
				
		}	
		
		
		
	
// retun product to company 

		if($request->type == 3)
		{
			     
		$productorder = new productcompanyorder(); 
		$productorder->user_id  = auth()->user()->id ; //$request->sellerid;
	$productorder->medicinecomapnyname_id  = $request->company_Id;
	$productorder->serialno  = $serial;


		$productorder->amount  = $request->grossamount; 
	
	
	
	
	$productorder->discount  = $request->discountatend;
		$productorder->amountafterdiscount	  = $request->totalamount;
	
	
	
	
	$productorder->comment  =$request->comment; 
	$productorder->debit  = 0;
	$productorder->credit  = $request->totalamount; 
	$productorder->balance  =   $company->due - $request->totalamount; 
	$productorder->type  = 3;
	
		

	
	
	
	$due = $request->due;
	$id= $request->company_Id;
	

	$dueamount = $company->due - $request->totalamount; 


//// update company due 
   medicinecomapnyname::where('id', $request->company_Id )
       ->update([
           'due' => $dueamount
        ]);


	$productorder->save();
	
	

	
	
	
	
	
	
	
	
	
	
	
	

    $order_id = $productorder->id;

    for ($product_id = 0; $product_id < count($request->medicine_name); $product_id++ ) 

	{

		
		
		
		       
		
		
		
       $producttransition = new productcompanytransition; 
	   $producttransition->productcompanyorder_id = $order_id;
	    $producttransition->medicinecomapnyname_id = $request->company_Id;
	 $producttransition->user_id =  auth()->user()->id ;
	
	

	 
	   $producttransition->medicine_id = $request->medicine_name[$product_id]; // asole medicine_name[] er vetore id neya hoyeche. form bananor somoy name lekha hoyechecilo pore ar change kora hoy nai 
	    
  $producttransition->unirprice =  $request->unit_price[$product_id]; 
		$producttransition->quantity = $request->quantity[$product_id];
		
		
		
		  $quantity =  $request->quantity[$product_id];
				 
				 

	 

		
		
		
		
		
		
		
		 medicine::where('id',$request->medicine_name[$product_id] )->decrement('stock',$quantity );
		 
		 
	
		 
		
		 	  $qun= $request->quantity[$product_id];
		 		 if ($request->percentofdicountontaotal > 0)
		 {
			  
			 $discount = (($request->unit_price[$product_id] * $qun)* ($request->percentofdicountontaotal/100) ) ; 
			
		
             $amount = ($request->unit_price[$product_id] * $qun) - $discount; 
			 
			 $producttransition->discountpercentage = $request->percentofdicountontaotal;
			 $producttransition->discount	 = $discount;
			
			
		     $producttransition->amount = $request->amount[$product_id];
		 $producttransition->finalamountafterdiscount = $amount;
			 
		}	 else {
				 
		 $producttransition->discountpercentage = $request->discount[$product_id];
		 $producttransition->discount	 = $request->totaldiscount[$product_id];
		 $producttransition->amount = $request->amount[$product_id];
		  $producttransition->finalamountafterdiscount	 = $request->adjust[$product_id];
		 }
		
		
				 
		
		 $producttransition->amount =  $request->adjust[$product_id];
		

		 

		  $producttransition->save(); 
		 
	


	}		
		
				
		}	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

});	





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
           /*      $data = productcompanyorder::with('productcompanytransition','Productcompany','user')->findOrFail($id);


	  $i = $data->productcompany_id;
$presentdue = Productcompany::findOrFail($data->productcompany_id)->due;

 Productcompany::where('id', $i )
  ->update(['due' =>(   $presentdue - $data->debit )  ]);	

/////////// update company balance 
  
      $shopid = Auth()->user()->balance_of_business_id;
  
  $balance =  balance_of_business::findOrFail($shopid);
  

  
  
   balance_of_business::where('id',  $shopid)

  ->update(['balance' =>(   $balance->balance + $data->credit )  ]);	

				
				 foreach ($data->productcompanytransition as $d)
				 {
					  $unitconverter= unitcoversion::findOrFail($d->buyingunit )->coversionamount;
		  $quantity = $unitconverter * $d->quantity;
		
					 
	 product::where('id',$d->product_id )->decrement('stock',$quantity );				 
					 
				 }

		$producttransition= productcompanytransition::where('productcompanyorder_id', $id )->delete();
		
			 cashtransition::where('productcompanyorder_id', $id )->delete();
		
	
        
		$data->delete();
	   
	   
	   

	   
	  return response()->json(['success' => 'Reverse entry added successfully .']);   
	  
	  */
    }
}

