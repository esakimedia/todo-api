<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

Route::apiResource('todo-list', TodoListController::class);

Route::apiResource('todo-list.task', TaskController::class)
    ->except('show')
    ->shallow();
