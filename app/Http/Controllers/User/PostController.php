<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function index()
    {
        $post = (object) [
            'id' => 123,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum <strong>dolor</strong> sit amet, consectetur adipisicing elit. Delectus, nemo?'
        ];

        $posts = array_fill(0,10,$post);

        return view('user.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('user.posts.create');
    }

    public function store(StorePostRequest $request)
    {
        //1-ый способ валидации - form request validation - php artisan make:request Post/StorePostRequest
//        В store передаем уже вот так store(StorePostRequest $request)
//        $validated = $request->validated(); //получаем данные, которые проверены с помощью класса StorePostRequest.

        // 2-ой способ валидации
//        $validated = $request->validate([
//            'title' => ['required', 'string', 'max:100'],
//            'content' => ['required', 'string', 'max:10000'],
//        ]);

        // 3-ий способ валидации
//        $validated = validator($request->all(), [
//            'title' => ['required', 'string', 'max:100'],
//            'content' => ['required', 'string', 'max:10000'],
//        ])->validate();

        //4-ый способ с помощью самописного хелпера validate()
        $validated = validate($request->all(), [
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
        ]);

//        Через исключения (через error) можно кинуть еще сообщение на страницу
//        if (true) {
//            throw ValidationException::withMessages([
//                'account' => __('Недостаточно средств.'),
//            ]);
//        }

        dd($validated);

        alert(__('Сохранено!'));

        return redirect()->route('user.posts.show', 123);
    }

    public function show($post)
    {
        $post = (object) [
            'id' => 123,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum <strong>dolor</strong> sit amet, consectetur adipisicing elit. Delectus, nemo?'
        ];

        return view('user.posts.show', compact('post'));
    }

    public function edit($post)
    {
        $post = (object) [
            'id' => 123,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum <strong>dolor</strong> sit amet, consectetur adipisicing elit. Delectus, nemo?'
        ];

        return view('user.posts.edit', compact('post'));
    }

    public function update(Request $request, $post)
    {
        $validated = validate($request->all(), [
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
        ]);

        dd($validated);

        alert(__('Сохранено!'));
        return redirect()->back(); // возвращает назад
    }

    public function delete($post)
    {
        return redirect()->route('user.posts');
    }

    public function like()
    {
        return 'Лайк + 1';
    }
}
