<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EconomicState extends Model
{
    use HasFactory;

    protected $fillable = [
        'concept',
        'execution_period',
        'total_amount',
        'advance_discount',
        'liquid',
        'economic_progress_percentage',
        'project_id'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
