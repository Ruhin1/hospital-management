<?php

use Illuminate\Support\Facades\Route;  
use App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admincontroller;    
use App\Http\Controllers\UserController;  
use App\Http\Controllers\patientcontroller;            
use App\Http\Controllers\medicine_categorycontroller;
use App\Http\Controllers\medicinecontroller;                    
use App\Http\Controllers\categorylist;     
use App\Http\Controllers\ReagentController;
use App\Http\Controllers\medicinetransactionController; 
use App\Http\Controllers\ReturnmedicinetransactionController; 
use App\Http\Controllers\cabinetransactioncontroller;   
use App\Http\Controllers\employeedetailscontroller;
use App\Http\Controllers\cabinelistController;  
use App\Http\Controllers\productcompanytransitionController;
 use App\Http\Controllers\compnanybalncecontroller;
use App\Http\Controllers\employeetransactioncontroller; 
use App\Http\Controllers\reportcontroller;              
use App\Http\Controllers\reporttransactionController;       
use App\Http\Controllers\agentdetailcontroller;   
use App\Http\Controllers\AgenttransactionControllerController;     
use App\Http\Controllers\externalcostcontroller; 
use App\Http\Controllers\AccountController;
use App\Http\Controllers\phermacyController;  
use App\Http\Controllers\employeerolecangecontroller;      
use App\Http\Controllers\deletedusercontroller;  
use App\Http\Controllers\cashtransitionContoller; 
use App\Http\Controllers\pathologytestfromother; 
use App\Http\Controllers\relesepatient;  
use App\Http\Controllers\medicinecompanyorder; 
use App\Http\Controllers\doctorcontroller;        
use App\Http\Controllers\doctorappointmenttransactionController;   
use Dompdf\Dompdf; 
use App\Http\Controllers\makepathologyreport;        
use App\Http\Controllers\surgeryaddlistcontroller;    
use App\Http\Controllers\indexController;        
use App\Http\Controllers\surgerytransitionController;  
use App\Http\Controllers\finalreporttransitionController;   
use App\Http\Controllers\Create_khorocer_khad_Controller;                
use App\Http\Controllers\CreaterSupplierController;      
use App\Http\Controllers\KhorochTransitionConTrollerController; 
use App\Http\Controllers\incomestatemnetController;  
use App\Http\Controllers\outdoordoctortranstion;  
use App\Http\Controllers\dhar_shod_advance_get_Controller;
use App\Http\Controllers\DoctorCommissionController; 
use App\Http\Controllers\medicineCompanyController;                                
use App\Http\Controllers\TakaUttolonTransitionController;  
use App\Http\Controllers\CreatePartnerController; 
use App\Http\Controllers\joma_uttolon_report_statement_Controller; 
use App\Http\Controllers\Pathology_test_Component_Controller;  
use App\Http\Controllers\medicine_comapny_transition_Controller; 
use App\Http\Controllers\medicineComapnyrDenaPawnaShodController; 
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\show_booking_patient_and_release; 
use App\Http\Controllers\servicelisthospitalController;  
use App\Http\Controllers\prescriptionController;  
use App\Http\Controllers\servicetranstionController;  
use App\Http\Controllers\dueshowtranstionController;
use App\Http\Controllers\cabinefesscontroller;
use App\Http\Controllers\cabinetransfer;
use App\Http\Controllers\advancedeposit;
use App\Http\Controllers\prescriptionusageController;
use App\Http\Controllers\prescreptionusagekhawarageoporeController;
use App\Http\Controllers\dentalservicecontroller;
use App\Http\Controllers\duetranController;
use App\Http\Controllers\duecollectionfromphermachyController;
use App\Http\Controllers\BasicSettingController;
use App\Http\Controllers\coshmaController;
use App\Http\Controllers\indoorpatientduecollectionforphermachy;
use App\Http\Controllers\ReagentTransactionController;
use App\Http\Controllers\virtualTableController;
use App\Http\Controllers\addcoshmaInstructions;



/* medicinecontroller dueshow pathologyreportmaking releasedindoor   employeesalarymonth
|--------------------------------------------------------------------------   order
| Web Routes dueshowtranstionController selectfetch cabinetransfer takauttolon
|--------------------------------------------------------------------------
|finalreport  cabinefees finalreport agenttransaction employeesalaryfetch
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which account
| contains the "web" middleware group. Now create something great! doctorcommission
|    account      finalreport  advancedeposit  dailyreport doctorcommission
*/ 



Route::get('/', [indexController::class, 'index'])->name('welcome');





Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
 

    Auth::routes(['register' => false]);
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([ 'middleware'=>['auth','isdeleteduser','PreventBackHistory']], function(){
        Route::get('deleteduserdashboard',[deletedusercontroller::class,'index'])->name('deleteduser.dashboard');
});



Route::group([ 'middleware'=>['auth','ispathology','PreventBackHistory']], function(){
       
// reagent list 
Route::get('reagent/destroy/{id}', [ ReagentController::class,'delete'])->name('reagent.delete');
Route::post('reagent/update', [ ReagentController::class,'update'])->name('reagent.update');
Route::post('reagent/store', [ ReagentController::class,'store'])->name('reagent.store');
Route::get('reagent/edit/{id}', [ ReagentController::class,'edit'])->name('reagent.edit');
Route::get('reagent', [ ReagentController::class,'index'])->name('reagent.index');

/////////////////// Make Pathological Report cabinefees

Route::get('patient_cash_get', [ finalreporttransitionController::class,'patient_cash_get'])->name('finalreport.patient_cash_get');


Route::post('patient_cash_fetch', [ finalreporttransitionController::class,'patient_cash_fetch'])->name('finalreport.patient_cash_fetch');








Route::get('pathologyreportmaking/dropdownfortest/{id}', [makepathologyreport::class, 'dropdownfortest'])->name('pathologyreportmaking.dropdownfortest');


Route::get('pathologyreportmaking/dropdown_list', [makepathologyreport::class, 'dropdown_list'])->name('pathologyreportmaking.dropdown_list');


Route::get('pathologyreportmaking/pdf/{id}', [makepathologyreport::class, 'printpdffordoctorappointment'])->name('pathologyreportmaking.pdf');


Route::get('pathologyreportmaking/showreportforhandover', [ makepathologyreport::class,'findreportforhandoverreport']);


Route::get('pathologyreportmaking/showreport', [ makepathologyreport::class,'findreport']);


Route::get('pathologyreportmaking/deliever/{id}', [ makepathologyreport::class,'deliever'])->name('pathologyreportmaking.deliever');
Route::get('pathologyreportmaking/showreportforspecific', [ makepathologyreport::class,'showreportforspecific'])->name('pathologyreportmaking.showreportforspecific');

Route::post('pathologyreportmaking/showreportforspecificid', [ makepathologyreport::class,'showreportforspecificid'])->name('pathologyreportmaking.showreportforspecificid');

Route::post('pathologyreportmaking/fetchpatientorder', [ makepathologyreport::class,'fetchpatientorder'])->name('pathologyreportmaking.fetchpatientorder');


Route::resource('pathologyreportmaking',  makepathologyreport::class);





Route::post('pathologyreportmaking/update', [ makepathologyreport::class,'update'])->name('pathologyreportmaking.update');

Route::get('pathologyreportmaking/destroy/{id}', [ makepathologyreport::class,'destroy']);










// Report list 

Route::get('reagentransaction/delete/{id}', [ ReagentTransactionController::class,'delete'])->name('reagentransaction.delete');
Route::post('reagentransaction/store', [ ReagentTransactionController::class,'store'])->name('reagentransaction.store');
Route::get('reagentransaction/pdf/{id}', [ ReagentTransactionController::class,'printpdf'])->name('reagentransaction.pdf');
Route::get('reagentransaction/list', [ ReagentTransactionController::class,'dropdown_list'])->name('reagentransaction.dropdown_list');
Route::get('reagentransaction/index', [ ReagentTransactionController::class,'index'])->name('reagentransaction.index');



Route::get('reportlist/reagent/list', [ reportcontroller::class,'reagentlist']);
Route::resource('reportlist',  reportcontroller::class);
Route::post('reportlist/update', [ reportcontroller::class,'update'])->name('reportlist.update');
Route::get('reportlist/destroy/{id}', [ reportcontroller::class,'destroy']);



//////////////// pathology test component list 

Route::get('pathologytestcomponent/mlist', [Pathology_test_Component_Controller::class, 'mlist'])->name('pathologytestcomponent.mlist');

Route::resource('pathologytestcomponent',  Pathology_test_Component_Controller::class);
Route::post('pathologytestcomponent/update', [ Pathology_test_Component_Controller::class,'update'])->name('pathologytestcomponent.update');


Route::get('pathologytestcomponent/destroy/{id}', [ Pathology_test_Component_Controller::class,'destroy']);


////////////






});






















 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 ////////////////////////////////////////////// Phermacy Section 
