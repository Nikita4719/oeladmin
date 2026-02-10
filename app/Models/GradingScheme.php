<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradingScheme extends Model
{
    protected $table = 'grading_scheme';
    protected $fillable = [
        'name','country_id', 'education_level_id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function education_level()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }

    public function educationHistory()
    {
        return $this->hasMany(EducationHistory::class, 'id','grading_scheme_id');
    }


}
