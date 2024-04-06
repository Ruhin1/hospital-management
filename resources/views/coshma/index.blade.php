@extends('layout.main')

@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">  
<style>
   
</style>

</head>
<body>
    <div class="container m-2" style="background-color:#EEE8AA; ">
        <h2>Write Prescription</h2>
        <span id="form_result">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        </span>

        <form method="post" action="{{ route('coshma.store') }}" id="sample_form" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-lg-3">
               <label for="name">Name:</label>
               <input type="text" class="form-control" name="name" id="name" required placeholder="write name....">
            </div>
            <div class="col-lg-3">
               <label for="age">Age:</label>
               <input type="number" class="form-control" name="age" id="age" required placeholder="write age....">
            </div>
            <div class="col-lg-3">
                <label for="Date">Date:</label>
                <input type="datetime-local" class="form-control" name="brith" id="brith" required>
             </div>
            <div class="col-lg-3">
                <label for="Date">Ipd:</label>
                <input type="number" class="form-control" name="ipd" id="ipd" required placeholder="write ipd....">
             </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6 border">
               <div class="row">
                <div class="col-lg-12">
                    <h3>Right Eye (OD)</h3> 
                    
                </div>
                <div class="col-lg-6">
                   <label for="resph">Sph</label>
                   <input type="text" class="form-control" id="resph" name="resph"  placeholder="write sps....">
                </div>
                <div class="col-lg-6">
                    <label for="recyl">Cyl</label>
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
                        <label for="lesph">Sph</label>
                        <input type="text" class="form-control" id="lesph" name="lesph"  placeholder="write sps....">
                     </div>
                     <div class="col-lg-6">
                         <label for="lecyl">Cyl</label>
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
               <div class="col-lg-6">
                <label for="instructions">Instructions</label><br/>
                <select name="instructions[]" multiple>
                    @foreach ($inst as $row)
                    <option style="padding: 2px;border:1px solid black;" value="{{$row->id}}">{{$row->value}}</option>
                        @endforeach  
                </select>
               </div>
                    <div class="col-lg-6">
                        <div class="col-lg-12">
                            <label for="type">Type:</label><br/>
                            <select name="type[]" multiple> 
                                <option selected value="1">Unifosal</option>
                                <option value="2">mit
                                    Bifocal</option>
                                <option value="3">Progressive focal (Varilus)</option>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label for="color">Color:</label><br/>
                            <select name="color[]" multiple>
                                <option selected value="1">White</option>
                                <option value="2">Photochromatic</option>
                                <option value="3">MC Fiber (UV Protect) (Blue Cut)</option>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label for="Remarks">Remarks :</label><br/>
                            <select name="remarks[]" multiple>
                                <option selected value="1">Distant</option>
                                <option value="2">Reading</option>
                                <option value="3">Constant</option>
                                <option value="4">Fiber</option>
                                <option value="5">Glass</option>
                            </select>
                        </div>
                    </div>
            </div>
        </div> 
        <div class="col-lg-12 my-3">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
        </form>
    </div> 

        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="{{asset('jquery_val/dist/jquery.validate.min.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> --}}

    <script type="text/javascript">   
    $(document).ready(function() {  
        $('#multiple-checkboxes').multiselect();  
    });  
    </script>
</body>
@endsection