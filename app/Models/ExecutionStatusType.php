<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExecutionStatusType extends Model
{
    use HasFactory;

    public function executionStatus(){
        return $this->belongsTo(ExecutionStatus::class);
    }
}
