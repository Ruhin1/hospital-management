<?php

//date time
Use \Carbon\Carbon;
  $enddate= Carbon::now(); // ekhonkar date ber korlam

	   $time1= strtotime($patientdetails->starting);
	   $time2=strtotime($enddate);
	   
   $diff = $time2 - $time1 ;
   
echo $diff = ceil($diff/ (60*60*24));   // dui dater babodhan ke 60*60*24 
//diye vag kore dui dater moddhe diner songkha ber kora hoyeche.






//// send multiple parameter in a route 



Route::post('cabinetransaction/release_a_patient_from_cabin/{id}/{cabinetransactionid}', [ cabinetransactioncontroller::class,'release_a_patient_from_cabin'])
->name('cabinetransaction.release_a_patient_from_cabin');



<form method="post" action="{{ route('cabinetransaction.release_a_patient_from_cabin',['id'=>$booking_patient_individual->id ,'cabinetransactionid'=>$booking_patient_individual->cabinetransaction_id]   ) }}"    id="sample_form" class="form-horizontal  sample_form_for_release_bed_for_patient" enctype="multipart/form-data">
          


//// Redirect::route -> from one function  with parameter in URL in Laravel







You can pass the route parameters as second argument to route():

return \Redirect::route('regions', [$id])->with('message', 'State saved correctly!!!');


If it's only one you also don't need to write it as array:
return \Redirect::route('regions', $id)->with('message', 'State saved correctly!!!');

In case your route has more parameters, or if it has only one, but you want to clearly specify which parameter has each value (for readability purposes), you can always do this:
return \Redirect::route('regions', ['id'=>$id,'OTHER_PARAM'=>'XXX',...])->with('message', 'State saved correctly!!!');


////////// Update Multiple Column


			   cabinetransaction::whereId($cabinetransitonid)
  ->update([
  
   'discount' => $request->totaldiscount,
    'vat' => $request->vattk,
	 'total_before_vat_dis' => $request->fees,
	  'total_after_vat_dis' => $request->amount,
	   'total_after_adjustment' => $request->adjust,
	   'due' => $request->due,
        
  
  
  ]); 

/// send notification with view

        return redirect()->route('service.index')
                        ->with('success','Product created successfully.');
						
						
						// in view file  
						  @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
	
	
	//// send 404 not found in view 
	abort(404);
	
	// use of Auth 
	
	Auth() holo helper function . Auth:: holo facade. Auth()->user->id & Auth::user()->id 
	ekoi kaj korbe.kintu Auth:: e class declare korte hobe






// DB transaction return to a page 

ei jonno 	colouser er bodole facade use korote hobe 	

DB::transaction(function () use ($request,$id , $cabinetransitonid )
	{
	quer1
	query2 
}
return \Redirect::route('cabinetransaction.makecabinebillpdf', [$data->id]);
  
  ---------- eta kaj korbe na 
  
  
  DB::beginTransaction();
  
  query1 
  query 2 
   DB::commit();
  return \Redirect::route('cabinetransaction.makecabinebillpdf', [$data->id]);
  
  eta kaj korbe .
  
  
  
/////////////////////////// groupby sum in laravel 

			    $externalcost = khoroch_transition::with('khorocer_khad')
                ->select( 'khorocer_khad_id', DB::raw( 'SUM(amount) as total_amount ,   SUM(due) as total_due , SUM(advance) as total_advance '  ))
			     ->whereDate('created_at', Carbon::today())
                ->groupBy('khorocer_khad_id')
                
                ->get();				
				






<!------------------------------- Data table Datatable ------------->


///////////////////////dateformat in data table 
                 ->editColumn('created_at', function(agentdetail $data) {
					
					 return date('d/m/y H:i A', strtotime($data->created_at) );
                    
                })
				
				//////////////////////

use if else inside data table 

				    ->addColumn('transitino_type', function (doctorCommissionTransition $doctorCommissionTransition) {
                    
					if ($doctorCommissionTransition->transitiontype == 1)
					{
						$type= "কমিশন দিচ্ছেন ";
					return $type;	
					}
					
					else
					{
						$type= "আউট ডোরে রোগী দেখা বাবদ ডাক্তারের শেয়ারের টাকা  ";
					return $type;	
					}
					
					
                })
				
				 {data: 'transitino_type', name: 'transitino_type'},
				
				
				




///////////////////////// eloquent e jevabe and or ke () diye atkate pari statement1 and ( statment2 or statement3) 

                  $supplier =  supplier::where('softdelete', 0)
			->where(function ($query) {
            $query->where('due', '>', 0)
            ->orWhere('advance', '>', 0);
             }) 
			  ->latest()->get();










?>

<script>
call by self a function 


(function foo() {
	  $.ajax({
   url:"balance",
   dataType:"json",
   

success:function (response) {
	var balance = response.balance.balance;
	console.log(balance);
               
 
$("#balance").val(balance);
			   }
})
	
   
    setTimeout(foo, 3000);
})();




///	///////// modal will not close by clicking outside
	$('#formModal').modal({backdrop: 'static', keyboard: false})  


/////////////////// close modal
 $(document).on('click', '#close', function(){
$('#formModal').modal('hide');

 });
 
///// clear modal data after close it 
$(".modal").on("hidden.bs.modal", function(){
    $("#medicine_id").html("");
	 $("#medicinecomapnyname_id").html("");
	     $(this).find('form').trigger('reset');
});



////////// reset select option after submitting data 
var $options = $("#medicine_id > option").clone();
  $("#medicine_id").html('');

  $('#medicine_id').append($options);

///////////// fade in and fade out message
     $('#form_result').html(html);
	  $('#form_resultfooter').html(html);
	  $('#form_result').fadeIn();
	    $('#form_resultfooter').fadeIn();
	  $('#form_result').delay(3000).fadeOut();
	  $('#form_resultfooter').delay(3000).fadeOut();


////////////////// jquery change with radio input 

$('input[type=radio][name=transitiontype]').change(function() {
    if (this.value == '1') {
        $("#form_body").show();	
$("#due").show();
$("#pay_in_cash").show();

    }
    else if (this.value == '2') {
        $("#form_body").show();	
$("#due").hide();
$("#due").val(0);
$("#pay_in_cash").hide();	
$("#pay_in_cash").val(0);	

    }
});


</script>

