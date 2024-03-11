

@extends('layout.main')

@section('content')


<h6 style="color:red;"> যে মাস ও বছরের বেতন সিট দেখতে চান সেটা সিলেক্ট করেন </h6>


<form      method="post"  action="{{route('employeetransactioncon.month_year_pick_fetch')}}"   >
 @csrf

<div class="row">
            <div class="col-6">
	Month:
	<select id="month"  class="form-control "  name="month"  required   style='width: 170px;'>
	<option value=""></option>
   <option   value="1">Jan</option>
  <option     value="2">Feb</option>
  <option     value="3">March</option>
     <option     value="4">April</option>
  <option   value="5">May</option>
  <option     value="6">June</option>
     <option     value="7">July</option>
  <option     value="8">Aug</option>
  <option     value="9">Spet</option>
     <option     value="10">Oct</option>
  <option    value="11">Nov</option>
  <option      value="12">Dec</option>
 
   </select>
             </div>
			 
	<div class="col-6">

            <div class="col-6">
	Year:
	<select id="year"  class="form-control " type="reset"  name="year"  required   style='width: 170px;'>
	<option value=""></option> 
	
	
	<?php for($i=2021; $i<2050; $i++) { ?> 
   <option value="{{$i}}">{{$i}}</option>
	<?php  } ?>
 
 
   </select>
             </div>


</div>	
			 
		 

</div>
<p>
<br>
  <button   type="submit"   target="_blank" class="btn btn-primary">Submit</button>
</form>





 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">


$(document).ready(function(){



$('#month').select2();
$('#year').select2();


});
</script>
	  


@stop