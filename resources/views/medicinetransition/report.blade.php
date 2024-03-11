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
  <?php  
$totalkhoroch = 0;
$totalbaki =0;
$totaladvance = 0; 
$totalbeton=0;
 $totalcommission=0; 
 $totaldharshod=0;
 $totaldoctorcommission=0;
$patientferot=0;
$totaldoctorshare=0;

$totalmedicineCompanyerdharshod=0;
$totalmedicinemotkroy = 0;
$totalmedcinebakikroy = 0;
$totalmedicinenogodkroy = 0;

///////////// income variable 

$totalincome_from_pathology=0;
$total_discoubt_in_patho=0;
$total_vat_in_patho=0;
$net_income_from_pth =0;
$total_due_paid=0;
$mot_nogod_income_from_pathology=0;
$mot_nogod_sell_from_medicine=0;
$mot_nogod_sell_from_surgery=0;
$totalincome_from_medicine=0;
$total_discount_in_medicine=0;
$total_vat_in_medicine=0;
$net_income_from_medicine_from_all_itteration_of_loop =0;



$totalsell_from_surgery_by_substracting_discount=0; // exluding discount 
$total_discount_in_surgery=0;

$net_sell_from_surgery_from_all_itteration_of_loop =0;



$totalsell_from_cabine_by_substracting_discount=0; // exluding discount 
$total_discount_in_cabine =0;

$net_sell_from_cabine_from_all_itteration_of_loop =0;
$mot_nogod_sell_from_cabine=0;
$totalexcost=0;
  ?>


 
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


 <br><br>
<?php   $i=0; if (!$medicinetransition->isEmpty())  { ?>
<h5 >  <b> Medicine Sale Item Wise</b>  </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>
	  <th scope="col">   Quantity </th>
	  	 <th scope="col">  Amount(TK)  </th>
     

	<!-- <th scope="col"> বিক্রির পরিমাণ ( গ্রোস  প্রাইস= নেট প্রাইস + টাক্স )  ৳  </th> -->
	 <th scope="col">  Discount(TK)    </th>
	  
 <th scope="col"> Receiveable Amount= (Amount-Discount)   </th>
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($medicinetransition as $med  )
	
	<?php 
	$i++;
$totalincome_from_medicine= $totalincome_from_medicine+ $med->amount ;
$total_discount_in_medicine= $total_discount_in_medicine + $med->discount ;

//$total_vat_in_medicine= $total_vat_in_medicine + $med->vat ;

$net_income_in_medicine_in_every_single_iiteration = (	$med->amount + $med->discount );
$net_income_from_medicine_from_all_itteration_of_loop = $net_income_from_medicine_from_all_itteration_of_loop + $net_income_in_medicine_in_every_single_iiteration ;
	
	
	?>
	<tr>
	<td>{{ $i }} </td>
      <td >{{$med->medicine->name}}</td>
	  <td > <?php echo    number_format($med->quantity, 0, '.', ',');?>  </td>
	  <td>       <?php echo  number_format($net_income_in_medicine_in_every_single_iiteration, 2, '.', ',');?> </td>
      
	
      <td> <?php echo    number_format($med->discount, 2, '.', ',');?>   </td>
	  <td>  <?php echo number_format($med->amount, 2, '.', ',') ;?>  </td>
    </tr> 
@endforeach

  </tbody>
</table>(+)

 $total_due_medicine
<hr>
<span > Gross Amount of Medicine Sold: </span> <?php echo number_format($net_income_from_medicine_from_all_itteration_of_loop, 2, '.', ',') ;  ?> TK <br>

<span > Total Discount:     </span> <?php echo number_format($total_discount_in_medicine,2,'.',',')  ?> TK <br> <br><hr style="height:2px; width:100%; border-width:0; " > 
<b><span >(Gross Amount - Discount):  </span> </b>  <?php echo number_format($net_income_from_medicine_from_all_itteration_of_loop,2,'.',',');?> <?php echo  "-" ; ?>   <?php echo number_format($total_discount_in_medicine,2,'.',','); ?>  =     <?php echo number_format($totalincome_from_medicine,2,'.',',');  ?> TK <br>
    <span >  Medicine Sold in Due:  </span> <?php echo number_format($total_due_medicine,2,'.',',') ?>   TK <br>
  (-) 
  <hr>
   <b> <span >  So Medicine Sold in cash after Discount:    </span> <?php $mot_nogod_sell_from_medicine =  $totalincome_from_medicine - $total_due_medicine ?> <?php echo round ($mot_nogod_sell_from_medicine,0);?>  TK <br></b>
  <br> 
  

   <hr >


  <?php } ?> 




<?php $totalincome_from_medicine = 0;
$i =1;
$total_discount_in_medicine =0;
$net_income_in_medicine_in_every_single_iiteration =0;
$net_income_from_medicine_from_all_itteration_of_loop =0;

