<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\todos;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    public function index()
    {
        try {
            $todos = todos::all();
            return response()->json($todos);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch todos'], 500);
        }
    }

    public function show($id)
    {
        try {
            $todo = todos::findOrFail($id);
            return response()->json($todo);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Todo not found'], 404);
        }
    }

    public function create(Request $request)
    {
        try {
            $todo = todos::create($request->all());
            return response()->json($todo, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to create todo'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $todo = todos::findOrFail($id);
            $todo->update($request->all());
            return response()->json(['message' => 'Todo updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to update todo'], 500);
        }
    }
    
    public function delete($id)
    {
        try {
            $todo = todos::findOrFail($id);
            $todo->delete();
            return response()->json(['message' => 'Todo deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete todo'], 500);
        }
    }
}
