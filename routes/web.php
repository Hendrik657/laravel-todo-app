<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todo', [TodoController::class, 'getTodos']);

//Post, delete route toevoegen om todo's aan te maken
Route::post('/todo', [TodoController::class, 'createTodo'])->name('todo.create');
Route::delete('/todo{id}', [TodoController::class, 'deleteTodo'])->name('todo.delete');
Route::patch('/todo{id}/toggle', [TodoController::class, 'toggleTodo'])->name('todo.toggle');