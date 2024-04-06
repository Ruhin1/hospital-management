<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\sharepartner; 
use App\Models\Taka_uttolon_transition;
use DataTables;
use Validator;
use DB;
use Carbon\Carbon;

class joma_uttolon_report_statement_Controller extends Controller
{
    public function todaystatement()
	{
		    $taka_utthlon = Taka_uttolon_transition::with('sharepartner')
                ->select( 'sharepartner_id', DB::raw( 'SUM(amount) as total_amount '  ))
			     ->whereDate('created_at', Carbon::today())
				 ->where('transitiontype', 1)
                ->groupBy('sharepartner_id')
                
                ->get();	
				
				
				
			    $taka_joma = Taka_uttolon_transition::with('sharepartner')
                ->select( 'sharepartner_id', DB::raw( 'SUM(amount) as total_amount '  ))
			     ->whereDate('created_at', Carbon::today())
				 ->where('transitiontype', 2)
                ->groupBy('sharepartner_id')
                
                ->get();			
			
	 return view ('taka_uttolon_joma_report_transition.joma_uttolon_today')
		 ->with(compact('taka_utthlon','taka_joma'));
		
	}
	
	/////////////////////////////////// yesterday 
    public function yesterdaystatment()
	{
		    $taka_utthlon = Taka_uttolon_transition::with('sharepartner')
                ->select( 'sharepartner_id', DB::raw( 'SUM(amount) as total_amount '  ))
			     ->whereDate('created_at', Carbon::yesterday())
				 ->where('transitiontype', 1)
                ->groupBy('sharepartner_id')
                
                ->get();	
				
				
				
			    $taka_joma = Taka_uttolon_transition::with('sharepartner')
                ->select( 'sharepartner_id', DB::raw( 'SUM(amount) as total_amount '  ))
			    ->whereDate('created_at', Carbon::yesterday())
				 ->where('transitiontype', 2)
                ->groupBy('sharepartner_id')
                
                ->get();			
			
	  return view ('taka_uttolon_joma_report_transition.yesterday')
		 ->with(compact('taka_utthlon','taka_joma'));
		
	}	
	
	
	
	////////////////////////////// this month
	
	    public function thismonthstatment()
	{
		
		
		
		$taka_utthlon = Taka_uttolon_transition::with('sharepartner')->select([
        'sharepartner_id',
        \DB::raw("DATE_FORMAT(created_at, '%y-%m-%d') as month_day"),
        
        \DB::raw('SUM(amount) as total_amount')
    ])
	->where('transitiontype', 1)
	  ->whereMonth('created_at', Carbon::now()->month)
    ->groupBy('sharepartner_id')
    ->groupBy('month_day')
    ->get();
		
		
		
		
	
				
				
				
		$taka_joma = Taka_uttolon_transition::with('sharepartner')->select([
        'sharepartner_id',
        \DB::raw("DATE_FORMAT(created_at, '%y-%m-%d') as month_day"),
        
        \DB::raw('SUM(amount) as total_amount')
    ])
	->where('transitiontype', 2)
	  ->whereMonth('created_at', Carbon::now()->month)
    ->groupBy('sharepartner_id')
    ->groupBy('month_day')
	
    ->get();			
			
	  return view ('taka_uttolon_joma_report_transition.thismonth')
		 ->with(compact('taka_utthlon','taka_joma'));
		
	}
	


//////////////////////////////////// this year 

	    public function thisyear()
	{
		
		
				$taka_utthlon = Taka_uttolon_transition::with('sharepartner')->select([
        'sharepartner_id',
        \DB::raw("DATE_FORMAT(created_at, '%Y-%m') as year"),
        
        \DB::raw('SUM(amount) as total_amount')
    ])
	->where('transitiontype', 1)
	->whereYear('created_at', Carbon::now()->year)
    ->groupBy('sharepartner_id')
    ->groupBy('year')
    ->get();
		
		
		
		
	
				
				
				
		$taka_joma = Taka_uttolon_transition::with('sharepartner')->select([
        'sharepartner_id',
        \DB::raw("DATE_FORMAT(created_at, '%Y-%m') as year"),
        
        \DB::raw('SUM(amount) as total_amount')
    ])
	->where('transitiontype', 2)
	  ->whereMonth('created_at', Carbon::now()->month)
    ->groupBy('sharepartner_id')
    ->groupBy('year')
	
    ->get();
			
	  return view ('taka_uttolon_joma_report_transition.thisyear')
		 ->with(compact('taka_utthlon','taka_joma'));
		
		

	}
	



///////////////////////////////////////////////////////////////
	    public function lastmonth()
	{
		
		
				$taka_utthlon = Taka_uttolon_transition::with('sharepartner')->select([
        'sharepartner_id',
        \DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as month_day"),
        
        \DB::raw('SUM(amount) as total_amount')
    ])
	->where('transitiontype', 1)
	->whereMonth('created_at', Carbon::now()->subMonth()->month)
    ->groupBy('sharepartner_id')
    ->groupBy('month_day')
    ->get();
		
		
		
		
	
				
				
				
		$taka_joma = Taka_uttolon_transition::with('sharepartner')->select([
        'sharepartner_id',
        \DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as month_day"),
        
        \DB::raw('SUM(amount) as total_amount')
    ])
	->where('transitiontype', 2)
	 ->whereMonth('created_at', Carbon::now()->subMonth()->month)
    ->groupBy('sharepartner_id')
    ->groupBy('month_day')
	
    ->get();
			
	  return view ('taka_uttolon_joma_report_transition.lastmonth')
		 ->with(compact('taka_utthlon','taka_joma'));
		
		

	}




	
	
	
	
}
