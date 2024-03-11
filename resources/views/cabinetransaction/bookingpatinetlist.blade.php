

@extends('layout.main')

@section('content')




 
 






</head>

  
 






<body>

<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
    <h1> রিলিজ হওয়া রোগীদের তালিকা </h1>
   
	
	<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
<th>No</th>
<th>Patient ID</th>			
				<th>Patient Name.</th>
					<th>Mobile</th>
	    <th>Cabine NO.</th>
		
		
		<th>Admission Date</th>
		<th>Discharging Date</th>
		<th>Print Final Repot </th> 
                
				
				
			     
             
                
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
	
        ajax: "{{ route('bookingpatient.index') }}",
	
        columns: [
		
		 
		 
		  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
		      {data: 'id', name: 'id'},
		  {data: 'name', name: 'name'},
          {data: 'mobile', name: 'mobile'},
		 {data: 'cabine_name', name: 'cabine_name'},	
		
			
			
			
{data: 'starting_date', name: 'starting_date'},		
{data: 'ending', name: 'ending'},		
		{data: 'finalreport', name: 'finalreport'},	
			
			
			 
 
			    
           
        ]
    });


   
   
 


});
</script>
	  


@stop