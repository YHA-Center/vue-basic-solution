<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task = Task::create([
            'title' => $request->input('title'),
        ]);

        return response()->json($task, 201);
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255', 
        ]);
 
        $task->update([
            'title' => $request->input('title'),
        ]);

        return response()->json($task);
    }

    public function destroy($task){
        $req = Task::find($task);
        if($req){
            $result = $req->delete();
        }
    }
}
