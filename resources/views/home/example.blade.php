<!DOCTYPE html>
<html lang="en">
<head>
    <meta CHARSET="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
</head>
<body>

@php                                  //то что начинается с @ - это директивы (из шаблонизатора blade)
    $foo = '<h2>Привет</h2>';       // есть парные есть не парные, например, @php(), здесь php код пишется уже внутри скобок
@endphp

{{ $foo }}         <!-- Выведет <h2>Привет</h2>-->
{!! $foo !!}        <!-- Выведет как загаловок Привет  С помощью этого выводить только те переменные, в которых уверены, чтоб предотвратить атаки-->
@{{ $foo }}        <!-- Если нам надо скобки пропустить мимо шаблонизатора blade - для java скрипта -->

@json(['foo' => 'bar'])

<script>
    window.App = @json(['locale' => config('app.locale')])
</script>


@for($i = 0; $i < 10; $i++)
    {{ $i }}
@endfor

@if($foo === 'bar2')
    <p>
        Да
    </p>
@else
    <p>
        Нет
    </p>
@endif

@foreach([1,2,3] as $value)
    {{ $value }}            <!--фигурные скобки - это интерполяция, внутри них можно выводить php переменные на экран -->
@endforeach

<div class="d-flex flex-column justify-content-between min-vh-100 text-center"> <!-- d-flex - после этого все элементы встанут в ряд/
    flex-column - после этого все элементы опять встанут в столбик
    justify-content-between min-vh-100 - чтобы шапка была наверху, контент по середине, подвал внизу-->
    @include('includes.header')

    <main class="flex-grow-1"> <!-- flex-grow-1 - чтобы контент занимал все доступное пространство между
         шапкой и подвалом-->
        Контент
    </main>

    @include('includes.footer')
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js"></script>
</body>
</html>
