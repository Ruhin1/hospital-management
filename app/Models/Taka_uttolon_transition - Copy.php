<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taka_uttolon_transition extends Model
{
    use HasFactory;
	
	use HasFactory;
	
				 protected $fillable = [
        'amount',
		
		'comment',
		'transitiontype',
		'sharepartner_id',
        'created_at',

    ];
	
	  public function sharepartner()
    {
        return $this->belongsTo(sharepartner::class);
    }
	
}
