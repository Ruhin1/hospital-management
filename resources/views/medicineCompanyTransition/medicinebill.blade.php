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


</style>

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



    <div style="height:10px;" id="one" >
    <div style="width:30%; float:left;" >

      <b><u>Purchasing Report</u></b>

	</div>
    <div style="width:40%;float:left;" >
 <b>Company ID:</b> {{$data->id}}
    </div>

	    <div style="width:30%;float:left;" >
		<b>Voucer No:</b> {{$order->id}}

    </div>

  </div>


    <div style="height:10px;" id="two" >
    <div style="width:40%; float:left;" >
      <b>Company Name :</b> {{$data->name}}
    </div>

    <div style="width:40%; float:left;" >
      <b>Type :</b> 
	  <?php if ($order->transitiontype == 1) { ?>
	  Purchase 
	  <?php } if ($order->transitiontype == 2) { ?>
	 Return Medicine to Company 
	   <?php } ?>
	 
    </div>	


  </div>
     

  
 <br> 


<table>
  <tr>
    <th style="width:300px;" >Product Name </th>
    <th>Qun.</th>
	<th>Unit Pr.(TK)</th>
   <th>Total(TK)</th>
  </tr>
  
<?php 

$tvat=0;
$tdiscount=0;
$tprice_before_vat_and_discount=0;
$tadjust=0;

?>
 
 @foreach ( $order->medicineCompanyTransition as $t )
  <tr>
    <td> {{$t->medicine->name}}</td>
   <td><?php echo round($t->Quantity,0); ?> </td>
   <td><?php echo round($t->unit_price,2); ?> </td>
   <?php 

$price_before_vat_and_discount = $t->unit_price * $t->Quantity ;
   ?>
   
 <td><?php echo round($price_before_vat_and_discount,2); ?> </td>   
	 

	 
	 
  </tr>
@endforeach 




</table>



    <div style="height:10px;" id="one" >
    <div style="width:33%; float:left;" >
<b >Due:</b><?php  echo round($order->due, 2);  ?> TK</b>  
	</div>
	
	    <div style="width:33%; float:left;" >
<b >Paid:</b> <?php  echo round($order->pay_in_cash, 2);  ?> TK</b>
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



</body>
</html>