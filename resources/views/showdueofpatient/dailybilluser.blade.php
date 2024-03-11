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
Due Collection by Employee: <b> {{$user}}</b><br>

	   <b> All Due Collection on the   date:
	   
	   <?php 
	     
	    $myDateTime = DateTime::createFromFormat('Y-m-d', $start);  echo  $myDateTime->format('d/m/Y'); ?> 
    
	   

	   to 
	   	   <?php 
   $myDateTime = DateTime::createFromFormat('Y-m-d', $e);  echo  $myDateTime->format('d/m/Y'); $sum=0; $i=1; $ref=0;
	  
$sum=0;

	  ?>
	   
	    </b>
<p>



<table>
    
<thead>	
  <tr>
  <th> No.</th>
   <th style="width:40px;" >Patient ID</th>
 <th style="width:40px;" >Patient Name</th>
  <th style="width:40px;" >Mobile</th>
    <th style="width:150px;" >
	
Amount(TK)
    
	 </th>



    <th   >Date</th>


  </tr>
  </thead>
 @foreach ( $transpatho as $t )


  <tr>
  
<td> {{$i}}</td>
 <td> {{$t->patient->id}} </td>
 <td> {{$t->patient->name}} </td>
  <td> {{$t->patient->mobile}} </td>
 <?php $i++ ;?>
    


 <td><?php echo round($t->amount,2); $sum = $sum + $t->amount; ?> </td>
	




 <td>  {{ Carbon\Carbon::parse($t->created_at)->format('d/m/Y , h:i:sa') }} </td>


	 
  </tr>

@endforeach 


  <tr>
  
<td> Total</td>
 <td> NA </td>
 <td> NA </td>

    
 <td> NA </td>	
	
 <td> <?php echo round($sum ,2); ?> </td>
  
 <td> NA </td>




	  
	 
	 
  </tr>


</table>




<P>







 






</body>
</html>