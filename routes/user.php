<?php

use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;

// user. Работа с постами - через личный кабинет пользователя, поэтому добавим в начале маршрута 'user'
// Чтобы нам не переписывать все маршруты, добавим в начале user с помощью prefix.
//Route::prefix('user')->middleware(['auth', 'active'])->group(function () {
Route::prefix('user')->group(function () {
    Route::redirect('/', 'user/posts')->name('user');

    Route::get('posts', [PostController::class, 'index'])->name('user.posts');               //Через хелпер и название маршрута route('posts') можно получить сам маршрут  "http://localhost/posts". (коммент до добавления prefix)
    Route::get('posts/create', [PostController::class, 'create'])->name('user.posts.create'); //localhost берется из переменной APP_URL в .env
    Route::post('posts', [PostController::class, 'store'])->name('user.posts.store');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('user.posts.show');        //В фигурных скобках динамические параметры маршрута. Можно продолжить и дополнить ->whereNumber('post'), т.е. чтобы дин.параметр был только числом.
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('user.posts.edit'); //Чтобы передать динамич.параметр в хелпер, то так route('posts.edit', 123)
    Route::put('posts/{post}', [PostController::class, 'update'])->name('user.posts.update');
    Route::delete('posts/{post}', [PostController::class, 'delete'])->name('user.posts.delete');
    Route::put('posts/{post}/like', [PostController::class, 'like'])->name('user.posts.like');
    //Вместо того что сверху можно сделать проще - через resource (для всех стандартных маршрутов, кроме like).
});
