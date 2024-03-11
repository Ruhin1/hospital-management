<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reportlist extends Model
{
    use HasFactory;
	
				 protected $fillable = [
        'name',
		
		'unitprice',
		'softdelete',
        'related_reagents',

    ];

    

    public function pathology_test_component()
    {
        return $this->hasMany(pathology_test_component::class);
    }

	
}
