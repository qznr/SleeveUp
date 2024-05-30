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
        'description'
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

    // Accessor for certificates
    public function getCertificatesListAttribute()
    {
        return $this->certificates()->get();
    }

    // Accessor for projects
    public function getProjectsListAttribute()
    {
        return $this->projects()->get();
    }
}