Route::group([ 'middleware'=>['auth','isPhermachy','PreventBackHistory']], function(){
        Route::get('Phermachydepdashboard',[phermacyController::class,'index'])->name('phermachy.dashboard');
       
	

/////////////////////////////////// 



///////////////////////////////////////////////////

Route::get('medicinetransition/stock', [medicinetransactionController::class, 'stock'])->name('medicinetransition.stock');


Route::post('medicinetransition/fetchtwodate', [medicinetransactionController::class, 'fetchtwodate'])->name('medicinetransition.fetchtwodate');


Route::get('medicinetransition/datepick', [medicinetransactionController::class, 'datepick'])->name('medicinetransition.datepick');
	
Route::get('medicinetransition/findmeddue/{id}', [medicinetransactionController::class, 'findmeddue'])->name('medicinetransition.findmeddue');		
Route::get('medicinetransition/mlist', [medicinetransactionController::class, 'mlist'])->name('medicinetransition.mlist');
Route::get('medicinetransition/fetch', [medicinetransactionController::class, 'fetch'])->name('medicinetransition.fetch');
		

Route::get('medicinetransition/pdf/{id}', [medicinetransactionController::class, 'printpdfformedicineslip'])->name('medicinetransition.pdf');





Route::resource('medicinetransition',  medicinetransactionController::class);

Route::post('medicinetransition/update', [ medicinetransactionController::class,'update'])->name('medicinetransition.update');


Route::get('returnmedicinetransition/delete/{id}', [ReturnmedicinetransactionController::class, 'delete'])->name('ReturnmedicinetransactionController.delete');
Route::get('returnmedicinetransition/pdf/{id}', [ReturnmedicinetransactionController::class, 'pdf'])->name('ReturnmedicinetransactionController.pdf');
Route::get('returnmedicinetransition/mlist', [ReturnmedicinetransactionController::class, 'mlist'])->name('ReturnmedicinetransactionController.mlist');
Route::get('returnmedicinetransition/fetch', [ReturnmedicinetransactionController::class, 'fetch'])->name('ReturnmedicinetransactionController.fetch');
Route::post('returnmedicinetransition/store',  [ReturnmedicinetransactionController::class,'store'])->name('ReturnmedicinetransactionController.store');
Route::get('returnmedicinetransition/index',  [ReturnmedicinetransactionController::class,'index'])->name('ReturnmedicinetransactionController.index');
Route::resource('returnmedicinetransition',  ReturnmedicinetransactionController::class);
		





///////////////////// Medicne Company medicinecomapny 

Route::get('medicinecomapny', [medicineCompanyController::class, 'index'])->name('medicinecomapny.index');  

Route::get('medicinecomapny/edit/{id}', [medicineCompanyController::class, 'edit'])->name('medicinecomapny.edit'); 

Route::post('medicinecomapny/insert', [medicineCompanyController::class, 'store'])->name('medicinecomapny.store'); 




///////////////////// Medicne Company medicinecomapny transaction fetchtwodate


Route::get('medicinecomapnytransition/pdf/{id}', [medicine_comapny_transition_Controller::class, 'printpdf'])->name('medicinecomapnytransition.pdf');


Route::get('medicinecomapnytransition/dropdown_list', [medicine_comapny_transition_Controller::class, 'dropdown_list'])->name('medicinecomapnytransition.dropdown_list');  


Route::get('medicinecomapnytransition', [medicine_comapny_transition_Controller::class, 'index'])->name('medicinecomapnytransition.index');  


Route::get('medicinecomapnytransition/edit/{id}', [medicine_comapny_transition_Controller::class, 'edit'])->name('medicinecomapnytransition.edit'); 

Route::post('medicinecomapnytransition/insert', [medicine_comapny_transition_Controller::class, 'store'])->name('medicinecomapnytransition.store'); 


////////////////////  sell medicine 
Route::get('medicine/category_list', [medicinecontroller::class, 'category_list'])->name('medicine.category_list');

Route::resource('medicine',  medicinecontroller::class);

////////////////////   medicine category
Route::resource('medicinecategory',  medicine_categorycontroller::class);
Route::post('medicinecategory/update', [ medicine_categorycontroller::class,'update'])->name('medicinecategory.update');

Route::get('medicinecategory/destroy/{id}', [ medicine_categorycontroller::class,'destroy']);





/// medicine outdoor due collection   duepaymenttrans
Route::get('duecolletionphermachy/pdf/{id}', [duecollectionfromphermachyController::class, 'printpdf'])->name('duecolletionphermachy.pdf');


Route::get('duecolletionphermachy/duetrans', [duecollectionfromphermachyController::class, 'duetransforphermachy'])->name('duecolletionphermachy.duetransforphermachy');

Route::get('duecolletionphermachy/stilldueout', [duecollectionfromphermachyController::class, 'outdorrduelist'])->name('duecolletionphermachy.stilldueout');


Route::resource('duecolletionphermachy',  duecollectionfromphermachyController::class);


Route::post('duecolletionphermachy/update', [ duecollectionfromphermachyController::class,'update'])->name('duecolletionphermachy.update');

Route::get('duecolletionphermachy/destroy/{id}', [ duecollectionfromphermachyController::class,'destroy']);






// due colection from indoor patients

Route::resource('duecollection_inddor',  indoorpatientduecollectionforphermachy::class);


Route::post('duecollection_inddor/update', [ indoorpatientduecollectionforphermachy::class,'update'])->name('duecollection_inddor.update');

Route::get('duecollection_inddor/destroy/{id}', [ indoorpatientduecollectionforphermachy::class,'destroy']);























       
}); 








 /////////////////////////////////////////////// Account  Section stilldueout
 
 Route::group([ 'middleware'=>['auth','isAccount','PreventBackHistory']], function(){
        Route::get('accountdashboard',[AccountController::class,'index'])->name('account.dashboard');
        




Route::post('doctorcommission/paidfordoctor', [DoctorCommissionController::class, 'paidfordoctor'])->name('doctorcommission.paidfordoctor');









Route::get('doctorcommission/paidsenddata/{id}', [DoctorCommissionController::class, 'paidsenddata'])->name('doctorcommission.paidsenddata');



Route::get('doctorcommission/pdf/{id}', [DoctorCommissionController::class, 'printpdf'])->name('doctorcommission.pdf');



Route::get('doctorcommission', [DoctorCommissionController::class, 'index'])->name('doctorcommission.index');  

Route::get('doctorcommission/delete/{id}', [DoctorCommissionController::class, 'destroy'])->name('doctorcommission.destroy');  

Route::post('doctorcommission/insert', [DoctorCommissionController::class, 'store'])->name('doctorcommission.store'); 











// pathology test from different pathology 
Route::get('pathologytestfromother/mlist', [pathologytestfromother::class, 'mlist'])->name('pathologytestfromother.mlist');

Route::resource('pathologytestfromother',  pathologytestfromother::class);
Route::post('pathologytestfromother/update', [ pathologytestfromother::class,'update'])->name('pathologytestfromother.update');


Route::get('pathologytestfromother/destroy/{id}', [ pathologytestfromother::class,'destroy']);

















/// show due payment transition 

Route::get('duepaymenttrans/selectuser', [duetranController::class, 'selecttestuser'])->name('duepaymenttrans.select');

Route::post('duepaymenttrans/selectfetchuser', [duetranController::class, 'selectfetchuser'])->name('duepaymenttrans.selectfetchuser');



Route::get('duepaymenttrans/date', [duetranController::class, 'selectdate'])->name('duepaymenttrans.date');

Route::post('duepaymenttrans/fetchdate', [duetranController::class, 'fetchdate'])->name('duepaymenttrans.fetchdate');



Route::get('stilldueout', [duetranController::class, 'outdorrduelist'])->name('duepaymenttrans.stilldueout');



Route::get('duepaymenttrans/pdf/{id}', [duetranController::class, 'printpdf'])->name('duepaymenttrans.pdf');


Route::resource('duepaymenttrans',  duetranController::class);







Route::get('cabinetransfer/dropdown_list', [cabinetransfer::class, 'dropdown_list'])->name('cabinetransfer.dropdown_list');


Route::resource('cabinetransfer',  cabinetransfer::class);


Route::post('cabinetransfer/update', [ cabinetransfer::class,'update'])->name('cabinetransfer.update');

Route::get('cabinetransfer/destroy/{id}', [ cabinetransfer::class,'destroy']);





Route::get('advancedeposit/pdf/{id}', [advancedeposit::class, 'pdfprint'])->name('advancedeposit.pdfprint');

Route::get('advancedeposit/dropdown_list', [advancedeposit::class, 'dropdown_list'])->name('advancedeposit.dropdown_list');


Route::resource('advancedeposit',  advancedeposit::class);


Route::post('advancedeposit/update', [ advancedeposit::class,'update'])->name('advancedeposit.update');

Route::get('advancedeposit/destroy/{id}', [ advancedeposit::class,'destroy']);


















///////// Final Report bookingpatient
Route::get('finalreport/showalldue/{id}/{id2}/{id3}/{id4}', [finalreporttransitionController::class, 'showalldue'])->name('finalreport.showalldue');

Route::get('finalreport/pdfbill/{id}', [finalreporttransitionController::class, 'printpdfforbill'])->name('finalreport.pdfbill');

Route::get('finalreport/pdf/{id}/{id2}', [finalreporttransitionController::class, 'printpdfforfinalreport'])->name('finalreport.pdf');

Route::get('paydue/pdf/{id}', [finalreporttransitionController::class, 'paydue'])->name('finalreport.paydue');

Route::get('doctorlist', [finalreporttransitionController::class, 'doctorlist'])->name('finalreport.doctorlist');

Route::post('finalreport/allduepay', [finalreporttransitionController::class, 'allduepay'])->name('finalreport.allduepay');

Route::get('finalreport/pdfformreport/{id}', [finalreporttransitionController::class, 'pdfformreport'])->name('finalreport.pdfformreport');


Route::get('finalreport/duepaymentdelete/{id}',  [finalreporttransitionController::class, 'duepayment_delete'] )->name('finalreport.duepayment_delete');

Route::get('finalreport/duepayment',  [finalreporttransitionController::class, 'duepayment'] )->name('finalreport.duepayment');
Route::get('finalreport/duepayment_patient',  [finalreporttransitionController::class, 'duepayment_patient'] )->name('finalreport.duepayment_patient');


Route::post('finalreport/dueadjustmentbeforerelease', [ finalreporttransitionController::class,'dueadjustmentbeforerelease'])->name('finalreport.dueadjustmentbeforerelease');


Route::get('finalreport/outdoor',  [finalreporttransitionController::class, 'outdoor'] )->name('finalreport.outdoor');

Route::get('finalreport/releasedindoor',  [finalreporttransitionController::class, 'releasedindoor'] )->name('finalreport.releasedindoor');


Route::resource('finalreport',  finalreporttransitionController::class);


Route::post('finalreport/update', [ finalreporttransitionController::class,'update'])->name('finalreport.update');

Route::get('finalreport/destroy/{id}', [ finalreporttransitionController::class,'destroy']);


















// print prescription finalreport


Route::get('printprescription', [prescriptionController::class, 'printprescription'])->name('prescription.printprescription');










Route::get('cabinefees/pdf/{id}', [cabinefesscontroller::class, 'printpdf'])->name('cabinefees.pdf');

Route::get('cabinefees/dropdown_list', [cabinefesscontroller::class, 'dropdown_list'])->name('cabinefees.dropdown_list');

Route::get('cabinefees/fetchinformation/{id}', [cabinefesscontroller::class, 'fetchinformation'])->name('cabinefees.fetchinformation');

Route::get('cabinefees_due_pre/{id}', [cabinefesscontroller::class, 'cabinefees_due_pre'])->name('cabinefees.cabinefees_due_pre');


Route::post('cabinefees/trans', [cabinefesscontroller::class, 'calculatecabinetrans'])->name('cabinefees.trans');

Route::post('cabinefees/pay', [cabinefesscontroller::class, 'pay'])->name('cabinefees.pay');

Route::resource('cabinefees',  cabinefesscontroller::class);
Route::post('cabinefees/update', [ cabinefesscontroller::class,'update'])->name('cabinefees.update');

Route::get('cabinefees/destroy/{id}', [ cabinefesscontroller::class,'destroy']);






Route::resource('reportlist',  reportcontroller::class);
Route::post('reportlist/update', [ reportcontroller::class,'update'])->name('reportlist.update');


Route::get('reportlist/destroy/{id}', [ reportcontroller::class,'destroy']);








		
	//khorochtransition
	
	
Route::get('khorochtransition/list', [KhorochTransitionConTrollerController::class, 'listkh'])->name('khorochtransition.list');
	
Route::post('khorochtransition/listfetch', [KhorochTransitionConTrollerController::class, 'listfetch'])->name('khorochtransition.listfetch');

Route::get('khorochtransition/sompod_pdf', [KhorochTransitionConTrollerController::class, 'sompod_pdf'])->name('khorochtransition.sompod_pdf');

	
Route::get('khorochtransition/dropdown_list', [KhorochTransitionConTrollerController::class, 'dropdown_list'])->name('khorochtransition.dropdown_list');


Route::post('khorochtransition/store_sompod', [KhorochTransitionConTrollerController::class, 'store_sompod'])->name('khorochtransition.store_sompod');


Route::get('khorochtransition/sompod', [KhorochTransitionConTrollerController::class, 'sompod'])->name('khorochtransition.sompod');

Route::resource('khorochtransition',  KhorochTransitionConTrollerController::class);


//supplier
Route::resource('supplier',  CreaterSupplierController::class);



//////////////////////// registration doctor for prescription 

Route::post('doctorregiserforprescriptionpost', [prescriptionController::class, 'doctorregiserforprescriptionpost'])->name('prescription.doctorregiserforprescriptionpost');

Route::get('doctorregiserforprescription', [prescriptionController::class, 'doctorregiserforprescription'])->name('prescription.doctorregiserforprescription');


////////// khorocher khad 
Route::resource('khorocer_khad',  Create_khorocer_khad_Controller::class);

/////////
Route::resource('agentlist',  agentdetailcontroller::class);

//////////doctorlist

Route::resource('doctorlist',  doctorcontroller::class);

////////employee list
Route::resource('employeelist',  employeedetailscontroller::class);

////////



//////////// doctor appointment transactionController


Route::post('dentalservice/fetchpatorder', [dentalservicecontroller::class, 'fetchpatorder'])->name('dentalservice.fetchpatorder');


Route::get('dentalservice/dentalserviceinstallment/{id}', [dentalservicecontroller::class, 'installment'])->name('dentalservice.installment');


Route::get('dentalservice/Paitent_unfini', [dentalservicecontroller::class, 'Paitent_unfini'])->name('dentalservice.Paitent_unfini');


Route::get('dentalservicecontroller/unfinished', [dentalservicecontroller::class, 'unfinished'])->name('dentalservicecontroller.unfinished');


Route::get('dentalservice/patientlist', [dentalservicecontroller::class, 'patientlist'])->name('dentalservice.patientlist');


Route::get('dentalservice/dropdown_list', [dentalservicecontroller::class, 'dropdown_list'])->name('dentalservice.dropdown_list');


Route::get('dentalservice/pdf/{id}', [dentalservicecontroller::class, 'printpdffordoctorappointment'])->name('dentalservice.pdf');

Route::resource('dentalservice',  dentalservicecontroller::class);







Route::get('doctortransition/doctorincome', [doctorappointmenttransactionController::class, 'doctorincome'])->name('doctortransition.doctorincome');

Route::post('doctortransition/doctorfetch', [doctorappointmenttransactionController::class, 'doctorfetch'])->name('doctortransition.doctorfetch');



Route::get('doctortransition/selectuser', [doctorappointmenttransactionController::class, 'selecttestuser'])->name('doctortransition.select');

Route::post('doctortransition/selectfetchuser', [doctorappointmenttransactionController::class, 'selectfetchuser'])->name('doctortransition.selectfetchuser');


Route::get('doctortransition/selectagent', [doctorappointmenttransactionController::class, 'selectagent'])->name('doctortransition.selectagent');

Route::post('doctortransition/selectfetagent', [doctorappointmenttransactionController::class, 'selectfagent'])->name('doctortransition.selectfetchagent');


Route::get('doctortransition/finddoctorpatient', [doctorappointmenttransactionController::class, 'finddoctorpatient'])->name('doctortransition.finddoctorpatient');


Route::get('doctortransition/finddoctorpatient', [doctorappointmenttransactionController::class, 'finddoctorpatient'])->name('doctortransition.finddoctorpatient');

Route::post('doctortransition/serial', [doctorappointmenttransactionController::class, 'serial'])->name('doctortransition.serial');


Route::get('doctortransition/dropdown_list', [doctorappointmenttransactionController::class, 'dropdown_list'])->name('doctortransition.dropdown_list');
Route::get('doctortransitionlonginstall/{id}', [doctorappointmenttransactionController::class, 'installment'])->name('doctortransition.installment');


Route::get('doctortransition/pdf/{id}', [doctorappointmenttransactionController::class, 'printpdffordoctorappointment'])->name('doctortransition.pdf');

Route::resource('doctortransition',  doctorappointmenttransactionController::class);

///////////////
// report transaction 
/*

Route::post('reporttransaction/refund', [reporttransactionController::class, 'refund'])->name('reporttransaction.refund');


Route::get('reporttransaction/mlist', [reporttransactionController::class, 'mlist'])->name('reporttransaction.mlist');

Route::get('reporttransaction/fetch', [reporttransactionController::class, 'fetch'])->name('reporttransaction.fetch');


Route::resource('reporttransaction',  reporttransactionController::class);
*/




/// patient 
Route::post('patientlist/fetcthrecord', [patientcontroller::class, 'fetcthrecord'])->name('patientlist.fetcthrecord');

Route::get('patientlist/fetchlist', [patientcontroller::class, 'fetchlist'])->name('patientlist.fetchlist');
	
Route::get('patientlist/pdf/{id}', [patientcontroller::class, 'printpdfforintroductoryslip'])->name('patientlist.pdf');
		
Route::resource('patientlist', patientcontroller::class);













	
		
/// report transaction 

//Route::get('reporttransaction/pdf/{id}', [reporttransactionController::class, 'printpdfforreportslip'])->name('reporttransaction.pdf');


Route::get('/pathologytranspicktwodate', function () {
    return view('reporttransaction.picktwodate');
});




Route::get('reporttransaction/selectuser', [reporttransactionController::class, 'selecttestuser'])->name('reporttransaction.select');

Route::post('reporttransaction/selectfetchuser', [reporttransactionController::class, 'selectfetchuser'])->name('reporttransaction.selectfetchuser');

Route::get('reporttransaction/selectrefdoct', [reporttransactionController::class, 'selectrefdoct'])->name('reporttransaction.selectrefdoct');

Route::post('reporttransaction/selectfetchrefdoct', [reporttransactionController::class, 'selectfetchdoc'])->name('reporttransaction.selectfetchrefdoct');

Route::get('reporttransaction/selectagent', [reporttransactionController::class, 'selectagent'])->name('reporttransaction.selectagent');

Route::post('reporttransaction/selectfetagent', [reporttransactionController::class, 'selectfagent'])->name('reporttransaction.selectfetchagent');


Route::get('reporttransaction/select', [reporttransactionController::class, 'selecttest'])->name('reporttransaction.select');

Route::post('reporttransaction/selectfetch', [reporttransactionController::class, 'selectfetch'])->name('reporttransaction.selectfetch');


Route::post('reporttransaction/dailyreport', [reporttransactionController::class, 'dailyreport'])->name('reporttransaction.dailyreport');



Route::get('reporttransaction/pdf/{id}', [reporttransactionController::class, 'printpdfforreportslip'])->name('reporttransaction.pdf');



Route::get('reporttransaction/mlist', [reporttransactionController::class, 'mlist'])->name('reporttransaction.mlist');
Route::get('reporttransaction/fetch', [reporttransactionController::class, 'fetch'])->name('reporttransaction.fetch');

Route::post('reporttransaction/refund', [reporttransactionController::class, 'refund'])->name('reporttransaction.refund');

Route::resource('reporttransaction',  reporttransactionController::class);





Route::get('reporttransaction/edit/{id}', [reporttransactionController::class, 'edittrans'])->name('reporttransaction.edittrans');


Route::post('reporttransaction/update', [ reporttransactionController::class,'update'])->name('reporttransaction.update');

Route::get('reporttransaction/destroy/{id}', [ reporttransactionController::class,'destroy']);

	// doctor appointment transiction	





Route::post('doctortransition/update', [ doctorappointmenttransactionController::class,'update'])->name('doctortransition.update');

Route::get('doctortransition/destroy/{id}', [ doctorappointmenttransactionController::class,'destroy']);


















///////pathologytranspicktwodate


/// employee transaction 


 Route::get('month_year_pick', [employeetransactioncontroller::class, 'month_year_pick'])->name('employeetransactioncon.month_year_pick');

 Route::post('month_year_pick_fetch', [employeetransactioncontroller::class, 'month_year_pick_fetch'])->name('employeetransactioncon.month_year_pick_fetch');






 Route::get('datepic', [employeetransactioncontroller::class, 'datepick'])->name('employeetransactioncon.datepick');

 Route::post('employeesalarymonth', [employeetransactioncontroller::class, 'employeesalarymonth'])->name('employeetransactioncon.employeesalarymonth');



 Route::get('employeeshow', [employeetransactioncontroller::class, 'employeeshow'])->name('employeetransactioncon.employeeshow');

 Route::post('employeesalaryfetch', [employeetransactioncontroller::class, 'employeesalaryfetch'])->name('employeetransactioncon.employeesalaryfetch');



Route::get('employeetransactioncon/dropdown_list', [employeetransactioncontroller::class, 'dropdown_list'])->name('employeetransactioncon.dropdown_list');
Route::resource('employeetransactioncon',  employeetransactioncontroller::class);
Route::post('employeetransactioncon/update', [ employeetransactioncontroller::class,'update'])->name('employeetransactioncon.update');


// agent transaction 

Route::post('agenttransaction/fetchreport', [AgenttransactionControllerController::class, 'fetchreport'])->name('agenttransaction.fetchreport');


Route::get('agenttransaction/datepic', [AgenttransactionControllerController::class, 'datepick'])->name('agenttransaction.datepick');



Route::get('agenttransaction/selectagent', [AgenttransactionControllerController::class, 'selectagent'])->name('agenttransaction.selectagent');

Route::post('agentfetch', [AgenttransactionControllerController::class, 'agentfetch'])->name('agenttransaction.agentfetch');

Route::get('agenttransaction/pdf/{id}', [AgenttransactionControllerController::class, 'printpdf'])->name('agenttransaction.pdf');


// Route::post('agenttransaction/paid/{id}', [AgenttransactionControllerController::class, 'paid'])->name('agenttransaction.paid');

Route::post('agenttransaction/paid', [AgenttransactionControllerController::class, 'paid'])->name('agenttransaction.paid');

Route::get('agenttransaction/paidsenddata/{id}', [AgenttransactionControllerController::class, 'paidsenddata'])->name('agenttransaction.paidsenddata');


Route::get('agenttransaction/dropdown_list', [AgenttransactionControllerController::class, 'dropdown_list'])->name('agenttransaction.dropdown_list');
Route::resource('agenttransaction',  AgenttransactionControllerController::class);
Route::post('agenttransaction/update', [ AgenttransactionControllerController::class,'update'])->name('agenttransaction.update');



// external cost 

Route::resource('externalcost',  externalcostcontroller::class);
Route::post('externalcost/update', [ externalcostcontroller::class,'update'])->name('externalcost.update');


















		
		


       
});
 
 
 ///////////////////////////////////////////////////
 