?>


<p><b> Medicine Sale Patient Wise</b> <br>


<table>
    
<thead>	
  <tr>
  <th> No.</th>
   <th style="width:40px;" >Patient ID</th>
 <th style="width:40px;" >Patient Name</th>
  <th style="width:40px;" > source </th> 
    <th style="width:150px;" >
	
	Medicine
    
	 </th>

    <th style="width:100px;"  >Gross Amnt(TK)</th>
		  <th style="width:100px;"  >Discount </th>
		  	  <th style="width:100px;"  >Receivable Amnt. </th>
	   <th style="width:100px;"  >Paid(TK)</th>
	      <th style="width:100px;"  >Adj. with Adv.</th>
	      <th style="width:100px;"  >Due(TK)</th>
	     
	   
	 <th style="width:100px;"  > Total Balance  </th>
<?php $i=1; $sum=0; $discount=0; $gross_amnt=0; $due=0; $pay_in_cash=0; $pay_id_adv = 0;  $ref=0; ?>
  </tr>
  </thead>
 @foreach ( $order as $t )


  <tr>
  
<td> {{$i}}</td>
 <td> {{$t->patient->id}} </td>
 <td> {{$t->patient->name}} </td>
 
 <?php if ($t->agentdetail_id ){ ?>
 
 <td> {{$t->agentdetail->name}} </td>
 <?php }  elseif ($t->doctor_id ){     ?>
 
  <td> {{$t->doctor->name}} </td>
 
 <?php } else { ?>
   <td> NA </td> 
   
 <?php } ?>
 <?php $i++ ;?>
    <td> 






<table>
  <tr>
    <th style="width:100px;" >Medicine Name </th>
	
	<th  >Qun.</th>
    <th>Unit Price</th>
	    <th>Gross Amnt.</th>
	<th>Discount</th>
    <th>Receivable Amnt.</th>
  </tr>
  

 
 @foreach($t->medicinetransitions as $m  )
  <tr>

    <td> {{ $m->medicine->name }}</td>
	   <td> <?php echo round($m->unit,0); ?></td>
   <td><?php

if($m->unitprice == null){

   echo round($m->medicine->unitprice,2);

}
else{
 echo round($m->unitprice,2);	
	
}

 ?> </td>
      <td><?php


if($m->unitprice == null){

   echo round(($m->medicine->unitprice * $m->unit) ,2);

}
else{
 	
 echo round(($m->unitprice * $m->unit) ,2);	
}

 ?> </td>
   <td><?php echo round($m->totaldiscount,2); ?> </td>
<td> <?php echo round($m->adjust,2); ?>  </td>
   	 
  </tr>
@endforeach 




</table>

</td>
  




 <td><?php $gross_amnt = $gross_amnt+ $t->totalbeforediscount; echo round($t->totalbeforediscount,2); ?> </td>
 <td><?php $discount= $discount+ $t->discount; echo round($t->discount,2); ?> </td>

	 <td><?php echo round($t->total,2); ?></td>
	  
	 <td><?php  $pay_in_cash = $pay_in_cash+$t->pay_in_cash;  echo round($t->pay_in_cash,2); ?></td>
	 	 <td><?php $pay_id_adv = $pay_id_adv + $t->pay_by_adv; echo round($t->pay_by_adv,2); ?></td>
	  <td><?php  $due = $due + $t->due; echo round($t->due,2); ?></td>
 
  <td><?php     $sum= $sum + $t->total;    echo round($sum ,2); ?></td>	 
	 
  </tr>

@endforeach 


  <tr>
  <th style="width:40px;" > Total</th>
   <th  >NA</th>
    <th  >NA</th>
 <th style="width:40px;" >NA</th>
  
    <th style="width:150px;" >
	
	 NA
    
	 </th>

    <th style="width:100px;"  >{{$gross_amnt}}</th>
		  <th style="width:100px;"  >{{$discount}} </th>
		  	  <th style="width:100px;"  >{{$gross_amnt - $discount}} </th>
	   <th style="width:100px;"  >{{$pay_in_cash}}</th>
	      <th style="width:100px;"  >{{$pay_id_adv}}</th>
	      <th style="width:100px;"  >{{$due}}</th>
	   
	 <th style="width:100px;"  > Total Balance  </th>

  </tr>











</table>



<P>















<h5 >  Return Medicine Item Wise   </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>
	  <th scope="col">   Quantity </th>
	  	 <th scope="col">  Amount(TK)  </th>
     

	<!-- <th scope="col"> বিক্রির পরিমাণ ( গ্রোস  প্রাইস= নেট প্রাইস + টাক্স )  ৳  </th> -->
	 <th scope="col">  Discount(TK)    </th>
	  
 <th scope="col"> Payable Amount= (Amount-Discount)   </th>
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($returnmedicinetransaction as $med  )
	
	<?php 
	$i++;
