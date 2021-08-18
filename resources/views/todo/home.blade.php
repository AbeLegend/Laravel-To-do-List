@extends('template.template')

@section('title','Home')

@section('content')
  <div class="container mt-3">
    <form class="my-2" action="{{ url('todo') }}" method="POST" style="width: 28rem;">
      @csrf
      <label for="todo">Todo</label>
      <input type="text" class="form-control my-2" id="todo" placeholder="Input todo here.." name="todo" required>
      <button type="submit" class="btn btn-primary">Submit</button>
      @if (session('status'))
        <div class="alert alert-success mt-2" role="alert">
          {{ session('status') }}
        </div>
      @endif
    </form>

    <div class="card" style="width: 28rem;">
      <div class="card-header text-center fs-3">
        My Todo
      </div>
        <ul class="list-group list-group-flush">
          @forelse ($todos as $todo)
          <li class="list-group-item">
            <span>
              @if ($todo->status =='uncomplete')
              {{ $todo->todo }}
                @else
                <del class="fw-light">{{ $todo->todo }}</del>
              @endif
            </span>
            {{-- Delete --}}
            <form action="{{ url('todo/'.$todo->id) }}" method="POST" class="d-inline float-end">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger">&#10007;</button>
            </form>
            @if ($todo->status == 'uncomplete')
            {{-- Edit --}}
            <a href="{{ url('todo/'.$todo->id.'/edit') }}" class="btn btn-warning d-inline float-end mx-2">&#9998;</a>
              {{-- Complete --}}
              <form action="{{ url('todo/'.$todo->id.'/completed') }}" method="POST" class="d-inline float-end">
                @csrf
                <button type="submit" class="btn btn-success">&#10003;</button>
              </form>
              @else
              {{-- Uncomplete --}}
              <form action="{{ url('todo/'.$todo->id.'/uncompleted') }}" method="POST" class="d-inline float-end mx-2">
                @csrf
                <button type="submit" class="btn btn-info">!&#10003;</button>
              </form>
            @endif
          </li>
          @empty
          <li class="list-group-item text-center">Empty</li>
          @endforelse
        </ul>
    </div>

   
  </div>
@endsection