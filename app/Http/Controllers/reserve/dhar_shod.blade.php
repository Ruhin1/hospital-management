<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\supplier; 
use App\Models\dhar_shod_othoba_advance_er_mal_buje_pawa; 
use DataTables;
use Validator;
use App\Models\balance_of_business;
use DB;
class dhar_shod_advance_get_Controller extends Controller
{
        public function index(Request $request)
    {
                  $supplier =  supplier::where('softdelete', 0)
			/*->where(function ($query) {
            $query->where('due', '>', 0)
            ->orWhere('advance', '>', 0);
             }) */
			  ->latest()->get();
	  
	
	  
	        if ($request->ajax()) {
				
            $supplier =  supplier::where('softdelete', 0)
			/* ->where(function ($query) {
            $query->where('due', '>', 0)
            ->orWhere('advance', '>', 0);
}) */ 
->latest()->get();
            
			
			
			
			return Datatables::of($supplier)
                   ->addIndexColumn()
                    ->addColumn('action', function( supplier $data){ 
   
                          $button = '<button type="button" name="due_or_advance" id="'.$data->id.'" class="due_or_advance btn btn-primary btn-sm">ধার শোধ / এডভান্স বুঝে পেয়েছেন </button>';
                        $button .= '&nbsp;&nbsp;';
                        
						
						return $button;
                    })  
	
				

					
					
                    ->rawColumns(['action'])
                    ->make(true);
					
					

        }
      
        return view('dhar_advance_shod.index', compact('supplier'));   

    }



   public function baki_shod_othoba_advance_bujhe_pawa(Request $request)
    {
          
            $rules = array(
               
                'amount'     =>  'required',
				'comment',
				'transitiontype' => 'required',
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
         DB::beginTransaction();
	   $supplier=  supplier::findOrFail($request->hidden_id);
	  
//////////////////////// jodi dhar shod hoy 	  
	   If ( $request->transitiontype == 1 )
	   {
	   $amount_of_current_due = $supplier->due - $request->amount ; 
	          $form_data = array(
            
            'due'        =>   $amount_of_current_due,
            
        );
        supplier::whereId($request->hidden_id)->update($form_data);

	  
	 	 			     /////////////update balance 
  
   $balance = balance_of_business::first();  
   $present_balance = $balance->balance - $request->amount ;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
		 
	/////////////////////////update complete    

	  }
	  //////////////////////// jodi advance shod hoy 
	    If ( $request->transitiontype == 2 ){
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
        supplier::whereId($request->hidden_id)->update($form_data);

	  
	 	 			     /////////////update balance 
  
   $balance = balance_of_business::first();  
   $present_balance = $balance->balance + $request->amount ;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
		 
	/////////////////////////update complete    

	  }


		
		$dhar_shod_othoba_advance_er_mal_buje_pawa = new dhar_shod_othoba_advance_er_mal_buje_pawa();
		$dhar_shod_othoba_advance_er_mal_buje_pawa->supplier_id	= $request->hidden_id;
		$dhar_shod_othoba_advance_er_mal_buje_pawa->user_id	= Auth()->User()->id;
		$dhar_shod_othoba_advance_er_mal_buje_pawa->amount	= $request->amount;
		$dhar_shod_othoba_advance_er_mal_buje_pawa->transitiontype	= $request->transitiontype;
		$dhar_shod_othoba_advance_er_mal_buje_pawa->comment	= $request->comment;
		$dhar_shod_othoba_advance_er_mal_buje_pawa->save();
       DB::commit();
        return response()->json(['success' => 'Data is successfully updated']);
    }







}
