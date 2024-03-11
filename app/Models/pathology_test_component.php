<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pathology_test_component extends Model
{
    use HasFactory;
	
	
					 protected $fillable = [
					 'reportlist_id',
        'component_name',
		'Normalvalue',
	'unit',
		'softdelete'

    ];

				 public function reportlist()
    {
    	return $this->belongsTo(reportlist::class);
    }

	
	
}
