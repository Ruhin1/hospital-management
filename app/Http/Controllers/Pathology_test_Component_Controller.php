<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\pathology_test_component;
use App\Models\reportlist;

use DataTables;
use Validator;

class Pathology_test_Component_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       	  $pathology_test_component=  pathology_test_component::with('reportlist')
		  ->orderBy(reportlist::select('name')->whereColumn('reportlists.id','pathology_test_components.reportlist_id' ))
		  ->where('softdelete','0')->get();
	


	
	
	
	
	  
	        if ($request->ajax()) {
	       	 
			 $pathology_test_component=  pathology_test_component::with('reportlist')
		  ->orderBy(reportlist::select('name')->whereColumn('reportlists.id','pathology_test_components.reportlist_id' ))
		  ->where('softdelete','0')->get();
			
			
			
			
			
			//$medicine =  medicine::latest()->get();
            return Datatables::of($pathology_test_component)
                   ->addIndexColumn()
				   

                    ->addColumn('action', function( pathology_test_component $data){ 
   
                 
                        $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })  
                    
                                      ->addColumn('testname', function (pathology_test_component $pathology_test_component) {
                    return $pathology_test_component->reportlist->name;
                })
					
					
                    ->rawColumns(['action'])
                    ->make(true);
        }
		

		return view('pathology_test_component.pathology_test_component', compact('pathology_test_component'));   
	
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



    for ($id = 0; $id < count($request->component_name); $id++ ) 
	{
		  	$com = new pathology_test_component(); 
		$com->reportlist_id  = $request->test_id ;
		$com->component_name = $request->component_name[$id];  
        $com->Normalvalue = $request->Normalvalue[$id];	
		$com->unit = $request->unit[$id];       
     	
		$com->save();
		
	}
	
	 return response()->json(['success' => 'Data Added successfully.']);
	
    }



















    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
	 
	    public function  mlist()
    {

	   $reportlist = reportlist::where('softdelete', 0)->orderBy('name')->get(); 
		
            return response()->json(['reportlist' => $reportlist ]);

    } 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
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
            $data = pathology_test_component::findOrFail($id);
			
			  
            return response()->json(['data' => $data , ]);
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
            'component_name'    =>  'required',
            'unit',
           
			'Normalvalue',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       

        $form_data = array(
            'component_name'        =>  $request->component_name,
            
           'unit' =>  $request->unit,
		   'Normalvalue' =>$request->Normalvalue,
        );

 pathology_test_component::whereId($request->hidden_id)->update($form_data);

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
		          pathology_test_component::whereId($id)
  ->update(['softdelete' => '1']);  //softdelete 
		
	

  
    }
}
