@extends('layouts.main')
@include('partials.navbar')

@section('title', 'ToDo List')

@section('content')
  <div class="container">
    <h1>To-Do List</h1>
    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('todos.create') }}" class="btn btn-primary mb-3">Add ToDo</a>

    @if($todos->isEmpty())
      <p>No ToDos available.</p>
    @else
      <ul class="list-group">
        @foreach($todos as $todo)
          <li class="list-group-item">
            <strong>{{ $todo->title }}</strong> - {{ $todo->description }}
            <span class="badge bg-{{ $todo->is_completed ? 'success' : 'danger' }}">
              {{ $todo->is_completed ? 'Completed' : 'Pending' }}
            </span>

            <div class="d-flex justify-content-end">
              @if(!$todo->is_completed)
                <form action="{{ route('todos.complete', $todo->id) }}" method="POST" class="mr-2">
                  @csrf
                  @method('PUT')
                  <button type="submit" class="btn btn-success btn-sm">Mark as Completed</button>
                </form>
              @endif

              <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>

              <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
            </div>
          </li>
        @endforeach
      </ul>
    @endif
  </div>
@endsection
