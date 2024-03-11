

@extends('layout.main')

@section('content')



<style>
.modal-lg {
    max-width: 80% !important;

}

</style> 
 






</head>

  
 






<body>
<div class="container"          style="background-color:#EEE8AA; "  >

  
  
  		<span id="form_result"></span>

		<form method="post"   action="{{ route('doctortransition.store') }}"   id="sample_form" class="form-horizontal  sample_form_for_doctorappointment" enctype="multipart/form-data">
          @csrf
		  
		  
		    <div class="row">
    <div class="col-9">
  Select Patient:  
  <select id="patientlist"  class="form-control patientlist"  name="patientlist"     style='width: 600px;'>
    </select>
    </div>
	
	
	
	
		 	<div class="col-3">
	
	<span > Adjust Doctor Fees with Advance Deposit  </span><br>

<input type="radio" id="adjustwithadvancedeposit" name="adjustwithadvancedeposit" value="1"  >
<label for="agentcom">  YES </label> <br>
<input type="radio" id="adjustwithadvancedeposit" name="adjustwithadvancedeposit" value="2"  >
<label for="agentcom"> NO  </label>
	
	</div>	
	
	
	
	
	
	
	</div>
	<p>
	<div class="row">
    <div class="col-4">
 Doctor:    <select id="doctor_id"  class="form-control doctor_id"  name="doctor_id"  required   style='width: 270px;'>
    </select>
    </div>
    <div class="col-4">
    <input type="text"   name="department" id="department" class="form-control  department" required readonly />
    </div>
  </div>
	
<div class="row">


    <div class="col-3">
 Ref:    <select id="agent"  class="form-control agent"  name="agent"  required   style='width: 270px;'>
    </select>
    </div>


<div class="col-3">
 Paid: <input type="text"   name="fees" id="fees"  autocomplete="off"  class="form-control fees" required  />
</div>



<div class="col-3">
Due( Adjusted with Deposit ) : <input type="text"  value="0"  name="due" id="due" autocomplete="off" class="form-control  due" required  />
</div>



<div class="col-3">

<input type="radio" id="indoorpatient" name="indoorpatient" value="1">
<label for="html"> Indoor Patient </label><br>

</div>
<P>
</div>	




<div style= "border-style: groove;"  >
<b> Register a New Patient( if he is not registered Yet): </b>
<div class="row">
<P>
<div class="col-3">
Patient Name :  <input type="text" name="patientname" id="patientname"  autocomplete="off"   class="form-control name" />
</div>

<div class="col-3">
Address:  <input type="text" autocomplete="off" name="address" id="address" class="form-control address" />
</div>

<div class="col-3">

Mobile:<input type="text" autocomplete="off" name="mobile" id="mobile" class="form-control mobile" />
</div>



<div class="col-3">

Advance Deposit:<input type="text" readonly autocomplete="off" name="deposit" id="deposit" class="form-control mobile" />
</div>

</div>	 	
            

<div class="row">

<div class="col-4">
Age:  <input type="text" autocomplete="off" name="age" id="age" class="form-control age" />
</div>

<div class="col-4">
Sex:<input type="text" autocomplete="off" name="sex" id="sex" class="form-control sex" />
</div>

<div class="col-4">

Date: <input type="date" id="datePicker" required name="dateappointment" class="form-control" />
</div>

<P>
</div>	 	
</div>
<P>		   
<div  style="border-style: dotted;" >
<b> If the Patient has already booked for Long-term Treatment</b>

<div class="row">


    <div class="col-8">
  Installment Order :    <select id="installment_order"  class="form-control installment_order"  name="installment_order"     >
    </select>
    </div>





			    <div class="col-4">
<span style="color:red;"> <br> Is the Treatment Finished  </span><br>
YES <input type="radio" id="finish" name="finish" value="1"  > <br>
NO <input type="radio" id="finish" name="finish" value="0"  > <br>

    </div>

</div>



<div class="row">

		    <div class="col-4">
    Long-Term Treatment Due  : <input type="text " class="form-control register_form nexttext" name="long_term_due" id="long_term_due"   autocomplete="off">
    </div>



		    <div class="col-4">
 Due Payment Installment : <input type="text " class="form-control register_form nexttext" name="due_payment" id="due_payment"   autocomplete="off">
     <P>
	 </div>
	 

		    <div class="col-4">
 Discount on Due : <input type="text " class="form-control register_form nexttext" name="discount_intallment" id="discount_intallment"   autocomplete="off">
     <P>
	 </div>	 
	 
	 


