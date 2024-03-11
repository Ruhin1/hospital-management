<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>

@page {
  size: 72mm 150mm;
  margin: 0em;
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
opacity: .3;
}

#m{
  
 background-color:red;;

}
</style>
</head>
<body>
<div id="c" >
<div id="head" >
<img    src="img/logo.jpg" >
<hr>
</div>
<br>
<br>
<div  style="margin-left:20px;"  id="information">
<b >Date:<?php echo date("Y/m/d") ;  ?> </b> <br>
<b> Patient Name: {{$data->name}}</b> <br>
<b> Patient ID: {{$data->id}}</b> <br>
<b >Age: {{$data->age}}</b> <br>
<b >Sex: {{$data->sex}}</b> <br><br>
<b>Cabine NO: {{$data->cabinelist->serial_no}}</b><br>

<b>Date of Admission: {{$cabinetransition->starting}}</b><br>
<b>Date of Discharge: {{$cabinetransition->ending}}</b><br>
<b>Service Charge: {{$cabinetransition->total_before_vat_dis}} TK</b><br>
<b>Discount: {{$cabinetransition->discount}} TK</b><br>
<b>VAT: {{$cabinetransition->vat}} TK</b><br>
<b style="color:green">Service Charge <br> After Adjusting <br> VAT and Discount : {{$cabinetransition->total_after_adjustment}} TK</b><br>
<b >Due:{{$cabinetransition->due}} TK </b> <br>


<b style="position: absolute; bottom:3px; right:100px;">Entry By: {{$cabinetransition->User->name}}</b> <br>


</div>





</div>



</body>
</html>