<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $query = Post::query();

        if (request()->has('query')) {
            $query->where('content', 'like', '%' . request('query') . '%');
        }

        $posts = $query->paginate(5);

        return view('dashboard', ['posts' => $posts]);
    }
}
