<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $role = $user->roles[0]->name;
        if ($role == 'admin') {
            $user->removeRole('admin');
            $user->assignRole('client');
        } else {
            $user->removeRole('client');
            $user->assignRole('admin');
        }

        return redirect()->back();
    }
}
