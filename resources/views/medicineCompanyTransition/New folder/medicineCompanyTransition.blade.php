

@extends('layout.main')

@section('content')



<style>
.modal-lg {
    max-width: 80% !important;

}

</style>
 
 






</head>

  
 






<body>





 <div class="container" style="background-color:#EEE8AA;">
 <h4 style="color:red;"> মেডিসিন ক্রয় করুন অথবা ক্রয় করা মেডিসিন কোম্পানির কাছে ফেরত দেন । </h4> <br>
<span id="form_result"></span>


         <form method="post" id="sample_form" action="{{ route('medicinecomapnytransition.store') }}" class="form-horizontal buyorreturnproduct" enctype="multipart/form-data">
          @csrf
<input type="radio" id="purchase" name="transitiontype" value="1" required >
<label for="purchase"> ক্রয়  করুন</label><br>
<input type="radio" id="return" name="transitiontype" value="2" required >
<label for="return"> ফেরত দেন </label><br>
			 
	<div id="form_body">		
		<b style="background-color:#00FF00"> ( আপনি যে এককে মেডিসিন বিক্রি করবেন সেই এককে মেডিসিন  কিনবেন। যদি আপনি পিস হিসাবে মেডিসিন বিক্রি করেন তবে মেডিসিন ক্রয়ের সময়েও পিস হিসাবে কিনবেন ও সেই হিসাবে <span style="color:red"> প্রতি এককের মূল্য </span>  ঘরে প্রতি পিস মেডিসিনের কেনা দাম লিখবেন। যদি আপনি প্রতি পাতা হিসাবে বিক্রি করেন তবে ক্রয়ের সময়ে,  <span style="color:red"> প্রতি এককের মূল্য </span> ঘরে প্রতি পাতার দাম লিখবে। যদি আপনি প্যাকেট হিসাবে বিক্রি করেন তবে ক্রয়ের সময়ে  <span style="color:red"> প্রতি এককের মূল্য </span> ঘরে প্রতি প্যাকেট এর দাম লিখবে।  অন্যথায় স্টক সঠিক ভাবে মেইন্টেইন্স হবে না )  </b>	 
	  <div class="row">
    <div class="col-6">

	মেডিসিনের নাম  :	<select id="medicine_id"  class="form-control medicine_id"  name="medicine_id" placeholder="Select One"  style="width:100%;" required >
   </select>

    </div>
    <div class="col-6">
		 কোম্পানির নাম   :	<select id="medicinecomapnyname_id"  class="form-control medicinecomapnyname_id" placeholder="Select One" name="medicinecomapnyname_id"  style="width:100%;" required   >
   </select>  
    </div>

  </div>		 
			 
			 
			 
			 
			 
			 
  <div class="row">
    <div class="col-4">

	 পরিমান  : <input type="text" name="Quantity" id="Quantity" autocomplete="off" class="form-control numbers Quantity" required />

    </div>
    <div class="col-4">
		 একক  :    <input type="text" name="ekok" id="ekok" autocomplete="off" class="form-control" />    
    </div>
    <div class="col-4">
		প্রতি এককের মূল্য  ৳  :  <input type="text" name="unit_price" autocomplete="off" id="unit_price" class="form-control numbers unit_price" required />   

    </div>
  </div>
   
  
    <div class="row">
	    <div class="col-4">
		মোট ক্রয় করা পণ্যের মূল্য ৳  :  <input type="text" name="amount" autocomplete="off" id="amount"  class="form-control numbers amount" readonly />

    </div>
	
	 
	 <div id="nogod" class="col-4">
		নগদের ক্রয় ৳   : <input type="text" name="pay_in_cash" autocomplete="off" id="pay_in_cash"  class="form-control numbers pay_in_cash" required /> 
    </div>
	
    
	<div id="baki" class="col-4">

	বাকিতে ক্রয়  ৳ :   <input type="text" name="due" id="due" autocomplete="off"  class="form-control numbers"  readonly />

    </div>


  </div>
  
      <div class="row">
    <div class="col-12">

	মন্তব্য   :    <input type="text" name="comment"  autocomplete="off" id="comment" class="form-control" />

    </div>

  </div>
  
  
  


   
           <br />
		   
	
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning btn_submit" value="Add" />
           </div>
		   </div>
         </form>
  <span id="form_resultfooter"></span>
</div>
<br>
<br>






