<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $post = new Post();
        $post->user_id = auth()->id();
        $post->content = $request->input('content');
        $post->likes = 0;
        $post->save();

        return redirect()->route('dashboard.index')->with('success', 'Idea created successfully');
    }

    public function destroy($postId)
    {
        if(auth()->id() !== Post::findOrFail($postId)->user_id) {
            abort(404);
        }

        $post = Post::findOrFail($postId);
        $post->delete();
        return redirect()->route('dashboard.index')->with('success', 'Idea deleted successfully');
    }

    public function update(Request $request, $postId)
    {
        if(auth()->id() !== Post::findOrFail($postId)->user_id) {
            abort(404);
        }

        $post = Post::findOrFail($postId);
        $post->content = $request->input('content');
        $post->save();
        return redirect()->route('dashboard.index')->with('success', 'Idea updated successfully');
    }

    public function show($postId)
    {
        $post = Post::findOrFail($postId);
        return view('posts.show', compact('post'));
    }
}
