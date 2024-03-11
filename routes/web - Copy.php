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
use App\Http\Controllers\medicinetransactionController; 
use App\Http\Controllers\ReturnmedicinetransactionController; 
use App\Http\Controllers\cabinetransactioncontroller;   
use App\Http\Controllers\employeedetailscontroller;
use App\Http\Controllers\cabinelistController;  

 
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


use App\Http\Controllers\relesepatient;  


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


use App\Http\Controllers\prescriptionusageController;
use App\Http\Controllers\prescreptionusagekhawarageoporeController;

use App\Http\Controllers\duetranController;



/* medicinecontroller dueshow pathologyreportmaking  dueshow  dueofpatient
|--------------------------------------------------------------------------   
| Web Routes dueshowtranstionController
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 



Route::get('/', [indexController::class, 'index']);





Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([ 'middleware'=>['auth','isdeleteduser','PreventBackHistory']], function(){
        Route::get('deleteduserdashboard',[deletedusercontroller::class,'index'])->name('deleteduser.dashboard');
});



Route::group([ 'middleware'=>['auth','ispathology','PreventBackHistory']], function(){
       
/////////////////// Make Pathological Report 



Route::get('pathologyreportmaking/dropdownfortest/{id}', [makepathologyreport::class, 'dropdownfortest'])->name('pathologyreportmaking.dropdownfortest');


Route::get('pathologyreportmaking/dropdown_list', [makepathologyreport::class, 'dropdown_list'])->name('pathologyreportmaking.dropdown_list');


Route::get('pathologyreportmaking/pdf/{id}', [makepathologyreport::class, 'printpdffordoctorappointment'])->name('pathologyreportmaking.pdf');


Route::get('pathologyreportmaking/showreportforhandover', [ makepathologyreport::class,'findreportforhandoverreport']);


Route::get('pathologyreportmaking/showreport', [ makepathologyreport::class,'findreport']);


Route::get('pathologyreportmaking/deliever/{id}', [ makepathologyreport::class,'deliever'])->name('pathologyreportmaking.deliever');
Route::get('pathologyreportmaking/showreportforspecific', [ makepathologyreport::class,'showreportforspecific'])->name('pathologyreportmaking.showreportforspecific');

Route::post('pathologyreportmaking/showreportforspecificid', [ makepathologyreport::class,'showreportforspecificid'])->name('pathologyreportmaking.showreportforspecificid');



Route::resource('pathologyreportmaking',  makepathologyreport::class);





Route::post('pathologyreportmaking/update', [ makepathologyreport::class,'update'])->name('pathologyreportmaking.update');

Route::get('pathologyreportmaking/destroy/{id}', [ makepathologyreport::class,'destroy']);










// Report list 


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
       
		
		
Route::get('medicinetransition/mlist', [medicinetransactionController::class, 'mlist'])->name('medicinetransition.mlist');
Route::get('medicinetransition/fetch', [medicinetransactionController::class, 'fetch'])->name('medicinetransition.fetch');
		

Route::get('medicinetransition/pdf/{id}', [medicinetransactionController::class, 'printpdfformedicineslip'])->name('medicinetransition.pdf');



Route::get('medicinetransition/edit/{id}', [medicinetransactionController::class, 'edittrans'])->name('medicinetransition.editr');


Route::resource('medicinetransition',  medicinetransactionController::class);

Route::post('medicinetransition/update', [ medicinetransactionController::class,'update'])->name('medicinetransition.update');



Route::get('returnmedicinetransition/mlist', [ReturnmedicinetransactionController::class, 'mlist'])->name('ReturnmedicinetransactionController.mlist');
Route::get('returnmedicinetransition/fetch', [ReturnmedicinetransactionController::class, 'fetch'])->name('ReturnmedicinetransactionController.fetch');

Route::resource('returnmedicinetransition',  ReturnmedicinetransactionController::class);
		











////////////////////  sell medicine 
Route::get('medicine/category_list', [medicinecontroller::class, 'category_list'])->name('medicine.category_list');

Route::resource('medicine',  medicinecontroller::class);

////////////////////   medicine category
Route::resource('medicinecategory',  medicine_categorycontroller::class);
Route::post('medicinecategory/update', [ medicine_categorycontroller::class,'update'])->name('medicinecategory.update');

Route::get('medicinecategory/destroy/{id}', [ medicine_categorycontroller::class,'destroy']);








       
}); 








 /////////////////////////////////////////////// Account  Section 
 
 Route::group([ 'middleware'=>['auth','isAccount','PreventBackHistory']], function(){
        Route::get('accountdashboard',[AccountController::class,'index'])->name('account.dashboard');
        


Route::get('cabinefees/pdf/{id}', [cabinefesscontroller::class, 'printpdf'])->name('cabinefees.pdf');

Route::get('cabinefees/dropdown_list', [cabinefesscontroller::class, 'dropdown_list'])->name('cabinefees.dropdown_list');

Route::get('cabinefees/fetchinformation/{id}', [cabinefesscontroller::class, 'fetchinformation'])->name('cabinefees.fetchinformation');



Route::post('cabinefees/trans', [cabinefesscontroller::class, 'calculatecabinetrans'])->name('cabinefees.trans');

Route::post('cabinefees/pay', [cabinefesscontroller::class, 'pay'])->name('cabinefees.pay');

Route::resource('cabinefees',  cabinefesscontroller::class);
Route::post('cabinefees/update', [ cabinefesscontroller::class,'update'])->name('cabinefees.update');

Route::get('cabinefees/destroy/{id}', [ cabinefesscontroller::class,'destroy']);












		
	//khorochtransition
	
	
Route::get('khorochtransition/list', [KhorochTransitionConTrollerController::class, 'listkh'])->name('khorochtransition.list');
	
Route::post('khorochtransition/listfetch', [KhorochTransitionConTrollerController::class, 'listfetch'])->name('khorochtransition.listfetch');



	
Route::get('khorochtransition/dropdown_list', [KhorochTransitionConTrollerController::class, 'dropdown_list'])->name('khorochtransition.dropdown_list');

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

Route::get('doctortransition/dropdown_list', [doctorappointmenttransactionController::class, 'dropdown_list'])->name('doctortransition.dropdown_list');


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

Route::get('patientlist/pdf/{id}', [patientcontroller::class, 'printpdfforintroductoryslip'])->name('patientlist.pdf');
		
Route::resource('patientlist', patientcontroller::class);













	
		
/// report transaction 

//Route::get('reporttransaction/pdf/{id}', [reporttransactionController::class, 'printpdfforreportslip'])->name('reporttransaction.pdf');


Route::get('/pathologytranspicktwodate', function () {
    return view('reporttransaction.picktwodate');
});


Route::get('reporttransaction/select', [reporttransactionController::class, 'selecttest'])->name('reporttransaction.select');

Route::post('reporttransaction/selectfetch', [reporttransactionController::class, 'selectfetch'])->name('reporttransaction.selectfetch');


Route::post('reporttransaction/dailyreport', [reporttransactionController::class, 'dailyreport'])->name('reporttransaction.dailyreport');

Route::post('reporttransaction/refund', [reporttransactionController::class, 'refund'])->name('reporttransaction.refund');


Route::get('reporttransaction/edit/{id}', [reporttransactionController::class, 'edittrans'])->name('reporttransaction.edittrans');


Route::get('reporttransaction/pdf/{id}', [reporttransactionController::class, 'printpdfforreportslip'])->name('reporttransaction.pdf');



Route::get('reporttransaction/mlist', [reporttransactionController::class, 'mlist'])->name('reporttransaction.mlist');
Route::get('reporttransaction/fetch', [reporttransactionController::class, 'fetch'])->name('reporttransaction.fetch');


Route::resource('reporttransaction',  reporttransactionController::class);

Route::post('reporttransaction/update', [ reporttransactionController::class,'update'])->name('reporttransaction.update');



///////


/// employee transaction 




 Route::get('employeeshow', [employeetransactioncontroller::class, 'employeeshow'])->name('employeetransactioncon.employeeshow');

 Route::post('employeesalaryfetch', [employeetransactioncontroller::class, 'employeesalaryfetch'])->name('employeetransactioncon.employeesalaryfetch');



Route::get('employeetransactioncon/dropdown_list', [employeetransactioncontroller::class, 'dropdown_list'])->name('employeetransactioncon.dropdown_list');
Route::resource('employeetransactioncon',  employeetransactioncontroller::class);
Route::post('employeetransactioncon/update', [ employeetransactioncontroller::class,'update'])->name('employeetransactioncon.update');


// agent transaction 

Route::get('agenttransaction/paid/{id}', [AgenttransactionControllerController::class, 'paid'])->name('agenttransaction.paid');
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


















       
}); 









/*------------------------------------Admin ---------------------------------------------------*/






