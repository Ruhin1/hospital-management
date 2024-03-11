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

</head>
<body style="font-family: Times New Roman;">
<div id="c" >
<div id="head" >
<img width="500px;"   src="img/logo.jpg" >
<hr>
</div>



<div style="font-size:2.5 px;"  >




     


  
  </div>
   Test Name: {{$reportlist}}

<br>


	    Between date:
	   
	   <?php 
	     
	    $myDateTime = DateTime::createFromFormat('Y-m-d', $start);  echo  $myDateTime->format('d/m/Y'); ?> 
    
	   

	   to 
	   	   <?php 
   $myDateTime = DateTime::createFromFormat('Y-m-d', $e);  echo  $myDateTime->format('d/m/Y');
	   ?>









<P> 

Details:

<?php $i=1; $totalrecevieable=0;  $totaldis=0; $totalamnt=0; ?>
<table>
  <tr>
 <th>No.</th>
    <th style="width:270px;"  >Patient </th>
   
    <th>Amount</th>
	<th>Discount</th>
	<th>Receiveable Amount</th>
		
  </tr>
  

 
 @foreach ( $reporttransaction as $t )
  <tr>
     <td>{{$i}}</td>
     <?php if($t->patient) {   ?>     <td>      {{$t->patient->name}} </td> <?Php } 
	 
	 else { ?> 
	 
	 <td> NA </td>  <?php } ?>

    <td> <?PHP echo round( ( $t->amount),2) ?> </td>
	    <td> <?php echo round( $t->totaldiscount , 2) ?></td>
		    <td> <?php echo round( $t->adjust, 2) ?></td>
			
			<?php $totalrecevieable= $totalrecevieable+ $t->adjust;
			
			$totaldis = $totaldis+ $t->totaldiscount;
			
			$totalamnt = $totalamnt+ $t->amount;
			
			?>
			
  </tr>
  
  
  
  <?php $i++; ?> 
@endforeach 





  <tr>
     <td>NA</td>
   <td>Total:</td>

    <td> <?PHP echo round( ( $totalamnt),2) ?> </td>
	    <td> <?php echo round( $totaldis , 2) ?></td>
		    <td> <?php echo round( $totalrecevieable, 2) ?></td>
			
			
  </tr>






</table>


<p>



Date Wise Summary:


<table>
  <tr>

    <th style="width:270px;"  >Date </th>
    <th>Qun.</th>
    <th>Amount</th>
	<th>Discount</th>
	<th>Receiveable Amount</th>
  </tr>
  

 
 @foreach ( $income_from_pathology_test as $t )
  <tr>
   <td>{{$t->month_day}}</td>
    <td> {{$t->total_unit}}</td>
    <td> <?PHP echo round( (  $t->discount  + $t->amount),2) ?> </td>
	    <td> <?php echo round( $t->discount , 2) ?></td>
		    <td> <?php echo round( $t->amount, 2) ?></td>
  </tr>
@endforeach 







</table>














Printed BY:{{ Auth()->user()->name }}<br>



	   
	    











Printed At: <?php echo date('d/m/Y'); ?>

</div>



</body>
</html>