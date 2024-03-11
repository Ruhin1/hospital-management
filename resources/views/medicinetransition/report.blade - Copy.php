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

  <?php  
$totalkhoroch = 0;
$totalbaki =0;
$totaladvance = 0; 
$totalbeton=0;
 $totalcommission=0; 
 $totaldharshod=0;
 $totaldoctorcommission=0;
$patientferot=0;
$totaldoctorshare=0;

$totalmedicineCompanyerdharshod=0;
$totalmedicinemotkroy = 0;
$totalmedcinebakikroy = 0;
$totalmedicinenogodkroy = 0;

///////////// income variable 

$totalincome_from_pathology=0;
$total_discoubt_in_patho=0;
$total_vat_in_patho=0;
$net_income_from_pth =0;
$total_due_paid=0;
$mot_nogod_income_from_pathology=0;
$mot_nogod_sell_from_medicine=0;
$mot_nogod_sell_from_surgery=0;
$totalincome_from_medicine=0;
$total_discount_in_medicine=0;
$total_vat_in_medicine=0;
$net_income_from_medicine_from_all_itteration_of_loop =0;



$totalsell_from_surgery_by_substracting_discount=0; // exluding discount 
$total_discount_in_surgery=0;

$net_sell_from_surgery_from_all_itteration_of_loop =0;



$totalsell_from_cabine_by_substracting_discount=0; // exluding discount 
$total_discount_in_cabine =0;

$net_sell_from_cabine_from_all_itteration_of_loop =0;
$mot_nogod_sell_from_cabine=0;
$totalexcost=0;
  ?>

</style>
 
</head>
<body style="font-family: Times New Roman;">
<div id="c" >
<div id="head" >
<img width="500px;"   src="img/logo.jpg" >
<hr>
</div>



    <div style="height:10px;" id="one" >



 <br><br>
<?php   $i=0; if (!$medicinetransition->isEmpty())  { ?>
<h5 >  Net Sell of Medicines   </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>
	  <th scope="col">   Quantity </th>
	  	 <th scope="col">  Amount(TK)  </th>
     

	<!-- <th scope="col"> বিক্রির পরিমাণ ( গ্রোস  প্রাইস= নেট প্রাইস + টাক্স )  ৳  </th> -->
	 <th scope="col">  Discount(TK)    </th>
	  
 <th scope="col"> Receiveable Amount= (Amount-Discount)   </th>
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($medicinetransition as $med  )
	
	<?php 
	$i++;
$totalincome_from_medicine= $totalincome_from_medicine+ $med->amount ;
$total_discount_in_medicine= $total_discount_in_medicine + $med->discount ;

//$total_vat_in_medicine= $total_vat_in_medicine + $med->vat ;

$net_income_in_medicine_in_every_single_iiteration = (	$med->amount + $med->discount );
$net_income_from_medicine_from_all_itteration_of_loop = $net_income_from_medicine_from_all_itteration_of_loop + $net_income_in_medicine_in_every_single_iiteration ;
	
	
	?>
	<tr>
	<th>{{ $i }}
      <th >{{$med->medicine->name}}</th>
	  <th >{{$med->quantity}}</th>
	  <td>       <?php echo  number_format($net_income_in_medicine_in_every_single_iiteration, 2, '.', ',');?> </td>
      
	
      <td> <?php echo    number_format($med->discount, 2, '.', ',');?>   </td>
	  <td>  <?php echo number_format($med->amount, 2, '.', ',') ;?>  </td>
    </tr> 
@endforeach

  </tbody>
</table>(+)

 $total_due_medicine
<hr>
<span > Gross Amount of Medicine Sold: </span> <?php echo number_format($net_income_from_medicine_from_all_itteration_of_loop, 2, '.', ',') ;  ?> TK <br>

<span > Total Discount:     </span> <?php echo number_format($total_discount_in_medicine,2,'.',',')  ?> TK <br> <br><hr style="height:2px; width:100%; border-width:0; " > 
<b><span >(Gross Amount - Discount):  </span> </b>  <?php echo number_format($net_income_from_medicine_from_all_itteration_of_loop,2,'.',',');?> <?php echo  "-" ; ?>   <?php echo number_format($total_discount_in_medicine,2,'.',','); ?>  =     <?php echo number_format($totalincome_from_medicine,2,'.',',');  ?> TK <br>
    <span >  Medicine Sold in Due:  </span> <?php echo number_format($total_due_medicine,2,'.',',') ?>   TK <br>
  (-) 
  <hr>
   <b> <span >  So Medicine Sold in cash after Discount:    </span> <?php $mot_nogod_sell_from_medicine =  $totalincome_from_medicine - $total_due_medicine ?> <?php echo number_format($mot_nogod_sell_from_medicine,2,'.',',');?>  TK <br></b>
  <br> 
  

   <hr >


  <?php } ?> 




