<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request) // Laravel автоматически передаст объект текущего запроса в указанную переменную
    {
        // Есть еще глобальная функция хелпер request(), которая возвращает объект запроса

        // $data = $request->all();  // Возвращает массив со всеми параметрами.
        // $data = $request->only(['name', 'email']);
        // $data = $request->except(['name', 'email']);

         $name = $request->input('name');   // Получаем только определенные параметры. По другому можно записать: $name = $request->name;
         $email = $request->input('email');
         $password = $request->input('password');

        // $agreement = !! $request->input('agreement');          // Переводим в булево значение так, либо через boolean.
         $agreement = $request->boolean('agreement');

        // $avatar = $request->file('avatar');               // Получение файла, который загружает пользователь.

         dd($name, $email, $password, $agreement);

        // dd($request->has('name'));  // has() метод проверяет наличие параметра в запросе - возвращает булево значение. Возвращает true даже если параметр не заполнен, но он есть.

        // dd($request->filled('name')); // Метод проверяет заполнел ли параметр или нет.
        // dd($request->missing('name')); // Тоже самое что has(), только наоборот.

        /*
        if ($name = $request->input('name')) {
            // Если удалось получить name, то что то делаем. Если нет, то вернет null и условие не выполниться
        } */

        return 'Запрос на регистрацию';
    }

}
