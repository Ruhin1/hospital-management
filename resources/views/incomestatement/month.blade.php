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
  <?php  
  $admission_refund =0;
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
$totalmedicine_cash_back_com=0;
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

$total_due_paid_medicine=0;
$total_due_paid_cabine=0;
$total_due_paid_Pathology=0;
$total_due_paid_surgery=0;
$total_due_paid_dcotor=0;
$total_due_paid_service=0;
$total_due_paid_pathology=0;
$totalsell_from_surgery_by_substracting_discount=0; // exluding discount 
$total_discount_in_surgery=0;

$net_sell_from_surgery_from_all_itteration_of_loop =0;



$totalsell_from_cabine_by_substracting_discount=0; // exluding discount 
$total_discount_in_cabine =0;

$net_sell_from_cabine_from_all_itteration_of_loop =0;
$mot_nogod_sell_from_cabine=0;
$totalexcost=0;
$advance_amount =0;

	$total_return_grossamount =0 ;
$total_payable_amount =0;


$total_gross_amount_dcotor=0;
$total_paid_by_cash_doctor = 0;
$total_paid_by_advance = 0;
$total_due_doctor  = 0;
$cabinefeebyadvanceadjustment=0;
$totalservice_adjustment=0;

$moneyback_amount=0;
$money_back_customerrelease_time=0;
$cabine_refund=0;
$pathology_refund=0;
$medicine_refund=0;
$surgery_refund=0;
$doctor_refund=0;
$service_refund=0;
$long_term_service_income =0;



$gross_amout_out =0;
$total_dis_out =0;
$total_receiv_out =0;



$sum_grossamnt_amission_fee  = 0;

$discount_grossamnt_amission_fee  = 0;

$paid_admission_fee =  0;

$due_admission_fee = 0;
$total_reagent_back=0;
$total_due_paid_admission_fee =0;
  ?>
  



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










<div  class="container">

  
 
  <hr>
 
  
  
      <div id="three" >
    
	<h2>  This Month's Sales-Expenses Statemnet: 
	   
 
	  <?php    $dateObj   = DateTime::createFromFormat('!m', $m);
$mon = $dateObj->format('F');   
echo $mon;
 
        ?> , {{$y}} </h2>
	
	
	
	
	
	
	<div style="width:50%; float:left;" >
	
  
    <div style=" margin-right:5px;" class="col-sm">
  <h2 >   Expenditures </h2>
  
  
  
  <!---------------------------------- Service Money back to customer . chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php   $i=0; if (!$money_back_customer_at_release_time->isEmpty())  { ?>
<h5 > Cash back at the time of discharging: </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>

	  	 <th scope="col">  Amount(TK)  </th>
     


	  

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($money_back_customer_at_release_time as $mv  )
	
	<?php 
	$i++;
$money_back_customerrelease_time = $money_back_customerrelease_time + $mv->amount;
	
	?>
	<tr>
	<th>{{ $i }}
      <th >{{$mv->patient->name}}</th>
	 
	  <td>       <?php echo  number_format($mv->amount, 2, '.', ',');?> </td>
      

    </tr> 
@endforeach

  </tbody>
</table>(+)

 
<hr>
<span > Total Money bact at the time of Discharging: </span> <?php echo number_format($money_back_customerrelease_time, 2, '.', ',') ;  ?> TK <br>



 <br> 
  

   <hr >


  <?php } ?> 

  
  
  
    <!---------------------------------- Refund From Cabine/bed fair . chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php   $i=0; if (!$money_back_customer_cabine->isEmpty())  { ?>
<h5 > Cabine Refund: </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>

	  	 <th scope="col">  Amount(TK)  </th>
     


	  

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($money_back_customer_cabine as $cb  )
	
	<?php 
	$i++;
$cabine_refund = $cabine_refund + $cb->amount;
	
	?>
	<tr>
	<th>{{ $i }}
      <th >{{$cb->patient->name}}</th>
	 
	  <td>       <?php echo  number_format($cb->amount, 2, '.', ',');?> </td>
      

    </tr> 
@endforeach

  </tbody>
</table>(+)

 
<hr>
<span > Refund Cabine/Bed Fair: </span> <?php echo number_format($cabine_refund, 2, '.', ',') ;  ?> TK <br>



 <br> 
  

   <hr >


  <?php } ?> 
  
  <!------------------------------------ Admission Bill Refund --------------------->
  
   <br><br>
<?php   $i=0; if (!$money_back_customer_at_admissionfee->isEmpty())  { ?>
<h5 > Admission Fees Refund: </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>

	  	 <th scope="col">  Amount(TK)  </th>
     


	  

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($money_back_customer_at_admissionfee as $cb  )
	
	<?php 
	$i++;
$admission_refund = $admission_refund + $cb->amount;
	
	?>
	<tr>
	<th>{{ $i }}
      <th >{{$cb->patient->name}}</th>
	 
	  <td>       <?php echo  number_format($cb->amount, 2, '.', ',');?> </td>
      

    </tr> 
@endforeach

  </tbody>
</table>(+)

 
<hr>
<span > Refund Admission Fee: </span> <?php echo number_format($admission_refund, 2, '.', ',') ;  ?> TK <br>



 <br> 
  

   <hr >


  <?php } ?> 
 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
      <!---------------------------------- Refund From Pathology . chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php   $i=0; if (!$money_back_customer_pathology->isEmpty())  { ?>
<h5 > Pathology Refund: </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>

	  	 <th scope="col">  Amount(TK)  </th>
     


	  

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($money_back_customer_pathology as $pt  )
	
	<?php 
	$i++;
$pathology_refund = $pathology_refund + $pt->amount;
	
	?>
	<tr>
	<th>{{ $i }}
      <th >{{$pt->patient->name}}</th>
	 
	  <td>       <?php echo  number_format($pt->amount, 2, '.', ',');?> </td>
      

    </tr> 
@endforeach

  </tbody>
</table>(+)

 
<hr>
<span > Refund in Pathology: </span> <?php echo number_format($pathology_refund, 2, '.', ',') ;  ?> TK <br>



 <br> 
  

   <hr >


  <?php } ?> 
  
  
  
  
  
        <!---------------------------------- Refund From Medicine . chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php   $i=0; if (!$money_back_customer_medicine->isEmpty())  { ?>
<h5 > Medicine Refund: </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>

	  	 <th scope="col">  Amount(TK)  </th>
     


	  

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($money_back_customer_medicine as $mc  )
	
	<?php 
	$i++;
$medicine_refund = $medicine_refund + $mc->amount;
	
	?>
	<tr>
	<th>{{ $i }}
      <th >{{$mc->patient->name}}</th>
	 
	  <td>       <?php echo  number_format($mc->amount, 2, '.', ',');?> </td>
      

    </tr> 
@endforeach

  </tbody>
</table>(+)

 
<hr>
<span > Refund in Pathology: </span> <?php echo number_format($medicine_refund, 2, '.', ',') ;  ?> TK <br>



 <br> 
  

   <hr >


  <?php } ?> 
  
  
  
  
         <!---------------------------------- Refund From  Surgery Cost . chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php   $i=0; if (!$money_back_customer_at_surgery->isEmpty())  { ?>
<h5 >   Surgery Cost Refund: </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>

	  	 <th scope="col">  Amount(TK)  </th>
     


	  

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($money_back_customer_at_surgery as $sc  )
	
	<?php 
	$i++;
$surgery_refund = $surgery_refund + $sc->amount;
	
	?>
	<tr>
	<th>{{ $i }}
      <th >{{$sc->patient->name}}</th>
	 
	  <td>       <?php echo  number_format($sc->amount, 2, '.', ',');?> </td>
      

    </tr> 
@endforeach

  </tbody>
</table>(+)

 
<hr>
<span > Refund Surgey Cost: </span> <?php echo number_format($surgery_refund, 2, '.', ',') ;  ?> TK <br>



 <br> 
  

   <hr >


  <?php } ?> 










         <!---------------------------------- Refund From  Doctor fees . chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php   $i=0; if (!$money_back_customer_at_doctor->isEmpty())  { ?>
<h5 >   Doctor Fees Refund: </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>

	  	 <th scope="col">  Amount(TK)  </th>
     


	  

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($money_back_customer_at_doctor as $dc  )
	
	<?php 
	$i++;
$doctor_refund = $doctor_refund + $dc->amount;
	
	?>
	<tr>
	<th>{{ $i }}
      <th >{{$dc->patient->name}}</th>
	 
	  <td>       <?php echo  number_format($dc->amount, 2, '.', ',');?> </td>
      

    </tr> 
@endforeach

  </tbody>
</table>(+)

 
<hr>
<span > Refund Surgey Cost: </span> <?php echo number_format($doctor_refund, 2, '.', ',') ;  ?> TK <br>



 <br> 
  

   <hr >


  <?php } ?> 



         <!---------------------------------- Refund From   chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php   $i=0; if (!$money_back_customer_service->isEmpty())  { ?>
<h5 >   Service Fees Refund: </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>

	  	 <th scope="col">  Amount(TK)  </th>
     


	  

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($money_back_customer_service as $sc  )
	
	<?php 
	$i++;
$service_refund = $service_refund + $sc->amount;
	
	?>
	<tr>
	<th>{{ $i }}
      <th >{{$sc->patient->name}}</th>
	 
	  <td>       <?php echo  number_format($sc->amount, 2, '.', ',');?> </td>
      

    </tr> 
@endforeach

  </tbody>
</table>(+)

 
<hr>
<span > Refund Surgey Cost: </span> <?php echo number_format($service_refund, 2, '.', ',') ;  ?> TK <br>



 <br> 
  

   <hr >


  <?php } ?>


 
  
  
  
  
  
  
  
  <hr>
  <?php if (!$externalcost->isEmpty())  { ?> 
  <h5 > Expenses in Various fields: </h5>
  <table class="table">
  <thead>
    <tr>
    
      <th scope="col"> Expenditure Name </th>
	  <th scope="col"> Qun. </th>
      <th scope="col">Price  </th>
      <th scope="col">Due </th>
	   <th scope="col">Advance (if any)  </th>
	 
    </tr>
  </thead>
  <tbody>
  

    
	@foreach($externalcost as $e)
	
	
	<?php  

$totalkhoroch = $totalkhoroch+ $e->total_amount ;
$totalbaki = $totalbaki + $e->total_due ;
$totaladvance = $totaladvance + $e->total_advance ; 




	?>
	
	
	
	
	<tr>
      <th >{{$e->khorocer_khad->name}}</th>
	  
   

<td> <?php echo  round($e->total_unit, 0);?>	 </td> 
   
 <td> <?php echo  number_format($e->total_amount, 2, '.', ',');?>	 </td> 
	  
	  
	  
      <td>  <?php echo  number_format($e->total_due, 2, '.', ',');?>	                 </td>
      <td><?php echo  number_format($e->total_advance, 2, '.', ',');?> </td>

    </tr>
@endforeach
  </tbody>
</table>(+) 

<hr>
<span >So Total Expenditure:  </span> <?php echo $totalkhoroch  ?> TK

  

  
  <br>
 
  <br><br>
   <hr >


<br><br>




  <?php } ?>




 <!---------------------------------- External Cost . chechk if threre any transition in the daterange. 
