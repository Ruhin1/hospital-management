@extends('layout.main')

@section('content')
    <style>
   
    </style>

    </head>

<body>

@section('content')
<table class="table table-dark">
    <div class="card_header p-3 border d-flex justify-content-between">
        <h4>Manage User</h4>
        <a href="#" class="btn btn-primary" id="add">Add New User</a>
    </div>
    {{-- {{dd($success)}} --}}
    @if (session('message'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> {{ session('message') }}!
      </div>
    <h1></h1>
    @endif
      
    <thead>
      <tr>
        <th scope="col">Sl</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Roll</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $key=>$row)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td>
               
            </td>
            <td>
                
                <form action="" method="post">
                  @csrf
                  <input type="submit" class="btn btn-danger p-2 m-1" value="Delate" id="delate">
                </form>
               
            </td>
          </tr>  
        @endforeach 
    </tbody>
  </table>
</body>
</html>
@endsection




