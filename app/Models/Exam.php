<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exams';

    protected $guarded =[];

    public function program_level(){
        return $this->hasOne(ProgramLevel::class,'id','program_level_id');
    }
}
