<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function programlevel(){
        return $this->belongsTo(ProgramLevel::class,'program_level_id','id');
    }
}
