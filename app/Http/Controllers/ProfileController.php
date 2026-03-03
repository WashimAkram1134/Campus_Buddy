<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'department' => 'required|string|max:255',
            'batch' => 'required|string|max:20',
            'semester' => 'required|string|max:20',
            'section' => 'required|string|max:10',
        ]);

        $user->update($request->only(['department', 'batch', 'semester', 'section']));

        return back()->with('success', 'Profile updated successfully! Your dashboard has been updated.');
    }
}