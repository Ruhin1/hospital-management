

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
    <h3  style="color:red;">
	
 Agent Commission  Transitions ID:

	</h3>
    <a style="float:right; margin-bottom:20px;" class="btn btn-success  create_record" href="javascript:void(0)" id="create_record"> Add New </a>
	
	
	<div class="table-responsive">
    <table id="patient_table"  class=" table   table-success table-striped data-tablem             ">
        <thead>
            <tr>
<th>No.</th>
<th>Agent Commission Trns ID</th>			
				<th> Agent Name.</th>
	<th> Patient Name.</th>
    
 <th> Receivable Amnt</th>	  
			 <th> Commission</th>
			 <th> Status</th>
			
			
				<th>Action</th>
				  <th>Commission For </th>
      <th>Print</th>
			 <th>Date</th>	
				
			     
             
                
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
         <form method="post"  action="{{ route('employeetransactioncon.store') }}"   id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
		  
<div class="row">
       
            <div class="col-6">
	   Agents List  :  
	<select id="employeelist"  class="form-control "  name="employeelist"  required   style='width: 270px;'>
  
   </select>
             </div>
			
	


			 		 

            <div class="col-6">
	       Patient ID : 
	<select id="patient"  class="form-control "  name="patient"  required   style='width: 270px;'>
  
   </select>
             </div>
         
            </div>
            
            <div class="row">


                <div class="col-6">
                   Bill:	  <input type="text" autocomplete="off" name="bill" id="bill" class="form-control" />
                         
                         </div>
		 
		 
		 
		 <div class="col-6">
	Comission Amount:	  <input type="text" autocomplete="off" name="salary" id="salary" class="form-control" />
		 
		 </div>
		 
		 
		 
		 
		 
</div>


<div class="row">

<div class="col-10">

<b style="color:green;">নিচের যে কোন একটি অপশন সিলেক্ট করেন </b>
<br><input type="radio"  name="transitiontype" value="1" required>
  <label for="html"> প্যাথলজি  কমিশন  </label> 

<input type="radio"  name="transitiontype" value="7" required>
  <label for="html"> সার্জন কমিশন   </label> 


<input type="radio"  name="transitiontype" value="8" required>
  <label for="html"> আল্ট্রাসোনোলজিস্ট কমিশন    </label>

<input type="radio"  name="transitiontype" value="9" required>
  <label for="html"> এক্সরে কমিশন   </label>

<input type="radio"  name="transitiontype" value="5" required>
  <label for="html"> রোগী রিলিস হওয়া বাবদ   </label><br>
  <input type="radio"  name="transitiontype" value="2" required>
  <label for="css"> আউটডোরে রোগী কমিশন  </label><br>	

</div>



<div class="col-2">

<b> কমিশন দেন  </b><br>
<input type="radio" id="commissionnogode" name="commissiontype" value="1"  required >
<label for="nogode"> নগদে   </label><br>
<input type="radio" id="commissionbakite" name="commissiontype" value="2"  required >
<label for="bakite"> বাকীতে  </label><br>

</div>

</div>









			 
				 		             <div class="form-group">
            <label style="color:green"  class="control-label col-md-4" >Comment: </label>
            <div class="col-md-8">
             <input type="text" name="comment" autocomplete="off" id="comment" class="form-control" />
            </div>
           </div>		 
			 
		


  
  

		   

			 
   
           <br />

		             <div class="form-group">
            <label class="control-label col-md-4" > Date: </label>
            <div class="col-md-8">
                <input type="date" id="datePicker" name="Date_of_Transition" class="form-control"    required />
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











<div id="agentcommModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" id="closecom" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_resultcom"></span>
         <form method="post"  action="{{ route('agenttransaction.paid') }}"   id="sample_formcom" class="form-horizontal" enctype="multipart/form-data">
          @csrf
		  			 		             <div class="form-group">
            <label style="color:green"  class="control-label col-md-4" >Agent Name : </label>
            <div class="col-md-8">
             <input type="text" name="name" id="agentname" class="form-control" />
            </div>
           </div>
		   
		   		  			 		             <div class="form-group">
            <label style="color:green"  class="control-label col-md-4" >Patient Name : </label>
            <div class="col-4">
             <input type="text" readonly  name="patientname" id="patientname" class="form-control" />
            </div>
			
		
			
			
	
			
           </div>
		   
		   
		   
 <input type="hidden" name="employeelist" id="agentnameid" class="form-control" />
	



			 		             <div class="form-group">
            <label style="color:green"  class="control-label col-md-4" >Commission: </label>
            <div class="col-md-8">
             <input type="text" autocomplete="off" name="salary" id="salarycom" class="form-control" />
            </div>
           </div>
		   
		   

		   
			 
				 		             <div class="form-group">
            <label style="color:green"  class="control-label col-md-4" >Comment: </label>
            <div class="col-md-8">
             <input type="text" autocomplete="off" name="comment" id="commentcom" class="form-control" />
            </div>
           </div>		 
			


			 		             <div class="form-group">
            <label class="control-label col-md-4" > Date: </label>
            <div class="col-md-8">
            <input type="date" id="datePicker" required name="Date_of_Transition" class="form-control" />
            </div>
           </div>	


