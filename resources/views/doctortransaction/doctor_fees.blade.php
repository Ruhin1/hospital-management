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

 <?php for ($i=0; $i<3; $i++){ ?>
</head>
<body>
<div id="c" >
<div id="head" >
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
	
	<?php  if( $i==0  ) { ?>
	
		    <div style="width:33%;float:left;" >
		<b><U>Money Receipt</U></b> 
		 
    </div>
	<?php }   if( $i== 1  ) {  ?>
	
			    <div style="width:33%;float:left;" >
		<b><U>Account's Copy</U></b> 
		 
    </div>
	
	
	<?php } 
	
	 if( $i== 2  ) { 
	
	?>
	
	
				    <div style="width:33%;float:left;" >
		<b><U>Doctor's Copy</U></b> 
		 
    </div>
	
	
	 <?php  } ?>
	
	
	
    <div style="width:33%; float:left;" >
    <b> Patient ID:</b> {{$data->patient_id}} <br>
    </div>

	
	    <div style="width:33%;float:left;" >
		<b>Serial No:</b> {{$data->serialno}}
		 
    </div>

  </div>


    <div style="height:10px;" id="two" >
    <div style="width:40%; float:left;" >
      <b>Name :</b> {{$data->patient->name}}
    </div>

	
	    <div style="width:13%;float:left;" >
 <b>Age:</b>{{$data->patient->age}} 
    </div>
	    <div style="width:13%;float:left;" >
 <b>Sex:</b>{{$data->patient->sex}}
    </div>
	
		    <div style="width:34%;float:left;" >
<b>Mobile No.</b>  {{$data->patient->mobile}}
    </div>


  </div>





  
  
      <div style="height:10px;" id="two" >

	
	    <div style="width:50%; float:left;" >
      <b>Date:</b> 
	  
	  <?php  $myDateTime = DateTime::createFromFormat('Y-m-d', $data->date);  echo  $myDateTime->format('d/m/Y'); ?> 
    
	
	</div>
	

	
	
	    <div style="width:50%;float:left;" >
<b>Ref Doctor:</b> {{$data->doctor->name}}
    </div>

  </div>
       

	   <div style="height:10px;" id="two" >


	    <div style="width:50%; float:left;" >
<b>Doctor Visit :</b>{{$data->grossamount}} TK
	
	</div>



	    <div style="width:50%; float:left;" >
<b> Paid:</b>{{$data->nogod}} TK
	
	</div>

	

	


  </div>
  
  
 


	   <div style="height:10px;" id="two" >


	    <div style="width:50%; float:left;" >
<b>Adjust with Deposit:</b>{{$data->adjust_with_advance}} TK
	
	</div>
	
	    <div style="width:50%; float:left;" >
<b>Due:</b>{{$data->due}} TK
	
	</div>
	

	


  </div>












 
  
  
  	   <div style="height:10px;" id="two" >


	    <div style="width:25%;float:left;" >
<b>Entry By:</b> {{$data->user->name}}
    </div>

  </div>
  
  
  
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  

</div>


			<?php if( $i < 2) { ?>
	<p style="page-break-after:always" ></p>
 <?php } } ?>
</body>
</html>