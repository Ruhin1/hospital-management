

@extends('layout.main')

@section('content')




 
 






</head>

  
 






<body>


<div  class="container" style="background-color:#EEE8AA; "  > 
    <h1>Booking Seat</h1>
  <span id="form_result"></span>
         <form method="post" action="{{ route('cabinetransfer.store') }}"   id="sample_form" class="form-horizontal sample_form" enctype="multipart/form-data">
          @csrf

  


<p>

  
 

  
  <p>
    <div class="row">

 <div class="col-6">
From Bed   :  	<select id="booked_cabine_list"  class="form-control "  name="from_cabine_list"  required  style='width: 270px;'> 
   </select>
  </div>


  <div class="col-6">
 Ending Date :<input type="date" id="From_end_date" name="From_end_date" required>
   </select>
  </div> 
  

  
	</div> 
	
	
	

<p>


    <div class="row">



 <div class="col-6">
     To Bed :  	<select id="cabine_list"  class="form-control "  name="to_cabine_list"  required  style='width: 270px;'> 
   </select>
  </div>
  

  
 
  <div class="col-6">
  Starting Date:<input type="date" id="to_start_date" name="to_start_date" required>
   </select>
  </div> 
  

  
	</div> 




           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" value="Add" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>
		   <span id="form_result_footer"></span>

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


$(function () {
  $('#to_start_date').datetimepicker();
});



