<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bio',
        'status',
        'about_me',
        'current_education_or_work',
    ];

    // Define default attribute values
    protected $attributes = [
        'bio' => "Hi there! I'm using SleeveUp.",
        'status' => 'Looking for work',
        'about_me' => "Welcome to my profile. Here's a bit about me.",
        'current_education_or_work' => 'Brawijaya University',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function experiences()
    {
        return $this->hasMany(ApplicantExperience::class);
    }

    public function certificates()
    {
        return $this->hasMany(ApplicantCertificate::class);
    }

    public function projects()
    {
        return $this->hasMany(ApplicantProject::class);
    }

    public function getExperiencesListAttribute()
    {
        return $this->experiences()->get();
    }

    public function getCertificatesListAttribute()
    {
        return $this->certificates()->get();
    }

    public function getProjectsListAttribute()
    {
        return $this->projects()->get();
    }
}