if yes then exexute  -->

<?php if (!$externalcost2->isEmpty())  { ?>
<h5 style="color:red">     External Cost   </h5>
  <hr>
  <table class="table">
  <thead>
    <tr>
    
      <th scope="col">  Name  </th>
      <th scope="col">Amount.   </th>
     
    </tr>
  </thead>
  <tbody>
    
	
	
	

	
	
	
	@foreach($externalcost2 as $e)
	<?php  
	$totalexcost = $totalexcost + $e->cost;
	
	?>
	
	<tr>
      <th >{{$e->name}}</th>

  

 
   
 <td> <?php echo  number_format($e->cost, 2, '.', ',');?>	 </td> 







  
    </tr>
@endforeach
  </tbody>
</table>
 (+)
<hr>
<span >Total: </span> <?php echo $totalexcost  ?> TK

  

  
  <br>
 
  <br><br>
 
   <hr >


  <?php } ?>
















<!---------------------------------- employee transition. chechk if threre any transition in the daterange. 
if yes then exexute  -->

<?php if (!$employee_salary->isEmpty())  { ?>
<h5 >   Salary Expenditure   </h5>
  <hr>
  <table class="table">
  <thead>
    <tr>
    
      <th scope="col"> Employee  </th>
      <th scope="col">Salary Amount.  </th>
     
    </tr>
  </thead>
  <tbody>
    
	
	
	
	
	
	
	@foreach($employee_salary as $ems)
	<?php  
	$totalbeton = $totalbeton + $ems->total_given_salary_of_a_employee;
	
	?>
	
	<tr>
      <th >{{$ems->employeedetails->name}}</th>
      
  <td> <?php echo  number_format($ems->total_given_salary_of_a_employee, 2, '.', ',');?>	 </td>      
    </tr>
@endforeach
  </tbody>
</table>
<hr>
<span > So Total Amoutnt of Salary Given:  </span> <?php echo $totalbeton  ?> TK. 

  

  
  <br>
 
  <br><br>
   <hr >












  <?php } ?>
  
 


<!---------------------------------- Reagent buying transition . chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
<br><br>
<?php  $i=0;	  if (!$reagenta_transaction->isEmpty())  {  ?>
<h5 >  Reagents purchases  </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Reagent Name </th>
	   <th scope="col"> Qun. </th>
	  	 <th scope="col"> Amount(TK) </th>
     

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($reagenta_transaction as $r )
	
	<?php 
	$i++;


	
	?>
	<tr>
<th> {{ $i }}
      <th >{{$r->name}}</th>
	     <th >{{$r->quantity}}</th>
	  
	  <td>{{ $r->amount }}</td>

  </tr>
@endforeach

  </tbody>
</table>(+)


<hr>
<b>Total Reagent purchases: {{ $reagent_total_purchase->total_price_amount }} TK <br>
<b>Total cash: {{ $reagent_total_purchase->total_paid }} TK <br> 
<b>Total purchases on Credit: {{ $reagent_total_purchase->total_due }} TK <br> 
  <hr >


  <?php } ?> 
  
  
















<!---------------------------------- medicinekroy transition. chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php if (!$medicineCompanyTransition->isEmpty())  { ?>
<h5 style="color:red">    Expenditures for buying Medicine  </h5>
  <hr>
  <table class="table">
  <thead>
    <tr> 
    
      <th scope="col"> Company Name  </th>
   
      <th scope="col">Purchasing price    </th>
	  <th scope="col"> Due.   </th>
	  <th scope="col"> Buying in Cash </th>
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($medicineCompanyTransition as $medtran)
	
	<?php 
	
	$totalmedicinemotkroy = $totalmedicinemotkroy+ $medtran->amount ;
$totalmedcinebakikroy = $totalmedcinebakikroy+ $medtran->due   ;
$totalmedicinenogodkroy = $totalmedicinenogodkroy+ $medtran->pay_in_cash ;
	//$totalcommission = $totalcommission+ $agentcom->total_given_paidamount_of_a_agents ;
	?>
	<tr>
      <th >{{$medtran->medicinecomapnyname->name}}</th>
	  
	  
	  

  <td> <?php echo  number_format($medtran->amount, 2, '.', ',');?>	 </td>  	  
      
 
	  <td>{{$medtran->due}}</td>
	  <td>{{$medtran->pay_in_cash}}</td>
    </tr>
@endforeach
  </tbody>
</table>(+)


<hr>
<span > So Total Expenditure to buy medicine:  </span> <?php echo $totalmedicinemotkroy  ?> Taka  <br>
<span > Total amount buying in Cash:  </span> <?php echo $totalmedicinenogodkroy  ?> Taka <br>
<span > Due:  </span> <?php echo $totalmedcinebakikroy  ?> Taka  
  

  
  <br>
 
  <br><br>
   <hr >


  <?php } ?> 
  
  
 
 
 
 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 


