<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductWorkContractor extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'mdg',
        'sub_circuit',
        'typography',
        'implantations',
        'architectural_memories',
        'structural',
        'electrical_electronic',
        'hydro_sanitary',
        'mechanical_study',
        'project_id'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
