<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Relationship extends Model
{
    protected $fillable = ["follower_id", "followed_id"]; // We can mass asign

    public function follower()
    {
        return User::find($this->follower_id);
    }

    public function followed()
    {
        return User::find($this->followed_id);
    }
}
