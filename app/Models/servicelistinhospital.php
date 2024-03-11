<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicelistinhospital extends Model
{
    use HasFactory;
	
				 protected $fillable = [
        'servicename',
		'price',
		'service_type',
		'softdelete', 

    ];
	
}
