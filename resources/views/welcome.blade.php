<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BICTSOFT Hospital Maintenance Software</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<style>

#email, #password, #submit {

    padding: 5px 10px 10px 5px;

width:80%;
margin-bottom:10px;

}

#submit{

    font-weight:900;
    background-color:green;
}

#submit:hover{

    background-color:blue;
}




</style>
       
    </head>
    <body  style="margin-top:100px;"   >
      
		<div class=""  >
		<h2 style="color:red; text-align:center">BICTSOFT Hospital Maintenance Software</h2>
		</div     >
		
		<p><p><br>
		<div    >
            @if (Route::has('login'))
                <div >
                    @auth
					
					
					<?php 
					 if( auth()->user()->role == 1 ){ ?>
						 <a href="{{ url('admindashboard') }}" class="text-sm text-gray-700 underline">Home</a>
           
       <?php  }
        elseif( auth()->user()->role == 2 ){ ?>
			<a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
            return redirect()->route('user.dashboard');
      <?php  }
		
		     elseif( auth()->user()->role == 3 ){  ?>
				 <a href="{{ url('Phermachydepdashboard') }}" class="text-sm text-gray-700 underline">Home</a>
            
     <?php    } 
		
		     elseif( auth()->user()->role == 4 ){  ?>
				 <a href="{{ url('accountdashboard') }}" class="text-sm text-gray-700 underline">Home</a>
           
    <?php     }
		
			     elseif( auth()->user()->role == 10 ){  ?>
					 <a href="{{ url('deleteduserdashboard') }}" class="text-sm text-gray-700 underline">Home</a>
            
   <?php      }
					
					?>
					
                       
                    @else
						


<div class="errormsg " style="text-align:center; color:red;" >
<h2><b>
@if(session('errors'))

     {{session('errors')}}
@endif
</b></h2>
</div>













 <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
							
							<div class="col-md-8">
                                <input id="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
							
							                            <div class="col-md-8">
                                <input id="password" type="password"  name="password" required autocomplete="current-password">

                           
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="submit" type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                 </div>

                 <div  class="col-md-8 offset-md-4" >
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                    @endauth
                </div>
            @endif
</div>
          
    </body>
	
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>	
	
	



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    


<script>
$(document).ready(function(){ 
   $(".errormsg").fadeTo(2000, 1000).slideUp(1000, function(){
       $(".errormsg").slideUp(1000);
     });
})
</script>












	
</html>
