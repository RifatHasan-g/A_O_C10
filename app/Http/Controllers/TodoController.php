<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;  // Import the Cookie facade

class TodoController extends Controller
{
    // Display the todo list
    public function index(Request $request)
    {
        $todos = $request->session()->get('todos', []);
        return view('todo.index', compact('todos'));
    }

    // Add a new todo
    public function store(Request $request)
    {
        $request->validate(['todo' => 'required|string']);
        $todos = $request->session()->get('todos', []);
        $todos[] = $request->input('todo');
        $request->session()->put('todos', $todos);

        // Store a cookie for demonstration purposes
        Cookie::queue('todo_cookie', 'New todo added!', 10);  // Expires in 10 minutes

        return redirect()->route('todo.index');
    }

    // Edit an existing todo
    public function edit($id, Request $request)
    {
        $todos = $request->session()->get('todos', []);
        if (!isset($todos[$id])) {
            abort(404);
        }
        $todo = $todos[$id];
        return view('todo.edit', compact('todo', 'id'));
    }

    // Update an existing todo
    public function update($id, Request $request)
    {
        $request->validate(['todo' => 'required|string']);
        $todos = $request->session()->get('todos', []);
        if (!isset($todos[$id])) {
            abort(404);
        }
        $todos[$id] = $request->input('todo');
        $request->session()->put('todos', $todos);
        return redirect()->route('todo.index');
    }

    // Delete a todo
    public function destroy($id, Request $request)
    {
        $todos = $request->session()->get('todos', []);
        if (!isset($todos[$id])) {
            abort(404);
        }
        unset($todos[$id]);
        $request->session()->put('todos', $todos);
        return redirect()->route('todo.index');
    }
}
