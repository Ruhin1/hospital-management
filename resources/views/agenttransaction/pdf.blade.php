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
    <b> Agent ID:</b> {{$agenttransaction->agentdetail_id}} <br>
    </div>

	


  </div>
  
  
  
      <div style="height:10px;" id="two" >
	

	
	    <div style="width:33%;float:left;" >
		<b>Agent Name:</b> {{$agenttransaction->agentdetail->name}}
		 
    </div>
    <div style="width:33%; float:left;" >
      <b> Patient ID :</b> {{$agenttransaction->patient_id}}
    </div>

	
    <div style="width:33%; float:left;" >
      <b> Patient Name :</b> {{$p}}
    </div>


	

  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  


    <div style="height:10px;" id="two" >
	

	
	
<?php 	
	
	
if ($agenttransaction->transitiontype == 1)
					{
						$type= "Pathology Commission ";
					
					}
					
					elseif ($agenttransaction->transitiontype == 3)
					{
						$type= " Commission for surgery";
						
					}
					elseif ($agenttransaction->transitiontype == 4)
					{
						$type= " Commission for cabine fair";
						
					}
					elseif ($agenttransaction->transitiontype == 5)
					{
						$type= " Commission for the Patient got relased";
						
					}
					
					
					elseif ($agenttransaction->transitiontype == 2)
					{
						$type= " Doctor Share for Outdoor";
					
					}
					
					
										elseif ($agenttransaction->transitiontype == 6)
					{
						$type= " Anesthesiologist Fees";
					
					}
					
										elseif ($agenttransaction->transitiontype == 7)
					{
						$type= " Surgeon Fees";
				
					}
						
	
	
	
		if ($agenttransaction->paidorunpaid == 0)
				{
					
					 $status="Unpaid";
					
				}
								if ($agenttransaction->paidorunpaid == 1)
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


       <div style="height:10px;" id="two" >

	
	    <div style="width:50%; float:left;" >
		
		
	<?php if ($agenttransaction->receiveableamount	)	
	{ ?>
      <b>Receiveable Amount:</b> 
	  
	 {{$agenttransaction->receiveableamount		}} TK
    <?php } ?>
	
	</div>
	

	    <div style="width:32%;float:left;" >
<b>Commission Amount :</b> {{$agenttransaction->paidamount}} TK
    </div>

  </div> 












<?php if ($agenttransaction->comment) { ?>
      <div style="height:10px;" id="two" >


	    <div style="width:100%;float:left;" >
<b>Comment:</b> {{$agenttransaction->comment}}
    </div>

  </div>

<?php } ?>

  
  
      <div style="height:10px;" id="two" >

	
	    <div style="width:50%; float:left;" >
      <b>Date:</b> 
	  
	  <?php echo   $myDateTime = date('d/m/y h:i A', strtotime($agenttransaction->created_at) );   ?> 
    
	
	</div>
	

	    <div style="width:32%;float:left;" >
<b>Entry By:</b> {{$agenttransaction->User->name}}
    </div>

  </div>
  

</div>



</body>
</html>