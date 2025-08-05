<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\photos;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    //
    public function index()
    {
        try {
            $photos = photos::all();
            return response()->json($photos);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch photos'], 500);
        }
    }

    public function show($id)
    {
        try {
            $photo = photos::findOrFail($id);
            return response()->json($photo);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Photo not found'], 404);
        }
    }

    public function create(Request $request)
    {
        try {
            $photo = photos::create($request->all());
            return response()->json($photo, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to create photo'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $photo = photos::findOrFail($id);
            $photo->update($request->all());
            return response()->json(['message' => 'Photo updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to update photo'], 500);
        }
    }

    public function delete($id)
    {
        try {
            $photo = photos::findOrFail($id);
            $photo->delete();
            return response()->json(['message' => 'Photo deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete photo'], 500);
        }
    }
}
