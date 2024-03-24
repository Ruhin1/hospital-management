<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <style>
         #three{
         min-height: 800px;
         }
         #c img {
         width:100%;
         }
         #four img {
         width:100%;
         position: fixed;
  bottom: 0;
  left: 0;
         }
         .m-content{
          display: flex;
         }
         .m-content .m-data{
          width: 30%;
         }
        .m-content .m-list{
          width: 70%;
        }
        .m-content .m-list table tbody tr td{
          padding: 5px 5px;

        }


      </style>
   </head>
   <body style="font-family:nikosh">
      <div  class="container">
      <div id="one" class="row">
         <div id="c" >
          @if ($doctor->footerimage)
          <img src="{{
            asset('/img/'.$doctor->footerimage);
         }}" alt="logo">
         @else
         <img src="{{
          asset('/img/20230601001256.png');
       }}" alt="logo">
        @endif
           
            <hr>
         </div>
         <hr>
      </div>
      <div style="height:10px; font-size:13px;" id="two" >
         <div style="width:50%; float:left;" >
            <b> Patient Name:</b> {{$data->name}}
         </div>
         <div style="width:10%;float:left;" >
            <b>Age:</b> {{$data->age}}
         </div>
         <div style="width:13%;float:left;" >
            <b>Sex:</b>{{$data->sex}}
         </div>
         <div style="width:17%;float:left;" >
            <b>Date:</b><?php  echo date('d/m/y', strtotime($prescription->created_at)); ?> 
         </div>
      </div>
      <hr>

      <div class="m-content">
        <div class="m-data">
          <div>
        <h3>History:</h3>
        <p> {!! nl2br(e($prescription->history)) !!}</p>
          </div>
          <div>
            <h3>Investigation:</h3>
            <p>{!! nl2br(e($prescription->investigation)) !!}"</p>
          </div>
          <div>
           <h3>RX:</h3>
           <p style=" background-color:#00FA9A; font-family:nikosh; font-size:15px;"> পরবর্তী সাক্ষাতঃ {{ $prescription->meettingtimefornext }} দিন পর   </p><br>	

          </div>
        </div>
        <div class="m-list">
          <table>
            <thead>
              <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
             
              @foreach($prescription->prescriptionmedicinelist as $key=>$presmed)
              <tr>
                <td style="font-weight: bold">{{$key+1}} {{$presmed->medicine_category->name}}. {{$presmed->medicine->name}} </td>          
                <td>
                  @if ( $presmed->prescriptionusages != null)
                  {{$presmed->prescriptionusages->usage}} 
                  @endif
                </td>
                <td>
                  @if ($presmed->prescriptionkhabaragepore != null)
                  {{$presmed->prescriptionkhabaragepore->khabaragebapore}}
                  @endif
                </td>
                <td>
                  @if($presmed->day != null )
                  {{$presmed->day}} দিন
                  @endif
                </td>
                <td> {{$presmed->comment}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
     
      <br>
      <div id="four">
        @if ($doctor->footerimage)
        <img src="{{asset('/img/' . $doctor->footerimage)}}" alt="fotter-logo">
        @else
        <img src="{{ asset('/img/20230601001256footerimage.png') }}" alt="fotter-logo">
        @endif
      </div>
      <script>
        window.onload = function() {
            // Automatically print the page
            window.print();
        };
    // Flag to track whether the print dialog is still open
        var printDialogOpen = true;

        // Start a timer to check if the print dialog is closed
        var printTimer = setTimeout(function() { 
            // Check if the print dialog is still open
            if (printDialogOpen) {
                // If the print dialog is still open after the timeout, assume print operation was canceled
                window.location.href = "{{ route('prescription.index') }}";

            } else {
                // If the print dialog is closed, assume print operation was successful
                window.location.href = "{{ route('prescription.index') }}";
            }
        }, 5000); // Adjust the duration (in milliseconds) as needed

        // Event listener to detect when the print dialog window is closed
        window.addEventListener('focus', function() {
            // Update the flag when the focus returns to the main window
            printDialogOpen = false;
        });

    </script>
   </body>
</html>