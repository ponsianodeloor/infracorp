<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfraestructureActivity extends Model
{
    use HasFactory;

    public function infraestructureType(){
        return $this->belongsTo(InfraestructureType::class);
    }
}
