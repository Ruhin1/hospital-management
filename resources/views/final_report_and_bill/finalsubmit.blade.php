@extends('layout.main')

@section('content')


<style>


body{
	
	width:100%;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}






</style>
</head>
<body  style="width:100%">


<div  style="margin-left:20px;"  id="information">
<br>

<div class="container">
  <div class="row">
    <div class="col-3">
      Patient Name: {{$data->name}}</b>
    </div>
    <div class="col-2">
      Patient ID: {{$data->id}}
    </div>
    <div class="col-2">
      Age: {{$data->age}}
    </div>
	    <div class="col-2">
    Source: {{$sourcename}} 
    </div>
	<div class="col-3">
     Date:<?php echo date("Y/m/d") ;  ?>
    </div>
	
  </div>
</div>
<hr>
<br>
<B STYLE="FONT-SIZE:15PX; margin:40px;">Cost Table</B>
<table class="table">
  <tr>
    <th  style=" font-size:14px;" >Service/Product Name </th>
    <th style=" font-size:14px;">Gross <br>Price</th>
 <th style=" font-size:14px;">VAT(TK)</th>
  <th style=" font-size:14px;">Disc(TK)</th>
  <th style=" font-size:14px;">Due(TK)</th>  
	 <th style=" font-size:14px;"> Final<br> Price </th> 
	 <th style=" font-size:14px;" >Commission</th>
  </tr>
  
 
  <tr scope="row">  
    <td> Medicine</td>
   
   <td> {{$totalmedibeforeadjusting}} </td>
	 <td> {{$mvat}}  </td>
	 <td> {{$mdiscount}} </td>
	 	 <td>{{$meddue}}</td>
	 <td> {{$mtotal}}</td>
  <td>0</td>
  </tr>
  
    <tr scope="row">
    <td>Admission Fees</td>
   
    <td>  {{$cabineadmissionfee}} </td>
	 <td>  0 </td>
	 <td> 0 </td>
	 <td>0</td>
	 <td> {{$cabineadmissionfee}} </td>
	 <td>0</td>
  </tr>
  
  <tr scope="row">
    <td>Cabine/Bed Fare</td>
   
    <td>  <?php echo    $tcabinecharge ; ?>         </td>
	 <td>  {{$cabinevat}} </td>
	 <td> {{$cabinediscount}} </td>
	 	 <td> {{$cabinedue}} </td>
	 <td> <?php echo    $tcabinecharge ; ?> </td>
	 <td>{{$cabinecommission}}</td>
  </tr>
  
  
    <tr scope="row">
    <td>Doctor's Visits Fees</td>
   
    <td>  {{$dtotal}}</td>
	 <td>0 </td>
	 <td>0 </td>
	 <td>{{$doctordue}}</td>
	 <td>{{$dtotal}}</td>
     <td>0</td>
  </tr>
    <tr scope="row">
    <td> Pathological Tests</td>
   
    <td> {{$totalpathobeforeadjusting}}  </td>
	 <td>  {{$rvat}}</td>
	 <td>  {{$rdiscount}}</td>
	 	 <td>{{$reportorderdue}}</td>
	 <td>  {{$rtotal}}</td>
     <td>{{$reportcommission}} </td>
  </tr>
  
      <tr scope="row">
    <td> Surgery </td>
   
    <td> {{$stoalbeforeadjust}}  </td>
	 <td> {{$svat}} </td>
	 <td> {{$sdiscount}} </td>
	 	 <td>{{$surdue}}</td>
	 <td>{{$stotal}} </td>
     <td>{{$surgerycommission}}</td>
 </tr>





</table>

<br>
<br>
<b> Total Due </b> = Initial Due - Total Deposit.<br>
 Initial Due = {{ $data->due + $cabinedue }} TK , Total Deposit = {{ $data->dena }} TK <br>
 So Total Due = {{ $data->due + $cabinedue }} - {{ $data->dena }} = {{ $data->due + $cabinedue - $data->dena}} TK


