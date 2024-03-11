<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khorocer_khad extends Model
{
    use HasFactory;
	
			 protected $fillable = [
        'name',
'softdelete',
    ];
	
	
		public function medicine()
    {
        return $this->hasMany(khoroch_transition::class);
    }
	
	
	
}
