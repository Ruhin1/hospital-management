

@extends('layout.main')

@section('content')





 <style>
        thead input {
           width: 100%;
        }
    </style>
  </head>
  <body>
    <div class="container=fluid p-3">
		
	 <a style="float:right; margin-bottom:20px;" class="btn btn-success  create_record" href="javascript:void(0)" id="create_record"> Add New </a>	        
        <h4 class="text-center"> Datatable Column Filter </h4>
        <table class="table table-bordered  table-responsive" id="mytable">
            <thead>
                 <th>  Id</th>
				 <th>  Patient ID</th>
				  <th>  Patient Name</th>
				  <th>Type</th>
				   <th> Buying service amount </th>
               <th> Discount </th>
			    <th> Receiveable Amnt. </th>
				 <th> Commission Amnt. </th>
				  <th> Action </th>
            </thead>
            <tbody>
                @foreach($agentrans as $a)
                <tr>
                    <td>{{$a->id}}</td>
					 
					 
					 <td><?php if($a->patient ) { ?>{{$a->patient->id}}  <?php } ?></td>
                 
				
				 <td><?php if($a->patient) { ?>{{$a->patient->name}}  <?php } ?></td>	
				   
				   
				   
	<?php 	if ($a->transitiontype == 1)
					{ ?>
						
					<td>Pathology Commission </td>
				<?php 	}
					
					elseif ($a->transitiontype == 3)
					{ ?>
					
				<td>surgery Commission </td>	
				<?php 	}
					elseif ($a->transitiontype == 4)
					{ ?>
						
				<td>cabine fair Commission </td>		
					<?php }
					elseif ($a->transitiontype == 5)
					{ ?>
							<td>Patient relased Commission </td>
				
				<?php 	}
					else
					{ ?>
						
				<td>Not Applicable </td>	
				<?php 	}		?>   
				   

				   <td>{{$a->amount}}</td>
				<td>{{$a->discount}}</td>
				<td>{{$a->receiveableamount}}</td>
				<td>{{$a->paidamount}}</td>
				<td>
				
			
		<button type="button" name="delete" id="{{$a->id}}" class="delete btn btn-danger btn-sm">Delete</button>
		&nbsp;
		<button type="button" name="paid" id="{{$a->id}}" class="paid btn btn-info btn-sm">Paid</button>
       </td>
			   </tr>
                @endforeach
            </tbody>
        </table>
		
		
		
		
		
		<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post"  action="{{ route('employeetransactioncon.store') }}"   id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
		  
		  <div class="form-group"> <b style="color:red"> (এই লিস্ট কোন এজেন্টের নাম খুজে না পেলে আপনি , খরচের খাতে ক্লিক করুন। সেখানে থাকা এজেন্ট লিস্টে গিয়ে তার নাম এজেন্ট তালিকায় যুক্ত করে নেন। ) </b><br>
            <label style="color:green" class="control-label col-md-4">Agents List  :   </label>
            <div class="col-md-8">
	
	<select id="employeelist"  class="form-control "  name="employeelist"  required   style='width: 270px;'>
  
   </select>
             </div>
			 </div>
			 
			 		             <div class="form-group">
            <label style="color:green"  class="control-label col-md-4" >Commission : </label>
            <div class="col-md-8">
             <input type="text" name="salary" id="salary" class="form-control" />
            </div>
           </div>
			 
				 		             <div class="form-group">
            <label style="color:green"  class="control-label col-md-4" >Comment: </label>
            <div class="col-md-8">
             <input type="text" name="comment" id="comment" class="form-control" />
            </div>
           </div>		 
			 
		
<b> কমিশন দেন  </b><br>
<input type="radio" id="commissionnogode" name="commissiontype" value="1"  required >
<label for="nogode"> নগদে   </label><br>
<input type="radio" id="commissionbakite" name="commissiontype" value="2"  required >
<label for="bakite"> বাকীতে  </label><br>

  
  

		   

			 
   
           <br />

		             <div class="form-group">
            <label class="control-label col-md-4" > Date: </label>
            <div class="col-md-8">
            <input type="date" id="datePicker" name="Date_of_Transition" class="form-control" />
            </div>
           </div>	




		   
	
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


