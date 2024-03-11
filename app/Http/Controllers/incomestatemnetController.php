<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\khorocer_khad; 
use App\Models\supplier; 
use App\Models\User; 
use App\Models\khoroch_transition;  
use App\Models\employeesalarytransaction;
use App\Models\employeedetails;
use App\Models\agentdetail;  
use App\Models\surgerytransaction;
use App\Models\surgerylist; 
use App\Models\doctor; 
use App\Models\order;
use App\Models\servicetransition;
use App\Models\setting;
use App\Models\dentalserviceodermoney_deposit;
use App\Models\ReagentOrder; 
use App\Models\ReagentTransaction;
use App\Models\servicelistinhospital;
use App\Models\Reagent;
 use App\Models\taka_uttolon_transition;    
 use App\Models\sharepartner; 


use App\Models\reportlist;

use App\Models\medicine;

use App\Models\medicinetransition; 
use App\Models\agenttransaction;
use App\Models\dhar_shod_othoba_advance_er_mal_buje_pawa;
use App\Models\doctorCommissionTransition; 
use App\Models\reporttransaction;  
 use App\Models\reportorder;   
 use App\Models\duetransition;
  use App\Models\serviceorder;
  
   use App\Models\cabinefeetransition; 
  
use App\Models\pathologytransitionfromotherinstitue;  
use App\Models\pathologyorderfromotherinsitute;
 
 
 
 use App\Models\cabinelist;
 use App\Models\cabinetransaction; 
 use App\Models\doctorappointmenttransaction;
use DataTables;
use App\Models\medicineCompanyTransition;

use App\Models\medicinecompanyorder;

use Carbon\Carbon;
use App\Models\externalcost; 
 use App\Models\return_order;


use DateTime;
use PDF;
use App\Models\medicine_comapnyer_dena_pawan_shod; 
use DB;
use Illuminate\Support\Facades\Validator;
class incomestatemnetController extends Controller
{
    Public function todaystatment()
	{
		//$todays_external_cost = khoroch_transition::whereDate('created_at', Carbon::today())->get();
		 
				  $withdrawl_from_investors = taka_uttolon_transition::with('sharepartner')
                ->select( 'sharepartner_id', DB::raw( 'SUM(amount) as amount_invest '  ))
                ->where('transitiontype', 1)
				->whereDate('created_at', Carbon::today())
                
				->groupBy('sharepartner_id')
                
                ->get();
				
				
			    $externalcost = khoroch_transition::with('khorocer_khad','supplier','User')
                ->select( 'khorocer_khad_id', \DB::raw( 'SUM(amount) as total_amount ,   SUM(due) as total_due , SUM(advance) as total_advance , SUM(unit) as total_unit'  ))
			     ->whereDate('created_at', Carbon::today())
                ->groupBy('khorocer_khad_id')
                
                ->get();				
				
				
				$externalcost2 = externalcost::whereDate('created_at', Carbon::today())->get();
				
			    $employee_salary = employeesalarytransaction::with('employeedetails')
                ->select( 'employeedetails_id', \DB::raw( 'SUM(totalsalary) as total_given_salary_of_a_employee'  ))
			     ->whereDate('starting', Carbon::today())
                ->groupBy('employeedetails_id')
                
                ->get();
		 
		 
		 

			    $agent_commision = agenttransaction::with('agentdetail')
                ->select( 'agentdetail_id', \DB::raw( 'SUM(paidamount) as total_given_paidamount_of_a_agents'  ))
				->where('paidorunpaid', 1 )
			     ->whereDate('created_at', Carbon::today())
                ->groupBy('agentdetail_id')
                
                ->get();		 
				
				
			    $dharshod = dhar_shod_othoba_advance_er_mal_buje_pawa::with('supplier')
                ->select( 'supplier_id',\DB::raw( 'SUM(amount) as total_baki_shod'  ))
				->where('transitiontype', 1)
				
			     ->whereDate('created_at', Carbon::today())
                ->groupBy('supplier_id')
                
                ->get();	
				
				
				//// ekhon addd korlam
				
							    $medicinecompanydharshod = medicine_comapnyer_dena_pawan_shod::with('medicinecomapnyname')
                ->select( 'medicinecomapnyname_id',\DB::raw( 'SUM(amount) as medicnecompanyrbakishod'  ))
				->where('transitiontype', 1)
				
			     ->whereDate('created_at', Carbon::today())
                ->groupBy('medicinecomapnyname_id')
                
                ->get();
				
				
				
			                  $patient_ke_taka_ferot = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as patient_ke_taka_ferot'   ))
			    ->where('transitiontype', 3) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get();	
				
				
				
				
				
				
				
				
				
				
				
				////
				
				
			    $doctorcommission = doctorCommissionTransition::with('doctor')
                ->select( 'doctor_id', \DB::raw( 'SUM(amount) as total_deya_commission'  ))

				
				->where(function ($query) {
    $query->where('transitiontype', 1)
        ->orWhere('transitiontype', 3)
		->orWhere('transitiontype', 4)
		->orWhere('transitiontype', 5)
->orWhere('transitiontype', 10);
	
})

				->where('paidorunpaid', 1 )
			     ->whereDate('created_at', Carbon::today())
                ->groupBy('doctor_id')
                
                ->get();	

                $doctor_er_sharer_taka = doctorCommissionTransition::with('doctor')
                ->select( 'doctor_id', \DB::raw( 'SUM(amount) as deya_share'  ))
				
								->where(function ($query) {
    $query->where('transitiontype', 2)
        ->orWhere('transitiontype', 6)
				->orWhere('transitiontype', 8)
		->orWhere('transitiontype', 9)
		->orWhere('transitiontype', 7);
	
})
				
				
				->where('paidorunpaid', 1 )
			     ->whereDate('created_at', Carbon::today())
                ->groupBy('doctor_id')
                
                ->get();
				
				
				










				$medicineCompanyTransition = medicinecompanyorder::with('medicinecomapnyname')
                ->select( 'medicinecomapnyname_id', \DB::raw( 'SUM(pay_in_cash) as pay_in_cash , SUM(total) as amount, SUM(due) as due'  ))
				->where('transitiontype', 1)
			     ->whereDate('created_at', Carbon::today())
                ->groupBy('medicinecomapnyname_id')
                
                ->get();



				$medicineCompanyTransition_nogod_taka_ferot = medicinecompanyorder::with('medicinecomapnyname')
                ->select( 'medicinecomapnyname_id', \DB::raw( 'SUM(pay_in_cash) as pay_in_cash'))
				->where('transitiontype', 2)
			     ->whereDate('created_at', Carbon::today())
                ->groupBy('medicinecomapnyname_id')
                
                ->get();



				// $reagenta_transaction = ReagentTransaction::with('reagent')
                // ->select( 'reagent_id', \DB::raw( 'SUM(price_amount) as amount ,  SUM(quantity) as quantity'  ))
			     
				// ->whereDate('created_at', Carbon::today())
                
				// ->groupBy('reagent_id')
                
				// 		->orderBy(Reagent::select('name')->whereColumn('reagents.id','reagent_transactions.reagent_id' ))->get();
                			
					
				$reagenta_transaction=
				DB::table('reagents')
				->join('reagent_transactions', 'reagents.id', '=', 'reagent_transactions.reagent_id')
				->join('reagent_orders', 'reagent_transactions.reagent_order_id', '=', 'reagent_orders.id')
				->select('reagents.name', DB::raw('SUM(reagent_transactions.quantity) as quantity'), DB::raw('SUM(reagent_transactions.price_amount) as amount'))
				->where('reagent_orders.type', '=', 1)
				->whereDate('reagent_orders.created_at', Carbon::today())
				->groupBy('reagents.name','reagent_transactions.reagent_id')
				->get();
		
				$reagent_total_purchase = DB::table('reagent_orders')
				->select(DB::raw('SUM(price_amount) as total_price_amount'), DB::raw('SUM(due) as total_due'), DB::raw('SUM(paid) as total_paid'))
				->where('type', '=', 1)
				->whereDate('created_at',Carbon::today())
				->first();
				$reagenta_transaction_reagent_back
				=DB::table('reagent_orders')
				->join('suppliers', 'reagent_orders.supplier_id', '=', 'suppliers.id')
				->select( 'suppliers.name', DB::raw('SUM(paid) as total_paid'))
				->where('type', '=', 2)
				->whereDate('reagent_orders.created_at',Carbon::today())
				->groupBy('suppliers.name')
				->get();










                  $cost_for_pathology_from_outside  = pathologytransitionfromotherinstitue::with('supplier')
                ->select( 'reportlist_id','supplier_id', \DB::raw( 'SUM(adjust) as amount ,COUNT(id) as total_unit, SUM(totaldiscount) as discount'  ))
			     
				->whereDate('created_at', Carbon::today())
                
				->groupBy('reportlist_id','supplier_id')
              		
					->orderBy(reportlist::select('name')->whereColumn('reportlists.id','pathologytransitionfromotherinstitues.reportlist_id' ))
                
				->get();

				


$Pay_by_cash_to_other  = pathologyorderfromotherinsitute::whereDate('created_at', Carbon::today())->sum('pay_in_cash');


$due_by_cash_to_other  = pathologyorderfromotherinsitute::whereDate('created_at', Carbon::today())->sum('due');





$medicine_adv  = order::whereDate('created_at', Carbon::today())->sum('pay_by_adv');

				

////////////////////// expenditure

                  $income_from_pathology_test = reporttransaction::with('reportlist')
                ->select( 'reportlist_id', \DB::raw( 'SUM(adjust) as amount , SUM(totalvat) as vat ,COUNT(id) as total_unit, SUM(totaldiscount) as discount'  ))
			     
				->whereDate('created_at', Carbon::today())
                
				->groupBy('reportlist_id')
              		
					->orderBy(reportlist::select('name')->whereColumn('reportlists.id','reporttransactions.reportlist_id' ))
                
				->get();
















$incomefromservice = servicetransition::with('servicelistinhospital')

                ->select( 'servicelistinhospital_id', \DB::raw( 'SUM(charge) as charge ,
SUM(discount) as discount ,SUM(unit) as unit'  ))
			     
										->whereDate('created_at', Carbon::today())  
                
				->groupBy('servicelistinhospital_id')
                
					->orderBy(servicelistinhospital::select('servicename')->whereColumn('servicelistinhospitals.id','servicetransitions.servicelistinhospital_id' ))
                               

			   ->get();	



$nogodincomefromservice = serviceorder::whereDate('created_at', Carbon::today())->sum('paid');

$adjustment_service = serviceorder::whereDate('created_at', Carbon::today())->sum('due_adjust_from_advance');

$bakiincomefromservice = serviceorder::whereDate('created_at', Carbon::today())->sum('due');












                  $medicinetransition = medicinetransition::with('order','medicine')
                ->select( 'medicine_id', \DB::raw( 'SUM(adjust) as amount , SUM(totalvat) as vat , SUM(unit) as quantity ,   SUM(totaldiscount) as discount'  ))
			     
				->whereDate('created_at', Carbon::today())
                
				->groupBy('medicine_id')
                
						->orderBy(medicine::select('name')->whereColumn('medicines.id','medicinetransitions.medicine_id' ))
                			
				
				
                ->get();
				


                  $surgerytransaction = surgerytransaction::with( 'surgerylist')
                ->select( 'surgerylist_id', \DB::raw('count(*) as total') , \DB::raw( 'SUM(total_cost_after_initial_vat_and_discount) as amount ,     SUM(totaldiscount) as discount'  ))
			     
				->whereDate('created_at', Carbon::today())
                
				->groupBy( 'surgerylist_id')
                
                ->get();







                  $doctortransition = doctorappointmenttransaction::with( 'doctor')
                ->select( 'doctor_id', \DB::raw('count(*) as total') , \DB::raw( 'SUM(grossamount) as gross_amount , SUM(fees) as Paid_by_cash, SUM(adjust_with_advance) as Paid_by_advance_cash, SUM(due) as due'  ))
			     
				->whereDate('created_at', Carbon::today())
                
				->groupBy( 'doctor_id')
                
                ->get();





                  $dentalserviceodermoney_deposit = dentalserviceodermoney_deposit::with( 'doctor')
                ->select( 'doctor_id', \DB::raw('count(*) as total') , \DB::raw( 'SUM(amount) as gross_amount'  ))
			     
				->whereDate('created_at', Carbon::today())
                
				->groupBy( 'doctor_id')
                
                ->get();


				
				
                 /* $cabinetransaction = cabinetransaction::with('cabinelist')
                ->select( 'cabinelist_id',  \DB::raw("DATE_FORMAT(ending, '%d-%m-%Y') as day"),      \DB::raw('count(*) as total') , \DB::raw( 'SUM(total_after_adjustment) as amount ,     SUM(discount) as discount'  ))
			     
				->whereDate('ending', Carbon::today())
                
				
                
				->groupBy('ending','cabinelist_id')
				
                ->get();								
*/






                 $admissionfee = cabinetransaction::with('cabinelist')
                ->select( 'cabinelist_id',   \DB::raw( 'SUM(admissionfee) as paid, SUM(gross_amount_admisson_fee) as gross_amount_admisson_fee, SUM(discount) as discount, SUM(due) as due',   ))
			     
				->whereDate('starting', Carbon::today())
                
				
                
				->groupBy('starting','cabinelist_id')
				
                ->get();



 $cabinefeetransition = cabinefeetransition::with('cabinelist','patient')
			  ->select( 'cabinelist_id','patient_id',   \DB::raw( 'SUM(paid) as totalcabinefeepaid, SUM(adjust_with_advance	) as adjust_with_advance , SUM(discount) as discount'  ))
			     
				->whereDate('created_at', Carbon::today())
                
				
                
				->groupBy('cabinelist_id','patient_id')
				
                ->get();
	





















                  $income_from_due_payment_medicine = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 2) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get();
				
				
				
				
				
				
				                 $income_from_due_payment_pathology = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 4) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get();
				
				
				



				                 $income_from_due_payment_admissionfee = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 9) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get();














				
				
				
				
