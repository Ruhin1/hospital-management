<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\supplier; 

use App\Models\cashtransition; 

use App\Models\User;

use App\Models\dhar_shod_othoba_advance_er_mal_buje_pawa; 
use DataTables;
use Validator;
use App\Models\balance_of_business;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class dhar_shod_advance_get_Controller extends Controller
{
        public function index(Request $request)
    {

$dhar_shod_trans = dhar_shod_othoba_advance_er_mal_buje_pawa::with('supplier')->latest()->get();
	  
	
	  
	        if ($request->ajax()) {
				
$dhar_shod_trans = dhar_shod_othoba_advance_er_mal_buje_pawa::with('supplier')->latest()->get();
			
			
			
			return Datatables::of($dhar_shod_trans)
                   ->addIndexColumn()
                    ->addColumn('action', function( dhar_shod_othoba_advance_er_mal_buje_pawa $data){ 
   
                          $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        $button .= '&nbsp;&nbsp;';
                        //$button .= '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-info btn-sm">Edit</button>';
                        return $button;
                        
						
					
                    })  
	
				

                      ->addColumn('supplier_name', function (dhar_shod_othoba_advance_er_mal_buje_pawa $data) {
                   


					if($data->supplier->name)
						 return $data->supplier->name;
					 else
						return "NA"; 
				 
                })






                      ->addColumn('type', function (dhar_shod_othoba_advance_er_mal_buje_pawa $data) {
                   


					if($data->transitiontype == 1)
						 return "Due Payment to the Supplier";
					 else if ($data->transitiontype == 2)
						return "Getting service/goods for Advanced Payment to the supplier"; 
				 					 else if ($data->transitiontype == 3)
						return " Supplier Return back Money  "; 
                })















                 ->editColumn('created', function(dhar_shod_othoba_advance_er_mal_buje_pawa $data) {
					
					 return date('d/m/y', strtotime($data->created_at) );
                    
                })





					
					
                    ->rawColumns(['action','created'])
                    ->make(true);
					
					

        }
      
        return view('dhar_advance_shod.index', compact('dhar_shod_trans'));   

    }




		    public function dropdown_list()
    {
		






      
	   
 $supplier = supplier::where('softdelete', '!', '1' )->get(); 
	         

            return response()->json([ 'supplier' => $supplier]);
	 
 
    }






















   public function store(Request $request)
    {
          
            $rules = array(
               
                'amount'     =>  'required',
				'comment',
		
				'supplier',
				'Date_of_Transition'
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
         DB::beginTransaction();
	   $supplier=  supplier::findOrFail($request->supplier);
	  
//////////////////////// jodi dhar shod hoy 	  
	  // If ( $request->transitiontype == 1 )
	  // {
	   $amount_of_current_due = $supplier->due - $request->amount ; 
	          $form_data = array(
            
            'due'        =>   $amount_of_current_due,
            
        );
        supplier::whereId($request->supplier)->update($form_data);

	  
	 	 			     /////////////update balance 
  
   $balance = balance_of_business::first();  
   $present_balance = $balance->balance - $request->amount ;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
		 
	/////////////////////////update complete    

	//  }
	  //////////////////////// jodi advance shod hoy 
	 /*   If ( $request->transitiontype == 2 ){
		  $amount_of_current_advance = $supplier->advance - $request->amount ;   
	   	          $form_data = array(
            
            'advance'        =>   $amount_of_current_advance,
            
        );
        supplier::whereId($request->hidden_id)->update($form_data);
	   
 
	   }
	   	   If ( $request->transitiontype == 3 )
	   {
		  $amount_of_current_advance = $supplier->advance - $request->amount ;   
	   	          $form_data = array(
            
            'advance'        =>   $amount_of_current_advance,
            
        );
		
	
        supplier::whereId($request->supplier)->update($form_data);

	  
	 	 			     /////////////update balance 
  
   $balance = balance_of_business::first();  
   $present_balance = $balance->balance + $request->amount ;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
		 
	/////////////////////////update complete    

	  }

	*/
		
		$dhar_shod_othoba_advance_er_mal_buje_pawa = new dhar_shod_othoba_advance_er_mal_buje_pawa();
		$dhar_shod_othoba_advance_er_mal_buje_pawa->supplier_id	= $request->supplier;
		$dhar_shod_othoba_advance_er_mal_buje_pawa->user_id	= Auth()->User()->id;
		$dhar_shod_othoba_advance_er_mal_buje_pawa->amount	= $request->amount;
		$dhar_shod_othoba_advance_er_mal_buje_pawa->transitiontype	= 1 ; //$request->transitiontype;
		$dhar_shod_othoba_advance_er_mal_buje_pawa->comment	= $request->comment;
			$dhar_shod_othoba_advance_er_mal_buje_pawa->created_at	= $request->Date_of_Transition;
		$dhar_shod_othoba_advance_er_mal_buje_pawa->save();
		
		
$user_name = User::findOrFail(auth()->user()->id)->name;		
		
		$cashtransition = new cashtransition();

$cashtransition->dhar_shod_othoba_advance_er_mal_buje_pawa_id = $dhar_shod_othoba_advance_er_mal_buje_pawa->id;


$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->amount;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->amount;
$cashtransition->withdrwal = $request->amount;
$cashtransition->debit =  0 ;
$cashtransition->credit = 0  ;
$cashtransition->description = "Money Withdrawl for Due Payment to the supplier Name : " .$supplier->name. "Supplier Due Payment Transition ID : " .$dhar_shod_othoba_advance_er_mal_buje_pawa->id. "at the Date: " .$request->Date_of_Transition.  " Data Entry By: " .$user_name ;
$cashtransition->company_type = 2; 


$cashtransition->transitionproducttype = 14; 
$cashtransition->save();
		
		
		
		
		
		
		
		
		
		
		
		
		
Log::channel('borokorosh')->info('সাপ্লায়ার কে টাকা দেওয়া হয়েছে।',
[
    'massage'=> 'সাপ্লায়ার কে টাকা দেওয়া হয়েছে।',
    'employee_details'=> Auth::user(),
	'Info'=> $request->all(),
]);
		
		
       DB::commit();
        return response()->json(['success' => 'Data is successfully updated']);
    }




public function destroy($id)
{
	
	$data = dhar_shod_othoba_advance_er_mal_buje_pawa::findOrFail($id);
	
	
					$supplier = supplier::findOrFail($data->supplier_id );
		$present_due = $supplier->due + $data->amount;
		
	   supplier::where('id', $data->supplier_id)
  ->update(['due' =>$present_due  ]);	
  
  
  $cashtransition = cashtransition::where('dhar_shod_othoba_advance_er_mal_buje_pawa_id', $id)->delete();
  Log::channel('borokorosh')->info('সাপ্লায়ার দের ট্রানজেকশন ডিলিট করা হয়েছে।',
[
    'massage'=> 'সাপ্লায়ার দের ট্রানজেকশন ডিলিট করা হয়েছে।',
    'employee_details'=> Auth::user(),
	'Info'=> $data,
]);
  
  $data->delete();
  
  
		
	
	
	
}

}
