<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    use HasFactory;

    public function volume(){
        return $this->belongsTo(Volume::class);
    }

    public function items(){
        return $this->hasMany(Item::class);
    }
}
