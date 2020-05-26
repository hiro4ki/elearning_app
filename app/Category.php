<?php

namespace App;

use App\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use Notifiable;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $table = 'categories';
    protected $connection = 'mysql';
    protected $primaryKey = "id"; // Auto incrementなどの主キーがある場合は明示的に設定しておく必要があります。
    public $timestamp = true; // updated_atとcreated_atのカラムに現在時間を挿入したいときはtrueを設定します。

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
