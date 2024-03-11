<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
<body>
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

<div   >
    <div style="height:10px;" id="two" >
	

	
		    <div style="width:40%;float:left;" >
		<b><U>Money Paid Copy:</U></b> 
		 
    </div>


    <div style="width:60%; float:left;" >
    <b> Doctor ID:</b> {{$doctorCommissionTransition->doctor_id}} <br>
    </div>

	


  </div>
  
  
  
      <div style="height:10px;" id="two" >
	

	
	    <div style="width:33%;float:left;" >
		<b>Doctor Name:</b> {{$doctorCommissionTransition->doctor->name}}
		 
    </div>

    <div style="width:33%; float:left;" >
      <b> Patient ID :</b> {{$doctorCommissionTransition->patient_id}}
    </div>
	
    <div style="width:33%; float:left;" >
      <b> Patient Name :</b> {{$p}}
    </div>


	

  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  


    <div style="height:10px;" id="two" >
	

	
	
<?php 	
	
	
	
	
	
	
						if ($doctorCommissionTransition->transitiontype == 1)
					{
						$type= "Pathology Commission ";
					
					}
					
					elseif ($doctorCommissionTransition->transitiontype == 3)
					{
						$type= " Commission for surgery";
				
					}
					elseif ($doctorCommissionTransition->transitiontype == 4)
					{
						$type= " Commission for cabine fair";
			
					}
					elseif ($doctorCommissionTransition->transitiontype == 5)
					{
						$type= " Commission for the Patient got relased";
			
					}
					
					
					elseif ($doctorCommissionTransition->transitiontype == 2)
					{
						$type= " Doctor Share for Outdoor";
			
					}
					
					
										elseif ($doctorCommissionTransition->transitiontype == 6)
					{
						$type= " Anesthesiologist Fees";
			
					}
					
										elseif ($doctorCommissionTransition->transitiontype == 7)
					{
						$type= " Surgeon Fees";
			
					}
					
					elseif ($doctorCommissionTransition->transitiontype == 8)
					{
						$type= "Ultrasonologist Fees";
	
					}
					
					
					elseif ($doctorCommissionTransition->transitiontype == 9)
					{
						$type= "X-Ray Fees";
					
					}
						elseif ($doctorCommissionTransition->transitiontype == 10)
					{
						$type= "Echo";
					
					}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		if ($doctorCommissionTransition->paidorunpaid == 0)
				{
					
					 $status="Unpaid";
					
				}
								if ($doctorCommissionTransition->paidorunpaid == 1)
				{
					
					 $status="Paid";
					
				}
	
	
	
	
	
	
	
	
	
	?>
	
	
	    <div style="width:50%;float:left;" >
 <b>Commission For :</b>{{$type}} 
    </div>

	

	    <div style="width:50%;float:left;" >
 <b>Status :</b>{{$status}}
    </div>

  </div>


<?php if ($doctorCommissionTransition->comment) { ?>
      <div style="height:10px;" id="two" >


	    <div style="width:100%;float:left;" >
<b>Comment:</b> {{$doctorCommissionTransition->comment}}
    </div>

  </div>

<?php } ?>

  
       <div style="height:10px;" id="two" >

	
	    <div style="width:50%; float:left;" >
		
		
	<?php if ($doctorCommissionTransition->receiveablecollection)	
	{ ?>
      <b>Receiveable Amount:</b> 
	  
	 {{$doctorCommissionTransition->receiveablecollection	}} TK
    <?php } ?>
	
	</div>
	

	    <div style="width:32%;float:left;" >
<b>Commission Amount :</b> {{$doctorCommissionTransition->amount}} TK
    </div>

  </div> 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
      <div style="height:10px;" id="two" >

	
	    <div style="width:50%; float:left;" >
      <b>Date:</b> 
	  
	  <?php echo   $myDateTime = date('d/m/y h:i A', strtotime($doctorCommissionTransition->created_at) );   ?> 
    
	
	</div>
	

	    <div style="width:32%;float:left;" >
<b>Entry By:</b> {{$doctorCommissionTransition->user->name}}
    </div>

  </div>
  

</div>



</body>
</html>