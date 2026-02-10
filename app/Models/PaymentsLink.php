<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentsLink extends Model
{
    use HasFactory;


    protected $table ='payments_link';

    protected $guarded =[];

    public function master_service()
    {
        return $this->belongsTo(MasterService::class,'master_service','id');
    }
    public function master_services()
    {
        return $this->belongsTo(MasterService::class,'master_service','id');
    }


    public function program(){
        return $this->hasOne(Program::class,'id','program_id');
    }

    public function payments()
{
    return $this->hasOne(Payment::class,'fallowp_unique_id','fallowp_unique_id');
}}
