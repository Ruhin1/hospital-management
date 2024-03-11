<html>
<head>
<style>

@page {
  size: 72mm 150mm;
  margin: 0em;
}


table, th, td {
  border:1px solid black;
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
<b>Name: Kamal Hossain</b> <br>
<b >Age: 45</b> <br>
<b >Sex: Male</b> <br>
<b >Serial No: 12</b> <br>
<b >Date: </b> <br>

<b>Ref Doctor: Ahsan Habib</b><br>

<b >Due:0 TK </b> <br>
<b >Paid: 500 TK</b> <br>
<b style="position: absolute; bottom:3px; right:100px;">Entry By: Shela</b> <br>
</div>


<table style="width:100%">
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
</table>


</div>



</body>
</html>