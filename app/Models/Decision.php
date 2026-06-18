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
    protected $casts = ["type" => DecisionType::class , 'title' => 'encrypted'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function options(){
        return $this->hasMany(Option::class);
    }

    public function factors(){
        return $this->hasMany(Factor::class);
    }

    public function calculateResults() {
        $options = $this->options()->get();
        $finalscores = [];
        foreach($options as $option) {
            $scores = Score::where('option_id', $option->id)->get();
            $total_score_option = 0 ;
            foreach($scores as $score){
                $total_score_option += ($score->score * $score->factor->weight);
            }
            $finalscores[$option->title] = $total_score_option;
        }

        arsort($finalscores);
        return $finalscores;
    }
}
