<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class BlogController extends Controller
{
    public function index ()
    {
        $post = (object) [
            'id' => 123,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum <strong>dolor</strong> sit amet, consectetur adipisicing elit. Delectus, nemo?'
        ];

        $posts = array_fill(0,10,$post);

        return view('blog.index', compact('posts'));

    }

    public function show ($post)
    {
        //Это пример того как можно проверять по какому роуту пришел запрос
        // return Route::is('blog*') ? 'yes' : 'no';

        $post = (object) [
            'id' => 123,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum <strong>dolor</strong> sit amet, consectetur adipisicing elit. Delectus, nemo?'
        ];

        return view('blog.show', compact('post'));
    }

    public function like ($post)
    {
        return 'Поставить лайк';
    }
}
