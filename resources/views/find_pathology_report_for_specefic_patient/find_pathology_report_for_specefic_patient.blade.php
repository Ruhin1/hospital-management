

@extends('layout.main')

@section('content')



<h6  style="background-color:yellow" > যে প্যাসেন্টের প্যাথলজি রিপোর্ট খুজে পেতে চান তার  মোবাইল নম্বর সিলেক্ট করেন   </h6>

<form      method="post"  action="{{route('pathologyreportmaking.showreportforspecificid')}}"   >
 @csrf

<select name="mobile"  style="width:300px" id="patinetmobilenumber">
  <option value=""></option>
@foreach($patientmobile as $p)
 <option value="{{$p}}">{{$p}}</option>
  @endforeach
</select>


  <button   type="submit"   target="_blank" class="btn btn-primary">Submit</button>
</form>





 <script src="{{asset('jquery/jquery.min.js')}}"></script>  
 <script src="{{asset('jquery_val/dist/jquery.validate.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">


$(document).ready(function(){

 $(document).on('change', '#startdate , #enddate', function(){
 
  var start = $('#startdate').val();
    var end= $('#enddate').val();
	var date1 = new Date(start);
	var date2 = new Date(end);
 if (date1 > date2 )
 {
	alert("শেষের তারিখ অব্যশ্যই শুরুর তারিখ থেকে পেছনে হবে। পুনরায় ইনপুট দিন।"); 
	$('#enddate').val('');
 }
  
 });

	    $('#patinetmobilenumber').select2();








});
</script>
	  


@stop