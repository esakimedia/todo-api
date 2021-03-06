<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    public function index(TodoList $todo_list)
    {
        $tasks = $todo_list->tasks;

        return response($tasks);
    }

    public function store(TaskRequest $request, TodoList $todo_list)
    {
        return $todo_list->tasks()->create($request->validated());
    }

    public function update(Task $task, Request $request)
    {
        $task->update($request->all());

        return response($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response('', Response::HTTP_NO_CONTENT);
    }
}
