

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

<input type="hidden" id="percentageofagent" value="0" name="percentageofagent" >	  

<div  class="container" style="background-color:#EEE8AA; "  >
  <span id="form_result"></span>
         <form method="post" action="{{ route('reporttransaction.update') }}"   id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
	 
	 
	 
	 
	 
	 
	 	<div class="col-4">
	
	<span > Adjust With Advance Deposit  </span><br>

<input type="radio" id="adjustwithadvancedeposit" required name="adjustwithadvancedeposit" value="1"  >
<label for="agentcom">  YES </label> <br>
<input type="radio" id="adjustwithadvancedeposit" required name="adjustwithadvancedeposit" value="2"  >
<label for="agentcom"> NO  </label>
	
	</div>	
	 
	 
	 
	 
	 
	 

	<div class="row">
    <div class="col-2">
      Name: <input type="text " value="{{$data->name}}"    class="form-control register_form nexttext" name="name" id="name"  placeholder="Enter Name" autocomplete="off" required>
    </div>
    <div class="col-2">
      Address: <input type="text " value="{{$data->address}}"  class="form-control register_form nexttext" name="address" id="address"  placeholder="Enter Address" autocomplete="off">
    </div>
	    <div class="col-2">
      Mobile: <input type="text " value="{{$data->mobile}}"  class="form-control register_form nexttext" name="mobile" id="mobile"  placeholder="Enter mobile" autocomplete="off">
    </div>
		    <div class="col-2">
      Age: <input type="text " value="{{$data->age}}"  class="form-control register_form nexttext" name="age" id="age"  placeholder="age" autocomplete="off">
    </div>
	
		    <div class="col-2">
      Sex: <input type="text "    value="{{$data->sex}}" class="form-control register_form nexttext" name="sex" id="sex"  placeholder="Sex" autocomplete="off">
    </div>
	
  </div>
  <p>
  <div class="row">
  
      <div class="col-4 ">
      Delivery Date:<input type="date" id="deliverydate"  value="{{$data->deliverydate}}" name="deliverydate" >
    </div>

    <div class= " col-4">
     Data Entry Date:<input  type="date" id="dataentry" value="{{$data->created_at}}" name="dataentry" >
  
    </div>
  
  </div>

  <P>
 


			 <table class="table" id="products_table">
                <thead>
                    <tr>
                        <th>Test Name</th>
                        <th  style="width:150px;" >Unit Price</th>
						
				
				<th>Discount(%)</th>
						
						<th>Discount(TK)</th>
						<th style="width:150px;" >price </th> 
					
					<!--	<th style="width:150px;" >Adjusted<br>Price</th> -->
						
                    </tr>
                </thead>
                <tbody class="addmoreproduct">
                 
					
				
					
					
					
					
					
					
					
					
					
					
					
					
					
					
				<?php $i=101;  $z=1; ?>	
					
					
					 @foreach ( $order->reporttransaction as $t )
					
					 
    <tr id="product{{$i}}" >

    <td> 

<?php  $i++; $z++; ?>



       <select id="medicine_name"  class="form-control medicine_name"  name="medicine_name[]"  required   style='width: 270px;'>  
  <option value="{{$t->reportlist_id}}">{{$t->reportlist->name}}</option>
  
  
   @foreach ( $reportlist as $r )
    <option      data-price="{{$r->unitprice}}"    value="{{$r->id}}">{{$r->name}}</option>
  @endforeach
  
		</select>


	
	</td>


<td>   <input type="text"  value= "{{ ($t->unitprice )}}"  name="unit_price[]" id="unit_price" autocomplete="off" class="form-control numbers unit_price" required  />   </td>
  
