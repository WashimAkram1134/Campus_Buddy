<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\DistrictAssociation; // Added this line
use Illuminate\Support\Facades\Auth;
use App\Models\Talent;

class CommunityController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'likes', 'comments.user'])
            ->orderBy('created_at', 'desc')
            ->get();

        $districtAssociations = DistrictAssociation::all();
        $talents = Talent::where('status', '=', 'approved')->with('user')->get();

        return view('community', compact('posts', 'districtAssociations', 'talents'));
    }

    public function storePost(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx|max:10240', // 10MB
            'type' => 'nullable|string',
            'action_text' => 'nullable|string|max:50',
            'action_link' => 'nullable|string|max:255',
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
            'action_text' => $request->action_text,
            'action_link' => $request->action_link,
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
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => Auth::id(),
            'content' => $request->content,
            'parent_id' => $request->parent_id,
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

    public function updateComment(Request $request, Comment $comment)
    {
        if ($comment->user_id !== Auth::id()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $comment->update([
            'content' => $request->content,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Comment updated',
            'content' => $comment->content
        ]);
    }

    public function destroyComment(Comment $comment)
    {
        if ($comment->user_id !== Auth::id()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        $post = $comment->post;
        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Comment deleted',
            'comments_count' => $post->comments()->count()
        ]);
    }

    public function likeComment(Comment $comment)
    {
        $like = CommentLike::where('comment_id', '=', $comment->id)->where('user_id', '=', Auth::id())->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            CommentLike::create([
                'comment_id' => $comment->id,
                'user_id' => Auth::id(),
            ]);
            $liked = true;
        }

        return response()->json([
            'success' => true,
            'liked' => $liked,
            'likes_count' => $comment->likes()->count(),
        ]);
    }

    public function replyComment(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $reply = Comment::create([
            'post_id' => $comment->post_id,
            'user_id' => Auth::id(),
            'parent_id' => $comment->id,
            'content' => $request->content,
        ]);

        return response()->json([
            'success' => true,
            'reply' => $reply->load('user'),
        ]);
    }
}
