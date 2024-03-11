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
      <b><u>Reception Copy</u></b>
    <?php } if ( $i == 1){ ?>
	  <b>Doctor's Copy  </b>
	  <?php } if ( $i == 2){ ?>
	 <b> Accountant's Copy  </b>
	  <?php } ?>
	</div>
    <div style="width:40%;float:left;" >
 <b>Doctor Name:</b> {{$doctor}}
    </div>



  </div>

	   Patients Serial List:
	   
	   <?php 
	     
	    $myDateTime = DateTime::createFromFormat('Y-m-d', $start);  echo  $myDateTime->format('d/m/Y'); ?> 
    
	   

	   to 
	   	   <?php 
   $myDateTime = DateTime::createFromFormat('Y-m-d', $e);  echo  $myDateTime->format('d/m/Y');
	   ?>
	   
	  <p>

     
<?php $total_gross=0; $total_fees=0; $total_due=0;  ?>
  
 <br> 


<table>
  <tr>
  <th  >Patient ID </th>
  <th  >Apponitment ID  </th>
  <th>Serial No.</th>
    <th style="width:300px;" >Patient Name </th>
	 <th>Age</th>
	  <th>Mobile</th>
    
	 <th>Fees.</th>
	 <th>Adjust with Deposit.</th>
	<th>Paid.</th>
    <th>Due</th>
<th>Date</th>
  </tr>
  

 
 @foreach ( $appointment as $a )
  <tr>
  <td> {{$a->id}}</td>
    <td> {{$a->patient->id}}</td>
  <td> {{$a->serialno}}</td>
    <td> {{$a->patient->name}}</td>
	  <td> {{$a->patient->age}}</td>
    <td> {{$a->patient->mobile}}</td>
 
   <td><?php echo round($a->grossamount) ?></td>
    <td> {{$a->adjust_with_advance}}</td>
    <td> <?php echo round($a->fees) ?></td>
	 <td> <?php echo round($a->due) ?></td>






<td>

 <?php  $myDateTime = DateTime::createFromFormat('Y-m-d', $a->date);  echo  $myDateTime->format('d/m/Y'); ?> 


</td>
	 
	 
  </tr>
  
  <?php  $total_gross = $total_gross +  $a->grossamount;

$total_fees = $total_fees + $a->fees;

$total_due = $total_due + $a->due;


  ?>
  
  
@endforeach 
  <tr>
  <td> Total: </td>
    <td> NA </td>
  <td> NA </td>
    <td> NA </td>
	  <td> NA </td>
    <td> NA </td>
 
   <td><?php echo round($a->grossamount) ?></td>
    <td> NA </td>
    <td> <?php echo round($a->fees) ?></td>
	 <td> <?php echo round($a->due) ?></td>
<td>NA</td>
</tr>



</table>



	




</div>








</div>


			<?php if( $i < 2) { ?>
	<p style="page-break-after:always" ></p>
 <?php } } ?>
</body>
</html>