		/*	    $income_from_due_payment_cabine = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 1) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get(); 
				
				*/
				
				
				
			    $income_from_due_payment_surgery = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 3) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get();






			    $income_from_due_payment_doctor = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 5) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get();				
				
			    $income_from_due_payment_service = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 6) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get();				
				
				
$return_medicine_adjusted_with_due =  return_order::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(total_cost_before_initial_vat_and_discount) as total_before_discount ,SUM(total) as total_after_adjusting_discount, SUM(adjustment) as discount'  ))
			    ->where('transitiontype', 2) 

				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get();				



$return_medicine_by_cash =  return_order::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(total_cost_before_initial_vat_and_discount) as total_before_discount ,SUM(total) as total_after_adjusting_discount, SUM(adjustment) as discount'  ))
			    ->where('transitiontype', 1) 

				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get();	




$advance_money_deposit = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 5) 

				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get();	


$money_back_customer_at_release_time  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 8) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_cabine  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 1) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_pathology  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 4) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_medicine  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where(function ($query) {
    $query->where('transitiontype', 3) 
        ->orWhere('transitiontype', 7) ;
})
	    ->where('transitionproducttype', 2) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get();
















$money_back_customer_at_surgery  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 3) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_at_admissionfee  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 9) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get();










$money_back_customer_at_doctor  = duetransition::with('patient',)
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 5) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get();




$money_back_customer_service  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 6) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get();

              
			  
			  
			  
			  $income_from_investors = taka_uttolon_transition::with('sharepartner')
                ->select( 'sharepartner_id', DB::raw( 'SUM(amount) as amount_invest '  ))
                ->where('transitiontype', 2)
				->whereDate('created_at', Carbon::today())
                
				->groupBy('sharepartner_id')
                
                ->get();




                  $income_from_doctor =doctorappointmenttransaction::whereDate('created_at', Carbon::today())->sum('nogod');


				
		 		// $total_due_cabine = cabinetransaction::whereDate('ending', Carbon::today())->sum('due');
		 $total_due_patho = reportorder::whereDate('created_at', Carbon::today())->sum('due');
		 $total_due_medicine = order::whereDate('created_at', Carbon::today())->sum('due');
		  $total_due_surgery = surgerytransaction::whereDate('created_at', Carbon::today())->sum('due');
		  $doctorcalldue = doctorappointmenttransaction::whereDate('created_at', Carbon::today())->sum('due');
		
$refundfrompathology = reportorder::whereDate('refunddate', Carbon::today())->sum('refundamount');

/// total adjust cabinefeetransition

 $total_adjust_patho = reportorder::whereDate('created_at', Carbon::today())->sum('pay_by_adv');

 $total_adjust_surgery = surgerytransaction::whereDate('created_at', Carbon::today())->sum('adjust_with_advance');

$setting= setting::first();




 
	$pathology_voucher_number = reportorder::whereDate('created_at', Carbon::today())->count();
$medicine_voucher_number = order::whereDate('created_at',Carbon::today())->count();
$surgery_voucher_number = surgerytransaction::whereDate('created_at',Carbon::today())->count();


$today = date("d/m/y");
$title = 'Income_Statement_' . $today;



	
		   $pdf = PDF::loadView('incomestatement.incomestatementtoday',

		compact('externalcost','admissionfee','cabinefeetransition',
		'nogodincomefromservice','bakiincomefromservice','incomefromservice',
		'refundfrompathology','externalcost2','medicinecompanydharshod',
		'patient_ke_taka_ferot','medicineCompanyTransition','income_from_doctor',
		'doctorcalldue','total_due_surgery','medicinetransition','surgerytransaction',
		'total_due_medicine','total_due_patho','doctorcommission',
		'doctor_er_sharer_taka', 'employee_salary','agent_commision', 'dharshod',
		'income_from_pathology_test','income_from_due_payment_service','income_from_due_payment_doctor',
		'income_from_due_payment_surgery','income_from_due_payment_pathology','reagenta_transaction','reagent_total_purchase','reagenta_transaction_reagent_back',
		'income_from_due_payment_medicine','return_medicine_adjusted_with_due','return_medicine_by_cash',
		'total_adjust_patho','total_adjust_surgery','doctortransition','adjustment_service','advance_money_deposit',
		'money_back_customer_at_release_time','money_back_customer_cabine','money_back_customer_pathology',
		'money_back_customer_medicine','money_back_customer_at_surgery','money_back_customer_at_doctor',
		'money_back_customer_service','dentalserviceodermoney_deposit','money_back_customer_at_admissionfee',
		'money_back_customer_at_admissionfee','income_from_due_payment_admissionfee','money_back_customer_at_admissionfee','setting','pathology_voucher_number',
		'cost_for_pathology_from_outside','Pay_by_cash_to_other','due_by_cash_to_other','medicine_adv','medicineCompanyTransition_nogod_taka_ferot','income_from_investors','withdrawl_from_investors',
		'medicine_voucher_number','surgery_voucher_number',
		
		),
		


 [], [
 'mode'                     => '',
	'format'                   => 'A4',
	'default_font_size'        => '8',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
	'title'                    => $title,
]
   
   
   );
   $save = 'Income_Statement_' . $today.'.pdf';
	 return $pdf->stream($save);	
	












	
	
	}

//////////////////////////////////////////////////////// yesterday

 	   Public function yesterdaystatment()
	{
		//$todays_external_cost = khoroch_transition::whereDate('created_at', Carbon::today())->get();yesterday()
		 
	
				$m = Carbon::yesterday();
				
				
				
				
						
			    $externalcost = khoroch_transition::with('khorocer_khad','supplier','User')
                ->select( 'khorocer_khad_id', \DB::raw( 'SUM(amount) as total_amount ,   SUM(due) as total_due , SUM(advance) as total_advance , SUM(unit) as total_unit'  ))
			     ->whereDate('created_at', Carbon::yesterday())
                ->groupBy('khorocer_khad_id')
                
                ->get();				
				
				
				$externalcost2 = externalcost::whereDate('created_at', Carbon::yesterday())->get();
				
			    $employee_salary = employeesalarytransaction::with('employeedetails')
                ->select( 'employeedetails_id', \DB::raw( 'SUM(totalsalary) as total_given_salary_of_a_employee'  ))
			     ->whereDate('starting', Carbon::yesterday())
                ->groupBy('employeedetails_id')
                
                ->get();
		 
		 
		 

			    $agent_commision = agenttransaction::with('agentdetail')
                ->select( 'agentdetail_id', \DB::raw( 'SUM(paidamount) as total_given_paidamount_of_a_agents'  ))
				->where('paidorunpaid', 1 )
			     ->whereDate('created_at', Carbon::yesterday())
                ->groupBy('agentdetail_id')
                
                ->get();		 
				
				
			    $dharshod = dhar_shod_othoba_advance_er_mal_buje_pawa::with('supplier')
                ->select( 'supplier_id',\DB::raw( 'SUM(amount) as total_baki_shod'  ))
				->where('transitiontype', 1)
				
			     ->whereDate('created_at', Carbon::yesterday())
                ->groupBy('supplier_id')
                
                ->get();	
				
				
				//// ekhon addd korlam
				
							    $medicinecompanydharshod = medicine_comapnyer_dena_pawan_shod::with('medicinecomapnyname')
                ->select( 'medicinecomapnyname_id',\DB::raw( 'SUM(amount) as medicnecompanyrbakishod'  ))
				->where('transitiontype', 1)
				
			     ->whereDate('created_at', Carbon::yesterday())
                ->groupBy('medicinecomapnyname_id')
                
                ->get();
				
				
				
			                  $patient_ke_taka_ferot = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as patient_ke_taka_ferot'   ))
			    ->where('transitiontype', 3) 
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('patient_id')
                
                ->get();	
				
				
				
				
				
				
				
				
				
				
				
				////
				
				
			    $doctorcommission = doctorCommissionTransition::with('doctor')
                ->select( 'doctor_id', \DB::raw( 'SUM(amount) as total_deya_commission'  ))

				
				->where(function ($query) {
    $query->where('transitiontype', 1)
        ->orWhere('transitiontype', 3)
		->orWhere('transitiontype', 4)
		->orWhere('transitiontype', 5)
		->orWhere('transitiontype', 10);

	
}) 

				->where('paidorunpaid', 1 )
			     ->whereDate('created_at', Carbon::yesterday())
                ->groupBy('doctor_id')
                
                ->get();	

                $doctor_er_sharer_taka = doctorCommissionTransition::with('doctor')
                ->select( 'doctor_id', \DB::raw( 'SUM(amount) as deya_share'  ))
				
								->where(function ($query) {
    $query->where('transitiontype', 2)
        ->orWhere('transitiontype', 6)
				->orWhere('transitiontype', 8)
		->orWhere('transitiontype', 9)
		->orWhere('transitiontype', 7);
	
})
				
				
				->where('paidorunpaid', 1 )
			     ->whereDate('created_at', Carbon::yesterday())
                ->groupBy('doctor_id')
                
                ->get();
				
				
				
				$medicineCompanyTransition = medicinecompanyorder::with('medicinecomapnyname')
                ->select( 'medicinecomapnyname_id', \DB::raw( 'SUM(pay_in_cash) as pay_in_cash , SUM(total) as amount, SUM(due) as due'  ))
				->where('transitiontype', 1)
			     ->whereDate('created_at', Carbon::yesterday())
                ->groupBy('medicinecomapnyname_id')
                
                ->get();



				$medicineCompanyTransition_nogod_taka_ferot = medicinecompanyorder::with('medicinecomapnyname')
                ->select( 'medicinecomapnyname_id', \DB::raw( 'SUM(pay_in_cash) as pay_in_cash'))
				->where('transitiontype', 2)
			    ->whereDate('created_at', Carbon::yesterday())
                ->groupBy('medicinecomapnyname_id')
                
                ->get();






                  $cost_for_pathology_from_outside  = pathologytransitionfromotherinstitue::with('supplier')
                ->select( 'reportlist_id','supplier_id', \DB::raw( 'SUM(adjust) as amount ,COUNT(id) as total_unit, SUM(totaldiscount) as discount'  ))
			     
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('reportlist_id','supplier_id')
              		
					->orderBy(reportlist::select('name')->whereColumn('reportlists.id','pathologytransitionfromotherinstitues.reportlist_id' ))
                
				->get();




$Pay_by_cash_to_other  = pathologyorderfromotherinsitute::whereDate('created_at', Carbon::yesterday())->sum('pay_in_cash');


$due_by_cash_to_other  = pathologyorderfromotherinsitute::whereDate('created_at', Carbon::yesterday())->sum('due');





$medicine_adv  = order::whereDate('created_at', Carbon::yesterday())->sum('pay_by_adv');





















				

////////////////////// expenditure

                  $income_from_pathology_test = reporttransaction::with('reportlist')
                ->select( 'reportlist_id', \DB::raw( 'SUM(adjust) as amount , SUM(totalvat) as vat ,COUNT(id) as total_unit, SUM(totaldiscount) as discount'  ))
			     
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('reportlist_id')
              		
					->orderBy(reportlist::select('name')->whereColumn('reportlists.id','reporttransactions.reportlist_id' ))
                
				->get();



$incomefromservice = servicetransition::with('servicelistinhospital')

                ->select( 'servicelistinhospital_id', \DB::raw( 'SUM(charge) as charge , SUM(unit) as unit'  ))
			     
										->whereDate('created_at', Carbon::yesterday())  
                
				->groupBy('servicelistinhospital_id')
                
					->orderBy(servicelistinhospital::select('servicename')->whereColumn('servicelistinhospitals.id','servicetransitions.servicelistinhospital_id' ))
                               

			   ->get();	



$nogodincomefromservice = serviceorder::whereDate('created_at', Carbon::yesterday())->sum('paid');

$adjustment_service = serviceorder::whereDate('created_at', Carbon::yesterday())->sum('due_adjust_from_advance');

$bakiincomefromservice = serviceorder::whereDate('created_at', Carbon::yesterday())->sum('due');












                  $medicinetransition = medicinetransition::with('order','medicine')
                ->select( 'medicine_id', \DB::raw( 'SUM(adjust) as amount , SUM(totalvat) as vat , SUM(unit) as quantity ,   SUM(totaldiscount) as discount'  ))
			     
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('medicine_id')
                
						->orderBy(medicine::select('name')->whereColumn('medicines.id','medicinetransitions.medicine_id' ))
                			
				
				
                ->get();
				
				

                  $surgerytransaction = surgerytransaction::with( 'surgerylist')
                ->select( 'surgerylist_id', \DB::raw('count(*) as total') , \DB::raw( 'SUM(total_cost_after_initial_vat_and_discount) as amount ,     SUM(totaldiscount) as discount'  ))
			     
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy( 'surgerylist_id')
                
                ->get();







                  $doctortransition = doctorappointmenttransaction::with( 'doctor')
                ->select( 'doctor_id', \DB::raw('count(*) as total') , \DB::raw( 'SUM(grossamount) as gross_amount , SUM(fees) as Paid_by_cash, SUM(adjust_with_advance) as Paid_by_advance_cash, SUM(due) as due'  ))
			     
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy( 'doctor_id')
                
                ->get();





                  $dentalserviceodermoney_deposit = dentalserviceodermoney_deposit::with( 'doctor')
                ->select( 'doctor_id', \DB::raw('count(*) as total') , \DB::raw( 'SUM(amount) as gross_amount'  ))
			     
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy( 'doctor_id')
                
                ->get();



				
				
                 /* $cabinetransaction = cabinetransaction::with('cabinelist')
                ->select( 'cabinelist_id',  \DB::raw("DATE_FORMAT(ending, '%d-%m-%Y') as day"),      \DB::raw('count(*) as total') , \DB::raw( 'SUM(total_after_adjustment) as amount ,     SUM(discount) as discount'  ))
			     
				->whereDate('ending', Carbon::today())
                
				
                
				->groupBy('ending','cabinelist_id')
				
                ->get();								
*/





                 $admissionfee = cabinetransaction::with('cabinelist')
                ->select( 'cabinelist_id',   \DB::raw( 'SUM(admissionfee) as paid, SUM(gross_amount_admisson_fee) as gross_amount_admisson_fee, SUM(discount) as discount, SUM(due) as due',   ))
			     
				->whereDate('starting', Carbon::yesterday())
                
				
                
				->groupBy('starting','cabinelist_id')
 ->get();


$money_back_customer_at_admissionfee  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 9) 
			->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('patient_id')
                
                ->get();
				
			
				
				
								                 $income_from_due_payment_admissionfee = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 9) 
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('patient_id')
                
                ->get();
























 $cabinefeetransition = cabinefeetransition::with('cabinelist','patient')
			  ->select( 'cabinelist_id','patient_id',   \DB::raw( 'SUM(paid) as totalcabinefeepaid, SUM(adjust_with_advance	) as adjust_with_advance , SUM(discount) as discount'  ))
			     
				->whereDate('created_at', Carbon::yesterday())
                
				
                
				->groupBy('cabinelist_id','patient_id')
				
                ->get();
	





















                  $income_from_due_payment_medicine = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 2) 
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('patient_id')
                
                ->get();
				
				
				
				
				
				
				                 $income_from_due_payment_pathology = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 4) 
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('patient_id')
                
                ->get();
				
				
				
				
				
				
				
		/*	    $income_from_due_payment_cabine = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 1) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get(); 
				
				*/
				
				
				
			    $income_from_due_payment_surgery = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 3) 
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('patient_id')
                
                ->get();






			    $income_from_due_payment_doctor = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 5) 
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('patient_id')
                
                ->get();				
				
			    $income_from_due_payment_service = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 6) 
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('patient_id')
                
                ->get();				
				
				
