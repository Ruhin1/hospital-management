<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Childmenu extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'name',
        'route',
        'status',
        'rootmenu_id',
    ];

    public function rootmenu() : BelongsTo
    {
        return $this->belongsTo(Rootmenu::class);
    }
}
