<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;
	
	
	 protected $fillable = [
        'name',
		'guardian_name_rel',
       'address',
		'mobile',
		'age',
		'due',
		'dena',
		'sex',
		'patientbook_id',
		'softdelete',
		'cabinelist_id',
		'diagnosisfor',
		'doctor_id',
		'refdoc_id',
		'agentdetail_id',
		'cabinerate',
	
    ];

	  public function doctor()
    {
        return $this->belongsTo(doctor::class);
    }
	
		  public function agentdetail()
    {
        return $this->belongsTo(agentdetail::class);
    }
	
	  public function cabinelist()
    {
        return $this->belongsTo(cabinelist::class);
    }
	
	
  public function patientbook()
    {
         return $this->hasOne(patientbook::class);
    }


  public function cabinetransaction()
    {
       return $this->hasMany(cabinetransaction::class);
    }







}
