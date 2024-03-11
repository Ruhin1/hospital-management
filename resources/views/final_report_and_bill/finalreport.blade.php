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
      <b><u>Money Receipt</u></b>
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

	
	    <div style="width:50%;float:left;" >
 <b>Reference Doctor:</b> {{$refdoctor}}
    </div>


  </div>


   <div style="height:10px;" id="two" >
    <div style="width:30%; float:left;" >
      <b>Cabine NO: </b> {{$cabine}}
    </div>

	
	    <div style="width:35%;float:left;" >
 <b>Admission Date:</b> 
 
 	  <?php  $myDateTime = DateTime::createFromFormat('Y-m-d', $startingdate);  echo  $myDateTime->format('d/m/Y'); ?> 


    </div>
	    <div style="width:35%;float:left;" >
 <b>Discharing Date :</b>

 	  <?php  $myDateTime = DateTime::createFromFormat('Y-m-d', $enddate);  echo  $myDateTime->format('d/m/Y'); ?> 



    </div>

  </div>

















  <?php if ( $surdata != null) { ?>
  
  @foreach( $surdata as $sur)
   
   <table>
      <tr>
    <td> Surgery Name: {{$sur->surgerylist->name}} </td>
   <td> Cost </td>

  </tr>
   
   
   
   <tr>
    <td> Pre-Operative Charge</td>
   <td> {{$sur->pre_operative_charge}}</td>

  </tr>

  <tr>
    <td> Surgeon harge</td>
   <td> {{$sur->Surgeon_charge}}</td>

  </tr>
  
  <tr>
    <td> Anesthesia Charge</td>
   <td> {{$sur->anesthesia_charge}}</td>

  </tr>

  <tr>
    <td> Assistant Charge</td>
   <td> {{$sur->assistant_charge}}</td>

  </tr>

  <tr>
    <td> OT Charge</td>
   <td> {{$sur->ot_charge}}</td>

  </tr>

  <tr>
    <td> Oxygen/Nitrogen Charge</td>
   <td> {{$sur->o2_no2_charge}}</td>

  </tr>

  <tr>
    <td> C-Arme Charge</td>
   <td> {{$sur->c_arme_charge}}</td>

  </tr>

  <tr>
    <td> Post-Operative Charge</td>
   <td> {{$sur->post_operative_charge}}</td>

  </tr>  
  
    <tr>
    <td> Miscellaneous Expenses</td>
   <td> {{$sur->miscellaneous_expenses}}</td>

  </tr> 
  
  
  
      <tr>
    <td> Total Expenses </td>
   <td> {{$sur->total_cost_before_initial_vat_and_discount}}</td>

  </tr> 
  </table>
  <p>
  @endforeach
  
  <?php } ?>


<p>
<b> Summary </b>
<table class="table">
  <tr>
    <th  style=" font-size:14px;" >Service/Product Name </th>
    <th style=" font-size:14px;">Gross <br>Price</th>
 <th style=" font-size:14px;">VAT(TK)</th>
  <th style=" font-size:14px;">Disc(TK)</th>
  <th style=" font-size:14px;">Due(TK)</th>  
	 <th style=" font-size:14px;"> Receiveable<br> Price </th> 
	 <th style=" font-size:14px;" >Paid</th>
  </tr>
  
 
