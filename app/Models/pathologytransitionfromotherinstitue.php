<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pathologytransitionfromotherinstitue extends Model
{
    use HasFactory;
	
	
						 protected $fillable = [
           'reportlist_id',
	'pathologyorderfromotherinsitute_id',
	'supplier_id',

		'unit',
		'adjust',

		'discount',
	 
		 'totaldiscount',
		 'amount',
	

    ];
	
	
	
						 public function patient()
    {
    	return $this->belongsTo(patient::class);
    }
	
	
	
						 public function supplier()
    {
    	return $this->belongsTo(supplier::class);
    }	
	
	
						 public function reportlist()
    {
    	return $this->belongsTo(reportlist::class);
    }	
	
	
}
