

@extends('layout.main')

@section('content')




 <style>
.modal-lg {
    max-width: 90% !important;

}


</style>
 






</head>

  
 






<body>
<input type="hidden" id="balance" name="balance" value="{{$balance->balance}}">
<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
    <h6 style="color:red;"> প্রতিষ্ঠানের জন্য ক্রয়কৃত সেবা / পণ্যের চালানের তথ্য নিচে টেবিলে দেয়া আছে। নতুন করে কোন পণ্য বা সেবা কিনতে ADD Record বাটনে ক্লিক করুন </h6>
    <a style="float:right; margin-bottom:20px;" class="btn btn-success  create_record" href="javascript:void(0)" id="create_record"> Add New </a>
	
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
<th>নং </th>
			<th>পণ্য/সেবা/খরচের নাম </th>
			
			<th> সাপ্লাইয়ারের নাম  </th>
			<th> এন্ট্রি বাই   </th>
			<th>ইউনিট </th>
			<th>প্রতি ইউনিট মূল্য </th>
			<th>মোট মূল্য  </th>
			<th> বাকি থাকা টাকার পরিমান   </th>
			<th>এডভান্স প্রদান (যদি এডভান্স দিয়ে থাকেন )  </th>
			<th> ট্রাঞ্জিশনের তারিখ  </th>
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



<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post"  action="{{ route('khorochtransition.store') }}"   id="sample_form" class="form-horizontal  sample_form" enctype="multipart/form-data">
          @csrf
		  
	 <div class="form-group">
     <label class="control-label col-md-4"> <b style="color:green">পণ্য/সেবা/খরচের নাম  : </b></label>
     <div class="col-md-8">
	 <select id="khorocer_khad"  class="form-control khorocer_khad"  name="khorocer_khad"  required   style='width: 270px;'>
    </select>
    </div>
	</div>
			 
	
	<div class="form-group">
    <label class="control-label col-md-4"> <b style="color:green">সাপ্লাইয়ারের নাম   :</b> </label>
    <div class="col-md-8">
   <select id="supplier"  class="form-control supplier"  name="supplier"  required   style='width: 270px;'>
    </select>
   </div>
   </div>
   
   

 <!--  
   <div class="form-group">
    <label class="control-label col-md-4">  <b style="color:green"> পণ্য/সেবার পরিমাণ  <b>  : </label>
    <div class="col-md-8"> -->
	<input type="hidden"  value="1" name="unit" id="unit" class="form-control unit" required  />   
	<!--
	<b style="color:red; font_size:5px">( কিছু সেবা আছে যার পরিমাণ হয় না । যেমন wifi সেবা। সেই ক্ষেত্রে অপশনের ঘরে ১ লিখুন। )</b>
	
	</div>
	</div>
   
   -->
   
	<div class="form-group">
    <label class="control-label col-md-4"> <b style="color:green"> মূল্য  </b>  : </label>
    <div class="col-md-8">
	<input type="text" value="0"  name="unit_price" id="unit_price" class="form-control  unit_price" required  />
	<!--
	<b style="color:red; font_size:5px">( আপনি যদি প্রতি  <span style="color:blue" > ইউনিট মূল্য  </span> এর ঘরে মান বসান তবে নিচের ঘরটি অর্থাৎ  
	<span style="color:blue" > মোট ক্রয়কৃত পণ্য/সেবার  মূল্যের </span>
	ঘরটি নিজে থেকেই পূরণ হবে। আর যদি <span style="color:blue" > মোট ক্রয়কৃত পণ্য/সেবার  মূল্যের </span> ঘরটিতে মান বসান তবে এই ঘরটি নিজে থেকেই পূরণ হবে। 
	তাই একটি পূরণ করলে , অপরটি পূরণ করার দরকার নাই। ধরুন আপনি ৫ বস্থা সিমেন্ট কিনলেন ১০০ টাকায়। তাহলে আপনি <span style="color:blue"> পণ্য/সেবার পরিমাণ  </span>  এর ঘরে ৫ লিখুন।
	এরপর এই ঘরে ২০ লিখলে , <span style="color:blue">   মোট ক্রয়কৃত পণ্য/সেবার  মূল্যের </span>ঘরে ১০০ বসে যাবে । আবার যদি এই ঘর ফাঁকা রাখেন আর মোট মূল্যের ঘরে ১০০ বসান তবে সেই ক্ষেত্রে এই ঘরে নিজে থেকেই ২০ বসে যাবে।  )</b>
	
	-->
	</div>
	</div>
			 
	
