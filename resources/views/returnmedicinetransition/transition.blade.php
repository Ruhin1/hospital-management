

@extends('layout.main')

@section('content')



<style>
.modal-lg {
    max-width: 90% !important;

}



tr:nth-child(even) {background-color: #f2f2f2;}
</style>
 
 






</head>






<body id="bodysellcorner">




@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


<div  class="container" style="background-color:#EEE8AA; "  >
  <span id="form_result"></span>
  <h2>Return Medicine </h2>
		<form method="post" action="{{ route('returnmedicinetransition.store') }}"   id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
		   <input type="hidden" id="sellerid" name="sellerid" value="1">
		   
		   <div  id="cusid"  class="row">
     Adimitted  Customer Id : 
            <div class="col-4">
	        <select id="customer_id"  class="form-control customer_id"  name="customer_id"     style='width: 270px;'>  
           
			
			</select>
             </div>
			 
			 
			 				   <div class="col-4">Registered Customer:  
	        <select id="regcustomer"  class="form-control "  name="regcustomer"     style='width: 300px;'>  
           
			
			</select>
             </div>
			 
			 
			 
			 <div class="col-4">
			 
			 
		Customer Medicine Due:<input type="text" name="dueamount" id="dueamount"  value="0"  class="form-control dueamount" readonly />
	
			 
			 </div>
			 
			 </div>
			 <br>
			 
			 <div class="row">
			 
			     <div class= " col-4">
      Date:<input  type="datetime-local" id="dataentry"  name="dataentry" value="{{date('Y-m-d H:i:s')}}" required >
  
    </div>
			 
			 
			 
			 			             <div class="col-4">

 <input type="radio" id="excus" name="excus" value="1">
  <label for="html">External Customer</label>		


             </div>
			 </div>
			 
			 
			 <table class="table" id="products_table">
                <thead>
                    <tr>
                        <th>Medicine</th>
                        <th  style="width:150px;" >Unit Price</th>
						<th  style="width:80px;" >Quan<br>tity</th>
				
						<th  style="width:80px;">Disc<br>ount(%)</th>
						
						<th>Discount(TK)</th>
						
					
						<th  >Adjusted<br>Price</th>
							<th  >Remove</th>
                    </tr>
                </thead>
                <tbody class="addmoreproduct">
                    <tr id="product0">
                        <td>
       <select id="medicine_name"  class="form-control medicine_name"  name="medicine_name[]"  required   style='width: 270px;'>  
  
		</select>
                        </td>
                        <td>
						  <input type="text"   name="unit_price[]" id="unit_price" class="form-control  unit_price" required  />
                           
                        </td>
						<td>
						  <input type="text" name="quantity[]" id="quantity" class="form-control quantity" required />
						</td>
						 <input type="hidden" id="stock" name="stock[]" class="stock" value="0">
					
						 <input type="hidden" name="vat[]" value="0" id="vat" class="form-control vat" />
						
						
					
						 <input type="hidden" name="vattk[]" value="0" id="vattk" class="form-control vattk" readonly />
						
						
						<td>
						<input type="text" name="discount[]" value="0" id="discount" class="form-control discount" />
						</td>
						
						
						
			            <td>
						<input type="text" name="totaldiscount[]" value="0" id="totaldiscount" class="form-control totaldiscount" readonly />
						</td>
			              <h1 id="messageforstock" style="color:red;" >  </h1> 

						
												
						
						<input type="hidden" name="amount[]" value="0" id="amount" class="form-control amount" readonly />
						
						<td>
						<input type="text" name="adjust[]" value="0" id="adjust" class="form-control adjust"  />
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
		   <button type="button" id="add_row" class="btn btn-primary">ADD Medicine</button>
		   
		   
		   
		   <div class="row">
		   
		   		   <div class="col-3">
		       Gross Amnt :<input type="text" readonly name="grossamount" id="grossamount"  value="0"  class="form-control grossamount"  />
		   </div>
		   
		   
		   <div class="col-3">
		Discount :
		
		<input type="text" name="totaladjust" id="totaladjust"  value="0"  class="form-control totalamount" readonly />
		  
		  </div>
		   
		   <div class="col-3">
		       Payable Amnt :<input type="text" name="totalamount" id="totalamount"  value="0"  class="form-control totalamount"  />
		   </div>
		   
		   	









	   	    <div class="col-3">
<span style="color:red;"> পরিশোধ -  </span><br>
<input type="radio" id="porishodnogod" name="porishod" value="1" required >
<label for="porishod">  নগদে  </label> <br>
<div id="p">
<input type="radio" id="porishod" name="porishod" value="2" required >
<label for="porishod">  প্যাসেন্টের বাকির সাথে এডজাস্ট করুন  </label>
</div>
    </div>
		   
		   
		   
		   </div>
		   
		   
		   
		<div class="row" >
Comment 
		<input type="text" name="comment" id="comment" autocomplete="off"  class="form-control comment"  />
		
</div>		
		   

		   
		   

        
   
           <br />
           <div class="form-group" align="center">
            <input type="hidden" value="Add" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>
         <span id="form_result_footer"></span>  

</div>
























<!----------------------------------------------------------------------------------- -->




<div class="table-responsive">
  <table id="patient_table"  class="table  table-success table-striped data-tablem">
      <thead>
          <tr>


    <th>Orer NO.</th>
  
              <th>Name</th>
      <th>Mobile</th>
    <th>Print</th> 
      <th>Date</th>
    <th>Action</th>
      
         
           
             
          </tr>
      </thead>
      <tbody   >

      </tbody>
  </table>
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








 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 <script src="{{asset('jquery_val/dist/jquery.validate.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">






	

	$(document).ready(function(){
	
	$("#formhide").hide();
	
	//////////////////////////// Show record 

    var table = $('#patient_table').DataTable({
		
	
	
	
        processing: true,
     serverSide: true,
		responsive: true,
	
        ajax: "{{ route('ReturnmedicinetransactionController.index') }}",
        columns: [
		

		 
		 
		
            
			
			
			{data: 'id', name: 'id'},
            {data: 'patient_name', name: 'patient.name'},
			 {data: 'patient_mobile', name: 'patient.mobile'},
			 

			 {data: 'pdf', name: 'pdf'},   
        {data: 'created', name: 'created'},
		
			    {data: 'action', name: 'action'}, 
        ]
    });





	///// clear modal data after close it 
$(".modal").on("hidden.bs.modal", function(){
    $("#category").html("");
	 $("#regcustomer").html(""); 
	  $(".medicine_name").val("");
	   $("#child").html("");

   $(".customer_id").html("");
   $(".unit_price").val(0);
  $(".quantity").val('');
  $(".vat").val(0);   
 $(".discount").val(0);   
  $(".paid").val(0); 
   $(".due").val(0); 
    $(".adjust").val(0); 
	$(".amount").val(0); 
	$(".totalamount").val(0); 
  



 $("#products_table tr:gt(1)").remove(); // remove all row whose index is greater than 1



 
 
  
	
 

	

});
///////////////////////////////
	

	
	
  $("#category").select2();
  
  $("#customer_name").select2();
    $("#customer_mobile").select2();
	  $("#customer_id").select2();
	    $('.medicine_name').select2();
		      $("#regcustomer").select2(""); 
    
       $("#cusname").hide();
	  $("#cusmobile").hide();


  
  
  
    $("#cid").click(function(){
     $("#cusname").hide();
	  $("#cusmobile").hide();
    $("#cusid").show();

  });
  
  
    $("#cname").click(function(){

	  $("#cusmobile").hide();
    $("#cusid").hide();
	$("#cusname").show();

  });
  
  
      $("#cmobile").click(function(){

    $("#cusid").hide();
	$("#cusname").hide();
	$("#cusmobile").show();

  });
  
  
  





    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	
     fetch();                

function fetch()
{

 $.ajax({
   url:"medicinetransition/mlist",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	   ////////////////////fetch data for Customer dropdown menu ////////////////////////////
	    $("#customer_id").html("");
	   
var optionforid = "<option value=''></option>";                   
  $("#customer_id").append(optionforid);

				   var len = 0;
                    if (response.patientdata != null) {
                        len = response.patientdata.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.patientdata[i].id;
                             var name = response.patientdata[i].name;
							  var mobile = response.patientdata[i].mobile;
                               var status = response.patientdata[i].booking_status;
							   var patientdue = response.patientdata[i].due;
							 var patienthospitalerkachepay = response.patientdata[i].dena;
                             var option = "<option value='"+id+"'>"+name+"</option>"; 
							  var optionforid = "<option data-patientdue='"+patientdue+"' data-patienthospitalerkachepay= '"+patienthospitalerkachepay+"'  data-id='"+id+"'   data-status='"+status+"'   value='"+id+"'>" +"ID: " +id+ " Name: (" +name + ") Mobile: "+ mobile +  "</option>"; 
							    var optionformobile = "<option value='"+id+"'>"+mobile+"</option>"; 

                             $("#customer_name").append(option);
							  $("#customer_id").append(optionforid);
							    $("#customer_mobile").append(optionformobile);
                        }
                    }
					
					
					
					
	
	    $("#regcustomer").html("");
	   
var optionforid = "<option value=''></option>";                   
  $("#regcustomer").append(optionforid);

				   var len = 0;
                    if (response.customerformedicine != null) {
                        len = response.customerformedicine.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.customerformedicine[i].id;
                             var name = response.customerformedicine[i].name;
							  var mobile = response.customerformedicine[i].mobile;
							   var patientdue = response.customerformedicine[i].due; 
							  var patienthospitalerkachepay = response.customerformedicine[i].dena;
                               var status = response.customerformedicine[i].booking_status;
                       
							  var optionforid = "<option data-patientdue='"+patientdue+"' data-patienthospitalerkachepay= '"+patienthospitalerkachepay+"'    data-val='"+id+"'   data-status='"+status+"'   value='"+id+"'>"+"ID: "+id+ "Name: "  +name + " Mobile: ("+ mobile + ")"+    "</option>"; 
							   

                            
							  $("#regcustomer").append(optionforid);
							
                        }
                    }

	
								
					
					
					
					
					
					
					
					
					
					
					
					
					
					
		  ////////////////////fetch data for Medicine  dropdown menu ////////////////////////////			
					
					///////////////////////   set first option value ///////////////////
					
						  $("#medicine_name").html("");
					
					var optionformedicine = "<option  ></option>"; 
               	$("#medicine_name").append(optionformedicine);
					
					
					///////////////////////   set dynamic select option values from Database ///////////////////
					
					
					                    var len = 0;
                    if (response.medicinedata != null) {
                        len = response.medicinedata.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.medicinedata[i].id;
                             var name = response.medicinedata[i].name;
							  var category = response.medicinedata[i].medicine_category.name;
					          var price= response.medicinedata[i].unitprice;
                              var stock = response.medicinedata[i].stock;
                             
				//////////////////////////////////// Set user dfeined atribute data-price//////			 
							 var optionformedicine = "<option    data-stock='"+stock+"' data-price='"+price+"' value='"+id+"'>" + name+ " ("+ category + ")"+  "</option>"; 
							 /////////////////////////////////////////////////////////////
							 
					

							 var optionforid = "<option value='"+id+"'>"+id+"</option>"; 
							   

                             $("#medicine_name").append(optionformedicine);
							  
                        }
                    }
               





			   }
				
				
	//////////////////////////////////////////////////////////////////////////////
  })

 	
	
}




