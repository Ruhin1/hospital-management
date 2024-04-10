<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setting;
use App\Models\agentdetail;
use DataTables;
use Validator;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class agentdetailcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
     public function index(Request $request)
    {
              $employeedetails=  agentdetail::where('softdelete','0')->latest()->get();
	  
	
	  
	        if ($request->ajax()) {
            $employeedetails =  agentdetail::where('softdelete','0')->latest()->get();
            return Datatables::of($employeedetails)
                   ->addIndexColumn()
                    ->addColumn('action', function( agentdetail $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })  
                 ->editColumn('created_at', function(agentdetail $data) {
					
					 return date('d/m/y H:i A', strtotime($data->created_at) );
                    
                })
					
					
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('agentdetail.agentdetail', compact('employeedetails'));   
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
			
			'mobile' => 'required',
			'address' =>  'required',
           'commission_pecentage',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       

        $form_data = array(
            'name'        =>  $request->name,
			
			
		    'commission_pecentage' =>  $request->commission_pecentage,
			'mobile' =>  $request->mobile,
			'address' =>  $request->address,
           
        );

        agentdetail::create($form_data);

        Log::channel('agent')->info('New Agent Added',
[
    'massage'=> 'New Agent Added',
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
            $data = agentdetail::findOrFail($id);
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
			'commission_pecentage',
			'mobile' => 'required',
			'address' =>  'required',
           
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       

        $form_data = array(
            'name'        =>  $request->name,
			
			
			 'commission_pecentage' =>  $request->commission_pecentage,
			'mobile' =>  $request->mobile,
			'address' =>  $request->address,
           
        );


       agentdetail::whereId($request->hidden_id)->update($form_data);

       Log::channel('agent')->info(' Agent Informeation Updated',
       [
           'massage'=> 'Agent Informeation Updated',
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
        $data = agentdetail::find($id);
        Log::channel('agent')->info(' Agent Informeation Delated',
       [
           'massage'=> 'Agent Informeation Delated',
           'employee_details'=> Auth::user(),
           'Info'=> $data,
       ]);
                  agentdetail::whereId($id)
  ->update(['softdelete' => '1']);  //softdelete 
    }
}
