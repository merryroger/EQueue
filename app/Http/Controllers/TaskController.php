<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function showTable()
    {
        $tasks = DB::table('tasks')
            ->get()
            ->all();

        return view('show_tasks', compact('tasks'));
    }

    public function treatTask($taskId)
    {
        if ($taskId > 0 && $taskId <= DB::table('tasks')->get()->count()) {
            DB::table('tasks')->whereId($taskId)->increment('counter');
            DB::table('logs')->insert(['task_id' => $taskId, 'status' => 0, 'created_at' => DB::raw("NOW()")]);
        }

        return redirect('/');
    }

    public function showQueue()
    {
        $queue = DB::table('logs')
            ->where('status', '0')
            ->orderBy('created_at', 'desc')
            ->get()
            ->all();

        return ($queue) ? view('show_queue', compact('queue')) : view('empty_queue');
    }

    public function acceptTask()
    {
        $tasks = DB::table('tasks')->get()->all();
        if ($rec = DB::table('logs')->where('status', '0')->first()) {
            DB::table('logs')->whereId($rec->id)->update(['status' => 1]);
        } else {
            $rec = new Collection();
        }

        return view('show_tasks', compact('tasks', 'rec'));
    }

}