$return_medicine_adjusted_with_due =  return_order::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(total_cost_before_initial_vat_and_discount) as total_before_discount ,SUM(total) as total_after_adjusting_discount, SUM(adjustment) as discount'  ))
			    ->where('transitiontype', 2) 

				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('patient_id')
                
                ->get();				



$return_medicine_by_cash =  return_order::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(total_cost_before_initial_vat_and_discount) as total_before_discount ,SUM(total) as total_after_adjusting_discount, SUM(adjustment) as discount'  ))
			    ->where('transitiontype', 1) 

				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('patient_id')
                
                ->get();	




$advance_money_deposit = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 5) 

				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('patient_id')
                
                ->get();	


$money_back_customer_at_release_time  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 8) 
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_cabine  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 1) 
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_pathology  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 4) 
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_medicine  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where(function ($query) {
    $query->where('transitiontype', 3) 
        ->orWhere('transitiontype', 7) ;
})
	    ->where('transitionproducttype', 2) 
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('patient_id')
                
                ->get();
















$money_back_customer_at_surgery  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 3) 
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('patient_id')
                
                ->get();


$money_back_customer_at_doctor  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 5) 
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('patient_id')
                
                ->get();




$money_back_customer_service  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 6) 
				->whereDate('created_at', Carbon::yesterday())
                
				->groupBy('patient_id')
                
                ->get();






                  $income_from_doctor =doctorappointmenttransaction::whereDate('created_at', Carbon::yesterday())->sum('nogod');


				
		 		// $total_due_cabine = cabinetransaction::whereDate('ending', Carbon::today())->sum('due');
		 $total_due_patho = reportorder::whereDate('created_at', Carbon::yesterday())->sum('due');
		 $total_due_medicine = order::whereDate('created_at', Carbon::yesterday())->sum('due');
		  $total_due_surgery = surgerytransaction::whereDate('created_at', Carbon::yesterday())->sum('due');
		  $doctorcalldue = doctorappointmenttransaction::whereDate('created_at', Carbon::yesterday())->sum('due');
		
$refundfrompathology = reportorder::whereDate('refunddate', Carbon::yesterday())->sum('refundamount');

/// total adjust cabinefeetransition

 $total_adjust_patho = reportorder::whereDate('created_at', Carbon::yesterday())->sum('pay_by_adv');

 $total_adjust_surgery = surgerytransaction::whereDate('created_at', Carbon::yesterday())->sum('adjust_with_advance');






 
	
 $setting= setting::first();
 
 $reagenta_transaction=
 DB::table('reagents')
 ->join('reagent_transactions', 'reagents.id', '=', 'reagent_transactions.reagent_id')
 ->join('reagent_orders', 'reagent_transactions.reagent_order_id', '=', 'reagent_orders.id')
 ->select('reagents.name', DB::raw('SUM(reagent_transactions.quantity) as quantity'), DB::raw('SUM(reagent_transactions.price_amount) as amount'))
 ->where('reagent_orders.type', '=', 1)
 ->whereDate('reagent_orders.created_at', Carbon::yesterday())
 ->groupBy('reagents.name','reagent_transactions.reagent_id')
 ->get();

 $reagent_total_purchase = DB::table('reagent_orders')
 ->select(DB::raw('SUM(price_amount) as total_price_amount'), DB::raw('SUM(due) as total_due'), DB::raw('SUM(paid) as total_paid'))
 ->where('type', '=', 1)
 ->whereDate('created_at',Carbon::yesterday())
 ->first();
 $reagenta_transaction_reagent_back
 =DB::table('reagent_orders')
 ->join('suppliers', 'reagent_orders.supplier_id', '=', 'suppliers.id')
 ->select( 'suppliers.name', DB::raw('SUM(paid) as total_paid'))
 ->where('type', '=', 2)
 ->whereDate('reagent_orders.created_at',Carbon::yesterday())
 ->groupBy('suppliers.name')
 ->get();


 $yesterday = date("d/m/y", strtotime("-1 day"));
 $title = 'Income_Statement_' . $yesterday;

	
	
		   $pdf = PDF::loadView('incomestatement.yesterday',

		compact('externalcost','admissionfee','cabinefeetransition','setting',
		'nogodincomefromservice','bakiincomefromservice','incomefromservice',
		'refundfrompathology','externalcost2','medicinecompanydharshod',
		'patient_ke_taka_ferot','medicineCompanyTransition','income_from_doctor',
		'doctorcalldue','total_due_surgery','medicinetransition','surgerytransaction',
		'total_due_medicine','total_due_patho','doctorcommission','reagenta_transaction','reagent_total_purchase','reagenta_transaction_reagent_back', 
		'doctor_er_sharer_taka', 'employee_salary','agent_commision', 'dharshod',
		'income_from_pathology_test','income_from_due_payment_service','income_from_due_payment_doctor',
		'income_from_due_payment_surgery','income_from_due_payment_pathology',
		'income_from_due_payment_medicine','return_medicine_adjusted_with_due','return_medicine_by_cash',
		'total_adjust_patho','total_adjust_surgery','doctortransition','adjustment_service','advance_money_deposit',
		'money_back_customer_at_release_time','money_back_customer_cabine','money_back_customer_pathology',
		'money_back_customer_medicine','money_back_customer_at_surgery','money_back_customer_at_doctor',
		'money_back_customer_service','m','dentalserviceodermoney_deposit', 'money_back_customer_at_admissionfee','income_from_due_payment_admissionfee',
		
'cost_for_pathology_from_outside','Pay_by_cash_to_other','due_by_cash_to_other','medicine_adv',	'medicineCompanyTransition_nogod_taka_ferot',	
		
		
		
		
		
		
		
		),
		


 [], [
 'mode'                     => '',
	'format'                   => 'A4',
	'default_font_size'        => '8',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
	'title'                    => $title,
]
   
   
   );
	
   $save = 'Income_Statement_' . $yesterday.'.pdf';

	 return $pdf->stream($save);	
	

		
						
				
					 
		 
		 
	
	}
	