</div>
<P>
</div>




<div class="row">

			    <div class="col-8">
<span style="color:red;"> <br> Long-Term Traetment  </span><br>
<input type="radio" id="showadmitform" name="showadmitform" value="1"  >
<label for="showadmitform">  Admit a  Patient for Long-term Treatment  </label>

    </div>


</div>





	<div    style="background-color:pink;" id="admitnew"  >
	
	
	
	
	
				 <table class="table" id="products_table">
                <thead>
                    <tr>
                        <th>Treatment Name</th>
                        <th  style="width:150px;" >Unit Price</th>
						
				
						<th  style="width:150px;">Disc<br>ount(%)</th>
						
						<th>Discount(TK)</th>
						<th style="width:150px;" >price </th> 
					
					<!--	<th style="width:150px;" >Adjusted<br>Price</th> -->
						
                    </tr>
                </thead>
                <tbody class="addmoreproduct">
                    <tr id="product0">
                        <td>
       <select id="medicine_name"  class="form-control medicine_name"  name="medicine_name[]"     style='width: 270px;'>  
  
		</select>
                        </td>
                        <td>
						  <input type="text"   name="unit_price[]" id="unit_price" autocomplete="off" class="form-control numbers unit_price"   />
                           
                        </td>

						 <input type="hidden" id="stock" name="stock[]" class="stock" value="0">
				
	

                       
						
						<td>
						<input type="text" name="discount[]" value="0" id="discount" autocomplete="off" class="form-control numbers discount" />
						</td>
						
						
						
			            <td>
						<input type="text" name="totaldiscount[]" value="0" id="totaldiscount" class="form-control totaldiscount" readonly />
						</td>
			              <h1 id="messageforstock" style="color:red;" >  </h1> 

						
												
					     
						<input type="hidden" name="amount[]" value="0" id="amount" class="form-control amount" readonly />
						
						<td>
						<input type="text" name="adjust[]" value="0" id="adjust" autocomplete="off" class="form-control numbers adjust"  />
						</td> 
						
						<td>
						
						<a class="remove"  style="font-size:30px; color:red;"  href="#">  ×</a> 
						
						</td> 
						
						<td>
						 <input type="hidden" name="vat[]" value="0" id="vat" class="form-control vat" readonly />
						</td>
						
						<td>
						 <input type="hidden" name="vattk[]" value="0" id="vattk" class="form-control vattk" readonly />
						</td>
						<td>
						  <input type="hidden" name="quantity[]" id="quantity" value="1" class="form-control quantity" required />
						</td>
						
                    </tr>
                    <tr id="product1"></tr>
                </tbody>
            </table>
			 
			 
			 
			 
			 
			 
			
		   <div id="child"> 
		   
		   </div>
		   <button type="button" id="add_row" class="btn btn-primary">ADD more Treatment</button>
		   
		   	
			
			
			<div class="container">
  <div class="row">
   <div class="col-4">
      Total Amount:  <input type="text" name="totalamountbeforediscount" id="totalamountbeforediscount" autocomplete="off" value="0"  class="form-control totalamount" readonly />
    </div>



	    <div class="col-4">
   <span style="font-size:14px;">    Dis(%): </span>  <input type="text" autocomplete="off" name="percentofdicountontaotal" id="percentofdicountontaotal"  value="0"  class="form-control  percentofdicountontaotal"  />
    </div>
	</div>
	<p>
	
		<div class="row">
	
     <div class="col-4">
     Amount after Discount:  <input type="text" name="totalamount" id="totalamount" autocomplete="off" value="0"  class="form-control totalamount"  />
    </div>

		    <div class="col-4">
     Discount(TK):  <input type="text" name="dicountontaotal" id="dicountontaotal"  autocomplete="off" value="0"  class="form-control dicountontaotal" readonly  />
    </div>

  </div>
	
	<p>
	
	
	
	
	
	
	<div class="row">
    <div class="col-4">
    Paid:  <input type="text" name="paid" id="paid" autocomplete="off" value="0" class="form-control numbers paid"  />
    </div>
    <div class="col-4">
    Due:   <input type="text" autocomplete="off" name="due_on_service" id="due_at_the_time_of_selling" value="0" class="form-control due" readonly />
    </div>

		 	<div class="col-3">
	
	<span > Adjust  Service chagre with Advance Deposit  </span><br>

