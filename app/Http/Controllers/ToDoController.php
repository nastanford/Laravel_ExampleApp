<?php
namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
  /**
   * Display a listing of the todos.
   *
   * @return \Illuminate\View\View
   */
  public function index()
  {
    // Retrieve all todos from the database
    $todos = Todo::all();

    // Pass the todos to the view
    return view('todos.index', ['todos' => $todos]);
  }

  // Show the form for creating a new todo
  public function create()
  {
    return view('todos.create');
  }

  // Store a new todo
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required',
      'description' => 'nullable',
    ]);

    Todo::create([
      'title' => $request->title,
      'description' => $request->description,
      'is_completed' => false,
    ]);

    return redirect()->route('todos.index')->with('success', 'ToDo added successfully.');
  }

  // Show the form for editing the specified todo
  public function edit(Todo $todo)
  {
    return view('todos.edit', ['todo' => $todo]);
  }

  // Update the specified todo
  public function update(Request $request, Todo $todo)
  {
    $request->validate([
      'title' => 'required',
      'description' => 'nullable',
    ]);

    $todo->update([
      'title' => $request->title,
      'description' => $request->description,
    ]);

    return redirect()->route('todos.index')->with('success', 'ToDo updated successfully.');
  }

  // Mark a todo as completed
  public function complete(Todo $todo)
  {
    $todo->update(['is_completed' => true]);

    return redirect()->route('todos.index')->with('success', 'ToDo marked as completed.');
  }

  // Delete the specified todo
  public function destroy(Todo $todo)
  {
    $todo->delete();

    return redirect()->route('todos.index')->with('success', 'ToDo deleted successfully.');
  }
}
