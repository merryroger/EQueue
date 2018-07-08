<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Task;


class TaskController extends Controller
{
    public function showTable()
    {
        $tasks = Task::all();

        return view('show_tasks', compact('tasks'));
    }

    public function getAll() {
        return Task::all();
    }

    public function treatTask($taskId)
    {
        if (Task::isValidId($taskId) && $task = Task::find($taskId)) {
            $task->counter++;
            $task->save();

            $lc = new LogController();
            $lc->create($taskId);
        }

        return redirect('/');
    }

}
