<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index()
    {
        $todos = DB::table('todos')
            ->where('id_user', auth()->user()->id)
            ->get();
        return view('todo.home', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'todo' => 'required',
        ]);

        Todo::create([
            'todo' => $request->todo,
            'status' => 'uncomplete',
            'id_user' => auth()->user()->id
        ]);

        return redirect('/')->with('status', 'Success Create New Todo');
    }

    public function edit(Todo $todo)
    {
        $myTodo = DB::table('todos')
            ->where('id_user', auth()->user()->id)
            ->where('id', $todo->id)
            ->first();
        return view('todo.edit', compact('myTodo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $request->validate(['todo' => 'required']);
        Todo::where('id', $todo->id)->update(['todo' => $request->input('todo')]);
        return redirect('/')->with('status', 'Success Edit Todo');
    }

    public function destroy(Todo $todo)
    {
        Todo::destroy($todo->id);

        return redirect('/')->with('status', 'Success Delete');
    }

    public function completed(Todo $todo)
    {
        Todo::where('id', $todo->id)->update(['status' => 'complete']);
        return redirect('/')->with('status', 'Success Complete Todo');
    }

    public function uncompleted(Todo $todo)
    {
        Todo::where('id', $todo->id)->update(['status' => 'uncomplete']);
        return redirect('/')->with('status', 'Success Uncomplete Todo');
    }
}
