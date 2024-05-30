<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'name',
        'description',
        'type',
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'link'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
