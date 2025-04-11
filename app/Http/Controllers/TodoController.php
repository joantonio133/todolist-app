<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    // public function index()
    // {
    //     $todos = Todo::all(); // Ambil semua data dari database
    //     // dd($todos);
    //     return view('todos.index', compact('todos'));
    // }

    public function index()
{
    $todos = Todo::all(); // atau Todo::where(...)->get()
    return view('todos.index', compact('todos'));
    
}


    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    { 
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'priority' => 'required|string'
        ]);
    
        Todo::create($validated);
    
        return redirect()->route('todos.index')->with('success', 'To-Do created!');
    }
    
    

    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

public function update(Request $request, $id)
{
    $todo = Todo::findOrFail($id);

    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'date' => 'required|date',
        'priority' => 'required|string'
    ]);

    $todo->update($validatedData);

    return redirect()->route('todos.index')->with('success', 'Task updated successfully!');
}

    public function destroy($id)
    {
        Todo::findOrFail($id)->delete();
        return redirect()->route('todos.index')->with('success', 'Task deleted successfully!');
    }
}
