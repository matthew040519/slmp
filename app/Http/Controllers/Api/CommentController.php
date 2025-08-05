<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function index()
    {
        try {
            $comments = comments::all();
            return response()->json($comments);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch comments'], 500);
        }
    }

    public function show($id)
    {
        try {
            $comment = comments::findOrFail($id);
            return response()->json($comment);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Comment not found'], 404);
        }
    }

    public function create(Request $request)
    {
        try {
            $comment = comments::create($request->all());
            return response()->json($comment, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to create comment'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $comment = comments::findOrFail($id);
            $comment->update($request->all());
            return response()->json(['message' => 'Comment updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to update comment'], 500);
        }
    }

    public function delete($id)
    {
        try {
            $comment = comments::findOrFail($id);
            $comment->delete();
            return response()->json(['message' => 'Comment deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete comment'], 500);
        }
    }
}
