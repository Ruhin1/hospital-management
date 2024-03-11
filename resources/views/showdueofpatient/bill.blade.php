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

 <?php for ($i=0; $i<2; $i++){ ?>
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
	
	<?php  if( $i==0  ) { ?>
	
		    <div style="width:33%;float:left;" >
		<b><U>Money Receipt</U></b> 
		 
    </div>
	<?php }   if( $i== 1  ) {  ?>
	
			    <div style="width:33%;float:left;" >
		<b><U>Account's Copy</U></b> 
		 
    </div>
	
	
	<?php } 
	
	
	
	?>
	

	
	
	
    <div style="width:33%; float:left;" >
    <b> Patient ID:</b> {{$patient->id}} <br>
    </div>

	


  </div>


    <div style="height:10px;" id="two" >
    <div style="width:40%; float:left;" >
      <b>Name :</b> {{$patient->name}}
    </div>

	
	    <div style="width:13%;float:left;" >
 <b>Age:</b>{{$patient->age}} 
    </div>
	    <div style="width:13%;float:left;" >
 <b>Sex:</b>{{$patient->sex}}
    </div>
	
		    <div style="width:34%;float:left;" >
<b>Mobile No.</b>  {{$patient->mobile}}
    </div>


  </div>





  
  
      <div style="height:10px;" id="two" >

	
	    <div style="width:50%; float:left;" >
      <b>Date:</b> 
	  
	

  {{ Carbon\Carbon::parse($duetransition->created_at)->format('d/m/Y') }}
		
	</div>
	



  </div>
       

	   <div style="height:10px;" id="two" >



	    <div style="width:50%; float:left;" >
<b>Trans Type:</b> <?php if ($duetransition->transitiontype == 1) {?>

Due Payment <?php }  if ($duetransition->transitiontype == 3) { ?>

Refund <?php }  if ($duetransition->transitiontype == 6) { ?>
	
Due Adjustment with Deposit <?php } ?>
	</div>




	    <div style="width:50%; float:left;" >
<b>Service Type:</b> <?php if ($duetransition->transitionproducttype == 1) {?>
Cabine <?php }   if ($duetransition->transitionproducttype == 2) { ?>
Medicine <?php }  if ($duetransition->transitionproducttype == 3) { ?>	
Surgery <?php }   if ($duetransition->transitionproducttype == 4) { ?>	
Pathology <?php }   if ($duetransition->transitionproducttype == 5) { ?>		
Doctor Visit <?php }   if ($duetransition->transitionproducttype == 6) { ?>		
	
Service <?php }   if ($duetransition->transitionproducttype == 7) { ?>		
 
 Others <?php }   if ($duetransition->transitionproducttype == 9) { ?>	
 Cabine Admission Fees <?php } ?>
 
 
	</div>






	

	
	


  </div>
  

</div>


   <div style="height:10px;" id="three" >
   
   
  	    <div style="width:33%;float:left;" >
<b>Gross Amount:</b> {{$duetransition->totalamount}} TK
    </div> 
   
    	    <div style="width:33%;float:left;" >
<b>Discount:</b> {{$duetransition->discountondue}} TK
    </div>  
   
     	    <div style="width:33%;float:left;" >
<b>Acctual Amount :</b> {{$duetransition->amount}} TK
    </div>    
   </div>

















   <div style="height:10px;" id="three" >
   
   
  	    <div style="width:50%;float:left;" >
<b>Entry By:</b> {{$username}}
    </div> 
   
   
   
   
   </div>

			<?php if( $i < 1) { ?>
	<p style="page-break-after:always" ></p>
 <?php } } ?>
</body>
</html>