<input type="hidden" name="commissiontype" value="1" class="form-control" />

		   
<input type="hidden" id="transitiontypeid" name="transitiontype" value="" class="form-control" />	


			
		
           <br />






		   
	
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="actionforcom" />
            <input type="hidden" value="5" name="hidden_id" id="hidden_idforcom" />
            <input type="submit" name="action_button" id="action_buttonforcom" class="btn btn-warning" value="Submit" />
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


 




<script type="text/javascript">


$(document).ready(function(){
	
	
	


		
            $('#patient_table thead tr').clone(true).appendTo( '#patient_table thead' );
            $('#patient_table thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                $(this).html( '<input style="width:100px;" type="text" placeholder=" Search '+title+'" />' );

                $( 'input', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                });
            });

	
	
	
	
	
	
	
	
	
	
	
  $("#patient").select2();   	
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
	



    var table = $('#patient_table').DataTable({
		
	
		
        processing: true,
        serverSide: true,
		responsive: true,

        ajax: "{{ route('agenttransaction.index') }}",
	
        columns: [
		
		 
		 		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},

             {data: 'id', name: 'id'}, 
			 {data: 'employee_name', name: 'agentdetail.name'},
			{data: 'patient_name', name: 'patient_name'},
			
        {data: 'receiveableamount', name: 'receiveableamount'}, 
			 {data: 'paidamount', name: 'paidamount'},
			 	
			 {data: 'paid_staus', name: 'paid_staus'},	
				
				
			
 {data: 'action', name: 'action', orderable: false, searchable: false},
 {data: 'transitino_type', name: 'transitino_type'}, 
		 {data: 'pdf', name: 'pdf'},	    
     {data: 'created_at', name: 'created_at'},      
        ]
    });


   
 function  fetch()
   {
	  $.ajax({
   url:"agenttransaction/dropdown_list",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	$("#employeelist").html("");
	
	$("#patient").html("");	
	var option = "<option ></option>"; 
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
					
					
						


	var option = "<option ></option>"; 
					   $("#patient").append(option);
	
	
                    var len = 0;
                    if (response.patient != null) {
                        len = response.patient.length;
                    }
                       
                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.patient[i].id;
                      var name = response.patient[i].name;

                             var option = "<option value='"+id+"'>"+id+"("+name+") </option>"; 
							

                             $("#patient").append(option);
                        }
                    }


        
					
					
					
					
					
					
					
					
                }
				
				
	//////////////////////////////////////////////////////////////////////////////
  })   
	   
	   
   }
   
   
   
   
   
   
   
   
   
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
   
  

$('#sample_formcom').on('submit', function(event){

  event.preventDefault();
  if($('#action_buttonforcom').val() == 'Submit')
  {

   $.ajax({
    url:"{{ route('agenttransaction.paid') }}",
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
      $('#sample_formcom')[0].reset();
      $('#patient_table').DataTable().ajax.reload();
	   fetch();
     }
	 
	 $('#form_resultcom').html(html);

$('#form_resultcom').fadeIn();
$('#form_resultcom').delay(1500).fadeOut();

	 
	 
	 

    }
   })
  
  
  
  }

 





 });

















  

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

$('#form_result').fadeIn();
$('#form_result').delay(1500).fadeOut();
   fetch();
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
	
	      $('#patient_table').DataTable().ajax.reload();
		   $('#ok_button').text('Delete');
   }
  })
 });

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 var user_id;

 $(document).on('click', '.paid', function(){
  user_id = $(this).attr('id');
  console.log(user_id);


	 
	 

	 
	 
  $.ajax({
   url:"agenttransaction/paidsenddata/"+user_id,
  dataType:"json",
   success:function(html)
   {
	      $('#hidden_idforcom').val(html.data.id); 
	    $('#agentname').val(html.data.agentdetail.name);   
	   
	   $('#patientname').val(html.patientname);
	   $('#patient').val(html.data.agentdetail.patient_id); 
	   
	   
	    $('#receiveableamount').val(html.receiveableamount);
	   
	     $('#agentnameid').val(html.data.agentdetail.id); 
		$('#comment').val(html.data.comment); 
		
		   	    
			
$('#transitiontypeid').val(html.data.transitiontype); 		
		
		
		
		
		
		
		
		
		$('#salarycom').val(html.data.paidamount); 		
		
	     $('#agentcommModal').modal('show');

   }
  })
 });







   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
  
	 
	 
	 
	 
	 
	 

	 
	 






 
 $(document).on('click', '#close', function(){
$('#formModal').modal('hide');

 });


});
</script>
	  


@stop