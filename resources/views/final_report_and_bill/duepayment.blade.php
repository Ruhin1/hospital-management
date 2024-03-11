

@extends('layout.main')

@section('content')




 
 






</head>

  
 






<body>


<div  class="container" style="background-color:#EEE8AA; "  > 
    <h1>Due Payment & Refund</h1>
  <span id="form_result"></span>
         <form method="post" action="{{ route('finalreport.allduepay') }}"   id="sample_form" class="form-horizontal sample_form" enctype="multipart/form-data">
          @csrf

  


<p>

  
 

  
  <p>
    <div class="row">

 <div class="col-6">
Patient Name  :  	<select id="customer_id"  class="form-control "  name="from_cabine_list"  required  style='width: 500px;'> 
   </select>
  </div>


  <div class= " col-6">
    Data Entry Date:<input  type="date" id="dataentry" name="dataentry" required>
 
   </div>


</div>
 
	
	
	
		   <div class="row">
		   
		   <div class="col-3">
		   
		 Total Due: <input type="text" readonly name="total_due" id="total_due" class="form-control" />
		   
		   </div>
		   
		   		   <div class="col-3">
		   
		 Deposit: <input type="text" readonly autocomplete="off" value="0" name="total_deposit" id="total_deposit" class="form-control" />
		   
		   </div>
		   
		   
		 		   		   <div class="col-3">
		   
	 Balanced Deposit : <input type="text" readonly autocomplete="off" value="0" name="Balanced_deposit" id="Balanced_deposit" class="form-control" />
		   
		   </div>  
		   
		   
	 


		 
		   
		   </div>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="row">
	 <div class="col-3">
	  <input type="radio"  name="transitiontype" value="1" required >
  <label for="pawna"> টাকা নিচ্ছেন </label>
  </div>
	
	 <div class="col-3">
  <input type="radio"  name="transitiontype" value="3"  required >
  <label for="dena">টাকা ফেরত দিচ্ছেন  </label><br>
  </div>	
	
	 <div class="col-6">
	  <input type="radio"  name="transitiontype" value="6"  required >
  <label for="dena"> এডজাস্ট করুন ( প্রকৃত পক্ষে কোন লেনদেন হয় না )  </label><br>	
  </div>	
	
	
	</div>
	
	

	
	
	
	
		   <div class="row">
		   
		   <div class="col-3">
		   
		   Pathology Due: <input type="text" readonly name="pathology_due" id="pathology_due" class="form-control" />
		   
		   </div>
		   
		   		   <div class="col-3">
		   
              Pathology  Paid: <input type="text" autocomplete="off" value="0" name="pathologydue_due_payment" id="pathologydue_due_payment" class="form-control" />
		   
		   </div>
		   
		   
		 		   		   <div class="col-3">
		   
                  Pathology	 Discount: <input type="text" autocomplete="off" value="0" name="Pathology_concession" id="Pathology_concession" class="form-control" />
		   
		   </div>  
		   
		   
		 		   		   <div class="col-3">
		   
		Pathology  Refund: <input type="text" value="0" autocomplete="off"  name="Pathology_refund" id="Pathology_refund" class="form-control" />
		   
		   </div> 		 


		 
		   
		   </div>
		   
		   
				   <div class="row">
		   
		   <div class="col-3">
		   
		   Phermachy Due: <input type="text" readonly name="Pahermachy_due" id="Pahermachy_due" class="form-control" />
		   
		   </div>
		   
		   		   <div class="col-3">
		   
		Phermachy  Paid: <input type="text"  autocomplete="off" value="0" name="Pahermachy_due_payment" id="Pahermachy_due_payment" class="form-control" />
		   
		   </div>
		   
		   
		 		   		   <div class="col-3">
		   
		Phermachy  Discount: <input type="text"  autocomplete="off" value="0" name="Pahermachy_concession" id="Pahermachy_concession" class="form-control" />
		   
		   </div>  
		   
		   
		 		   		   <div class="col-3">
		   
		Phermachy  Refund: <input type="text"   autocomplete="off" value="0" name="Pahermachy_refund" id="Pahermachy_refund" class="form-control" />
		   
		   </div> 		 


		 
		   
		   </div>   
		   
		  
					   <div class="row">
		   
		   <div class="col-3">
		   
		   Admission Due: <input type="text" readonly name="admission_due" id="admission_due" class="form-control" />
		   
		   </div>
		   
		   		   <div class="col-3">
		   
		 Admission Paid: <input type="text"  autocomplete="off" value="0" name="admission_due_payment" id="admission_due_payment" class="form-control" />
		   
		   </div>
		   
		   
		 		   		   <div class="col-3">
		   
		  Admission Discount: <input type="text"  autocomplete="off" value="0" name="admission_due_dis" id="admission_due_dis" class="form-control" />
		   
		   </div>  
		   
		   
		 		   		   <div class="col-3">
		   
		Admission  Refund: <input type="text"   autocomplete="off" value="0" name="admission_fee_refund" id="admission_fee_refund" class="form-control" />
		   
		   </div> 		 


		 
		   
		   </div> 	   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   <div class="row">
		   
		   <div class="col-3">
		   
		   Service Due: <input type="text" readonly name="service_due" id="service_due" class="form-control" />
		   
		   </div>
		   
		   		   <div class="col-3">
		   
		 Service  Paid : <input type="text" autocomplete="off" value="0" name="service_due_payment" id="service_due_payment" class="form-control" />
		   
		   </div>
		   
		   
		 		   		   <div class="col-3">
		   
		 Service Discount: <input type="text" autocomplete="off" value="0" name="service_concession" id="service_concession" class="form-control" />
		   
		   </div>  
		   
		   
		 		   		   <div class="col-3">
		   
		 Service Refund: <input type="text" autocomplete="off" value="0" name="service_refund" id="service_refund" class="form-control" />
		   
		   </div> 		 


		 
		   
		   </div>




		   <div class="row">
		   
		   <div class="col-3">
		   
		   Cabine Due: <input type="text" readonly name="cabine_due" id="cabine_due" class="form-control" />
		   
		   </div>
 <div class="col-3  bill">		   
