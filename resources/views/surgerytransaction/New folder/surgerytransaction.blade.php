

@extends('layout.main')

@section('content')


<style>
.modal-lg {
    max-width: 90% !important;

}


</style>

 
 






</head>

  
 






<body>

<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
    <h1>Appointment For Surgery</h1>
    <a style="float:right; margin-bottom:20px;" class="btn btn-success  create_record" href="javascript:void(0)" id="create_record"> Add New </a>
	
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
<th>No</th>
			<th>Name of the Surgery.</th>
			<th>Doctor Name</th>
			
			<th>Patinet ID </th>
			<th>Patient Name</th>
			
             
			<th>Service Charge</th>
			<th>Discount </th>
			<th> Vat</th>
			<th>Service Charge after discount </th>
			<th>Due</th>
			<th>Entry By</th>
			
				
			
				<th>pdf</th>
    
				
				
			     
             
                
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
         <span id="form_result"></span>
         <form method="post"     id="sample_form" class="form-horizontal  sample_form_for_doctorappointment" enctype="multipart/form-data">
          @csrf
		  
	 <div class="form-group">
     <label class="control-label col-md-4">Patient List  : </label>
     <div class="col-md-8">
	 <select id="patientlist"  class="form-control patientlist"  name="patientlist"     style='width: 270px;'>
    </select>
    </div>
	</div>
			 
	
	<div class="form-group">
    <label class="control-label col-md-4">Doctor List  : </label>
    <div class="col-md-8">
   <select id="doctor_id"  class="form-control doctor_id"  name="doctor_id"  required   style='width: 270px;'>
    </select>
   </div>
   </div>
   

   
	<div class="form-group">
    <label class="control-label col-md-4">Department  : </label>
    <div class="col-md-8">
	<input type="text"   name="department" id="department" class="form-control  department" required readonly />
	</div>
	</div>
	

	
	
		 <table class="table" id="products_table">
                <thead>
                    <tr>
                        <th>Surgery</th>
                        <th  style="width:150px;" >Service charge</th>
						
						<th  style="width:80px;"  >Vat%</th>
						<th  style="width:150px;"  >Vat(TK)</th>
						<th  style="width:80px;">Disc<br>ount(%)</th>
						
						<th>Discount(TK)</th>
						<th style="width:150px;" >Service Charge <br>  ± <br> vat/discount </th>
					
						<th style="width:150px;" >Adjusted<br>service charge
						
						 </th>
							
                    </tr>
                </thead>
                <tbody class="addmoreproduct">
                    <tr id="product0">
                        <td>
        <select id="surgery_id"  class="form-control surgery_id"  name="surgery_id"  required   style='width: 270px;'>
    </select>
                        </td>
                        <td>
						  <input type="text"   name="fees" id="fees" class="form-control fees" required  />
						  
                        </td>
						
						
						<td>
						 <input type="text" name="vat" value="0" id="vat" class="form-control vat" readonly />
						</td>
						
						<td>
						 <input type="text" name="vattk" value="0" id="vattk" class="form-control vattk" readonly /> 
						</td>
						
						<td>
						<input type="text" name="discount" value="0" id="discount" class="form-control discount" />
						</td>
						
						
						
			            <td>
						<input type="text" name="totaldiscount" value="0" id="totaldiscount" class="form-control totaldiscount" readonly />
						</td>
			              <h1 id="messageforstock" style="color:red;" >  </h1> 

						
												
						<td>
						<input type="text" name="amount" value="0" id="amount" class="form-control amount" readonly />
						</td>
						<td>
						<input type="text" name="adjust" value="0" id="adjust" class="form-control adjust"  />
						</td> 
						
						

						
                    </tr>
                    <tr id="product1"></tr>
                </tbody>
            </table>
			 
			 
			 
			 
			 
			 
			
		   <div id="child"> 
		   
		   </div>

		   
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	

	
    <div class="form-group">
    <label class="control-label col-md-4">Due  : </label>
    <div class="col-md-8">
	<input type="text"   name="due" id="due" value="0"  class="form-control  due" required  />
	</div>
	</div>
	    <div class="form-group">
    <label class="control-label col-md-4">Paid  : </label>
    <div class="col-md-8">
	<input type="text"   name="paid" id="paid"  class="form-control paid" required  />
	</div>
	</div>
			 


	
            

			<div class="form-group">
            <label class="control-label col-md-4" >Patient Name : </label>
            <div class="col-md-8">
             <input type="text" name="patientname" id="patientname" class="form-control name" />
            </div>
           </div>
          
		  <div class="form-group">
            <label class="control-label col-md-4">Address : </label>
            <div class="col-md-8">
             <input type="text" name="address" id="address" class="form-control address" />
            </div>
           </div>
		   
		     <div class="form-group">
            <label class="control-label col-md-4">Mobile : </label>
            <div class="col-md-8">
             <input type="text" name="mobile" id="mobile" class="form-control mobile" />
            </div>
           </div> 
		   
		    <div class="form-group">
            <label class="control-label col-md-4">Age : </label>
            <div class="col-md-8">
             <input type="text" name="age" id="age" class="form-control age" />
            </div>
           </div>
		   
		   <div class="form-group">
            <label class="control-label col-md-4">sex : </label>
            <div class="col-md-8">
             <input type="text" name="sex" id="sex" class="form-control sex" />
            </div>
           </div>
		   
		   
		   
		   
		   

		   

		   

			 
   
           <br />
		   
	
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>
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





 




