<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all()->toArray());
    }

    public function show(User $user)
    {
        return response()->json($user->toArray());
    }

    public function store(Request $request, User $user)
    {
        $user->fill($request->all())->save();

        return $user;
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return response()->json($user->toArray());
    }

    public function destroy(User $user)
    {
        $user->delete();

        return Response::noContent();
    }
}
