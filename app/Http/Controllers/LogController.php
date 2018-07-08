<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{

    public function create($taskId)
    {
        Log::create(['task_id' => $taskId, 'status' => 0]);
    }

    public function showQueue()
    {
        $queue = Log::zeroStatus()->orderBy('created_at', 'desc')->get()->all();

        return ($queue) ? view('show_queue', compact('queue')) : view('empty_queue');
    }

    public function acceptTask()
    {
        if ($rec = Log::zeroStatus()->orderBy('created_at')->first()) {
            $rec->status = 1;
            $rec->save();
        }

        $tc = new TaskController();
        $tasks = $tc->getAll();

        return view('show_tasks', compact('tasks', 'rec'));
    }

}
