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
    font-weight: normal;
}



 </style>

</head>

<body>
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
  <div id="h" >
<img width="500px;"   src="img/logo.jpg" >
<hr>
</div>


<div  class="container">

  
 
  <hr>
 
  
  
      <div id="three" >
    
	   <h2> Sales-Expenses Statemnet between date:
	   
	   <?php 
	     
	    $myDateTime = DateTime::createFromFormat('Y-m-d', $start);  echo  $myDateTime->format('d/m/Y'); ?> 
    
	   

	   to 
	   	   <?php 
   $myDateTime = DateTime::createFromFormat('Y-m-d', $e);  echo  $myDateTime->format('d/m/Y');
	   ?>
	   
	    </h2>
	
	
	
	
	
	<div style="width:50%; float:left;" >
	
  
    <div style=" margin-right:5px;" class="col-sm">
  <h2 >   Expenditures </h2>
  <hr>
  <?php if (!$externalcost->isEmpty())  { ?> 
  <h5 > Expenses in Various fields: </h5>
  <table class="table">
  <thead>
    <tr>
    
      <th scope="col"> Expenditure Name </th>

      <th scope="col">Price  </th>
      <th scope="col">Due </th>

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

      <td>{{$e->total_amount}}</td>
      <td>{{$e->total_due}}</td>
 
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
      <td>{{$e->cost}}</td>
      
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
      <td>{{$ems->total_given_salary_of_a_employee}}</td>
      
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
  
 

<!---------------------------------- medicinekroy transition. chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php if (!$medicineCompanyTransition->isEmpty())  { ?>
<h5 style="color:red">    Expenditures for buying Medicine  </h5>
  <hr>
  <table class="table">
  <thead>
    <tr> 
    
      <th scope="col"> Medicine Name  </th>
      <th scope="col"> Qun.   </th>
      <th scope="col"> price    </th>
	  <th scope="col"> Due.   </th>
	  <th scope="col"> Buying in Cash </th>
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($medicineCompanyTransition as $medtran)
	
	<?php 
	
	$totalmedicinemotkroy = $totalmedicinemotkroy+ $medtran->amount ;
$totalmedcinebakikroy = $totalmedcinebakikroy+ $medtran->pay_in_cash ;
$totalmedicinenogodkroy = $totalmedicinenogodkroy+ $medtran->due ;
	//$totalcommission = $totalcommission+ $agentcom->total_given_paidamount_of_a_agents ;
	?>
	<tr>
      <th >{{$medtran->medicine->name}}</th>
      <td>{{$medtran->Quantity}}</td>
      <td>{{$medtran->amount}}</td>
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
  
   
   
   
  <!-- patient ke ferot deya Taka    -->
 
 <br><br>
<?php if (!$patient_ke_taka_ferot->isEmpty())  { ?>
<h5 >    Refund to Patients:   </h5>
  <hr>
  <table class="table">
  <thead>
    <tr> 
    
      <th scope="col"> Patient Name:  </th>
      <th scope="col"> Amount:  </th> 
     
    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($patient_ke_taka_ferot as $p)
	
	<?php 
	$patientferot = $patientferot + $p->patient_ke_taka_ferot ;
	?>
	<tr>
      <th >{{$p->patient->name}}</th>
      <td>{{$p->patient_ke_taka_ferot}}</td>
      
    </tr>
@endforeach
  </tbody>
</table>(+)
<hr>
<span >  Total Amount that refunded to Patients: </span> <?php echo $patientferot  ?> Taka 

  <?php } ?>  
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
  <b  >  Expenses Summary   </b>
  <br> 
   <span > Total Cost for Buying Medicine: </span> <?php echo $totalmedicinemotkroy ?> TK <br>
  <span > Expenses in various field:   </span> <?php echo $totalkhoroch ?> TK. <br>
    <span > External Expenses :   </span> <?php echo $totalexcost ?> TK. <br>
   <span > Agent Commission:   </span> <?php echo $totalcommission ?> TK <br>
   <span > Salary Expenses:   </span> <?php echo $totalbeton ?> TK <br> 
    <span > Doctors Commission: </span> <?php echo $totaldoctorcommission ?> TK  <br> 
 <span > Doctor's Share/surgical Fees:   </span> <?php echo $totaldoctorshare ?> TK  <br> 
  (+) <br >
  <hr style="width:50%">
<span > So Total amount of Expenses for Buying Products/Services </span> <?php echo $khoroch= $totalcommission+$totalexcost+ $totalmedicinemotkroy + $totaldoctorshare + $totalbeton + $totalkhoroch + $totaldoctorcommission ?> TK 
 <br>
 <br>
 <h6 >  <b> Products/ Services that purchased in due:</b> </h6>
<span >Products/ Services that purchased in due:  </span> <?php echo $totalbaki ?> TK <br>
<span > Medicines that purchased in due: </span> <?php echo $totalmedicinenogodkroy ?> TK <br>
(+)
 <br>
 <hr > 
 <span >So Toal amout of Products/ Services that purchased in due:  </span> <?php echo  $motbaki = ($totalmedicinenogodkroy +  $totalbaki) ?> TK
 <hr>
 
 <span > So Toal amout of Products/ Services that purchased in cash: ( Total Puschases- Purshcases in Due)= ( {{ $khoroch }} - {{ $motbaki }} ) =    </span> <?php echo $nogodkroy = ($khoroch -  $motbaki) ?> TK 
 <br>

 <span >    Expenses to pay the previous Due:  </span> <?php echo $totaldharshod  ?> TK <br>
 <span > Expenses to pay the previous Due of Medicine Companies:  </span> <?php echo $totalmedicineCompanyerdharshod  ?> TK <br>
  <span > Expenses for Refunding to patients: </span> <?php echo $patientferot  ?> TK <br>
  <span > Expenses for Refunding to patients in pathology : </span> <?php echo $refundfrompathology  ?> TK <br>

 <br>(+) 
 <hr  style="width:50%">
<span > <b>So Total Expenses: </b>   </span> <?php echo $totalkhorochafteradjustingdue = ($nogodkroy+$patientferot+$refundfrompathology+ $totalmedicineCompanyerdharshod+$totaldharshod) ?> TK 
  
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
    <span >  Sale on Due:  </span>  {{$total_due_patho}} TK <br>
  (-) 
  <hr>
   <b> <span >  So Total income in Cash from Pathology:     </span> <?php $mot_nogod_income_from_pathology =  $totalincome_from_pathology - $total_due_patho ?> <?php echo number_format($mot_nogod_income_from_pathology,2,'.',',');  ?>TK <br></b>
  <br> 
  

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

    </tr> 
@endforeach

  </tbody>
</table>(+)

 
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
    <span > Service that sold in Due:   </span>  {{$total_due_surgery}} TK<br>
  (-) 
  <hr>
   <b> <span > So After Discount amount that sold in Cash:  </span> <?php $mot_nogod_sell_from_surgery =  $totalsell_from_surgery_by_substracting_discount - $total_due_surgery ?>  {{ $mot_nogod_sell_from_surgery }}   TK <br></b>
  <br> 
  

   <hr >


  <?php } ?> 
  


<!---------------------------------- Cabine transition . chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
 
 

<!---------------------------------- due paid transition . chechk if threre any transition in the daterange. 
if yes then exexute  -->
 
 <br><br>
<?php if (!$income_from_due_payment->isEmpty())  { ?>
<h5 >   Arrears collection:  </h5>
  <hr>
  <table class="table table-responsive">
  <thead>
    <tr> 
    
      <th scope="col"> Patinet Name:</th>
	  	 <th scope="col"> Amount  </th>
     	  	 <th scope="col"> Discount on Arrerar </th>

    </tr>
  </thead>
  <tbody>
    
	
	
	
	@foreach($income_from_due_payment as $due_paid )
	
	<?php 
	
$total_due_paid = $total_due_paid+ $due_paid->amount_of_due_paid  ;

	
	
	?>
	<tr>
      <th >{{$due_paid->patient->name}}</th>
	  <td>{{ $due_paid->amount_of_due_paid }}</td>
      <td>{{ $due_paid->duediscount }}</td>
	
    </tr>
@endforeach

  </tbody>
</table>(+) 


<hr>
<b><span > So Total Amount of Arrerar Collection ( including Cabine fair and other Service Charge)  </span> <?php echo $total_due_paid  ?> TK<br></b>




 <br><br>
   <hr >


  <?php } ?> 
  



 <br><br>

  <span > <u> Sale Summary </u> </b>
  <br>
  <br>
<b  >  Sale in Cash </b> <br><br> 


  
  <span > Medicine:      </span> <?php echo number_format($mot_nogod_sell_from_medicine,2,'.',',') ?> TK <br>
  <span >  Surgery:    </span> <?php echo $mot_nogod_sell_from_surgery ?> TK<br>
  <span >  Pathology:   </span> <?php echo number_format($mot_nogod_income_from_pathology,2,'.',','); ?> TK <br>
  <span > Arrerar Collection:   </span> <?php echo $total_due_paid ?> TK <br>
   <span > From Outdoor Doctors:   </span> <?php echo $income_from_doctor ?> TK <br>
(+) <hr >
  <span > SO Total Sales in Cash:  </span> <?php $final_income= $income_from_doctor + $mot_nogod_sell_from_surgery + $mot_nogod_sell_from_medicine  +$mot_nogod_income_from_pathology+ $total_due_paid ?> <?php echo round($final_income,2); ?>   TK <br>

  <br>
<b  > Sales on Due: </b> <br><br> 
  <span >  Pathology Section:     </span> {{$total_due_patho}} TK<br><br>
  <span >  Medicine Sales:        </span> {{$total_due_medicine}} TK <br><br>
  <span >   Surgery: </span> {{$total_due_surgery}} TK <br><br>
   <span > Outdoor Doctor:    </span> {{$doctorcalldue}} TK <br><br>
   
   <?php $motbakibikri = $total_due_patho + $total_due_medicine + $total_due_surgery + $doctorcalldue  ?>
 <span > Note:The Total amount you have sold on due is: {{ $motbakibikri}} TK. </span><br>
 









    </div>	
	
	
	
  










  </div>


  </div>
  <br>
   <br>
   <br>
   <br>
    <br>
	


</div>



    
</body>
</html>