<div id="paidmodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Do You want to Pay the Commission?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button_paid" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>




<script type="text/javascript">


$(document).ready(function(){
	
  $("#employeelist").select2();   
 $("#cabine_list").select2();   

///// clear modal data after close it 
$(".modal").on("hidden.bs.modal", function(){
    $("#employeelist").html("");
});
///////////////////////////////


     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	

            $('#mytable thead tr').clone(true).appendTo( '#mytable thead' );
            $('#mytable thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder=" Search '+title+'" />' );

                $( 'input', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                });
            });

            var table = $('#mytable').DataTable( {
                orderCellsTop: true,
                fixedHeader: true
            });


   
   
  ///////// show the modal//////////////////////////////////////////////////////////////////////////////// 
    $(document).on('click', '.create_record', function(){
		  $('#form_result').html('');
    $('.modal-title').text("Add New Record");
     $('#action_button').val("Add");
     $('#action').val("Add");
       $('#formModal').modal('show');
  $.ajax({
   url:"agenttransaction/dropdown_list",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	$("#employeelist").html("");
	
	
	var option = "<option >select one</option>"; 
					   $("#employeelist").append(option);
	
	
                    var len = 0;
                    if (response.employeedetails != null) {
                        len = response.employeedetails.length;
                    }
                       
                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.employeedetails[i].id;
                             var name = response.employeedetails[i].name;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 
							

                             $("#employeelist").append(option);
                        }
                    }
					
					
						

        
					
					
					
					
					
					
					
					
                }
				
				
	//////////////////////////////////////////////////////////////////////////////
  })
 
 
 });
 
   
   
  /////////////////////////////////ADD Data //////////////////////////// 
   
   

$('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
  
   $.ajax({
    url:"{{ route('agenttransaction.store') }}",
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
    url:"{{ route('agenttransaction.update') }}",
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
   url:"/agenttransaction/"+id+"/edit",
   dataType:"json",
   success:function(html){
	   
	   
	   
   
	   $('#salary').val(html.data.paidamount);

	
	var len = html.employeedetails.length;
	console.log(len);
	var presentemployeedetails_id = html.data.employeedetails_id;

	
	
		                        for (var i = 0; i<len; i++) {
								
								if ( presentemployeedetails_id == html.employeedetails[i].id  ) 
								{
									var id = html.employeedetails[i].id;
                             var name = html.employeedetails[i].name;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 

                             $("#employeelist").append(option);
								}
                             
                        }
						
						
							                        for (var i = 0; i<len; i++) {
								
								if ( presentemployeedetails_id != html.employeedetails[i].id  ) 
								{
									var id = html.employeedetails[i].id;
                             var name = html.employeedetails[i].name; 

                             var option = "<option value='"+id+"'>"+name+"</option>"; 

                             $("#employeelist").append(option);
								}
                             
                        }
						
				
	
	                        
	
	

						
						


   
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
   url:"agenttransaction/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#user_table').DataTable().ajax.reload();
    }, 2000);
	
	      $('#mytable').DataTable().ajax.reload();
		   $('#ok_button').text('Delete');
   }
  })
 });

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 var user_id;

 $(document).on('click', '.paid', function(){
  user_id = $(this).attr('id');
  $('#paidmodal').modal('show');
 });

 $('#ok_button_paid').click(function(){
  $.ajax({
   url:"agenttransaction/paid/"+user_id,
   beforeSend:function(){
    $('#ok_button_paid').text('Paying...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#paidmodal').modal('hide');
     $('#user_table').DataTable().ajax.reload();
    }, 2000);
	
	      $('#patient_table').DataTable().ajax.reload();
		   $('#ok_button_paid').text('Paid');
   }
  })
 });







   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
  
	 
	 
	 
	 
	 
	 

	 
	 






 
 $(document).on('click', '#close', function(){
$('#formModal').modal('hide');

 });


});
</script>
 



	  


@stop