/////////////////////////////////////////////////////////////// month  ->whereMonth('created_at', Carbon::now()->month)
    Public function thismonthstatment()
	{
		//$todays_external_cost = khoroch_transition::whereDate('created_at', Carbon::today())->get();
		
 $m= Carbon::now()->month;
 	 $y= Carbon::now()->year;	
			    $externalcost = khoroch_transition::with('khorocer_khad','supplier','User')
                ->select( 'khorocer_khad_id', \DB::raw( 'SUM(amount) as total_amount ,   SUM(due) as total_due , SUM(advance) as total_advance , SUM(unit) as total_unit'  ))
			     ->whereMonth('created_at', Carbon::now()->month)
                ->groupBy('khorocer_khad_id')
                
                ->get();				
				
				
				$externalcost2 = externalcost::whereMonth('created_at', Carbon::now()->month)->get();
				
			    $employee_salary = employeesalarytransaction::with('employeedetails')
                ->select( 'employeedetails_id', \DB::raw( 'SUM(totalsalary) as total_given_salary_of_a_employee'  ))
			     ->whereMonth('starting', Carbon::now()->month)
                ->groupBy('employeedetails_id')
                
                ->get();
		 
		 
		 

			    $agent_commision = agenttransaction::with('agentdetail')
                ->select( 'agentdetail_id', \DB::raw( 'SUM(paidamount) as total_given_paidamount_of_a_agents'  ))
				->where('paidorunpaid', 1 )
			     ->whereMonth('created_at', Carbon::now()->month)
                ->groupBy('agentdetail_id')
                
                ->get();		 
				
				
			    $dharshod = dhar_shod_othoba_advance_er_mal_buje_pawa::with('supplier')
                ->select( 'supplier_id',\DB::raw( 'SUM(amount) as total_baki_shod'  ))
				->where('transitiontype', 1)
				
			     ->whereMonth('created_at', Carbon::now()->month)
                ->groupBy('supplier_id')
                
                ->get();	
				
				
				//// ekhon addd korlam
				
							    $medicinecompanydharshod = medicine_comapnyer_dena_pawan_shod::with('medicinecomapnyname')
                ->select( 'medicinecomapnyname_id',\DB::raw( 'SUM(amount) as medicnecompanyrbakishod'  ))
				->where('transitiontype', 1)
				
			     ->whereMonth('created_at', Carbon::now()->month)
                ->groupBy('medicinecomapnyname_id')
                
                ->get();
				
				
				
			                  $patient_ke_taka_ferot = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as patient_ke_taka_ferot'   ))
			    ->where('transitiontype', 3) 
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('patient_id')
                
                ->get();	
				
				
				
				
				
				
				
				
				
				
				
				////
				
				
			    $doctorcommission = doctorCommissionTransition::with('doctor')
                ->select( 'doctor_id', \DB::raw( 'SUM(amount) as total_deya_commission'  ))

				
				->where(function ($query) {
    $query->where('transitiontype', 1)
        ->orWhere('transitiontype', 3)
		->orWhere('transitiontype', 4)
		->orWhere('transitiontype', 5)
		->orWhere('transitiontype', 10);

	
})

				->where('paidorunpaid', 1 )
			     ->whereMonth('created_at', Carbon::now()->month)
                ->groupBy('doctor_id')
                
                ->get();	

                $doctor_er_sharer_taka = doctorCommissionTransition::with('doctor')
                ->select( 'doctor_id', \DB::raw( 'SUM(amount) as deya_share'  ))
				
								->where(function ($query) {
    $query->where('transitiontype', 2)
        ->orWhere('transitiontype', 6)
				->orWhere('transitiontype', 8)
		->orWhere('transitiontype', 9)
		->orWhere('transitiontype', 7);
	
})
				
				
				->where('paidorunpaid', 1 )
			     ->whereMonth('created_at', Carbon::now()->month)
                ->groupBy('doctor_id')
                
                ->get();
				
				
				
				$medicineCompanyTransition = medicinecompanyorder::with('medicinecomapnyname')
                ->select( 'medicinecomapnyname_id', \DB::raw( 'SUM(pay_in_cash) as pay_in_cash , SUM(total) as amount, SUM(due) as due'  ))
				->where('transitiontype', 1)
			     ->whereMonth('created_at', Carbon::now()->month)
                ->groupBy('medicinecomapnyname_id')
                
                ->get();



				$medicineCompanyTransition_nogod_taka_ferot = medicinecompanyorder::with('medicinecomapnyname')
                ->select( 'medicinecomapnyname_id', \DB::raw( 'SUM(pay_in_cash) as pay_in_cash'))
				->where('transitiontype', 2)
			     ->whereMonth('created_at', Carbon::now()->month)
                ->groupBy('medicinecomapnyname_id')
                
                ->get();





				$cost_for_pathology_from_outside  = pathologytransitionfromotherinstitue::with('supplier')
                ->select( 'reportlist_id','supplier_id', \DB::raw( 'SUM(adjust) as amount ,COUNT(id) as total_unit, SUM(totaldiscount) as discount'  ))
			     
				 ->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('reportlist_id','supplier_id')
              		
					->orderBy(reportlist::select('name')->whereColumn('reportlists.id','pathologytransitionfromotherinstitues.reportlist_id' ))
                
				->get();




$Pay_by_cash_to_other  = pathologyorderfromotherinsitute:: whereMonth('created_at', Carbon::now()->month)->sum('pay_in_cash');


$due_by_cash_to_other  = pathologyorderfromotherinsitute::whereMonth('created_at', Carbon::now()->month)->sum('due');





$medicine_adv  = order::whereMonth('created_at', Carbon::now()->month)->sum('pay_by_adv');

















				

////////////////////// expenditure

                  $income_from_pathology_test = reporttransaction::with('reportlist')
                ->select( 'reportlist_id', \DB::raw( 'SUM(adjust) as amount , SUM(totalvat) as vat ,COUNT(id) as total_unit, SUM(totaldiscount) as discount'  ))
			     
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('reportlist_id')
              		
					->orderBy(reportlist::select('name')->whereColumn('reportlists.id','reporttransactions.reportlist_id' ))
                
				->get();



$incomefromservice = servicetransition::with('servicelistinhospital')

                ->select( 'servicelistinhospital_id', \DB::raw( 'SUM(charge) as charge , SUM(unit) as unit'  ))
			     
										->whereMonth('created_at', Carbon::now()->month)  
                
				->groupBy('servicelistinhospital_id')
                
					->orderBy(servicelistinhospital::select('servicename')->whereColumn('servicelistinhospitals.id','servicetransitions.servicelistinhospital_id' ))
                               

			   ->get();	



$nogodincomefromservice = serviceorder::whereMonth('created_at', Carbon::now()->month)->sum('paid');

$adjustment_service = serviceorder::whereMonth('created_at', Carbon::now()->month)->sum('due_adjust_from_advance');

$bakiincomefromservice = serviceorder::whereMonth('created_at', Carbon::now()->month)->sum('due');












                  $medicinetransition = medicinetransition::with('order','medicine')
                ->select( 'medicine_id', \DB::raw( 'SUM(adjust) as amount , SUM(totalvat) as vat , SUM(unit) as quantity ,   SUM(totaldiscount) as discount'  ))
			     
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('medicine_id')
                
						->orderBy(medicine::select('name')->whereColumn('medicines.id','medicinetransitions.medicine_id' ))
                			
				
				
                ->get();
				
				

                  $surgerytransaction = surgerytransaction::with( 'surgerylist')
                ->select( 'surgerylist_id', \DB::raw('count(*) as total') , \DB::raw( 'SUM(total_cost_after_initial_vat_and_discount) as amount ,     SUM(totaldiscount) as discount'  ))
			     
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy( 'surgerylist_id')
                
                ->get();







                  $doctortransition = doctorappointmenttransaction::with( 'doctor')
                ->select( 'doctor_id', \DB::raw('count(*) as total') , \DB::raw( 'SUM(grossamount) as gross_amount , SUM(fees) as Paid_by_cash, SUM(adjust_with_advance) as Paid_by_advance_cash, SUM(due) as due'  ))
			     
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy( 'doctor_id')
                
                ->get();




                  $dentalserviceodermoney_deposit = dentalserviceodermoney_deposit::with( 'doctor')
                ->select( 'doctor_id', \DB::raw('count(*) as total') , \DB::raw( 'SUM(amount) as gross_amount'  ))
			     
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy( 'doctor_id')
                
                ->get();



				
				
                 /* $cabinetransaction = cabinetransaction::with('cabinelist')
                ->select( 'cabinelist_id',  \DB::raw("DATE_FORMAT(ending, '%d-%m-%Y') as day"),      \DB::raw('count(*) as total') , \DB::raw( 'SUM(total_after_adjustment) as amount ,     SUM(discount) as discount'  ))
			     
				->whereDate('ending', Carbon::today())
                
				
                
				->groupBy('ending','cabinelist_id')
				
                ->get();								
*/











$money_back_customer_at_admissionfee  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 9) 
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('patient_id')
                
                ->get();
		
				
				
				
								                 $income_from_due_payment_admissionfee = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 9) 
				->whereMonth('created_at', Carbon::now()->month)
                
                
				->groupBy('patient_id')
                
                ->get();
				
				
				
				
                 $admissionfee = cabinetransaction::with('cabinelist')
                ->select( 'cabinelist_id',   \DB::raw( 'SUM(admissionfee) as paid, SUM(gross_amount_admisson_fee) as gross_amount_admisson_fee, SUM(discount) as discount, SUM(due) as due',   ))
			     
				->whereDate('starting', Carbon::yesterday())
                
				
                
				->groupBy('starting','cabinelist_id')
 ->get();		














 $cabinefeetransition = cabinefeetransition::with('cabinelist','patient')
			  ->select( 'cabinelist_id','patient_id',   \DB::raw( 'SUM(paid) as totalcabinefeepaid, SUM(adjust_with_advance	) as adjust_with_advance , SUM(discount) as discount'  ))
			     
				->whereMonth('created_at', Carbon::now()->month)
                
				
                
				->groupBy('cabinelist_id','patient_id')
				
                ->get();
	





















                  $income_from_due_payment_medicine = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 2) 
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('patient_id')
                
                ->get();
				
				
				
				
				
				
				                 $income_from_due_payment_pathology = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 4) 
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('patient_id')
                
                ->get();
				
				
				
				
				
				
				
		/*	    $income_from_due_payment_cabine = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 1) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get(); 
				
				*/
				
				
				
			    $income_from_due_payment_surgery = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 3) 
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('patient_id')
                
                ->get();





			    $income_from_due_payment_doctor = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 5) 
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('patient_id')
                
                ->get();				
				
			    $income_from_due_payment_service = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 6) 
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('patient_id')
                
                ->get();				
				
				
$return_medicine_adjusted_with_due =  return_order::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(total_cost_before_initial_vat_and_discount) as total_before_discount ,SUM(total) as total_after_adjusting_discount, SUM(adjustment) as discount'  ))
			    ->where('transitiontype', 2) 

				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('patient_id')
                
                ->get();				



$return_medicine_by_cash =  return_order::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(total_cost_before_initial_vat_and_discount) as total_before_discount ,SUM(total) as total_after_adjusting_discount, SUM(adjustment) as discount'  ))
			    ->where('transitiontype', 1) 

				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('patient_id')
                
                ->get();	




$advance_money_deposit = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 5) 

				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('patient_id')
                
                ->get();	


$money_back_customer_at_release_time  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 8) 
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_cabine  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 1) 
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_pathology  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 4) 
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_medicine  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where(function ($query) {
    $query->where('transitiontype', 3) 
        ->orWhere('transitiontype', 7) ;
})
	    ->where('transitionproducttype', 2) 
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('patient_id')
                
                ->get();
















$money_back_customer_at_surgery  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 3) 
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('patient_id')
                
                ->get();


$money_back_customer_at_doctor  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 5) 
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('patient_id')
                
                ->get();




$money_back_customer_service  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 6) 
				->whereMonth('created_at', Carbon::now()->month)
                
				->groupBy('patient_id')
                
                ->get();






                  $income_from_doctor =doctorappointmenttransaction::whereMonth('created_at', Carbon::now()->month)->sum('nogod');


				
		 		// $total_due_cabine = cabinetransaction::whereDate('ending', Carbon::today())->sum('due');
		 $total_due_patho = reportorder::whereMonth('created_at', Carbon::now()->month)->sum('due');
		 $total_due_medicine = order::whereMonth('created_at', Carbon::now()->month)->sum('due');
		  $total_due_surgery = surgerytransaction::whereMonth('created_at', Carbon::now()->month)->sum('due');
		  $doctorcalldue = doctorappointmenttransaction::whereMonth('created_at', Carbon::now()->month)->sum('due');
		
$refundfrompathology = reportorder::whereMonth('refunddate', Carbon::now()->month)->sum('refundamount');

/// total adjust cabinefeetransition

 $total_adjust_patho = reportorder::whereMonth('created_at', Carbon::now()->month)->sum('pay_by_adv');

 $total_adjust_surgery = surgerytransaction::whereMonth('created_at', Carbon::now()->month)->sum('adjust_with_advance');






 
	
 $setting = setting::first();

 $reagenta_transaction=
 DB::table('reagents')
 ->join('reagent_transactions', 'reagents.id', '=', 'reagent_transactions.reagent_id')
 ->join('reagent_orders', 'reagent_transactions.reagent_order_id', '=', 'reagent_orders.id')
 ->select('reagents.name', DB::raw('SUM(reagent_transactions.quantity) as quantity'), DB::raw('SUM(reagent_transactions.price_amount) as amount'))
 ->where('reagent_orders.type', '=', 1)
 ->whereMonth('reagent_orders.created_at', Carbon::now()->month)
 ->groupBy('reagents.name','reagent_transactions.reagent_id')
 ->get();

 $reagent_total_purchase = DB::table('reagent_orders')
 ->select(DB::raw('SUM(price_amount) as total_price_amount'), DB::raw('SUM(due) as total_due'), DB::raw('SUM(paid) as total_paid'))
 ->where('type', '=', 1)
 ->whereMonth('created_at', Carbon::now()->month)
 ->first();
 $reagenta_transaction_reagent_back
 =DB::table('reagent_orders')
 ->join('suppliers', 'reagent_orders.supplier_id', '=', 'suppliers.id')
 ->select( 'suppliers.name', DB::raw('SUM(paid) as total_paid'))
 ->where('type', '=', 2)
 ->whereMonth('reagent_orders.created_at', Carbon::now()->month)
 ->groupBy('suppliers.name')
 ->get();

 $current_month = date("m/Y");
 $title = 'Income_Statement_' . $current_month;
	
		   $pdf = PDF::loadView('incomestatement.month',

		compact('externalcost','admissionfee','cabinefeetransition','setting','reagenta_transaction','reagent_total_purchase','reagenta_transaction_reagent_back',
		'nogodincomefromservice','bakiincomefromservice','incomefromservice',
		'refundfrompathology','externalcost2','medicinecompanydharshod',
		'patient_ke_taka_ferot','medicineCompanyTransition','income_from_doctor','medicineCompanyTransition_nogod_taka_ferot',
		'doctorcalldue','total_due_surgery','medicinetransition','surgerytransaction',
		'total_due_medicine','total_due_patho','doctorcommission',
		'doctor_er_sharer_taka', 'employee_salary','agent_commision', 'dharshod',
		'income_from_pathology_test','income_from_due_payment_service','income_from_due_payment_doctor',
		'income_from_due_payment_surgery','income_from_due_payment_pathology',
		'income_from_due_payment_medicine','return_medicine_adjusted_with_due','return_medicine_by_cash',
		'total_adjust_patho','total_adjust_surgery','doctortransition','adjustment_service','advance_money_deposit',
		'money_back_customer_at_release_time','money_back_customer_cabine','money_back_customer_pathology',
		'money_back_customer_medicine','money_back_customer_at_surgery','money_back_customer_at_doctor',
		'money_back_customer_service','y','m','dentalserviceodermoney_deposit', 'income_from_due_payment_admissionfee',
		'money_back_customer_at_admissionfee',
		
		'cost_for_pathology_from_outside','Pay_by_cash_to_other','due_by_cash_to_other','medicine_adv',
		
		
		),
		


 [], [
 'mode'                     => '',
	'format'                   => 'A4',
	'default_font_size'        => '8',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
	'title'                    => $title,
]
   
   
   );
	
   $save = 'Income_Statement_' . $current_month.'.pdf';
	 return $pdf->stream($save);	
	












				

	
	}
	
	
	
	




