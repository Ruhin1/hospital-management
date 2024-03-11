<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>


table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

hr{
	
	width:30%;
	text-align:left;
}


td, th {
  border: 1px solid black;
  text-align: left;
  padding: 2px;
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
font-size: 22px;
font-family: 'Times New Roman';

}

#introductory{
font-family: 'Times New Roman';
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
 <?php for ($i=0; $i<2; $i++){ ?>
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



    <div style="height:10px;" id="one" >
    <div style="width:30%; float:left;" >
	<?php if( $i == 0) { ?>
      <b><u>Money Receipt</u></b>
    <?php } if ( $i == 1){ ?>
	  <b>Pharmacy's Copy  </b>
	  <?php } if ( $i == 2){ ?>
	 <b> Accountant's Copy  </b>
	  <?php } ?>
	</div>
    <div style="width:40%;float:left;" >
 <b>Patient ID:</b> {{$data->id}}
    </div>

	    <div style="width:30%;float:left;" >
		<b>Voucer No:</b> {{$order->id}}

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
     
  	 <div style="height:10px;" id="three" >


	    <div style="width:50%;float:left;" >
<b> Vouc. Date :</b>

  {{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }} 

    </div>

	    <div style="width:50%;float:left;" >
<b> Printing Date :</b>

	{{ date('d/m/Y'); }} 

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
<th>VAT</th>	 
	 <th>Receiveable Amount(TK)</th> 
  </tr>
  
<?php 

$tvat=0;
$tdiscount=0;
$tprice_before_vat_and_discount=0;
$tadjust=0;

?>
 
 @foreach ( $order->medicinetransitions as $t )
  <tr>
    <td> {{$t->medicine->name}}</td>
   <td><?php echo round($t->unit,2); ?> </td>
   <td><?php

if($t->unitprice == null){

   echo round($t->medicine->unitprice,2);

}
else{
 echo round($t->unitprice,2);	
	
}


   ?> </td>
   <?php 

if($t->unitprice == null){

   
$price_before_vat_and_discount = $t->medicine->unitprice * $t->unit ;
}
else{
	
$price_before_vat_and_discount = $t->unitprice * $t->unit ;	
}









   ?>
   
    <td><?php echo round($price_before_vat_and_discount,2); ?></td>
	 <td><?php echo round($t->totaldiscount,2); ?></td>
	 <td><?php echo round($t->totalvat,2); ?></td>
	 <td><?php echo round($t->adjust,2); ?></td>
	 
	 <?php 
	 $tvat = $tvat + $t->totalvat ;
	 $tdiscount = $tdiscount + $t->totaldiscount;
	 $tprice_before_vat_and_discount = $price_before_vat_and_discount + $tprice_before_vat_and_discount;
	 $tadjust = $tadjust + $t->adjust;
	 
	 
	 
	 
	 ?>
	 
	 
  </tr>
@endforeach 




</table>


  <div style="height:10px; " id="two" >

<b>Gross Price:</b> <?php echo round($tprice_before_vat_and_discount,2); ?> TK <br>
<b> (-) Discount:</b>  <?php echo round($tdiscount,2); ?>  TK <br>
<b> (+) VAT:</b>  <?php echo round($tvat,2); ?>  TK <br>
 <hr>

<b>Receiveable Amount:</b><?php   echo round($tadjust,2);  ?>TK. <br>
 
<b>(-) Paid:</b> <?php  echo round($order->pay_in_cash, 2);  ?>TK.<br>
 
<b>(-) Adjust Adv. payemnt:</b> <?php  echo round($order->pay_by_adv, 2);  ?>TK. <br>

<hr>

<b> Due:</b> <?php  echo round($order->due, 2);  ?>TK.



<p>

<b >Entry By :</b> {{$order->user->name}}

	
<P> <b> Thanks for Patients </b>

  <br>
  <b>Powered By: BICTSOFT</b>	

	
	</div>
	
	


	
	
	
	
	
	
	
	
	
	
</div>








</div>


			<?php if( $i < 1) { ?>
	<p style="page-break-after:always" ></p>
 <?php } } ?>
</body>
</html>