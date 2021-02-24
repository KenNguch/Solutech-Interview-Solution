<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';
    const  ADMIN_USER = true;
    const  REGULAR_USER = false;
    const  INACTIVE_USER = false;
    protected $table = "users";
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'identification_number',
        'verified',
        'verification_token',
        'admin',
        'profile_picture',
        'active',

    ];


    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function generateVerificationToken()
    {
        return Str::uuid()->toString();
    }


    public function isVerified()
    {
        return $this->verified == User::VERIFIED_USER;
    }

    public function isAdmin()
    {
        return $this->admin == User::ADMIN_USER;

    }
}
