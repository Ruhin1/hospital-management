

@extends('layout.main')

@section('content')


<style>
.modal-lg {
    max-width: 90% !important;

}


</style>

 
 






</head>

  
 






<body>
<h2> Discharge Patient from Cabin/bed and make bill </h2>
<div class="container">
  <div class="row">
    
	
			<form method="post" action="{{ route('cabinetransaction.release_a_patient_from_cabin',['id'=>$booking_patient_individual->id ,'cabinetransactionid'=>$booking_patient_individual->cabinetransaction_id]   ) }}"    id="sample_form" class="form-horizontal  sample_form_for_release_bed_for_patient" enctype="multipart/form-data">
          
		  @csrf                

		  
	 <div class="form-group">   	
     <label class="control-label col-md-4">Patient Name  : </label>
     <div class="col-md-8">
	 <input type="text"   name="patient_name" id="patient_name" value= "{{$booking_patient_individual->name}}" class="form-control  patient_name" required readonly />
    </div>
	</div>
	
		 <div class="form-group">
     <label class="control-label col-md-4">Patient ID  : </label>
     <div class="col-md-8">
	 <input type="text"   name="patient_id" id="patient_id" value= "{{$booking_patient_individual->id}}" class="form-control  patient_id" required readonly />
    </div>
	</div>
			 
	
	<div class="form-group">
    <label class="control-label col-md-4">Cabine NO : </label>
    <div class="col-md-8">
    <input type="text"   name="cabine_no" id="cabine_no"  value= "{{$cabine_name}}" class="form-control  cabine_no" required readonly />
   </div>
   </div>
         	<div class="form-group">
    <label class="control-label col-md-4">Admission Date : </label>
    <div class="col-md-8">
    <input type="text"   name="straing_day" id="straing_day" value= "{{$admissionday}}" class="form-control  straing_day" required readonly />
   </div>
   </div>
   
   
   
   
   
      	<div class="form-group">
    <label class="control-label col-md-4">Cabine Fare Unpaid Since : </label>
    <div class="col-md-8">
    <input type="text"   name="straing_day" id="straing_day" value= "{{$start}}" class="form-control  straing_day" required readonly />
   </div>
   </div>
      	<div class="form-group">
    <label class="control-label col-md-4">Day of the Patient Get Released : </label>
    <div class="col-md-8">
    <input type="text"   name="Ending_day" id="Ending_day" value= "{{ $enddateinstring }}" class="form-control  Ending_day" required readonly />
   </div>
   </div>
   
   	<div class="form-group">
    <label class="control-label col-md-4">Number of Days that's fare is Unpaid : </label>
    <div class="col-md-8">
    <input type="text"   name="number_of_days" id="number_of_days" value="{{$differnece_btw_two_date_by_day}}" class="form-control  number_of_days" required readonly />
   </div>
   </div>
   

   
	<div class="form-group">
    <label class="control-label col-md-4">Total charge (Excluding vat and Tax)  : </label>
    <div class="col-md-8">
	 <input type="text"   name="fees" id="fees" value="{{$total_seat_fair}}" class="form-control fees" required  />
	</div>
	</div>
	
		<div class="form-group">
    <label class="control-label col-md-4">VAT(%) : </label>
    <div class="col-md-8">
	 <input type="text"   name="vat" id="vat" value="0" class="form-control vat" required readonly />
	</div>
	</div>
	
			<div class="form-group">
    <label class="control-label col-md-4">VAT TK : </label>
    <div class="col-md-8">
 <input type="text" name="vattk" value="0" id="vattk" class="form-control vattk" required  readonly readonly /> 
	</div>
	</div>
	
				<div class="form-group">
    <label class="control-label col-md-4">Discount(%) : </label>
    <div class="col-md-8">
