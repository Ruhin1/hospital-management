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


</style>

</head>
<body style="font-family: Times New Roman;">
<div id="c" >
<div id="head" >
<img width="500px;"   src="img/logo.jpg" >
<hr>
</div>



<div style="font-size:2.5 px;"  >




     


  
  </div>
   

<br>







<table>
  <tr>

    <th >Property  Name </th>
    <th>Quantity.</th>


  </tr>
  

 
 @foreach ( $sompod as $t )
  <tr>

    <td> {{$t->name}}</td>
 <td> {{$t->quantity}}</td>

  </tr>
@endforeach 







</table>




<P> 
Printed BY:{{ Auth()->user()->name }}<br>



	   
	    











Printed At: <?php echo date('d/m/Y'); ?>

</div>



</body>
</html>