<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAssistance extends Model
{
    protected $table = "student_assistance";
    protected $fillable = ['user_id', 'title', 'is_active'];
}
