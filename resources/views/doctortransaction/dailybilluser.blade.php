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

	   <b> All Transaction in Outdoor Doctor Section on the   date:
	   
	   <?php 
	     
	    $myDateTime = DateTime::createFromFormat('Y-m-d', $start);  echo  $myDateTime->format('d/m/Y'); ?> 
    
	   

	   to 
	   	   <?php 
   $myDateTime = DateTime::createFromFormat('Y-m-d', $e);  echo  $myDateTime->format('d/m/Y'); $sum=0; $i=1; $ref=0;
	   ?>
	   
	    </b>
<p>

<b>Doctor Visit Fees Collection </b>

<table>
    
<thead>	
  <tr>
  <th> No.</th>
   <th style="width:40px;" >Patient ID</th>
 <th style="width:40px;" >Patient Name</th>
  
    <th style="width:150px;" >
	
	Doctor
    
	 </th>

    <th style="width:100px;"  >Agent</th>
		  <th style="width:100px;"  >Fees </th>
		  	  <th style="width:100px;"  > Paid </th>
			   	  <th style="width:100px;"  >Adjust With Deposit </th>
	   <th style="width:100px;"  >Due </th>
	
	 <?php 
$fees=0;
$nogod=0;
$due=0;
$adjust_with_advance =0;

?>	 


  </tr>
  </thead>
 @foreach ( $transpatho as $t )


  <tr>
  
<td> {{$i}}</td>
 <td> {{$t->patient->id}} </td>
 <td> {{$t->patient->name}} </td>
 <?php $i++ ;?>
    
 <td> {{$t->doctor->name}} </td>	
	
 <td>

<?php if ($t->agentdetail)
{ ?>
 {{$t->agentdetail->name}} </td>
  
<?php } else { ?>

NA

<?php } ?>



 <td><?php echo round($t->grossamount,2); ?> </td>
 <td><?php echo round($t->nogod,2); ?> </td>
<td><?php echo round($t->adjust_with_advance,2); ?> </td>
	 <td><?php echo round($t->due,2); ?></td>
<?php 	  
	$fees= $fees + $t->grossamount;
$nogod= $nogod + $t->nogod;
$due= $due +$t->due ; 

$adjust_with_advance = 	$adjust_with_advance + $t->adjust_with_advance;
?>
	 
  </tr>

@endforeach 


  <tr>
  
<td> Total</td>
 <td> NA </td>
 <td> NA </td>

    
 <td> NA </td>	
	
 <td> NA </td>
  




 <td><?php echo round($fees,2); ?> </td>
  <td><?php echo round($nogod,2); ?> </td>
   <td><?php echo round($adjust_with_advance,2); ?> </td>


	 <td><?php echo round($due,2); ?></td>
	  
	 
	 
  </tr>


</table>




<P>


<b> Treatment Fees </b>

<table>
    
<thead>	
  <tr>
  <th> No.</th>
   <th style="width:40px;" >Patient ID</th>
 <th style="width:40px;" >Patient Name</th>
 <th> Details</th>
  
    <th style="width:150px;" >
	
	Doctor
    
	 </th>

    <th style="width:100px;"  >Agent</th>
	
		  	  <th style="width:100px;"  > Paid </th>

	
	 <?php 

$amount =0;

?>	 


  </tr>
  </thead>
 @foreach ( $dentalserviceodermoney_deposit as $t )


  <tr>
  
<td> {{$i}}</td>
 <td> {{$t->patient->id}} </td>
 <td> {{$t->patient->name}} </td>
  <td> {{$t->code}} </td>
 <?php $i++ ;?>
<?php if ($t->doctor)
{ ?>    
 <td> {{$t->doctor->name}} </td>	

<?php } else { ?>

<td>NA</td>

<?php } ?>








	
 <td>

<?php if ($t->agentdetail)
{ ?>
 {{$t->agentdetail->name}} </td>
  
<?php } else { ?>

NA

<?php } ?>



 <td>
 
 
 <?php echo round($t->amount,2); ?> </td>

<?php 	  
	$amount= $amount + $t->amount;

?>
	 
  </tr>

@endforeach 


  <tr>
  
<td> Total</td>
 <td> NA </td>
 <td> NA </td>

    
 <td> NA </td>	
	
 <td> NA </td>
  
 <td> NA </td>



 <td><?php echo round($amount,2); ?> </td>

	  
	 
	 
  </tr>


</table>

















 






</body>
</html>