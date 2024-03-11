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



    <div style="height:10px;" id="one" >
    <div style="width:30%; float:left;" >
	<?php if( $i == 0) { ?>
      <b><u>Voucher</u></b>
    <?php } if ( $i == 1){ ?>
	  <b>office's Copy  </b>
	  <?php } if ( $i == 2){ ?>
	 <b> Accountant's Copy  </b>
	  <?php } ?>
	</div>
    <div style="width:40%;float:left;" >
 <b>Customer ID:</b> {{$data->id}}
    </div>

	    <div style="width:30%;float:left;" >
		<b>Voucer No:</b> {{$order->id}}

    </div>

  </div>


    <div style="height:10px;" id="two" >
    <div style="width:40%; float:left;" >
      <b>Name :</b> {{$data->name}}
    </div>

	
	    <div style="width:26%;float:left;" >
 <b>code:</b> {{$data->customercode}}
    </div>

	
	
	    <div style="width:34%;float:left;" >
<b>Mobile No.</b> {{$data->mobile}} 
    </div>

  </div>
     

    <div style="height:10px;" id="two" >
    <div style="width:40%; float:left;" >
      <b>Opening Balance :</b> {{$data->openingbalance}}
    </div>
    <div style="width:40%; float:left;" >
      <b>Current Balance :</b> {{$data->presentduebalance}}
    </div>


  </div>  
  
  
  
  
  
  
 <br> 


<table>
  <tr>
    <th style="width:300px;" >Product Name </th>
    <th>Qun.</th>
	<th>Unit Pr.</th>
    <th>Gross Pr.(TK)</th>
	 <th>Dis.(TK) </th>
	 
	 <th>Receiveable Amount(TK)</th> 
  </tr>
  
<?php 

$tvat=0;
$tdiscount=0;
$tprice_before_vat_and_discount=0;
$tadjust=0;

?>
 
 @foreach ( $order->producttransition as $t )
  <tr>
    <td> {{$t->product->name}}</td>
   <td><?php echo round($t->quantity,2); ?> </td>
   <td><?php echo round($t->unirprice,2); ?> </td>

   
    <td><?php echo round($t->amount,2); ?></td>
	 <td><?php echo round($t->discount,2); ?></td>
	 
	 <td><?php echo round($t->finalamountafterdiscount,2); ?></td>
	 
	 <?php 

	 $tdiscount = $tdiscount + $t->totaldiscount;
	 $tprice_before_vat_and_discount = $t->amount + $tprice_before_vat_and_discount;
	 $tadjust = $tadjust + $t->finalamountafterdiscount;
	 
	 
	 
	 
	 ?>
	 
	 
  </tr>
@endforeach 
<tr>
<td><b>Total</b></td>
<td>NA</td>
<td>NA</td>
<td><b><?php echo round($tprice_before_vat_and_discount,2); ?></b></td>
<td> <b> <?php echo round($tdiscount,2); ?> </b> </td>

<td><b><?php echo round($tadjust,2); ?></b></td>
</tr>



</table>


[ Receiveable Amount = Gross Price - Discount + VAT = <?php echo round($tprice_before_vat_and_discount,2)?>  - <?php echo  round($tdiscount,2) ?> + <?php echo  0 ?> = <?php echo round($tadjust,2);  ?>TK.]

	<?php 
	$paid =0;
	
	$paid= $tadjust - $order->debit;
	
	?>
    <div style="height:10px;" id="one" >
    <div style="width:50%; float:left;" >
<b >Due:</b><?php  echo round($order->debit, 2);  ?> TK</b>  
	</div>
	
	    <div style="width:50%; float:left;" >
<b >Paid:</b> <?php  echo round($paid, 2);  ?> TK</b>
	</div>
	
	</div>
	
	<div  style="height:10px;" id="btwo" >
    <div style="width:50%;float:left;" >
 <b>Date :</b><?php echo date("d/m/y") ;  ?>
    </div>

	    <div style="width:50%;float:left;" >
		<b>Entry By:</b>{{$order->user->name}}

    </div>

  </div>



</div>








</div>


			<?php if( $i < 2) { ?>
	<p style="page-break-after:always" ></p>
 <?php } } ?>
</body>
</html>