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
}
