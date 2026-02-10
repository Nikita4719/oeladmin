<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeProgramLevel extends Model
{
    use HasFactory;

    protected $table='home_program_levels';

    protected $guarded =[];

    public function home_program_levels()
    {
        return $this->hasOne(ProgramLevel::class,'id','program_level_id');
    }
}
