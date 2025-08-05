<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        try {
            $users = User::all()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'username' => $user->username,
                    'email' => $user->email,
                    'address' => json_decode($user->address),
                    'phone' => $user->phone,
                    'website' => $user->website,
                    'company' => json_decode($user->company),
                ];
            });
            return response()->json($users);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch users'], 500);
        }
    }

    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->makeHidden(['created_at', 'updated_at', 'email_verified_at']);
            $user->address = json_decode($user->address);
            $user->company = json_decode($user->company);
            return response()->json($user);

        }
        catch (\Exception $e) {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    public function delete($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(['message' => 'User deleted successfully']);
        }
        catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete user'], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            $user = User::create($request->only(['name', 'username', 'email', 'address', 'phone', 'website', 'company']));
            return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to create user'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->update($request->only(['name', 'username', 'email', 'address', 'phone', 'website', 'company']));
            return response()->json(['message' => 'User updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to update user'], 500);
        }
    }
    
}
