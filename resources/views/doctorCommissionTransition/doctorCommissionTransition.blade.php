

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
    <h6  style="color:red;">বিভিন্ন ডাক্তারদের দেয়া কমিশনের ট্রাঞ্জিশন। এখানে তারিখসহ  ট্রাঞ্জিশন দেখতে পাবেন যে কত তারিখে কোন ডাক্তারদের কত কমিশন দিয়েছেন। নতুন করে কাওকে কমিশন দিতে ডান দিকের Add New বাটনে ক্লিক করেন।  </h6>
    <a style="float:right; margin-bottom:20px;" class="btn btn-success  create_record" href="javascript:void(0)" id="create_record"> Add New </a>
	
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
<th>No</th>
			
				<th> Dr. Name.</th>
				 <th> Patient </th>
	 <th> Receiveable Amount</th>
           
			 <th> Commission</th>
			
			  
			  <th>Commission For </th> 
			  
			
			
			 <th>Print</th>
			
				<th>Action</th>
    
				  <th> Status </th>
				 <th> Comment</th>
			 <th> type</th>
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
         <form method="post" action="{{ route('doctorcommission.store') }}"    id="sample_form" class="form-horizontal  sample_form_for_doctorappointment" enctype="multipart/form-data">
          @csrf

	<div class="form-group">
    <label class="control-label col-md-4">নাম   : </label>
    <div class="col-md-8">
   <select id="doctor_id"  class="form-control doctor_id"  name="doctor_id"  required   style='width: 270px;'>
    </select>
   </div>
   </div>
   
	<div class="form-group">
    <label class="control-label col-md-4">বিভাগ  : </label>
    <div class="col-md-8">
	<input type="text"   name="department" id="department" class="form-control  department" required readonly />
	</div>
	</div>
<b style="color:green;">নিচের যে কোন একটি অপশন সিলেক্ট করেন </b>
<br><input type="radio"  name="transitiontype" value="1" required>
  <label for="html"> প্যাথলজি  কমিশন  </label> 

<input type="radio"  name="transitiontype" value="7" required>
  <label for="html"> সার্জন ফিস   </label> 
<input type="radio"  name="transitiontype" value="6" required>
  <label for="html"> এনাস্থালিয়জিস্ট ফিস   </label>

<input type="radio"  name="transitiontype" value="8" required>
  <label for="html"> আল্ট্রাসোনোলজিস্ট ফিস    </label>

<input type="radio"  name="transitiontype" value="9" required>
  <label for="html"> এক্সরে ফিস   </label>

<input type="radio"  name="transitiontype" value="10" required>
  <label for="html"> ইকো ফিস   </label>



<input type="radio"  name="transitiontype" value="5" required>
  <label for="html"> রোগী রিলিস হওয়া বাবদ   </label><br>
  <input type="radio"  name="transitiontype" value="2" required>
  <label for="css"> আউটডোরে রোগী দেখা বাবদ   </label><br>	




<b style="color:green;"> প্রদান করছেন  </b>
<br><input type="radio"  name="prodankorchen" value="1" required>
  <label for="html"> নগদে  </label>
  <input type="radio"  name="prodankorchen" value="2" required>
  <label for="css"> বাকীতে  </label><br>	



	 
<div class="row">
    <div class="col-4">
        বিলের পরিমাণ :
       <input type="text"  autocomplete="off" name="bill" id="bill" class="form-control amount" required  />
       </div>


    <div class="col-4">
	 কমিশনের পরিমাণ :
	<input type="text"  autocomplete="off" name="amount" id="amount" class="form-control amount" required  />
	</div>
	
	
	
	


	
	
	
	
	
	
	
	
	
	
	   <div class="col-4">