<!---------------------------------- Agent transition. chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php if (!$agent_commision->isEmpty())  { ?>
<h5 style="color:red">     Agent Commission </h5>
  <hr>
  <table class="table">
  <thead>
    <tr> 
    
      <th scope="col"> Agent Name  </th>
      <th scope="col">Commission Amount.   </th>
     
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($agent_commision as $agentcom)
	
	<?php 
	$totalcommission = $totalcommission+ $agentcom->total_given_paidamount_of_a_agents ;
	?>
	<tr>
      <th >{{$agentcom->agentdetail->name}}</th>
      <td>{{$agentcom->total_given_paidamount_of_a_agents}}</td>
      
    </tr>
@endforeach
  </tbody>
</table>(+)


<hr>
<span > Total expenditure to pay Commission:  </span> <?php echo $totalcommission  ?> TK 

  

  
  <br>
 
  <br><br>
   <hr >


  <?php } ?> 
  
  
  
 






 <!---------------------------------- DoctorCommission . chechk if threre any transition in the daterange. 
if yes then exexute  -->

<?php if (!$doctorcommission->isEmpty())  { ?>
<h5 style="color:red">     Doctor's Commission   </h5>
  <hr>
  <table class="table">
  <thead>
    <tr>
    
      <th scope="col">  Name  </th>
      <th scope="col">Amount.   </th>
     
    </tr>
  </thead>
  <tbody>
    
	
	
	
	
	
	
	@foreach($doctorcommission as $doctorcom)
	<?php  
	$totaldoctorcommission = $totaldoctorcommission + $doctorcom->total_deya_commission;
	
	?>
	
	<tr>
      <th >{{$doctorcom->doctor->name}}</th>
      <td>{{$doctorcom->total_deya_commission}}</td>
      
    </tr>
@endforeach
  </tbody>
</table>
 (+)
<hr>
<span >Total Expenditure to pay Commission to Doctor: </span> <?php echo $totaldoctorcommission  ?> TK

  

  
  <br>
 
  <br><br>
 
   <hr >


  <?php } ?>
  






 <!---------------------------------- Doctor er outdoor er share er taka  . chechk if threre any transition in the daterange. 
if yes then exexute  -->

<?php if (!$doctor_er_sharer_taka->isEmpty())  { ?>
<h5 >     Doctor's Share if they see patient in Outdoor.   </h5>
  <hr>
  <table class="table">
  <thead>
    <tr>
    
      <th scope="col"> Doctor Name  </th>
      <th scope="col">Amount.   </th>
     
    </tr>
  </thead>
  <tbody>
    
	
	
	
	
	
	
	@foreach($doctor_er_sharer_taka as $doctorshare)
	<?php  
	$totaldoctorshare = $totaldoctorshare + $doctorshare->deya_share;
	
	?>
	
	<tr>
      <th >{{$doctorshare->doctor->name}}</th>
      <td>{{$doctorshare->deya_share}}</td>
      
    </tr>
@endforeach
  </tbody>
</table>
(+)
<hr>
<span >   So Total Amount paid to Doctors as their Share:   </span> <?php echo $totaldoctorshare  ?> TK

  

  
  <br>
 
  <br><br>
   <hr >


  <?php } ?>
  

























<!---------------------------------- dhar shod  transition. chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php if (!$dharshod->isEmpty())  { ?>
<h5 >     Expenditure fot paying previous Due:  </h5>
  <hr>
  <table class="table">
  <thead>
    <tr> 
    
      <th scope="col"> Suppliers Name </th>
      <th scope="col"> Due amount that Paid  </th> 
     
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($dharshod as $dhar)
	
	<?php 
	$totaldharshod = $totaldharshod+ $dhar->total_baki_shod ;
	?>
	<tr>
      <th >{{$dhar->supplier->name}}</th>
      <td>{{$dhar->total_baki_shod}}</td>
      
    </tr>
@endforeach
  </tbody>
</table>(+)
<hr>
<span > So Total amount of due paid:  </span> <?php echo $totaldharshod  ?> TK 

  <?php } ?> 

  
  <br>
 
  <br><br>
   <hr >
   
<!-- medicine companyr dhar shod babod khoroch   -->
 
 <br><br>
<?php if (!$medicinecompanydharshod->isEmpty())  { ?>
<h5 >    Due Payment to Medicine Companies: </h5>
  <hr>
  <table class="table">
  <thead>
    <tr> 
    
      <th scope="col"> Company Name:  </th>
      <th scope="col"> Amount:   </th> 
     
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($medicinecompanydharshod as $medicinecompayerrrin)
	
	<?php 
	$totalmedicineCompanyerdharshod = $totalmedicineCompanyerdharshod+ $medicinecompayerrrin->medicnecompanyrbakishod ;
	?>
	<tr>
      <th >{{$medicinecompayerrrin->medicinecomapnyname->name}}</th>
      <td>{{$medicinecompayerrrin->medicnecompanyrbakishod}}</td>
      
    </tr>
@endforeach
  </tbody>
</table>(+)
<hr>
<span >  Total Amount of Due paid to the Companies:  </span> <?php echo $totalmedicineCompanyerdharshod  ?> টাকা 

  <?php } ?> 
  
   
   
   







<!---------------------------------- pathology transition . chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php  $i=0;




	  if (!$cost_for_pathology_from_outside->isEmpty())  {  ?>
<h5 >  Expenditure For Pathology Test from Outside  </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Test Name </th>
	    <th scope="col"> Diagonistic Center Name </th>
	   <th scope="col"> Qun. </th>
	  	 <th scope="col"> Amount(TK) </th>
     

	
	 <th scope="col">  Discount(TK)    </th>
	  
 <th scope="col">  Payable Amount  =  ( Amount -  Discount) + VAT   </th>
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($cost_for_pathology_from_outside as $inc )
	
	<?php 
	$i++;
$net_income = (	$inc->amount + $inc->discount - $inc->vat);
$gross_amout_out = $gross_amout_out + $net_income;
$total_dis_out = $total_dis_out + $inc->discount;
$total_receiv_out = $total_receiv_out + $inc->amount;
	?>
	<tr>
<th> {{ $i }}
      <th >{{$inc->reportlist->name}}</th>
	      <th >{{$inc->supplier->name}}</th>
	     <th >{{$inc->total_unit}}</th>
	  
	  <td>{{ $net_income }}</td>
      
	    
	  <td>     <?php echo    number_format($inc->discount, 2,'.',',');     ?></td>
	  <td>  <?php echo    number_format($inc->amount, 2,'.',',');     ?> </td>
    </tr>
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	
@endforeach


    <tr> 
    <th>NA</th>
      <th scope="col"> Total </th>
	    <th scope="col"> NA </th>
	   <th scope="col"> NA </th>
	  	 <th scope="col"> {{$gross_amout_out}} </th>
     

	
	 <th scope="col">  {{$total_dis_out }}   </th>
	  
 <th scope="col">  {{$total_receiv_out}}   </th>
    </tr>












  </tbody>
</table>(+)


<hr>
Paid by Cash: {{$Pay_by_cash_to_other}} TK <br>

Tests are done from Other Diagonistic on due: {{$due_by_cash_to_other}} TK

   <hr >


  <?php } ?> 
  
  






















   
   
   
   
 
   
   
    <b  >  Refund Summary   </b>
  <br> 
   <span > Refund at Discharging: </span> <?php echo $money_back_customerrelease_time ?> TK <br>
  <span > Cabine Refund:   </span> <?php echo $cabine_refund ?> TK. <br>
    <span > Pathology Refund :   </span> <?php echo $pathology_refund ?> TK. <br>
   <span > Phermachy Refund:   </span> <?php echo $medicine_refund ?> TK <br>
   <span > Surgery Refund:   </span> <?php echo $surgery_refund ?> TK <br> 
    <span > Doctor's Fee Refund: </span> <?php echo $doctor_refund ?> TK  <br> 
 <span > Service Charge Refund:   </span> <?php echo $service_refund ?> TK  <br> 
 <span > Admission Fees Refund:   </span> <?php echo $admission_refund ?> TK  <br> 
 
 
 
  (+) <br >
  <hr style="width:50%">
