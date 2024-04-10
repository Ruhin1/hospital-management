<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\medicine;
use App\Models\medicine_category;
use App\Models\medicinecompanyorder;
use App\Models\medicineCompanyTransition;

use DataTables;
use Validator;

class medicinecontroller extends Controller
{	 
	  public function index(Request $request)
    {
     // $medicine=  medicine::latest()->get();
	  
	
	 $medicine=  medicine::with('medicine_category')->where('softdelete',0)->latest()->get();
	  
	        if ($request->ajax()) {
				$medicine=  medicine::with('medicine_category')->where('softdelete',0)->latest()->get();
            //$medicine =  medicine::latest()->get();
            return Datatables::of($medicine)
                   ->addIndexColumn()
				   

                    ->addColumn('action', function( medicine $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })  
                      ->addColumn('medicine_category_name', function (medicine $medicine) {
                    return $medicine->medicine_category->name;
                })
		                      ->addColumn('stock', function (medicine $medicine) {
                    return round($medicine->stock);
                })			
					
                    ->rawColumns(['action'])
                    ->make(true);
        }
		

		return view('medicine.medicine', compact('medicine'));   
	
	}

















    public function category_list()
    {
   
       $data = medicine_category::where('softdelete',0)->orderBy('name')->get(); 	 			
            return response()->json(['data' => $data]);

	   
		   
    }

 
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
        $rules = array(
            'name'    =>  'required',
            'stock'     =>  'required',
            'category'         =>  'required',
			'unitprice'   =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       

        $form_data = array(
            'name'        =>  $request->name,
            'stock'         =>  $request->stock,
           'medicine_category_id' =>$request->category,
		   'unitprice' =>$request->unitprice,
        );

        $medicineId = medicine::create($form_data);
        
            $id = auth()->user()->id;
            $order = new medicinecompanyorder(); 
            $order->user_id = $id;
            $order->medicinecomapnyname_id = 3;
            $order->totalbeforediscount = 0;
            $order->due = 0;
            $order->pay_in_cash = 0;
            $order->total = 0;
            $order->discount = 0;
            $order->transitiontype = 3;
            $order->created_at = $request->datetime;
            $order->save(); 
         
            $dt = $request->stock - $request->stock;
            $medicinetransition = new medicineCompanyTransition(); 
            $medicinetransition->medicine_id = $medicineId->id; 
            $medicinetransition->medicinecompanyorder_id = $order->id;
            $medicinetransition->Quantity = $dt;
            $medicinetransition->unit_price = $request->unitprice;
            $medicinetransition->transitiontype = 3;
            $medicinetransition->remaining = $request->stock;
            $medicinetransition->created_at = $request->datetime; 
            $medicinetransition->save();  

        
        return response()->json(['success' => 'Data Added successfully.']);
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
        if(request()->ajax())
        {
			//$data=  medicine::with('medicine_category')->findOrFail($id);
            $data = medicine::findOrFail($id);
			
			 $categorylist = medicine_category::orderBy('name')->get(); 
            return response()->json(['data' => $data , 'categorylist' => $categorylist ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function update(Request $request)
    {
  
        
            $rules = array(
                'name'    =>  'required',
                'stock'     =>  'required',
				'category' => 'required',
				'unitprice'   =>  'required',
                'datetime' =>  'required',
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
       

        $form_data = array(
            'name'        =>  $request->name,
            'stock'         =>  $request->stock,
           'medicine_category_id' =>$request->category,
		   'unitprice' =>$request->unitprice,
        );
        medicine::whereId($request->hidden_id)->update($form_data);
        $checkdata = medicineCompanyTransition::where('medicine_id','=', $request->hidden_id)->where('transitiontype','=',3)->first();
        if($checkdata){

            
            $medicinetransition = medicineCompanyTransition::find($checkdata->id); 
            $medicinetransition->medicine_id = $request->hidden_id; 
            //$medicinetransition->medicinecompanyorder_id = $order->id;
            $medicinetransition->Quantity = $request->stock;
            $medicinetransition->unit_price = $request->unitprice;
            $medicinetransition->transitiontype = 3;
            $medicinetransition->created_at = $request->datetime; 
            $medicinetransition->update(); 

        }else{
            $id = auth()->user()->id;
            $order = new medicinecompanyorder(); 
            $order->user_id = $id;
            $order->medicinecomapnyname_id = 0;
            $order->totalbeforediscount = 0;
            $order->due = 0;
            $order->pay_in_cash = 0;
            $order->total = 0;
            $order->discount = 0;
            $order->transitiontype = 3;
            $order->created_at = $request->datetime;
            $order->save();
        

            $medicinetransition = new medicineCompanyTransition(); 
            $medicinetransition->medicine_id = $request->hidden_id; 
            $medicinetransition->medicinecompanyorder_id = $order->id;
            $medicinetransition->Quantity = 0;
            $medicinetransition->unit_price = $request->unitprice;
            $medicinetransition->transitiontype = 3;
            $medicinetransition->created_at = $request->datetime; 
            $medicinetransition->save();  
        }
        

        return response()->json(['success' => 'Data is successfully updated']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
			   	medicine::whereId($id)
  ->update(['softdelete' => '1']);
		

    }
}
