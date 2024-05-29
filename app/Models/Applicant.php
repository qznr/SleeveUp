<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'education_level', 'description'];

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
}
