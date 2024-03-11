<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-weight: normal;
}

td, th {
  border: 1px solid black;
  text-align: left;
  padding: 2px;
   font-weight: normal; 
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



 






<b>Date:</b>
<?php

echo $date;
?>
<p>







<?php $i=1; $sum=0;?>

  <table class="table table-responsive">
  <thead>
    <tr> 

<th scope="col"> No.  </th>
      <th scope="col"> Name:  </th>
 <th scope="col"> stock   </th>
 <th scope="col"> Unit Price(TK)    </th>

   <th scope="col"> Total Price(TK)  </th>   

	 

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($medicine as $m  )
		<?php $total = $m->stock *  $m->unitprice ;  $sum = $sum + $total;  ?>

	<tr>
<td>{{$i}}</td>

      <td >  {{$m->name}}    (  {{$m->medicine_category->name}} )      </td>
   <td >   <?php echo number_format($m->stock, 0, '.', ',') ;?>           </td>

	<td> {{$m->unitprice}}   </td>   
	<td>{{$total}}  </td>

<?php $i++; ?>
    </tr> 
@endforeach



    <tr> 

<th scope="col"> NA  </th>
      <th scope="col"> <b>Total:</b>  </th>
 <th scope="col"> NA   </th>
 <th scope="col"> NA    </th>

   <th scope="col"> <?php echo round($sum) ;?>    </th>   

	 

    </tr>









  </tbody>
</table>

    
</body>
</html>
