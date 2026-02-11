<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCtl extends Model
{
    // use HasFactory;
    protected $table = "customer_ctl";
    protected $primaryKey = 'customer_ctl_id';
    public $timestamps = false;
    protected $fillable = [

        'customer_id',
        'material_id',
        'material_ctl_id',
        'min_maintain_buffer_qty',
        'max_maintain_buffer_qty',
        'available_buffer_qty',
        'buffer_status',
        'comments',
        'is_active'
    ];
}
