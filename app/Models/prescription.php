<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prescription extends Model
{
    use HasFactory;
	
					 protected $fillable = [
     'user_id',
	 'patient_id',
	 'meettingtimefornext',
	 'history',

    ];
	
	
						 public function user()
    {
    	return $this->belongsTo(user::class);
    }
	
				 public function patient()
    {
    	return $this->belongsTo(patient::class);
    }

			public function prescriptionmedicinelist()
    {
        return $this->hasMany(prescriptionmedicinelist::class);
    }
	
	
	
}
