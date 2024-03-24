<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BICT HOSPITAL MANAGEMENT</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
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
  

 
 


    <style>
      .button {
        text-decoration: none;
        padding: 10px 20px;
        background-color: #4CAF50;
        display: inline-block;
        height: 40px;
        width: 150px;
        color: white;
        border-radius: 4px;
        transition: background-color 0.2s;
        text-align: center;
        margin-left: 5px;
      }
      
      .button:hover {
        background-color: #3e8e41;
        color: white;
        text-decoration: none;
      }
      

      
   

  /* input[type="date"] {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    background-color: #fff;
  } */

  .dropdown-item {
  color: #333;
  text-align: left;
  padding: 10px 20px;
}

.dropdown-item:hover {
  background-color: #eee;
}

.dropdown-item:focus {
  background-color: #eee;
  outline: none;
}

.dropdown-item.active, .dropdown-item:active {
  background-color: #007bff;
  color: #fff;
}



@media (max-width: 576px) { 
  .hide-in-mobile, .navbar-nav {

  display: none;
  }



 }
    </style>
 
 
 
 
 
 </head>
 <body>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
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
   $("#three").hide();
    $("#four").hide();
	    $("#five").hide();
		  $("#six").hide();
		     $("#seven").hide();
			  $("#eight").hide();
			 			  $("#nine").hide(); 
			  		  $("#ten").hide(); 
					  	  $("#eleven").hide(); 
						  	  	  $("#twelve").hide(); 
								  
								   $("#thirteen").hide(); 

  $("#bone").click(function(){
    $("#one").show();
	$("#two").hide();
	   $("#three").hide();
    $("#four").hide();
	 $("#five").hide();
	  $("#six").hide();
	     $("#seven").hide();
		  $("#eight").hide();
		  $("#nine").hide(); 
		    $("#ten").hide();
	  $("#eleven").hide();	
$("#thirteen").hide(); 	  
  });
  $("#btwo").click(function(){
   $("#one").hide();
	$("#two").show();
	$("#three").hide();
    $("#four").hide();
	 $("#five").hide();
	  $("#six").hide();
	     $("#seven").hide();
		  $("#eight").hide();
		  $("#nine").hide(); 
		    $("#ten").hide(); 
				  $("#eleven").hide();
				   $("#twelve").hide();
				   $("#thirteen").hide(); 
  });
  
    $("#bthree").click(function(){
   $("#one").hide();
	$("#two").hide();
	$("#three").show();
    $("#four").hide();
	 $("#six").hide();
	    $("#seven").hide();
		 $("#eight").hide();
		 $("#nine").hide(); 
		   $("#ten").hide(); 
		   	  $("#eleven").hide();
			     $("#twelve").hide();
				 $("#thirteen").hide(); 
  });
  
      $("#bfour").click(function(){
   $("#one").hide();
	$("#two").hide();
	$("#three").hide();
    $("#four").show();
	 $("#five").hide();
	  $("#six").hide();
	     $("#seven").hide();
		  $("#eight").hide();
		  $("#nine").hide(); 
		    $("#ten").hide();
	  $("#eleven").hide();	
   $("#twelve").hide();	  
   $("#thirteen").hide(); 
  });
  
        $("#bfive").click(function(){
   $("#one").hide();
	$("#two").hide();
	$("#three").hide();
    $("#four").hide();
	 $("#five").show();
	  $("#six").hide();
	     $("#seven").hide();
		  $("#eight").hide();
		  $("#nine").hide(); 
		    $("#ten").hide(); 
				  $("#eleven").hide();
				     $("#twelve").hide();
					 $("#thirteen").hide(); 
  });
  
  
          $("#bsix").click(function(){
   $("#one").hide();
	$("#two").hide();
	$("#three").hide();
    $("#four").hide();
	 $("#five").hide();
	  $("#six").show();
	   $("#seven").hide();
	    $("#eight").hide();
		$("#nine").hide(); 
		  $("#ten").hide(); 
		  	  $("#eleven").hide();
			     $("#twelve").hide();
				 $("#thirteen").hide(); 
  });
  
            $("#bseven").click(function(){
   $("#one").hide();
	$("#two").hide();
	$("#three").hide();
    $("#four").hide();
	 $("#five").hide();
	  $("#six").hide();
	   $("#seven").show();
	      	   $("#eight").hide();
			   $("#nine").hide(); 
			     $("#ten").hide(); 
				 	  $("#eleven").hide();
					     $("#twelve").hide();
						 $("#thirteen").hide(); 
  });
  
  
  
  
  
  
             $("#beight").click(function(){
   $("#one").hide();
	$("#two").hide();
	$("#three").hide();
    $("#four").hide();
	 $("#five").hide();
	  $("#six").hide();
	   $("#seven").hide();
	   	   $("#eight").show();
		   $("#nine").hide(); 
		     $("#ten").hide(); 
			 	  $("#eleven").hide();
				     $("#twelve").hide();
					 $("#thirteen").hide(); 
  }); 
  
  
  
  
               $("#bnine").click(function(){
   $("#one").hide();
	$("#two").hide();
	$("#three").hide();
    $("#four").hide();
	 $("#five").hide();
	  $("#six").hide();
	   $("#seven").hide();
	   	   $("#eight").hide();
		   $("#nine").show(); 
		     $("#ten").hide(); 
			 	  $("#eleven").hide();
				     $("#twelve").hide();
					 $("#thirteen").hide(); 
  }); 
  
  
 

               $("#bten").click(function(){
   $("#one").hide();
	$("#two").hide();
	$("#three").hide();
    $("#four").hide();
	 $("#five").hide();
	  $("#six").hide();
	   $("#seven").hide();
	   	   $("#eight").hide();
		   $("#nine").hide(); 
		     $("#ten").show(); 
			 	  $("#eleven").hide();
				     $("#twelve").hide();
					 $("#thirteen").hide(); 
  }); 



               $("#beleven").click(function(){
   $("#one").hide();
	$("#two").hide();
	$("#three").hide();
    $("#four").hide();
	 $("#five").hide();
	  $("#six").hide();
	   $("#seven").hide();
	   	   $("#eight").hide();
		   $("#nine").hide(); 
		     $("#ten").hide(); 
			 	  $("#eleven").show();
				     $("#twelve").hide();
					 $("#thirteen").hide(); 
  });


               $("#btwelve").click(function(){
   $("#one").hide();
	$("#two").hide();
	$("#three").hide();
    $("#four").hide();
	 $("#five").hide();
	  $("#six").hide();
	   $("#seven").hide();
	   	   $("#eight").hide();
		   $("#nine").hide(); 
		     $("#ten").hide(); 
			 	  $("#eleven").hide();
				     $("#twelve").show();
					 $("#thirteen").hide(); 
  });
 
  
  
  
  
  
                 $("#bthirteen").click(function(){
   $("#one").hide();
	$("#two").hide();
	$("#three").hide();
    $("#four").hide();
	 $("#five").hide();
	  $("#six").hide();
	   $("#seven").hide();
	   	   $("#eight").hide();
		   $("#nine").hide(); 
		     $("#ten").hide(); 
			 	  $("#eleven").hide();
				     $("#twelve").hide();
					
					  $("#thirteen").show(); 
  });
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
});




	
	  
