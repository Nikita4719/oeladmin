<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkCenter extends Model
{
    // use HasFactory;
    protected $table = "work_center";
    protected $primaryKey = 'work_center_id';
    public $timestamps = false;
    protected $fillable = [

        'work_center_name',
        'work_center_description',
        'location',
        'is_active'

    ];
}
