

@extends('layout.main')

@section('content')




 
 






</head>

  
 






<body>
		<div style="background-color:#EEE8AA; " class="container">
		 <span id="form_result"></span>
		<form method="post" id="sample_form" action="{{ route('servicelist.store') }}" class="form-horizontal" enctype="multipart/form-data">
          @csrf
  <div class="row">
    <div class="col-4">
      Service Name: <input type="text" name="name" id="name" autocomplete="off" class="form-control " />
    </div>
    <div class="col-4">
     Charge: <input type="text" name="price" id="price" autocomplete="off" class="form-control numbers" />
    </div>
    <div class="col-4">
      <input type="radio" class="group1" id="day_wise" name="service_type" value="1">
  <label for="html"> Per Day wise </label>
  <input type="radio" class="group1" id="one_time" name="service_type" value="0">
  <label for="css">One TIme</label>

	</div>

	
  </div>
  

  
             <div class="form-group" align="center">
            <input type="hidden" name="action" value="Add" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
			<button type="button" id="refresh" class="btn btn-info">Refresh</button>
           </div>
         </form>
  
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
    <h1> অন্য সব সার্ভিস ও তার মূল্য তালিকা </h1>
  
	
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
<th>No</th>
			
	<th>Name</th>
            
		
			  <th> Service Charge </th>
 <th> Service type </th>
			    
				<th>Action</th>
    
				
				
			     
             
                
            </tr>
        </thead>
        <tbody   >

        </tbody>
    </table>
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
	
$('.numbers').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

$('#refresh').hide();

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

//////////////// Refresh button 

$(function(){
    $('#refresh').click(function() {
    $('#sample_form')[0].reset();
	$(".group1").attr('checked', false);
    
	$('#action_button').val("Add");
    $('#action').val("Add");
	$('#refresh').hide();
    });
});



///// clear modal data after close it 
$(".modal").on("hidden.bs.modal", function(){
    $("#category").html("");
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
	
        ajax: "{{ route('servicelist.index') }}",
	
        columns: [
		
		 
		 
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
		  {data: 'servicename', name: 'servicename'},
		  {data: 'price', name: 'price'},            
		  {data: 'type', name: 'type'},
 {data: 'action', name: 'action', orderable: false, searchable: false},			    
           
        ]
    });


   
   
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
  if($('#action').val() == 'Add')
  {
  
   $.ajax({
    url:"{{ route('servicelist.store') }}",
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
    url:"{{ route('servicelist.update') }}",
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
$('#form_result').delay(1500).fadeOut();

	       $('#sample_form')[0].reset();
		   	$(".group1").attr('checked', false);
		       $('#action_button').val("Add");
    $('#action').val("Add");
	$('#refresh').hide();
    }
   });
  }
 });
 


 
   $(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"/servicelist/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.servicename);
$('#price').val(html.data.price);

if (html.data.service_type == 0)
{
	$("#one_time").attr('checked', true);
	
}
if (html.data.service_type == 1)	
{
$("#day_wise").attr('checked', true);	
}
   
	$('#hidden_id').val(html.data.id);
    $('.modal-title').text("Edit New Record");
    $('#action_button').val("Edit");
    $('#action').val("Edit");
  $('#refresh').show();
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
   url:"surgerylist/destroy/"+user_id,
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