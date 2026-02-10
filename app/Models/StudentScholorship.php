<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentScholorship extends Model
{
    	 protected $table ='student_scholorship';

         protected $fillable = ['college_university_name', 'program_id', 'scholorship_name','scholorship_type','offered_by','application_dead_line','no_of_scholorship','scholorship_amount','leavel_of_study','organization','renewability','international_student_eligibility','eligibility_critera','appliation_process','selection_process','grant_process','status', 'details'];




}
