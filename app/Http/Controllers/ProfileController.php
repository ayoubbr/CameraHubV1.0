<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'min:8|confirmed',
        ]);

        auth()->user()->update($request->only('name', 'email'));

        if ($request->input('password')) {
            auth()->user()->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }

        return redirect()->route('profile')->with('message', 'Profile saved successfully');
    }
}
