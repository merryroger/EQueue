@extends('queue')

@section('queuetable')
    <table class="tasks">
        <caption>Очередь</caption>
        @foreach($queue as $qitem)
            <tr>
                <td>{{ $qitem->id }}</td>
                <td>{{ $qitem->created_at }}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('emptyqueue')
    <table class="tasks">
        <caption>Очередь пуста</caption>
    </table>
@endsection

@section('controls')
    <div class="ctrls">
        [ <a href="/" class="clink">Назад</a> ]
    </div>

@endsection