</script>
	
		
	
    <meta name="csrf-token" content="{{ csrf_token() }}">







		

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       




	   <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - bg-gradient-primary Brand -->


            <!-- Divider -->
            <hr class="sidebar-divider my-0">



            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->



<ul>
 <a style=" text-decoration: none;" href="#"  id="bone" >  
 <i class="fas fa-fw fa-cog"></i> <span  style="color:white;"> ডাক্তার পয়েন্ট      </span>
 </a>
 <div id="one"> 
 <div class="bg-white py-2 collapse-inner rounded">
 <a style=" text-decoration: none;" class="collapse-item " href="{{url('doctorlist')}}"> ডাক্তারের নাম <br> ডাটাবেজে যুক্ত করেন </a><br><br>
 <p><br>
 
 <a style=" text-decoration: none;"    class="collapse-item " href="{{url('doctortransition')}}"> ডাক্তারের সিরিয়াল কাটুন</a> <br> <br>                    

<p><br>


 <a style=" text-decoration: none;"    class="collapse-item " href="{{url('doctortransition/finddoctorpatient')}}"> ডাক্তারের কাছে আসা রোগীর তালিকা  প্রিন্ট করেন </a> <br> <br>                    

<p><br>

<a target="_blank" class="collapse-item" href="{{ url('doctorcommission') }}"> ডাক্তাদের কমিশন/ শেয়ারের <br>  টাকা  দেন  </a><br><br>
<p><br>
<a target="_blank" class="collapse-item" href="{{ url('prescription') }}"> প্রেসক্রিপশন তৈরি  </a><br><br>
<p><br>
<a target="_blank" class="collapse-item" href="{{ url('printprescription') }}"> প্রেসক্রিপশন প্রিন্ট করেন   </a><p> <p>
<p><br> 

<a target="_blank" class="collapse-item" href="{{ url('prescriptionusages') }}"> ব্যাবহার বিধি যুক্ত করেন-১    </a><p>

<p><br>
<a target="_blank" class="collapse-item" href="{{ url('prescriptionusagestwo') }}"> ব্যাবহার বিধি যুক্ত করেন-2 ( খাবার আগে /পরে )     </a><p>
<p><br>
<a target="_blank" class="collapse-item" href="{{ url('doctorregiserforprescription') }}"> ডাক্তার রেজিস্ট্রেশন    </a><p>
 <p><br>
 
  <a target="_blank" class="collapse-item" href="{{ url('doctortransition/doctorincome') }}">  কোন ডাক্তারের কাছে আসা রোগীদের তালিকা     </a><p>
 <p><br>
  
 <a target="_blank" class="collapse-item" href="{{ url('doctortransition/selectuser') }}">  কোন এম্পলি কর্তৃক আউটডোর ডাক্তারের কালেকশন     </a><p>
 <p><br>
 
 <a target="_blank" class="collapse-item" href="{{ url('doctortransition/selectagent') }}">  কোন এজেন্ট  কর্তৃক আউটডোর কোন ডাক্তারের কাছে পাঠানো রোগীর তালিকা      </a><p>
 <p><br> 
 
 <a target="_blank" class="collapse-item" href="{{ url('doctorstatementoday') }}"> আজকে আউটডোরে ডাক্তারদের রোগী থেকে আয়    </a><p>
 <p><br>
 
 <a target="_blank" class="collapse-item" href="{{ url('doctorstatementyesterday') }}"> গতকাল আউটডোরে ডাক্তারদের রোগী থেকে আয়    </a><p> 
 
 <p><br>
  <a target="_blank" class="collapse-item" href="{{ url('doctorstatementthismonth') }}"> চলতি মাসে আউটডোরে ডাক্তারদের রোগী থেকে আয়    </a><p>
 
 <p><br>
  <a target="_blank" class="collapse-item" href="{{ url('doctorstatementthisyear') }}"> চলতি বছরে আউটডোরে ডাক্তারদের রোগী থেকে আয়    </a><p>
 <p><br>
  <a target="_blank" class="collapse-item" href="{{ url('picktwodatefordoctortransition') }}"> যে কোন দুই তারিখের মধ্যবর্তী সময়ে  আউটডোরে রোগী থেকে আয়    </a><br>
 
 </div>
 </div>
 </ul> <br>
 
 
 
 
   <ul>
 <a style=" text-decoration: none;" href="#" id="bthirteen" >  
 <i class="fas fa-fw fa-cog"></i> <span  style="color:white;" > ডেন্টিস্ট   </span>
 </a> 
 <div id="thirteen"> 
 <div class="bg-white py-2 collapse-inner rounded">
 
