<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show user profile edit form
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // Update user profile
public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();

    return back()->with('success', 'Profil mis à jour avec succès.');
}

public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => ['required'],
        'new_password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $user = Auth::user();

    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    return back()->with('success', 'Mot de passe mis à jour avec succès.');
}


}
