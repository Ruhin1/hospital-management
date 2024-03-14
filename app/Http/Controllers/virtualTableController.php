<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\medicinetransition;
use App\Models\medicineCompanyTransition;
use App\Models\returnmedicinetransaction;
use PDF;
use phpDocumentor\Reflection\PseudoTypes\True_;

class virtualTableController extends Controller
{
    public function show(String $print = '')
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

        if($print == 'yes'){
            $pdf = PDF::loadView('virtualtable.virtual-table', compact('virtualTable'),
            [], 
            
            [
            'mode'                     => '',
                'format'                   => 'A5',
                'default_font_size'        => '7',
                'default_font'             => 'Times-New-Roman',
                'margin_left'              => 7,
                'margin_right'             => 7,
                'margin_top'               => 7,
                'margin_bottom'            => 7,
                'title'                    => 'Virtual Table'
                ]
            );
            
            return $pdf->stream('vircual-data.pdf');
        }else{
            return view('virtualtable.virtual-table', ['virtualTable' => $virtualTable]);
        }

        
       
    }

   
   
}
