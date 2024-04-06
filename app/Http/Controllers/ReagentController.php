<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reagent;
use DataTables;
use Validator;

class ReagentController extends Controller
{
    public function index(Request $request)
    {	
	 $reagent=  Reagent::where('softdelete',0)->orderBy('name')->get();
	  
	        if ($request->ajax()) {
				$reagent=  Reagent::where('softdelete',0)->orderBy('name')->get();

            return Datatables::of($reagent)
                   ->addIndexColumn()
				   

                    ->addColumn('action', function( Reagent $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })  

		                      ->addColumn('stock', function (Reagent $reagent) {
                    return round($reagent->	quantity);
                })			
					
                    ->rawColumns(['action'])
                    ->make(true);
        }
		

		return view('reagent.reagent', compact('reagent'));   
	
	}


public function edit($id){
    $data = Reagent::find($id);
    return response()->json(['data'=> $data]);
}

public function store(Request $request)
{
$request->validate([
    'name', 'stock',
]);

$reagent = new Reagent();
$reagent->name= $request->name;
$reagent->quantity= $request->stock;
$reagent->save();

if($reagent){
    return response()->json(['success'=>"Data Added Successfully"]);
}else{
    return response()->json(['success'=>"Something Wrong!"]);   
}

}

public function update (Request $request){

 $update=   Reagent::where('id', $request->hidden_id )->update([

        'name'=> $request->name,
        'quantity'=>  $request->stock,
    ]);

    if($update){
        return response()->json(['success'=>"Data updated Successfully"]);
    }else{
        return response()->json(['success'=>"Something Wrong!"]);   
    }
    
    }

    public function delete($id){
        $update=  Reagent::where('id', $id )->update([
            'softdelete'=> 1,          
        ]);   
        if($update){
            return response()->json(['success'=>"Data updated Successfully"]);
        }else{
            return response()->json(['success'=>"Something Wrong!"]);   
        }        
        }








    }











