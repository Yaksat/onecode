<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(Request $request)
    {
//        $ip = $request->ip();
//        $path = $request->path();
//        $url = $request->url();
//        $full = $request->fullUrl();
//
//        dd($ip, $path, $url, $full);

//        dd($request->is('logi*'));
//        dd($request->routeIs('log'));

//        dd(session()->has('test'));
//        dd(session()->all());

//        $foo = session()->get('foo');
//        $foo = session('foo');
//        dd($foo);

        return view('login.index');
    }

    public function store(Request $request)
    {
//        $session = app()->make('session');
//        $session = app('session');
//        $session = Session::get('key');
//        $session = Session::put('key');

//        session()->put('foo', 'bar');
//        session([
//            'foo' => 'Bar',
//            'name' => 'Damir',
//        ]);

//        session()->forget('foo');
//        session()->flush(); // Удаляет все данные из сессии.


//        $ip = $request->ip();
//        $path = $request->path();
//        $url = $request->url();
//
//        dd($ip, $path, $url);

//        $email = $request->input('email');
//        $password = $request->input('password');
//        $remember = $request->boolean('remember');
//
//        dd($email, $password, $remember);

//        return 'Запрос на вход';

//        return response()->redirectTo('/foo');
//        return response()->redirectToRoute('user');
//        return redirect('/foo');

//        if (true) {
//            return redirect()->back()->withInput();
//        }

        //authenticate user

//        session(['alert' => __('Добро пожаловать')]); // Вынесем это в отдельную функцию хелпер
        alert(__('Добро пожаловать!'));

        return redirect()->route('user');

    }
}
