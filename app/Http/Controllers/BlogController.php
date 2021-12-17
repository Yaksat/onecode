<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class BlogController extends Controller
{
    public function index ()
    {
        return 'Посты в блоге';
    }

    public function show ($post)
    {
        //Это пример того как можно проверять по какому роуту пришел запрос
        // return Route::is('blog*') ? 'yes' : 'no';

        return 'Один пост в блоге';
    }

    public function like ($post)
    {
        return 'Поставить лайк';
    }
}