<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('cabinefees') }}">**** Take Cabine Bill   </a><br>
</div>


		   		   <div class="col-3  releasecab">
		   
		   Due Payment: <input type="text" autocomplete="off" value="0" name="cabine_due_payment" id="cabine_due_payment" class="form-control" />
		   
		   </div>
		   
		   
		 		   		   <div class="col-3  releasecab">
		   
		   Concession: <input type="text" autocomplete="off" value="0" name="cabine_due_concession" id="cabine_due_concession" class="form-control" />
		   
		   </div> 









		 
		   
		   </div>



			   <div class="row">
		   
		   <div class="col-3">
		   
		  Doctor Visit Due: <input type="text" readonly name="doctor_due" id="doctor_due" class="form-control" />
		   
		   </div>
		   
		   		   <div class="col-3">
		   
		 Doctor-Visit  Paid: <input type="text" autocomplete="off" value="0" name="doctor_due_payment" id="doctor_due_payment" class="form-control" />
		   
		   </div>
		   
		   
		 		   		   <div class="col-3">
		   
		Doctor-Visit  Discount: <input type="text" autocomplete="off" value="0" name="doctor_concession" id="doctor_concession" class="form-control" />
		   
		   </div>  
		   
		   
		 		   		   <div class="col-3">
		   
		Doctor-Visit  Refund: <input type="text" autocomplete="off" value="0" name="doctor_refund" id="doctor_refund" class="form-control" />
		   
		   </div> 		 


		 
		   
		   </div>

<P>
		   <div class="row">
		   
		   <div class="col-3">
		   
		  Doctor Name:   
       <select id="doctor"  class="form-control doctor"  name="doctorid"     style='width: 270px;'>  
  
		</select>
		   
		   </div>
		   
		 


		 
		   
		   </div>












			   <div class="row">
		   
		   <div class="col-3">
		   
		   Surgery Due: <input type="text" readonly name="surgery_due" id="surgery_due" class="form-control" />
		   
		   </div>
		   
		   		   <div class="col-3">
		   
		 Surgery  Due Paid: <input type="text" autocomplete="off" value="0" name="surgery_due_payment" id="surgery_due_payment" class="form-control" />
		   
		   </div>
		   
		   
		 		   		   <div class="col-3">
		   
		 Surgery  Discount: <input type="text" autocomplete="off" value="0" name="surgery_concession" id="surgery_concession" class="form-control" />
		   
		   </div>  
		   
		   
		 		   		   <div class="col-3">
		   
		 Surgery Refund: <input type="text" autocomplete="off"  value="0" name="surgery_refund" id="surgery_refund" class="form-control" />
		   
		   </div> 		 


		 
		   
		   </div>





			   <div class="row">
		   
		   
		   		   <div class="col-3">
	Total:	   
