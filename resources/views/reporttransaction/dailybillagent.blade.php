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



<bodY>


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
 Patient sent by Agent : <b> {{$agent}}</b><br>

	   <b> All Transaction in Pathology Section on the   date:
	   
	   <?php 
	     
	    $myDateTime = DateTime::createFromFormat('Y-m-d', $start);  echo  $myDateTime->format('d/m/Y'); ?> 
    
	   

	   to 
	   	   <?php 
   $myDateTime = DateTime::createFromFormat('Y-m-d', $e);  echo  $myDateTime->format('d/m/Y'); $sum=0; $i=1; $ref=0;
	   ?>
	   
	    </b>
<p>



<table>
    
<thead>	
  <tr>
  <th> No.</th>
   <th style="width:40px;" >Patient ID</th>
 <th style="width:40px;" >Patient Name</th>
  
    <th style="width:150px;" >
	
	  Tests
    
	 </th>

    <th style="width:100px;"  >Gross Amnt(TK)</th>
		  <th style="width:100px;"  >Discount </th>
		  	  <th style="width:100px;"  >Receiveable Amnt. </th>
	   <th style="width:100px;"  >Paid(TK)</th>
	      <th style="width:100px;"  >Due(TK)</th>
	   
	 <th style="width:100px;"  > Total Balance  </th>

  </tr>
  
  <?php 
  
  $grossamount=0;
  $discount=0;
  $receiveableamount=0;
  $paid=0;
  $due=0;
  
  ?>
  
  </thead>
 @foreach ( $transpatho as $t )


  <tr>
  
<td> {{$i}}</td>
 <td> {{$t->patient->id}} </td>
 <td> {{$t->patient->name}} </td>
 <?php $i++ ;?>
    <td> 

<table>
  <tr>
    <th style="width:100px;" >Test Name </th>
    <th>Gross Price</th>
	<th>Discount</th>
    <th>Receivable Amnt.</th>
  </tr>
  

 
 @foreach($t->reporttransaction as $m  )
  <tr>

    <td> {{ $m->reportlist->name }}</td>
   <td><?php

if($m->unitprice == null){

   echo round($m->reportlist->unitprice,2);

}
else{
 echo round($m->unitprice,2);	
	
}

 ?> </td>
   <td><?php echo round($m->totaldiscount,2); ?> </td>
<td> <?php echo round($m->adjust,2); ?>  </td>
   	 
  </tr>
@endforeach 




</table>

</td>
  




 <td><?php echo round($t->totalbeforediscount,2); ?> </td>
 <td><?php echo round($t->discount,2); ?> </td>

	 <td><?php echo round($t->total,2); ?></td>
	  
	 <td><?php echo round($t->pay_in_cash,2); ?></td>
	  <td><?php echo round($t->due,2); ?></td>
	  
	  
	  
	    <?php 
  
  $grossamount=$grossamount +$t->totalbeforediscount ;
  $discount= $discount + $t->discount;
  $receiveableamount=$receiveableamount +$t->total ;
  $paid=$paid + $t->pay_in_cash;
  $due=$due + $t->due;
  
  ?>
	  
	  
	  
	  
	  
	  
 
  <td><?php  $sum= $sum + $t->total;    echo round($sum ,2); ?></td>	 
	 
  </tr>

@endforeach 

<tr>
<td>NA</td>
<td>NA</td>
<td>NA</td>
<td>Total</td>
 <td><?php echo round($grossamount,2); ?> </td>
 <td><?php echo round($discount,2); ?> </td>

	 <td><?php echo round($receiveableamount,2); ?></td>
	  
	 <td><?php echo round($paid,2); ?></td>
	  <td><?php echo round($due,2); ?></td>
	  <td><?php echo round($sum,2); ?></td>
</tr>









</table>




<P>




So Total Net Income From the patient refferd by Agent {{$agent}}:  {{$sum}}  TK


<hr>

 






</body>
</html>