$('.form-horizontal').delegate('.customer_id','change',function(){
var due = $('#customer_id option:selected').attr("data-patientdue");        
var id = $('#customer_id option:selected').attr("data-id"); 
$('#dueamount').val(due);
console.log(id);
$("#porishod").prop('checked', false);
	$("#porishodnogod").prop('checked', false);
if (id == 1)
{
		$("#porishod").prop('checked', false);
		$("#porishod").hide();
		$("#p").hide();
	$("#porishodnogod").prop('checked', true);
}
else{
	
			$("#porishod").prop('checked', false);
		$("#porishod").show();
		$("#p").show();
	$("#porishodnogod").prop('checked', false);
	
}






 $.ajax({
 url:"medicinetransition/findmeddue/"+id,
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	

	   
	   
                  
 
 var meddue = response.meddue;
$('#dueamount').val(meddue);

			   }
				

  })


















});






$('.form-horizontal').delegate('#regcustomer','change',function(){
var due = $('#regcustomer option:selected').attr("data-patientdue");        
var id = $('#regcustomer option:selected').attr("data-id"); 
$('#dueamount').val(due);
console.log(id);
$("#porishod").prop('checked', false);
	$("#porishodnogod").prop('checked', false);
if (id == 1)
{
		$("#porishod").prop('checked', false);
		$("#porishod").hide();
		$("#p").hide();
	$("#porishodnogod").prop('checked', true);
}
else{
	
			$("#porishod").prop('checked', false);
		$("#porishod").show();
		$("#p").show();
	$("#porishodnogod").prop('checked', false);
	
}


});

