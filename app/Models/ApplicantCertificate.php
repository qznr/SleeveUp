<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'name',
        'type',
        'timeframe',
        'skills',
        'tools',
        'link'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
