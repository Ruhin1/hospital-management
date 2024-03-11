

@extends('layout.main')

@section('content')



<style>
.modal-lg{
	width:90%;
	
}

</style>
 
 






</head>






<body>

<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
    <h2> রিলিজ হওয়া প্যাশেন্ট থেকে বকেয়া আদায় ও ফাইনাল রিপোর্ট প্রিন্ট   </h2>
    <a style="float:right; margin-bottom:20px;" class="btn btn-success" href="javascript:void(0)" id="create_record"> Add New </a>
	
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
	
			<th>নং </th>
			<th>আইডি </th>
		
                <th>নাম </th>
				<th>মোবাইল নং :</th>
		
				<th>কেবিন নং  </th> 
				<th>ভর্তি   </th> 
			
				<th> বাকির পরিমাণ </th>
			
             
		
				
			     
             
                <th width="300px">Action</th>
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
 <div id="onchange"  class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" action="{{ route('finalreport.update') }}" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-4" > রোগির নাম  : </label>
            <div class="col-4">
             <input type="text" name="name" id="name" class="form-control" readonly />
            </div>
			<br>
			
			<div class="row">
			  <div class="col-3">
            Deposit:   <input type="text" name="dena" id="dena" class="form-control" readonly />   
            
			
			
			</div>
			
			<div class="col-3">
			
			Others Due: <input type="text" name="due" id="due" class="form-control" readonly />
			
			</div>
			
			
			
			
						<div class="col-3">
			
			 Cabine Due: <input type="text" name="cabdue" id="cabdue" class="form-control" readonly /> 
			
			</div>
			
			
			
						
						<div class="col-3">
			
			Total Due: <input type="text" name="totaldue" id="totaldue" class="form-control" readonly /> 
			
			</div>
			
			</div>
			
			
			
			
			
			
           </div>
		   
  <input type="radio"  name="transitiontype" value="1" required >
  <label for="pawna"> টাকা নিচ্ছেন </label>
  <input type="radio"  name="transitiontype" value="3"  required >
  <label for="dena">টাকা ফেরত দিচ্ছেন  </label><br>
	  <input type="radio"  name="transitiontype" value="6"  required >
  <label for="dena"> এডজাস্ট করুন ( প্রকৃত পক্ষে কোন লেনদেন হয় না )  </label><br>	   
		   <div id="calcul" >
		   <div class="row">
		   
		   <div class="col-3">
		   
		   Pathology Due: <input type="text" readonly name="pathology_due" id="pathology_due" class="form-control" />
		   
		   </div>
		   
		   		   <div class="col-3">
		   
		   Due Payment: <input type="text" autocomplete="off" value="0" name="pathologydue_due_payment" id="pathologydue_due_payment" class="form-control" />
		   
		   </div>
		   
		   
		 		   		   <div class="col-3">
		   
		   Concession: <input type="text" autocomplete="off" value="0" name="Pathology_concession" id="Pathology_concession" class="form-control" />
		   
		   </div>  
		   
		   
		 		   		   <div class="col-3">
		   
		  Refund: <input type="text" value="0" autocomplete="off"  name="Pathology_refund" id="Pathology_refund" class="form-control" />
		   
		   </div> 		 


		 
		   
		   </div>
		   
		   
				   <div class="row">
		   
		   <div class="col-3">
		   
		   Phermachy Due: <input type="text" readonly name="Pahermachy_due" id="Pahermachy_due" class="form-control" />
		   
		   </div>
		   
		   		   <div class="col-3">
		   
		   Due Payment: <input type="text"  autocomplete="off" value="0" name="Pahermachy_due_payment" id="Pahermachy_due_payment" class="form-control" />
		   
		   </div>
		   
		   
		 		   		   <div class="col-3">
		   
		   Concession: <input type="text"  autocomplete="off" value="0" name="Pahermachy_concession" id="Pahermachy_concession" class="form-control" />
		   
		   </div>  
		   
		   
		 		   		   <div class="col-3">
		   
		  Refund: <input type="text"   autocomplete="off" value="0" name="Pahermachy_refund" id="Pahermachy_refund" class="form-control" />
		   
		   </div> 		 


		 
		   
		   </div>   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   <div class="row">
		   
		   <div class="col-3">
		   
		   Service Due: <input type="text" readonly name="service_due" id="service_due" class="form-control" />
		   
		   </div>
		   
		   		   <div class="col-3">
		   
		   Due Payment: <input type="text" autocomplete="off" value="0" name="service_due_payment" id="service_due_payment" class="form-control" />
		   
		   </div>
		   
		   
		 		   		   <div class="col-3">
		   
		   Concession: <input type="text" autocomplete="off" value="0" name="service_concession" id="service_concession" class="form-control" />
		   
		   </div>  
		   
		   
		 		   		   <div class="col-3">
		   
		  Refund: <input type="text" autocomplete="off" value="0" name="service_refund" id="service_refund" class="form-control" />
		   
		   </div> 		 


		 
		   
		   </div>




		   <div class="row">
		   
		   <div class="col-3">
		   
		   Cabine Due: <input type="text" readonly name="cabine_due" id="cabine_due" class="form-control" />
		    </div>
		   		   <div class="col-3">
		   
		   Due Payment: <input type="text" autocomplete="off" value="0" name="cabine_due_payment" id="cabine_due_payment" class="form-control" />
		   
		   </div>
		   
		   
		 		   		   <div class="col-3">
		   
		   Concession: <input type="text" autocomplete="off" value="0" name="cabine_due_concession" id="cabine_due_concession" class="form-control" />
		   
		   </div>  

		 
		   
		  



			   <div class="row">
		   
		   <div class="col-3">
		   
		  Doctor Visit Due: <input type="text" readonly name="doctor_due" id="doctor_due" class="form-control" />
		   
		   </div>
		   
		   		   <div class="col-3">
		   
		   Due Payment: <input type="text" autocomplete="off" value="0" name="doctor_due_payment" id="doctor_due_payment" class="form-control" />
		   
		   </div>
		   
		   
		 		   		   <div class="col-3">
		   
		   Concession: <input type="text" autocomplete="off" value="0" name="doctor_concession" id="doctor_concession" class="form-control" />
		   
		   </div>  
		   
		   
		 		   		   <div class="col-3">
		   
		  Refund: <input type="text" autocomplete="off" value="0" name="doctor_refund" id="doctor_refund" class="form-control" />
		   
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
		   
		   Due Payment: <input type="text" autocomplete="off" value="0" name="surgery_due_payment" id="surgery_due_payment" class="form-control" />
		   
		   </div>
		   
		   
		 		   		   <div class="col-3">
		   
		   Concession: <input type="text" autocomplete="off" value="0" name="surgery_concession" id="surgery_concession" class="form-control" />
		   
		   </div>  
		   
		   
		 		   		   <div class="col-3">
		   
		  Refund: <input type="text" autocomplete="off"  value="0" name="surgery_refund" id="surgery_refund" class="form-control" />
		   
		   </div> 		 


		 
		   
		   </div>




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
		   
		Service Comment : <input type="text"  name="Service_comment" id="Service_comment" class="form-control" />
		   
		   </div>
		   
		

		   <div class="col-3">
		   
		Total Amount :  <input type="text" readonly autocomplete="off" name="amount" id="amount" class="form-control" />
		   
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





 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">


