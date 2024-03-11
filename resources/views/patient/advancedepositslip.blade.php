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
 <?php for ($i=0; $i<2 ; $i++){ ?>
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



<div style="font-size:2.5 px;"  >
    <div style="height:10px;" id="one" >
    <div style="width:33%; float:left;" >
	<?php if( $i == 0) { ?>
      <b><u> Money Receipt ( Patient Copy) </u></b>
    <?php } if ( $i == 1){ ?>
	  <b>Money Receipt (Office Copy) </b>
	  <?php }  ?>
	</div>
    <div style="width:33%;float:left;" >
 <b>Patient ID:</b> {{$patient->id}}
    </div>
	    <div style="width:33%;float:left;" >
 <b>Cabine NO :</b> {{$patient->cabinelist->serial_no}}
    </div>


  </div>
 


<p>
    <div style="height:10px;" id="one" >

    <div style="width:50%;float:left;" >
 <b> Deposit & Due Transition ID :</b> {{$duetransition->id}}
    </div>
	    <div style="width:50%;float:left;" >
 <b> Transition Type :</b> Deposit
    </div>


  </div>













    <div style="height:10px;" id="two" >
    <div style="width:50%; float:left;" >
      <b>Name :</b> {{$patient->name}}
    </div>

	
	    <div style="width:50%;float:left;" >
 <b>Guardian's Name :</b> {{$patient->guardian_name_rel}}
    </div>


  </div>
     

     <div style="height:10px;" id="two" >
    <div style="width:40%; float:left;" >
      <b>Address :</b> {{$patient->address}}
    </div>

	
	    <div style="width:13%;float:left;" >
 <b>Age:</b> {{$patient->age}}
    </div>
	    <div style="width:13%;float:left;" >
 <b>Sex:</b>{{$patient->sex}}
    </div>
	
	
	    <div style="width:34%;float:left;" >
<b>Mobile No.</b> {{$patient->mobile}} 
    </div>

  </div>


  
  	 <div style="height:10px;" id="three" >



	    <div style="width:50%;float:left;" >
<b> Vouc. Date :</b>

  {{ Carbon\Carbon::parse($duetransition->created_at)->format('d/m/Y') }}

    </div>



	    <div style="width:50%;float:left;" >
<b> Deposit Amount :</b>

  {{$duetransition->amount  }}TK

    </div>
	

	
	

  </div>
  
  
  

<P>


  	 <div style="height:10px;" id="three" >



	    <div style="width:50%;float:left;" >
<b> Entry By :</b>

 
{{$duetransition->User->name  }}
    </div>



  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
 

  
  
  
  
  </div>







	




<P> <b> Thanks for Patients </b>

</div>


			<?php if( $i < 1) { ?>
	<p style="page-break-after:always" ></p>
 <?php } } ?>
</body>
</html>