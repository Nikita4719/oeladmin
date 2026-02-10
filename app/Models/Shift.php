<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    // use HasFactory;
    protected $table = "shift";
    protected $primaryKey = 'shift_id';
    public $timestamps = false;
    protected $fillable = [

        'shift_name',
        'shift_description',
        'location',
        'is_active'
    ];
     public function country()
    {
        return $this->belongsTo(\App\Models\AppSettings::class, 'country_id', 'id');
    }
}
