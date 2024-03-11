<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class phermacyController extends Controller
{
     public function index()
    {

      return view('phermacy.dashboard');
    }

}
