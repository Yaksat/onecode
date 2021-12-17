<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /*
     //Таким образом можно определить использование миддлвееров в контроллерах - вместо указания их в маршрутах.
    public function __construct()
    {
        $this->middleware('token');
    }*/

    public function __invoke()
    {
        return 'test';
    }
}
