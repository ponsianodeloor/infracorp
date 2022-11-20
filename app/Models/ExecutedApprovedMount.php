<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExecutedApprovedMount extends Model
{
    use HasFactory;

    public function project(){
        return $this->belongsTo(Project::class);
    }

}
