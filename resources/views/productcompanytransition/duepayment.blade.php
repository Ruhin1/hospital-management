

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


    @if ($message = Session::get('success'))
        <div style="background-color:red;" class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
	
	
	
	
	
	
		<div  class="container" style="background-color:#EEE8AA; "  >
		<h2>Due Payment Point</h2>
  <span id="form_result"></span>
	
		<form method="post" action="{{ route('producttransition.index') }}"   id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
		   
		   
		   <div  id="cusid"  class="form-group">
            <label class="control-label col-md-4">Customer Id : </label>
            <div class="col-4">
	        <select id="customer_id"  class="form-control "  name="customer_id"  required   style='width: 270px;'>  
           
			
			</select>
             </div>
			 
			 

			 
			 
			 </div>
			 
			 
			 <div class="row">
			 			 <div class="col-4" >
			Customer Code   <input type="text"   name="customercode" id="customercode" class="form-control numbers  customercode" required readonly />
			 </div>
			 
			 
			 
			 			 
			 <div class="col-4" >
			Maximum Due Limit   <input type="text"  value="0" name="maximumduelimit" id="maximumduelimit" class="form-control numbers  maximumduelimit" required readonly  />
			 </div>
			 
			 
			 <div class="col-4" >
			Present Balance   <input type="text"  value="0" name="balance" id="balance" class="form-control numbers  balance" required readonly  />
			 </div>
			 
			 </div>
			 
			 <div id="formhide">
			 <table class="table" id="products_table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th  style="width:200px;"  >Unit Price</th>
						<th style="width:150px;" >Quan<br>tity</th>
				
						<th id="dis1"  style="width:80px;">Disc<br>ount(%)</th>
						
						<th    >Discount(TK)</th>
						
					
						<th style="width:200px;" >Adjusted<br>Price</th>
							
                    </tr>
                </thead>
                <tbody class="addmoreproduct">
                    <tr id="product0">
                        <td>
       <select id="medicine_name"  class="form-control medicine_name"  name="medicine_name[]"  required   style='width: 200px;'>  
  
		</select>
                        </td>
                        <td>
						  <input type="text" style="width:150px;" autocomplete="off"  name="unit_price[]" id="unit_price" class="form-control numbers  unit_price" required style='width: 100px;' />
                           
                        </td>
						<td>
						  <input type="text" style="width:150px;" name="quantity[]" autocomplete="off" id="quantity" class="form-control numbers quantity" required />
						</td>
						 <input type="hidden" id="stock" name="stock[]" class="stock" value="0">
						
						 <input type="hidden" name="vat[]" value="0" id="vat" class="form-control numbers vat" readonly />
						
						
						
						 <input type="hidden" name="vattk[]" value="0" id="vattk" class="form-control numbers vattk" readonly />
						
						
						<td>
						<input type="text" name="discount[]" value="0" id="discount" class="form-control numbers discount" />
						</td>
						
						
						
			            <td>
						<input type="text" name="totaldiscount[]" value="0" id="totaldiscount" class="form-control numbers totaldiscount" readonly />
						</td>
			             
						
												
						
						<input type="hidden" name="amount[]" value="0" id="amount" class="form-control numbers amount" readonly style='width: 100px;' />
						
						<td>
						<input type="text" style="width:200px;"  autocomplete="off" name="adjust[]" value="0" id="adjust" class="form-control numbers adjust" style='width: 100px;' />
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
		   
		   
		   <button type="button" id="add_row" class="btn btn-primary">ADD Product</button>
		   
		   <div class="container">
		   
		     <div class="row">
    <div id="dis2"   class="col-4 ">
      
	 Discount on Total:  <input type="text" name="percentofdicountontaotal" id="percentofdicountontaotal"  value="0"  class="form-control  percentofdicountontaotal"  />
		  
    </div>
    <div class="col-4">
      
 Gross Amount :  <input type="text" name="grossamount" id="grossamount"  value="0"  class="form-control  grossamount"  />
		  
    </div>
	
	    <div class="col-4">
      
 Discount :  <input type="text" name="discountatend" id="discountatend"  value="0"  class="form-control  discountatend" readonly  />
		  
    </div>
	
	 <input type="hidden" id="statusvalue" name="statusvalue" class="statusvalue" >
	
  </div>
		   
	<p>	   
  <div class="row">
    <div class="col-4">
      
		Paid:  <input type="text" name="paid" id="paid"  value="0"  autocomplete="off"   class="form-control numbers paid"  />
		  
    </div>
    <div class="col-4">
      
		Due:   <input type="text" name="due" id="due_at_the_time_of_selling" value="0" class="form-control numbers due" readonly />
		   
    </div>
    <div class="col-4">
       
	Receivable Amount	   <input type="text" name="totalamount" id="totalamount"  value="0" autocomplete="off"  class="form-control numbers totalamount"  />
		  
    </div>
  </div>