<input type="text" name="discount" value="0" id="discount" class="form-control discount" required />
	</div>
	</div>
	
					<div class="form-group">
    <label class="control-label col-md-4">Discount(TK) : </label>
    <div class="col-md-8">
	 <input type="text" name="totaldiscount" value="0" id="totaldiscount" class="form-control totaldiscount" readonly />
	</div>
	</div>
	
						<div class="form-group">
    <label class="control-label col-md-4">Total Charge after adjusting VAT & Discount: </label>
    <div class="col-md-8">
	 <input type="text" name="amount"  value="{{$total_seat_fair}}" id="amount" class="form-control amount" readonly />
	</div>
	</div>
	
							<div class="form-group">
    <label class="control-label col-md-4">Adjusted Charge: <span style="color:red;">(খুচরা মূল্য যেমন মূল্য ২৭৭ টাকা আসল। আপনি ২৭৫ নিবেন। সেই জন্য এই ঘর ব্যাবহার করেন। )</span> </label>
    <div class="col-md-8">
	 <input type="text" name="adjust"  value="{{$total_seat_fair}}" id="adjust" class="form-control adjust" required />
	</div>
	</div>
	

    <div class="form-group">
    <label class="control-label col-md-4">Due  : </label>
    <div class="col-md-8">
	<input type="text"   name="due" id="due" value="{{$total_seat_fair}}"  class="form-control  due " required readonly  />
	</div>
	</div>
	    <div class="form-group">
    <label class="control-label col-md-4">Paid  : </label>
    <div class="col-md-8">
	<input type="text"   name="paid" id="paid"  value="0" class="form-control paid" required readonly />
	</div>
	</div>
			 


	
            

	
		   
		   
		   
		   
		   

		   

		   

			 
   
           <br />
		   
	    <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Submit" />
           </div>
        
         </form>
      

	






</div>          
</div>











 




<script type="text/javascript">


$(document).ready(function(){
	
	


 
 
 
 
 
 
 
 
 
 




 
////////////////////////////////////////keyup//////////////////////////////

$('.sample_form_for_release_bed_for_patient').delegate(' .discount ,.vat','keyup',function(){

	
	var price = parseFloat($('.fees').val());


var discount = ($(".discount").val());
var vat = ($(".vat").val());

var adjust = ($(".adjust").val());



if ( (isNaN(discount)) || (isNaN(vat)) || (isNaN(adjust)) )
{
		$(".discount").val(0);
	$(".vat").val(0);
	$(".adjust").val(price);
	
	alert("আপনি সংখ্যার বদলে অন্য কিছু ইনপুট দিয়েছেন। দয়া করে  ভ্যাট, ডিস্কাউন্ট ঘরে পুনরায় ইনপুট দেন ");
	
	
	
	
}

else {
calculationforinputfield();	
	
}





function calculationforinputfield(){



var total = Number(price) * 1;

//////////////////
 var totaldiscount = ((total * ( Number(discount)/100)));
 $('.totaldiscount').val(totaldiscount);
//////////////////////// After Discount///////////////////////
total= total- totaldiscount;


////////////////////////// After Adding Vat ////////////////////
var vattk = total * ( Number(vat)/100);
$('.vattk').val(vattk);

total= total+ (total * ( Number(vat)/100));

total=total.toFixed(2);
	console.log(total);
	
		$('.amount').val(total);
		$('.adjust').val(total);
		$("#paid").val(total);
totalamount();
}





});











//////////////////////////////////////////////// Adjusted Price //////////////////


$('.sample_form_for_release_bed_for_patient').delegate('.adjust','change',function(){


var adjust = parseFloat( $(".adjust").val());

var total_amount_after_initial_vat_tax = parseFloat( $('.amount').val());
var vat =parseFloat( $(".vat").val());

var price = parseFloat( $('.fees').val());

if (  (isNaN(vat))|| (isNaN(adjust)) )
{
	$(".discount").val(0);
	$(".vat").val(0);
	$(".totaldiscount").val(0);
	$(".amount").val(0);
	$(".adjust").val(price); 
	
		alert("আপনি সংখ্যার বদলে অন্য কিছু ইনপুট দিয়েছেন। দয়া করে  ভ্যাট, ডিস্কাউন্ট ঘরের  ইনপুট পুনরায়  চেক করেন।  ");
}

else {
	$('#paid').val(adjust);
	



var discount = parseFloat( $(".totaldiscount").val());

var newdiscount = discount+( total_amount_after_initial_vat_tax - adjust);

$(".totaldiscount").val(newdiscount);





totalamount();

}









});


$( "#due" ).change(function() {
 totalamount();
});


/////////////////////////////////////////////////// calculate total amount  /////////////////////////////////////////

function totalamount(){
	
var due= $("#due").val();
	
	var paid =  $("#paid").val();
	  var paying_amount_after_discount = Number(paid) - Number(due);
	  console.log(paid);
	  console.log(due);
	  
	  $("#paid").val(paying_amount_after_discount);
	
	
	
}


});
</script>
	  


@stop