$(document).ready(function(){


 
 
 
 
 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 


     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	



    var table = $('#patient_table').DataTable({
		
	
		
        processing: true,
        serverSide: true,
		responsive: true,
	
        ajax: "{{ route('finalreport.releasedindoor') }}",
        columns: [
		
		 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
		 
		 
		
            
			
			
			{data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
			 {data: 'mobile', name: 'mobile'},
			
			  	  {data: 'cabine_name', name: 'cabine_name'},
				  	  {data: 'starting_date', name: 'starting_date'},
					  
				  
		
			
			
			{data: 'finaldue', name: 'finaldue'},
		
		
		    
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });







$('#calcul').delegate('#pathologydue_due_payment, #Pahermachy_due_payment,  #cabine_due_payment,  #service_due_payment, #surgery_due_payment, #doctor_due_payment','change',function(){

	var service = parseFloat($('#service_due_payment').val());
	var pathologydue_due_payment = parseFloat($('#pathologydue_due_payment').val());
	var Pahermachy_due_payment = parseFloat($('#Pahermachy_due_payment').val());
	var surgery_due_payment = parseFloat($('#surgery_due_payment').val());
	var doctor_due_payment = parseFloat($('#doctor_due_payment').val());
	var cabine_due_payment =  parseFloat($('#cabine_due_payment').val());
	
	var total =  service + pathologydue_due_payment + Pahermachy_due_payment + surgery_due_payment + doctor_due_payment+ cabine_due_payment;
	$('#amount').val(total);
	
	
});























 $('#create_record').click(function(){
  $('.modal-title').text("Add New Record");
     $('#action_button').val("Add");
     $('#action').val("Add");
     $('#formModal').modal('show');
 });



$('#sample_formk').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
   $.ajax({
    url:"{{ route('finalreport.store') }}",
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
    }
   })
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('finalreport.update') }}",
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
   url:"/finalreport/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.name);
	    $('#dena').val(html.data.dena);
	$('#due').val(html.data.due);
	
    $('#cabdue').val(html.total_seat_fair);
	
	var cabine =  parseFloat($('#cabdue').val());
	var due = parseFloat($('#due').val());
	var deposit =  parseFloat($('#dena').val());
	
	
	var summary = due + cabine - deposit;
	

 $('#totaldue').val(summary);	
	  $('#pathology_due').val(html.present_due_pathology);	
 $('#Pahermachy_due').val(html.present_due_medicine);
 $('#service_due').val(html.present_servie_due);
 $('#cabine_due').val(html.total_seat_fair);
 $('#surgery_due').val(html.present_durgery_due); 
  $('#doctor_due').val(html.present_due_doctor_visit);
   
	$('#hidden_id').val(html.data.id);
    $('.modal-title').text("Edit New Record");
    $('#action_button').val("Edit");
    $('#action').val("Edit");
    $('#formModal').modal('show');
	
	
	 $('.doctor').select2();
	    $("#doctor").html("");
		
	  
	  
	  
	  	  	  		var doctor = "<option  value='' ></option>"; 
						
					   $("#doctor").append(doctor);
				
					
					                    var len = 0;
                    if (html.doctor != null) {
                        len = html.doctor.length;
						
					
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = html.doctor[i].id;
                             var name = html.doctor[i].name;
						

                             var doctor = "<option     value='"+id+"'>"+name+"</option>"; 
							

                             $("#doctor").append(doctor);
                        }
                    }	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
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
   url:"patient/destroy/"+user_id,
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

 
 $(document).on('click', '#close', function(){
$('#formModal').modal('hide');

 });


});
</script>
	  


@stop