<input type="radio" id="adjustwithadvancedepositservice_charge" name="adjustwithadvancedepositservice_charge" value="1"  >
<label for="agentcom">  YES </label> <br>
<input type="radio" id="adjustwithadvancedepositservice_charge" name="adjustwithadvancedepositservice_charge" value="2"  >
<label for="agentcom"> NO  </label>
	
	</div>	

  </div>
  
  
  
  
  
  	<div class="row">
    <div class="col-12">

    <label for="history">Remark:</label>
    <textarea class="form-control"  name="remark" rows="3"></textarea>
	 <p>
</div>

  </div>
  
 
  
  
  
  
  
  
</div>
	
</div>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


























   
           <br />
		   
	
           <div class="form-group" align="center">
            <input type="hidden" value="Add" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>

		 




		 <span id="form_resultfooter"></span>
  
  
  
  
  
  <button type="button" id="refresh" class="btn btn-info">Refresh</button>
  
  
  
  
  
  
</div>


<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
    <h1>Appointment For Doctors</h1>
 
	
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
<th>No</th>
			<th>Doctor Name</th>
			
			<th>Patinet ID </th>
			<th>Patient Name</th>
			<th>Mobile</th>
			<th>Serial No.</th>
			<th>Date <br> (Y/M/D)</th>
			<th>Paid</th>
			<th>Adjust Adv.</th>
			<th>Due</th>
			
				
			
				<th>pdf</th>
    <th>Delete</th>
				
				
			     
             
                
            </tr>
        </thead>
        <tbody   >
        
        </tbody>
    </table>
	</div>
</div>
</div>
</div>



<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
        



        </div>
     </div>
    </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="closedelete" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default closedelete" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>





 




<script type="text/javascript">


$(document).ready(function(){
	
	
	Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});




	
$(document).on('click','#refresh', function(){

$('#sample_form')[0].reset();
$("#agentoption").hide();
$("#doctoroption").hide();
$("#admitnew").hide();


fetch();
$("#products_table tr:gt(1)").remove();

 $('.medicine_name').select2();
		$("#formhide").show(); 
	$('#percentofdicountontaotal').show();

	
$('.discount').show();

});	

$('.medicine_name').select2();


$("#installment_order").html("");
$('#installment_order').select2();






///////////////////////////////// insert value in unit price /////////////////////

$('.addmoreproduct').delegate('.medicine_name','change',function(){
	
	var tr= $(this).parent().parent();
	
	var stock= tr.find('.medicine_name option:selected').attr("data-stock");
	  
	var price= tr.find('.medicine_name option:selected').attr("data-price");
	
	
	tr.find('.unit_price').val(price);
	tr.find('.stock').val(stock);
	
	
	var price = parseFloat(tr.find('.unit_price').val()); // 2y bar price neya hoyeche karon jodi pore user pirce poriboron kore



var qun = parseFloat(tr.find(".quantity").val());

qun = 1;



var discount = tr.find(".discount").val();
var vat = tr.find(".vat").val();



var total = Number(price) * Number(qun);
var totalbeforedisandvat= total;
//////////////////////// After Discount///////////////////////
var totaldiscount=(total * ( Number(discount)/100));
total= total- (total * ( Number(discount)/100));
tr.find('.totaldiscount').val(totaldiscount);

////////////////////////// After Adding Vat ////////////////////
var vattk = total * ( Number(vat)/100);
tr.find('.vattk').val(vattk);

total= total+ (total * ( Number(vat)/100));

		tr.find('.amount').val(totalbeforedisandvat);
		
tr.find('.adjust').val(total);
	totalamount();
	



});



////////////////////////////////////////keyup//////////////////////////////