<td><input type="text" value= "{{ $t->discount}}"    name="discount[]" value="0" id="discount" autocomplete="off" class="form-control numbers discount" /></td>

			            <td>
						<input type="text"  value= "{{round($t->totaldiscount, 2)}}"  name="totaldiscount[]" value="0" id="totaldiscount" class="form-control totaldiscount" readonly />
						</td>


	 <td><input type="text" value= "{{round($t->adjust, 2)}}" name="adjust[]" value="0" id="adjust" autocomplete="off" class="form-control numbers adjust"  /></td>
	 
						<input type="hidden" name="amount[]" value= "{{$t->reportlist->unitprice }}" id="amount" class="form-control amount" readonly />
						
	
						
						<td>
						
						<a class="remove"  style="font-size:30px; color:red;"  href="#">  ×</a> 
						
						</td> 
						
					
						 <input type="hidden" name="vat[]" value="0" id="vat" class="form-control vat" readonly />
					
						
				
						 <input type="hidden" name="vattk[]" value="0" id="vattk" class="form-control vattk" readonly />
						
					
						  <input type="hidden" name="quantity[]" id="quantity" value="1" class="form-control quantity" required />
						
	 

   </tr>
@endforeach 
					
	<input type="hidden" value="{{$i}}" id="mark" >				
	<input type="hidden" value="{{$z}}" id="markz" >					
	
                    <tr id="product0">
                        <td>
       <select id="medicine_name"  class="form-control medicine_name"  name="medicine_name[]"     style='width: 270px;'>  
  
    <option         value=""></option>
  
     @foreach ( $reportlist as $r )
    <option      data-price="{{$r->unitprice}}"    value="{{$r->id}}">{{$r->name}}</option>
  @endforeach
  
  
  
  
  
		</select>
                        </td>
                        <td>
						  <input type="text"   name="unit_price[]" id="unit_price" autocomplete="off" class="form-control numbers unit_price"   />
                           
                        </td>

						 <input type="hidden" id="stock" name="stock[]" class="stock" value="0">
				
	

                       
						
						<td>
						<input type="text" name="discount[]" value="0" id="discount" autocomplete="off" class="form-control numbers discount" />
						</td>
						
						
						
			            <td>
						<input type="text" name="totaldiscount[]" value="0" id="totaldiscount" class="form-control totaldiscount" readonly />
						</td>
			              <h1 id="messageforstock" style="color:red;" >  </h1> 

						
												
					     
						<input type="hidden" name="amount[]" value="0" id="amount" class="form-control amount" readonly />
						
						<td>
						<input type="text" name="adjust[]" value="0" id="adjust" autocomplete="off" class="form-control numbers adjust"  />
						</td> 
						
						<td>
						
						<a class="remove"  style="font-size:30px; color:red;"  href="#">  ×</a> 
						
						</td> 
						
						<td>
						 <input type="hidden" name="vat[]" value="0" id="vat" class="form-control vat" readonly />
						</td>
						
						<td>
						 <input type="hidden" name="vattk[]" value="0" id="vattk" class="form-control vattk" readonly />
						</td>
						<td>
						  <input type="hidden" name="quantity[]" id="quantity" value="1" class="form-control quantity" required />
						</td>
						
                    </tr>




















	
					
					
						
                  
                    <tr id="product1"></tr>
                </tbody>
            </table>
			 
			 
			 
			 
			 
			 
			
		   <div id="child"> 
		   
		   </div>
		   <button type="button" id="add_row" class="btn btn-primary">ADD more Test</button>
		   
		   	
			
			
			<div class="container">
  <div class="row">
   <div class="col-4">
      Total Amount:  <input value="{{$order->totalbeforediscount}}" type="text" name="totalamountbeforediscount" id="totalamountbeforediscount" autocomplete="off" value="0"  class="form-control totalamount" readonly />
    </div>



	    <div class="col-4">
   <span style="font-size:14px;">    Dis(%): </span>  <input type="text" autocomplete="off" name="percentofdicountontaotal" id="percentofdicountontaotal"  value="0"  class="form-control  percentofdicountontaotal"  />
    </div>
	</div>
	<p>
	
		<div class="row">
	
     <div class="col-4">
     Amount after Discount:  <input type="text" value="{{$order->total}}" name="totalamount" id="totalamount" autocomplete="off" value="0"  class="form-control totalamount"  />
    </div>

     <div class="col-4">
    Adjustment from Deposit :  <input type="text" value="{{$order->pay_by_adv}}" readonly autocomplete="off"   class="form-control totalamount"  />
    </div>



		    <div class="col-4">
     Discount(TK):  <input type="text"   value="{{$order->discount}}" name="dicountontaotal" id="dicountontaotal"  autocomplete="off" value="0"  class="form-control dicountontaotal" readonly  />
    </div>

  </div>
	
	<p>
	
	
	
	
	
	
	<div class="row">
    <div class="col-4">
    Paid:  <input type="text" name="paid" id="paid" value="{{$order->pay_in_cash}}" autocomplete="off" value="0" class="form-control numbers paid"  />
    </div>
    <div class="col-4">
    Due:   <input type="text" autocomplete="off"  value="{{$order->due}}" name="due" id="due_at_the_time_of_selling" value="0" class="form-control due" readonly />
    </div>

	    <div class="col-4">
    Commission(TK):  <input type="text" name="commision" id="commission" autocomplete="off"  value="" readonly class="form-control numbers" />
    </div>

  </div>
  
  
  
  
  
  	<div class="row">
    <div class="col-12">

    <label for="history">Remark:</label>
    <textarea class="form-control" value="{{$order->remark}}"  name="remark" rows="3"></textarea>
