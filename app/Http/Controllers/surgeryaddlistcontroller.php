<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\surgerylist;


use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Validator;

class surgeryaddlistcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     // $medicine=  medicine::latest()->get();
	  
	
	  $surgerylist=  surgerylist::where('softdelete', 0 )->latest()->get();
	
	  
	        if ($request->ajax()) {
				$surgerylist=  surgerylist::where('softdelete', 0 )->latest()->get();
            //$medicine =  medicine::latest()->get();
            return Datatables::of($surgerylist)
                   ->addIndexColumn()
				   

                    ->addColumn('action', function( surgerylist $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button> <br>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })  
                
					
					
                    ->rawColumns(['action'])
                    ->make(true);
        }
		

		return view('surgerylist.surgerylist', compact('surgerylist'));   
	
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
            'pre_operative_charge'=>  'required',
			  'Surgeon_charge'=>  'required',
			    'anesthesia_charge'=>  'required',
				  'assistant_charge'=>  'required',
				    'ot_charge'=>  'required',
					  'o2_no2_charge'=>  'required',
					    'c_arme_charge'=>  'required',
						'post_operative_charge'=>  'required',
            
			
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       

        $form_data = array(
            'name'    =>  $request->name,
            'pre_operative_charge'=>  $request->pre_operative_charge,
			  'Surgeon_charge'=>  $request->Surgeon_charge,
			    'anesthesia_charge'=>  $request->anesthesia_charge,
				  'assistant_charge'=>  $request->assistant_charge,
				    'ot_charge'=>  $request->ot_charge,
					  'o2_no2_charge'=>  $request->o2_no2_charge,
					    'c_arme_charge'=> $request->c_arme_charge,
						'post_operative_charge'=>  $request->post_operative_charge,
            
        );

        surgerylist::create($form_data);

        Log::channel('sarjaribibag')->info('New patients added for surgery',
[
    'massage'=> 'New patients added for surgery',
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
			//$data=  medicine::with('medicine_category')->findOrFail($id);
            $data = surgerylist::findOrFail($id);
			
			 
            return response()->json(['data' => $data ,  ]);
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
            'pre_operative_charge'=>  'required',
			  'Surgeon_charge'=>  'required',
			    'anesthesia_charge'=>  'required',
				  'assistant_charge'=>  'required',
				    'ot_charge'=>  'required',
					  'o2_no2_charge'=>  'required',
					    'c_arme_charge'=>  'required',
						'post_operative_charge'=>  'required',
            
			
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       

        $form_data = array(
            'name'    =>  $request->name,
            'pre_operative_charge'=>  $request->pre_operative_charge,
			  'Surgeon_charge'=>  $request->Surgeon_charge,
			    'anesthesia_charge'=>  $request->anesthesia_charge,
				  'assistant_charge'=>  $request->assistant_charge,
				    'ot_charge'=>  $request->ot_charge,
					  'o2_no2_charge'=>  $request->o2_no2_charge,
					    'c_arme_charge'=> $request->c_arme_charge,
						'post_operative_charge'=>  $request->post_operative_charge,
            
        );
        surgerylist::whereId($request->hidden_id)->update($form_data);

        Log::channel('sarjaribibag')->info('Updated information on patients undergoing surgery.',
        [
            'massage'=> 'Updated information on patients undergoing surgery.',
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
        $data = surgerylist::find($id);
        Log::channel('sarjaribibag')->info('সার্জারী করা রোগীর তথ্য ডিলিট করা হয়েছে।',
        [
            'massage'=> 'সার্জারী করা রোগীর তথ্য ডিলিট করা হয়েছে।',
            'employee_details'=> Auth::user(),
            'Info'=>  $data,
        ]);
			surgerylist::whereId($id)
  ->update(['softdelete' => '1']);  //softdelete 

        // $data = surgerylist::findOrFail($id);
       // $data->delete();
    }
}
