<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