<span > So Total amount Refund: </span> <?php echo $patientferot= $money_back_customerrelease_time+$cabine_refund+ $pathology_refund + $medicine_refund + $surgery_refund + $doctor_refund + $service_refund + $admission_refund ?> TK 
 <br> 
   

 
    <hr > 
   
   
   
  <b  >  Expenses Summary   </b>
  <br> 
   <span > Total Cost for Buying Medicine: </span> <?php echo $totalmedicinemotkroy ?> TK <br>
   <span > Total Cost for doing Pathological Tests from other Diagonistics : </span> <?php echo $total_receiv_out ?> TK <br>
  <span > Expenses in various field:   </span> <?php echo $totalkhoroch ?> TK. <br>
    <span > External Expenses :   </span> <?php echo $totalexcost ?> TK. <br>
   <span > Agent Commission:   </span> <?php echo $totalcommission ?> TK <br>
   <span > Salary Expenses:   </span> <?php echo $totalbeton ?> TK <br> 
    <span > Doctors Commission: </span> <?php echo $totaldoctorcommission ?> TK  <br> 
    <span>Total Reagent purchases:</span>  {{ $reagent_total_purchase->total_price_amount }} TK <br>
 
 <span > Doctor's Share/surgical Fees:   </span> <?php echo $totaldoctorshare ?> TK  <br> 
  (+) <br >
  <hr style="width:50%">
<span > So Total amount of Expenses for Buying Products/Services </span> <?php echo $khoroch= $totalcommission+$totalexcost+ $totalmedicinemotkroy + $totaldoctorshare + $total_receiv_out +$totalbeton + $totalkhoroch + $totaldoctorcommission + $reagent_total_purchase->total_price_amount ?> TK 
 <br>
 <br>
 <h6 >  <b> Products/ Services that purchased on Credit:</b> </h6>
<span >Products/ Services that purchased in due:  </span> <?php echo $totalbaki ?> TK <br>
<span > Medicines that purchased in due: </span> <?php echo $totalmedcinebakikroy ?> TK <br>
<span > Pathological Test done from other Diagonistics on  due: </span> <?php echo $due_by_cash_to_other ?> TK <br>
<span>Total Reagents purchases on Credit:</span> {{ $reagent_total_purchase->total_due }} TK <br> 

(+)
 <br>
 <hr > 
 <span >So Toal amout of Products/ Services that purchased on Credit:  </span> <?php echo  $motbaki = (    $totalmedcinebakikroy +  $totalbaki + $due_by_cash_to_other +  $reagent_total_purchase->total_due  ) ?> TK
 <hr>
 
 <span > So Toal amout of Products/ Services that purchased in cash: ( Total Puschases- Purshcases in Due)= ( {{ $khoroch }} - {{ $motbaki }} ) =    </span> <?php echo $nogodkroy = ($khoroch -  $motbaki) ?> TK 
 <br>

 <span >    Expenses to pay the previous Due to supplier:  </span> <?php echo $totaldharshod  ?> TK <br>
 <span > Expenses to pay the previous Due of Medicine Companies:  </span> <?php echo $totalmedicineCompanyerdharshod  ?> TK <br>
  <span > Expenses for Refunding to patients: </span> <?php echo $patientferot  ?> TK <br>



 <br>(+) 
 <hr  style="width:50%">
<span > <b>So Total Expenses in Cash: </b>   </span> <?php echo $totalkhorochafteradjustingdue = ($nogodkroy+$patientferot + $totalmedicineCompanyerdharshod+$totaldharshod) ?> TK 
  
<hr style="width:50%">

<span  >Note: The Amount of Product/Services you bought in due is  {{ $motbaki}} TK. This Amount has been substracted from your total Expenses. This Amount will be added when you will pay this due.            

	 </span>

<br>
<span > The Amount of Advance you paid to the Suppliers for products/Services:    <?php echo $totaladvance ?> TK  </span>
  <br>
 
  
  
  
  
  
    </div>


</div>
      
	
	
	<div style="width:50%; float:left;">
	
	
	
	
<div  style=" margin-left:5px;" class="col-sm">
<h2 >      Sales </h2>
<hr>


<!---------------------------------- pathology transition . chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php  $i=0;	  if (!$income_from_pathology_test->isEmpty())  {  ?>
<h5 >  Income from Pathology  </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Test Name </th>
	   <th scope="col"> Qun. </th>
	  	 <th scope="col"> Amount(TK) </th>
     
     <th scope="col"> VAT(TK)  </th> 
	
	 <th scope="col">  Discount(TK)    </th>
	  
 <th scope="col">  Receiveable Amount  =  ( Amount -  Discount) + VAT   </th>
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($income_from_pathology_test as $inc )
	
	<?php 
	$i++;
$totalincome_from_pathology= $totalincome_from_pathology+ $inc->amount ;
$total_discoubt_in_patho= $total_discoubt_in_patho + $inc->discount ;
$total_vat_in_patho= $total_vat_in_patho + $inc->vat ;
$net_income = (	$inc->amount + $inc->discount - $inc->vat);
$net_income_from_pth = $net_income_from_pth + $net_income ;

	
	?>
	<tr>
<th> {{ $i }}
      <th >{{$inc->reportlist->name}}</th>
	     <th >{{$inc->total_unit}}</th>
	  
	  <td>{{ $net_income }}</td>
      
	  <td>{{$inc->vat}}</td>
      <td>     <?php echo    number_format($inc->discount, 2,'.',',');     ?></td>
	  <td>  <?php echo    number_format($inc->amount, 2,'.',',');     ?> </td>
    </tr>
@endforeach

  </tbody>
</table>(+)


<hr>
<span >   Total Sale in Pathology Section:          </span> <?php echo number_format($net_income_from_pth,2,'.',',');  ?> TK <br>
<span >Total Vat:    </span> <?php echo number_format($total_vat_in_patho,2,'.',',')  ?> TK<br>
<span > Total Discount:      </span> <?php echo number_format($total_discoubt_in_patho,2,'.',',');  ?> TK <br> <br><hr style="height:2px; width:100%; border-width:0; " > 
<b><span > So Receiveable Amount: (Total Sale+VAT-Discount) :  </span> </b>
<?php echo number_format($net_income_from_pth,2,'.',',');           

echo "+";  echo number_format($total_vat_in_patho,2,'.',','); 
echo "-"; echo number_format($total_discoubt_in_patho,2,'.',',');

?> =     <?php echo number_format($totalincome_from_pathology,2,'.',',');  ?> TK <br>
    <span > (-)  Sale on Due:  </span>  {{$total_due_patho}} TK <br>
  
    (-) <span >  Paid by Advance Cash :  </span>  {{$total_adjust_patho}} TK <br>
  <hr>
   <b> <span >  So Total income in Cash from Pathology:     </span> <?php $mot_nogod_income_from_pathology =  $totalincome_from_pathology - $total_due_patho - $total_adjust_patho ?> <?php echo number_format($mot_nogod_income_from_pathology,2,'.',',');  ?>TK <br></b>
  <br> 
  

   <hr >


  <?php } ?> 
  
  
  
  <!-- ----------------------------- Service Transition ----------------------------------------->
  
  

 
 <br><br>
