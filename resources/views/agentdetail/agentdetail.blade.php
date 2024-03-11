

@extends('layout.main')

@section('content')




 
 






</head>






<body>

<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
    <h1>Agent List</h1>
    <a style="float:right; margin-bottom:20px;" class="btn btn-success" href="javascript:void(0)" id="create_record"> Add New </a>
	
	
	

	
	
	
	
	
	
	
	
	
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
	
			<th>No.</th>
			<th>Agent ID</th>
                <th>Name</th>
				<th>Commission Rate(%) </th>
				<th>Balance</th>
				<th>Mobile</th>
				<th>Address</th>
				<th>Date</th>
				
				
			     
             
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
             <input type="text" name="name" id="name" autocomplete="off" class="form-control" required />
            </div>
           </div>
		   
		   
		   
		             <div class="form-group">
            <label class="control-label col-md-4" > Mobile : </label>
            <div class="col-md-8">
             <input type="text" name="mobile" id="mobile" autocomplete="off" class="form-control" required />
            </div>
           </div>
		   
		             <div class="form-group">
            <label class="control-label col-md-4" > Address: </label>
            <div class="col-md-8">
             <input type="text" name="address" id="address" autocomplete="off" class="form-control" required />
            </div>
           </div>
		   
		   		             <div class="form-group">
            <label class="control-label col-md-4" > Commission Rate(%) (যদি সরাসরি কমিশন ইনপুট না দিতে চান তবে 0 বসান) </label>
            <div class="col-md-8">
 
  <input type="text" name="commission_pecentage" id="commission_pecentage" autocomplete="off"  min="0" max="100"  class="form-control" autocomplete="off"  />      
 
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
	


////////////// mover cursor by enterbutton

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
	
        ajax: "{{ route('agentlist.index') }}",
        columns: [
		
		 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id', name: 'id'},
			{data: 'name', name: 'name'},
          	{data: 'commission_pecentage', name: 'commission_pecentage'},
			{data: 'hospitaler_kache_pawna', name: 'hospitaler_kache_pawna'},
			{data: 'mobile', name: 'mobile'},
			{data: 'address', name: 'address'},  
		{data: 'created_at', name: 'created_at'},
			
			    
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
  if($('#action').val() == 'Add')
  {
   $.ajax({
    url:"{{ route('agentlist.store') }}",
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
	   
	  $('#form_result').delay(3000).fadeOut();
    }
   })
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('agentlist.update') }}",
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
   url:"/agentlist/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.name);
	 
		  $('#mobile').val(html.data.mobile);
		    $('#address').val(html.data.address);
					    $('#commission_pecentage').val(html.data.commission_pecentage);

   
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
   url:"agentlist/destroy/"+user_id,
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