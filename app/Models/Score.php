<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    /** @use HasFactory<\Database\Factories\ScoreFactory> */
    use HasFactory;
    protected $fillable = ["score" , "factor_id" , "option_id"];
    public function option(){
        return $this->belongsTo(Option::class);
    }

    public function factor(){
        return $this->belongsTo(Factor::class);
    }

}
