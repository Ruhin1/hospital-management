<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\medicinetransition;
use App\Models\medicineCompanyTransition;
use App\Models\returnmedicinetransaction;
use App\Models\medicine;
use App\Models\medicinecompanyorder;
use Carbon\Carbon;
use PDF;
use DB;
use phpDocumentor\Reflection\PseudoTypes\True_;

class virtualTableController extends Controller
{
    public function index(){

        $medicine = medicine::select('id','name')->orderBy('name')->get();
        return view('virtualtable.showmedicne',['medicine'=>$medicine]);
    }

    public function showmedicnepdf(Request $request,string $print = ''){
        
        if($request->method() == 'GET'){ 
           
                return redirect('showmedicne');
            
        }


        $validateData = $request->validate(
            [
                'firstdate'=>'required',
                'lasttdate'=>'required',
            ]
        );
        

        
        if($request->medicnename != 'defolt'){
           
        $medicineTransitions2 = medicineTransition::where('medicine_id','=',$request->medicnename)->get(); 
        $medicineCompanyTransition2 = medicineCompanyTransition::where('medicine_id','=',$request->medicnename)->get(); 
        $returnMedicineTransactions2 = returnmedicinetransaction::where('medicine_id','=',$request->medicnename)->get();
            
        $virtualTable2 = []; 
        

        foreach ($medicineTransitions2 as $transition) { 
            $transition->type = 'Sale Medicine To Customer';
            $transition->Quantity = $transition->unit;
            $virtualTable2[] = $transition;
        }

        foreach ($medicineCompanyTransition2 as $transition) {
            $transition->type = 'Medicine Company Transition';
            $virtualTable2[] = $transition; 
        }

        foreach ($returnMedicineTransactions2 as $transition) {
            $transition->type = 'Return Medicine To Customer';
            $transition->Quantity = $transition->unit;
            $virtualTable2[] = $transition; 
        } 

        $virtualTable2 = collect($virtualTable2)->sortBy('created_at')->values()->all();
       

        $data = ['startDate'=>$request->firstdate,'endDate'=>$request->lasttdate,'medicneName'=>$request->medicnename];
        
        
        return view('virtualtable.showsinglemedicnepdf', ['virtualTable' => $virtualTable2,'data'=>$data,]);
       
        }else{

        $medicineTransitions2 = medicineTransition::all(); 
        $medicineCompanyTransition2 = medicineCompanyTransition::all(); 
        $returnMedicineTransactions2 = returnmedicinetransaction::all(); 
        
        $virtualTable2 = [];

        foreach ($medicineTransitions2 as $transition) { 
            $transition->type = 'Sale Medicine To Customer';
            $transition->Quantity = $transition->unit;
            $virtualTable2[] = $transition;
        }

        foreach ($medicineCompanyTransition2 as $transition) {
            $transition->type = 'Medicine Company Transition';
            $virtualTable2[] = $transition;
        }

        foreach ($returnMedicineTransactions2 as $transition) {
            $transition->type = 'Return Medicine To Customer';
            $transition->Quantity = $transition->unit;
            $virtualTable2[] = $transition; 
        }

        $virtualTable2 = collect($virtualTable2)->sortBy('created_at')->values()->all();

        $data = ['startDate'=>$request->firstdate,'endDate'=>$request->lasttdate];
        return view('virtualtable.showmedicnewithtime', ['virtualTable' => $virtualTable2,'data'=>$data,]);
          
        }
    }

    public function show(String $print = '')
    {
        $medicineTransitions = medicineTransition::orderBy('medicine_id','ASC')->orderBy('created_at', 'DESC')->get(); 
        $medicineCompanyTransition = medicineCompanyTransition::orderBy('medicine_id','ASC')->orderBy('created_at', 'DESC')->get(); 
        $returnMedicineTransactions = returnmedicinetransaction::orderBy('medicine_id','ASC')->orderBy('created_at', 'DESC')->get(); 
        // medicineTransition::truncate();
        // medicineCompanyTransition::truncate();
        // returnmedicinetransaction::truncate();
        // medicinecompanyorder::truncate();
        // return 1;
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

        $virtualTable = collect($virtualTable)->sortBy('created_at')->values()->all();

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
