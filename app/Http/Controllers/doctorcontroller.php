<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\doctor;
use DataTables;
use Validator;

class doctorcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index(Request $request)
    {
                             $doctor=  doctor::where('softdelete', '0')->latest()->get();
	  
	
	  
	        if ($request->ajax()) {
            $doctor =  doctor::where('softdelete', 0)->latest()->get();
            return Datatables::of($doctor)
                   ->addIndexColumn()
                    ->addColumn('action', function( doctor $data){ 
   
                          $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                       

					   $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                       

					   return $button;
                    })  

					
					
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('doctor.doctor', compact('doctor'));  
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
			'Degrees' =>  'required',
			'Department' => 'required',
			'mobile' => 'required',
			'address' =>  'required',
			'first_visit_fees',
			
           'commission_pecentage',
		   'workingplace',
		   'chamber_address',
		   'visiting_hours',
		   'offday',
		   'Prescription_heading', 'contact_address_for_serial',
		   'headerimage' => 'max:500',
		   'footerimage' => 'max:500',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       $headerimage = $request->headerimage;
	   $footerimage= $request->footerimage;
	   
	           if ($image = $request->file('headerimage')) {
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $headerimage = "$profileImage";
        }
		
		
		        if ($image = $request->file('footerimage')) {
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "footerimage" . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $footerimage = "$profileImage";
        }
 

        $form_data = array(
             'name'        =>  $request->name,
			
			
			'Degree' =>   $request->Degrees,
			'Department' =>  $request->Department,
			'mobile' =>  $request->mobile,
			'address' =>  $request->address,
			'first_visit_fees' =>  $request->first_visit_fees,
			'next_visit_fees' =>  $request->first_visit_fees,
			'commission_pecentage' =>  0,
			'workingplace' =>  $request->workingplace,
			'chamber_address' =>  $request->chamber_address,
			'visiting_hours' =>  $request->visiting_hours,
			'offday' =>  $request->offday,
			'prescriptionheading' =>  $request->Prescription_heading,
			'contact_address_for_serial' =>  $request->contact_address_for_serial,
			'footerimage' => $footerimage,
			'headerimage' => $headerimage,
			
			
			
			
			
           
        );

        doctor::create($form_data);

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
            $data = doctor::findOrFail($id);
		

					  // $button = '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                      
		
		$imghead= 	'<img  width="200px" height="200px"  src="img/'.$data->headerimage.' ">';
		$imagefoot = '<img  width="200px" height="200px"  src="img/'.$data->footerimage.' ">';	
            return response()->json(['data' => $data, 'imghead'=>$imghead, 'imagefoot'=> $imagefoot ]);
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
			'Degrees' =>  'required',
			'Department' => 'required',
			'mobile' => 'required',
			'address' =>  'required',
			'first_visit_fees' =>  'required',
			'next_visit_fees',
           'commission_pecentage',
		   'workingplace',
		   'chamber_address',
		   'visiting_hours',
		   'offday',
		   'Prescription_heading', 'contact_address_for_serial',
		   'headerimage' => 'max:500',
		   'footerimage' => 'max:500',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

              $headerimage = $request->headerimage;
	   $footerimage= $request->footerimage;
	   
	   
	  
	   
	   if ( $headerimage != null )
	   {
		
	   	           if ($image = $request->file('headerimage')) {
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $headerimage = "$profileImage";
	   }}
		
			   if ( $footerimage != null )
	   {
		
		        if ($image = $request->file('footerimage')) {
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "footerimage" . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $footerimage = "$profileImage";
	   }}
	   
	   
	   
	   
	   
	   
	   
	   
	   
				   if ( ( $headerimage != null ) and ( $footerimage != null ) )
	   {
		  	
			
		        $form_data = array(
             'name'        =>  $request->name,
			
			
			'Degree' =>   $request->Degrees,
			'Department' =>  $request->Department,
			'mobile' =>  $request->mobile,
			'address' =>  $request->address,
			'first_visit_fees' =>  $request->first_visit_fees,
			'next_visit_fees' =>  $request->first_visit_fees,
			'commission_pecentage' =>  0,
			'workingplace' =>  $request->workingplace,
			'chamber_address' =>  $request->chamber_address,
			'visiting_hours' =>  $request->visiting_hours,
			'offday' =>  $request->offday,
			'prescriptionheading' =>  $request->Prescription_heading,
			'contact_address_for_serial' =>  $request->contact_address_for_serial,
	
		  	'headerimage' => $headerimage, 
	 
	   
	
		  		'footerimage' => $footerimage,
	

        );	
			



			
	   } 
elseif ( ( $headerimage == null ) and ( $footerimage != null ) )   
		   {
		  	
			
		        $form_data = array(
             'name'        =>  $request->name,
			
			
			'Degree' =>   $request->Degrees,
			'Department' =>  $request->Department,
			'mobile' =>  $request->mobile,
			'address' =>  $request->address,
			'first_visit_fees' =>  $request->first_visit_fees,
			'next_visit_fees' =>  $request->next_visit_fees,
			'commission_pecentage' =>  $request->commission_pecentage,
			'workingplace' =>  $request->workingplace,
			'chamber_address' =>  $request->chamber_address,
			'visiting_hours' =>  $request->visiting_hours,
			'offday' =>  $request->offday,
			'prescriptionheading' =>  $request->Prescription_heading,
			'contact_address_for_serial' =>  $request->contact_address_for_serial,
	
		 
	 
	   
	
		  		'footerimage' => $footerimage,
	

        );	
			



			
	   }   
	elseif ( ( $headerimage != null ) and ( $footerimage == null ) )   
		   {
		  	
			
		        $form_data = array(
             'name'        =>  $request->name,
			
			
			'Degree' =>   $request->Degrees,
			'Department' =>  $request->Department,
			'mobile' =>  $request->mobile,
			'address' =>  $request->address,
			'first_visit_fees' =>  $request->first_visit_fees,
			'next_visit_fees' =>  $request->next_visit_fees,
			'commission_pecentage' =>  $request->commission_pecentage,
			'workingplace' =>  $request->workingplace,
			'chamber_address' =>  $request->chamber_address,
			'visiting_hours' =>  $request->visiting_hours,
			'offday' =>  $request->offday,
			'prescriptionheading' =>  $request->Prescription_heading,
			'contact_address_for_serial' =>  $request->contact_address_for_serial,
	
		 
	 
	   
	
		  			  	'headerimage' => $headerimage,
	

        );	
			



			
	   }
	elseif ( ( $headerimage == null ) and ( $footerimage == null ) )   
		   {
		  	
			
		        $form_data = array(
             'name'        =>  $request->name,
			
			
			'Degree' =>   $request->Degrees,
			'Department' =>  $request->Department,
			'mobile' =>  $request->mobile,
			'address' =>  $request->address,
			'first_visit_fees' =>  $request->first_visit_fees,
			'next_visit_fees' =>  $request->next_visit_fees,
			'commission_pecentage' =>  $request->commission_pecentage,
			'workingplace' =>  $request->workingplace,
			'chamber_address' =>  $request->chamber_address,
			'visiting_hours' =>  $request->visiting_hours,
			'offday' =>  $request->offday,
			'prescriptionheading' =>  $request->Prescription_heading,
			'contact_address_for_serial' =>  $request->contact_address_for_serial,
	
		 
	 
	   
	
		  		
	

        );	
			



			
	   }	   
	   
	   
	   















       doctor::whereId($request->hidden_id)->update($form_data);

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
                doctor::whereId($id)
  ->update(['softdelete' => '1']);  //softdelete 
    }
}
