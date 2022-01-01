<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TestController extends Controller
{
    /*
     //Таким образом можно определить использование миддлвееров в контроллерах - вместо указания их в маршрутах.
    public function __construct()
    {
        $this->middleware('token');
    }*/

    public function __invoke(Request $request)
    {
//        $response = app()->make('response');
//        $response = app('response');
//        $response = Response::make('ljfdg');
//        $response = response();

//        return response('Test');

//        return ['foo' => 'bar']; // laravel автоматически конвертирует массив в json.
        return response()->json(['foo' => 'bar']);
    }
}
