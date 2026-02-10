<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentApplyQuestions extends Model
{
    protected $table = "student_apply_questions";
    protected $fillable = ['user_id', 'question', 'is_active'];
}