</div>
		   
		   
	
		   	
			
	
        
   
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action"  value="Add" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>
	</div>
			   <span id="form_result_footer"></span>  
<p>



</div>	

	

	
		<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
	
			<th>Serial NO.</th>
			<th>Orer NO.</th>
		
                <th>Name</th>
				
				<th>Amount</th>
			<th>Discount</th> 
				<th>Gross Amount</th>
			<th>Comment</th>
			<th>Debit</th>
<th>Credit</th>
<th>Balance</th>			
<th>print</th>
<th>Date</th>		
<th>Entryby</th>		     
 <th>Action</th>            
               
            </tr>
        </thead>
        <tbody   >

        </tbody>
    </table>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">





$(document).ready(function(){
	
	
	
	//////////////////////////// Show record 

    var table = $('#patient_table').DataTable({
		
	
		
        processing: true,
        serverSide: true,
		responsive: true,
	
        ajax: "{{ route('customerduetransition.index') }}",
        columns: [
		
		 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
		 
		 
		
            
			
			
			{data: 'id', name: 'id'},
            {data: 'customername', name: 'customer.name'},

			  {data: 'amount', name: 'amount'},
  {data: 'discount', name: 'discount'},
    {data: 'amountafterdiscount', name: 'amountafterdiscount'},
	  {data: 'comment', name: 'comment'},
	  	  {data: 'debit', name: 'debit'},
		  	  {data: 'credit', name: 'credit'},
			  	  {data: 'balance', name: 'balance'},
			 {data: 'pdf', name: 'pdf'},   
               {data: 'created', name: 'created'}, 
			     {data: 'entryby', name: 'User.name'},
			    {data: 'action', name: 'action'}, 
        ]
    });


	
	
	
	
	
	
	
	
	
	
/////////////////////////////// Replace non deimal number 
/////////////////////////////// Replace non deimal number 
$('.addmoreproduct').delegate('.numbers','change',function(){


    this.value = this.value.replace(/[^0-9\.]/g,'');
});	
	
fetch();





 $(window).keydown(function(event){
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









	///// clear modal data after close it 
$(".modal").on("hidden.bs.modal", function(){
    $("#category").html("");
	
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
	
                     

function fetch()
{

 $.ajax({
   url:"customerduetransition/dropdownlist",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	   ////////////////////fetch data for Customer dropdown menu ////////////////////////////
	    $("#customer_id").html("");
	   
var optionforcustomer = "<option value=''></option>";                   
  $("#customer_id").append(optionforcustomer);

				   var len = 0;
                    if (response.customer != null) {
                        len = response.customer.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.customer[i].id;
                             var name = response.customer[i].name;
							  var duelimit = response.customer[i].duelimit;
                               var customercode = response.customer[i].customercode;
                            var presentduebalance = response.customer[i].presentduebalance;
							
							  
							  
							  var optionforcustomer = "<option data-presentduebalance='"+presentduebalance+"' data-val='"+id+"'  data-customercode='"+customercode+"'   data-duelimit='"+duelimit+"'   value='"+id+"'>"+name+"</option>"; 
							  

							

                            
							  $("#customer_id").append(optionforcustomer);
                        }
                    }
					
		  ////////////////////fetch data for Medicine  dropdown menu ////////////////////////////			
					
					///////////////////////   set first option value ///////////////////
					
						  $("#medicine_name").html("");
					
					var optionformedicine = "<option  ></option>"; 
               	$("#medicine_name").append(optionformedicine);
					
					
					///////////////////////   set dynamic select option values from Database ///////////////////
					
					
					                    var len = 0;
                    if (response.productdata != null) {
                        len = response.productdata.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.productdata[i].id;
                             var name = response.productdata[i].name;
							 
					          var price= response.productdata[i].unitprice;
                              var stock = response.productdata[i].stock;
                             
				//////////////////////////////////// Set user dfeined atribute data-price//////			 
							 var optionformedicine = "<option    data-stock='"+stock+"' data-price='"+price+"' value='"+id+"'>"+name+"</option>"; 
							 /////////////////////////////////////////////////////////////
							 
					


							   

                             $("#medicine_name").append(optionformedicine);
							  
                        }
                    }
               





			   }
				
				
	//////////////////////////////////////////////////////////////////////////////
  })

 	
	
}



function refresh(){
	
$('#sample_form')[0].reset();

fetch();
$("#products_table tr:gt(1)").remove();

 $('.medicine_name').select2();	
	
}


   ///////// show the modal//////////////////////////////////////////////////////////////////////////////// 
    $(document).on('click', '.create_record', function(){
		  $('#form_result').html('');
    $('.modal-title').text("Add New Record");
     $('#action_button').val("Add");
     $('#action').val("Add");
       $('#formModal').modal('show');
 

 



 

 
 
 
 
 
 
 
 
 
 
 
 
 
 });


// // if patient is admitted patient then no discount from here 

$('#sample_form').delegate('#customer_id','change',function(){

 var duelimit = $('#customer_id option:selected').attr("data-duelimit");
 var presentdue = $('#customer_id option:selected').attr("data-presentduebalance");
 var customercode = $('#customer_id option:selected').attr("data-customercode"); 
 var val = $('#customer_id option:selected').attr("data-val");


	$('#maximumduelimit').val(duelimit);
		$('#balance').val(presentdue);
		$('#customercode').val(customercode);
totalamount();

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





if(qun > stock )  //// jodi stocke thaka maler ceye quantity beshi hoy
{

	 $("#messageforstock").html('চাহিদাকৃত '+productname+ 'এর ' +qun+  ' ইউনিট এভেইলএবল নেই । স্টকে থাকা পরিমাণ :'+stock+'ইউনিট ');
	

	tr.find(".quantity").val('');
	
			tr.find('.amount').val('');
			
		var d = tr.find('.amount').val();
		console.log("b1");
tr.find('.adjust').val('');
	totalamount();
	
	setTimeout(function() {
  $("#messageforstock").html('');
}, 5000);
	 
	
	
	
}
else{




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
	
}






});


////////////////////////////////////////keyup//////////////////////////////





$('.addmoreproduct').delegate('.unit_price, .quantity, .discount ,.vat','change',function(){



	var tr= $(this).parent().parent();
	var price = parseFloat(tr.find('.unit_price').val());
var qun = parseFloat(tr.find(".quantity").val());

var discount = (tr.find(".discount").val());
var vat = (tr.find(".vat").val());

var adjust = (tr.find(".adjust").val());
var stock =parseFloat(tr.find('.stock').val());
var productname= tr.find('.medicine_name option:selected').html();

if(qun > stock ) 
{
	alert( productname+ 'এর ' +qun+  ' ইউনিট এভেইলএবল নেই । স্টকে থাকা পরিমাণ :'+stock+'ইউনিট ');
	 
	
	tr.find(".quantity").val('');
	var d= 	tr.find(".amount").val('0');
		
	
tr.find('.adjust').val('');
	totalamount();
	
	

calculationforinputfield();
		
}
else{
	
calculationforinputfield();	
}



function calculationforinputfield(){

qun = tr.find(".quantity").val();

var total = Number(price) * Number(qun);
var grossprice = total;
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
	console.log(total);
	
		tr.find('.amount').val(grossprice);
		tr.find('.adjust').val(total);
totalamount();
}



});











//////////////////////////////////////////////// Adjusted Price //////////////////


$('.addmoreproduct').delegate('.adjust','change',function(){

var tr= $(this).parent().parent();
var adjust = parseFloat( tr.find(".adjust").val());

var total = parseFloat(tr.find('.amount').val());
var vat =parseFloat( tr.find(".vat").val());

var price = parseFloat(tr.find('.unit_price').val());
var qun = parseFloat(tr.find(".quantity").val());
var discount = parseFloat(tr.find(".discount").val());



var netprice_before_adding_vat_and_discount  = parseFloat(price*qun);

 var netprice_after_initial_discount = ( netprice_before_adding_vat_and_discount- (netprice_before_adding_vat_and_discount * (discount/100)))

var amount_discount = parseFloat(  netprice_before_adding_vat_and_discount *  (discount/100 ));



var adjust_minus_price_after_initial_discount_and_vat = parseFloat(total-adjust);




var hundr = 100; 
parseFloat(hundr);


var vat_that_taken_on_adjust = parseFloat((vat * adjust)/parseFloat ( hundr+vat ) ); //new vat 



tr.find('.vattk').val(vat_that_taken_on_adjust.toFixed(4));

var price_after_additional_discount_and_excluding_vat = parseFloat(adjust-vat_that_taken_on_adjust);




var amount_of_additional_discount = parseFloat( 
   netprice_after_initial_discount  - price_after_additional_discount_and_excluding_vat );
// new discount 



var amount_of_discount_that_means_addition_of_discount_that_was_given_in_two_stage = parseFloat( amount_discount + amount_of_additional_discount ); 





tr.find('.totaldiscount').val(amount_of_discount_that_means_addition_of_discount_that_was_given_in_two_stage.toFixed(4));



totalamount();







});
















/////////////////////////////////////////////////// calculate total amount  /////////////////////////////////////////

function totalamount(){
	
	
	var percentage_discount_on_total = $('#percentofdicountontaotal').val();
	
		if ( (percentage_discount_on_total == 0 ) || (percentage_discount_on_total == '' ) )
	{
		$('#percentofdicountontaotal').val(0);
	var totalamount =0;
	$('.adjust').each(function(i,e){
		var amount = $(this).val()-0;
		totalamount+=amount;
		
	});
	
	var grosstotalamount=0
		$('.amount').each(function(i,e){
		var amountgross = $(this).val()-0;
		
		grosstotalamount+=amountgross;
	
	});
var a = grosstotalamount - totalamount;
	$("#discountatend").val(a);
	$("#grossamount").val(grosstotalamount);
	$("#totalamount").val(totalamount);
	$('#dicountontaotal').val(0);
}
else 
{
	
	var totalamount =0;
	$('.amount').each(function(i,e){
		var amount = $(this).val()-0;
		console.log(amount);
		totalamount+=amount;
	
	});	
	
	var b = totalamount;
		var a = (totalamount * (percentage_discount_on_total/100));
	  totalamount = totalamount - a ;
	  $('#dicountontaotal').val(a);
		$("#totalamount").val(totalamount);
	$("#grossamount").val(b);
	
	$("#discountatend").val(a);
}	
	

	  	var paid = $("#paid").val();
	var due = totalamount- Number(paid);
	
	var maxduelmt=	parseFloat($('#maximumduelimit').val());
	var presentdue= 	parseFloat($('#balance').val());
	
	var currentdue= presentdue + due;
	


	if ( currentdue > maxduelmt )
	{
		
		alert(" ম্যাক্সিমাম ডিউ লিমিট অতিক্রম করেছে । তাই ট্রাঞ্জিশন সম্ভব না।  ");
		refresh();
		
		
	}
	else{
	  $("#due_at_the_time_of_selling").val(due);
	  
	}
	  
	  

	
}




















  $("#percentofdicountontaotal").change(function(){
     this.value = this.value.replace(/[^0-9\.]/g,'');
	 totalamount();


  });








          $("#paid").change(function(){
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
  if($('#action').val() == 'Add')
  {
   $.ajax({
    url:"{{ route('producttransition.store') }}",
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
	 
	      if(data.error)
     {
      html = '<div class="alert alert-danger">' + data.error + '</div>';
      $('#sample_form')[0].reset();
      $('#patient_table').DataTable().ajax.reload();
     }
	 
$('#form_result').html(html);

$('#form_result').fadeIn();
$('#form_result').delay(1500).fadeOut();

$('#form_result_footer').html(html);

$('#form_result_footer').fadeIn();
$('#form_result_footer').delay(1500).fadeOut();



fetch();


 $("#products_table tr:gt(1)").remove();
 
 //remover por select2 dite hobe 
 $('.medicine_name').select2();
	
	 
	 
	 
	 
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
 
 

//////////////////////////////////////// code to read selected table row cell data (values) to print invoice


    
    $("#patient_table").on('click','.btnSelect',function(){
		
	


		
		
         // get the current row
         var currentRow=$(this).closest("tr"); 
		 
		 
		 	var e= currentRow.find("td .n").text();
		console.log(e);
		 
		          var order_no =currentRow.find("td:eq(0)").text();
         
         var seller_name =currentRow.find("td:eq(1)").text();
		 // get current row 2nd  TD value
         var patient_name =currentRow.find("td:eq(2)").text(); 
		 var paid =currentRow.find("td:eq(3)").text(); 
		 var due =currentRow.find("td:eq(4)").text(); 
		 var date =currentRow.find("td:eq(5)").text();             
		   var totalinvoiceMPR =currentRow.find("td:eq(6)").text(); 
		  var totalinvoicediscount =currentRow.find("td:eq(7)").text(); 
		  var totalvoicevat =currentRow.find("td:eq(8)").text(); 
		   var totalinvoice_total_amount_including_vat_discount  =currentRow.find("td:eq(9)").text(); 
		 
		 
		
         var producttable=currentRow.find("td:eq(11)").html(); // get current row 8th TD
		          
		        
				 
				 
					
					
				
				
					
					
					
         
		 $('#invoicepatientname').html(patient_name);
		 $('#invoicepatientdue').html(due);
		 $('#invoicevat').html(totalvoicevat);
		 $('#invoicepatienttotal').html(totalinvoice_total_amount_including_vat_discount);
		 $('#invoicepatientdiscount').html(totalinvoicediscount);
		  $('#invoicepatientdate').html(date);
		  $('#invoicepatientorderno').html(order_no);
		   $('#invoicepatientseller').html(seller_name);
		     $('#invoicepatientmpr').html(totalinvoiceMPR);
		   
	  

		 $('#m').html(producttable);
       
    });


 var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"producttransition/destroy/"+user_id,
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





});
</script>
	  
</body>

@stop