</div>

  </div>
  
  
  
  
  
  
  
  
</div>
			

           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" value="Add" />
            <input type="hidden"  value="{{$order->id}}" name="orderid" id="orderid" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           
		   
		   </div>
         </form>
		   <span id="form_result_footer"></span>

</div>


<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >

   

	


<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog  modal-lg">
  <div class="modal-content modal-xl">
   <div class="modal-header ">
          <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class=" modal-body modal-xl  ">
         <span id="form_result"></span>

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
                <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
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





<div  id="refundmodal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Refund/  Special Concession  </h5>
        <button type="button"  id="closerefundmodal" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
		  <span id="form_resultrefund"></span>
		    

         <form method="post" action="{{ route('reporttransaction.refund') }}"   id="sample_formforrefund" class="form-horizontal" enctype="multipart/form-data">
          @csrf
<div class="row">

	    <div class="col-8">
<span style="color:red;"> Type  </span><BR><input type="radio" id="cashbackrefund" name="refundtype" value="1" required >
<label for="doctorcom">  Cash back </label><br>
<input type="radio" id="Decreaseduerefund" name="refundtype" value="2" required >
<label for="agentcom">  Special Concession  </label>

    </div>
<p>

	    <div id="doctoroption" class="col-4">
      Amount TK:
<input type="text" name="refundamount" id="refundamount" autocomplete="off" value="0"  class="form-control refundamount"  />
    </div>
 <input type="hidden" name="hidden_idrefund" id="hidden_idrefund" />
  </div>
		
		
		
		
		
		
		
      </div>
      <div class="modal-footer">
            <input type="hidden" name="actionforrefund" id="actionforrefund" value="Refund" />
            <input type="hidden" name="hidden_idforrefund" id="hidden_idforrefund" />
            <input type="submit" name="action_button" id="action_buttonforrefund" class="btn btn-warning" value="Submit" />
           
      </div>
    </div>
	</form>
  </div>
</div>















 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">