///////////////////////////////// insert value in unit price /////////////////////

$('.addmoreproduct').delegate('.medicine_name','change',function(){
	
	var tr= $(this).parent().parent();
	
	var stock= tr.find('.medicine_name option:selected').attr("data-stock");
	  
	var price= tr.find('.medicine_name option:selected').attr("data-price");
	
	
	tr.find('.unit_price').val(price);
	tr.find('.stock').val(stock);
	
	
	var price = parseFloat(tr.find('.unit_price').val()); // 2y bar price neya hoyeche karon jodi pore user pirce poriboron kore
var qun = parseFloat(tr.find(".quantity").val());










var discount = tr.find(".discount").val();
var vat = tr.find(".vat").val();



var total = Number(price) * Number(qun);
var total_amount_before_vat_dis = total;
//////////////////////// After Discount///////////////////////
var totaldiscount=(total * ( Number(discount)/100));
total= total- (total * ( Number(discount)/100));
tr.find('.totaldiscount').val(totaldiscount);

////////////////////////// After Adding Vat ////////////////////
var vattk = total * ( Number(vat)/100);
tr.find('.vattk').val(vattk);

total= total+ (total * ( Number(vat)/100));
	
		tr.find('.amount').val(total_amount_before_vat_dis);
tr.find('.adjust').val(total);
	totalamount();
	







});


