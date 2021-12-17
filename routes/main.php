<?php

use App\Http\Controllers\Posts\CommentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\LogMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// php artisan down - Переводит приложение в режим обслуживания.
// php artisan up - Переводит приложение в режим работы после down.

// Чтобы закешировать маршрушты (чтобы обработка маршрутов производилась быстрее) используется команда -
// php artisan route:cache (обычно на сервере скриптом)
// очищение кэша route:clear
// если маршрут или конфиг закешированы, то даже если мы что то в маршруте или в файле конфигурации моменяем, то
// в работе приложения этого не заметим

// Также можно закешировать файл конфигурации php artisan config:cache, очищение php artisan config:clear

// В этом файле оставим только публичные маршруты, т.е. то что доступно всем.
// Остальные маршруты - пользователя и админа - вынесли в отдельные файлы.

Route::view('/', 'home.index')->name('home'); // 'home.index' - это название каталога и название файла

Route::redirect('/home', '/')->name('home.redirect');

// контроллер может указываться и без метода (по умолчанию метод __invoke)
Route::get('/test', TestController::class)->name('test')->middleware('token:secret');
// В миддлевеер можно передавать параметры через двоеточие. Так передавать ключи конечно не надо, это учебный пример


Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('login', [LoginController::class, 'index'])->name('login');  // чтобы исключить какой-нибудь роут из мидлвеера, можно добавить в конце ->withoutMiddleware('guest');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
});

/* Подтверждение регистрации
Route::get('login/{user}/confirmation', [LoginController::class, 'confirmation'])->name('login.confirmation');
Route::post('login/{user}/confirm', [LoginController::class, 'confirm'])->name('login.confirm');
*/

Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::get('blog/{post}', [BlogController::class, 'show'])->name('blog.show');
Route::post('blog/{post}/like', [BlogController::class, 'like'])->name('blog.like');

Route::resource('posts/{post}/comments', CommentController::class)->only([
    'index', 'show',
]);

/*Чтобы создать контроллер для ресурса, то через консоль php artisan make:controller PostController --resource
    Route::resource('posts', PostController::class)->only(['index', 'show']); //Можно указать only, т.е. какие методы оставить
    Route::resource('posts', PostController::class)->except(['index', 'show']); //Можно указать except, т.е. какие методы исключить
    */

//чтобы просмотреть все роуты, то через консоль php artisan route:list
//Чтобы создать контроллер, то через консоль php artisan make:controller PostController
//CRUD (create, read, update, delete)

//через tinker (php artisan tinker), можно проверить есть ли какой-либо маршрут, например:
// Route::has('test') в кавычках название маршрута

//Где то в коде можно проверить является ли текущий запрос на какой-либо путь(который мы укажем в скобках), например:
// Route::is('/posts')
// Route::is('/posts*')

//Если роутов для юзера много их можно вынести в отдельный файл (тоже самое для админа). И подключить
// эти файлы в RouteServiceProvider.php. Что здесь и сделано.


//Route::fallback(function () {   //маршрут по умолчанию (не обязательный), если не найдет нужный маршрут.
//    return 'Fallback';
//});
