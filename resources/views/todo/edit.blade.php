@extends('template.template')

@section('title','Edit')

@section('content')
  <div class="container mt-3">
    <form class="my-2" action="{{ url('todo/'.$myTodo->id) }}" method="POST" style="width: 28rem;">
      @csrf
      @method('put')
      <label for="todo">Edit Todo</label>
      <input type="text" class="form-control my-2" id="todo" placeholder="Input todo here.." name="todo" required value="{{ $myTodo->todo }}">
      <button type="submit" class="btn btn-warning">Edit</button>
      @if (session('status'))
        <div class="alert alert-success mt-2" role="alert">
          {{ session('status') }}
        </div>
      @endif
    </form>
@endsection