Route::group([ 'middleware'=>['auth','PreventBackHistory','isUser']], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
  







//Route::get('categorylist', [PhotoController::class, 'popular']);
//Route::get('category_list', [categorylist::class,'category_list'])->name('medicine.category_list');








});  














Route::group([ 'middleware'=>['auth','isDoctor','PreventBackHistory']], function(){
   //////////////////// prescription 



Route::get('prescription/pdf/{id}', [prescriptionController::class, 'printpdf'])->name('prescription.pdf');

Route::get('prescription/dropdownlist', [prescriptionController::class, 'dropdownlist'])->name('prescription.dropdownlist');

Route::resource('prescription',  prescriptionController::class);
Route::post('prescription/update', [ prescriptionController::class,'update'])->name('prescription.update');

Route::get('prescription/destroy/{id}', [ prescriptionController::class,'destroy']);





Route::resource('prescriptionusages',  prescriptionusageController::class);
Route::post('prescriptionusages/update', [ prescriptionusageController::class,'update'])->name('prescriptionusages.update');

Route::get('prescriptionusages/destroy/{id}', [ prescriptionusageController::class,'destroy']);




Route::resource('prescriptionusagestwo',  prescreptionusagekhawarageoporeController::class);
Route::post('prescriptionusagestwo/update', [ prescreptionusagekhawarageoporeController::class,'update'])->name('prescriptionusagestwo.update');

Route::get('prescriptionusagestwo/destroy/{id}', [ prescreptionusagekhawarageoporeController::class,'destroy']);





///  release patiient    

	Route::get('relesepatient',[relesepatient::class,'index'])->name('relesepatient');
	Route::get('relesepatientdeatilsindividual/{id}',[relesepatient::class,'relesepatientdeatilsindividual'])->name('relesepatientdeatilsindividual');



Route::resource('cabinelist',  cabinelistController::class);
Route::post('cabinelist/update', [ cabinelistController::class,'update'])->name('cabinelist.update');

Route::get('cabinelist/destroy/{id}', [cabinelistController::class,'destroy']);




Route::resource('surgerylist',  surgeryaddlistcontroller::class);



Route::get('surgerytansition/dropdown_list', [surgerytransitionController::class, 'dropdown_list'])->name('surgerytansition.dropdown_list');


Route::get('surgerytansition/pdf/{id}', [surgerytransitionController::class, 'printpdffordoctorappointment'])->name('surgerytansition.pdf');


Route::resource('surgerytansition',  surgerytransitionController::class);










//hospital service 

Route::get('servicelist/dropdown_list', [ servicelisthospitalController::class,'dropdown_list'])->name('servicelist.dropdown_list');

Route::resource('servicelist',  servicelisthospitalController::class);













Route::post('servicelist/update', [ servicelisthospitalController::class,'update'])->name('servicelist.update');


Route::get('servicelist/destroy/{id}', [ servicelisthospitalController::class,'destroy']);

// service transtion controller servicetranstionController





















Route::get('servicetranstion/selectuser', [servicetranstionController::class, 'selecttestuser'])->name('servicetranstion.select');

Route::post('servicetranstion/selectfetchuser', [servicetranstionController::class, 'selectfetchuser'])->name('servicetranstion.selectfetchuser');

Route::get('servicetranstion/selectrefdoct', [servicetranstionController::class, 'selectrefdoct'])->name('servicetranstion.selectrefdoct');

Route::post('servicetranstion/selectfetchrefdoct', [servicetranstionController::class, 'selectfetchdoc'])->name('servicetranstion.selectfetchrefdoct');

Route::get('servicetranstion/selectagent', [servicetranstionController::class, 'selectagent'])->name('servicetranstion.selectagent');

Route::post('servicetranstion/selectfetagent', [servicetranstionController::class, 'selectfagent'])->name('servicetranstion.selectfetchagent');


Route::get('servicetranstion/select', [servicetranstionController::class, 'selecttest'])->name('servicetranstion.select');

Route::post('servicetranstion/selectfetch', [servicetranstionController::class, 'selectfetch'])->name('servicetranstion.selectfetch');


Route::post('servicetranstion/dailyreport', [servicetranstionController::class, 'dailyreport'])->name('servicetranstion.dailyreport');



Route::get('servicetranstion/pdf/{id}', [servicetranstionController::class, 'printpdfforreportslip'])->name('servicetranstion.pdf');



Route::get('servicetranstion/mlist', [servicetranstionController::class, 'mlist'])->name('servicetranstion.mlist');
Route::get('servicetranstion/fetch', [servicetranstionController::class, 'fetch'])->name('servicetranstion.fetch');

Route::post('servicetranstion/storeinsert', [servicetranstionController::class, 'storeinsert'])->name('servicetranstion.storeinsert');

Route::resource('servicetranstion',  servicetranstionController::class);


Route::post('servicetranstion/update', [ servicetranstionController::class,'update'])->name('servicetranstion.update');

Route::get('servicetranstion/destroy/{id}', [ servicetranstionController::class,'destroy']);




//booking patient list  finalreport

Route::resource('bookingpatient',  show_booking_patient_and_release::class);


// cabine transaction  
Route::get('cabinetransaction/details_of_individual_booking_patient/{id}', [ cabinetransactioncontroller::class,'details_of_individual_booking_patient'])
->name('cabinetransaction.details_of_individual_booking_patient');

Route::get('cabinetransaction/showbookingpatient', [ cabinetransactioncontroller::class,'showbooking_patientlist'])
->name('cabinetransaction.showbookingpatient');

Route::Post('cabinetransaction/release_a_patient_from_cabin/{id}/{cabinetransactionid}', [ cabinetransactioncontroller::class,'release_a_patient_from_cabin'])
->name('cabinetransaction.release_a_patient_from_cabin');


Route::get('cabinetransaction/makecabinebillpdf/{id}', [ cabinetransactioncontroller::class,'makecabinebillpdf'])
->name('cabinetransaction.makecabinebillpdf');


Route::get('cabinetransaction/admitbill/{id}', [ cabinetransactioncontroller::class,'admitbill'])
->name('cabinetransaction.admitbill');


Route::get('cabinetransaction/dropdown_list', [cabinetransactioncontroller::class, 'dropdown_list'])->name('cabinetransaction.dropdown_list');
Route::resource('cabinetransaction',  cabinetransactioncontroller::class);








//////////   dhar shod korun othoba advance bujhe pan 



Route::get('supplier_due_advance_pay_or_get/dropdown_list', [ dhar_shod_advance_get_Controller::class,'dropdown_list'])->name('supplier_due_advance_pay_or_get.dropdown_list');

Route::get('supplier_due_advance_pay_or_get/index', [ dhar_shod_advance_get_Controller::class,'index'])->name('supplier_due_advance_pay_or_get.index');
Route::POST('supplier_due_advance_pay_or_get/transition', [ dhar_shod_advance_get_Controller::class,'baki_shod_othoba_advance_bujhe_pawa'])->name('supplier_due_advance_pay_or_get.transition');
Route::POST('supplier_due_advance_pay_or_get/store', [ dhar_shod_advance_get_Controller::class,'store'])->name('supplier_due_advance_pay_or_get.store');
Route::POST('supplier_due_advance_pay_or_get/update', [ dhar_shod_advance_get_Controller::class,'update'])->name('supplier_due_advance_pay_or_get.update');


Route::get('supplier_due_advance_pay_or_get/delete/{id}', [ dhar_shod_advance_get_Controller::class,'destroy'])->name('supplier_due_advance_pay_or_get.delete');








//////////////// medicine companyer dena o pawna shod 
Route::get('medcinercompanydenapawanshod/dropdown_list', [ medicineComapnyrDenaPawnaShodController::class,'dropdown_list'])->name('medcinercompanydenapawanshod.dropdown_list');


Route::POST('medcinercompanydenapawanshod/transition', [ medicineComapnyrDenaPawnaShodController::class,'medcinercompanydenapawanshod'])->name('medcinercompanydenapawanshod.transition');

Route::resource('medcinercompanydenapawanshod',  medicineComapnyrDenaPawnaShodController::class);









//// show due transition for a specific patient


 Route::get('dueofoutdorpat', [dueshowtranstionController::class, 'dueofoutdorpat'])->name('dueofpatient.dueofoutdorpat');


 Route::get('dueofpatient', [dueshowtranstionController::class, 'showduecustomerpage'])->name('dueofpatient.fontpage');

 Route::post('dueshow', [dueshowtranstionController::class, 'showduetransition'])->name('dueofpatient.showduetransition');


 Route::post('dueshowoutdor', [dueshowtranstionController::class, 'dueshowoutdor'])->name('dueofpatient.dueshowoutdor');
















       
}); 









