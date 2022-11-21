<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExecutedApprovedMount extends Model
{
    use HasFactory;

    protected $fillable = [
        'project',
        'value_definitive_studies',
        'value_approved_studies',
        'project_id'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

}
