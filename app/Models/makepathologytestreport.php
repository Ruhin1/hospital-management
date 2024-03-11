<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class makepathologytestreport extends Model
{
    use HasFactory;
						 protected $fillable = [
          
		'patient_id',
		'user_id',
		
		'reportlist_id',
	'pathology_test_component_id',
		'result',
		'doctor_id',
		'reportorder_id',
		'test_no',

    ];




				 public function user()
    {
    	return $this->belongsTo(user::class);
    }
					 public function doctor()
    {
    	return $this->belongsTo(doctor::class);
    }
	
					 public function reportlist() // Test Name
    {
    	return $this->belongsTo(reportlist::class);
    }
	
					 public function pathology_test_component() // Test Component Name 
    {
    	return $this->belongsTo(pathology_test_component::class);
    }
	
	
				 public function patient()
    {
    	return $this->belongsTo(patient::class);
    }
	
	
				 public function reportorder()
    {
    	return $this->belongsTo(reportorder::class);
    }












}

