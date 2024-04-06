<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\cabinelist;
use App\Models\patient;

use App\Models\doctor; 

use App\Models\agentdetail;


use App\Models\cabinetransaction;
use App\Models\balance_of_business;
use DataTables;
use Validator;
use Carbon\Carbon;
use DateTime;
use PDF;
use Illuminate\Support\Facades\DB;


class show_booking_patient_and_release extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        
	 $booking_patient = patient::with('cabinelist','cabinetransaction')->where('softdelete', 0)->where('booking_status', 2)->latest()->get(); 

	        if ($request->ajax()) {
				
	 $booking_patient = patient::with('cabinelist','cabinetransaction')->where('softdelete', 0)->where('booking_status', 2)->latest()->get(); 
	
            return Datatables::of($booking_patient)
                   ->addIndexColumn()
				   

                    ->addColumn('action', function( patient $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'"     class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        $button .= '&nbsp;&nbsp;';
          
						
						
                        

					   return $button;
                    })


			
                      ->addColumn('cabine_name', function (patient $booking_patient) {
                    
					$cabine_serial_no = cabinelist::findOrfail($booking_patient->cabinelist_id)->serial_no;
					if ($cabine_serial_no )
					return $cabine_serial_no;
				else
					return "Not Applicable";
                })
				
				
				
				       ->addColumn('starting_date', function (patient $booking_patient) {  // has one relationship
                  
                        $starting_date = cabinetransaction::where('patient_id', $booking_patient->id)->first()->starting;
      

               //  $starting_date = cabinetransaction::findOrfail($booking_patient->cabinetransaction_id)->starting;

				   return $starting_date;
                })
				
								       ->addColumn('ending', function (patient $booking_patient) {  // has one relationship
                   
                 $ending = cabinetransaction::findOrfail($booking_patient->cabinetransaction_id)->ending;

				   return $ending;
                })
	
				
				
            
			->editColumn('finalreport', function ($booking_patient) {
				
				if($booking_patient->booking_status == 2)
				{
                return '<a   target="_blank"      href="'.route('finalreport.pdfbill', $booking_patient->id).'">Print</a>';
            
				}
				else
					return "N/A";
			})
			
			


				

					
					
                    ->rawColumns(['action','finalreport']) 

                    ->make(true);
        }
		
	
	return view('cabinetransaction.bookingpatinetlist', compact('booking_patient'));   
	
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
        //
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
        //
    }
}
