<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentAttendence extends Model
{
    use HasFactory;
    protected $table = 'school_attended';

    public function country()
    {
        return $this->hasOne(Country::class,'id','country_id');
    }

    public function province()
    {
        return $this->hasOne(Province::class,'id', 'province');
    }

    public function student()
    {
        return $this->hasOne(Student::class,'id','student_id');
    }

    public function documents()
    {
        return $this->hasOne(Documents::class,'id','documents');
    }
}
