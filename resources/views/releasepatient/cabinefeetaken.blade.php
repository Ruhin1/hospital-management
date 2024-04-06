

@extends('layout.main')

@section('content')



<h6  style="background-color:yellow" > প্যাসেন্টের  কেবিন সিলেক্ট করেন   </h6>

<form      method="post"  action="{{route('cabinefees.trans')}}"   >
 @csrf
  <div class="form-group">

<select  style="width:300px;" name="cabineid" id="cabineid" required>
  <option value=""></option>
@foreach ( $cabine as $c  )
  <option value="{{$c->id}}">{{$c->serial_no}}</option>
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

$("#cabineid").select2();





});
</script>
	  


@stop