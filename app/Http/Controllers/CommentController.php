<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'description' => 'required|string'
        ]);

        $comment = $post->comments()->create([
            'description' => $request->description,
        ]);

        $comment->users()->attach(auth()->id());

        return redirect()->route('posts.show', $post);
    }
}


