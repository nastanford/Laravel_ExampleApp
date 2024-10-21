@extends('layouts.main')
@include('partials.navbar')

@section('title', 'To-Do List')

@section('content')
  <div class="container">
    <h1>To-Do List</h1>
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
      <a href="{{ route('todos.create') }}" class="btn btn-primary mb-3">Add ToDo</a>
      @if ($todos->isEmpty())
        <p>No ToDos available.</p>
      @else
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Title</th>
              <th class="col-6">Description</th>
              <th>Status</th>
              <th class="text-center" colspan="3">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($todos as $todo)
              <tr>
                <td>{{ $todo->title }}</td>
                <td>{{ $todo->description }}</td>
                <td>
                  <span class="p-2 badge bg-{{ $todo->is_completed ? 'success' : 'danger' }}">
                    {{ $todo->is_completed ? 'Completed' : 'Pending' }}
                  </span>
                </td>
                <td>
                  @if (!$todo->is_completed)
                    <form action="{{ route('todos.complete', $todo->id) }}" method="POST" class="mr-2">
                      @csrf
                      @method('PUT')
                      <button type="submit" class="btn btn-success d-inline-block btn-sm">Completed</button>
                    </form>
                  @endif
                </td>
                <td>                  
                  <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning btn-sm d-inline-block mx-2">Edit</a>
                </td>
                <td>                  
                  <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger d-inline-block btn-sm">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
  </div>
@endsection
