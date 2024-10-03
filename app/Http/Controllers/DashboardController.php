<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        Post::create([
            'content' => 'This is my first post',
            'likes' => 5,
        ]);

        return view('dashboard',
            [
                'posts' => Post::orderBy('likes', 'desc')->get(),
            ]
        );
    }
}
