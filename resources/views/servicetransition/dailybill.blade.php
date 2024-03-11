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



<bodY>


<div id="head" >
<img width="500px;"   src="img/logo.jpg" >
<hr>
</div>



<p>



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
   <td><?php echo round($m->reportlist->unitprice,2); ?> </td>
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




 Total Net Income From Pathology ( Adjusting with Customer Advance): Total balance - Total Adjustment from Customer Advance Payment - Toral Refund = {{$sum}} - {{$pay_id_adv}} - {{$ref}} = {{ $sum - $pay_id_adv - $ref }}TK
<br>

 Total Net Income From Pathology ( Without Adjusting with Customer Advance): Total balance  - Toral Refund = {{$sum}}  - {{$ref}} = {{ $sum  - $ref }}TK


<hr>

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








 <br><br>
<?php  $i=0;	  if (!$income_from_pathology_test->isEmpty())  {  ?>
<h5 >  Income from Pathology: Test name wise  </h5>
  <hr>
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
</table>(+)


<hr>
<span >   Total Sale in Pathology Section:          </span> <?php echo number_format($net_income_from_pth,2,'.',',');  ?> TK <br>
<span >Total Vat:    </span> <?php echo number_format($total_vat_in_patho,2,'.',',')  ?> TK<br>
<span > Total Discount:      </span> <?php echo number_format($total_discoubt_in_patho,2,'.',',');  ?> TK <br> <br><hr style="height:2px; width:100%; border-width:0; " > 
<b><span > So Receiveable Amount: (Total Sale+VAT-Discount) :  </span> </b>
<?php echo number_format($net_income_from_pth,2,'.',',');           

echo "+";  echo number_format($total_vat_in_patho,2,'.',','); 
echo "-"; echo number_format($total_discoubt_in_patho,2,'.',',');

?> =     <?php echo number_format($totalincome_from_pathology,2,'.',',');  ?> TK <br>
    <span >  Sale on Due:  </span>  {{$total_due_patho}} TK <br>
  (-) 
  <hr>
   <b> <span >  So Total income in Cash from Pathology:     </span> <?php $mot_nogod_income_from_pathology =  $totalincome_from_pathology - $total_due_patho ?> <?php echo number_format($mot_nogod_income_from_pathology,2,'.',',');  ?>TK <br></b>
  <br> 
  

   <hr >


  <?php } ?> 
 






</body>
</html>