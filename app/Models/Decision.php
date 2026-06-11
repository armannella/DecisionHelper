<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    /** @use HasFactory<\Database\Factories\DecisionFactory> */
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function options(){
        return $this->hasMany(Option::class);
    }

    public function factors(){
        return $this->hasMany(Factor::class);
    }
}
