

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





 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">


$(document).ready(function(){

$("#cabineid").select2();





});
</script>
	  


@stop