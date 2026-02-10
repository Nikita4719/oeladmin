<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;


    protected $table ='payments';

    protected $guarded =[];

    public function PaymentLink()
    {
        return $this->belongsTo(PaymentsLink::class,'fallowp_unique_id','fallowp_unique_id');
    }
}
