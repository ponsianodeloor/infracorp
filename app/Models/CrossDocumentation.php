<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrossDocumentation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'document',
        'for',
        'of',
        'affair',
        'project_id'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
