<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class deletedusercontroller extends Controller
{
   public function index ()
   {
	   return view ('deleteduser.deleteduser');
   }
}
