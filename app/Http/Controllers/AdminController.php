<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\DistrictAssociation;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function communitySettings()
    {
        if (Auth::user()->role !== 'admin') abort(403);

        $posts = Post::with(['user'])->latest()->get();
        $associations = DistrictAssociation::latest()->get();

        return view('admin.community', compact('posts', 'associations'));
    }

    public function destroyPost(Post $post)
    {
        if (Auth::user()->role !== 'admin') abort(403);

        $post->delete();

        return back()->with('success', 'Post deleted by admin.');
    }

    public function storeAssociation(Request $request)
    {
        if (Auth::user()->role !== 'admin') abort(403);

        $request->validate([
            'name' => 'required|string|max:100',
            'division' => 'required|string',
            'link' => 'nullable|url',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('associations', 'public');
        }

        DistrictAssociation::create([
            'name' => $request->name,
            'division' => $request->division,
            'link' => $request->link,
            'image' => $imagePath,
            'members_count' => $request->members_count ?? 0,
        ]);

        return back()->with('success', 'Association added.');
    }

    public function destroyAssociation(DistrictAssociation $association)
    {
        if (Auth::user()->role !== 'admin') abort(403);

        $association->delete();

        return back()->with('success', 'Association deleted.');
    }
}
