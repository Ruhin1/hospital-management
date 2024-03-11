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





</style>
 <?php for ($i=0; $i<3; $i++){ ?>
</head>
<body style="font-family: Times New Roman;">
<div id="c" >
<div id="head" >
<img width="500px;"   src="img/logo.jpg" >
<hr>
</div>



    <div style="height:10px;" id="one" >
    <div style="width:30%; float:left;" >
	<?php if( $i == 0) { ?>
      <b><u>Balance Sheet</u></b>
    <?php } if ( $i == 1){ ?>
	  <b>office's Copy  </b>
	  <?php } if ( $i == 2){ ?>
	 <b> Accountant's Copy  </b>
	  <?php } ?>
	</div>
    <div style="width:40%;float:left;" >
 <b>Company ID:</b> {{$data->id}}
    </div>



  </div>


    <div style="height:10px;" id="two" >
    <div style="width:40%; float:left;" >
      <b> Company Name :</b> {{$data->name}}
    </div>

	


	
	
	    <div style="width:34%;float:left;" >
<b>Agent Mobile No.</b> {{$data->agent_mobile}} 
    </div>

  </div>
     

    <div style="height:10px;" id="two" >
    <div style="width:30%; float:left;" >
      <b>Opening Balance :</b> {{$data->openingbalance}}
    </div>
    <div style="width:30%; float:left;" >
      <b>Current Balance :</b> {{$data->due}}
    </div>

    <div style="width:30%; float:left;" >
      <b>Previous Balance  :</b> {{$obtillfirstdate}}
    </div>
  </div>  
  
  Balance Sheet from date: <?php echo date('d/m/Y ', strtotime($start)); ?>  to <?php echo date('d/m/Y ', strtotime($lastday)); ?> 
  
  <?php  $b= $obtillfirstdate;  ?>
  
  
  
 <br> 




<table>








     
<thead>	
  <tr>
 <th style="width:40px;" >	Date</th>
  
    <th style="width:150px;" >
	
	  Product Name
    
	 </th>
	  <th style="width:100px;"  >Comment</th>
    <th style="width:100px;"  >Amount(TK)</th>
	    <th style="width:100px;"  >Discount</th>
	 <th style="width:100px;"  >Debit </th>
	 
	 <th style="width:100px;"   >Credit</th> 
	  <th style="width:100px;"   >Balance</th> 
  </tr>
  </thead>
 @foreach ( $order as $o )

 <?php 

if ($o->type == 1)
{
$b = $b+ $o->debit;

}	

if ($o->type == 2)
{
$b = $b- $o->credit;

}

if ($o->type == 3)
{
$b = $b- $o->credit;

}

if ($o->type == 4)
{
	
$b = $b+ $o->debit;
	
}


?> 


  <tr>
    <?php  //$myDateTime = DateTime::createFromFormat('Y-m-d', $o->created_at);  echo  $myDateTime->format('d/m/Y'); ?> 
  <td> <?php echo date('d/m/Y h:i:s A', strtotime($o->created_at));; ?> </td>
    <td> 
<?php  if($o->type == 2) { ?>

Due Payment
<?php } if($o->type == 4) {  ?>

Money Back 
<?php  }  if( ($o->type == 1) || ($o->type == 3)  )  { ?>
<table>
  <tr>
    <th style="width:100px;" >Product Name </th>
    <th>Qun.</th>
	<th>Unit Pr.</th>
    <th>Unit</th>
  </tr>
  

 
 @foreach ( $o->productcompanytransition as $t )
  <tr>
    <td> {{$t->medicinecomapnyname->name}}</td>
   <td><?php echo round($t->quantity,2); ?> </td>
   <td><?php echo round($t->unirprice,2); ?> </td>
<td> {{$t->unitname}} </td>
   

	 

	 
	 
  </tr>
@endforeach 




</table>
<?php } ?>
</td>
  
<td> Type: <?php   if ($o->type ==1) { ?> Purchase : 

<?php } if ($o->type ==2) { ?> Due Payment to Company:  <?php } if ($o->type ==3) { ?>

Product Return to Company :  <?php } if ($o->type ==4) { ?>

Get Money Back from  Company :  <?php } ?>


    {!! nl2br(e($o->comment)) !!}   





 </td>




 <td><?php echo round($o->amount,2); ?> </td>
 <td><?php echo round($o->discount,2); ?> </td>

	 <td><?php echo round($o->debit,2); ?></td>
	 
	 <td><?php echo round($o->credit,2); ?></td>
	  <td><?php echo round($b,2); ?></td>

	 
	 
  </tr>

@endforeach 
</table>
	
	<div  style="height:10px;" id="btwo" >
    <div style="width:50%;float:left;" >
 <b>Date :</b><?php echo date("d/m/y") ;  ?>
    </div>

	    <div style="width:50%;float:left;" >
		<b>Print By:{{Auth()->user()->name}}</b>

    </div>

  </div>



</div>
<p>
Formula:
If Balance is Negative that means Company has a due to You.
If Balance is Positive that means You have a due to Company. <br>
If Type = Product sell Amount = Debit. then Balance = preveious Balance + Debit <br>

If Type = Due Payment then  Payment Amount= Credit.  Balance = preveious Balance - Credit <br>

If Type = Product Return then  Return Amount = Credit.  Balance = preveious Balance - Credit <br>

If Type = Money Back then Amount = Debit,  Balance = preveious Balance + Debit <br>
</div>


			<?php if( $i < 2) { ?>
	<p style="page-break-after:always" ></p>
 <?php } } ?>
</body>
</html>