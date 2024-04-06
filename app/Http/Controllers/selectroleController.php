<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Validator;

class selectroleController extends Controller
{
    public function index(Request $request)
    {
      $userlist=  User::latest()->get();
	  

        return view('userlist.userlist', compact('userlist'));   

    }
}
