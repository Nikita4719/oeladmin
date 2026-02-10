<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table = "universities";

    // protected $fillable = ['country_id', 'state', 'university_name', 'university_location', 'city',
    // 	'zip', 'phone_number', 'email', 'website', 'logo', 'type_of_university', 'founded_in', 'total_students', 'international_students', 'size_of_campus', 'male_female_ratio', 'faculty_student_ratio',
    // 	'yearly_hostel_expense_amount', 'yearly_hostel_expense_currencies', 'financial_aid',
    // 	'placement', 'accomodation', 'accomodation_details', 'website2', 'application_cost',
    // 	'application_cost_currencies', 'fafsa_code', 'notes', 'added_by_name', 'added_on_date',
    //     'locationlat', 'locationlng', 'brochure', 'banner', 'thumbnail', 'details', 'user_id',
    //     'is_approved', 'add_course_payment_status', 'status', 'is_deleted'
    // ];

    
    protected $guarded =[];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function country_name()
    {
        return $this->hasOne(Country::class,'id', 'country_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'state');
    }
    public function university_type()
    {
        return $this->belongsTo(SchoolType::class,'type_of_university','id');
    }
    public function university_type_name()
    {
        return $this->hasOne(SchoolType::class,'id', 'type_of_university');
    }
    public function yearly_hostel_expense_currency_data(){
        return $this->belongsTo(Currency::class, 'yearly_hostel_expense_currencies');
    }
    public function application_cost_data(){
        return $this->belongsTo(Currency::class, 'application_cost_currencies');
    }
    public function scholarships(){
        return $this->hasMany(StudentScholorship::class, 'college_university_name');
    }
    public function Program(){
        return $this->hasMany(Program::class,'school_id','id');
    }
}
