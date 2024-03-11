

@extends('layout.main')

@section('content')

<body>


  
<div class="container">
  <div class="row">
    <div style="background-color: #add8e6" class="col-sm">
  <h2 style="color:red">  এই মাসে  আউটডোরে ডাক্তার থেকে আয়  </h2>
  <hr>
  

  <table class="table">
  <thead>
    <tr>
    
      <th scope="col"> Doctor Name </th>
	  <th scope="col"> Patient Name </th>
      <th scope="col"> Total Fees   </th>
      <th scope="col">Pay by Cash </th>
     <th scope="col">Adjustment with Deposit </th>
	 <th scope="col"> Due </th>
    </tr>
  </thead>
  <tbody>
  

    
	@foreach($doctorappointmenttransactions as $d)
	

	<tr>
      <th >{{$d->doctor->name}}</th>
	  <td>{{$d->total_unit}}</td>
      <td>{{$d->total_amount}}</td>
	  <td>{{$d->pay_in_cash}}</td>
	<td>{{$d->adjust_with_advance}}</td>
      <td>{{$d->total_due}}</td> 

    </tr>
@endforeach
  </tbody>
</table>

  </div>
</div>

 
 






</bodY>
@stop