<?php  $i=0;	  if (!$incomefromservice->isEmpty())  {  ?>
<h5 >  Income from Different Service Cost  </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Service Name </th>
	   <th scope="col"> Qun. </th>
	  	 <th scope="col"> Amount(TK) </th>

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($incomefromservice as $inc )
	
	<?php 
	$i++;


	
	?>
	<tr>
<th> {{ $i }}
      <th >{{$inc->servicelistinhospital->servicename}}</th>
	     <th >{{$inc->unit}}</th>
	  
	  <td>{{$inc->charge}}</td>



    </tr>
@endforeach

  </tbody>
</table>(+)


<hr>
Total Due in Service Charge: {{$bakiincomefromservice}} TK <br>
Total Sale in Cash : {{$nogodincomefromservice}} TK<br>
Total Sale by Advanced Deposit: {{$adjustment_service}} TK<br>



   <hr >


  <?php } ?> 
  
  
  
  
  
  <!---------------------------------- Cabine transition . chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php $sumadmissionfee=0;  $i=0; if (!$admissionfee->isEmpty())  { ?>
<h5 >  Admission Fees   </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Cab NO:  </th>
	  <th scope="col">   Gr. Amnt </th>
 <th scope="col">   Discount </th>
 <th scope="col">   Receiv. Amnt </th>
<th scope="col">   Paid </th>
<th scope="col">   Due </th>
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($admissionfee as $adm  )
	
	<?php 
	$i++;
$sum_grossamnt_amission_fee  = $sum_grossamnt_amission_fee + $adm->gross_amount_admisson_fee;

$discount_grossamnt_amission_fee  = $discount_grossamnt_amission_fee + $adm->discount;	

$paid_admission_fee =  $paid_admission_fee + $adm->paid;	

$due_admission_fee = $due_admission_fee + $adm->due;	



	?>
	<tr>
	<th>{{ $i }}
      <th >{{$adm->cabinelist->serial_no}}</th>
	  <th >{{$adm->gross_amount_admisson_fee}}</th>
	  <th >{{$adm->discount}}</th>
	  
	  <?php $receiveable_amnt = $adm->gross_amount_admisson_fee - $adm->discount;  ?>
	  <th ><?php echo number_format( $receiveable_amnt, 2,'.',',' ) ;  ?></th>
	<th >{{$adm->paid}}</th>
		<th >{{$adm->due}}</th>
    </tr> 
@endforeach
<tr>
    <th>NA</th>
      <th scope="col"> NA  </th>
	  <th scope="col">  {{$sum_grossamnt_amission_fee}} </th>
 <th scope="col">  {{$discount_grossamnt_amission_fee}} </th>
 
 <?php $otal_recivable_admission_fee = $sum_grossamnt_amission_fee - $discount_grossamnt_amission_fee;  ?>
 
<th scope="col"> {{$otal_recivable_admission_fee}} </th>
<th scope="col">   {{$paid_admission_fee}} </th>
<th scope="col">   {{$due_admission_fee}} </th>

</tr>





  </tbody>
</table>

 
<hr>



   <hr >


  <?php } ?> 


  
  
  
  
  
  
  
   <!---------------------------------- Cabine transition . chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php $sumcabinefee=0;  $i=0; if (!$cabinefeetransition->isEmpty())  { ?>
<h5 >  Cabine Fees   </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Cabine NO:  </th>
	   <th scope="col"> Patient:  </th>
	  <th scope="col">   Paid by Cash  </th>
 <th scope="col">  Adjusted with Advance   </th>
 <th scope="col">  Discount   </th>
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($cabinefeetransition as $cabinef  )
	
	<?php 
	$i++;
$sumcabinefee = $sumcabinefee + $cabinef->totalcabinefeepaid;
$cabinefeebyadvanceadjustment = $cabinefeebyadvanceadjustment + $cabinef->adjust_with_advance;
	
	?>
	<tr>
	<th>{{ $i }}
      <th >{{$cabinef->cabinelist->serial_no}}</th>
	  <th >{{$cabinef->patient->name}}</th>
	  <th >{{$cabinef->totalcabinefeepaid}}</th>
 <th >{{$cabinef->adjust_with_advance	}}</th>
<th >{{$cabinef->discount	}}</th> 
 
 
    </tr> 
@endforeach

  </tbody>
</table>(+)

 
<hr>
<span > Toal Cabine Fees paid by cash: </span> <?php echo number_format( $sumcabinefee, 2,'.',',' ) ;  ?> TK <br>
<span > Toal Cabine paid by Advanced Deposit: </span> <?php echo number_format( $cabinefeebyadvanceadjustment, 2,'.',',' ) ;  ?> TK <br>


   <hr >


  <?php } ?> 
 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  



<!---------------------------------- Medicine transition . chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
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

 
<hr>
<span > Gross Amount of Medicine Sold: </span> <?php echo number_format($net_income_from_medicine_from_all_itteration_of_loop, 2, '.', ',') ;  ?> TK <br>

<span > Total Discount:     </span> <?php echo number_format($total_discount_in_medicine,2,'.',',')  ?> TK <br> <br><hr style="height:2px; width:100%; border-width:0; " > 
<b><span >(Gross Amount - Discount):  </span> </b>  <?php echo number_format($net_income_from_medicine_from_all_itteration_of_loop,2,'.',',');?> <?php echo  "-" ; ?>   <?php echo number_format($total_discount_in_medicine,2,'.',','); ?>  =     <?php echo number_format($totalincome_from_medicine,2,'.',',');  ?> TK <br>
    <span >  Medicine Sold in Due:  </span> <?php echo number_format($total_due_medicine,2,'.',',') ?>   TK <br>
	
    <span >  Medicine Sold by Advance :  </span> <?php echo number_format($medicine_adv,2,'.',',') ?>   TK <br>	
	
	
  (-) 
  <hr>
   <b> <span >  So Medicine Sold in cash after Discount:    </span> <?php $mot_nogod_sell_from_medicine =  $totalincome_from_medicine - $total_due_medicine - $medicine_adv ?> <?php echo number_format($mot_nogod_sell_from_medicine,2,'.',',');?>  TK <br></b>
  <br> 
  

   <hr >


  <?php } ?> 




























<!---------------------------------- Surgery transition . chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php if (!$surgerytransaction->isEmpty())  { ?>
<h5 >Amount of services sold in Surgery sectots:  </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    
      
	  <th scope="col">Name   </th>
	  <th scope="col"> Qun.  </th>

	  <th scope="col">  Gross Service Charge  </th>
     

	 <th scope="col">Discount    </th>
	  
 <th scope="col"> Receiveable Amnt = ( Gross Amnt. - Discount)    </th>
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($surgerytransaction as $sur  )
	
	<?php 
	
$totalsell_from_surgery_by_substracting_discount= $totalsell_from_surgery_by_substracting_discount+ $sur->amount ;
$total_discount_in_surgery= $total_discount_in_surgery + $sur->discount ;

//$total_vat_in_medicine= $total_vat_in_medicine + $med->vat ;

$net_sell_in_surgery_in_every_single_iiteration = (	$sur->amount + $sur->discount );
$net_sell_from_surgery_from_all_itteration_of_loop = $net_sell_from_surgery_from_all_itteration_of_loop + $net_sell_in_surgery_in_every_single_iiteration ;
	
	
	?>
	<tr>
	  
      <th >{{$sur->surgerylist->name}}</th>
	  <th >{{$sur->total}}</th>
	  <td>{{ $net_sell_in_surgery_in_every_single_iiteration }}</td>
      
	
      <td>{{$sur->discount}}</td>
	  <td>{{$sur->amount}}</td>
    </tr> 
@endforeach

  </tbody>
</table>(+)

 
<hr>
<span >         Total Gross Amount: </span> <?php echo $net_sell_from_surgery_from_all_itteration_of_loop  ?> TK<br>

<span > Total Discount:     </span> <?php echo $total_discount_in_surgery  ?> Tk <br> <br><hr style="height:2px; width:100%; border-width:0; " > 
<b><span >(Gross Amnt - Discount) :  </span> </b> {{$net_sell_from_surgery_from_all_itteration_of_loop}} - {{$total_discount_in_surgery}} =     <?php echo $totalsell_from_surgery_by_substracting_discount  ?> TK<br>
    <span > (-)  Service that sold in Due:   </span>  {{$total_due_surgery}} TK<br>
     <span > (-) Service paid by Advanced Adjust:   </span>  {{$total_adjust_surgery}} TK<br>
 
  <hr>
   <b> <span > So After Discount amount that sold in Cash:  </span> <?php $mot_nogod_sell_from_surgery =  $totalsell_from_surgery_by_substracting_discount - $total_due_surgery - $total_adjust_surgery ?>  {{ $mot_nogod_sell_from_surgery }}   TK <br></b>
  <br> 
  

   <hr >


  <?php } ?> 
  


<!----------------------------------------------------------------------------------------------->


 <br><br>
<?php if (!$doctortransition->isEmpty())  { ?>
<h5 >Income From Outdoor Doctor/ Doctor Visit :  </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    
      
	  <th scope="col"> Doctor Name   </th>
	  <th scope="col"> Qun.  </th>

	  <th scope="col">  Gross Amount  </th>
     

	 <th scope="col">Pay in Cash    </th>
	  
 <th scope="col"> Pay by Advance Payment   </th>
 
  <th scope="col"> Due   </th>
 
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($doctortransition as $d  )
	
	<?php 
	
$total_gross_amount_dcotor= $total_gross_amount_dcotor + $d->gross_amount;
$total_paid_by_cash_doctor = $total_paid_by_cash_doctor + $d->Paid_by_cash;
$total_paid_by_advance = $total_paid_by_advance + $d->Paid_by_advance_cash;
$total_due_doctor  = $total_due_doctor + $d->due;
	
	?>
	<tr>
	  
      <th >{{$d->doctor->name}}</th>
	  <th >{{$d->total}}</th>
	  <td>{{ $d->gross_amount }}</td>
      
	
      <td>{{$d->Paid_by_cash}}</td>
	  <td>{{$d->Paid_by_advance_cash}}</td>
	  	  <td>{{$d->due}}</td>
    </tr> 
@endforeach

  </tbody>
</table>(+)

  Gross Amount  = {{$total_gross_amount_dcotor}} TK <br>
   Paid by Cash = {{$total_paid_by_cash_doctor}} TK <br>
    Paid by Advance  = {{$total_paid_by_advance}} TK <br>
     Due:  = {{$total_due_doctor}} TK <br>
<hr>

  

   <hr >


  <?php } ?>