<tr scope="row">  
    <td> Medicine</td>
   
   <td> <?php  echo round($totalmedibeforeadjusting, 0);  ?></td>
	 <td><?php  echo round($mvat, 0);  ?>  </td>
	 <td><?php  echo round($mdiscount, 0);  ?>   </td>
	 	 <td><?php  echo round($meddue_without_return, 0);  ?>  </td>
	 <td> <?php  echo round(($totalmedibeforeadjusting-$mdiscount), 0);  ?>   </td>
  <td> <?php  echo round(($totalmedibeforeadjusting-$meddue_without_return-$mdiscount), 0);  ?> </td>
  </tr>
  
  
   
   
  <tr   scope="row">  
    <td>( - )  Return Medicine</td>
   
   <td><?php  echo round($grossamount_return_medicine, 0);  ?>  </td>
	 <td> NA  </td>
	 <td><?php  echo round(($grossamount_return_medicine- $receiveable_amount_return_medicine), 0);  ?> </td>
	 	 <td><?php  echo round($returnmedicine, 0);  ?> </td>
	 <td><?php  echo round($receiveable_amount_return_medicine, 0);  ?>   </td>
  <td><?php  echo round(($receiveable_amount_return_medicine- $returnmedicine), 0);  ?> </td>
  
  
  <?php $reurtn_medicine_discount = $grossamount_return_medicine - $receiveable_amount_return_medicine;  ?>
  </tr>
  
   <tr style="background-color:yellow" scope="row">  
    <td> Total Medicine :</td>
   
   <td><?php  echo round(($totalmedibeforeadjusting- $grossamount_return_medicine), 0);  ?>  </td>
	 <td> NA  </td>
	 <td><?php  echo round(($mdiscount- $grossamount_return_medicine+ $receiveable_amount_return_medicine), 0);  ?>  </td>
	 	 <td><?php  echo round($meddue, 0);  ?>   </td>
	 <td><?php  echo round(($totalmedibeforeadjusting-$mdiscount-$receiveable_amount_return_medicine), 0);  ?></td>
  <td>
  
 <?php  echo round(($totalmedibeforeadjusting-$meddue_without_return-$mdiscount-$receiveable_amount_return_medicine+$returnmedicine), 0);  ?> 
 </td>
  </tr> 
   
  
  
  
  
  
  
  
  
  
    <tr scope="row">
    <td>Admission Fees</td>
   
    <td>       <?php  echo round($cabineadmissionfee, 0);  ?>    </td>
	 <td>  0 </td>
	 <td>    <?php  echo round($total_cabine_admission_discount, 0);  ?>    </td>
	 <td> <?php  echo round($total_admission_due, 0);  ?>   </td>
	 <td> <?php echo    round(($cabineadmissionfee - $total_cabine_admission_discount),0) ; ?> </td>
	 <td> <?php  echo round($total_cabine_bill_payment, 0);  ?>  </td>
  </tr>
  
  <tr scope="row">
    <td>Cabine/Bed Fare</td>
   
    <td>  <?php echo    $tcabinecharge ; ?>         </td>
	 <td>  {{$cabinevat}} </td>
	 <td> {{$cabinediscount}}  </td>
	 	 <td> {{$cabinedue}} </td>
	 <td> <?php echo    $tcabinecharge - $cabinediscount ; ?> </td>
	 <td>{{$tcabinecharge - $cabinedue - $cabinediscount}}</td>
  </tr>
  
  
    <tr scope="row">
    <td>Doctor's Visits Fees</td>
   
    <td> <?php  echo round($dtotal, 0);  ?> </td>
	 <td>0 </td>
	 <td>   <?php  echo round($doctorvisitduediscount, 0);  ?>    </td>
	 <td> <?php  echo round($doctordue, 0);  ?>    </td>
	 <td> <?php  echo round(($dtotal- $doctorvisitduediscount), 0);  ?> </td>
     <td><?php  echo round(($dtotal- $doctordue - $doctorvisitduediscount), 0);  ?></td>
  </tr>
    <tr scope="row">
    <td> Pathological Tests</td>
   
    <td><?php  echo round($totalpathobeforeadjusting, 0);  ?>   </td>
	 <td><?php  echo round($rvat, 0);  ?>  </td>
	 <td><?php  echo round($rdiscount, 0);  ?> </td>
	 	 <td><?php  echo round($reportorderdue, 0);  ?>      </td>
	 <td><?php  echo round(($totalpathobeforeadjusting-$rdiscount), 0);  ?></td>
     <td><?php  echo round(($totalpathobeforeadjusting-$reportorderdue-$rdiscount), 0);  ?>            </td>
  </tr>
  
      <tr scope="row">
    <td> Surgery </td>
   
    <td><?php  echo round($gross_surgery_amount, 0);  ?>    </td>
	 <td> {{$svat}} </td>
	 <td><?php  echo round($total_surger_discount, 0);  ?>   </td>
	 	 <td><?php  echo round($surdue, 0);  ?>   </td>
	 <td> <?php  echo round(($gross_surgery_amount-$total_surger_discount), 0);  ?> </td>
     <td>  <?php  echo round(($gross_surgery_amount-$surdue-$total_surger_discount), 0);  ?> </td>
 </tr>


      <tr scope="row">
    <td> Service  </td>
   
    <td><?php  echo round($service_gross_amount, 0);  ?>    </td>
	 <td> 0 </td>
	 <td><?php  echo round($service_discount, 0);  ?>  </td>
	 	 <td><?php  echo round(($service_gross_amount-$service_discount-$total_paid_service), 0);  ?> </td>
	 <td><?php  echo round(($service_gross_amount-$service_discount), 0);  ?> </td>
     <td><?php  echo round(($total_paid_service), 0);  ?></td>
 </tr>


