<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sharepartner; 
use DataTables;
use Validator;
class CreatePartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
      $sharepartner=  sharepartner::where('softdelete', 0)->latest()->get();
	  
	
	  
	        if ($request->ajax()) {
            $sharepartner =  sharepartner::where('softdelete', 0)->latest()->get();
            return Datatables::of($sharepartner)
                   ->addIndexColumn()
                    ->addColumn('action', function( sharepartner $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })  
			
					
		
				

					
					
                    ->rawColumns(['action'])
                    ->make(true);
					
					

        }
      
        return view('partner.partner', compact('sharepartner'));   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        $rules = array(
            'name'    =>  'required',
            'address'     =>  'required',
            'mobile'         =>  'required',
           
		
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       

        $form_data = array(
            'name'        =>  $request->name,
            'mobile'         =>  $request->mobile,
           'address' =>$request->address,
        
		  
        );

        sharepartner::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 

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
            $data = sharepartner::findOrFail($id);
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
                'mobile'     =>  'required',
				'address' => 'required',
					
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
       

        $form_data = array(
            'name'       =>   $request->name,
            'mobile'        =>   $request->mobile,
            'address'            =>   $request->address,
			
        );
        sharepartner::whereId($request->hidden_id)->update($form_data);

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
       // $data = patient::findOrFail($id);
       // $data->delete();
	   
	                 sharepartner::whereId($id)
  ->update(['softdelete' => '1']);  //softdelete 
	   
    }
}
