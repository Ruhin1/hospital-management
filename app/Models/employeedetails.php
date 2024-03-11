<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employeedetails extends Model
{
    use HasFactory;
	
	
			 protected $fillable = [
        'name',
		'designation',
		'salary',
		'mobile',
		'address',
		'softdelete',

    ];
	
	
	
	
	
}
