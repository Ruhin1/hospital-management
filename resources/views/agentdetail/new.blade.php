<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 5.8 - Daterange Filter in Datatables with Server-side Processing</title>
 <script src="{{asset('jquery/jquery.min.js')}}"></script>
  	<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  
      <script src="{{asset('datatable/datatables.min.js')}}"></script>

      <link rel="stylesheet" href="{{asset('datatable/datatables.min.css')}}" />

  
        <link rel="stylesheet" href="{{asset('datepicker/css/datepicker.css')}}"/>
        <script src="{{asset('datepicker/js/bootstrap-datepicker.js')}}"></script>
 </head>
 <body>
  <div class="container">    
     <br />
     <h3 align="center">Laravel 5.8 - Daterange Filter in Datatables with Server-side Processing</h3>
     <br />
            <br />
            <div class="row input-daterange">
                <div class="col-md-4">
                    <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
                </div>
                <div class="col-md-4">
                    <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
                </div>
                <div class="col-md-4">
                    <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                </div>
            </div>
            <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="order_table">
           <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Address</th>
                            <th>Date</th>
            </tr>
           </thead>
       </table>
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format:'yyyy-mm-dd',
  autoclose:true
 });

load_data();

 function load_data(from_date = '', to_date = '')
 {
  $('#order_table').DataTable({
   processing: true,
   serverSide: true,
   ajax: {
    url:'{{ route("agentlist.index") }}',
    data:{from_date:from_date, to_date:to_date}
   },
   columns: [
    {
     data:'id',
     name:'id'
    },
    {
     data:'name',
     name:'name'
    },
    {
     data:'mobile',
     name:'mobile'
    },
    {
     data:'address',
     name:'address'
    },
    {
     data:'created_at',
     name:'created_at'
    }
   ]
  });
 }

 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  if(from_date != '' &&  to_date != '')
  {
   $('#order_table').DataTable().destroy();
   load_data(from_date, to_date);
  }
  else
  {
   alert('Both Date is required');
  }
 });

 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  $('#order_table').DataTable().destroy();
  load_data();
 });

});

});
</script>