<input type="text" readonly autocomplete="off" readonly value=""    id="total_sum"  class="form-control" />
		   
		   </div>
		   
		   
		   
		   
		   <div class="col-3">
		   
			Total Paid :  <input type="text" readonly autocomplete="off" name="amount" id="amount" class="form-control" />
		   
		   </div>
		   
		   		   <div class="col-3">
		   
Total Due Discount :  <input type="text" readonly autocomplete="off" name="total_discount" id="total_discount" class="form-control" />
		   
		   </div>
		   
		   
		 		   		   <div class="col-3">
		   
		 Total Refund : <input type="text" readonly autocomplete="off"  name="total_refund " id="total_refund" class="form-control" />
		   
		   </div>  
		   
		   
		 


		 
		   
		   </div>




<p>

<b> Comments: </b>
<p>










			   <div class="row">
		   
		   <div class="col-3">
		   
		Phermachy Comment : <input type="text"  name="phermachy_comment" id="phermachy_comment" class="form-control" />
		   
		   </div>
		   
		   		   <div class="col-3">
		   
		   Patho. Comment: <input type="text" autocomplete="off"  name="Pathology_comment" id="Pathology_comment" class="form-control" />
		   
		   </div>
		   
		   
		 		   		   <div class="col-3">
		   
		   Doctor Visit Comment : <input type="text" autocomplete="off"  name="Doctor_visit_Comment " id="Doctor_visit_Comment" class="form-control" />
		   
		   </div>  
		   
		   
		 		   		   <div class="col-3">
		   
		  Surgery Comment: <input type="text" autocomplete="off"   name="surgery_comment" id="surgery_comment" class="form-control" />
		   
		   </div> 		 


		 
		   
		   </div>


			   <div class="row">
		   
		   <div class="col-3">
		   
		Service Comment : <input type="text" autocomplete="off"  name="Service_comment" id="Service_comment" class="form-control" />
		   
		   </div>
		   
		
		   <div class="col-3">
		   
		Admission Fees's  Comment : <input type="text" autocomplete="off"  name="admission_due_comment" id="admission_due_comment" class="form-control" />
		   
		   </div>





		   <div class="col-3">
		   
	
		   
		   </div>
		 
		   
		   </div>
		   
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	









           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" value="Add" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>
		   <span id="form_result_footer"></span>

</div>





<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
    <h1>Due Payment Transition </h1>

	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
	
			
			<th>No</th>
                <th>Name</th>
				<th>Mobile</th>
				<th>Total Amount</th>
				<th> Paid Amount</th>
				<th>Discount</th>
				<th>Type</th>
			
				<th>Date</th>
				<th>Money Receipt</th>
			
		
				
				
				
			     
             
                <th width="300px">Action</th>
					<th>Service Type</th>
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
         <span id="form_resultedit"></span>
         <form method="post"  action="{{ route('duepaymenttrans.update') }}"  id="sample_formedit" class="form-horizontal" enctype="multipart/form-data">
          @csrf
		  

<div class="container">
  <div class="row">
    <div class="col-4">
    Name:<input type="text" name="name" id="name" readonly class="form-control  register_form x"  placeholder="name" autocomplete="off" required />    
    </div>
    <div class="col-3">     
         Gross Amount:<input type="text" readonly name="amount" id="grossamount" class="form-control register_form x" placeholder="amount"  autocomplete="off" required />     
    </div>



    <div class="col-3">     
       Discount on Due :<input type="text" name="discount" id="discount" class="form-control register_form x" placeholder="discount"  autocomplete="off" required />     
    </div>




    <div class="col-3">     
       Receuveable Amount :<input type="text" name="receiveableamount" id="receiveableamount" class="form-control register_form x" placeholder="Receiveable Amount"  autocomplete="off" required />     
    </div>





	
  </div>
  

  
  

  

  
 
  
  

  
  
  
</div>





		   
	
           
   
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="actioneidt" />
            <input type="hidden" name="hidden_id" id="hidden_idedit" />
            <input type="submit" name="action_button" id="action_buttonedit" class="btn btn-warning" value="Add" />
           </div>
         </form>
		  <span id="form_resultfooter"></span>
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
	
	
	
	
	$('#formModal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
	   $('#user_uploaded_imagehead').html(""); 
   $('#user_uploaded_imagefoot').html(""); 
})
	
	
	
	
	
	
	
	
	
	
  $("#patientlist").select2();   
 $("#cabine_list").select2();   
 $(".doctor").select2();
 $(".agent").select2();
