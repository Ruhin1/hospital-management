

@extends('layout.main')

@section('content')

</head>






<body id="bodysellcorner">

@section('content')
<div class="row g-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="h6 mb-0 text-uppercase">Manage Roles</h6>
                    <a href="{{ Route('role.create') }}" class="btn btn-primary btn-sm text-uppercase">Add New</a>
                </div>
            </div> 
            <div class="card-body">
                <table class="dataTable table align-middle" style="width:100%">
                    <thead>
                        <tr class="text-nowrap">
                            <th width="3"></th>
                            <th>Name</th>
                            <th width="110" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-center" colspan="1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="selectAll">
                                    <label class="custom-control-label" for="selectAll"></label>
                                </div>
                            </th>
                            <th colspan="2">
                                <button type="button" name="bulk_delete"
                                    data-url="5" id="bulk_delete"
                                    {{-- {{ Route('admin.role.destroy', '0') }} --}}
                                    class="btn btn btn-xs btn-danger">Delete</button>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
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
                    url: "{{ Route('role.index') }}",
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
                        data: 'name',
                        name: 'name'
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
                console.log(user_id);
                if(confirm('Are You Sure Delate!')){
                    $.ajax({
                url: "{{ url('role') }}/" + user_id, // URL for delete route
                method: 'DELETE', // Use the DELETE method for deletion
                success: function(data) {
                console.log(data);    
                    document.getElementById(`del${user_id}`).innerHTML = 'Delateing...';  
                    setTimeout(function() {
                        
                        $('.dataTable').DataTable().ajax.reload();
                    }, 2000);

                    
                },
                error:function(error) {
                    console.log(error);
                }
            })
                }
                
                }); 
        });
       
     
</script>
</body>
</html>
@endsection
