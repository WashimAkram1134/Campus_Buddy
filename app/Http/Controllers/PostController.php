<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        // 1. Fetch Posts with User and Comment creators
        $posts = Post::with(['user', 'likes', 'comments.user'])->latest()->get();
        
        // 2. Load district data static file for direct usage 
        // Note: The Blade might already do this but sending variable fits typical style
        return view('community', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Post created successfully!');
    }

    public function toggleLike($id)
    {
        $post = Post::findOrFail($id);
        $user_id = Auth::id();

        $existingLike = Like::where('post_id', $post->id)->where('user_id', $user_id)->first();

        if ($existingLike) {
            $existingLike->delete();
            $liked = false;
        } else {
            Like::create([
                'post_id' => $post->id,
                'user_id' => $user_id,
            ]);
            $liked = true;
        }

        return response()->json([
            'status' => 'success',
            'liked' => $liked,
            'likes_count' => $post->likes()->count()
        ]);
    }

    public function addComment(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = Comment::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return response()->json([
            'status' => 'success',
            'comment' => [
                'user' => [
                    'name' => Auth::user()->name,
                    'profile_image' => Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : null,
                ],
                'content' => $comment->content,
                'created_at' => $comment->created_at->diffForHumans(),
            ]
        ]);
    }
}
