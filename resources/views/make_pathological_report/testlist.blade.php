

@extends('layout.main')

@section('content')



<style>
.modal-lg {
    max-width: 80% !important;

}



tr:nth-child(even) {background-color: #f2f2f2;}
</style>
 
 






</head>

  
 






<body>




		<div  class="container" style="background-color:#EEE8AA; "  >
		<h2>Make Pathology Report</h2>
  <span id="form_result"></span>
	
	




		 <form method="post"  action="{{ route('pathologyreportmaking.store') }}"   id="sample_form" class="form-horizontal  sample_form_for_doctorappointment" enctype="multipart/form-data">
          @csrf

		 

 @foreach ( $reportorder->reporttransaction as $t )
 
Test Name:  {{$t->reportlist->name}}
<input type="hidden"   name="order_no" id="order_no" class="form-control  "  value="{{ $reportorder->id }}"    />

<input type="hidden"   name="doctor" id="doctor" class="form-control  "  value="{{ $reportorder->doctor_id }}"    />


<input type="hidden"   name="patientlist" id="patientlist" class="form-control  "  value="{{ $reportorder->patient_id }}"    />

<?php 
  $com=  App\Models\pathology_test_component::where('reportlist_id',$t->reportlist_id)->get();
	$testid	=  	$t->reportlist->id;
 ?>
 <table class="table" id="products_table">
                <thead>
                    <tr>
                        <th>Test Component Name</th>
                        <th   >Normal value</th>
						<th   >Result</th>
						<th   >Unit</th>
							<th  >Remove</th>
                    </tr>
                </thead>
				
			 @foreach ( $com as $cm )	
				
                <tbody class="addmoreproduct">
                    <tr id="product0">

				
                        

						<td>
                            <input type="text"   name="component_name[]" id="component_name" class="form-control  "  value="{{ $cm->component_name }}"  required  />
                            </td>
                            
                            <input type="hidden"   name="component_id[]" id="component_id" class="form-control  "  value="{{ $cm->id }}"    />
                                
						
                            
                            <input type="hidden"   name="testid[]" id="testid" class="form-control  normalvalue"  value="{{ $testid }}"    />
                                
						
						<td>
						<input type="text"   name="normalvalue[]" id="normalvalue" class="form-control  normalvalue"  value="{{$cm->Normalvalue}}"  required  />
                        </td>
						
						
						
						<td>
						<input type="text"   name="result[]" id="result" class="form-control  result" autofocus="off" required  />
						</td>
						
                     <td>
						<input type="text" value="{{$cm->unit}}"   name="unit[]" id="unit" class="form-control  unit" required readonly />
                        </td>

						 
			
						<td>
						
						<a class="remove"  style="font-size:30px; color:red;"  href="#">  ×</a> 
						
						</td> 

						
                    </tr>
                 
                </tbody>
				@endforeach 
            </table>
			 
			 


 
@endforeach 


		   
	
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action"  value="Add"  />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Submit" />
           </div>
         </form>		 
		 
		 
		 
		 
		 
		 
		 
		 
	</div>
			   <span id="form_result_footer"></span>  
<p>
















 



	  


@stop