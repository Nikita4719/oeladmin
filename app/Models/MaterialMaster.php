<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialMaster extends Model
{
    // use HasFactory;
    protected $table = "material_master";
     protected $primaryKey = 'material_id';
    protected $fillable = ['code', 'material_id', 
     'description', 'od', 'id','thickness','length_mtr', 'kg_per_meter', 'grade', 'material_group', 'is_active'];
}
