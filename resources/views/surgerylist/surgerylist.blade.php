

@extends('layout.main')

@section('content')




 
 






</head>

  
 






<body>
		<div style="background-color:#EEE8AA; " class="container">
		 <span id="form_result"></span>
		<form method="post" id="sample_form" action="{{ route('surgerylist.store') }}" class="form-horizontal" enctype="multipart/form-data">
          @csrf
  <div class="row">
    <div class="col-3">
      Surgery Name: <input type="text" name="name" id="name" autocomplete="off" class="form-control " />
    </div>
    <div class="col-3">
      pre operative charge: <input type="text" name="pre_operative_charge" id="pre_operative_charge" autocomplete="off" class="form-control numbers" />
    </div>
    <div class="col-3">
    Surgeon Charge <input type="text" name="Surgeon_charge" id="Surgeon_charge" autocomplete="off" class="form-control numbers" />
    </div>
	   <div class="col-3">
    Anesthesia Charge <input type="text" name="anesthesia_charge" id="anesthesia_charge" autocomplete="off" class="form-control numbers" />
    </div>
	
  </div>
  
    <div class="row">
    <div class="col-2">
      Assistant Charge: <input type="text" name="assistant_charge" id="assistant_charge" autocomplete="off" class="form-control numbers" />
    </div>
    <div class="col-2">
      	OT Charge: <input type="text" name="ot_charge" id="ot_charge" autocomplete="off" class="form-control numbers" />
    </div>
    <div class="col-2">
    Oxyzen Charge <input type="text" name="o2_no2_charge" id="o2_no2_charge" autocomplete="off" class="form-control numbers" />
    </div>
	   <div class="col-2">
   C Arme Charge <input type="text" name="c_arme_charge" id="c_arme_charge" autocomplete="off" class="form-control numbers" />
    </div>
	
		   <div class="col-4">
  Post Operative Charge <input type="text" name="post_operative_charge" id="post_operative_charge" autocomplete="off" class="form-control numbers" />
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
    <h1>হাসপাতালে হওয়া অপরেশনের তালিকা </h1>
  
	
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
<th>No</th>
			
	<th>Name</th>
            
			 <th> pre operative charge</th>
			  <th> Surgeon Charge </th>
			  <th> Anesthesia Charge</th>
			   <th> Anesthesia Charge </th>
			    
				 <th> OT Charge</th>
				  <th>  Oxyzen Charge</th>
				   <th>  C Arme Charge</th>
				   <th>  Post Operative Charge</th>
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
	
        ajax: "{{ route('surgerylist.index') }}",
	
        columns: [
		
		 
		 
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            

            {data: 'name', name: 'name'},
            {data: 'pre_operative_charge', name: 'pre_operative_charge'},
            {data: 'Surgeon_charge', name: 'Surgeon_charge'},
            {data: 'anesthesia_charge', name: 'anesthesia_charge'},
            {data: 'assistant_charge', name: 'assistant_charge'},
            {data: 'ot_charge', name: 'ot_charge'},
            {data: 'o2_no2_charge', name: 'o2_no2_charge'},	
            {data: 'c_arme_charge', name: 'c_arme_charge'},	
            {data: 'post_operative_charge', name: 'post_operative_charge'},				
			
			 
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
    url:"{{ route('surgerylist.store') }}",
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
    url:"{{ route('surgerylist.update') }}",
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
   url:"/surgerylist/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.name);
$('#name').val(html.data.name);
$('#pre_operative_charge').val(html.data.pre_operative_charge);
$('#Surgeon_charge').val(html.data.Surgeon_charge);
$('#anesthesia_charge').val(html.data.anesthesia_charge);
$('#assistant_charge').val(html.data.assistant_charge); 
$('#ot_charge').val(html.data.ot_charge);
$('#o2_no2_charge').val(html.data.o2_no2_charge);
$('#c_arme_charge').val(html.data.c_arme_charge);  
$('#post_operative_charge').val(html.data.post_operative_charge	); 	
	

   
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