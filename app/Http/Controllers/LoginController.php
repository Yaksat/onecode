<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return view('login.index');
    }

    public function store(Request $request)
    {
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

        if (true) {
            return redirect()->back()->withInput();
        }

        return redirect()->route('user');

    }
}