$(document).ready(function(){



	
  $("#patientlist").select2();   
 $("#cabine_list").select2();   
 $(".doctor").select2();
 $(".agent").select2();
$("#customer_id").select2();
	  $("#refdoc_id").select2();
	  
	  
$("#booked_cabine_list").select2();


fetch();

/////////////////////////////// move cursor by press enter button

 $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

var $check = $(document).find('input[type="text"]');
jQuery("input").on('keyup', function(event) {
  
  
  if (  (event.keyCode === 13) || (event.keyCode === 40) ) {
   $check.eq($check.index(this) + 1).focus();
  }

               if (event.keyCode === 38) {
                    
           $check.eq($check.index(this) - 1).focus();
                }





});


//// toggle between doctor commision and agent commission 
$("#agentoption").hide();
$("#doctoroption").hide();
$('input[type=radio][name=commissiontype]').change(function() {
    if (this.value == '1') {

$("#doctoroption").show();
$("#agentoption").hide();
fetchdataforcommissionagent();
$('#percentageofagent').val(0);
$("#commission").val(0);

 
    }
    else if (this.value == '2') {
     	
$("#doctoroption").hide();
$("#agentoption").show();
fetchdataforcommissionagent();
$('#percentageofagent').val(0);
$("#commission").val(0);

    }
	
	    if (this.value == '3') {

$("#doctoroption").hide();
$("#agentoption").hide();
fetchdataforcommissionagent();
$('#percentageofagent').val(0);
$("#commission").val(0);

 
    }
	
	
});



/////////////////////////////// fill the value for selected patient ...............

$('.form-horizontal').delegate('.customer_id','change',function(){
var name = $('.customer_id option:selected').attr("data-name");        
var age = $('.customer_id option:selected').attr("data-age");
var sex = $('.customer_id option:selected').attr("data-sex");
var address = $('.customer_id option:selected').attr("data-address");
var mobile = $('.customer_id option:selected').attr("data-mobile");
console.log(mobile);
$('#name').val(name);
$('#age').val(age);
$('#sex').val(sex);
$('#address').val(address);
$('#mobile').val(mobile);



});



///// clear modal data after close it 
$(".modal").on("hidden.bs.modal", function(){
    $("#patientlist").html("");
});
///////////////////////////////


     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	






function fetchdataforcommissionagent()
{
	
		  $.ajax({
   url:"surgerytansition/dropdown_list",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	   ////////////////////fetch data for Customer dropdown menu ////////////////////////////

		$("#agent").html("");
		
		 $("#doctor").html("");  

	  
	  
	  	  	  		var doctor = "<option  value='' ></option>"; 
						
					   $("#doctor").append(doctor);
					
					
					
					                    var len = 0;
                    if (response.doctor != null) {
                        len = response.doctor.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.doctor[i].id;
                             var name = response.doctor[i].name;
						var commission_pecentage = response.doctor[i].commission_pecentage;

                             var doctor = "<option  data-commission_pecentage='"+commission_pecentage+"'    data-name='"+name+"'   value='"+id+"'>"+name+"</option>"; 
							

                             $("#doctor").append(doctor);
                        }
                    }
					
					
					
					

					
					
					

	  	  	  		var agent = "<option  value='' ></option>"; 
						
					   $("#agent").append(agent);
					
					
					
					                    var len = 0;
                    if (response.agent != null) {
                        len = response.agent.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.agent[i].id;
                             var name = response.agent[i].name;
						var commission_pecentage = response.agent[i].commission_pecentage;

                             var agent = "<option   data-commission_pecentage='"+commission_pecentage+"'     data-name='"+name+"'   value='"+id+"'>"+name+"</option>"; 
							

                             $("#agent").append(agent);
                        }
                    }					
					
	  


			   }
				
				
	//////////////////////////////////////////////////////////////////////////////
  })

	
}





 function fetch()
 {

  $.ajax({
   url:"cabinetransfer/dropdown_list",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	$("#customer_id").html("");
	$("#cabine_list").html("");
   $("#refdoc_id").html("");
	
	
   $("#booked_cabine_list").html("");

	
	
	
	
			var refdoc_id = "<option  value='' ></option>"; 
						
					   $("#refdoc_id").append(refdoc_id);
					
					
					
					                    var len = 0;
                    if (response.doctor != null) {
                        len = response.doctor.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.doctor[i].id;
                             var name = response.doctor[i].name;
						var commission_pecentage = response.doctor[i].commission_pecentage;

                             var refdoc_id = "<option  data-commission_pecentage='"+commission_pecentage+"'    data-name='"+name+"'   value='"+id+"'>"+name+"</option>"; 
							

                             $("#refdoc_id").append(refdoc_id);
                        }
                    }	
	
	
var option = "<option value=''></option>";                   
  $("#customer_id").append(option);

				   var len = 0;
                    if (response.patientdata != null) {
                        len = response.patientdata.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.patientdata[i].id;
                             var name = response.patientdata[i].name;
							  var mobile = response.patientdata[i].mobile;
							  	 var address = response.patientdata[i].address;
							var age = response.patientdata[i].age;
							var sex = response.patientdata[i].sex;
							

                             var option = "<option data-name='"+name+"' data-sex='"+sex+"' data-mobile='"+mobile+"'  data-age='"+age+"'   data-address='"+address+"'  value='"+id+"'>"+id+"</option>"; 
							  


							  $("#customer_id").append(option);
						
                        }
                    }
	
					
					
						var optionforcabinelist = "<option ></option>"; 
					   $("#cabine_list").append(optionforcabinelist);
					
					
					
					                    var len = 0;
                    if (response.cabinedata != null) {
                        len = response.cabinedata.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.cabinedata[i].id;
                             var name = response.cabinedata[i].serial_no;

                             var optionforcabinelist = "<option value='"+id+"'>"+name+"</option>"; 
							

                             $("#cabine_list").append(optionforcabinelist);
                        }
                    }
	
	
	
	
						var optionforcabinelist = "<option ></option>"; 
					   $("#booked_cabine_list").append(optionforcabinelist);
					
					
					
					                    var len = 0;
                    if (response.cabinedata_booked != null) {
                        len = response.cabinedata_booked.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.cabinedata_booked[i].id;
                             var name = response.cabinedata_booked[i].serial_no;

                             var optionforcabinelist = "<option value='"+id+"'>"+name+"</option>"; 
							

                             $("#booked_cabine_list").append(optionforcabinelist);
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

 
 });
 
   
   
  /////////////////////////////////ADD Data //////////////////////////// 
   
   

$('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
  
   $.ajax({
    url:"{{ route('cabinetransfer.store') }}",
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
$("#agentoption").hide();
$("#doctoroption").hide();
fetch();
 fetchdataforcommissionagent();

    }
   })
  
  
  
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('cabinetransaction.update') }}",
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
   url:"/cabinetransaction/"+id+"/edit",
   dataType:"json",
   success:function(html){
	   
	   
	   
    $('#Startdate').val(html.data.starting);
    

	
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
   url:"cabinetransaction/destroy/"+user_id,
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
		   fetch();
   }
  })
 });

   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
  
	 
	 
	 
	 
	 
	 

	 
	 






 
 $(document).on('click', '#close', function(){
$('#formModal').modal('hide');

 });


});
</script>
	  


@stop