$('.addmoreproduct').delegate('.unit_price, .quantity, .discount ,.vat','change',function(){

	var tr= $(this).parent().parent();
	var price = tr.find('.unit_price').val();
	if ( price == '' ) {
tr.find(".unit_price").val(0);
price = 0;
}
else {	
price = parseFloat(price);	
}
	
var qun = parseFloat(tr.find(".quantity").val());

var discount = tr.find(".discount").val();
	if ( discount == '' ) {
tr.find(".discount").val(0);
discount = 0;
}
else {	
discount = parseFloat(discount);	
}


var vat = (tr.find(".vat").val());

var adjust = (tr.find(".adjust").val());
var stock =parseFloat(tr.find('.stock').val());
var productname= tr.find('.medicine_name option:selected').html();



	
calculationforinputfield();	




function calculationforinputfield(){

qun = tr.find(".quantity").val();

var total = Number(price) * Number(qun);
var totalbeforedisandvat = total;
//////////////////
 var totaldiscount = ((total * ( Number(discount)/100)));
 tr.find('.totaldiscount').val(totaldiscount);
//////////////////////// After Discount///////////////////////
total= total- totaldiscount;


////////////////////////// After Adding Vat ////////////////////
var vattk = total * ( Number(vat)/100);
tr.find('.vattk').val(vattk);

total= total+ (total * ( Number(vat)/100));

total=total.toFixed(2);
	
	
		tr.find('.amount').val(totalbeforedisandvat);
		tr.find('.adjust').val(total);
totalamount();
}





});



//////////////////////////////////////////////// Adjusted Price //////////////////


function changemanuallyafterdiscount()
{
	var grossamount = parseFloat($('#totalamountbeforediscount').val());

var receiveableamount = parseFloat($('#totalamount').val());

var discount = grossamount - receiveableamount;

var paid = parseFloat($('#paid').val());

var due = receiveableamount - paid; 

var percentageofdiscount = (( discount * 100)/ grossamount) ;

var percentageofdiscount = percentageofdiscount.toFixed(5);


$('#percentofdicountontaotal').val(percentageofdiscount);

$('#due_at_the_time_of_selling').val(due);

$('#dicountontaotal').val(discount);







	var commissionrate = parseFloat($("#percentageofagent").val());
	var commission_amount = (receiveableamount * (commissionrate/100));
	
$('#commission').val(commission_amount);






	
}



$('.form-horizontal').delegate('.totalamount','keyup',function adj(){



changemanuallyafterdiscount();



	
});






$('.addmoreproduct').delegate('.adjust','change',function adj(){


	var tr= $(this).parent().parent();
var adjust = tr.find(".adjust").val();

if ( adjust == '' ) {
tr.find(".adjust").val(0);
adjust = 0;
}
else {	
adjust = parseFloat(adjust);	
}

var total = parseFloat(tr.find('.amount').val());

var vat =parseFloat( tr.find(".vat").val());

var price = parseFloat(tr.find('.unit_price').val());
var qun = parseFloat(tr.find(".quantity").val());
var discount = parseFloat(tr.find(".discount").val());



var netprice_before_adding_vat_and_discount  = parseFloat(price*qun);

 var netprice_after_initial_discount = ( netprice_before_adding_vat_and_discount- (netprice_before_adding_vat_and_discount * (discount/100)))

var amount_discount = parseFloat(  netprice_before_adding_vat_and_discount *  (discount/100 ));



var adjust_minus_price_after_initial_discount_and_vat = parseFloat(total-adjust);




var hundr = 100; 
parseFloat(hundr);


var vat_that_taken_on_adjust = parseFloat((vat * adjust)/parseFloat ( hundr+vat ) ); //new vat 



tr.find('.vattk').val(vat_that_taken_on_adjust.toFixed(4));

var price_after_additional_discount_and_excluding_vat = parseFloat(adjust-vat_that_taken_on_adjust);




var amount_of_additional_discount = parseFloat( 
   netprice_after_initial_discount  - price_after_additional_discount_and_excluding_vat );
// new discount 



var amount_of_discount_that_means_addition_of_discount_that_was_given_in_two_stage = parseFloat( amount_discount + amount_of_additional_discount ); 





tr.find('.totaldiscount').val(amount_of_discount_that_means_addition_of_discount_that_was_given_in_two_stage.toFixed(4));



totalamount();
	

});







/////////////////////////////////////////////////// calculate total amount  /////////////////////////////////////////

