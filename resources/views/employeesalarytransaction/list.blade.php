

@extends('layout.main')

@section('content')



<h6  style="background-color:yellow" > যে এম্পলয়ির বেতনের ট্রাঞ্জিশন দেখতে চান তার নাম সিলেক্ট করেন  </h6>

<form      method="post"  action="{{route('employeetransactioncon.employeesalaryfetch')}}"   >
 @csrf
  <div class="form-group">

<select  style="width:300px;" name="employee" id="employee" required>
  <option value=""></option>
@foreach ( $employeedetails as $e  )
  <option value="{{$e->id}}">{{$e->name}}</option>
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