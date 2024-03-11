
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								

@extends('layout.main')

@section('content')

<style>
.btn-custom {
    background-color: #ff9900; /* set your preferred color here */
    color: #fff; /* set the text color of the button */
  }

</style>

<h2 style="color:red; text-align:center">এডমিন </h2>

<div class="container">
    <div class="row">      
      <div class="text-white text-center bg-success m-4 col-lg-3 col-sm-12">
        <div class="card-header">আজকের আয়-ব্যায় হিসাব</div>
        <div class="card-body"> 
          <h5 class="card-title"> আজকের হিসাব </h5>
          <p class="card-text text-center">  
            <a href="incomestatementtoday" class="btn btn-custom">ক্লিক করেন</a>       
          </p>
        </div>
      </div>
    
      <div class="text-white text-center bg-success m-4 col-lg-3 col-sm-12">
        <div class="card-header">গতকালের আয়-ব্যয় হিসাব</div>
        <div class="card-body"> 
          <h5 class="card-title"> গতকালের হিসাব </h5>
          <p class="card-text text-center">   
            <a href="incomestatementyesterday" class="btn btn-custom">ক্লিক করেন</a>       
          </p>
        </div>
      </div>
      <div class="text-white text-center bg-success m-4 col-lg-3 col-sm-12">
        <div class="card-header">দুই ডেটের মধ্যবর্তী আয়-ব্যয় হিসাব</div>
        <div class="card-body"> 
          <h5 class="card-title"> দুই ডেটের মধ্যবর্তী হিসাব </h5>
          <p class="card-text text-center">  
            <a href="picktwodate" class="btn btn-custom">ক্লিক করেন</a>       
          </p>
        </div>
      </div>
    </div>

    <div class="row">      
        <div class="text-white text-center bg-success m-4 col-lg-3 col-sm-12">
          <div class="card-header"> প্যাথলজি বিক্রি হিসাব</div>
          <div class="card-body"> 
            <h5 class="card-title"> প্যাথলজি হিসাব </h5>
            <p class="card-text text-center">  
              <a href="pathologytranspicktwodate" class="btn btn-custom">ক্লিক করেন</a>       
            </p>
          </div>
        </div>
      
        <div class="text-white text-center bg-success m-4 col-lg-3 col-sm-12">
          <div class="card-header">মেডিসিন বিক্রি হিসাব</div>
          <div class="card-body"> 
            <h5 class="card-title"> মেডিসিন হিসাব </h5>
            <p class="card-text text-center">  
              <a href="medicinetransition/datepick" class="btn btn-custom">ক্লিক করেন</a>       
            </p>
          </div>
        </div>
        <div class="text-white text-center bg-success m-4 col-lg-3 col-sm-12">
          <div class="card-header"> কমিশনের হিসাব </div>
          <div class="card-body"> 
            <h5 class="card-title"> কমিশনের হিসাব </h5>
            <p class="card-text text-center">  
              <a href="agenttransaction/datepic" class="btn btn-custom">ক্লিক করেন</a>       
            </p>
          </div>
        </div>
      </div>


      <div class="row">      
        <div class="text-white text-center bg-success m-4 col-lg-3 col-sm-12">
          <div class="card-header"> ডিউ কালেকশন হিসাব</div>
          <div class="card-body"> 
            <h5 class="card-title"> ডিউ কালেকশন হিসাব </h5>
            <p class="card-text text-center">  
              <a href="duepaymenttrans/date" class="btn btn-custom">ক্লিক করেন</a>       
            </p>
          </div>
        </div>
      
        <div class="text-white text-center bg-success m-4 col-lg-3 col-sm-12">
          <div class="card-header">এজেন্টের প্যাসেন্ট  </div>
          <div class="card-body"> 
            <h5 class="card-title"> এজেন্টের প্যাসেন্ট </h5>
            <p class="card-text text-center">  
              <a href="reporttransaction/selectagent" class="btn btn-custom">ক্লিক করেন</a>       
            </p>
          </div>
        </div>
        <div class="text-white text-center bg-success m-4 col-lg-3 col-sm-12">
          <div class="card-header"> ডাক্তারের পাঠানো প্যাসেন্ট </div>
          <div class="card-body"> 
            <h5 class="card-title"> ডাক্তারের পাঠানো প্যাসেন্ট </h5>
            <p class="card-text text-center">  
              <a href="reporttransaction/selectrefdoct" class="btn btn-custom">ক্লিক করেন</a>       
            </p>
          </div>
        </div>
      </div>





  </div>
  
  




@stop