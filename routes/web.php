<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;

// Route::get('/', function () {
//   return view('home');
// });

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::resource('todos', ToDoController::class);

// // Route to display the list of todos
// Route::get('/todos', [ToDoController::class, 'index'])->name('todos.index');

// // Create and store a new todo
// Route::get('/todos/create', [ToDoController::class, 'create'])->name('todos.create');
// Route::post('/todos', [ToDoController::class, 'store'])->name('todos.store');

// // Edit and update an existing todo
// Route::get('/todos/{todo}/edit', [ToDoController::class, 'edit'])->name('todos.edit');
// Route::put('/todos/{todo}', [ToDoController::class, 'update'])->name('todos.update');

// // Mark a todo as completed
Route::put('/todos/{todo}/complete', [ToDoController::class, 'complete'])->name('todos.complete');

// // Delete a todo
// Route::delete('/todos/{todo}', [ToDoController::class, 'destroy'])->name('todos.destroy');