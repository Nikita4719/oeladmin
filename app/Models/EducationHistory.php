<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationHistory extends Model
{
    protected $table = 'education_history';
    protected $fillable = [
        'education_level_id','country_id','grading_scale','grading_scheme_id','grading_average','graduated_recently','student_id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function gradingScheme()
    {
        return $this->belongsTo(GradingScheme::class, 'grading_scheme_id');
    }
    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }

    public function school()
    {
        return $this->hasOne(School::class, 'education_history_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }


}
