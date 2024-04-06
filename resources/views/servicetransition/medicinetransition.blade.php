

@extends('layout.main')

@section('content')



<style>
.modal-lg {
    max-width: 90% !important;

}
</style>
 
 






</head>






<body>








<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
    <h1>User Group List</h1>
    <a style="float:right; margin-bottom:20px;" class="btn btn-success create_record" href="javascript:void(0)" id="create_record"> Add New </a>
	
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
	<th>No.</th>
			<th> Tarns ID</th>
		
			<th>Seller</th>
			<th>customer</th>
			<th>Customer ID</th>
			<th>Medicine</th>
			<th>Unit Price</th>
                <th>Unit</th>
				<th>Vat</th>
				<th>Paid</th>
				<th>Discount</th>
				<th>Due</th>
				<th>Date</th>
				
				
				
			     
             
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

<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog  modal-lg">
  <div class="modal-content modal-xl">
   <div class="modal-header ">
          <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class=" modal-body modal-xl  ">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
		   <input type="hidden" id="sellerid" name="sellerid" value="1">
		   
		   <div  id="cusid"  class="form-group">
            <label class="control-label col-md-4">Customer Id : </label>
            <div class="col-md-8">
	        <select id="customer_id"  class="form-control "  name="customer_id"  required   style='width: 270px;'>  
           
			
			</select>
             </div>
			 </div>
			 
			 
			 <table class="table" id="products_table">
                <thead>
                    <tr>
                        <th>Medicine</th>
                        <th  style="width:100px;" >Unit Price</th>
						<th  style="width:80px;" >Quan<br>tity</th>
						<th  style="width:80px;"  >Vat%</th>
						<th  style="width:80px;"  >Vat(TK)</th>
						<th  style="width:80px;">Disc<br>ount(%)</th>
						
						<th>Discount(TK)</th>
						<th style="width:150px;" >Price</th>
						<th style="width:150px;" >Adjusted<br>Price</th>
                    </tr>
                </thead>
                <tbody class="addmoreproduct">
                    <tr id="product0">
                        <td>
       <select id="medicine_name"  class="form-control medicine_name"  name="medicine_name[]"  required   style='width: 270px;'>  
  
		</select>
                        </td>
                        <td>
						  <input type="text" name="unit_price[]" id="unit_price" class="form-control  unit_price" />
                           
                        </td>
						<td>
						  <input type="text" name="quantity[]" id="quantity" class="form-control quantity" />
						</td>
						
						<td>
						 <input type="text" name="vat[]" value="0" id="vat" class="form-control vat" />
						</td>
						
						<td>
						 <input type="text" name="vattk[]" value="0" id="vattk" class="form-control vattk" readonly />
						</td>
						
						<td>
						<input type="text" name="discount[]" value="0" id="discount" class="form-control discount" />
						</td>
						
						
						
			            <td>
						<input type="text" name="totaldiscount[]" value="0" id="totaldiscount" class="form-control totaldiscount" readonly />
						</td>
						

						
												
						<td>
						<input type="text" name="amount[]" value="0" id="amount" class="form-control amount" readonly />
						</td>
						<td>
						<input type="text" name="adjust[]" value="0" id="adjust" class="form-control adjust"  />
						</td>

						
                    </tr>
                    <tr id="product1"></tr>
                </tbody>
            </table>
			 
			 
			 
			 
			 
			 
			
		   <div id="child">
		   
		   </div>
		   <button type="button" id="add_row" class="btn btn-primary">ADD Medicine</button>
		   
		   	
			
			<div class="form-group">
            <label class="control-label col-md-4" > Paid : </label>
            <div class="col-md-8">
             <input type="text" name="paid" id="paid" class="form-control" />
            </div>
           </div>
		   

		   
		   	<div class="form-group">
            <label class="control-label col-md-4" > Due : </label>
            <div class="col-md-8">
             <input type="text" name="due" id="due" value="0" class="form-control" />
            </div>
           </div>
		   
		   		   	<div class="form-group">
            <label class="control-label col-md-4" > Total Amount : </label>
            <div class="col-md-8">
             <input type="text" name="totalamount" id="totalamount" class="form-control totalamount" readonly />
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








 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 <script src="{{asset('jquery_val/dist/jquery.validate.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">