/////////////////////////////////////////////// year 	
	
	
	
	
	    Public function thisyearstatment()
	{
		//$todays_external_cost = khoroch_transition::whereDate('created_at', Carbon::today())->get(); Carbon::now()->year
		 
		 
		 
		 
		 
	 $m= Carbon::now()->month;
 	 $y= Carbon::now()->year;	
			    $externalcost = khoroch_transition::with('khorocer_khad','supplier','User')
                ->select( 'khorocer_khad_id', \DB::raw( 'SUM(amount) as total_amount ,   SUM(due) as total_due , SUM(advance) as total_advance , SUM(unit) as total_unit'  ))
			     ->whereYear('created_at', Carbon::now()->year)
                ->groupBy('khorocer_khad_id')
                
                ->get();				
				
				
				$externalcost2 = externalcost::whereYear('created_at', Carbon::now()->year)->get();
				
			    $employee_salary = employeesalarytransaction::with('employeedetails')
                ->select( 'employeedetails_id', \DB::raw( 'SUM(totalsalary) as total_given_salary_of_a_employee'  ))
			     ->whereYear('starting', Carbon::now()->year)
                ->groupBy('employeedetails_id')
                
                ->get();
		 
		 
		 

			    $agent_commision = agenttransaction::with('agentdetail')
                ->select( 'agentdetail_id', \DB::raw( 'SUM(paidamount) as total_given_paidamount_of_a_agents'  ))
				->where('paidorunpaid', 1 )
			     ->whereYear('created_at', Carbon::now()->year)
                ->groupBy('agentdetail_id')
                
                ->get();		 
				
				
			    $dharshod = dhar_shod_othoba_advance_er_mal_buje_pawa::with('supplier')
                ->select( 'supplier_id',\DB::raw( 'SUM(amount) as total_baki_shod'  ))
				->where('transitiontype', 1)
				
			     ->whereYear('created_at', Carbon::now()->year)
                ->groupBy('supplier_id')
                
                ->get();	
				
				
				//// ekhon addd korlam
				
							    $medicinecompanydharshod = medicine_comapnyer_dena_pawan_shod::with('medicinecomapnyname')
                ->select( 'medicinecomapnyname_id',\DB::raw( 'SUM(amount) as medicnecompanyrbakishod'  ))
				->where('transitiontype', 1)
				
			     ->whereYear('created_at', Carbon::now()->year)
                ->groupBy('medicinecomapnyname_id')
                
                ->get();
				
				
				
			                  $patient_ke_taka_ferot = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as patient_ke_taka_ferot'   ))
			    ->where('transitiontype', 3) 
				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('patient_id')
                
                ->get();	
				
				
				
				
				
				
				
				
				
				
				
				////
				
				
			    $doctorcommission = doctorCommissionTransition::with('doctor')
                ->select( 'doctor_id', \DB::raw( 'SUM(amount) as total_deya_commission'  ))

				
				->where(function ($query) {
    $query->where('transitiontype', 1)
        ->orWhere('transitiontype', 3)
		->orWhere('transitiontype', 4)
		->orWhere('transitiontype', 5)
		->orWhere('transitiontype', 10);

	
})

				->where('paidorunpaid', 1 )
			     ->whereYear('created_at', Carbon::now()->year)
                ->groupBy('doctor_id')
                
                ->get();	

                $doctor_er_sharer_taka = doctorCommissionTransition::with('doctor')
                ->select( 'doctor_id', \DB::raw( 'SUM(amount) as deya_share'  ))
				
								->where(function ($query) {
    $query->where('transitiontype', 2)
        ->orWhere('transitiontype', 6)
				->orWhere('transitiontype', 8)
		->orWhere('transitiontype', 9)
		->orWhere('transitiontype', 7);
	
})
				
				
				->where('paidorunpaid', 1 )
			     ->whereYear('created_at', Carbon::now()->year)
                ->groupBy('doctor_id')
                
                ->get();
				
				
				
				$medicineCompanyTransition = medicinecompanyorder::with('medicinecomapnyname')
                ->select( 'medicinecomapnyname_id', \DB::raw( 'SUM(pay_in_cash) as pay_in_cash , SUM(total) as amount, SUM(due) as due'  ))
				->where('transitiontype', 1)
			    ->whereYear('created_at', Carbon::now()->year)
                ->groupBy('medicinecomapnyname_id')
                
                ->get();



				$medicineCompanyTransition_nogod_taka_ferot = medicinecompanyorder::with('medicinecomapnyname')
                ->select( 'medicinecomapnyname_id', \DB::raw( 'SUM(pay_in_cash) as pay_in_cash'))
				->where('transitiontype', 2)
			    ->whereYear('created_at', Carbon::now()->year)
                ->groupBy('medicinecomapnyname_id')
                
                ->get();




				$cost_for_pathology_from_outside  = pathologytransitionfromotherinstitue::with('supplier')
                ->select( 'reportlist_id','supplier_id', \DB::raw( 'SUM(adjust) as amount ,COUNT(id) as total_unit, SUM(totaldiscount) as discount'  ))
			     
				 ->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('reportlist_id','supplier_id')
              		
					->orderBy(reportlist::select('name')->whereColumn('reportlists.id','pathologytransitionfromotherinstitues.reportlist_id' ))
                
				->get();




$Pay_by_cash_to_other  = pathologyorderfromotherinsitute::whereYear('created_at', Carbon::now()->year)->sum('pay_in_cash');


$due_by_cash_to_other  = pathologyorderfromotherinsitute::whereYear('created_at', Carbon::now()->year)->sum('due');





$medicine_adv  = order::whereYear('created_at', Carbon::now()->year)->sum('pay_by_adv');













				

////////////////////// expenditure

                  $income_from_pathology_test = reporttransaction::with('reportlist')
                ->select( 'reportlist_id', \DB::raw( 'SUM(adjust) as amount , SUM(totalvat) as vat ,COUNT(id) as total_unit, SUM(totaldiscount) as discount'  ))
			     
				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('reportlist_id')
              		
					->orderBy(reportlist::select('name')->whereColumn('reportlists.id','reporttransactions.reportlist_id' ))
                
				->get();



$incomefromservice = servicetransition::with('servicelistinhospital')

                ->select( 'servicelistinhospital_id', \DB::raw( 'SUM(charge) as charge , SUM(unit) as unit'  ))
			     
										->whereYear('created_at', Carbon::now()->year)  
                
				->groupBy('servicelistinhospital_id')
                
					->orderBy(servicelistinhospital::select('servicename')->whereColumn('servicelistinhospitals.id','servicetransitions.servicelistinhospital_id' ))
                               

			   ->get();	



$nogodincomefromservice = serviceorder::whereYear('created_at', Carbon::now()->year)->sum('paid');

$adjustment_service = serviceorder::whereYear('created_at', Carbon::now()->year)->sum('due_adjust_from_advance');

$bakiincomefromservice = serviceorder::whereYear('created_at', Carbon::now()->year)->sum('due');












                  $medicinetransition = medicinetransition::with('order','medicine')
                ->select( 'medicine_id', \DB::raw( 'SUM(adjust) as amount , SUM(totalvat) as vat , SUM(unit) as quantity ,   SUM(totaldiscount) as discount'  ))
			     
				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('medicine_id')
                
						->orderBy(medicine::select('name')->whereColumn('medicines.id','medicinetransitions.medicine_id' ))
                			
				
				
                ->get();
				
				

                  $surgerytransaction = surgerytransaction::with( 'surgerylist')
                ->select( 'surgerylist_id', \DB::raw('count(*) as total') , \DB::raw( 'SUM(total_cost_after_initial_vat_and_discount) as amount ,     SUM(totaldiscount) as discount'  ))
			     
				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy( 'surgerylist_id')
                
                ->get();







                  $doctortransition = doctorappointmenttransaction::with( 'doctor')
                ->select( 'doctor_id', \DB::raw('count(*) as total') , \DB::raw( 'SUM(grossamount) as gross_amount , SUM(fees) as Paid_by_cash, SUM(adjust_with_advance) as Paid_by_advance_cash, SUM(due) as due'  ))
			     
				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy( 'doctor_id')
                
                ->get();


                  $dentalserviceodermoney_deposit = dentalserviceodermoney_deposit::with( 'doctor')
                ->select( 'doctor_id', \DB::raw('count(*) as total') , \DB::raw( 'SUM(amount) as gross_amount'  ))
			     
				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy( 'doctor_id')
                
                ->get();

				
				
                 /* $cabinetransaction = cabinetransaction::with('cabinelist')
                ->select( 'cabinelist_id',  \DB::raw("DATE_FORMAT(ending, '%d-%m-%Y') as day"),      \DB::raw('count(*) as total') , \DB::raw( 'SUM(total_after_adjustment) as amount ,     SUM(discount) as discount'  ))
			     
				->whereDate('ending', Carbon::today())
                
				
                
				->groupBy('ending','cabinelist_id')
				
                ->get();								
*/









				
				
				
				
								                 $income_from_due_payment_admissionfee = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 9) 
								->whereYear('created_at', Carbon::now()->year)
                
                
				->groupBy('patient_id')
                
                ->get();
				
				


$money_back_customer_at_admissionfee  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 9) 
					->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('patient_id')
                
                ->get();








				
				

                 $admissionfee = cabinetransaction::with('cabinelist')
                ->select( 'cabinelist_id',   \DB::raw( 'SUM(admissionfee) as paid, SUM(gross_amount_admisson_fee) as gross_amount_admisson_fee, SUM(discount) as discount, SUM(due) as due',   ))
			     
								->whereYear('starting', Carbon::now()->year)
                
                
				
                
				->groupBy('starting','cabinelist_id')
				
                ->get();				




























 $cabinefeetransition = cabinefeetransition::with('cabinelist','patient')
			  ->select( 'cabinelist_id','patient_id',   \DB::raw( 'SUM(paid) as totalcabinefeepaid, SUM(adjust_with_advance	) as adjust_with_advance , SUM(discount) as discount'  ))
			     
				->whereYear('created_at', Carbon::now()->year)
                
				
                
				->groupBy('cabinelist_id','patient_id')
				
                ->get();
	





















                  $income_from_due_payment_medicine = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 2) 
				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('patient_id')
                
                ->get();
				
				
				
				
				
				
				                 $income_from_due_payment_pathology = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 4) 
				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('patient_id')
                
                ->get();
				
				
				
				
				
				
				
		/*	    $income_from_due_payment_cabine = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 1) 
				->whereDate('created_at', Carbon::today())
                dentalserviceodermoney_deposit 
				->groupBy('patient_id')
                
                ->get(); 
				
				*/
				
				
				
			    $income_from_due_payment_surgery = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 3) 
				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('patient_id')
                
                ->get();






			    $income_from_due_payment_doctor = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 5) 
				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('patient_id')
                
                ->get();				
				
			    $income_from_due_payment_service = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 6) 
				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('patient_id')
                
                ->get();				
				
				
$return_medicine_adjusted_with_due =  return_order::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(total_cost_before_initial_vat_and_discount) as total_before_discount ,SUM(total) as total_after_adjusting_discount, SUM(adjustment) as discount'  ))
			    ->where('transitiontype', 2) 

				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('patient_id')
                
                ->get();				



$return_medicine_by_cash =  return_order::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(total_cost_before_initial_vat_and_discount) as total_before_discount ,SUM(total) as total_after_adjusting_discount, SUM(adjustment) as discount'  ))
			    ->where('transitiontype', 1) 

				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('patient_id')
                
                ->get();	




$advance_money_deposit = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 5) 

				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('patient_id')
                
                ->get();	


$money_back_customer_at_release_time  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 8) 
				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_cabine  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 1) 
				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_pathology  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 4) 
				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_medicine  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where(function ($query) {
    $query->where('transitiontype', 3) 
        ->orWhere('transitiontype', 7) ;
})
	    ->where('transitionproducttype', 2) 
				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('patient_id')
                
                ->get();
















$money_back_customer_at_surgery  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 3) 
				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('patient_id')
                
                ->get();


$money_back_customer_at_doctor  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 5) 
				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('patient_id')
                
                ->get();




$money_back_customer_service  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 6) 
				->whereYear('created_at', Carbon::now()->year)
                
				->groupBy('patient_id')
                
                ->get();






                  $income_from_doctor =doctorappointmenttransaction::whereYear('created_at', Carbon::now()->year)->sum('nogod');


				
		 		// $total_due_cabine = cabinetransaction::whereDate('ending', Carbon::today())->sum('due');
		 $total_due_patho = reportorder::whereYear('created_at', Carbon::now()->year)->sum('due');
		 $total_due_medicine = order::whereYear('created_at', Carbon::now()->year)->sum('due');
		  $total_due_surgery = surgerytransaction::whereYear('created_at', Carbon::now()->year)->sum('due');
		  $doctorcalldue = doctorappointmenttransaction::whereYear('created_at', Carbon::now()->year)->sum('due');
		
$refundfrompathology = reportorder::whereYear('refunddate', Carbon::now()->year)->sum('refundamount');

