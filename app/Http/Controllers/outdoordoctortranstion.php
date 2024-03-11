<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DataTables;
use App\Models\doctorappointmenttransaction;
use App\Models\doctor;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Validator;
class outdoordoctortranstion extends Controller
{
        Public function todaystatment()
	{
		
	
				
				
			    $doctorappointmenttransactions = doctorappointmenttransaction::with('doctor')
                ->select( 'doctor_id', \DB::raw( 'SUM(grossamount) as total_amount , SUM(nogod) as pay_in_cash, SUM(adjust_with_advance) as adjust_with_advance,    SUM(due) as total_due ,  COUNT(id) as total_unit'  ))
			     ->whereDate('date', Carbon::today())
                ->groupBy('doctor_id')
                
                ->get();				
				
				
				
				

		 return view ('incomefromdoctoroutdoor.incomefromoutdoordoctortoday')
		 ->with(compact('doctorappointmenttransactions'));
		 
		 
	
	}
	
	
	
	
	
	        Public function yesterdaystatment()
	{
		
	
				
				
			    $doctorappointmenttransactions = doctorappointmenttransaction::with('doctor')
                ->select( 'doctor_id', \DB::raw( 'SUM(grossamount) as total_amount , SUM(nogod) as pay_in_cash, SUM(adjust_with_advance) as adjust_with_advance,    SUM(due) as total_due ,  COUNT(id) as total_unit'  ))
			     ->whereDate('date', Carbon::yesterday())
                ->groupBy('doctor_id')
                
                ->get();				
				
				
				
				

		 return view ('incomefromdoctoroutdoor.incomefromoutdoordoctoryesterdaystatment')
		 ->with(compact('doctorappointmenttransactions'));
		 
		 
	
	}
	
	
	
	
	        Public function thismonth()
	{
		
	
				
				
			    $doctorappointmenttransactions = doctorappointmenttransaction::with('doctor')
                ->select( 'doctor_id', \DB::raw( 'SUM(grossamount) as total_amount , SUM(nogod) as pay_in_cash, SUM(adjust_with_advance) as adjust_with_advance,    SUM(due) as total_due ,  COUNT(id) as total_unit'  ))
			   
				 ->whereMonth('date', Carbon::now()->month)
                ->groupBy('doctor_id')
                
                ->get();				
				
				
				
				

		 return view ('incomefromdoctoroutdoor.thismonth')
		 ->with(compact('doctorappointmenttransactions'));
		 
		 
	
	}	
	
	
	        Public function thisyear()
	{
		
	
				
				
			    $doctorappointmenttransactions = doctorappointmenttransaction::with('doctor')
                ->select( 'doctor_id', \DB::raw( 'SUM(grossamount) as total_amount , SUM(nogod) as pay_in_cash, SUM(adjust_with_advance) as adjust_with_advance,    SUM(due) as total_due ,  COUNT(id) as total_unit'  ))
			    ->whereYear('date', Carbon::now()->year)
				
                ->groupBy('doctor_id')
                
                ->get();				
				
				
				
				

		 return view ('incomefromdoctoroutdoor.thisyear')
		 ->with(compact('doctorappointmenttransactions'));
		 
		 
	
	}	




	public function outdoordoctorbtwtwodate(Request $request){
		

		
		

        $validator = Validator::make($request->all(), [
            'startdate' => 'required|date|size:10',
        'enddate' => 'date|size:10',
        ]);
		
		
		
		if ($validator->fails()) {
            return redirect('picktwodate')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		
		        $start = date("Y-m-d",strtotime($request->input('startdate')));
        $end = date("Y-m-d",strtotime($request->input('enddate')."+1 day"));
      
		$datethatsentasenddatefromcust =  date("Y-m-d",strtotime($request->input('enddate')));
		
			
							
				
			 $doctorappointmenttransactions = doctorappointmenttransaction::with('doctor')
                ->select( 'doctor_id', \DB::raw( 'SUM(grossamount) as total_amount , SUM(nogod) as pay_in_cash, SUM(adjust_with_advance) as adjust_with_advance,    SUM(due) as total_due ,  COUNT(id) as total_unit'  ))
			   ->whereBetween('created_at',[$start,$end])
				
                ->groupBy('doctor_id')
                
                ->get();					
				

		
		 
		 return view ('incomefromdoctoroutdoor.btwtwodate')
		 ->with(compact('doctorappointmenttransactions','start','datethatsentasenddatefromcust'  )); 
		
	

	}

















	
	
	
	
	
	
	
	
	
}
