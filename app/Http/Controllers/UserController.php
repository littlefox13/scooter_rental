<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {

        return view('users', ['users' => \App\Models\User::all(), 'roles'=>Role::all()->keyBy('id')]);
    }

    public function show(User $user)
    {
        return view('user_edit', ['user'=>$user, 'roles'=>Role::all()->keyBy('id')]);
    }

    public function update(Request $request, User $user)
    {

        $user->update($request->all());

        return redirect()->route('user.index')
            ->with('success','User updated successfully');
    }
}
