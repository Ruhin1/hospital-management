<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\pathology_test_component;
use App\Models\reportlist; 
use App\Models\patient; 
use App\Models\User;
use App\Models\makepathologytestreport;   
use App\Models\reportorder;   
use App\Models\doctor; 
use App\Models\agentdetail; 
use DataTables;
use Validator;
use Illuminate\Support\Facades\DB;
Use \Carbon\Carbon;
use DateTime;
use PDF; 

class makepathologyreport extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
     // $medicine=  medicine::latest()->get();
	  
	
	 // $makereport=  makepathologytestreport::with('patient','pathology_test_component','reportlist','User')->latest()
	  
//	->orderBy('reportorder_id') // Ensure records are ordered by report_order_id
//    ->groupBy('reportorder_id') // Group by report_order_id
//    ->get(); 





$makereport = MakePathologyTestReport::with('patient', 'pathology_test_component', 'reportlist', 'User')
    ->select('reportorder_id', DB::raw('MAX(created_at) as latest_created_at')) // Select only the necessary columns and apply aggregate functions
    ->groupBy('reportorder_id') // Group by reportorder_id
    ->orderByDesc('latest_created_at') // Order by the latest created_at for each reportorder_id
    ->get();
	  
	  
  // $makereport=  reportorder::with('makepathologytestreport')->latest()->get();
	 
	  
	        if ($request->ajax()) {
					 // $makereport=  makepathologytestreport::with('patient','pathology_test_component','reportlist','User')->latest()
					  
					  	  
//	->orderBy('reportorder_id') // Ensure records are ordered by report_order_id
  //  ->groupBy('reportorder_id') // Group by report_order_id
//    ->get(); 



$makereport = MakePathologyTestReport::with('patient', 'pathology_test_component', 'reportlist', 'User')
    ->select('reportorder_id', DB::raw('MAX(created_at) as latest_created_at')) // Select only the necessary columns and apply aggregate functions
    ->groupBy('reportorder_id') // Group by reportorder_id
    ->orderByDesc('latest_created_at') // Order by the latest created_at for each reportorder_id
    ->get();
	  

            
           //$makereport=  reportorder::with('makepathologytestreport')->latest()->get();
	 
           
           //$medicine =  medicine::latest()->get();
            return Datatables::of($makereport)
                   ->addIndexColumn()
				   

                    ->addColumn('action', function( makepathologytestreport $data){ 
   
                          $button = '<button type="button" name="delete" id="'.$data->reportorder_id.'"     class="delete btn btn-danger btn-sm">Delete</button>';

          
						
						
                        

					   return $button;
                    })

/* 
					
                      ->addColumn('test_name', function (makepathologytestreport $makereport) {
                    return $makereport->reportlist->name;
                })
				
					->addColumn('component_name', function (makepathologytestreport $makereport) {
                    return $makereport->pathology_test_component->component_name;
                })
				
				       ->addColumn('normal_value', function (makepathologytestreport $makereport) {
                    return $makereport->pathology_test_component->Normalvalue;
                })
				
								       ->addColumn('enteryby', function (makepathologytestreport $makereport) {
                    return $makereport->User->name;
                })
                      ->addColumn('patient_name', function (makepathologytestreport $makereport) {
                    return $makereport->patient->name;
                })
				
             ->editColumn('pdf', function ($makereport) {
                return '<a   target="_blank"      href="'.route('doctortransition.pdf', $makereport->id).'">Print</a>';
            })
				
*/ 


->editColumn('created', function(makepathologytestreport $data) {
					
  return date('d/m/y h:i A', strtotime($data->created_at) );
           
       })

    ->editColumn('pdf', function ($makereport) {
       return '<a   target="_blank"      href="'.route('pathologyreportmaking.pdf', $makereport->reportorder_id).'">Print</a>';
   })








					
					
                    ->rawColumns(['action','pdf','created'])
                    ->make(true);
        }
		

		return view('make_pathological_report.makepathologicalreport', compact('makereport'));   
	
	}
	
	/////////////////////// Print report 
	
	
	public function findreport()
    {
      $makereport=  reportorder::with('makepathologytestreport')->where('status',0)->latest()->paginate(50);
	  
	 
	  return view('make_pathological_report.findreport', compact('makereport'))->with('i', (request()->input('page', 1) - 1) * 50);
	 
	
	} 
	
	
	
		public function findreportforhandoverreport()
    {
      $makereport=  reportorder::with('makepathologytestreport')->where('status',1)->latest()->paginate(50);
	  
	 
	  return view('make_pathological_report.findreportforhandoverreport', compact('makereport'))->with('i', (request()->input('page', 1) - 1) * 50);
	 
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		public function showreportforspecific()
    {
      $patientmobile=  patient::get()->pluck('mobile');
	
	 
	  return view('find_pathology_report_for_specefic_patient.find_pathology_report_for_specefic_patient', compact('patientmobile'));
	 
	
	}
	
	
	
	
	
	
		public function showreportforspecificid( Request $request )
    {
		
		$patinet = patient::where('mobile',  $request->mobile)->get()->pluck('id');
   

	 $makereport=  reportorder::with('makepathologytestreport')->whereIn('patient_id',$patinet  )->latest()->paginate(50);
	  

	  return view('make_pathological_report.findreport', compact('makereport'))->with('i', (request()->input('page', 1) - 1) * 50);
	 
	
	} 
	
	
	

		public function deliever($id)
    {
		
	
	     reportorder::findOrFail($id)
  ->update(['status' =>1  ]);
	
	
	
	return redirect()->back();
		

    }





















	
	
	
	
	
	
		public function printpdffordoctorappointment($id)
    {


		//	$data=makepathologytestreport::with('patient','doctor','reportlist','User','pathology_test_component')->where('test_no', $id)->get();
		
	$data= makepathologytestreport::where('reportorder_id', $id)->get();
	
  $reportorder = reportorder::findOrFail($id);

  if($reportorder->doctor_id == null)
  {
    $ref= 	agentdetail::findOrFail($reportorder->agentdetail_id)->name;
  }
else{
  $ref= 	doctor::findOrFail($reportorder->doctor_id)->name;

}
		
		 $patientname= $data[0]->patient->name ;
 
		 $patientid=$data[0]->patient_id;
		 $age = $data[0]->patient->age;
	 	$sex= $data[0]->patient->sex;
	 	$entryby= $data[0]->user->name;
		$reportorderno= $data[0]->reportorder_id;
	
		$doctor= $ref;
  
    
 	$issudedate= new DateTime (Carbon::now()->format('Y-m-d'));
		
		
		
		
	// $pdf = BPDF::loadView('make_pathological_report.report', compact('data','doctor','investigation_name','patientname','sex','patientid','age','entryby','reportorderno','issudedate'))->setPaper('a4', 'landscape')->setWarnings(false)->save('invoice.pdf');
   // return $pdf->stream('invoice.pdf');
	
	
		   $pdf = PDF::loadView('make_pathological_report.report', compact('data','doctor','patientname','sex','patientid','age','entryby','reportorderno','issudedate'),
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
	
	
	
	
	
	
	
	
	
	
	
public function	dropdownfortest( $id )
{
	  $test_component_list =   pathology_test_component::where('softdelete', 0 )->where('reportlist_id', $id )->orderBy('component_name')->get();
	
	
            return response()->json([ 'test_component_list' => $test_component_list , ]);
	 
	
}
	
	
	
	
	
	
	// fetch for dropdown list 
	
		    public function dropdown_list()
    {
		
       $test_component_list =   pathology_test_component::where('softdelete', '!', '1' )->orderBy('component_name')->get();
      
	  $reportlist = reportlist::where('softdelete', 0 )->orderBy('Name')->get(); 
	   $reportorder = reportorder::with('patient','doctor')->where('status',0)->latest()->get();
	   $doctor = doctor::where('softdelete', '!', '1' )->orderBy('Name')->get(); 



$patientdata = patient::orderBy('id')->get();

            return response()->json(['patientdata' => $patientdata ,  'doctor'=>$doctor,  'test_component_list' => $test_component_list ,    'reportlist' => $reportlist , 'reportorder' => $reportorder ]);
	 
 
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

public function fetchpatientorder(Request $request)
{


$reportorder = reportorder::findOrFail($request->order_no);
 //dd($reportorder);
return view('make_pathological_report.testlist', compact('reportorder'));   

}



    public function store(Request $request)
    {



	$max_testno = makepathologytestreport::max('test_no');
	
	if ($max_testno == null)
	{
		$max_testno= 1;
	
	}
	else {
	$max_testno= $max_testno+1;
	}

    for ($id = 0; $id < count($request->component_name); $id++ ) 
	{
		  	$report = new makepathologytestreport; 
		$report->user_id  = auth()->user()->id ;
		$report->patient_id =  $request->patientlist;  
        $report->reportlist_id = $request->testid[$id];		
		$report->pathology_test_component_id = $request->component_id[$id];       
         $report->result = $request->result[$id]; 
        $report->reportorder_id =   $request->order_no; 
		
        $report->test_no = $max_testno;	
		$report->save();
		
	}
	
	// return response()->json(['success' => 'Data Added successfully.']);

  //return view('make_pathological_report.makepathologicalreport')->with('success', 'Data added successfully.');
	return view('make_pathological_report.makepathologicalreport')->with('success', 'Data added successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


                $data = makepathologytestreport::where('reportorder_id', $id);

        $data->delete();

        reportorder::findOrFail($id)->delete();
	   
    }
}
