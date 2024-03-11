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
</head>
<body>
<div id="c" >
<div id="head" >
<img    src="img/logo.jpg" >
<hr>
</div>
<br>

<B STYLE="FONT-SIZE:15PX; margin:40px;">PATIENT DEMOGRAPHIC & SPECIMEN PROFILE</B>
<br>

 
 
     <div style="height:10px;" id="two" >
    <div style="width:40%; float:left;" >
      <b> Patient Name:</b>  {{$patientname}}
    </div>

	

	    <div style="width:20%;float:left;" >
 <b>Age: </b>{{$age}}
    </div>
	
	
	    <div style="width:30%;float:left;" >
<b>Sex:</b> {{$sex}}
    </div>

  </div>
 
      <div style="height:10px;" id="two" >
    <div style="width:40%; float:left;" >
      <b> Ref:</b>   {{$doctor}}
    </div>

	
	    <div style="width:25%;float:left;" >
 <b>Patient ID: </b> {{$patientid}}
    </div>
	
	
	    <div style="width:30%;float:left;" >
<b>Date:</b> <?php echo date("Y/m/d") ;  ?> 
    </div>

  </div>
 
 
 
 


<br>


<?php $inv =''; ?>
  







  <table>
    <tr>
      <th>investigation</th> 
      <th>Test component Name</th>
      <th>Results</th>
      <th>Normal Ref.Value</th>
     <th>Units</th>
    </tr>
    @foreach($data as $d)
  <tr>
    <td>
      <?php if($d->reportlist->name != $inv) { ?>
      {{$d->reportlist->name}}
    <?php }
    
    $inv = $d->reportlist->name;
    ?>
    
    </td>
    <td>{{$d->pathology_test_component->component_name	}}</td>
   
    <td>{{$d->result}}</td>
	 <td>{{$d->pathology_test_component->Normalvalue}}</td>
	 <td>{{$d->pathology_test_component->unit}}</td>
  </tr>
  @endforeach
</table>




<p>
<br>
<br>
<br>
<br>
<br>
<br>
      <div style="height:10px;" id="two" >
    <div style="width:40%; float:left;" >
      <b> Entry By:</b>   {{$entryby}}
    </div>

	
	    <div style="width:50%;float:left;" >
 <b>Signature of the Doctor: </b> 
    </div>
	
	


  </div>




</div>



</body>
</html>