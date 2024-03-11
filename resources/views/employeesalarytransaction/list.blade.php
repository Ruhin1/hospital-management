

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





 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">


$(document).ready(function(){

$("#patient").select2();





});
</script>
	  


@stop