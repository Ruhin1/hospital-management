

@extends('layout.main')

@section('content')




 <style>
.modal-lg {
    max-width: 90% !important;

}


</style>
 






</head>

  
 






<body>



<div class="container" style="background-color:#EEE8AA; "          >

 
           <form method="post"  action="{{ route('medcinercompanydenapawanshod.transition') }}"   id="sample_form" class="form-horizontal  sample_form" enctype="multipart/form-data">
          @csrf
		   <div class="row">
    <div class="col-4">
পণ্য/সেবা/খরচের নাম  :	 <select id="company"  class="form-control company"  name="company"  required   style='width: 270px;'>
    </select>
    </div>


	
	
	    <div class="col-4">
কোম্পানির কাছে বাকির পরিমাণ     : 	<input type="text" readonly  autocomplete="off"  name="dena" id="dena" class="form-control  dena"   />
    </div>
	
	
		    <div class="col-4">
এডভান্সের দেয়া থাকলে  তার পরিমাণ  : 	<input type="text" readonly  autocomplete="off"  name="advance" id="advance" class="form-control  advance"   />
    </div>
	
	
	  </div>
	  
			   <div class="row">
	
	    <div class="col-6">
<input type="radio" required  name="transitiontype" value="1">
<label for="html"> কোম্পানিকে টাকা দিচ্ছেন </label><br>
<br><input type="radio" required  name="transitiontype" value="2">
<label for="css">কোম্পানিকে দেয়া এডভান্সের বিপরীতে পণ্য বুঝে পেয়েছেন </label><br>
</div>

	
	
	    <div class="col-3">
টাকার পরিমাণ     : 	<input type="text"  autocomplete="off"  name="amount" id="amount" class="form-control  amount" required  />
    </div>
	
	
		    <div class="col-3">
কমেন্ট    : 	<input type="text"  autocomplete="off"  name="comment" id="comment" class="form-control  comment"   />
    </div>
	
	
	  </div>  
	  
	  
	  
	  
	  
	  
	  
	  
	
<div class="row">

<div class="col-3">
Date:  <input type="datetime-local"  required id="datePicker" name="Date_of_Transition" class="form-control" />
</div>	
 </div>
<p> 
	  
	  
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action"    value="Add"  />
            <input type="hidden" name="hidden_id" id="hidden_id" />
			 <span id="form_resultfooter"></span>
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>	
	
	
	

</div>
















<input type="hidden" id="balance" name="balance" value="{{$balance->balance}}">
<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
    <h6 style="color:red;"> 
	
	
কোম্পানির বাকি পরিষোধ করেন/ এডভান্স বুঝে পেলে তা ইনলিস্ট করেন 
	
	</h6>
  
	
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
<th>নং </th>
		
			
			<th> কোম্পানি  </th>
			<th> এন্ট্রি বাই   </th>
			
			
			<th>  টাকার পরিমান   </th>
			
			<th> ট্রাঞ্জিশনের প্রকৃতি   </th>
			
			<th> কমেন্ট    </th>			
			<th>  তারিখ  </th>
			
			<th>Action </th>
				
			
				
    
				
				
			     
             
                
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
	
	
	Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});
$('#datePicker').val(new Date().toDateInputValue());
	
  $("#company").select2();   
 $("#supplier").select2();   
 
 


///////////////////////////////







////////////////////////////////////////////////////// 



   













     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	



    var table = $('#patient_table').DataTable({
		
	
		
        processing: true,
        serverSide: true,
		responsive: true,
	
        ajax: "{{ route('medcinercompanydenapawanshod.index') }}",
	
        columns: [
		
		 
		 
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
	
			
			   
			   {data: 'company', name: 'company'},
			
              {data: 'entryby', name: 'entryby'},
			   
			  
			 
			  {data: 'amount', name: 'amount'},
			 
			  {data: 'transitiontype', name: 'transitiontype'},
			
			  {data: 'comment', name: 'comment'},			
		
           {data: 'created_at', name: 'created_at'},
	
			   {data: 'action', name: 'action', orderable: false, searchable: false},

 

			    
           
        ]
    });


   fetchdata();
   

 
 function fetchdata(){
  	 
	   $.ajax({
   url:"medcinercompanydenapawanshod/dropdown_list",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
 	 $("#company").html("");  
	$("#supplier").html("");   
	
	
	
	var company = "<option  value='' >select one</option>"; 
					   $("#company").append(company);
	
	
                    var len = 0;
                    if (response.medicinecomapnyname != null) {
                        len = response.medicinecomapnyname.length;
                    }
                       
                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.medicinecomapnyname[i].id;
                             var name = response.medicinecomapnyname[i].name;
							var due = response.medicinecomapnyname[i].due;
	var advance = response.medicinecomapnyname[i].advance;
                             var company = "<option  data-advance ='"+advance+"'  data-due ='"+due+"'  value='"+id+"'>"+name+"</option>"; 
							

                             $("#company").append(company);
                        }
                    }
					
					
 

 }	//////////////////////////////////////////////////////////////////////////////
  })
 
 }
 
 
 
 

