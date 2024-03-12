<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicine extends Model
{
    use HasFactory;
	
	
			 protected $fillable = [
        'name',
		'stock',
		'unitprice',
		'medicine_category_id',
		'softdelete',
		'medicinecomapnyname_id',
		'Genericname',
		'datetime',
		'Strength',
		

    ];
	
		 public function medicine_category()
    {
    	return $this->belongsTo(medicine_category::class);
    }
	
			 public function medicinecomapnyname()
    {
    	return $this->belongsTo(medicinecomapnyname::class);
    }
	
}
