<?php

namespace App\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('date', date('Y')); // Данная переменная будет доступна во всех наших страницах

        // Страничка прежде чем попасть в браузер попадет в эту функцию (для роутов user*)
        View::composer('user*', function($view) {
            $view->with('balance', 12345);  // таким образом передаем переменные во view
        });

    }
}
