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
        'timeframe',
        'link'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