/// total adjust cabinefeetransition

 $total_adjust_patho = reportorder::whereYear('created_at', Carbon::now()->year)->sum('pay_by_adv');

 $total_adjust_surgery = surgerytransaction::whereYear('created_at', Carbon::now()->year)->sum('adjust_with_advance');

 $reagenta_transaction=
 DB::table('reagents')
 ->join('reagent_transactions', 'reagents.id', '=', 'reagent_transactions.reagent_id')
 ->join('reagent_orders', 'reagent_transactions.reagent_order_id', '=', 'reagent_orders.id')
 ->select('reagents.name', DB::raw('SUM(reagent_transactions.quantity) as quantity'), DB::raw('SUM(reagent_transactions.price_amount) as amount'))
 ->where('reagent_orders.type', '=', 1)
 ->whereYear('reagent_orders.created_at', Carbon::now()->year)
 ->groupBy('reagents.name','reagent_transactions.reagent_id')
 ->get();

 $reagent_total_purchase = DB::table('reagent_orders')
 ->select(DB::raw('SUM(price_amount) as total_price_amount'), DB::raw('SUM(due) as total_due'), DB::raw('SUM(paid) as total_paid'))
 ->where('type', '=', 1)
 ->whereYear('created_at', Carbon::now()->year)
 ->first();
 $reagenta_transaction_reagent_back
 =DB::table('reagent_orders')
 ->join('suppliers', 'reagent_orders.supplier_id', '=', 'suppliers.id')
 ->select( 'suppliers.name', DB::raw('SUM(paid) as total_paid'))
 ->where('type', '=', 2)
 ->whereYear('reagent_orders.created_at', Carbon::now()->year)
 ->groupBy('suppliers.name')
 ->get();

 $current_Year = date("Y");
 $title = 'Income_Statement_' . $current_Year;




 
	


 $setting= setting::first();


	
		   $pdf = PDF::loadView('incomestatement.year',

		compact('externalcost','admissionfee','cabinefeetransition','setting','reagenta_transaction','reagent_total_purchase',
		'nogodincomefromservice','bakiincomefromservice','incomefromservice','reagenta_transaction_reagent_back',
		'refundfrompathology','externalcost2','medicinecompanydharshod',
		'patient_ke_taka_ferot','medicineCompanyTransition','income_from_doctor','medicineCompanyTransition_nogod_taka_ferot',
		'doctorcalldue','total_due_surgery','medicinetransition','surgerytransaction',
		'total_due_medicine','total_due_patho','doctorcommission',
		'doctor_er_sharer_taka', 'employee_salary','agent_commision', 'dharshod',
		'income_from_pathology_test','income_from_due_payment_service','income_from_due_payment_doctor',
		'income_from_due_payment_surgery','income_from_due_payment_pathology',
		'income_from_due_payment_medicine','return_medicine_adjusted_with_due','return_medicine_by_cash',
		'total_adjust_patho','total_adjust_surgery','doctortransition','adjustment_service','advance_money_deposit',
		'money_back_customer_at_release_time','money_back_customer_cabine','money_back_customer_pathology',
		'money_back_customer_medicine','money_back_customer_at_surgery','money_back_customer_at_doctor',
		'money_back_customer_service','y','m','dentalserviceodermoney_deposit','income_from_due_payment_admissionfee',
		'money_back_customer_at_admissionfee',
		
		'cost_for_pathology_from_outside','Pay_by_cash_to_other','due_by_cash_to_other','medicine_adv',
		
		),
		


 [], [
 'mode'                     => '',
	'format'                   => 'A4',
	'default_font_size'        => '8',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
	'title'                    => $title,
]
   
   
   );
	

   $current_Year = date("Y");
   $save = 'Income_Statement_' . $current_Year.'.pdf';



	 return $pdf->stream($save);	
	
	 
		 
		 
		 
		 
		 
		 
		 














	 
				
	
		 
	
	}
	
	
	
	
	
	
	
	
	
	/////////////////////////////////////////////// Lastmonth 	 ->whereMonth('created_at', Carbon::now()->subMonth()->month)
	
	   Public function lastmonthstatment()
	{
		
			 $m= Carbon::now()->subMonth()->month;	
			 	 $y= 	Carbon::now()->subMonth()->year;
				 
				 
				 
				 
				 
				 
			    $externalcost = khoroch_transition::with('khorocer_khad','supplier','User')
                ->select( 'khorocer_khad_id', \DB::raw( 'SUM(amount) as total_amount ,   SUM(due) as total_due , SUM(advance) as total_advance , SUM(unit) as total_unit'  ))
			     ->whereMonth('created_at', Carbon::now()->subMonth()->month)
                ->groupBy('khorocer_khad_id')
                
                ->get();				
				
				
				$externalcost2 = externalcost::whereMonth('created_at', Carbon::now()->subMonth()->month)->get();
				
			    $employee_salary = employeesalarytransaction::with('employeedetails')
                ->select( 'employeedetails_id', \DB::raw( 'SUM(totalsalary) as total_given_salary_of_a_employee'  ))
			     ->whereMonth('starting', Carbon::now()->subMonth()->month)
                ->groupBy('employeedetails_id')
                
                ->get();
		 
		 
		 

			    $agent_commision = agenttransaction::with('agentdetail')
                ->select( 'agentdetail_id', \DB::raw( 'SUM(paidamount) as total_given_paidamount_of_a_agents'  ))
				->where('paidorunpaid', 1 )
			     ->whereMonth('created_at', Carbon::now()->subMonth()->month)
                ->groupBy('agentdetail_id')
                
                ->get();		 
				
				
			    $dharshod = dhar_shod_othoba_advance_er_mal_buje_pawa::with('supplier')
                ->select( 'supplier_id',\DB::raw( 'SUM(amount) as total_baki_shod'  ))
				->where('transitiontype', 1)
				
			     ->whereMonth('created_at',Carbon::now()->subMonth()->month)
                ->groupBy('supplier_id')
                
                ->get();	
				
				
				//// ekhon addd korlam
				
							    $medicinecompanydharshod = medicine_comapnyer_dena_pawan_shod::with('medicinecomapnyname')
                ->select( 'medicinecomapnyname_id',\DB::raw( 'SUM(amount) as medicnecompanyrbakishod'  ))
				->where('transitiontype', 1)
				
			     ->whereMonth('created_at', Carbon::now()->subMonth()->month)
                ->groupBy('medicinecomapnyname_id')
                
                ->get();
				
				
				
			                  $patient_ke_taka_ferot = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as patient_ke_taka_ferot'   ))
			    ->where('transitiontype', 3) 
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('patient_id')
                
                ->get();	
				
				
				
				
				
				
				
				
				
				
				
				////
				
				
			    $doctorcommission = doctorCommissionTransition::with('doctor')
                ->select( 'doctor_id', \DB::raw( 'SUM(amount) as total_deya_commission'  ))

				
				->where(function ($query) {
    $query->where('transitiontype', 1)
        ->orWhere('transitiontype', 3)
		->orWhere('transitiontype', 4)
		->orWhere('transitiontype', 5)
		->orWhere('transitiontype', 10);

	
})

				->where('paidorunpaid', 1 )
			     ->whereMonth('created_at', Carbon::now()->subMonth()->month)
                ->groupBy('doctor_id')
                
                ->get();	

                $doctor_er_sharer_taka = doctorCommissionTransition::with('doctor')
                ->select( 'doctor_id', \DB::raw( 'SUM(amount) as deya_share'  ))
				
								->where(function ($query) {
    $query->where('transitiontype', 2)
        ->orWhere('transitiontype', 6)
				->orWhere('transitiontype', 8)
		->orWhere('transitiontype', 9)
		->orWhere('transitiontype', 7);
	
})
				
				
				->where('paidorunpaid', 1 )
			     ->whereMonth('created_at', Carbon::now()->subMonth()->month)
                ->groupBy('doctor_id')
                
                ->get();
				
				
				
				$medicineCompanyTransition = medicinecompanyorder::with('medicinecomapnyname')
                ->select( 'medicinecomapnyname_id', \DB::raw( 'SUM(pay_in_cash) as pay_in_cash , SUM(total) as amount, SUM(due) as due'  ))
				->where('transitiontype', 1)
			    	->whereMonth('created_at', Carbon::now()->subMonth()->month)
                ->groupBy('medicinecomapnyname_id')
                
                ->get();



				$medicineCompanyTransition_nogod_taka_ferot = medicinecompanyorder::with('medicinecomapnyname')
                ->select( 'medicinecomapnyname_id', \DB::raw( 'SUM(pay_in_cash) as pay_in_cash'))
				->where('transitiontype', 2)
			   	->whereMonth('created_at', Carbon::now()->subMonth()->month)
                ->groupBy('medicinecomapnyname_id')
                
                ->get();



				$cost_for_pathology_from_outside  = pathologytransitionfromotherinstitue::with('supplier')
                ->select( 'reportlist_id','supplier_id', \DB::raw( 'SUM(adjust) as amount ,COUNT(id) as total_unit, SUM(totaldiscount) as discount'  ))
			     
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('reportlist_id','supplier_id')
              		
					->orderBy(reportlist::select('name')->whereColumn('reportlists.id','pathologytransitionfromotherinstitues.reportlist_id' ))
                
				->get();




$Pay_by_cash_to_other  = pathologyorderfromotherinsitute::whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('pay_in_cash');


$due_by_cash_to_other  = pathologyorderfromotherinsitute::whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('due');





$medicine_adv  = order::whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('pay_by_adv');

				

////////////////////// expenditure

                  $income_from_pathology_test = reporttransaction::with('reportlist')
                ->select( 'reportlist_id', \DB::raw( 'SUM(adjust) as amount , SUM(totalvat) as vat ,COUNT(id) as total_unit, SUM(totaldiscount) as discount'  ))
			     
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('reportlist_id')
              		
					->orderBy(reportlist::select('name')->whereColumn('reportlists.id','reporttransactions.reportlist_id' ))
                
				->get();



$incomefromservice = servicetransition::with('servicelistinhospital')

                ->select( 'servicelistinhospital_id', \DB::raw( 'SUM(charge) as charge , SUM(unit) as unit'  ))
			     
										->whereMonth('created_at', Carbon::now()->subMonth()->month)  
                
				->groupBy('servicelistinhospital_id')
                
					->orderBy(servicelistinhospital::select('servicename')->whereColumn('servicelistinhospitals.id','servicetransitions.servicelistinhospital_id' ))
                               

			   ->get();	



$nogodincomefromservice = serviceorder::whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('paid');

$adjustment_service = serviceorder::whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('due_adjust_from_advance');

$bakiincomefromservice = serviceorder::whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('due');












                  $medicinetransition = medicinetransition::with('order','medicine')
                ->select( 'medicine_id', \DB::raw( 'SUM(adjust) as amount , SUM(totalvat) as vat , SUM(unit) as quantity ,   SUM(totaldiscount) as discount'  ))
			     
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('medicine_id')
                
						->orderBy(medicine::select('name')->whereColumn('medicines.id','medicinetransitions.medicine_id' ))
                			
				
				
                ->get();
				
				

                  $surgerytransaction = surgerytransaction::with( 'surgerylist')
                ->select( 'surgerylist_id', \DB::raw('count(*) as total') , \DB::raw( 'SUM(total_cost_after_initial_vat_and_discount) as amount ,     SUM(totaldiscount) as discount'  ))
			     
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy( 'surgerylist_id')
                
                ->get();







                  $doctortransition = doctorappointmenttransaction::with( 'doctor')
                ->select( 'doctor_id', \DB::raw('count(*) as total') , \DB::raw( 'SUM(grossamount) as gross_amount , SUM(fees) as Paid_by_cash, SUM(adjust_with_advance) as Paid_by_advance_cash, SUM(due) as due'  ))
			     
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy( 'doctor_id')
                
                ->get();


                  $dentalserviceodermoney_deposit = dentalserviceodermoney_deposit::with( 'doctor')
                ->select( 'doctor_id', \DB::raw('count(*) as total') , \DB::raw( 'SUM(amount) as gross_amount'  ))
			     
			->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy( 'doctor_id')
                
                ->get();

				
				
                 /* $cabinetransaction = cabinetransaction::with('cabinelist')
                ->select( 'cabinelist_id',  \DB::raw("DATE_FORMAT(ending, '%d-%m-%Y') as day"),      \DB::raw('count(*) as total') , \DB::raw( 'SUM(total_after_adjustment) as amount ,     SUM(discount) as discount'  ))
			     
				->whereDate('ending', Carbon::today())
                
				
                
				->groupBy('ending','cabinelist_id')
				
                ->get();								
*/








$money_back_customer_at_admissionfee  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 9) 
->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('patient_id')
                
                ->get();
				
				
				
				
								                 $income_from_due_payment_admissionfee = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 9) 
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('patient_id')
                
                ->get();
				
				
				
				

                 $admissionfee = cabinetransaction::with('cabinelist')
                ->select( 'cabinelist_id',   \DB::raw( 'SUM(admissionfee) as paid, SUM(gross_amount_admisson_fee) as gross_amount_admisson_fee, SUM(discount) as discount, SUM(due) as due',   ))
			     
				->whereMonth('starting', Carbon::now()->subMonth()->month)
                
				
                
				->groupBy('starting','cabinelist_id')
				
                ->get();				
















 $cabinefeetransition = cabinefeetransition::with('cabinelist','patient')
			  ->select( 'cabinelist_id','patient_id',   \DB::raw( 'SUM(paid) as totalcabinefeepaid, SUM(adjust_with_advance	) as adjust_with_advance , SUM(discount) as discount'  ))
			     
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				
                
				->groupBy('cabinelist_id','patient_id')
				
                ->get();
	





















                  $income_from_due_payment_medicine = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 2) 
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('patient_id')
                
                ->get();
				
				
				
				
				
				
				                 $income_from_due_payment_pathology = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 4) 
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('patient_id')
                
                ->get();
				
				
				
				
				
				
				
		/*	    $income_from_due_payment_cabine = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 1) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get(); 
				
				*/
				
				
				
			    $income_from_due_payment_surgery = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 3) 
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('patient_id')
                
                ->get();






			    $income_from_due_payment_doctor = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 5) 
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('patient_id')
                
                ->get();				
				
			    $income_from_due_payment_service = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 6) 
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('patient_id')
                
                ->get();				
				
				
$return_medicine_adjusted_with_due =  return_order::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(total_cost_before_initial_vat_and_discount) as total_before_discount ,SUM(total) as total_after_adjusting_discount, SUM(adjustment) as discount'  ))
			    ->where('transitiontype', 2) 

				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('patient_id')
                
                ->get();				