<a style=" text-decoration: none;"  target="_blank"  class="collapse-item" href="{{ url('dentalservice') }}">**** ডেন্টাল সার্ভিস সমূহের মূল্য তালিকা  </a><br>
<p><br>



<a style=" text-decoration: none;"  target="_blank"  class="collapse-item" href="{{ url('dentalservicecontroller/unfinished') }}">**** Unfinished Tasks   </a><br>
<p><br>


<a style=" text-decoration: none;"  target="_blank"  class="collapse-item" href="{{ url('dentalservice/Paitent_unfini') }}">**** কোন প্যাসেন্টের লং টার্ম ট্রিটমেন্টের খরচ পরিষোধের রিপোর্ট দেখেন   </a><br>
<p><br>


</div>
 </div>
 </ul> <br> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <ul>
 <a style=" text-decoration: none;" href="#" id="btwo" >  
 <i class="fas fa-fw fa-cog"></i> <span  style="color:white;" > প্যাথলজি     </span>
 </a>
 <div id="two"> 
 <div class="bg-white py-2 collapse-inner rounded">
 
  <a  style=" text-decoration: none;"  target="_blank" class="collapse-item " href="{{ url('reportlist') }}">****প্যাথোলজি টেস্টের নাম, মূল্য  ডাটাবেজে যুক্ত করেন </a><br><br>
<p><br> 
  <a  style=" text-decoration: none;"  target="_blank" class="collapse-item " href="{{ url('pathologytestcomponent') }}">****প্যাথোলজি টেস্টে কম্পনেন্টের  নাম, নরমাল ভ্যালু   ডাটাবেজে যুক্ত করেন </a><br><br>
 <p><br>
  <a  style=" text-decoration: none;"  target="_blank" class="collapse-item " href="{{ url('reagent') }}">****রিএজেন্টের নাম</a><br><br>
 <p><br>
  <a  style=" text-decoration: none;"  target="_blank" class="collapse-item " href="{{ url('reagentransaction/index') }}">****রিএজেন্টের ক্রয় ও ক্রয়-ফেরত</a><br><br>
 <p><br>

 <a  style=" text-decoration: none;"  target="_blank"   class="collapse-item " href="{{url('pathologyreportmaking')}}">****প্যাথলজি টেস্টের রিপোর্ট তৈরি  করুন </a><br><br>    
 <p><br>
 <a  style=" text-decoration: none;"  target="_blank"   class="collapse-item " href="{{url('pathologyreportmaking/showreport')}}">**** হ্যান্ড ওভার না হওয়া , প্যাথলজির রিপোর্ট প্রিন্ট  করুন </a><br> <br>   
 <p><br>

   <a  style=" text-decoration: none;" target="_blank" class="collapse-item" href="{{ url('pathologyreportmaking/showreportforhandover') }}"> ****   হ্যান্ড ওভার হওয়া প্যাথলজি রিপোর্ট এর লিস্ট      </a><br><br>
<p><br>
 
  <a  style=" text-decoration: none;" target="_blank" class="collapse-item" href="{{ url('pathologyreportmaking/showreportforspecific') }}"> ****  কোন প্যাসেন্টের অতীতের প্যাথলজি রিপোর্ট খুজে বের করুন তার মোবাইল নম্বর দিয়ে   </a><br><br>
<p>




 <a  style=" text-decoration: none;" target="_blank" class="collapse-item" href="{{ url('reporttransaction') }}"> ****  কাস্টমার থেকে বিল নেন ও ভাউচার প্রিন্ট করেন </a><br><br>
 <p><br>
  <a  style=" text-decoration: none;" target="_blank" class="collapse-item" href="{{ url('reporttransaction') }}"> ****  অতীতে কাস্টমার এর সাথে  প্যাথলজি সংক্রান্ত যত ট্রাঞ্জিশন হয়েছে সেগুলোর রেকর্ড দেখুন ।   </a><br><br>

 <p><br>
 
 
 



   <a  style=" text-decoration: none;" target="_blank" class="collapse-item" href="{{ url('pathologytranspicktwodate') }}"> ****  যে কোন তারিখের প্যাথলজির সকল ট্রাঞ্জিশন দেখুন    </a><br><br>
