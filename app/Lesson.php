<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ["user_id", "category_id", "completed"]; // We can mass asign

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function countCorrectAnswers()
    {
        $count = 0;
        foreach ($this->answers as $answer) {
            if ($answer->isCorrect()) {
                $count++;
            }
        }

        return $count;
    }
}
