<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    /** @use HasFactory<\Database\Factories\FactorFactory> */
    use HasFactory;
    protected $fillable = ['title' , 'weight'];
    public function decision(){
        return $this->belongsTo(Decision::class);
    }

    public function scores(){
        return $this->hasMany(Score::class);
    }
}
