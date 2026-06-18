<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    /** @use HasFactory<\Database\Factories\OptionFactory> */
    use HasFactory;
    protected $fillable = ['title'];
    protected $casts = ['title' => 'encrypted'];
    public function decision(){
        return $this->belongsTo(Decision::class);
    }

    public function scores(){
        return $this->hasMany(Score::class);
    }
}
