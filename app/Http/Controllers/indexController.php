<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{
    public function index()
	{
		
		if( Auth::check() )
		{
		        if( auth()->user()->role == 1 ){
            return redirect()->route('admin.dashboard');
        }
        elseif( auth()->user()->role == 2 ){
            return redirect()->route('user.dashboard');
        }
		
		     elseif( auth()->user()->role == 3 ){
            return redirect()->route('phermachy.dashboard');
        } 
		
		     elseif( auth()->user()->role == 4 ){
            return redirect()->route('account.dashboard');
        }
		
			     elseif( auth()->user()->role == 10 ){
            return redirect()->route('deleteduser.dashboard');
        }
		}
		else {
		 return view('welcome');	
		}
	
	}
}