function totalamount(){
	
	var percentage_discount_on_total = $('#percentofdicountontaotal').val();
	
	if ( (percentage_discount_on_total == 0 ) || (percentage_discount_on_total == '' ) )
	{
		$('#percentofdicountontaotal').val(0);
	var totalamount =0;
	$('.adjust').each(function(i,e){
		var amount = $(this).val()-0;
		totalamount+=amount;
		
	});

		var grosstotalamount=0
		$('.amount').each(function(i,e){
		var amountgross = $(this).val()-0;
		
		grosstotalamount+=amountgross;
	
	});
	
	
	var a = grosstotalamount - totalamount;
	console.log('a');
		console.log(a);
	$("#dicountontaotal").val(a);
	$("#totalamountbeforediscount").val(grosstotalamount);
	
	
	$("#totalamount").val(totalamount);

}
else 
{
	
	var totalamount =0;
	$('.unit_price').each(function(i,e){
		var amount = $(this).val()-0;
		console.log(amount);
		totalamount+=amount;
	
	});	
		var a = (totalamount * (percentage_discount_on_total/100));
	
var grosstotalamount  =  totalamount;
$("#totalamountbeforediscount").val(grosstotalamount);
	totalamount = totalamount - a ;
	  $('#dicountontaotal').val(a);
		$("#totalamount").val(totalamount);
	
}


	var commissionrate = $("#percentageofagent").val();
	var commission_amount = (totalamount * (commissionrate/100));
	

	  
	
	var paid= $("#paid").val();
	if (paid == '')
	{
		paid = 0;
		$("#paid").val(0);
	}
	var due = totalamount- Number(paid);
	  $("#due_at_the_time_of_selling").val(due);



	

	  
	$("#commission").val(commission_amount);
}

  $("#paid").change(function(){
     
	this.value = this.value.replace(/[^0-9\.]/g,''); 

	
	
	
	
		var grossamount = parseFloat($('#totalamountbeforediscount').val());

var receiveableamount = parseFloat($('#totalamount').val());

var discount = grossamount - receiveableamount;

var paid = parseFloat($('#paid').val());

var due = receiveableamount - paid; 



$('#due_at_the_time_of_selling').val(due);




  });






  
  
  $("#percentofdicountontaotal").change(function(){
     this.value = this.value.replace(/[^0-9\.]/g,'');
	 totalamount();


  });
  
  
  
  
  
  
  /////////////////////////////////////// Remove row ////////////////////////


$('.addmoreproduct').delegate('.remove','click',function(){ 
var rowCount = $('table#products_table tr:last').index() + 1; // find out the length of the row 
console.log(rowCount);

 
 
   var rowindex = $(this).closest('tr').index();  // find out the index number of the row 
    
 if (rowindex > 0 )
 {
$(this).parent().parent().remove();
  totalamount();
 }

 }); 
 


























$('#datePicker').val(new Date().toDateInputValue());
	
  $("#patientlist").select2();   
 $("#doctor_id").select2();  

 $("#Treatment_List").select2();

 
 
  $("#agent").select2();  

///// clear modal data after close it 
$(".modal").on("hidden.bs.modal", function(){
    $("#patientlist").html("");
});
///////////////////////////////

/////////////////////////////// move cursor by press enter button

 $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

var $check = $(document).find('input[type="text"]');
jQuery("input").on('keyup', function(event) {
  
  
  if (  (event.keyCode === 13) || (event.keyCode === 40) ) {
   $check.eq($check.index(this) + 1).focus();
  }

               if (event.keyCode === 38) {
                    
           $check.eq($check.index(this) - 1).focus();
                }





});




$("#admitnew").hide();

$('input[type=radio][name=showadmitform]').change(function() {
    if (this.value == '1') {

$("#admitnew").show();

$('#statusvalue').val(0);

$('#deposit').val(0);

	$('#percentofdicountontaotal').show();
	$('#percentofdicountontaotal').val(0);
	
$('.discount').show();	
$('.discount').val(0);	
$('.totaldiscount').val(0);	

 
    }
});
	








     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	



    var table = $('#patient_table').DataTable({
		
	
		
        processing: true,
        serverSide: true,
		responsive: true,
	
        ajax: "{{ route('doctortransition.index') }}",
	
        columns: [
		
		 
		 
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},

			 {data: 'doctor_name', name: 'doctor.name'},
			  {data: 'patient_id', name: 'patient_id'},
			 {data: 'patient_name', name: 'patient.name'},
			 {data: 'patient_mobile', name: 'patient.mobile'},
			  {data: 'serialno', name: 'serialno'},
			  {data: 'date', name: 'date'},
			  {data: 'fees', name: 'fees'},
			  {data: 'adjust_with_advance', name: 'adjust_with_advance'},
			  {data: 'due', name: 'due'},
			 
           
	
			 
 {data: 'pdf', name: 'pdf'},
 
 {data: 'action', name: 'action'}, 
			    
           
        ]
    });

