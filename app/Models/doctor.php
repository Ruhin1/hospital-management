<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;
	
	
				 protected $fillable = [
        'name',
		'mobile',
		'address',
		'Degree',
		'hospitaler_kache_pawna',
		'Department',
		'first_visit_fees',
		'next_visit_fees',
		'softdelete',
		'commission_pecentage',
		'prescriptionheading',
		'chamber_address',
		'visiting_hours',
		'offday',
		'workingplace',
	
'contact_address_for_serial',
'headerimage',
'footerimage',


    ];
	
	    public function cabinetransaction()
    {
        return $this->hasMany(cabinetransaction::class);
    }
		    public function surgerytransaction()
    {
        return $this->hasMany(surgerytransaction::class);
    }
		    public function reportorder()
    {
        return $this->hasMany(reportorder::class);
    }
	
	
}
