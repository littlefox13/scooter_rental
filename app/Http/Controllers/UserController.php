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
        return ['users' => \App\Models\User::all()->toArray(), 'roles'=>Role::all()->keyBy('id')];
    }

    public function show($id)
    {
        $user = User::find($id);
        return ['user'=>$user, 'roles'=>Role::all()->keyBy('id')];
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);

        $user->update($request->all());

        return response()->json('User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json('User deleted successfully');
    }
}
