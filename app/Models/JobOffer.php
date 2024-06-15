<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    use HasFactory;

    // Define the inverse relationship with Company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Define the inverse relationship with Profession
    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }
}
