<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable = ["choice", "question_id", "is_correct"]; // We can mass asign

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function which_lesson()
    {
        // get the newest lesson of the question of the choice
        $lesson = $this->question->category->lessons->where('user_id', auth()->user()->id)->last();

        return $lesson->id;
    }
}
