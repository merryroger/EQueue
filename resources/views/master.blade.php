<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Электронная очередь</title>
    <!-- Styles -->
    <link href="/css/default.css" rel="stylesheet" type="text/css">
</head>
<body>
    @yield('tasktable')

    @yield('threads')

    @yield('controls')
</body>
</html>
