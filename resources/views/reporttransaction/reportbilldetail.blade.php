<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>


table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid black;
  text-align: left;
  padding: 2px;
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


</style>
 <?php for ($i=0; $i<3; $i++){ ?>
</head>
<body style="font-family: Times New Roman;">
<div id="c" >
<div id="head" >
<img width="500px;"   src="img/logo.jpg" >
<hr>
</div>



<div style="font-size:2.5 px;"  >
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
     

    <div style="width:100%; float:left;" >
      <b>Ref. Doctor :</b> {{$refdoctor_id->name}} ,{{$refdoctor_id->Degree}} 
    </div>


  
  	 <div style="height:10px;" id="three" >
    <div style="width:50%; float:left;" >
      <b>Delivery Date:</b> 
	  
	  <?php  $myDateTime = DateTime::createFromFormat('Y-m-d', $order->deliverydate);  echo  $myDateTime->format('d/m/Y'); ?> 
    
	
	</div>

	    <div style="width:50%;float:left;" >
<b> Vouc. Date :</b>

  {{ Carbon\Carbon::parse($order->updated_at)->format('d/m/Y , h:i:sa') }}

    </div>

  </div>
  
  </div>

<br>
<table>
  <tr>
  <th >Sl. No </th>
    <th style="width:270px;"  >Test Name </th>
    <th>Qun.</th>
	
	<?php if (($i ==0) || ($i ==2)) { ?>
	<th>Unit Pr.</th>
    <th>Gross Pr.(TK)</th>
	 <th>Dis.(TK) </th>
<th>VAT</th>	 
	 <th>Receiveable Amount(TK)</th> 
	<?php } ?>
  </tr>
  
<?php 
$m=0;
$tvat=0;
$tdiscount=0;
$tprice_before_vat_and_discount=0;
$tadjust=0;

?>
 
 @foreach ( $order->reporttransaction as $t )
  <tr>
   <td>{{$order->id}}-{{$m}}</td>
     
 <?php   $m++; ?>
    <td> {{$t->reportlist->name}}</td>
   <td> <?php  echo round( $t->unit , 1);  ?>  </td>
	<?php if (($i ==0) || ($i ==2)) { ?>
   <td> 

   <?php  if($t->unitprice == null){

   echo round($t->reportlist->unitprice,2);

}
else{
 echo round($t->unitprice,2);	
	
}  ?>  </td>
   <?php 


if($t->unitprice == null){

   
$price_before_vat_and_discount = $t->reportlist->unitprice * $t->unit ;
}
else{
	
$price_before_vat_and_discount = $t->unitprice * $t->unit ;	
}


   ?>
   
    <td>      <?php  echo round($price_before_vat_and_discount, 2);  ?> </td>
	 <td>    <?php  echo round($t->totaldiscount, 2);  ?> </td>
	 <td> <?php  echo round($t->totalvat, 2);  ?> </td>
	 <td><?php  echo round($t->adjust, 2);  ?></td>
	 
	 <?php 
	 $tvat = $tvat + $t->totalvat ;
	 $tdiscount = $tdiscount + $t->totaldiscount;
	 $tprice_before_vat_and_discount = $price_before_vat_and_discount + $tprice_before_vat_and_discount;
	 $tadjust = $tadjust + $t->adjust;
	 
	
	 
	 
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
<td>NA</td>
<td>NA</td>
<td><b><?php echo round($tprice_before_vat_and_discount,2); ?></b></td>
<td> <b> <?php        if ($d >1 )  {  


   echo round($tdiscount,2); echo "+"; echo   round($d,2) ; }  
   
   else{
	   
	 echo round($tdiscount,2);   
   }
   
   
   
   ?> </b> </td>
<td><b><?php echo round($tvat,2); ?></b></td>
<td><b><?php   
if ($d >1 )  {  

 echo round($tadjust,2);echo  "-"; echo   round($d,2);

}
else{
 echo round($tadjust,2);	
	
}

 ?></b></td>
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


[ Receiveable Amount = Gross Price - Discount + VAT   = <?php echo round($tprice_before_vat_and_discount,2)?>  - <?php echo  round($tdiscount,2) ?> + <?php echo  round($tvat,2); ?>     = <?php   echo round($tadjust,2);  ?>TK.]



<?php } ?>
  <div style="height:10px;" id="two" >
<div style="width:20%;float:left;" >
<b> Due:</b> <?php  echo round($order->due, 2);  ?>TK.
    </div>
	
	<?php 
	$paid =0;
	
	$paid= $tadjust - $order->due;
	
	?>
	
<div style="width:20%;float:left;" >
<b> Paid:</b> <?php  echo round($order->pay_in_cash, 2);  ?>TK.   
    </div>	
	
	
<div style="width:35%;float:left;" >
<b> Adjust Adv. payemnt:</b> <?php  echo round($order->pay_by_adv, 2);  ?>TK.   
    </div>		
	
	
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


<?php if($order->agentdetail_id)
{ ?>

    <div style="height:10px;" id="one" >
    <div style="width:50%; float:left;" >
<b>Agent Name:</b> {{$order->agentdetail->name}}
	</div>
    <div style="width:50%;float:left;" >
 <b>Commission:</b> {{$order->commission}} TK
    </div>



  </div>




<?php } ?>

<?php if($order->doctor_id)
{ ?>

    <div style="height:10px;" id="one" >
    <div style="width:50%; float:left;" >
<b>Source Doctor Name:</b> {{$order->doctor->name}} <br>
	</div>
    <div style="width:50%;float:left;" >
 <b>Commission:</b> {{$order->commission}} TK
    </div>

  </div>


<?php } ?>


	
	
	
<?php }  if ($i ==1) { ?>	
<b style="position: absolute; bottom:0px; left:1px;">Entry By :</b> {{$order->user->name}} <br>
 <?php }  ?>
</div>



<P> <b> Thanks for Patients </b>

</div>


			<?php if( $i < 2) { ?>
	<p style="page-break-after:always" ></p>
 <?php } } ?>
</body>
</html>