<script type="text/javascript">


$(document).ready(function(){
	
	
	Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});
$('#datePicker').val(new Date().toDateInputValue());
	
  $("#patientlist").select2();   
 $("#doctor_id").select2();   
 $("#surgery_id").select2();
 

///// clear modal data after close it 
$(".modal").on("hidden.bs.modal", function(){
    $("#patientlist").html("");
	 $("#doctor_id").html("");   
 $("#surgery_id").html("");
});
///////////////////////////////


     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	



    var table = $('#patient_table').DataTable({
		
	
		
        processing: true,
        serverSide: true,
		responsive: true,
	
        ajax: "{{ route('surgerytansition.index') }}",
	
        columns: [
		
		 
		 
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
             {data: 'surgery_name', name: 'surgerylist.name'},
			 {data: 'doctor_name', name: 'doctor.name'},
			  {data: 'patient_id', name: 'patient_id'},
			 {data: 'patient_name', name: 'patient.name'},
			 
			  {data: 'fees', name: 'fees'},   
			   {data: 'totaldiscount', name: 'totaldiscount'},
			    {data: 'totalvat', name: 'totalvat'},
			     {data: 'final_price_after_adjustment', name: 'final_price_after_adjustment'},  
			   
			 
			  {data: 'due', name: 'due'},
			  {data: 'entry_by', name: 'User.name'},
           
	
			 
 {data: 'pdf', name: 'pdf'},
 

			    
           
        ]
    });


   
   
  ///////// show the modal//////////////////////////////////////////////////////////////////////////////// 
    $(document).on('click', '.create_record', function(){
		
		
		  $('#form_result').html('');
    $('.modal-title').text("Add New Record");
     $('#action_button').val("Add");
     $('#action').val("Add");
       $('#formModal').modal('show');
  $.ajax({
   url:"surgerytansition/dropdown_list",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	$("#patientlist").html("");
	$("#doctor_id").html("");
	$("#surgery_id").html("");
	
	var option = "<option  value='' >select one</option>"; 
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

                             var option = "<option   data-name='"+name+"' data-address='"+address+"'  data-age='"+age+"' data-sex='"+sex+"' data-mobile='"+mobile+"' value='"+id+"'>"+id+"</option>"; 
							

                             $("#patientlist").append(option);
                        }
                    }
					
					
						var optionfordoctor = "<option >select one</option>"; 
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
					
					
					
					
					
					
					
					
						var optionsurgery = "<option  value='' >select one</option>"; 
					   $("#surgery_id").append(optionsurgery);  
	
	
                    var len = 0;
                    if (response.listofsurgery != null) {  
                        len = response.listofsurgery.length;
						
                    }
                       
                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.listofsurgery[i].id;
                             var name = response.listofsurgery[i].name;
							
							  var price = response.listofsurgery[i].unitprice;
							
							
                             var optionsurgery = "<option   data-name='"+name+"' data-price='"+price+"'   value='"+id+"'>"+name+"</option>"; 
							

                             $("#surgery_id").append(optionsurgery);
                        }
                    }
					
					
					
					
					
					
					
					
					
					
					
					
					
					
                }
				
				
	//////////////////////////////////////////////////////////////////////////////
  })
 
 
 });
 
 
 
 
 
 
 
 
 
 
 ///////////////////////////////// insert value related to the patient dynamically  /////////////////////

$('.sample_form_for_doctorappointment').delegate('.patientlist','change',function(){
	
	var name = $('.patientlist option:selected').attr("data-name");
	var mobile = $('.patientlist option:selected').attr("data-mobile");
	var address = $('.patientlist option:selected').attr("data-address");
	var age = $('.patientlist option:selected').attr("data-age");
	var sex = $('.patientlist option:selected').attr("data-sex");
	
	
	$('#patientname').val(name);
	$('#address').val(address);
	$('#mobile').val(mobile);
	$('#age').val(age);
	$('#sex').val(sex);





});
 
 
  ///////////////////////////////// insert value related to the Doctor dynamically  /////////////////////

$('.sample_form_for_doctorappointment').delegate('.doctor_id','change',function(){
	
	var Department = $('.doctor_id option:selected').attr("data-Department");
	var fees = $('.doctor_id option:selected').attr("data-fees");
	
	
	$('#department').val(Department);
	


});

