<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';
    protected $fillable = [
        'name', 'country_code'
    ];

    public function province()
    {
        return $this->hasMany(Province::class, 'country_id');
    }

    public function gradingScheme()
    {
        return $this->hasMany(GradingScheme::class, 'country_id');
    }

    public function educationHistory()
    {
        return $this->hasMany(EducationHistory::class, 'country_id');
    }

    function universities(){
        return $this->hasMany(University::class, 'country_id')->latest()->limit(5);
    }
}
