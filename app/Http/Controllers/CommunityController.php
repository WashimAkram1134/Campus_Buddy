<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'likes', 'comments.user'])->latest()->get();
        return view('community', compact('posts'));
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx|max:10240', // 10MB
            'type' => 'nullable|string',
        ]);

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('posts/attachments', 'public');
        }

        Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'attachment' => $attachmentPath,
            'type' => $request->type ?? 'general',
        ]);

        return redirect()->back()->with('success', 'Post created successfully!');
    }

    public function like(Post $post)
    {
        $like = Like::where('post_id', $post->id)->where('user_id', Auth::id())->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            Like::create([
                'post_id' => $post->id,
                'user_id' => Auth::id(),
            ]);
            $liked = true;
        }

        return response()->json([
            'success' => true,
            'liked' => $liked,
            'likes_count' => $post->likes()->count(),
        ]);
    }

    public function comment(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        // Support both AJAX and Normal submit if needed, but for simplicity we can response json or redirect
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'comment' => $comment->load('user'),
                'comments_count' => $post->comments()->count()
            ]);
        }

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
