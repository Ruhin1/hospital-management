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



<bodY>


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





<b> Pathology Order </b>

<table>
    
<thead>	
  <tr>
  <th> No.</th>
   <th style="width:40px;" >Patient ID</th>
 <th style="width:40px;" >Patient Name</th>
  <th style="width:40px;" > source </th> 
    <th style="width:150px;" >
	
	  Tests
    
	 </th>

    <th style="width:100px;"  >Gross Amnt(TK)</th>
		  <th style="width:100px;"  >Discount </th>
		  	  <th style="width:100px;"  >Receiveable Amnt. </th>
	   <th style="width:100px;"  >Paid(TK)</th>
	      <th style="width:100px;"  >Adj. with Adv.</th>
	      <th style="width:100px;"  >Due(TK)</th>
	   
	 <th style="width:100px;"  > Total Balance  </th>
<?php $i=1; $sum=0; $discount=0; $gross_amnt=0; $due=0; $pay_in_cash=0; $pay_id_adv = 0;  $ref=0; ?>
  </tr>
  </thead>
 @foreach ( $transpatho as $t )


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
    <th style="width:100px;" >Test Name </th>
    <th>Gross Price</th>
	<th>Discount</th>
    <th>Receivable Amnt.</th>
  </tr>
  

 
 @foreach($t->reporttransaction as $m  )
  <tr>

    <td> {{ $m->reportlist->name }}</td>
   <td><?php

