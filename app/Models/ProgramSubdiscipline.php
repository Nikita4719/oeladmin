<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSubdiscipline extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function programdiscipline()
    {
        return $this->belongsTo(ProgramDiscipline::class,'program_discipline_id','id');
    }
}
