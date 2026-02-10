<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fieldsofstudytype extends Model
{
     protected $table ='fieldsofstudytypes';
	 protected $primaryKey ='id';
     protected $fillable = ['name','status'];
}