$(document).ready(function(){
	


     


	///// clear modal data after close it 
$(".modal").on("hidden.bs.modal", function(){
    $("#category").html("");
	
	
  $(".customer_id").html("");

 
   $(".unit_price").val(0);
  $(".quantity").val(0);
  $(".vat").val(0);   
 $(".discount").val(0);   
  $(".paid").val(0); 
   $(".due").val(0); 
    $(".total").val(0); 
 
  
	
	

});
///////////////////////////////
	

	
	
  $("#category").select2();
  
  $("#customer_name").select2();
    $("#customer_mobile").select2();
	  $("#customer_id").select2();
	    $('.medicine_name').select2();
		 

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
	
                     


     var table = $('#patient_table').DataTable({
		
	
	
        processing: true,
        serverSide: true,
		responsive: true,
	
        ajax: "{{ route('medicinetransition.index') }}",
	
        columns: [
		
		 
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
		  
            {data: 'id', name: 'id'},
			
    
	  {data: 'seller_name', name: 'seller_name.name'},
	   {data: 'unit', name: 'medicinetransitions.vat'},
			 
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
   url:"medicinetransition/mlist",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	   ////////////////////fetch data for Customer dropdown menu ////////////////////////////
var optionforid = "<option value='0'>External Customer</option>";                   
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

                             var option = "<option value='"+id+"'>"+name+"</option>"; 
							  var optionforid = "<option value='"+id+"'>"+id+"</option>"; 
							    var optionformobile = "<option value='"+id+"'>"+mobile+"</option>"; 

                             $("#customer_name").append(option);
							  $("#customer_id").append(optionforid);
							    $("#customer_mobile").append(optionformobile);
                        }
                    }
					
		  ////////////////////fetch data for Medicine  dropdown menu ////////////////////////////			
					
					///////////////////////   set first option value ///////////////////
					var optionformedicine = "<option  >select one</option>"; 
               	$("#medicine_name").append(optionformedicine);
					
					
					///////////////////////   set dynamic option values from Database ///////////////////
					
					
					                    var len = 0;
                    if (response.medicinedata != null) {
                        len = response.medicinedata.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.medicinedata[i].id;
                             var name = response.medicinedata[i].name;
					          var price= response.medicinedata[i].unitprice;

                             
				//////////////////////////////////// Set user dfeined atribute data-price//////			 
							 var optionformedicine = "<option  data-price='"+price+"' value='"+id+"'>"+name+"</option>"; 
							 /////////////////////////////////////////////////////////////

							 var optionforid = "<option value='"+id+"'>"+id+"</option>"; 
							   

                             $("#medicine_name").append(optionformedicine);
							  
                        }
                    }
               





			   }
				
				
	//////////////////////////////////////////////////////////////////////////////
  })

 
 

 
 
 
 
 
 
 
 
 
 });








///////////////////////////////// inser value in unit price /////////////////////

$('.addmoreproduct').delegate('.medicine_name','change',function(){
	
	var tr= $(this).parent().parent();
	
	var price= tr.find('.medicine_name option:selected').attr("data-price");
	  
	
	tr.find('.unit_price').val(price);
	
	var price = tr.find('.unit_price').val();
var qun = tr.find(".quantity").val();
var discount = tr.find(".discount").val();
var vat = tr.find(".vat").val();



var total = Number(price) * Number(qun);

//////////////////////// After Discount///////////////////////
var totaldiscount=(total * ( Number(discount)/100));
total= total- (total * ( Number(discount)/100));
tr.find('.totaldiscount').val(totaldiscount);

////////////////////////// After Adding Vat ////////////////////
var vattk = total * ( Number(vat)/100);
tr.find('.vattk').val(vattk);

total= total+ (total * ( Number(vat)/100));
	
		tr.find('.amount').val(total);
tr.find('.adjust').val(total);
	totalamount();
	
});


