

@extends('layout.main')

@section('content')


<h6 style="color:red;">আপনি যে দুই তারিখসহ ও দুই তারিখের মধ্যবর্তী সকল ডেটের মোট ইনকাম সিট দেখতে চান তা নিচের ইনপুট ফিল্ডে লিখুন। 
ধরুন আপনি ১ আগষ্ট ২০২১  হতে ৭ আগষ্ট ২০২১ পর্যন্ত হওয়া বিক্রি ও খরচের ব্যালেন্স সিট দেখতে চাচ্ছেন। 
সেই ক্ষেত্রে <b style="color:green">শুরুর তারিখ</b> এর স্থলে ১ আগষ্ট ২০২১ হবে ও<b style="color:green"> শেষের তারিখ</b> এর স্থলে  ৭ আগষ্ট ২০২১ হবে।     </h6>
<br>
<h6  style="background-color:yellow" >যদি শুধু একটি নির্দিষ্ট ডেটের আয় ও খরচের হিসাব দেখতে চান সেই ক্ষেত্রে <b style="color:green"> শেষের তারিখ</b> এর স্থলে ও প্রথম তারিখা বসান। যদি শুধু ৭ আগস্ট এর ব্যালেন্স সিট দেখতে চান সেই ক্ষেত্রে দুই ক্ষেত্রে ৭ আগস্ট সিলেক্ট করেন।   </h6>

<form      method="post"  action="{{route('medicinetransition.fetchtwodate')}}"   >
 @csrf
  <div class="form-group">
   <label for="birthday">শুরুর তারিখ :</label><br>
  <input type="datetime-local" id="startdate" name="startdate" required ><br>
  @if($errors->has('startdate'))
    <div class="error"><h2 style="font-size:15px;color:red;">{{ $errors->first('startdate') }}</h2></div>
@endif
  
  
  </div>
  <div class="form-group">
    <label for="birthday">শেষের  তারিখ :</label><br>
  <input type="datetime-local" id="enddate" name="enddate"><br>
    @if($errors->has('enddate'))
    <div   class="error"><h2 style="font-size:20px;color:red;"> {{ $errors->first('enddate') }}</h2></div>
@endif
  </div>

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





});
</script>
	  


@stop