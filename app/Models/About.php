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
        'id_user',
        'full_name',
        'address',
        'neighborhood',
        'locality',
        'phone_number',
        'email',
        'profile',
        'linkedin_address',
        'github_address',
        'twitter_address',
        'facebook_address',
    ];
}
