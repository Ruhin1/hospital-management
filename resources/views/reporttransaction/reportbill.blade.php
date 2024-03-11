<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
#introductory{
  font-family: 'Times New Roman';
}

table {
  font-family: 'Times New Roman';
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid black;
  text-align: left;
  padding: 2px;
}

hr{
	
	width:30%;
	text-align:left;
}

#c{




margin: 0 auto;
position:relative;

}





#c img {
width:100%;
}

#c::before {
content:'';
position:absolute;
top:50px;
left:0;
background-image: url("img/watermark.jpg");
background-position:center;
background-repeat:no-repeat;
width: 100%;
height: 100%;;
opacity: .1;
}

#m{
  
 background-color:red;;

}

#logo{

  float: left;
  width: 25%;
}
#description{
  float: right;
  width: 75%;

}

#name_hospital{
font-weight: 900;
font-size: 18px;
font-family: 'Times New Roman';

}

#introductory{
  font-family: 'Times New Roman';
}
</style>
 <?php for ($i=0; $i<3; $i++){ ?>
</head>
<body style="font-family: Times New Roman;">
<div id="c" >
<div id="head" >
  <div id="logo"> <img width="500px;"   src="img/logo.jpg" > </div>
  <div id="description">
    
  <span id="name_hospital">{{ $setting->name }}</span><br>
  <span id="address_body">
  {!! nl2br(e($setting->address)) !!}	 <br>
  Mobile:{{ $setting->mobile }} <br>
  </span>
  
  </div>

</div>
<br>


<div id="introductory" style="font-size:2.5 px;"  >
    <div style="height:10px;" id="one" >
    <div style="width:33%; float:left;" >
	<?php if( $i == 0) { ?>
      <b><u>Money Receipt</u></b>
    <?php } if ( $i == 1){ ?>
	  <b>Pathology Copy </b>
	  <?php } if ( $i == 2){ ?>
	 <b> Accountant's Copy  </b>
	  <?php } ?>
	</div>
    <div style="width:33%;float:left;" >
 <b>Patient ID:</b> {{$data->id}}
    </div>
	    <div style="width:33%;float:left;" >
 <b>Order ID :</b> {{$order->id}}
    </div>


  </div>
 

    <div style="height:10px;" id="two" >
    <div style="width:40%; float:left;" >
      <b>Name :</b> {{$data->name}}
    </div>

	
	    <div style="width:13%;float:left;" >
 <b>Age:</b> {{$data->age}}
    </div>
	    <div style="width:13%;float:left;" >
 <b>Sex:</b>{{$data->sex}}
    </div>
	
	
	    <div style="width:34%;float:left;" >
<b>Mobile No.</b> {{$data->mobile}} 
    </div>

  </div>
     
@if ($refdoctor_id)
<div style="width:100%; float:left;" >
  <b>Ref. Doctor :</b> {{$refdoctor_id->name}} 
   @if ($refdoctor_id->Degree !='')
   , {{$refdoctor_id->Degree}} 
  @endif  
</div>  
@endif



  
  	 <div style="height:10px;" id="three" >
    <div style="width:33%; float:left;" >
      <b>Delivery Date:</b> 
	  
	  <?php  $myDateTime = DateTime::createFromFormat('Y-m-d', $order->deliverydate);  echo  $myDateTime->format('d/m/Y'); ?> 
    
	
	</div>

	    <div style="width:33%;float:left;" >
<b> Vouc. Date :</b>

  {{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }} 

    </div>

	    <div style="width:33%;float:left;" >
<b> Printing Date :</b>

	{{ date('d/m/Y'); }} 

    </div>	
	


  </div>
  
  </div>

<br>
<table>
  <tr>
  <th >Sl. No </th>
    <th style="width:270px;"  >Test Name </th>
    
	
	<?php if (($i ==0) || ($i ==2)) { ?>
	
    <th>Gross Pr.(TK)</th>
	
	<?php } ?>
  </tr>
  
<?php 
$m=1;
$tvat=0;
$tdiscount=0;
$tprice_before_vat_and_discount=0;
$tadjust=0;

?>
 
 @foreach ( $order->reporttransaction as $t )
  <tr>
   <td>{{$m}}</td>
   
   <?php 
   $m++;
   
   ?>
    <td> {{$t->reportlist->name}}</td>
  
	<?php if (($i ==0) || ($i ==2)) { ?>
   

   <?php  if($t->unitprice == null){

   round($t->reportlist->unitprice,2);

}
else{
  round($t->unitprice,2);	
	
}  ?> 
   <?php 


if($t->unitprice == null){

   
$price_before_vat_and_discount = $t->reportlist->unitprice * $t->unit ;
}
else{
	
$price_before_vat_and_discount = $t->unitprice * $t->unit ;	
}


   ?>
   
    <td>      <?php  echo round($price_before_vat_and_discount, 2);  ?> </td>
	
	 
	 <?php 
	 $tvat = $tvat + $t->totalvat ;
	 $tdiscount = $tdiscount + $t->totaldiscount;
	 $tprice_before_vat_and_discount = $price_before_vat_and_discount + $tprice_before_vat_and_discount;
	 $tadjust = $tadjust + $t->adjust;
	 
	 $m++;
	 
	 
	 ?>
	 
<?php } ?>
  </tr>
@endforeach 




<?php 

$d = $order->discount - $tdiscount;
?>


<?php if (($i ==0) || ($i ==2)) { ?>
<tr>
<td>NA</td>
<td><b>Total</b></td>

<td><b><?php echo round($tprice_before_vat_and_discount,2); ?></b></td>



</tr>
<?php } ?>
</table>

<?php if (($i ==0) || ($i ==2)) {

if($d> 1 )
{
	?>


[ Receiveable Amount = Gross Price - Discount + VAT - Special concession  = <?php echo round($tprice_before_vat_and_discount,2)?>  - <?php echo  round($tdiscount,2) ?> + <?php echo  round($tvat,2); ?>  - <?php echo  round($d,2); ?>   = <?php  $final = $tadjust - $d; echo round($final,2);  ?>TK.]
  
<?php }

else
{
	
?>






<?php } ?>


<p>


  <div style="height:10px; " id="two" >

<b>Gross Price:</b> <?php echo round($tprice_before_vat_and_discount,2)?> TK <br>
<b>Discount:</b>  <?php echo  round($tdiscount,2) ?> TK <br>
(-) <hr>
<b>Receiveable Amount:</b><?php   echo round($tadjust,2);  ?>TK. <br>
 
<b>(-) Paid:</b> <?php  echo round($order->pay_in_cash, 2);  ?>TK.<br>
 
<b>(-) Adjust Adv. payemnt:</b> <?php  echo round($order->pay_by_adv, 2);  ?>TK. <br>

<hr>

<b> Due:</b> <?php  echo round($order->due, 2);  ?>TK.
	
	</div>















  <div style="height:10px;" id="two" >
<div style="width:20%;float:left;" >
		
	
	
	<?php if ($order->refund == 1) { ?> 
	
	<div style="width:25%;float:left;" >
<b> Refund:</b>     {{ $order->refundamount  }}TK.  
    </div>	
	<?php } ?>
	
	</div>
	


    <div style="height:10px;" id="two" >


 <?php  if($order->discount  > $tdiscount ) {  
 
 $d = $order->discount - $tdiscount; 
 if ($d > 1)
 {
 ?>
<div style="width:33%;float:left;" >
<b> Special concession:</b> <?php  echo round($d, 2);  ?>TK.
    </div>
	
 <?php } } ?>
	
	<div style="width:34%;float:left;" >
<b >Entry By :</b> {{$order->user->name}}
    </div>

	

	
	</div>

   <div style="height:10px;" id="two" >


	
	<div style="width:100%;float:left;" >
<b >Remark :</b> {!! nl2br(e($order->remark)) !!}
    </div>

	

	
	</div>



	



<?php }    if  ($i ==2) {   ?>


<?php if($order->commission > 0)
{ ?>

    <div style="height:10px;" id="one" >
    <div style="width:50%; float:left;" >
      @if ($order->doctor)
      <b>Source Doctor Name:</b> {{$order->doctor->name}} <br>
      @endif

      @if ($order->agentdetail)
      <b>Source Agent Name:</b> {{$order->agentdetail->name}} <br>
      @endif
      <b>Commission:</b> {{$order->commission}} TK
	</div>


  </div>


<?php } ?>


	
	
	
<?php }  if ($i ==1) { ?>	
<b style="position: absolute; bottom:0px; left:1px;">Entry By :</b> {{$order->user->name}} <br>
 <?php }  ?>
</div>



<P> <b> Thanks for Patients </b>

  <br>
  <b>Powered By: BICTSOFT</b>

</div>


			<?php if( $i < 2) { ?>
	<p style="page-break-after:always" ></p>
 <?php } } ?>
</body>
</html>