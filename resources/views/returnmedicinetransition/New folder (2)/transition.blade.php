

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

<!-------------------------------------------- invoice model---------------------------------   -->



<div class="modal fade" id="invoicemodel"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">


  <div   class="modal-dialog">

    <div        class="modal-content">
  <b    style="font-size:40px; color:red; float:right;" ><a href="{{url('medicinetransition')}}"> × </a></b>
      <div  id="invoicemodelcontent" class="modal-body">
<div  style="margin-left: 20px;"  id="invoicemodelprint" >

  <img src="img/Logo.jpg" >
  
  <br>
  <b style=" margin: 0 auto;"><u>Money Receipt</u></b>  </br>

<b >Order No:</b> <span id="invoicepatientorderno"> </span> 
<b style="margin-left: 200px;">Date:</b> <span id="invoicepatientdate"> </span>  <br>

		  <div id="headerinvoice" > 
<b>Customer Name:</b> <span id="invoicepatientname"> </span>  <br>
</div>

  
<div  style="width:10px;" class="print-container" id="m">

</div>
			   
<div  id="invoicefooter">
Due:<label>&nbsp;<span id="invoicepatientdue"> </span> </label><br>
MPR<span style="font-size:10px;">(Excluding Vat and Tax)</span>:<span id="invoicepatientmpr"> </span>  <br>
Discount:<span id="invoicepatientdiscount"> </span>  <br>

Vat:<span id="invoicevat"> </span> <br>
<b>Total:<span id="invoicepatienttotal"> </span> </b>
<b style="margin-left: 200px;">Seller:</b><span id="invoicepatientseller"> </span>    
</div>
</div>

			  </div>
        </td>
        <td></td>
    </tr>
</tbody></table>

	   <div class="footer">
                    <table width="100%">
                        <tbody><tr>
         <button onclick="myFunction()">Print</button>
                        </tr>
                    </tbody></table>
                </div>
      </div>
	  


    </div>
  </div>



































<!----------------------------------------------------------------------------------- -->






<div    class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
    <h1> বিক্রিকৃত ঔষধ  ফেরত নেয়াঃ </h1>
    <a style="float:right; margin-bottom:20px;" class="btn btn-success create_record" href="javascript:void(0)" id="create_record"> Add New </a>
	
	
	<div   class="table-responsive">
    <table   id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
	        <th>No.</th>
			<th>Seller</th>
			<th>Customer</th>
		
			
				<th>Date</th>

     	
		<th>Total MPR<br> <span style="font-size:6px;"> without discount and vat</span>  </th>
		<th> Total Discount</th>
		<th> Total Vat</th>
		<th>Total<span style="font-size:6px;"> includin discount and vat</span>  </th>
		<th>Products</th>	
			
            </tr>
        </thead>
        <tbody   >
		
		@foreach ($order as $u) 
 
	
		<tr>
    <td> {{$u->id}} </td>                   

    <td> {{$u->user->name}} </td>
    <td>{{$u->patient->name}}</td>
	  

  	
 <td>{{$u->created_at}}</td>


<!----------------------- First ---------------------->


<?php   $sum_of_total_discount=0;
$sum_of_total_vat =0; 
$sum_of_MPR = 0;?>
@foreach ($u->returnmedicinetransaction as $role) 

<?php 
 $sum_of_total_discount += $role->totaldiscount ;
$sum_of_total_vat +=  $role->totalvat ;


$MPR =  $role->medicine->unitprice * $role->unit;
$sum_of_MPR += $MPR;
$total_cost = $MPR + $role->totalvat - $role->totaldiscount ; 

?>



@endforeach
  
<!---------------------------------------------------------->


<td> <?php echo    number_format((float)$sum_of_MPR, 2, '.', '') ;  ?> </td>


<td> <?php echo      number_format((float)$sum_of_total_discount, 2, '.', '') ;  ?> </td>

<td> <?php echo  number_format((float)$sum_of_total_vat, 2, '.', '')  ;  ?> </td>
<td>{{$u->total}}</td> 
 
 
 
 
 
 
 
 
 
 
 <td>
