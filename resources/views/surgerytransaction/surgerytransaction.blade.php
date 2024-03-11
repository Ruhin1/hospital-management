

@extends('layout.main')

@section('content')



<style>
.modal-lg {
    max-width: 90% !important;

}



tr:nth-child(even) {background-color: #f2f2f2;}
</style>
 
 






</head>






<body id="bodysellcorner">


    @if ($message = Session::get('success'))
        <div style="background-color:red;" class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<input type="hidden" id="percentageofagent" value="0" name="percentageofagent" >	  

<div  class="container" style="background-color:#EEE8AA; "  >
  <h2>Surgery Transaction:</h2>
  <span id="form_result"></span>
         <form method="post" action="{{ route('surgerytansition.store') }}"   id="sample_form" class="form-horizontal sample_form" enctype="multipart/form-data">
          @csrf

  

 <div class="row">
    <div class="col-6">
     
	    Patient Id : <select id="customer_id"  class="form-control customer_id"    name="customer_id"  required  >  
	  </select>
    </div> 
	

	
		<div class="col-4">
	
	<span > Adjust With Advance Deposit  </span>

<input type="radio" id="adjustwithadvancedeposit" name="adjustwithadvancedeposit" value="1"  >
<label for="agentcom">  YES </label>
<input type="radio" id="adjustwithadvancedeposit" name="adjustwithadvancedeposit" value="2"  >
<label for="agentcom"> NO  </label>
	
	</div>
	
	</div>
	
	
	
	
	

	 <div class="row">
<div class="col-4">
      Name: <input type="text " class="form-control  " name="name" id="name"  placeholder="Enter Name" autocomplete="off">
    </div>

    <div class="col-4">
	      Address:  <input type="text" class="form-control " name="address" id="address" placeholder="Enter Address" autocomplete="off"  />
	</div>
	
    <div class="col-4">
	      Mobile:  <input type="text" class="form-control " name="mobile" id="mobile" placeholder="Enter mobile" autocomplete="off"  />
	</div>
</div>

 <div class="row">
    <div class="col-4">
	      Age:  <input type="text" class="form-control " name="age" id="age" placeholder="Enter age" autocomplete="off"  />
	</div>
	
	    <div class="col-4">
	      Sex:  <input type="text" class="form-control " name="sex" id="sex" placeholder="Enter sex" autocomplete="off"  />
	</div>



	</div>


  
  
 

  
  <p>
   

  
  <P>
 
  <div class="row">
   
    <div class="col-4">
       date of surgery.:<input type="date" id="surgerydate" name="surgerydate">
    </div>


    <div class="col-4">
       Data Entry Date.:<input type="date" id="dataentry" name="dataentrydate">
    </div>






   <div class="col-4">
       Ref. Doctor:
	 <select id="refdoctor_id"  class="form-control "  name="refdoctor_id" required >
    </select>
    </div>

</div>
<div class="row">
   <div class="col-3">
       Surgeon:
	 <select id="surgeon_id"  class="form-control "  name="Surgeon_id" required >
    </select>
    </div>  
	    <div class="col-3">
	 <input type="hidden" value="0" class="form-control numbers" name="surgeon_fees" id="surgeon_fees" placeholder="Surgeon Fees" autocomplete="off"  />
	</div>
	
	
	   <div class="col-3">
       Anesthesiologist:
	 <select id="anesthesiologist_id"  class="form-control "  name="anesthesiologist_id" required >
    </select>
    </div>
	
	    <div class="col-3">
    <span style="font-size:12px;">  </span>  <input type="hidden" value="0" class="form-control numbers" name="anesthesiologist_fees" id="anesthesiologist_fees" placeholder="Anesthesiologist Fees" autocomplete="off"  />
	</div>

  </div>
  
  
  
 


 
  <div class="row">
    <div class="col-3">
     
	  Surgery Name: <select id="surgery_id"  class="form-control surgery_id"  name="surgery_id"    >  
	  </select>
    </div> 
 <div class="col-3">
      pre operative charge: <input type="text" name="pre_operative_charge" id="pre_operative_charge" autocomplete="off" class="form-control numbers" />
    </div>
    <div class="col-3">
    Surgeon Charge <input type="text" name="Surgeon_charge" id="Surgeon_charge" autocomplete="off" class="Surgeon_charge form-control numbers" />
    </div>
	   <div class="col-3">
    Anesthesia Charge <input type="text" name="anesthesia_charge" id="anesthesia_charge" autocomplete="off" class=" anesthesia_charge form-control numbers" />
    </div>
	</div>
	<div class="row">
				   <div class="col-3">
  Post Operative Charge <input type="text" name="post_operative_charge" id="post_operative_charge" autocomplete="off" class="form-control numbers" />
    </div>
  
	  
    <div class="col-3">
      Assistant Charge: <input type="text" name="assistant_charge" id="assistant_charge" autocomplete="off" class="form-control numbers" />
    </div>
    <div class="col-3">
      	OT Charge: <input type="text" name="ot_charge" id="ot_charge" autocomplete="off" class="form-control numbers" />
    </div>
    <div class="col-3">
    Oxyzen Charge <input type="text" name="o2_no2_charge" id="o2_no2_charge" autocomplete="off" class="form-control numbers" />
    </div>
	</div>
	<div class="row">
	   <div class="col-4">
   C Arme Charge <input type="text" name="c_arme_charge" id="c_arme_charge" autocomplete="off" class="form-control numbers" />
    </div>

	   <div class="col-4">
   Miscellaneous Expenses <input type="text" name="miscellaneous_expenses" value="0" id="miscellaneous_expenses" autocomplete="off" class="form-control  numbers" />
    </div>
	
  </div>		 
			 
			 
			 

			
			<div class="container">
  <div class="row">
    <div class="col-3">
    Paid:  <input type="text" name="paid" id="paid"  value="0" class="form-control numbers paid" autocomplete="off" />
    </div>
    <div class="col-3">
    Due( Adjusted with Advance Deposit):   <input type="text" autocomplete="off" name="due" id="due_at_the_time_of_selling" value="0" class="form-control  numbers due" readonly />
    </div>
	    <div class="col-3">
   <span style="font-size:14px;">    Discount(%): </span>  <input type="text" name="percentofdicountontaotal" id="percentofdicountontaotal"  value="0"  class="form-control replacenullbyzero numbers percentofdicountontaotal"  />
    </div>
	
		    <div class="col-3">
     Discount(TK):  <input type="text" name="dicountontaotal" id="dicountontaotal"  value="0"  class="form-control dicountontaotal"   />
    </div>
	</div>
	
	<div class="row">
	
	    <div class="col-4">
      Gross Amount:  <input type="text" name="grossamount" id="grossamount" autocomplete="off" value="0"  class="form-control  grossamount" readonly />
    </div>
	
	
    <div class="col-4">
      Receiveable Amount:  <input type="text" name="totalamount" id="totalamount" autocomplete="off" value="0"  class="form-control  totalamount" readonly />
    </div>
	    <div class="col-4">
    Commission(TK):  <input type="text" name="commision" id="commission"  readonly value="0" class="form-control  numbers" />
    </div>

  </div>
</div>
			

           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>
		   <span id="form_result_footer"></span>

</div>


<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
    <h4 style="color:red;"> পূর্বের প্যাথলজি টেস্টের অর্ডার এর ট্রাঞ্জিশন  </h4>
  
	
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
	
			<th>Serial NO.</th>
			<th>Orer NO.</th>
			<th>print</th>
		<th>Surgeory name</th>
		<th>Patient </th>
                <th>Surgeon</th>
			<th>Anesthesiologist</th>
			<th>Ref. Doc </th>
			<th>Source</th>	
			<th>Charge</th>	
         <th>Entry Date</th>	
	     <th>Entry By</th>			
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
 <div class="modal-dialog  modal-lg">
  <div class="modal-content modal-xl">
   <div class="modal-header ">
          <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class=" modal-body modal-xl  ">
         <span id="form_result"></span>

        </div>
     </div>

    </div>
	</div>
	
	
	</div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
			
			

			
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>








 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">





$(document).ready(function(){
	
/////////////////////////////// Replace non deimal number 

$("#admitnew").hide();

$('input[type=radio][name=showadmitform]').change(function() {
    if (this.value == '1') {

$("#admitnew").show();

fetch();
 
    }
});
















$('.numbers').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});	
	


$('.numbers').change(function () { 
   
 var a = $(this).val();

if ( a == '' ) {
$(this).val(0);
calculation();
}



});	
	




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


//////////////////////////// Show record 

    var table = $('#patient_table').DataTable({
		
	
		
        processing: true,
        serverSide: true,
		responsive: true,
	
        ajax: "{{ route('surgerytansition.index') }}",
        columns: [
		
		 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
		 
		 
		
            
			
			
			{data: 'id', name: 'id'},
			{data: 'pdf', name: 'pdf'},
			{data: 'surgery_name', name: 'surgery_name'},
			 {data: 'patient', name: 'patient'},  
           		{data: 'surgeon_name', name: 'surgeon_name'},
{data: 'anesthesiologist_name', name: 'anesthesiologist_name'},
{data: 'refdoc_id', name: 'refdoc_id'},  

{data: 'dalal_name', name: 'dalal_name'},









{data: 'total_cost_after_initial_vat_and_discount', name: 'total_cost_after_initial_vat_and_discount'}, 
 {data: 'created', name: 'created'},  
 
  {data: 'entry_by', name: 'entry_by'}, 

 {data: 'action', name: 'action'}, 

  
        ]
    });




	///// clear modal data after close it 
$(".modal").on("hidden.bs.modal", function(){
    $("#category").html("");
	
	  $(".medicine_name").val("");
	   $("#child").html("");

   $(".customer_id").html("");
  $(".cabine_id").html("");  
   
   
   
   $(".unit_price").val(0);
  $(".quantity").val('');
  $(".vat").val(0);   
 $(".discount").val(0);   
  $(".paid").val(0); 
   $(".due").val(0); 
    $(".adjust").val(0); 
	$(".amount").val(0); 
	$(".totalamount").val(0); 
   $("#surgery_id").html("");



 $("#products_table tr:gt(1)").remove(); // remove all row whose index is greater than 1



 
 
  
	
 

	

});
///////////////////////////////
	

	  $("#cusname").hide();
	  $("#cusmobile").hide();
  $("#customer_name").select2();
    $("#customer_mobile").select2();	
  $("#category").select2();

$("#agent").select2();

$("#customer_id").select2();


$("#cabine_id").select2();

$('.medicine_name').select2();
$("#doctor").select2();
$("#refdoctor_id").select2();
     
 $("#surgery_id").select2();
$("#anesthesiologist_id").select2();
$("#surgeon_id").select2();  
  
  
    $("#cid").click(function(){
     $("#cusname").hide();
	  $("#cusmobile").hide();
    $("#cusid").show();

  });
  
  
    $("#cname").click(function(){

	  $("#cusmobile").hide();
    $("#cusid").hide();
	$("#cusname").show();

  });
  
  
      $("#cmobile").click(function(){

    $("#cusid").hide();
	$("#cusname").hide();
	$("#cusmobile").show();

  });
  
  
  





    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	
                     

function fetchdataforcommissionagent()
{
	
		  $.ajax({
   url:"surgerytansition/dropdown_list",
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

                             var doctor = "<option  data-commission_pecentage='"+commission_pecentage+"'    data-name='"+name+"'   value='"+id+"'>"+name+"</option>"; 
							

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
	
	
	
     $('.medicine_name').select2();
	
	  $.ajax({
   url:"surgerytansition/dropdown_list",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	   ////////////////////fetch data for Customer dropdown menu ////////////////////////////
	    $("#customer_id").html("");
		
		
			    $("#cabine_id").html("");
		
		$("#agent").html("");
		
		 $("#refdoctor_id").html("");  
		  $("#anesthesiologist_id").html("");  
		  $("#surgeon_id").html(""); 	  
	   $("#surgery_id").html("");
	  
	  
	  
	  
	  	  	  	  	  		var anesthesiologist = "<option  value='' ></option>"; 
						
					   $("#anesthesiologist_id").append(anesthesiologist);
					
					
					
					                    var len = 0;
                    if (response.doctor != null) {
                        len = response.doctor.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.doctor[i].id;
                             var name = response.doctor[i].name;
						

                             var anesthesiologist = "<option      data-name='"+name+"'   value='"+id+"'>"+name+"</option>"; 
							

                             $("#anesthesiologist_id").append(anesthesiologist);
                        }
                    }
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  	  	  	  		var surgeon = "<option  value='' ></option>"; 
						
					   $("#surgeon_id").append(surgeon);
					
					
					
					                    var len = 0;
                    if (response.doctor != null) {
                        len = response.doctor.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.doctor[i].id;
                             var name = response.doctor[i].name;
						

                             var surgeon = "<option      data-name='"+name+"'   value='"+id+"'>"+name+"</option>"; 
							

                             $("#surgeon_id").append(surgeon);
                        }
                    }
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  	  	  		var doctor = "<option  value='' ></option>"; 
						
					   $("#refdoctor_id").append(doctor);
					
					
					
					                    var len = 0;
                    if (response.doctor != null) {
                        len = response.doctor.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.doctor[i].id;
                             var name = response.doctor[i].name;
						var commission_pecentage = response.doctor[i].commission_pecentage;

                             var doctor = "<option  data-commission_pecentage='"+commission_pecentage+"'    data-name='"+name+"'   value='"+id+"'>"+name+"</option>"; 
							

                             $("#refdoctor_id").append(doctor);
                        }
                    }
					
	


						var optionsurgery = "<option  value='' ></option>"; 
					   $("#surgery_id").append(optionsurgery);  
	
	
                    var len = 0;
                    if (response.listofsurgery != null) {  
                        len = response.listofsurgery.length;
						
                    }
                       
               if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.listofsurgery[i].id;
                             var name = response.listofsurgery[i].name;
												 var pre_operative_charge = response.listofsurgery[i].pre_operative_charge;
							 var Surgeon_charge = response.listofsurgery[i].Surgeon_charge;
							 var anesthesia_charge = response.listofsurgery[i].anesthesia_charge;
							 var assistant_charge = response.listofsurgery[i].assistant_charge;
							 var ot_charge = response.listofsurgery[i].ot_charge;
							 var o2_no2_charge = response.listofsurgery[i].o2_no2_charge;
							 var c_arme_charge = response.listofsurgery[i].c_arme_charge;
							 var post_operative_charge = response.listofsurgery[i].post_operative_charge;
							
                             
							
					  var optionsurgery = "<option data-pre_operative_charge='"+pre_operative_charge+"' data-Surgeon_charge='"+Surgeon_charge+"' data-anesthesia_charge='"+anesthesia_charge+"' data-assistant_charge='"+assistant_charge+"' data-ot_charge='"+ot_charge+"' data-o2_no2_charge='"+o2_no2_charge+"'data-c_arme_charge='"+c_arme_charge+"'data-post_operative_charge='"+post_operative_charge+"'  data-name='"+name+"'  value='"+id+"'>"+name+"</option>"; 
							
				

                             $("#surgery_id").append(optionsurgery);
                        }
                    }
				



	   
var option = "<option value=''></option>";                   
  $("#cabine_id").append(option);

				   var len = 0;
                    if (response.cabinedata != null) {
                        len = response.cabinedata.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.cabinedata[i].id;
                             var serial_no = response.cabinedata[i].serial_no;
							  
							

                             var option = "<option   value='"+id+"'>"+serial_no+"</option>"; 
							  


							  $("#cabine_id").append(option);
						
                        }
                    }




















				
	   
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
							  	 var address = response.patientdata[i].address;
							var age = response.patientdata[i].age;
							var sex = response.patientdata[i].sex;
					var deposit = response.patientdata[i].dena;
					 var due  = response.patientdata[i].due;
							

                             var option = "<option data-name='"+name+"'  data-deposit='"+deposit+"' data-due='"+due+"' data-sex='"+sex+"' data-mobile='"+mobile+"'  data-age='"+age+"'   data-address='"+address+"'  value='"+id+"'>" +"ID:"+ id+ "(" + name + "("+ mobile + ")</option>"; 
							  


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

 
 });


