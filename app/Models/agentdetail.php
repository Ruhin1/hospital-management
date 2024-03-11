<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agentdetail extends Model
{
    use HasFactory;
	
			 protected $fillable = [
        'name',
		'doctor',
		'mobile',
		'address',
		'hospitaler_kache_pawna',
		'softdelete',
		'commission_pecentage',
		'agentdetail_id',

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
