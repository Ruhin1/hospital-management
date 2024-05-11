<?php

namespace App\Http\Controllers;
use App\Models\Reagent; 
use App\Models\ReagentOrder; 
use App\Models\supplier;
use App\Models\setting;
use App\Models\User;
use App\Models\ReagentTransaction;
use DataTables;
use Validator;
use PDF;
use App\Models\cashtransition;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReagentTransactionController extends Controller
{
    public function index(Request $request)
    {
      $ReagentOrder=  ReagentOrder::with('reagent_transaction','supplier')->orderBy('id', 'DESC')->get();
	  	  
	        if ($request->ajax()) {
                $ReagentOrder=  ReagentOrder::with('reagent_transaction','supplier')->orderBy('id', 'DESC')->get();
	  
            return Datatables::of($ReagentOrder)
                   ->addIndexColumn()
                    ->addColumn('action', function( ReagentOrder $data){ 
   
                          $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        $button .= '&nbsp;&nbsp;';
                        
						  $button .= '&nbsp;&nbsp;';
                        return $button;
                    })  
                              


							  ->addColumn('supplier', function (ReagentOrder $order) {
                    return $order->supplier->name;
                })
				
					->addColumn('type', function (ReagentOrder $order) {
                    if( $order->type == 1 )
					{
					return "Purchase";	
					}
				if( $order->type == 2 )
					{
					return "Return Reagents"	;
					}
					
					
                })
					

                 ->editColumn('created', function(ReagentOrder $data) {
					
					 return date('d/m/y', strtotime($data->created_at) );
                    
                })


                ->editColumn('pdf', function ($ReagentOrder) {
                    return '<a   target="_blank"      href="'.route('reagentransaction.pdf', $ReagentOrder->id).'">Print</a>';
                })
				
								
                    ->rawColumns(['action','created','pdf' ])

                    ->make(true);
					
					

        }
      
        return view('reagent_transaction.reagent_transaction', compact('ReagentOrder'));   

    }



    public function dropdown_list(){

$reagent = DB::table('reagents')->where('softdelete',0)->orderBy('name')->get();
$supplier = supplier::where('softdelete',0)->orderBy('name')->get();
return response()->json(['reagent' => $reagent, 'supplier' => $supplier]);		
		 
	 }

     public function store (Request $request){
        
DB::transaction(function () use ($request) {
$request->validate([
    'medicinecomapnyname_id',
    'unit_price',
    'quantity','reagent_name',
   'grossamount','paid','due','transitiontype',

]);

$reagentOrder= new ReagentOrder;
$reagentOrder->price_amount = $request->grossamount;
$reagentOrder->type = $request->transitiontype;
$reagentOrder->paid = $request->paid;
$reagentOrder->due = $request->due;
$reagentOrder->supplier_id = $request->supplier;
$reagentOrder->created_at = $request->date;
$reagentOrder->user_id = Auth()->user()->id;
$reagentOrder->save();




if($request->transitiontype == 1  )
{	
$supplier_due = supplier::findOrFail( $request->supplier)->due;
$present_due = $supplier_due +  $request->due;
supplier::where('id', $request->supplier )->update([
'due'=> $present_due,
]);
}
if($request->transitiontype == 2  )
{
    $supplier_due = supplier::findOrFail( $request->supplier)->due;
    $present_due = $supplier_due -  $request->due;
    supplier::where('id', $request->supplier )->update([
    'due'=> $present_due,]);
}

for( $id=0; $id < count($request->reagent_name); $id++  ){

    if($request->transitiontype == 1  )
    {	
        Reagent::where('id',$request->reagent_name[$id] )->increment('quantity',$request->quantity[$id] );
             
    }
    
    if($request->transitiontype == 2  )
    {	
        Reagent::where('id',$request->reagent_name[$id] )->decrement('quantity',$request->quantity[$id] );
             
    }




$ReagentTransaction = new ReagentTransaction();
$ReagentTransaction->reagent_id = $request->reagent_name[$id];
$ReagentTransaction->reagent_order_id = $reagentOrder->id;
$ReagentTransaction->quantity = $request->quantity[$id];
$ReagentTransaction->price_amount = $request->unit_price[$id];
$ReagentTransaction->created_at = $request->date;
$ReagentTransaction->save();
}
});	
Log::channel('pathologi')->info('Reagent Transaction',
[
    'massage'=> 'Reagent Transaction',
    'Transition_type'=> $request->transitiontype,
    'Transition_info'=> $request->all(),
]);
return response()->json(['success'=>'Data Added successfully']);

     }

 public function printpdf($id)
     {
         $order= ReagentOrder::findOrFail($id);	   
         $data= supplier::findOrFail($order->supplier_id);	
         $user_name = User::find($order->user_id)->name;
         $setting = setting::first();
          $pdf = PDF::loadView('reagent_transaction.bill', compact('data','order','user_name','setting' ),
        [], [
      'mode'                     => '',
         'format'                   => 'A5',
         'default_font_size'        => '7',
         'default_font'             => 'Times-New-Roman',
         'margin_left'              => 7,
         'margin_right'             => 7,
         'margin_top'               => 7,
         'margin_bottom'            => 7,
         'title' => 'Reagent_voucher',
     ]  
        );	
          return $pdf->stream('Reagent_voucher');	
     }



public function delete($id){
    DB::beginTransaction();
    try {
    $request = ReagentOrder::findOrFail($id);

    if($request->type == 1  )
    {	
    $supplier_due = supplier::findOrFail( $request->supplier_id	)->due;
    $present_due = $supplier_due -  $request->due;
    supplier::where('id', $request->supplier_id )->update([
    'due'=> $present_due,
    ]);
    }
    if($request->type == 2  )
    {
        $supplier_due = supplier::findOrFail( $request->supplier_id)->due;
        $present_due = $supplier_due +  $request->due;
        supplier::where('id', $request->supplier_id )->update([
        'due'=> $present_due,]);
    }


foreach($request->reagent_transaction as $r ){

    if($request->type == 1  )
    {	
        Reagent::where('id',$r->reagent_id )->decrement('quantity',$r->quantity );
             
    }
    
    if($request->type == 2  )
    {	
        Reagent::where('id',$r->reagent_id )->increment('quantity',$r->quantity );
             
    }
$r->delete();
}

$request->delete();
DB::commit();
    }
    catch(\Exception $e){

        DB::rollback();
    throw $e;
    }
return response()->json(['success'=>"Record Deleted"]);
}







  
}
