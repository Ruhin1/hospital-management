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

<b> Commission Details </b>
<br>    
<b> Paid Agent Commission </b>
<table>
  <tr>
   <th  >Date </th>
    <th style="width:300px;" >Agent Name </th>
	    <th>Patient ID</th>
    <th>Patient Name</th>
	<th> Type </th>
	<th> Bill </th>
    <th> Commission Amount (TK)  </th>
	 <th> Toatl </th>

  </tr>
  
<?php 
  
 

$agent =0;
$balance =0;
$flag =0;

?>


?>
 
 @foreach ( $agentransition as $a )
 
 
 
		<?php  
		
					if ($a->transitiontype == 1)
					{
						$type= "Pathology Commission ";
					
					}
					
					elseif ($a->transitiontype == 3)
					{
						$type= " Commission for surgery";
						
					}
					elseif ($a->transitiontype == 4)
					{
						$type= " Commission for cabine fair";
						
					}
					elseif ($a->transitiontype == 5)
					{
						$type= " Commission for the Patient relased";
					
					}
										elseif ($a->transitiontype == 6)
					{
						$type= " Commission for Outdoor Doctor";
					
					}
									
				
					else
					{
						$type= " Not Applicable";
			
					}
		
		if ($a->paidorunpaid == 1)
		{
			$status ="Paid";
			$paid = $paid + $a->paidamount;
		}
		else if ($a->paidorunpaid == 0)
		{
			
		$status ="UnPaid";	
			$unpaid = $unpaid + $a->paidamount;
		}
		
		
		
		
		
			if ($agent == $a->agentdetail_id )
			{
				$balance = $balance + $a->paidamount;
				$flag =0;
				
			} else {
				
							$agent = $a->agentdetail_id;
			$balance =  $a->paidamount;
				$flag =1;	
			}
					
		
		
		
		
		
		
		
		
		
		
		
		?>
 
  <tr>
  <td>   {{ Carbon\Carbon::parse($a->created_at)->format('d/m/Y') }} </td>
    <td> {{$a->agentdetail->name}}</td>
	  <td> {{$a->patient_id}}</td>
	    <td> <?php if($a->patient_id) { ?> {{$a->patient->name}} <?php } else{ ?> NA <?php } ?> </td>
		

	<td>{{$type }} </td>	
<td><?php echo round($a->receiveableamount	,2); ?> </td>
   <td><?php echo round($a->paidamount,2); ?> </td>


<?php if ($flag == 1) { ?>
	<td style="color:red;" >  {{$balance}} </td>
<?php } else { ?>

 <td>  {{$balance}} </td>
<?php } ?>
	 
  </tr>
@endforeach 




</table>


<b> Total Agent Commission Paid: </b> {{$paid}} TK
<br>




<P>

<b> Unpaid Agent Commission </b>
<table>
  <tr>
   <th  >Date </th>
    <th style="width:300px;" >Agent Name </th>
    <th>Patient Name</th>
	<th> Type </th>
	<th> Bill (TK) </th>
    <th> Commission Amount (TK)  </th>
	 <th> Toatl </th>

  </tr>
  
<?php 
  
 

$agent =0;
$balance =0;
$flag =0;

?>


?>
 
 @foreach ( $unpaidagentransition as $a )
 
 
 
		<?php  
		
					if ($a->transitiontype == 1)
					{
						$type= "Pathology Commission ";
					
					}
					
					elseif ($a->transitiontype == 3)
					{
						$type= " Commission for surgery";
						
					}
					elseif ($a->transitiontype == 4)
					{
						$type= " Commission for cabine fair";
						
					}
					elseif ($a->transitiontype == 5)
					{
						$type= " Commission for the Patient relased";
					
					}
										elseif ($a->transitiontype == 6)
					{
						$type= " Commission for Outdoor Doctor";
					
					}
									
				
					else
					{
						$type= " Not Applicable";
			
					}
		
		if ($a->paidorunpaid == 1)
		{
			$status ="Paid";
			$paid = $paid + $a->paidamount;
		}
		else if ($a->paidorunpaid == 0)
		{
			
		$status ="UnPaid";	
			$unpaid = $unpaid + $a->paidamount;
		}
		
		
		
		
		
			if ($agent == $a->agentdetail_id )
			{
				$balance = $balance + $a->paidamount;
				$flag =0;
				
			} else {
				
							$agent = $a->agentdetail_id;
			$balance =  $a->paidamount;
				$flag =1;	
			}
					
		
		
		
		
		
		
		
		
		
		
		
		?>
 
  <tr>
  <td>   {{ Carbon\Carbon::parse($a->created_at)->format('d/m/Y') }} </td>
    <td> {{$a->agentdetail->name}}</td>
	  
	  <td> <?php if($a->patient_id) { ?> {{$a->patient->name}} <?php } else{ ?> NA <?php } ?> </td>	

	<td>{{$type }} </td>	
	<td><?php echo round($a->receiveableamount	,2); ?> </td>
   <td><?php echo round($a->paidamount,2); ?> </td>


<?php if ($flag == 1) { ?>
	<td style="color:red;" >  {{$balance}} </td>
<?php } else { ?>

 <td>  {{$balance}} </td>
<?php } ?>
	 
  </tr>
@endforeach 




</table>


<p>













</body>
</html>