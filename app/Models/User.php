<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * about
     *
     * @return void
     */
    public function about()
    {
        return $this->hasOne(About::class);
    }

    /**
     * experiences
     *
     * @return void
     */
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    /**
     * Get the user's education records.
     */
    public function educations()
    {
        return $this->hasMany(Education::class, 'user_id', 'id');
    }

    /**
     * skills
     *
     * @return void
     */
    // public function skills()
    // {
    //     return $this->belongsToMany(AvailableSkill::class, 'skills');
    // }

    public function skills()
    {
        return $this->hasMany(Skill::class, 'user_id', 'id');
    }

    /**
     * interests
     *
     * @return void
     */
    public function interests()
    {
        return $this->hasMany(Interest::class);
    }

    /**
     * awards
     *
     * @return void
     */
    public function awards()
    {
        return $this->hasMany(Award::class);
    }
}
