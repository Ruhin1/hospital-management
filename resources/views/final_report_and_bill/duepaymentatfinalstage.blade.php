@extends('layout.main')

@section('content')


<style>


body{
	
	width:100%;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}






</style>
</head>
<body  style="width:100%">
@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif

<div  style="margin-left:20px;"  id="information">
<br>

<div class="container">
  <div class="row">
    <div class="col-3">
      Patient Name: {{$patient->name}}</b>
    </div>
    <div class="col-2">
      Patient ID: {{$patient->id}}
    </div>
    <div class="col-2">
      Age: {{$patient->age}}
    </div>
	    <div class="col-2">
    Source: {{$sourcename}} 
    </div>
	<div class="col-3">
     Date:<?php echo date("Y/m/d") ;  ?>
    </div>
	
  </div>
</div>
<hr>
<br>

<br>
<br>
<b> Total Due </b> = Initial Due - Total Deposit.<br>
 Initial Due = <?php  echo round(($patient->due +$cabinedue ), 0);  ?> TK , Total Deposit =

<?php  echo round(($patient->dena  ), 0);  ?>   TK <br>
 So Total Due = <?php  echo round(($patient->due +$cabinedue ), 0);  ?>  - <?php  echo round(($patient->dena  ), 0);  ?>   =  <?php  echo round(($patient->due +$cabinedue - $patient->dena ), 0);  ?>  TK

	
	
 </div>
		   
<form   method="post"  id="a"  class="additioncalcost" action="{{ route('finalreport.dueadjustmentbeforerelease') }}"      >
@csrf 

  

  <div class="row"   style="background-color:#2F4F4F"       >

	


		    <div class="col-3">
 
		 <b style="color:white" >Total Due:</b> <input type="text" name="due" autocomplete="off" id="due" value="<?php  echo round(($patient->due +$cabinedue - $patient->dena ), 0);  ?>"   class="form-control numbers totalamount"  />
    </div>

			<div class="col-3">
 
		 <b style="color:white" ></b>
		 
		 <input type="hidden" name="duediscount" id="duediscount" value="{{$finaldiscount}}" autocomplete="off"  class="form-control numbers duediscount"  />
   
   </div>	

	    <div class="col-3">
       <b style="color:white" ></b><input type="hidden" name="duepayment" autocomplete="off" id="duepayment" value="0" class="form-control numbers due"  />
    </div>

	<p>
	</div>
	<p>
  
  <div class="row"      style="background-color:#2F4F4F"  >

  
 
  		    <div class="col-6">
 
		 <b style="color:white" >Total Commission:</b> <input type="text" autocomplete="off" name="finalcommission" id="finalcommission" value="0"   class="form-control numbers finalcommission"   />
    </div>	
	
	
  		    <div class="col-6">
 
		 <b style="color:white" >Money Back:</b> <input type="text" autocomplete="off" name="moneyback" id="moneyback" value="0"   class="form-control numbers moneyback"   />
    </div>		
	
	
	
	
	
	
	<P>
	
  </div>
  
  <p>
  <div class="row"                 >


		
	       <input type="hidden" name="cabinedue" id="cabinedue" value="{{ $cabinedue}}"  readonly  />
  		 <input type="hidden" name="patientid" id="patientid" value="{{$patient->id}}" autocomplete="off"  class="form-control numbers duediscount"  />
   

	<p>
 </div>

 
 
 <p>

	

	
	
	

	
	
	
	
	
	
	
 </div>







  
   
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>


</div>












</div>





</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">





$(document).ready(function(){

	
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }




});
</script>

	  
</body>

@stop