<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
   

	<h3 style="color:green;"> Medicine Comapny Medicine buying Transitions ID  </h3>
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
<th>No</th>
			<th> ID </th>
				<th>মেডিসিনের নাম </th>
	<th>কোম্পানির নাম </th>
		<th>ট্রাঞ্জিশনের প্রকৃতি  </th>
             <th>পরিমাণ </th>
			 <th> একক </th>
			 
			 <th> প্রতি একক মূল্য ৳ </th>
			 <th> মোট ক্রয় / ক্রয় ফেরত ৳  </th>
			 <th> বাকিতে ক্রয় ৳ </th>
			 <th> নগদে ক্রয় /  ৳ </th>
		
			  <th> মন্তব্য  </th>
			  <th>তারিখ</th>
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



<!--
 <div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" action="{{ route('medicinecomapnytransition.store') }}" class="form-horizontal" enctype="multipart/form-data">
          @csrf

			 
			 <div class="container">
			 
	  <div class="row">
    <div class="col-6">

	মেডিসিনের নাম  :	<select id="medicine_id"  class="form-control medicine_id"  name="medicine_id"  required style="width:100%;"  >
   </select>

    </div>
    <div class="col-6">
		 কোম্পানির নাম   :	<select id="medicinecomapnyname_id"  class="form-control medicinecomapnyname_id"  name="medicinecomapnyname_id"  style="width:100%;" required   >
   </select>  
    </div>

  </div>		 
			 
			 
			 
			 
			 
			 
  <div class="row">
    <div class="col-4">

	 পরিমান  : <input type="text" name="Quantity" id="Quantity" class="form-control numbers" />

    </div>
    <div class="col-4">
		 একক  : <input type="text" name="ekok" id="ekok" class="form-control" />    
    </div>
    <div class="col-4">
		একক মূল্য   :  <input type="text" name="unit_price" id="unit_price" class="form-control numbers" />   

    </div>
  </div>
  
  
    <div class="row">
    <div class="col-4">

	বাকিতে ক্রয়   :   <input type="text" name="due" id="due"  class="form-control numbers" />

    </div>
    <div class="col-4">
		নগদের ক্রয়    : <input type="text" name="pay_in_cash" id="pay_in_cash"  class="form-control numbers" /> 
    </div>
    <div class="col-4">
		মোট ক্রয় করা পণ্যের মূল্য   :  <input type="text" name="amount" id="amount"  class="form-control numbers" />

    </div>
  </div>
  
      <div class="row">
    <div class="col-12">

	মন্তব্য   :    <input type="text" name="comment" id="comment" class="form-control" />

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


-->

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
	///////// modal will not close by clicking outside
	 $('#formModal').modal({backdrop: 'static', keyboard: false}) 
	
	
	
  $("#medicine_id").select2();
    $("#medicinecomapnyname_id").select2();

///// clear modal data after close it 
$(".modal").on("hidden.bs.modal", function(){
    $(".medicine_id").html("");
	 $(".medicinecomapnyname_id").html("");
	     $(this).find('form').trigger('reset');
});
/////////////////////////////// Replace non deimal number 


$('.numbers').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

$("#form_body").hide();





$('input[type=radio][name=transitiontype]').change(function() {
    if (this.value == '1') {
        $("#form_body").show();	
$("#baki").show();
$("#nogod").show();
$("#Quantity").val('');
$("#unit_price").val('');
$("#amount").val('');
$("#ekok").val('');
$("#comment").val('');
$("#pay_in_cash").val('');
fetchdata();
 
    }
    else if (this.value == '2') {
        $("#form_body").show();	
$("#baki").hide();
$("#due").val('');
$("#nogod").hide();	
$("#pay_in_cash").val('');	
$("#Quantity").val('');
$("#unit_price").val('');
$("#amount").val('');
$("#ekok").val('');
$("#comment").val('');
fetchdata();
    }
});


/////////////////////////////////
$('.buyorreturnproduct').delegate('.Quantity, .unit_price , .pay_in_cash ' ,   'change',function(){
	var qun = parseFloat($("#Quantity").val());
	if(isNaN(qun))
	{		
    qun=0;
	}		
	var paid = parseFloat($("#pay_in_cash").val());
	if(isNaN(paid))
	{		
    paid=0;
	}
	var unit_price = parseFloat($("#unit_price").val());
	if(isNaN(unit_price))
	{		
    unit_price=0;
	}
	
	var amount = parseFloat((qun * unit_price).toFixed(2)); 
	
var option =  $('input[name=transitiontype]:checked', '#sample_form').val();
console.log(option);
if (option == 1)
{
	var due = parseFloat((amount - paid).toFixed(2)); 
	
	if (due  < 0 )
	{
		$("#pay_in_cash").val(0);
		due=0;
		alert(' নগদ ক্রয় মূল্যের পরিমাণ কখনোই মোট ক্রয় মূল্য থেকে বেশী হতে পারে না  । নগদ ক্রয় ও বাকিতে ক্রয়ের ঘরে পুণরায় ইনপুট দেন  ');
	}
	$("#due").val(due);
}
if (option == 2){
$("#pay_in_cash").val(0);	
}
	
	$("#amount").val(amount);
	
});














