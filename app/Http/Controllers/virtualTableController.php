<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\medicinetransition;
use App\Models\medicineCompanyTransition;
use App\Models\returnmedicinetransaction;

class virtualTableController extends Controller
{
    public function show()
    {
        $medicineTransitions = medicineTransition::orderBy('medicine_id','ASC')->orderBy('created_at', 'DESC')->get(); 
        $medicineCompanyTransition = medicineCompanyTransition::orderBy('medicine_id','ASC')->orderBy('created_at', 'DESC')->get(); 
        $returnMedicineTransactions = returnmedicinetransaction::orderBy('medicine_id','ASC')->orderBy('created_at', 'DESC')->get(); 
        
        $virtualTable = [];

        foreach ($medicineTransitions as $transition) { 
            $transition->type = 'Sale Medicine To Customer';
            $transition->Quantity = $transition->unit;
            $virtualTable[] = $transition;
        }

        foreach ($medicineCompanyTransition as $transition) {
            $transition->type = 'Medicine Company Transition';
            $virtualTable[] = $transition;
        }

        foreach ($returnMedicineTransactions as $transition) {
            $transition->type = 'Return Medicine To Customer';
            $transition->Quantity = $transition->unit;
            $virtualTable[] = $transition;
        }

        return view('virtualtable.virtual-table', ['virtualTable' => $virtualTable]);
    }
   
}
