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

#logo{

float: left;
width: 25%;
}
#description{
float: right;
width: 75%;


}

#name_hospital{
font-weight: 900;
font-size: 22px;
font-family: 'Times New Roman';

}

#introductory{
font-family: 'Times New Roman';
}

</style>

</head>
<body style="font-family: Times New Roman;">
<div id="c" >
	<div id="head" >
		<div id="logo"> <img width="500px;"   src="img/logo.jpg" > </div>
		<div id="description">
		  
		<span id="name_hospital">{{ $setting->name }}</span><br>
		<span id="address_body">
		{!! nl2br(e($setting->address)) !!}	 <br>
		Mobile:{{ $setting->mobile }} <br>
		</span>
		
		</div>
	  
	  </div>
	  <br>





  </div>


<?php 

$paid =0;
$unpaid =0;


$paiddr =0;
$unpaiddr =0;


?>
     

  
 <br> 



<b> Paid Doctor Commission </b>

<table>
  <tr>
     <th >Date </th>
    <th style="width:300px;" >Doctor Name </th>
    <th>Patient Name</th>
	<th> Type </th>
	<th>  Bill  (TK)  </th>
    <th> Commission Amount (TK)  </th>
	 <th> Balance </th>

  </tr>
  
<?php 

$doctor =0;
$balance =0;
$flag =0;

?>
 
 @foreach ( $doctorCommissionTransition as $d )
 
 
 
		<?php  
		
					if ($d->transitiontype == 1)
					{
						$type= "Pathology Commission ";
					
					}
					
					elseif ($d->transitiontype == 3)
					{
						$type= " Commission for surgery";
				
					}
					elseif ($d->transitiontype == 4)
					{
						$type= " Commission for cabine fair";
			
					}
					elseif ($d->transitiontype == 5)
					{
						$type= " Commission for the Patient got relased";
			
					}
					
					
					elseif ($d->transitiontype == 2)
					{
						$type= " Doctor Share for Outdoor";
			
					}
					
					
										elseif ($d->transitiontype == 6)
					{
						$type= " Anesthesiologist Fees";
			
					}
					
										elseif ($d->transitiontype == 7)
					{
						$type= " Surgeon Fees";
			
					}
					
					elseif ($d->transitiontype == 8)
					{
						$type= "Ultrasonologist Fees";
	
					}
					
					
					elseif ($d->transitiontype == 9)
					{
						$type= "X-Ray Fees";
					
					}
										elseif ($d->transitiontype == 10)
					{
						$type= "Echo";
					
					}
		
		if ($d->paidorunpaid == 1)
		{
			$status ="Paid";
			$paiddr = $paiddr + $d->amount;
		}
		else if ($d->paidorunpaid == 0)
		{
			
		$status ="UnPaid";	
			$unpaiddr = $unpaiddr + $d->amount;
		}
		
		
	
	
			
			if ($doctor == $d->doctor_id )
			{
				$balance = $balance + $d->amount;
				$flag =0;
				
			} else {
				
							$doctor = $d->doctor_id;
			$balance =  $d->amount;
				$flag =1;	
			}
			
			
		
		
		?>
 
  <tr>
  
  <td>   {{ Carbon\Carbon::parse($d->created_at)->format('d/m/Y') }} </td>
    <td> {{$d->doctor->name}}</td>
	  <td> <?php if($d->patient_id) { ?> {{$d->patient->name}} <?php } else{ ?> NA <?php } ?> </td>	
		

	<td>{{$type }} </td>		

	<td><?php echo round($d->receiveablecollection,2); ?> </td>	
   <td><?php echo round($d->amount,2); ?> </td>

	

<?php if ($flag == 1) { ?>
	<td style="color:red;" >  {{$balance}} </td>
<?php } else { ?>

 <td>  {{$balance}} </td>
<?php } ?>
  </tr>
@endforeach 




</table>






<b> Total Doctor Commission Paid: </b> {{$paiddr}} TK
<br>

<p>

<b> Unpaid Doctor Commission / Share </b>

<table>
  <tr>
     <th >Date </th>
    <th style="width:300px;" >Doctor Name </th>
    <th>Patient Name</th>
	<th> Type </th>
    <th> Commission Amount (TK)  </th>
	 <th> Balance </th>

  </tr>
  
<?php 

$doctor =0;
$balance =0;
$flag =0;

?>
 
 @foreach ( $unpaiddoctorCommissionTransition as $d )
 
 
 
		<?php  
		
					if ($d->transitiontype == 1)
					{
						$type= "Pathology Commission ";
					
					}
					
					elseif ($d->transitiontype == 3)
					{
						$type= " Commission for surgery";
				
					}
					elseif ($d->transitiontype == 4)
					{
						$type= " Commission for cabine fair";
			
					}
					elseif ($d->transitiontype == 5)
					{
						$type= " Commission for the Patient got relased";
			
					}
					
					
					elseif ($d->transitiontype == 2)
					{
						$type= " Doctor Share for Outdoor";
			
					}
					
					
										elseif ($d->transitiontype == 6)
					{
						$type= " Anesthesiologist Fees";
			
					}
					
										elseif ($d->transitiontype == 7)
					{
						$type= " Surgeon Fees";
			
					}
					
					elseif ($d->transitiontype == 8)
					{
						$type= "Ultrasonologist Fees";
	
					}
					
					
					elseif ($d->transitiontype == 9)
					{
						$type= "X-Ray Fees";
					
					}
		
		if ($d->paidorunpaid == 1)
		{
			$status ="Paid";
			$paiddr = $paiddr + $d->amount;
		}
		else if ($d->paidorunpaid == 0)
		{
			
		$status ="UnPaid";	
			$unpaiddr = $unpaiddr + $d->amount;
		}
		
		
	
	
			
			if ($doctor == $d->doctor_id )
			{
				$balance = $balance + $d->amount;
				$flag =0;
				
			} else {
				
							$doctor = $d->doctor_id;
			$balance =  $d->amount;
				$flag =1;	
			}
			
			
		
		
		?>
 
  <tr>
  
  <td>   {{ Carbon\Carbon::parse($d->created_at)->format('d/m/Y') }} </td>
    <td> {{$d->doctor->name}}</td>

	  <td> <?php if($d->patient_id) { ?> {{$d->patient->name}} <?php } else{ ?> NA <?php } ?> </td>	

	<td>{{$type }} </td>	
   <td><?php echo round($d->amount,2); ?> </td>

	

<?php if ($flag == 1) { ?>
	<td style="color:red;" >  {{$balance}} </td>
<?php } else { ?>

 <td>  {{$balance}} </td>
<?php } ?>
  </tr>
@endforeach 




</table>













</body>
</html>