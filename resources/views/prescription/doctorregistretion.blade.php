@extends('layout.main')

@section('content')


<body>




		<div  class="container" style="background-color:#EEE8AA; "  >
		<h5>Give Permission to  a doctor to write  Prescription</h5> 
  <span id="form_result"></span>
	
		<form method="post" action="{{ route('prescription.doctorregiserforprescriptionpost') }}"   id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
		   
		   
		   <div class="container">
  <div class="row">
      <div class="col-4">
 	        <select id="doctor_id"  class="form-control doctor_id"  name="doctor_id"  required   style='width: 270px;'>  
              <option value=""></option>
  @foreach($doctor as $d)
    <option  data-name="{{$d->name}}" data-mobile="{{$d->mobile}}"  value="{{$d->id}}">{{$d->name}}</option>
  @endforeach
			
			</select>
    </div>
    <div class="col-4">
    Name:  <input type="text" id="name" name="name"    autocomplete="off"  >
    </div>
    <div class="col-4">
     Mobile: <input type="text" id="mobile" name="mobile"  autocomplete="off"  ><br>
    </div>
  </div>
</div>
		   
<P>
  <div class="row">

    <div class="col-6">
    Email:  <input type="text" id="email" name="email"   autocomplete="off"  >
    </div>
    <div class="col-6">
     Password: <input type="text" id="password" name="password"    autocomplete="off" ><br>
    </div>
  </div>
	   
		   
		   
		   
		   
		   
		   
		   
		   
		   

        
   
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action"  value="Add" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>
	
			   <span id="form_result_footer"></span>  

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">





$(document).ready(function(){
	
	
	
	




 $(document).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });

        var allFields = document.querySelectorAll(".form-control");

        for (var i = 0; i < allFields.length; i++) {

            allFields[i].addEventListener("keyup", function(event) {

                if (  (event.keyCode === 13) || (event.keyCode === 40) ) {
                    console.log('Enter clicked')
                    event.preventDefault();
                    if (this.parentElement.nextElementSibling.querySelector('input')) {
                        this.parentElement.nextElementSibling.querySelector('input').focus();
                    }
                }
				
				
				                if (event.keyCode === 38) {
                    
                    event.preventDefault();
                    if (this.parentElement.previousElementSibling.querySelector('input')) {
                        this.parentElement.previousElementSibling.querySelector('input').focus();
                    }
                }
				
            });

        }









	
	    $('#doctor_id').select2();




  
  
  

  
  





    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
	
  

 	/////////////////////////////// fill the value for selected patient ...............

$('.form-horizontal').delegate('.doctor_id','change',function(){
var name = $('.doctor_id option:selected').attr("data-name");        

var mobile = $('.doctor_id option:selected').attr("data-mobile");

$('#name').val(name);

$('#mobile').val(mobile);



});
	





  /////////////////////////////////ADD Data //////////////////////////// 
   
   

$('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
   $.ajax({
    url:"{{ route('prescription.doctorregiserforprescriptionpost') }}",
    method:"POST",
    data: new FormData(this),
    contentType: false,
    cache:false,
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
      $('#patient_table').DataTable().ajax.reload();
     }
	 
	      if(data.error)
     {
      html = '<div class="alert alert-danger">' + data.error + '</div>';
      $('#sample_form')[0].reset();
      $('#patient_table').DataTable().ajax.reload();
     }
	 
$('#form_result').html(html);

$('#form_result').fadeIn();
$('#form_result').delay(1500).fadeOut();

$('#form_result_footer').html(html);

$('#form_result_footer').fadeIn();
$('#form_result_footer').delay(1500).fadeOut();



$("#agentoption").hide();
$("#doctoroption").hide();




 

 $('.doctor_id').select2();
	 
	 
	 
	 
	 
    }
   })
  }


 });


});
</script>
</body>












@stop