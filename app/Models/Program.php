<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Program extends Model
{
    protected $table = 'program';
    // protected $fillable = [
    //     'name','description','school_id','program_level_id','length','application_fee','tution_fee',
    //     'cost_of_living_fee','currency','intake','education_level_id','min_gpa','other_requirements','extra_notes',
    //     'cost_of_living','status','is_most_viewed','user_id', 'counciler_fees', 'franchise_fees', 'oel_fees', 'scholarships', 'is_approved', 'grading_scheme_id', 'add_on_services', 'related_programs', 'priority', 'programType',
    //     'fieldsofstudytype',
    //     'commission',
    //     'commission_for_program_payment_to_franchise',
    //     'commission_for_added_program_payment_to_franchise',
    //     'commission_for_program_payment_to_counselor',
    //     'commission_for_added_program_payment_to_counselor',
    //     'lang_spec_for_program',
    //     'total_credits'
    // ];
    protected $guarded =[];
    public function grading_scheme()
    {
        return $this->belongsTo(GradingScheme::class, 'grading_scheme_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function school()
    {
        return $this->belongsTo(University::class, 'school_id');
    }

    public function university_name(){
        return $this->hasOne(University::class,'id', 'school_id')->select('id','university_name','logo','country_id','testrequired','banner')->addSelect(DB::raw("CONCAT('".url("")."/public/', logo) as logo_path"));
    }

    public function programLevel()
    {
        return $this->belongsTo(ProgramLevel::class, 'program_level_id');
    }
    public function programSubLevel()
    {
        return $this->belongsTo(ProgramSubLevel::class, 'program_sub_level','id');
    }
    public function educationLevelprogram()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id','id');
    }


    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class,'subject_id','id');
    }

    public function currency_data()
    {
        return $this->belongsTo(Currency::class, 'currency','currency');
    }

    public function sbuject()
    {
        return $this->hasMany(Subject::class, '	subject_id');
    }

    public function ProgramCategory()
    {
        return $this->hasMany(ProgramCategory::class,'id', 'prog_category');
    }

    public function programEnglishRequired()
    {
        return $this->hasMany(ProgramEnglishRequired::class, 'program_id');
    }

    public function applicationsApplied()
    {
        return $this->hasMany(ApplicationsApplied::class, 'student_id');
    }

    public function study_type(){
        return $this->belongsTo(Fieldsofstudytype::class, 'fieldsofstudytype');
    }
}