<!--
	
		<div class="form-group">
    <label class="control-label col-md-4">মোট ক্রয়কৃত পণ্য/সেবার  মূল্য     : </label>
    <div class="col-md-8">  -->
	<input type="hidden" value="0"   name="amount" id="amount" class="form-control amount" required readonly />
	
	<!--</div>
	</div> -->
	

	
    <div class="form-group">
    <label class="control-label col-md-4">বাকি (থাকলে) : </label> 
    <div class="col-md-8">
	<input type="text" value="0"  name="due" id="due" class="form-control  due" required  />
	</div>
	</div>

<input type="hidden" id="advance" name="advance" value="0">
			 
<!--
    <div class="form-group">
    <label class="control-label col-md-4">এডভান্স প্রদান (যদি এডভান্স দিয়ে থাকেন )  : </label>
    <div class="col-md-8">
	<input type="text" value="0"  name="advance" id="advance" class="form-control  advance" required  />
	</div>
	</div>
	

           <br />
	-->	   
	
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
			 <span id="form_resultfooter"></span>
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
 
 

///// clear modal data after close it 
$(".modal").on("hidden.bs.modal", function(){
    $("#khorocer_khad").html("");  
	$("#form_resultfooter").html("");   
$("#supplier").html("");
	$("#due").val(0);
	$("#advance").val(0);
	$("#unit_price").val(0);
	$("#unit").val(0);
	
	
	
	
	
	
});
///////////////////////////////







////////////////////////////////////////////////////// 


     $('#sample_form').delegate('#action_button' ,'click',function(){
		  
 var balance = parseFloat($("#balance").val()); 
 var amount =  parseFloat($("#amount").val());  
var due =  parseFloat($("#due").val());
var advance =  parseFloat($("#advance").val());

if (advance == 0)
{
	amount = amount - due; 
}
else
{

amount = advance ;
}

  if ( amount > balance )
 {
	 $("#salary").val(0); 
	 alert("আপনার  ব্যাবসার একাউন্টের  ট্রাঞ্জিশনটি সম্পন্ন করার জন্য যথেষ্ট টাকা নাই। আপনার একাউন্টে থাকা টাকার পরিমাণ : " +balance+ "টাকা। দয়া করে ব্যাবসার একাউন্টে টাকা জমা করে ট্রাঞ্জিশনটি সম্পন্ন করুন।  ");
	 $("#formModal").find('form').trigger('reset');
	 $('#sample_form')[0].reset();
      $('#patient_table').DataTable().ajax.reload();
	  fetchdata();
		 
	 
	 
	 
 }
 else {
	balance = balance - amount ; 
	$("#balance").val(balance); 
	 
 }
 
 
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
	
        ajax: "{{ route('khorochtransition.index') }}",
	
        columns: [
		
		 
		 
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
	
			
			   
			   {data: 'khorocer_name', name: 'khorocer_khad.name'},
			  {data: 'supplier_name', name: 'supplier.name'},
{data: 'entryby', name: 'User.name'},
			    {data: 'unit', name: 'unit'},
			  
			  {data: 'unit_price', name: 'unit_price'},
			  {data: 'amount', name: 'amount'},
			 
			  {data: 'due', name: 'due'},
			  {data: 'advance', name: 'advance'},
		
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

	
	
			fetchdata();
				

 
 
 });
 
 function fetchdata(){
	 
	   $.ajax({
   url:"khorochtransition/dropdown_list",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
 	 $("#khorocer_khad").html("");  
	$("#supplier").html("");   
	
	
	
	var optionforkhorocer_khad = "<option  value='' >select one</option>"; 
					   $("#khorocer_khad").append(optionforkhorocer_khad);
	
	
                    var len = 0;
                    if (response.khorocer_khad != null) {
                        len = response.khorocer_khad.length;
                    }
                       
                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.khorocer_khad[i].id;
                             var name = response.khorocer_khad[i].name;
							

                             var optionforkhorocer_khad = "<option    value='"+id+"'>"+name+"</option>"; 
							

                             $("#khorocer_khad").append(optionforkhorocer_khad);
                        }
                    }
					
					
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
						

                             var optionforsupplier = "<option     value='"+id+"'>"+name+"</option>"; 
							

                             $("#supplier").append(optionforsupplier);
                        }
                    } 

 }	//////////////////////////////////////////////////////////////////////////////
  })
 
 }
 
 
 
 




 
////////////////////////////////////////keyup//////////////////////////////

$('.sample_form').delegate(' .unit_price ', 'change',function(){

	
	var unit_price = parseFloat($('.unit_price').val());


var unit = ($(".unit").val());
var amount = ($(".amount").val());





if ( (isNaN(unit)) || (isNaN(unit_price)) || (isNaN(amount)) )
{
		$(".unit").val(1);
	$(".unit_price").val(0);
	$(".amount").val(0);
	
	alert("আপনি সংখ্যার বদলে অন্য কিছু ইনপুট দিয়েছেন। দয়া করে  পুনরায় ইনপুট দেন ");
	
	
	
	
}

else {

amount = unit* unit_price; 
$(".amount").val(amount);	
}



});