/*------------------------------------Admin  printprescription          ---------------------------------------------------*/






Route::group([ 'middleware'=>['auth','isAdmin','PreventBackHistory']], function(){
        Route::get('admindashboard',[Admincontroller::class,'index'])->name('admin.dashboard');
   


         
Route::get('setting/edit/{id}', [BasicSettingController::class, 'edit'])->name('setting.edt');
Route::get('setting', [BasicSettingController::class, 'index'])->name('setting');
Route::post('setting/update', [BasicSettingController::class, 'update'])->name('setting.update');
Route::get('medicinetransition/edit/{id}', [medicinetransactionController::class, 'edittrans'])->name('medicinetransition.editr');
Route::post('medicinetransition/update', [ medicinetransactionController::class,'update'])->name('medicinetransition.update');
Route::get('medicinetransition/destroy/{id}', [ medicinetransactionController::class,'destroy']);








/*----------------------------------------------------------------------------------*/			
Route::resource('showuserlist', employeerolecangecontroller::class);
Route::post('showuserlist/update', [employeerolecangecontroller::class,'update'])->name('showuserlist.update');

Route::get('showuserlist/destroy/{id}', [employeerolecangecontroller::class,'destroy']);
	
		
		
		
		
		


Route::post('patientlist/update', [patientcontroller::class,'update'])->name('patientlist.update');

Route::get('patient/destroy/{id}', [patientcontroller::class,'destroy']);








// add medicine  


Route::post('medicine/update', [ medicinecontroller::class,'update'])->name('medicine.update');


Route::get('medicine/destroy/{id}', [ medicinecontroller::class,'destroy']);

// add surgery list 




Route::post('surgerylist/update', [ surgeryaddlistcontroller::class,'update'])->name('surgerylist.update');


Route::get('surgerylist/destroy/{id}', [ surgeryaddlistcontroller::class,'destroy']);







Route::post('reporttransaction/refund', [reporttransactionController::class, 'refund'])->name('reporttransaction.refund');


Route::get('reporttransaction/edit/{id}', [reporttransactionController::class, 'edittrans'])->name('reporttransaction.edittrans');


Route::post('reporttransaction/update', [ reporttransactionController::class,'update'])->name('reporttransaction.update');

Route::get('reporttransaction/destroy/{id}', [ reporttransactionController::class,'destroy']);

	// doctor appointment transiction	





Route::post('doctortransition/update', [ doctorappointmenttransactionController::class,'update'])->name('doctortransition.update');

Route::get('doctortransition/destroy/{id}', [ doctorappointmenttransactionController::class,'destroy']);




Route::post('dentalservice/update', [ dentalservicecontroller::class,'update'])->name('dentalservice.update');

Route::get('dentalservice/destroy/{id}', [ dentalservicecontroller::class,'destroy']);








/// surgery transition 



Route::post('surgerytansition/update', [ surgerytransitionController::class,'update'])->name('surgerytansition.update');

Route::get('surgerytansition/destroy/{id}', [ surgerytransitionController::class,'destroy']);



























// employee list 



Route::post('employeelist/update', [ employeedetailscontroller::class,'update'])->name('employeelist.update');


Route::get('employeelist/destroy/{id}', [ employeedetailscontroller::class,'destroy']);


// doctor list 


Route::post('doctorlist/update', [ doctorcontroller::class,'update'])->name('doctorlist.update');


Route::get('doctorlist/destroy/{id}', [ doctorcontroller::class,'destroy']); 



// agent details 



Route::post('agentlist/update', [ agentdetailcontroller::class,'update'])->name('agentlist.update');


Route::get('agentlist/destroy/{id}', [ agentdetailcontroller::class,'destroy']);





Route::post('cabinetransaction/update', [ cabinetransactioncontroller::class,'update'])->name('cabinetransaction.update');


Route::get('cabinetransaction/destroy/{id}', [ cabinetransactioncontroller::class,'destroy']);



// Report transaction delete 
Route::get('reporttransaction/destroy/{id}', [ reporttransactionController::class,'destroy']);

 
// employee transaction delete 

Route::get('employeetransactioncon/destroy/{id}', [ employeetransactioncontroller::class,'destroy']);
///////////////  agenttransaction delete 

Route::get('agenttransaction/destroy/{id}', [ AgenttransactionControllerController::class,'destroy']);
///////////////  external cost transaction delete 
Route::get('externalcost/destroy/{id}', [ externalcostcontroller::class,'destroy']);




 
////////////////////////////////////////prothisthaner khoroch///////////////////////////////


// report transaction 
//Route::get('reporttransaction/mlist', [reporttransactionController::class, 'mlist'])->name('reporttransaction.mlist');
//Route::get('reporttransaction/fetch', [reporttransactionController::class, 'fetch'])->name('reporttransaction.fetch');

////khorocer khad 
Route::post('khorocer_khad/update', [ Create_khorocer_khad_Controller::class,'update'])->name('khorocer_khad.update');

Route::get('khorocer_khad/destroy/{id}', [ Create_khorocer_khad_Controller::class,'destroy']);













//Route::post('khorocer_khad/update', [ Create_khorocer_khad_Controller::class,'update'])->name('khorocer_khad.update');

Route::get('medcinercompanydenapawanshod/destroy/{id}', [ medicineComapnyrDenaPawnaShodController::class,'destroy']);





/////////Supplier 

Route::post('supplier/update', [ CreaterSupplierController::class,'update'])->name('supplier.update');

Route::get('supplier/destroy/{id}', [ CreaterSupplierController::class,'destroy']);



///////////// khoroch transaction   


Route::post('khorochtransition/update', [ KhorochTransitionConTrollerController::class,'update'])->name('khorochtransition.update');

Route::get('khorochtransition/destroy/{id}', [ KhorochTransitionConTrollerController::class,'destroy']);


///////////// Taka uttolon o joma  transaction   

Route::get('takauttolon/dropdown_list', [TakaUttolonTransitionController::class, 'dropdown_list'])->name('takauttolon.dropdown_list');

Route::resource('takauttolon',  TakaUttolonTransitionController::class);
//Route::post('khorochtransition/update', [ KhorochTransitionConTrollerController::class,'update'])->name('khorochtransition.update');

Route::get('takauttolon/destroy/{id}', [ TakaUttolonTransitionController::class,'destroy']);

// medicinecomapny
Route::post('medicinecomapny/update', [medicineCompanyController::class, 'update'])->name('medicinecomapny.update'); 

Route::get('medicinecomapny/delete/{id}', [medicineCompanyController::class, 'destroy'])->name('medicinecomapny.destroy');  

//medicinecomapnytransition
Route::post('medicinecomapnytransition/update', [medicine_comapny_transition_Controller::class, 'update'])->name('medicinecomapnytransition.update'); 

Route::get('medicinecomapnytransition/delete/{id}', [medicine_comapny_transition_Controller::class, 'destroy'])->name('medicinecomapnytransition.destroy');  












///////////// business Partner   


Route::resource('businesspartner',  CreatePartnerController::class);
Route::post('businesspartner/update', [ CreatePartnerController::class,'update'])->name('businesspartner.update');

Route::get('businesspartner/destroy/{id}', [ CreatePartnerController::class,'destroy']);


///////////////////////// Taka uttolon o joma report ////////////////////////////////



 Route::get('joma_uttolon_statement_today', [joma_uttolon_report_statement_Controller::class, 'todaystatement'])->name('joma_uttolon_statement_today');


 Route::get('joma_uttolon_statement_yesterday', [joma_uttolon_report_statement_Controller::class, 'yesterdaystatment'])->name('joma_uttolon_statement_yesterday');


 Route::get('joma_uttolon_statement_month', [joma_uttolon_report_statement_Controller::class, 'thismonthstatment'])->name('joma_uttolon_statement_month');

 Route::get('joma_uttolon_statement_year', [joma_uttolon_report_statement_Controller::class, 'thisyear'])->name('joma_uttolon_statement_year');

 Route::get('joma_uttolon_statement_lastmonth', [joma_uttolon_report_statement_Controller::class, 'lastmonth'])->name('joma_uttolon_statement_lastmonth');

// Route::post('incomestatbtwtwodate', [incomestatemnetController::class, 'recordbetweentwodate'])->name('incomestatbtwtwodate');

//Route::get('/picktwodate', function () {  doctorcommission
//    return view('incomestatement.picktwodate');
//});





 Route::get('doctorstatementoday', [outdoordoctortranstion::class, 'todaystatment'])->name('outdoordoctortranstion.doctorstatementoday');


 Route::get('doctorstatementyesterday', [outdoordoctortranstion::class, 'yesterdaystatment'])->name('outdoordoctortranstion.doctorstatementyesterday');


 Route::get('doctorstatementthismonth', [outdoordoctortranstion::class, 'thismonth'])->name('outdoordoctortranstion.doctorstatementthismonth');


 Route::get('doctorstatementthisyear', [outdoordoctortranstion::class, 'thisyear'])->name('outdoordoctortranstion.doctorstatementthisyear');


 Route::post('outdoordoctorbtwtwodate', [outdoordoctortranstion::class, 'outdoordoctorbtwtwodate'])->name('outdoordoctorbtwtwodate');




Route::get('/picktwodatefordoctortransition', function () {
    return view('incomefromdoctoroutdoor.picktwodate');
});






Route::post('duepaymenttrans/update', [ duetranController::class,'update'])->name('duepaymenttrans.update');


Route::get('duepaymenttrans/destroy/{id}', [ duetranController::class,'destroy']);













////////////////////////////// Income Statement 

 Route::get('incomestatementtoday', [incomestatemnetController::class, 'todaystatment'])->name('incomestatementtoday.todaystatment');


 Route::get('incomestatementyesterday', [incomestatemnetController::class, 'yesterdaystatment'])->name('incomestatementyesterday.incomestatementyesterday');


 Route::get('incomestatementthismonth', [incomestatemnetController::class, 'thismonthstatment'])->name('thismonthstatment.thismonthstatment');

 Route::get('incomestatementthisyear', [incomestatemnetController::class, 'thisyearstatment'])->name('thisyearstatment.thisyearstatment');

 Route::get('incomestatementlastmonth', [incomestatemnetController::class, 'lastmonthstatment'])->name('incomestatementlastmonth.incomestatementlastmonth');

 Route::post('incomestatbtwtwodate', [incomestatemnetController::class, 'recordbetweentwodate'])->name('incomestatbtwtwodate');

Route::get('/picktwodate', function () {
    return view('incomestatement.picktwodate');
});






////////////////////////////// Doctor Commission /////////////



/*

Route::post('doctorcommission/paidfordoctor', [DoctorCommissionController::class, 'paidfordoctor'])->name('doctorcommission.paidfordoctor');









Route::get('doctorcommission/paidsenddata/{id}', [DoctorCommissionController::class, 'paidsenddata'])->name('doctorcommission.paidsenddata');



Route::get('doctorcommission/pdf/{id}', [DoctorCommissionController::class, 'printpdf'])->name('doctorcommission.pdf');



Route::get('doctorcommission', [DoctorCommissionController::class, 'index'])->name('doctorcommission.index');  

Route::get('doctorcommission/delete/{id}', [DoctorCommissionController::class, 'destroy'])->name('doctorcommission.destroy');  

Route::post('doctorcommission/insert', [DoctorCommissionController::class, 'store'])->name('doctorcommission.store'); 

*/







//////// check balance 
 Route::get('balance', [BalanceController::class, 'index'])->name('balance');








//product transition

Route::get('productcompanytrans/dropdownlist', [productcompanytransitionController::class, 'dropdownlist'])->name('productcompanytrans.dropdownlist');

Route::resource('productcompanytrans',  productcompanytransitionController::class);
Route::post('productcompanytrans/update', [ productcompanytransitionController::class,'update'])->name('productcompanytrans.update');

Route::get('productcompanytrans/destroy/{id}', [ productcompanytransitionController::class,'destroy']);



Route::get('balancesheetforcompany/pdf/{id}', [compnanybalncecontroller::class, 'printvoucher'])->name('balancesheetforcompany.pdf');

Route::resource('balancesheetforcompany',  compnanybalncecontroller::class);
Route::post('balancesheetforcompany/update', [ compnanybalncecontroller::class,'update'])->name('balancesheetforcompany.update');

Route::get('balancesheetforcompany/destroy/{id}', [ compnanybalncecontroller::class,'destroy']);





});



