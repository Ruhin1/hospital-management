

@extends('layout.main')

@section('content')



<style>
.modal-lg {
    max-width: 80% !important;

}



tr:nth-child(even) {background-color: #f2f2f2;}
</style>
 
 






</head>

  
 






<body>




		<div  class="container" style="background-color:#EEE8AA; "  >
		<h2>Take Cabine Fees</h2>
  <span id="form_result"></span>
	
	




<form  class="cabinefee"  id="sample_form"  method="post"  action="{{route('cabinefees.pay')}}"   >
 @csrf

<div class="container">
<div class="row">
<div class="col-6"> Select Seat NO:
<select  style="width:500px;" name="cabineid" class="cabineid" id="cabineid" required>

</select>
</div>


    <div class="col-6">
   Deposit Avilable for Seat Fair:   <input type="text"  readonly name="deposit" id="deposit" value="" autocomplete="off" class="form-control" />
    </div>

</div>




  <div class="row">
    <div class="col-4">
    Patient Name:   <input type="text"  readonly name="name" id="name" value="" autocomplete="off" class="form-control" />
    </div>
    <div class="col-4">
     Cabine NO:  <input type="text" readonly name="cabine" id="cabine" value="" autocomplete="off" class="form-control" />
    </div>
    <div class="col-4">
   Unpaid Since the Date(M/D/Y) :   <input type="date" readonly name="unpaiddate" id="unpaiddate" value="" autocomplete="off" class="form-control" />
    </div>
  </div>
  
  <div class="row">
      <div class="col-4">
  Unpaid for the Number of Days :   <input type="text" readonly name="days" id="days" value="" autocomplete="off" class="form-control" />
    </div>
    <div class="col-4">
  Cabine Fair Per day (TK) :  <input type="text" readonly name="cabinefairperday" id="cabinefairperday" value="" autocomplete="off" class="form-control" />
    </div>
    <div class="col-4">
     Unpaid Cabine Fair(TK):   <input type="text" readonly name="unpaidfair" id="unpaidfair" value="" autocomplete="off" class="form-control" />
    </div>
  </div>

  
    <div class="row">

    <div class="col-3">
     Pay Till Date(M/D/Y) : <input type="date" name="paytilldate" id="paytilldate"  autocomplete="off" class="form-control" />
    </div>
    <div class="col-3">
    Pay for Total days :   <input type="text" readonly name="payfordays" id="payfordays" value=""  autocomplete="off" class="form-control" />
    </div>


    <div class="col-3">
  Data Entry Date : <input type="date" name="dataentrydate" id="dataentrydate" required  autocomplete="off" class="form-control" />
    </div>

	

	
  </div>
  <p>
  
  
  
      <div  style="border-style: dotted;"  class="row">

    <div class="col-3">
    Due in Pervious Seat :   <input type="text" name="cabine_due_previous" id="cabine_due_previous" value="" readonly autocomplete="off" class="nexttext form-control" />
    </div>
  
  
      <div class="col-3">
    Discount on Previous Due :   <input type="text" name="discount_previous_due" id="discount_previous_due" value="0"  autocomplete="off" class="nexttext form-control" />
    </div>
  
  
  
       <div class="col-3">
   Paid now for Previous  Due :   <input type="text" name="paid_previous_due" id="paid_previous_due" value="0"  autocomplete="off" class="nexttext form-control" />
    </div> 
  
       <div class="col-3">
   Paid by Advance Adjustment :   <input type="text" name="paid_previous_advance" id="paid_previous_advance" value="0"  autocomplete="off" class="nexttext form-control" />
    </div>   
  
  
  
  <P>
  
  
  </div>
  
  <p>
  
  
  
  
  
  
  
  
  
  
  
  
  <div class="row">
  <input type="hidden" name="hidden_payingamount" id="hidden_payingamount" value="" autocomplete="off" class="form-control" />
 	    <div class="col-3">
  Gross Amount :    <input type="text" readonly name="grossamount" id="grossamount" value="0" autocomplete="off" class="nexttext form-control" />
    </div>
	
	
			    <div class="col-3">
  Paid :  
   
 <input type="text"  name="payingamount" id="payingamount" value="0" autocomplete="off" class="nexttext form-control" />


   </div>
	
	
	
		    <div class="col-3">
  Discount :   <input type="text" readonly name="discount" id="discount" value="0" autocomplete="off" class="nexttext form-control" />
    </div>






		    <div class="col-3">
  Adjustment with Advance :   <input type="text" value="0" name="adjust_with_advance" id="adjust_with_advance" value="" autocomplete="off" class="nexttext form-control" />
    </div>
	
  
  </div>
  
  
  <input type="hidden" name="patientid" id="patientid" value="" autocomplete="off" class="form-control" /> 
  
    <input type="hidden" name="cabineid" id="cabinelistid" value="" autocomplete="off" class="form-control" /> 
  
     <input type="hidden" name="cabinetransactionid" id="cabinetransactionid" value="" autocomplete="off" class="form-control" /> 
   
       <input type="hidden" name="presentcabine_paidamount" id="presentcabine_paidamount" value="" autocomplete="off" class="form-control" /> 
   
  
 <p> 
  
     
</div>






	
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action"  value="Add"  />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Submit" />
           </div>
         </form>		 
		 
		 
		 
		 
		 
		 
		 
		 
	</div>
			   <span id="form_result_footer"></span>  
<p>




















<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >

	
	<div class="table-responsive">
	<h4> কেবিন ফি ট্রাঞ্জিসন </h4>
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
<th>No</th>
			
			
		    
			<th>Patient Name</th>
			<th>Mobile</th>
			<th>Cabine NO:</th>
			<th>Paid Amount</th>
			<th>From</th>
			<th>To</th>
			<th>Print</th>
			<th>Entry Time</th>
		<th>Entry BY</th>
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
                <b align="center" style="margin:0;">দয়া করে মেসেজটি গুরুত্ব সহকারে পড়ুন। আপনি যদি এই ট্রাঞ্জিশন টি  ডিলিট করেন তবে এই প্যাসেন্টের এই  ট্রাঞ্জিশনের পরবর্তী সকল কেবিনে ভাড়া পরিষোধের ট্রাঞ্জিশন মুছে যাবে। ধরেন আপনি ১২ তারিখ থেকে ১৪ তারিখ এই তিন দিনের ট্রাঞ্জিসনটি ডিলিট করতে চাচ্ছেন। সেই ক্ষেত্রে ১৪ তারিখের পরবর্তীতে এই প্যাসেন্ট কোন কেবিনে ভাড়া পরিষোধ করে থাকলে সেগুলোও ডিলিট হবে। আপনাকে আবার ১২ তারিখ থেকে পরবর্তী যে তারিখ পর্যন্ত এই প্যাসেন্ট কেবিন ভাড়া প্রদান করেছে সেটা নতুন করে ইনপুট দিতে হবে।  </b>
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
	
	$('.cabinefee').delegate('#payingamount','change',function(){


    this.value = this.value.replace(/[^0-9\.]/g,'');
});

    
$("#cabineid").select2(); 
  






/////////////////////////////// move cursor by press enter button

 $('.nexttext').keydown(function(event){
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
	
        ajax: "{{ route('cabinefees.index') }}",
	
        columns: [
		
		 
		 
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},

			  {data: 'patient_name', name: 'patient.name'},
			   {data: 'patient_mobile', name: 'patient.mobile'},
			 {data: 'Cabine_no', name: 'Cabine_no'},
			 {data: 'paid', name: 'paid'},
			 
			  {data: 'from', name: 'from'},
			  {data: 'to', name: 'to'},
			    {data: 'pdf', name: 'pdf'},
					  {data: 'created', name: 'created'},
			   {data: 'entryby', name: 'User.name'},

			 {data: 'action', name: 'action', orderable: false, searchable: false},

 

			    
           
        ]
    });


   fetch(); 
   

 
 
 
 
 function fetchinformation( id )
 {
	   $.ajax({
   url:"cabinefees/fetchinformation/"+id,
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
		
		
$("#name").val(response.patient.name);
$("#cabine").val(response.cabine.serial_no);
$("#unpaiddate").val(response.startimeshow);  
$("#days").val(response.differnece_btw_two_date_by_day);
$("#cabinefairperday").val(response.cabine_fair_per_day);
$("#unpaidfair").val(response.total_seat_fair);

$("#patientid").val(response.patient.id);
$("#cabinelistid").val(response.cabine.id);
$("#cabinetransactionid").val(response.cabinetransaction.id);

$("#payingamount").val(0);
$("#discount").val(0);
$("#adjust_with_advance").val(0);
$("#paytilldate").val('');
$("#deposit").val(response.deposit);
$("#cabine_due_previous").val(response.cabine_due_previous);


$("#payfordays").val('');



}
	   });					
	 
	 
 }
 
 
 
 
  $(document).on('change', '#paytilldate', function(){
 console.log("A");
  var start = $('#unpaiddate').val();
    var end= $('#paytilldate').val();
	var date1 = new Date(start);
	var date2 = new Date(end);
 if (date1 > date2 )
 {
	alert("শেষের তারিখ অব্যশ্যই শুরুর তারিখ থেকে পেছনে হবে। পুনরায় ইনপুট দিন।"); 
	$('#enddate').val('');
 }
 
 var d= date2 - date1;
 
 
 var d =  d/(1000*60*60*24);
 d= d+1;
 var rate =  $('#cabinefairperday').val();   
 var paidamount=   rate* d;   
var presentcabine_paidamount = paidamount;



var cabine_due_previous = parseFloat($('#cabine_due_previous').val());
 paidamount = paidamount ; 
 $('#payfordays').val(d);
  $('#payingamount').val(paidamount);
  
  $('#grossamount').val(paidamount);
  
  
    $('#presentcabine_paidamount').val(presentcabine_paidamount);
  
   $('#hidden_payingamount').val(paidamount);
    $("#discount").val(0);	
	$("#adjust_with_advance").val(0);
 
 
  
 });

 
 
 
 
 
 
 
 
 
 
 
 
 
 function fetch()
 {
	 
  $.ajax({
   url:"cabinefees/dropdown_list",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	

	  $("#cabineid").html("");
  
	  
	  

	  
	  
	  	  		var cabinename = "<option  value='' ></option>"; 
						
					   $("#cabineid").append(cabinename);
					
					
					
					                    var len = 0;
                    if (response.cabine != null) {
                        len = response.cabine.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.cabine[i].id;
                             var name = response.cabine[i].serial_no;
							
							var patient_name= response.cabine[i].patientname;
                           var patient_ID= response.cabine[i].patient_id;
                             var cabinename = "<option     data-name='"+name+"'   data-id='"+id+"'  value='"+id+"'>Seat No: "+name+" Patient ID:"+patient_ID+" Name:"+patient_name+"</option>"; 
							

                             $("#cabineid").append(cabinename);
                        }
                    }
	  
				
                }
				
				
	//////////////////////////////////////////////////////////////////////////////
  })
	 
	 
 }
 
 
 

 
 
 
 
 
 
 
 
 
 
  ///////////////////////////////// insert value related to the patient dynamically  /////////////////////

