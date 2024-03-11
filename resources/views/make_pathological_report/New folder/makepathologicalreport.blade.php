

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

<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
    <h2 style="color:red;"> নতুন রিপোর্ট এনট্রি করতে ডান দিকের এড বাটন ক্লিক করেন   </h2>
    <a style="float:right; margin-bottom:20px;" class="btn btn-success  create_record" href="javascript:void(0)" id="create_record"> Add New </a>
	
	
	<div class="table-responsive">
	<h4> আগে করা রিপোর্ট এর টেবিল </h4>
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
<th>No</th>
			
			
		    
			<th>Patient Name</th>
			<th>Test Name</th>
			<th>Test Component Name</th>
			<th>Results</th>
			<th>Normal Value</th>
			<th>Units</th>
			<th>Report Order No</th>
			<th>Entity by</th>
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
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span> 
         <form method="post"  action="{{ route('pathologyreportmaking.store') }}"   id="sample_form" class="form-horizontal  sample_form_for_doctorappointment" enctype="multipart/form-data">
          @csrf



<div class="container">
  <div class="row">
    <div class="col-6">
   Order ID  :        
	 <select id="order_no"  class="form-control order_no"  name="order_no"     style='width: 270px;'>
    </select>
    </div>
    <div class="col-6">
	Test Name
 <select id="test_name"  class="form-control test_name"  name="test_name"     style='width: 270px;'>
    </select>
    </div>

  </div>
</div>









<div class="container">
  <div class="row">

    <div class="col-sm">
	Patient ID
  	<input type="text"   name="patientlist" id="patientlist" class="form-control  patientlist" required readonly />
    
    </div>
    <div class="col-sm">
  Patient Name    <input type="text" name="patientname" id="patientname" class="form-control name" readonly />
    </div>
  </div>
</div>
<input type="hidden"   name="doctor" id="doctor" class="form-control  doctor"  />		
	




		   

		   
		   
		 		 <table class="table" id="products_table">
                <thead>
                    <tr>
                        <th>Test Component Name</th>
                        <th   >Normal value</th>
						<th   >Result</th>
						<th   >Unit</th>
							<th  >Remove</th>
                    </tr>
                </thead>
                <tbody class="addmoreproduct">
                    <tr id="product0">
                        <td>
                      <select id="test_component_id"  class="form-control test_component_class"  name="test_component_id[]"  required   style='width: 270px;'>
                       </select>
                        </td>
						
						
						<td>
						<input type="text"   name="normalvalue" id="normalvalue" class="form-control  normalvalue" required readonly />
                        </td>
						
						
						
						<td>
						<input type="text"   name="result[]" id="result" class="form-control  result" required  />
						</td>
						
                     <td>
						<input type="text"   name="unit" id="unit" class="form-control  unit" required readonly />
                        </td>

						 
			
						<td>
						
						<a class="remove"  style="font-size:30px; color:red;"  href="#">  ×</a> 
						
						</td> 

						
                    </tr>
                    <tr id="product1"></tr>
                </tbody>
            </table>
			 
			 
			 
			 
			 
			 
			
		   <div id="child"> 
		   
		   </div>
		   <button type="button" id="add_row" class="btn btn-primary">New Test </button>
		   
  
           <br />
		   
	
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Submit" />
           </div>
         </form>
		  <span id="form_resultfooter"></span>
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
	
    
 $(".test_component_class").select2();   
  $("#order_no").select2();   
  $("#test_name").select2();  
  