$totalincome_from_medicine= $totalincome_from_medicine+ $med->amount ;
$total_discount_in_medicine= $total_discount_in_medicine + $med->discount ;

//$total_vat_in_medicine= $total_vat_in_medicine + $med->vat ;

$net_income_in_medicine_in_every_single_iiteration = (	$med->amount + $med->discount );
$net_income_from_medicine_from_all_itteration_of_loop = $net_income_from_medicine_from_all_itteration_of_loop + $net_income_in_medicine_in_every_single_iiteration ;
	
	
	?>
	<tr>
	<th>{{ $i }}
      <td >{{$med->medicine->name}}</td>
	  <td >   <?php echo  number_format($med->quantity, 0, '.', ',');?>    </td>
	  <td>       <?php echo  number_format($net_income_in_medicine_in_every_single_iiteration, 2, '.', ',');?> </td>
      
	
      <td> <?php echo    number_format($med->discount, 2, '.', ',');?>   </td>
	  <td>  <?php echo number_format($med->amount, 2, '.', ',') ;?>  </td>
    </tr> 
@endforeach
	<tr>
	<th>Total
      <th >NA</th>
	  <th >NA</th>
	  <td>      <?php echo    number_format(	$net_income_from_medicine_from_all_itteration_of_loop, 2, '.', ',');?>  </td>
      

      <td> <?php echo    number_format($total_discount_in_medicine, 2, '.', ',');?>   </td>
	  <td>  <?php echo number_format($totalincome_from_medicine, 2, '.', ',') ;?>  </td>
    </tr> 
  </tbody>
</table>

<P>



<?php $total_pay_in_cash =0;

$total_pay_in_adv=0;

   ?>



<p><b> Medicine Return Patient Wise</b> <br>


<table>
    
<thead>	
  <tr>
  <th> No.</th>
   <th style="width:40px;" >Patient ID</th>
 <th style="width:40px;" >Patient Name</th>
  
    <th style="width:150px;" >
	
	 Medicine
    
	 </th>

    <th style="width:100px;"  >Gross Amnt(TK)</th>
		  <th style="width:100px;"  >Discount </th>
		  	  <th style="width:100px;"  >Payable Amnt. </th>
			  	      <th style="width:100px;"  >Type</th>
	   <th style="width:100px;"  >Paid(TK)</th>
	      <th style="width:100px;"  >Adj. with Adv.</th>

	   
	 <th style="width:100px;"  > Total Balance  </th>
<?php $i=1; $sum=0; $discount=0; $gross_amnt=0; $due=0; $pay_in_cash=0; $pay_id_adv = 0;  $ref=0; ?>
  </tr>
  </thead>
 @foreach ( $returnorder as $t )


  <tr>
  
<td> {{$i}}</td>
 <td> {{$t->patient->id}} </td>
 <td> {{$t->patient->name}} </td>
 

 <?php $i++ ;?>
    <td> 






<table>
  <tr>
    <th style="width:100px;" >Medicine Name </th>
	 <th>Qun.</th>
	  <th>Unit Price</th>
    <th>Gross Price</th>
	<th>Discount</th>
    <th>Receivable Amnt.</th>
  </tr>
  

 
 @foreach($t->returnmedicinetransaction as $m  )
  <tr>

    <td> {{ $m->medicine->name }}</td>
   <td><?php echo round($m->unit,0); ?> </td>	
   <td><?php echo round($m->medicine->unitprice,2); ?> </td>
   <td><?php echo round(($m->medicine->unitprice * $m->unit ),2); ?> </td>   
   <td><?php echo round($m->totaldiscount,2); ?> </td>
<td> <?php echo round($m->adjust,2); ?>  </td>
   	 
  </tr>
@endforeach 




</table>

</td>
  




 <td><?php $gross_amnt = $gross_amnt+ $t->total_cost_before_initial_vat_and_discount; 
 echo round($t->total_cost_before_initial_vat_and_discount,2); ?> </td>
 <td><?php $discount_in_this =   $t->total_cost_before_initial_vat_and_discount - $t->total;  
 $discount= $discount+ $discount_in_this; echo round($discount_in_this,2); ?> </td>

	 <td><?php echo round($t->total,2); ?></td>
	  

	  <td><?php  if ($t->transitiontype == 1)
	  {
		echo "Pay in Cash";  
		 
$total_pay_in_cash = $total_pay_in_cash + $t->total;
		 
	  }else{
	echo "Adjust";  	  
	$total_pay_in_adv = $total_pay_in_adv + $t->total;	  
	  }




?>

  </td> 
 
 <td>
 <?php    
 if ($t->transitiontype == 1) 
 { 
echo round($t->total,2);   
 } 
 ?>
 


