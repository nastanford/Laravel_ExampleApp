@extends('layouts.main')
@include('partials.navbar')

@section('title', 'Add ToDo')

@section('content')
  <div class="container">
    <h1>Add a New ToDo</h1>

    <form action="{{ route('todos.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control"></textarea>
      </div>

      <button type="submit" class="btn btn-primary mt-3">Add ToDo</button>
    </form>
  </div>
@endsection