$return_medicine_by_cash =  return_order::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(total_cost_before_initial_vat_and_discount) as total_before_discount ,SUM(total) as total_after_adjusting_discount, SUM(adjustment) as discount'  ))
			    ->where('transitiontype', 1) 

				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('patient_id')
                
                ->get();	




$advance_money_deposit = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 5) 

				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('patient_id')
                
                ->get();	


$money_back_customer_at_release_time  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 8) 
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_cabine  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 1) 
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_pathology  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 4) 
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_medicine  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where(function ($query) {
    $query->where('transitiontype', 3) 
        ->orWhere('transitiontype', 7) ;
})
	    ->where('transitionproducttype', 2) 
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('patient_id')
                
                ->get();
















$money_back_customer_at_surgery  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 3) 
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('patient_id')
                
                ->get();


$money_back_customer_at_doctor  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 5) 
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('patient_id')
                
                ->get();




$money_back_customer_service  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 6) 
				->whereMonth('created_at', Carbon::now()->subMonth()->month)
                
				->groupBy('patient_id')
                
                ->get();






                  $income_from_doctor =doctorappointmenttransaction::whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('nogod');


				
		 		// $total_due_cabine = cabinetransaction::whereDate('ending', Carbon::today())->sum('due');
		 $total_due_patho = reportorder::whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('due');
		 $total_due_medicine = order::whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('due');
		  $total_due_surgery = surgerytransaction::whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('due');
		  $doctorcalldue = doctorappointmenttransaction::whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('due');
		
$refundfrompathology = reportorder::whereMonth('refunddate', Carbon::now()->subMonth()->month)->sum('refundamount');

/// total adjust cabinefeetransition

 $total_adjust_patho = reportorder::whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('pay_by_adv');

 $total_adjust_surgery = surgerytransaction::whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('adjust_with_advance');



 $setting= setting::first();


 $reagenta_transaction=
 DB::table('reagents')
 ->join('reagent_transactions', 'reagents.id', '=', 'reagent_transactions.reagent_id')
 ->join('reagent_orders', 'reagent_transactions.reagent_order_id', '=', 'reagent_orders.id')
 ->select('reagents.name', DB::raw('SUM(reagent_transactions.quantity) as quantity'), DB::raw('SUM(reagent_transactions.price_amount) as amount'))
 ->where('reagent_orders.type', '=', 1)
 ->whereMonth('reagent_orders.created_at', Carbon::now()->subMonth()->month)
 ->groupBy('reagents.name','reagent_transactions.reagent_id')
 ->get();

 $reagent_total_purchase = DB::table('reagent_orders')
 ->select(DB::raw('SUM(price_amount) as total_price_amount'), DB::raw('SUM(due) as total_due'), DB::raw('SUM(paid) as total_paid'))
 ->where('type', '=', 1)
 ->whereMonth('created_at', Carbon::now()->subMonth()->month)
 ->first();

 $reagenta_transaction_reagent_back
 =DB::table('reagent_orders')
 ->join('suppliers', 'reagent_orders.supplier_id', '=', 'suppliers.id')
 ->select( 'suppliers.name', DB::raw('SUM(paid) as total_paid'))
 ->where('type', '=', 2)
 ->whereMonth('reagent_orders.created_at', Carbon::now()->subMonth()->month)
 ->groupBy('suppliers.name')
 ->get();

 $last_month = date("m/Y", strtotime("-1 month"));
 $title = 'Income_Statement_' . $last_month;
 
	
		   $pdf = PDF::loadView('incomestatement.lastmonth',

		compact('externalcost','admissionfee','cabinefeetransition','setting','reagenta_transaction',
		'nogodincomefromservice','bakiincomefromservice','incomefromservice','reagent_total_purchase',
		'refundfrompathology','externalcost2','medicinecompanydharshod','reagenta_transaction_reagent_back',
		'patient_ke_taka_ferot','medicineCompanyTransition','income_from_doctor','medicineCompanyTransition_nogod_taka_ferot',
		'doctorcalldue','total_due_surgery','medicinetransition','surgerytransaction',
		'total_due_medicine','total_due_patho','doctorcommission',
		'doctor_er_sharer_taka', 'employee_salary','agent_commision', 'dharshod',
		'income_from_pathology_test','income_from_due_payment_service','income_from_due_payment_doctor',
		'income_from_due_payment_surgery','income_from_due_payment_pathology',
		'income_from_due_payment_medicine','return_medicine_adjusted_with_due','return_medicine_by_cash',
		'total_adjust_patho','total_adjust_surgery','doctortransition','adjustment_service','advance_money_deposit',
		'money_back_customer_at_release_time','money_back_customer_cabine','money_back_customer_pathology',
		'money_back_customer_medicine','money_back_customer_at_surgery','money_back_customer_at_doctor',
		'money_back_customer_service','y','m','dentalserviceodermoney_deposit','income_from_due_payment_admissionfee',
		'money_back_customer_at_admissionfee',
		
'cost_for_pathology_from_outside','Pay_by_cash_to_other','due_by_cash_to_other','medicine_adv',

		
		
		),
		


 [], [
 'mode'                     => '',
	'format'                   => 'A4',
	'default_font_size'        => '8',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,
	'title'                    => $title,
]
   
   
   );
	  $last_month = date("m/Y", strtotime("-1 month"));
	$save = 'Income_Statement_' . $last_month. '.pdf';
	 return $pdf->stream($save);	
	
					 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 



		 
	
	
	
	}
	
	
	
	
	
	
	
	
	
	//////////////////////////////////  refunddate fetch data  between two dates ->whereBetween('created_at',[$start,$end])
	
	
	
	public function recordbetweentwodate(Request $request){
		

		
		

        $validator = Validator::make($request->all(), [
            'startdate' => 'required|date|size:10',
        'enddate' => 'date|size:10',
        ]);
		
		
		
		if ($validator->fails()) {
            return redirect('picktwodate')
                        ->withErrors($validator)
                        ->withInput();
        }
		
		$e= $request->input('enddate');
		
		        $start = date("Y-m-d",strtotime($request->input('startdate')));
        $end = date("Y-m-d",strtotime($request->input('enddate')."+1 day"));
      
	      $end1 = date("Y-m-d",strtotime($request->input('enddate')));
		$datethatsentasenddatefromcust =  date("Y-m-d",strtotime($request->input('enddate')));
		
			
						
			    $externalcost = khoroch_transition::with('khorocer_khad')
                ->select( 'khorocer_khad_id', \DB::raw( 'SUM(amount) as total_amount ,   SUM(due) as total_due , SUM(advance) as total_advance , SUM(unit) as total_unit'  ))
			     ->whereBetween('created_at',[$start,$end1])
               


			   ->groupBy('khorocer_khad_id')
                
                ->get();				
				
		
				$externalcost2 = externalcost::whereBetween('created_at',[$start,$end1])->get();
						
				
				
			    $employee_salary = employeesalarytransaction::with('employeedetails')
                ->select( 'employeedetails_id', \DB::raw( 'SUM(totalsalary) as total_given_salary_of_a_employee'  ))
			    ->whereBetween('starting',[$start,$end1])
                ->groupBy('employeedetails_id')
                
                ->get();
		 
		 
		 

			    $agent_commision = agenttransaction::with('agentdetail')
                ->select( 'agentdetail_id', \DB::raw( 'SUM(paidamount) as total_given_paidamount_of_a_agents'  ))
				->where('paidorunpaid', 1 )
				
			    ->whereBetween('created_at',[$start,$end1])
                ->groupBy('agentdetail_id')
                
                ->get();		 
				
				
			    $dharshod = dhar_shod_othoba_advance_er_mal_buje_pawa::with('supplier')
                ->select( 'supplier_id',\DB::raw( 'SUM(amount) as total_baki_shod'  ))
				->where('transitiontype', 1)
				->whereBetween('created_at',[$start,$end])

                ->groupBy('supplier_id')
                
                ->get();	
				
				
				//// ekhon addd korlam
				
							    $medicinecompanydharshod = medicine_comapnyer_dena_pawan_shod::with('medicinecomapnyname')
                ->select( 'medicinecomapnyname_id',\DB::raw( 'SUM(amount) as medicnecompanyrbakishod'  ))
				->where('transitiontype', 1)
				
			   ->whereBetween('created_at',[$start,$end1])
                ->groupBy('medicinecomapnyname_id')
                
                ->get();
				
				
				
			                  $patient_ke_taka_ferot = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as patient_ke_taka_ferot'   ))
			    ->where('transitiontype', 3) 
				->whereBetween('created_at',[$start,$end1])
                
				->groupBy('patient_id')
                
                ->get();	
				
				
				
				
					  $withdrawl_from_investors = taka_uttolon_transition::with('sharepartner')
                ->select( 'sharepartner_id', DB::raw( 'SUM(amount) as amount_invest '  ))
                ->where('transitiontype', 1)
			     ->whereBetween('created_at',[$start,$end1])
                
				->groupBy('sharepartner_id')
                
                ->get();			
				
				
				
				
				
				
				////
				
				
			    $doctorcommission = doctorCommissionTransition::with('doctor')
                ->select( 'doctor_id', \DB::raw( 'SUM(amount) as total_deya_commission'  ))

				
				->where(function ($query) {
    $query->where('transitiontype', 1)
        ->orWhere('transitiontype', 3)
		->orWhere('transitiontype', 4)
		->orWhere('transitiontype', 5)
		->orWhere('transitiontype', 10);
	
})

				->where('paidorunpaid', 1 )
			 ->whereBetween('created_at',[$start,$end1])    

                ->groupBy('doctor_id')
                
                ->get();	

                $doctor_er_sharer_taka = doctorCommissionTransition::with('doctor')
                ->select( 'doctor_id', \DB::raw( 'SUM(amount) as deya_share'  ))
				
								->where(function ($query) {
    $query->where('transitiontype', 2)
        ->orWhere('transitiontype', 6)
		  ->orWhere('transitiontype', 8)
		    ->orWhere('transitiontype', 9)
		->orWhere('transitiontype', 7);
	
})
				
				
				->where('paidorunpaid', 1 )
			   			 ->whereBetween('created_at',[$start,$end1])    
                ->groupBy('doctor_id')
                
                ->get();
				
				
				





				$medicineCompanyTransition = medicinecompanyorder::with('medicinecomapnyname')
                ->select( 'medicinecomapnyname_id', \DB::raw( 'SUM(pay_in_cash) as pay_in_cash , SUM(total) as amount, SUM(due) as due'  ))
				->where('transitiontype', 1)
			    ->whereBetween('created_at',[$start,$end1])    
                ->groupBy('medicinecomapnyname_id')
                
                ->get();



				$medicineCompanyTransition_nogod_taka_ferot = medicinecompanyorder::with('medicinecomapnyname')
                ->select( 'medicinecomapnyname_id', \DB::raw( 'SUM(pay_in_cash) as pay_in_cash'))
				->where('transitiontype', 2)
			     ->whereBetween('created_at',[$start,$end1]) 
                ->groupBy('medicinecomapnyname_id')
                
                ->get();
















				$cost_for_pathology_from_outside  = pathologytransitionfromotherinstitue::with('supplier')
                ->select( 'reportlist_id','supplier_id', \DB::raw( 'SUM(adjust) as amount ,COUNT(id) as total_unit, SUM(totaldiscount) as discount'  ))
			     
				 ->whereBetween('created_at',[$start,$end])   
                
				->groupBy('reportlist_id','supplier_id')
              		
					->orderBy(reportlist::select('name')->whereColumn('reportlists.id','pathologytransitionfromotherinstitues.reportlist_id' ))
                
				->get();




$Pay_by_cash_to_other  = pathologyorderfromotherinsitute::whereBetween('created_at',[$start,$end])->sum('pay_in_cash');


$due_by_cash_to_other  = pathologyorderfromotherinsitute::whereBetween('created_at',[$start,$end])->sum('due');





$medicine_adv  = order::whereBetween('created_at',[$start,$end])->sum('pay_by_adv');

















////////////////////// expenditure

                  $income_from_pathology_test = reporttransaction::with('reportlist')
                ->select( 'reportlist_id', \DB::raw( 'SUM(adjust) as amount , SUM(totalvat) as vat ,COUNT(id) as total_unit, SUM(totaldiscount) as discount'  ))
			     
					 ->whereBetween('created_at',[$start,$end1])   
                
				->groupBy('reportlist_id')
              		
					->orderBy(reportlist::select('name')->whereColumn('reportlists.id','reporttransactions.reportlist_id' ))
                
				->get();





$incomefromservice = servicetransition::with('servicelistinhospital')

                ->select( 'servicelistinhospital_id', \DB::raw( 'SUM(charge) as charge ,
SUM(discount) as discount ,SUM(unit) as unit'  ))
			     
										 ->whereBetween('created_at',[$start,$end1])  
                
				->groupBy('servicelistinhospital_id')
                
					->orderBy(servicelistinhospital::select('servicename')->whereColumn('servicelistinhospitals.id','servicetransitions.servicelistinhospital_id' ))
                               

			   ->get();	














$nogodincomefromservice = serviceorder::whereBetween('created_at',[$start,$end])->sum('paid');

$adjustment_service = serviceorder::whereBetween('created_at',[$start,$end])->sum('due_adjust_from_advance');

$bakiincomefromservice = serviceorder::whereBetween('created_at',[$start,$end])->sum('due');












                  $medicinetransition = medicinetransition::with('order','medicine')
                ->select( 'medicine_id', \DB::raw( 'SUM(adjust) as amount , SUM(totalvat) as vat , SUM(unit) as quantity ,   SUM(totaldiscount) as discount'  ))
			     
				 ->whereBetween('created_at',[$start,$end1])  
                
				->groupBy('medicine_id')
                
						->orderBy(medicine::select('name')->whereColumn('medicines.id','medicinetransitions.medicine_id' ))
                			
				
				
                ->get();
				
				

                  $surgerytransaction = surgerytransaction::with( 'surgerylist')
                ->select( 'surgerylist_id', \DB::raw('count(*) as total') , \DB::raw( 'SUM(total_cost_after_initial_vat_and_discount) as amount ,     SUM(totaldiscount) as discount'  ))
			     
				 ->whereBetween('created_at',[$start,$end1])  
                
				->groupBy( 'surgerylist_id')
                
                ->get();







                  $doctortransition = doctorappointmenttransaction::with( 'doctor')
                ->select( 'doctor_id', \DB::raw('count(*) as total') , \DB::raw( 'SUM(grossamount) as gross_amount , SUM(fees) as Paid_by_cash, SUM(adjust_with_advance) as Paid_by_advance_cash, SUM(due) as due'  ))
			     
				 ->whereBetween('created_at',[$start,$end])  
                
				->groupBy( 'doctor_id')
                
                ->get();


                  $dentalserviceodermoney_deposit = dentalserviceodermoney_deposit::with( 'doctor')
                ->select( 'doctor_id', \DB::raw('count(*) as total') , \DB::raw( 'SUM(amount) as gross_amount'  ))
			     
				->whereBetween('created_at',[$start,$end])  
                
				->groupBy( 'doctor_id')
                
                ->get();

				
				
                 /* $cabinetransaction = cabinetransaction::with('cabinelist')
                ->select( 'cabinelist_id',  \DB::raw("DATE_FORMAT(ending, '%d-%m-%Y') as day"),      \DB::raw('count(*) as total') , \DB::raw( 'SUM(total_after_adjustment) as amount ,     SUM(discount) as discount'  ))
			     
				->whereDate('ending', Carbon::today())
                
				
                
				->groupBy('ending','cabinelist_id')
				
                ->get();								
*/









                 $admissionfee = cabinetransaction::with('cabinelist')
                ->select( 'cabinelist_id',   \DB::raw( 'SUM(admissionfee) as paid, SUM(gross_amount_admisson_fee) as gross_amount_admisson_fee, SUM(discount) as discount, SUM(due) as due',   ))
			     
				->whereBetween('starting',[$start,$end1])
                
				
                
				->groupBy('starting','cabinelist_id')
				
                ->get();				















 $cabinefeetransition = cabinefeetransition::with('cabinelist','patient')
			  ->select( 'cabinelist_id','patient_id',   \DB::raw( 'SUM(paid) as totalcabinefeepaid, SUM(adjust_with_advance	) as adjust_with_advance , SUM(discount) as discount'  ))
			     
					->whereBetween('created_at',[$start,$end1])
                
				
                
				->groupBy('cabinelist_id','patient_id')
				
                ->get();
	





















                  $income_from_due_payment_medicine = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 2) 
					->whereBetween('created_at',[$start,$end1])
                
				->groupBy('patient_id')
                
                ->get();
				
				
								                 $income_from_due_payment_admissionfee = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 9) 
				->whereBetween('created_at',[$start,$end1])
                
				->groupBy('patient_id')
                
                ->get();
					







	
			





			
				
				
				                 $income_from_due_payment_pathology = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 4) 
					->whereBetween('created_at',[$start,$end1])
                
				->groupBy('patient_id')
                
                ->get();
				
				
				
				
				
				
				
		/*	    $income_from_due_payment_cabine = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 1) 
				->whereDate('created_at', Carbon::today())
                
				->groupBy('patient_id')
                
                ->get(); 
				
				*/
				
				
				
			    $income_from_due_payment_surgery = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 3) 
					->whereBetween('created_at',[$start,$end1])
                
				->groupBy('patient_id')
                
                ->get();






			    $income_from_due_payment_doctor = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 5) 
					->whereBetween('created_at',[$start,$end1])
                
				->groupBy('patient_id')
                
                ->get();				
				
			    $income_from_due_payment_service = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount_of_due_paid ,SUM(totalamount) as totalamount, SUM(discountondue) as duediscount'  ))
			    ->where('transitiontype', 1) 
				 ->where('transitionproducttype', 6) 
					->whereBetween('created_at',[$start,$end1])
                
				->groupBy('patient_id')
                
                ->get();				
				
				
