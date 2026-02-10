<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
    protected $table = 'education_level';
    protected $guarded = [];
    public function program()
    {
        return $this->hasMany(Program::class, 'education_level_id');
    }

    public function programLevel()
    {
        return $this->hasMany(ProgramLevel::class, 'id','program_level_id');
    }
    public function educationHistory()
    {
        return $this->hasMany(EducationHistory::class, 'education_level_id');
    }


    public function program_sublevel()
    {
        return $this->hasOne(ProgramSubLevel::class,'id', 'program_sublevel_id');
    }
}
