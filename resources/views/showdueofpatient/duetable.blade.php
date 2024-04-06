

@extends('layout.main')

@section('content')






   <div style="height:10px;" id="two" >
    <div style="width:20%; float:left;" >
      <b>Patient:</b> {{ $patient->name   }} 
    </div>

	
	    <div style="width:25%;float:left;" >
 <b>Mobile:</b> {{ $patient->mobile   }}
    </div>


  </div>
  
  




<p>
	<?php   // if ($cabinetransaction != 0) { ?>
<b> Cabine Transition</b>





   <div style="height:10px;" id="two" >
    <div style="width:20%; float:left;" >
      <b>Cabine NO: </b>    {{$cabinetransaction->cabinelist->serial_no}}
    </div>

	
	    <div style="width:25%;float:left;" >
 <b>From:</b> 
 
	<?php   $myDateTime = DateTime::createFromFormat('Y-m-d', $cabinetransaction->starting);  echo  $myDateTime->format('d/m/Y');

?>
    </div>
	    <div style="width:25%;float:left;" >
 <b>TO:</b>

 	  <?php 
if($cabinetransaction->ending )
{
	  $myDateTime = DateTime::createFromFormat('Y-m-d', $cabinetransaction->ending);  echo  $myDateTime->format('d/m/Y');

}

else
{
	 echo date("d/m/y") ;
}

	  ?> 



    </div>
	
	
    <div style="width:30%; float:left;" >
      <b>Cabine Fare: </b> {{$tcabinecharge}}TK
    </div>	
	
	

  </div>



<p>

<div class="table-responsive">
<table class="table">

  <thead>
    <tr>
      <th scope="col">No. </th>


	  	   <th scope="col"> Entry Time   </th>
	  <th scope="col"> From   </th>

	  <th scope="col"> To    </th>
	        <th scope="col">  Amount   </th>
	    <th scope="col"> Total Paid     </th>
   <th scope="col"> Total Cabine Due  </th>
    </tr>
  </thead>
  <tbody>
  <?php $i=0;  $paid=0;  $tcabinedue= $tcabinecharge;  ?>

  @foreach($cabinefeetransition as $cb )
    <?php $i= $i+1; ?>
  
    <tr>
      <th scope="row"><?php echo $i;     	     ?></th>


<td> {{ \Carbon\Carbon::parse($cb->created_at)->format('d/m/Y  h:i:sa'); }} </td>
	

<td>	<?php $paid= $paid+ $cb->paid; 

$tcabinedue = $tcabinedue- $cb->paid; 


 $myDateTime = DateTime::createFromFormat('Y-m-d', $cb->starting);  echo  $myDateTime->format('d/m/Y');?> </td>



<td>	<?php   $myDateTime = DateTime::createFromFormat('Y-m-d', $cb->ending);  echo  $myDateTime->format('d/m/Y');?> </td>

      <td>{{ $cb->paid }} </td>

	   <td> {{$paid}}    </td>
   <td> {{$tcabinedue}}    </td>

    </tr>
   @endforeach
  </tbody>
</table>




</div>
	
<p>

<?php  // }  else { $tcabinedue =0;  } ?>
<b> Other Transition</b>

<p>



<div class="table-responsive">
<table class="table">

  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">  Transition   </th>
      <th scope="col"> Type </th>
      <th scope="col"> Price    </th>
	  <th scope="col"> Due   </th>
	  <th scope="col"> Deposit    </th>
	    <th scope="col"> Total Other Due   </th>
	   <th scope="col"> Date    </th>
    </tr>
  </thead>
  <tbody>
  <?php $i=0;  $due=0; ?>

  @foreach($duetransition as $d )
    <?php $i= $i+1; ?>
  
    <tr>
      <th scope="row"><?php echo $i;     	     ?></th>
      <td>
<?php	  
	if( $d->transitionproducttype == 2 )  
	  
	  {
	  echo "Medicine";
	  
	  }
	  
		if( $d->transitionproducttype == 4 )  
	  
	  {
	  echo "Pathology";
	  
	  }  
	  
	  		if( $d->transitionproducttype == 3 )  
	  
	  {
	  echo "Surgery";
	  
	  }  
	  
	  	  		if( $d->transitionproducttype == 5 )  
	  
	  {
	  echo "Doctor Fees";
	  
	  } 
	  
	 
if($d->discountondue > 0 )
{
echo "Discount on Due. Discount Amount =" 	.$d->discountondue; 
	
}
	 
	  
	 ?>  
	  
	 </td>
	  <?php if( $d->transitiontype == 2 ) { 

if($d->discountondue > 0 )
{

	 $due = $due+$d->amount+$d->discountondue ; 
}
else{

$due = $due+$d->amount;    }            ?>
	  
 
	  
      <td>New Due  </td>
	  <?php } if( $d->transitiontype == 1 ) {   $due = $due-$d->amount;                     ?>
	  
	  <td> Deposit  </td>
	  
	  <?php } ?>
	  
      <td> {{$d->totalamount}}  </td>
	   <?php if( $d->transitiontype == 2 ) { ?>
	   <td>{{$d->amount}}</td>
	   <td>NA</td>
	    <?php } if( $d->transitiontype == 1 ) { ?>
		 <td>NA</td>
	     <td>{{$d->amount}}</td>
	     <?php } ?>
		 
		 <td>  {{$due}}    </td>
		 
	   	   <td> {{ \Carbon\Carbon::parse($d->created_at)->format('d/m/Y  h:i:sa'); }} </td>
    </tr>
   @endforeach
  </tbody>
</table>



</div>



<b> Total Due</b> Total Cabine Due + Total Others Due = {{$tcabinedue}} + ( {{$due}} ) = {{ $tcabinedue + $due }} TK.
<br>

<?php

$sign = $tcabinedue + $due ;

if ( $sign < 0)
{
	
$sign = $sign * (-1);	
	
  ?>
  
 So Untill Today , The Patient Will get back {{ $sign }} TK ( As The Sign of "Total Due" is negative.)
  
<?php } else {
	?>
So Untill Today , The Patient has the Due = {{ $tcabinedue + $due }} TK.

<?php } ?>





 <script src="{{asset('jquery/jquery.min.js')}}"></script>  
 <script src="{{asset('jquery_val/dist/jquery.validate.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">


$(document).ready(function(){

$("#patient").select2();





});
</script>
	  


@stop