

@extends('layout.main')

@section('content')



<h6  style="background-color:yellow" > যে আউট ডোর প্যাশেন্টের বাকির ট্রাঞ্জিশন দেখতে চান তার আইডি  সিলেক্ট করেন  </h6>

<form      method="post"  action="{{route('dueofpatient.dueshowoutdor')}}"   >
 @csrf
  <div class="form-group">

<select  style="width:300px;" name="patient" id="patient" required>
  <option value=""></option>
@foreach ( $patient as $p  )
  <option value="{{$p->id}}">{{$p->id}}</option>
  @endforeach
</select>

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

$("#patient").select2();





});
</script>
	  


@stop