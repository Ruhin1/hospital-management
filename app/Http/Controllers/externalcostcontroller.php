<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\externalcost;



use App\Models\balance_of_business;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Validator;

class externalcostcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
	
	
	
    {
		
		     $externalcost=  externalcost::latest()->get();
	  
	
	  
	        if ($request->ajax()) {
            $externalcost =  externalcost::latest()->get();
            return Datatables::of($externalcost)
                   ->addIndexColumn()
                    ->addColumn('action', function( externalcost $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })  

			                 ->editColumn('created', function(externalcost $data) {
					
					 return date('d/m/y ', strtotime($data->created_at) );
                    
                })		
					
                    ->rawColumns(['action','created',  ])
                    ->make(true);
        }
      
        return view('externalcost.externalcost', compact('externalcost')); 
		

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
			'amount' =>  'required',
			'Date_of_Transition'  =>  'required',			
			
           
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       
	   
	 $externalcost = new externalcost();
$externalcost->name = 	$request->name;
$externalcost->cost = 	$request->amount;
$externalcost->created_at = 	$request->Date_of_Transition;
   

	$externalcost->save();
	   
	   
	   



	 
	 
	 
	 

  
  $balance =  balance_of_business::first();

   balance_of_business::where('id',  $balance->id)
  ->update(['balance' =>( $balance->balance    - $request->amount  )  ]);	 
		 
		 
	  
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
  Log::channel('kucrakoros')->info('নতুন খুচরা খরছ যুক্ত করা হয়েছে।',
  [
      'massage'=> 'নতুন খুচরা খরছ যুক্ত করা হয়েছে।',
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
        if(request()->ajax())
        {
            $data = externalcost::findOrFail($id);
            return response()->json(['data' => $data]);
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
			'amount' =>  'required',
					'Date_of_Transition'  =>  'required',	
           
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       

        $form_data = array(
            'name'        =>  $request->name,
			

			'cost' =>   $request->amount,
		 'created_at' => 	$request->Date_of_Transition
           
        );
		
		
		
		
		$presentamount = externalcost::findOrFail($request->hidden_id)->cost;
		
		
		
		

  
  $balance =  balance_of_business::first();


if($presentamount > $request->amount )
{
$sub = $presentamount - $request->amount;
$newbalance =   $balance->balance + ( $presentamount - $request->amount ); 
}
else
{
$sub =   $request->amount - $presentamount;
$newbalance =   $balance->balance - (   $request->amount - $presentamount);
	
	
}



   balance_of_business::where('id',  $balance->id)
  ->update(['balance' =>( $newbalance  )  ]);
		
		
		
		
		
		
		
		 externalcost::whereId($request->hidden_id)->update($form_data);
		 
        $form_dataforcash = array(
            
			
	'amount' =>		$request->amount,
			'withdrwal' =>   $request->amount,
		 
           
        );		 
	








	 
		 
		 
		 
        Log::channel('kucrakoros')->info('খুচরা খরছের তথ্য আপডেট করা হয়েছে।',
        [
            'massage'=> 'খুচরা খরছের তথ্য আপডেট করা হয়েছে।',
            'employee_details'=> Auth::user(),
            'Info'=> $request->all(),
        ]);

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
        
                $data = externalcost::findOrFail($id);
				
				

  
  $balance =  balance_of_business::first();

   balance_of_business::where('id',  $balance->id)
  ->update(['balance' =>( $balance->balance    + $data->cost  )  ]);
				
				
  Log::channel('kucrakoros')->info('খুচরা খরছের তথ্য ডিলিট করা হয়েছে।',
  [
      'massage'=> 'খুচরা খরছের তথ্য ডিলিট করা হয়েছে।',
      'employee_details'=> Auth::user(),
      'Info'=> $data,
  ]);
				
        $data->delete(); 
    }
}
