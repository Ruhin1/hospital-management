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
<b> Patient Name: {{$data->patient->name}}</b> <br>
<b> Patient ID: {{$data->patient_id}}</b> <br>
<b >Age: {{$data->patient->age}}</b> <br>
<b >Sex: {{$data->patient->sex}}</b> <br>
<b>Ref Doctor: {{$data->doctor->name}}</b><br><br>
<b>Health Service Name: {{$data->surgerylist->name}}</b><br><br>
<b>Service Charge: {{$data->surgerylist->unitprice}} TK</b><br>
<b>Discount: {{$data->totaldiscount}} TK</b><br>
<b>VAT: {{$data->totalvat}} TK</b><br>
<b>Service Charge <br> After Adjusting <br> VAT and Discount : {{$data->final_price_after_adjustment}} TK</b><br>
<b >Due:{{$data->due}} TK </b> <br>

<b style="position: absolute; bottom:3px; right:100px;">Entry By: {{$data->user->name}}</b> <br>
</div>





</div>



</body>
</html>