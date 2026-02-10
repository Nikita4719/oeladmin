<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterLeadStatus extends Model
{
	protected $table = "master_lead_status";
    protected $fillable = ['status', 'name', 'color'];
}
