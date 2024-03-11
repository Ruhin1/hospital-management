<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  App\Models\setting;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use DataTables;
use Validator;

class BasicSettingController extends Controller
{
   
   
   
   
   
    public function index(Request $request)
    {
        $setting=  setting::latest()->get();
	  
	
	  
	        if ($request->ajax()) {
                $setting=  setting::latest()->get();
            return Datatables::of($setting)
                   ->addIndexColumn()
                    ->addColumn('action', function( setting $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';


					   return $button;
                    })  

                    ->addColumn('logo', function( setting $data){ 

                        $logo= 	'<img  width="200px" height="200px"  src="img/'.$data->image.' ">';
                     return $logo;
                  }) 

					
					
                    ->rawColumns(['action','logo'])
                    ->make(true);
        }
      
        return view('setting.setting', compact('setting'));  
    }
   
 
public function edit($id)
{

$setting = setting::findOrFail($id);
$logo= 	'<img  width="200px" height="200px"  src="img/'.$setting->image.' ">';
return response()->json(['data'=> $setting, 'logo'=> $logo ]);

}


public function update(Request $request){

    $request->validate([
        'logo' => 'image',
        'name',
        'mobile',
        'address',
    ]);

if ($request->file('logo')){
    $logo = $request->file('logo');

    // Generate a unique filename for the logo
  //  $filename = 'logo_' . uniqid() . '.' . $logo->getClientOriginalExtension();
  $filename = 'logo.jpg';

    // Resize and compress the logo to 10 kb
    $image = Image::make($logo);
    $image->resize(100, null, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    });
    $image->encode('jpg', 100);



    $filePath = public_path('img/logo.jpg');
    if (File::exists($filePath)) {
        File::delete($filePath);  
    } 

    // Save the new logo file
    // Save the new logo file
    $newLogoPath = public_path('img/' . $filename);
    File::put($newLogoPath, $image->__toString());
  
$update = setting::where('id', $request->hidden_id)->update([
'image' => $filename,
'name' =>  $request->name,
'mobile' =>$request->mobile,
'address'=> $request->address,



]);

}
else{

    $update = setting::where('id', $request->hidden_id)->update([
       
        'name' =>  $request->name,
        'mobile' =>$request->mobile,
        'address'=> $request->address,
        
        
        
        ]);  
}
   

if($update){
    return response()->json(['success'=> "Data Updated Successfully "]);
}

}


}
