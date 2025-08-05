<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\albums;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    //
    public function index()
    {
        try {
            $albums = albums::all();
            return response()->json($albums);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch albums'], 500);
        }
    }

    public function show($id)
    {
        try {
            $album = albums::findOrFail($id);
            return response()->json($album);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Album not found'], 404);
        }
    }

    public function create(Request $request)
    {
        try {
            $album = albums::create($request->all());
            return response()->json($album, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to create album'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $album = albums::findOrFail($id);
            $album->update($request->all());
            return response()->json(['message' => 'Album updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to update album'], 500);
        }
    }

    public function delete($id)
    {
        try {
            $album = albums::findOrFail($id);
            $album->delete();
            return response()->json(['message' => 'Album deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete album'], 500);
        }
    }
}
