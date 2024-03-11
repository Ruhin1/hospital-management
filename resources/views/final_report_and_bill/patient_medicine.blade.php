

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
    <h2> ইনডোর প্যাশেন্ট থেকে বকেয়া আদায়    </h2>
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
         
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" action="{{ route('duecollection_inddor.update') }}" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-4" > রোগির নাম  : </label>
            <div class="col-md-8">
             <input type="text" name="name" id="name" class="form-control" readonly />
            </div>
           </div>
		   
		   
		   
		   
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
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
  <input type="radio"  name="transitiontype" value="1" required >
  <label for="pawna"> টাকা নিচ্ছেন </label>
  <input type="radio"  name="transitiontype" value="3"  required >
  <label for="dena">টাকা ফেরত দিচ্ছেন  </label><br>


	  <input type="radio"  name="transitiontype" value="6"  required >
  <label for="dena"> এডজাস্ট করুন ( প্রকৃত পক্ষে কোন লেনদেন হয় না )  </label><br>
		  

	
		   
		   
				   <div class="row">
		   
		   <div class="col-3">
		   
		   Phermachy Due: <input type="text" readonly name="Pahermachy_due" id="Pahermachy_due" class="form-control" />
		   
		   </div>
		   
		   		   <div class="col-3">
		   
		   Due Payment: <input type="text" autocomplete="off" value="0" name="Pahermachy_due_payment" id="Pahermachy_due_payment" class="form-control" />
		   
		   </div>
		   
		   
		 		   		   <div class="col-3">
		   
		   Concession: <input type="text" autocomplete="off" value="0" name="Pahermachy_concession" id="Pahermachy_concession" class="form-control" />
		   
		   </div>  
		   
		   
		 		   		   <div class="col-3">
		   
		  Refund: <input type="text" autocomplete="off" value="0" name="Pahermachy_refund" id="Pahermachy_refund" class="form-control" />
		   
		   </div> 		 


		 
		   
		   </div>   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   





	



















	






			   <div class="row">
		   
		   <div class="col-3">
		   
	 Comment : <input type="text"  name="phermachy_comment" id="phermachy_comment" class="form-control" />
		   
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
	
        ajax: "{{ route('duecollection_inddor.index') }}",
        columns: [
		
		 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
		 
		 
		
            
			
			
			{data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
			 {data: 'mobile', name: 'mobile'},
			
			  	  {data: 'cabine_name', name: 'cabine_name'},
				  	  {data: 'starting_date', name: 'starting_date'},
					  
				  
		
			

			
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });







$('#calcul').delegate('#Pahermachy_due_payment','change',function(){


	var Pahermachy_due_payment = parseFloat($('#Pahermachy_due_payment').val());

	
	var total =  Pahermachy_due_payment;
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
   url:"/duecollection_inddor/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.name);
    
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