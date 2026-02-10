<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'student';

    public function country()
    {
        return $this->hasOne(Country::class,'id','country_id');
    }

    public function province()
    {
        return $this->hasOne(Province::class,'id', 'province_id');
    }


    protected $guarded =[];
}
