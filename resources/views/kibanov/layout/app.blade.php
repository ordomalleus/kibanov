<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kibanov</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    @yield('store')
</head>
<body>
@yield('content')
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>