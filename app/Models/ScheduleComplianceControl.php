<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleComplianceControl extends Model
{
    use HasFactory;

    protected $fillable = [
        'month',
        'calendar',
        'cumulative_scheduled',
        'executed_scheduled',
        'compliance_percentage',
        'difference_in_arrears',
        'project_id'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
