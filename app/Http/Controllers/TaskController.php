<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use App\Models\Task;
use App\Models\Log;


class TaskController extends Controller
{
    public function showTable()
    {
        $tasks = Task::all();

        return view('show_tasks', compact('tasks'));
    }

    public function treatTask($taskId)
    {
        if (Task::isValidId($taskId) && $task = Task::find($taskId)) {
            $task->counter++;
            $task->save();

            Log::create(['task_id' => $taskId, 'status' => 0]);
        }

        return redirect('/');
    }

    public function showQueue()
    {
        $queue = Log::zeroStatus()->orderBy('created_at', 'desc')->get()->all();

        return view('show_queue', compact('queue'));
    }

    public function acceptTask()
    {
        $rid = 0;

        if ($rec = Log::zeroStatus()->orderBy('created_at')->first()) {
            $rec->status = 1;
            $rec->save();
            $rid = $rec->id;
        }

        $tasks = Task::all();

        return view('show_tasks', compact('tasks', 'rid'));
    }

}
