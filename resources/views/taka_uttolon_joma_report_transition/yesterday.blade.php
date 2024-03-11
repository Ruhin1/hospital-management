

@extends('layout.main')

@section('content')

<body>

  <?php  
$totaluttolon = 0;
$totaljoma = 0;




  ?>
  
  
<div class="container">
  <div class="row">
    <div style="background-color: #add8e6" class="col-sm">
  <h2 style="color:red">    গতকালকে  ব্যাবসা হতে  পার্টনারগণ যে পরিমাণ টাকা উত্তোলন করেছে </h2>
  <hr>
  
  <h5 style="color:red;"> নগদ উত্তোলন  </h5>
  <table class="table">
  <thead>
    <tr>
    
      <th scope="col"> পার্টনারের  নাম </th>
	  <th scope="col"> টাকার পরিমাণ  </th>
 
    </tr>
  </thead>
  <tbody>
  

    
	@foreach($taka_utthlon as $uttolon)
	
	
	<?php  

$totaluttolon = $totaluttolon+ $uttolon->total_amount ;


	?>
	
	
	
	
	<tr>
      <th >{{$uttolon->sharepartner->name}}</th>
	  <td>{{$uttolon->total_amount}}</td>

    </tr>
@endforeach
  </tbody>
</table>(+) 

<hr>
<span style="color:blue;">    মোট উত্তোলনঃ   </span> <?php echo $totaluttolon  ?> টাকা 

  

  
  <br>
 
  <br><br>
   <hr >


<br><br>






  
  
  
    </div>
   
<!-------------------------------------------------- income ---------------------------------->








   <div  style="background-color: #EEE8AA" class="col-sm">
<h2 style="color:green">     গতকালকে ব্যাবসায়িক পার্টনাররা যে পরিমাণ টাকা ব্যাবসায় নগদ বিনিয়োগ করেছে  </h2>
<hr>



 
 <h5 style="color:red;"> নগদ বিনিয়োগ   </h5>
  <table class="table">
  <thead>
    <tr>
    
      <th scope="col"> পার্টনারের  নাম </th>
	  <th scope="col"> টাকার পরিমাণ  </th>
 
    </tr>
  </thead>
  <tbody>
  

    
	@foreach($taka_joma as $joma )
	
	
	<?php  

$totaljoma = $totaljoma + $joma->total_amount ;


	?>
	
	
	
	
	<tr>
      <th >{{$joma->sharepartner->name}}</th>
	  <td>{{$joma->total_amount}}</td>

    </tr>
@endforeach
  </tbody>
</table>(+) 

<hr>
<span style="color:blue;">    মোট জমাঃ    </span> <?php echo $totaljoma  ?> টাকা 









    </div>


  </div>
</div>

 
 






</bodY>
@stop