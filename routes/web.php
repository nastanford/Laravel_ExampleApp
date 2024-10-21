<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\HomeController;

// Starting
// Route::get('/', function () {
//   return view('home');
// });

// Step 2:
// Route::view('/', 'home')->name('home');
// Route::view('/about', 'about')->name('about');
// Route::view('/contact', 'contact')->name('contact');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');


// // Route to display the list of todos
// Route::get('/todos', [ToDoController::class, 'index'])->name('todos.index');

// Mark a todo as completed
Route::put('/todos/{todo}/complete', [ToDoController::class, 'complete'])->name('todos.complete');


// // Create and store a new todo
// Route::get('/todos/create', [ToDoController::class, 'create'])->name('todos.create');
// Route::post('/todos', [ToDoController::class, 'store'])->name('todos.store');

// // Edit and update an existing todo
// Route::get('/todos/{todo}/edit', [ToDoController::class, 'edit'])->name('todos.edit');
// Route::put('/todos/{todo}', [ToDoController::class, 'update'])->name('todos.update');

// // Delete a todo
// Route::delete('/todos/{todo}', [ToDoController::class, 'destroy'])->name('todos.destroy');

Route::resource('todos', ToDoController::class);
