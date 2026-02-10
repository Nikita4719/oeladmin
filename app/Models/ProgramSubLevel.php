<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSubLevel extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function programLevel()
    {
        return $this->hasMany(ProgramLevel::class, 'id','program_id');
    }
}
