<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            return response()->json(new UserResource(auth()->user()), 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:100',
            'bio' => 'sometimes|max:255',
        ]);
        try {
            $user->name = $request->input('name');
            $user->bio = $request->input('bio');
            $user->save();

            return response()->json('USER DETAILS UPDATED', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
