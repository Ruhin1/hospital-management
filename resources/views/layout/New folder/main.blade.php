<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>South Zone Private Hospital</title>

    <!-- Custom fonts for this template-->
	
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 

	 <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

 <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="{{asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')}}"
        rel="stylesheet">
		
		<link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

      <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
	  

		<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js')}}"> </script>
		
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>		
			  
	  <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css')}}" />
  
		<script>
function myFunction() {
var b=   $('body').html();

var invoice =   $('#invoicemodelcontent').html();

var body=   $('body').html(invoice);

window.print();

$("#invoicemodel").modal('hide');
$('body').html(b);

}


$(document).ready(function(){
 $("#one").hide();
  $("#two").hide();

  $("#bone").click(function(){
    $("#one").show();
	$("#two").hide();
  });
  $("#btwo").click(function(){
   $("#one").hide();
	$("#two").show();
  });
});


	
	  
</script>
	
		
	
    <meta name="csrf-token" content="{{ csrf_token() }}">



<style>
a#two:link, a:visited {

  text-decoration: none;

}

a#two:hover, a:active {
  background-color: green;
  color: white;
}
</style>



		

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       
























	   <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
           
                <div class="sidebar-brand-text mx-3">Hospital Management System</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">



            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->



<ul>
 <a href="#"  id="bone" >  
 <i class="fas fa-fw fa-cog"></i> <span  style="color:white;"> ডাক্তার পয়েন্ট      </span>
 </a>
 <div id="one"> 
 <div class="bg-white py-2 collapse-inner rounded">
 <a style=" text-decoration: none;" class="collapse-item " href="{{url('doctorlist')}}"> ডাক্তারের নাম <br> ডাটাবেজে যুক্ত করেন </a>
 <a style=" text-decoration: none;"    class="collapse-item " href="{{url('doctortransition')}}"> ডাক্তারের সিরিয়াল কাটুন</a>                      
 </div>
 </div>
 </ul> <br>
 
 <ul>
 <a href="#" id="btwo" >  
 <i class="fas fa-fw fa-cog"></i> <span  style="color:white;" > প্যাথলজির রিপোর্ট তৈরি করুন    </span>
 </a>
 <div id="two"> 
 <div class="bg-white py-2 collapse-inner rounded">
 <a  style=" text-decoration: none;"  target="_blank"   class="collapse-item " href="{{url('pathologyreportmaking/showreport')}}">প্যাথলজির রিপোর্ট প্রিন্ট  করুন </a><br>    
 <a  style=" text-decoration: none;"  target="_blank" class="collapse-item " href="{{ url('reportlist') }}">প্যাথোলজি টেস্টের নাম, মূল্য <br> ডাটাবেজে যুক্ত করেন </a><br>
 </div>
 </div>
 </ul> <br>
 
 

			
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone"
                    aria-expanded="true" aria-controls="collapseone">
                    <i class="fas fa-fw fa-cog"></i>
                    <span> ডাক্তার পয়েন্ট      </span>
                </a>
                <div id="collapseone" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Users Components:</h6>
						 <a class="collapse-item" href="{{url('doctorlist')}}"> ডাক্তারের নাম <br> ডাটাবেজে যুক্ত করেন </a>
                        <a class="collapse-item" href="{{url('doctortransition')}}"> ডাক্তারের সিরিয়াল কাটুন</a>
                        

                    </div>
                </div>
            </li>
			
			
			            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone"
                    aria-expanded="true" aria-controls="collapseone">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>প্যাথলজির রিপোর্ট তৈরি করুন 
					</span>
                </a>
                <div id="collapseone" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Users Components:</h6>
                        <a target="_blank" class="collapse-item" href="{{url('pathologyreportmaking')}}">প্যাথলজির রিপোর্ট তৈরি করুন </a>
                        <a target="_blank"   class="collapse-item" href="{{url('pathologyreportmaking/showreport')}}">প্যাথলজির রিপোর্ট প্রিন্ট  করুন </a>
                       
				<a target="_blank" class="collapse-item" href="{{ url('reportlist') }}">প্যাথোলজি টেস্টের নাম, মূল্য <br> ডাটাবেজে যুক্ত করেন </a>
				
                    </div>
                </div>
            </li>
			
			
			
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Products</span>
        </a>
		<?php if (Auth::user()->role == 1) {      // Admin    ?>   
		
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
		   <a target="_blank"  class="collapse-item" href="{{ url('patientlist') }}">Add Patient</a>
            <a target="_blank" class="collapse-item" href="{{ url('medicinecategory') }}">Medicine Categories</a>
            <a target="_blank" class="collapse-item" href="{{ url('medicine') }}">Medicine List</a>
			<a target="_blank" class="collapse-item" href="{{ url('medicinetransition') }}">Medicine Sell corner</a>
				<a target="_blank"   class="collapse-item" href="{{ url('returnmedicinetransition') }}">Return Medicine</a>
				<a target="_blank" class="collapse-item" href="{{ url('cabinelist') }}">Cabinelist</a>
				<a target="_blank" class="collapse-item" href="{{ url('cabinetransaction') }}">Admit Patients in a Cabine </a>
				
				
				<a target="_blank" class="collapse-item" href="{{ url('reporttransaction') }}">pathology Test <br> Money Receipt </a>
			<a target="_blank" class="collapse-item" href="{{ url('agentlist') }}">Agent List</a>	
			<a target="_blank" class="collapse-item" href="{{ url('agenttransaction') }}">Give Commission to Agent </a>	
			<a target="_blank" class="collapse-item" href="{{ url('employeelist') }}">Employee List </a>
<a target="_blank" class="collapse-item" href="{{ url('employeetransactioncon') }}">Employee Salary </a>	
<a target="_blank" class="collapse-item" href="{{ url('externalcost') }}">External Cost  </a>
<a target="_blank" class="collapse-item" href="{{ url('showuserlist') }}">Allocate Duty <br> to the employee   </a>

 </div>
        </div>

		<?php } ?>
		
		
				<?php  if (Auth::user()->role == 4) {  // Account  ?>
		
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
		 
			<a target="_blank"  class="collapse-item" href="{{ url('medicinetransition') }}">Medicine Sell corner</a>
				<a target="_blank" class="collapse-item" href="{{ url('returnmedicinetransition') }}">Return Medicine</a>
				
				
				
				
				<a target="_blank" class="collapse-item" href="{{ url('reporttransaction') }}">pathology Test <br> Money Receipt </a>
			
			
			<a target="_blank" class="collapse-item" href="{{ url('agenttransaction') }}">Give Commission to Agent </a>	
			
			

<a target="_blank" class="collapse-item" href="{{ url('employeetransactioncon') }}">Employee Salary </a>	
<a target="_blank" class="collapse-item" href="{{ url('externalcost') }}">External Cost  </a>

 </div>
        </div>

		<?php } ?>
		
		
						<?php if (Auth::user()->role == 3) {  // Phermacy  ?>
		
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
		 
			<a target="_blank" class="collapse-item" href="{{ url('medicinetransition') }}">Medicine Sell corner</a>
				<a target="_blank" class="collapse-item" href="{{ url('returnmedicinetransition') }}">Return Medicine</a>
				
				
 </div>
        </div>
		<?php } ?>
        
		
		<?php if (Auth::user()->role == 10) {  // Deleted User ?>
		
		
		        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
		 
			
				
 </div>
        </div>
		
		<?php } ?>
		
		
		
      </li>

			
			
			



       
           
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Logout</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item active" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

               


		
		
		
		
		
		
		
		
			   <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                   

                
                    
               


                
                                    <a  style="width:200px; color:red; flow:right;"     class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                

                </nav>
                <!-- End of Topbar -->

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
              








			  <!-- Begin Page Content -->
                <div class="container-fluid">

                @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
	
	<!-- Data Tables             -->
	    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

	
	
	
	<script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

</body>

</html>