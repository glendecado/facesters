<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $Post = Post::all();
        return $Post;
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $user = Auth::user(); // Get the currently authenticated user

        // Create the new post with the user's ID
        $post = new Post([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $user->posts()->save($post);

        return redirect()->route('dashboard')
        ->with('success', 'Post created successfully.');
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect()->route('dashboard')
        ->with('success', 'Post deleted successfully');
    }


}