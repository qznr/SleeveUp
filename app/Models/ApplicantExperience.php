<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'name',
        'description',
        'location',
        'role',
        'start_year',
        'end_year',
        'skills_and_tools'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
