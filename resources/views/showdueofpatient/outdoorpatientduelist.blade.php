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
   font-weight: normal;
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
    <div style="height:10px;" id="one" >


<h2> Due Table List of Patients </h2>
  
  <table>
  <tr>
  <thead>
  <th >Sl. No </th>
   <th >Patient ID </th>
    <th  > Name </th>
	    <th>Mobile</th>
	    <th>Service Due</th>
	    <th>Surgery Due</th>		
	    <th>Doctor visit Due</th>	
	    <th>Pathology Due</th>		
	    <th>Phermachy Due</th>	
	    <th>Seat Fair Due</th>	
	    <th>Admission Fees  Due</th>
 <th>Deposit</th>			
    <th>Total Due</th>

</thead>
 
  
<Br>


	

<tr>


<?php $i=1;


  $total_present_servie_due = 0;
  $total_present_durgery_due = 0;
  $total_present_due_doctor_visit = 0;
  $total_present_due_pathology = 0;
  $total_present_due_medicine = 0;
  $total_total_seat_fair = 0;
  $total_total_admission_due = 0;
  $total_deposit = 0;
  $total_due = 0;













 ?>
@foreach($patient_fetch as $p) {?>
@if(count($p))
	
	<tr>
		<td>  {{$i}} </td>
  <td>  {{$p[0]['id']}} </td>
    <td>  {{$p[0]['name']}} </td>

	<td>  {{$p[0]['mobile']}} </td>

	
	
    <td>  {{$p[0]['present_servie_due']}} </td>	
    <td>  {{$p[0]['present_durgery_due']}} </td>	
    <td>  {{$p[0]['present_due_doctor_visit']}} </td>	
    <td>  {{$p[0]['present_due_pathology']}} </td>	
	
    <td>  {{$p[0]['present_due_medicine']}} </td>	
    <td>  {{$p[0]['total_seat_fair']}} </td>	
    <td>  {{$p[0]['total_admission_due']}} </td>
 <td>  {{$p[0]['deposit']}} </td>			
    <td>  {{$p[0]['due']}} </td>	
	
  </tr>
  
  <?php $i++; 
  
  $total_present_servie_due = $total_present_servie_due + $p[0]['present_servie_due'];
  $total_present_durgery_due = $total_present_durgery_due + $p[0]['present_durgery_due'];
  $total_present_due_doctor_visit = $total_present_due_doctor_visit + $p[0]['present_due_doctor_visit'];
  $total_present_due_pathology = $total_present_due_pathology + $p[0]['present_due_pathology'];
  $total_present_due_medicine = $total_present_due_medicine + $p[0]['present_due_medicine'];
  $total_total_seat_fair =  $total_total_seat_fair + $p[0]['total_seat_fair'];
  $total_total_admission_due = $total_total_admission_due + $p[0]['total_admission_due'];
  $total_deposit = $total_deposit + $p[0]['deposit'];
  $total_due = $total_due + $p[0]['due'];
  
  
  
  
  
  
  
  
  
  
  
  
  ?>
  
  
  
@endif
@endforeach

	<tr>
		<td>  NA </td>
  <td>  NA </td>
    <td> Total </td>

	<td>  NA </td>

	
	
    <td>  {{$total_present_servie_due}} </td>	
    <td>  {{$total_present_durgery_due}} </td>	
    <td>  {{$total_present_due_doctor_visit}} </td>	
    <td>  {{$total_present_due_pathology}} </td>	
	
    <td>  {{$total_present_due_medicine}} </td>	
    <td>  {{$total_total_seat_fair}} </td>	
    <td>  {{$total_total_admission_due}} </td>
 <td>  {{$total_deposit}} </td>			
    <td>  {{$total_due}} </td>	
	
  </tr>




</table>








Print By : {{Auth()->user()->name}} <br>

</div>





</div>



</body>
</html>