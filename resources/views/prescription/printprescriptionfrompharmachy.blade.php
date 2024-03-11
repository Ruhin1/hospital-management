

@extends('layout.main')

@section('content')



<style>
.modal-lg {
    max-width: 90% !important;

}



tr:nth-child(even) {background-color: #f2f2f2;}
</style>
 
 






</head>






<body id="bodysellcorner">


<h2>Print Prescription </h2>
	
	
	
	
	


	

	
		<div class="table-responsive">
    <table id="patient_table"  class="table  table-success table-striped data-tablem">
        <thead>
            <tr>
	
			
			<th>Orer NO.</th>
		
                <th>Name</th>
				<th>Mobile</th>
				
				<th>Print</th>
				<th>Date</th>
		
				
			     
             
               
            </tr>
        </thead>
        <tbody   >

        </tbody>
    </table>
	</div>
	
	
	
	







	
	
	</div>
</div>





<!--




-->




 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">






$(document).ready(function loadprescription(){
	
	
	
	//////////////////////////// Show record 

    var table = $('#patient_table').DataTable({
		
	
		
        processing: true,
        serverSide: true,
		responsive: true,
	
        ajax: "{{ route('prescription.printprescription') }}",
        columns: [
		
		
		 
		 			
			
			{data: 'id', name: 'id'},
            {data: 'patient_name', name: 'patient.name'},
			 {data: 'patient_mobile', name: 'patient.mobile'},
			 

			 {data: 'pdf', name: 'pdf'}, 
		
            
  
               {data: 'created', name: 'created'}, 
			 
        ]
    });




setInterval(function(){
	$('#patient_table').DataTable().clear().destroy();
	loadprescription();
   
}, 180000);





	
	
	
	
	
	
	
	
	
	







});
</script>
	  
</body>

@stop