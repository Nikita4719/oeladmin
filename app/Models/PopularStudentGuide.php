<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopularStudentGuide extends Model
{
    use HasFactory;

    protected $table ='popular_student_guides';

    protected $guarded =[];
}
