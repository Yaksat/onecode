<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $token)
    {
        //$token = env('TOKEN'); // Можно передавать не через параметр, а вот таким образом

        //dd($request); //Позволяет распечатать параметр. Дальше программа перестает выполняться, дальше код не идет.
        //dump($request); // Тоже самое что и dd, только программа продолжает дальше выполняться.
        //abort_if(true, 500) // Проверяет первый параметр если true, то кидает страницу с указанным кодом.
        //abort_unless(false, 500) //// Проверяет первый параметр если false, то кидает страницу с указанным кодом.

        if ($request->input('token') === $token) { //метод input берет один параметр из запроса
            return $next($request);
        }

        abort(403);
    }
}
