<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSettings extends Model
{
    // use HasFactory;
    protected $table = "app_settings";
    protected $primaryKey = 'setting_id';
    public $timestamps = false;
    protected $fillable = [

        'Vendor_Code',
        'Referral_Person_Name',
        'Mob_No',
        'Address',
        'logo_path',
        'description'
    ];
}
