<?php

namespace App;

use App\Choice;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ["question", "category_id"]; // We can mass asign

    public function choices()
    {
        return $this->hasMany('App\Choice');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getCorrectAnswer()
    {
        foreach ($this->choices as $choice) {
            if ($choice->is_correct) {
                return $choice->choice;
            }
        }

        return "ERROR: There is no correct answer";
    }
}
