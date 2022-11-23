<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntranceStudy extends Model
{
    use HasFactory;

    protected $fillable = [
        'entry',
        'return',
        're_entry',
        'backup_document',
        'project_id'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
