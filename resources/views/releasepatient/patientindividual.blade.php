

@extends('layout.main')

@section('content')
@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif

<h6  style="background-color:yellow" > প্যাসেন্টের  কেবিন চার্জ নেন    </h6>

<form      method="post"  action="{{route('cabinefees.pay')}}"   >
 @csrf

<div class="container">
  <div class="row">
    <div class="col-4">
    Patient Name:   <input type="text"  readonly name="name" id="name" value="{{$patient->name}}" autocomplete="off" class="form-control" />
    </div>
    <div class="col-4">
     Cabine NO:  <input type="text" readonly name="cabine" id="cabine" value="{{$cabine->serial_no}}" autocomplete="off" class="form-control" />
    </div>
    <div class="col-4">
   Unpaid Since the Date(M/D/Y) :   <input type="date" readonly name="unpaiddate" id="unpaiddate" value="{{$startimeshow}}" autocomplete="off" class="form-control" />
    </div>
  </div>
  
  <div class="row">
      <div class="col-4">
  Unpaid for the Number of Days :   <input type="text" readonly name="days" id="days" value="{{$differnece_btw_two_date_by_day}}" autocomplete="off" class="form-control" />
    </div>
    <div class="col-4">
  Cabine Fair Per day (TK) :  <input type="text" readonly name="cabinefairperday" id="cabinefairperday" value="{{$cabine->price}}" autocomplete="off" class="form-control" />
    </div>
    <div class="col-4">
     Unpaid Cabine Fair(TK):   <input type="text" readonly name="unpaidfair" id="unpaidfair" value="{{$total_seat_fair}}" autocomplete="off" class="form-control" />
    </div>
  </div>

  
    <div class="row">

    <div class="col-4">
     Pay Till Date(M/D/Y) : <input type="date" name="paytilldate" id="paytilldate"  autocomplete="off" class="form-control" />
    </div>
    <div class="col-4">
    Pay for Total days :   <input type="text" name="payfordays" id="payfordays" value="" readonly autocomplete="off" class="form-control" />
    </div>
	    <div class="col-4">
  Paying Amount :   <input type="text" name="payingamount" id="payingamount" value="" autocomplete="off" class="form-control" />
    </div>
	
  </div>
  
  
  <input type="hidden" name="patientid" id="patientid" value="{{$patient->id}}" autocomplete="off" class="form-control" /> 
  
    <input type="hidden" name="cabineid" id="cabineid" value="{{$cabine->id}}" autocomplete="off" class="form-control" /> 
  
     <input type="hidden" name="cabinetransactionid" id="cabinetransactionid" value="{{$cabinetransaction->id}}" autocomplete="off" class="form-control" /> 
   
  
 <p> 
  
  
</div>

  <button   type="submit"   target="_blank" class="btn btn-primary">Submit</button>
</form>





 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">


$(document).ready(function(){



 $(document).on('change', '#paytilldate', function(){
 console.log("A");
  var start = $('#unpaiddate').val();
    var end= $('#paytilldate').val();
	var date1 = new Date(start);
	var date2 = new Date(end);
 if (date1 > date2 )
 {
	alert("শেষের তারিখ অব্যশ্যই শুরুর তারিখ থেকে পেছনে হবে। পুনরায় ইনপুট দিন।"); 
	$('#enddate').val('');
 }
 
 var d= date2 - date1;
 
 
 var d =  d/(1000*60*60*24);
 d= d+1;
 var rate =  $('#cabinefairperday').val();   
 var paidamount=   rate* d;                           
 $('#payfordays').val(d);
  $('#payingamount').val(paidamount);
 
 
 
 
  
 });









});
</script>
	  


@stop