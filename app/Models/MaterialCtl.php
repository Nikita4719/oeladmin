<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialCtl extends Model
{
    // use HasFactory;
    protected $table = "material_ctl";
    protected $primaryKey = 'material_ctl_id';
    protected $fillable = [

        'material_id',
        'ctl_mat_no',
        'ctl_mat_description',
        'kg_per_meter',
        'grade',
        'od',
        'thickness',
        'length_mtr',
        'nos_of_ctl_per_ml',
        'nos_of_ctl_required',
        'nos_of_ml_required',
        'ctl_weight',
        'ml_weight',
        'blade_thickness',
        'dust',
        'end_cut',
        'loss_percentage',
        'valuation_type',
        'quality_parameter',
        
    ];
}
