

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
    <h6 style="color:red;"> Medicine Comapny Duepayment Transitions ID:  </h6>
  
	<h2 style="color:green;">মেডিসিন কোম্পানির তালিকা </h2>
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
	
			
			<th>No</th>
		
                <th>নাম</th> 

				<th> মেডিসিন কোম্পানির আপনার দেনার পরিমাণ </th>
				<th> মেডিসিন কোম্পানির পাওনার পরিমাণ</th>
              
				
				
			     
             
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



<div id="formModal" class="modal fade"
 role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" action="{{ route('medcinercompanydenapawanshod.transition') }}" class="form-horizontal pawnaordenashod " enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-4" > কোম্পানির নাম  : </label>
            <div class="col-md-8">
             <input type="text" name="name" id="name" class="form-control numbers" readonly />
            </div>
           </div>
		   
		             <div class="form-group">
            <label class="control-label col-md-4" > দেনার পরিমাণ  : </label>
            <div class="col-md-8">
             <input type="text" name="due" autocomplete="off" id="companydue" class="form-control numbers" readonly />
            </div>
           </div>
		   
		   		             <div class="form-group">
            <label class="control-label col-md-4" > পাওনার  পরিমাণ  : </label>
            <div class="col-md-8">
             <input type="text" name="advance" autocomplete="off" id="companyadvance" class="form-control numbers" readonly />
            </div>
           </div>
		   
		   
           
		   <b style="color:green;">নিচের যে কোন একটি অপশন সিলেক্ট করেন </b>
<br><input type="radio"  name="transitiontype" value="1" required>
  <label for="html">বাকি নগদ টাকা দিয়ে শোধ করেন </label><br>
  <input type="radio"  name="transitiontype" value="2" required>
  <label for="css"> পাওনার বিপরীতে নগদ টাকা ( পণ্য নয় )  বুঝে পেয়েছেন ।  </label><br>
		   
		   <div class="form-group">
            <label class="control-label col-md-4">amount : </label>
            <div class="col-md-8">
             <input type="text" name="amount" id="amount" class="form-control numbers" />
            </div>
           </div>
		   
		 <b style="color:red; ">কি বাবদ বাকি শোধ করছেন বা কি বাবদ এডভান্স বুঝে পেয়েছেন তার একটা নোট লিখে রাখতে পারেন। তাহলে পরবর্তীতে বুঝতে সুভিধা হবে । </b>  
		   <div class="form-group"> 
            <label class="control-label col-md-4"> নোট লিখুন  : </label>
            <div class="col-md-8">
             <input type="text" name="comment" id="comment" class="form-control" />
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

 
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });



	/////// replace non decimal number
$('.numbers').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

$('.pawnaordenashod').delegate('#amount ' ,   'change',function(){
var amount = $("#amount").val();
var due =  $("#companydue").val();
var advance = $("#companyadvance").val();

if (advance > 0 )
{
if (amount > advance )
{
alert("ভুল ইনপুট  দিয়েছেন । দয়া করে সঠিক ইনপুট দেন। ");	
$("#amount").val(0);
}}

if (due > 0 )
{
if (amount > due )
{
alert("ভুল ইনপুট  দিয়েছেন । দয়া করে সঠিক ইনপুট দেন। ");	
$("#amount").val(0);
}}


if ((due == 0 ) && (advance == 0 ))
{
if (amount > 0 )
{
alert("ভুল ইনপুট  দিয়েছেন । দয়া করে সঠিক ইনপুট দেন। ");	
$("#amount").val(0);
}}



	});

    var table = $('#patient_table').DataTable({
		
	
		
        processing: true,
        serverSide: true,
		responsive: true,
	
        ajax: "{{ route('medcinercompanydenapawanshod.index') }}",
        columns: [
		
		 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
		 
		 
		
            
			
			
			
            {data: 'name', name: 'name'},

			 {data: 'due', name: 'due'},
			 {data: 'advance', name: 'advance'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });





























 $('#create_record').click(function(){
  $('.modal-title').text("Add New Record");
     $('#action_button').val("Add");
     $('#action').val("Add");
	 
	     $('#mobile_div').show();
	$('#address_div').show();
	  
	$('#age').show();
    $('#sex').show();  
   
   
    $('#transitiontype_div').hide(); 
	$('#amount_div').hide();
	 
	 
     $('#formModal').modal('show');
 });



$('#sample_form').on('submit', function(event){
  event.preventDefault();

 	$('#action_button').attr("disabled", true);	
 
    if($('#action').val() == "due_advance")
  {
   $.ajax({
    url:"{{ route('medcinercompanydenapawanshod.transition') }}",
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
	  	$('#action_button').attr("disabled", false);	
     }
     $('#form_result').html(html);
    }
   });
  }
 
 
 
 
 
 
 
 });
 

 
 
 
 
 
 
 
 
 
 
 
 
 $(document).on('click', '.due_or_advance', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"medcinercompanydenapawanshod/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.name);
	$('#companydue').val(html.data.due);
	$('#companyadvance').val(html.data.advance);
   
   
   
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
   url:"supplier/destroy/"+user_id,
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
		///////// modal will not close by clicking outside
	$('#formModal').modal({backdrop: 'static', keyboard: false});

});
</script>
	  


@stop