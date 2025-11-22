<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        return response()->json([
            'message'    => 'list all users',
            'data'       => $user,
            'totalCount' => $user->count(),
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        return response()->json([
            'message' => 'user created successfully',
            'data' => $user
        ], 201);
    }

    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'user not found'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'message' => 'user deleted successfully'
        ]);
    }

   public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'user not found'
            ], 404);
        }

        $user->update($request->validated());

        return response()->json([
            'message' => 'user updated successfully',
            'data'    => $user
        ]);
    }

    public function getUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'user not found'
            ], 404);
        }

        return response()->json([
            'message' => 'list user',
            'data'    => $user
        ]);
    }
}
