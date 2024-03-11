

@extends('layout.main')

@section('content')




 
 






</head>

  
 






<body>


		<div  class="container" style="background-color:#EEE8AA; "  >
		
		
		<h2> Add Component Name </h2>
  <span id="form_result"></span>
	
		<form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
		   <input type="hidden" id="sellerid" name="sellerid" value="1">
		   
		   <div  id="cusid"  class="form-group">
            <label class="control-label col-md-4">Test Name : </label>
            <div class="col-md-8">
	        <select id="test_id"  class="form-control "  name="test_id"  required   style='width: 270px;'>  
           
			
			</select>
             </div>
			 </div>
			 
			 
			 <table class="table" id="products_table">
                <thead>
                    <tr>
				
                        <th>Component Name</th>
                        <th   >Normal Value :</th>
						<th   >Unit :</th>

                    </tr>
                </thead>
                <tbody class="addmoreproduct">
                    <tr id="product0">
                        <td>
 <input type="text" name="component_name[]" id="component_name" autocomplete="off" class="form-control component_name"   required />
                        </td>
                        <td>		                 
				 <input type="text" name="Normalvalue[]" id="Normalvalue" autocomplete="off" class="form-control" />         
                        </td>
						<td>
						 <input type="text" name="unit[]" id="unit" autocomplete="off" class="form-control" />
						</td>
						
						
							<td>
						
						<a class="remove"  style="font-size:30px; color:red;"  href="#">  ×</a> 
						
						</td> 					
			
						
                    </tr>
                    <tr id="product1"></tr>
                </tbody>
            </table>
			 
			 
			 
			 
			 
			 
			
		   <div id="child">
		   
		   </div>
		   <button type="button" id="add_row" class="btn btn-primary">ADD More Component</button>
		   
		   	
			

        
   
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" value="Add" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>

	</div>
			   <span id="form_result_footer"></span>  
<p>
<button type="button" id="refresh" class="btn btn-info">Refresh</button>
</div>	































<div class="container">
 

 
	


















	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
<th>No</th>
			
		<th>Test Name</th>			
	<th> Componeti Name</th>
             <th>Normal range of Value</th>
			 <th>Unit</th>
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
	
  $("#test_id").select2();

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
	
        ajax: "{{ route('pathologytestcomponent.index') }}",
	
        columns: [
		
		 
		 
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            
			{data: 'testname', name: 'testname'}, 
            {data: 'component_name', name: 'component_name'},
			 {data: 'Normalvalue', name: 'Normalvalue'},
			{data: 'unit', name: 'unit'},
			 
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
 
  
fetch();



function fetch()
{

 $.ajax({
   url:"pathologytestcomponent/mlist",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	   ////////////////////fetch data for Customer dropdown menu ////////////////////////////
	    $("#test_id").html("");
	   
var option = "<option value=''></option>";                   
  $("#test_id").append(option);

				   var len = 0;
                    if (response.reportlist != null) {
                        len = response.reportlist.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.reportlist[i].id;
                             var name = response.reportlist[i].name;
							  

                             var option = "<option value='"+id+"'>"+name+"</option>"; 
							  
							  
							 
                             $("#test_id").append(option);
						
					   }
                    }
					

			   }

  })
 		
}
























  
   
  /////////////////////////////////ADD Data //////////////////////////// 
   
   

$('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
  console.log("kk");
   $.ajax({
    url:"{{ route('pathologytestcomponent.store') }}",
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
	  fetch();
	  
	   $("#products_table tr:gt(1)").remove(); 
    }
   })
  
  
  
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('pathologytestcomponent.update') }}",
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
	 
	 
    }
   });
  }
 });
   
   $(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"/pathologytestcomponent/"+id+"/edit",
   dataType:"json",
   success:function(html){
	   
    $('#component_name').val(html.data.component_name);
    $('#Normalvalue').val(html.data.Normalvalue);
	 $('#unit').val(html.data.unit); 
	
	
	

	
	
		                
						
	                        
	
	

						
						


   
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
   url:"pathologytestcomponent/destroy/"+user_id,
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

   
   
   
   
   
 /////////////////////////////////////// Dynamically Add New row and Add New select2 for dynamically added new medicine name  ////////////////////////
 

  let row_number = 1;
    $("#add_row").click(function(e){
		
		
		      e.preventDefault();
      let new_row_number = row_number - 1;
	  
	  	   $latest_tr  = $('#product0');
   

	  
      $('#product' + row_number).html($('#product0' ).html()).find('td:first-child');
	  
	   

	  
      $('.addmoreproduct').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
     

 
     
    

 
    
	
	
	});
 
   
   
   
   
   
   
   
   
   
   
  
	 
	 
	 
/////////////////////////////////////// Remove row ////////////////////////


$('.addmoreproduct').delegate('.remove','click',function(){ 
var rowCount = $('table#products_table tr:last').index() + 1; // find out the length of the row 
console.log(rowCount);

 
 
   var rowindex = $(this).closest('tr').index();  // find out the index number of the row 
    
 if (rowindex > 0 )
 {
$(this).parent().parent().remove();
  totalamount();
 }

 });
	 
	 
	 

	 
	 






 
 $(document).on('click', '#close', function(){
$('#formModal').modal('hide');

 });


});
</script>
	  


@stop