<p><br>

   <a  style=" text-decoration: none;" target="_blank" class="collapse-item" href="{{ url('reporttransaction/selectuser') }}"> ****   কোন নির্দিষ্ট এম্পলয়ি  কর্তৃক নেয়া প্যাথলজির সকল কালেকশন দেখুন    </a><br><br>
<p><br>


   <a  style=" text-decoration: none;" target="_blank" class="collapse-item" href="{{ url('reporttransaction/selectrefdoct') }}"> ****  রেফারেন্স ডাক্তার কর্তৃক  পাঠানো প্যাসেন্টের ট্রাঞ্জিশন     </a><br><br>
<p><br>


   <a  style=" text-decoration: none;" target="_blank" class="collapse-item" href="{{ url('reporttransaction/selectagent') }}"> ****   এজেন্ট  কর্তৃক  পাঠানো প্যাসেন্টের  ট্রাঞ্জিশন     </a><br><br>
<p><br>

<a target="_blank" class="collapse-item" href="{{ url('pathologytestfromother') }}">
  ****বাইরের ডায়াগোনেস্টিক  <br> থেকে  টেস্ট করা বাবদ খরচ  <br> 
</a>
<p><br>


   <a  style=" text-decoration: none;" target="_blank" class="collapse-item" href="{{ url('reporttransaction/select') }}"> ****  যে কোন একটি নির্দিষ্ট প্যাথলজি টেস্ট থেকে আয় দেখুন    </a><br><br>
<p><br>


 </div>
 </div>
 </ul> <br>
 
 

<ul>
<a style=" text-decoration: none;" href="#" id="bthree" >  
<i class="fas fa-fw fa-cog"></i> <span  style="color:white;" > মেডিসিন  কর্নার  </span>
</a> 
<div id="three"> 
<div class="bg-white py-2 collapse-inner rounded">
<a style=" text-decoration: none;" target="_blank" class="collapse-item" href="{{ url('medicinecategory') }}">****মেডিসিনে ক্যাটগরি তালিকা তৈরি </a><br><br>
<a style=" text-decoration: none;" target="_blank" class="collapse-item" href="{{ url('medicine') }}">****স্টকে থাকা মেডিসিনের তালিকা , পরিমাণ ও নতুন মেডিসিন তালিকায় যুক্ত করেন </a><br><br>

<a style=" text-decoration: none;" target="_blank" class="collapse-item" href="{{ url('medicinetransition') }}">****মেডিসিন বিক্রি করেন </a><br><br>
<a style=" text-decoration: none;" target="_blank"   class="collapse-item" href="{{ url('returnmedicinetransition') }}">****বিক্রি করা মেডিসিন ফেরত নেন  </a><br><br>

<br>
<a style=" text-decoration: none;" target="_blank"   class="collapse-item" href="{{ url('medicinecomapnytransition') }}">**** মেডিসিন কোম্পানি থেকে মেডিসিন ক্রয় করেন।    </a>
<br><br>
<a style=" text-decoration: none;" target="_blank" class="collapse-item" href="{{ url('medicinecomapny') }}">****মেডিসিন কোম্পানির নামের তালিকা  ও দেনা পাওনার হিসাব   </a><br><br>


<a style=" text-decoration: none;" target="_blank"   class="collapse-item" href="{{ url('medcinercompanydenapawanshod') }}">**** মেডিসিন কোম্পানির দেনা ও পাওনা মিটিয়ে ফেলুন   </a><br><br>

<br>

<a style=" text-decoration: none;" target="_blank"   class="collapse-item" href="{{ url('duecolletionphermachy') }}">**** আউটডোর রেজিস্টার কাস্টমার থেকে বকেয়া আদায়     </a>
<br><br>

<a style=" text-decoration: none;" target="_blank"   class="collapse-item" href="{{ url('duecollection_inddor') }}">****  ইনডোর রোগী থেকে বকেয়া আদায়     </a>
<br><br>


<a style=" text-decoration: none;" target="_blank"   class="collapse-item" href="{{ url('duecolletionphermachy/stilldueout') }}">**** আউটডোর রেজিস্টার কাস্টমার যাদের কাছে বাকি আছে তাদের নাম প্রিন্ট করেন      </a>
<br><br>


<a style=" text-decoration: none;" target="_blank"   class="collapse-item" href="{{ url('duecolletionphermachy/duetrans') }}">**** আউটডোর ফার্মেসির ডিউ ট্রাঞ্জিশন দেখুন      </a>
<br><br>

<a style=" text-decoration: none;" target="_blank"   class="collapse-item" href="{{ url('medicinetransition/datepick') }}">****       বিক্রয় - বিক্রয় ফেরত - ডিউ কালেকশন   রিপোর্ট  দেখেন     </a>
<br><br>


<a style=" text-decoration: none;" target="_blank"   class="collapse-item" href="{{ url('medicinetransition/stock') }}">****   মেডিসিন  স্টক দেখুন   </a>
<br><br>



</div>
</div>
</ul> <br>


 <ul>
 <a style=" text-decoration: none;" href="#" id="bfour" >  
 <i class="fas fa-fw fa-cog"></i> <span  style="color:white;" >  কেবিন ও সার্ভিস  </span>
 </a> 
 <div id="four"> 
 <div class="bg-white py-2 collapse-inner rounded">
