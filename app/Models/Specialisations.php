<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialisations extends Model
{
     protected $table ='specialisations';
     protected $primaryKey ='id';
     public $timestamps = true;
     protected $fillable = [
        'name',
        'created_by',
        'status',
        'updated_by'
     ];
     // protected $dates = ['created_at', 'updated_at'];
    
}