<!---------------------------------------------- income from treatment service        ------------------------------------------------->


 <br><br>
<?php if (!$dentalserviceodermoney_deposit->isEmpty())  { ?>
<h5 >Income From Outdoor Doctor/ Doctor Service :  </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    
      
	  <th scope="col"> Doctor Name   </th>
	  <th scope="col"> Qun.  </th>

	  <th scope="col">  Gross Amount  </th>
     


 
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($dentalserviceodermoney_deposit as $d  )
	
	<?php 
	
$long_term_service_income = $long_term_service_income + $d->gross_amount;
	
	?>
	<tr>
	  
      <th >{{$d->doctor->name}}</th>
	  <th >{{$d->total}}</th>
	  <td>{{ $d->gross_amount }}</td>
      

    </tr> 
@endforeach

  </tbody>
</table>(+)


<hr>
Total Collecton: {{ $long_term_service_income }}TK
  

   <hr >


  <?php } ?>




















<!---------------------------------- Advance Deposit . chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php   $i=0; if (!$advance_money_deposit->isEmpty())  { ?>
<h5 >  Deposit by Customer  </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    <th>No.</th>
      <th scope="col"> Name:  </th>

	  	 <th scope="col">  Amount(TK)  </th>
     


	  

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($advance_money_deposit as $ad  )
	
	<?php 
	$i++;
$advance_amount = $advance_amount + $ad->amount;
	
	?>
	<tr>
	<th>{{ $i }}
      <th >{{$ad->patient->name}}</th>
	 
	  <td>       <?php echo  number_format($ad->amount, 2, '.', ',');?> </td>
      

    </tr> 
@endforeach

  </tbody>
</table>(+)

 
<hr>
<span > Total Deposit: </span> <?php echo number_format($advance_amount, 2, '.', ',') ;  ?> TK <br>



 <br> 
  

   <hr >


  <?php } ?> 












<!---------------------------------- Cabine transition . chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
 
 
 
 
 
<!---------------------------------- medicinekroy transition. chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php if (!$medicineCompanyTransition_nogod_taka_ferot->isEmpty())  { ?>
<h5 style="color:red">    Income from Money back by Medicine company  </h5>
  <hr>
  <table class="table">
  <thead>
    <tr> 
    
      <th scope="col"> Company Name  </th>
   

	  <th scope="col"> Cash Back </th>
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($medicineCompanyTransition_nogod_taka_ferot as $medtran)
	
	<?php 
	
   
$totalmedicine_cash_back_com = $totalmedicine_cash_back_com+ $medtran->pay_in_cash ;
	//$totalcommission = $totalcommission+ $agentcom->total_given_paidamount_of_a_agents ;
	?>
	<tr>
      <th >{{$medtran->medicinecomapnyname->name}}</th>
	  

	  <td>{{$medtran->pay_in_cash}}</td>
    </tr>
@endforeach
  </tbody>
</table>(+)


<hr>

<span > Total  Cash Back:  </span> <?php echo $totalmedicine_cash_back_com  ?> Taka <br>

  

  
  <br>
 
  <br><br>
   <hr >


  <?php } ?> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

<!---------------------------------- due paid transition . chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php if (!$income_from_due_payment_medicine->isEmpty())  { ?>
<h5 >   Due Collection for Phermachy section:  </h5>
  <hr>
  

  <table class="table table-responsive">
  <thead>
    <tr> 
    
      <th scope="col"> Patinet Name:</th>
	  <th scope="col"> Due Payment</th>
	  	 <th scope="col"> Amount  </th>
     	  	 <th scope="col"> Discount on Arrerar </th>

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($income_from_due_payment_medicine as $due_paid )
	
	<?php 
	
$total_due_paid_medicine = $total_due_paid_medicine+ $due_paid->amount_of_due_paid  ;

	
	
	?>
	<tr>
      <th >{{$due_paid->patient->name}}</th>
	   <th >{{$due_paid->totalamount}}</th>
	  
	  <td>{{ $due_paid->amount_of_due_paid }}</td>
      <td>{{ $due_paid->duediscount }}</td>
	
    </tr>
@endforeach

  </tbody>
</table>(+) 


<hr>
<b><span > So Total Amount of Arrerar Collection of Medicine   </span> <?php echo $total_due_paid_medicine  ?> TK<br></b>




 <br><br>
   <hr >


  <?php } ?> 
  







