<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Menuaction extends Model
{
    use HasFactory;

            protected $fillable = [
        
                'name',
                'route',
                'status',
                'childmenu_id',
            ];

            public function childmenu() : BelongsTo
    {
        return $this->belongsTo(Childmenu::class);
    }
}