$("#customer_id").select2();
	  $("#refdoc_id").select2();
	  
	  
$("#booked_cabine_list").select2();


fetch();

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







  var table = $('#patient_table').DataTable({
		
	
		
        processing: true,
        serverSide: true,
		responsive: true,
	
        ajax: "{{ route('duepaymenttrans.index') }}",
        columns: [
		
		 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
         {data: 'patient_name', name: 'patient_name'},
 {data: 'patient_mobile', name: 'patient_mobile'},
 {data: 'totalamount', name: 'totalamount'},
 {data: 'amount', name: 'amount'},
  {data: 'discountondue', name: 'discountondue'},
  {data: 'type', name: 'type'},

  
  
  
 {data: 'created', name: 'created'}, 
	 {data: 'pdf', name: 'pdf'}, 		
 {data: 'action', name: 'action', orderable: false, searchable: false},			
   {data: 'producttype', name: 'producttype'}, 		
	
			
			    
           
        ]
    });



















//// toggle between doctor commision and agent commission 
$("#agentoption").hide();
$("#doctoroption").hide();
$('input[type=radio][name=commissiontype]').change(function() {
    if (this.value == '1') {

$("#doctoroption").show();
$("#agentoption").hide();
fetchdataforcommissionagent();
$('#percentageofagent').val(0);
$("#commission").val(0);

 
    }
    else if (this.value == '2') {
     	
$("#doctoroption").hide();
$("#agentoption").show();
fetchdataforcommissionagent();
$('#percentageofagent').val(0);
$("#commission").val(0);

    }
	
	    if (this.value == '3') {

$("#doctoroption").hide();
$("#agentoption").hide();
fetchdataforcommissionagent();
$('#percentageofagent').val(0);
$("#commission").val(0);

 
    }
	
	
});

	$('.releasecab').hide();

/////////////////////////////// fill the value for selected patient ...............

$('.form-horizontal').delegate('#customer_id','change',function(){
var id = $('#customer_id option:selected').attr("data-id");        





  	 var status = $('#customer_id option:selected').attr("data-status");       
	 
	 if (status == 2)
	 {
$('.bill').hide(); 	


	
$('.releasecab').show();  
				 
	 }else{
	$('.releasecab').hide(); 	 

	$('.releasecab').hide(); 
   $('.releasecab').hide(); 

   $('#cabine_due_payment').val(0); 
   $('#cabine_due_concession').val(0); 
$('.bill').show(); 	

		 
	 }



  $.ajax({
   url:"/finalreport/"+id+"/edit",
 
   dataType:"json",
   success:function(html){



	

 $('#totaldue').val(summary);	
	  $('#pathology_due').val(html.present_due_pathology);	
 $('#Pahermachy_due').val(html.present_due_medicine);
 $('#service_due').val(html.present_servie_due);
 $('#cabine_due').val(html.total_seat_fair);
 $('#surgery_due').val(html.present_durgery_due); 
  $('#doctor_due').val(html.present_due_doctor_visit);
  $('#admission_due').val(html.total_admission_due); 

 
var summary =  Math.round(parseFloat($('#totaldue').val()));
var p =  Math.round(parseFloat($('#pathology_due').val()));
var ph = Math.round(parseFloat($('#Pahermachy_due').val()));
var ser = Math.round(parseFloat($('#service_due').val()));
var cab =  Math.round(parseFloat($('#cabine_due').val()));
var sur =  Math.round(parseFloat($('#surgery_due').val())); 
var doct =   Math.round(parseFloat($('#doctor_due').val())); 
var adm =  Math.round(parseFloat($('#admission_due').val()));  
	
	
 $('#totaldue').val(summary);	
	  $('#pathology_due').val(p);	
 $('#Pahermachy_due').val(ph);
 $('#service_due').val(ser);
 $('#cabine_due').val(cab);
 $('#surgery_due').val(sur); 
  $('#doctor_due').val(doct);
  $('#admission_due').val(adm); 	
	


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	var ts = p+ ph+ ser+ cab+ doct+ adm+sur;
	
	
  $('#hidden_id').val(html.data.id); 

$("#total_sum").val(ts);
	
	
	
	
	
	
	
	
	    $('#total_due').val(ts);
	    $('#total_deposit').val(html.data.dena);	
	

	
	
	var due = parseFloat($('#total_due').val());
	var deposit =  parseFloat($('#total_deposit').val());
	
	
	var summary = due  - deposit;
	
	var  summary=  Math.round(summary);
	
    $('#Balanced_deposit').val(summary);	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
   }
  })




});



