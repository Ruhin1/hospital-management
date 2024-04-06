

@extends('layout.main')

@section('content')


যে প্যাসেন্টের ক্যাশ ট্রাঞ্জিশন দেখতে চান তার আইডি সিলেক্ট করেন। 

<form      method="post"  action="{{route('finalreport.patient_cash_fetch')}}"   >
 @csrf



Patient Name:
<select  style="width:300px;" name="id" id="user" required>
  <option value=""></option>
@foreach ( $patient as $p  )
  <option value="{{$p->id}}">ID: {{$p->id}}  Name: {{$p->name}} Mobile: {{$p->mobile}}  </option>
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



$("#user").select2();














});
</script>
	  


@stop