Route::get('virtual-table/{print?}', [virtualTableController::class, 'show']); 
Route::get('showmedicne', [virtualTableController::class, 'index']);
Route::post('showmedicnepdf/{print?}', [virtualTableController::class, 'showmedicnepdf']);
///--------
Route::get('addcoshmainstructions',[addcoshmaInstructions::class,'index'])->name('coshmainstructions.index');
Route::post('storecoshmainstructions',[addcoshmaInstructions::class,'store'])->name('coshmainstructions.store');
Route::get('/coshma/{id}/edit', [ addcoshmaInstructions::class,'edit']);
Route::post('coshma/update', [ addcoshmaInstructions::class,'update'])->name('coshma.update');
Route::get('coshma/destroy/{id}', [ addcoshmaInstructions::class,'destroy']);
///-----


Route::get('coshmaprescription',[coshmaController::class,'index'])->name('coshma.index');
Route::get('coshma/prescription/delate/{id}',[coshmaController::class,'destroy'])->name('coshma.delate');
Route::get('/coshma/{id}/edit',[coshmaController::class,'edit']);
Route::get('printcoshmaPreection/{id}',[coshmaController::class,'printcoshmaPreection'])->name('print.coshma.Preection');
Route::post('coshma/update', [coshmaController::class,'update'])->name('coshma.update');

   
Route::get('test',function(){
    $data = new \App\Models\coshmaPrescription();
    $data->name = 'sdds';
    $data->save();
});  