<!--
<a style=" text-decoration: none;"  target="_blank"  class="collapse-item" href="{{ url('patientlist') }}">****নতুন রোগী ভর্তি </a><br>
-->

<a style=" text-decoration: none;"  target="_blank" class="collapse-item" href="{{ url('cabinelist') }}">**** তালিকায় নতুন কেবিন/বেড  যুক্ত করেন </a><br>
<p><br>

<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('cabinefees') }}">**** কেবিন ভাড়া আদায়    </a><br>
<p><br>


<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('cabinetransfer') }}">****  সিট ট্রান্সফার    </a><br>
<p><br>


<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('servicelist') }}">**** সার্ভিস সমূহের মূল্য তালিকা    </a><br>
<p><br>


<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('servicetranstion') }}">****  প্যাসেন্টের নতুন সার্ভিস চার্জ যুক্ত করেন     </a><br>
<p><br>












 </div>
 </div>
 </ul> <br>
 
 
 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  <ul>
 <a style=" text-decoration: none;" href="#" id="beight" >  
 <i class="fas fa-fw fa-cog"></i> <span  style="color:white;" >   রোগী  , অগ্রিম গ্রহণ ও  বকেয়া আদায়  </span>
 </a> 
 <div id="eight"> 
 <div class="bg-white py-2 collapse-inner rounded">


<a style=" text-decoration: none;"  target="_blank"  class="collapse-item" href="{{ url('patientlist') }}">**** রোগীর লিস্ট </a><br>

<p><br>

  <a style=" text-decoration: none;"  target="_blank"  class="collapse-item" href="{{ url('patientlist/fetchlist') }}">**** রোগীর  রেকর্ড </a><br>

  <p><br>
  
<a style=" text-decoration: none;"  target="_blank"  class="collapse-item" href="{{ url('advancedeposit') }}">**** অগ্রিম গ্রহণ </a><br>
<p><br>

<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('cabinetransaction') }}">**** ইনডোরে রোগী ভর্তি  এবং ফাঁকা বেড এর তালিক দেখেন  </a><br>
<p><br>
<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('bookingpatient') }}">****  রিলিজ হওয়া রোগির ফাইনাল রিপোর্ট         </a><br>
<p><br>



<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('finalreport') }}">**** ভর্তি থাকা রোগিদের তালিকা দেখুন,  রিলিজ করুন ও বিল প্রিন্ট করুন      </a><br>
<p><br>

<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('finalreport/duepayment') }}">**** বকেয়া আদায় করুন    </a><br>
<p><br>









<!--
<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('dueofoutdorpat') }}">****  আউটডোর রোগীর বাকি পরিষোধের রিপোর্ট     </a><br>
<p><br>
-->

<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('duepaymenttrans') }}">****  ডিউ পেমেন্ট ট্রাঞ্জিশন     </a><br>
<p><br>

<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('stilldueout') }}">****  যে সব প্যাসেন্টের কাছে টাকা পান তাদের তালিকা প্রিন্ট করেন    </a><br>
<p><br>



<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('duepaymenttrans/date') }}">**** কোন ডেটের  ডিউ কালেকশন   </a><br>
<p><br>


 <a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('duepaymenttrans/selectuser') }}">**** এম্পলয়ি কর্তৃক  কোন ডেটের  ডিউ কালেকশন   </a><br>
<p><br>




 

 
 
 
 </div>
 </div>
 </ul> <br>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
   <ul>
 <a style=" text-decoration: none;" href="#" id="bfive" >  
 <i class="fas fa-fw fa-cog"></i> <span  style="color:white;" >সার্জারি বিভাগ   </span>
 </a> 
 <div id="five"> 
 <div class="bg-white py-2 collapse-inner rounded">
 
<a style=" text-decoration: none;"  target="_blank"  class="collapse-item" href="{{ url('surgerylist') }}">****হাসপাতালে হওয়া সার্জারিসমূহের তালিকা ও সেবা মূল্য নির্ধারণ</a><br>
<p><br>
<a style=" text-decoration: none;"  target="_blank" class="collapse-item" href="{{ url('surgerytansition') }}">**** সার্জারির সেবা মূল্য বাবদ রোগী থেকে অর্থ গ্রহণ ও ভাউচার প্রিন্ট </a><br>

</div>
 </div>
 </ul> <br>

  
    <ul>
 <a style=" text-decoration: none;" href="#" id="bten" >  
 <i class="fas fa-fw fa-cog"></i> <span  style="color:white;" > এজেন্ট    </span>
 </a> 
 <div id="ten"> 
 <div class="bg-white py-2 collapse-inner rounded">
 
<a target="_blank" class="collapse-item" href="{{ url('agentlist') }}">এজেন্টদের তালিকা </a>	<p><p>
<a target="_blank" class="collapse-item" href="{{ url('agenttransaction') }}">এজেন্টকে কমিশন দেন  </a>	
</div>
 </div>
 </ul> <br>
 
 
 
 
 

 
 
    <ul>
 <a style=" text-decoration: none;" href="#" id="beleven" >  
 <i class="fas fa-fw fa-cog"></i> <span  style="color:white;" > কর্মচারী
 </span>
 </a> 
 <div id="eleven"> 
 <div class="bg-white py-2 collapse-inner rounded">
 
 <a target="_blank" class="collapse-item" href="{{ url('employeelist') }}">কর্মচারী , কর্মকরতাদের তালিকা  </a><P><p>
