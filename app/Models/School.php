<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $table = 'school';


    public function contry(){
        return $this->hasOne(Country::class,'country_id','id');
    }

    public function university_type(){
        return $this->hasOne(SchoolType::class,'id','type_of_university');
    }
}
