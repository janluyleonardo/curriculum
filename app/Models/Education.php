<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'degree',
        'institution',
        'startDate',
        'endDate',
        'description',
    ];
}
