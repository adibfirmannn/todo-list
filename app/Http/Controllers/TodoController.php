<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    public function index()
    {
        $incomplete = Todo::where('is_complete', false)->get();
        $complete = Todo::where('is_complete', true)->get();
        // dd($complete);
        return view('todos.index', compact('incomplete', 'complete'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        Todo::create([
            'title' => $request->title,
            'is_complete' => false
        ]);

        return redirect('/');
    }

    public function toggle($id)
    {
        $todo = Todo::find($id);
        $todo->is_complete = !$todo->is_complete;
        $todo->save();
        return redirect('/');
    }

    public function destroy($id)
    {
        Todo::destroy($id);
        return redirect('/');
    }
}