/////////////////////////////// fill the value for selected patient ...............

$('.form-horizontal').delegate('.customer_id','change',function(){
var name = $('.customer_id option:selected').attr("data-name");        
var age = $('.customer_id option:selected').attr("data-age");
var sex = $('.customer_id option:selected').attr("data-sex");
var address = $('.customer_id option:selected').attr("data-address");
var mobile = $('.customer_id option:selected').attr("data-mobile");

var deposit = $('.customer_id option:selected').attr("data-deposit");
var due = $('.customer_id option:selected').attr("data-due");
var dif = deposit;
console.log(mobile);
$('#name').val(name);
$('#age').val(age);
$('#sex').val(sex);
$('#address').val(address);
$('#mobile').val(mobile);
$("#admitnew").hide();
$('#deposit').val(dif);
$('input[type=radio][name=showadmitform]').prop("checked", false);

});

////////////////// Dynamically fetch data from option selected of surgery list 

$('.form-horizontal').delegate('#surgery_id','change',function(){
	

	var Surgeon_charge  = $('.surgery_id option:selected').attr("data-Surgeon_charge");
    var anesthesia_charge  = $('.surgery_id option:selected').attr("data-anesthesia_charge");
	var assistant_charge  = $('.surgery_id option:selected').attr("data-assistant_charge");
	var ot_charge  = $('.surgery_id option:selected').attr("data-ot_charge");
	var o2_no2_charge  = $('.surgery_id option:selected').attr("data-o2_no2_charge");
	var c_arme_charge  = $('.surgery_id option:selected').attr("data-c_arme_charge");	
	var post_operative_charge  = $('.surgery_id option:selected').attr("data-post_operative_charge");	
	
	
	var pre_operative_charge  = $('.surgery_id option:selected').attr("data-pre_operative_charge");
	console.log(Surgeon_charge);	
	
	
	
	
	$('#Surgeon_charge').val(Surgeon_charge);
	$('#anesthesia_charge').val(anesthesia_charge);
	$('#assistant_charge').val(assistant_charge);
	$('#ot_charge').val(ot_charge);
	$('#o2_no2_charge').val(o2_no2_charge);
	$('#c_arme_charge').val(c_arme_charge);
	$('#post_operative_charge').val(post_operative_charge);
	$('#pre_operative_charge').val(pre_operative_charge);	

	
	
	
	
	  $("#paid").val(0);
		calculation();
	
});

