

@extends('layout.main')

@section('content')


</head>






<body>

    <div class="container">
        <div class="row">
           <div class="col-md-12 col-sm-6" >
              <h1>Prescription Usages </h1>
              {{-- <a style="float:right; margin-bottom:20px;" class="btn btn-success" href="javascript:void(0)" id="create_record"> Add New </a> --}}
              <div class="table-responsive">
                 <table id="patient_table"  class="table  table-success table-striped data-tablem">
                    <thead>
                       <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Print</th>
                          <th width="300px">Action</th>
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
 <div class="modal-dialog" style="width: 80%">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf

          <div class="row">
            <div class="col-lg-3">
               <label for="name">Name:</label>
               <input disabled type="text" class="form-control" name="name" id="name" required placeholder="write name....">
            </div>
            <div class="col-lg-3">
               <label for="age">Age:</label>
               <input disabled  type="number" class="form-control" name="age" id="age" required placeholder="write age....">
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
                <select name="instructions[]" id="instructions" multiple>
                   @php
                       $dt = \App\Models\coshma::all();
                   @endphp
                   @foreach ($dt as $row)
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





    <script src="{{asset('jquery/jquery.min.js')}}"></script>  
 <script src="{{asset('jquery_val/dist/jquery.validate.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">


$(document).ready(function(){

     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	



    var table = $('#patient_table').DataTable({
        processing: true,
        serverSide: true,
		responsive: true,
            ajax: "{{ route('coshma.index') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'pdf', name: 'pdf' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
                
            ]
    });




        
 $(document).on('click', '.edit', function(){
    $('#action_button').attr("disabled", false); 	 
        var id = $(this).attr('id');
        $('#form_result').html('');
        $.ajax({
        url:"/coshma/"+id+"/edit",
        dataType:"json",
        success:function(html){
            $('#name').val(html.data.name);
            $('#age').val(html.data.age);
            $('#age').val(html.data.age);
            $('#brith').val(html.data.brith);
            $('#ipd').val(html.data.ipd);
            $('#resph').val(html.data.resph);
            $('#recyl').val(html.data.recyl);
            $('#reaxis').val(html.data.reaxis);
            $('#rebyes').val(html.data.rebyes);
            $('#lesph').val(html.data.lesph);
            $('#lecyl').val(html.data.lecyl);
            $('#leaxis').val(html.data.leaxis);
            $('#lebyes').val(html.data.lebyes);
            $('#add').val(html.data.add);
            $('#diopter').val(html.data.diopter);
            $('#hidden_id').val(html.data.id);
            $('.modal-title').text("Edit New Record");
            $('#action_button').val("Edit");
            $('#action').val("Edit");
            $('#formModal').modal('show');
        }
        })
 });

$('#sample_form').on('submit', function(event){
    event.preventDefault();
    $('#action_button').attr("disabled", true);	 

  
 $(document).on('click', '.edit', function(){
        var id = $(this).attr('id');
        $('#form_result').html('');
        $.ajax({
        url:"/coshma/"+id+"/edit",
        dataType:"json",
        success:function(html){
            $('#name').val(html.data.name);
            $('#age').val(html.data.age);
            $('#age').val(html.data.age);
            $('#brith').val(html.data.brith);
            $('#ipd').val(html.data.ipd);
            $('#resph').val(html.data.resph);
            $('#recyl').val(html.data.recyl);
            $('#reaxis').val(html.data.reaxis);
            $('#rebyes').val(html.data.rebyes);
            $('#lesph').val(html.data.lesph);
            $('#lecyl').val(html.data.lecyl);
            $('#leaxis').val(html.data.leaxis);
            $('#lebyes').val(html.data.lebyes);
            $('#add').val(html.data.add);
            $('#diopter').val(html.data.diopter);
            //console.log(html.data.instructions);
            $('#hidden_id').val(html.data.id);
            $('.modal-title').text("Edit New Record");
            $('#action_button').val("Edit");
            $('#action').val("Edit");
            $('#formModal').modal('show');
        }
        })
 });

  ///-------------
  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('coshma.update') }}",
    method:"POST",
    data:new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
     var html = '';
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();
      $('#store_image').html('');
      $('#patient_table').DataTable().ajax.reload();
     }
     $('#form_result').html(html);
	
	  $('#form_result').fadeIn();
	  
	  $('#form_result').delay(1500).fadeOut();
	 console.log(data.success);
	 
    }
   });
  }
 });
 



 
  
 ///-------------
 
 var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"coshma/prescription/delate/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#user_table').DataTable().ajax.reload();
    }, 2000);
	
	      $('#patient_table').DataTable().ajax.reload();
		   $('#ok_button').text('Delete');
   }
  })
 });

 
 $(document).on('click', '#close', function(){
$('#formModal').modal('hide');

 });

  $(document).on('click', '.closedelete', function(){
$('#confirmModal').modal('hide');

 });

});
</script>
	  


@stop