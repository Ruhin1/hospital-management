<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\medicinecomapnyname; 
use App\Models\User;

use App\Models\cashtransition;

use App\Models\medicine_comapnyer_dena_pawan_shod; 
use DataTables;
use Validator;
use App\Models\balance_of_business;
use DB;

class medicineComapnyrDenaPawnaShodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(Request $request)
    {
                  $medicinecomapnytrans =  medicine_comapnyer_dena_pawan_shod::with('medicinecomapnyname','User')->latest()

			  ->get();
	  
	
	  
	        if ($request->ajax()) {
				
         $medicinecomapnytrans =  medicine_comapnyer_dena_pawan_shod::with('medicinecomapnyname','User')->latest()

			  ->get();
            
			
			
			
			return Datatables::of($medicinecomapnytrans)
                   ->addIndexColumn()
                    ->addColumn('action', function( medicine_comapnyer_dena_pawan_shod $data){ 
   
                        //  $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button><br>';
                      //  $button .= '&nbsp;&nbsp;';
                        $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                        
						
					
                    })  
	
				

                   ->addColumn('company', function (medicine_comapnyer_dena_pawan_shod $medicinecomapnytrans) {
                    return $medicinecomapnytrans->medicinecomapnyname->name;
                })
				  

				  
				       ->addColumn('entryby', function (medicine_comapnyer_dena_pawan_shod $medicinecomapnytrans) {
                    return $medicinecomapnytrans->User->name;
                })
				
				
				
				       ->addColumn('transitiontype', function (medicine_comapnyer_dena_pawan_shod $medicinecomapnytrans) {
                   
if ($medicinecomapnytrans->transitiontype == 1)
{
				   return "কোম্পানিকে বাকি শোধ বাবদ টাকা প্রদান ";
				   
}
else{
  return "কোম্পানিকে দেয়া এডভান্সের বিপরীতে পণ্য বুঝে পাওয়া  ";	
	
}


                })				
				
				
                 ->editColumn('created_at', function(medicine_comapnyer_dena_pawan_shod $data) {
					
					 return date('d/m/y', strtotime($data->created_at) );
                    
                })
				















					
					
                    ->rawColumns(['action','created_at'])
                    ->make(true);
					
					

        }
      
        return view('Company_dena_pawna_shod.duetrans', compact('medicinecomapnytrans'));   

    }
	
	
	
	
	
	
	
	public function dropdown_list()
	{
		 $medicinecomapnyname=  medicinecomapnyname::where('softdelete', 0)->orderBy('name')->get();
		 return response()->json(['medicinecomapnyname' => $medicinecomapnyname ]);
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
        //
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




    public function medcinercompanydenapawanshod(Request $request){
	
     
            $rules = array(
               
                'amount'     =>  'required',
				'comment',
				'transitiontype' => 'required',
				'Date_of_Transition',
				'company'
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
         //DB::beginTransaction();
	   $medicinecomapnyname=  medicinecomapnyname::findOrFail($request->company);
	 
//////////////////////// jodi dhar shod hoy 	  
	   If ( $request->transitiontype == 1 )
	   {
	   $amount_of_current_due = $medicinecomapnyname->due - $request->amount ; 
	          $form_data = array(
            
            'due'        =>   $amount_of_current_due,
            
        );
        medicinecomapnyname::whereId($request->company)->update($form_data);

	  
	 	 			     /////////////update balance 
  
   $balance = balance_of_business::first();  
   $present_balance = $balance->balance - $request->amount ;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
		 
	/////////////////////////update complete    
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	  }
	  //////////////////////// jodi advance shod hoy 
	   else{
		  $amount_of_current_advance = $medicinecomapnyname->advance - $request->amount ;   
	   	          $form_data = array(
            
            'advance'        =>   $amount_of_current_advance,
            
        );
        medicinecomapnyname::whereId($request->company)->update($form_data);
	   
	   
	   	 	 			     /////////////update balance 
  
   $balance = balance_of_business::first();  
   $present_balance = $balance->balance + $request->amount ;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);
		 
	   
	   
 
	   }


		
		$medicine_comapnyer_dena_pawan_shod = new medicine_comapnyer_dena_pawan_shod();
		$medicine_comapnyer_dena_pawan_shod->medicinecomapnyname_id		= $request->company;
		$medicine_comapnyer_dena_pawan_shod->user_id	= Auth()->User()->id;
		$medicine_comapnyer_dena_pawan_shod->amount	= $request->amount;
		$medicine_comapnyer_dena_pawan_shod->transitiontype	= $request->transitiontype;
		$medicine_comapnyer_dena_pawan_shod->comment	= $request->comment;
		
	
       $medicine_comapnyer_dena_pawan_shod->created_at = $request->Date_of_Transition;
		
		$medicine_comapnyer_dena_pawan_shod->save();
		
		
		
	if ($request->transitiontype == 1)	
	{
			$medicinecomapnyname = 	medicinecomapnyname::findOrFail($request->company)->name;
		
		$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->medicine_comapnyer_dena_pawan_shod_id = $medicine_comapnyer_dena_pawan_shod->id;


$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->amount;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->amount;
$cashtransition->withdrwal = $request->amount;
$cashtransition->debit =  0 ;
$cashtransition->credit = 0  ;
$cashtransition->description = "Money Withdrawl for paying Due to Medicine Company : " .$medicinecomapnyname. " Medicine Comapny Duepayment Transitions ID : " .$medicine_comapnyer_dena_pawan_shod->id.  " Data Entry By: " .$user_name ;
$cashtransition->company_type = 2; 


$cashtransition->transitionproducttype = 19; 
$cashtransition->save();
		
	}	
		
		
		
		
		
		
		
		
		
		
		
      // DB::commit();
        return response()->json(['success' => 'Data is successfully updated']);	
		
	}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicine_company = medicinecomapnyname::findOrFail($id);
		return response()->json(['data'=> $medicine_company ]); 
		
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
        
		
		
                  $medicinecomapnytrans =  medicine_comapnyer_dena_pawan_shod::findOrFail($id);		
		
		$company = medicinecomapnyname::findOrFail($medicinecomapnytrans->medicinecomapnyname_id);
		
		if ($medicinecomapnytrans->transitiontype == 1 )
		{
		
	   $amount_of_current_due = $company->due +  $medicinecomapnytrans->amount ; 
	          $form_data = array(
            
            'due'        =>   $amount_of_current_due,
            
        );
        medicinecomapnyname::whereId($medicinecomapnytrans->medicinecomapnyname_id)->update($form_data);

	  
	 	 			     /////////////update balance 
  
   $balance = balance_of_business::first();  
   $present_balance = $balance->balance +  $medicinecomapnytrans->amount ;	    
   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);

$m =	cashtransition::where('medicine_comapnyer_dena_pawan_shod_id', $id)->first();	

$m->delete();
			
		}
		
		
		if ($medicinecomapnytrans->transitiontype == 2 )
		{
		
	   $amount_of_current_due = $company->advance +  $medicinecomapnytrans->amount ; 
	          $form_data = array(
            
            'advance'        =>   $amount_of_current_due,
            
        );
        medicinecomapnyname::whereId($medicinecomapnytrans->medicinecomapnyname_id)->update($form_data);



		
			
		}		
		
	     $medicinecomapnytrans->delete();	
		
   return response()->json(['success' => 'Data is Deleted']);			
		
    }
}
