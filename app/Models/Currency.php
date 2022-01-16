<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    public $incrementing = false; //Чтобы id можно было задать строкой, а не числом.

    // Этот массив указывает, какие свойства есть у модели - какие данные пропускать к базе данных.
    // id здесь тоже надо указать явно, т.к. он у нас не автоинкрементный.
    protected $fillable = [
        'id', 'name', 'price',
        'active', 'sort',
    ];

    //Эти свойства не показываются, если вызывать на модели ->toArray() или ->toJson() или отдавать модель по api.
    protected $hidden = [
        'price'
    ];

    // В $casts указываются какие типы данных мы хотим иметь.
    protected $casts = [
        'price' => 'float',
        'active' => 'boolean',
        'sort' => 'integer',
    ];

    // Здесь указываются наши кастомные поля с датой (помимо created_at и updated_at), которые нужно привести к классу Carbon. (Это класс, который
    //позволяет форматировать строки с данными под разные форматы)
    protected $dates = [
        'active_at',
    ];
}
