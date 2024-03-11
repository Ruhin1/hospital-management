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



<bodY>


<div id="head" >
<img width="500px;"   src="img/logo.jpg" >
<hr>



    <div style="height:10px;" id="two" >
    <div style="width:40%; float:left;" >
      <b>Name :</b> {{$longterminstallerorder->patient->name}}
    </div>

	
	    <div style="width:13%;float:left;" >
 <b>Age:</b> {{$longterminstallerorder->patient->age}}
    </div>
	    <div style="width:13%;float:left;" >
 <b>Sex:</b>{{$longterminstallerorder->patient->sex}}
    </div>
	
	
	    <div style="width:34%;float:left;" >
<b>Mobile No.</b> {{$longterminstallerorder->patient->mobile}} 
    </div>

  </div>


    <div style="height:10px;" id="two" >
    <div style="width:65%; float:left;" >
      <b>Treatment For :</b> {{$longterminstallerorder->Code}}
    </div>

	
	    <div style="width:30%;float:left;" >
 <b>Source:</b> {{$longterminstallerorder->agentdetail->name}}
    </div>


  </div>


    <div style="height:10px;" id="two" >
    <div style="width:30%; float:left;" >
      <b>Gross Amount :</b> {{$longterminstallerorder->gross_amount}} TK
    </div>

	    <div style="width:30%;float:left;" >
      <b>Dicscount :</b> {{$longterminstallerorder->totaldiscount}} TK
    </div>


	
	    <div style="width:30%;float:left;" >
      <b>Receiveable Amount :</b> {{$longterminstallerorder->receiveable_amount}} TK
    </div>


  </div>


</div>




<?php $r = $longterminstallerorder->receiveable_amount;?>





<table>
    
<thead>	
  <tr>
  <th> No.</th>
   <th >Date</th>
 <th  >Paid Amount </th>
 <th  >Due Balance </th>
	
	 <?php 

$amount =0;
$i=1;
?>	 


  </tr>
  </thead>
 @foreach ( $dentalserviceodermoney_deposit as $t )


  <tr>
  
<td> {{$i}}</td>


<?php 
$i++;

$amount = $amount + $t->amount;


?>

 <td>   {{ Carbon\Carbon::parse($t->created_at)->format('d/m/Y , h:i:sa') }} </td>
 <td> {{$t->amount}} </td>
<td> {{$r - $amount}} </td>
    










	 
  </tr>

@endforeach 


  <tr>
  
<td> Total</td>
 <td> NA </td>
 <td> {{$amount}} </td>
<td> {{$longterminstallerorder->due }} </td>






	  
	 
	 
  </tr>


</table>


 
 
 
 
 
 
 
 
 
 
 
 
 
 






</body>
</html>