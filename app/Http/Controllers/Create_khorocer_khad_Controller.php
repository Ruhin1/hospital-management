<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\khorocer_khad;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Validator;

class Create_khorocer_khad_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
             $khorocer_khad =  khorocer_khad::where('softdelete', 0)->latest()->get();
	  
	
	  
	        if ($request->ajax()) {
            $khorocer_khad =  khorocer_khad::where('softdelete', 0)->latest()->get();
            return Datatables::of($khorocer_khad)
                   ->addIndexColumn()
                    ->addColumn('action', function( khorocer_khad $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })  

					
					
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('khorocer_khad.khorocer_khad', compact('khorocer_khad'));   

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
        $rules = array(
            'name'    =>  'required',
           
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       

        $form_data = array(
            'name'        =>  $request->name,
           
        );

        khorocer_khad::create($form_data);

        Log::channel('borokorosh')->info('বড় খরছ এর খ্যাত যুক্ত করা হয়েছে।',
        [
            'massage'=> 'বড় খরছ এর খ্যাত যুক্ত করা হয়েছে।',
            'employee_details'=> Auth::user(),
            'Info'=> $request->all(),
        ]);

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
            $data = khorocer_khad::findOrFail($id);
            return response()->json(['data' => $data]);
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
               
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
       

        $form_data = array(
            'name'       =>   $request->name,
            
        );
       khorocer_khad::whereId($request->hidden_id)->update($form_data);

       Log::channel('borokorosh')->info('খরছের খ্যাত আপডেট করা হয়েছে।',
        [
            'massage'=> 'খরছের খ্যাত আপডেট করা হয়েছে।',
            'employee_details'=> Auth::user(),
            'Info'=> $request->all(),
        ]);

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
        $data = 	khorocer_khad::find();
        Log::channel('borokorosh')->info('খরছের খ্যাত ডিলিট করা হয়েছে।',
        [
            'massage'=> 'খরছের খ্যাত ডিলিট করা হয়েছে।',
            'employee_details'=> Auth::user(),
            'Info'=> $data,
        ]);
        	   	khorocer_khad::whereId($id)
  ->update(['softdelete' => '1']);
    } 
}
