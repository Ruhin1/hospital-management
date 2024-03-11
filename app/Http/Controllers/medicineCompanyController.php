<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\medicinecomapnyname;
use DataTables;
use Validator;

class medicineCompanyController extends Controller
{
       public function index(Request $request)
    {
      $medicinecomapnyname=  medicinecomapnyname::where('softdelete', '!' , 1)->latest()->get();
	  
	
	  
	        if ($request->ajax()) {
            $medicinecomapnyname =  medicinecomapnyname::where('softdelete', '!' , 1)->latest()->get();
            return Datatables::of($medicinecomapnyname)
                   ->addIndexColumn()
                    ->addColumn('action', function( medicinecomapnyname $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })  
         
					
					
	
				

					
					
                    ->rawColumns(['action'])
                    ->make(true);
					
					

        }
      
        return view('medicinecomapnyname.medicinecomapnyname', compact('medicinecomapnyname'));   

    }



     public function store(Request $request)
    {
        $rules = array(
            'name'    =>  'required',
            'agent_name',
            'agent_mobile',
			'present_due', 
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       

        $form_data = array(
            'name'        =>  $request->name,
            'agent_name'         =>  $request->agent_name,
           'agent_mobile' =>$request->agent_mobile,
		   'due'=>$request->present_due,
		
        );

        medicinecomapnyname::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }



    public function edit($id)
    {
		
	
        if(request()->ajax())
        {
            $data = medicinecomapnyname::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }


   public function update(Request $request)
    {
  
        
          $rules = array(
            'name'    =>  'required',
            'agent_name',
            'agent_mobile',
			'present_due',
			
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       

        $form_data = array(
            'name'        =>  $request->name,
            'agent_name'         =>  $request->agent_name,
           'agent_mobile' =>$request->agent_mobile,
		   'due'=>$request->present_due,
		
        );
        medicinecomapnyname::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }



    public function destroy($id)
    {
       // $data = patient::findOrFail($id);
       // $data->delete();
	   
	                 medicinecomapnyname::whereId($id)
  ->update(['softdelete' => '1']);  //softdelete 
	   
    }







}
