

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
    <h1>Doctors List</h1>
    <a style="float:right; margin-bottom:20px;" class="btn btn-success" href="javascript:void(0)" id="create_record"> Add New </a>
	
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
	
			
			<th>No</th>
        <th>Name</th>
				<th>Address</th>
				<th>Mobile</th>
				<th>Degrees</th>
				<th>Department</th>
				<th>Fees </th>
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
         <form method="post"  action="{{ route('doctorlist.update') }}"  id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
		  

<div class="container">
  <div class="row">
    <div class="col-4">
    Name:<input type="text" name="name" id="name" class="form-control  register_form x"  placeholder="name" autocomplete="off" required />    
    </div>
    <div class="col-4">     
        Mobile:<input type="text" name="mobile" id="mobile" class="form-control register_form x" placeholder="mobile"  autocomplete="off" required />     
    </div>
    <div class="col-4">
 Address:   <input type="text" name="address" id="address" class="form-control x" autocomplete="off" required />
    </div>
	
  </div>
  
    <div class="row">
 
 <div class="col-4">
  Workingplace<input type="text" name="workingplace" id="workingplace" class="form-control x" autocomplete="off" required />      
 </div>
 
 
	    <div class="col-4">
     Degree:<input type="text" name="Degrees" id="Degrees" class="form-control x" autocomplete="off" required />
    </div>

	 <div class="col-4">
 Department: <input type="text" name="Department" id="Department" class="form-control x" autocomplete="off" required />
   </div>
	
  </div>
  
  
    <div class="row">

 
    <div class="col-4">
 Fees :  
       <input type="text" name="first_visit_fees" id="first_visit_fees" class="form-control x" autocomplete="off" required />
   </div>

  </div>
  
  
     <div class="row">

    <div class="col-4">     
  Serial Number <input type="text" name="contact_address_for_serial" id="contact_address_for_serial"  class="form-control x" autocomplete="off"  />     
  </div>
    <div class="col-4">

	 Offday<input type="text" name="offday" id="offday"  class="form-control x" autocomplete="off"  />     
	 
   </div>
		    <div class="col-4">
Visiting Hours :<input type="text" name="visiting_hours" id="visiting_hours" class="form-control" autocomplete="off" required />       
    </div>
  </div> 
  
      <div class="row">

    <div class="col-6">     
       Chamber Address :  
      <textarea class="form-control" id="chamber_address" name="chamber_address" ></textarea> 
	  
  </div>
    <div class="col-6">
 Prescription Heading :        
  <textarea class="form-control" id="Prescription_heading" name="Prescription_heading" ></textarea>
  </div>

  </div>  
  
  
       <div class="row">

    <div class="col-6">  
 <span id="user_uploaded_imagehead"></span>	
     Prescription Headin Image : <span style="color:red;"> (Height: 1700 px ; width:300 px; size less than 500 KB )</span>
       <input type="file" name="headerimage" class="form-control" placeholder="image">
  </div>
    <div class="col-6">
	 <span id="user_uploaded_imagefoot"></span>
Prescription Footer Image : <span style="color:red;"> (Height: 1700 px ; width:260 px; size less than 500 KB )  </span>    
  <input type="file" name="footerimage" class="form-control" placeholder="image">
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
	   $('#user_uploaded_imagehead').html(""); 
   $('#user_uploaded_imagefoot').html(""); 
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
	
        ajax: "{{ route('doctorlist.index') }}",
        columns: [
		
		 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
           
			{data: 'name', name: 'name'},
          	{data: 'address', name: 'address'},
			{data: 'mobile', name: 'mobile'},
			{data: 'Degree', name: 'Degree'},
			{data: 'Department', name: 'Department'},
			
					
			
			{data: 'first_visit_fees', name: 'first_visit_fees'},
		
		
			
			    
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
    url:"{{ route('doctorlist.update') }}",
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
   url:"/doctorlist/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.name);
	  $('#Degrees').val(html.data.Degree);
	    $('#Department').val(html.data.Department);
		  $('#mobile').val(html.data.mobile);
		    $('#address').val(html.data.address);
			 $('#first_visit_fees').val(html.data.first_visit_fees);
	           $('#next_visit_fees').val(html.data.next_visit_fees);
$('#commission_pecentage').val(html.data.commission_pecentage);

$('#contact_address_for_serial').val(html.data.contact_address_for_serial);
$('#workingplace').val(html.data.workingplace);
$('#offday').val(html.data.offday);
$('#visiting_hours').val(html.data.visiting_hours);
$('#Prescription_heading').val(html.data.prescriptionheading);
$('#chamber_address').val(html.data.chamber_address);
   $('#user_uploaded_imagehead').html(html.imghead); 
   $('#user_uploaded_imagefoot').html(html.imagefoot); 

   
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