//////////////////////


     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	



    var table = $('#patient_table').DataTable({
		
	
		
        processing: true,
        serverSide: true,
		responsive: true,
	
        ajax: "{{ route('medicinecomapnytransition.index') }}",
	
        columns: [
		
		 
		 
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id', name: 'id'},
			 {data: 'medicine_name', name: 'medicine.name'},
			 {data: 'company_name', name: 'medicinecomapnyname.name'},
			 {data: 'type', name: 'type'},
            {data: 'Quantity', name: 'Quantity'},
			 {data: 'ekok', name: 'ekok'},
			 {data: 'unit_price', name: 'unit_price'},
			  {data: 'amount', name: 'amount'},
			 {data: 'due', name: 'due'},
			 {data: 'pay_in_cash', name: 'pay_in_cash'},
			
			 {data: 'comment', name: 'comment'},
			 {data: 'created_at', name: 'created_at'},
			 
 {data: 'action', name: 'action', orderable: false, searchable: false},
			    
           
        ]
    });


   
   fetchdata();
  ///////// show the modal//////////////////////////////////////////////////////////////////////////////// btn_submit create_record
    $(document).on('click', '.btn_submit', function(){
		  $('#form_result').html('');
    $('.modal-title').text("Add New Record");
     $('#action_button').val("Add");
     $('#action').val("Add");
       $('#formModal').modal('show');
  
fetchdata();
 });
 
 
   ///////// show the modal//////////////////////////////////////////////////////////////////////////////// btn_submit 
    $(document).on('click', '.create_record', function(){
		  $('#form_result').html('');
    $('.modal-title').text("Add New Record");
     $('#action_button').val("Add");
     $('#action').val("Add");
       $('#formModal').modal('show');
  
fetchdata();
 });
 
 
 
 function fetchdata(){
	

 $.ajax({
   url:"medicinecomapnytransition/dropdown_list",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
    $("#medicine_id").html("");
	$("#medicinecomapnyname_id").html("");
	
	var optionformedicine = "<option ></option>"; 
					   $("#medicine_id").append(optionformedicine);
	
	
                    var len = 0;
                    if (response.medicine != null) {
                        len = response.medicine.length;
                    }
                       
                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.medicine[i].id;
                             var name = response.medicine[i].name;

                             var optionformedicine = "<option value='"+id+"'>"+name+"</option>"; 
							

                             $("#medicine_id").append(optionformedicine);
                        }
                    }
					
					
					




					var optionforcompany = "<option ></option>"; 
					   $("#medicinecomapnyname_id").append(optionforcompany);
					
					
					
					                    var len = 0;
                    if (response.medicinecomapnyname != null) {
                        len = response.medicinecomapnyname.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.medicinecomapnyname[i].id;
                             var name = response.medicinecomapnyname[i].name;

                             var optionforcompany = "<option value='"+id+"'>"+name+"</option>"; 
							

                             $("#medicinecomapnyname_id").append(optionforcompany);
                        }
                    }
					
					
					
					
					
					
					
					
                }
				
				
	//////////////////////////////////////////////////////////////////////////////
  })	  







	
 }
   
   
  /////////////////////////////////ADD Data //////////////////////////// 
   
   

$('#sample_form').on('submit', function(event){
	$('#action_button').attr("disabled", true);	
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
  
   $.ajax({
    url:"{{ route('medicinecomapnytransition.store') }}",
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
	  fetchdata();
	  $('#action_button').attr("disabled", false);	


     }
	 
$("#form_body").hide();
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
    url:"{{ route('medicinecomapnytransition.update') }}",
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
   url:"/medicine/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#name').val(html.data.name);
    $('#stock').val(html.data.stock);
	 $('#unitprice').val(html.data.unitprice);
	
	var len = html.categorylist.length;
	var medicine_present_category = html.data.medicine_category_id;

	
	
		                        for (var i = 0; i<len; i++) {
								
								if ( medicine_present_category == html.categorylist[i].id  ) 
								{
									var id = html.categorylist[i].id;
                             var name = html.categorylist[i].name;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 

                             $("#category").append(option);
								}
                             
                        }
						
						
							                        for (var i = 0; i<len; i++) {
								
								if ( medicine_present_category != html.categorylist[i].id  ) 
								{
									var id = html.categorylist[i].id;
                             var name = html.categorylist[i].name;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 

                             $("#category").append(option);
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
   url:"medicinecomapnytransition/delete/"+user_id,
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