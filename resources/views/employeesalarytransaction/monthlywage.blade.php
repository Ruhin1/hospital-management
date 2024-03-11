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







	 	   <h2> Salary Expenditure Statemnet between date:
	   
	   <?php 
	     
	    $myDateTime = DateTime::createFromFormat('Y-m-d', $start);  echo  $myDateTime->format('d/m/Y'); ?> 
    
	   

	   to 
	   	   <?php 
   $myDateTime = DateTime::createFromFormat('Y-m-d', $e);  echo  $myDateTime->format('d/m/Y');
	   ?>
	   
	    </h2>
	









<?php $totalbeton=0; if (!$employee_salary->isEmpty())  { ?>
<h5 >   Salary Expenditure   </h5>
  <hr>
  <table class="table">
  <thead>
    <tr>
    
      <th scope="col"> Employee  </th>
      <th scope="col">Salary Amount.  </th>
     <th scope="col">Month  </th>
	
    </tr>
  </thead>
  <tbody>
    
	
	
	
	
	
	
	@foreach($employee_salary as $ems)
	<?php  
	$totalbeton = $totalbeton + $ems->totalsalary;
	
	?>
	
	<tr>
      <th >{{$ems->employeedetails->name}}</th>
      
  <td> <?php echo  number_format($ems->totalsalary, 2, '.', ',');?>	 </td>  
  <td> {{$ems->month_year}}	 </td> 



  
    </tr>
@endforeach
  </tbody>
</table>

<span > So Total Amoutnt of Salary Given:  </span> <?php echo $totalbeton  ?> TK. 

  

  
  <br>
 













  <?php } ?>




</body>
</html>