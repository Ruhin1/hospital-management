<?php

namespace App\Http\Controllers;

use App\Models\coshma;
use App\Models\coshmaPrescription;


use Illuminate\Http\Request;
use DataTables;
use Validator;

class coshmaController extends Controller
{


        // $inst = coshma::all();  
        // return view('coshma.index',['inst'=>$inst]);

       

         public function index(Request $request)
         {   
            $users = coshmaPrescription::select('id','name','age') ->orderBy('created_at','desc')->get();
             if ($request->ajax()) {
                $users = coshmaPrescription::select('id','name','age') ->orderBy('created_at','desc')->get();
                 return DataTables::of($users)
                     ->addColumn('action', function ($user) {
                        //  return '<button type="button" name="edit" class="edit btn btn-primary btn-sm" id="'.$user->id.'">Edit</button>
                        //          <button type="button" name="delete" class="delete btn btn-danger btn-sm" id="'.$user->id.'">Delete</button>';

                        $button = '<button type="button" name="edit" id="'.$user->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$user->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;

                     })
                     ->addColumn('pdf', function ($user) {
                      return '<a   target="_blank"      href="'.route('print.coshma.Preection', ['id'=>$user->id]).'">Print</a>';
                  })
                     ->rawColumns(['action','pdf'])
                     ->make(true);
             }
             
             return view('coshma.coshmaprescription'); 
         }

         public function edit($id)
         {
             if(request()->ajax())
             {
                $data = coshmaPrescription::findOrFail($id);
                return response()->json(['data' => $data]);

             }
         }

        

         public function destroy($id)
         {
     
          
            coshmaPrescription::find($id)->delete(); 
          
          
         }
      
    

   public function store(Request $request)
   {
    // $request->validate([
    //     'name'=>'required',
    //     'age'=>'required',
    //     'brith'=>'required',
    // ]);
   
    // $data =  $request->all();
    // if($request->has('instructions')){
    //   $inst = coshma::wherein('id',$request->instructions)->get(); 
    //   return view('coshma.coshma',['data'=>$data,'inst'=>$inst,]);
    // }else{
    //   $inst = coshma::all();
    //   return view('coshma.coshma',['data'=>$data,'inst'=>$inst,]);
      
    // }  
   }

    public function printcoshmaPreection($id)
    {
            $data = coshmaPrescription::find($id);
            $ids = $data->instructions;
            
            if(empty($ids)){

                $inst = coshma::all();  
                return view('coshma.coshma',['data'=>$data,'inst'=>$inst]);
        
            }else{
                $inst = coshma::whereIn('id',$ids)->get();
                return view('coshma.coshma',['data'=>$data,'inst'=>$inst]);


            }
            
            

            
    }

    public function update(Request $request)
    {
        $data =  coshmaPrescription::find($request->hidden_id);
        //$data->name = $request->name;
        //$data->age = $request->age;
        $data->brith = $request->brith;
        $data->ipd = $request->ipd;
        $data->resph = $request->resph;
        $data->recyl = $request->recyl;
        $data->reaxis = $request->reaxis;
        $data->rebyes = $request->rebyes;
        $data->lesph = $request->lesph;
        $data->lecyl = $request->lecyl;
        $data->leaxis = $request->leaxis; 
        $data->lebyes = $request->lebyes; 
        $data->add = $request->add; 
        $data->diopter = $request->diopter;
        $data->instructions = $request->instructions;
        $data->type = $request->type;
        $data->color = $request->color;
        $data->remarks = $request->remarks;
        $data->save(); 
           
       
        //         // '',
        //         // '',
        //         // '',
        //         // '',
                 
    

        //return response()->json(['success' => $request->all()]); 
       return response()->json(['success' => 'Data is successfully updated']); 
        
    }
   

}
