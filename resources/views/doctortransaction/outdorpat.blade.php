

@extends('layout.main')

@section('content')



<h6  style="background-color:yellow" > আউট ডোর ডাক্তার দেখাতে আসা রোগীর সিরিয়ালের লিস্ট  </h6>

<form      method="post"  action="{{route('doctortransition.serial')}}"   >
 @csrf
  <div class="form-group">
  
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
  
ডাক্তারের নামঃ
<select  style="width:300px;" name="doctor" id="doctor" required>
  <option value=""></option>
@foreach ( $doctor as $d  )
  <option value="{{$d->id}}">{{$d->name}}</option>
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

$("#doctor").select2();





});
</script>
	  


@stop