<?php

namespace App\Http\Controllers;

use App\Models\Childmenu;
use App\Models\Rootmenu;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class MenuLinkController extends Controller
{
    //
    public function index(Request $request)
    {
        $rootMenus  = Rootmenu::select('id','name','status')->get();
       
        if($request->ajax())
        {
            $data = Childmenu::latest('id')->with('rootmenu')->orderBy('name')->get();

            return DataTables::of($data)

                    ->addColumn('rootmenu', function($data){
                                
                        return $data->rootmenu['name'];
                        
                    })

                    ->addColumn('status', function($data){
                        
                        if($data->status = 1){
                            return '<span class="text-success">active</span>';
                        }else{
                            return '<span class="text-muted">not Active</span>';
                        }
                        
                    }) 

                    ->addColumn('actions', function($data){
                        $button = '<button type="button" name="edit"  id="'.$data->id.'" class="edit_record btn btn-success btn-sm" >Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="del'.$data->id.'" data-url="'.$data->id.'" class="link-delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['actions','status','rootmenu'])
                    ->make(true);
        }
        return view('adminmenue.index',['rootMenus'=>$rootMenus]);
    }

    //
    public function store(Request $request)
    {
        $rules = array(
            'name'=>'required',
            'route'=>'required|unique:childmenus',
            'status'=>'required', 
            'rootmenu_id'=>'required',
        );
        

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = new Childmenu();
        $data->name = $request->name;
        $data->route = $request->route;
        $data->status = $request->status;
        $data->rootmenu_id = $request->rootmenu_id;
        $data->save();

        return response()->json(['success' => 'Data Added successfully.']);
        
    }

    //
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Childmenu::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    //
    public function update(Request $request)
    {
        
        // $rules = [
        //     'name' => 'required',
        //     'route'=>'required|unique:childmenus'.$request->hidden_id,
        //     'status'=>'required',
        // ];

        // $error = Validator::make($request->all(), $rules);

        // if($error->fails())
        // {
        //     return response()->json(['errors' => $error->errors()->all()]);
        // }


        // $data = Childmenu::findOrFail($request->hidden_id);
        // $data->name = $request->name;
        // $data->route = $request->route;
        // $data->status = $request->status;
        // $data->update();

        //return response()->json(['success' => 'Data is successfully Delated']);
        return response()->json(['success' => $request->all()]);
    }

    //
    public function destroy($id)
    {
        $data = Childmenu::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data is successfully Delated']);
    }
}
