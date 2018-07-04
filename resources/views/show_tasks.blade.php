<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Электронная очередь</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="/css/default.css" rel="stylesheet" type="text/css">
</head>
<body>
<table class="tasks">
    <caption>Операции</caption>
    @foreach($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td class="tdata"><a href="/treat/{{ $task->id }}" class="clink">{{ $task->name }}</a></td>
            <td>{{ $task->counter }}</td>
        </tr>
    @endforeach
</table>

    @if(isset($rec) && isset($rec->id))
        <div class="treatment">Задание id={{ $rec->id }} принято в обработку</div>
    @elseif(isset($rec) && !isset($rec->id))
        <div class="treatment">Нет заданий для обработки</div>
    @elseif(!isset($rec))
    @endif

<div class="ctrls">
    [ <a href="/queue" class="clink">Посмотреть очередь</a> ] [ <a href="/accept" class="clink">Принять в обработку</a> ]
</div>
</body>
</html>
