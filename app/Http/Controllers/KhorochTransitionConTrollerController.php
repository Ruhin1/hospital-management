<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\khorocer_khad; 
use App\Models\supplier; 
use App\Models\User; 
use App\Models\khoroch_transition;

use App\Models\cashtransition;
use DateTime;
use PDF;

use DataTables;
use Validator;
use App\Models\balance_of_business; 
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class KhorochTransitionConTrollerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
	 
	
	  $khoroch_transition=  khoroch_transition::with('khorocer_khad','supplier','User')->orderBy('id','DESC')->get();
	


	

	        if ($request->ajax()) {
					  $khoroch_transition=  khoroch_transition::with('khorocer_khad','supplier','User')->orderBy('id','DESC')->get();
           
            return Datatables::of($khoroch_transition)
                   ->addIndexColumn()
				   

                    ->addColumn('action', function( khoroch_transition $data){ 
   
                     
                          $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-info btn-sm">Edit</button>';
                        return $button;
          
						
						
                        

					   return $button;
                    })


					
                   ->addColumn('khorocer_name', function (khoroch_transition $khoroch_transition) {
                    return $khoroch_transition->khorocer_khad->name;
                })
				  
                      ->addColumn('supplier_name', function (khoroch_transition $khoroch_transition) {
                    return $khoroch_transition->supplier->name;
                })
				  
				       ->addColumn('entryby', function (khoroch_transition $khoroch_transition) {
                    return $khoroch_transition->User->name;
                })
				
                 ->editColumn('created_at', function(khoroch_transition $data) {
					
					 return date('d/m/y', strtotime($data->created_at) );
                    
                })
				

					
					
                    ->rawColumns(['action'])
                    ->make(true);
        }
		

		return view('khoroch_transition.khoroch_transition', compact('khoroch_transition'));   
	
	}









    public function sompod(Request $request)
    {
     
	 
	
	  $khoroch_transition=  khoroch_transition::with('khorocer_khad','supplier','User')->latest()->get();
	


	

	        if ($request->ajax()) {
					  $khoroch_transition=  khoroch_transition::with('khorocer_khad','supplier','User')->latest()->get();
           
            return Datatables::of($khoroch_transition)
                   ->addIndexColumn()
				   

                    ->addColumn('action', function( khoroch_transition $data){ 
   
                     
                          $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-info btn-sm">Edit</button>';
                        return $button;
          
						
						
                        

					   return $button;
                    })


					
                   ->addColumn('khorocer_name', function (khoroch_transition $khoroch_transition) {
                    return $khoroch_transition->khorocer_khad->name;
                })
				  
                      ->addColumn('supplier_name', function (khoroch_transition $khoroch_transition) {
                    return $khoroch_transition->supplier->name;
                })
				  
				       ->addColumn('entryby', function (khoroch_transition $khoroch_transition) {
                    return $khoroch_transition->User->name;
                })
				
                 ->editColumn('created_at', function(khoroch_transition $data) {
					
					 return date('d/m/y', strtotime($data->created_at) );
                    
                })
				

					
					
                    ->rawColumns(['action'])
                    ->make(true);
        }
		

		return view('khoroch_transition.sompod', compact('khoroch_transition'));   
	
	}






























		    public function dropdown_list()
    {
		






       $khorocer_khad = khorocer_khad::where('softdelete', '!', '1' )->get(); 
	   
 $supplier = supplier::where('softdelete', '!', '1' )->get(); 
	         

            return response()->json(['khorocer_khad' => $khorocer_khad , 'supplier' => $supplier]);
	 
 
    }
	
	
	
		    public function listkh()
    {
		

       $khorocer_khad = khorocer_khad::where('softdelete', '!', '1' )->get(); 
	   	        
           return view('khoroch_transition.specifictest', compact('khorocer_khad'));   
	 
 
    }	
	
	
	
	public function listfetch(Request $request)
	{
		
        $validator = Validator::make($request->all(), [
            'startdate' => 'required|date|size:10',
        'enddate' => 'date|size:10',
		'reportlist',
		
        ]);
		

		
		if ($validator->fails()) {
            return redirect('picktwodate')
                        ->withErrors($validator)
                        ->withInput();
        }
		
	
		
		        $start = date("Y-m-d",strtotime($request->input('startdate')));
        $end = date("Y-m-d",strtotime($request->input('enddate')));











	  $khoroch_transition=  khoroch_transition::with('khorocer_khad','supplier','User')->where('khorocer_khad_id', $request->khorocer_khad)
	  
	  ->whereBetween('created_at',[$start,$end])    
	  
	  ->orderBy('created_at')->get();
	


      
	
	



$khorocer_khad = khorocer_khad::findOrFail($request->khorocer_khad)->name;




	   $pdf = PDF::loadView('khoroch_transition.specifictestftech', compact('khoroch_transition','start','end','khorocer_khad' ),
   [], [
 'mode'                     => '',
	'format'                   => 'A5',
	'default_font_size'        => '8',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
]
   
   
   );
	
	
	 return $pdf->stream('document.pdf');

		
		
		
	}
	
	
	
	
	public function sompod_pdf(Request $request)
	{
		





$sompod = khorocer_khad::where('quantity', '!=', null )->orderBy('name')->get();




	   $pdf = PDF::loadView('khoroch_transition.sompod_pdf', compact('sompod' ),
   [], [
 'mode'                     => '',
	'format'                   => 'A5',
	'default_font_size'        => '8',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
]
   
   
   );
	
	
	 return $pdf->stream('document.pdf');

		
		
		
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
            'khorocer_khad'    =>  'required',
            'supplier'     =>  'required',
              
            'Date_of_Transition'  =>  'required',
                'amount' =>  'required',  
            'due' ,  				
			'advance', 
			'type',
			'comment',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

   	DB::beginTransaction();    		

$khoroch_transition = new khoroch_transition();

$khoroch_transition->khorocer_khad_id = $request->khorocer_khad;
$khoroch_transition->supplier_id = $request->supplier;
$khoroch_transition->unit = 1;
$khoroch_transition->unit_price = $request->amount;
$khoroch_transition->amount = $request->amount;
$khoroch_transition->due = $request->due;
$khoroch_transition->advance = 0;
$khoroch_transition->user_id = Auth()->User()->id;

$khoroch_transition->comment = $request->comment;

$khoroch_transition->created_at = $request->Date_of_Transition;
$khoroch_transition->save();












 
		
		$supplier = supplier::findOrFail($request->supplier );
		$present_due = $supplier->due + $request->due;
		$present_advance = $supplier->advance + $request->advance;
   
   
   supplier::where('id', $request->supplier)
  ->update(['due' =>$present_due , 'advance' => $present_advance ]);
   
     	 			     /////////////update balance use  	
  
  
 			
  
  $balance =  balance_of_business::first();

 
   if ($request->advance == 0)
   {
   $present_balance = $balance->balance - ($request->amount - $request->due) ;
   }
      if ($request->advance > 0)
   {
   $present_balance = $balance->balance - $request->advance  ;
   }
    balance_of_business::where('id',  1) 
  ->update(['balance' =>$present_balance  ]);
   
   
   

$khorcher_name = khorocer_khad::findOrFail($request->khorocer_khad)->name;
$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->khoroch_transition_id = $khoroch_transition->id;


$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->amount;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->amount;
$cashtransition->withdrwal = $request->amount;
$cashtransition->debit =  0 ;
$cashtransition->credit = 0  ;
$cashtransition->description = "Money Withdrawl for : " .$khorcher_name. " supplier Name : " .$supplier->name. "Expenditur Transition ID : " .$khoroch_transition->id. "at the Date: " .$request->Date_of_Transition.  " Data Entry By: " .$user_name ;
$cashtransition->company_type = 2; 


$cashtransition->transitionproducttype = 13; 
$cashtransition->save();
















   
   
   
   
   
   
   
   
      DB::commit(); 

   
   
       

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\khoroch_transition_conTroller  $khoroch_transition_conTroller
     * @return \Illuminate\Http\Response
     */
	 
	 
	 
	 
	    public function store_sompod(Request $request)
    {
	
         $rules = array(
            'khorocer_khad'    =>  'required',
            'supplier'     =>  'required',
              
            'Date_of_Transition'  =>  'required',
                'amount' =>  'required',  
            'due' ,  				
			'advance', 
			'type',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

   	DB::beginTransaction();    		




$khoroch_transition = new khoroch_transition();

$khoroch_transition->khorocer_khad_id = $request->khorocer_khad;
$khoroch_transition->supplier_id = $request->supplier;
$khoroch_transition->unit = $request->unit;
$khoroch_transition->unit_price = ( $request->amount / $request->unit) ;
$khoroch_transition->amount = $request->amount;
$khoroch_transition->due = $request->due;
$khoroch_transition->type = $request->type;
$khoroch_transition->advance = 0;
$khoroch_transition->user_id = Auth()->User()->id;
$khoroch_transition->created_at = $request->Date_of_Transition;
$khoroch_transition->save();




if ($request->type == 0)
{
	
	$present_qun = khorocer_khad::findOrFail($request->khorocer_khad)->quantity;
	
	$updated_qun = $present_qun + $request->unit;
	
   
   khorocer_khad::where('id', $request->khorocer_khad)
  ->update(['quantity' =>$updated_qun  ]);	
	
	
	
	
}


if ($request->type == 1)
{
	
	$present_qun = khorocer_khad::findOrFail($request->khorocer_khad)->quantity;
	
	$updated_qun = $present_qun - $request->unit;
	
   
   khorocer_khad::where('id', $request->khorocer_khad)
  ->update(['quantity' =>$updated_qun  ]);	
	
	
	
	
}



 
		
		$supplier = supplier::findOrFail($request->supplier );
		$present_due = $supplier->due + $request->due;
		$present_advance = $supplier->advance + $request->advance;
   
   
   supplier::where('id', $request->supplier)
  ->update(['due' =>$present_due , 'advance' => $present_advance ]);
   
     	 			     /////////////update balance use  	
  
  
 			
  
  $balance =  balance_of_business::first();

 
   if ($request->advance == 0)
   {
   $present_balance = $balance->balance - ($request->amount - $request->due) ;
   }
      if ($request->advance > 0)
   {
   $present_balance = $balance->balance - $request->advance  ;
   }
    balance_of_business::where('id',  1) 
  ->update(['balance' =>$present_balance  ]);
   
   
   

$khorcher_name = khorocer_khad::findOrFail($request->khorocer_khad)->name;
$user_name = User::findOrFail(auth()->user()->id)->name;

$cashtransition = new cashtransition();

$cashtransition->khoroch_transition_id = $khoroch_transition->id;


$cashtransition->user_id =  auth()->user()->id ;
$cashtransition->gorssamount = $request->amount;
$cashtransition->discount = 0;	
$cashtransition->amount_after_discount = $request->amount;
$cashtransition->withdrwal = $request->amount;
$cashtransition->debit =  0 ;
$cashtransition->credit = 0  ;
$cashtransition->description = "Money Withdrawl for : " .$khorcher_name. " supplier Name : " .$supplier->name. "Expenditur Transition ID : " .$khoroch_transition->id. "at the Date: " .$request->Date_of_Transition.  " Data Entry By: " .$user_name ;
$cashtransition->company_type = 2; 


$cashtransition->transitionproducttype = 13; 
$cashtransition->save();
















   
   
   
   
   
   
   
   
      DB::commit(); 

      if ($request->advance == 0){

        Log::channel('borokorosh')->info('সম্পদ ক্ষয় করা হয়েছে।',
      [
          'massage'=> 'সম্পদ ক্ষয় করা হয়েছে।',
          'employee_details'=> Auth::user(),
        'Info'=> $request->all(),
      ]);

      }else{
        Log::channel('borokorosh')->info('সম্পদ কনসামিং করা হয়েছে।',
        [
            'massage'=> 'সম্পদ কনসামিং করা হয়েছে।',
            'employee_details'=> Auth::user(),
          'Info'=> $request->all(),
        ]);
        

      }
      

        return response()->json(['success' => 'Data Added successfully.']);
    } 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
    public function show(khoroch_transition_conTroller $khoroch_transition_conTroller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\khoroch_transition_conTroller  $khoroch_transition_conTroller
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
	   
	   	  
	
	  $khoroch_transition=  khoroch_transition::with('khorocer_khad','supplier','User')->where('id', $id )->first();
	



       $khorocer_khad = khorocer_khad::where('softdelete', '!', '1' )->get(); 
	   
 $supplier = supplier::where('softdelete', '!', '1' )->get(); 
	         

            return response()->json(['khorocer_khad' => $khorocer_khad , 'supplier' => $supplier , 'khoroch_transition' => $khoroch_transition  ]);
	 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\khoroch_transition_conTroller  $khoroch_transition_conTroller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    

       $rules = array(
            'khorocer_khad'    =>  'required',
            'supplier'     =>  'required',
     
                'amount' =>  'required',
'Date_of_Transition'=>  'required',				
            'due' ,  				
			'advance', 
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       		

        $form_data = array(
            'khorocer_khad_id' =>  $request->khorocer_khad,
			'supplier_id' => $request->supplier,
		
			'unit_price' =>  $request->amount,
			'amount' =>  $request->amount,
			'due' =>  $request->due,
		'created_at'  =>  $request->Date_of_Transition,
             'user_id' => Auth()->User()->id, 
			'comment'=> $request->comment,
			 
			 
 	 
        );
		
		
		DB::beginTransaction();
		
	$k= khoroch_transition::findOrFail($request->hidden_id );
	 	$supplier = supplier::findOrFail($k->supplier_id );
		$present_due = $supplier->due - $k->due;
		$present_advance = $supplier->advance - $k->advance;
   
   
   supplier::where('id', $k->supplier_id)
  ->update(['due' =>$present_due , 'advance' => $present_advance ]);
   












	 
	

khoroch_transition::where('id', $request->hidden_id )->update($form_data);
	
		$supplier = supplier::findOrFail($request->supplier );
		$present_due = $supplier->due + $request->due;
		$present_advance = $supplier->advance + $request->advance;
   
   
   supplier::where('id', $request->supplier)
  ->update(['due' =>$present_due , 'advance' => $present_advance ]);
   
     	 			     /////////////update balance use  	
  
  
  
  
 			
  
  $balance =  balance_of_business::first();


    
   if ($request->advance == 0)
   {
   $present_balance = $balance->balance + ($k->amount - $k->due) - ($request->amount - $request->due) ;
   }
      if ($request->advance > 0)
   {
   $present_balance = $balance->balance - $request->advance  ;
   }
   balance_of_business::where('id',  1) 
  ->update(['balance' =>$present_balance  ]);
   
   
   
   $khorcher_name = khorocer_khad::findOrFail($request->khorocer_khad)->name;
   $user_name = User::findOrFail(auth()->user()->id)->name;
   
   
 cashtransition::where('khoroch_transition_id', $request->hidden_id)
  ->update(['gorssamount' =>$request->amount , 'amount_after_discount' => $request->amount, 'withdrwal'=> $request->amount ,
  
  
  'description' => "Money Withdrawl for : " .$khorcher_name. " supplier Name : " .$supplier->name. "Expenditur Transition ID : " .$request->hidden_id. "at the Date: " .$request->Date_of_Transition.  " Data Entry By: " .$user_name ,
  
  
  ]); 
   
   
 



  if ($request->advance == 0){

    Log::channel('borokorosh')->info('সম্পদ ক্ষয় আপডেট করা হয়েছে।',
  [
      'massage'=> 'সম্পদ ক্ষয় আপডেট করা হয়েছে।',
      'employee_details'=> Auth::user(),
    'Info'=> $request->all(),
  ]);

  }else{
    Log::channel('borokorosh')->info('সম্পদ ক্ষয় কনসামিং আপডেট করা হয়েছে।',
    [
        'massage'=> 'সম্পদ ক্ষয় কনসামিং আপডেট করা হয়েছে।',
        'employee_details'=> Auth::user(),
      'Info'=> $request->all(),
    ]);
    

  }
   
   
   
      DB::commit(); 

   
   
       

        return response()->json(['success' => 'Data Added successfully.']);





















    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\khoroch_transition_conTroller  $khoroch_transition_conTroller
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        $data = khoroch_transition::findOrFail($id);
		
		
				$supplier = supplier::findOrFail($data->supplier_id );
		$present_due = $supplier->due - $data->due;
		$present_advance = $supplier->advance - $data->advance;
   
   
   supplier::where('id', $data->supplier_id)
  ->update(['due' =>$present_due , 'advance' => $present_advance ]);
   

		/////////////update balance 
  DB::beginTransaction();
   $balance = balance_of_business::first(); 
 if ($data->advance == 0)
 {	 
   $present_balance = $balance->balance + ($data->amount - $data->due) ;    
		
 }	
 
  if ($data->advance > 0)
 {	 
   $present_balance = $balance->balance + $data->advance  ;    
		
 }
		
	   balance_of_business::where('id', 1)
  ->update(['balance' =>$present_balance  ]);	
		
	



cashtransition::where('khoroch_transition_id', $id  )->delete();

Log::channel('borokorosh')->info('সম্পদ ক্ষয় এর ট্রানজেকশন ডিলিট করা হয়েছে।',
[
    'massage'=> 'সম্পদ ক্ষয় এর ট্রানজেকশন ডিলিট করা হয়েছে।',
    'employee_details'=> Auth::user(),
  'Info'=> $data, 
]);

        $data->delete();
    
	 DB::commit();	
	
	}
}