$('#sample_form').delegate('#pathologydue_due_payment, #Pahermachy_due_payment, #admission_due_payment, #service_due_payment, #surgery_due_payment, #service_concession, #Pathology_concession, #Pahermachy_concession, #surgery_concession, #doctor_concession, #admission_due_dis, #service_refund,#cabine_due_payment, #cabine_due_concession, #Pathology_refund,#Pahermachy_refund,#surgery_refund,#doctor_refund,#admission_fee_refund,  #doctor_due_payment','change',function(){

	var service = parseFloat($('#service_due_payment').val());
	var pathologydue_due_payment = parseFloat($('#pathologydue_due_payment').val());
	var Pahermachy_due_payment = parseFloat($('#Pahermachy_due_payment').val());
	var surgery_due_payment = parseFloat($('#surgery_due_payment').val());
	var doctor_due_payment = parseFloat($('#doctor_due_payment').val());
	var admission_fee_due_payment = parseFloat($('#admission_due_payment').val());
	var cabinedue_payemt = parseFloat($('#cabine_due_payment').val());
	
	
	





	var servicer = parseFloat($('#service_refund').val());
	var pathologydue_due_paymentr = parseFloat($('#Pathology_refund').val());
	var Pahermachy_due_paymentr = parseFloat($('#Pahermachy_refund').val());
	var surgery_due_paymentr = parseFloat($('#surgery_refund').val());
	var doctor_due_paymentr = parseFloat($('#doctor_refund').val());
	var admission_fee_due_paymentr = parseFloat($('#admission_fee_refund').val());












	var service_dis = parseFloat($('#service_concession').val());
	var pathologydue_due_payment_dis = parseFloat($('#Pathology_concession').val());
	var Pahermachy_due_payment_dis = parseFloat($('#Pahermachy_concession').val());
	var surgery_due_payment_dis = parseFloat($('#surgery_concession').val());
	var doctor_due_payment_dis = parseFloat($('#doctor_concession').val());
	var admission_fee_due_payment_dis = parseFloat($('#admission_due_dis').val());
var cabine_due_concession = parseFloat($('#cabine_due_concession').val());




	var total_refund =  servicer + pathologydue_due_paymentr + Pahermachy_due_paymentr + surgery_due_paymentr + doctor_due_paymentr + admission_fee_due_paymentr;
	$('#total_refund').val(total_refund);




	var total =  service + pathologydue_due_payment + Pahermachy_due_payment + surgery_due_payment + doctor_due_payment + admission_fee_due_payment+ cabinedue_payemt ;
	$('#amount').val(total);

	
	var total_discount =  service_dis + pathologydue_due_payment_dis + Pahermachy_due_payment_dis + surgery_due_payment_dis + doctor_due_payment_dis + admission_fee_due_payment_dis + cabine_due_concession;
	$('#total_discount').val(total_discount);
	
	
});
















///// clear modal data after close it 
$(".modal").on("hidden.bs.modal", function(){
    $("#patientlist").html("");
});
///////////////////////////////


     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	






