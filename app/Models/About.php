<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'dateOfBirth',
        'Photo',
        'name',
        'document',
        'phone',
        'city',
        'department',
        'locality',
        'address',
        'barrio',
        'personalProfile',
        'social_media_links',
    ];

    protected $casts = [
        'social_media_links' => 'array',
    ];
}