</td>

<td>
 <?php    if ($t->transitiontype == 2) { echo round($t->total,2);    }                      ?>
 
</td>
 
 
 
 
  <td><?php     $sum= $sum + $t->total;    echo round($sum ,2); ?></td>	 
	 
  </tr>

@endforeach 


  <tr>
  <th style="width:40px;" > Total</th>
   <th  >NA</th>
    <th  >NA</th>
 <th style="width:40px;" >NA</th>
  


    <th style="width:100px;"  >{{$gross_amnt}}</th>
		  <th style="width:100px;"  >{{$discount}} </th>
		  	  <th style="width:100px;"  >{{$gross_amnt - $discount}} </th>
		   <th style="width:100px;"  >NA</th>	  
	   <th style="width:100px;"  >{{$total_pay_in_cash}}</th>
	      <th style="width:100px;"  >{{$total_pay_in_adv}}</th>
	     
	   
	 <th style="width:100px;"  > Total Balance  </th>

  </tr>











</table>




















<?php $i=1;

$final_amount = 0;
	$final_due =0;



?>
<P>
<p>
<b>  Due Transition </b>



  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>
	  <th scope="col"> Purchased Amount(TK) </th>
	  	 <th scope="col">  Due(TK)  </th>
		 <th> Date</th>
     

	 

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($duetransitions as $d  )
	
	<?php 
	$i++;

	$final_amount = $final_amount + $d->totalamount;
	$final_due = $final_due + $d->amount;
	?>
	<tr>
	<th>{{ $i }}
      <td >{{$d->patient->name}}</td>
	  <td >{{$d->totalamount}}</td>
	   <td >{{$d->amount}}</td>
   <td> {{ Carbon\Carbon::parse($d->created_at)->format('d/m/Y , h:i:sa') }} </td>
    </tr> 
@endforeach
	<tr>
	<th>Total
      <th >NA</th>
	  <th >  <?php echo    number_format(	$final_amount, 2, '.', ',');?>   </th>
	  <td>      <?php echo    number_format(	$final_due, 2, '.', ',');?>  </td>
<td>NA </td>
    </tr> 
  </tbody>
</table>


<P>



<p>

<h2> Due Collection </h2>
<?php $i=1;

$final_amount = 0;
	



?>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>
	  <th scope="col"> Paying Amount  </th>
	 <th> Date </th>
     

	 

    </tr>
  </thead>
  <tbody>
    
	
	
	<?php $j =0 ; ?>
	@foreach($duecollection as $du  )
	
	<?php 
	$j++;

	$final_amount = $final_amount + $du->amount;
	
	?>
	<tr>
	<th>{{ $j }}
      <td >{{$du->patient->name}}</td>
	 
	   <td >{{$du->amount}}</td>
	   
	   <td> {{ Carbon\Carbon::parse($du->created_at)->format('d/m/Y , h:i:sa') }} </td>

    </tr> 
@endforeach
	<tr>
	<td>Total</td>
      <td >NA</td>
	  <td >  <?php echo    number_format(	$final_amount, 2, '.', ',');?>   </td>
	<td> NA  </td>

    </tr> 
  </tbody>
</table>









</div>

<p>




<p>

<h2>  Refund </h2>
<?php $i=1;

$final_amount_refund = 0;
	



?>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>
	  <th scope="col"> Paying Amount  </th>
	 <th> Date </th>
     

	 

    </tr>
  </thead>
  <tbody>
    
	
	
	<?php $j =0 ; ?>
	@foreach($duerefund as $du  )
	
	<?php 
	$j++;

	$final_amount_refund = $final_amount_refund + $du->amount;
	
	?>
	<tr>
	<th>{{ $j }}
      <td >{{$du->patient->name}}</td>
	 
	   <td >{{$du->amount}}</td>
	   
	   <td> {{ Carbon\Carbon::parse($du->created_at)->format('d/m/Y , h:i:sa') }} </td>

    </tr> 
@endforeach
	<tr>
	<td>Total</td>
      <td >NA</td>
	  <td >  <?php echo    number_format(	$final_amount_refund, 2, '.', ',');?>   </td>
	<td> NA  </td>

    </tr> 
  </tbody>
</table>









</div>





<P>













<b>Net Income from Phermachy Section : </b> <br>Total Medicine Sale in Cash + Total Due Collection in Cash - Return Medicine in Cash - Refund  <br> 
= <?php echo  $mot_nogod_sell_from_medicine ; echo "+"; echo $final_amount; echo "-"; echo  $total_pay_in_cash; echo "-"; echo $final_amount_refund;  ?>
=    <?php   echo round(($mot_nogod_sell_from_medicine + $final_amount - $total_pay_in_cash - $final_amount_refund ),0);      ?> TK



</div>


</body>
</html>