<?php $totalincome_from_medicine = 0;
$i =1;
$total_discount_in_medicine =0;
$net_income_in_medicine_in_every_single_iiteration =0;
$net_income_from_medicine_from_all_itteration_of_loop =0;

?>


<p>




<h5 >  Return Medicine    </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>
	  <th scope="col">   Quantity </th>
	  	 <th scope="col">  Amount(TK)  </th>
     

	<!-- <th scope="col"> বিক্রির পরিমাণ ( গ্রোস  প্রাইস= নেট প্রাইস + টাক্স )  ৳  </th> -->
	 <th scope="col">  Discount(TK)    </th>
	  
 <th scope="col"> Payable Amount= (Amount-Discount)   </th>
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($returnmedicinetransaction as $med  )
	
	<?php 
	$i++;
$totalincome_from_medicine= $totalincome_from_medicine+ $med->amount ;
$total_discount_in_medicine= $total_discount_in_medicine + $med->discount ;

//$total_vat_in_medicine= $total_vat_in_medicine + $med->vat ;

$net_income_in_medicine_in_every_single_iiteration = (	$med->amount + $med->discount );
$net_income_from_medicine_from_all_itteration_of_loop = $net_income_from_medicine_from_all_itteration_of_loop + $net_income_in_medicine_in_every_single_iiteration ;
	
	
	?>
	<tr>
	<th>{{ $i }}
      <th >{{$med->medicine->name}}</th>
	  <th >  <?php echo    number_format($med->quantity, 0, '.', ',');?>             </th>
	  <td>       <?php echo  number_format($net_income_in_medicine_in_every_single_iiteration, 2, '.', ',');?> </td>
      
	
      <td> <?php echo    number_format($med->discount, 2, '.', ',');?>   </td>
	  <td>  <?php echo number_format($med->amount, 2, '.', ',') ;?>  </td>
    </tr> 
@endforeach
	<tr>
	<th>Total
      <th >NA</th>
	  <th >NA</th>
	  <td>      <?php echo    number_format(	$net_income_from_medicine_from_all_itteration_of_loop, 2, '.', ',');?>  </td>
      

      <td> <?php echo    number_format($total_discount_in_medicine, 2, '.', ',');?>   </td>
	  <td>  <?php echo number_format($totalincome_from_medicine, 2, '.', ',') ;?>  </td>
    </tr> 
  </tbody>
</table>

<?php $i=1;

$final_amount = 0;
	$final_due =0;



?>
<P>
<p>
<b>  Due Transition </b>



  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>
	  <th scope="col"> Purchased Amount(TK) </th>
	  	 <th scope="col">  Due(TK)  </th>
		 <th> Date</th>
     

	 

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($duetransitions as $d  )
	
	<?php 
	$i++;

	$final_amount = $final_amount + $d->totalamount;
	$final_due = $final_due + $d->amount;
	?>
	<tr>
	<th>{{ $i }}
      <td >{{$d->patient->name}}</td>
	  <td >{{$d->totalamount}}</td>
	   <td >{{$d->amount}}</td>
   <td> {{ Carbon\Carbon::parse($d->created_at)->format('d/m/Y , h:i:sa') }} </td>
    </tr> 
@endforeach
	<tr>
	<th>Total
      <th >NA</th>
	  <th >  <?php echo    number_format(	$final_amount, 2, '.', ',');?>   </th>
	  <td>      <?php echo    number_format(	$final_due, 2, '.', ',');?>  </td>
<td>NA </td>
    </tr> 
  </tbody>
</table>


<P>



<p>

<h2> Due Collection </h2>
<?php $i=1;

$final_amount = 0;
	



?>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>
	  <th scope="col"> Paying Amount  </th>
	 <th> Date </th>
     

	 

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($duecollection as $d  )
	
	<?php 
	$i++;

	$final_amount = $final_amount + $d->amount;
	
	?>
	<tr>
	<th>{{ $i }}
      <td >{{$d->patient->name}}</td>
	 
	   <td >{{$d->amount}}</td>
	   
	   <td> {{ Carbon\Carbon::parse($d->created_at)->format('d/m/Y , h:i:sa') }} </td>

    </tr> 
@endforeach
	<tr>
	<td>Total</td>
      <td >NA</td>
	  <td >  <?php echo    number_format(	$final_amount, 2, '.', ',');?>   </td>
	<td> NA  </td>

    </tr> 
  </tbody>
</table>



<p>


<h2> Today's Stock    


<?php $date = date('d-m-y h:i:s');
echo $date; ?>


<h2>

<?php $i=1; ?>

  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>
	  <th scope="col"> Category  </th>
	   <th scope="col"> Stock  </th>
     

	 

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($medicine as $m  )
	

	<tr>
	<th>{{ $i }}
      <td >{{$m->name}}</td>
	 <td >{{$m->medicine_category->name}}</td>
	   <td >{{$m->stock}}</td>
<?php $i++; ?>
    </tr> 
@endforeach

  </tbody>
</table>





</div>








</div>


</body>
</html>