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
 Collection by Employee: <b> {{$user}}</b><br>

	   <b> All Transaction in Pathology Section on the   date:
	   
	   <?php 
	     
	    $myDateTime = DateTime::createFromFormat('Y-m-d', $start);  echo  $myDateTime->format('d/m/Y'); ?> 
    
	   

	   to 
	   	   <?php 
   $myDateTime = DateTime::createFromFormat('Y-m-d', $e);  echo  $myDateTime->format('d/m/Y'); $sum=0; $i=1; $ref=0;
	   ?>
	   
	    </b>
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
	      <th style="width:100px;"  >Due(TK)</th>
	   
	 <th style="width:100px;"  > Total Balance  </th>

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
  




 <td><?php echo round($t->totalbeforediscount,2); ?> </td>
 <td><?php echo round($t->discount,2); ?> </td>

	 <td><?php echo round($t->total,2); ?></td>
	  
	 <td><?php echo round($t->pay_in_cash,2); ?></td>
	  <td><?php echo round($t->due,2); ?></td>
 
  <td><?php  $sum= $sum + $t->total;    echo round($sum ,2); ?></td>	 
	 
  </tr>

@endforeach 
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




So Total Net Income From Pathology: Total balance - Toral Refund = {{$sum}} - {{$ref}} = {{ $sum - $ref }}TK


<hr>

 






</body>
</html>