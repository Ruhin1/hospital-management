@extends('layout.main')
@section('content')
<style>
</style>
</head>
<body id="bodysellcorner">
    <div class="row g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="h6 mb-0 text-uppercase">Manage Users</h6>
                        <a href="{{ Route('user.create') }}" class="btn btn-primary btn-sm text-uppercase">Add New</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="dataTable table align-middle" style="width:100%">
                        <thead>
                            <tr class="text-nowrap">
                                <th width="3"></th>
                                <th width="80">Image</th>
                                <th width="150">Name</th>
                                <th width="150">User ID</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th width="110" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center" rowspan="1" colspan="1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="selectAll">
                                        <label class="custom-control-label" for="selectAll"></label>
                                    </div>
                                </th>
                                <th colspan="7">
                                    <button type="button" name="bulk_delete"
                                        data-url="{{ Route('user.destroy', '0') }}" id="bulk_delete"
                                        class="btn btn btn-xs btn-danger">Delete</button>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('jquery/jquery.min.js')}}"></script>
    <script src="{{asset('select2/dist/js/select2.min.js')}}"></script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });


            var table = $('.dataTable').dataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: {
                    url: "{{ Route('user.index') }}",
                    type: "GET",
                },
                columns: [{
                        data: "checkbox",
                        name: "checkbox",
                        orderable: false,
                        searchable: false,
                        width: '3'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'user_name',
                        name: 'user_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role',
                        name: 'role'
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
                        className: "text-end",
                    },
                ]
            });

            
            $(document).on('click', '.link-delete', function() {
                let user_id = $(this).data('url');

                if(confirm('Are You Sure Delate!')){
                    $.ajax({
                url: "{{ url('user') }}/" + user_id, // URL for delete route
                method: 'DELETE', // Use the DELETE method for deletion
                success: function(data) {
                    
                    document.getElementById(`del${user_id}`).innerHTML = 'Delateing...';  
                    setTimeout(function() {
                        
                        $('.dataTable').DataTable().ajax.reload();
                    }, 2000);

                    
                }
            });
                }
                
                }); 
            });
    </script>
</body>
</html>
@endsection