///// clear modal data after close it 
$(".modal").on("hidden.bs.modal", function(){
    $("#patientlist").html("");
	 $(".test_component_id").html("");
	  $("#order_no").html("");
	   $("#test_name").html("");
	   $("#doctor").html("");
	     $("#products_table tr:gt(1)").remove();
		 $(this).find('form').trigger('reset');
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
	
        ajax: "{{ route('pathologyreportmaking.index') }}",
	
        columns: [
		
		 
		 
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},

			  {data: 'patient_name', name: 'patient.name'},
			 {data: 'test_name', name: 'reportlist.name'},
			 {data: 'component_name', name: 'pathology_test_component.name'},
			 
			  {data: 'result', name: 'result'},
			  {data: 'normal_value', name: 'pathology_test_component.Normalvalue'},
			  {data: 'normal_value', name: 'pathology_test_component.unit'},
            {data: 'reportorder_id', name: 'reportorder_id'},
			   {data: 'enteryby', name: 'enteryby'},
	
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
fetch(); 
 
 });
 
 
 
 
 function fetchtestcomponent( id )
 {
	   $.ajax({
   url:"pathologyreportmaking/dropdownfortest/"+id,
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
		$("#test_component_id").html("");
		var optionfortest = "<option  value='' >select one</option>"; 
						
					   $("#test_component_id").append(optionfortest);
					
					
					
					                    var len = 0;
                    if (response.test_component_list != null) {
                        len = response.test_component_list.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.test_component_list[i].id;
                             var name = response.test_component_list[i].component_name;
							 var Normalvalue = response.test_component_list[i].Normalvalue;
							var unit = response.test_component_list[i].unit;

                             var optionfortest = "<option  data-normalvalue='"+Normalvalue+"' data-unit='"+unit+"'   value='"+id+"'>"+name+"</option>"; 
							

                             $("#test_component_id").append(optionfortest);
                        }
                    }
}
	   });					
	 
	 
 }
 
 
 
 
 
 
 
 function fetch()
 {
	 
  $.ajax({
   url:"pathologyreportmaking/dropdown_list",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	

	  $("#order_no").html("");
	$("#test_name").html("");  
	 $("#doctor").html("");  
	  
	  

	  
	  
	  	  		var test_name = "<option  value='' >select one</option>"; 
						
					   $("#test_name").append(test_name);
					
					
					
					                    var len = 0;
                    if (response.reportlist != null) {
                        len = response.reportlist.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.reportlist[i].id;
                             var name = response.reportlist[i].name;
							
							

                             var test_name = "<option     data-name='"+name+"'   data-id='"+id+"'  value='"+id+"'>"+name+"</option>"; 
							

                             $("#test_name").append(test_name);
                        }
                    }
	  
	  
	  
	  
	  
	  
	  
	  		var optionfororder = "<option  value='' >select one</option>"; 
						
					   $("#order_no").append(optionfororder);
					
					
					
					                    var len = 0;
                    if (response.reportorder != null) {
                        len = response.reportorder.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.reportorder[i].id;
                             var name = response.reportorder[i].patient.name;
							var pid = response.reportorder[i].patient.id;
						
                             

							
									  var doctor_id = response.reportorder[i].refdoctor_id; 
							
							
                             var optionfororder = "<option   data_doctor_id='"+doctor_id+"'   data-id='"+pid+"'  data-name='"+name+"'   value='"+id+"'>"+id+"</option>"; 
							

                             $("#order_no").append(optionfororder);
                        }
                    }
	  
	  
	  

	

	

					
                }
				
				
	//////////////////////////////////////////////////////////////////////////////
  })
	 
	 
 }
 
 
 

 
 
 
 
 
 
 
 
 
 
  ///////////////////////////////// insert value related to the patient dynamically  /////////////////////

$('.sample_form_for_doctorappointment').delegate('.test_name','change',function(){
   $("#products_table tr:gt(1)").remove(); // remove all row whose index is greater than 1
    $(".test_component_class").select2();	
	
	$("#normalvalue").val('');
	$("#unit").val('');	
		$("#result").val('');
var id = $('.test_name option:selected').attr("data-id");
	
fetchtestcomponent(id);

});
 
 
 
 
 
 
 
 
 
 
 ///////////////////////////////// insert value related to the patient dynamically  /////////////////////

$('.sample_form_for_doctorappointment').delegate('.order_no','change',function(){
	
	var name = $('.order_no option:selected').attr("data-name");
var pid = $('.order_no option:selected').attr("data-id");
	var doctor_name = $('.order_no option:selected').attr("data-doctor_name");
	var doctor_id = $('.order_no option:selected').attr("data_doctor_id");
	$('#patientname').val(name);
	$('#patientlist').val(pid);
$('#doctorname').val(doctor_name);

$('#doctor').val(doctor_id);


});
 
 
  ///////////////////////////////// insert value related to the Test_Component  /////////////////////Test Name




$('.sample_form_for_doctorappointment').delegate('.test_component_class','change',function(){
	
	
	
	var tr= $(this).parent().parent();
	
	
	
	
	
	var nvalue = tr.find('.test_component_class option:selected').attr("data-normalvalue");
var unit = tr.find('.test_component_class option:selected').attr("data-unit");
	console.log(unit);
	tr.find('.normalvalue').val(nvalue);
	tr.find('.unit').val(unit);






});
 
 
 
 
 /////////////////////////////////////// Remove row ////////////////////////


$('.addmoreproduct').delegate('.remove','click',function(){ 
var rowCount = $('table#products_table tr:last').index() + 1; // find out the length of the row 
console.log(rowCount);

 
 
   var rowindex = $(this).closest('tr').index();  // find out the index number of the row 
    
 if (rowindex > 0 )
 {
$(this).parent().parent().remove();
  totalamount();
 }

 });

 
 
 
 
  /////////////////////////////////////// Dynamically Add New row and Add New select2 for dynamically added new medicine name  ////////////////////////
 

  let row_number = 1;
    $("#add_row").click(function(e){
		
		
		      e.preventDefault();
      let new_row_number = row_number - 1;
	  
	  	   $latest_tr  = $('#product0');
   
     $latest_tr.find(".test_component_class").each(function(index)
    {
        $(this).select2('destroy');
    }); 
	  
      $('#product' + row_number).html($('#product0' ).html()).find('td:first-child');
	  
	   

	  
      $('.addmoreproduct').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
     

 
     
    
  $('.test_component_class').select2(); 
 
    
	
	
	});
 
 



 
 
 
 
 
 
 
 
   
   
  /////////////////////////////////ADD Data //////////////////////////// 
   
   

$('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
  
   $.ajax({
    url:"{{ route('pathologyreportmaking.store') }}",
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
   $("#products_table tr:gt(1)").remove(); // remove all row whose index is greater than 1
    $(".test_component_class").select2();
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
   url:"pathologyreportmaking/destroy/"+user_id,
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