প্যাশেন্ট আইডি :	


   <select id="patient"  class="form-control patient"  name="patient"  required   style='width: 270px;'>
    </select>
	
	
	</div>
	</div>
	

	 <b style="color:red; ">    একটা নোট লিখে রাখতে পারেন। তাহলে পরবর্তীতে বুঝতে সুভিধা হবে । </b> <span style="color:green;"> আপনি চাইলে এই ফিল্ড এড়িয়ে যেতে পারেন। </span>
    <div class="form-group">
    <label class="control-label col-md-4">নোট : </label>
    <div class="col-md-8">
	<input type="text" autocomplete="off"   name="comment" id="comment" class="form-control  comment"  />
	</div>
	</div>
	
	
	
		             <div class="form-group">
            <label class="control-label col-md-4" > Date: </label>
            <div class="col-md-8">
            <input type="datetime-local" id="datePicker" name="Date_of_Transition" class="form-control" value="{{date('Y/m/d H:i:s')}}" />
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































<div id="doctorpaidmodel" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" id="closecom" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_resultcom"></span>
         <form method="post"  action="{{ route('doctorcommission.paidfordoctor') }}"   id="doctorpaidform" class="form-horizontal" enctype="multipart/form-data">
          @csrf
		  			 		             <div class="form-group">
            <label style="color:green"  class="control-label col-md-4" >Doctor Name : </label>
            <div class="col-md-8">
             <input type="text" name="name" id="doctorname" class="form-control" />
            </div>
           </div>
		   
		   

             <input type="hidden" name="doctor_id" id="doctorid" class="form-control" />
         
    








		   <div class="form-group">
            <label style="color:green"  class="control-label col-md-4" >Patient Name : </label>
            <div class="col-4">
             <input type="text" readonly  name="patientname" id="patientname" class="form-control" />
            </div>
			

			
           </div>
		   
		   
		   
 <input type="hidden" name="nameid" id="agentnameid" class="form-control" />
			 
			



			<div class="form-group">
            <label style="color:green"  class="control-label col-md-4" >Commission: </label>
            <div class="col-md-8">
             <input type="text" autocomplete="off" name="salary" id="salarycom" class="form-control" />
            </div>
           </div>
		   
		   

		   
			 
				 		             <div class="form-group">
            <label style="color:green"  class="control-label col-md-4" >Comment: </label>
            <div class="col-md-8">
             <input type="text" name="comment" autocomplete="off"  id="commentcom" class="form-control" />
            </div>
           </div>		 
			 
			 
			 
			 
			 		             <div class="form-group">
            <label class="control-label col-md-4" > Date: </label>
            <div class="col-md-8">
            <input type="datetime-local" id="datePicker" name="Date_of_Transition" class="form-control" />
            </div>
           </div>	
		
           <br />




<input type="hidden" name="prodankorchen" value="1" class="form-control" />

		   
<input type="hidden" id="transitiontypeid" name="transitiontype" value="" class="form-control" />	
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
                $(this).html( '<input style="width:80px;" type="text" placeholder=" Search '+title+'" />' );

                $( 'input', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                });
            });	
	
	
	
	
	
	
	
	
	
  $("#doctor_id").select2();   
  $("#patient").select2(); 

///// clear modal data after close it 
$('#formModal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
})


 $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

        var allFields = document.querySelectorAll(".form-control");

        for (var i = 0; i < allFields.length; i++) {

            allFields[i].addEventListener("keyup", function(event) {

                if (  (event.keyCode === 13) || (event.keyCode === 40) ) {
                    console.log('Enter clicked')
                    event.preventDefault();
                    if (this.parentElement.nextElementSibling.querySelector('input')) {
                        this.parentElement.nextElementSibling.querySelector('input').focus();
                    }
                }
				
				
				                if (event.keyCode === 38) {
                    
                    event.preventDefault();
                    if (this.parentElement.previousElementSibling.querySelector('input')) {
                        this.parentElement.previousElementSibling.querySelector('input').focus();
                    }
                }
				
            });

        }


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
	
        ajax: "{{ route('doctorcommission.index') }}",
	
        columns: [
		
		 
		 
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            
			 {data: 'doctor_name', name: 'doctor.name'},
			 {data: 'patient_name', name: 'patient_name'},
			 {data: 'receiveablecollection', name: 'receiveablecollection'},    
          
			 {data: 'amount', name: 'amount'},   
			 
			
			 
			{data: 'transitino_type', name: 'transitino_type'}, 
			 
			
			 

				  {data: 'pdf', name: 'pdf'},
			 	
			 
 {data: 'action', name: 'action', orderable: false, searchable: false},
   {data: 'paid_staus', name: 'paid_staus'},   
				  {data: 'comment', name: 'comment'},
			    {data: 'transitino_type', name: 'transitino_type'},		    
           {data: 'created_at', name: 'created_at'},
        ]
    });


   
   
   
   
   
   
   
     
 
   
    

   
   
 




