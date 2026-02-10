<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Subset;

class StudentByAgent extends Model
{
    protected $table = 'student_by_agent';
    // protected $fillable = [
    //     'student_user_id', 'added_by_agent_id', 'name', 'email', 'phone_number', 'student_comment', 'lead_status', 'next_calling_date', 'profile_created', 'preferred_country_id', 'interested_in', 'assigned_to', 'zip', 'source', 'father_name', 'caste', 'subject', 'stream', 'province_id', 'school', 'country_id', 'course', 'mail_count',
    //     'sms_count','intake','intake_year'
    // ];
    protected $guarded = [];
    public function lead_status_data()
    {
        return $this->belongsTo(MasterLeadStatus::class, 'lead_status');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function added_by_user()
    {
        return $this->belongsTo(User::class, 'added_by_agent_id');
    }

    public function assigned_to_user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function caste_data()
    {
        return $this->belongsTo(Caste::class, 'caste');
    }

    public function state()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function student_user()
    {
        return $this->belongsTo(User::class, 'student_user_id');
    }

    public function source()
    {
        return $this->belongsTo(Source::class, 'student_user_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject');
    }

    public function leadStatusQuality()
{
    return $this->hasOne(LeadStatusQuality::class, 'student_id', 'id');
}
}