fetch();
   
   
  ///////// show the modal//////////////////////////////////////////////////////////////////////////////// 
    $(document).on('click', '.create_record', function(){
		
		
		  $('#form_result').html('');
    $('.modal-title').text("Add New Record");
     $('#action_button').val("Add");
     $('#action').val("Add");
       $('#formModal').modal('show');
  
  

 
 
 });
 
 
function fetch(){
  $.ajax({
   url:"doctortransition/dropdown_list",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	$("#patientlist").html("");
	$("#doctor_id").html("");
		$("#agent").html("");
		
		
		
								  $("#medicine_name").html("");
					
					var optionformedicine = "<option  ></option>"; 
               	$("#medicine_name").append(optionformedicine);
					
					
					///////////////////////   set dynamic select option values from Database ///////////////////
					
					
					                    var len = 0;
                    if (response.medicinedata != null) {
                        len = response.medicinedata.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.medicinedata[i].id;
                             var name = response.medicinedata[i].name;
					          var price= response.medicinedata[i].unitprice;

                             
				//////////////////////////////////// Set user dfeined atribute data-price//////			 
							 var optionformedicine = "<option   data-id='"+id+"'    data-price='"+price+"' value='"+id+"'>"+name+"</option>"; 
							 /////////////////////////////////////////////////////////////
							 
					

							 var optionforid = "<option value='"+id+"'>"+id+"</option>"; 
							   

                             $("#medicine_name").append(optionformedicine);
							  
                        }
                    }
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	var option = "<option  value='' ></option>"; 
					   $("#patientlist").append(option);
	
	
                    var len = 0;
                    if (response.patientdata != null) {
                        len = response.patientdata.length;
                    }
                       
                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.patientdata[i].id;
                             var name = response.patientdata[i].name;
							 var mobile = response.patientdata[i].mobile;
							 var address = response.patientdata[i].address;
							 var age = response.patientdata[i].age;
							 var sex = response.patientdata[i].sex;
					 var deposit = response.patientdata[i].dena;
					 var due  = response.patientdata[i].due;
					 var long_term_installment = response.patientdata[i].long_term_installment;
                             var option = "<option  data-id='"+id+"'   data-deposit='"+deposit+"' data-long_term_installment='"+long_term_installment+"'      data-due='"+due+"'   data-name='"+name+"' data-address='"+address+"'  data-age='"+age+"' data-sex='"+sex+"' data-mobile='"+mobile+"' value='"+id+"'>" + "ID:" + id + " Name:"   +name+ "( "+ mobile+ ")"+   "</option>"; 
							

                             $("#patientlist").append(option);
							 
							 
							 
							 
							 
							 
                        }
                    }
					
					
						var optionfordoctor = "<option ></option>"; 
					   $("#doctor_id").append(optionfordoctor);
					
					
					
					                    var len = 0;
                    if (response.doctor != null) {
                        len = response.doctor.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.doctor[i].id;
                             var name = response.doctor[i].name;
							 var Department = response.doctor[i].Department;
							 var fees = response.doctor[i].next_visit_fees;

                             var optionfordoctor = "<option  data-Department='"+Department+"' data-fees='"+fees+"'   value='"+id+"'>"+name+"</option>"; 
							

                             $("#doctor_id").append(optionfordoctor);
                        }
                    }
					
					
	





						var optionforagent = "<option ></option>"; 
					   $("#agent").append(optionforagent);
					
					
					
					                    var len = 0;
                    if (response.agent != null) {
                        len = response.agent.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.agent[i].id;
                             var name = response.agent[i].name;
	

                             var optionforagent = "<option     value='"+id+"'>"+name+"</option>"; 
							

                             $("#agent").append(optionforagent);
                        }
                    }

	
					
					
					
					
					
                }
				
				
	//////////////////////////////////////////////////////////////////////////////
  })


}	
 
 
 
 
 function fetc_longterm_install( id ){
  $.ajax({
   url:"doctortransitionlonginstall/"+id,
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	$("#installment_order").html("");

		
		
		
						console.log(response.longterminstallerorder);	
					
					var optionformedicine = "<option  ></option>"; 
               	$("#installment_order").append(optionformedicine);
					
					
					///////////////////////   set dynamic select option values from Database ///////////////////
					
					
					                    var len = 0;
                    if (response.longterminstallerorder != null) {
                        len = response.longterminstallerorder.length;
				
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.longterminstallerorder[i].id;
                             var 	Code = response.longterminstallerorder[i].Code;
					    var due = response.longterminstallerorder[i].due;

                             
				//////////////////////////////////// Set user dfeined atribute data-price//////			 
							 var optionformedicine = "<option  data-due ='"+due+"'    data-code ='"+Code+"' value='"+id+"'>"+Code+"</option>"; 
							 /////////////////////////////////////////////////////////////
							 

							   

                             $("#installment_order").append(optionformedicine);
							  
                        }
                    }
		
		
		
		
		
		

					

					
                }
				
				
	//////////////////////////////////////////////////////////////////////////////
  })


}	
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 ///////////////////////////////// insert value related to the patient dynamically  /////////////////////

