

@extends('layout.main')

@section('content')




 
 






</head>






<body>

<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
	<h2 style="color:green;"> মেডিসিন কোম্পানির তালিকা </h2>
    <h6 style="color:red;"> আপনার প্রতিষ্ঠানের সাথে লেনদেনে জড়িত মেডিসিন কোম্পানিগুলো লিস্ট নিচের টেবিলে দেয়া আছে । সেই সাথে তাদের কাছে আপনার পাওনা বা দেনার পরিমাণ ও লিস্টে দেয়া আছে। তালিকায় নতুন কোম্পানি যুক্ত করতে Add New বাটনে ক্লিক করেন।  </h6>
    <a style="float:right; margin-bottom:20px;" class="btn btn-success" href="javascript:void(0)" id="create_record"> Add New </a>
	
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
	
			
			<th>নং</th>
		
                <th> নাম</th>
				<th>এজেন্টের নাম </th>
				<th>মোবাইল নংঃ</th>
				<th>  কোম্পানির কাছে আপনার দেনার পরিমাণ   </th>
				
               
				
				
			     
             
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
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-4" > Name : </label>
            <div class="col-md-8">
             <input type="text" name="name" id="name" autocomplete="off" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Agent Nmae : </label>
            <div class="col-md-8">
             <input type="text" name="agent_name" id="agent_name" autocomplete="off" class="form-control" />
            </div>
           </div>
		   
		             <div class="form-group">
            <label class="control-label col-md-4">Mobile : </label>
            <div class="col-md-8">
             <input type="text" name="agent_mobile" id="agent_mobile"  autocomplete="off" class="form-control" />
            </div>
           </div>
		   
		   		             <div class="form-group">
            <label class="control-label col-md-4">Presen Due : </label>
            <div class="col-md-8">
             <input type="text" name="present_due" id="present_due"  autocomplete="off" class="form-control" />
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
                <button type="button" class="closedelete" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger ">OK</button>
                <button type="button" class="btn btn-default closedelete" data-dismiss="modal">Cancel</button>
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

$('#formModal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
})



     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	



    var table = $('#patient_table').DataTable({
		
	
		
        processing: true,
        serverSide: true,
		responsive: true,
	
        ajax: "{{ route('medicinecomapny.index') }}",
        columns: [
		
		 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
		 
		 
		
            
			
			
			
            {data: 'name', name: 'name'},
			 {data: 'agent_name', name: 'agent_name'},
			  {data: 'agent_mobile', name: 'agent_mobile'},
			  {data: 'due', name: 'due'},
			
			
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });


 $('#create_record').click(function(){
  $('.modal-title').text("Add New Record");
     $('#action_button').val("Add");
     $('#action').val("Add");
     $('#formModal').modal('show');
 });



$('#sample_form').on('submit', function(event){
  event.preventDefault();
  $('#action_button').attr("disabled", true);	
  if($('#action').val() == 'Add')
  {
   $.ajax({
    url:"{{ route('medicinecomapny.store') }}",
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
	   
	  $('#form_result').delay(3000).fadeOut();
    }
   })
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('medicinecomapny.update') }}",
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
	   $('#action_button').attr("disabled", false);	
     }
    $('#form_result').html(html);
	 
	  $('#form_result').fadeIn();
	   
	  $('#form_result').delay(3000).fadeOut();
    }
   });
  }
 });
 
 
 
 $(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"/medicinecomapny/edit/"+id,
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.name);
    $('#agent_name').val(html.data.agent_name);
	  $('#agent_mobile').val(html.data.agent_mobile);
	  $('#present_due').val(html.data.due); 
	 
   
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
   url:"medicinecomapny/delete/"+user_id,
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


  $(document).on('click', '.closedelete', function(){
$('#confirmModal').modal('hide');

 });


});
</script>
	  


@stop