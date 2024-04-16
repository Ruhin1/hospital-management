@extends('layout.main')

@section('content')



    <style>
        .modal-lg {
            max-width: 90% !important;

        }



        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
   

    </style>

    </head>

    <body id="bodysellcorner">


        @if ($message = Session::get('success'))
            <div style="background-color:red;" class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="container" style="background-color:#EEE8AA; ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-primary" role="alert">
                        Prescriptions for glasses and medicine can be made here.  You can create both prescriptions or create either prescription as well.  But remember you are required to select Paitinet id before making any prescription.
                      </div>
                     
                    
                </div>
            </div>
            <div style="display: flex; justify-content:space-between">
                <h2>Write Prescription</h2>
                
            <button class="btn btn-primary coshma-prection">Add Coshma prection</button>
            </div>
            <span id="form_result"></span>

            <form method="post" action="{{ route('prescription.store') }}" id="sample_form" class="form-horizontal"
                enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-lg-8"> </div>
                    <div class="col-lg-4">
                        <input type="checkbox" id="medicneprescription" name="medicneprescription" value="1">
                        <label for="vehicle1">Add Medicne Prescription</label>
                    </div>
                </div>
                

                <div id="cusid" class="form-group">
                    <label class="control-label col-md-4">Patinet Id <span style="color: red">(*)</span>: </label>
                    <div class="col-md-8">
                        <select id="customer_id" class="form-control " name="customer_id" required style='width: 270px;'>


                        </select>
                    </div>
                </div>


                <table class="table" id="products_table">
                    <thead>
                        <tr>
                            <th style="width:100px;"> ক্যাটাগরি <span style="color: red">*</span></th>
                            <th>মেডিসিন<span style="color: red">*</span></th>
                            <th>ব্যবহার<span style="color: red">*</span></th>

                            <th>খাবার <span style="color: red">*</span></th>
                            <th style="width:150px;">দিন </th>

                            <th>কমেন্ট </th>
                            <!--	<th style="width:150px;" >price </th> -->



                        </tr>
                    </thead>
                    <tbody class="addmoreproduct">
                        <tr id="product0">


                            <td>
                                <select id="category" class="form-control category" name="category[]" 
                                    style='width: 100px;'>

                                </select>
                            </td>



                            <td>
                                <select id="medicine_name" class="form-control medicine_name" name="medicine_name[]"
                                   style='width: 200px;'>

                                </select>
                            </td>

                            <td>
                                <select id="usages" class="form-control usages" name="usages[]" style='width: 150px;'>

                                </select>
                            </td>

                            <td>
                                <select id="khabaragepore" class="form-control khabaragepore" name="khabaragepore[]"
                                    style='width: 150px;'>

                                </select>
                            </td>

                            <td>
                                <input type="text" name="days[]" id="days" class="form-control nexttext days"
                                    style='width: 50px;' autocomplete="off" />
                            </td>

                            <td>
                                <input type="text" name="comment[]" id="comment" class="form-control nexttext  comment"
                                    autocomplete="off" style='width: 200px;' />
                            </td>



                            <td>

                                <a class="remove" style="font-size:30px; color:red;" href="#"> ×</a>

                            </td>


                        </tr>
                        <tr id="product1"></tr>
                    </tbody>
                </table>







                <div id="child">

                </div>


                <button type="button" id="add_row" class="btn btn-primary">ADD Medicine</button>



                <div class="row">
                    <div class="col-4">

                        <br> দিন পরে আসবেন। <input type="text" name="nextdate" id="nextdate"
                            class="form-control  nextdate" autocomplete="off" />

                    </div>

                </div>



                <div id="history" class="form-group">
                    <label for="history">History:</label>
                    <textarea class="form-control" name="history" rows="3"></textarea>
                </div>

                <div id="investigation" class="form-group">
                    <label for="Investigation">Investigation:</label>
                    <textarea class="form-control" name="investigation" rows="3"></textarea>
                </div>


                <div id="coshma-from">
                    <h3 style="text-align: center; margin:20px;">Write coshma Prescription</h3>
                    <div class="row">
                        <div class="col-lg-8"> </div>
                        <div class="col-lg-4">
                            <input type="checkbox" id="coshmaprescription" name="coshmaprescription" value="2">
                            <label for="vehicle1">Add coshma Prescription</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="Date">Date<span style="color: red">*</span>:</label>
                            <input type="datetime-local" class="form-control" name="brith" id="brith">
                         </div>
                        <div class="col-lg-3">
                            <label for="Date">Ipd<span style="color: red">*</span>:</label>
                            <input type="number" class="form-control" name="ipd" id="ipd"  placeholder="write ipd....">
                         </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-6 border">
                           <div class="row">
                            <div class="col-lg-12">
                                <h3>Right Eye (OD)</h3> 
                                
                            </div>
                            <div class="col-lg-6">
                               <label for="resph">Sph<span style="color: red">*</span></label>
                               <input type="text" class="form-control" id="resph" name="resph"  placeholder="write sps....">
                            </div>
                            <div class="col-lg-6">
                                <label for="recyl">Cyl<span style="color: red">*</span></label>
                               <input type="number" class="form-control" id="recyl" name="recyl" placeholder="write cyl....">
                            </div>
                            <div class="col-lg-6">
                                <label for="reaxis">Axis</label>
                               <input type="number" class="form-control" id="reaxis" name="reaxis"  placeholder="write axis....">
                            </div>
                            <div class="col-lg-6">
                                <label for="rebyes">Byes</label>
                               <input type="number" class="form-control" id="rebyes" name="rebyes"  placeholder="write byes.... 6/6">
                            </div>
                           </div>           
                        </div>
                        <div class="col-lg-6 border">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Left Eye (OS)</h3> 
                                </div>
                                <div class="col-lg-6">
                                    <label for="lesph">Sph<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="lesph" name="lesph"  placeholder="write sps....">
                                 </div>
                                 <div class="col-lg-6">
                                     <label for="lecyl">Cyl<span style="color: red">*</span></label>
                                    <input type="number" class="form-control" id="lecyl" name="lecyl"  placeholder="write cyl....">
                                 </div>
                                 <div class="col-lg-6">
                                     <label for="leaxis">Axis</label>
                                    <input type="number" class="form-control" id="leaxis" name="leaxis"  placeholder="write axis....">
                                 </div>
                                 <div class="col-lg-6">
                                     <label for="lebyes">Byes</label>
                                    <input type="number" class="form-control" id="lebyes" name="lebyes"  placeholder="write byes.... 6/6">
                                 </div>
                               </div>   
                        </div>
                        <div class="col-lg-6">
                                <label for="add">Add:</label>
                                <input type="text" class="form-control" name="add" id="add" placeholder="write add....">
                        </div>
                        <div class="col-lg-6">
                            <label for="diopter">Diopter:</label>
                            <input type="text" class="form-control" name="diopter" id="diopter" placeholder="write diopter....">
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-6"><br/> <br/> 
                            
                                <p>Instructions</p> <br/> 
 
                            
                              @php
                                  $inst = \App\Models\coshma::where('type','=',1)->get();
                              @endphp
                              
                              @foreach ($inst as $row)
     <input type="checkbox" name="instructions[]"  value="{{$row->id}}">
     <label for="instruction{{$row->id}}">{{$row->value}}</label><br>
     @endforeach  
                             
                            </div>
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <br/>
                                        <p>Type:</p>
                                        @php
                                        $inst = \App\Models\coshma::where('type','=',2)->get();
                                    @endphp
                                    
                                    @foreach ($inst as $row)
           <input type="checkbox" name="type[]"  value="{{$row->id}}">
           <label for="type{{$row->id}}">{{$row->value}}</label><br>
           @endforeach  
                                        
                                    </div>
                                    <div class="col-lg-12"><br/>
                                        <p>Color:</p>
                                        
                                        @php
                                        $inst = \App\Models\coshma::where('type','=',3)->get();
                                    @endphp
                                    
                                     @foreach ($inst as $row)
           <input type="checkbox" name="color[]"  value="{{$row->id}}">
           <label for="color{{$row->id}}">{{$row->value}}</label><br>
           @endforeach  
                                    </div>
                                    <div class="col-lg-12"><br/>
                                        <p>Remarks :</p>
                                        
                                        @php
                                        $remarks = \App\Models\coshma::where('type','=',4)->get();
                                    @endphp
                                    
                                    @foreach ($remarks as $row)
           <input type="checkbox" name="remarks[]"  value="{{$row->id}}">
           <label for="remarks{{$row->id}}">{{$row->value}}</label><br> 
           @endforeach  
                                    </div>
                                </div>
                        </div>
                    </div> 
                </div>


                <br />
                <div class="form-group" align="center">
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                </div>
            </form>
           

            <span id="form_result_footer"></span>

        </div>
       
            
            




        <div class="table-responsive">
            <table id="patient_table" class="table  table-success table-striped data-tablem">
                <thead>
                    <tr>

                        <th>Serial NO.</th>
                        <th>Orer NO.</th>

                        <th>Name</th>
                        <th>Mobile</th>

                        <th>Print</th>
                        <th>Date</th>
                        <th>Action</th>




                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>













        </div>
        </div>

        <div id="confirmModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title">Confirmation</h2>
                    </div>
                    <div class="modal-body">
                        <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>









        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

     <script src="{{asset('jquery_val/dist/jquery.validate.min.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


        <script type="text/javascript">
           
           $(document).ready(function() {
                $("#coshma-from").hide();
                $(".coshma-prection").click(function(){
                    $("#coshma-from").toggle();
                });

                //////////////////////////// Show record 

                var table = $('#patient_table').DataTable({



                    processing: true,
                    serverSide: true,
                    responsive: true,

                    ajax: "{{ route('prescription.index') }}",
                    columns: [

                        {
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },






                        {
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'patient_name',
                            name: 'patient.name'
                        },
                        {
                            data: 'patient_mobile',
                            name: 'patient.mobile'
                        },


                        {
                            data: 'pdf',
                            name: 'pdf'
                        },
                        {
                            data: 'created',
                            name: 'created'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },
                    ]
                });













                fetch();





                $(".nexttext").keydown(function(event) {
                    if (event.keyCode == 13) {
                        event.preventDefault();
                        return false;
                    }
                });

                var allFields = document.querySelectorAll(".form-control");

                for (var i = 0; i < allFields.length; i++) {

                    allFields[i].addEventListener("keyup", function(event) {

                        if ((event.keyCode === 13) || (event.keyCode === 40)) {
                            console.log('Enter clicked')
                            event.preventDefault();
                            if (this.parentElement.nextElementSibling.querySelector('input')) {
                                this.parentElement.nextElementSibling.querySelector('input').focus();
                            }
                        }


                        if (event.keyCode === 38) {

                            event.preventDefault();
                            if (this.parentElement.previousElementSibling.querySelector('input')) {
                                this.parentElement.previousElementSibling.querySelector('input').focus();
                            }
                        }

                    });

                }



 





                ///// clear modal data after close it 
                $(".modal").on("hidden.bs.modal", function() {


                    $(".medicine_name").val("");
                    $(".usages").val("");

                    $(".customer_id").html("");
                    $(".khabaragepore").html("");




                    $("#products_table tr:gt(1)").remove(); // remove all row whose index is greater than 1










                });
                ///////////////////////////////

               
                
                $('#customer_id').select2();
                $('.usages').select2();
                $('.medicine_name').select2();
                $(".khabaragepore").select2();
                $(".category").select2();














                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });



                function fetch() {

                    $.ajax({
                        url: "prescription/dropdownlist",
                        dataType: "json",

                        ////////////////////fetch data for dropdown menu 
                        success: function(response) {
                            
                            ////////////////////fetch data for Customer dropdown menu ////////////////////////////
                            $("#customer_id").html("");

                            var optionforid = "<option value=''></option>";
                            $("#customer_id").append(optionforid);

                            var len = 0;
                            if (response.patientdata != null) {
                                len = response.patientdata.length; 
                            }

                            if (len > 0) {
                                for (var i = 0; i < len; i++) {
                                    var id = response.patientdata[i].id;
                                    var name = response.patientdata[i].name;
                                    var mobile = response.patientdata[i].mobile;

                                    var option = "<option value='" + id + "'>" + name + "</option>";
                                    var optionforid = "<option value='" + id + "'>" + id + ' '+ name + ' '+ mobile +"</option>";
                                    var optionformobile = "<option value='" + id + "'>" + mobile +
                                        "</option>";

                                    $("#customer_name").append(option);
                                    $("#customer_id").append(optionforid);
                                    $("#customer_mobile").append(optionformobile);
                                }
                            }


                            ////////////////////fetch data for usages dropdown menu ////////////////////////////


                            $("#usages").html("");

                            var usages = "<option  ></option>";
                            $("#usages").append(usages);


                            ///////////////////////   set dynamic select option values from Database ///////////////////


                            var len = 0;
                            if (response.usages != null) {
                                len = response.usages.length;
                            }

                            if (len > 0) {
                                for (var i = 0; i < len; i++) {
                                    var id = response.usages[i].id;
                                    var name = response.usages[i].usage;

                                    var usages = "<option value='" + id + "'>" + name + "</option>";


                                    $("#usages").append(usages);

                                }
                            }


                            ////////////////////fetch data for khabaragepore dropdown menu ////////////////////////////


                            $("#khabaragepore").html("");

                            var khabaragepore = "<option  ></option>";
                            $("#khabaragepore").append(khabaragepore);


                            ///////////////////////   set dynamic select option values from Database ///////////////////


                            var len = 0;
                            if (response.khabaragepore != null) {
                                len = response.khabaragepore.length;
                            }

                            if (len > 0) {
                                for (var i = 0; i < len; i++) {
                                    var id = response.khabaragepore[i].id;
                                    var name = response.khabaragepore[i].khabaragebapore;

                                    var khabaragepore = "<option value='" + id + "'>" + name + "</option>";


                                    $("#khabaragepore").append(khabaragepore);

                                }
                            }










                            ////////////////////fetch data for Medicine  dropdown menu ////////////////////////////			

                            ///////////////////////   set first option value ///////////////////

                            $("#medicine_name").html("");

                            var optionformedicine = "<option  ></option>";
                            $("#medicine_name").append(optionformedicine);


                            ///////////////////////   set dynamic select option values from Database ///////////////////


                            var len = 0;
                            if (response.medicinedata != null) {
                                len = response.medicinedata.length;
                            }

                            if (len > 0) {
                                for (var i = 0; i < len; i++) {
                                    var id = response.medicinedata[i].id;
                                    var name = response.medicinedata[i].name;

                                    var price = response.medicinedata[i].unitprice;
                                    var stock = response.medicinedata[i].stock;

                                    //////////////////////////////////// Set user dfeined atribute data-price//////			 
                                    var optionformedicine = "<option    data-stock='" + stock +
                                        "' data-price='" + price + "' value='" + id + "'>" + name +
                                        "</option>";
                                    /////////////////////////////////////////////////////////////



                                    var optionforid = "<option value='" + id + "'>" + id + "</option>";


                                    $("#medicine_name").append(optionformedicine);

                                }
                            }









                            $("#category").html("");

                            var category = "<option  ></option>";
                            $("#category").append(category);


                            ///////////////////////   set dynamic select option values from Database ///////////////////


                            var len = 0;
                            if (response.medicinecategory != null) {
                                len = response.medicinecategory.length;
                            }

                            if (len > 0) {
                                for (var i = 0; i < len; i++) {
                                    var id = response.medicinecategory[i].id;
                                    var name = response.medicinecategory[i].name;

                                    var category = "<option value='" + id + "'>" + name + "</option>";


                                    $("#category").append(category);

                                }
                            }














                        }


                        //////////////////////////////////////////////////////////////////////////////
                    })



                }


                /////////////////////////////////////// Remove row ////////////////////////


                $('.addmoreproduct').delegate('.remove', 'click', function() {


                    var rowCount = $('table#products_table tr:last').index() +
                    1; // find out the length of the row 

                    var rowindex = $(this).closest('tr').index(); // find out the index number of the row 

                    if (rowindex > 0) {
                        $(this).parent().parent().remove();

                    }

                    $('.category').select2();
                    $('.khabaragepore').select2();
                    $('.usages').select2();
                    $('.medicine_name').select2();


                });



                /////////////////////////////////ADD Data //////////////////////////// 



                $('#sample_form').on('submit', function(event) {
                    event.preventDefault();
                        if ($('#action').val() == 'Add') {
                            try {
                                $.ajax({
                                        url: "{{ route('prescription.store') }}",
                                        method: "POST",
                                        data: new FormData(this),
                                        contentType: false,
                                        cache: false,
                                        processData: false,
                                        dataType: "json",
                                        success: function(data) {
                                            var html = '';
                                            if (data.errors) {
                                                html = '<div class="alert alert-danger">';
                                                for (var count = 0; count < data.errors.length; count++) {
                                                    html += '<p>' + data.errors[count] + '</p>';
                                                }
                                                html += '</div>';
                                                console.log('data.errors');
                                                console.log(data.errors);
                                            }
                                            if (data.success) {
                                                html = '<div class="alert alert-success">' + data.success +
                                                    '</div>';
                                                $('#sample_form')[0].reset();
                                                $('#patient_table').DataTable().ajax.reload();
                                                console.log('data.success');
                                                console.log(data.success);
                                            }

                                            if (data.error) {
                                                html = '<div class="alert alert-danger">' + data.error +
                                                    '</div>';
                                                $('#sample_form')[0].reset();
                                                $('#patient_table').DataTable().ajax.reload();
                                                console.log('data.error');
                                                console.log(data.error);
                                            }

                                            $('#form_result').html(html);

                                            $('#form_result').fadeIn();
                                            $('#form_result').delay(1500).fadeOut();

                                            $('#form_result_footer').html(html);

                                            $('#form_result_footer').fadeIn();
                                            $('#form_result_footer').delay(1500).fadeOut();



                                            $("#agentoption").hide();
                                            $("#doctoroption").hide();
                                            fetch();


                                            $("#products_table tr:gt(1)").remove();

                                            //remover por select2 dite hobe 
                                            $('.medicine_name').select2();

                                            }
                                 })
                            } catch (error) {
                                //console.log(error);
                            }
                        }

                        if ($('#action').val() == "Edit") {
                            $.ajax({
                                url: "{{ route('patientlist.update') }}",
                                method: "POST",
                                data: new FormData(this),
                                contentType: false,
                                cache: false,
                                processData: false,
                                dataType: "json",
                                success: function(data) {
                                    var html = '';
                                    if (data.errors) {
                                        html = '<div class="alert alert-danger">';
                                        for (var count = 0; count < data.errors.length; count++) {
                                            html += '<p>' + data.errors[count] + '</p>';
                                        }
                                        html += '</div>';
                                    }
                                    if (data.success) {
                                        html = '<div class="alert alert-success">' + data.success +
                                            '</div>';
                                        $('#sample_form')[0].reset();
                                        $('#store_image').html('');
                                        $('#patient_table').DataTable().ajax.reload();
                                    }
                                    $('#form_result').html(html);
                                }
                            });
                        }
                });








                /////////////////////////////////////// Dynamically Add New row and Add New select2 for dynamically added new medicine name  ////////////////////////


                let row_number = 1;
                $("#add_row").click(function(e) {


                    e.preventDefault();
                    let new_row_number = row_number - 1;

                    $latest_tr = $('#product0');

                    $latest_tr.find(".medicine_name").each(function(index) {
                        $(this).select2('destroy');
                    });

                    $latest_tr.find(".usages").each(function(index) {
                        $(this).select2('destroy');
                    });

                    $latest_tr.find(".category").each(function(index) {
                        $(this).select2('destroy');
                    });


                    $latest_tr.find(".khabaragepore").each(function(index) {
                        $(this).select2('destroy');
                    });

                    $('#product' + row_number).html($('#product0').html()).find('td:first-child');




                    $('.addmoreproduct').append('<tr id="product' + (row_number + 1) + '"></tr>');
                    row_number++;







                    $('.category').select2();
                    $('.khabaragepore').select2();
                    $('.usages').select2();
                    $('.medicine_name').select2();
                });



                // delete 


                var user_id;

                $(document).on('click', '.delete', function() {
                    user_id = $(this).attr('id');
                    $('#confirmModal').modal('show');
                });

                $('#ok_button').click(function() {
                    $.ajax({
                        url: "medicinetransition/destroy/" + user_id,
                        beforeSend: function() {
                            $('#ok_button').text('Deleting...');
                        },
                        success: function(data) {
                            setTimeout(function() {
                                $('#confirmModal').modal('hide');
                                $('#user_table').DataTable().ajax.reload();
                            }, 2000);

                            $('#patient_table').DataTable().ajax.reload();
                            $('#ok_button').text('Delete');
                            fetch();
                        }
                    })
                });


               
                

            });
        </script>

    </body>

@stop
