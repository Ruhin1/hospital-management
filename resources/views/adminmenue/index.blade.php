@extends('layout.main')

@section('content')
</head>
<body id="bodysellcorner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Admin Root Menu</h3>
                            </div>
                            <div class="col-lg-12">
                               <form id="rootform">
                                  <div class="form-group row">
                                     <label for="exampleInputEmail1" class="col-lg-3 col-form-label">Name </label>
                                     <div class="col-lg-6">
                                     <input type="text" name="name" id="rootname" class="form-control" placeholder="Write Name...">
                                     {{-- <strong class="textdenger"> error </strong> --}}
                                     </div>
                                     <div class="col-lg-3">
                                        <input type="hidden" name="hidden_id" id="root_hidden_id" />
                                        <input type="submit" class="btn btn-primary btn-sm" id="rootaction" value="Add">
                                     </div>
                                  </div>
                                </form>
                            </div>
                            <div class="col-lg-12" id="rootmenusuccessmassage"></div>
                        </div> 
                    </div>
                    <div class="card-body">
                        <table class="table" id="rootmenu">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>
                    </div>
                </div>    
            </div>
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-8">
                                <h3>Admin Child Menu</h3>
                            </div>
                            <div class="col-lg-4">
                                <button id="create_record" class="btn btn-primary">Add New</button>
                            </div>
                            <div class="col-lg-12" id="successmassage"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table" id="adminmenu">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Route</th>
                                <th scope="col">Root menu</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"  id="exampleModalLabel">Edit Admin Child Menu</h5>
          <button type="button" class="close"  aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="form">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Enter name...">
                  <strong class="textdenger"> error </strong>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name Route</label>
                    <input type="text" name="route" id="route" class="form-control" placeholder="deshboard.index">
                    <strong class="textdenger"> error </strong>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Select Root Menu</label>
                    <select class="form-select" name="rootmenu_id" id="rootmenu_id" aria-label="Default select example">
                        @foreach ($rootMenus as $row)
                            @if($row->status == 1){
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            }
                            @endif
                        @endforeach 
                        
                       
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Active Status</label>
                    <select name="status" class="form-select" aria-label="Default select example">
                        <option selected value="1">Active</option>
                        <option value="0">Not Active</option>
                        
                    </select>
                </div>
                
                <div class="form-group">
                   <input type="hidden" name="action" id="action" value="" />
                   <input type="hidden" name="hidden_id" id="hidden_id" />
                   <input type="submit" name="action_button" id="action_button" class="btn btn-primary" value="" />
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="close btn btn-secondary">Close</button>
        </div>
      </div>
    </div>
  </div>
    </div>
    
    <script src="{{asset('jquery/jquery.min.js')}}"></script>    
    <script src="{{asset('jquery_val/dist/jquery.validate.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 

    <script>

        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var  id = null;
            var successmassage = $('#successmassage');
            var rootmenusuccessmassage= $('#rootmenusuccessmassage');

            var table = $('#adminmenu').dataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ Route('adminmenu.index') }}",
                    type: "GET",
                },
                columns: [ 
                    // {
                    //     data: "checkbox",
                    //     name: "checkbox",
                    //     orderable: false,
                    //     searchable: false,
                    //     width: '3'
                    // },
                   
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'route',
                        name: 'route'
                    },
                    {
                        data: 'rootmenu',
                        name: 'rootmenu'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false,
                        
                    },
                ]
            });

            ///--------
            $('#create_record').click(function(){
                $('.modal-title').text('Add New Record');
                $('#action_button').val('Add');
                $('#action').val('Add');
                // $('#name').val('');
                // $('#route').val('');
                // $('#hidden_id').val('');
                successmassage.html('');
                $('#exampleModal').modal('show');
            });

            
            $(document).on('click', '.edit_record', function(){
                id = $(this).attr('id');
                console.log(id);
                $.ajax({

                    url :"/adminmenu/"+id+"/edit",
                    dataType:"json",
                    success:function(data)
                    {
                        $('#name').val(data.result.name);
                        $('#route').val(data.result.route);
                        $('#hidden_id').val(id);
                    }
                });

                $('.modal-title').text('Edit Record');
                $('#action_button').val('Edit');
                $('#action').val('Edit');
                $('#exampleModal').modal('show');
                successmassage.html(''); 
            });
             
            $('.close').click(function(){
                $('#exampleModal').modal('hide');
            });

            ///--------
            $('#form').on('submit', function(event) {
                event.preventDefault();
                var action_url = '';
                var method = '';

                if($('#action').val() == 'Add')
                {
                    action_url = "{{ route('adminmenu.store') }}";
                    method = "POST"
                    console.log('add');
                }

                if($('#action').val() == 'Edit')
                {
                    action_url = "{{ url('adminmenu/10') }}",  
                    method = "PATCH";
                    console.log('edit');

                }

                $.ajax({
                    url: action_url,
                    method: method,
                    data: new FormData(this),
                    contentType: false,
                    cache:false,
                    processData: false,
                    dataType:"json",
                    success: function(data) { 
                        if (data.success) {

                            $('#form')[0].reset();
                            $('#exampleModal').modal('hide');
                            $('#adminmenu').DataTable().ajax.reload();
                            successmassage.html(`
                                <div class="alert alert-success" role="alert">
                                    ${data.success}
                                </div>
                            `);
                            successmassage.fadeIn();
                            successmassage.delay(1500).fadeOut();
                            console.log(data);
                        }

                        if (data.errors) {
                            
                        
                        console.log(data.errors);
                        }

                    },
                    error: function(error) {
                        console.log('ae');
                        console.dir(error);
                    }
                });
            });

            //----------

            $(document).on('click', '.link-delete', function() {
                let id = $(this).data('url'); 
                console.log(id);
                if (confirm('Are You Sure Delate!')) {
                    $.ajax({
                        url: "{{ url('adminmenu') }}/" + id, // URL for delete route
                        method: 'DELETE', // Use the DELETE method for deletion
                        success: function(data) {
                            console.log(data);

                            document.getElementById(`del${id}`).innerHTML = 'Delateing...';
                            setTimeout(function() {

                                $('#adminmenu').DataTable().ajax.reload();
                                successmassage.html(`
                                    <div class="alert alert-success" role="alert">
                                        ${data.success}
                                    </div>
                                `);
                                successmassage.fadeIn();
                                successmassage.delay(1500).fadeOut();
                            }, 2000);
                        },
                        error:function(error){
                            console.log(error);
                        }
                    });
                }

            });

            //-------------------///-------------------//

            var table2 = $('#rootmenu').dataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ Route('rootmenu.index') }}",
                    type: "GET",
                },
                columns: [ 

                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false,
                        
                    },
                ]
            });

            //----------

            $(document).on('click', '.root_edit', function(){
                id = $(this).data('url');
                console.log(id);
                $.ajax({

                    url :"/rootmenu/"+id+"/edit",
                    dataType:"json",
                    success:function(data)
                    {
                        $('#rootname').val(data.result.name);
                        $('#roothidden_id').val(id); 
                        $('#rootaction').val("Edit");
                        
                    }
                });
                successmassage.html(''); 
            });

            //-----------

            $('#rootform').on('submit', function(event) {
                event.preventDefault();
                var action_url = '';
                var method = '';

                if($('#rootaction').val() == 'Add') 
                {
                    action_url = "{{ route('rootmenu.store') }}";
                    method = "POST"
                    console.log('add');
                }

                if($('#rootaction').val() == 'Edit')
                {
                    action_url = "{{ url('rootmenu/10') }}",  
                    method = "PATCH";
                    console.log('edit');

                }

                $.ajax({
                    url: action_url,
                    method: method,
                    data: new FormData(this),
                    contentType: false,
                    cache:false,
                    processData: false,
                    dataType:"json",
                    success: function(data) { 
                        if (data.success) {

                            $('#rootform')[0].reset();
                            
                            $('#rootmenu').DataTable().ajax.reload();
                            rootmenusuccessmassage.html(`
                                <div class="alert alert-success" role="alert">
                                    ${data.success}
                                </div>
                            `);
                            rootmenusuccessmassage.fadeIn();
                            rootmenusuccessmassage.delay(1500).fadeOut();
                            console.log(data);
                        }

                        if (data.errors) {
                            
                        
                        console.log(data.errors);
                        }

                    },
                    error: function(error) {
                        console.log('ae');
                        console.dir(error);
                    }
                });
            });

             //----------

             $(document).on('click', '.root-link-delete', function() {
                let id = $(this).data('url'); 
                console.log(id);
                if (confirm('Are You Sure Delate!')) {
                    $.ajax({
                        url: "{{ url('rootmenu') }}/" + id, // URL for delete route
                        method: 'DELETE', // Use the DELETE method for deletion
                        success: function(data) {
                            console.log(data);

                            document.getElementById(`rootd${id}`).innerHTML = 'Delateing...';
                            setTimeout(function() {

                                $('#rootmenu').DataTable().ajax.reload();
                                rootmenusuccessmassage.html(`
                                    <div class="alert alert-success" role="alert">
                                        ${data.success}
                                    </div>
                                `);
                                rootmenusuccessmassage.fadeIn();
                                rootmenusuccessmassage.delay(1500).fadeOut();
                            }, 2000);
                        },
                        error:function(error){
                            console.log(error);
                        }
                    });
                }

            });
            
        });
    </script>
</body>
</html>
@endsection
        