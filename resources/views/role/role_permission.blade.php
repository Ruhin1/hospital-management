@extends('layout.main')

@section('content')
<style>
    .update{
        position: fixed;
        bottom: 50px;
        right: 50px;
    }
    .head{
        background: #D1E7DD;
        padding: 10px;
        border: 1px solid black;
        border-radius: 5px;
    }
    .body{
        
        padding: 10px;
        border: 1px solid rgb(146, 145, 145);
        border-radius: 5px;
    }
    .collaps-style{
        margin: 10px 0;
    }
    .button-style{
        background: #3E8E41;
    }
    .style{
        border: 1px solid black;
    }
</style>
    </head>

    <body id="bodysellcorner">

        <div class="row g-3">
            <div class="col-12"> 
                    <div class="card">
                        <div class="card-header p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="h6 mb-0 text-uppercase">Setup Permissions</h6>
                                <a href="{{ Route('role.index') }}" class="btn btn-primary btn-sm text-uppercase">Go
                                    Back</a>
                            </div>
                        </div>
                        <div class="card-body p-4">
                                 
                            
                            <form method="post" action="{{ route('rolePermission.update', $role->id) }}"> 
                                @method('PUT')
                                @csrf
                                  <div class="row">
                                   
                                    @foreach ($routes as $row)
                                    
                                    <div class="col-lg-12 my-2">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="button-style row" data-toggle="collapse" href="#{{$row->name}}" role="button" aria-expanded="false" aria-controls="{{$row->name}}">
                                                        <div class="col-lg-4 text-white">
                                                            <input type="checkbox" class="check-all" data-controller="tt">
                                                            <label>Select/Deselect All</label> 
                                                        </div>
                                                        <div class="col-lg-8 text-white">
                                                            Root Menu Name : {{$row->name}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="collapse multi-collapse" id="{{$row->name}}">
                                                    @foreach ($row->childmenu as $childmenu)
                                                        @if ($childmenu->status == 1)
                                                        <div class="row style">
                                                            <div class="col-lg-2">
                                                            <input type="checkbox" name="permissions[]" value="{{$childmenu->name}}" {{ $childmenu->name == $permissions ? 'checked' : '' }}>
                                                            </div>
                                                            <div class="col-lg-10">  Name: {{$childmenu->name}}</div>
                                                            @foreach ($childmenu->menuaction as $menuaction)
                                                            @if ($menuaction->status == 1)
                                                            <div class="col-lg-2">
                                                                
                                                                <input type="checkbox" name="permissions[]" value="{{$menuaction->name}}" {{ $menuaction->name == $permissions ? 'checked' : '' }}>
                                                                {{$menuaction->name}}
                                                               
                                                            </div>
                                                            @endif
                                                            @endforeach 
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @endforeach 
                                    
                                    
                                    
                                      
                                  </div>
                                  <button type="submit" class="btn btn-primary btn-lg update">Update</button>
                            </form>   
                                  
                           
                        </div>
                    </div>               
            </div>
        </div>
       
            <script>
    $(document).ready(function() {
        // $('.check-all').click(function() {
        //     var controller = $(this).data('controller');
        //     $('input[name="permissions[]"][value^="' + controller + '"]').prop('checked', this.checked);
        // });
    });

        </script>
    </body>
    </html>
@endsection
