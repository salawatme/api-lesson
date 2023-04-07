<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function addTask(Request $request)
    {
        $user = $request->user();
        Task::create([
            "user_id" => $user->id,
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
        ]);

        return [
            'successful'=> true,
        ];
    }

    public function getTask(Request $request)
    {
        return Task::where('user_id', $request->user()->id)->select('id', 'title', 'description', 'deadline', 'active')->get();
    }

    public function updateTask(Request $request, Task $task)
    {
        return $task;
    }
}
