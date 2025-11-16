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
        'user_id',
        'dateOfBirth',
        'Photo',
        'name',
        'document',
        'phone',
        'city',
        'department',
        'id_locality',
        'address',
        'barrio',
        'personalProfile',
        'social_media_links',
    ];

    protected $casts = [
        'social_media_links' => 'array',
    ];

    public function locality()
    {
        return $this->belongsTo(Locality::class, 'id_locality');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