$return_medicine_adjusted_with_due =  return_order::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(total_cost_before_initial_vat_and_discount) as total_before_discount ,SUM(total) as total_after_adjusting_discount, SUM(adjustment) as discount'  ))
			    ->where('transitiontype', 2) 

					->whereBetween('created_at',[$start,$end1])
                
				->groupBy('patient_id')
                
                ->get();				



$return_medicine_by_cash =  return_order::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(total_cost_before_initial_vat_and_discount) as total_before_discount ,SUM(total) as total_after_adjusting_discount, SUM(adjustment) as discount'  ))
			    ->where('transitiontype', 1) 

					->whereBetween('created_at',[$start,$end1])
                
				->groupBy('patient_id')
                
                ->get();	




$advance_money_deposit = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 5) 

					->whereBetween('created_at',[$start,$end1])
                
				->groupBy('patient_id')
                
                ->get();	


$money_back_customer_at_release_time  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 8) 
					->whereBetween('created_at',[$start,$end1])
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_at_admissionfee  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 9) 
					->whereBetween('created_at',[$start,$end1])
                
				->groupBy('patient_id')
                
                ->get();














$money_back_customer_cabine  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 1) 
					->whereBetween('created_at',[$start,$end1])
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_pathology  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 4) 
					->whereBetween('created_at',[$start,$end1])
                
				->groupBy('patient_id')
                
                ->get();



$money_back_customer_medicine  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where(function ($query) {
    $query->where('transitiontype', 3) 
        ->orWhere('transitiontype', 7) ;
})
	    ->where('transitionproducttype', 2) 
					->whereBetween('created_at',[$start,$end1])
                
				->groupBy('patient_id')
                
                ->get();
















$money_back_customer_at_surgery  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 3) 
					->whereBetween('created_at',[$start,$end1])
                
				->groupBy('patient_id')
                
                ->get();


$money_back_customer_at_doctor  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 5) 
					->whereBetween('created_at',[$start,$end1])
                
				->groupBy('patient_id')
                
                ->get();




$money_back_customer_service  = duetransition::with('patient')
                ->select( 'patient_id', \DB::raw( 'SUM(amount) as amount'  ))
			    ->where('transitiontype', 3) 
	    ->where('transitionproducttype', 6) 
				->whereBetween('created_at',[$start,$end1])
                
				->groupBy('patient_id')
                
                ->get();






                  $income_from_doctor =doctorappointmenttransaction::whereBetween('created_at',[$start,$end])->sum('nogod');


				
		 		// $total_due_cabine = cabinetransaction::whereDate('ending',     Carbon::today())->sum('due');  advance_money_deposit
		 $total_due_patho = reportorder::whereBetween('created_at',[$start,$end1])->sum('due');
		 $total_due_medicine = order::whereBetween('created_at',[$start,$end])->sum('due');
		  $total_due_surgery = surgerytransaction::whereBetween('created_at',[$start,$end])->sum('due');
		  $doctorcalldue = doctorappointmenttransaction::whereBetween('created_at',[$start,$end])->sum('due');
		
$refundfrompathology = reportorder::whereBetween('refunddate',[$start,$end])->sum('refundamount');

/// total adjust cabinefeetransition

 $total_adjust_patho = reportorder::whereBetween('refunddate',[$start,$end])->sum('pay_by_adv');

 $total_adjust_surgery = surgerytransaction::whereBetween('created_at',[$start,$end])->sum('adjust_with_advance');
$setting = setting::first();



$reagenta_transaction=
DB::table('reagents')
->join('reagent_transactions', 'reagents.id', '=', 'reagent_transactions.reagent_id')
->join('reagent_orders', 'reagent_transactions.reagent_order_id', '=', 'reagent_orders.id')
->select('reagents.name', DB::raw('SUM(reagent_transactions.quantity) as quantity'), DB::raw('SUM(reagent_transactions.price_amount) as amount'))
->where('reagent_orders.type', '=', 1)
->whereBetween('reagent_orders.created_at',[$start,$end1])
->groupBy('reagents.name','reagent_transactions.reagent_id')
->get();

$reagent_total_purchase = DB::table('reagent_orders')
->select(DB::raw('SUM(price_amount) as total_price_amount'), DB::raw('SUM(due) as total_due'), DB::raw('SUM(paid) as total_paid'))
->where('type', '=', 1)
->whereBetween('created_at',[$start,$end1])
->first();

$reagenta_transaction_reagent_back
=DB::table('reagent_orders')
->join('suppliers', 'reagent_orders.supplier_id', '=', 'suppliers.id')
->select( 'suppliers.name', DB::raw('SUM(paid) as total_paid'))
->where('type', '=', 2)
->whereBetween('reagent_orders.created_at',[$start,$end1])
->groupBy('suppliers.name')
->get();

$startdate = DateTime::createFromFormat('Y-m-d', $request->input('startdate'));
$enddate = DateTime::createFromFormat('Y-m-d', $request->input('enddate'));

$startdate_formatted = $startdate->format('d/m/y');
$enddate_formatted = $enddate->format('d/m/y');

$title = 'Income_Statement_' . $startdate_formatted . '-' . $enddate_formatted;

			  
			  
			  
			  $income_from_investors = taka_uttolon_transition::with('sharepartner')
                ->select( 'sharepartner_id', DB::raw( 'SUM(amount) as amount_invest '  ))
                ->where('transitiontype', 2)
			     ->whereBetween('created_at',[$start,$end1])
                
				->groupBy('sharepartner_id')
                
                ->get();


$pathology_voucher_number = reportorder::whereBetween('created_at',[$start,$end1])->count();
$medicine_voucher_number = order::whereBetween('created_at',[$start,$end1])->count();
$surgery_voucher_number = surgerytransaction::whereBetween('created_at',[$start,$end1])->count();







		   $pdf = PDF::loadView('incomestatement.databetweentwodata',

		compact('externalcost','admissionfee','cabinefeetransition','e','setting','surgery_voucher_number','reagenta_transaction',
		'nogodincomefromservice','bakiincomefromservice','incomefromservice','reagent_total_purchase',
		'refundfrompathology','externalcost2','medicinecompanydharshod','reagenta_transaction_reagent_back',
		'patient_ke_taka_ferot','medicineCompanyTransition','income_from_doctor','medicineCompanyTransition_nogod_taka_ferot',
		'doctorcalldue','total_due_surgery','medicinetransition','surgerytransaction',
		'total_due_medicine','total_due_patho','doctorcommission',
		'doctor_er_sharer_taka', 'employee_salary','agent_commision', 'dharshod',
		'income_from_pathology_test','income_from_due_payment_service','income_from_due_payment_doctor',
		'income_from_due_payment_surgery','income_from_due_payment_pathology',
		'income_from_due_payment_medicine','return_medicine_adjusted_with_due','return_medicine_by_cash',
		'total_adjust_patho','total_adjust_surgery','doctortransition','adjustment_service','advance_money_deposit','pathology_voucher_number',
		'money_back_customer_at_release_time','money_back_customer_cabine','money_back_customer_pathology',
		'money_back_customer_medicine','money_back_customer_at_surgery','money_back_customer_at_doctor',
		'money_back_customer_service','end','start','end1','dentalserviceodermoney_deposit','money_back_customer_at_admissionfee','income_from_due_payment_admissionfee','withdrawl_from_investors','income_from_investors',
		
		
	'cost_for_pathology_from_outside','Pay_by_cash_to_other','due_by_cash_to_other','medicine_adv',	'medicine_voucher_number'
		
		),
		


 [], [
	 'mode'                     => '',
	'format'                   => 'A4',
	'default_font_size'        => '8',
	'default_font'             => 'Times-New-Roman',
	'margin_left'              => 7,
	'margin_right'             => 7,
	'margin_top'               => 7,
	'margin_bottom'            => 7,

	'title' => $title,
]
   
   
   );
	

   $save = 'Income_Statement_' . $startdate_formatted . '-' . $enddate_formatted.'.pdf';
	 return $pdf->stream($save);
















//		return view ('incomestatement.incomestatementtoday')
	//	 ->with(compact('externalcost','externalcost2','start','end', 'datethatsentasenddatefromcust','medicinecompanydharshod','patient_ke_taka_ferot','medicineCompanyTransition','income_from_doctor','doctorcalldue','total_due_surgery','medicinetransition','surgerytransaction','total_due_medicine','income_from_due_payment','total_due_patho','doctorcommission', 'doctor_er_sharer_taka', 'employee_salary','agent_commision', 'dharshod', 'income_from_pathology_test'));
	
	
	

	}
	



}






/*
incomestatementthismonth
   ->whereYear('created_at', Carbon::now()->year)
                    ->whereMonth('created_at', Carbon::now()->month)

'created_at', '=', Carbon::now()->subMonth()->month // last month




*/