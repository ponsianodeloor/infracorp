<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionPersonal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'approval',
        'project_id'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
