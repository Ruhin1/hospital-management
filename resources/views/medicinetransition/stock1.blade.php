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



    <div style="height:10px;" id="one" >





<p>


<h2> Today's Stock    


<?php $date = date('d-m-y h:i:s');
echo $date; ?>


<h2>

<?php $i=1; ?>

  <table class="table table-responsive">
  <thead>
    <tr> 


      <th scope="col"> Name:  </th>
 <th scope="col"> stock   </th>
 <th scope="col"> Unit Price || Total   </th>

     

	 

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($medicine as $m  )
		<?php $total = $m->stock *  $m->unitprice ; ?>

	<tr>


      <td >  {{$m->name}}      {{$m->medicine_category->name}}       </td>
   <td >{{$m->stock}} </td>

	<td> {{$m->unitprice}} || {{$total}}   </td>   

<?php $i++; ?>
    </tr> 
@endforeach

  </tbody>
</table>





</div>








</div>


</body>
</html>