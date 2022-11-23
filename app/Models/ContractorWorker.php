<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractorWorker extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'amount',
        'name',
        'observations',
        'project_id'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
