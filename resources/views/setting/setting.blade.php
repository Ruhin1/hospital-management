

@extends('layout.main')

@section('content')


<style>
.modal-lg {
    max-width: 80% !important;

}

</style>

 
 






</head>






<body>

<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
    <h1>Settings</h1>
  

	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
	
			
			<th>No</th>
        <th>Name</th>
				<th>Address</th>
				<th>Mobile</th>
        <th>Logo</th>
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
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post"  action="{{ route('setting.update') }}"  id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf

<div class="container">
  <div class="row">
    <div class="col-4">
    Name:<input type="text" name="name" id="name" class="form-control  register_form x"  placeholder="name" autocomplete="off" required />    
    </div>
    <div class="col-4">     
        Mobile:<input type="text" name="mobile" id="mobile" class="form-control register_form x" placeholder="mobile"  autocomplete="off" required />     
    </div>
  </div>
  

  
      <div class="row">
        <div class="col-6">
          Address, Reg No & Other details :        
           <textarea class="form-control" id="address" name="address" ></textarea>
           </div>

        <div class="col-6">  
          <span id="logo">  </span>	
              logo: <span style="color:red;"> (Height: 1700 px ; width:300 px; size less than 500 KB )</span>
                <input type="file" name="logo" class="form-control" placeholder="image">
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





 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">


$(document).ready(function(){

$('#formModal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
	   $('#logo').html(""); 
})



     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	
$(document).ready(function() {
   $(window).keydown(function(event) {
      if (event.target.tagName != 'TEXTAREA') {
         if (event.keyCode == 13) {
            event.preventDefault();
            return false;
         }
      }
   });
});

 

$('#formModal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
})




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
	
        ajax: "{{ route('setting') }}",
        columns: [
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},   
			{data: 'name', name: 'name'},
      {data: 'address', name: 'address'},
			{data: 'mobile', name: 'mobile'},		
      {data: 'logo', name: 'logo'},	    
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
    url:"{{ route('doctorlist.store') }}",
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
	  $('#form_resultfooter').html(html);
	  $('#form_result').fadeIn();
	    $('#form_resultfooter').fadeIn();
	  $('#form_result').delay(3000).fadeOut();
	  $('#form_resultfooter').delay(3000).fadeOut();
    }
   })
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('setting.update') }}",
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
    }
   });
  }
 });
 
 
 
 $(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"/setting/edit/"+id,
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.name);  
		  $('#mobile').val(html.data.mobile);
		    $('#address').val(html.data.address);			
$('#logo').html(html.logo);
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
   url:"doctorlist/destroy/"+user_id,
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