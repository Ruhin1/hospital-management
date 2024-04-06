<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reagent;
use App\Models\reportlist;


use DataTables;
use Validator;

class reportcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       	  $reportlist=  reportlist::where('softdelete','0')->orderby('name')->get();
	
	  
	        if ($request->ajax()) {
				$reportlist=  reportlist::where('softdelete','0')->orderby('name')->get();
            //$medicine =  medicine::latest()->get();
            return Datatables::of($reportlist)
                   ->addIndexColumn()
                   ->addColumn('related_reagents', function ($data) {
                    $relatedReagents = json_decode($data->related_reagents);
                    $reagentNames = [];
        
                    // Get the names of related reagents
                    if (!empty($relatedReagents)) {
                    foreach ($relatedReagents as $reagentId) {
                        $reagent = Reagent::find($reagentId);
                        if ($reagent) {
                            $reagentNames[] = $reagent->name;
                        }
                    }}
        
                    // Combine the names into a comma-separated string
                    return implode(', ', $reagentNames);
                })

                    ->addColumn('action', function( reportlist $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })  
                    
                
					
					
                    ->rawColumns(['action'])
                    ->make(true);
        }
		

		return view('reportlist.reportlist', compact('reportlist'));   
	
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

public function reagentlist()
{
$reagent = Reagent::where('softdelete',0)->orderBy('name')->get();
return response()->json(['data'=> $reagent]);
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
            'reagent_list',
           
			'unitprice'   =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       

        // $form_data = array(
        //     'name'        =>  $request->name,
            
           
		//    'unitprice' =>$request->unitprice,
        // );

        // reportlist::create($form_data);

$test = new reportlist();
$test->name = $request->name;
$test->unitprice = $request->unitprice;
$test->related_reagents = json_encode($request->input('reagent_list'));
$test->save();






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
            $data = reportlist::findOrFail($id);
			
			  
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
            'name'    =>  'required',
           'reagent_list',
           
			'unitprice'   =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }



        $form_data = array(
            'name'        =>  $request->name,
            
           'related_reagents'=>json_encode($request->input('reagent_list')),
		   'unitprice' =>$request->unitprice,
        );

 reportlist::whereId($request->hidden_id)->update($form_data);

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
		          reportlist::whereId($id)
  ->update(['softdelete' => '1']);  //softdelete 
		
	

  
    }
}
