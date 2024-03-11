<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>

@page {
  size: 150mm 150mm;
  margin: 0em;
}


table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
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
<img    src="img/logo.jpg" >
<hr>
</div>
<br>
<br>
<B STYLE="FONT-SIZE:15PX; margin:40px;">Introductory Slip</B>
<br>
<div  style="margin-left:20px;"  id="information">
<br>
<b> Patient Name: {{$data->name}}</b> <br>
<b> Patient ID: {{$data->id}}</b> <br>
<b >Age: {{$data->age}}</b> <br>
<b >Sex: {{$data->sex}}</b> <br>
<b >Sex: {{$data->address}}</b> <br>

<b >Date:<?php echo date("Y/m/d") ;  ?> </b> <br>

</div>





</div>



</body>
</html>