<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\doctor; 

use App\Models\doctorappointmenttransaction; 

use App\Models\duetransition;
use App\Models\agentdetail;
use App\Models\user; 
use App\Models\dentalserviceodermoney_deposit; 

use App\Models\medicinetransition;  

use App\Models\longterminstallerorder; 

use DataTables;
use Validator;
use App\Models\balance_of_business; 

use App\Models\patient;
use App\Models\dentalservice;


Use \Carbon\Carbon;
use DateTime;
use PDF; 





class dentalservicecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
   public function index(Request $request)
    {
        
      $dentalservice =  dentalservice::where('softdelete',0)->orderBy('name')->get();
	  
	
	  
	        if ($request->ajax()) {
                
     $dentalservice =  dentalservice::where('softdelete',0)->orderBy('name')->get();
            return Datatables::of($dentalservice)
                   ->addIndexColumn()
                    ->addColumn('action', function( dentalservice $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })  

					
					
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('dentalservice.dentalservice', compact('dentalservice'));   

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




		    public function dropdown_list()
    {
		

       $doctor = doctor::where('softdelete', '!', '1' )->get(); 
	    $agent = agentdetail::where('softdelete',  '0' )->get(); 
		$dentalservice = dentalservice::where('softdelete',  '0' )->get(); 

	          $patientdata = patient::where('softdelete', 0)->orderBy('name')->get(); 
			  
			  
			
			  

            return response()->json(['patientdata' => $patientdata ,  'medicinedata'=> $dentalservice,  'agent'=> $agent, 'doctor' => $doctor]);
	 
 
    }






	public function installment($id)
	{
	  $longterminstallerorder = longterminstallerorder::where('patient_id', $id )->get();	
	
	             return response()->json(['longterminstallerorder' => $longterminstallerorder ]);
	 
	  
	  
	  
		
	}



public function fetchpatorder (Request $request)
{
	$longterminstallerorder = longterminstallerorder::findOrFail($request->installment_order);
	  $dentalserviceodermoney_deposit = dentalserviceodermoney_deposit::where('longterminstallerorder_id',$request->installment_order  )->get();
	
		 	 $pdf = PDF::loadView('doctortransaction.unfinishedpatient', compact('longterminstallerorder','dentalserviceodermoney_deposit'),
   [], [
 'mode'                     => '',
	'format'                   => 'A4',
	'default_font_size'        => '8',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
]
   
   
   );
	 
	 
	 
	 
	 
    return $pdf->stream('invoice.pdf');
	
	
	
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
			'unitprice'=> 'required',
           
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       

        $form_data = array(
            'name'        =>  $request->name,
			'unitprice' =>  $request->unitprice,
           
        );

        dentalservice::create($form_data);

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



public function Paitent_unfini()
{
	
		
		
		return view('doctortransaction.unfisnished_patient');   
	
	
}




















public function unfinished()
{


  
		
		


$longterminstallerorder = longterminstallerorder::with('doctor','patient','agentdetail')->where('flag', 0 )->get();
 



	   $pdf = PDF::loadView('doctortransaction.unifinishedjob', compact('longterminstallerorder'),
   [], [
 'mode'                     => '',
	'format'                   => 'A4',
	'default_font_size'        => '8',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
]
   
   
   );


	 return $pdf->stream('document.pdf');

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
            $data = dentalservice::findOrFail($id);
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
			'unitprice'=> 'required',
           
        );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
       

        $form_data = array(
            'name'        =>  $request->name,
			'unitprice' =>  $request->unitprice,
           
        );

       // dentalservice::create($form_data);
		       dentalservice::whereId($request->hidden_id)->update($form_data);

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
        	   	dentalservice::whereId($id)
  ->update(['softdelete' => '1']);
    }
}
