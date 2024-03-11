<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>


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
<b> Patient Name: </b> {{$data->name}} <br>
<b> Patient ID: </b> {{$data->id}} <br>
<b >Age:</b> {{$data->age}} <br>
<b >Sex:</b> {{$data->sex}} <br>
<b >Address:</b> {{$data->address}} <br>
<b >Printing Date:</b> <?php echo date("Y/m/d") ;  ?>  <br>

</div>





</div>



</body>
</html>