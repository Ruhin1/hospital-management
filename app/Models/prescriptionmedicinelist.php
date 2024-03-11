<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prescriptionmedicinelist extends Model
{
    use HasFactory;
	
						 protected $fillable = [
     'prescription_id',
	 'medicine_id',
	 ' prescriptionusages_id', 
	 'day',
	 'comment',
	 'prescriptionkhabaragepore_id',
	 'medicine_category_id',

    ];
							 public function prescription()
    {
    	return $this->belongsTo(prescription::class);
    }
	
	
								 public function medicine_category()
    {
    	return $this->belongsTo(medicine_category::class);
    }
	
				 public function medicine()
    {
    	return $this->belongsTo(medicine::class);
    }
	

					 public function prescriptionusages() 
    {
    	return $this->belongsTo(prescriptionusages::class);
    }
	
	
						 public function prescriptionkhabaragepore()
    {
    	return $this->belongsTo(prescriptionkhabaragepore::class);
    }
	
	
	
}
