<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Silber\Bouncer\Database\HasRolesAndAbilities;

class ApplicationsApplied extends Model
{
    protected $table = 'applications_applied';

    public function __construct(){
        parent::__construct();
        $this->setFillable();
    }

    public function setFillable(){
        $this->fillable = [
            'student_id','program_id','est_start_date','est_start_date_id','fees','application_id','status','is_paid'
            ,'agent_comment','currency','razorpay_payment_id','payment_date','school_id','is_approved_by_agent','is_approved_by_school', 'assistance_id', 'apply_question_id', 'scholorship_id', 'add_on_services_fee', 'add_on_service_fee_amount', 'total_amount', 'converted_application_fee_amount', 'add_on_service_fee_gst_amount', 'is_commission_distributed'
        ];
    }




}
