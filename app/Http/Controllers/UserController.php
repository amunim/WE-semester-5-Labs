<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:200',
            'email' => 'required|email|unique:user,email',
            'class' => 'required|string|max:10',
            'role' => 'required|in:teacher,student,admin',
        ]);

        $user = User::create($validated);
        return response()->json($user);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'fullname' => 'sometimes|string|max:200',
            'email' => 'sometimes|email|unique:user,email,' . $id,
            'class' => 'sometimes|string|max:10',
            'role' => 'sometimes|in:teacher,student,admin',
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);
        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
