

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
    <h1>Avilable Pathological Test </h1>
    <a style="float:right; margin-bottom:20px;" class="btn btn-success  create_record" href="javascript:void(0)" id="create_record"> Add New </a>
	
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
<th>No</th>
			
				
	<th>Name</th>
             
			 <th> Unit Price</th>
       <th> Reagents </th>
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



<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" action="{{ route('reportlist.store') }}" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf


          <div class="form-group">
          <label class="control-label col-md-4">Reagent List  : </label>
          <div class="col-md-8"> 
          <select id="reagent_list"  class="form-control "  name="reagent_list[]"    multiple style='width: 270px;'>
          </select>
          </div>
          </div>








          <div class="form-group">
            <label class="control-label col-md-4" > Name : </label>
            <div class="col-md-8">
             <input type="text" name="name" id="name" autocomplete="off" class="form-control" />
            </div>
           </div>

		   
		    <div class="form-group">
            <label class="control-label col-md-4">Unit Price : </label>
            <div class="col-md-8">
             <input type="text" name="unitprice" id="unitprice" autocomplete="off" class="form-control" />
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
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default closedelete" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>





 




<script type="text/javascript">


$(document).ready(function(){
	
  $("#reagent_list").select2();

///// clear modal data after close it 
$(".modal").on("hidden.bs.modal", function(){
    $("#reagent_list").html("");
});
///////////////////////////////

fetch();

function fetch()
  {

    $("#reagent_list").html('');
  $.ajax({
   url:"reportlist/reagent/list",
   dataType:"json",
  
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }
                 var option = "<option value=''></option>"; 

                             $("#reagent_list").append(option);
                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.data[i].id;
                             var name = response.data[i].name;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 
							

                             $("#reagent_list").append(option);
                        }
                    }
                }
				
				
	//////////////////////////////////////////////////////////////////////////////
  })

  }	






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
	
        ajax: "{{ route('reportlist.index') }}",
	
        columns: [
		
		 
		 
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            
			 
            {data: 'name', name: 'name'},
			 
			 {data: 'unitprice', name: 'unitprice'},
       {data: 'related_reagents', name: 'related_reagents'}, 
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
       fetch();
				
				

 
 
 });
 
   
   
  /////////////////////////////////ADD Data //////////////////////////// 
   
   

$('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
  
   $.ajax({
    url:"{{ route('reportlist.store') }}",
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
	    
	  $('#form_result').delay(2000).fadeOut();
    fetch();
    }
   })
  
  
  
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('reportlist.update') }}",
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
	    
	  $('#form_result').delay(2000).fadeOut();
    fetch();
    }
   });
  }
 });
   
   $(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"/reportlist/"+id+"/edit",
   dataType:"json",
   success:function(html){
	   
    $('#name').val(html.data.name);
    $('#Normalvalue').val(html.data.Normalvalue);
	 $('#unitprice').val(html.data.unitprice);
   fetch();
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
   url:"reportlist/destroy/"+user_id,
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
       fetch();
   }
  })
 });

   
  
  $(document).on('click', '.closedelete', function(){
$('#confirmModal').modal('hide');

 });
 
 $(document).on('click', '#close', function(){
$('#formModal').modal('hide');

 });


});
</script>
	  


@stop