<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfraestructureType extends Model
{
    use HasFactory;

    public function infraestructure(){
        return $this->belongsTo(Infraestructure::class);
    }

    public function activities(){
        return $this->hasMany(InfraestructureActivity::class);
    }
}
