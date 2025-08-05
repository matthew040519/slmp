<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        try {
            $posts = posts::all();
            return response()->json($posts);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch posts'], 500);
        }
    }

    public function show($id)
    {
        try {
            $post = posts::findOrFail($id);
            return response()->json($post);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Post not found'], 404);
        }
    }

    public function create(Request $request)
    {
        try {
            $post = posts::create($request->all());
            return response()->json($post, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to create post'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $post = posts::findOrFail($id);
            $post->update($request->all());
            return response()->json(['message' => 'Post updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to update post'], 500);
        }
    }

    public function delete($id)
    {
        try{
            $post = posts::findOrFail($id);
            $post->delete();
            return response()->json(['message' => 'Post deleted successfully']);
        }
        catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete post'], 500);
        }
    }
}
