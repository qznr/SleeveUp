<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email', 'password', 'name', 'gender', 'date_of_birth', 'place_of_birth', 'img',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'skills' => 'array',
    ];
    
    protected $appends = ['role'];

    public function applicant()
    {
        return $this->hasOne(Applicant::class);
    }

    public function getRoleAttribute()
    {
        if ($this->applicant) {
            return 'applicant';
        }
        return 'unknown';
    }
}
