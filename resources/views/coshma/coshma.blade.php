<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>cosha</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            header {
                width: 100%;
                height: 200px;
            }

            header img {
                width: 100%;
                height: 200px;
            }

            .detels {
                display: flex;
                justify-content: space-between;
                /* border-top: 1px solid black; */
                border-bottom: 1px solid black;
                padding: 5px 0;
            }

            .chosma-title {
                margin-top: 40px;
                display: flex;
                justify-content: space-between;
            }

            .coshma table {
                margin-top: 30px;
                width: 100%;
                text-align: center;
            }

            th,
            td {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #border-none {
                border: none;
            }

            .m-content {
                display: flex;
                justify-content: space-between;
                margin: 10px 0;
            }

            .ipd h4 {
                margin: 18px 0;
            }

            .m-content .ipd h4 span {
                padding: 8px;
            }

            .select {
                border: 1px solid green;
                border-radius: 5px;
            }

            .m-content .signacher img {
                width: 120px;
                height: 120px;
                display: block;
            }

            .m-content .signacher strong {
                margin: 0 20px;
            }

            .m-content .signacher hr {
                background: black;
                margin-top: 10px;
                width: 120px;
                padding: 1px;
            }

            .bottom {
                display: flex;
                justify-content: space-between;
            }

            .bottom .img {
                width: 40%;
            }

            .bottom div {
                width: 60%;
                padding: 0 20px;
            }

            .bottom div h3 {
                color: green;
                text-align: center;
                text-decoration: underline;
                margin: 10px 0;
                font-size: 16;
            }

            .bottom div ol li {
                margin: 10px 0;
                font-size: 16px;
            }

            .bottom .img img {
                width: 200px;
                margin: 0 10px;
            }

            footer {
                width: 100%;
                height: 100px;
                position: fixed;
                bottom: 0;
                left: 0;
            }

            footer img {
                width: 100%;
                height: 200px;
            }
        </style>
    </head>
    <body>
        <header>
            <img src="{{ asset('img/header.jpeg') }}" alt="header" />
        </header>
        <main>
            <div class="detels">
                <p>Name: {{$data['name']}}</p>
                <p>Age:{{$data['age']}} Years</p>
                <p>Date:{{$data['brith']}}</p>
               
            </div>
            <div class="chosma-title">
                <div>
                    <h1>Right Eye</h1>
                    <h1>(OD)</h1>
                </div>
                <div>
                    <h1>6/</h1>
                </div>
                <div>
                    <h1>6/</h1>
                </div>
                <div>
                    <h1>Left Eye</h1>
                    <h1>(Os)</h1>
                </div>
            </div>
            <div class="coshma">
                <table>
                    <thead>
                        <tr>
                            <th>Sph.</th>
                            <th>Cyl.</th>
                            <th>Axis.</th>
                            <th id="border-none"></th>
                            <th>Sph.</th>
                            <th>Cyl.</th>
                            <th>Axis.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$data['resph']}}</td>
                            <td>{{$data['recyl']}}</td>
                            <td>{{$data['reaxis']}}</td>
                            <td id="border-none"></td>
                            <td>{{$data['lesph']}}</td>
                            <td>{{$data['lecyl']}}</td>
                            <td>{{$data['leaxis']}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">6/{{$data['rebyes']}}</td>
                            <td id="border-none" colspan="1"></td>
                            <td colspan="3">6/{{$data['lebyes']}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Add. + {{$data['add']}}</strong></td>
                            <td colspan="5"><strong>Diopter: {{$data['diopter']}}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="m-content">
                <div class="ipd">
                    <h4>
                        IPD
                        <span style="margin-left: 20px; margin-right: 20px"
                            >:</span
                        >
                        {{$data['ipd']}} mm
                    </h4>
                    <h4>
                        Type
                        <span style="margin-left: 20px; margin-right: 20px"
                            >:</span>
               
                        <?php 
                        $coshmaType = App\Models\coshma::where('type','=',2)->get();
                        
                        ?>
                        @foreach ($coshmaType as $row)
                        <span style="margin-left: 20px; margin-right: 20px"
                        @if (in_array($row->id, $data['type']))
                        class="select"  
                        @endif
                        >{{$row->value}}</span>
                        @if (!$loop->last)
                            /
                        @endif
                        @endforeach
                        
                        
                    </h4>
                    <h4>
                        Colour
                        <span style="margin-left: 20px; margin-right: 20px"
                            >:</span
                        >
                        <?php 
                        $coshmaColor = App\Models\coshma::where('type','=',3)->get();
                       
                        
                        ?>
                        @foreach ($coshmaColor as $row)
                        <span style="margin-left: 20px; margin-right: 20px"
                        @if (in_array($row->id, $data['color']))
                        class="select"  
                        @endif
                        >{{$row->value}}</span>
                         @if (!$loop->last)
                            /
                        @endif
                        @endforeach  
                    </h4>
                    <h4>
                        Remarks
                        <span 
                        style="margin-left: 20px; margin-right: 20px"
                            >:</span>

                            <?php 
                            $coshmaRemarks = App\Models\coshma::where('type','=',4)->get();
                           
                            ?>

                            @foreach ($coshmaRemarks as $row)
                            <span style="margin-left: 20px; margin-right: 20px"
                            @if (in_array($row->id, $data['remarks']))
                            class="select"  
                            @endif
                            >{{$row->value}}</span>
                           
                            @if (!$loop->last)
                                /
                            @endif
                            @endforeach
                        
                    </h4>
                </div>
                <div class="signacher">
                    <img src="{{ asset('img/sig.png') }}" alt="" />
                    <hr />
                    <strong>signature</strong>
                </div>
            </div>
            <div class="bottom">
                <!-- <div class="img">
                   <img src="{{ asset('img/coshma1.png') }}" alt="logo" /> 
                </div>  -->
                <div>
                    <h3>নিচের নির্দেশনা গুলো মেনে চলুন</h3>
                    <ol>
                            @foreach ($inst as $row)
                                <li>{{$row->value}}</li>
                            @endforeach 
                  
                     
                    </ol> 
                </div>

                <div class="img">
                    <img src="{{ asset('img/coshma2.png') }}" alt="logo" />
                </div>
            </div>
        </main>
        <footer>
            <img src="{{ asset('img/header.jpeg') }}" alt="footer" />
        </footer>
    </body>
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
                window.location.href = "{{ route('coshma.index') }}";

            } else {
                // If the print dialog is closed, assume print operation was successful
                window.location.href = "{{ route('coshma.index') }}";
            }
        }, 5000); // Adjust the duration (in milliseconds) as needed

        // Event listener to detect when the print dialog window is closed
        window.addEventListener('focus', function() {
            // Update the flag when the focus returns to the main window
            printDialogOpen = false;
        });
    </script>
</html>
