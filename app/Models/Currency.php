<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public $incrementing = false; //Чтобы id можно было задать строкой, а не числом.

    // Этот массив указывает, какие свойства есть у модели - какие данные пропускать к базе данных.
    // id здесь тоже надо указать явно, т.к. он у нас не автоинкрементный.
    protected $fillable = [
        'id', 'name',
    ];
}
