<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->content = $request->content;
        $comment->post_id = $post->id;
        $comment->save();

        return redirect()->route('dashboard.index', $post->id)->with('success', 'Comment created successfully');
    }
}