<table>


		<thead>
		<th>Medicine</th>
			<th>Unit Price</th>
            <th>Unit</th>
		    <th>Vat  <span style="font-size:5px; color:red;">বাবদ ফেরত দেয়া টাকা</span> </th>
			<th>Discount  <span style="font-size:5px; color:red;">বাবদ যে পরিমাণ টাকা মূল দামের কেটে রাখা হচ্ছে  হচ্ছে</span> </th>
			<th>MPR</th>
			<th>  ফেরত </span> <br><span style="font-size:5px" >Including Tax and Discount </span> </th>
</thead>

<?php   $sum_of_total_discount=0;
$sum_of_total_vat =0; 
$sum_of_MPR = 0;?>
@foreach ($u->returnmedicinetransaction as $role) 

<?php 
 $sum_of_total_discount += $role->totaldiscount ;
$sum_of_total_vat +=  $role->totalvat ;


$MPR =  $role->medicine->unitprice * $role->unit;
$sum_of_MPR += $MPR;
$total_cost = $MPR + $role->totalvat - $role->totaldiscount ; 

?>


<tr  style="border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">
<td  style="border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">{{$role->medicine->name}}</td>
			<td  style="border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;"> {{ $role->medicine->unitprice}}</td>  
            <th   style="border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">{{ $role->unit}}</th>
		    <th   style="border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">{{ $role->totalvat}}</th>
			<th   style="border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">{{ $role->totaldiscount}}</th>
		
				<th   style="border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;"><?php echo    number_format((float)$MPR, 2, '.', '');  ?></th>
	
				<th   style="border: 1px solid #dddddd;
  text-align: left;   
  padding: 8px;"><?php echo  number_format((float)$total_cost, 2, '.', '') ; ?></th>
	</tr>
	
	
	
	
	
	
	
	
@endforeach	
</table>

</td>
 
 
 
 
 
 
 
 
 
 
 </tr>
@endforeach
		
		
		
		
		
		
		

	    
	


 

        </tbody>
    </table>
	</div>
</div>
</div>


</div>


  	 <div style= "float:right;" >
	{{$order->links("pagination::bootstrap-4")}}
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
         <form method="post" action="{{ route('returnmedicinetransition.store') }}"   id="sample_form" class="form-horizontal" enctype="multipart/form-data">
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
						<th style="width:150px;" >price </th>
					
						<th style="width:150px;" >Adjusted<br>Price</th>
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
			              <h1 id="messageforstock" style="color:red;" >  </h1> 

						
												
						<td>
						<input type="text" name="amount[]" value="0" id="amount" class="form-control amount" readonly />
						</td>
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
		   
		   		   		   	<div class="form-group">
            <label class="control-label col-md-4" > Total Adjust : </label>
            <div class="col-md-8">
             <input type="text" name="totaladjust" id="totaladjust"  value="0"  class="form-control totalamount" readonly />
            </div>
           </div>
		   	
			

		   
		   		   	<div class="form-group">
            <label class="control-label col-md-4" > Total Amount : </label>
            <div class="col-md-8">
             <input type="text" name="totalamount" id="totalamount"  value="0"  class="form-control totalamount"  />
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">





$(document).ready(function(){
	

	



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
					
						  $("#medicine_name").html("");
					
					var optionformedicine = "<option  >select one</option>"; 
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
					          var price= response.medicinedata[i].unitprice;
                              var stock = response.medicinedata[i].stock;
                             
				//////////////////////////////////// Set user dfeined atribute data-price//////			 
							 var optionformedicine = "<option    data-stock='"+stock+"' data-price='"+price+"' value='"+id+"'>"+name+"</option>"; 
							 /////////////////////////////////////////////////////////////
							 
					

							 var optionforid = "<option value='"+id+"'>"+id+"</option>"; 
							   

                             $("#medicine_name").append(optionformedicine);
							  
                        }
                    }
               





			   }
				
				
	//////////////////////////////////////////////////////////////////////////////
  })

 
 

 
 
 
 
 
 
 
 
 
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
	
		tr.find('.amount').val(total);
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
	

var the_amount_of_money_that_adjusted = totalamount - totalamountafteradjustment;
	
	  $("#totalamount").val(totalamountafteradjustment);
	   $("#totaladjust").val(the_amount_of_money_that_adjusted);
	
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
   
   

$('#je form select korte hobe ').on('submit', function(event){
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
 
 










});
</script>
	  
</body>

@stop