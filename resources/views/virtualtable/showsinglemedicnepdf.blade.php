<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Single Medicne</title>
    <style>
            *{margin: 0;padding: 0;box-sizing: border-box}
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

            .header{
                display: flex;
                justify-content: space-between;
                padding: 15px 50px;

            }

            .header .logo{
            width: 20%;
            }

            .header .logo img{
                width: 100%;
            }

            .header .description{
            width: 80%;
            padding-left: 100px; 
            }

            .header .description span{
                
            }

            .pdf-div{
                display: flex;
                justify-content:end;
                margin:20px 0; 
            }

            .pdf-div .print-pdfruhin{
            
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
<body style="font-family: Times New Roman;">
   
    <div class="header">
        <div class="logo">
            <img src="img/logo.jpg" alt="logo">
        </div>
        <div class="description">
            <h1>Khulna City Medical College Hospital</h1> <br/>
            <span>33, KDA Avenue, Hotel Royal Mor, Khulna Sadar, Khulna.</span><br/>
            <span>Reg No:234555 Diagnostic center Reg:689990</span><br/>
            <span>Mobile:0000000001</span> 
        </div>
    </div> 
    <br/>
    <div class="pdf-div">
        <button class="print-pdfruhin" onclick="printPage()" >Print PDF</button>
    </div> 
        
    <?php 
    $medicine = \App\Models\medicine::find($data['medicneName']);
    $sdate = strtotime(\Carbon\Carbon::parse($data['startDate'])->format('d-m-Y') .' 12:00');
    $edate = strtotime(\Carbon\Carbon::parse($data['endDate'])->format('d-m-Y') .' 12:00');
    
    ?>
    
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
                <th>Remaining</th>
                <th>Type</th>
                <th>Date</th>
            </tr>
            <tr>
                <th colspan="4">Matched Medicine Name:
                    @if ($medicine)
                        {{ $medicine->name }}
                    @endif
                </th>
                <th colspan="4">Preveus Stock:
                    <?php
                    $med = $data['medicneName'];
                    $value = \App\Models\medicineCompanyTransition::where('medicine_id','=',$med)->first()->Quantity;
                    $value = intval($value); 
                    $b = $value;
                    $sb = $value;
                    foreach ($virtualTable as $row){
                    $rdate = strtotime(\Carbon\Carbon::parse($row->created_at)->format('d-m-Y') . ' 12:00');
                    if($rdate  < $sdate){

if ($row->order_id != null) {
    if ($sb != 0) {
        $sb = $sb - $row->Quantity;
    }
}

if ($row->return_order_id != null) {
        $sb = $sb + $row->Quantity;
}

if ($row->medicinecompanyorder_id != null) {
    
    if ($row->transitiontype == 1) {
        $sb = $sb + $row->Quantity;
    }

    if ($row->transitiontype == 2) {
        if ($sb != 0) {
            $sb = $sb - $row->Quantity;
        }
    }

    
}


}else {
break;
}  
                        
                    } 
                       
                    ?>
                    @if ($medicine)
                    Balance as on {{ \Carbon\Carbon::parse($data['startDate'])->subDay()->format('d-m-Y') }} was : {{ $sb }}
                    @endif
                </th>
                <th colspan="5">Date: <span
                        style="color:green">{{ \Carbon\Carbon::parse($data['startDate'])->format('d-m-Y h:i A') }}</span> to
                    <span style="color: green">{{ \Carbon\Carbon::parse($data['endDate'])->format('d-m-Y h:i A') }}</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($virtualTable))
                @foreach ($virtualTable as $row)
                    @php
                        $rdate = strtotime(\Carbon\Carbon::parse($row->created_at)->format('d-m-Y') . ' 12:00');
                    @endphp
   
                @if (!($sdate > $rdate))
                    @if ($edate >= $rdate)
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

                                
                                    <td>{{ $row->Quantity  }}</td>
                                
                                
                                <td>
   
                                    <?php
                                    
                                    if ($row->order_id != null) {
                                        if ($b != 0) {
                                            $b = $b - $row->Quantity;
                                        }
                                    }
                                    if ($row->return_order_id != null) {
                                        $b = $b + $row->Quantity;
                                    }
                                    if ($row->medicinecompanyorder_id != null) {
                                        if ($row->transitiontype == 1) {
                                            $b = $b + $row->Quantity;
                                        }
                                        if ($row->transitiontype == 2) {
                                            if ($b != 0) {
                                                $b = $b - $row->Quantity;
                                            }
                                        }
                                       
                                    }
                                    ?>
                                    {{ $b }}
                                </td>
                                <td>{{ $row->type }}</td>
                                <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d-m-Y h:i A') }}</td>
                            </tr>
                    @else
                        @break
                @endif
                @else
                    <?php
                    
                    if ($row->order_id != null) {
                        if ($b != 0) {
                            $b = $b - $row->Quantity;
                        }
                    }
                    if ($row->return_order_id != null) {
                        $b = $b + $row->Quantity;
                    }
                    if ($row->medicinecompanyorder_id != null) {
                        if ($row->transitiontype == 1) {
                            $b = $b + $row->Quantity;
                        }
                        if ($row->transitiontype == 2) {
                            if ($b != 0) {
                                $b = $b - $row->Quantity;
                            }
                        }
                        
                    }
                    ?>
                @endif
            @endforeach
            
        @else
            <tr>
                <td colspan="12" style="color: green">
                    No have a transition not available
                </td>
            </tr>
        @endif
    </tbody>
   </table>
   
    <script>
        function printPage(){
            window.print();
        }
    </script>
</body>
</html>