<a target="_blank" class="collapse-item" href="{{ url('employeetransactioncon') }}">কর্মচারী , কর্মকরতাদের বেতন  </a><P><p>

<a target="_blank" class="collapse-item" href="{{ url('employeeshow') }}">এম্পলয়িদের  বেতনের লেজার সিট   </a><p><p>

<a target="_blank" class="collapse-item" href="{{ url('datepic') }}"> কোন দুই ডেটের মধ্যে দেয়া এম্পলয়িদের বেতনের সিট   </a>
<p><p>
<a target="_blank" class="collapse-item" href="{{ url('month_year_pick') }}"> কোন  মাসে দেয়া এম্পলয়িদের বেতনের সিট   </a>


</div>
 </div>
 </ul> <br>
 
 

 

 
 
 
 


  <ul>
 
 <a style=" text-decoration: none;" href="#" id="bsix" >  
 <i class="fas fa-fw fa-cog"></i> <span  style="color:white;" > বিভিন্ন রিপোর্ট প্রিন্ট করেন   </span>
 </a> 
 <div id="six"> 
 <div class="bg-white py-2 collapse-inner rounded">
 
<a style=" text-decoration: none;"  target="_blank"  class="collapse-item" href="{{ url('incomestatementtoday') }}">****আজকের দিনের আয় ব্যায়ের হিসাব </a><br>
 <br>
 
 <a  style=" text-decoration: none;" target="_blank" class="collapse-item" href="{{ url('pathologytranspicktwodate') }}"> ****  যে কোন তারিখের প্যাথলজির সকল ট্রাঞ্জিশন দেখুন    </a><br><br>
<p><br>
 
 
    <a  style=" text-decoration: none;" target="_blank" class="collapse-item" href="{{ url('reporttransaction/select') }}"> ****  যে কোন একটি নির্দিষ্ট প্যাথলজি টেস্ট থেকে আয় দেখুন    </a><br><br>
<p><br>
 
 <a target="_blank" class="collapse-item" href="{{ url('agenttransaction/datepic') }}">
  *** কমিশন রিপোর্ট দেখুন <br> 
</a>
<p>
 

 
 
   <a target="_blank" class="collapse-item" href="{{ url('doctortransition/doctorincome') }}">  কোন  তারিখে কোন ডাক্তারের কাছে আসা রোগীদের তালিকা  ও ইনকাম   </a><p>
 <p><br>
<a target="_blank" class="collapse-item" href="{{ url('month_year_pick') }}"> কোন  মাসে দেয়া এম্পলয়িদের বেতনের সিট   </a><p>
 
  <a style=" text-decoration: none;" target="_blank"   class="collapse-item" href="{{ url('medicinetransition/datepick') }}">****  মেডিসিন  বিক্রয় - বিক্রয় ফেরত - ডিউ কালেকশন   রিপোর্ট  দেখেন     </a>
<br><br>


<a style=" text-decoration: none;" target="_blank"   class="collapse-item" href="{{ url('medicinetransition/stock') }}">****   মেডিসিন  স্টক দেখুন   </a>
<br><br>
 
 


<a target="_blank" class="collapse-item" href="{{ url('khorochtransition/list') }}">
 
*** দুই ডেটের মধ্যবর্তী সময়ে কোন একটি নির্দিষ্ট খরচের  ডিটেইলস দেখুন 
</a><p>
 <p>
 
 
 
 <a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('stilldueout') }}">****  যে সব প্যাসেন্টের কাছে টাকা পান তাদের তালিকা প্রিন্ট করেন    </a><br>
<p><br>



<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('duepaymenttrans/date') }}">**** কোন ডেটের  ডিউ কালেকশন   </a><br>
<p><br>


 <a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('duepaymenttrans/selectuser') }}">**** কোন  নির্দিষ্ট এম্পলয়ি কর্তৃক  কোন ডেটের  ডিউ কালেকশন   </a><br>
<p><br>
 
 
 
 
 <a target="_blank" class="collapse-item" href="{{ url('employeeshow') }}">এম্পলয়িদের  বেতনের লেজার সিট   </a><p><p>

<a target="_blank" class="collapse-item" href="{{ url('datepic') }}"> কোন মাসে দেয়া এম্পলয়িদের বেতনের সিট   </a><P><P>

<a target="_blank" class="collapse-item" href="{{ url('patient_cash_get') }}"> কোন প্যাসেন্টের ক্যাশ ট্রাঞ্জিশন দেখুন    </a><P><P> 
 
 
 
 
 <!--
 <a style=" text-decoration: none;"  target="_blank"  class="collapse-item" href="{{ url('incomestatementyesterday') }}">****গতকালকের আয় ব্যায়ের হিসাব </a><br>
 <br>

<a style=" text-decoration: none;"  target="_blank"  class="collapse-item" href="{{ url('incomestatementthismonth') }}">****চলতি মাসের আয় ব্যায়ের হিসাব </a><br>
 <br>
 <a style=" text-decoration: none;"  target="_blank"  class="collapse-item" href="{{ url('incomestatementlastmonth') }}">****গত মাসের আয় ব্যায়ের হিসাব </a><br>
 <br>
<a style=" text-decoration: none;"  target="_blank"  class="collapse-item" href="{{ url('incomestatementthisyear') }}">****চলতি বছরের আয় ব্যায়ের হিসাব </a><br>
 <br>
