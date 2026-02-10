<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
    protected $fillable = [
        'name','country_id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function school()
    {
        return $this->hasMany(School::class, 'province_id');
    }
}
