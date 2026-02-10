<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RackMaster extends Model
{
    // use HasFactory;
    protected $table = "rack_master";
    protected $primaryKey = 'rack_id';
    protected $fillable = ['rack_code',	'location',	'capacity',	'rack_type', 'is_active'];

}
