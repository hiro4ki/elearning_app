<?php

namespace App;

use App\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // テストデータに挿入する値を設定します。
    protected $fillable = [
        'title', 'description',
    ];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }

    public function has_image()
    {
        $has_image = false;
        if (Storage::disk('local')->exists('public/category_images/' . $this->id . '.jpg')) {
            $has_image = true;
        }

        return $has_image;
    }
}