<div id="intitalhisab" class="container" style="background-color:#006699">
  <div class="row" >
  <p>
    <div class="col-4">
  <b style="color:white" >  Initial VAT <br></b> <input type="text" id="initialfinalvat"  value="{{$fvat}}" name="initialfinalvat" readonly>
    </div>
    <div class="col-4">
  <b style="color:white" >Initial  Discount<br></b>  <input type="text" id="initialfinaldiscount" name="initialfinaldiscount"  value="{{$fdiscount}}" readonly>
    </div>
	<div class="col-4">
 <b style="color:white" >Initial  DUE <br></b> <input type="text" id="initialfinaldue" name="initialfinaldue"  value="{{$data->due + $cabinedue - $data->dena}}" readonly>
    </div>
</div>
<p>
<div class="row">

    <div class="col-4">
  <b style="color:white" > Initial Gross Amnt. </b>  <input type="text" id="intialgrossamount" name="intialgrossamount"  value="{{$fadjust}}" readonly>
    </div>

    <div class="col-4">
  <b style="color:white" > Initial Receiable Amnt. </b>  <input type="text" id="initialreceiveableamount" name="initialreceiveableamount"  value="{{$fadjust - $fdiscount  }}" readonly>
    </div>

	
		<div class="col-4">
 <b style="color:white" >Initial Given Commission </b> <input type="text" id="givencommission" name="givencommission"  value="{{$fcommission}}" readonly>
    </div>
	<p>
</div>
	
  </div>
</div>



<h2> Add Additional Service Charge </h2>

<div class="container"  style="background-color:#EEE8AA; ">

<form   method="post"  id="a"  class="additioncalcost" action="{{ route('servicetranstion.store') }}"      >
@csrf 

<b> আরো বিভিন্ন অতিরিক্ত খরচ যোগ করেন </b><br>
<input type="radio" id="addadditonalsrvicechargeyes" name="addadditonalsrvicecharge" value="1"  required >
<label for="html">হ্যা  </label><br>
<input type="radio" id="addadditonalsrvicechargeno" name="addadditonalsrvicecharge" value="2"  required >
<label for="css">রিসেট </label><br>
<input type="radio" id="addadditonalsrvicechargenone" name="addadditonalsrvicecharge" value="3"  required >
<label for="css">না </label><br>










