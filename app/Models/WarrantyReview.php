<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarrantyReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_guarantee',
        'issuing_entity',
        'number',
        'reference',
        'amount',
        'valid_since',
        'valid_until',
        'project_id'
    ];

    public function project(){
        $this->belongsTo(Project::class);
    }
}
