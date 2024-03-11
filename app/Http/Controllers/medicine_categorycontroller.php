<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\medicine_category;
use DataTables;
use Validator;

class medicine_categorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
      $medicine_category=  medicine_category::where('softdelete',0)->latest()->get();
	  
	
	  
	        if ($request->ajax()) {
            $medicine_category =  medicine_category::where('softdelete',0)->latest()->get();
            return Datatables::of($medicine_category)
                   ->addIndexColumn()
                    ->addColumn('action', function( medicine_category $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })  

					
					
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('medicine_category.medicine_category', compact('medicine_category'));   

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
           
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       

        $form_data = array(
            'name'        =>  $request->name,
           
        );

        medicine_category::create($form_data);

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
            $data = medicine_category::findOrFail($id);
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
               
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
       

        $form_data = array(
            'name'       =>   $request->name,
            
        );
       medicine_category::whereId($request->hidden_id)->update($form_data);

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
        //$data = medicine_category::findOrFail($id);
       // $data->delete();
	   
	   	medicine_category::whereId($id)
  ->update(['softdelete' => '1']);
	   
	   
    }
}
