<?php

namespace App\Models;

use App\DecisionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    /** @use HasFactory<\Database\Factories\DecisionFactory> */
    use HasFactory;
    protected $fillable = ['title' , 'type'];
    protected $casts = ["type" => DecisionType::class];

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
