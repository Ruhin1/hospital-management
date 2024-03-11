

@extends('layout.main')

@section('content')




 
 






</head>

  
 






<body>

<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
    <h1>ভর্তি করা রোগীদের তালিকা দেখুন এবং রিলিজ করুন </h1>
   
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
<th>No</th>
			
				<th>Patient Name.</th>
				<th>Patient ID</th>
	             <th>Cabine Name</th>
             <th>Booking date</th>
			 
				<th>Relese from bed</th>
                
				
				
			     
             
                
            </tr>
        </thead>
        <tbody   >

        </tbody>
    </table>
	</div>
</div>
</div>
</div>











 




<script type="text/javascript">


$(document).ready(function(){
	
  $("#patientlist").select2();   
 $("#cabine_list").select2();   

///// clear modal data after close it 
$(".modal").on("hidden.bs.modal", function(){
    $("#patientlist").html("");
});
///////////////////////////////


     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	



    var table = $('#patient_table').DataTable({
		
	
		
        processing: true,
        serverSide: true,
		responsive: true,
	
        ajax: "{{ route('cabinetransaction.showbookingpatient') }}",
	
        columns: [
		
		 
		 
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
		  {data: 'name', name: 'name'},
            {data: 'id', name: 'id'},
			
			 
			  {data: 'cabine_name', name: 'cabinelist.serial_no'},
			 
            {data: 'starting_date', name: 'cabinetransaction.starting'},
			
			{data: 'Release', name: 'Release'},
			
			
			 
 
			    
           
        ]
    });


   
   
 


});
</script>
	  


@stop