$('.sample_form').delegate(' .unit', 'change',function(){
	
	
		var unit_price = parseFloat($('.unit_price').val());


var unit = ($(".unit").val());
var amount = ($(".amount").val());


	
	
	





if ( (isNaN(unit)) || (isNaN(unit_price)) || (isNaN(amount)) )
{
		$(".unit").val(1);
	$(".unit_price").val(0);
	$(".amount").val(0);
	
	alert("আপনি সংখ্যার বদলে অন্য কিছু ইনপুট দিয়েছেন। দয়া করে  পুনরায় ইনপুট দেন ");
	
	
	
	
}
	
$(".unit_price").val(0);
	$(".amount").val(0);	
alert('এবার দয়া করে,  প্রতি ইউনিট এর মূল্য  অথবা  মোট ক্রয়কৃত পণ্য/সেবার মূল্য : এর ঘরে ইনপুট দিন। এই দুইটি ঘরের একটিতে ইনপুট দিলে অপরটিতে দেয়ার দরকার নাই। ');


});



$('.sample_form').delegate(' .amount', 'change',function(){
	
	
	
	var unit_price = parseFloat($('.unit_price').val());


var unit = ($(".unit").val());
var amount = ($(".amount").val());




if ( (isNaN(unit)) || (isNaN(unit_price)) || (isNaN(amount)) )
{
		$(".unit").val(1);
	$(".unit_price").val(0);
	$(".amount").val(0);
	
	alert("আপনি সংখ্যার বদলে অন্য কিছু ইনপুট দিয়েছেন। দয়া করে  পুনরায় ইনপুট দেন ");
	
	
	
	
}
	
	else {
		unit_price = amount/unit;
		$(".unit_price").val(unit_price);
		
	}


});


 
 
 

 


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
   
   
  /////////////////////////////////ADD Data //////////////////////////// 
   
   

$('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
  
   $.ajax({
    url:"{{ route('khorochtransition.store') }}",
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
   url:"/khorochtransition/"+id+"/edit",
   dataType:"json",
   success:function(html){
	   
	   
	   
    $('#Startdate').val(html.data.starting);
    $('#releasedata').val(html.data.ending);

	
	var len = html.cabinedata.length;
	console.log(len);
	var presentcabinedata = html.data.cabinelist_id;

	
	
		                        for (var i = 0; i<len; i++) {
								
								if ( presentcabinedata == html.cabinedata[i].id  ) 
								{
									var id = html.cabinedata[i].id;
                             var name = html.cabinedata[i].serial_no;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 

                             $("#cabine_list").append(option);
								}
                             
                        }
						
						
							                        for (var i = 0; i<len; i++) {
								
								if ( presentcabinedata != html.cabinedata[i].id  ) 
								{
									var id = html.cabinedata[i].id;
                             var name = html.cabinedata[i].serial_no;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 

                             $("#cabine_list").append(option);
								}
                             
                        }
						
				
		/////////////////////////  fetch for patientlist 				
		
						var len = html.patientdata.length;
	
	var presentpatientdata = html.data.patient_id;

	
	
		                        for (var i = 0; i<len; i++) {
								console.log('A' );
								if ( presentpatientdata == html.patientdata[i].id  ) 
								{
									var id = html.patientdata[i].id;
                             var name = html.patientdata[i].name;

                             var optionforpatient = "<option value='"+id+"'>"+id+"</option>"; 
                              console.log(option);
                             $("#patientlist").append(optionforpatient);
								}
                             
                        }
						
						
							                        for (var i = 0; i<len; i++) {
								
								if ( presentpatientdata != html.patientdata[i].id  ) 
								{
									var id = html.patientdata[i].id;
                             var name = html.patientdata[i].name;

                             var optionforpatient = "<option value='"+id+"'>"+id+"</option>"; 

                             $("#patientlist").append(optionforpatient);
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
   url:"khorochtransition/destroy/"+user_id,
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




   
   
   
    $(document).on('click', '.pdf', function(){
  user_id = $(this).attr('id');
  
    $.ajax({
   url:"doctortransition/destroy/"+user_id,
  

  })
 });


   
   
   
   
   
   
   
   
   
   
   
   
   
  
	 
	 
	 
	 
	 
	 

	 
	 






 
 $(document).on('click', '#close', function(){
$('#formModal').modal('hide');

 });


});
</script>
	  


@stop