////////////////////////////////////////keyup//////////////////////////////

$('.addmoreproduct').delegate('.unit_price, .quantity, .discount ,.vat','keyup',function(){

	var tr= $(this).parent().parent();
	var price = tr.find('.unit_price').val();
var qun = tr.find(".quantity").val();
var discount = tr.find(".discount").val();
var vat = tr.find(".vat").val();
var adjust = tr.find(".adjust").val();




var total = Number(price) * Number(qun);

//////////////////
 var totaldiscount = ((total * ( Number(discount)/100)));
 tr.find('.totaldiscount').val(totaldiscount);
//////////////////////// After Discount///////////////////////
total= total- totaldiscount;


////////////////////////// After Adding Vat ////////////////////
var vattk = total * ( Number(vat)/100);
tr.find('.vattk').val(vattk);

total= total+ (total * ( Number(vat)/100));

total=total.toFixed(2);
	
	
		tr.find('.amount').val(total);
		tr.find('.adjust').val(total);
totalamount();
});

//////////////////////////////////////////////// Adjusted Price //////////////////


$('.addmoreproduct').delegate('.adjust','change',function(){

var tr= $(this).parent().parent();
var adjust = parseFloat( tr.find(".adjust").val());

var total = parseFloat(tr.find('.amount').val());
var vat = tr.find(".vat").val();

var price = tr.find('.unit_price').val();
var qun = tr.find(".quantity").val();
var discount = tr.find(".discount").val();


var netprice_before_adding_vat_and_discount  = parseFloat(price*qun);




var reducing_amount_by_adjustment = parseFloat((total - adjust));


var discount_on_previous_net_price = netprice_before_adding_vat_and_discount * Number(discount)/100;

var total_new_discount_after_adjustment = discount_on_previous_net_price + reducing_amount_by_adjustment;

total_new_discount_after_adjustment = total_new_discount_after_adjustment.toFixed(3);




///////////////////////////// Adjust vat ///////////////////

///// if adjusted price is less than previous price (price field) //////////////////

var new_net_price_after_reducing_price_in_adjust_filed = parseFloat((netprice_before_adding_vat_and_discount - total_new_discount_after_adjustment));

console.log(new_net_price_after_reducing_price_in_adjust_filed);
var new_vat_amount =  (new_net_price_after_reducing_price_in_adjust_filed * ( Number(vat)/100));

tr.find('.vattk').val(new_vat_amount);









/////////////////////////// adjusting total amount of vat according to the adjusted price ///////////////





tr.find('.totaldiscount').val(total_new_discount_after_adjustment);










});
















/////////////////////////////////////////////////// calculate total amount  /////////////////////////////////////////

function totalamount(){
	
	var totalamount =0;
	$('.amount').each(function(i,e){
		var amount = $(this).val()-0;
		totalamount+=amount;
	});
	
	var due= $("#due").val();
	var paid = totalamount- Number(due);
	  $("#paid").val(paid);
	  $("#totalamount").val(totalamount);
	
}


          $("#due").change(function(){
     totalamount();


  });







  /////////////////////////////////ADD Data //////////////////////////// 
   
   

$('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
   $.ajax({
    url:"{{ route('medicinetransition.store') }}",
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
 







 /////////////////////////////////////// Add New select2 for dynamically added new medicine name  ////////////////////////
 

  let row_number = 1;
    $("#add_row").click(function(e){
		
		
		      e.preventDefault();
      let new_row_number = row_number - 1;
	  
	  	   $latest_tr  = $('#product0');
   
     $latest_tr.find(".medicine_name").each(function(index)
    {
        $(this).select2('destroy');
    }); 
	  
      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
	  
	   

	  
      $('.addmoreproduct').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
     

  
     
  $('.medicine_name').select2(); 
    
 
    
	
	
	});
 
 










});
</script>
	  


@stop