if($m->unitprice == null){

   echo round($m->reportlist->unitprice,2);

}
else{
 echo round($m->unitprice,2);	
	
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


<p>




<?php $ref =0; ?>

<P>
<?php if (!$refund->isEmpty())  { ?>
<b>Refunds </b>


<?php $j=1; ?>

<table>
    
<thead>	
  <tr>
  <th> No.</th>
   <th style="width:40px;" >Patient ID</th>
 <th style="width:40px;" >Patient Name</th>
  
    <th style="width:100px;"  >Refund Amnt(TK)</th>
    <th style="width:100px;"  > Total Refund(TK)</th>

  </tr>
  </thead>
 @foreach ( $refund as $t )

  <tr>
  
<td> {{$j}}</td>
 <td> {{$t->patient->id}} </td>
 <td> {{$t->patient->name}} </td>
 <?php $j++ ;?>
   

 <td><?php echo round($t->refundamount,2); ?> </td>
	 
 <td><?php  $ref = $ref +$t->refundamount;   echo round($ref,2); ?> </td>	 
  </tr>

@endforeach 


















</table>

<?php } ?>




<hr>



<b> Pathology Tests have done from others Diagnostic center </b>




<table>
    
<thead>	
  <tr>
  <th> No.</th>
   <th style="width:40px;" >Patient ID</th>
 <th style="width:40px;" >Patient Name</th>

    <th style="width:150px;" >
	
	  Tests
    
	 </th>

    <th style="width:100px;"  >Gross Amnt(TK)</th>
		  <th style="width:100px;"  >Discount </th>
		  	  <th style="width:100px;"  >Receiveable Amnt. </th>
	   <th style="width:100px;"  >Paid(TK)</th>
	
	      <th style="width:100px;"  >Due(TK)</th>
	   
	 <th style="width:100px;"  > Total Balance  </th>
<?php $i=1; $sumo=0; $discounto=0; $gross_amnto=0; $dueo=0; $pay_in_casho=0;   $refo=0; ?>
  </tr>
  </thead>
 @foreach ( $pathologyTestfromother as $t )


  <tr>
  
<td> {{$i}}</td>
 <td> {{$t->patient->id}} </td>
 <td> {{$t->patient->name}} </td>

 <?php $i++ ;?>
    <td> 

<table>
  <tr>
    <th style="width:100px;" >Test Name </th>
    <th>Gross Price</th>
	<th>Discount</th>
    <th>Receivable Amnt.</th>
  </tr>
  

 
 @foreach($t->pathologytransitionfromotherinstitue as $m  )
  <tr>

    <td> {{ $m->reportlist->name }}</td>
   <td><?php


if($m->unitprice == null){

   echo round($m->reportlist->unitprice,2);

}
else{
 echo round($m->unitprice,2);	
	
}

 ?> </td>
   <td><?php echo round($m->totaldiscount,2); ?> </td>
<td> <?php echo round($m->adjust,2); ?>  </td>
   	 
  </tr>
@endforeach 




</table>

</td>
  




 <td><?php $gross_amnto = $gross_amnto+ $t->totalbeforediscount; echo round($t->totalbeforediscount,2); ?> </td>
 <td><?php $discounto = $discounto + $t->discount; echo round($t->discount,2); ?> </td>

	 <td><?php echo round($t->total,2); ?></td>
	  
	 <td><?php  $pay_in_casho = $pay_in_casho+$t->pay_in_cash;  echo round($t->pay_in_cash,2); ?></td>
	
	  <td><?php  $dueo = $dueo + $t->due; echo round($t->due,2); ?></td>
 
  <td><?php     $sumo = $sumo + $t->total;    echo round($sumo ,2); ?></td>	 
	 
  </tr>

@endforeach 


  <tr>
  <th style="width:40px;" > Total</th>

    <th  >NA</th>
 <th style="width:40px;" >NA</th>
  
    <th style="width:150px;" >
	
	 NA
    
	 </th>

    <th style="width:100px;"  >{{$gross_amnto}}</th>
		  <th style="width:100px;"  >{{$discounto}} </th>
		  	  <th style="width:100px;"  >{{$gross_amnto - $discounto}} </th>
	   <th style="width:100px;"  >{{$pay_in_casho}}</th>

	      <th style="width:100px;"  >{{$dueo}}</th>
	   
	 <th style="width:100px;"  > Total Balance  </th>

  </tr>











</table>

<b> Total Amount of Pathology Test done from other Diagnostic Center (in Cash ) :  {{$pay_in_casho}} TK </b>


<p>
















Pathology Test Name Wise and Quantity 


<?php

	$totalincome_from_pathology=0;
	$total_discoubt_in_patho =0;
	$net_income=0;
	$net_income_from_pth=0;
	$i=1;
	$total_vat_in_patho=0;
	$total_due_patho= 0;

?> 









<P>

  <hr>
<?php $total_due_paid_pathology =0; ?>

<?php if (!$income_from_due_payment_pathology->isEmpty())  { ?>
<h5 >   Due Collection for Pathology:  </h5>

  

  <table class="table table-responsive">
  <thead>
    <tr> 
    
      <th scope="col"> Patinet Name:</th>
	  <th scope="col"> Due Payment</th>
	  	 <th scope="col"> Amount  </th>
     	  	 <th scope="col"> Discount on Arrerar </th>

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($income_from_due_payment_pathology as $due_paid )
	
	<?php 
	
$total_due_paid_pathology = $total_due_paid_pathology+ $due_paid->amount_of_due_paid  ;

	
	
	?>
	<tr>
      <th >{{$due_paid->patient->name}}</th>
	   <th >{{$due_paid->totalamount}}</th>
	  
	  <td>{{ $due_paid->amount_of_due_paid }}</td>
      <td>{{ $due_paid->duediscount }}</td>
	
    </tr>
@endforeach

  </tbody>
</table> 


<hr>
<b><span > So Total Amount of Due Collection From Pathology:   </span> <?php echo $total_due_paid_pathology  ?> TK<br></b>




 <br><br>
   <hr >


  <?php } ?> 


<?php $pathology_refund=0; ?>

 <br>
<?php   $i=0; if (!$money_back_customer_pathology->isEmpty())  { ?>
<h5 > Pathology Refund: </h5>
  
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>

	  	 <th scope="col">  Amount(TK)  </th>
     


	  

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($money_back_customer_pathology as $pt  )
	@if($pt->amount > 0)
	<?php 
	$i++;
$pathology_refund = $pathology_refund + $pt->amount;
	
	?>
	<tr>
	<th>{{ $i }}
      <th >{{$pt->patient->name}}</th>
	 
	  <td>       <?php echo  number_format($pt->amount, 2, '.', ',');?> </td>
      

    </tr> 
    @endif
@endforeach

  </tbody>
</table>

 
<hr>
<span > Refund in Pathology: </span> <?php echo number_format($pathology_refund, 2, '.', ',') ;  ?> TK <br>



 <br> 
  




  <?php } ?> 
















<hr>


  <hr>
   <b> <span >  Sale in Cash from Pathology:     {{$pay_in_cash}}TK
  <br> 
  
<span >(+) Total Amount of Due Collection From Pathology:</span> <?php echo number_format($total_due_paid_pathology,2,'.',',');  ?> TK <br>


<span >(-) Refund in Pathology: </span> <?php echo number_format($pathology_refund, 2, '.', ',') ;  ?> TK <br>



<span > (-) Total Amount of Pathology Test done from other Diagnostic Center (in Cash ) :  {{$pay_in_casho}} TK
   <hr >

so Total Income from Pathology = {{$pay_in_cash + $total_due_paid_pathology - $pathology_refund - $pay_in_casho  }} TK

 <P>
 <hr>
 
 
  <br><br>
<?php  $i=0;	  if (!$income_from_pathology_test->isEmpty())  {  ?>
<h5 >  Income from Pathology: Test name wise  </h5>
  
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Test Name </th>
	   <th scope="col"> Qun. </th>
	  	 <th scope="col"> Amount(TK) </th>
     
     <th scope="col"> VAT(TK)  </th> 
	
	 <th scope="col">  Discount(TK)    </th>
	  
 <th scope="col">  Receiveable Amount  =  ( Amount -  Discount) + VAT   </th>
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($income_from_pathology_test as $inc )
	
	<?php 
	

	
	$i++;
$totalincome_from_pathology= $totalincome_from_pathology+ $inc->amount ;
$total_discoubt_in_patho= $total_discoubt_in_patho + $inc->discount ;
$total_vat_in_patho= $total_vat_in_patho + $inc->vat ;
$net_income = (	$inc->amount + $inc->discount - $inc->vat);
$net_income_from_pth = $net_income_from_pth + $net_income ;

	
	?>
	<tr>
<th> {{ $i }}
      <th >{{$inc->reportlist->name}}</th>
	     <th >{{$inc->total_unit}}</th>
	  
	  <td>{{ $net_income }}</td>
      
	  <td>{{$inc->vat}}</td>
      <td>     <?php echo    number_format($inc->discount, 2,'.',',');     ?></td>
	  <td>  <?php echo    number_format($inc->amount, 2,'.',',');     ?> </td>
    </tr>
@endforeach

  </tbody>
</table>

  <?php } ?> 

<hr>





  <br><br>
<?php  $i=0; $receuveable_amnt=0;	  if (!$test_by_agent->isEmpty())  {  ?>
<h5 >   Pathology Order Number from Agent Wise  </h5>
  
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Agent Name </th>
	   <th scope="col">Order Qun. </th>
	  	 <th scope="col"> Amount(TK) </th>
     

	
	 <th scope="col">  Discount(TK)    </th>
	  
 <th scope="col">  Receiveable Amount  =  ( Amount -  Discount) + VAT   </th>
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($test_by_agent as $inc )
	
	<?php 
	

	
	$i++;
$receuveable_amnt = $inc->amount - $inc->discount;

	
	?>
	<tr>
<th> {{ $i }}
      <th >{{$inc->agentdetail->name}}</th>
	     <th >{{$inc->total_unit}}</th>
	  <td>     <?php echo    number_format($inc->amount, 2,'.',',');     ?></td> 
      <td>     <?php echo    number_format($inc->discount, 2,'.',',');     ?></td>
	  <td>  <?php echo    number_format($receuveable_amnt, 2,'.',',');     ?> </td>
    </tr>
@endforeach

  </tbody>
</table>

  <?php } ?> 


<hr>




  <br><br>
<?php  $i=0;	$receuveable_amnt=0;  if (!$test_by_doctor->isEmpty())  {  ?>
<h5 >   Pathology Order Number from Doctor(as Source )  Wise  </h5>
  
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Doctor Name </th>
	   <th scope="col">Order Qun. </th>
	  	 <th scope="col"> Amount(TK) </th>
     

	
	 <th scope="col">  Discount(TK)    </th>
	  
 <th scope="col">  Receiveable Amount  =  ( Amount -  Discount) + VAT   </th>
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($test_by_doctor as $inc )
	
	<?php 
	

	
	$i++;
$receuveable_amnt = $inc->amount - $inc->discount;

	
	?>
	<tr>
<th> {{ $i }}
      <th >{{$inc->doctor->name}}</th>
	     <th >{{$inc->total_unit}}</th>
	  
	  <td>     <?php echo    number_format($inc->amount, 2,'.',',');     ?></td> 
      <td>     <?php echo    number_format($inc->discount, 2,'.',',');     ?></td>
	  <td>  <?php echo    number_format($receuveable_amnt, 2,'.',',');     ?> </td>
    </tr>
@endforeach

  </tbody>
</table>

  <?php } ?> 



<hr>


  <br><br>
<?php  $i=0;





$receuveable_amnt = 0 ;






	  if (!$test_by_user->isEmpty())  {  ?>
<h5 >   Pathology Orders collection from Employees  </h5>
  
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Employee Name </th>
	   <th scope="col">Order Qun. </th>
	  	 <th scope="col"> Amount(TK) </th>
     

	
	 <th scope="col">  Discount(TK)    </th>
	  
 <th scope="col">  Receiveable Amount  =  ( Amount -  Discount) + VAT   </th>
 
 
 	 <th scope="col">  Paid by Cash(TK)    </th>
	 
	  
 	 <th scope="col">  Paid by Advance Payment (TK)    </th>
	 
	  	 <th scope="col">  Due(TK)    </th>
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($test_by_user as $inc )
	
	<?php 
	

	
	$i++;
$receuveable_amnt = $inc->amount - $inc->discount;

	
	?>
	<tr>
<th> {{ $i }}
      <th >{{$inc->User->name}}</th>
	     <th >{{$inc->total_unit}}</th>
	  

      
	  <td>     <?php echo    number_format($inc->amount, 2,'.',',');     ?></td> 
      <td>     <?php echo    number_format($inc->discount, 2,'.',',');     ?></td>
	  <td>  <?php echo    number_format($receuveable_amnt, 2,'.',',');     ?> </td>
	        <td>     <?php echo    number_format($inc->paid, 2,'.',',');     ?></td>
			 <td>     <?php echo    number_format($inc->adjust, 2,'.',',');     ?></td>
		<td>     <?php echo    number_format($inc->due, 2,'.',',');     ?></td>
    </tr>
@endforeach

  </tbody>
</table>

  <?php } ?> 









 <?php $i=1; if (!$reagents->isEmpty())  {  ?>
    <h5 >  Reagents List  </h5>
      
      <table class="table table-responsive">
      <thead>
        <tr> 
        <th>No.</th>
          <th scope="col"> Name </th>
         <th scope="col"> Qun. </th>
        </tr>
      </thead>
      <tbody>
        
      
      
      
      @foreach($reagents as $r )

      <tr>
    <td> {{ $i }} </td>
          <td >{{$r->name}}</td>
           <td >{{$r->quantity}}</td>
        </tr>
        <?php $i++ ; ?>
    @endforeach
    
      </tbody>
    </table>
    
      <?php } ?> 






<p>
Powerd by:BICTSFOT






</body>
</html>