$('.form-horizontal').delegate('.company','change',function(){
	
	
var due =	$('#company option:selected').attr("data-due");

var advance =	$('#company option:selected').attr("data-advance");
	
	
$('#dena').val(due);
$('#advance').val(advance);











});















	









 
 
 

 


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
   
   
  /////////////////////////////////ADD Data //////////////////////////// 
   
   

$('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
  
   $.ajax({
    url:"{{ route('medcinercompanydenapawanshod.transition') }}",
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
		 
	$('#sample_form')[0].reset();
      $('#patient_table').DataTable().ajax.reload();
	  fetchdata();
	  
	       html = '<div class="alert alert-success">' + data.success + '</div>';

	
      $('#patient_table').DataTable().ajax.reload();
 $('#datePicker').val(new Date().toDateInputValue());
     }
     $('#form_result').html(html);
	  $('#form_resultfooter').html(html);
	 	$("#form_result").show().delay(5000).fadeOut();
			$("#form_resultfooter").show().delay(5000).fadeOut();
	 
    }
   })
  
  
  
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('khorochtransition.update') }}",
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
	   $('#datePicker').val(new Date().toDateInputValue());
     }
     $('#form_result').html(html);
	  $('#form_resultfooter').html(html);
	 	$("#form_result").show().delay(5000).fadeOut();
			$("#form_resultfooter").show().delay(5000).fadeOut();
	      $('#action').val("Add");
		   $('#action_button').val("Add");  
		  
	 	     $("#khorocer_khad").select2();   
 $("#supplier").select2(); 
       fetchdata();
	
    }
   });
  }
 });
   
   $(document).on('click', '.edit', function(){
	  
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"/khorochtransition/"+id+"/edit",
   dataType:"json",
   success:function(html){
	   
	 	 $("#khorocer_khad").html("");  
	$("#supplier").html("");   
	   
	
	var len = html.khorocer_khad.length;
	console.log(len);
	var presentkhoroc = html.khoroch_transition.khorocer_khad_id;

	
	
		                        for (var i = 0; i<len; i++) {
								
								if ( presentkhoroc == html.khorocer_khad[i].id  ) 
								{
									var id = html.khorocer_khad[i].id;
                             var name = html.khorocer_khad[i].name;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 

                             $("#khorocer_khad").append(option);
								}
                             
                        }
						
						
							                        for (var i = 0; i<len; i++) {
								
								if ( presentkhoroc != html.khorocer_khad[i].id ) 
								{
			                 var id = html.khorocer_khad[i].id;
                             var name = html.khorocer_khad[i].name;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 

                             $("#khorocer_khad").append(option);
								}
                             
                        }
						
				


		/////////////////////////  fetch for patientlist 				
		
						var len = html.supplier.length;
	
	var presentsupplier = html.khoroch_transition.supplier_id;

	
	
		                        for (var i = 0; i<len; i++) {
								console.log('A' );
								if ( presentsupplier == html.supplier[i].id  ) 
								{
									var id = html.supplier[i].id;
                             var name = html.supplier[i].name;

                             var optionforsupplier = "<option value='"+id+"'>"+name+"</option>"; 
                              console.log(option);
                             $("#supplier").append(optionforsupplier);
								}
                             
                        }
						
						
							                        for (var i = 0; i<len; i++) {
								
								if ( presentsupplier != html.supplier[i].id  ) 
								{
									var id = html.supplier[i].id;
                             var name = html.supplier[i].name;

                             var optionforsupplier = "<option value='"+id+"'>"+name+"</option>"; 

                             $("#supplier").append(optionforsupplier);
								}
                             
                        }
	                        
	
	




$('#unit').val(html.khoroch_transition.unit);						
$('#unit_price').val(html.khoroch_transition.unit_price);						
$('#amount').val(html.khoroch_transition.amount);						
$('#due').val(html.khoroch_transition.due);												
$('#datePicker').val(html.khoroch_transition.created_at);	

   
	$('#hidden_id').val(html.khoroch_transition.id);
    $('.modal-title').text("Edit New Record");
    $('#action_button').val("Edit");
    $('#action').val("Edit");
   
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
   url:"medcinercompanydenapawanshod/destroy/"+user_id,
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
	     $("#khorocer_khad").select2();   
 $("#supplier").select2(); 
       fetchdata(); 	 
   }

  })
 });

   
   
   



   
   
   
   
   
   
   
   
   
   
   
   
   
  
	 
	 
	 
	 
	 
	 

	 
	 






 
 $(document).on('click', '#close', function(){
$('#formModal').modal('hide');

 });


});
</script>
	  


@stop