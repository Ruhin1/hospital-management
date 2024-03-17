<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\medicinetransition;
use App\Models\medicineCompanyTransition;
use App\Models\returnmedicinetransaction;
use App\Models\medicine;
use Carbon\Carbon;
use PDF;
use phpDocumentor\Reflection\PseudoTypes\True_;

class virtualTableController extends Controller
{
    public function index(){

        $medicine = medicine::select('id','name')->orderBy('name')->get();
        return view('virtualtable.showmedicne',['medicine'=>$medicine]);
    }

    public function showmedicnepdf(Request $request,string $print = ''){
        
        // if($request->method() == 'GET'){ 
        //     if($print == 'yes'){
        //         return redirect('showmedicne');
        //     }  
        // }


        // $validateData = $request->validate(
        //     [
        //         'firstdate'=>'required',
        //         'lasttdate'=>'required',
        //     ]
        // );

        
        if($request->medicnename != 'defolt'){

        $fmedicineTransitions = medicineTransition::orderBy('medicine_id','ASC')->orderBy('created_at', 'DESC')->where('medicine_id','=',$request->medicnename)->whereDate('created_at', '<=', $request->firstdate)->get(); 
        $fmedicineCompanyTransition = medicineCompanyTransition::orderBy('medicine_id','ASC')->orderBy('created_at', 'DESC')->where('medicine_id','=',$request->medicnename)->whereDate('created_at', '<=', $request->firstdate)->get(); 
        $freturnMedicineTransactions = returnmedicinetransaction::orderBy('medicine_id','ASC')->orderBy('created_at', 'DESC')->where('medicine_id','=',$request->medicnename)->whereDate('created_at', '<=', $request->firstdate)->get(); 

        $virtualTable2 = [];

        foreach ($fmedicineTransitions as $transition) { 
            $transition->type = 'Sale Medicine To Customer';
            $transition->Quantity = $transition->unit;
            $virtualTable2[] = $transition;
        }

        foreach ($fmedicineCompanyTransition as $transition) {
            $transition->type = 'Medicine Company Transition';
            $virtualTable2[] = $transition;
        }

        foreach ($freturnMedicineTransactions as $transition) {
            $transition->type = 'Return Medicine To Customer';
            $transition->Quantity = $transition->unit;
            $virtualTable2[] = $transition;
        }

        $b = 0;
        $groupedRows1 = [];
        $virtualTable = collect($virtualTable2)->sortBy('created_at')->values()->all();
        foreach ($virtualTable2 as $row) {
            $groupedRows1[$row->medicine_id][] = $row;
        }
      
        foreach($groupedRows1 as $medicineId => $rows){
            foreach($rows as $row){
                if($row->order_id != null) 
                {
                   if($b != 0){
                    $b = $b - $row->Quantity;
                   }
                }
                if($row->return_order_id  != null)
                {
                   $b = $b + $row->Quantity; 
                }
                if($row->medicinecompanyorder_id != null )
                {
                  if ($row->transitiontype == 1)
                  {
                   $b = $b + $row->Quantity;

                  }	
                  if($row->transitiontype == 2){

                    if($b != 0){
                        $b = $b - $row->Quantity;
                       }
                     }
                  if($row->transitiontype == 3){

                       $b = $b + $row->Quantity;
                     }							
                }
            }
   
        }

        // return $b;

        

            $medicineTransitions = medicineTransition::orderBy('medicine_id','ASC')->orderBy('created_at', 'DESC')->where('medicine_id','=',$request->medicnename)->whereBetween('created_at', [$request->firstdate, $request->lasttdate])->get(); 
            $medicineCompanyTransition = medicineCompanyTransition::orderBy('medicine_id','ASC')->orderBy('created_at', 'DESC')->where('medicine_id','=',$request->medicnename)->whereBetween('created_at', [$request->firstdate, $request->lasttdate])->get(); 
            $returnMedicineTransactions = returnmedicinetransaction::orderBy('medicine_id','ASC')->orderBy('created_at', 'DESC')->where('medicine_id','=',$request->medicnename)->whereBetween('created_at', [$request->firstdate, $request->lasttdate])->get();
            
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
        $medicneName = medicine::find($request->medicnename);
        if($medicneName){
            $medicneName =  $medicneName->name;
        }else{
            $medicneName =  '';
        }
        $data = ['startDate'=>$request->firstdate,'endDate'=>$request->lasttdate,'medicneName'=>$medicneName];
        
        
        $virtualTable = collect($virtualTable)->sortBy('created_at')->values()->all();
        return view('virtualtable.showsinglemedicnepdf', ['virtualTable' => $virtualTable,'data'=>$data,'b'=>$b]);

       
        
        
        }else{
        
        $fmedicineTransitions = medicineTransition::orderBy('medicine_id','ASC')->orderBy('created_at', 'DESC')->whereDate('created_at', '<=', $request->firstdate)->get(); 
        $fmedicineCompanyTransition = medicineCompanyTransition::orderBy('medicine_id','ASC')->orderBy('created_at', 'DESC')->whereDate('created_at', '<=', $request->firstdate)->get(); 
        $freturnMedicineTransactions = returnmedicinetransaction::orderBy('medicine_id','ASC')->orderBy('created_at', 'DESC')->whereDate('created_at', '<=', $request->firstdate)->get(); 

        $virtualTable2 = [];

        foreach ($fmedicineTransitions as $transition) { 
            $transition->type = 'Sale Medicine To Customer';
            $transition->Quantity = $transition->unit;
            $virtualTable2[] = $transition;
        }

        foreach ($fmedicineCompanyTransition as $transition) {
            $transition->type = 'Medicine Company Transition';
            $virtualTable2[] = $transition;
        }

        foreach ($freturnMedicineTransactions as $transition) {
            $transition->type = 'Return Medicine To Customer';
            $transition->Quantity = $transition->unit;
            $virtualTable2[] = $transition;
        }

        $b = 0;
        $groupedRows = [];
        $virtualTable = collect($virtualTable2)->sortBy('created_at')->values()->all();
        

        foreach ($virtualTable2 as $row) {
            $groupedRows[$row->medicine_id][] = $row;
        }
      
        foreach($groupedRows as $medicineId => $rows){
            foreach($rows as $row){
                if($row->order_id != null) 
                {
                   if($b != 0){
                    $b = $b - $row->Quantity;
                   }
                }
                if($row->return_order_id  != null)
                {
                   $b = $b + $row->Quantity; 
                }
                if($row->medicinecompanyorder_id != null )
                {
                  if ($row->transitiontype == 1)
                  {
                   $b = $b + $row->Quantity;

                  }	
                  if($row->transitiontype == 2){

                    if($b != 0){
                        $b = $b - $row->Quantity;
                       }
                     }
                  if($row->transitiontype == 3){

                       $b = $b + $row->Quantity;
                     }							
                }
            }
   
        }
        
        $medicineTransitions = medicineTransition::orderBy('medicine_id','ASC')->orderBy('created_at', 'DESC')->whereBetween('created_at', [$request->firstdate, $request->lasttdate])->get(); 
        $medicineCompanyTransition = medicineCompanyTransition::orderBy('medicine_id','ASC')->orderBy('created_at', 'DESC')->whereBetween('created_at', [$request->firstdate, $request->lasttdate])->get(); 
        $returnMedicineTransactions = returnmedicinetransaction::orderBy('medicine_id','ASC')->orderBy('created_at', 'DESC')->whereBetween('created_at', [$request->firstdate, $request->lasttdate])->get(); 
        
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
        
        $data = ['startDate'=>$request->firstdate,'endDate'=>$request->lasttdate];
        
        

        // $pdf = PDF::loadView('virtualtable.showmedicnewithtime', ['virtualTable' => $virtualTable,'data'=>$data,'b'=>$b],
        //     [], 
            
        //     [
        //     'mode'                     => '',
        //         'format'                   => 'A5',
        //         'default_font_size'        => '7',
        //         'default_font'             => 'Times-New-Roman',
        //         'margin_left'              => 7,
        //         'margin_right'             => 7,
        //         'margin_top'               => 7,
        //         'margin_bottom'            => 7,
        //         'title'                    => 'Virtual Table'
        //         ]
        //     );
            
        //     return $pdf->stream('medicne-data.pdf');

        $virtualTable = collect($virtualTable)->sortBy('created_at')->values()->all();
        return view('virtualtable.showmedicnewithtime', ['virtualTable' => $virtualTable,'data'=>$data,'b'=>$b]);

          
        }
    }

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