<div id="additionalservice" >
			 <table class="table" id="products_table">
                <thead>
                    <tr>
                        <th>Service Name</th>
                        <th   >Service Charge </th>
						<th  style="width:80px;" >Qun. </th>


						<th  >Adjusted<br>Price</th>
	
                    </tr>
                </thead>
                <tbody class="addmoreproduct">
                    <tr id="product0">
                        <td>
       <select id="service_name"  class="form-control service_name" style='width: 270px;'  name="service_name[]"     >  
  
		</select>
                        </td>
                        <td>
						  <input type="text"   name="unit_price[]" id="unit_price" class="form-control numbers  unit_price"  style='width: 100px;' />
                           
                        </td>
						<td>
						  <input type="text" name="quantity[]" id="quantity" class="form-control numbers quantity"   />
						</td>
												
						<input type="hidden" name="amount[]" value="0" id="amount" autocomplete="off" class="form-control numbers amount"  />
						
						
				

						<td>
						<input type="text" name="adjust[]" value="0" id="adjust" autocomplete="off" class="form-control numbers adjust"  />
						</td> 
						
						<td>
						
						<a class="remove"  style="font-size:30px; color:red;"  href="#">  ×</a> 
						
						</td> 
						
						
						
                    </tr>
                    <tr id="product1"></tr>
                </tbody>
            </table>
			 
			 <input type="hidden" name="patient_id" value=" {{$data->id}}" id="patient_id" autocomplete="off" class="form-control  "  />
			
		 <input type="hidden" name="sourceagent" value=" {{$sourcename}}" id="sourceagent" autocomplete="off" class="form-control  "  />	 
			 
			 <input type="hidden" name="flag" value=" {{$flag}}" id="flag" autocomplete="off" class="form-control  "  />	 	
			
		   <div id="child"> 
		   
		   </div>
		   <button type="button" id="add_row" class="btn btn-primary">ADD more Service</button>
		   


		   
  <div class="row">


 
             <input type="hidden" name="flag" id="flag" />

	
	    <div class="col-4">
     Total Service Charge : <input type="text" name="totalamount" id="totalamount"  value="0"  class="form-control numbers totalamount" readonly />
    </div>
  </div>
  <br>
  <p>
  </div>
  <div class="container"  style="background-color:#2F4F4F" >
  
  <b style="color:white" > চূড়ান্ত হিসাব </b>
  
   <div class="row"   style="background-color:#2F4F4F"       >

		    <div class="col-4">
 
		 <b style="color:white" >Gross Amount:</b> <input type="text" name="finalTotalcost" id="finalTotalcost" value="{{$fadjust}}"   class="form-control numbers totalamount" readonly />
    </div>

			<div class="col-4">
 
		 <b style="color:white" >Recieveable Amount:</b> <input type="text" name="finalreceiveableamount" id="finalreceiveableamount" value="{{$fadjust - $fdiscount}}"   class="form-control numbers finalreceiveableamount" readonly />
    </div>	

	    <div class="col-4">
       <b style="color:white" >Total paid:</b><input type="text" name="fianl_paid_after_adjusting_service_charge" id="fianl_paid_after_adjusting_service_charge" value="{{ $data->dena +  ($fadjust-$cabinedue  -$data->due)  }}" class="form-control numbers due" readonly />
    </div>

	<p>
	</div>
	<p>
  
  <div class="row">

  
  	    <div class="col-6">
       <b style="color:white" >Total Discount:</b><input type="text" autocomplete="off" name="finaldis" id="finaldis" value="{{$fdiscount}}" class="form-control numbers finaldis"    />
    </div>
  		    <div class="col-6">
 
		 <b style="color:white" >Total Commission:</b> <input type="text" autocomplete="off" name="finalcommission" id="finalcommission" value="{{$fcommission}}"   class="form-control numbers finalcommission"   />
    </div>	
  </div>
  
  <p>
  <div class="row"                 >


    <div class="col-6">
       <b style="color:white" >Total Due:</b><input type="text" autocomplete="off" name="final_due_after_adjusting_service" id="final_due_after_adjusting_service" value="{{$data->due + $cabinedue - $data->dena}}" class="form-control numbers final_due_after_adjusting_service" readonly  />
    </div>
	
	

       <input type="hidden" name="hiddenfinal_due_after_adjusting_service" id="hiddenfinal_due_after_adjusting_service" value="{{$data->due + $cabinedue - $data->dena}}"  readonly  />
  
		
	       <input type="hidden" name="cabinedue" id="cabinedue" value="{{ $cabinedue}}"  readonly  />
  
	
	
	
	
	
	
	
	
	
	    <div class="col-6">
       <b style="color:white" >Total Due Payment:</b><input type="text" autocomplete="off" name="duepayment" id="duepayment"  class="form-control numbers duepayment" value="0" required />
    </div>
	<p>
 </div>
 <p>

	

	
	
	

	
	
	
	
	
	
	
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">





