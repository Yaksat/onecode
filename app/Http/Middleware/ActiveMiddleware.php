<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ActiveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //здесь должно проверяться условие активности юзера, если true, то передаем запрос в контроллер
        if ($this->isActive($request)) {
            return $next($request);
        }

        abort(403);  //если юзер заблочен, то дойдет до сюда. Будет вызван хелпер abort(403), выполнение
        // программы прервется и будет передан статус 403.
        // Вместо abort() можно использовать исключение
        // throw new AuthorizationException();
    }

    protected function isActive(Request $request)
    {
        return true;
    }
}