</table>



<P>



<?php $grossamount = $totalmedibeforeadjusting- $grossamount_return_medicine + $service_gross_amount + $gross_surgery_amount + $totalpathobeforeadjusting + $dtotal + $tcabinecharge + $cabineadmissionfee;


$totoalfinaldiscount = $mdiscount- $grossamount_return_medicine+ $receiveable_amount_return_medicine + $total_cabine_admission_discount + $cabinediscount + $doctorvisitduediscount + $rdiscount + $total_surger_discount + $service_discount;


$total_paid_final = $total_paid_service + $gross_surgery_amount-$surdue-$total_surger_discount + $totalpathobeforeadjusting-$reportorderdue-$rdiscount +$dtotal- $doctordue - $doctorvisitduediscount + $tcabinecharge - $cabinedue - $cabinediscount + $total_cabine_bill_payment + $totalmedibeforeadjusting-$meddue_without_return-$mdiscount-$receiveable_amount_return_medicine+$returnmedicine;







$receviefinalamount = $grossamount - $totoalfinaldiscount;

$duefina = $receviefinalamount - $total_paid_final;



?>





















<br>
<br>
    <div style="height:10px;" id="two" >
    <div style="width:30%; float:left;" >
      <b>Gross Amount:</b> <?php echo round($grossamount,2)  ?> TK
    </div>

	
	    <div style="width:40%;float:left;" >
 <b>Receiveable Amount:</b> <?php echo round($receviefinalamount,2) ?> TK
    </div>
	    <div style="width:30%;float:left;" >
 <b>Paid:</b> <?php

echo round ($total_paid_final,0);
 
 
 ?> TK
    </div>

  </div>
  
     

	 <div style="height:10px;" id="two" >
    <div style="width:33%; float:left;" >
     <b>Discount:</b> <?php echo round($totoalfinaldiscount)?>TK
    </div>

	
	    <div style="width:33%;float:left;" >
 <b>Due:</b><?php echo round($duefina,2) ?> TK  TK
    </div>
	    <div style="width:33%;float:left;" >
 <b>Entry By:</b> {{$finalreport->User->name}}
    </div>

  </div>
  
  
  
 	 
	 <?php if($finalcosttable->refund) { ?>
	 <div style="height:10px;" id="two" >
    <div style="width:33%; float:left;" >
     <b>Refund:</b> {{$finalcosttable->refund}} TK
    </div>
  </div> 
	 <?php } ?>
  
  
  
  
  
  
  
  
  
  
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



	
	    <div style="width:50%;float:left;" >
 <b>Commission:</b> {{$finalcosttable->total_Commission }} TK
    </div>


  </div>  

  <?php } ?>



</div>





</div>


			<?php if( $j < 2) { ?>
	<p style="page-break-after:always" ></p>
 <?php } } ?>
</body>
</html>