$(document).ready(function(){
$("#intitalhisab").hide();	
$("#additionalservice").hide();
	
$("#nnc").hide();
$("#nnccom").hide();

	$('input[type=radio][name=addadditonalsrvicecharge]').change(function() {

    if (this.value == '1') {
$("#additionalservice").show();

    }
    else if (this.value == '2') {
    	
 // remove all row whose index is greater than 1
 console.log('AAA'); 
    $('#a')[0].reset();
	  $('.service_name').select2();
	   $("#products_table tr:gt(1)").remove();
	  $("#additionalservice").hide(); 
	  var due = '<?php echo ($data->due +$cabinedue -$data->dena); ?>'
	  $("#final_due_after_adjusting_service").val(due);
	   $("#hiddenfinal_due_after_adjusting_service").val(due);
	  
	  
	  
	  
	    $("#duepayment").val(0);
		
		var fcm = '<?php echo $fcommission; ?>'
	    $("#finalcommission").val(fcm);	  
	  
	  var finaldis = '<?php echo $fdiscount; ?>'
	   $("#finaldis").val(finaldis);	  
	  
	  var fianl_paid_after_adjusting_service_charge = '<?php echo $fadjust - ($data->due + $cabinedue  -$data->dena) - $fdiscount; ?>'
	 $("#fianl_paid_after_adjusting_service_charge").val(fianl_paid_after_adjusting_service_charge);	  
	  
	  
	var finalreceiveableamount =  '<?php echo $fadjust - $fdiscount; ?>'
	  
	   $("#finalreceiveableamount").val(finalreceiveableamount);
	  
	  
	  	var finalTotalcost =  '<?php echo $fadjust; ?>'
	  	   $("#finalTotalcost").val(finalTotalcost);
	  
    }
	
});
	








$("#newfinalgrosspricecom").change(function () {
var newcom = parseFloat($("#newfinalgrosspricecom").val());
var finalgrossamount =  parseFloat($("#finalTotalcost").val());

final_com_after_clearing_old_come = finalgrossamount * (newcom/100);

$("#finalcommission").val(final_com_after_clearing_old_come);



	
});


































$("#newdiscountonfinalgrosprice").change(function(){
	
var newdisper = parseFloat($("#newdiscountonfinalgrosprice").val());
var finalgrossamount =  parseFloat($("#finalTotalcost").val());

var dis = 	(finalgrossamount * (newdisper/100));
dis = dis.toFixed(2)
$("#finaldis").val(dis);


 var receiveableamount =   parseFloat($("#finalreceiveableamount").val());

var newrecevieblamount = receiveableamount - dis; 

$("#finalreceiveableamount").val(newrecevieblamount);



totalamount();



	
});











$("#finaldis").change(function(){	
var finaldis = parseFloat($("#finaldis").val());

 var receiveableamount =   parseFloat($("#finalreceiveableamount").val());

var newrecevieblamount = receiveableamount - finaldis; 

$("#finalreceiveableamount").val(newrecevieblamount);
totalamount();

});	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
$("#duepayment").change(function(){
	

var d = $("#duepayment").val();

if ( d == ''  )
{
	
	$("#duepayment").val(0);
}
var duepayment = parseFloat($("#duepayment").val());
var due  =  parseFloat($("#hiddenfinal_due_after_adjusting_service").val());
var servicecharge = parseFloat($("#totalamount").val());
var finaldis = parseFloat($("#finaldis").val());


var totaldue = due+ servicecharge - finaldis ; 

var newdue = totaldue -duepayment ;

newdue = newdue.toFixed(2)
$("#final_due_after_adjusting_service").val(newdue);

	
});	
	
	
	
	
	
	
	
	
	
/////////////////////////////// Replace non deimal number 
/////////////////////////////// Replace non deimal number 
$('.additioncalcost').delegate('.numbers','change',function(){


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
	
	  $(".service_name").val("");
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
	    $('.service_name').select2();
		 

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
	
	
	
     $('.service_name').select2();
	
	  $.ajax({
		   url:"{{ route('servicelist.dropdown_list') }}",
 
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	   ////////////////////fetch data for Customer dropdown menu ////////////////////////////
	    $("#service_name").html("");


	  	  	  		var service_name = "<option  value='' ></option>"; 
						
					   $("#service_name").append(service_name);
					
					
					
					                    var len = 0;
                    if (response.servicelistinhospital != null) {
                        len = response.servicelistinhospital.length;
                    }

                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.servicelistinhospital[i].id;
                             var name = response.servicelistinhospital[i].servicename;
						var price = response.servicelistinhospital[i].price;

                             var service_name = "<option  data-price ='"+price+"'    data-name='"+name+"'   value='"+id+"'>"+name+"</option>"; 
							

                             $("#service_name").append(service_name);
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








///////////////////////////////// insert value in unit price /////////////////////

$('.addmoreproduct').delegate('.service_name','change',function(){
	
	var tr= $(this).parent().parent();
	
	
	  
	var price= tr.find('.service_name option:selected').attr("data-price");
	
	
	tr.find('.unit_price').val(price);

	
	
	var price = parseFloat(tr.find('.unit_price').val()); // 2y bar price neya hoyeche karon jodi pore user pirce poriboron kore
var qun = parseFloat(tr.find(".quantity").val());














var total = Number(price) * Number(qun);


	
		tr.find('.amount').val(total);
tr.find('.adjust').val(total);
	totalamount();
	







});


////////////////////////////////////////keyup//////////////////////////////

$('.addmoreproduct').delegate('.unit_price, .quantity, .discount ,.vat','keyup',function(){

	var tr= $(this).parent().parent();
	var price = parseFloat(tr.find('.unit_price').val());
var qun = parseFloat(tr.find(".quantity").val());




var productname= tr.find('.service_name option:selected').html();



	
calculationforinputfield();	




function calculationforinputfield(){

qun = tr.find(".quantity").val();

var total = Number(price) * Number(qun);



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
var adjust = parseFloat( tr.find(".adjust").val());

var total = parseFloat(tr.find('.amount').val());


var price = parseFloat(tr.find('.unit_price').val());
var qun = parseFloat(tr.find(".quantity").val());






totalamount();







});
















/////////////////////////////////////////////////// calculate total amount  /////////////////////////////////////////

function totalamount(){
	
	var totalamount =0;
	$('.adjust').each(function(i,e){
		var amount = $(this).val()-0;
		totalamount+=amount;
	});
	
	

	

	
	var due= $("#due_at_the_time_of_selling").val();
	var paid = totalamount- Number(due);
	  $("#paid").val(paid);
	  $("#totalamount").val(totalamount);
	  
	 


	 var intialfinalcharge = parseFloat($("#intialgrossamount").val());
	 var initialreceiveableamount = parseFloat($("#initialreceiveableamount").val());




	 var initialfinaldiscount = parseFloat($("#initialfinaldiscount").val());
	  var initialfinalvat = parseFloat($("#initialfinalvat").val()); initialfinaldue
	  var intialdue = parseFloat($("#initialfinaldue").val()); 
	  var finalgrosscharge = intialfinalcharge + totalamount ; 
	  


	  
	  
	 var totaldiscountafteraddingservicediscount = initialfinaldiscount ;

	 var intialpaid = initialreceiveableamount - intialdue; 
	 

	
	  $("#finalTotalcost").val(finalgrosscharge); 

	 
	  
	  	 var finadiscount = $("#finaldis").val();
	 var duepayment = $("#duepayment").val();
	 
	 if (finadiscount == '' )
	 {
	 finadiscount = 0;
	 }
	 
	 if (duepayment == ''  )
	 {
		duepayment=0;  
	 }
		  var finalreceiveablecharge = initialreceiveableamount + totalamount - parseFloat(finadiscount) ; 
	  $("#finalreceiveableamount").val(finalreceiveablecharge); 

	 var final_due_after_adjusting_service = totalamount + intialdue - parseFloat(duepayment) - parseFloat(finadiscount) ;
$("#final_due_after_adjusting_service").val(final_due_after_adjusting_service);








$("#fianl_paid_after_adjusting_service_charge").val(intialpaid);

	var flag = $("#flag").val();
	    if (flag == '1') {

var commisiionrate = '<?php echo $rate; ?>'

 var servicecharge=  $("#totalamount").val();
var com = servicecharge * (commisiionrate/100);
var intialcom = parseFloat($("#givencommission").val());
finalcom = com+intialcom;
$("#commissiononservicecharge").val(com);
$("#finalcommission").val(finalcom);

 
    }
    else if (flag == '2') {
     	
$("#commissiononservicecharge").val(0);


    }
	
	
	var newdiscountandclearolddiscount = $("#newdisfinalflag").val();
	if (newdiscountandclearolddiscount == 1)
	{
		var newdisper = parseFloat($("#newdiscountonfinalgrosprice").val());
var finalgrossamount =  parseFloat($("#finalTotalcost").val());

var dis = 	(finalgrossamount * (newdisper/100));
dis = dis.toFixed(2)
$("#finaldis").val(dis);
	}


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

  if($('#actioni').val() == "Edit")
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
   
     $latest_tr.find(".service_name").each(function(index)
    {
        $(this).select2('destroy');
    }); 
	  
      $('#product' + row_number).html($('#product0' ).html()).find('td:first-child');
	  
	   

	  
      $('.addmoreproduct').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
     

 
     
    
  $('.service_name').select2(); 
 
    
	
	
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








});
</script>

	  
</body>

@stop