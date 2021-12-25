<!DOCTYPE html>
<html lang="en">
<head>
    <meta CHARSET="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page.title', config('app.name'))</title>
    <!-- Подключаем обычно bootstrap, если делаем админку или личный кабинет -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    @stack('css')

    <!-- это только для этого проекта. Вообще нужно выносить стили в отдельный файл -->
    <style>
        .container {
            max-width: 720px;
        }

        .required:after {
            content: '*';
            color: red;
        }
    </style>

</head>
<body>

    <div class="d-flex flex-column justify-content-between min-vh-100">
        @include('includes.header')

        <main class="flex-grow-1 py-3">
            @yield('content')
        </main>

        @include('includes.footer')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
    @stack('js')
</body>
</html>