$('.sample_form_for_doctorappointment').delegate('.patientlist','change',function(){

	var id = $('.patientlist option:selected').attr("data-id");	
	var name = $('.patientlist option:selected').attr("data-name");
	var mobile = $('.patientlist option:selected').attr("data-mobile");
	var address = $('.patientlist option:selected').attr("data-address");
	var age = $('.patientlist option:selected').attr("data-age");
	var sex = $('.patientlist option:selected').attr("data-sex");
	var deposit = $('.patientlist option:selected').attr("data-deposit");
	var long_term_installment = $('.patientlist option:selected').attr("data-long_term_installment");
var due = $('.patientlist option:selected').attr("data-due");
var dif = deposit;
	$('#deposit').val(dif);
	$('#patientname').val(name);
	$('#address').val(address);
	$('#mobile').val(mobile);
	$('#age').val(age);
	$('#sex').val(sex);

	
fetc_longterm_install( id );




});





$('.sample_form_for_doctorappointment').delegate('#installment_order','change',function(){


var due = $('#installment_order option:selected').attr("data-due");

	$('#long_term_due').val(due);
	





});










 
 
  ///////////////////////////////// insert value related to the Doctor dynamically  /////////////////////

$('.sample_form_for_doctorappointment').delegate('.doctor_id','change',function(){
	
	var Department = $('.doctor_id option:selected').attr("data-Department");
	var fees = $('.doctor_id option:selected').attr("data-fees");
	
	
	$('#department').val(Department);
	$('#fees').val(fees);






});
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
   
   
  /////////////////////////////////ADD Data //////////////////////////// 
   
   

