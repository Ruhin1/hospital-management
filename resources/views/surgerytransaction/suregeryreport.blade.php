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
  padding: 8px;
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
 <?php for ($i=0; $i<3; $i++){ ?>
</head>
<body style="font-family: Times New Roman;">
<div id="c" >
<div id="head" >
<img width="500px;"   src="img/logo.jpg" >
<hr>
</div>
<br>
<br>



    <div style="height:10px;" id="one" >
    <div style="width:40%; float:left;" >
	<?php if( $i == 0) { ?>
      <b>Money Receipt</b>
    <?php } if ( $i == 1){ ?>
	  <b>Office Copy </b>
	  <?php } if ( $i == 2){ ?>
	 <b> Accountant's Copy  </b>
	  <?php } ?>
	</div>
    <div style="width:30%;float:left;" >
 <b>Patient ID:</b> {{$data->patient->id}}
    </div>
	    <div style="width:30%;float:left;" >
 <b>Name of the Surgery :</b> {{$data->surgerylist->name}}
    </div>


  </div>
  <br>

    <div style="height:10px;" id="two" >
    <div style="width:40%; float:left;" >
      <b>Patient Name :</b> {{$data->patient->name}}
    </div>

	
	    <div style="width:13%;float:left;" >
 <b>Age:</b> {{$data->patient->age}}
    </div>
	    <div style="width:13%;float:left;" >
 <b>Sex:</b>{{$data->patient->sex}}
    </div>
	
	
	    <div style="width:34%;float:left;" >
<b>Mobile No.</b> {{$data->patient->mobile}} 
    </div>
 
  </div>
     
	 <div style="height:10px;" id="three" >
    <div style="width:50%; float:left;" >
      <b>Ref. Doctor :</b> {{$reference_doctor->name}},  {{$reference_doctor->Degree}}, 
    </div>

    <div style="width:50%; float:left;" >
      <b>Surgeon :</b> {{$surgeon->name}},  {{$surgeon->Degree}} . 
    </div>

  </div>
 	 <div style="height:10px;" id="four" >

	    <div style="width:50%;float:left;" >
      <b>Anesthesiologist :</b> {{$anesthesiologist->name}},  {{$anesthesiologist->Degree}} . 
    </div>

	    <div style="width:50%;float:left;" >
<b>Date of the Surgery :</b><?php  $myDateTime = DateTime::createFromFormat('Y-m-d', $data->surgerydate);  echo  $myDateTime->format('d/m/Y');  ?> 
    </div>
  </div> 
  

<br>
<table>
  <tr>
    <th>Cost Name </th>
    <th>Charge</th>
	
  </tr>
  

 
 
  <tr>
    <td> Pre-Operative Charge</td>
   <td> {{$data->pre_operative_charge}}</td>

  </tr>

  <tr>
    <td> Surgeon harge</td>
   <td> {{$data->Surgeon_charge}}</td>

  </tr>
  
  <tr>
    <td> Anesthesia Charge</td>
   <td> {{$data->anesthesia_charge}}</td>

  </tr>

  <tr>
    <td> Assistant Charge</td>
   <td> {{$data->assistant_charge}}</td>

  </tr>

  <tr>
    <td> OT Charge</td>
   <td> {{$data->ot_charge}}</td>

  </tr>

  <tr>
    <td> Oxygen/Nitrogen Charge</td>
   <td> {{$data->o2_no2_charge}}</td>

  </tr>

  <tr>
    <td> C-Arme Charge</td>
   <td> {{$data->c_arme_charge}}</td>

  </tr>

  <tr>
    <td> Post-Operative Charge</td>
   <td> {{$data->post_operative_charge}}</td>

  </tr>  
  
    <tr>
    <td> Miscellaneous Expenses</td>
   <td> {{$data->miscellaneous_expenses}}</td>

  </tr> 

</table>
<br>
<br>
<?php 

$totalprice_before_vat_and_discount = $data->miscellaneous_expenses + $data->post_operative_charge + $data->c_arme_charge
+ $data->o2_no2_charge + $data->ot_charge + $data->assistant_charge + $data->anesthesia_charge + $data->Surgeon_charge+ 
$data->pre_operative_charge ; 
?>


 Tatal Price (Excluding VAT and Discount) : {{$totalprice_before_vat_and_discount}} TK <br>
 Total VAT : {{$data->totalvat}} TK<br>
 Total Discount : {{$data->totaldiscount}} TK <br>
 Total Price (including VAT and Discount) : {{$data->total_cost_after_initial_vat_and_discount	}} TK<br>
Pay in Cash : {{$data->pay_in_cash}} TK <br>
 Adjust with Advance Payment : {{$data->adjust_with_advance}} TK <br>
Due: {{$data->due}} TK <br>
<?php     if  ($i !=0) {   ?>


<?php if($data->agentdetail_id)
{ ?>



 	 <div style="height:10px;" id="six" >

	    <div style="width:60%;float:left;" >
      <b>Agent Name :</b>  {{$data->agentdetail->name}}.
    </div>

	    <div style="width:40%;float:left;" >
<b>Commission :</b>{{$data->comission}} TK
    </div>
		
  </div> 

<?php } ?>

<?php if($data->doctor_id)
{ ?>


 	 <div style="height:10px;" id="six" >

	    <div style="width:50%;float:left;" >
      <b>Doctor Name :</b> {{$data->doctor->name}}. 
    </div>

	    <div style="width:50%;float:left;" >
<b>Commission :</b>{{$data->comission}} TK
    </div>
		
  </div> 

<?php } ?>

<?php if($data->Surgeon_id )
{ ?>


 	 <div style="height:10px;" id="six" >

	    <div style="width:50%;float:left;" >
      <b>Surgeon Name :</b> {{$surgeon->name}}. 
    </div>

	    <div style="width:50%;float:left;" >
<b> Given Surgeon Fees :</b>{{$data->surgeon_fees}} TK
    </div>
		
  </div> 

<?php } ?>
	


<?php if($data->anesthesiologist_id )
{ ?>


 	 <div style="height:10px;" id="six" >

	    <div style="width:50%;float:left;" >
      <b>Anesthesiologist Name :</b> {{$anesthesiologist->name}}. 
    </div>

	    <div style="width:50%;float:left;" >
<b> Given Anesthesiologist Fees :</b>{{$data->anesthesiologist_fees}} TK
    </div>
		
  </div> 

<?php } ?>








	
	
<?php } ?>	

 	 <div style="height:10px;" id="six" >

	    <div style="width:33%;float:left;" >
      <b>Entry By  :</b> {{$data->user->name}}. 
    </div>

	    <div style="width:33%;float:left;" >
<b>Vouc. Date:</b><?php    $myDateTime =  Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d/m/Y');    echo  $myDateTime ;  ?> 
    </div>
	
		    <div style="width:33%;float:left;" >
<b>Printing. Date:</b><?php  echo date("d/m/y") ;  ?> 
    </div>
	
  </div> 


</div>





</div>


			<?php if( $i < 2) { ?>
	<p style="page-break-after:always" ></p>
 <?php } } ?>
</body>
</html>