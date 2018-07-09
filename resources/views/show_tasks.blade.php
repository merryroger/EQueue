@extends('master')

@section ('tasktable')
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

@section('threads')
    @if(isset($rid) && $rid)
        <div class="treatment">Задание id={{ $rid }} принято в обработку</div>
    @elseif(isset($rid) && !$rid)
        <div class="treatment">Нет заданий для обработки</div>
    @elseif(!isset($rid))
    @endif

@section('controls')
    <div class="ctrls">
        [ <a href="/queue" class="clink">Посмотреть очередь</a> ] [ <a href="/accept" class="clink">Принять в
            обработку</a> ]
    </div>

@endsection
