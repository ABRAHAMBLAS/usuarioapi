<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return response()->json($users);
    }
    /*
    public function store(UserRequest $request)
    {


        $request['password'] = Hash::make($request['password']);

        $user = User::create($request->all());

        return response()->json(['message' => 'Usuario creado', 'user' => $user], 201);
    }*/
    function store(UserRequest $request)
    {
        try {
            $item = User::create($request->all());
            return response()->json([
                'status' => true,
                'items' => $item,
                "message" => "Cliente creado"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'items' => null,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(UserRequest $request, User $user)
    {


        if (isset($request['password'])) {
            $request['password'] = Hash::make($request['password']);
        }

        $user->update($request->all());

        return response()->json(['message' => 'Usuario actualizado', 'user' => $user]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Usuario eliminado']);
    }
}