//////////////////////////// fill the value of percentage of agent and doctor 


$('.form-horizontal').delegate('.agent','change',function(){
var percentage = $('#agent option:selected').attr("data-commission_pecentage");        

$('#percentageofagent').val(percentage);
totalamount();
});
$('.form-horizontal').delegate('.doctor','change',function(){
var percentage = $('#doctor option:selected').attr("data-commission_pecentage");        

$('#percentageofagent').val(percentage);
totalamount();
});





////////////////////////////////////////keyup//////////////////////////////


function calculation()
{
 var Surgeon_charge = parseFloat( $('#Surgeon_charge').val());
 var anesthesia_charge = parseFloat($('#anesthesia_charge').val());
 var assistant_charge = parseFloat($('#assistant_charge').val());
 var ot_charge = parseFloat($('#ot_charge').val());
 var o2_no2_charge = parseFloat($('#o2_no2_charge').val());	
 var c_arme_charge = parseFloat($('#c_arme_charge').val()); 
 var post_operative_charge = parseFloat($('#post_operative_charge').val()); 
 var pre_operative_charge = parseFloat($('#pre_operative_charge').val()); 
 
 var miscellaneous_expenses = parseFloat($('#miscellaneous_expenses').val()); 

total = Surgeon_charge + anesthesia_charge+ miscellaneous_expenses +assistant_charge + ot_charge + o2_no2_charge + c_arme_charge + post_operative_charge + pre_operative_charge ; 
total=total.toFixed(2);

var grossamount = total; 


$("#grossamount").val(grossamount);



		//var totalamount =  parseFloat( $('#totalamount').val());
	var percentage_discount_on_total = $('#percentofdicountontaotal').val();


	if (percentage_discount_on_total > 0 )
	{
		var a = (total * (percentage_discount_on_total/100)).toFixed(2);
	  total = total - a ;
	  total= total.toFixed(2);
	  $('#dicountontaotal').val(a);
		$("#totalamount").val(total); 
	}

	var commissionrate = $("#percentageofagent").val();
	var commission_amount = (total * (commissionrate/100)).toFixed(2);  
	$("#commission").val(commission_amount);











$("#totalamount").val(total);

var paid = parseFloat($('#paid').val());

if (paid == null )
{
	
 $('#due_at_the_time_of_selling').val(total);	
}
else 
{
	
	var paid = total - paid;

	due = paid.toFixed(2);
	 $('#due_at_the_time_of_selling').val(due);
}




}



