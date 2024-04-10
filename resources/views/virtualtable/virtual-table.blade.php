<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Virtual Table</title>
<style>

.virtual-table{
background: #D1E7DD;
color: black;
font-weight: bold;
text-align: center;
text-transform: uppercase;
padding: 8px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table thead tr th,
table tbody tr th{
    background: #D1E7DD;
    border-bottom: 2px solid black; 
}

/* table tbody tr td{
   
    
} */

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    /* background: #D1E7DD; */
}



.pdf-div{
    display: flex;
    justify-content:end;
    margin:20px 0; 
}

.pdf-div a{
    text-decoration: none;
    padding: 5px 10px;
    font-weight: bold;
    text-transform: uppercase;
    text-align: center;
    background: #0069D9;
    border-radius: 3px; 
    color: #fff;
}

 

</style>
</head>
<body>
    @php

$groupedRows = [];

foreach ($virtualTable as $row) {
    $groupedRows[$row->medicine_id][] = $row;
}
@endphp
    <h2 class="virtual-table">Virtual Table</h2>
    <div class="pdf-div">
        <a class="print-pdfruhin" href="{{url('virtual-table/yes')}}">Print PDF</a>
    </div>
    <table> 
        <thead>  
            <tr>
                <th>ID</th>
                <th>Medicine ID</th>
                <th>User ID</th>
                <th>Patient ID</th>
                <th>Order ID</th>
                <th>Return order id</th>
                <th>Medicine company order id</th>
                <th>Unit price</th>
                <th>Transition Type</th>
                <th>Quantity</th>
                <th>Balance</th>
                <th>Type</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groupedRows as $medicineId => $rows)

            <tr class="medicine-name">
                <th colspan="13">
                    Matched Medicine Name: 
                    {{-- Check if medicine exists --}}
                    @php
                       $medicine = \App\Models\medicine::find($medicineId);
                    @endphp
                    @if($medicine)
                        <?php 
                        
                         echo $medicine->name;
                         
                        ?>
                    @else
                        {{-- Handle case when medicine is not found --}}
                        Medicine not found
                    @endif
                </th>
            </tr> 
            

            <tr>
                    <th>ID</th>
                    <th>Medicine ID</th>
                    <th>User ID</th>
                    <th>Patient ID</th>
                    <th>Order ID</th>
                    <th>Return order id</th>
                    <th>Medicine company order id</th>
                    <th>Unit price</th>
                    <th>Transition Type</th>
                    <th>Quantity</th>
                    <th>Balance</th>
                    <th>Type</th>
                    <th>Date</th>
            </tr>
           
            
                <?php  $b = $medicine->stock;?>
                @foreach($rows as $row)
                <tr>
                   
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->medicine_id }}</td>
                    <td>{{ $row->user_id }}</td>
                    <td>{{ $row->patient_id }}</td>
                    <td>{{ $row->order_id }}</td>
                    <td>{{ $row->return_order_id }}</td>
                    <td>{{ $row->medicinecompanyorder_id }}</td>
                    <td>{{ $row->unit_price }}</td>
                    <td>
                        @if ($row->transitiontype == 1)
                        Buy Medicine From Company
                        @elseif ($row->transitiontype == 2)
                        Return Medicine To Company
                        @elseif ($row->transitiontype == 3)
                        Frist Time Stock own Medicine
                        @endif
                    </td>
                    
					@if (@$loop->first)
                    <td>{{ $medicine->stock }}</td>
                    @else
                    <td>{{ $row->Quantity  }}</td>
                    @endif
                    <td>
                       
                        <?php 
					   
                        if($row->order_id != null) 
                        {
                            if ($b != 0) {
                             $b =$b -  $row->Quantity;
                            }
                        }
                        if($row->return_order_id  != null)
                        {
                           $b = $b + $row->Quantity; 
                        }
                        if($row->medicinecompanyorder_id != null )
                        {
                          if ($row->transitiontype == 1)
                          {
                           $b = $b + $row->Quantity;
 
                          }	
                          if($row->transitiontype == 2){
                             if ($b != 0) {
                                  $b =$b- $row->Quantity;
                             }
                               
                             }
                          if($row->transitiontype == 3){
     
                               $b = $b + $row->Quantity;
                             }							
                        }
                        ?>
					   
					   
					   {{$b}} 
                    </td>
                    <td>{{ $row->type }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d-m-Y h:i A') }}</td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>  
</body>
</html>