$(document).ready(function(){
	
/////////////////////////////// Replace non deimal number 
$('.form-horizontal').delegate('.numbers','change',function(){


    this.value = this.value.replace(/[^0-9\.]/g,'');
});	


$("#admitnew").hide();

$('input[type=radio][name=showadmitform]').change(function() {
    if (this.value == '1') {
fetch();
$("#admitnew").show();

$('#statusvalue').val(0);



	$('#percentofdicountontaotal').show();
	$('#percentofdicountontaotal').val(0);
	
$('.discount').show();	
$('.discount').val(0);	
$('.totaldiscount').val(0);	

 
    }
});
	
	

	fetch();
	
	
$(document).on('click','#refresh', function(){

$('#sample_form')[0].reset();
$("#agentoption").hide();
$("#doctoroption").hide();
fetch();
$("#products_table tr:gt(1)").remove();

 $('.medicine_name').select2();
		$("#formhide").show(); 
	$('#percentofdicountontaotal').show();

	
$('.discount').show();

});	
	
	
	
	
	
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


//////////////////////////// Show record 

    var table = $('#patient_table').DataTable({
		
	
		
        processing: true,
        serverSide: true,
		responsive: true,
	
        ajax: "{{ route('reporttransaction.index') }}",
        columns: [
		
		 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
		 
		 
		
            
			
			
			{data: 'id', name: 'id'},
            {data: 'patient_name', name: 'patient.name'},
			 {data: 'patient_mobile', name: 'patient.mobile'},
			  {data: 'due', name: 'due'},

			 {data: 'pdf', name: 'pdf'},   
             {data: 'created', name: 'created'},   
			 {data: 'action', name: 'action', orderable: false, searchable: false}, 
        ]
    });

















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
	

	  $("#cusname").hide();
	  $("#cusmobile").hide();
  $("#customer_name").select2();
    $("#customer_mobile").select2();	
  $("#category").select2();

$("#agent").select2();

$("#customer_id").select2();
$('.medicine_name').select2();
$("#doctor").select2();
$("#refdoctor_id").select2();
     


  
  
  
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
  
 // // if patient is admitted patient then no discount from here 

$('#sample_form').delegate('#customer_id','change',function(){
	$("#admitnew").hide();
	$("#showadmitform").prop('checked', false);
$("#formhide").show();
 var status = $('#customer_id option:selected').attr("data-status");
 var val = $('#customer_id option:selected').attr("data-val");
if (status == 1 )
{

	
	$('#percentofdicountontaotal').hide();
	$('#percentofdicountontaotal').val(0);
	
$('.discount').hide();	
$('.discount').val(0);	
$('.totaldiscount').val(0);	

$('#statusvalue').val(status);


}


});
 
  





    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	
                     

function fetchdataforcommissionagent()
{
	
		  $.ajax({
   url:"reporttransaction/mlist",
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
	
	
	
     $('.medicine_name').select2();
	 $("#customer_id").select2();
	  $.ajax({
   url:"reporttransaction/mlist",
   dataType:"json",
   
   ////////////////////fetch data for dropdown menu 
success:function (response) {
	
	   ////////////////////fetch data for Customer dropdown menu ////////////////////////////
	    $("#customer_id").html("");
		$("#agent").html("");
		
		 $("#refdoctor_id").html("");  
	  
	  
	  
	  	  	  		var doctor = "<option  value='' ></option>"; 
						
					   $("#refdoctor_id").append(doctor);
					
					
					
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
							

                             $("#refdoctor_id").append(doctor);
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
						
  var status = response.patientdata[i].booking_status;
                             var option = "<option   data-val='"+id+"'   data-status='"+status+"' data-name='"+name+"' data-sex='"+sex+"' data-mobile='"+mobile+"'   data-age='"+age+"'   data-address='"+address+"'  value='"+id+"'>"+id+"</option>"; 
							  


							  $("#customer_id").append(option);
						
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

 
 
	
}





   ///////// show the modal//////////////////////////////////////////////////////////////////////////////// 
    $(document).on('click', '.create_record', function(){
		  $('#form_result').html('');
    $('.modal-title').text("Add New Record");
     $('#action_button').val("Add");
     $('#action').val("Add");

 
 });


/////////////////////////////// fill the value for selected patient ...............

$('.form-horizontal').delegate('.customer_id','change',function(){
var name = $('.customer_id option:selected').attr("data-name");        
var age = $('.customer_id option:selected').attr("data-age");
var sex = $('.customer_id option:selected').attr("data-sex");
var address = $('.customer_id option:selected').attr("data-address");
var mobile = $('.customer_id option:selected').attr("data-mobile");
$('#name').val(name);
$('#age').val(age);
$('#sex').val(sex);
$('#address').val(address);
$('#mobile').val(mobile);



});
//////////////////////////// fill the value of percentage of agent and doctor 


$('.form-horizontal').delegate('.agent','change',function(){
var percentage = $('#agent option:selected').attr("data-commission_pecentage");        

$('#percentageofagent').val(percentage);
totalamount();
});
$('.form-horizontal').delegate('.doctor','change',function(){
var percentage = $('#doctor option:selected').attr("data-commission_pecentage");        

$('#percentageofagent').val(percentage);
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

qun = 1;



var discount = tr.find(".discount").val();
var vat = tr.find(".vat").val();



var total = Number(price) * Number(qun);
var totalbeforedisandvat= total;
//////////////////////// After Discount///////////////////////
var totaldiscount=(total * ( Number(discount)/100));
total= total- (total * ( Number(discount)/100));
tr.find('.totaldiscount').val(totaldiscount);

////////////////////////// After Adding Vat ////////////////////
var vattk = total * ( Number(vat)/100);
tr.find('.vattk').val(vattk);

total= total+ (total * ( Number(vat)/100));

		tr.find('.amount').val(totalbeforedisandvat);
		
tr.find('.adjust').val(total);
	totalamount();
	



});


////////////////////////////////////////keyup//////////////////////////////

$('.addmoreproduct').delegate('.unit_price, .quantity, .discount ,.vat','change',function(){

	var tr= $(this).parent().parent();
	var price = tr.find('.unit_price').val();
	if ( price == '' ) {
tr.find(".unit_price").val(0);
price = 0;
}
else {	
price = parseFloat(price);	
}
	
var qun = parseFloat(tr.find(".quantity").val());

var discount = tr.find(".discount").val();
	if ( discount == '' ) {
tr.find(".discount").val(0);
discount = 0;
}
else {	
discount = parseFloat(discount);	
}


var vat = (tr.find(".vat").val());

var adjust = (tr.find(".adjust").val());
var stock =parseFloat(tr.find('.stock').val());
var productname= tr.find('.medicine_name option:selected').html();



	
calculationforinputfield();	




function calculationforinputfield(){

qun = tr.find(".quantity").val();

var total = Number(price) * Number(qun);
var totalbeforedisandvat = total;
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
	
	
		tr.find('.amount').val(totalbeforedisandvat);
		tr.find('.adjust').val(total);
totalamount();
}





});











//////////////////////////////////////////////// Adjusted Price //////////////////


function changemanuallyafterdiscount()
{
	var grossamount = parseFloat($('#totalamountbeforediscount').val());

var receiveableamount = parseFloat($('#totalamount').val());

var discount = grossamount - receiveableamount;

var paid = parseFloat($('#paid').val());

var due = receiveableamount - paid; 

var percentageofdiscount = (( discount * 100)/ grossamount) ;

var percentageofdiscount = percentageofdiscount.toFixed(5);


$('#percentofdicountontaotal').val(percentageofdiscount);

$('#due_at_the_time_of_selling').val(due);

$('#dicountontaotal').val(discount);







	var commissionrate = parseFloat($("#percentageofagent").val());
	var commission_amount = (receiveableamount * (commissionrate/100));
	
$('#commission').val(commission_amount);






	
}



$('.form-horizontal').delegate('.totalamount','keyup',function adj(){



changemanuallyafterdiscount();



	
});




$('.addmoreproduct').delegate('.adjust','change',function adj(){


	var tr= $(this).parent().parent();
var adjust = tr.find(".adjust").val();

if ( adjust == '' ) {
tr.find(".adjust").val(0);
adjust = 0;
}
else {	
adjust = parseFloat(adjust);	
}

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
		$('.unit_price').each(function(i,e){
		var amountgross = $(this).val()-0;
		
		grosstotalamount+=amountgross;
	
	});
	
	
  




	var a = grosstotalamount - totalamount;
	console.log('a');
		console.log(a);
	$("#dicountontaotal").val(a);
	$("#totalamountbeforediscount").val(grosstotalamount);
	
	
	$("#totalamount").val(totalamount);

}
else 
{
	
	var totalamount =0;
	$('.unit_price').each(function(i,e){
		var amount = $(this).val()-0;
		console.log(amount);
		totalamount+=amount;
	
	});	
		var a = (totalamount * (percentage_discount_on_total/100));
	
var grosstotalamount  =  totalamount;
$("#totalamountbeforediscount").val(grosstotalamount);
	totalamount = totalamount - a ;
	  $('#dicountontaotal').val(a);
		$("#totalamount").val(totalamount);
	
}


	var commissionrate = $("#percentageofagent").val();
	var commission_amount = (totalamount * (commissionrate/100));
	

	  
	
	var paid= $("#paid").val();
	if (paid == '')
	{
		paid = 0;
		$("#paid").val(0);
	}
	var due = totalamount- Number(paid);
	  $("#due_at_the_time_of_selling").val(due);



	

	  
	$("#commission").val(commission_amount);
}








 





  $("#paid").change(function(){
     
	this.value = this.value.replace(/[^0-9\.]/g,''); 

	
	
	
	
		var grossamount = parseFloat($('#totalamountbeforediscount').val());

var receiveableamount = parseFloat($('#totalamount').val());

var discount = grossamount - receiveableamount;

var paid = parseFloat($('#paid').val());

var due = receiveableamount - paid; 



$('#due_at_the_time_of_selling').val(due);




  });






  
  
  $("#percentofdicountontaotal").change(function(){
     this.value = this.value.replace(/[^0-9\.]/g,'');
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
   
   




function tb()
{
$('#products_table > tbody  > tr').each(function() {
	
	
console.log("h");
	
	
	
	});	
	
}



















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






 var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
	  
  $.ajax({
   url:"reporttransaction/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
      fetch();
	  fetchdataforcommissionagent();
    }, 2000);
	
	      $('#patient_table').DataTable().ajax.reload();
		   $('#ok_button').text('Delete');
		 
   }
  })
 });





 $(document).on('click', '.refund', function(){
  user_id = $(this).attr('id');
  $('#hidden_idrefund').val(user_id);
  $('#refundmodal').modal('show');
 });





$('#sample_formforrefund').on('submit', function(event){
  event.preventDefault();
 

   if($('#actionforrefund').val() == "Refund")
  {
 
   $.ajax({
    url:"{{ route('reporttransaction.refund') }}",
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
      $('#sample_formforrefund')[0].reset();
      $('#patient_table').DataTable().ajax.reload();
     }
$('#form_resultrefund').html(html);

$('#form_resultrefund').fadeIn();
$('#form_resultrefund').delay(1500).fadeOut();




$("#admitnew").hide();
$("#agentoption").hide();
$("#doctoroption").hide();
fetch();


 $("#products_table tr:gt(1)").remove();
 
 //remover por select2 dite hobe 
 $('.medicine_name').select2();
    }
   })
   
}
  


 });
 









 
 $(document).on('click', '#closerefundmodal', function(){
$('#refundmodal').modal('hide');

 });



 $(document).on('click', '#close', function(){
$('#confirmModal').modal('hide');

 });



});
</script>
	  
</body>

@stop