-->
<a style=" text-decoration: none;"  target="_blank"  class="collapse-item" href="{{ url('picktwodate') }}">****যে কোন দুই ডেটের মধ্যবর্তী সময়ের হিসাব  </a><br>
 <br>

<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('bookingpatient') }}">****  রিলিজ হওয়া রোগির ফাইনাল রিপোর্ট         </a><br>
<p><br>

</div>
 </div>
 </ul> <br>
 
 
 
 
 
 
 
 
  <ul>
 <a style=" text-decoration: none;" href="#" id="bseven" >  
 <i class="fas fa-fw fa-cog"></i> <span  style="color:white;" > ব্যাবসায়ী পার্টনারদের নামের তালিকা ও তাদের টাকা উত্তোলন ও জমা সংক্রান্ত হিসাব       </span>
 </a>
 <div id="seven"> 
 <div class="bg-white py-2 collapse-inner rounded">
 
 
<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('businesspartner') }}">****  পার্টনারদের নামের তালিকা ও তাদের মোট বিনিয়োগ ও টাকা উত্তোলনের হিসাব।     </a><br>
<br>
 
 
<a style=" text-decoration: none;"  target="_blank"  class="collapse-item" href="{{ url('takauttolon') }}">**** টাকা জমা/ উত্তোলন সংক্রান্ত সকল ট্রাঞ্জিশন  </a><br>
<br>
<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('joma_uttolon_statement_today') }}">****  আজকের দিনে টাকা উত্তোলন  ও টাকা জমা/বিনিয়োগের হিসাব ।     </a><br>
<br>

<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('joma_uttolon_statement_yesterday') }}">****  গতকালের টাকা উত্তোলন  ও টাকা জমা/বিনিয়োগের হিসাব ।     </a><br>
<br>

<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('joma_uttolon_statement_month') }}">****  চলতি মাসের টাকা উত্তোলন  ও টাকা জমা/বিনিয়োগের হিসাব ।     </a><br>
<br>

<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('joma_uttolon_statement_lastmonth') }}">****  গত মাসের টাকা উত্তোলন  ও টাকা জমা/বিনিয়োগের হিসাব ।     </a><br>
<br>

<a style=" text-decoration: none;"   target="_blank" class="collapse-item" href="{{ url('joma_uttolon_statement_year') }}">****  চলতি বছরের টাকা উত্তোলন  ও টাকা জমা/বিনিয়োগের হিসাব ।     </a><br>
<br>

 </div>
 </div>
 </ul> <br>











  <ul>
 <a style=" text-decoration: none;" href="#" id="bnine" >  
 <i class="fas fa-fw fa-cog"></i> <span  style="color:white;" >  সফটও্যারে এম্পলয়িদের এক্সেস দেনঃ  </span>
 </a> 
 <div id="nine"> 
 <div class="bg-white py-2 collapse-inner rounded">

<a target="_blank" class="collapse-item" href="{{ url('showuserlist') }}"> সফটও্যারে স্টাফদের <br> এক্সেস দেন  </a>

<p><br>

 </div>
 </div>
 </ul> <br>




			
       <ul>
 <a style=" text-decoration: none;" href="#" id="btwelve" >  
 <i class="fas fa-fw fa-cog"></i> <span  style="color:white;" > খুচরা খরচ 
 </span>
 </a> 
 <div id="twelve"> 
 <div class="bg-white py-2 collapse-inner rounded">
 
<a target="_blank" class="collapse-item" href="{{ url('externalcost') }}"> খুচরা খরচ   </a>

