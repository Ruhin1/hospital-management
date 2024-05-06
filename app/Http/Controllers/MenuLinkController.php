<?php

namespace App\Http\Controllers;

use App\Models\Childmenu;
use App\Models\Menuaction;
use App\Models\Rootmenu;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class MenuLinkController extends Controller
{

    
    //
    public function index(Request $request)
    {
        $virtualTable2 = []; 
        $rootMenus  = Rootmenu::select('id','name','status')->get();

        $data = Childmenu::latest('id')->with('rootmenu')->get();

        $menuAction = Menuaction::latest('id')->with('childmenu')->get();

       foreach ($data as $transition) { 
                $transition->type = 'Clild Menu';
                
                $virtualTable2[] = $transition;
            }

            foreach ($menuAction as $transition) { 
                $transition->type = 'Clild Menu Action';
                
                $virtualTable2[] = $transition;
            }

            
            $array = [];
            
            foreach($virtualTable2 as $row){
                if($row['type'] === 'Clild Menu'){
                    array_push( $array, $row);
                    $id = $row['id'];

                    foreach($virtualTable2 as $rows){
                        if($rows['type'] === 'Clild Menu Action'){
                            if($id === $rows['childmenu_id']){
                                array_push( $array, $rows);
                            }
                       
                        }
                        
                    }
                
                }
                
            } 

            
            $data =  $array;
        if($request->ajax())
        {
            

            return DataTables::of($data)

                    ->addColumn('rootmenu', function($data){
                        if($data->childmenu){
                            return $data->childmenu['name'];
                        }
                        
                        if($data->rootmenu){
                            return $data->rootmenu['name'];
                        } 
                        
                        
                    })

                    ->addColumn('status', function($data){
                        
                        if($data->status == 1){
                            return '<span class="text-success">active</span>';
                        }else{
                            return '<span class="text-muted">not Active</span>';
                        }
                        
                    }) 

                    ->addColumn('actions', function($data){

                        if($data->childmenu){
                            $button = '<button type="button" name="edit"  id="'.$data->id.'" class="edit_record btn btn-success btn-sm" data-model="menuaction" >Edit</button>';
                            $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="del'.$data->id.'" data-url="'.$data->id.'"  class="link-delete btn btn-danger btn-sm" data-model="menuaction">Delete</button>';
                            return $button;
                        }    
                        
                        if($data->rootmenu){
                            $button = '<button type="button" name="edit"  id="'.$data->id.'" class="edit_record btn btn-success btn-sm" data-model="childmenu">Edit</button>';
                            $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="del'.$data->id.'" data-url="'.$data->id.'" class="link-delete btn btn-danger btn-sm" data-model="childmenu">Delete</button>';
                        return $button;
                        
                        } 

                        

                        
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

        $name = $request->actionname;
        $route = $request->actionroute;
        $status = $request->actionstatus;
        $arr = [];

        $menuActionData =  array_map(function($name, $route, $status) {

                $arr['name']= $name;
                $arr['route']= $route;
                $arr['status']= $status;
                return $arr;
            
        },$name, $route, $status);
            
        foreach($menuActionData as $row){
                
            if($row['name'] == null || $row['route'] == null){
                $menuActionData = [];
                break;
            }else{
               
                    $valueCounts = array_count_values($route);

                    $duplicates = [];

                    
                    foreach ($valueCounts as $value => $count) {
                        
                        if ($count > 1) {
                            
                            $duplicates[] = $value;
                        }
                    }

                    
                    if (!empty($duplicates)) {
                    return response()->json(['error' => 'Action Route Name Field Must Be Unique Value']);
                    
                    }


            }       
          
        } 

        $data = new Childmenu();
        $data->name = $request->name;
        $data->route = $request->route;
        $data->status = $request->status;
        $data->rootmenu_id = $request->rootmenu_id;
        $data->save(); 

        if(!empty($menuActionData)){
            foreach($menuActionData as $row){
                $menuActionData = new Menuaction();
                $menuActionData->childmenu_id = $data->id;
                $menuActionData->name = $row['name'];
                $menuActionData->route = $row['route'];
                $menuActionData->status = $row['status'];
                $menuActionData->save();
            }
        }
        

        
         
        

        
        
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
    public function destroy(Request $request, $id)
    {
        if($request->key == 'childmenu'){
            $action = Childmenu::findOrFail($id)->with('menuaction')->get();

            $delatedata = [];
            foreach($action as $row){
                foreach($row->menuaction as $row){
                    array_push( $delatedata, $row->id);
                }
            }

            $data = Childmenu::findOrFail($id);
            $data->delete();
            Menuaction::destroy($delatedata);
            
        }

        if($request->key == 'menuaction'){
            $data = Menuaction::findOrFail($id);
            $data->delete();
        }
        

        return response()->json(['success' => 'Data is successfully Delated']);
        
    }
}
