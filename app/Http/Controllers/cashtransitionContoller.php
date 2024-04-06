<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patient;  
use App\Models\doctor;  
use App\Models\duetransition; 
use App\Models\cabinetransaction;  
use App\Models\doctorappointmenttransaction; 
use App\Models\medicinetransition;   
use App\Models\reporttransaction;   
use App\Models\surgerytransaction; 
use App\Models\patientfinalhisab;
use App\Models\servicelistinhospital; 
use App\Models\servicetransition; 
use App\Models\cabinetransferhisto; 

 use App\Models\serviceorder;
use App\Models\order;
use App\Models\cabinelist;

use App\Models\return_order;

	use App\Models\cabinefeetransition;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DateTime;

use App\Models\reportorder; 

use App\Models\finalreport; 
use DataTables;
use Validator;   
use PDF;
use App\Models\balance_of_business; 

class cashtransitionContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
