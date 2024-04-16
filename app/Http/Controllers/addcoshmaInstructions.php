<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\coshma;
use DataTables;
use Validator;


class addcoshmaInstructions extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
   public function index(Request $request)
   {
      $prescriptionusages=  coshma::where('softdelete',0)->latest()->get();
	  
	
	  
	        if ($request->ajax()) {
            $prescriptionusages =  coshma::where('softdelete',0)->latest()->get();
            return Datatables::of($prescriptionusages)
                   ->addIndexColumn()
                   ->addColumn('type', function(coshma $data){ 
                    
                    if($data->type == 1){
                        return 'Instructions';
                    }
                    if($data->type == 2){
                        return 'Type';
                    }
                    if($data->type == 3){
                        return 'Color';
                    }
                    if($data->type == 4){
                        return 'Remarks';
                    }
                    
                   
              }) 
                    ->addColumn('action', function(coshma $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })  

					
					
                    ->rawColumns(['action','type'])
                    ->make(true);
        }
      
        return view('coshma.coshmainstructions', compact('prescriptionusages'));    

    }

    
     public function store(Request $request)
    {
        $rules = array(
            'name'    =>  'required',
            'type'    =>  'required',
           
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       

        $form_data = array(
            'value'        =>  $request->name,
            'type'        =>  $request->type, 
           
        );

        coshma::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }


  
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = coshma::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

   
   public function update(Request $request) 
    {
  
        
            $rules = array(
                'name'    =>  'required',
                'type'    =>  'required',
               
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
       

        $form_data = array(
            'value'       =>   $request->name,
            'type'       =>   $request->type,
            
        );

       coshma::whereId($request->hidden_id)->update($form_data); 

        return response()->json(['success' => 'Data is successfully updated']);
    }

    
    public function destroy($id)
    {

	   
	   	coshma::whereId($id)
  ->update(['softdelete' => '1']);
	   
	   
    }
}