<?php if (!$income_from_due_payment_pathology->isEmpty())  { ?>
<h5 >   Due Collection for Pathology:  </h5>
  <hr>
  

  <table class="table table-responsive">
  <thead>
    <tr> 
    
      <th scope="col"> Patinet Name:</th>
	  <th scope="col"> Due Payment</th>
	  	 <th scope="col"> Amount  </th>
     	  	 <th scope="col"> Discount on Arrerar </th>

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($income_from_due_payment_pathology as $due_paid )
	
	<?php 
	
$total_due_paid_pathology = $total_due_paid_pathology+ $due_paid->amount_of_due_paid  ;

	
	
	?>
	<tr>
      <th >{{$due_paid->patient->name}}</th>
	   <th >{{$due_paid->totalamount}}</th>
	  
	  <td>{{ $due_paid->amount_of_due_paid }}</td>
      <td>{{ $due_paid->duediscount }}</td>
	
    </tr>
@endforeach

  </tbody>
</table>(+) 


<hr>
<b><span > So Total Amount of Arrerar Collection From Pathology:   </span> <?php echo $total_due_paid_pathology  ?> TK<br></b>




 <br><br>
   <hr >


  <?php } ?> 






 
 
   

 
 
 
 
 <?php if (!$income_from_due_payment_surgery->isEmpty())  { ?>
<h5 >   Due Collection for Syrgery/OT:  </h5>
  <hr>
  

  <table class="table table-responsive">
  <thead>
    <tr> 
    
      <th scope="col"> Patinet Name:</th>
	  <th scope="col"> Due Payment</th>
	  	 <th scope="col"> Amount  </th>
     	  	 <th scope="col"> Discount on Arrerar </th>

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($income_from_due_payment_surgery as $due_paid )
	
	<?php 
	
$total_due_paid_surgery = $total_due_paid_surgery+ $due_paid->amount_of_due_paid  ;

	
	
	?>
	<tr>
      <th >{{$due_paid->patient->name}}</th>
	   <th >{{$due_paid->totalamount}}</th>
	  
	  <td>{{ $due_paid->amount_of_due_paid }}</td>
      <td>{{ $due_paid->duediscount }}</td>
	
    </tr>
@endforeach

  </tbody>
</table>(+) 


<hr>
<b><span > So Total Amount of Arrerar Collection From Cabine:   </span> <?php echo $total_due_paid_surgery  ?> TK<br></b>




 <br><br>
   <hr >


  <?php } ?> 
 
 
 



  <?php if (!$reagenta_transaction_reagent_back->isEmpty())  { ?>
    <h5 >   Money back from Suppliers for Reagents:  </h5>
      <hr>
      
    
      <table class="table table-responsive">
      <thead>
        <tr> 
        
          <th scope="col">  Name:</th>
        <th scope="col"> Amount(TK)</th>

    
        </tr>
      </thead>
      <tbody>
        
      
      <?php $total_reagent_back = 0;?>
      
      @foreach($reagenta_transaction_reagent_back as $r )
      
      <?php 
      
    $total_reagent_back = $total_reagent_back + $r->total_paid  ;
    
      
      
      ?>
      <tr>
          <th >{{$r->name}}</th>
         <th >{{$r->total_paid}}</th>

      
        </tr>
    @endforeach
    
      </tbody>
    </table>(+) 
    
    
    <hr>
    <b><span > So Total Amount money return from the Supplier for Reagents :   </span> <?php echo $total_reagent_back  ?> TK<br></b>
    
    
    
    
     <br><br>
       <hr >
    
    
      <?php } ?> 
     
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  <?php if (!$income_from_due_payment_doctor->isEmpty())  { ?>
<h5 >   Due Collection for Doctor:  </h5>
  <hr>
  

  <table class="table table-responsive">
  <thead>
    <tr> 
    
      <th scope="col"> Patinet Name:</th>
	  <th scope="col"> Due Payment</th>
	  	 <th scope="col"> Amount  </th>
     	  	 <th scope="col"> Discount on Arrerar </th>

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($income_from_due_payment_doctor as $due_paid )
	
	<?php 
	
$total_due_paid_dcotor = $total_due_paid_dcotor+ $due_paid->amount_of_due_paid  ;

	
	
	?>
	<tr>
      <th >{{$due_paid->patient->name}}</th>
	   <th >{{$due_paid->totalamount}}</th>
	  
	  <td>{{ $due_paid->amount_of_due_paid }}</td>
      <td>{{ $due_paid->duediscount }}</td>
	
    </tr>
@endforeach

  </tbody>
</table>(+) 


<hr>
<b><span > So Total Amount of Arrerar Collection From Doctor Visit/Outdoor :   </span> <?php echo $total_due_paid_dcotor  ?> TK<br></b>




 <br><br>
   <hr >


  <?php } ?> 
 
 
 
 
 
 
 
   <?php if (!$income_from_due_payment_service->isEmpty())  { ?>
<h5 >   Due Collection for Service Charge:  </h5>
  <hr>
  

  <table class="table table-responsive">
  <thead>
    <tr> 
    
      <th scope="col"> Patinet Name:</th>
	  <th scope="col"> Due Payment</th>
	  	 <th scope="col"> Amount  </th>
     	  	 <th scope="col"> Discount on Arrerar </th>

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($income_from_due_payment_service as $due_paid )
	
	<?php 
	
$total_due_paid_service = $total_due_paid_service+ $due_paid->amount_of_due_paid  ;

	
	
	?>
	<tr>
      <th >{{$due_paid->patient->name}}</th>
	   <th >{{$due_paid->totalamount}}</th>
	  
	  <td>{{ $due_paid->amount_of_due_paid }}</td>
      <td>{{ $due_paid->duediscount }}</td>
	
    </tr>
@endforeach

  </tbody>
</table>(+) 


<hr>
<b><span > So Total Amount of Arrerar Collection From Service Charge :   </span> <?php echo $total_due_paid_service  ?> TK<br></b>




 <br><br>
   <hr >


  <?php } ?> 
  
  
  
  
     <?php if (!$income_from_due_payment_admissionfee->isEmpty())  { ?>
<h5 >   Due Collection for Admission Fees:  </h5>
  <hr>
  

  <table class="table table-responsive">
  <thead>
    <tr> 
    
      <th scope="col"> Patinet Name:</th>
	  <th scope="col"> Due Payment</th>
	  	 <th scope="col"> Amount  </th>
     	  	 <th scope="col"> Discount on Arrerar </th>

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($income_from_due_payment_admissionfee as $due_paid )
	
	<?php 
	
$total_due_paid_admission_fee = $total_due_paid_admission_fee+ $due_paid->amount_of_due_paid  ;

	
	
	?>
	<tr>
      <th >{{$due_paid->patient->name}}</th>
	   <th >{{$due_paid->totalamount}}</th>
	  
	  <td>{{ $due_paid->amount_of_due_paid }}</td>
      <td>{{ $due_paid->duediscount }}</td>
	
    </tr>
@endforeach

  </tbody>
</table>(+) 


<hr>
<b><span > So Total Amount of Arrerar Collection From Service Charge :   </span> <?php echo $total_due_paid_admission_fee  ?> TK<br></b>




 <br><br>
   <hr >


  <?php } ?> 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
 
 <?php 
 $total_due_paid= 
 $total_due_paid_medicine +
$total_due_paid_cabine + 
$total_due_paid_pathology +
$total_due_paid_surgery+
$total_due_paid_dcotor +
$total_due_paid_admission_fee+
$total_due_paid_service;
 ?>

  <span > <u> Sale Summary </u> </b>
  <br>
  <br>
<b  >  Sale in Cash </b> <br><br> 


  
   <span > Advanced Deposit:      </span> <?php echo number_format($advance_amount,2,'.',',') ?> TK <br>
    <span > Admission Fees:      </span> <?php echo number_format($paid_admission_fee,2,'.',',') ?> TK <br>
      <span > Cabine Fees:      </span> <?php echo number_format($sumcabinefee,2,'.',',') ?> TK <br>
  
  
  <span > Medicine:      </span> <?php echo number_format($mot_nogod_sell_from_medicine,2,'.',',') ?> TK <br>
 
  <span >Cash back from Medicine Company :      </span> <?php echo number_format($totalmedicine_cash_back_com,2,'.',',') ?> TK <br>

  <span >Cash back from Suppliers for Reagents  :      </span> <?php echo number_format($total_reagent_back,2,'.',',') ?> TK <br>
 
  <span > Collection from Long-term treatment's installment Fees:      </span> <?php echo number_format($long_term_service_income,2,'.',',') ?> TK <br> 
  
  <span >  Surgery:    </span> <?php echo $mot_nogod_sell_from_surgery ?> TK<br>
  <span >  Pathology:   </span> <?php echo number_format($mot_nogod_income_from_pathology,2,'.',','); ?> TK <br>
  <span > Arrerar Collection:   </span> <?php echo $total_due_paid ?> TK <br>
   <span > From Outdoor Doctors:   </span> <?php echo $income_from_doctor ?> TK <br>
      <span > From Service Charge:   </span> <?php echo $nogodincomefromservice ?> TK <br>
 
(+) <hr >
  <span > SO Total Sales in Cash:  </span> <?php $final_income= $long_term_service_income + $total_reagent_back +  $income_from_doctor+ $sumcabinefee + $advance_amount + $paid_admission_fee + $nogodincomefromservice + $mot_nogod_sell_from_surgery + $mot_nogod_sell_from_medicine  +$mot_nogod_income_from_pathology+ $total_due_paid + $totalmedicine_cash_back_com ?> <?php echo round($final_income,2); ?>   TK <br>

  <br>
<b  > Sales on Due: </b> <br><br> 
 <span >  Admission Fees:     </span> {{$due_admission_fee}} TK<br><br>
  <span >  Pathology Section:     </span> {{$total_due_patho}} TK<br><br>
  <span >  Medicine Sales:        </span> {{$total_due_medicine}} TK <br><br>
  <span >   Surgery: </span> {{$total_due_surgery}} TK <br><br>
   <span > Outdoor Doctor:    </span> {{$doctorcalldue}} TK <br><br>
      <span > Service Charge:    </span> {{$bakiincomefromservice}} TK <br><br>
   <?php $motbakibikri = $total_due_patho + $due_admission_fee + $bakiincomefromservice + $total_due_medicine + $total_due_surgery + $doctorcalldue  ?>
 <span > Note:The Total amount you have sold on due is: {{ $motbakibikri}} TK. </span><br>
 









    </div>	
	
	
	
  










  </div>


  </div>
  <br>
  
  
  
  So Totaol Expenses in Cash :   <?php echo round($totalkhorochafteradjustingdue,2)  ?>  TK <br>
  So Total Sale in Cash: <?php echo round($final_income,2)  ?>  TK<br>
  So Net Profit in Cash: <?php echo round(($final_income- $totalkhorochafteradjustingdue),2)  ?> TK
  
  
  
  
  
  
   <br>
   <br>
   <br>
    <br>
	


</div>


<p style="page-break-after:always" ></p>

<div id="summary">

<b >  This Month's Sales-Expenses Summary: 
	   
 
	  <?php    $dateObj   = DateTime::createFromFormat('!m', $m);
$mon = $dateObj->format('F');   
echo $mon;
 
        ?> , {{$y}} 
</b>
<div  style="width:50%; float:left;">
<hr>
  <span > <b> Sale Summary </b>
  <br>
  <br>
