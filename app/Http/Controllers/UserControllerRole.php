<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class UserControllerRole extends Controller
{
   
    public function index(){
        if (request()->ajax()) {
            $model = User::query()->where('role', 1)->whereNotIn('id', [Auth::user()->id])->latest('id');
            $model->whereNotIn('user_name', ['System Admin']);
            return DataTables::eloquent($model)
            ->addColumn('checkbox', function($row){
                $checkbox = '<div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input multi_checkbox" id="'.$row->id.'" name="multi_checkbox[]" value="'.$row->id.'"><label for="'.$row->id.'" class="custom-control-label"></label></div>';
                    return $checkbox;
            })
            ->addColumn('image', function($row){
                $image = '<img class="lazyload" data-src="';
                if(file_exists($row->image)){
                    $image .= asset($row->image);
                } else {
                    $image .= asset('backend/images/avatar/default/user.jpg');
                }
                $image .= '" height="40" alt="'.$row->name.'">';
                    return $image;
            })
            ->addColumn('role', function($row){
                $role = '';
                foreach($row->getRoleNames() as $single){
                    $role .= $single;
                };
                return $role;
            })
            ->addColumn('status', function($row){
                $status = '<div class="text-nowrap">';
                if($row->status == 1){
                    $status .= '<span class="badge bg-success rounded-1 fs-12 fw-400">Active</span>';
                } else {
                    $status .= '<span class="badge bg-danger rounded-1 fs-12 fw-400">Deactive</span>';
                }
                $status .= '</div>';
                return $status;
            })
            ->addColumn('actions', function($row){
                $actionBtn = '<div class="btn-group">';
                    // if(!in_array('System Admin',json_decode($row->getRoleNames())) && Auth::user()->hasRole('System Admin') || Auth::user()->can('user.edit') && !in_array('System Admin',json_decode($row->getRoleNames()))){
                    // }
                    $actionBtn .= '<a href="'.Route('user.edit', $row->id).'" class="btn btn-sm btn-warning border-0 px-10px fs-15 link-edit">Edit</a>';


                    // if(!in_array('System Admin',json_decode($row->getRoleNames())) && Auth::user()->hasRole('System Admin') || Auth::user()->can('user.password') && !in_array('System Admin',json_decode($row->getRoleNames()))){
                    // }
                    // $actionBtn .= '<a href="'.Route('user.password', $row->id).'" class="btn btn-sm btn-warning border-0 px-10px fs-15 bg-success">Password</a>';


                    // if(!in_array('System Admin',json_decode($row->getRoleNames())) && Auth::user()->hasRole('System Admin') || Auth::user()->can('user.destroy') && !in_array('System Admin',json_decode($row->getRoleNames()))){
                    // }
                    $actionBtn .= '<button type="button" class="btn btn-sm btn-danger border-0 px-10px fs-15 link-delete" id="del'.$row->id.'" data-url="'.$row->id.'">Delete</button>';

                   

                    $actionBtn .= '</div>';
                    return $actionBtn;
            })
            ->rawColumns(['checkbox','name','image','role','status','actions'])
            ->make(true);
        }
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'unique:users,user_name'],
            'email' => ['required', 'string', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $role = Role::findById($request->role_id);

        $user = new User();
        // User Image
        $image = $request->file('image');
        if (isset($image)) {
            $ext = 'webp';
            $image_name = uniqid().'.'.$ext;
            $upload_path = 'media/user/';
            $image_path_name = $upload_path.$image_name;
            $file = Image::make($image);
            $file->resize(300, null, function ($constraint) {$constraint->aspectRatio();})->encode($ext, 100);
            $file->save($image_path_name);
            $user->image = $image_path_name;
        }
        $user->role = 1;
        $user->name = $request->name;
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->assignRole($role);
        return redirect()->Route('user.index')->withSuccessMessage('Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // public function changePassword(string $id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('user.password', compact('user'));
    // }

    // public function passwordUpdate(Request $request, string $id)
    // {
    //     $request->validate([
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     $user = User::findOrFail($id);
    //     $user->password = Hash::make($request->password);
    //     $user->save();
    //     return redirect()->route('user.index')->withSuccessMessage('Password Updated Successfully!');
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('user.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'user_name' => 'required','unique:users,user_name,'.$id,
            'email' => 'required','unique:users,email,'.$id
        ]);

        $role = Role::findById($request->role_id);
        $user = User::findOrFail($id);

        // User Image
        $image = $request->file('image');
        if (isset($image)) {
            $ext = 'webp';
            $image_name = uniqid().'.'.$ext;
            $upload_path = 'media/user/';
            $image_path_name = $upload_path.$image_name;
            $file = Image::make($image);
            $file->resize(300, null, function ($constraint) {$constraint->aspectRatio();})->encode($ext, 100);
            $file->save($image_path_name);
            if(file_exists($user->image)){
                unlink($user->image);
            }
            $user->image = $image_path_name;
        }
        $user->role = 1;
        $user->name = $request->name;
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->save();

        $user->syncRoles($role);
        return redirect()->Route('user.index')->withSuccessMessage('Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        // Delete Multiple Items
        // if($request->id){
        //     foreach($request->id as $id){
        //         $user = User::findOrFail($id);
        //         if(in_array('System Admin',json_decode($user->getRoleNames()))){
        //             continue;
        //         }
        //         if(file_exists($user->image)){
        //             unlink($user->image);
        //         }
        //         $user->delete();
        //     }
        //     return response()->json(['status'=>'success']);
        // }

        // Delete Single Item
        $user = User::findOrFail($id);
        if(file_exists($user->image)){
            unlink($user->image);
        }
        $user->delete();
        return response()->json(['status'=>'success']);
    }
}
