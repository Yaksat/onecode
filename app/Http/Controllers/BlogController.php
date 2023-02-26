<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class BlogController extends Controller
{
    public function index (Request $request)
    {
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


//        $posts = Post::query()
////            ->where('title', 'like','%aut%')
////            ->whereNull('published_at')
////            ->whereNotNull('published_at')
////            ->whereIn('id', [1, 2, 3, 456])
////            ->whereNotIn('id', [1, 2, 3, 456])
////                ->toSql();
////            ->whereDate('published_at', new Carbon('2022-07-18'))
////            ->whereYear('published_at', 2022)
////            ->whereMonth('published_at', 1)
////            ->whereDay('published_at', 1)
////            ->whereBetween('id', [1, 5])        //не один из аргументов диапазона не должен быть null
//            ->whereBetween('published_at', [
//                new Carbon('26.02.2022'),
//                new Carbon('30.02.2022')
//            ])
//            ->orWhere('id', 10)
//            ->paginate(12);

//        $posts = Post::query()
//            ->where(function (Builder $query){
//                $query->where('title', 'like','%aut%')
//                    ->whereDay('published_at', 1);
//            })
//            ->orWhere('id', 10)
//            ->paginate(12);



//        $fromDate = new Carbon('01.02.2022');
//        $toDate = new Carbon('01.02.2022');
//
//        $posts = Post::query()
//            ->when($fromDate, function (Builder $query, Carbon $fromDate) {
//                $query->where('published_at', '>=', $fromDate);
//            }, function (Builder $query) {
//                $query->where('published_at', '>=', now()->startOfYear());
//            })->paginate(12);
//  первая коллбэк функция будет работать, когда в $fromDate значение не null, вторая коллбэк функция запуститься, когда
//  в $formDate будет null

        $validated = $request->validate([
            'search' => ['nullable', 'string', 'max:50'],
            'from_date' => ['nullable', 'string', 'date'],
            'to_date' => ['nullable', 'string', 'date', 'after:from_date'],
            'tag' => ['nullable', 'string', 'max:10'],
        ]);

        $query = Post::query()
            ->where('published', true)
            ->whereNotNull('published_at');

        if ($search = $validated['search'] ?? null) {
            $query->where('title', 'like', "%{$search}%");
        }

        if ($fromDate = $validated['from_date'] ?? null) {
            $query->where('published_at', '>=', new Carbon($fromDate));
        }

        if ($toDate = $validated['to_date'] ?? null) {
            $query->where('published_at', '<=', new Carbon($toDate));
        }

        if ($tag = $validated['tag'] ?? null) {
            $query->whereJsonContains('tags', $tag);
        }


        $posts = $query->latest('published_at')
            ->paginate(12);

        return view('blog.index', compact('posts'));

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
