<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function index()
    {
        $user = User::find(auth()->user()->id);
        return view('profile', compact('user'));
    }

    function update(Request $request, User $user)
    {
        $user->name = $request->name;
        if ($request->password) {
            $user->name = bcrypt($request->password);
        }
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('message', 'success update prodfile');
    }
}