$('.cabinefee').delegate('.cabineid','change',function(){

    $(".cabineid").select2();	
	

var id = $('.cabineid option:selected').attr("data-id");
	
fetchinformation(id);

});
 
 
 
 
 $('.cabinefee').delegate('#payingamount, #adjust_with_advance ','change',function(){

 
var paid =  parseFloat( $("#payingamount").val()); 
	var adjust_advance =  parseFloat($("#adjust_with_advance").val());

var grossamount =  parseFloat($('#hidden_payingamount').val()) ;





var dis = grossamount - ( paid + adjust_advance );

$('#discount').val(dis);


});
 
 
 
 
 

 
 

 
 


 
 
 
 

 



 
 
 
 
 
 
 
 
   
   
  /////////////////////////////////ADD Data //////////////////////////// 
   
   

$('.cabinefee').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
     $('#action_button').attr("disabled", true);
   $.ajax({
    url:"{{ route('cabinefees.pay') }}",
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
	  $('#form_result').delay(1500).fadeOut();
	  $('#form_resultfooter').delay(1500).fadeOut();
	  fetch();
     $('#action_button').attr("disabled", false);
    }
   })
  
  
  
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('pathologyreportmaking.update') }}",
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
   url:"/pathologyreportmaking/"+id+"/edit",
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
   url:"cabinefees/destroy/"+user_id,
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
		         $('#sample_form')[0].reset();
   }
  })
 });




   
   



   
   
   
   
   
   
   
   
   
   
   
   
   
  
	 
	 
	 
	 
	 
	 

	 
	 






 
 $(document).on('click', '#close', function(){
$('#formModal').modal('hide');

 });


});
</script>
	  


@stop