Route::group([ 'middleware'=>['auth','isAdmin','PreventBackHistory']], function(){
        Route::get('admindashboard',[Admincontroller::class,'index'])->name('admin.dashboard');
   

///  release patiient    

	Route::get('relesepatient',[relesepatient::class,'index'])->name('relesepatient');
	Route::get('relesepatientdeatilsindividual/{id}',[relesepatient::class,'relesepatientdeatilsindividual'])->name('relesepatientdeatilsindividual');







Route::post('medicinetransition/update', [ medicinetransactionController::class,'update'])->name('medicinetransition.update');

Route::get('medicinetransition/destroy/{id}', [ medicinetransactionController::class,'destroy']);








/*----------------------------------------------------------------------------------*/			
Route::resource('showuserlist', employeerolecangecontroller::class);
Route::post('showuserlist/update', [employeerolecangecontroller::class,'update'])->name('showuserlist.update');

Route::get('showuserlist/destroy/{id}', [employeerolecangecontroller::class,'destroy']);
	
		
		
		
		
		


Route::post('patientlist/update', [patientcontroller::class,'update'])->name('patientlist.update');

Route::get('patient/destroy/{id}', [patientcontroller::class,'destroy']);






Route::resource('cabinelist',  cabinelistController::class);
Route::post('cabinelist/update', [ cabinelistController::class,'update'])->name('cabinelist.update');

Route::get('cabinelist/destroy/{id}', [cabinelistController::class,'destroy']);


// add medicine  


Route::post('medicine/update', [ medicinecontroller::class,'update'])->name('medicine.update');


Route::get('medicine/destroy/{id}', [ medicinecontroller::class,'destroy']);

// add surgery list 



Route::resource('surgerylist',  surgeryaddlistcontroller::class);
Route::post('surgerylist/update', [ surgeryaddlistcontroller::class,'update'])->name('surgerylist.update');


Route::get('surgerylist/destroy/{id}', [ surgeryaddlistcontroller::class,'destroy']);












Route::post('reporttransaction/update', [ reporttransactionController::class,'update'])->name('reporttransaction.update');

Route::get('reporttransaction/destroy/{id}', [ reporttransactionController::class,'destroy']);

	// doctor appointment transiction	





Route::post('doctortransition/update', [ doctorappointmenttransactionController::class,'update'])->name('doctortransition.update');

Route::get('doctortransition/destroy/{id}', [ doctorappointmenttransactionController::class,'destroy']);












/// surgery transition 


Route::get('surgerytansition/dropdown_list', [surgerytransitionController::class, 'dropdown_list'])->name('surgerytansition.dropdown_list');


Route::get('surgerytansition/pdf/{id}', [surgerytransitionController::class, 'printpdffordoctorappointment'])->name('surgerytansition.pdf');


Route::resource('surgerytansition',  surgerytransitionController::class);
Route::post('surgerytansition/update', [ surgerytransitionController::class,'update'])->name('surgerytansition.update');

Route::get('surgerytansition/destroy/{id}', [ surgerytransitionController::class,'destroy']);

///////// Final Report bookingpatient
Route::get('finalreport/showalldue/{id}/{id2}/{id3}', [finalreporttransitionController::class, 'showalldue'])->name('finalreport.showalldue');

Route::get('finalreport/pdfbill/{id}', [finalreporttransitionController::class, 'printpdfforbill'])->name('finalreport.pdfbill');

Route::get('finalreport/pdf/{id}/{id2}', [finalreporttransitionController::class, 'printpdfforfinalreport'])->name('finalreport.pdf');

Route::post('finalreport/dueadjustmentbeforerelease', [ finalreporttransitionController::class,'dueadjustmentbeforerelease'])->name('finalreport.dueadjustmentbeforerelease');


Route::get('finalreport/outdoor',  [finalreporttransitionController::class, 'outdoor'] )->name('finalreport.outdoor');

Route::get('finalreport/releasedindoor',  [finalreporttransitionController::class, 'releasedindoor'] )->name('finalreport.releasedindoor');


Route::resource('finalreport',  finalreporttransitionController::class);
Route::post('finalreport/update', [ finalreporttransitionController::class,'update'])->name('finalreport.update');

Route::get('finalreport/destroy/{id}', [ finalreporttransitionController::class,'destroy']);


























// employee list 



Route::post('employeelist/update', [ employeedetailscontroller::class,'update'])->name('employeelist.update');


Route::get('employeelist/destroy/{id}', [ employeedetailscontroller::class,'destroy']);


// doctor list 


Route::post('doctorlist/update', [ doctorcontroller::class,'update'])->name('doctorlist.update');


Route::get('doctorlist/destroy/{id}', [ doctorcontroller::class,'destroy']); 



// agent details 



Route::post('agentlist/update', [ agentdetailcontroller::class,'update'])->name('agentlist.update');


Route::get('agentlist/destroy/{id}', [ agentdetailcontroller::class,'destroy']);


//hospital service 

Route::get('servicelist/dropdown_list', [ servicelisthospitalController::class,'dropdown_list'])->name('servicelist.dropdown_list');
Route::resource('servicelist',  servicelisthospitalController::class);
Route::post('servicelist/update', [ servicelisthospitalController::class,'update'])->name('servicelist.update');


Route::get('servicelist/destroy/{id}', [ servicelisthospitalController::class,'destroy']);

// service transtion controller servicetranstionController

Route::resource('servicetranstion',  servicetranstionController::class);


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



// print prescription
Route::get('printprescription', [prescriptionController::class, 'printprescription'])->name('prescription.printprescription');








//////////   dhar shod korun othoba advance bujhe pan 


Route::get('supplier_due_advance_pay_or_get/index', [ dhar_shod_advance_get_Controller::class,'index'])->name('supplier_due_advance_pay_or_get.index');
Route::POST('supplier_due_advance_pay_or_get/transition', [ dhar_shod_advance_get_Controller::class,'baki_shod_othoba_advance_bujhe_pawa'])->name('supplier_due_advance_pay_or_get.transition');
Route::POST('supplier_due_advance_pay_or_get/store', [ dhar_shod_advance_get_Controller::class,'store'])->name('supplier_due_advance_pay_or_get.store');

//////////////// medicine companyer dena o pawna shod 


Route::POST('medcinercompanydenapawanshod/transition', [ medicineComapnyrDenaPawnaShodController::class,'medcinercompanydenapawanshod'])->name('medcinercompanydenapawanshod.transition');

Route::resource('medcinercompanydenapawanshod',  medicineComapnyrDenaPawnaShodController::class);



//Route::post('khorocer_khad/update', [ Create_khorocer_khad_Controller::class,'update'])->name('khorocer_khad.update');

//Route::get('khorocer_khad/destroy/{id}', [ Create_khorocer_khad_Controller::class,'destroy']);





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

//Route::get('/picktwodate', function () {
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




//// show due transition for a specific patient


 Route::get('dueofoutdorpat', [dueshowtranstionController::class, 'dueofoutdorpat'])->name('dueofpatient.dueofoutdorpat');


 Route::get('dueofpatient', [dueshowtranstionController::class, 'showduecustomerpage'])->name('dueofpatient.fontpage');

 Route::post('dueshow', [dueshowtranstionController::class, 'showduetransition'])->name('dueofpatient.showduetransition');


 Route::post('dueshowoutdor', [dueshowtranstionController::class, 'dueshowoutdor'])->name('dueofpatient.dueshowoutdor');




/// show due payment transition 




Route::get('stilldueout', [duetranController::class, 'outdorrduelist'])->name('duepaymenttrans.stilldueout');



Route::get('duepaymenttrans/pdf/{id}', [duetranController::class, 'printpdf'])->name('duepaymenttrans.pdf');


Route::resource('duepaymenttrans',  duetranController::class);

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
Route::get('doctorcommission/pdf/{id}', [DoctorCommissionController::class, 'printpdf'])->name('doctorcommission.pdf');

Route::get('doctorcommission/paid/{id}', [DoctorCommissionController::class, 'paid'])->name('doctorcommission.paid');
Route::get('doctorcommission', [DoctorCommissionController::class, 'index'])->name('doctorcommission.index');  

Route::get('doctorcommission/delete/{id}', [DoctorCommissionController::class, 'destroy'])->name('doctorcommission.destroy');  

Route::post('doctorcommission/insert', [DoctorCommissionController::class, 'store'])->name('doctorcommission.store'); 






///////////////////// Medicne Company medicinecomapny 

Route::get('medicinecomapny', [medicineCompanyController::class, 'index'])->name('medicinecomapny.index');  

Route::get('medicinecomapny/edit/{id}', [medicineCompanyController::class, 'edit'])->name('medicinecomapny.edit'); 

Route::post('medicinecomapny/insert', [medicineCompanyController::class, 'store'])->name('medicinecomapny.store'); 

Route::post('medicinecomapny/update', [medicineCompanyController::class, 'update'])->name('medicinecomapny.update'); 

Route::get('medicinecomapny/delete/{id}', [medicineCompanyController::class, 'destroy'])->name('medicinecomapny.destroy');  



///////////////////// Medicne Company medicinecomapny transaction


Route::get('medicinecomapnytransition/dropdown_list', [medicine_comapny_transition_Controller::class, 'dropdown_list'])->name('medicinecomapnytransition.dropdown_list');  


Route::get('medicinecomapnytransition', [medicine_comapny_transition_Controller::class, 'index'])->name('medicinecomapnytransition.index');  


Route::get('medicinecomapnytransition/edit/{id}', [medicine_comapny_transition_Controller::class, 'edit'])->name('medicinecomapnytransition.edit'); 

Route::post('medicinecomapnytransition/insert', [medicine_comapny_transition_Controller::class, 'store'])->name('medicinecomapnytransition.store'); 

Route::post('medicinecomapnytransition/update', [medicine_comapny_transition_Controller::class, 'update'])->name('medicinecomapnytransition.update'); 

Route::get('medicinecomapnytransition/delete/{id}', [medicine_comapny_transition_Controller::class, 'destroy'])->name('medicinecomapnytransition.destroy');  



//////// check balance 
 Route::get('balance', [BalanceController::class, 'index'])->name('balance');






});