////////////////////////////////////////keyup//////////////////////////////

$('.addmoreproduct').delegate('.unit_price, .quantity, .discount ,.vat','keyup',function(){

	var tr= $(this).parent().parent();
	var price = parseFloat(tr.find('.unit_price').val());
var qun = parseFloat(tr.find(".quantity").val());

var discount = (tr.find(".discount").val());
var vat = (tr.find(".vat").val());

var adjust = (tr.find(".adjust").val());
var stock =parseFloat(tr.find('.stock').val());
var productname= tr.find('.medicine_name option:selected').html();






	
calculationforinputfield();	




function calculationforinputfield(){

qun = tr.find(".quantity").val();

var total = Number(price) * Number(qun);

var total_discount_vat = total;

//////////////////////// After Discount///////////////////////
var totaldiscount=(total * ( Number(discount)/100));
total= total- (total * ( Number(discount)/100));
tr.find('.totaldiscount').val(totaldiscount);

////////////////////////// After Adding Vat ////////////////////
var vattk = total * ( Number(vat)/100);
tr.find('.vattk').val(vattk);

total= total+ (total * ( Number(vat)/100));

   

total=total.toFixed(2);
	console.log(total);
	
		tr.find('.amount').val(total_discount_vat);
		tr.find('.adjust').val(total);
totalamount();
}





});











//////////////////////////////////////////////// Adjusted Price //////////////////


$('.addmoreproduct').delegate('.adjust','change',function(){

var tr= $(this).parent().parent();





totalamount();







});
















/////////////////////////////////////////////////// calculate total amount  /////////////////////////////////////////

function totalamount(){
	
	var totalamountafteradjustment =0;
	$('.adjust').each(function(i,e){
		var amount = $(this).val()-0;
		 totalamountafteradjustment+=amount;
	});
	
	
		var totalamount =0;
	$('.amount').each(function(i,e){
		var amount = $(this).val()-0;
		totalamount+=amount;
	});
	

var the_amount_of_money_that_adjusted = (totalamount - totalamountafteradjustment).toFixed(2);
	
	  $("#totalamount").val(totalamountafteradjustment);
	   $("#totaladjust").val(the_amount_of_money_that_adjusted);
	    $("#grossamount").val(totalamount);
	   
	   
	
}


          $("#due_at_the_time_of_selling").change(function(){
     totalamount();


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



  /////////////////////////////////ADD Data //////////////////////////// 
   
   

$('#sample_form').on('submit', function(event){
  event.preventDefault();
  $('#action_button').attr("disabled", true);	
  if($('#action').val() == 'Add')
  {
    console.log('kkkkk');
   $.ajax({
    url:"{{ route('ReturnmedicinetransactionController.store') }}",
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
	  $('#action_button').attr("disabled", false);	
     }




$('#form_result').html(html);
$('#form_result').fadeIn();
$('#form_result').delay(1500).fadeOut();
$('#form_result_footer').html(html);
$('#form_result_footer').fadeIn();
$('#form_result_footer').delay(1500).fadeOut();

     fetch();
$("#products_table tr:gt(1)").remove();    
$('.medicine_name').select2();
		$("#formhide").hide();   
    }
   })
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('patientlist.update') }}",
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
 







 /////////////////////////////////////// Dynamically Add New row and Add New select2 for dynamically added new medicine name  ////////////////////////
 

  let row_number = 1;
    $("#add_row").click(function(e){
		
		
		      e.preventDefault();
      let new_row_number = row_number - 1;
	  
	  	   $latest_tr  = $('#product0');
   
     $latest_tr.find(".medicine_name").each(function(index)
    {
        $(this).select2('destroy');
    }); 
	  
      $('#product' + row_number).html($('#product0' ).html()).find('td:first-child');
	  
	   

	  
      $('.addmoreproduct').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
     

 
     
    
  $('.medicine_name').select2(); 
 
    
	
	
	});
 
 



  var user_id;

$(document).on('click', '.delete', function(){
 user_id = $(this).attr('id');
 $('#confirmModal').modal('show');
});

$('#ok_button').click(function(){
 $.ajax({
  url:"returnmedicinetransition/delete/"+user_id,
  beforeSend:function(){
   $('#ok_button').text('Deleting...');
  },
  success:function(data)
  {
   setTimeout(function(){
    $('#confirmModal').modal('hide');
    $('#user_table').DataTable().ajax.reload();
    fetch();
   }, 2000);
 
       $('#patient_table').DataTable().ajax.reload();
      $('#ok_button').text('Delete');
      fetch();
  }
 })
});








});
</script>
	  
</body>

@stop