$('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
  $('#action_button').attr("disabled", true);	
   $.ajax({
    url:"{{ route('doctortransition.store') }}",
    method:"POST",
    data: new FormData(this),
    contentType: false,
    cache:false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
     var html = '';
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();
      $('#patient_table').DataTable().ajax.reload();
	    $('#action_button').attr("disabled", false);	
     }
     $('#form_result').html(html);
	  $('#form_resultfooter').html(html);
	  $('#form_result').fadeIn();
	    $('#form_resultfooter').fadeIn();
	  $('#form_result').delay(3000).fadeOut();
	  $('#form_resultfooter').delay(3000).fadeOut();
	  fetch();
	  $("#admitnew").hide();
	  $("#installment_order").html("");
	  $('#datePicker').val(new Date().toDateInputValue());
    }
   })
  
  
  
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('doctortransition.update') }}",
    method:"POST",
    data:new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
     var html = '';
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();
      $('#store_image').html('');
      $('#patient_table').DataTable().ajax.reload();
     }
        $('#form_result').html(html);
	  $('#form_resultfooter').html(html);
	  $('#form_result').fadeIn();
	    $('#form_resultfooter').fadeIn();
	  $('#form_result').delay(3000).fadeOut();
	  $('#form_resultfooter').delay(3000).fadeOut();

	  $('#datePicker').val(new Date().toDateInputValue());
	  
	      $('#action_button').val("Add");
    $('#action').val("Add");
	
		$("#indoorpatient").attr('checked', false);
		 $("#indoorpatient").prop('disabled', false);
	
	 $("#datePicker").prop('disabled', false);
		 $("#doctor_id").prop('disabled', false); 
	 	  fetch();
	$("#installment_order").html("");  
    }
   });
  }
 });
   







   $(document).on('click', '.edit', function(){
	   
  var id = $(this).attr('id');
  $('#form_result').html('');
 
  $.ajax({
   url:"/doctortransition/"+id+"/edit",
   dataType:"json",
   success:function(html){
	    $('#patientname').val(html.data.patient.name);
    $('#address').val(html.data.patient.address);
	$('#age').val(html.data.patient.age);
    $('#sex').val(html.data.patient.sex);
   
	$('#fees').val(html.data.fees);
    $('#due').val(html.data.due);
      $('#department').val(html.data.doctor.Department);
	$('#mobile').val(html.data.patient.mobile);					
	$('#datePicker').val(html.data.date);
	
	
	if (html.data.doctoroncallforadmittedpartient == 1)
{
	$("#indoorpatient").attr('checked', true);
	
}

	
	
	
	
	
	
	
	
	
	 $("#indoorpatient").prop('disabled', true);
	
	 $("#datePicker").prop('disabled', true);
												
							var len = html.doctor.length;
	var presentdoctorid = html.data.doctor_id;

 $("#doctor_id").html("");
           

                             
	
	
		                        for (var i = 0; i<len; i++) {
								
								if ( presentdoctorid == html.doctor[i].id  ) 
								{
									var id = html.doctor[i].id;
                             var name = html.doctor[i].name;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 

                             $("#doctor_id").append(option);
								}
                             
                        }
						
						
							                        for (var i = 0; i<len; i++) {
								
								if ( presentdoctorid != html.doctor[i].id  ) 
								{
									var id = html.doctor[i].id;
                             var name = html.doctor[i].name;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 

                             $("#doctor_id").append(option);
								}
                             
                        }
						
						
						
	


							var len = html.agent.length;
	var presentagentid = html.data.agentdetail_id;


 $("#agent").html("");
           

                             
	
	
		                        for (var i = 0; i<len; i++) {
								
								if ( presentagentid == html.agent[i].id  ) 
								{
									var id = html.agent[i].id;
                             var name = html.agent[i].name;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 

                             $("#agent").append(option);
								}
                             
                        }
						
						
							                        for (var i = 0; i<len; i++) {
								
								if ( presentagentid != html.agent[i].id  ) 
								{
									var id = html.agent[i].id;
                             var name = html.agent[i].name;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 

                             $("#agent").append(option);
								}
                             
                        }




	
						
						
						
					
						
						
						
						
	
	
	

		 $("#doctor_id").prop('disabled', true);				


   
	$('#hidden_id').val(html.data.id);
    $('.modal-title').text("Edit New Record");
    $('#action_button').val("Edit");
    $('#action').val("Edit");

   }
  })
 });
 
 
 











 
 var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"doctortransition/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#user_table').DataTable().ajax.reload();
	  fetch();
    }, 2000);
	
	      $('#patient_table').DataTable().ajax.reload();
		   $('#ok_button').text('Delete');
		  
   }
  })
 });




   
   
   
    $(document).on('click', '.pdf', function(){
  user_id = $(this).attr('id');
  
    $.ajax({
   url:"doctortransition/destroy/"+user_id,
  

  })
 });


   
   
   
   
   
   
    /////////////////////////////////////// Dynamically Add New row and Add New select2 for dynamically added new medicine name  ////////////////////////
 

  let row_number = 1;
    $("#add_row").click(function(e){
		
		
		      e.preventDefault();
      let new_row_number = row_number - 1;
	  
	  	   $latest_tr  = $('#product0');
   
     $latest_tr.find(".medicine_name").each(function(index)
    {
        $(this).select2('destroy');
    }); 
	  
      $('#product' + row_number).html($('#product0' ).html()).find('td:first-child');
	  
	   

	  
      $('.addmoreproduct').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
     

 
     
    
  $('.medicine_name').select2(); 
 
    
	
	
	});
 
   
   
   
   
   
   
  
	 
	 
	 
	 
	 
	 

	 
	 






 
 $(document).on('click', '#close', function(){
$('#formModal').modal('hide');

 });


  
  $(document).on('click', '.closedelete', function(){
$('#confirmModal').modal('hide');

 });


});
</script>
	  


@stop