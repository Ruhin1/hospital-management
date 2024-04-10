<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminMenu;
use App\Models\Childmenu;
use App\Models\Rootmenu;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Route;  
use DB;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $model = Role::query();
            $model->whereNotIn('name', ['System Admin']);
            return DataTables::eloquent($model)
                ->addColumn('checkbox', function ($row) {
                    $checkbox = '<div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input multi_checkbox" id="' . $row->id . '" name="multi_checkbox[]" value="' . $row->id . '"><label for="' . $row->id . '" class="custom-control-label"></label></div>';
                    return $checkbox;
                })
                ->addColumn('actions', function ($row) {
                    $actionBtn = '<div class="btn-group">
                        <a href="' . Route('role.edit', $row->id) . '" class="btn btn-sm btn-warning border-0 px-10px fs-15 link-edit">Edit</a>

                        <a href="' . Route('rolePermission.edit', $row->id) . '" class="btn btn-sm btn-success border-0 px-10px fs-15 link-edit">PER</a>';

                        // if(Auth::user()->hasRole('System Admin')){
                            $actionBtn .= '<button type="button" class="btn btn-sm btn-danger border-0 px-10px fs-15 link-delete" id="del'.$row->id.'" data-url="'.$row->id.'">DEL</button>';

                            // }
                        $actionBtn .= '</div>';
                    return $actionBtn;
                })
                ->rawColumns(['checkbox', 'actions'])
                ->make(true);
        }
        return view('role.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:roles,name']
        ]);
        Role::create(['name' => $request->name]);
        return redirect()->Route('role.index')->withSuccessMessage('Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findById($id);
        return view('role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'unique:roles,name,' . $id]
        ]);
        $role = Role::findById($id);
        $role->name = $request->name;
        $role->save();
        return redirect()->Route('role.index')->withSuccessMessage('Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        

        // Delete Single Item
        $role = Role::findById($id);
        $role->syncPermissions([]);
        $role->delete();
        return response()->json(['status' => 'success']);
    }

 
 

     public function rolePermissionEdit($id)
     {      
        $role = Role::findById($id);

        // Retrieve all routes
        $routes = Childmenu::select('id','name')->with('menuaction','rootmenu')->get();
        return  $routes;
        // Retrieve permissions associated with the role
        $permissions = $role->permissions->pluck('name')->toArray();
    
        // Pass the routes, permissions, and role to the view
        return view('role.role_permission', [
            'role' => $role,
            'routes' => $routes,
            'permissions' => $permissions,
        ]);   
     }
        

    public function rolePermissionUpdate(Request $request, $id)
    {
        
        $role = Role::findById($id);

    // Revoke all permissions for the role
    $role->syncPermissions([]);
    
    // Assign permissions based on the submitted form data
    $permissions = $request->input('permissions', []);
    foreach ($permissions as $permission) {
        $role->givePermissionTo($permission);
    }

    return redirect()->Route('role.index')->withSuccessMessage('Permissions updated successfully');

    }

}

