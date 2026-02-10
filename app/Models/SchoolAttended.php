<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolAttended extends Model
{
    use HasFactory;

    protected $table = 'school_attended';

    public function country()
    {
        return $this->hasOne(Country::class,'id','country_id');
    }

    public function gradingScheme()
    {
        return $this->belongsTo(GradingScheme::class, 'grading_scheme_id');
    }
    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }

    public function Student()
    {
        return $this->hasOne(Student::class,'id', 'student_id');
    }

    public function province()
    {
        return $this->hasOne(Province::class,'id', 'province_id');
    }

    public function document(){
        return $this->belongsTo(Documents::class,'documents','id' );
    }

  
}
