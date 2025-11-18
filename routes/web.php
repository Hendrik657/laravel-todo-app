<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todo', [TodoController::class, 'getTodos']);

//Post route toevoegen om todo's aan te maken
Route::post('/todo', [TodoController::class, 'createTodo'])->name('todo.create');