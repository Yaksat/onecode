<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class BlogController extends Controller
{
    public function index (Request $request)
    {
        $categories = [
            null => __('Все категории'),
            1 => __('Первая категория'),
            2 => __('Вторая категория'),
        ];

    //   $posts = Post::all(['id', 'title', 'published_at']);

    //   $posts = Post::query()->get(['id', 'title', 'published_at']);

    //   $posts = Post::query()->limit(12)->get();
    //   $posts = Post::query()->limit(12)->offset(12)->get();

//        $validated = $request->validate([
//           'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
//           'page' => ['nullable', 'integer', 'min:1', 'max:100'],
//        ]);

//        $page = $validated['page'] ?? 1;
//        $limit = $validated['limit'] ?? 12;
//        $offset = $limit * ($page - 1);

//        $posts = Post::query()->limit($limit)->offset($offset)->get();
//
//        $posts = Post::query()->paginate($limit);

        $posts = Post::query()->latest('published_at')->paginate(12);

        return view('blog.index', compact('posts', 'categories'));

    }

    public function show (Request $request, Post $post)
    {
        //Это пример того как можно проверять по какому роуту пришел запрос
        // return Route::is('blog*') ? 'yes' : 'no';

//        $post = Post::query()
//            ->latest('published_at')
//            ->firstOrFail(['id', 'title']);

        //$post = Post::query()->findOrFail($post);
        //$posts = Post::query()->find([1, 2, 3]);
        // Это все для того случая,когда явно не указан тип у post public function show (Request $request, $post)
        // Если явно указано Post $post, то можно сразу view возвращать.


     // Чтобы использовать кэширование передавать нужно без указания типа Post
        // public function show (Request $request, $post)

//        $post = cache()->remember(
//            key: "posts.{$post}",
//            ttl: now()->addHour(),
//            callback: function () use ($post) {
//                return Post::query()->findOrFail($post);
//            }
//        );
        // Если есть по данному ключу данные, то берем из кэша, если нет то с попощью коллбэк функции получаем из БД и
        // одновременно записываем в кэш.
        // Способ с кэшем используем, если большая нагрузка на сайт

        return view('blog.show', compact('post'));
    }

    public function like ($post)
    {
        return 'Поставить лайк';
    }
}
