<?php

namespace App\Http\Controllers;

use App\Models\Childmenu;
use App\Models\Menuaction;
use App\Models\Rootmenu;
use Illuminate\Http\Request;
use DataTables;
use Validator; 
class AdminRootMenuController extends Controller
{
    public function index(Request $request)
    {
        
        $rootMenus  = Rootmenu::latest('id')->select('id','name','status')->get();
       
        if($request->ajax())
        {
            $data = Rootmenu::latest('id')->select('id','name','status')->orderBy('name')->get();

            return DataTables::of($data) 

                    ->addColumn('status', function($data){
                       
                        if($data->status == 1){
                            return '<span class="text-success">active</span>';
                        }else{
                            return '<span class="text-muted">not Active</span>';
                        }    
                                     
                    })  

                    ->addColumn('actions', function($data){
                        $button = '<button type="button"   id="roote'.$data->id.'" class="root_edit btn btn-success btn-sm" data-url="'.$data->id.'">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="rootd'.$data->id.'" data-url="'.$data->id.'" class="root-link-delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['actions','status'])
                    ->make(true);
        }
        return view('adminmenue.index',['rootMenus'=>$rootMenus]);
    }

    //
    public function store(Request $request)
    {
        $rules = array(
            'name'=>'required|unique:rootmenus',
            'status'=>'required',
        );
        

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = new Rootmenu();
        $data->name = $request->name;
        $data->status = $request->status;
        $data->save();
        return response()->json(['success' => 'Data Added successfully.']);
        
    }

    //
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Rootmenu::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

     //
     public function update(Request $request,$id)
     {
         
         // $rules = [
         //     'name' => 'required',
         //     'route'=>'required|unique:rootmenus'.$request->hidden_id,
         //     'status'=>'required',
         // ];
 
         // $error = Validator::make($request->all(), $rules);
 
         // if($error->fails())
         // {
         //     return response()->json(['errors' => $error->errors()->all()]);
         // }
 
 
        //  $data = Rootmenu::findOrFail($request->hidden_id);
        //  $data->name = $request->name;
        //  $data->status = 1;
        //  $data->update();
 
        // return response()->json(['success' => 'Data is successfully Delated']);
        return response()->json(['success' => $request->all()]);
     }

     //
    public function destroy($id)
    {
        
        $rootmenu = Rootmenu::findOrFail($id);
        $childmenus = $rootmenu->childmenu; 
        
        $delatedata = [];
        foreach($childmenus as $row){
                array_push($delatedata, $row->id);
        }
         
        
        
        foreach($delatedata as $row){
            $ChildMenu = Childmenu::findOrFail($row);
            $menuAction = $ChildMenu->menuaction;

            foreach($menuAction as $row){
                Menuaction::find($row->id)->delete();
            }

        }

        Childmenu::destroy($delatedata);
        $rootmenu->delete();
        
        return response()->json(['success' => 'Data is successfully Delated']);
    }

    public function rootMenu(){
       $data = Rootmenu::select('id','name')->get();
       return response()->json($data);
    }
}
