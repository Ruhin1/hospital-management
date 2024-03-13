@extends('layout.main')

@section('content')

</head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-6">
                    <h1>Medicine List</h1>
                    <a style="float:right; margin-bottom:20px;" class="btn btn-success create_record" href="javascript:void(0)" id="create_record">Add New</a>
        
                    <div class="table-responsive">
                        <table id="patient_table" class="table table-success table-striped data-tablem">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Unit Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Record</h4>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>

                <div class="container">
                    <form method="post" id="sample_form" action="{{ route('medicine.store') }}" class="form-horizontal" enctype="multipart/form-data" onsubmit="event.preventDefault()">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-4">Category:</label>
                            <div class="col-md-8">
                                <select id="category" class="form-control" name="category" required style='width: 270px;'></select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control register_form" name="name" id="name" placeholder="Enter Name" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="phone">Stock:</label>
                            <input type="text" class="form-control register_form" name="stock" id="stock" placeholder="Stock" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="email">Unit Price:</label>
                            <input type="number" class="form-control register_form" name="unitprice" id="unitprice" placeholder="Unit Price" autocomplete="off">
                        </div>

                        <div class="form-group" id="dateElemint"> 
                            <label for="email">Date:</label>
                            <input type="datetime-local" class="form-control register_form" id="datetime" name="datetime" value="{{date('Y-m-d\TH:i')}}" autocomplete="off">
                        </div>
                        <br />
                        <div class="form-group" align="center">
                            <input type="hidden" name="action" id="action" />
                            <input type="hidden" name="hidden_id" id="hidden_id" />
                            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="closedelete" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default closedelete" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<script type = "text/javascript" >


    $(document).ready(function() {

        $("#category").select2();

        ///// clear modal data after close it 
        $(".modal").on("hidden.bs.modal", function() {
            $("#name").html("");
            $("#stock").html("");
            $("#unitprice").html("");
            $("#datetime").html(""); 
        });
        ///////////////////////////////

        $(window).keydown(function(event) {
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




        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });




        var table = $('#patient_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,

            ajax: "{{ route('medicine.index') }}",

            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'medicine_category_name',
                    name: 'medicine_category.name'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'stock',
                    name: 'stock'
                },
                {
                    data: 'unitprice',
                    name: 'unitprice'
                },
               

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },


            ]
        });




        ///////// show the modal//////////////////////////////////////////////////////////////////////////////// 
        $(document).on('click', '.create_record', function() {

            $("#name").val("");
            $("#stock").val("");
            $("#unitprice").val("");
            $('#form_result').html('');
            $('.modal-title').text("Add New Record");
            $('#action_button').val("Add");
            $('#action').val("Add");
            $('#formModal').modal('show');
            $('#dateElemint').hide();
           
           

            fetch();

        });

        function fetch() {
            $("#category").html('');
            $.ajax({
                url: "medicine/category_list",
                dataType: "json",

                ////////////////////fetch data for dropdown menu 
                success: function(response) {

                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }
                    var option = "<option value=''></option>";

                    $("#category").append(option);
                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            var id = response.data[i].id;
                            var name = response.data[i].name;

                            var option = "<option value='" + id + "'>" + name + "</option>";


                            $("#category").append(option);
                        }
                    }
                }


                //////////////////////////////////////////////////////////////////////////////
            })

        }

        /////////////////////////////////ADD Data //////////////////////////// 

        

        $('#sample_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
           



                $.ajax({
                    url: "{{ route('medicine.store') }}",
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
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            $('#sample_form')[0].reset();
                            $('#patient_table').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                        $('#form_result').fadeIn();
                        $('#form_result').delay(1500).fadeOut();
                        fetch();
                        $("#name").val("");
                        $("#stock").val("");
                        $("#unitprice").val("");
                        //$("#datetime").val("");

                    }
                })



            }

            if ($('#action').val() == "Edit") {
                $.ajax({
                    url: "{{ route('medicine.update') }}",
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
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            $('#sample_form')[0].reset();
                            $('#store_image').html('');
                            $('#patient_table').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                        $('#form_result').fadeIn();
                        $('#form_result').delay(1500).fadeOut();
                        fetch();
                        $("#name").val("");
                        $("#stock").val("");
                        $("#unitprice").val("");
                        $("#datetime").val("");

                    }
                });
            }
        });

        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');
            $('#form_result').html('');
            $.ajax({
                url: "/medicine/" + id + "/edit",
                dataType: "json",
                success: function(html) {
                    $('#name').val(html.data.name);
                    $('#stock').val(html.data.stock);
                    $('#unitprice').val(html.data.unitprice);                    
                    //$('#datetime').val();
                                     

                    var len = html.categorylist.length;
                    var medicine_present_category = html.data.medicine_category_id;


                    var option = "<option value=''></option>";

                    $("#category").append(option);


                    for (var i = 0; i < len; i++) {

                        if (medicine_present_category == html.categorylist[i].id) {
                            var id = html.categorylist[i].id;
                            var name = html.categorylist[i].name;

                            var option = "<option value='" + id + "'>" + name + "</option>";

                            $("#category").append(option);
                        }

                    }


                    for (var i = 0; i < len; i++) {

                        if (medicine_present_category != html.categorylist[i].id) {
                            var id = html.categorylist[i].id;
                            var name = html.categorylist[i].name;

                            var option = "<option value='" + id + "'>" + name + "</option>";

                            $("#category").append(option);
                        }

                    }




                    $('#hidden_id').val(html.data.id);
                    $('.modal-title').text("Edit New Record");
                    $('#action_button').val("Edit");
                    $('#action').val("Edit");
                    $('#dateElemint').show(); 
                    $('#formModal').modal('show');
                }
            })
        });



        var user_id;

        $(document).on('click', '.delete', function() {
            user_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function() {
            $.ajax({
                url: "medicine/destroy/" + user_id,
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
                }
            })
        });




        $(document).on('click', '.closedelete', function() {
            $('#confirmModal').modal('hide');

        });

        $(document).on('click', '#close', function() {
            $('#formModal').modal('hide');

        });


    });
</script> 
</body>	  
@endsection