<b  >  Sale in Cash </b> <br><br> 


  
   <span > Advanced Deposit:      </span> <?php echo number_format($advance_amount,2,'.',',') ?> TK <br>
    <span > Admission Fees:      </span> <?php echo number_format($paid_admission_fee,2,'.',',') ?> TK <br>
      <span > Cabine Fees:      </span> <?php echo number_format($sumcabinefee,2,'.',',') ?> TK <br>
  
  
  <span > Medicine:      </span> <?php echo number_format($mot_nogod_sell_from_medicine,2,'.',',') ?> TK <br>
   <span >Cash back from Medicine Company :      </span> <?php echo number_format($totalmedicine_cash_back_com,2,'.',',') ?> TK <br>
   <span >Cash back from Suppliers for Reagents  :      </span> <?php echo number_format($total_reagent_back,2,'.',',') ?> TK <br>
 
  
  <span > Collection from Long-term treatment's installment Fees:      </span> <?php echo number_format($long_term_service_income,2,'.',',') ?> TK <br> 
  
  <span >  Surgery:    </span> <?php echo $mot_nogod_sell_from_surgery ?> TK<br>
  <span >  Pathology:   </span> <?php echo number_format($mot_nogod_income_from_pathology,2,'.',','); ?> TK <br>
  <span > Arrerar Collection:   </span> <?php echo $total_due_paid ?> TK <br>
   <span > From Outdoor Doctors:   </span> <?php echo $income_from_doctor ?> TK <br>
      <span > From Service Charge:   </span> <?php echo $nogodincomefromservice ?> TK <br>
 
(+) <hr >
  <span > SO Total Sales in Cash:  </span> <?php $final_income= $long_term_service_income + $total_reagent_back +  $income_from_doctor+ $sumcabinefee + $advance_amount + $paid_admission_fee + $nogodincomefromservice + $mot_nogod_sell_from_surgery + $mot_nogod_sell_from_medicine  +$mot_nogod_income_from_pathology+ $total_due_paid + $totalmedicine_cash_back_com ?> <?php echo round($final_income,2); ?>   TK <br>

  <br>
<b  > Sales on Due: </b> <br><br> 
 <span >  Admission Fees:     </span> {{$due_admission_fee}} TK<br><br>
  <span >  Pathology Section:     </span> {{$total_due_patho}} TK<br><br>
  <span >  Medicine Sales:        </span> {{$total_due_medicine}} TK <br><br>
  <span >   Surgery: </span> {{$total_due_surgery}} TK <br><br>
   <span > Outdoor Doctor:    </span> {{$doctorcalldue}} TK <br><br>
      <span > Service Charge:    </span> {{$bakiincomefromservice}} TK <br><br>
   <?php $motbakibikri = $total_due_patho + $due_admission_fee + $bakiincomefromservice + $total_due_medicine + $total_due_surgery + $doctorcalldue  ?>
 <span > Note:The Total amount you have sold on due is: {{ $motbakibikri}} TK. </span><br>


</div>

<div style="width:50%; float:right">
<br>
 <b  >  Expenses Summary   </b>
 
 
<p>

    <b  >  Refund Summary   </b>
  <br> 
   <span > Refund at Discharging: </span> <?php echo $money_back_customerrelease_time ?> TK <br>
  <span > Cabine Refund:   </span> <?php echo $cabine_refund ?> TK. <br>
    <span > Pathology Refund :   </span> <?php echo $pathology_refund ?> TK. <br>
   <span > Phermachy Refund:   </span> <?php echo $medicine_refund ?> TK <br>
   <span > Surgery Refund:   </span> <?php echo $surgery_refund ?> TK <br> 
    <span > Doctor's Fee Refund: </span> <?php echo $doctor_refund ?> TK  <br> 
 <span > Service Charge Refund:   </span> <?php echo $service_refund ?> TK  <br> 
 <span > Admission Fees Refund:   </span> <?php echo $admission_refund ?> TK  <br> 
 
 
 
  (+) <br >
  <hr style="width:50%">
<span > So Total amount Refund: </span> <?php echo $patientferot= $money_back_customerrelease_time+$cabine_refund+ $pathology_refund + $medicine_refund + $surgery_refund + $doctor_refund + $service_refund + $admission_refund ?> TK 
 <br> 
   
   
   
   
   
 
  <br> 
  <span>Total Cost for Buying Reagents:</span> {{ $reagent_total_purchase->total_price_amount }} TK <br> 
   <span > Total Cost for Buying Medicine: </span> <?php echo $totalmedicinemotkroy ?> TK <br>
   <span > Total Cost for doing Pathological Tests from other Diagonistics : </span> <?php echo $total_receiv_out ?> TK <br>
  <span > Expenses in various field:   </span> <?php echo $totalkhoroch ?> TK. <br>
    <span > External Expenses :   </span> <?php echo $totalexcost ?> TK. <br>
   <span > Agent Commission:   </span> <?php echo $totalcommission ?> TK <br>
   <span > Salary Expenses:   </span> <?php echo $totalbeton ?> TK <br> 
    <span > Doctors Commission: </span> <?php echo $totaldoctorcommission ?> TK  <br> 
 <span > Doctor's Share/surgical Fees:   </span> <?php echo $totaldoctorshare ?> TK  <br> 
  (+) <br >
  <hr style="width:50%">
<span > So Total amount of Expenses for Buying Products/Services </span> <?php echo $khoroch= $totalcommission+$totalexcost+$reagent_total_purchase->total_price_amount + $totalmedicinemotkroy + $totaldoctorshare + $total_receiv_out +$totalbeton + $totalkhoroch + $totaldoctorcommission ?> TK 
 <br>
 <br>
 <h6 >  <b> Products/ Services that purchased On Credit:</b> </h6>
<span >Products/ Services that purchased on credit:  </span> <?php echo $totalbaki ?> TK <br>
<span > Medicines that purchased on credit: </span> <?php echo $totalmedcinebakikroy ?> TK <br>
<span > Pathological Test done from other Diagonistics on credit: </span> <?php echo $due_by_cash_to_other ?> TK <br>
<span >Reagents purchased On Credit: </span> <?php echo $reagent_total_purchase->total_due ?> TK <br>


(+)
 <br>
 <hr > 
 <span >So Toal amout of Products/ Services that purchased on credit:  </span> <?php echo  $motbaki = (    $totalmedcinebakikroy + $reagent_total_purchase->total_due+  $totalbaki + $due_by_cash_to_other ) ?> TK
 <hr>
 
 <span > So Toal amout of Products/ Services that purchased in cash: ( Total Puschases- Purshcases in Due)= ( {{ $khoroch }} - {{ $motbaki }} ) =    </span> <?php echo $nogodkroy = ($khoroch -  $motbaki) ?> TK 
 <br>

 <span >    Expenses to pay the previous Due to suppliers:  </span> <?php echo $totaldharshod  ?> TK <br>
 <span > Expenses to pay the previous Due of Medicine Companies:  </span> <?php echo $totalmedicineCompanyerdharshod  ?> TK <br>
  <span > Expenses for Refunding to patients: </span> <?php echo $patientferot  ?> TK <br>



 <br>(+) 
 <hr  style="width:50%">
<span > <b>So Total Expenses in Cash: </b>   </span> <?php echo $totalkhorochafteradjustingdue = ($nogodkroy+$patientferot + $totalmedicineCompanyerdharshod+$totaldharshod) ?> TK 
  
<hr style="width:50%">

<span  >Note: The Amount of Product/Services you bought in due is  {{ $motbaki}} TK. This Amount has been substracted from your total Expenses. This Amount will be added when you will pay this due.            

	 </span>

<br>
<span > The Amount of Advance you paid to the Suppliers for products/Services:    <?php echo $totaladvance ?> TK  </span>
  <br>



<hr> 
</div  >


<div  style="border:1px solid black; width:50%">
  So Totaol Expenses in Cash :   <?php echo round($totalkhorochafteradjustingdue,2)  ?>  TK <br>
  So Total Sale in Cash: <?php echo round($final_income,2)  ?>  TK<br>
  So Net Profit in Cash: <?php echo round(($final_income- $totalkhorochafteradjustingdue),2)  ?> TK
 </div> 

<div>


    
</body>
</html>
