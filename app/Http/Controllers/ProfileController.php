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
            'major' => 'nullable|string|max:100',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['department', 'batch', 'semester', 'section', 'major']);

        if ($request->hasFile('profile_image')) {
            // Delete old image if it exists
            if ($user->profile_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($user->profile_image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($user->profile_image);
            }

            $path = $request->file('profile_image')->store('profile_images', 'public');
            $data['profile_image'] = $path;
        }

        $user->update($data);

        return back()->with('success', 'Profile updated successfully! Your dashboard has been updated.');
    }
}