

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

 
           <form method="post"  action="{{ route('supplier_due_advance_pay_or_get.store') }}"   id="sample_form" class="form-horizontal  sample_form" enctype="multipart/form-data">
          @csrf
		   <div class="row">

    <div class="col-3">
Supplier Name  :  <select id="supplier"   class="form-control supplier"  name="supplier"  required   style='width: 270px;'>
    </select>
    </div>
	
	    <div class="col-3">
   Supplier Due    : 	<input type="text" readonly  value=""  autocomplete="off"   id="supplier_due" class="form-control amount" required  />
    </div>
	
	
	
    <div class="col-3">
     Amount    : 	<input type="text" value="0"  autocomplete="off"  name="amount" id="amount" class="form-control amount" required  />
    </div>
	
	
	    <div class="col-3">
Comment    : 	<input type="text"  autocomplete="off"  name="comment" id="comment" class="form-control  comment"   />
    </div>
	  </div>
	
<div class="row">












<div class="col-3">
Date:  <input type="date"  required id="datePicker" name="Date_of_Transition" class="form-control" />
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














<h3>Supplier Due Payment Transition </h3>

<input type="hidden" id="balance" name="balance" value="{{$balance->balance}}">
<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >

  
	
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
<th>নং </th>
		
			
			<th> সাপ্লাইয়ারের নাম  </th>
			
			
			
			<th>  টাকার পরিমান   </th>
			<th> ট্রাঞ্জিশনের প্রকৃতি    </th>
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
	
  $("#khorocer_khad").select2();   
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
	
        ajax: "{{ route('supplier_due_advance_pay_or_get.index') }}",
	
        columns: [
		
		 
		 
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
	
			
			   
			   {data: 'supplier_name', name: 'supplier_name'},
			  {data: 'amount', name: 'dhar_shod_trans.amount'},

			 {data: 'type', name: 'type'}, 
			 
			 
		
           {data: 'created', name: 'created'},
	
			   {data: 'action', name: 'action', orderable: false, searchable: false},

 

			    
           
        ]
    });


   fetchdata();
   



/////////////////////////////// fill the value for selected patient ...............

$('.form-horizontal').delegate('.supplier','change',function(){
var due = $('.supplier option:selected').attr("data-due");   
     


$('#supplier_due').val(due);






});


















 
 function fetchdata(){
	 
	   $.ajax({
   url:"dropdown_list",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
 	 $("#khorocer_khad").html("");  
	$("#supplier").html("");   
	
	
	
						var optionforsupplier = "<option >select one</option>"; 
					   $("#supplier").append(optionforsupplier);
					
					
					
					                    var len = 0;
                    if (response.supplier != null) {
                        len = response.supplier.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.supplier[i].id;
                             var name = response.supplier[i].name;
						var due = response.supplier[i].due;

                             var optionforsupplier = "<option    data-due='"+due+"'    value='"+id+"'>"+name+"</option>"; 
							

                             $("#supplier").append(optionforsupplier);
                        }
                    } 
					
					


 }	//////////////////////////////////////////////////////////////////////////////
  })
 
 }
 
 
 
 
















	









 
 
 

 


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
   
   
  /////////////////////////////////ADD Data //////////////////////////// 
   
   

$('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
  
   $.ajax({
    url:"{{ route('supplier_due_advance_pay_or_get.store') }}",
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
    url:"{{ route('supplier_due_advance_pay_or_get.update') }}",
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
   url:"delete/"+user_id,
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