</div>
 </div>
 </ul> <br>     
			
	
			
			
			
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span> বড় খরচ এর খাত  </span>
        </a>
		<?php if (Auth::user()->role == 1) {      // Admin    ?>   
		
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
		   
		  
				
				





	




<a target="_blank" class="collapse-item" href="{{ url('khorocer_khad') }}"> <span style="color:red " > খরচের <br> খাত </span>  তৈরি করেন।   </a>

<a target="_blank" class="collapse-item" href="{{ url('khorochtransition/sompod') }}"> সম্পদ ক্রয়/ খরচ      </a>

<a target="_blank" class="collapse-item" href="{{ url('khorochtransition/sompod_pdf') }}"> সম্পদের তালিকা     </a>

<a target="_blank" class="collapse-item" href="{{ url('supplier') }}">   <span style="color:red " >   সাপ্লাইয়ার  </span>  তালিকা ও বিবরণ     </a>

<a target="_blank" class="collapse-item" href="{{ url('supplier_due_advance_pay_or_get/index') }}">
  সাপ্লাইয়ারের কাছে থেকে <br> <span style="color:red;"> দেনা আদায় করেন ও পাওনা</span> <br> মিটিয়ে দেন । 
</a>
 
<br> <span style="color:red " >  




<a target="_blank" class="collapse-item" href="{{ url('khorochtransition') }}">  
  <span style="color:red " > খরচের করুন / <br>   </span> পূর্বের খরচ দেখেন   <br> 
    <br>
   </span> 
   </a>

<a target="_blank" class="collapse-item" href="{{ url('pathologytestfromother') }}">
  বাইরের ডায়াগোনেস্টিক  <br> থেকে  টেস্ট করা বাবদ খরচ  <br> 
</a>
<p>



<a target="_blank" class="collapse-item" href="{{ url('agenttransaction') }}">
 এজেন্ট কমিশন  <br> 
</a>
<p>

<a target="_blank" class="collapse-item" href="{{ url('doctorcommission') }}">
 ডাক্তার কমিশন  <br> 
</a>

<p>


<a target="_blank" class="collapse-item" href="{{ url('agenttransaction/datepic') }}">
  কমিশন রিপোর্ট দেখুন <br> 
</a>
<p>

<a target="_blank" class="collapse-item" href="{{ url('khorochtransition/list') }}">
 
দুই ডেটের মধ্যবর্তী সময়ে,<br> কোন একটি নির্দিষ্ট খরচের <br> ডিটেইলস দেখুন 
</a>










 </div>
        </div>

		<?php } ?>
		
		
				<?php  if (Auth::user()->role == 4) {  // Account  ?>
		
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">

          <a target="_blank" class="collapse-item" href="{{ url('khorocer_khad') }}"> <span style="color:red " > খরচের <br> খাত </span>  তৈরি করেন।   </a>

<a target="_blank" class="collapse-item" href="{{ url('khorochtransition/sompod') }}"> সম্পদ ক্রয়/ খরচ      </a>

<a target="_blank" class="collapse-item" href="{{ url('khorochtransition/sompod_pdf') }}"> সম্পদের তালিকা     </a>

<a target="_blank" class="collapse-item" href="{{ url('supplier') }}">   <span style="color:red " >   সাপ্লাইয়ার  </span>  তালিকা ও বিবরণ     </a>

<a target="_blank" class="collapse-item" href="{{ url('supplier_due_advance_pay_or_get/index') }}">
  সাপ্লাইয়ারের কাছে থেকে <br> <span style="color:red;"> দেনা আদায় করেন ও পাওনা</span> <br> মিটিয়ে দেন । 
</a>
 
<br> <span style="color:red " >  




<a target="_blank" class="collapse-item" href="{{ url('khorochtransition') }}">  
  <span style="color:red " > খরচের করুন / <br>   </span> পূর্বের খরচ দেখেন   <br> 
    <br>
   </span> 
   </a>

<a target="_blank" class="collapse-item" href="{{ url('pathologytestfromother') }}">
  বাইরের ডায়াগোনেস্টিক  <br> থেকে  টেস্ট করা বাবদ খরচ  <br> 
</a>
<p>



<a target="_blank" class="collapse-item" href="{{ url('agenttransaction') }}">
 এজেন্ট কমিশন  <br> 
</a>
<p>

<a target="_blank" class="collapse-item" href="{{ url('doctorcommission') }}">
 ডাক্তার কমিশন  <br> 
</a>
<p>


<a target="_blank" class="collapse-item" href="{{ url('agenttransaction/datepic') }}">
  কমিশন রিপোর্ট দেখুন <br> 
</a>
<p>

<a target="_blank" class="collapse-item" href="{{ url('khorochtransition/list') }}">
 
দুই ডেটের মধ্যবর্তী সময়ে,<br> কোন একটি নির্দিষ্ট খরচের <br> ডিটেইলস দেখুন 
</a>



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

                  <a      class="button" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   {{ __('Logout') }}
               </a>
<a class="button"   href="{{ url('admindashboard') }}" > ড্যাশবোর্ড    </a>   
<a class="button"   href="{{ url('setting') }}" > সেটিংস </a>            
<a class="button  hide-in-mobile"   href="{{ url('khorochtransition') }}" >   খরচ   </a>                     
<a class="button  hide-in-mobile"   href="{{url('pathologyreportmaking/showreport')}}" > রিপোর্ট </a> 
 
<a class="button  hide-in-mobile"   href="{{url('cabinetransaction')}}" > ভর্তি </a> 
<a class="button  hide-in-mobile"   href="{{url('finalreport')}}" > রিলিজ </a>
<div class="dropdown  hide-in-mobile">
  <button class="btn button  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    কমিশন  
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{url('doctorcommission')}}">ডাক্তার </a>
    <a class="dropdown-item"  href="{{url('agenttransaction')}}">এজেন্ট</a>
  
  </div>
  <script>
    $(document).ready(function() {
      $('.dropdown-toggle').dropdown();
    });
  </script>
</div> 
<div class="dropdown  hide-in-mobile">
  <button class="btn button  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    বিল 
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{url('reporttransaction')}}">প্যাথলজি</a>
    <a class="dropdown-item"  href="{{url('medicinetransition')}}">মেডিসিন</a>
    <a class="dropdown-item" href="{{url('doctortransition')}}" >ডাক্তার </a> 
    <a class="dropdown-item" href="{{url('surgerytansition')}}"> সার্জারি </a> 
    <a class="dropdown-item" href="{{url('servicetranstion')}}"> সার্ভিস </a>  
    <a class="dropdown-item"  href="{{url('cabinefees')}}" > কেবিন </a> 
    <a class="dropdown-item"  href="{{url('advancedeposit')}}" > অগ্রিম গ্রহণ </a>
    <a class="dropdown-item"   href="{{url('finalreport/duepayment')}}" > বকেয়া আদায় </a>
  </div>
  

  <script>
    $(document).ready(function() {
      $('.dropdown-toggle').dropdown();
    });
  </script>
</div>




   





								
						






















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
                        <span>Copyright &copy; BICTSOFT</span>
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


    <script>
      $(document).ready(function() {
        $('.dropdown-toggle').dropdown();
      });
    </script>


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