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





 <?php for ($j=0; $j<3; $j++){ ?>
</head>

<body style="font-family: Times New Roman;">
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



    <div style="height:10px;" id="one" >
    <div style="width:33%; float:left;" >
	<?php if( $j == 0) { ?>
      <b><u>Customer Copy</u></b>
    <?php } if ( $j == 1){ ?>
	  <b>Office Copy </b>
	  <?php } if ( $j == 2){ ?>
	 <b> Accountant's Copy  </b>
	  <?php } ?>
	</div>
    <div style="width:33%;float:left;" >
 <b>Patient ID:</b> {{$data->id}}
    </div>



  </div>

 

   
    <div style="height:10px;" id="two" >
    <div style="width:40%; float:left;" >
      <b>Name :</b> {{$data->name}}
    </div>

	
	    <div style="width:13%;float:left;" >
 <b>Age:</b> {{$data->age}}
    </div>
	    <div style="width:13%;float:left;" >
 <b>Sex:</b>{{$data->sex}}
    </div>
	
	
	    <div style="width:34%;float:left;" >
<b>Mobile No.</b> {{$data->mobile}} 
    </div>

  </div>
    
   

   <div style="height:10px;" id="two" >
    <div style="width:50%; float:left;" >
      <b>Diagnosis For: </b> {{$data->diagnosisfor}}
    </div>

	



  </div>














<P>

<b> Cash Transitions<b>


<table>
  <tr>
    <th  >Date </th>
    <th>Description</th>
 <th>Gross Amount </th>
	 <th>Dis.(TK) </th>
	 
	 <th>Receiveable Amount(TK)</th> 
	  <th>Due</th> 
	 	<th>Debit</th>
    <th>Credit</th>
	    <th>Due Balance</th>
  </tr>
  
<?php 

$balance =0;

?>
 
 @foreach ( $cashtransition as $c )
  <tr>
     <td> <?php echo date('d/m/Y h:i:s A', strtotime($c->created_at));; ?> </td>
   <td> {{$c->description   }} </td>
   <td><?php echo round($c->gorssamount,2); ?> </td>

   
       <td><?php echo round($c->discount,2); ?> </td>
	  <td><?php echo round($c->amount_after_discount,2); ?> </td>
	 <td><?php echo round($c->debit,2); ?></td>
	 <td><?php echo round($c->debit,2); ?></td>
	 <td><?php echo round($c->credit,2); ?></td>	 
<?php 

if ($c->customer_type == 1   )
{
	
$balance = $balance + 	$c->debit;
}
if  ($c->customer_type == 2   )
{
	
$balance = $balance - 	$c->gorssamount;	
	
}
if ($c->customer_type == 3   )
{
$balance = $balance + 	$c->debit;	
	
}
?>


	 <td><?php echo round($balance,2); ?></td>	
	 
	 
  </tr>
@endforeach 


  <tr>
     <td> NA </td>
   <td> Unpaid Cabine Due </td>
   <td><?php echo round($total_seat_fair,2); ?> </td>

   
       <td>0 </td>
	  <td><?php echo round($total_seat_fair,2); ?> </td>
	 <td><?php echo round($total_seat_fair,2); ?></td>
	 <td><?php echo round($total_seat_fair,2); ?></td>
	 <td><?php 0; ?></td>	 
<?php 

	


$balance = $balance + 	$total_seat_fair;	
	

?>


	 <td><?php echo round($balance,2); ?></td>	
	 
	 
  </tr>



















</table>











  
  
  
  
  
  
  
  
  
  
  <?php if( $j > 0) { ?>
	 <div style="height:10px;" id="two" >
    

<?php if($data->agentdetail_id){  ?>
<div style="width:50%; float:left;" >
     <b>Agent Name:</b>
	 {{$data->agentdetail->name}} 
	 
    </div>
	 
<?php } if($data->doctor_id){  ?>

<div style="width:50%; float:left;" >
     <b>Agent Name:</b>
	 {{$data->doctor->name}} 
	 
    </div>


	

<?php } ?>



	



  </div>  

  <?php } ?>



</div>





</div>


			<?php if( $j < 2) { ?>
	<p style="page-break-after:always" ></p>
 <?php } } ?>
</body>
</html>