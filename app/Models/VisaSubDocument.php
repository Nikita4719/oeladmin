<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaSubDocument extends Model
{

    use HasFactory;

    protected $guarded = [];


    public function visa_documents(){
        return $this->belongsTo(VisaDocument::class,'visa_document_id');
    }
}
