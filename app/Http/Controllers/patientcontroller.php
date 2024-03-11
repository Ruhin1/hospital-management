<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reportorder;  
use App\Models\patient;
use App\Models\order;
use App\Models\serviceorder;
use App\Models\surgerytransaction;
use App\Models\cabinefeetransition;
use App\Models\duetransition;
use App\Models\cabinetransaction;
use App\Models\doctorappointmenttransaction;
use App\Models\cabinelist;
use DataTables;
use Validator;
use BPDF; // barrydom pdf 
use PDF; // mpdf
class patientcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 

/*		
	
	  public function index()
    {
		

        if(request()->ajax())
        {
            return datatables()->of(patient::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
						 ->editColumn('created_at', function($data) {
                    return  $data->created_at->diffForhumans();
                })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('patient.patient');
    }
	 
	 
	 
	 
	 */
 
    public function index(Request $request)
    {
      $patient=  patient::select('name','mobile','address','id')->latest()->get();
	  
	
	  
	        if ($request->ajax()) {
                $patient=  patient::select('name','mobile','address','id')->latest()->get();
            return Datatables::of($patient)
                   ->addIndexColumn()
                    ->addColumn('action', function( patient $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })  
					 ->editColumn('created_at', function(patient $data) {
                    
                    return date('d/m/y', strtotime($data->created_at) );
                })
					
					
					->editColumn('pdf', function ($patient) {
                return '<a   target="_blank"      href="'.route('patientlist.pdf', $patient->id).'">Print</a>';
            })
				

					
					
                    ->rawColumns(['action','pdf'])
                    ->make(true);
					
					

        }
      
        return view('patient.patient', compact('patient'));   

    }



    public function fetchlist()
    {
        $patient=  patient::select('name','mobile','id')->latest()->get();


      return view('patient.fetchpatient', compact('patient')); 


    }

    public function fetcthrecord(Request $request){


        $patient = patient::findOrFail($request->patient);
        $order=  reportorder::where('patient_id', $request->patient )->latest()->get();
        $appointment=  doctorappointmenttransaction::where('patient_id', $request->patient )->latest()->get();
	
        $medorder=  order::where('patient_id', $request->patient )->latest()->get();
	    $duetransition= duetransition::where('patient_id', $request->patient )->where(function ($query) {
            $query->where('transitiontype', 1)
                ->Orwhere('transitiontype', 3 )
                        ->Orwhere('transitiontype', 6);
        })->latest()->get(); 
        $admit_patient= cabinetransaction::where('patient_id', $request->patient )->latest()->get();
        $advancedeposit= duetransition::where('patient_id', $request->patient ) ->where('transitiontype',5)->where('amount', '>', 0 )->latest()->get(); 
        $serviceorder=  serviceorder::where('patient_id', $request->patient )->latest()->get();
        $surgerytransaction= surgerytransaction::where('patient_id', $request->patient )->latest()->get();
        return view('patient.record', compact('order','appointment','medorder','duetransition','serviceorder','surgerytransaction','advancedeposit','admit_patient','patient' )); 

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



public function printpdfforintroductoryslip($id)
{
	

	$data= patient::findOrFail($id);

    $pdf = PDF::loadView('patient.introductoryslip', compact('data' ),
    [], [
  'mode'                     => '',
     'format'                   => 'A5',
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        $rules = array(
            'name'    =>  'required',
            'address'     =>  'required',
            'mobile'         =>  'required',
			'age'         =>  'required',
			'sex'         =>  'required',
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
		   'age' =>$request->age,
		   'sex' =>$request->sex,
        );

        patient::create($form_data);

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
            $data = patient::findOrFail($id);
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
					'age' => 'required',
						'sex' => 'required',
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
			 'age'            =>   $request->age,
			  'sex'            =>   $request->sex,
        );
        patient::whereId($request->hidden_id)->update($form_data);
		
	cabinelist::where('patient_id', $request->hidden_id)->update(['patientname' => $request->name]);

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
	   
	                 patient::whereId($id)
  ->update(['softdelete' => '1']);  //softdelete 
	   
    }
}
