<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class coshmaPrescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'preint_id',
        'brith',
        'ipd',
        'resph',
        'recyl',
        'reaxis',
        'rebyes',
        'lesph',
        'lecyl',
        'leaxis',
        'lebyes',
        'add',
        'diopter',
        'instructions',
        'type',
        'color',
        'remarks',
    ];


    protected $casts = [
        'instructions' => 'array',
        'type' => 'array',
        'color' => 'array',
        'remarks' => 'array',
    ];

    

    // protected function instructions(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => json_decode($value, true),
    //         set: fn ($value) => json_encode($value),
    //     );
    // } 

    // protected function type(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => json_decode($value, true),
    //         set: fn ($value) => json_encode($value),
    //     );
    // } 

    // protected function color(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => json_decode($value, true),
    //         set: fn ($value) => json_encode($value),
    //     );
    // } 

    // protected function remarks(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => json_decode($value, true),
    //         set: fn ($value) => json_encode($value),
    //     );
    // } 
}
