

@extends('layout.main')

@section('content')


<h2>Patient List: </h2>
<form      method="post"  action="{{route('patientlist.fetcthrecord')}}"   >
 @csrf

Patient Name:
<select  style="width:300px;" name="patient" id="patient" required>
  <option value=""></option>
@foreach ( $patient as $p  )
  <option value="{{$p->id}}"> ID: {{ $p->id }} Name: {{$p->name}} Mobile: {{ $p->mobile }}</option>
  @endforeach
</select>

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