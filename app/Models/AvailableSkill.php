<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'skill_id',
    ];
}