$('.sample_form_for_doctorappointment').delegate('.surgery_id','change',function(){
	
	
	var fees = $('.surgery_id option:selected').attr("data-price");

	$('#fees').val(fees);  
	
	$('#amount').val(fees);
	$('#adjust').val(fees);
	$('#paid').val(fees);
	$('#vat').val(0);
	$('#discount').val(0);
	$('#totaldiscount').val(0);
	$('#vattk').val(0);
	$('#due').val(0);
	
	
	 
	
});
 
 
 
 
////////////////////////////////////////keyup//////////////////////////////

$('.addmoreproduct').delegate(' .discount ,.vat','keyup',function(){

	var tr= $(this).parent().parent();
	var price = parseFloat(tr.find('.fees').val());


var discount = (tr.find(".discount").val());
var vat = (tr.find(".vat").val());

var adjust = (tr.find(".adjust").val());

var productname= tr.find('.surgery_id option:selected').html();






	
calculationforinputfield();	




function calculationforinputfield(){



var total = Number(price) * 1;

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
	console.log(total);
	
		tr.find('.amount').val(total);
		tr.find('.adjust').val(total);
		$("#paid").val(total);
totalamount();
}





});











//////////////////////////////////////////////// Adjusted Price //////////////////


$('.addmoreproduct').delegate('.adjust','change',function(){

var tr= $(this).parent().parent();
var adjust = parseFloat( tr.find(".adjust").val());

var total_amount_after_initial_vat_tax = parseFloat(tr.find('.amount').val());
var vat =parseFloat( tr.find(".vat").val());

var price = parseFloat(tr.find('.fees').val());




	$('#paid').val(adjust);
	



var discount = parseFloat(tr.find(".totaldiscount").val());

var newdiscount = discount+( total_amount_after_initial_vat_tax - adjust);

tr.find(".totaldiscount").val(newdiscount);





totalamount();







});

$('.sample_form_for_doctorappointment').delegate('#due','change',function(){
	console.log("his");
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


          $("#due_at_the_time_of_selling").change(function(){
     totalamount();


  });
















 
 
 
 
 
 
 
 
 
 
 
 
 
 
   
   
  /////////////////////////////////ADD Data //////////////////////////// 
   
   

$('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
  
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
    }
   })
  
  
  
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('surgerytansition.update') }}",
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
   
   $(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"/surgerytansition/"+id+"/edit",
   dataType:"json",
   success:function(html){
	   
	   
	   
    $('#Startdate').val(html.data.starting);
    $('#releasedata').val(html.data.ending);

	
	var len = html.cabinedata.length;
	console.log(len);
	var presentcabinedata = html.data.cabinelist_id;

	
	
		                        for (var i = 0; i<len; i++) {
								
								if ( presentcabinedata == html.cabinedata[i].id  ) 
								{
									var id = html.cabinedata[i].id;
                             var name = html.cabinedata[i].serial_no;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 

                             $("#cabine_list").append(option);
								}
                             
                        }
						
						
							                        for (var i = 0; i<len; i++) {
								
								if ( presentcabinedata != html.cabinedata[i].id  ) 
								{
									var id = html.cabinedata[i].id;
                             var name = html.cabinedata[i].serial_no;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 

                             $("#cabine_list").append(option);
								}
                             
                        }
						
				
		/////////////////////////  fetch for patientlist 				
		
						var len = html.patientdata.length;
	
	var presentpatientdata = html.data.patient_id;

	
	
		                        for (var i = 0; i<len; i++) {
								console.log('A' );
								if ( presentpatientdata == html.patientdata[i].id  ) 
								{
									var id = html.patientdata[i].id;
                             var name = html.patientdata[i].name;

                             var optionforpatient = "<option value='"+id+"'>"+id+"</option>"; 
                              console.log(option);
                             $("#patientlist").append(optionforpatient);
								}
                             
                        }
						
						
							                        for (var i = 0; i<len; i++) {
								
								if ( presentpatientdata != html.patientdata[i].id  ) 
								{
									var id = html.patientdata[i].id;
                             var name = html.patientdata[i].name;

                             var optionforpatient = "<option value='"+id+"'>"+id+"</option>"; 

                             $("#patientlist").append(optionforpatient);
								}
                             
                        }
	                        
	
	

						
						


   
	$('#hidden_id').val(html.data.id);
    $('.modal-title').text("Edit New Record");
    $('#action_button').val("Edit");
    $('#action').val("Edit");
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
   url:"surgerytansition/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#user_table').DataTable().ajax.reload();
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


   
   
   
   
   
   
   
   
   
   
   
   
   
  
	 
	 
	 
	 
	 
	 

	 
	 






 
 $(document).on('click', '#close', function(){
$('#formModal').modal('hide');

 });


});
</script>
	  


@stop