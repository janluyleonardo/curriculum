<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'postal_code',
        'area',
        'population',
        'density',
        'status',
    ];
}