$('#doctorpaidform').on('submit', function(event){

console.log("KKK");
  event.preventDefault();
  if($('#action_buttonforcom').val() == 'Submit')
  {

   $.ajax({
    url:"{{ route('doctorcommission.paidfordoctor') }}",
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
      $('#doctorpaidform')[0].reset();
      $('#patient_table').DataTable().ajax.reload();
	   
	   
	   
		 $('#form_resultcom').html(html);

$('#form_resultcom').fadeIn();
$('#form_resultcom').delay(1500).fadeOut();   
	   
	   
	   
	   
	   
	   
	   
     }
	 


	 
	 
	 

    }
   })
  
  
  
  }

 





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
 
 function fetch()
 {
  $.ajax({
   url:"doctortransition/dropdown_list",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	$("#patient").html("");
	$("#doctor_id").html("");
	

					
						var optionfordoctor = "<option >select one</option>"; 
					   $("#doctor_id").append(optionfordoctor);
					
					
					
					                    var len = 0;
                    if (response.doctor != null) {
                        len = response.doctor.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.doctor[i].id;
                             var name = response.doctor[i].name;
							 var Department = response.doctor[i].Department;
							

                             var optionfordoctor = "<option  data-Department='"+Department+"'    value='"+id+"'>"+name+"</option>"; 
							

                             $("#doctor_id").append(optionfordoctor);
                        }
                    }
	







						var patient = "<option ></option>"; 
					   $("#patient").append(patient);
					
					
					
					                    var len = 0;
                    if (response.patientdata != null) {
                        len = response.patientdata.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.patientdata[i].id;
                             var name = response.patientdata[i].name;
							

                             var patient = "<option     value='"+id+"'>"+id+"("+name+")</option>"; 
							

                             $("#patient").append(patient);
                        }
                    }
















	

					
                }
				
				
	//////////////////////////////////////////////////////////////////////////////
  })	 
	 
 }
 
  ///////////////////////////////// insert value related to the Doctor dynamically  /////////////////////

$('.sample_form_for_doctorappointment').delegate('.doctor_id','change',function(){
	
	var Department = $('.doctor_id option:selected').attr("data-Department");
	
	
	
	$('#department').val(Department);
	

});
 
   
   
  /////////////////////////////////ADD Data //////////////////////////// 
   
   

$('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
  
   $.ajax({
    url:"{{ route('doctorcommission.store') }}",
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
  fetch();
    }
   })
  
  
  
  }

 });
   

 
 
 
 var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"doctorcommission/delete/"+user_id,
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
   url:"doctorcommission/paidsenddata/"+user_id,
  dataType:"json",
   success:function(html)
   {
	      $('#hidden_idforcom').val(html.data.id); 
	    $('#doctorname').val(html.data.doctor.name);   
	   	    $('#doctorid').val(html.data.doctor.id); 
			
$('#transitiontypeid').val(html.data.transitiontype); 			
			
			
			
			
			
			
			
			
	   $('#patientname').val(html.patientname );
	    $('#receiveableamount').val(html.receiveablecollection);
	   
	     $('#agentnameid').val(html.data.doctor.id); 
		$('#comment').val(html.data.comment); 
		
		$('#salarycom').val(html.data.amount); 		
		
	     $('#doctorpaidmodel').modal('show');

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