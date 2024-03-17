{{-- @extends('layout.main')

@section('content') --}}
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
    {{-- @php
$b = 0;
$groupedRows = [];

foreach ($virtualTable as $row) {
    $groupedRows[$row->medicine_id][] = $row;
}
@endphp --}}
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
            </tr>
        </thead>
        <tbody>
            {{$medicneCrateDate}}<br/>
            {{$startDate}}<br/>
            {{$endDate}}<br/>
        </tbody>
    </table>  
</body>
</html>