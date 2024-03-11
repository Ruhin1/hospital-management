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
   Expenditure Name: {{$khorocer_khad}}

<br>


	    Between date:
	   
	   <?php 
	     
	    $myDateTime = DateTime::createFromFormat('Y-m-d', $start);  echo  $myDateTime->format('d/m/Y'); ?> 
    
	   

	   to 
	   	   <?php 
   $myDateTime = DateTime::createFromFormat('Y-m-d', $end);  echo  $myDateTime->format('d/m/Y');
   $sum=0;
	   ?>






<table>
  <tr>

    <th  >Date </th>
    <th>Suppler Name.</th>
    <th>Amount(TK)</th>
<th>comment</th>
  </tr>
  

 
 @foreach ( $khoroch_transition as $t )
  <tr>
   <td>   {{ Carbon\Carbon::parse($t->created_at)->format('d/m/Y') }}    </td>
    <td> {{$t->supplier->name}}</td>
    <td> <?PHP echo round( (  $t->amount ),2); 


$sum = $sum + $t->amount;
	?> </td>
 <td>{!! nl2br(e($t->comment)) !!} </td>
  </tr>
@endforeach 




  <tr>
   <td>   Total    </td>
    <td> NA</td>
    <td> <?PHP echo round( (  $sum ),2); 

	?> </td>
<td> NA</td>
  </tr>


</table>




<P> 
Printed BY:{{ Auth()->user()->name }}<br>



	   
	    











Printed At: <?php echo date('d/m/Y'); ?>

</div>



</body>
</html>