function fetchdataforcommissionagent()
{
	
		  $.ajax({
   url:"finalreport/duepayment",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	   ////////////////////fetch data for Customer dropdown menu ////////////////////////////

		$("#agent").html("");
		
		 $("#doctor").html("");  

	  
	  
	  	  	  		var doctor = "<option  value='' ></option>"; 
						
					   $("#doctor").append(doctor);
					
					
					
					                    var len = 0;
                    if (response.doctor != null) {
                        len = response.doctor.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.doctor[i].id;
                             var name = response.doctor[i].name;
						var commission_pecentage = response.doctor[i].commission_pecentage;

                             var doctor = "<option data-id='"+id+"'          data-commission_pecentage='"+commission_pecentage+"'    data-name='"+name+"'   value='"+id+"'>"+name+"</option>"; 
							

                             $("#doctor").append(doctor);
                        }
                    }
					
					
					
					

					
					
					

	  	  	  		var agent = "<option  value='' ></option>"; 
						
					   $("#agent").append(agent);
					
					
					
					                    var len = 0;
                    if (response.agent != null) {
                        len = response.agent.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.agent[i].id;
                             var name = response.agent[i].name;
						var commission_pecentage = response.agent[i].commission_pecentage;

                             var agent = "<option   data-commission_pecentage='"+commission_pecentage+"'     data-name='"+name+"'   value='"+id+"'>"+name+"</option>"; 
							

                             $("#agent").append(agent);
                        }
                    }					
					
	  


			   }
				
				
	//////////////////////////////////////////////////////////////////////////////
  })

	
}





 function fetch()
 {

  $.ajax({
   url:"duepayment_patient",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	$("#customer_id").html("");
	$("#cabine_list").html("");
   $("#refdoc_id").html("");
	
	
   $("#booked_cabine_list").html("");

	
	
	
	
	
	
var option = "<option value=''></option>";                   
  $("#customer_id").append(option);

				   var len = 0;
                    if (response.patientdata != null) {
                        len = response.patientdata.length;
						
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.patientdata[i].id;
                             var name = response.patientdata[i].name;
							  var mobile = response.patientdata[i].mobile;
			
							var  status =   response.patientdata[i].booking_status;

                             var option = "<option data-name='"+name+"'    data-status='"+status+"'        data-id='"+id+"'          data-mobile='"+mobile+"'    value='"+id+"'> ID:"+id+" Name: "+name+ " Mobile:" +mobile+    "</option>"; 
							  


							  $("#customer_id").append(option);
						
                        }
                    }
	
					

	
	
	
                }
		
	//////////////////////////////////////////////////////////////////////////////
  })

 }	 
   
  ///////// show the modal//////////////////////////////////////////////////////////////////////////////// 
    $(document).on('click', '.create_record', function(){
		  $('#form_result').html('');
    $('.modal-title').text("Add New Record");
     $('#action_button').val("Add");
     $('#action').val("Add");
       $('#formModal').modal('show');

 
 });
 
   
   
  /////////////////////////////////ADD Data //////////////////////////// 
   
   

$('#sample_form').on('submit', function(event){
  event.preventDefault();
  $('#action_button').attr("disabled", true);	
  if($('#action').val() == 'Add')
  {
  
   $.ajax({
    url:"{{ route('finalreport.allduepay') }}",
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
	 $('#form_result').fadeIn();
$('#form_result').delay(1500).fadeOut();
$("#agentoption").hide();
$("#doctoroption").hide();


     $('#form_result_footer').html(html);
	 $('#form_result_footer').fadeIn();
$('#form_result_footer').delay(1500).fadeOut();






fetch();
 fetchdataforcommissionagent();

    }
   })
  
  
  
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('cabinetransaction.update') }}",
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
    }
   });
  }
 });
  











$('#sample_formedit').on('submit', function(event){
  event.preventDefault();


  if($('#action_buttonedit').val() == "Edit")
  {
	  console.log("Abdullah");
	  
   $.ajax({
    url:"{{ route('duepaymenttrans.update') }}",
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
      $('#sample_formedit')[0].reset();
	   $('#sample_form')[0].reset();
      $('#store_image').html('');
      $('#patient_table').DataTable().ajax.reload();
     }
	
	 
fetch();
 fetchdataforcommissionagent();
     $('#form_resultedit').html(html);
	 	 $('#form_resultedit').fadeIn();
	  $('#form_resultedit').delay(1500).fadeOut();
    }
   });
  }
 });














  
 $(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"/duepaymenttrans/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.patient.name);
	  $('#grossamount').val(html.data.totalamount);
	  $('#discount').val(html.data.discountondue);
 $('#receiveableamount').val(html.data.amount);

   
	$('#hidden_idedit').val(html.data.id);
    $('.modal-title').text("Edit New Record");
    $('#action_buttonedit').val("Edit");
    $('#actionedit').val("Edit");
    $('#formModal').modal('show');
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
   url:"duepaymentdelete/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#user_table').DataTable().ajax.reload();
    }, 2000);
	
	
	
	
	
	
	
	  $('#sample_form')[0].reset();
	
	fetch();
 fetchdataforcommissionagent();
	
	
	      $('#patient_table').DataTable().ajax.reload();
		   $('#ok_button').text('Delete');
   }
  })
 });

   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
  
	 
	 
	 
	 
	 
	 

	 
	 






 
 $(document).on('click', '#close', function(){
$('#formModal').modal('hide');

 });


});
</script>
	  


@stop