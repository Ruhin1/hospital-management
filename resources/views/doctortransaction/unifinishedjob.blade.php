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









Unfinished Tasks

<hr>

 
 
 
 


<table>
    
<thead>	
  <tr>
  <th> No.</th>
   <th style="width:40px;" >Patient ID</th>
 <th style="width:40px;" >Patient Name</th>
  <th style="width:40px;" >Mobile</th>
 <th> Details</th>
  
    <th style="width:150px;" >
	
	Doctor
    
	 </th>

    <th style="width:100px;"  >Agent</th>
	 <th style="width:100px;"  > Gross Amount </th>
		  	  <th style="width:100px;"  > Discount </th>
	  	  <th style="width:100px;"  > Receiveble Amount </th>
		   <th style="width:100px;"  > Paid </th>
		  	  <th style="width:100px;"  > Due </th>
	 <?php 

$grossamount =0;
$totaldiscount = 0;
$receiveable_amount =0;
$due =0;
$i=1;
?>	 


  </tr>
  </thead>
 @foreach ( $longterminstallerorder as $t )


  <tr>
  
<td> {{$i}}</td>
 <td> {{$t->patient->id}} </td>
 <td> {{$t->patient->name}} </td>
  <td> {{$t->patient->mobile}} </td>
  <td> {{$t->Code}} </td>
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
 
 
 <?php echo round($t->gross_amount,2); ?> </td>




 <td><?php echo round($t->totaldiscount,2); ?> </td>
 <td><?php echo round($t->receiveable_amount,2); ?> </td>
 <td><?php echo round($t->receiveable_amount- $t->due ,2); ?> </td>
 <td><?php echo round($t->due,2); ?> </td>











<?php 	  
	$grossamount= $grossamount + $t->gross_amount;
$totaldiscount = $totaldiscount + $t->totaldiscount;
$receiveable_amount = $receiveable_amount + $t->receiveable_amount;
$due = $due + $t->due;
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
  
 <td> NA </td>



 <td><?php echo round($grossamount,2); ?> </td>

	 <td><?php echo round($totaldiscount,2); ?> </td>  
	 <td><?php echo round($receiveable_amount,2); ?> </td>	 
	 <td><?php echo round($receiveable_amount - $due,2); ?> </td>		 
	 <td><?php echo round($due,2); ?> </td>		 
	 
	 
  </tr>


</table>


 
 
 
 
 
 
 
 
 
 
 
 
 
 






</body>
</html>