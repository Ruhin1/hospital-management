@php
    $b = 0;
    $groupedRows = [];

    foreach ($virtualTable as $row) {
        $groupedRows[$row->medicine_id][] = $row;
    }
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Virtual Table</title>
    <style>

        table {
            width: 100%;
            border-collapse: collapse;
        }
    
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
    
        .head {
            position: sticky;
            top: 0;
            background-color: #f2f2f2;
        }
    
        tbody {
            overflow-y: auto; 
        }

        .medicine-name{
           text-align: center;
        }
        .medicine-name th{
           
           border: 1px solid #ddd;
           background-color: #f2f2f2;
       }
    </style>
</head>
<body>
    <table> 
        <thead class="head">
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
            </tr>
        </thead>
        <tbody>
            @foreach($groupedRows as $medicineId => $rows)
                <tr class="medicine-name">
                    <th colspan="24">
                       Matched Medicine Name: 
                        {{App\Models\medicine::find($medicineId)->name}}
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
                    </tr>
                </tr>
                <?php $b=0; ?> 
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
                        @endif
                    </td>
                    
					<td>{{ $row->Quantity }}</td>
                    <td>
                       
					   <?php 
					   
					   if($row->order_id != null) 
					   {
						  $b = $b -  $row->Quantity;
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
	
	                          $b = $b - $row->Quantity;
                            }
                         if($row->transitiontype == 3){
	
	                          $b = $b + $row->Quantity;
                            }							
					   }
					   
					   
					   ?>
					   
					   
					   {{$b}} 
                    </td>
                    <td>{{ $row->type }}</td>
                    
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>   
</body>
</html>