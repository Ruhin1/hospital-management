

@extends('layout.main')

@section('content')




 
 






</head>






<body>

<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
    <h6  style="color:red;">বিভিন্ন পার্টনারের উত্তেলিত টাকার পরিমাণের   ট্রাঞ্জিশন। এখানে তারিখসহ  ট্রাঞ্জিশন দেখতে পাবেন যে কত তারিখে কোন পার্টনার  কত টাকা ব্যাবসা থেকে তুলেছে/উত্তেলিত করেছে  নতুন করে টাকা উত্তেলনের জন্য  দিতে দিকের Add New বাটনে ক্লিক করেন।  </h6>
    <a style="float:right; margin-bottom:20px;" class="btn btn-success  create_record" href="javascript:void(0)" id="create_record"> Add New </a>
	
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
<th>নং </th>
			
<th> পার্টনারের নাম   </th>
	
           
<th>  টাকার পরিমাণ </th>
<th> ট্রাঞ্জিশনের প্রকৃতি  </th>
<th>মন্তব্য  </th>
<th>তারিখ </th>
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
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" action="{{ route('takauttolon.store') }}" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
		  <div class="form-group"> <br>
            <label style="color:green" class="control-label col-md-4"> পার্টনারের নাম  :   </label>
            <div class="col-md-8">
	
	<select id="partner_name"  class="form-control "  name="partner_name"  required   style='width: 270px;'>
  
   </select>
             </div>
			 </div>
           
		   <b style="color:green;">নিচের যে কোন একটি অপশন সিলেক্ট করেন </b>
<br><input type="radio"  name="transitiontype" value="1" required>
  <label for="html">টাকা তুলছেন / উত্তোলন করছেন  </label><br>
  <input type="radio"  name="transitiontype" value="2" required>
  <label for="css">টাকা জমা দিচ্ছেন </label><br>
		   
		   <div class="form-group">
            <label class="control-label col-md-4">টাকার পরিমাণ  : </label>
            <div class="col-md-8">
             <input type="text" name="amount" id="amount" class="form-control" />
            </div>
           </div>
		   
		 <b style="color:red; "> একটা নোট লিখে রাখতে পারেন। তাহলে পরবর্তীতে বুঝতে সুভিধা হবে । </b>  
		   <div class="form-group"> 
            <label class="control-label col-md-4"> নোট লিখুন  : </label>
            <div class="col-md-8">
             <input type="text" name="comment" id="comment" class="form-control" />
            </div>
           </div>
		   

           <div class="form-group">
            <label class="control-label col-md-4">Date : </label>
            <div class="col-md-8">
                <input  type="datetime-local" id="dataentry" name="dataentry" required>
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





 <script src="{{asset('jquery/jquery.min.js')}}"></script>  
 <script src="{{asset('jquery_val/dist/jquery.validate.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">


$(document).ready(function(){

$('#formModal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
})



 $("#partner_name").select2();   





     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	



    var table = $('#patient_table').DataTable({
		
	
		
        processing: true,
        serverSide: true,
		responsive: true,
	
        ajax: "{{ route('takauttolon.index') }}",
        columns: [
		
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            
			 {data: 'partner_name', name: 'sharepartner.name'},
			
			 
          
			 {data: 'amount', name: 'amount'},
			  {data: 'transitino_type', name: 'transitino_type'},
			  {data: 'comment', name: 'comment'},
			 	{data: 'created_at', name: 'created_at'},
			 
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
  $.ajax({
   url:"takauttolon/dropdown_list",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	$("#partner_name").html("");
	
	
	var option = "<option >select one</option>"; 
					   $("#partner_name").append(option);
	
	
                    var len = 0;
                    if (response.sharepartner != null) {
                        len = response.sharepartner.length;
                    }
                       
                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.sharepartner[i].id;
                             var name = response.sharepartner[i].name;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 
							

                             $("#partner_name").append(option);
                        }
                    }
	
                }
				
				
	//////////////////////////////////////////////////////////////////////////////
  })
 
 
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
    url:"{{ route('takauttolon.store') }}",
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


 });
 
 
 
 
 
 
 
 
 
 
 
 $(document).on('click', '.due_or_advance', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"/supplier/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.name);
   
   
   
    $('#transitiontype_div').show(); 
	$('#amount_div').show(); 
	$('#hidden_id').val(html.data.id);
    $('.modal-title').text("ধার শোধ করেন অথবা এডভান্স বুঝে পেলে সেই এন্ট্রি করেন ");
    $('#action_button').val("Submit");
    $('#action').val("due_advance");
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
   url:"takauttolon/destroy/"+user_id,
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