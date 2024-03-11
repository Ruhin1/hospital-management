@extends('layout.main')





@section('content')


<style>
    .print-link{
        display: inline-block;
        padding: 10px 15px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
    }
    
    .print-link:hover{
        background-color: #0069d9;
        color: #fff;
        text-decoration: none;
    }
    </style>

<b>Patient Name:</b> {{ $patient->name }}<br>
<b>Patient Id:</b> {{ $patient->id }} <br>
<b>Mobile No:</b> {{ $patient->mobile }}



<?php 
$i=1;
?>

@if(!$order->isEmpty()) 

<h2>Pathology Transaction</h2>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Date</th>
        <th scope="col">Details</th>
    
      </tr>
    </thead>
  
    <tbody>
        @foreach ( $order as $o )
      <tr>
        <th scope="row">{{ $i  }}</th>
        <td>  {{ \Carbon\Carbon::parse($o->created_at)->format('d-m-Y') }}</td>
        <td><a class="print-link"  target="_blank" href="{{ route('reporttransaction.pdf', $o->id) }}">Print</a></td>
     
      </tr>

      <?php $i++; ?>
      @endforeach

    </tbody>
  </table>
@endif

<?php $i=1;?>

@if(!$appointment->isEmpty()) 

<h2>Doctor Transaction</h2>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Date</th>
        <th scope="col">Details</th>
    
      </tr>
    </thead>
  
    <tbody>
        @foreach ( $appointment as $o )
      <tr>
        <th scope="row">{{ $i  }}</th>
        <td>  {{ \Carbon\Carbon::parse($o->created_at)->format('d-m-Y') }}</td>
        <td><a class="print-link"  target="_blank" href="{{ route('doctortransition.pdf', $o->id) }}">Print</a></td>
     
      </tr>

      <?php $i++; ?>
      @endforeach

    </tbody>
  </table>
@endif

<?php $i=1;?>

@if(!$medorder->isEmpty()) 

<h2>Medicine Transaction</h2>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Date</th>
        <th scope="col">Details</th>
    
      </tr>
    </thead>
  
    <tbody>
        @foreach ( $medorder as $o )
      <tr>
        <th scope="row">{{ $i  }}</th>
        <td>  {{ \Carbon\Carbon::parse($o->created_at)->format('d-m-Y') }}</td>
        <td><a class="print-link"  target="_blank" href="{{ route('medicinetransition.pdf', $o->id) }}">Print</a></td>
     
      </tr>

      <?php $i++; ?>
      @endforeach

    </tbody>
  </table>
@endif

<?php $i=1; ?>
@if(!$admit_patient->isEmpty()) 

<h2> Admission Transaction</h2>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Date</th>
        <th scope="col">Details</th>
    
      </tr>
    </thead>
  
    <tbody>
        @foreach ( $admit_patient as $o )
      <tr>
        <th scope="row">{{ $i  }}</th>
        <td>  {{ \Carbon\Carbon::parse($o->created_at)->format('d-m-Y') }}</td>
        <td><a class="print-link"  target="_blank" href="{{ route('cabinetransaction.admitbill', $o->id) }}">Print</a></td> 
      </tr>
      <?php $i++; ?>
      @endforeach

    </tbody>
  </table>
@endif


<?php $i=1; ?>
@if(!$duetransition->isEmpty()) 

<h2> Cabine and Due Payment Transaction</h2>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Date</th>
        <th scope="col">Details</th>
    
      </tr>
    </thead>
  
    <tbody>
        @foreach ( $duetransition as $o )
      <tr>
        <th scope="row">{{ $i  }}</th>
        <td>  {{ \Carbon\Carbon::parse($o->created_at)->format('d-m-Y') }}</td>
        <td><a class="print-link"  target="_blank" href="{{ route('duepaymenttrans.pdf', $o->id) }}">Print</a></td> 
      </tr>
      <?php $i++; ?>
      @endforeach

    </tbody>
  </table>
@endif


<?php $i=1; ?>
@if(!$serviceorder->isEmpty()) 

<h2> Service Transaction</h2>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Date</th>
        <th scope="col">Details</th>
    
      </tr>
    </thead>
  
    <tbody>
        @foreach ( $serviceorder as $o )
      <tr>
        <th scope="row">{{ $i  }}</th>
        <td>  {{ \Carbon\Carbon::parse($o->created_at)->format('d-m-Y') }}</td>
        <td><a class="print-link"  target="_blank" href="{{ route('servicetranstion.pdf', $o->id) }}">Print</a></td> 
      </tr>
      <?php $i++; ?>
      @endforeach

    </tbody>
  </table>
@endif


<?php $i=1; ?>
@if(!$surgerytransaction->isEmpty()) 

<h2> Surgery Transaction</h2>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Date</th>
        <th scope="col">Details</th>
    
      </tr>
    </thead>
  
    <tbody>
        @foreach ( $surgerytransaction as $o )
      <tr>
        <th scope="row">{{ $i  }}</th>
        <td>  {{ \Carbon\Carbon::parse($o->created_at)->format('d-m-Y') }}</td>
        <td><a class="print-link"  target="_blank" href="{{ route('surgerytansition.pdf', $o->id) }}">Print</a></td> 
      </tr>
      <?php $i++; ?>
      @endforeach

    </tbody>
  </table>
@endif

<?php $i=1; ?>
@if(!$advancedeposit->isEmpty()) 

<h2>Advance Deposit by Patient</h2>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Date</th>
        <th scope="col">Details</th>
    
      </tr>
    </thead>
  
    <tbody>
        @foreach ( $advancedeposit as $o )
      <tr>
        <th scope="row">{{ $i  }}</th>
        <td>  {{ \Carbon\Carbon::parse($o->created_at)->format('d-m-Y') }}</td>
        <td><a class="print-link"  target="_blank" href="{{ route('advancedeposit.pdfprint', $o->id) }}">Print</a></td> 
      </tr>
      <?php $i++; ?>
      @endforeach

    </tbody>
  </table>
@endif



@stop