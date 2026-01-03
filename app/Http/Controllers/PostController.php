<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderByRaw("
            CASE color
                WHEN 'red' THEN 1
                WHEN 'yellow' THEN 2
                WHEN 'green' THEN 3
                ELSE 4
            END
        ")
        ->orderBy('created_at', 'desc')
        ->get();

        return view('posts', compact('posts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string',
            'color' => 'required|in:green,yellow,red',
        ]);

        Post::create($validated);

        return redirect()->route('posts');
    }
}
