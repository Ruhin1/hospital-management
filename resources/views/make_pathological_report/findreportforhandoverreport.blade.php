

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


    @if ($message = Session::get('success'))
        <div style="background-color:red;" class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<!-------------------------------------------- invoice model---------------------------------   -->




































<!----------------------------------------------------------------------------------- -->






<div    class="container">
  <div class="row">
    <div class="col-md-12 col-sm-6" >
    <h2 style="color:red;">তৈরি হওয়া প্যাথলজি টেস্টের  রিপোর্ট প্রিন্ট করেন ও কাস্টমারের কাছে হ্যান্ড ওভার করেন  </h2>
    
	

		<label style="color:red;">Search by Name.</label>
	<input type="text" id="myInputforname" onkeyup="myFunctionforname()" placeholder="Search for Name.."><p>
	
	<label style="color:red;">Search by Order No.</label>
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Order No.."><p>
	
	<label style="color:red;">Search by ID.</label>
	<input type="text" id="myInputid" onkeyup="myFunctionid()" placeholder="Search for Order ID.."><p>
		



	
	<div   class="table-responsive">
    <table   id="patient_table"  class="table  table-success table-striped data-tablem ">
        <thead>
            <tr>
			<th>Order No.</th>
			<th>Patient Name</th>
			<th>Patient ID</th>
			<th>Due</th>
	        <th>Status</th>
			<th>Tset No.</th>
		
			
            </tr>
        </thead>
        <tbody   >
		
		@foreach ($makereport as $u) 
 
	
		<tr>
    <td > {{$u->id}} </td> 	
<td > {{$u->patient->name}} </td>	
<td > {{$u->patient->id}} </td>	
      <td > {{$u->due}} </td>  
   
<?php if($u->status == 0) { ?>

 <td >  <a  href= "{{route('pathologyreportmaking.deliever',$u->id ) }}" > Deliever </a>  </td>

<?php  } if($u->status == 1) { ?>

<td >Hand Over Complete </td>
<?php } ?>

<td>
<table>


		<thead>
		<th>Test No</th>
			<th>Print</th>
            
			
</thead>

<?php 

$distincttest=0;
$testno=0;
 ?>
@foreach ($u->makepathologytestreport as $role) 


<?php 

 // test_no = [ 2,2,4,4,5,5,5,6,6,6, ] erokom ekota arry jekhane 1 theke shuru hobe ar kromanayaye jabe. 
 // amar kaj holo proti distinct value er jonno ekbar print korbo. mane 2 er jonno ekbar.
//erpor 4 er jonno  . ekbar kora hoye gele 2ybar ar na. ei jonno ekota variabe delcalre kori distincttest=0; ekhane 
 // arry element er value  jehutu 1 theke shuru tai tai 0 kono value array te nai. tai prothome chekc korar somoy 
// If($distincttest != test_no[element] ) e value true hobe. ekhon $distincttest er vetor test_no[elemnt] er bortoman element er 
// value insert kori. mane $distincttest= 2 ekhon.ekoi if conditon  e $i=0 insert kori.
// pore abar arekta if condition if($distincttest ==  test_no[elemnt] ) check kori. ebar true hobe. karon 
// ager if er vetorei $distincttest= test_no[elemnt] er bortoman element insert korechi. mane $distincttest=2 ache.
// ekhon 	$i er man arek dhap bariye dei. mane $i=1; porer if e ($i==1 ) hole ekobar print kori. 


//---------------- ebar loop jokhon 2y itteration e jabe tokhon 
// $distincttest = 2 ebong $i=1 ache . ekhon if($distincttest != $role->test_no ) 
//eta false hobe karon. karon ager itteration er somoy $distincttest=2 insert korechi.
//kintu if($distincttest ==  $role->test_no ) eta true hobe. ar i er man 1 barbe. fole 
// if($i == 1 ) { print } eta false hobe. fole  duita 2 er jonno ekobar print hobe. 


/* third itteration =--------------------- 
 $distincttest =2 , $i=2, test_no[2]= 3
 fole  if($distincttest != test_no[2] )->false
 $distincttest= test_no[2]=3 insert kori
 $i=0 ; thik kori.
 
 if($distincttest ==  test_no[3] ) ->true 
 fole $i=1;
 fole ($if==1) then print -> true hobe.


 -------------- 4th itterartion 
 $distincttest =3 , $i=1, test_no[3]= 3
 fole  if($distincttest != test_no[2] )->true hobe .fole if conditon e dukhbe na 

 
 if($distincttest ==  test_no[3] ) ->true 
 fole $i=2;
 fole ($if==1) then print -> false hobe 
 
 evabe colbe
 
 ------------------------------
 amra dekhte pacchi jokhon ekta notun number pacche tokhon i kebol if($distincttest != test_no[elemtn] )
ei if statemtn e dhukche.tai loop er shurute $testno=0 kore dilam. erpor proti bar loop e dhukle ek kore man 
baralam. evabe kotota test ache tar number pelam.
 
 
 
 */
 
 
  if($distincttest != $role->test_no )
 {                                      
$distincttest = $role->test_no ;
$i=0;
$testno = $testno+1;
 }
 
if($distincttest ==  $role->test_no )
{
	$i = $i+1;
}?>

<tr  style="border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">
  
  
  <?php if($i == 1 ) {  ?>
<td  style="border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">{{$testno}}</td>    
<td>   <a target="_blank" href= "{{route('pathologyreportmaking.pdf',$role->test_no ) }}" >  PDF</a></td>  
           

	</tr>
	
  <?php } ?>



@endforeach	
</table>

</td>

 
 </tr>
@endforeach
		

        </tbody>
   



   </table>
	</div>
</div>
</div>


</div>

  	 <div style= "float:right;" >
	{{$makereport->links("pagination::bootstrap-4")}}
  </div>

 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 <script src="{{asset('jquery_val/dist/jquery.validate.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  


<script type="text/javascript">

function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("patient_table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}



function myFunctionid() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputid");
  filter = input.value.toUpperCase();
  table = document.getElementById("patient_table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}











function myFunctionforname() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputforname");
  filter = input.value.toUpperCase();
  table = document.getElementById("patient_table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}













$(document).ready(function(){
	

	

});

</script>
	  
</body>

@stop