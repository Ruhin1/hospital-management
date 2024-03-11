

@extends('layout.main')

@section('content')




 
 






</head>






<body>

<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
    <h1>কেবিন/ সিট বরাদ্দ করেন </h1>
    <a style="float:right; margin-bottom:20px;" class="btn btn-success" href="javascript:void(0)" id="create_record"> Add New </a>
	
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
	
			<th>Patient ID</th>
		
                <th>Name</th>
				
				<th>Mobile No</th>
				<th>Cabine No</th>
				<th>Cabine ID</th>
				<th>Admission date </th>

                <th width="300px">Action</th>
            </tr>
        </thead>
        <tbody   >
		@foreach ($admittedcabine as $admit)
		  <tr    >
		  <td>{{$admit->patient_id}}</td>
    <td>{{$admit->patient->name}} </td>
    <td>{{$admit->patient->mobile }}</td>
    <td>{{$admit->cabinelist->serial_no}}</td>
	<td>{{$admit->cabinelist->id}}</td>
	<td>{{$admit->starting}}</td>

	

	<td>
<a href="{{ url('relesepatientdeatilsindividual/' )  }}/{{ $admit->id}} "  > 	<button   id="{{$admit->id}}"    class=" edit btn btn-primary" >Edit Role </button></a>
	<a href="{{ url('showuserlist/destroy/' )  }}/{{ $admit->id}} "  > <button   class="btn btn-danger" >   Delete  </button></td> </a> 
  </tr>
@endforeach
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
         <form method="post" id="sample_form" action="{{ route('showuserlist.update') }}" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-4" > Name : </label>
            <div class="col-md-8">
             <input type="text" name="name" id="name" class="form-control" />
            </div>
           </div>
		   
		             <div class="form-group">
            <label class="control-label col-md-4" > Email: </label>
            <div class="col-md-8">
             <input type="text" name="email" id="email" class="form-control" />
            </div>
           </div>
		   
		   
		             <div class="form-group">
            
            <div class="col-md-8">
   Select Gender:<br>

  <label>
    <input type="radio" name="role" value="1" required>
    Admin
  </label><br>

  <label>
    <input type="radio" name="role" value="3">
    Phermacy Section
  </label><br>

  <label>
    <input type="radio" name="role" value="4">
  Account Section
  </label><br>  
			
	  <label>
    <input type="radio" name="role" value="2">
 None
  </label><br> 		
			</div>
           </div>
		   
		   
		             <div class="form-group">
            <label class="control-label col-md-4" > Mobile : </label>
            <div class="col-md-8">
             <input type="text" name="mobile" id="mobile" class="form-control" />
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
	

	












 








 $('#create_record').click(function(){
  $('.modal-title').text("Add New Record");
     $('#action_button').val("Add");
     $('#action').val("Add");
     $('#formModal').modal('show');
 });



$('form eid o add korar jonno').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
   $.ajax({
    url:"{{ route('employeelist.store') }}",
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
    url:"{{ route('showuserlist.update') }}",
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
   url:"/showuserlist/"+id+"/edit",
   dataType:"json",
   success:function(html){

    $('#name').val(html.data.name);
	
	    $('#email').val(html.data.email);
		  $('#mobile').val(html.data.mobile);
		    $('#address').val(html.data.address);

   
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
   url:"employeelist/destroy/"+user_id,
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