<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    use HasFactory;

    protected $table = 'sub_service';
    protected $guarded = [];

    public function master_service()
    {
        return $this->belongsTo(MasterService::class, 'master_service_id', 'id');
    }
}
