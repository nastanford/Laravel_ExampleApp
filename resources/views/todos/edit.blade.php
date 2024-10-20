@extends('layouts.main')
@include('partials.navbar')

@section('title', 'Edit ToDo')

@section('content')
  <div class="container">
    <h1>Edit ToDo</h1>

    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $todo->title }}" required>
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control">{{ $todo->description }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary mt-3">Update ToDo</button>
    </form>
  </div>
@endsection
