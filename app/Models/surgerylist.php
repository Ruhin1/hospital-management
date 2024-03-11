<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surgerylist extends Model
{
    use HasFactory;
	
			 protected $fillable = [
        'name',
	'softdelete',
		'pre_operative_charge',
		'Surgeon_charge',
		'anesthesia_charge',
		'assistant_charge',
		'ot_charge',
		'o2_no2_charge',
		'c_arme_charge',
		'post_operative_charge',
		'surgeron_id',
		'anesthesiologist_id',
		
	

    ];
}