$('.sample_form').delegate('#Surgeon_charge,   #miscellaneous_expenses, #pre_operative_charge, #anesthesia_charge, #assistant_charge , #ot_charge, #o2_no2_charge, #c_arme_charge, #post_operative_charge','change',function(){

calculation();

});






/////////////////////////////////////////////////// calculate total amount  /////////////////////////////////////////

function totalamount(){
calculation();

}

          $("#paid").change(function(){
      var grossamount =    $("#grossamount").val();
	var discount = $("#dicountontaotal").val();
	
	var paid = $("#paid").val();
	 var receiveableamount = grossamount - discount;
	 
	 $("#totalamount").val(receiveableamount);
	 
			  
		var due = 	receiveableamount -   paid;
		
		$("#due_at_the_time_of_selling").val(due);
    


  });
  





          $("#dicountontaotal").change(function(){
			  
	
    var grossamount =    $("#grossamount").val();
	var discount = $("#dicountontaotal").val();
	
	var paid = $("#paid").val();
	 var receiveableamount = grossamount - discount;
	 
	 $("#totalamount").val(receiveableamount);
	 
			  
		var due = 	receiveableamount -   paid;
		
		$("#due_at_the_time_of_selling").val(due);
    


  });






  
  
  $("#percentofdicountontaotal").keyup(function(){
     totalamount();


  });



  /////////////////////////////////ADD Data //////////////////////////// 
   
   

$('#sample_form').on('submit', function(event){
  event.preventDefault();
 
   $.ajax({
    url:"{{ route('surgerytansition.store') }}",
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
     }
$('#form_result').html(html);

$('#form_result').fadeIn();
$('#form_result').delay(1500).fadeOut();

$('#form_result_footer').html(html);

$('#form_result_footer').fadeIn();
$('#form_result_footer').delay(1500).fadeOut();



$("#agentoption").hide();
$("#doctoroption").hide();
$("#admitnew").hide();
fetch();
 fetchdataforcommissionagent();


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
   url:"surgerytansition/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#user_table').DataTable().ajax.reload();
	 fetch();
 fetchdataforcommissionagent();
	 
    }, 2000);
	
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
	  
</body>

@stop