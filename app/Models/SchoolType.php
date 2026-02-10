<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolType extends Model
{
    protected $table = 'schooltype';
    protected $fillable = [
        'name', 'active'
    ];

    public function school()
    {
        return $this->hasMany(School::class, 'schooltype_id');
    }
}
