<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>

#three{
	
min-height: 800px;
}



 </style>
 
</head>

<body>



<div  class="container">
  <div id="one" class="row">

    <div  >
         <b style="color:green; font-size:30px;">{{ $doctor->name }}</b> <br>
<span style="font-size:15px; color:darkblue;"> {!! nl2br(e($doctor->prescriptionheading)) !!}	           <br>

    </div>
<hr>
  </div>
  
    <div style="height:10px; font-size:13px;" id="two" >
    <div style="width:50%; float:left;" >
      <b> Patient Name:</b> {{$data->name}}
    </div>
    <div style="width:10%;float:left;" >
 <b>Age:</b> {{$data->age}}
    </div>
	    <div style="width:13%;float:left;" >
 <b>Sex:</b>{{$data->sex}}
    </div>
	    <div style="width:17%;float:left;" >
<b>Date:</b><?php  echo date('d/m/y', strtotime($prescription->created_at)); ?> 
    </div>

  </div>
  <hr>
 
  
  
      <div id="three" >
    
	
	<div style="width:25%; float:left;" >
{!! nl2br(e($prescription->history)) !!}	
    </div>
    
	
	
	<div style="width:75%; float:left;">
	<div >
	<div style="width:20%; float:left;" >
 <b style="font-size:30px;">Rx:</b> <br>
 </div>
 <?php $i = 1 ; ?>
 @foreach($prescription->prescriptionmedicinelist as $presmed)
 <div style="width:80%; float:right;">
 <div >
 <b> {{$i}} . {{$presmed->medicine->name}}</b><br><br>
 
 <div >
 <div style="width:15%; float:left; font-family:nikosh" >

<?php 
if($presmed->prescriptionusages != null )
{
	?>
{{$presmed->prescriptionusages->usage}}
<?php } ?>


 </div>
  <div style="width:30%; float:left; font-family:nikosh;"  >
  <?php 
if($presmed->prescriptionkhabaragepore != null )
{
	?>

      খাবার  {{$presmed->prescriptionkhabaragepore->khabaragebapore}}
	  
	  <?php } ?>
 </div>
 
   <div style="width:15%; float:left; font-family:nikosh;"  >
     <?php 
if($presmed->day != null )
{
	?>
   
 {{$presmed->day}} দিন
   <?php } ?>
 </div>
     <div style="width:35%; float:left; font-family:nikosh;" >
 {{$presmed->comment}}
 </div>
 </div>
 </div>
 
 <br>
 
 </div>
 <?php $i++ ?>
 @endforeach


 </div>
  


  </div>


  </div>
  <br>
   <br>
   <br>
   <br>
    <br>
	

  <div id="four">
  <div style="width:33%;float:left;">
<b style="color:red; font-family:nikosh; font-size:25px;">  সিরিয়ালের জন্য </b><br>
<span style="color:darkblue;">    {{ $doctor->contact_address_for_serial}}  </span>
  </div>
  
  <div  style="width:33%;float:left;font-family:nikosh;">
 <b style="color:red;font-size:25px;">  চেম্বার </b> <br>
{!! nl2br(e($doctor->chamber_address)) !!}	 
 
 <br>
  
  </div>
  <div style="width:33%;float:left;font-family:nikosh;">
<b style="color:red;font-size:25px;">  সাক্ষাতের সময়</b> <br>
  
  {{$doctor->visiting_hours}} 
 <br>
 বন্ধঃ  {{$doctor->offday}} 

 </div>
  </div>

</div>



    
</body>
</html>
