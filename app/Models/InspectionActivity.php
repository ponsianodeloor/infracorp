<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'specialty',
        'date',
        'act_number',
        'affair',
        'revised_property',
        'revision_number',
        'project_id',

    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
