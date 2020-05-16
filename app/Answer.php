<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ["choice_id", "lesson_id"];

    public function choice()
    {
        return $this->belongsTo("App\Choice");
    }

    public function lesson()
    {
        return $this->belongsTo("App\Lesson");
    }
}
