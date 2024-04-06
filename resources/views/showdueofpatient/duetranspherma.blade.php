

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
    <h1>Due Payment Transition </h1>

	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
	
			
			<th>No</th>
                <th>Name</th>
				<th>Mobile</th>
				<th>Amount</th>
				<th>Date</th>
				<th>Money Receipt</th>
			
		
				
				
				
			     
             
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
         <form method="post"  action="{{ route('duepaymenttrans.update') }}"  id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
		  

<div class="container">
  <div class="row">
  <div class="col-3">   
    Name:<input type="text" name="name" id="name" readonly class="form-control  register_form x"  placeholder="name" autocomplete="off" required />    
    </div>
    <div class="col-3">     
         Gross Amount:<input type="text" readonly name="amount" id="grossamount" class="form-control register_form x" placeholder="amount"  autocomplete="off" required />     
    </div>



    <div class="col-3">     
       Discount on Due :<input type="text" name="discount" id="discount" class="form-control register_form x" placeholder="discount"  autocomplete="off" required />     
    </div>




    <div class="col-3">     
       Receuveable Amount :<input type="text" name="receiveableamount" id="receiveableamount" class="form-control register_form x" placeholder="Receiveable Amount"  autocomplete="off" required />     
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





 <script src="{{asset('jquery/jquery.min.js')}}"></script>  
 <script src="{{asset('jquery_val/dist/jquery.validate.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
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
	
        ajax: "{{ route('duecolletionphermachy.duetransforphermachy') }}",
        columns: [
		
		 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
         {data: 'patient_name', name: 'patient_name'},
 {data: 'patient_mobile', name: 'patient_mobile'},
 {data: 'amount', name: 'amount'},
 {data: 'created', name: 'created'}, 
	 {data: 'pdf', name: 'pdf'}, 		
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
    url:"{{ route('duepaymenttrans.store') }}",
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
    url:"{{ route('duepaymenttrans.update') }}",
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
   url:"/duepaymenttrans/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.patient.name);
	  $('#grossamount').val(html.data.totalamount);
	  $('#discount').val(html.data.discountondue);	 
	  $('#receiveableamount').val(html.data.amount);	 

   
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
   url:"destroy/"+user_id,
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