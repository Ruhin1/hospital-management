<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DataTables;
use Validator;
use App\Events\DataStored;


use App\Models\patient;
use App\Models\medicine;
use App\Models\doctor;
use App\Models\medicine_category;

use App\Models\User;
use App\Models\prescriptionmedicinelist;
use App\Models\prescription;
use App\Models\prescriptionusages; 
use App\Models\prescriptionkhabaragepore;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use PDF;
$jsonmessage=0;

class prescriptionController extends Controller
{

    
    public function index(Request $request)
    {
			$doctorid = Auth()->User()->id;
        $prescription=  prescription::with('prescriptionmedicinelist','patient','user')->where('user_id',$doctorid)->latest()->get();
	  
	
	  
	        if ($request->ajax()) {
           $prescription=  prescription::with('prescriptionmedicinelist','patient','user')->where('user_id',$doctorid)->latest()->get();
            return Datatables::of($prescription)
                   ->addIndexColumn()
                    ->addColumn('action', function( prescription $data){ 
   
                          $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        $button .= '&nbsp;&nbsp;';
                        //$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })  
                              


							  ->addColumn('patient_name', function (prescription $prescription) {
                    return $prescription->patient->name;
                })
				
				      ->addColumn('patient_mobile', function (prescription $prescription) {
                    return $prescription->patient->mobile;
                })
					

                 ->editColumn('created', function(prescription $data) {
					
					 return date('d/m/y h:i A', strtotime($data->created_at) );
                    
                })
				
             ->editColumn('pdf', function ($prescription) {
                return '<a   target="_blank"      href="'.route('prescription.pdf', $prescription->id).'">Print</a>';
            })
				

					
					
                    ->rawColumns(['action','pdf','created' ])

                    ->make(true);
					
					

        }
      
        return view('prescription.prescription', compact('prescription'));   
    }




    public function printprescription(Request $request)
    {
		
        $prescription=  prescription::with('prescriptionmedicinelist','patient','user')->latest()->get();
	  
	
	  
	        if ($request->ajax()) {
           $prescription=  prescription::with('prescriptionmedicinelist','patient','user')->latest()->get();
            return Datatables::of($prescription)
   
                              


							  ->addColumn('patient_name', function (prescription $prescription) {
                    return $prescription->patient->name;
                })
				
				      ->addColumn('patient_mobile', function (prescription $prescription) {
                    return $prescription->patient->mobile;
                })
					

                 ->editColumn('created', function(prescription $data) {
					
					 return date('d/m/y h:i A', strtotime($data->created_at) );
                    
                })
				
             ->editColumn('pdf', function ($prescription) {
                return '<a   target="_blank"      href="'.route('prescription.pdf', $prescription->id).'">Print</a>';
            })
				

					
					
                    ->rawColumns(['pdf','created' ])

                    ->make(true);
					
					

        }
      
        return view('prescription.printprescriptionfrompharmachy', compact('prescription'));   
    }




    public function  dropdownlist()
    {
       $patientdata = patient::where('softdelete',0)->orderBy('name')->get(); 
	   $medicinedata = medicine::where('softdelete',0)->orderBy('name')->get(); 
	   $usages = prescriptionusages::where('softdelete',0)->get(); 
	   $khabaragepore = prescriptionkhabaragepore::where('softdelete',0)->get();
       $medicinecategory =  medicine_category::where('softdelete',0)->orderBy('name')->get(); 
			
        return response()->json(['patientdata' => $patientdata , 'medicinecategory'=>$medicinecategory,   'khabaragepore' => $khabaragepore , 'usages' => $usages, 'medicinedata' => $medicinedata]); 
    }
	
	
	
	public function  doctorregiserforprescription()
    {

       $doctor = doctor::orderBy('name')->where('softdelete', 0 )->get(); 
	
            return view('prescription.doctorregistretion', compact('doctor'));   
    }
	

	
	
	

    public function doctorregiserforprescriptionpost(Request $request)
    {	

            DB::transaction(function () use ($request) {

            $user = new User; 
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->password =  Hash::make($request->password);
            $user->doctor_id = $request->doctor_id;
            $user->role = 5;
            $user->save(); });	

            return response()->json(['success' => 'Data Added successfully.']);

    }


	


    public function printpdf($id)
    {
        
        
            $prescription=  prescription::with('prescriptionmedicinelist','patient','user')->findOrFail($id);	
            $data= patient::findOrFail($prescription->patient_id);
            $doctor_id = User::findOrFail($prescription->user_id)->doctor_id;
            $doctor = doctor::findOrFail($doctor_id);
        

            //return ;

            return view('prescription.printprescription',compact('data','prescription','doctor' ));
        
            // $pdf = PDF::loadView('prescription.printprescription', compact('data','prescription','doctor' ),
            // [], [
            // 'mode'                     => '',
            // 'format'                   => 'A4',
            // 'default_font_size'        => '10',
            // 'default_font'             => 'Times-New-Roman',
            // 'margin_left'              => 15,
            // 'margin_right'             => 15,
            // 'margin_top'               => 7,
            // 'margin_bottom'            => 0,
            // ]);
 
            
            
        
        
            //return $pdf->stream('document.pdf');
              
    }



    
    public function store(Request $request)
    {
		 
			
	    DB::transaction(function () use ($request) {
		
            $prescription = new prescription; 
            $prescription->user_id  = auth()->user()->id ; //$request->sellerid;
            $prescription->patient_id  = $request->customer_id;
            $prescription->meettingtimefornext =	$request->nextdate;
            $prescription->history =	$request->history;
            $prescription->investigation =	$request->investigation;
            $prescription->save();

            $prescription_id = $prescription->id;

            for ($i = 0; $i < count($request->medicine_name); $i++ ){

            
                $prescriptionmedicinelist = new prescriptionmedicinelist; 
                $prescriptionmedicinelist->prescription_id = $prescription_id;
                $prescriptionmedicinelist->medicine_category_id = $request->category[$i];
                $prescriptionmedicinelist->medicine_id = $request->medicine_name[$i]; // asole medicine_name[] er vetore id neya hoyeche. form bananor somoy name lekha hoyechecilo pore ar change kora hoy nai 
                $prescriptionmedicinelist->prescriptionusages_id = $request->usages[$i];
                $prescriptionmedicinelist->prescriptionkhabaragepore_id = $request->khabaragepore[$i];
                $prescriptionmedicinelist->day = $request->days[$i];	
                $prescriptionmedicinelist->comment = $request->comment[$i];		
                $prescriptionmedicinelist->save(); 

            }		
        });	
        event(new DataStored());
        return response()->json(['success' => 'Data Added successfully.']);
    } 

  
}   