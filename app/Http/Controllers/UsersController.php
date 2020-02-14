<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCollection;

class UsersController extends Controller
{
    //
    public function index(): UserResourceCollection {
        return new UserResourceCollection(User::paginate());
    }

    public function show(User $user): UserResource {
        return new UserResource($user);
    }

    public function store(Request $request) {
        // dd($request->all());

        $request->validate([
            'user_uid' => 'required',
            'username' => 'required',
            'name' => 'required',
            'email' => 'required'
        ]);

        $user = User::create($request->all());

        return new UserResource($user);
    }

    public function update(User $user, Request $request): UserResource {
        $user->update($request->all());

        return new UserResource($user);
    }

    public function destroy(User $user) {
        $user->delete();

        return response()->json();
    }
}
