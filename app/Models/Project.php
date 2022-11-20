<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function volumes(){
        return $this->hasMany(Volume::class);
    }

    public function inspectionContract(){
        return $this->hasOne(InspectionContract::class);
    }

    public function inspectionReport(){
        return $this->hasOne(InspectionReport::class);
    }

    public function infraestructures(){
        return $this->hasMany(Infraestructure::class);
    }

    public function intervenedWorkIdentification(){
        return $this->hasOne(IntervenedWorkIdentification::class);
    }
}
